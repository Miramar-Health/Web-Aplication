<?php
class Sql extends PDO{
    private $cn;
    public function __construct()
    {
        $this->cn=new PDO("mysql:host=".IP_SERVER_DB.";dbname=".NOME_BANCO,USER_DB,PASS_DB);
    }
    // metodo atribui parametros para uma query Sql
    public function setParams($comando, $parametros = array()){
        foreach($parametros as $key=>$value){
            $this->setParam($comando, $key, $value);
        }
    }
    // = (atribuição)| ==(coomparação) | ===(comparação absoluta) | =>(associação) | ->(propriedade)

    public function setParam($cmd, $key, $value){
        $cmd->bindParam($key, $value);
    }

    public function query($comandoSql, $params = array()){
        $cmd = $this->cn->prepare($comandoSql);
        $this->setParams($cmd, $params);
        $cmd->execute();
        return $cmd;
    }
    public function select($comandoSql, $params = array()){
        $cmd = $this->query($comandoSql,$params);
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>