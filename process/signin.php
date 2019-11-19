<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");


	//Parameter form
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	//Ambil data
	$data = GetData($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
	$tgt = SelectTarget($data['role']);
	$uid = $data['id'];

	if($data){
		if(!isset($_SESSION)){
			session_start();
			$_SESSION['uid'] = $uid;
			$_SESSION['tgt'] = $data['role'];
		}
		//header ("location:../dasbor_dosen.php");
		header ("location:../" . $tgt);
	} else {
		echo "<script> alert('Username atau Password Salah');
		location='../index.php';
		</script>";
	}
?>