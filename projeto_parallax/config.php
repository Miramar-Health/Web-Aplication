<?php
    //Inicializar a sessão do usuario
    if (!isset($_SESSION))
    {
        session_start();
    }
    //Define o horário da aplicação para zona GMT (TimeZone) -3,00
    date_default_timezone_set('America/Sao_Paulo');

    //Inicia o carregamento das classes do projeto
    spl_autoload_register(function($nome_classe)
    {
        $server_str = $_SERVER['REQUEST_URI'];
        $caminho = strpos($server_str,'admin') !== false?'class':'admin/class';
        $nome_arquivo = $caminho.DIRECTORY_SEPARATOR.$nome_classe.".php";
        if(file_exists($nome_arquivo))
        {
            require_once($nome_arquivo);
        }
    });    

    //Criar constantes do servidor de banco de dados
    define ('IP_SERVER_DB', 'softkleen.com.br');
    define ('HOSTNAME','softkleen.com.br');
    define ('NOME_BANCO','softklee_miramarhealth');
    define ('USER_DB','softklee_miramarhealth');
    define ('PORT', '3306');
    define ('PASS_DB','senac@mirah');
    define ('LARGURA_IMG', 640);

    function upload_imagem()
        {        
            $foto = $_FILES['img'];
            if(!empty($foto['name']))
            {
                $largura = 640;
                $altura = 425;
                $tamanho = 300000;
                $error = array();
                #Verificando se o arquivo é uma imagem
                if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/",$foto['type']))
                {
                    $error[1] = "Este arquivo não é uma imagem";
                }
                #Verificando largura da imagem em pixels
                $dimensoes = getimagesize($foto['tmp_name']);            
                if ($dimensoes[0]>$largura)
                {
                    $error[2] = 'A largura da imagem ('.$dimensoes[0].' pixels) é maior do que a suportada ( '.$largura.' pixels)';
                }
                #Verificando altura da imagens em pixels
                if ($dimensoes[1]>$altura)
                {
                    $error[3] = 'A Altura da imagem ('.$dimensoes[1].' pixels) é maior do que a suportada ( '.$altura.' pixels)';
                }
                #Verificando se o tamanho em bytes da foto é mario do que o suportado
                if ($foto['size']>$tamanho)
                {
                    $error[4] = 'O tamanho da imagem ( '.$foto['size'].' Bytes) é maior do que a suportada ('.$tamanho.' bytes)';
                }
                #Se não houver erros ele recupera a extensão do arquivo
                if(count($error) == 0)
                {
                    #Recuperando extensão do arquivo com expressão regular
                    preg_match("/\.(gif|bmp|png|jpg){1}$/i",$foto['name'],$ext);
                    #Tornando nome da imagem como md5 e adicionando extensão
                    $nome_img = md5(uniqid(time())).$ext[0];
                    #Definindo caminho da imagem
                    $caminho_img = "foto/".$nome_img;
                    move_uploaded_file($foto['tmp_name'],$caminho_img);
                }
                $_FILES = null;
                $imagem_info = array();
                $imagem_info[0] = $nome_img;
                $imagem_info[1] = $error;
                return $imagem_info;
            }
        }
    ?>
