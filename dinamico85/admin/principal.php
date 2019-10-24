

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div id="principal">
        <div id="cabecalho">
            <div id="titulo_topo">
                    <img src="img/a-admin.png" alt="">
                    <br>
                    <p>(<a href="index.php">sair</a>)</p>
            </div> <!-- Final do Cabeçalho HEADER-->
                <div id="corpo">
                    <div id="esquerdo">
                        <div id="sessao">Categoria
                            <ul>
                                <li><a href="principal.php?link=2">Cadastrar</a></li>
                                <li><a href="principal.php?link=3">Editar</a></li>
                            </ul>
                        </div>
                        <div id="sessao">Post
                                <ul>
                                    <li><a href="principal.php?link=4">Cadastrar</a></li>
                                    <li><a href="principal.php?link=5">Editar</a></li>
                                </ul>
                        </div>
                        <div id="sessao">Notícias
                            <ul>
                                <li><a href="principal.php?link=6">Cadastrar</a></li>
                                <li><a href="principal.php?link=7">Editar</a></li>
                            </ul>
                        </div>
                        <div id="sessao">Banner
                            <ul>
                                <li><a href="principal.php?link=8">Cadastrar</a></li>
                                <li><a href="principal.php?link=9">Editar</a></li>
                            </ul>
                        </div> <!-- Final do Esquerdo --> <!-- Final do Esquerdo -->
                        <div id="sessao">Administrador
                                <ul>
                                    <li><a href="principal.php?link=10">Cadastrar</a></li>
                                    <li><a href="principal.php?link=11">Editar</a></li>
                                </ul>
                        </div>
                    </div>
                        <div id="direito">
                            <?php
                                if(isset($_GET['link']))
                                {
                                    $link = $_GET['link'];
                                    $pag[1]="home.php";
                                    $pag[2]="frm_categoria.php";
                                    $pag[3]="lista_categoria.php";
                                    $pag[4]="frm_post.php";
                                    $pag[5]="lista_post.php";
                                    $pag[6]="frm_noticia.php";
                                    $pag[7]="lista_noticia.php";
                                    $pag[8]="frm_banner.php";
                                    $pag[9]="lista_banner.php";
                                    $pag[9]="lista_administrador.php";
                                    $pag[9]="frm_administrador.php";

                                    if(!empty($link))
                                    {
                                        if(file_exists($pag[$link]))
                                        {
                                                include $pag[$link];
                                        }
                                        else
                                        {
                                                include $pag[1];
                                        }
                                    }

                                }
                            ?>
                        </div> <!-- final do direito -->
                </div> 
            </div>
            
</body>
</html>