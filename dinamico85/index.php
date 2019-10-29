<?php
require_once('op_usuario.php')
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Dinâmico UC12</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>  
    <div id="estrutura">
        <div id="topo"></div>
        <div id="menu">
            <ul>
                
                <li><a href="index.php?link=1">Home</a></li>
                <li><a href="index.php?link=">Serviços</a></li>
                <li><a href="index.php?link=">Produtos</a></li>
                <li><a href="index.php?link=">Contatos</a></li>
            </ul>        
        </div>
        <div id="banner" class="banner"></div>
        <div id="corpo">
            <div id="esquerda" class="esquerda">
                <h1>Produtos</h1>
                <p>(<a href="op_usuario.php?sair=true">sair</a>) - <?php  echo $_SESSION['nome_usuario'];?></p>
                <li><a href="index.php?link=5">Produto 1</a></li>
                <li><a href="index.php?link=">Produto 2</a></li>
                <li><a href="index.php?link=">Produto 3</a></li>
                <li><a href="index.php?link=">Produto 4</a></li>
            </div>
            <div id="centro">
                <?php
                   $link = (isset($_GET['link'])?$_GET['link']:'');
                   $pag[1] = "home.php";
                   $pag[5] = "produto.php";
                   $_SESSION['id_noticia']= filter_input(INPUT_GET,'id_noticia');
                   $_SESSION['id_post']= filter_input(INPUT_GET,'id_post');
                    $pag[3] = "conteudo_noticia.php";
                    $pag[4] = "conteudo_post.php";
                   if (!empty($link)){
                       if(file_exists($pag[$link])){
                            include($pag[$link]);
                       }
                       else{
                            include($pag[1]); // mostre o home
                       }
                    }
                    else{
                        include($pag[1]); // mostre o home
                    }

                ?>
            </div>
            <div id="direita">
                <div id="noticias">
                    
                    <?php
                    
                    require_once("config.php");
                    $noticias = noticia::getListNoticia();
                    foreach($noticias as $noticia){
                        if ($noticia['noticia_ativo']=='s'){
                            ?>
                            <h3><img src="<?php echo $noticia['img_noticia'];?>" alt=""></h3>
                            <div id="itens_noticia" >
                            <span><?php echo $noticia['data_noticia'];?></span>
                            <a href="index.php?link=3&id_noticia=<?php echo $noticia['id_noticia'];?>">
                            <?php echo $noticia['titulo_noticia'];?></a>
                            </div>
                            <?php } }?>

                            <?php
                    $posts = post::getListPost();
                    foreach($posts as $post){
                        if ($post['post_ativo']=='s'){
                            ?>
                            <h3><img src="<?php echo $post['img_post'];?>" alt=""></h3>
                            <div id="itens_post" >
                            <span><?php echo $post['data_post'];?></span>
                            <a href="index.php?link=4&id_post=<?php echo $post['id_post']?>">
                            <?php echo $post['titulo_post'];?></a>
                            </div>
                            <?php } }?>
                </div>
            </div>


                <div>
                    Área do Administrador
                    <a href="admin/index.php">Acesso à área Administrativa</a>
                    
                </div>


                <div id="rodape">
                    &copy; - Todos os direitos reservados
                </div>
        </div>


    </div>
</body>
</html>