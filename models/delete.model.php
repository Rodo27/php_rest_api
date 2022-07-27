<?php

    require_once "connection.php";

    class DeleteModel{

        static public function deleteData($table, $id, $nameId){

            $sql = "DELETE FROM $table WHERE $nameId = :$nameId";

            $link = Connection::connect();
        
            $stmt = $link->prepare($sql);
            $stmt->bindParam(":$nameId", $id, PDO::PARAM_STR);

            if($stmt->execute())
                $response = array("message" => "Data has been deleted!", "id" => $id);
            else
                $response = $link->errorInfo();


            return $response;

        }


    }