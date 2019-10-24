<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Lista post</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table id="tb_post" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#fcfcfc">
        <tr bgcolor="#993300" align="center">
            <th width="10%" height="2"><font size="2" color="#fff">id_post</font></th>
            <th width="10%" height="2"><font size="2" color="#fff">id_categoria</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">titulo</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">descrição</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">imagem</font></th>
            <th width="10%" height="2"><font size="2" color="#fff">visitas</font></th>
            <th width="20%" height="2"><font size="2" color="#fff">data</font></th>
            <th width="15%" height="2"><font size="2" color="#fff">ativo</font></th>
            <th colspan="2"><font size="2" color="#fff">Opções</font></th>
        </tr>

        <?php 
            require_once('../config.php');
            $posts = post::getListPost();
            foreach($posts as $post){
        ?>
        <tr>
            <td><font size="2" face="verdana, arial" color="#0cc">
                <?php echo $post['id_post']; ?></font></td>
                <td><font size="2" face="verdana, arial" color="#0cc">
                <?php echo $post['id_categoria']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#cc0">
                <?php echo  $post['titulo_post']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $post['descricao_post']; ?></font></td>
            <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $post['img_post']; ?></font></td>
                <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $post['visitas']; ?></font></td>
                <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $post['data_post']; ?></font></td>
                <td><font size="2" face="verdana, arial" color="#c0c">
                <?php echo  $post['post_ativo']; ?></font></td>




            <td align="center"><font size="2" face="verdana, arial" color="#fff">
                <a href="<?php echo "alterar_post.php?id_noticia=".$post['id_post'].
                "&id_categoria=".$post['id_categoria']."&titulo_post=".$post['titulo_post']."&descricao_post=".$post['descricao_post']."&img_post=".$post['img_post']."&visitas=".$post['visitas']."&data_post=".$post['data_post']."&post_ativo=".$post['post_ativo'];?>">Alterar</a>
            </font></td>


            <td align="center"><font size="2" face="verdana, arial" color="#fff">
                <a href="<?php echo "op_post.php?excluir=1&id=".$post['id_post']; ?>">Excluir</a
            </font></td>
        </tr>




<?php } ?>
    </table>
</body>
</html>