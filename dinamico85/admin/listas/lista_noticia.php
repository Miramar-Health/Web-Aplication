<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista noticia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table id="tb_noticia" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#fcfcfc">
        <tr bgcolor="#993300" align="center">
            <th width="15%" height="2"><font size="2" color="#fff">id</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">id_categoria</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">titulo</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">imagem</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">visita</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">data</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">noticia</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">ativo</font></th>
            <th colspan="2"><font size="2" color="#fff">Opções</font></th>
        </tr>

        <?php 
            require_once('../config.php');
            $noticias = noticia::getListNoticia();
            foreach($noticias as $noticia){
        ?>
        <tr>
            <td><font size="2" face="verdana, arial" color="#0cc">
                <?php echo $noticia['id_noticia']; ?></font></td>
                <td><font size="2" face="verdana, arial" color="#0cc">
                <?php echo $noticia['id_categoria']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#cc0">
                <?php echo  $noticia['titulo_noticia']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $noticia['img_noticia']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $noticia['visita_noticia']; ?></font></td>
                <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $noticia['data_noticia']; ?></font></td>
                <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $noticia['noticia']; ?></font></td>
                <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $noticia['noticia_ativo']; ?></font></td>




            <td align="center"><font size="2" face="verdana, arial" color="#fff">
                <a href="<?php echo "alterar_noticia.php?id_noticia=".$noticia['id_noticia'].
                "&id_categoria=".$noticia['id_categoria']."&titulo_noticia=".$noticia['titulo_noticia']."&img_noticia=".$noticia['img_noticia']."&visita_noticia=".$noticia['visita_noticia']."&data_noticia=".$noticia['data_noticia']."&noticia=".$noticia['noticia']."&noticia_ativo=".$noticia['noticia_ativo'];?>">Alterar</a>
            </font></td>



            

            <td align="center"><font size="2" face="verdana, arial" color="#fff">
                <a href="<?php echo "op_noticia.php?excluir=1&id=".$noticia['id_noticia']; ?>">Excluir</a
            </font></td>
        </tr>




<?php } ?>
    </table>
</body>
</html>