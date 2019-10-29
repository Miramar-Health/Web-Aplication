<?php
class post{
    private $id_post;
    private $id_categoria;
    private $titulo_post;
    private $descricao_post;
    private $img_post;
    private $visitas;
    private $data_post;
    private $post_ativo;

    // declaração de metodos de acesso(getters and setters)
    //definindo acesso ao id post

    public function get_Id_post(){
        return $this->id_post;
    }

    public function set_Id_post($value){
        $this->id_post = $value;
    }

  //definindo acesso ao id categoria

    public function get_Id_categoria(){
        return $this->id_categoria;
    }

    public function set_Id_categoria($value){
        $this->id_categoria = $value;
    }

    //definindo acesso ao titulo noticia

    public function get_TituloPost(){
        return $this->titulo_post;
    }

    public function set_TituloPost($value){
        $this->titulo_post = $value;
    }    
    //definindo acesso ao descrição post

    public function get_DescricaoPost(){
        return $this->descricao_post;
    }

    public function set_DescricaoPost($value){
        $this->descricao_post = $value;
    }
      //definindo acesso ao img post 

    public function get_ImgPost(){
        return $this->img_post;
    }

    public function set_ImgPost($value){
        $this->img_post = $value;
    }

      //definindo acesso ao visitas

    
    public function get_Visitas(){
        return $this->visitas;
    }

    public function set_Visitas($value){
        $this->visitas = $value;
    }

      //definindo acesso ao noticia ativo

    public function get_DataPost(){
        return $this->data_post;
    }

    public function set_DataPost($value){
        $this->data_post = $value;
    }

      //definindo acesso ao noticia

      public function get_PostAtivo(){
        return $this->post_ativo;
    }

    public function set_PostAtivo($value){
        $this->post_ativo = $value;
    }

// consultar por id

    public  function loadById_post($_idPost){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM post WHERE id_post =:id_post", array(':id_post'=>$_idPost));
        if (count($results)>0){
            $this->SetData($results[0]);
        }
    }
//consultar todos

    public static function getListPost(){
        $sql = new Sql();
        return $sql->select("SELECT *FROM post order by titulo_post");
    }
//consultar por nome

    public static function searchPost($nome_post){
        $sql = new Sql(); 
        return $sql->select("SELECT * FROM post WHERE titulo_post LIKE :titulo_post",array(":titulo_post"=>"%".$nome_post."%"));
    }
//setando data
    
    public function setData($_data){
        $this->set_Id_post($_data['id_post']);
        $this->set_Id_categoria($_data['id_categoria']);
        $this->set_TituloPost($_data['titulo_post']);
        $this->set_DescricaoPost($_data['descricao_post']);
        $this->set_ImgPost($_data['img_post']);
        $this->set_Visitas($_data['visitas']);
        $this->set_DataPost($_data['data_post']);
        $this->set_PostAtivo($_data['post_ativo']);
       
    }
// inserindo post

    public function insert(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_post_insert(:id_categoria, :titulo_post, :descricao_post, :img_post, :visitas, :data_post, :post_ativo)",array(
            ":id_categoria"=>$this->get_Id_categoria(),
            ":titulo_post"=>$this->get_TituloPost(),
            ":descricao_post"=>$this->get_DescricaoPost(),
            ":img_post"=>$this->get_ImgPost(),
            ":visitas"=>$this->get_Visitas(),
            ":data_post"=>$this->get_DataPost(),
            ":post_ativo"=>$this->get_PostAtivo()
        ));

        if (count($results)>0){
            $this->SetData($results[0]);
        }
    }
//update do post

    public function update($_IdPost,$_IdCategoria,$_TituloPost,$descricaoPost,$imgPost,$visitas,$dataPost,$postAtivo){
        $sql = new Sql();
        $sql->query("UPDATE post SET id_categoria=:id_categoria,titulo_post=:titulo_post,descricao_post=:descricao_post,img_post=:img_post,visitas=:visitas,data_post=:data_post,post_ativo=:post_ativo WHERE id_post=:id_post",
        array(
            ":id_post"=>$_IdPost,
            ":id_categoria"=>$_IdCategoria,
            ":titulo_post"=>$_TituloPost,
            ":descricao_post"=>$descricaoPost,
            ":img_post"=>$imgPost,
            ":visitas"=>$visitas,
            ":data_post"=>$dataPost,
            ":post_ativo"=>$postAtivo
        ));
    }
    public function updateVisita($id){
        $sql = new Sql();
        $sql->query('UPDATE post SET visitas = visitas +1 WHERE id_post=:id',
        array(
            ":id"=>$id
        ));
    }
    //deletando categoria

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM post WHERE id_post=:id_post",array(":id_post"=>$this->get_Id_post()
        ));
    }

    //metodo construtor vazio

    public function __construct($_id_categoria="",$_titulo_post="",$_descricao_post="",$_img_post="",$_visitas="",$_data_post="",$_post_ativo="")
    {
     $this->id_categoria=$_id_categoria;
     $this->titulo_post=$_titulo_post;
     $this->descricao_post=$_descricao_post;
     $this->img_post=$_img_post;
     $this->visitas=$_visitas; 
     $this->data_post=$_data_post; 
     $this->post_ativo=$_post_ativo;
    }
}
?>