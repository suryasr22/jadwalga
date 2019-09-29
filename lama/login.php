<?php

$host="localhost";
$user="root";
$password="";
$db="jadwal_ga"

mysql_connect($host,$username,$password);
mysql_select_db($db);

if (isset($_POST['username'])) {

	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$sql="select * from logindosen where username='".$username."' AND password='".$password."' limit 1";

	$result=mysql_query($sql);

	if(mysql_num_rows($result)--1){
		echo "Login Berhasil";
		exit();
	}
	else{
		echo "Password salah";
	}


}


?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Login
	</title>
	<link rel="stylesheet" type="text/css" href="Login.css">
<body>
	<div class="loginbox">
		<img src="avatar.png" class="avatar">
		<h1>Silahkan Login</h1>
		<form method="POST" action="#">
			<p>Username</p>
			<input type="text" name="username" placeholder="Masukkan Username">
			<p>Password</p>
			<input type="password" name="password" placeholder="Masukkan kata sandi">
			<input type="Submit" name="" value="Login">
			<a href="#">lupa password?</a><br>
			<a href="#">tidak punya akun?</a>
		</form>
	</div>
</body>
</head>
</html>