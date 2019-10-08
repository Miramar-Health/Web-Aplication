<?php
class Administrador{
    private $id;
    private $nome;
    private $email;
    private $login;
    private $senha;

    public function getId(){
        return $this->id;
    }
    public function setId($value){
        $this->id = $value;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($value){
        $this->nome = $value;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($value){
        $this->email = $value;
    }
    public function getLogin(){
        return $this->id;
    }
    public function setLogin($value){
        $this->login = $value;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($value){
        $this->senha = $value;
    }
    public function loadById($_id){
     $sql = new Sql();//instancia da classe SQL do servidor da aplicação
     $results = $sql->select("SELECT * FROM administrador WHERE id = :id",array(':id'=>$_id));//Método Select recebe comando e matriz com atributos
     if (count($results)>0) {//qndo coount for maior q 0
         $this->setData($results[0]);
     }
    }
    public static function getList(){//retornar uma matriz com todos adm do banco
        $sql = new Sql();
         return $sql->select("SELECT * FROM administrador order by nome");
    }
    public static function search($nome_adm){//Encontra os nomes pela letra escolhida
         $sql = new Sql();
         return $sql->select("SELECT * FROM administrador WHERE nome LIKE :nome",array(":nome"=>"%".$nome_adm."%"));//Like=
    }
    public function efetuarLogin($_login, $_senha){
        $sql = new Sql();
        $senha_cript = md5($_senha);//criptografando a senha com Md5
        $results = $sql->select("SELECT * FROM administrador WHERE login = :login AND senha = :senha",array(':login'=>$_login,":senha"=>$senha_cript));//
        if (count($results)>0) {//qndo coount for maior q 0
            $this->setData($results[0]);
        }
    }
    public function setData($data){
        $this->setId($data['id']);
        $this->setNome($data['nome']);
        $this->setEmail($data['email']);
        $this->setLogin($data['login']);
        $this->setSenha($data['senha']);
        
    }
    public function insert(){//faz o insert e retorna o adm cadastrado
        $sql = new Sql();
        $results = $sql->select("CALL sp_adm_insert(:nome, :email, :login, :senha)", array(
            ":nome"=>$this->getNome(),
            ":nome"=>$this->getEmail(),
            ":nome"=>$this->getLogin(),
            ":nome"=>$this->getSenha()
        ));
        if (count($results)>0) {//qndo coount for maior q 0
            $this->setData($results[0]);
        }
    }
    public function update($_id, $_nome, $_email, $_senha){
        $results = $sql->select("UPDATE administrador SET nome = :nome, email = :email, senha = :senha WHERE id = :id, array(
            ":id"=>$_id,
            ":nome"=>$_nome,
            ":email"=>$_email,
            ":senha"=>md5($_senha)
        ));

    }
    public function deletar(){
        $sql = new Sql();
        $sql->query("DELETE FROM administrador 

    }
    public function __construct($_nome="", $_email="", $_login="", $_senha="")
    {
        
    }
    {
        
    }
}
?>