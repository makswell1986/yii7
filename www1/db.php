<?php 
$serverName = 'EGRPO';//'programmer-test'; 
$connParams = array('Database'=>'statuz','UID'=>'access', 'PWD'=>'access', 'CharacterSet' => 'UTF-8'); 
$con = sqlsrv_connect($serverName, $connParams); 
sqlsrv_query( $con, 'SET NAMES utf8');
?>