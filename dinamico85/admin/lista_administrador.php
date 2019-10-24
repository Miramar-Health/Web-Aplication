<?php
require_once('conexao.php');
$query = "select * from administrador";
$cmd = $cn->prepare($query); //PDO
$cmd->execute();
$admins_retornadas = $cmd->fetchAll(PDO::FETCH_ASSOC);
if(count($admins_retornadas)>0){
    //print_r($categorias_retornadas);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista Categoria</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table id="tb_banner" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#fcfcfc">
        <tr bgcolor="#993300" align="center">
            <th width="20%" height="2"><font size="2" color="#fff">Id</font></th>
            <th width="20%" height="2"><font size="2" color="#fff">nome</font></th>
            <th width="20%" height="2"><font size="2" color="#fff">email</font></th>
            <th width="20%" height="2"><font size="2" color="#fff">login</font></th>
            <th width="60%" height="2"><font size="2" color="#fff">senha</font></th>
            <th colspan="2"><font size="2" color="#fff">Opções</font></th>
        </tr>
        <?php 
           foreach($admins_retornadas as $admins){
        ?>
        <tr>
            <td><font size="2" face="verdana, arial" color="#0cc"><?php echo $admins['id']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#cc0"><?php echo $admins['nome']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#0cc"><?php echo $admins['email']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#0cc"><?php echo $admins['login']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#0cc"><?php echo $admins['senha']; ?></font></td>
            <th colspan="2"><font size="2" color="#fff">Opções</font></th>
            <td align="center"><font size="2" face="verdana, arial" color="#fff"><a href="principal.php?link=">Alterar</a></font></td>
             <a href=""<?php echo"alterar_administrativa.php?id=".$adm['id']."&nome=".$adm['nome']."&email=".$adm['email']."&login=".$adm['login'];?>">Alterar</a>
            <td align="center"><font size="2" face="verdana, arial" color="#fff"><a href="principal.php?Link=">Excluir</a></font></td>
            <a href=""<?php echo"alterar_admistrativa.php?excluir=1&id=".$adm['id']."&nome=".$adm['nome']."&email=".$adm['email']."&login=".$adm['login'];?>">Alterar</a>

        </tr>
<?php }} ?>
    </table>
    
</body>
</html>