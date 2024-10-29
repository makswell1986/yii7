<?php session_start(); ?>
<html>
<head>
<title>Главная страница</title>
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/signin.css" rel="stylesheet">
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
            color:#333333;
        }
        .active_a {
            /*background: white !important;*/
            border-radius: 5px;
                }
                  
    </style>
</head>
<body>
<?php
include("db.php");
if (isset($_COOKIE['login']) and isset($_COOKIE['password'])) {
    $_SESSION['password'] = $_COOKIE['password']; 
    $_SESSION['login'] = $_COOKIE['login'];
    $_SESSION['id'] = $_COOKIE['id'];
}
if (!empty($_SESSION['login']) and !empty($_SESSION['password'])) {
  $login = $_SESSION['login'];
  $password = $_SESSION['password'];
  $sql = "SELECT id FROM [dbo].[usr] WHERE login='$login' AND password='$password' AND activation='1'";
  $result = sqlsrv_query($con, $sql);
  $myrow = sqlsrv_fetch_array($result);
}
?>
<?php
if (!isset($myrow['id']) or $myrow['id'] == '') {
?>
<div class="container">
	<form action="testreg.php" method="post" class="form-signin">
        <h2 style="color:#BFBFBF;" class="form-signin-heading">Вход в систему</h2>
        <label for="inputtext" class="sr-only">Логин:</label>
        <input type="text" name="login" id="inputtext" class="form-control" placeholder="login:" required autofocus>
        <label for="inputPassword" class="sr-only">Пароль:</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Parol:" required>
        <div class="checkbox">
          <label>
            <input type="hidden" value="remember-me">
          </label>
        </div>
        <button style="background-color:#41CAC0;" class="btn btn-info" name="submit" type="submit">Вход</button>
	</form>
</div>
<?php
} else {
?>  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  	<div class="collapse navbar-collapse" id="navbar1">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active_a">
        		<a class="nav-link" href="index.php">Главная</a>
      		</li>
      </ul>
  		<button class="btn btn-outline-info my-2 my-sm-0"  onclick="window.location.href='exit.php'" type="submit">Выход</button>
  	</div>
</nav>
<?php
include("view.php");
}
?>
</body>
</html>