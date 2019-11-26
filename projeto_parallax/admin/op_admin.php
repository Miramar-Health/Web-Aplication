<?php
    require_once('../config.php');
    #Inserir administrador    
    if(isset($_POST['btn_cadastrar']))
    {
        $adm = new Administrador(
            0,
            $_POST['txt_nome'],
            $_POST['txt_email'],
            $_POST['txt_login'],
            $_POST['txt_senha']);
        if($_POST['txt_senha'] == $_POST['txt_senha_confirmar'])
        {
            $adm->insert();
            header('location:principal.php?link=10&msg=ok');
        }
        else
        {
            header('location:principal.php?link=10&msg=errokey');
        }
    }
    #Efetuando login do Administrador
    if (isset($_POST['txt_logar']) && isset($_POST['txt_login']))
    {
        $adm = new Administrador();        
        $adm->efetuarLogin($_POST['txt_login'],$_POST['txt_senha']);        
        if ($adm->getId() > 0)
        {            
            $_SESSION['logado_adm'] = true;
            $_SESSION['id_administrador'] = $adm->getId();
            $_SESSION['nome_administrador'] = $adm->getNome();
            $_SESSION['login_administrador'] = $adm->getLogin();
            $_SESSION['email_administrador'] = $adm->getEmail();
            header('location:principal.php');
            exit;
        }
        
        if (empty($_POST['txt_login']) && empty($_POST['txt_senha']))
        {
            header('location:index.php?msg=Preencha os campos');
            exit;
        }
        if($adm->getId() == 0)
        {
            header('location:index.php?msg=Usuario ou senha incorretos');
            exit;
        }
    }
    #Alterando Administrador
    if (isset($_POST['btn_alterar_administrador']))
    {
        $adm = new Administrador();
        $adm->update($_POST['id'],$_POST['nome'],$_POST['email'],$_POST['login']);
        header('location:principal.php?link=11');
        exit;
    }
    #Excluindo adnor
    $id = filter_input(INPUT_GET,'id');
    $excluir = filter_input(INPUT_GET,'excluir');
    if(isset($id) && $excluir == 1)
    {        
        $adm = new Administrador();
        var_dump($id);
        $adm->delete($id);        
        header('location:principal.php?link=11');
        exit;
    }
    #Encerrando sessão do usuario
    if(isset($_GET['sair']))
    {
        if($_GET['sair'])
        {
            $_SESSION['logado_adm'] = false;
            $_SESSION['id_administrador'] = null;
            $_SESSION['nome_administrador'] = null;
            $_SESSION['login_administrador'] = null;
            $_SESSION['email_administrador'] = null;
            header('location:index.php');
            exit;
        }
    }
    #Recuperando Senha
    if(isset($_POST['btn_recuperar_senha']))
    {
        $adm = new Administrador();
        $adm->recuperarSenha($_POST['txt_email'],'Recuperação de senha solicitada','Indetificamos uma solititação para trocar de senha
        Caso não tenha sido você, recomendados que mude de senha Link para recuperar senha = localhost/dinamico85/admin/trocar_senha'
    );
    }
?>
