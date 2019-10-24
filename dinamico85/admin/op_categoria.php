<?php
if(isset($_POST['txt_categoria'])){
    require_once('conexao.php');
    $categoria = $_POST['txt_categoria'];
    $ativo = isset($_POST['check_ativo'])?'1':'0';
    $cmd = $cn->prepare("INSERT INTO categoria (categoria, cat_ativo) 
    VALUES (:cat, :ativ)");
    $cmd->execute(array(
        ':cat'=>$categoria,
        ':ativ'=>$ativo
    ));
    header('location:principal.php?link=2&msg=ok');
}
?>