<?php

    require_once "models/post.model.php";

    class PostController{

        private function fncResponse($response){
            
            if(!empty($response))
                $json = array('status' => 200,'results'=> count($response),'message' => $response); 
            else
                $json = array('status' => 404,'results' => "No Found", 'method' => 'post');
               
            echo json_encode($json,http_response_code($json["status"]));
        }



        public function postData($table, $data){
            $response = PostModel::postData($table, $data);
            $result = $this->fncResponse($response);
            return $result;
        }
    }