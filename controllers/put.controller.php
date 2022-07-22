<?php

    require_once "models/put.model.php";

    class PutController{

        private function fncResponse($response){
            
            if(!empty($response))
                $json = array('status' => 200,'results' => $response); 
            else
                $json = array('status' => 404,'results' => "No Found", 'method' => 'put');
               
            echo json_encode($json,http_response_code($json["status"]));
        }


        public function putData($table, $data, $id, $nameId){
            $response = PutModel::putData($table, $data, $id, $nameId);
            $result = $this->fncResponse($response);
            return $result;
        }

    }