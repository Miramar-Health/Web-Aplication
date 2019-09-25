<?php 
require_once('conecta.php');

try {
    $comm = $conn->prepare('INSERT INTO aluno values(0,:nome, :cpf, :email, DEFAULT)');
    $conn->execute(array(':none' => 'Wellington Jr',));

} catch (\Throwable $th) 

{
    
    //throw $th;

}
?>