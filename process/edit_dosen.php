<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$nip = $_POST['nip'];
	$email = $_POST['email'];

	//SQL Command
	$sql = "UPDATE dosen SET nama = '$nama', nip = '$nip', email = '$email' WHERE id = '$id'";
	echo $sql;

	//Masukkan data
	if($conn->query($sql) === TRUE){
		echo "<script> alert('Data berhasil diupdate');
		location='../dosen.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal diupdate');
		location='../dosen.php';
		</script>";
	}

?>