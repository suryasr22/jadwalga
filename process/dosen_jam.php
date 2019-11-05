<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	//$array_id_makul = array();
	$id_dosen = $_GET['id'];

	//var buat nyimpen string sql
	$filter = '';
	$insert = '';

	//cek adanya data
	foreach ($_POST as $key => $value) {
	    $pos = strpos($key, 'cb_j_');
	    if($pos !== false){
	    	$id_jam = substr($key, 5);

	    	$filter = $filter . 'id_jam = ' . $id_jam . ' OR ';

	    	$sql = "SELECT * FROM dosen_jam WHERE id_dosen = $id_dosen AND id_jam = $id_jam";

	    	if($result = $conn->query($sql)){
	    		$rows = $result->num_rows;

	    		if($rows === 0)
	    			$insert = $insert . '(' . $id_dosen . ', ' .  $id_jam . '), ';	    		
	    	}
	    }
	}

	$len = strlen($insert);
	$start = $len - 2;
	$insert = substr($insert, 0, $start);
	$sql2 = "INSERT INTO dosen_jam(id_dosen, id_jam) VALUES " . $insert;

	$len1 = strlen($filter);
	$start1 = $len1 - 4;
	$filter = substr($filter, 0, $start1);
	$sql3 = "DELETE dosen_jam.* FROM dosen_jam LEFT JOIN (SELECT * FROM dosen_jam WHERE " . $filter . " group by id_jam) a ON a.id_jam = dosen_jam.id_jam WHERE dosen_jam.id_dosen = $id_dosen AND a.id_dosen IS NULL AND a.id_jam IS NULL";

	if($insert != ''){
		if($conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE){
			echo "<script> alert('Data berhasil diinputkan');
			location='../dasbor_dosen.php';
			</script>";
		} else {
			echo "<script> alert('Data gagal diinputkan');
			location='../dasbor_dosen.php';
			</script>";
		}
	} else {
		if($conn->query($sql3) === TRUE){
			echo "<script> alert('Data berhasil diinputkan');
			location='../dasbor_dosen.php';
			</script>";
		} else {
			echo "<script> alert('Data gagal diinputkan');
			location='../dasbor_dosen.php';
			</script>";
		}
	}
	
?>