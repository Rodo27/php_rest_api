<?php

    require_once "connection.php";

    class PostModel{

        static public function postData($table, $data){

            $columns = "";
            $params = "";

            foreach($data as $key => $value){
                $columns .= $key.",";
                $params .= ":".$key.",";
            }

            $columns = substr($columns,0, -1);
            $params = substr($params,0, -1);

            $sql = "INSERT INTO $table ($columns) VALUES ($params)";

            $link = Connection::connect();
            $stmt = $link->prepare($sql);

           
            foreach ($data as $key => $value)
                $stmt->bindParam(":".$key, $data[$key], PDO::PARAM_STR);


            if($stmt->execute())
                $response = array("message" => "Data has been saved!", "id" => $link->lastInsertId());
            else
                //$response = json_encode(array("error" => true, "table" => $table, "data" => $params));
                $response = $link->errorInfo();

                
            return $response;
        }


  



    }