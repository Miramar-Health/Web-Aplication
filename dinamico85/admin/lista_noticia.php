<!DOCTYPE html>
<html lang="pr-br">
<head>
    <title>Lista Noticia</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table id="tb_noticia" width="100%" border="0" cellpadding="0" cellspacing="1" bgcolor="#fcfcfc">
        <tr bgcolor="#993300" align="center">
          <th width="15%" height="2"><font size="2" color="#fff">Código</th>
          <th width="60%" height="2"><font size="2" color="#fff">Noticia</th>
          <th width="15%" height="2"><font size="2" color="#fff">Código</th>
          <th width="2"><font size="2" color="#fff">Opçoes</th>
        </tr>

    <?php
    foreach($noticias_retornadas as $noticia){
    ?>
           <tr>
            <td <font size="2" face="verdana, arial" color="#0cc">
                <?php echo $noticia['id_noticia']; ?></font></td>
            <td <font size="2" face="verdana, arial" color="#cc0">
                <?php echo $noticia['noticia']; ?></font></td>
            <td <font size="2" face="verdana, arial" color="#c0c">
                <?php echo $noticia['cat_ativo']=='1'?'Sim':'Não'; ?></font></td>
            <td align="center"><font size="2" face="verdana, arial" color="#fff"><a href="principal.php?link=">Alterar</a></font></td>
            <td align="center"><font size="2" face="verdana, arial" color="#fff"><a href="principal.php?link=">Excluir</a></font></td>
        </tr>
<?php } ?>
    </table>
    
</body>
</html>