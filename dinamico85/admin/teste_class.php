<?php
require_once("../config.php");
$admin = Administrador::getList();//entrega a lista com os adms //admin retorna uma matriz associativa
foreach($admins as $admin){
    $admin['id']." - ".$admin['nome']."<br>";
}

$adm = new Administrador('edinho', 'edinho','123456');//adicionando +1 adm
?>


<?php

?>function listar_banner(){
    require_once('conexao.php');
    $query = "select * from banner";
    $cmd = $cn->prepare($query); 
    $cmd->execute();
    return $cmd->fetchAll(PDO::FETCH_ASSOC);
}