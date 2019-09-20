<?php
function soma($soma):string{
    return $valor + 125;
}
function gera_md5($senha='')
{
    return md5($senha);
}
function gera_base64($senha='')
{
    return base64_encode($senha);
}
function des_base64($senha='')
{
    return base64_decode($senha);
}
// implementação de regra de negocios com php
// calculo de juro composto para parcelamento
 function calcular_montante($cap, $tax, $per){
  $montante = $cap * (1+($tax/100))**$per;
  return $montante;
 }
?>
