<?php
    function Autoload($class){
        if(preg_match("/Controller$/", $class)){
            require("../src/controllers/" . $class . ".php");
        }
        else{
            require("../src/models/" . $class . ".php");
        }
    }

    spl_autoload_register("Autoload");
?>