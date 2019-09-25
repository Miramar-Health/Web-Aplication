 <?php 
 require_once(config.php);  
 // peswuisar outras formas de conectxao mysql
 // conexao bano utilizando PDO
 // PHP data object
  $server = 'localhost';
  $banco = 'aulaphpdb';
  $usuario = 'root';
  $senha = '';

  try {
    $conn = new PDO("mysql:host=".$server.";dbname=$banco,$usuario,$senha);
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMONDE_EXCEPTION);
    echo 'sucesso na conexao'
  }
   catch (PDOException $e);
  {
    echo 'erro ' .$e->getMessage(); 
  }
  ?>
