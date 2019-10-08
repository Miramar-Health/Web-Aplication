<?php
Class Sql extends PDO{//Qualquer objeto é pdo
   private $cn;
   public function __construct(){
     $this->cn = new PDO("mysql:host=".IP_SERVER_DB.";dbname=dinamico85db","root"."");
     //$cn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   }
   public function setParams($comando, $parametros = array()){ // recebe dois parametros //método atribui parametroS para uma quert sql
  foreach($parametros as $key => $value)
       {
  $this->setParam($comando,$key,$value);
       }
     }
     public function setParam($cmd,$key,$value){
       $cmd->bindParam($key, $value);// = (atribuição) == (comparação) === (comparação absoluta) => (associação) -> ()
     }
     public function query($comando, $params, $mode = array())//função query recebe comando SQL
     {
      $cmd = $this->cn->prepare($cmd);
      $this->setParams($cmd, $params);//recebdno matriz de parametros
      $cmd->execute();

     }
     public function select($comandoSql,$params = array()){
       $cmd = $this->query($comandoSql,$params);//chama o metodo query, chamando todas acima 
       return $cmd->fetchAll(PDO::FETCH_ASSOC);//retorna uma tabela associativa
     }
  }
?>