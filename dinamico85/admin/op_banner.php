<?php

require_once('../config.php');//mata! Aqui tem corage.
// Inserir administrador
if (isset($_POST['btn_cadastrar'])){
    $banner = new banner(
        $_POST['txt_banner_titulo'],
        $_POST['txt_banner_link'],
        $_POST['txt_banner_imagem'],
        $_POST['txt_banner_alt'],
        $_POST['check_ativo_banner']
    );
    $banner->insert();
    if($banner->getId_banner()!=null){
        header('location:principal.php?link=8&msg=ok');
    }
    else{ header('location:principal.php?link=8&msg=erro');}
}
// excluir/deletar Administrador
$id = filter_input(INPUT_GET,'id');
$excluir = filter_input(INPUT_GET,'excluir');
if(isset($id) && $excluir==1){
    $banner = new banner();
    $banner->setId_banner($id);
    $banner->delete();
    header('location:principal.php?link=9&msg=ok');
}


//Alterar o Administrador
if (isset($_POST['alterar'])){
    $bann = new banner();
    $bann->updatebanner($_POST['id_banner'],$_POST['titulo_banner'],$_POST['link_banner'],$_POST['img_banner'],$_POST['alt'],$_POST['banner_ativo']);
    header('location:principal.php?link=9&msg=ok'); 
}

?>