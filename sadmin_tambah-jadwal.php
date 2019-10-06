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

  <title>Dashboard SUPER Admin</title>

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
            <a onclick ="return confirm('Yakin Ingin Keluar?')" href="proses_signout.php" class="btn nav-link" role="button">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
    <form class="form-group" method="POST" action="#">
      <div class="container p-4 col-10">
        <h2 class="mt-5 text-center">Tambah Jadwal</h2>
      <hr><br>
      <table class="table mx-auto table-dark table-striped table-bordered table-advance table-hover table-responsive-sm col-lg-12">
            <thead>
              <tr scope="row">
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col" colspan="5" class="text-center">hari</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <tr>
                <th>No</th>
                <th>Jam</th>
                <th>Senin</th>
                <th>Selasa</th>
                <th>Rabu</th>
                <th>Kamis</th>
                <th>Jum'at</th>
              </tr>
              <tr>
                <th>1</th>
                <td>08:00 - 08:45</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
              <tr>
                <th>2</th>
                <td>08:45 - 09:30</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
              <tr>
                <th>3</th>
                <td>09:30 - 10:15</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
              <tr>
                <th>4</th>
                <td>10:15 - 11:00</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
              <tr>
                <th>5</th>
                <td>11:00 - 11:45</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
              <tr>
                <th>6</th>
                <td>11:45 - 12:30</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
              <tr>
                <th>7</th>
                <td>13:00 - 13:45</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
              <tr>
                <th>8</th>
                <td>13:45 - 14:30</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
              <tr>
                <th>9</th>
                <td>14:30 - 15:15</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
              <tr>
                <th>10</th>
                <td>15:15 - 16:00</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
              <tr>
                <th>11</th>
                <td>16:00 - 16:45</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
              <tr>
                <th>12</th>
                <td>16:45 - 17:30</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
              <tr>
                <th>13</th>
                <td>17:30 - 18:15</td>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
                <th><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"></th>
              </tr>
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
