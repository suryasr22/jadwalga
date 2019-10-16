<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	//ambil parameter
	$pw = md5($_GET['pw']);
	$id = $_GET['id'];

	//ambil data
	$password = GetData($conn, "SELECT users.password FROM admin, user_admin, users WHERE admin.id = $id AND users.password = '$pw' AND admin.id = user_admin.id_admin AND users.id = user_admin.id_user")['password'];

	if($password === $pw){
		echo 'yes';
	} else {
		echo 'no';
	}
?>