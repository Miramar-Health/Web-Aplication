<?php
require_once('funcoes.php');
require_once('config.php');
//var_dump($_GET);
if (isset($_GET['txt_capital'])){
    $capital = $_GET['txt_capital'];
    $taxa = $_GET['txt_taxa'];
    $parcelas = $_GET['txt_parcelas'];
    $montante = calcular_montante($capital,$taxa,$parcelas);
}
?>

<form action="#" method="get">
    <fieldset>
        <label for="">Capital R$ </label>
        <input type="text" name="txt_capital" required>
        <br>
        <label for="">Taxa 
        <input type="text" name="txt_taxa" required>
        (% a.m.)</label>
        <br>
        <label for="">Número de parcelas
        <input type="text" name="txt_parcelas" required>
         (meses)</label>
        <br>
        <label for="">Montante</label>
        <input type="text" name="txt_montante" 
        value="<?php echo  isset($montante)? 'R$ '.number_format( $montante,2,',',''):'R$ 0,00'; ?>">
        <br>
        <br>
        <input type="submit" name="btn_calc_montante" value="Calcular Montante" >
    </fieldset>
</form>

<h2>Valor total do finaciamento</h2>
<h3>Total R$ <?php echo isset($montante)? 
number_format($montante,2,',','.'):
'R$ 0,00'; ?></h3>
<h4> 
    <?php
        if(isset($montante)){
            $valor_parcela = number_format($montante/$parcelas,2,',','');
            echo $parcelas.
            ' parcelas de R$ '.
            $valor_parcela;
            echo "<br>";
            echo "<table border=1>";    
            $data_stamp = time();
            $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta','Quinta','Sexta','Sábado');
            for ($i = 1; $i <= $parcelas;$i++){
            $data_stamp = date(strtotime('+1 month', $data_stamp));
                switch (date('w',$data_stamp)){
                    case 6:
                        $imprime_data = date(strtotime('+2 day', $data_stamp));
                        break; 
                    case 0:
                        $imprime_data = date(strtotime('+1 day', $data_stamp));
                        break;
                    default:
                        $imprime_data = $data_stamp;
                }
                echo "<tr><td>".$i."</td><td width='45px'>".$valor_parcela."</td><td>".date('l d/m/Y',$imprime_data)."</td></tr>";
            }
            echo "</table>";
        }
        else{
            echo 'R$ 0,00';
        } 
    ?>
</h4>