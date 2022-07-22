<?php
    require_once "controllers/post.controller.php";
    
    $table = explode("?", $routesArray[2])[0];

    if(isset($_POST)){

        $response = new PostController();
        $response->postData($table,$_POST);   
    }