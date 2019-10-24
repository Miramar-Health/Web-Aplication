<?php 
 $id_post= filter_input(INPUT_GET,'id_post');
 $id_categoria= filter_input(INPUT_GET,'id_categoria');
 $descricao_post= filter_input(INPUT_GET,'descricao_post');
 $img_post= filter_input(INPUT_GET,'img_post');
 $visitas= filter_input(INPUT_GET, 'visitas');
 $data_post= filter_input(INPUT_GET,'data_post');
 $post_ativo= filter_input(INPUT_GET,'post_ativo');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar post</title>
</head>
<body>
    <form action="op_post.php" method="get" enctype="multipart/form-data"></form>
    <fieldset>
        <legend>Alterar o Post </legend>
        <div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <br>
        <div>
            <label for="categoria"></label>
            <input type="text" name="Categoria" value="<?php echo $id_categoria;?>">
        </div>
           <br>
        <div>
             <label for="descrição"></label>
             <input type="text" name="Descrição" value="<? echo $descricao_post;?>">
        </div>
        <br>
        <div>
            <label for="imagem"></label>
            <input type="text" name="imagem" value="<?php echo $img_post;?>">
        </div>
        <br>
        <div>
            <label for="visitas"></label>
            <input type="text" name="visitas" value="<?php echo $visitas;?>">
        </div>
        <br>
        <div>
            <label for="data"></label>
            <input type="text" name="Data" value="<?php echo $data_post;?>">
        </div>
        <br>
        <div>
            <label for="post ativo"></label>
            <input type="text" name="Ativo" value="<?php echo $post_ativo;?>">
        </div>
    </fieldset>
</body>
</html>