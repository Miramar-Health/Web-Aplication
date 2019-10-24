<?php

require_once('../config.php');//mata! Aqui tem corage.
// Inserir administrador
if (isset($_POST['cadastro'])){
    $adm = new Administrador(
        $_POST['nome'],
        $_POST['email'],
        $_POST['login'],
        $_POST['senha']
    );
    $adm->insert();
    if($adm->getId()!=null){
        header('location:principal.php?link=10&msg=ok');
    }
    else{ header('location:principal.php?link=10&msg=erro');}
}
// excluir/deletar Administrador
$id = filter_input(INPUT_GET,'id');
$excluir = filter_input(INPUT_GET,'excluir');
if(isset($id) && $excluir==1){
    $admin = new Administrador();
    $admin->setId($id);
    $admin->delete();
    header('location:principal.php?link=10&msg=ok');
}

//Alterarando o administrador
if (isset($_POST['alterar'])){
    $adm = new Administrador();
    $adm->update($_POST['id'],$_POST['nome'],$_POST['email'],$_POST['login']);
    header('location:principal.php?link=10&msg=ok');    
}

if(isset($_POST['txt_login'])&&isset($_POST['logar'])){
$txt_login = isset($_POST['txt_login'])?$_POST['txt_login']:'';
$txt_senha = isset($_POST['txt_senha'])?$_POST['txt_senha']:'';
//echo $txt_login.' - '.$txt_senha;
if(empty($txt_login) || empty($txt_senha))  {

    header('location: index.php?msg=preencha os dados de usuario');
    exit;
}
$adm = new Administrador();

$adm->efetuarLogin($txt_login,$txt_senha);
if(($adm->getId()==null)){

    header('location: index.php?msg=usuario ou senha invalidos');
exit;
}
//registrando sessao de usuario
$_SESSION['logado']= true;
$_SESSION['id_adm']= $adm->getId();
$_SESSION['nome_adm']= $adm->getNome();
$_SESSION['login_adm']= $adm->getLogin();
header('location: principal.php?link=');
}
// encerrando a sessao

if($_GET['sair']){
$_SESSION['logado']= false;
$_SESSION['id_adm']= null;
$_SESSION['nome_adm']= null;
$_SESSION['login_adm']= null;
header('location:index.php');
}
?>