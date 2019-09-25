<?php

require_once('config.php');
if (isset($_GET['sair']) &&     $_GET['sair']==1){
    session_destroy();
}

$_SESSION['id'] = session_id();
$_SESSION['user'] = "Admin";
echo $_SESSION['id'].
" - usuario atual: ".
$_SESSION['user'];
echo "<a href = 'sessao.php?sair=1'>sair</a>";
?>