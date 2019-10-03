<?php
	//Include file koneksi
	include "koneksi.php";

	//Ambil parameter
	//dosen
	$namamakul = $_POST['nama'];
	$sks = $_POST['sks'];

	//akun dosen
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	//dosen
	$sql1 = "INSERT INTO matakuliah (nama_makul, sks) VALUES ('$namamakul', '$sks')";

	//Masukkan data
	if($conn->query($sql1) === TRUE && $conn->query($sql1) === TRUE){
		echo "<script> alert('Data berhasil diinputkan');
		location='admin.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal diinputkan');
		location='admin.php';
		</script>";
	}

	//Fungsi
	function GetData($conn, $sql){
    $result = $conn -> query($sql);
    //echo $result -> num_rows;
    if($result -> num_rows > 0){
      return $result -> fetch_assoc();
    } else {
      return false;
    }
  }

?>