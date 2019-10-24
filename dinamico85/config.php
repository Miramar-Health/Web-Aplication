<?php

if(lisset($_SESSION)){
    session_start();
}

date_default_timezone_set('America/Sao_paulo');

//inicia o carregamento das classes
spl_autoload_register(function($nome_classe){
    $nome_arquivo = "class".DIRECTORY_SEPARATOR.$nome_classe.".php";
    if(file_exists($nome_arquivo)){
        require_once($nome_arquivo);
    }
});

//servidor
define ('IP_SERVER_DB', '127.0.0.1');
define ('HOSTNAME','ITQ0586766W10-1');
define ('NOME_BANCO','dinamico85db');
define ('USER_DB','root');
define ('PASS_DB','');


?>