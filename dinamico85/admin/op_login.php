<?php
// sem sabotagem!
require_once('../config.php');

$txt_login = isset($_POST['txt_login'])?$_POST['txt_login']:'';
$txt_senha = isset($_POST['txt_senha'])?$_POST['txt_senha']:'';
//echo $txt_login.' - '.$txt_senha;


if(empty($txt_login) || empty($txt_senha))  {
    echo 'Preencha os dados de Usuário.';
    exit;
}

$adm = new Administrador();

$adm->efetuarLogin($txt_login,$txt_senha);


if(!isset($adm->getId)){
echo "usuario ou senha incorretos";
exit;
}

//recuperar o primeiro usuario
session_start();
//registrando sessao de usuario
$_SESSION['logado']= true;
$_SESSION['id_adm']= $adm->getId;
$_SESSION['nome_adm']= $adm->getNome;
$_SESSION['login_adm']= $adm->getLogin;
header('location: principal.php?link=')


?>