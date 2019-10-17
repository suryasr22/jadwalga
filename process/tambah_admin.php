<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$username = $_POST['username'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password_1 = $_POST['password_1'];
	$password_2 = $_POST['password_2'];

	//enkripsi password sebelum memasukkan ke database
	$password = md5($password_1); 

	//SQL command
	$adm = GetData($conn, "SELECT AUTO_INCREMENT AS max FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'jadwal_ga' AND TABLE_NAME = 'admin'");
	$maxAdm = $adm['max'];
	$usr = GetData($conn, "SELECT AUTO_INCREMENT AS max FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'jadwal_ga' AND TABLE_NAME = 'users'");
	$maxUsr = $usr['max'];
	//dokter
	$sql1 = "INSERT INTO admin (nama, email) VALUES ('$nama', '$email')";
	//username
	$sql2 = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 1)";
	//link
	$sql3 = "INSERT INTO user_admin (id_user, id_admin) VALUES ('$maxUsr', '$maxAdm')";

	//Masukkan data
	if($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE){
		echo "<script> alert('Data berhasil diinputkan');
		location='../admin.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal diinputkan');
		location='../admin.php';
		</script>";
	}

?>