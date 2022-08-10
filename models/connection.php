<?php

    require_once "models/get.model.php";

    class Connection{
        /* Database information */

        static public function infoDatabase(){

            $infoDB =  array(
                "database" => "database_1",
                "user" => "root",
                "pass" => ""
            );

            return $infoDB;
        }

        /* Database Connection  */

        static public function connect(){
            try {
                $link =  new PDO("mysql:host=localhost;dbname=".
                    Connection::infoDatabase()["database"],
                    Connection::infoDatabase()["user"],
                    Connection::infoDatabase()["pass"]
                    );
                $link->exec("set names utf8");
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }

            return $link;
        }

        /* Generate Token JWT */

        static public function jwt($id, $email){
            
            $time = time();
            
            $token = array(
                "iat" =>  $time, // init token date
                "exp" => $time + (60*60*24), // date to expire token 
                "data" => [
                    "id" => $id,
                    "email" => $email
                ]
            
            );

            return $token;
        }

        /* Validated Token */

        static public function tokenValidate($token, $table, $suffix){

            // validate with token
            $result = GetModel::getDataFilter($table, "token_exp_".$suffix, "token_".$suffix, $token, null, null, null, null);
            
            if(!empty($result)){

                $time = time();  //get current time
                $result = $result[0];

                return ($time < $result->{"token_exp_".$suffix}) ? "active" : "expired";
            }else
                return "token invalid";
            

        }

    }