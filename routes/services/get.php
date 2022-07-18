<?php
    require_once "controllers/get_controller.php";

    $table = explode("?", $routesArray[2])[0];

    $select = $_GET["select"] ?? "*";
    
    $response = new GetController();

    //$linkTo = isset($_GET["linkTo"]) ? $_GET["linkTo"] : false;
    //$equalTo = isset($_GET["equalTo"]) ? $_GET["equalTo"] : false;
    //if($linkTo && $equalTo)

    /* Filter request */
    if(isset($_GET["linkTo"]) && isset($_GET["equalTo"]))
    $response->getDataFilter($table, $select, $_GET["linkTo"], $_GET["equalTo"] );    
    else
        $response->getData($table,$select);
    