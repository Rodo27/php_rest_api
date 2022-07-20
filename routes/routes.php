<?php

$routesArray = explode("/", $_SERVER['REQUEST_URI']);
$routesArray = array_filter($routesArray);

if(count($routesArray) == 1 ){
    $json = array(
        'status' => 404,
        'result' => 'error'
    );
    
    echo json_encode($json,http_response_code($json["status"]));
    
    return;
    
}

if(count($routesArray) > 1 && isset($_SERVER['REQUEST_METHOD'])){

    $json = array('status' => 200,'result' => '');

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            include "services/get.php";
            break;
    
        case 'POST':
            include "services/post.php";
            break;  
            
        case 'PUT':
            $json['result'] = 'Request ' . $_SERVER['REQUEST_METHOD'];
            break;

        case 'DELETE':
            $json['result'] = 'Request ' . $_SERVER['REQUEST_METHOD'];
            break;
        
        default:
            $json['result'] = 'Request ' . $_SERVER['REQUEST_METHOD'];
            break;
    }

    //echo json_encode($json,http_response_code($json["status"]));   
}