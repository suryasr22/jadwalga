<?php
  //Library
  include "process/koneksi.php";
  include "process/session_check.php";

  //Ambil data
  $dataMakul = $conn->query("SELECT * FROM matakuliah");
  $dataDosen = $conn->query("SELECT * FROM dosen");
  $dataRuangan = $conn->query("SELECT * FROM ruangan");
  $dataAdmin = $conn->query("SELECT * FROM admin");
  $admin = $dataAdmin->fetch_assoc();
  $dosen = $dataDosen->fetch_assoc();
  $ruangan = $dataRuangan->fetch_assoc();

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

  <title>Dahsboard Admin</title>

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

<body class="w-75 mx-auto shadow-lg bg-white rounded">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand text-white">Dashboard SUPER Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="dasbor_super-admin.php">Jadwal
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sadmin_data-makul.php">Mata Kuliah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sadmin_data-ruangan.php">Ruangan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sadmin_data-admin.php">Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sadmin_data-dosen.php">Dosen</a>
          </li>
          <li class="nav-item">
            <a onclick ="return confirm('Yakin Ingin Keluar?')" href="process/proses_signout.php" class="btn nav-link" role="button">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container p-4 col-10">
    <br>
    <h2 class="mt-5 text-center">Daftar Jadwal</h2>
    <hr><br>
    <table class="table mx-auto table-dark table-striped table-bordered table-advance table-hover table-responsive-sm col-12">
          <thead>
            <th>Pilih</th>
            <th>Dosen Pengampu</th>
            <th>Nama Mata Kuliah</th>
            <th>Semester</th>
            <th>Sks</th>
            <th>Ruangan</th>
            <th>Edit</th>
          </thead>
          <tbody>
            <?php
            //kayak mana ni om
            while($makul = $dataMakul->fetch_assoc()){
              echo "
                <tr>
                  <td>
                  </td>
                  <td>
                    $dosen[nama]
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
                  <td>
                    $ruangan[ruangan]
                  </td>
              ";
              echo "
                  <td align =\"right\">
                    <a onclick =\"return confirm('Yakin Ingin menghapus data?')\" href=\"hapus_makul.php?id_dosen=$makul[id]\" class=\"btn btn-danger btn-sm\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
                  </td>
                </tr>
              ";
            }
            ?>
          </tbody>
    </table>     
    <a href="sadmin_tambah-jadwal.php" class="btn btn-primary active" role="button" aria-pressed="true">Tambah Jadwal</a>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
