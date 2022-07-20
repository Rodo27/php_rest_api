<?php
    require_once "controllers/post.controller.php";
    
    $table = explode("?", $routesArray[2])[0];

    if(isset($_POST)){
        /*
        foreach(array_keys($_POST) as $key => $value)
            echo "<pre>$value</pre>";
        */

        $response = new PostController();
        $response->postData($table,$_POST);
        echo json_encode($response);

    }
        //echo json_encode($_POST);
        //echo json_encode(array("status" => 200, "result"=> 'Request ' . $_SERVER['REQUEST_METHOD']));
    ///else
       // echo json_encode(array("status" => 404, "result"=> ""));