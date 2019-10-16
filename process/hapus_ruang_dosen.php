<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	//$array_id_makul = array();
	$id_dosen = $_GET['idd'];
	$id_ruang = $_GET['idr'];

	//SQL Command
	$sql = "DELETE FROM dosen_ruang WHERE id_dosen = '$id_dosen' AND id_ruang = '$id_ruang'";
	//echo $sql;

	if($conn->query($sql) === TRUE){
		echo "<script> alert('Data berhasil dihapus');
		location='../dasbor_dosen.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal dihapus');
		location='../dasbor_dosen.php';
		</script>";
	}

	//echo "id dosen = " . $id_dosen . ", id makul = " . $id_makul;
?>