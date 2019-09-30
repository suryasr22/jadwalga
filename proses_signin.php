<?php
	include "koneksi.php";

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$data = GetData($conn, "SELECT * FROM dosen WHERE username='$username' AND password='$password'");

	if($data){
		if(!isset($_SESSION)){
			session_start();
			$_SESSION["uid"] = $data["id"];
		}
		header ("location:dosen.php");
	} else {
		echo "<script> alert('Username atau Password Salah');
		location='signin.php';
		</script>";
		//echo "SELECT username, password, jenis_user FROM user_klinik WHERE username = '$uid' AND password = '$pw'";
	}

	function GetData($conn, $sql){
		$result = $conn -> query($sql);
		echo $result -> num_rows;
		if($result -> num_rows > 0){
			return $result -> fetch_assoc();
		} else {
			return false;
		}
	}
?>