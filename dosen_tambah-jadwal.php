<?php
  //Library
  include "/process/koneksi.php";
  include "/process/session_check.php";

  //Ambil data
  $dataMakul = $conn->query("SELECT * FROM matakuliah");
  $dataJam = $conn->query("SELECT * FROM jam");
  $dataHari = $conn->query("SELECT * FROM hari");
  $jam = $dataJam->fetch_assoc();
  $hari = $dataHari->fetch_assoc();

  function GetData($conn, $sql){
    $result = $conn->query($sql);
    echo $result -> num_rows;
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
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</head>

<body class="w-75 p-4 mx-auto shadow-lg bg-white">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand text-white">Dashboard Dosen</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" href="dasbor_dosen.php">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dosen_profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a onclick ="return confirm('Yakin Ingin Keluar?')" href="process/proses_signout.php" class="btn nav-link" role="button">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <form class="form-group" method="POST" action="#">
    <div class="container p-4 col-9">
      <h2 class="mt-5 text-center">Tambah Jadwal</h2>
    <hr><br>
    <table class="table mx-auto table-dark table-striped table-bordered table-advance table-hover table-responsive-sm col-lg-12">
          <thead>
            <th>Pilih</th>
            <th>Nama Mata Kuliah</th>
            <th>Semester</th>
            <th>Sks</th>
            <th>Jam</th>
            <th>Hari</th>
          </thead>
          <tbody>
            <?php
            while($makul = $dataMakul->fetch_assoc()){
              echo "
                <tr>
                  <td>
                  </td>
                  <td>
                    $makul[nama]
                  </td>
                  <td>
                    $makul[semester]
                  </td>
                  <td>
                    $makul[sks]
                  </td>
              ";
              echo "
                  <td align =\"right\">
                    <a class=\"btn btn-primary btn-sm dropdown-toggle\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" role=\"button\">Pilih jam</a>
                  </td>
                  <td align =\"right\">
                    <a class=\"btn btn-primary btn-sm dropdown-toggle\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\" role=\"button\">Pilih Hari</a>
                  </td>
                </tr>
              ";
            }
            ?>
          </tbody>
    </table>  
    <button type="submit" class="btn btn-primary">Tambah</button>   
  </div>
</form>
  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
