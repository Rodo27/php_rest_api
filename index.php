<?php 
    
    /* Show errors */

    ini_set("display_errors",1);
    ini_set("log_errors",1);
    ini_set("error_log","C:/xampp/htdocs/php_rest_api/php_error_log");

    /* requiments */

    require_once "models/connection.php";

    
    print_r(Connection::connect());


    return;

    require_once "controllers/routes.controller.php";

    $index = new RoutesController();
    $index->index();
