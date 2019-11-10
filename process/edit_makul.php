<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$id = $_GET['id'];
	$kode = $_POST['kode'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$semester = $_POST['semester'];
	$sks = $_POST['sks'];

	//SQL Command
	$sql = "UPDATE matakuliah SET kode = '$kode', nama = '$nama', kelas = '$kelas', semester = '$semester', sks = '$sks' WHERE id = '$id'";
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