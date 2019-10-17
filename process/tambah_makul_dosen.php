<?php
	//Libraries

	//Koneksi
	include("../koneksi.php");

	//Fungsi2
	include("../functions.php");

	//$array_id_makul = array();
	$id_dosen = $_GET['id'];

	foreach ($_POST as $key => $value) {
	    //echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
	    $pos = strpos($key, 'cb_');
	    if($pos !== false){
	    	$id_makul = substr($key, 3);
	    	//echo 'id is ' . $id;
	    	//array_push($array_id_makul, $id_makul);
	    	 $sql = "INSERT INTO dosen_makul (id_dosen, id_makul) VALUES ('$id_dosen', '$id_makul')";

    	 	if($conn->query($sql) === FALSE){
    	 		echo "<script> alert('Data gagal diinputkan');
				location='../dasbor_dosen.php';
				</script>";
			}
	    }
	}

	echo "<script> alert('Data berhasil diinputkan');
	location='../dasbor_dosen.php';
	</script>";

	// foreach ($array_id_makul as $key => $value) {
	// 	echo 'idx = ' . $key . ',val = ' .  $value;
	// }
?>