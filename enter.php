<?php
session_start();
if($_SESSION['admin']){
 header("Location: admin.php");
 exit;
}
$admin = 'admin';
$pass = 'd356a0905dedf6de465000839edc24c5';

if($_POST['submit']){
 if($admin == $_POST['user'] AND $pass == md5($_POST['pass'])){
  $_SESSION['admin'] = $admin;
  header("Location: admin.php");
  exit;
 }else echo '<p>Логин или пароль неверны!</p>';
}
?>
<p> | <a href="admin.php">Менеджер</a></p>
<hr />
Это страница авторизации.
<br />
<form method="post">
 Username: <input type="text" name="user" /><br />
 Password: <input type="password" name="pass" /><br />
 <input type="submit" name="submit" value="Войти" />
</form>
