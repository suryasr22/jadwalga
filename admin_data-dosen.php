<?php
  //Library
  include "/process/koneksi.php";
  include "/process/session_check.php";

  //Ambil data
  $dataDosen = $conn->query("SELECT * FROM dosen");

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
      <a class="navbar-brand text-white">Dashboard Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="dasbor_admin.php">Jadwal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_data-makul.php">Mata Kuliah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin_data-ruangan.php">Ruangan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="admin_data-dosen.php">Dosen</a>
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
    <h2 class="mt-5 text-center">Daftar Dosen</h2>
    <hr><br>
    <table class="table mx-auto table-dark table-striped table-bordered table-advance table-hover table-responsive-sm col-12">
          <thead>
            <th>Pilih</th>
            <th>Nama Dosen</th>
            <th>NIP</th>
            <th>Email</th>
          </thead>
          <tbody>
            <?php
            //kayak mana ni om
            while($dosen = $dataDosen->fetch_assoc()){
              echo "
                <tr>
                  <td>
                  </td>
                  <td>
                    $dosen[nama]
                  </td>
                  <td>
                    $dosen[nip]
                  </td>
                  <td>
                    $dosen[email]
                  </td>
              ";
              echo "
                  <td align =\"right\">
                    <a onclick =\"return confirm('Yakin Ingin menghapus data?')\" href=\"process/delete_dosen.php?id_dosen=$dosen[id]\" class=\"btn btn-danger btn-sm\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
                  </td>
                </tr>
              ";
            }
            ?>
          </tbody>
    </table>
    <a href="admin_tambah-dosen.php" class="btn btn-primary active" role="button" aria-pressed="true">Tambah Dosen</a>
  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
