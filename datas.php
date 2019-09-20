<?php
require_once('config.php');
//string date(string $fotmat[,int $timestamp = time()]);

echo date('D/m/Y');
// 19/09/2019
echo "<br>";
echo date('H:i:s');
//19:28:20
echo "<br>";
echo date('Y-m-d H:i:s');

echo "<br>";
$timestamp = time();
echo $timestamp;
echo "<br>";
echo date('d-m-Y H:i:s','1568914746');

echo "<br>";
echo phpversion();

echo "<br>";
$timestp = mktime(00, 30,00,03,16,1974);
echo $timestp;
echo "<br>";
echo date('l w , d F Y O',$timestp);
echo "<br>";
echo date('c',$timestp);
echo "<br>";
echo date('r',$timestp);
echo "<br>";

$date = '09-10-1998 18:25:30';
$timestamp1 = strtotime($date);
$timestamp2 = strtotime('+30 day', $timestamp1);
// em timestamp
echo $timestamp1.'<br>';
echo $timestamp2.'<br>';
echo date('d-m-Y H:i:s',$timestamp1).'<br>';
echo date('d-m-Y H:i:s',$timestamp2).'<br>';

// $tz = new DateTimeZone("America/Sao_Paulo");// Cliente c = new Cliente("Sacou");
// print_r($tz->getLocation()); // Console.WriteLine(c.obterLocal());
// echo '<br>';
// print_r(timezone_location_get($tz));
// echo '<br>';

// $date = date_create('1999-12-01', timezone_open('America/Sao_Paulo'));
// echo date_format($date,'Y-m-d H:i:sP');

echo '<br>';
$data_padrao = new DateTime();
print_r($data_padrao);
echo '<br>';

$data_fin = new DateTime('17-09-2019 15:32:00');
$dia_amanha = new DateTime('+30 day');

echo $data_fin->format('d m Y').'<br>';
echo '<br>';
print_r($dia_amanha);
echo '<br>';

?>