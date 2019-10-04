<?php
	include "/process/koneksi.php";

	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$data = GetData($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
	$tgt = SelectTarget($data['role']);

	if($data){
		if(!isset($_SESSION)){
			session_start();
			$_SESSION["uid"] = $data["id"];
		}
		header ("location:dasbor-dosen.php");
		//header ("location:" . $tgt);
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

	function SelectTarget($usrType){
		switch ($usrType) {
			case 0:
				//Superfuk Admin Flash Ultimate Omega Burst Stream
				//return "../admin/dashboard.php";
				break;
			case 1:
				//Admin
				//return "../dokter/dashboard.php";
				break;
			case 2:
				//Dosen
				//return "../perawat/dashboard.php";
				break;
		}
	}
?>