<?php
include "koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

	$query = mysql_query("select * from dosen where username='$username' and password='$password'");
	echo "select * from dosen where username='$username' and password='$password'";
	$count = mysql_num_rows($query);
	$row = mysql_fetch_array($query);

	if($count == 1)
		{
			session_start();
			if(!isset($_SESSION[uid]))
				$_SESSION[uid] = $row['id'];
			header ("location:dosen.php");
		}
		else
		{
			//echo "<script> alert('Usersname atau Password Salah');
			//location='login.php';
			//</script>";
		}
?>