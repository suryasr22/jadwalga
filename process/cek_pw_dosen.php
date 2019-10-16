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
	$password = GetData($conn, "SELECT users.password FROM dosen, user_dosen, users WHERE dosen.id = $id AND users.password = '$pw' AND dosen.id = user_dosen.id_dosen AND users.id = user_dosen.id_user")['password'];

	if($password === $pw){
		echo 'yes';
	} else {
		echo 'no';
	}
?>