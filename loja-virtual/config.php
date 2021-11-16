<?php
session_start();
define("DATABASE",["host"=>"LocalHost","dbname"=>"loja-virtual","username"=>"root","password"=>""]);
define("MODE","sandbox");
define("EMAIL","Aqui vai seu email da sua conta pagseguro");
define("TOKEN","Aqui vai o token da sua conta pagseguro");
if(MODE == "sandbox"){  //Caso queira trocar o local de processo e so botar no lugar de sanbox o nome producao.
    define("URL_WS","https://ws.sandbox.pagseguro.uol.com.br/");
    define("URL","https://stc.sandbox.pagseguro.uol.com.br/");
}else if(MODE == "producao"){
    define("URL_WS","https://ws.pagseguro.uol.com.br/");
    define("URL","https://stc.pagseguro.uol.com.br/");
}
define("INCLUDE_PATH","http://localhost/loja-virtual/");
$loader = function($class){
    include("assets/classes/".$class.".php");
};
spl_autoload_register($loader);