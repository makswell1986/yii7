﻿<?php
session_start();
if (empty($_SESSION['login']) or empty($_SESSION['password'])) 
{
//если не существует сессии с логином и паролем, значит на этот файл попал невошедший пользователь. Ему тут не место. Выдаем сообщение об ошибке, останавливаем скрипт
exit ("Ro`yhatdan o`tganlar uchun ruxsat bor<br><a href='index.php'>Asosiy sahifa</a>");
}

unset($_SESSION['password']);
unset($_SESSION['login']); 
unset($_SESSION['id']);// уничтожаем переменные в сессиях

setcookie("auto", "", time()+9999999);//очищаем автоматический вход
exit("<html><head><meta http-equiv='Refresh' content='0; URL=index.php'></head></html>");
// отправляем пользователя на главную страницу.
?>