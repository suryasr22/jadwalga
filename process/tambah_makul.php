<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$kode = $_POST['kode'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$semester = $_POST['semester'];
	$sks = $_POST['sks'];

	//SQL command
	$sql = "INSERT INTO matakuliah (kode, nama, semester, sks) VALUES ('$kode', '$nama', '$kelas', '$semester', '$sks')";

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