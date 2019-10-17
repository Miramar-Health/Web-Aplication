<?php

    $id_noticia= filter_input(INPUT_GET,'id_noticia');
    $id_categoria= filter_input(INPUT_GET,'id_categoria');
    $titulo_noticia= filter_input(INPUT_GET,'titulo_noticia');
    $img_noticia= filter_input(INPUT_GET,'img_noticia');
    $visita_noticia= filter_input(INPUT_GET,'visita_noticia');
    $data_noticia= filter_input(INPUT_GET,'data_noticia');
    $noticia_ativo= filter_input(INPUT_GET,'noticia_ativo');
    $noticia= filter_input(INPUT_GET,'noticia');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>alterar noticia</title>
</head>
<body>
    <form action="op_noticia.php" method="get" enctype="multipart/form-data">
    <fieldset>
        <legend>Alterar noticia</legend>
        <div>          
            <input type="hidden" name="id" value="<?php echo $id_noticia?>">
        </div>
        <div>
            <label for="">Categoria</label>
            <input type="text" name="categorias" value="<?php echo $id_categoria?>">
        </div>
        <div>
            <label for="Titulo"></label>
            <input type="text" name="titulo" value="<?php echo $titulo_noticia?>">
        </div>
        <div>
            <label for="imagem"></label>
            <input type="text" name="imagem" value="<?php echo $img_noticia?>">
        </div>
        <div>
            <label for="visita"></label>
            <input type="text" name="visita" value="<?php echo $visita_noticia?>">
        </div>
        <div>
            <label for="data"></label>
            <input type="text" name="data" value="<?php echo $data_noticia?>">
        </div>
        <div>
             <label for="Noticia Ativo"></label>
             <input type="text" name="noticia ativo" value="<?php echo $noticia_ativo?>">
        </div>
        <div>
            <label for="noticia"></label>
            <input type="text" name="noticia" value="<?php echo $noticia?>">
        </div>
    </fieldset>
    </form>
</body>
</html>