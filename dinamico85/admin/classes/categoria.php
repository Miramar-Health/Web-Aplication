<?php
class categoria
{
    private $id_categoria;
    private $categoria;
    private $cat_ativo;

    //Declarando o método de acesso

   //-------------------------------//
  //define o acesso pro Id da classe//
  //-------------------------------//
                                      
    public function getId_categoria()
    {                                
     return $this->id_categoria;
    }

    public function setId_categoria($value)
    {
    $this->id_categoria = $value;    
    }
//----------------------------------------------//
   
    //-------------------------------//
   //define o acesso pro Id da classe//
   //-------------------------------//
    public function get_categoria()
    {
        return $this->categoria;
    }

    public function set_categoria($value)
    {
        $this->categoria = $value;
    }
//------------------------------------------------//
        
  
  //----Definindo Acesso pro cat ativo----//
    public function get_cat_ativo()
    {
        return $this->cat_ativo;
    }
    public function set_cat_ativo($value)
    {
    
      {
            $this->cat_ativo = $value;
    }
//------------------------------------------------//
//-------------------//
//Para consultar o Id//
//------------------//

     public function loadById_Categoria($_id_categoria)
{
    $sql = new Sql();
    $results = $sql->select("SELECT * FROM categoria WHERE id_categoria =:id", array(':id'=>$_id_categoria));
    if (count($results)>0)
    {
        $this->SetData($results[0]);
    }
}
//---------------//
//consultar todos//
//--------------//

public static function getListCategoria()
{
    $sql = new Sql();
    return $sql->select("SELECT *FROM categoria order by categoria");
}
//------------------//
//Vai consultar o nome//
//-----------------//

public static function searchCategoria($nome_categoria)
{
    $sql = new Sql();
    return $sql->select("SELECT *FROM categoria WHERE categoria LIKE :categoria",array(":categoria"=>"%".$nome_categoria."%"));
}
//------------------//
//fazendo o set Data//
//-----------------//

public function setData($_data)
{
    $this->setId_categoria($_data['id_categoria']);
    $this->set_categoria($_data['categoria']);
    $this->set_Cat_ativo($_data['cat_ativo']);
    
}
//--------------------------------//
// inserindo a categoria da classe //
//--------------------------------//

public function insert()
{
    $sql = new Sql();
    $results = $sql->select("CALL sp_categoria_insert(:categoria, :cat_ativo)",array(
        ":categoria"=>$this->get_categoria(),
        ":cat_ativo"=>$this->get_Cat_ativo(),
    ));

    if (count($results)>0)
    {
        $this->SetData($results[0]);
    }
}


//fazendo o update da categoria//

public function update($_idCategoria,$_categoria,$cat_ativo){
    $sql = new Sql();
    $sql->query("UPDATE categoria SET categoria=:categoria,cat_ativo=:cat_ativo WHERE id_categoria=:id_categoria",
    array(
        ":id_categoria"=>$_idCategoria,
        ":categoria"=>$_categoria,
        ":cat_ativo"=>$cat_ativo
    ));

}

//deletando a categoria//

public function delete()
{
    $sql = new Sql();
    $sql->query("DELETE FROM categoria WHERE id_categoria=:id_categoria",array(":id_gategoria"=>$this->getId_categoria()
    ));
}

//metodo construtor vazio//

public function __construct($_categoria="",$_cat_ativo="")
{
 $this->categoria=$_categoria;
 $this->cat_ativo=$_cat_ativo;    
}

}
?>