<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$id = $_GET['id'];
	$nama = $_POST['nama'];

	//SQL Command
	$sql = "UPDATE ruangan SET nama = '$nama' WHERE id = '$id'";
	//echo $sql;

	//Masukkan data
	if($conn->query($sql) === TRUE){
		echo "<script> alert('Data berhasil diupdate');
		location='../ruangan.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal diupdate');
		location='../ruangan.php';
		</script>";
	}

?>