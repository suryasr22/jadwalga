<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$nama = $_POST['nama'];

	//SQL command
	$sql = "INSERT INTO ruangan (nama) VALUES ('$nama')";

	//Masukkan data
	if($conn->query($sql) === TRUE){
		echo "<script> alert('Data berhasil diinputkan');
		location='../ruangan.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal diinputkan');
		location='../ruangan.php';
		</script>";
	}

?>