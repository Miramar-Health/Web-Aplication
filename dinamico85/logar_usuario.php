
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>area de login de usuario</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div id="box-login">
        <div id="formulario-login">
            <form id="frmlogin" name="frmlogin" action="op_usuario.php" method="post">
                <fieldset>
                    <legend>Faça Login - area do usuario</legend>
                    <label for=""><span>Login</span></label>
                    <input type="text" name="txt_login_usuario" id="txt_login_usuario">

                    <label for=""><span>Senha</span></label>
                    <input type="password" name="txt_senha_usuario" id="txt_senha_usuario">

                    <input type="submit" name="logar_usuario" id="logar_usuario" value="logar_usuario" class="botao">
                    <br>
                    <span><?php echo (isset($_GET['msg']))?$_GET['msg']:"";?></span>

                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>