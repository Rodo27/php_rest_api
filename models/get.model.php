<?php 
    require_once "connection.php";

    class GetModel{

        static public function getData($table, $select, $orderBy, $orderMode, $startAt, $endAt){
            
            $sql = "SELECT $select FROM $table";

                
            // order by but not limit
            if(isset($orderBy) && isset($orderMode) && !isset($startAt) && !isset($endAt))
                $sql = "SELECT $select FROM $table ORDER BY $orderBy $orderMode";

            // order by and limit
            if(isset($orderBy) && isset($orderMode) && isset($startAt) && isset($endAt))
                $sql = "SELECT $select FROM $table ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt";

            // only limit
            if(!isset($orderBy) && !isset($orderMode) && isset($startAt) && isset($endAt))
                $sql = "SELECT $select FROM $table LIMIT $startAt, $endAt";
            
            //print_r($message);
            //return;
            $stmt =  Connection::connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS); // if you need indexes remove PDO::FETCH CLASS 
        }

        
        static public function getDataFilter($table, $select, $linkTo, $equalTo, $orderBy, $orderMode, $startAt, $endAt){

            $linkToArray = explode(",",$linkTo);
            $equalToArray = explode("_",$equalTo);

            $linkToString = "";
           
            if(count($linkToArray) > 1){
                foreach($linkToArray as $key => $value){
                    if($key > 0)
                        $linkToString .= "AND ".$value." =:".$value." ";
                }
            }

            $sql = "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToString";

            // order by but not limit
            if(isset($orderBy) && isset($orderMode) && !isset($startAt) && !isset($endAt))
                $sql = "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToString ORDER BY $orderBy $orderMode";

            // order by and limit
            if(isset($orderBy) && isset($orderMode) && isset($startAt) && isset($endAt))
            $sql = "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToString ORDER BY $orderBy $orderMode LIMIT $startAt, $endAt";
            
            // only limit
            if(!isset($orderBy) && !isset($orderMode) && isset($startAt) && isset($endAt))
            $sql = "SELECT $select FROM $table WHERE $linkToArray[0] = :$linkToArray[0] $linkToString LIMIT $startAt, $endAt";

            $stmt =  Connection::connect()->prepare($sql);
            
            foreach($linkToArray as $key => $value)
                $stmt->bindParam(":".$value, $equalToArray[$key], PDO::PARAM_STR);
            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS); // if you need indexes remove PDO::FETCH CLASS 
        }


        /* Relations  */

        static public function getRelationData($relation, $type, $select, $orderBy, $orderMode, $startAt, $endAt){
            
            $relationArray = explode(",", $relation);
            $typeArray =  explode(",", $type);
            $innerJoinString = "";

            if(count($relationArray) > 1){
                foreach($relationArray as $key => $value){
                    if($key > 0)
                        $innerJoinString .= "INNER JOIN ".$value." ON ".$relationArray[0].".id_".$typeArray[$key]."_".$typeArray[0] ." = ".$value.".id_".$typeArray[$key]." ";
                }
            }

            $sql = "SELECT $select FROM  $relationArray[0] $innerJoinString";

            if(isset($orderBy) && isset($orderMode) && !isset($startAt) && !isset($endAt))
                $sql = "SELECT $select FROM  $relationArray[0] $innerJoinString ORDER By $orderBy $orderMode";
            
            if(isset($orderBy) && isset($orderMode) && isset($startAt) && isset($endAt))
                $sql = "SELECT $select FROM  $relationArray[0] $innerJoinString ORDER By $orderBy $orderMode LIMIT $startAt, $endAt";
    
            if(!isset($orderBy) && !isset($orderMode) && isset($startAt) && isset($endAt))
                $sql = "SELECT $select FROM  $relationArray[0] $innerJoinString LIMIT $startAt, $endAt";
        
            $stmt =  Connection::connect()->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS); // if you need indexes remove PDO::FETCH CLASS

        }

        static public function getRelationDataFilter($relation, $type, $select, $linkTo, $equalTo, $orderBy, $orderMode, $startAt, $endAt){

            // Filters
            
            $linkToArray = explode(",",$linkTo);
            $equalToArray = explode("_",$equalTo);

            $linkToString = "";
           
            if(count($linkToArray) > 1){
                foreach($linkToArray as $key => $value){
                    if($key > 0)
                        $linkToString .= "AND ".$value." =:".$value." ";
                }
            }

            // Relations

            $relationArray = explode(",", $relation);
            $typeArray =  explode(",", $type);
            $innerJoinString = "";

            
            if(count($relationArray) > 1){
                foreach($relationArray as $key => $value){
                    if($key > 0)
                        $innerJoinString .= "INNER JOIN ".$value." ON ".$relationArray[0].".id_".$typeArray[$key]."_".$typeArray[0] ." = ".$value.".id_".$typeArray[$key]." ";
                }
            }

            $sql = "SELECT $select FROM  $relationArray[0] $innerJoinString WHERE $linkToArray[0] = :$linkToArray[0] $linkToString";

            if(isset($orderBy) && isset($orderMode) && !isset($startAt) && !isset($endAt))
                $sql = "SELECT $select FROM  $relationArray[0] $innerJoinString WHERE $linkToArray[0] = :$linkToArray[0] $linkToString ORDER By $orderBy $orderMode";
            
            if(isset($orderBy) && isset($orderMode) && isset($startAt) && isset($endAt))
                $sql = "SELECT $select FROM  $relationArray[0] $innerJoinString WHERE $linkToArray[0] = :$linkToArray[0] $linkToString ORDER By $orderBy $orderMode LIMIT $startAt, $endAt";
    
            if(!isset($orderBy) && !isset($orderMode) && isset($startAt) && isset($endAt))
                $sql = "SELECT $select FROM  $relationArray[0] $innerJoinString WHERE $linkToArray[0] = :$linkToArray[0] $linkToString LIMIT $startAt, $endAt";

            $stmt =  Connection::connect()->prepare($sql);

            foreach($linkToArray as $key => $value)
                $stmt->bindParam(":".$value, $equalToArray[$key], PDO::PARAM_STR);
            
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS); // if you need indexes remove PDO::FETCH CLASS

        }


    }