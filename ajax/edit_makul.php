<?php
	//include
	include "../process/koneksi.php";

	//ambil parameter
	$id_makul = $_GET['id'];

	//ambil data
	$result = $conn->query("SELECT * FROM matakuliah WHERE id = '$id_makul'");
	$makul = $result->fetch_assoc();
	//echo "SELECT nama_pasien FROM pasien WHERE nama_pasien LIKE '%$q%'";

	//balikin
	$data = '
		<div class="container-fluid">
		   	  	<div class="row">
		     		<div class="col-6">
			      		<div class="dropdown">
						  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih</button>
						  <div class="dropdown-menu" id="dropdown_menu" aria-labelledby="dropdownMenuButton">
							  <a class="dropdown-item" href="#">Semester 1</a>
							  <a class="dropdown-item" href="#">Semester 2</a>
							  <a class="dropdown-item" href="#">Semester 3</a>
							  <a class="dropdown-item" href="#">Semester 4</a>
							  <a class="dropdown-item" href="#">Semester 5</a>
							  <a class="dropdown-item" href="#">Semester 6</a>
							  <a class="dropdown-item" href="#">Semester 7</a>
							  <a class="dropdown-item" href="#">Semester 8</a>
				  	      </div>
						</div>
		      		</div>
		    	</div>
		    </div>
	';	

// 	$cadangan = '<!--username-->
// 	        <div class="form-group">
// 	          <label class="col-sm-2 col-sm-2 control-label">Username</label>
// 	          <div class="col-sm-10">
// 	            <input type="text" class="form-control" name="username" id="username" value="' . $dosen['username'] . '" autocomplete="off" required>
// 	          </div>
// 	        </div>

// <!--password-->
// 	        <div class="form-group">
// 	          <label class="col-sm-2 col-sm-2 control-label">Password</label>
// 	          <div class="col-sm-10">
// 	            <input type="text" class="form-control" name="password" id="password" value="' . $dosen['password'] . '"; autocomplete="off" required>
// 	          </div>
// 	        </div>

// 	        ';

	echo $data;

	//Fungsi
	function GetData($conn, $sql){
	    $result = $conn -> query($sql);
	    //echo $result -> num_rows;
	    if($result -> num_rows > 0){
	      return $result -> fetch_assoc();
	    } else {
	      return false;
	    }
	}
?>