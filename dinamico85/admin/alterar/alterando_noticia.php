<?php
$id= filter_input(INPUT_GET,'id_noticia');
$idCategoria= filter_input(INPUT_GET,'id_categoria');
$titulo= filter_input(INPUT_GET,'titulo_noticia');
$img= filter_input(INPUT_GET,'img_noticia');
$visita= filter_input(INPUT_GET,'visita_noticia');
$data= filter_input(INPUT_GET,'data_noticia');
$ativo= filter_input(INPUT_GET,'noticia_ativo');
$noticia= filter_input(INPUT_GET,'noticia');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alteração de noticia</title>
</head>
<body>
    <form action="op_noticia.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Alteração de noticia</legend>
            <div>
                <input type="hidden" name="id_noticia" value="<?php echo $id; ?>">
            </div>
            <div>
                <label for="">id categoria</label>
                <input type="text" name="id_categoria" value="<?php echo $idCategoria; ?>">
            </div>
            <div>
                <label for="">titulo</label>
                <input type="text" name="titulo_noticia" value="<?php echo $titulo; ?>">
            </div>
            <div>
                <label for="">imagem</label>
                <input type="file" name="img_noticia" value="<?php echo $img; ?>">
            </div>
            <div>
                <label for="">visita</label>
                <input type="text" name="visita_noticia" value="<?php echo $visita; ?>">
            </div>


            <div>
                <label for="">data</label>
                <input type="text" name="data_noticia" value="<?php echo $data; ?>">
            </div>
            <div>
                <label for="">noticia</label>
                <input type="text" name="noticia" value="<?php echo $noticia; ?>">
            </div>

            <div>
                <label for="">ativo</label>
                <input type="checkbox" name="noticia_ativo" value="<?php echo $ativo; ?>">
            </div>

            <div>
                <input type="submit" name="alterar" value="Registrar Alteração">
            </div>
        </fieldset>
    </form>
</body>
</html>