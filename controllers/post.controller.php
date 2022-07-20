<?php

    require_once "models/post.model.php";

    class PostController{

        private function fncResponse($response){
            
            if(!empty($response))
                $json = array('status' => 200,'results'=> count($response),'data' => $response); 
            else
                $json = array('status' => 404,'results' => false);
               
            echo json_encode($json,http_response_code($json["status"]));
        }



        static public function postData($table, $data){
            $response = PostModel::postData($table, $data);

            return $response;
        }
    }