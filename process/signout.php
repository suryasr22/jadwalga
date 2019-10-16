<?php
	session_start();
	if(isset($_SESSION['uid']) || isset($_SESSION['tgt'])){
		unset($_SESSION['uid']);
		unset($_SESSION['tgt']);
		session_destroy();
		header ("location:../index.php");
	}
	header ("location:../index.php");
?>