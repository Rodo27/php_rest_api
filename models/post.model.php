<?php 
    require_once "connection.php";

    class PostModel{

        static public function postData($table, $data){

            echo json_encode(array("data" => $data, "table" => $table));
            return;
        }




    }