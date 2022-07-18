<?php

    require_once "models/get.model.php";

    class GetController{
        public function getData($table, $select){

            $response =  GetModel::getData($table, $select);
            $result = $this->fncResponse($response);
            return $result;
        }

        public function getDataFilter($table, $select, $linkTo, $equalTo){

            $response =  GetModel::getDataFilter($table, $select, $linkTo, $equalTo);
            return $response;
            $result = $this->fncResponse($response);
            return $result;
        }

        /* Responses Controller */

        private function fncResponse($response){

            if(!empty($response))
                $json = array('status' => 200,'results'=> count($response),'data' => $response); 
            else
                $json = array('status' => 404,'results' => false);
               
            echo json_encode($json,http_response_code($json["status"]));

        }
    }