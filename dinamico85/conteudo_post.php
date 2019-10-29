<?php
require_once('config.php');
if(isset($_SESSION['logado'])){
    if(isset($_SESSION['logado'])){
        $id = $_SESSION['id_post'];
        $post = new post();
        $_SESSION['id_post']=null;
        $post->loadById_post($id);
        if ($post->get_Id_post()>0){
        $post->updateVisita($id);
        ?>
        <h1><?php echo $post->get_TituloPost();?></h1>
        <br>
        <h3><?php echo $post->get_DataPost();?></h3>
        <br>
        <h4><?php echo $post->get_Visitas();?></h4>
        <br>
        <img src="admin/foto/<?php echo $post->get_ImgPost();?>" alt="noticia" width="640" height="425">
        <p><h3><?php  echo $post->get_DescricaoPost();?></h3></p>
        <?php
        }}       
}
else{
    header('location:logar_usuario.php');
}
?>
