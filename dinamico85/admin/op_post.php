<?php

require_once('../config.php');
// Inserir post
if (isset($_POST['btn_cadastrar'])){
    $post = new post(
        $_POST['categoria'],
        $_POST['txt_post_titulo'],
        $_POST['txt_post_descricao'],
        $_POST['txt_post_img'],
        $_POST['txt_post_visitas'],
        $_POST['txt_post_data'],
        isset($_POST['check_ativo_post'])? 's':'n'
       
    );
    $post->insert();
    if($post->get_Id_post()!=null){
        header('location:principal.php?link=4&msg=ok');
    }
    else{ header('location:principal.php?link=4&msg=erro');}
}






// excluir/deletar post
$id = filter_input(INPUT_GET,'id');
$excluir = filter_input(INPUT_GET,'excluir');
if(isset($id) && $excluir==1){
    $post = new post();
    $post->set_Id_post($id);
    $post->delete();
    header('location:principal.php?link=5&msg=ok');
}





//Alterar post
if (isset($_POST['alterar'])){
    $post = new post();
    $post->update($_POST['id_post'], $_POST['id_categoria'],
    $_POST['titulo_post'],
    $_POST['descricao_post'],
    $_POST['img_post'],
    $_POST['visitas'],
    $_POST['data_post'],
    $_POST['post_ativo']);
    header('location:principal.php?link=5&msg=ok'); 
}

?>