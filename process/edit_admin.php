<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$email = $_POST['email'];

	//SQL Command
	$sql = "UPDATE admin SET nama = '$nama', email = '$email' WHERE id = '$id'";
	echo $sql;

	//Masukkan data
	if($conn->query($sql) === TRUE){
		echo "<script> alert('Data berhasil diupdate');
		location='../admin.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal diupdate');
		location='../admin.php';
		</script>";
	}

?>