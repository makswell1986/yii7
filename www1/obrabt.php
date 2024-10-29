<? session_start();
header('Content-type: text/html; charset=utf-8');
include("db.php");

if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {

    $login = $_SESSION['login'];
    $password = $_SESSION['password'];
    $sql = "SELECT id FROM [dbo].[usr] WHERE login='$login' AND password='$password' AND activation='1'";
    $result2 = sqlsrv_query($con, $sql);
    $myrow2 = sqlsrv_fetch_array($result2);
    if (empty($myrow2['id'])) {

        exit("Вход на эту страницу разрешен только зарегистрированным пользователям!");
    }
} else {

    exit("Вход на эту страницу разрешен только зарегистрированным пользователям!");
}

if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
    
  $reg_nom=$_GET['reg_nom'];
  
  $dlina=strlen($reg_nom);
  if($dlina!=6)
  {
    exit('XATOLIK! Jahongir bilan bog`laning yeb qo`ydiz :-(');
  }
  
	

	
	
	
   
    ?>
<html>
<head>
<title>Главная страница</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/signin.css" rel="stylesheet">
	<link href="bootstrap/font-awesome.min.css" rel="stylesheet">
	
    <script src="bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <style>
        th{
            position: sticky;
            top: 0;
            background:#059fff; 
            border:1px solid #808080;
            background-clip: padding-box;
            color:#fff;
        }
        .active {
            /*background: green !important;*/
        }
                  
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  	<div class="collapse navbar-collapse" id="navbar1">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        		<a class="nav-link" href="index.php">Главная</a>
      </li>
      </ul>
      		<button class="btn btn-outline-info my-2 my-sm-0"  onclick="window.location.href='exit.php'" type="button">Выход</button>
  	</div>
</nav>
<div class="text-center" style="padding-left:25px;padding-top:5%;">
<table border="1">
<tr>
<th>NoteId</th>
<th>OKPO</th>
<th>NAME</th>
<th>INN</th>
<th>REG_NOM</th>
<th>REG_DATA</th>
<th></th>
</tr>
<?php 

 // if(empty($myrow['NoteId']))
	// {
    // exit('XATOLIK! Jahongir bilan bog`laning yeb qo`ydiz :-(');
	// }

    $sql2 = "SELECT count(REG_NOM) as tn FROM [dbo].[notices]  WHERE  REG_NOM='$reg_nom'";
    $result2 = sqlsrv_query($con, $sql2);
	$myrow2 = sqlsrv_fetch_array($result2);
	$tn=$myrow2['tn'];
	

	$sql1 = "SELECT NoteId,OKPO,NAME,INN,REG_NOM,REG_DATA FROM [dbo].[notices] WHERE REG_NOM='$reg_nom'";
    $result = sqlsrv_query($con, $sql1);
	while($myrow = sqlsrv_fetch_array($result))
	{
	?>
	
<tr>
<td><? echo $myrow['NoteId'];?></td>
<td><? echo $myrow['OKPO'];?></td>
<td><? echo $myrow['NAME'];?></td>
<td><? echo $myrow['INN'];?></td>
<td><? echo $myrow['REG_NOM'];?></td>
<td><? echo $myrow['REG_DATA']->format('Y-m-d H:m:s');?></td>
<td><? 
if($tn<2)
{

if(empty($myrow['INN'])) 
{
?>
<form action="yuborish.php" method="GET"><input type="hidden" name="okpo" value="<? echo $myrow['OKPO'];?>"><button type="submit" class="btn btn-success">Yuborish</button></form>
<?
}
else
{
?>
<span><img src="img/checked.png"></span>
<?
}

}
else
{
if(empty($myrow['INN'])) 
{
?>
<form action="uchirish.php" method="GET">
<input type="hidden" name="NoteId" value="<? echo $myrow['NoteId'];?>">
<input type="hidden" name="REG_NOM" value="<? echo $myrow['REG_NOM'];?>">
<button type="submit" class="btn btn-light"><img src="img/delete.png">
</button>
</form>
<? 
}
else
{ echo '<span><img src="img/checked.png"></span>'; }
}
?></td>
</tr>
<?	
}
?>
</table>
</div>
</body>
</html>
<?php
}
?>