<?php

    require_once "connection.php";

    class PutModel{

        static public function putData($table, $data, $id, $nameId){

            $setString = "";

            foreach ($data as $key => $value)
                $setString .= "$key = :$key,"; 
            
            $setString= substr($setString,0, -1);

            
            $sql = "UPDATE $table SET $setString WHERE $nameId = :$nameId";

            $link = Connection::connect();
            $stmt = $link->prepare($sql);

            
            foreach ($data as $key => $value)
                $stmt->bindParam(":$key", $data[$key], PDO::PARAM_STR);

            $stmt->bindParam(":$nameId", $id, PDO::PARAM_STR);

            
            if($stmt->execute())
                $response = array("message" => "Data has been updated!", "id" => $id);
            else
                $response = $link->errorInfo();


            return $response;

        }


    }