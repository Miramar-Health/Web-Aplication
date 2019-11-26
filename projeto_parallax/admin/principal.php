<!-- <i?php 

require_once("config.php");
if(!$_SESSION['logado']){
    header('location: index.html');
}
?> -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Adminstrativa - parallax</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="principal">
        <div id="cabecalho">
            <div id="titulo_topo">
                <img src="img/a-admin.png" alt="">
                <br>
                <p>(<a href="op_admin.php?sair=true">sair</a>) - <?php  echo $_SESSION['nome_adm'];?></p>
            </div>
        </div> <!-- final do cabeçalho -->
        <div id="corpo">
            <div id="esquerdo">
                <div id="sessao">Categoria
                    <ul>
                        <li><a href="principal.php?link=2">Cadastrar</a></li>
                        <li><a href="principal.php?link=3">Editar</a></li>
                    </ul>
                </div>
                <div id="sessao">administrador
                    <ul>
                        <li><a href="principal.php?link=10">Cadastrar</a></li>
                        <li><a href="principal.php?link=11">Editar</a></li>
                    </ul>
                </div>



            </div> <!-- final do esquerdo -->
            <div id="direito">
                <?php
                    if(isset($_GET['link'])){
                        $link = $_GET['link'];
                        $pag[1]="home.php";                      
                        $pag[2]="frm_admin.php";
                        $pag[3]="lista_admin.php";
        
                        if (!empty($link)){
                            if(file_exists($pag[$link])){
                                include $pag[$link];
                            }
                            else{
                                include $pag[1];
                            }
                        }
                    }
                    else{
                        include "home.php"; 
                    }
                ?>
            </div> <!-- final do direito -->
        </div>
    </div>
    
</body>
</html>