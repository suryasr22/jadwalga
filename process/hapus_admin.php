<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$id = $_GET['id'];

	//dokter
	$sql = "DELETE admin, user_admin, users FROM admin INNER JOIN user_admin INNER JOIN users WHERE admin.id = $id AND user_admin.id_admin = admin.id AND user_admin.id_user = users.id";

	//echo $sql;

	//Masukkan data
	if($conn->query($sql) === TRUE){
		echo "<script> alert('Data berhasil dihapus');
		location='../admin.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal dihapus');
		location='../admin.php';
		</script>";
	}

?>