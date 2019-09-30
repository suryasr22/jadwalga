<?php
	//Include file koneksi
	include "koneksi.php";

	//SQL command
	//ambil max value id dari tabel dokter ama user_klinik
	$sql1 = "DELETE dosen WHERE  dosen.id ='$_GET[id]'";
	//echo $sql1;

	//Masukkan data
	if($conn->query($sql1) === TRUE){
		echo "<script> alert('Data berhasil dihapus');
		location='dosen.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal dihapus');
		location='dosen.php';
		</script>";
	}

	//Fungsi
	function GetData($conn, $sql){
    $result = $conn -> query($sql1);
    //echo $result -> num_rows;
    if($result -> num_rows > 0){
      return $result -> fetch_assoc();
    } else {
      return false;
    }
  }

?>