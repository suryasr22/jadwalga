<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$id = $_GET['id'];
	$newpw = md5($_POST['newpw']);

	//SQL Command
	$id_user = GetData($conn, "SELECT users.id FROM users, user_admin WHERE users.id = user_admin.id_user AND user_admin.id_admin = $id")['id'];
	$sql = "UPDATE users SET password = '$newpw' WHERE id = '$id_user'";
	//echo $sql;

	//Masukkan data
	if($conn->query($sql) === TRUE){
		echo "<script> alert('Data berhasil diupdate');
		location='../profile.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal diupdate');
		location='../profile.php';
		</script>";
	}
?>