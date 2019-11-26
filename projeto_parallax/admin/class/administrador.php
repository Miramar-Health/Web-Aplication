<?php
class Administrador{
    private $id;
    private $nome;
    private $cpf;
    private $categoria;
    private $email;
    private $senha;
    private $instituicao;


    // declaração de metodos de acesso(getters and setters)

    //definindo acesso ao id


    public function getId(){
        return $this->id;
    }

    public function setId($value){
        $this->id = $value;
    }

    
    //definindo acesso ao nome

    public function getNome(){
        return $this->nome;
    }

    public function setNome($value){
        $this->nome = $value;
    }

    //definindo acesso ao cpf

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($value)
    {
        $this->cpf = $value;
    }

    //definindo acesso a Categoria

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($value)
    {
        $this->categoria = $value;
    }

    //definindo acesso a Instituição

    public function getInstituicao()
    {
        return $this->instituicao;
    }

    public function setInstituicao($value)
    {
        $this->instituicao = $value;
    }


    
    //definindo acesso ao email

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($value){
        $this->email = $value;
    }

    
    //definindo acesso ao senha

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($value){
        $this->senha = $value;
    }

    public  function loadById($_id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM cadastro_admin WHERE id_admin =:id", array(':id'=>$_id));
        if (count($results)>0){
            $this->SetData($results[0]);
        }
    }

    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT *FROM cadastro_admin order by nome");
    }

    public static function search($nome_adm){
        $sql = new Sql();
        return $sql->select("SELECT *FROM cadastro_admin WHERE nome LIKE :nome",array(":nome"=>"%".$nome_adm."%"));
    }


    public function efetuarLogin($_email,$_senha){
        $sql = new Sql();
        $senha_cript = md5($_senha);
        $results = $sql->select("SELECT * FROM cadastro_admin WHERE email =:email AND senha =:senha",array(':login'=>$_email,'senha'=>$senha_cript));
        if (count($results)>0){
            $this->SetData($results[0]);
        }
    }


    public function setData($_data){
        $this->setId($_data['id_admin']);
        $this->setNome($_data['nome']);
        $this->setCpf($_data['cpf']);
        $this->setCategoria($_data['categoria']);
        $this->setEmail($_data['email']);
        $this->setSenha($_data['senha']);
        
    }

    public function  insert(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_insert_adm(:nome, :cpf, :categoria, :email, :senha, :instituicao)",array(
            ":nome"=>$this->getNome(),
            ":cpf"=>$this->getCpf(),
            ":categoria"=>$this->getCategoria(),
            ":email"=>$this->getEmail(),
            ":senha"=>md5($this->getSenha())
        ));

        if (count($results)>0){
            $this->SetData($results[0]);
        }
    }

    public function update($_id,$_nome,$_email,$_login){
        $sql = new Sql();
        $sql->query("UPDATE administrador SET nome=:nome,email=:email,login=:login  WHERE id=:id",
        array(
            ":id"=>$_id,
            ":nome"=>$_nome,
            ":email"=>$_email,
            ":login"=>$_login
        ));

    }

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM administrador WHERE id=:id",array(":id"=>$this->getId()
        ));
    }


    public function __construct($_nome="",$_email="",$_login="",$_senha="")
    {
     $this->nome=$_nome;
     $this->email=$_email;  
     $this->login=$_login;  
     $this->senha=$_senha;     
    }
        
    
}
?>