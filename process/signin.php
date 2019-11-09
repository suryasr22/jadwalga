<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");


	//Parameter form
	$identity = $_POST['identity'];
	$password = md5($_POST['password']);

	$data_admin = GetData($conn, 
		"SELECT admin.id, email, password, role 
		FROM users, admin, user_admin 
		WHERE users.id = user_admin.id_user 
		AND admin.id = user_admin.id_admin 
		AND email = '$identity' 
		AND password = '$password'"
	);

	$data_dosen = GetData($conn, 
		"SELECT dosen.id, nip, email, password, role 
		FROM users, dosen, user_dosen 
		WHERE users.id = user_dosen.id_user 
		AND dosen.id = user_dosen.id_dosen 
		AND (nip = '$identity' OR email = '$identity')
		AND password = '$password'"
	);	

	if($data_admin){
		$tgt = SelectTarget($data_admin['role']);
		$uid = $data_admin['id'];

		if(!isset($_SESSION)){
			session_start();
			$_SESSION['uid'] = $uid;
			$_SESSION['tgt'] = $data_admin['role'];
		}
		//header ("location:../dasbor_dosen.php");
		header ("location:../" . $tgt);
	} else if ($data_dosen){
		$tgt = SelectTarget($data_dosen['role']);
		$uid = $data_dosen['id'];

		if(!isset($_SESSION)){
			session_start();
			$_SESSION['uid'] = $uid;
			$_SESSION['tgt'] = $data_admin['role'];
		}
		//header ("location:../dasbor_dosen.php");
		header ("location:../" . $tgt);
	} else {
		echo "<script> alert('NIP/Email atau Password Salah');
		location='../index.php';
		</script>";
	}
?>