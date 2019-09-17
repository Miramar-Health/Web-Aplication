<?php
//inicio aula 4
//condicionais 
$teste = true;
$idade = "18";
if($idade=="18" && $teste) 
{
    echo('é vdd');
}
else
{
    echo('é não');
}

echo "<br>";
$time = array('nome'=> 'PIT','pontos'=> 658);
var_dump($time);
echo "<br>";

foreach ($time as $chave => $valor)
{
    echo "valor = ".$valor."<br>";
}

echo"<br>";
$matriz = array();
for ($i = 0; $i< 10; $i++)
{
  $matriz[$i] = (($i+5)*4**3);
}
foreach ($matriz as $chave => $valor)
    {
    if($chave%2==0 ){//%mod
echo $chave."-> ".$valor."<br>";    
    }
}
echo"<br>";

function soma($valor):string{
    return $valor + 125;
}
echo (soma(100)+10);
echo"<br>";
var_dump(soma(100)+15);
?>