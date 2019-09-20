<?php
require_once('funcoes.php');
if (isset($_GET['txt_capital'])){
    $capital = $_GET['txt_capital'];
    $taxa = $_GET['txt_taxa'];
    $parcelas = $_GET['txt_parcelas'];
    $montante = calcular_montante($capital,$taxa,$parcelas);

}
$montante = calcular_montante(3000,1.73,36);

?>

<form action="#" method="get">
<fieldset>
  <label for=""> Capital R$</label>
  <input type="text" name="txt_capital">
  <br>
  <label for=""> Taxa (% a.m.)</label>
   <input type="button" name="txt_parcelas">
   <br>
   <label for="">Numero de parcelas</label>
   <input type="button" name="txt_parcelas" value="0,00">
   <br>
   <label for="">Montante</label>
   <input type="text" name="txt_montante" value="<?php echo isset($montante)? $montante:'0,00';?>">
   <br>
   <input type="button" name="btn_calc_montante" value="calcular montante">

</fieldset>
</form>


<h2>valor total do financiamente</h2>
<h3>total R$ <?php echo isset ($montante)? number_format($montante,2,',',''):'R$0,00';?></h3>
<h4>
  <?php
if (isset($montante)){
    $valor_parcela = number_format($montante/$parcelas,2',','.');
    echo $parcelas.
    'parcelas de R$'.
    $valor_parcela;
    echo "<br>";
    echo "<table border=1>";
    for ($i =  1; $i <= $parcelas; $i++){
        echo "<tr><td>".$i."</tr><td>".$valor_parcela."</td></tr>"
    }  
}
else
{
    echo 'R$ 0,00';
}
?>
</h4>
