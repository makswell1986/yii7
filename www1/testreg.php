<?php session_start();
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (empty($login) or empty($password)) 
{
exit ("Ошибка "); 
}
// $login = stripslashes($login);
// $login = htmlspecialchars($login);
// $password = stripslashes($password);
// $password = htmlspecialchars($password);
$login = trim($login);
$password = trim($password);
include ("db.php");


$sql = "SELECT * FROM [dbo].[usr] WHERE login='$login' AND password='$password' AND activation='1'";
$result = sqlsrv_query($con,$sql);
$myrow = sqlsrv_fetch_array($result);
if (empty($myrow['id']))
{
exit ("Неверный логин или пароль"); 
}
else {

          $_SESSION['password']=$myrow['password']; 
		  $_SESSION['login']=$myrow['login']; 
          $_SESSION['id']=$myrow['id'];

}	

echo "<meta http-equiv='Refresh' content='0; URL=index.php'>";
?>