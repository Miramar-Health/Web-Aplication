<?php
$id= filter_input(INPUT_GET,'id_post');
$idCategoria= filter_input(INPUT_GET,'id_categoria');
$titulo= filter_input(INPUT_GET,'titulo_post');
$descricao= filter_input(INPUT_GET,'descricao_post');
$imagem= filter_input(INPUT_GET,'img_post');
$visitas= filter_input(INPUT_GET,'visitas');
$data= filter_input(INPUT_GET,'data_post');
$ativo= filter_input(INPUT_GET,'post_ativo');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alteração de noticia</title>
</head>
<body>
    <form action="op_post.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Alteração de noticia</legend>
            <div>
                <input type="hidden" name="id_post" value="<?php echo $id; ?>">
            </div>
            <div>
                <label for="">id categoria</label>
                <input type="text" name="id_categoria" value="<?php echo $idCategoria; ?>">
            </div>
            <div>
                <label for="">titulo</label>
                <input type="text" name="titulo_post" value="<?php echo $titulo; ?>">
            </div>
            <div>
                <label for="">imagem</label>
                <input type="text" name="descricao_post" value="<?php echo $descricao; ?>">
            </div>
            <div>
                <label for="">visita</label>
                <input type="text" name="img_post" value="<?php echo $imagem; ?>">
            </div>


            <div>
                <label for="">data</label>
                <input type="text" name="visitas" value="<?php echo $visitas; ?>">
            </div>
            <div>
                <label for="">noticia</label>
                <input type="text" name="data_post" value="<?php echo $data; ?>">
            </div>

            <div>
                <label for="">ativo</label>
                <input type="text" name="post_ativo" value="<?php echo $ativo; ?>">
            </div>

            <div>
                <input type="submit" name="alterar" value="Registrar Alteração">
            </div>
        </fieldset>
    </form>
</body>
</html>