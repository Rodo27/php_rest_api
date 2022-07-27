<?php
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

    }

