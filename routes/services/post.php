<?php
    require_once "controllers/post.controller.php";
    require_once "controllers/post.controller.php";

    $table = explode("?", $routesArray[2])[0];

    if(isset($_POST) && !isset($_GET)){

        $response = new PostController();
        $response->postData($table,$_POST);   
    }

    if(isset($_GET["register"]) && $_GET["register"] == true){
        
        $suffix = $_GET["suffix"] ?? "null";

        if($suffix){
            $response = new PostController();
            $response->postRegister($table, $_POST, $suffix);
        }

    }else if(isset($_GET["login"]) && $_GET["login"] == true){

        $suffix = $_GET["suffix"] ?? "null";

        if($suffix){
            $response = new PostController();
            $response->postLogin($table, $_POST, $suffix);
        }

    }else{

        if(isset($_GET["token"])){

            $tableUser = $_GET["table"] ?? "instructors";
            $suffix = $_GET["suffix"] ?? "instructor";

            $response = new PostController();
            $validate = Connection::tokenValidate($_GET["token"], $tableUser, $suffix);
            
            switch($validate){

                case 'active':
                        return $response->postData($table, $_POST);
                    break;

                case 'expired':
                        $json = array('status' => 303, 'results' => 'Error, token has been expired!');
                        echo json_encode($json,http_response_code($json["status"]));
                    break;
            
                default :
                        $json = array('status' => 400, 'results' => 'Error, token invalid!');
                        echo json_encode($json,http_response_code($json["status"]));
                    break;
            }
  
        }else{
            $json = array('status' => 400, 'results' => 'Error, access denied!');
            echo json_encode($json,http_response_code($json["status"]));
        }

            
    }

