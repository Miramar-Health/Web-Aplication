<?php
class categoria{
    private $id_categoria;
    private $categoria;
    private $cat_ativo;
    // declaração de metodos de acesso(getters and setters)
    //definindo acesso ao id dacategoria
    public function getId_categoria(){
        return $this->id_categoria;
    }

    public function setId_categoria($value){
        $this->id_categoria = $value;
    }

    //definindo acesso a categoria

    public function get_categoria(){
        return $this->categoria;
    }

    public function set_categoria($value){
        $this->categoria = $value;
    }    
    //definindo acesso ao cat_ativo

    public function get_Cat_ativo(){
        return $this->cat_ativo;
    }

    public function set_Cat_ativo($value){
        $this->cat_ativo = $value;
    }

// consultar por id

    public  function loadById_Categoria($_idcategoria){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM categoria WHERE id_categoria =:id", array(':id'=>$_idcategoria));
        if (count($results)>0){
            $this->SetData($results[0]);
        }
    }

//consultar todos

    public static function getListCategoria(){
        $sql = new Sql();
        return $sql->select("SELECT *FROM categoria order by categoria");
    }

//consultar por nome

    public static function searchCategoria($nome_categoria){
        $sql = new Sql();
        return $sql->select("SELECT *FROM categoria WHERE categoria LIKE :categoria",array(":categoria"=>"%".$nome_categoria."%"));
    }

//setando data
    
    public function setData($_data){
        $this->setId_categoria($_data['id_categoria']);
        $this->set_categoria($_data['categoria']);
        $this->set_Cat_ativo($_data['cat_ativo']);
   
    }
// inserindo categoria

    public function insert(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_categoria_insert(:categoria, :cat_ativo)",array(
            ":categoria"=>$this->get_categoria(),
            ":cat_ativo"=>$this->get_Cat_ativo(),
        ));

        if (count($results)>0){
            $this->SetData($results[0]);
        }
    }

//update da categoria

    public function update($_idCategoria,$_categoria,$cat_ativo){
        $sql = new Sql();
        $sql->query("UPDATE categoria SET categoria=:categoria,cat_ativo=:cat_ativo WHERE id_categoria=:id_categoria",
        array(
            ":id_categoria"=>$_idCategoria,
            ":categoria"=>$_categoria,
            ":cat_ativo"=>$cat_ativo
        ));

    }

    //deletando categoria

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM categoria WHERE id_categoria=:id_categoria",array(":id_gategoria"=>$this->getId_categoria()
        ));
    }

    //metodo construtor vazio

    public function __construct($_categoria="",$_cat_ativo="")
    {
     $this->categoria=$_categoria;
     $this->cat_ativo=$_cat_ativo;    
    }    
}
?>