<?php

    require_once "models/get.model.php";

    class GetController{
        public function getData($table, $select, $orderBy, $orderMode, $startAt, $endAt){

            $response =  GetModel::getData($table, $select, $orderBy, $orderMode, $startAt, $endAt);
            $result = $this->fncResponse($response);
            return $result;
        }

        public function getDataFilter($table, $select, $linkTo, $equalTo, $orderBy, $orderMode, $startAt, $endAt){

            $response =  GetModel::getDataFilter($table, $select, $linkTo, $equalTo, $orderBy, $orderMode, $startAt, $endAt);
            $result = $this->fncResponse($response);
            return $result;
        }


        /* Relations */

        // Relation without filters //
        public function getRelationData($relation, $type, $select, $orderBy, $orderMode, $startAt, $endAt){
            
            $response =  GetModel::getRelationData($relation, $type, $select, $orderBy, $orderMode, $startAt, $endAt);
            $result = $this->fncResponse($response);
            return $result;
        }

        public function getRelationDataFilter($relation, $type, $select, $linkTo, $equalTo, $orderBy, $orderMode, $startAt, $endAt){
            
            $response =  GetModel::getRelationDataFilter($relation, $type, $select, $linkTo, $equalTo, $orderBy, $orderMode, $startAt, $endAt);
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