<?php
	//Include file koneksi
	include "koneksi.php";

	//Ambil parameter
	//dosen
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$nip = $_POST['nip'];
	$email = $_POST['email'];

	//akun dosen
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	//dosen
	$sql1 = "INSERT INTO dosen(nama, username, nip, email) VALUES ('$nama', '$username', '$nip', '$email')";

	//Masukkan data
	if($conn->query($sql1) === TRUE && $conn->query($sql1) === TRUE){
		echo "<script> alert('Data berhasil diinputkan');
		location='dosen.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal diinputkan');
		location='dosen.php';
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