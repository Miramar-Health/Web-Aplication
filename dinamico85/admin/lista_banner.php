<?php
include_once('../config.php');
$query = "select * from banner";
$cmd = $cn->prepare($query);
$cmd->execute();
$banner_retornadas = $cmd->fetchAll(PDO::FETCH_ASSOC);
if(count($banner_retornadas)>0){
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista banner</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table id="tb_banner" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#fcfcfc">
        <tr bgcolor="#993300" align="center">
            <th width="15%" height="2"><font size="2" color="#fff">Código</font></th>
            <th width="60%" height="2"><font size="2" color="#fff">Titulo</font></th>
            <th width="60%" height="2"><font size="2" color="#fff">Link</font></th>
            <th width="60%" height="2"><font size="2" color="#fff">imagem</font></th>
            <th width="60%" height="2"><font size="2" color="#fff">Alt</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">Ativo</font></th>
            <th colspan="2"><font size="2" color="#fff">Opções</font></th>
        </tr>
        <?php 
           foreach($banner_retornadas as $banner){
        ?>
        <tr>
            <td><font size="2" face="verdana, arial" color="#0cc"><?php echo $banner['id_banner']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#cc0"><?php echo $banner['titulo_banner']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#cc0"><?php echo $banner['link_banner']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#cc0"><?php echo $banner['img_banner']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#cc0"><?php echo $banner['alt']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c"><?php echo $banner['banner_ativo']=='1'?'Sim':'Não'; ?></font></td>
            <td align="center"><font size="2" face="verdana, arial" color="#fff"><a href="principal.php?link=">Alterar</a></font></td>
            <a href=""<?php echo"alterar_banner.php?id=".$banner['banner']."&nome=".$banner['nome']."&login=".banner['login']?>></a>
            <td align="center"><font size="2" face="verdana, arial" color="#fff"><a href="principal.php?link=">Excluir</a></font></td>
        </tr>
<?php }} ?>
    </table> 
</body>
</html>