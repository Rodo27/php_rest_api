<?php 
    require_once "connection.php";

    class GetModel{

        static public function getData($table, $select){
            $sql = "SELECT $select FROM $table";
            $stmt =  Connection::connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS); // if you need indexes remove PDO::FETCH CLASS 
        }

        
        static public function getDataFilter($table, $select, $linkTo, $equalTo){

            $linkToArray = explode(",",$linkTo);
            $equalToArray = explode("_",$equalTo);

            $linkToString = "";
           
            if(count($linkToArray) > 1){
                foreach($linkToArray as $key => $value){
                    if($key > 0)
                    $linkToString .= "AND ".$value." =:".$value." ";
                }
            }

            //print_r($linkToArray);
            //print_r($equalToArray);
            
            $sql = "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToString";
            //$sql = "SELECT $select FROM $table WHERE price_course in(14.99,24.99) ";
            //print_r($sql);
            //return ;
            $stmt =  Connection::connect()->prepare($sql);
            
            foreach($linkToArray as $key => $value){
                $stmt->bindParam(":".$value, $equalToArray[$key], PDO::PARAM_STR);
            }
            $stmt->execute();
            return print_r($stmt->fetchAll(PDO::FETCH_CLASS)); // if you need indexes remove PDO::FETCH CLASS 
        }
    }