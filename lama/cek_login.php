<?php
	//ambil nilai dari singin.php
	$username = $POST['username'];
	$password = $POST['password'];

	//untuk atasi mysql injection
	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);

	//untuk menghubungkan server dan memilih database
	mysql_connect("localhost", "root", "");
	mysql_select_db("simple_ga");

?>