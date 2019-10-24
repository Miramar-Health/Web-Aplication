<?php
require_once('../config.php');
require_once('conexao.php');
$txt_login = isset($_POST['txt_login'])?$_POST['txt_login']:'';
$txt_senha = isset($_POST['txt_senha'])?$_POST['txt_senha']:'';

if (empty($txt_login) || empty($txt_senha)) {
    echo 'preencha os dados de usuarios';
    exit;
}
$adm = new Administrador();

$adm->login($txt_login,$txt_senha);
if (!isset($adm->)) {
    echo 'Usuario ou Senha do Usuario'
    exit;
}


$_SESSION
$query = "SELECT * FROM administrador WHERE login= :login AND senha = :senha";
$cmd = $cn->prepare($query);
$cmd->bindParam(':login',$txt_login);
$cmd->bindParam(':senha',$txt_senha);
$cmd->execute();
$usuario_retornado = $cmd->fetchAll(PDO::FETCH_ASSOC);
if(count($usuario_retornado)>0){
    print "<script type='text/javascript'>location.href='principal</script>";
}
else{
    print "META HTTP-EQUIV=REFRESH CONTENT = '0'; URL=index.php'>
    <script type='text/javascript'>window.alert('login ou senha incorreta, tente novamente')</script>";}

?>
