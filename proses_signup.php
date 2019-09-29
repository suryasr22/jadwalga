<?php
	
	$username = "";
	$nip = "";
	$errors = array();

	//hubungkan ke database
	$db = mysqli_connect('localhost', 'root', '', 'jadwal_ga');

	//jika tombol register di klik
	//if(isset($_POST['dosen'])) {
	$username = mysql_real_escape_string($_POST['username']);
	$nama = mysql_real_escape_string($_POST['nama']);
	//echo $_POST['username'];
	//echo $username . " ";
	$nip = mysql_real_escape_string($_POST['nip']);
	//echo $nip . " ";
	$email = mysql_real_escape_string($_POST['email']);
	//echo $email . " ";
	$password_1 = mysql_real_escape_string($_POST['password_1']);
	//echo $password_1 . " ";
	$password_2 = mysql_real_escape_string($_POST['password_2']);
	//echo $password_2 . " ";

	//untuk memastikan kolom benar" terisi
	if (empty($username)) {
		array_push($errors, "username harus diisi");
	}
	if (empty($nama)) {
		array_push($errors, "nama harus diisi");
	}
	if (empty($nip)) {
		array_push($errors, "NIP harus diisi ");
	}
	if (empty($email)) {
		array_push($errors, "email harus diisi ");
	}
	if (empty($password_1)) {
		array_push($errors, "password harus diisi ");
	}
	if (empty($password_2)) {
		array_push($errors, "password 2 harus diisi ");
	}
	if ($password_1 != $password_2) {
		array_push($errors, "
			password tidak cocok ");
	}

	//jika error tidak ditemukan simpan user ke database
	if (count($errors) == 0) {
		//enkripsi password sebelum memasukkan ke database
		$password = md5($password_1); 
		$sql ="INSERT INTO dosen (nama, username, nip, email, password) 
		VALUES ('$nama', '$username', '$nip', '$email', '$password')";
		mysqli_query($db, $sql);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "berhasil signin";
		header('location: signin.php?status=success'); //redirect ke homepage
	} else {
		//print error
		$errorLen = sizeof($errors);
		for($i = 0; $i < $errorLen; $i++){
			echo $errors[$i];
		}
		header('location: signin.php?status=fail');
	}

	//}

?>