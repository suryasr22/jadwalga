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
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Edit Makul</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <!-- Offline JQuery -->
    <script src="../assets/js/jquery-3.2.1.min.js"></script>

    <!-- Our Javascript -->
    <script src="../assets/js/ours/validation_edit.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
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
