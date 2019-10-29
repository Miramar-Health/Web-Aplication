<?php

require_once('../config.php');//mata! Aqui tem corage.
// Inserir noticia
if (isset($_POST['btn_cadastrar'])){
    $image=upload_imagem();
    $noticia = new noticia(0,
        $_POST['categoria'],
        $_POST['noticia_titulo'],
        $image[0],
        $_POST['noticia_visita'],
        $_POST['noticia_data'],
        isset($_POST['ativo_noticia'])? 's':'n',
        $_POST['noticia']
       
    );
    var_dump($noticia);
    $noticia->insert();
    if($noticia->get_Id_noticia()!=null){
        header('location:principal.php?link=6&msg=ok');
    }
    else{ header('location:principal.php?link=6&msg=erro'  );
    }
  
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
    isset($_POST['noticia_ativo'])? 's':'n',
    $_POST['noticia']);
  
    header('location:principal.php?link=7&msg=ok'); 
}

$not = new $noticia();
if(isset($_POST['inserir'])){
    $not->idCategoria = $_POST['categoria'];
}



?>