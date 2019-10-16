<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$nama = $_POST['nama'];
	$semester = $_POST['semester'];
	$sks = $_POST['sks'];

	//SQL command
	$sql = "INSERT INTO matakuliah (nama, semester, sks) VALUES ('$nama', '$semester', '$sks')";

	//Masukkan data
	if($conn->query($sql) === TRUE){
		echo "<script> alert('Data berhasil diinputkan');
		location='../makul.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal diinputkan');
		location='../makul.php';
		</script>";
	}

?>