<?php

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="formulario-menor">
        <form action="op_administrador.php" method="post">
            <fieldset>
                <input type="hidden" id="id" name="id">
                <label for="">Nome</label>
                <input typeg="text" name="nome" required>
                <br>
                <label for="">Email</label>
                <input type="text" name="Email" required>
                <br>
                <label for="">Login</label>
                <input type="text" name="Login" required>
                <br>
                <label for="">Senha</label>
                <input type="text" name="Senha" required>
                <br>
                <label for="">Confirma Senha</label>
                <input type="password" name="confirma_senha">
            </fieldset>
        </form>
    </div>
</body>
</html>