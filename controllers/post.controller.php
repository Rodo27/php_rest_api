<?php

    require_once "models/get.model.php";
    require_once "models/post.model.php";

    class PostController{

        private function fncResponse($response, $message){
            
            if(!empty($response))
                $json = array('status' => 200,'results' => $response); 
            else
                $json = array('status' => 404,'results' => ($message = $message ?? "No Found"), 'method' => 'post');
               
            echo json_encode($json,http_response_code($json["status"]));
        }


        public function postData($table, $data){
            $response = PostModel::postData($table, $data);
            $result = $this->fncResponse($response, null);
            return $result;
        }

        public function postRegister($table, $data, $suffix){

            if(isset($data["password_".$suffix])){
            
                $crypt = crypt($data["password_".$suffix],'$2a$07$Cam8h88K3NHemXNGPql1c5kQI$');
                $data["password_".$suffix] = $crypt;
              
                $response = PostModel::postData($table, $data);
                $result = $this->fncResponse($response, null);
              
                return $result;
        
            }  
        }


        public function postLogin($table, $data, $suffix){
        
            $validateUser = GetModel::getDataFilter($table, "*", "email_".$suffix, $data["email_".$suffix], null, null, null, null);
            
            if(!empty($validateUser)){
                
                $validateUser =  $validateUser[0];
                $crypt = crypt($data["password_".$suffix],'$2a$07$Cam8h88K3NHemXNGPql1c5kQI$');
                
                if($validateUser->{"password_".$suffix} == $crypt)
                    return $this->fncResponse($validateUser, null);
                else
                    return $this->fncResponse(null,"Invalid Password");
                
            }else
                return $this->fncResponse($validateUser,"Email No Found!");
            
        }
    }