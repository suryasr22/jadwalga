<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$id = $_GET['id'];

	//dokter
	$sql = "DELETE dosen, user_dosen, users FROM dosen INNER JOIN user_dosen INNER JOIN users WHERE dosen.id = $id AND user_dosen.id_dosen = dosen.id AND user_dosen.id_user = users.id";

	//echo $sql;

	//Masukkan data
	if($conn->query($sql) === TRUE){
		echo "<script> alert('Data berhasil dihapus');
		location='../dosen.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal dihapus');
		location='../dosen.php';
		</script>";
	}

?>