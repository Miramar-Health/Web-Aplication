<?php
$id= filter_input(INPUT_GET,'id_banner');
$titulo= filter_input(INPUT_GET,'titulo_banner');
$link= filter_input(INPUT_GET,'link_banner');
$img= filter_input(INPUT_GET,'img_banner');
$alt= filter_input(INPUT_GET,'alt');
$ativo= filter_input(INPUT_GET,'banner_ativo');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alteração de banner</title>
</head>
<body>
    <form action="op_banner.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Alteração de banner</legend>
            <div>
                <input type="hidden" name="id_banner" value="<?php echo $id; ?>">
            </div>
            <div>
                <label for="">titulo</label>
                <input type="text" name="titulo_banner" value="<?php echo $titulo; ?>">
            </div>
            <div>
                <label for="">link</label>
                <input type="text" name="link_banner" value="<?php echo $link; ?>">
            </div>
            <div>
                <label for="">imagem</label>
                <input type="text" name="img_banner" value="<?php echo $img; ?>">
            </div>
            <div>
                <label for="">alt</label>
                <input type="text" name="alt" value="<?php echo $alt; ?>">
            </div>

            <div>
                <label for="">ativo</label>
                <input type="text" name="banner_ativo" value="<?php echo $ativo; ?>">
            </div>

            <div>
                <input type="submit" name="alterar" value="Registrar Alteração">
            </div>
        </fieldset>
    </form>
</body>
</html>