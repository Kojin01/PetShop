<?php
session_start();
define("INCLUDE_PATH","http://localhost/loja-virtual/");
$loader = function($class){
    include("assets/classes/".$class.".php");
};
spl_autoload_register($loader);