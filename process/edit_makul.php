<?php
  //Library
  include "koneksi.php";
  include "session_check.php";

  //Ambil data
  $dataMakul = $conn->query("SELECT * FROM matakuliah WHERE matakuliah.id = $_GET[id]");
  //echo "SELECT * FROM dokter, detail_akun_dokter, user_klinik WHERE dokter.id_dokter = detail_akun_dokter.id_dokter AND detail_akun_dokter.id_user_klinik = user_klinik.id_user_klinik AND dokter.id_dokter = $_GET[id_dokter]";.
  $makul = $dataMakul->fetch_assoc();
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

  function GetData($conn, $sql){
    $result = $conn->query($sql);
    //echo $result -> num_rows;
    if($result -> num_rows > 0){
      return $result -> fetch_assoc();
    } else {
      return false;
    }
  }
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dahsboard Dosen</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>

<body class="w-75 mx-auto shadow-lg bg-white">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
    <div class="container">
      <a class="navbar-brand" href="#">Dashboard Dosen</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Mata Kuliah
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Dosen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container mh-100">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="mt-5 text-center">Edit Mata Kuliah</h1>

  <section id="container" >
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h2><center>Data Mata Kuliah</center></h2>
            <hr>
          	<div class="row mt">
              <div class="col-lg-2">
              </div>
          		<div class="col-lg-8">
            		<center>
                  <div class="form-panel">
                  <h4 class="mb"><center>Pengubahan Data</center></h4>
                  <br>

                  <form class="form-horizontal style-form" method="post" action = <?php echo "\"act/edit_makul.php?id=$matakuliah[id]\""?>>

                    <!--nama_makul-->
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Nama Mata Kuliah</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_makul" id="nama_makul" value=<?php echo "\"$matakuliah[nama]\"";?> autocomplete="off" required>
                      </div>
                    </div>

                    <!--sks-->
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">SKS</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="sks" id="sks" value=<?php echo "\"$matakuliah[sks]\"";?> autocomplete="off" required>
                      </div>
                    </div>

                    <center>
                      <button class="btn btn-theme" type="submit" name="submit" id="submit">Submit</button>
                      <button type="button" class="btn" onclick="history.back(-1)">Cancel</button>
                    </center>
                    <br>
                  </form>
                </div>
              </div><!-- col-lg-12-->
            </div><!-- /row -->
              </center>
          		</div>
          	</div>
		      </section>
      </section>
  </section>
  </body>
</html>
