<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	$id = $_GET['id'];
	$nama = $_POST['nama'];
	$nip = $_POST['nip'];
	$username = $_POST['username'];
	$email = $_POST['email'];

	//SQL Command
	$id_user = GetData($conn, "SELECT users.id FROM users, user_dosen WHERE users.id = user_dosen.id_user AND user_dosen.id_dosen = $id")['id'];
	$sql = "UPDATE dosen SET nama = '$nama', nip = '$nip', email = '$email' WHERE id = '$id'";
	$sql2 = "UPDATE users SET username = '$username' WHERE id = '$id_user'";
	//echo $sql;

	//Masukkan data
	if($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE){
		echo "<script> alert('Data berhasil diupdate');
		location='../profile.php';
		</script>";
	} else {
		echo "<script> alert('Data gagal diupdate');
		location='../profile.php';
		</script>";
	}
?>