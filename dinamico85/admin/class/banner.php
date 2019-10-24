<?php
class banner{
    private $id_banner;
    private $titulo_banner;
    private $link_banner;
    private $img_banner;
    private $alt;
    private $banner_ativo;


    // declaração de metodos de acesso(getters and setters)

    //definindo acesso ao id banner


    public function getId_banner(){
        return $this->id_banner;
    }

    public function setId_banner($value){
        $this->id_banner = $value;
    }

    
    //definindo acesso ao titulo banner

    public function get_TituloBanner(){
        return $this->titulo_banner;
    }

    public function set_TituloBanner($value){
        $this->titulo_banner = $value;
    }


    
    //definindo acesso ao link banner

    public function get_LinkBanner(){
        return $this->link_banner;
    }

    public function set_LinkBanner($value){
        $this->link_banner = $value;
    }


      //definindo acesso a img banner

    public function get_ImgBanner(){
        return $this->img_banner;
    }

    public function set_ImgBanner($value){
        $this->img_banner = $value;
    }

      //definindo acesso ao alt banner

    
    public function get_AltBanner(){
        return $this->alt;
    }

    public function set_AltBanner($value){
        $this->alt = $value;
    }


      //definindo acesso ao banner ativo

    public function get_BannerAtivo(){
        return $this->banner_ativo;
    }

    public function set_BannerAtivo($value){
        $this->banner_ativo = $value;
    }



//  final----------------


// consultar por id

    public  function loadById_banner($_idbanner){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM banner WHERE id =:id", array(':id'=>$_idbanner));
        if (count($results)>0){
            $this->SetData($results[0]);
        }
    }



//consultar todos

    public static function getListBanner(){
        $sql = new Sql();
        return $sql->select("SELECT *FROM banner order by titulo_banner");
    }



//consultar por nome

    public static function searchBanner($nome_banner){
        $sql = new Sql();
        return $sql->select("SELECT *FROM banner WHERE titulo_banner LIKE :banner",array(":banner"=>"%".$nome_banner."%"));
    }



//setando data
    
    public function setData($_data){
        $this->setId_banner($_data['id_banner']);
        $this->set_TituloBanner($_data['titulo_banner']);
        $this->set_linkBanner($_data['link_banner']);
        $this->set_img_banner($_data['img_banner']);
        $this->set_altBanner($_data['alt']);
        $this->set_BannerAtivo($_data['banner_ativo']);
        
    }


// inserindo banner

    public function insert(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_banner_insert(:titulo_banner, :link_banner, :img_banner, :alt, :banner_ativo)",array(
            ":titulo_banner"=>$this->get_TituloBanner(),
            ":link_banner"=>$this->get_LinkBanner(),
            ":img_banner"=>$this->get_ImgBanner(),
            ":alt"=>$this->get_AltBanner(),
            ":banner_ativo"=>$this->get_BannerAtivo()
        ));

        if (count($results)>0){
            $this->SetData($results[0]);
        }
    }





//update da banner

    public function update($_idbanner,$_titulo_banner,$link_banner,$img_banner,$alt,$banner_ativo){
        $sql = new Sql();
        $sql->query("UPDATE banner SET titulo_banner=:titulo_banner,link_banner=:link_banner,img_banner=:img_banner,alt=:alt,banner_ativo=:banner_ativo WHERE id_banner=:id_banner",
        array(
            ":id_banner"=>$_idbanner,
            ":titulo_banner"=>$_titulo_banner,
            ":link_banner"=>$link_banner,
            ":img_banner"=>$img_banner,
            ":alt"=>$alt,
            ":banner_ativo"=>$banner_ativo
        ));

    }



    //deletando categoria

    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM banner WHERE id_banner=:id_banner",array(":id_banner"=>$this->getId_banner()()
        ));
    }

    //metodo construtor vazio

    public function __construct($_titulo_banner="",$_link_banner="",$_img_banner="",$_alt="",$_banner_ativo="")
    {
     $this->titulo_banner=$_titulo_banner;
     $this->link_banner=$_link_banner;
     $this->img_banner=$_img_banner;
     $this->alt=$_alt;
     $this->banner_ativo=$_banner_ativo;    
    }
        
    
}
?>