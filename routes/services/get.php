<?php
    require_once "controllers/get.controller.php";

    $table = explode("?", $routesArray[2])[0];

    $select = $_GET["select"] ?? "*";
    $orderBy = $_GET["orderBy"] ?? null;
    $orderMode = $_GET["orderMode"] ?? null;
    $startAt = $_GET["startAt"] ?? null;
    $endAt = $_GET["endAt"] ?? null;
    
    $response = new GetController();


    /* Request Types */
    
    if($table != "relations"){

        if(isset($_GET["linkTo"]) && isset($_GET["equalTo"]))
            $response->getDataFilter($table, $select, $_GET["linkTo"], $_GET["equalTo"], $orderBy, $orderMode, $startAt, $endAt);
        
        // Search Request
        if(isset($_GET["linkTo"]) && isset($_GET["search"]))
            $response->getDataSearch($table, $select, $_GET["linkTo"], $_GET["search"], $orderBy, $orderMode, $startAt, $endAt);

        else
            $response->getData($table, $select, $orderBy, $orderMode, $startAt, $endAt);

        
    }else{  /* Relations Request*/


        if(isset($_GET["rel"]) && isset($_GET["type"]) && $table == "relations" && !isset($_GET["linkTo"]) && !isset($_GET["equalTo"]))  
            $response->getRelationData($_GET["rel"], $_GET["type"], $select, $orderBy, $orderMode, $startAt, $endAt);

        if(isset($_GET["rel"]) && isset($_GET["type"]) && $table == "relations" && isset($_GET["linkTo"]) && isset($_GET["equalTo"]))
            $response->getRelationDataFilter($_GET["rel"], $_GET["type"], $select, $_GET["linkTo"], $_GET["equalTo"], $orderBy, $orderMode, $startAt, $endAt);
       
    }

    

    