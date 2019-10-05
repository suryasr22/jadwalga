<?php
	//include
	include "../process/koneksi.php";

	//ambil parameter
	$id_dosen = $_GET['id'];

	//ambil data
	$result = $conn->query("SELECT * FROM dosen WHERE id = '$id_dosen'");
	$dosen = $result->fetch_assoc();
	//echo "SELECT nama_pasien FROM pasien WHERE nama_pasien LIKE '%$q%'";

	//balikin
	$data = '
		<form class="form-horizontal style-form" method="post" action ="act/edit_dosen.php?id=$dosen[id]">
	        <!--id-->
	        <div class="form-group">
	          	<label for="id_dosen">id</label>
            	<input type="text" class="form-control" name="id_dosen" id="id_dosen" value=" ' . $dosen['id'] . '" autocomplete="off" required>
	        </div>

	        <!--nama_dosen-->
	        <div class="form-group">
          		<label for="nama_dosen">Nama Dosen</label>
            	<input type="text" class="form-control" name="nama_dosen" id="nama_dosen" value="' . $dosen['nama'] . '" autocomplete="off" required>
	        </div>

	        <!--nip-->
	        <div class="form-group">
          		<label for="nip">NIP</label>
	            <input type="text" class="form-control" name="nip" id="nip" value="' . $dosen['nip'] . '" autocomplete="off" required>
	        </div>

	        <!--email-->
	        <div class="form-group">
      			<label for="email">Email</label>
            	<input type="email" class="form-control" name="email" id="email" value="' . $dosen['email'] . '" autocomplete="off" required>
	        </div>

	        <center>
	          <button class="btn btn-primary" type="submit" name="submit" id="submit">Submit</button>
	        </center>
	        <br>
	    </form>
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