<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$semester = $_POST['semester'];
	$sks = $_POST['sks'];

	//SQL Command
	$sql = "UPDATE matakuliah SET nama = '$nama', semester = '$semester', sks = '$sks' WHERE id = '$id'";
	//echo $sql;

	//Masukkan data
	if($conn->query($sql) === TRUE){
		echo "<script> alert('Data berhasil diupdate');
		location='../makul.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal diupdate');
		location='../makul.php';
		</script>";
	}

?>