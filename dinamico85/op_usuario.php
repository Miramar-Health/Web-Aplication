<?php

//inicializar a sessão de usuário
if (!isset($_SESSION)){
    session_start();
}

//definindo padrão de Zona GMT (TimeZone) -3,00
date_default_timezone_set('America/Sao_Paulo');

//inicia carregamento das classes do projeto

spl_autoload_register(function($nome_classe){
    $server_str = $_SERVER['REQUEST_URI'];
    $caminho = (strpos($server_str,'admin') !==false)?'class':'admin\class';
    $nome_arquivo = $caminho.DIRECTORY_SEPARATOR.$nome_classe.".php";

    if(file_exists($nome_arquivo)){
        require_once($nome_arquivo);

    }
});
if(isset($_POST['cadastro_usuario'])){
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $foto=$_FILES['foto'];
    if(!empty($foto['name'])){
        $largura = LARGURA_IMG;
        $altura = 425;
        $tamanho = 300000;
        $error = array();
        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/",$foto['type'])){
            $error[1] = "Este arquivo não é uma imagem";
        } 
        $dimensoes = getimagesize($foto['tmp_name']);
        if($dimensoes[0]>$largura){
            $error[2] = "A largura da imagem (".$dimensoes[0]." pixels) é maior que a suportada (".$largura." pixels).";
        }
        $dimensoes = getimagesize($foto['tmp_name']);
        if($dimensoes[1]>$altura){
            $error[3] = "A altura da imagem (".$dimensoes[1]." pixel) é maior que a suportada (".$altura." pixel).";
        }
        if($foto['size']>$tamanho){
            $error[4] = "O tamanho da imagem (".$foto['size']." bytes) é maior que a suportada (".$tamanho." bytes).";
        }

        if(count($error)==0){
            preg_match("/\.(gif|bmp|png|jpg){1}$/i",$foto['name'],$ext);
            $nome_img = md5(uniqid(time())).$ext[0];
            $caminho_img = "foto/".$nome_img;
            move_uploaded_file($foto['tmp_name'],$caminho_img);
        }

        $imagem_info = array();
        $imagem_info[0] = $nome_img;
        $imagem_info[1] = $error;
        return $imagem_info;

    }
}
function upload_imagem()
{
    $foto=$_FILES['foto'];
    if(!empty($foto['name'])){
        $largura = 640;
        $altura = 425;
        $tamanho = 300000;
        $error = array();
        if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/",$foto['type'])){
            $error[1] = "Este arquivo não é uma imagem";
        } 
        $dimensoes = getimagesize($foto['tmp_name']);
        if($dimensoes[0]>$largura){
            $error[2] = "A largura da imagem (".$dimensoes[0]." pixels) é maior que a suportada (".$largura." pixels).";
        }
        $dimensoes = getimagesize($foto['tmp_name']);
        if($dimensoes[1]>$altura){
            $error[3] = "A altura da imagem (".$dimensoes[1]." pixel) é maior que a suportada (".$altura." pixel).";
        }
        if($foto['size']>$tamanho){
            $error[4] = "O tamanho da imagem (".$foto['size']." bytes) é maior que a suportada (".$tamanho." bytes).";
        }

        if(count($error)==0){
            preg_match("/\.(gif|bmp|png|jpg){1}$/i",$foto['name'],$ext);
            $nome_img = md5(uniqid(time())).$ext[0];
            $caminho_img = "admin/foto/".$nome_img;
            move_uploaded_file($foto['tmp_name'],$caminho_img);
        }

        $imagem_info = array();
        $imagem_info[0] = $nome_img;
        $imagem_info[1] = $error;
        return $imagem_info;

    }

}

//Criar constantes do servidor de banco de dados
define ('IP_SERVER_DB', '127.0.0.1');
define ('NOME_BANCO','dinamico85db');
define ('USER_DB','root');
define ('PASS_DB','usbw');
?>