<?php
class noticia{
    private $id_noticia;
    private $id_categoria;
    private $titulo_noticia;
    private $img_noticia;
    private $visita_noticia;
    private $data_noticia;
    private $noticia_ativo;
    private $noticia;


    // declaração de metodos de acesso(getters and setters)

    //definindo acesso ao id noticia


    public function get_Id_noticia(){
        return $this->id_noticia;
    }

    public function set_Id_noticia($value){
        $this->id_noticia = $value;
    }

    
  //definindo acesso ao id categoria

    public function get_Id_categoria(){
        return $this->id_categoria;
    }

    public function set_Id_categoria($value){
        $this->id_categoria = $value;
    }

    

    //definindo acesso ao titulo noticia

    public function get_TituloNoticia(){
        return $this->titulo_noticia;
    }

    public function set_TituloNoticia($value){
        $this->titulo_noticia = $value;
    }


    
    //definindo acesso ao img noticia

public function get_ImgNoticia(){
        return $this->img_noticia;
    }

    public function set_ImgNoticia($value){
        $this->img_noticia = $value;
    }



      //definindo acesso ao visita noticia 

    public function get_VisitaNoticia(){
        return $this->visita_noticia;
    }

    public function set_VisitaNoticia($value){
        $this->visita_noticia = $value;
    }



      //definindo acesso ao data noticia

    
    public function get_DataNoticia(){
        return $this->data_noticia;
    }

    public function set_DataNoticia($value){
        $this->data_noticia = $value;
    }


      //definindo acesso ao noticia ativo

    public function get_NoticiaAtivo(){
        return $this->noticia_ativo;
    }

    public function set_NoticiaAtivo($value){
        $this->noticia_ativo = $value;
    }

      //definindo acesso ao noticia

      public function get_Noticia(){
        return $this->noticia;
    }

    public function set_Noticia($value){
        $this->noticia = $value;
    }

//  final----------------


// consultar por id

    public  function loadById_noticia($_idNoticia){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM noticias WHERE id_noticia =:id_noticia", array(':id_noticia'=>$_idNoticia));
        if (count($results)>0){
            $this->SetData($results[0]);
        }
    }
//consultar todos

    public static function getListNoticia(){
        $sql = new Sql();
        return $sql->select("SELECT *FROM noticias order by titulo_noticia");
    }

//consultar por nome

    public static function searchBanner($nome_noticia){
        $sql = new Sql();
        return $sql->select("SELECT *FROM noticias WHERE titulo_noticia LIKE :noticia",array(":noticia"=>"%".$nome_noticia."%"));
    }
//setando data

    public function setData($_data){
        $this->set_Id_noticia($_data['id_noticia']);
        $this->set_Id_categoria($_data['id_categoria']);
        $this->set_TituloNoticia($_data['titulo_noticia']);
        $this->set_imgNoticia($_data['img_noticia']);
        $this->set_visitaNoticia($_data['visita_noticia']);
        $this->set_DataNoticia($_data['data_noticia']);
        $this->set_noticiaAtivo($_data['noticia_ativo']);
        $this->set_noticia($_data['noticia']);
        
    }
// inserindo noticia

    public function insert(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_noticia_insert(:id_categoria, :titulo_noticia, :img_noticia, :visita_noticia, :data_noticia, :noticia_ativo, :noticia)",array(
            ":id_categoria"=>$this->get_Id_categoria(),
            ":titulo_noticia"=>$this->get_TituloNoticia(),
            ":img_noticia"=>$this->get_ImgNoticia(),
            ":visita_noticia"=>$this->get_VisitaNoticia(),
            ":data_noticia"=>$this->get_DataNoticia(),
            ":noticia"=>$this->get_Noticia(),
            ":noticia_ativo"=>$this->get_NoticiaAtivo()
        ));

        if (count($results)>0){
            $this->SetData($results[0]);
        }
    }



//update da noticia

    public function update($_IdNoticia,$_IdCategoria,$_TituloNoticia,$ImgNoticia,$VisitaNoticia,$DataNoticia,$NoticiaAtivo,$Noticia){
        $sql = new Sql();
        $sql->query("UPDATE noticias SET id_categoria=:id_categoria,titulo_noticia=:titulo_noticia,img_noticia=:img_noticia,visita_noticia=:visita_noticia,data_noticia=:data_noticia,noticia_ativo=:noticia_ativo,noticia=:noticia WHERE id_noticia=:id_noticia",
        array(
            ":id_noticia"=>$_IdNoticia,
            ":id_categoria"=>$_IdCategoria,
            ":titulo_noticia"=>$_TituloNoticia,
            ":img_noticia"=>$ImgNoticia,
            ":visita_noticia"=>$VisitaNoticia,
            ":data_noticia"=>$DataNoticia,
            ":noticia_ativo"=>$NoticiaAtivo,
            ":noticia"=>$Noticia
        ));

    }

   public function updateVisita($id){
        $sql = new Sql();
        $sql->query('UPDATE noticias SET visita_noticia = visita_notica +1 WHERE id_noticia=:id',
        array(
            ":id"=>$id
        ));
    }


    //deletando categoria

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM noticias WHERE id_noticia=:id_noticia",array(":id_noticia"=>$this->get_Id_noticia()
        ));
    }

    //metodo construtor vazio

    public function __construct($_id_noticia="",$_id_categoria="",$_titulo_noticia="",$_img_noticia="",$_visita_noticia="",$_data_noticia="",$_noticia_ativo="",$_noticia="")
    {
    $this->id_noticia=$_id_noticia;
     $this->id_categoria=$_id_categoria;
     $this->titulo_noticia=$_titulo_noticia;
     $this->img_noticia=$_img_noticia;
     $this->visita_noticia=$_visita_noticia;
     $this->data_noticia=$_data_noticia; 
     $this->noticia_ativo=$_noticia_ativo; 
     $this->noticia=$_noticia;
    }
}
?>