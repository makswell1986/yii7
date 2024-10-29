<?php header('Content-Type: text/html; charset=utf-8');
$TOKEN='a65x3b980eaq07fwf37p681ec52c311h';

$REG_NOM='684000';
$NAME='DIZABOS TEXTILE';
$REG_DATE='2018-10-12';
$SOATO="1726287";
$ADRES=" город Ташкент , Яккасарайский район";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://172.16.11.82/project1/server.php");
curl_setopt($ch, CURLOPT_POST, 1); //будет POST
curl_setopt($ch, CURLOPT_HEADER, 0);
//curl_setopt($ch, CURLOPT_HTTPHEADER, 'Content-type: application/x-www-form-urlencoded;charset=UTF-8');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'TOKEN='.$TOKEN.'&REG_NOM='.$REG_NOM.'&NAME='.$NAME.'&REG_DATE='.$REG_DATE.'&SOATO='.$SOATO.'&ADRES='.$ADRES);
$result = curl_exec($ch);
// завершение сеанса и освобождение ресурсов
curl_close($ch);
echo  $result;
?>
