<?php
require_once('config.php');
if(isset($_SESSION['id_noticia'])){
$id = $_SESSION['id_noticia'];
$not = new noticia();
$_SESSION['id_noticia']=null;
$not->loadById_noticia($id);
if ($not->get_Id_noticia()>0){
$not->updateVisita($id);
?>
<h1><?php echo $not->get_TituloNoticia();?></h1>
<br>
<h3><?php echo $not->get_DataNoticia();?></h3>
<br>
<h4><?php echo $not->get_VisitaNoticia();?></h4>
<br>
<img src="admin/foto/<?php echo $not->get_ImgNoticia();?>" alt="noticia" width="640" height="425">
<p><h3><?php  echo $not->get_Noticia();?></h3></p>
<?php
}}
?>