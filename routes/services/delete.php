<?php
    require_once "controllers/delete.controller.php";

    $table = explode("?", $routesArray[2])[0];
    
    if(isset($_GET["id"]) && isset($_GET["nameId"])){

        $data = array(); 
        parse_str(file_get_contents('php://input'),$data);
        //echo json_encode($data);
        
        
        $response = new DeleteController();
        $response->deleteData($table, $_GET["id"], $_GET["nameId"]);   

    }
