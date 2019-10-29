<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista Administrador</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table id="tb_banner" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#fcfcfc">
        <tr bgcolor="#993300" align="center">
            <th width="15%" height="2"><font size="2" color="#fff">id</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">titulo</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">link</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">imagem</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">alt</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">ativo</font></th>
            <th colspan="2"><font size="2" color="#fff">Opções</font></th>
        </tr>

        <?php 
            require_once('../config.php');
            $banners = banner::getListBanner();
            foreach($banners as $banner){
        ?>
        <tr>
            <td><font size="2" face="verdana, arial" color="#0cc">
                <?php echo $banner['id_banner']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#cc0">
                <?php echo  $banner['titulo_banner']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $banner['link_banner']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $banner['img_banner']; ?></font></td>
                <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $banner['alt']; ?></font></td>
                <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $banner['banner_ativo']; ?></font></td>

            <td align="center"><font size="2" face="verdana, arial" color="#fff">
                <a href="<?php echo "alterar_banner.php?id_banner=".$banner['id_banner'].
                "&titulo_banner=".$banner['titulo_banner']."&link_banner=".$banner['link_banner']."&img_banner=".$banner['img_banner']."&alt=".$banner['alt']."&banner_ativo=".$banner['banner_ativo'];?>">Alterar</a>
            </font></td>


            <td align="center"><font size="2" face="verdana, arial" color="#fff">
                <a href="<?php echo "op_banner.php?excluir=1&id=".$banner['id_banner']; ?>">Excluir</a
            </font></td>
        </tr>




<?php } ?>
    </table>
</body>
</html>