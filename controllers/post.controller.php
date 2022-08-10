<?php

    require_once "models/get.model.php";
    require_once "models/post.model.php";
    require_once "models/put.model.php";
    require_once "models/connection.php";
    require_once "vendor/autoload.php";

    use Firebase\JWT\JWT;

    class PostController{

        private $KEY =  "cskhfuwt48wbfjn3i4utnjf38754hf3yfbjc93758thrjsnf83hcwn8437";

        private function fncResponse($response, $message){
            
            if(isset($response) && !empty($response))
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
        
            }else{

                $response = PostModel::postData($table, $data);

                if($response["message"] && $response["message"] == "Data has been saved!"){
                    
                    $validateUser = GetModel::getDataFilter($table, "*", "email_".$suffix, $data["email_".$suffix], null, null, null, null);
          
                    if(!empty($validateUser)){

                        $validateUser =  $validateUser[0];

                        $token = Connection::jwt($validateUser->{"id_".$suffix},$validateUser->{"email_".$suffix});
                    
                        $jwt = JWT::encode($token, $this->KEY, 'HS256');  //Set token in db

                        $data = array("token_".$suffix => $jwt, "token_exp_".$suffix => $token['exp']);

                        $update =  PutModel::putData($table, $data, $validateUser->{"id_".$suffix}, "id_".$suffix);

                        if($update["message"] && $update["message"] == "Data has been updated!"){
                            $validateUser->{"token_".$suffix} = $jwt;
                            $validateUser->{"token_exp_".$suffix} = $token["exp"];

                            unset($validateUser->{"password_".$suffix}); // Remove password field
                            return $this->fncResponse($validateUser, "");
                        
                        }else
                            return $this->fncResponse(null,"Error token");
                    }
                }

            }
            
        }


        public function postLogin($table, $data, $suffix){
        
            $validateUser = GetModel::getDataFilter($table, "*", "email_".$suffix, $data["email_".$suffix], null, null, null, null);
            
            if(!empty($validateUser)){

                if(isset($validateUser->{"password_".$suffix})){ // Register user by API

                    $validateUser =  $validateUser[0];
                    $crypt = crypt($data["password_".$suffix],'$2a$07$Cam8h88K3NHemXNGPql1c5kQI$');
                    
                    if($validateUser->{"password_".$suffix} == $crypt){
                        
                        $token = Connection::jwt($validateUser->{"id_".$suffix},$validateUser->{"email_".$suffix});
                        
                        $jwt = JWT::encode($token, $this->KEY, 'HS256');  //Set token in db

                        $data = array("token_".$suffix => $jwt, "token_exp_".$suffix => $token['exp']);

                        $update =  PutModel::putData($table, $data, $validateUser->{"id_".$suffix}, "id_".$suffix);

                        if($update["message"] && $update["message"] == "Data has been updated!"){
                            $validateUser->{"token_".$suffix} = $jwt;
                            $validateUser->{"token_exp_".$suffix} = $token["exp"];

                            unset($validateUser->{"password_".$suffix}); // Remove password field
                            return $this->fncResponse($validateUser, "");
                        
                        }else
                            return $this->fncResponse(null,"Error token");

                    }else
                        return $this->fncResponse(null,"Invalid Password");

                }else{

                    // Update token to User logeed by others API´s 

                    $validateUser =  $validateUser[0];
                    $token = Connection::jwt($validateUser->{"id_".$suffix},$validateUser->{"email_".$suffix});
                        
                    $jwt = JWT::encode($token, $this->KEY, 'HS256');  //Set token in db

                    $data = array("token_".$suffix => $jwt, "token_exp_".$suffix => $token['exp']);

                    $update =  PutModel::putData($table, $data, $validateUser->{"id_".$suffix}, "id_".$suffix);

                    if($update["message"] && $update["message"] == "Data has been updated!"){
                        $validateUser->{"token_".$suffix} = $jwt;
                        $validateUser->{"token_exp_".$suffix} = $token["exp"];

                        unset($validateUser->{"password_".$suffix}); // Remove password field
                        return $this->fncResponse($validateUser, "");
                    
                    }else
                        return $this->fncResponse(null,"Error token");

                }

                
            }else
                return $this->fncResponse($validateUser,"Email No Found!");
            
        }
    }