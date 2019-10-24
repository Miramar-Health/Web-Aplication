<?php
$titulo_banner= filter_input(INPUT_GET,'titulo_banner');
$link_banner= filter_input(INPUT_GET,'link_banner');
$img_banner= filter_input(INPUT_GET,'img_banner');
$alt_banner= filter_input(INPUT_GET,'alt_banner');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Banner</title>
</head>
<body>
    <form action="op_banner.php" method="get" enctype="multipart/form-data">
    <fieldset>
        <legend>Alteração do Banner</legend>
        <div>
            <input type="hidden" name="titulo_banner" value="<?php echo $titulo_banner; ?>">
        </div>
        <div>
            <label for="Titulo"></label>
            <input type="text" name="nome" value="<?php echo $titulo_banner?>">
        </div>
        <div>
            <label for="Link"></label>
            <input type="text" name="Link" value="<?php echo $link_banner?>">
        </div>
        <div>
            <label for="Imagem"></label>
            <input type="text" name="img" value="<?php echo $img_banner?>">
        </div>
        <div>
            <label for="Alterar"></label>
            <input type="text" name="Alterar" value="<?php echo $alt_banner?>">
        </div>
    </fieldset>
    </form>
</body>
</html>