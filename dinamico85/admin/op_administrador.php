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
    if (isset($_POST['btn_logar_user']))
    {
        $adm = new Administrador();        
        $adm->
        efetuarLogin($_POST['txt_login']
        ,$_POST['txt_senha']);        
        if ($adm->getId() > 0)
        {
            header('location:principal.php');
        }
        else
        {
            header('location:index.php?msg=erro');
        } 
    }
    #Alterando Administrador
    if (isset($_POST['btn_alterar_administrador']))
    {
        $adm = new Administrador();
        $adm->update($_POST['id'],
        $_POST['nome'],
        $_POST['email'],
        $_POST['login']);
        header('location:principal.php?link=11');
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
    }
?>