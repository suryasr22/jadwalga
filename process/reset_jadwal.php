<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	//SQL Command
	$sql = "TRUNCATE TABLE jadwal";
	//echo $sql;

	//Masukkan data
	if($conn->query($sql) === TRUE){
		echo "<script> alert('Jadwal berhasil dikosongkan.');
		location='../jadwal.php';
		</script>";
	} else {
		echo "<script> alert('Jadwal gagal dikosongkan.');
		location='../jadwal.php';
		</script>";
	}

?>