<?php
if(isset($_POST['cadastro'])){
    require_once('conexao.php');
     $_POST['nome'];
     $_POST['email'];
     $_POST['login'];
     $_POST['senha'];
 );
 $adm->insert();
  
    header('location:principal.php?link=10&msg=ok');
}
?>