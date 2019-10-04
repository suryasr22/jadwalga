<?php
  //Library
  include "koneksi.php";
  include "session_check.php";

  //Ambil data
  $dataDosen = $conn->query("SELECT * FROM dosen WHERE dosen.id = $_GET[id]");
  //echo "SELECT * FROM dokter, detail_akun_dokter, user_klinik WHERE dokter.id_dokter = detail_akun_dokter.id_dokter AND detail_akun_dokter.id_user_klinik = user_klinik.id_user_klinik AND dokter.id_dokter = $_GET[id_dokter]";.
  $dosen = $dataDosen->fetch_assoc();
  //echo SelectTarget($_SESSION['tgt']);

  //Fungsi
  function SelectTarget($usrType){
    switch ($usrType) {
      case 1:
        //Admin
        return "SELECT * FROM admin WHERE username = '$_SESSION[uid]'";
        break;
      case 2:
        //Dosen
        return "SELECT * FROM dosen WHERE username = '$_SESSION[uid]'";
        break;
    }
  }
?>


<!DOCTYPE html>
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="style.css">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="css/font-awesome/css/font-awesome.css" rel="stylesheet" />
</head>
<body>
	<div class="sign container col-md-7">
	  <div class="loginbox">        
	    <form class="form-group" method="POST" action="process/proses_signin.php">
	        <div class="row modal-header ">
	        	<h2 class="mx-auto">Sign In</h2>
	        </div>
	        <div class="modal-body container rounded-bottom">
	        	<div class="form-group">
	         		<label>Username</label>
	        		<input type="text" class="form-control " placeholder="Username" name="username">
	        	</div>
	        	<div class="form-group">
	        		<label>Password</label>
	        		<input type="password" class="form-control" placeholder="Password" name="password">
	       		</div>
	        	<div class="">
	        		<button type="submit" class="btn btn-primary">Sign in</button>
	            	<br><br>
	            	Belum punya punya akun? <a href="signup.php">Sign Up</a>
	        	</div>
	        </div>
	    </form>
    <?php
      if(isset($_GET['status'])){
        $status = $_GET['status'];

        if($status === 'success'){
          echo "
            <div class=\"alert alert-success\">
              <strong>Pendaftaran berhasil~!</strong>
            </div>
          ";
        } else {
          echo "
            <div class=\"alert alert-danger\">
              <strong>Pendaftaran gagal~!</strong>
            </div>
          ";
        }
      }
    ?>
  </div>
</div>
</body>