<?php
    mb_internal_encoding("UTF-8");
    require("../src/autoloader.php");
    
    $router_controller = new RouterController();
    $router_controller->Process([$_SERVER["REQUEST_URI"]]);
    $router_controller->PrintView();
?>