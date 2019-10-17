<?php 
$id= filter_input(INPUT_GET,'id');//ele vai recuperar as informações anteriores
$nome= filter_input(INPUT_GET,'nome');
$email= filter_input(INPUT_GET,'email');
$login= filter_input(INPUT_GET,'login');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar administrador</title>
</head>
<body>
    <form action="op_administrador.php" method="get" enctype="multipart/form-data">
      <fieldset>
        <legend>Alteração no administrador</legend>
        <div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <br>
        <div>
            <label for="">Nome</label>
            <input type="text" name="nome" value="<?php echo $id; ?>">
        </div>
        <br>
        <div>
            <label for="">email</label>
            <input type="text" name="email" value="<?php echo $id; ?>">
        </div>
        <br>
        <div>
            <label for="">login</label>
            <input type="text" name="login" value="<?php echo $id; ?>">
        </div>
        <div>
            <input type="submite" name="id" value="Registrar alteração">
        </div>

      </fieldset>
    </form>
</body>
</html>