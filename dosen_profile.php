<?php
  //Library
  include "/process/koneksi.php";
  include "/process/session_check.php";

  //Ambil data

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
            <a class="nav-link" href="dasbor_dosen.php">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="dosen_profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a onclick ="return confirm('Yakin Ingin Keluar?')" href="process/proses_signout.php" class="btn nav-link" role="button">Sign Out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <!-- Page Content -->
    <form class="col-7 mx-auto" method="POST" action="#">
      <br>
        <h2 class="mt-5 text-center">Ubah Profil</h2>
      <hr>
      <small id="emailHelp" class="form-text text-muted text-center">Isi data yang ingin di ubah saja</small>
      <br>
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" id="namadosen" aria-describedby="masukkan nama" placeholder="masukkan nama">
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" id="username" aria-describedby="masukkan nama" placeholder="masukkan username">
      </div>
      <div class="form-group">
        <label>Old Password</label>
        <input type="password" class="form-control" id="oldpw" aria-describedby="masukkan nama" placeholder="masukkan password lama">
      </div>
      <div class="form-group">
        <label>New Password</label>
        <input type="password" class="form-control" id="newpw" aria-describedby="masukkan nama" placeholder="masukkan password baru">
      </div>
      <div class="form-group">
        <label>Confirm New Password</label>
        <input type="password" class="form-control" id="confirmnewpw" aria-describedby="masukkan nama" placeholder="konfirmasi password baru">
      </div>
      <div class="form-group">
        <label>Nip</label>
        <input type="text" class="form-control" id="namadosen" aria-describedby="masukkan nama" placeholder="masukkan nip">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control" id="namadosen" aria-describedby="masukkan nama" placeholder="masukkan email">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
