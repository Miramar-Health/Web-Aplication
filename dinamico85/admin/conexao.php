<?php
//arquivo de conexao banco de dados no futuro classe
include_once('../config.php');

$cn = new PDO("mysql:host=".IP_SERVER_DB.";dbname=".NOME_BANCO,USER_DB,PASS_DB);
$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>