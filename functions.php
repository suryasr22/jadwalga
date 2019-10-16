<?php
	function GetData($conn, $sql){
	    $result = $conn -> query($sql);
	    //echo $result -> num_rows;
	    if($result -> num_rows > 0){
	      return $result -> fetch_assoc();
	    } else {
	      return false;
	    }
	}

	function SelectTarget($usrType){
		switch ($usrType) {
			case 0:
				//Admin
				return "dasbor_super-admin.php";
				break;
			case 1:
				//Dosen
				return "dasbor_admin.php";
				break;
			case 2:
				//Perawat
				return "dasbor_dosen.php";
				break;
		}
	}
?>