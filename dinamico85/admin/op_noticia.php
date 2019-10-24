<?php

require_once('../config.php');//mata! Aqui tem corage.
// Inserir noticia
if (isset($_POST['btn_cadastrar'])){
    $noticia = new noticia(
        $_POST['categoria'],
        $_POST['txt_noticia_titulo'],
        $_POST['txt_noticia_img'],
        $_POST['txt_noticia_visita'],
        $_POST['txt_noticia_data'],
        isset($_POST['check_ativo_noticia'])? 's':'n',
        $_POST['txt_noticia']
       
    );
    $noticia->insert();
    if($noticia->get_Id_noticia()!=null){
        header('location:principal.php?link=6&msg=ok');
    }
    else{ header('location:principal.php?link=6&msg=erro');}
}




// excluir/deletar noticia
$id = filter_input(INPUT_GET,'id');
$excluir = filter_input(INPUT_GET,'excluir');
if(isset($id) && $excluir==1){
    $noticia = new noticia();
    $noticia->set_Id_noticia($id);
    $noticia->delete();
    header('location:principal.php?link=7&msg=ok');
}


//Alterar a noticia
if (isset($_POST['alterar'])){
    $noticia = new noticia();
    $noticia->update($_POST['id_noticia'],
    $_POST['id_categoria'],
    $_POST['titulo_noticia'],
    $_POST['img_noticia'],
    $_POST['visita_noticia'],
    $_POST['data_noticia'],
    $_POST['noticia'],
    $_POST['noticia_ativo']);
    header('location:principal.php?link=7&msg=ok'); 
}

$not = new $noticia();
if(isset($_POST['inserir'])){
    $not->idCategoria = $_POST['categoria'];
}



?>