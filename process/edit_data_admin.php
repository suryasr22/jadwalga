<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$email = $_POST['email'];

	//echo $id;

	//SQL Command
	$id_user = GetData($conn, "SELECT users.id FROM users, user_admin WHERE users.id = user_admin.id_user AND user_admin.id_admin = $id")['id'];
	$sql = "UPDATE admin SET nama = '$nama', email = '$email' WHERE id = '$id'";
	$sql2 = "UPDATE users SET username = '$username' WHERE id = '$id_user'";
	//echo $sql;

	//Masukkan data
	if($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE){
		echo "<script> alert('Data berhasil diupdate');
		location='../profile.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal diupdate');
		location='../profile.php';
		</script>";
	}
?>