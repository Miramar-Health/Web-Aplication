<?php
    if(isset($_POST['txt_banner'])){
        require_once('conexao.php');
        $titulo_banner = $_POST['txt_titulo_banner'];
        $ativo = isset($_POST['banner_ativo'])?'1':'0';
        $link_banner= $_POST['txt_link_banner'];
        $img_banner= $_POST['txt_imagem_banner'];
        $alt_banner= $_POST['txt_alt_banner'];
        $cmd = $cn->prepare("INSERT INTO banner(banner, banner_ativo)
        VALUES (:banner, :ativ)");
        $cmd->execute(array(
            ':banner'=>$banner,
            ':ativ'=>$ativo
        ));
        header('location:principal.php?link=2msg=ok');
    }
function listar_banner(){
    require_once('conexao.php');
    $query = "select * from banner";
    $cmd = $cn->prepare($query); 
    $cmd->execute();
    return $cmd->fetchAll(PDO::FETCH_ASSOC);
}
?>