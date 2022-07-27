<?php

    require_once "models/delete.model.php";

    class DeleteController{

        private function fncResponse($response){
            
            if(!empty($response))
                $json = array('status' => 200,'results' => $response); 
            else
                $json = array('status' => 404,'results' => "No Found", 'method' => 'delete');
               
            echo json_encode($json,http_response_code($json["status"]));
        }


        public function deleteData($table, $id, $nameId){
            $response = DeleteModel::deleteData($table, $id, $nameId);
            $result = $this->fncResponse($response);
            return $result;
        }

    }