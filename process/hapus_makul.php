<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$id = $_GET['id'];

	//dokter
	$sql = "DELETE FROM matakuliah WHERE id = $id";

	//echo $sql;

	//Masukkan data
	if($conn->query($sql) === TRUE){
		echo "<script> alert('Data berhasil dihapus');
		location='../makul.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal dihapus');
		location='../makul.php';
		</script>";
	}

?>