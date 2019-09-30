<?php
  //Library
  include "koneksi.php";
  include "session_check.php";

  //Ambil data
  //$userData = GetData($conn, SelectTarget($_SESSION['tgt']));
  $dataDosen = $conn->query("SELECT * FROM dosen");
  //echo SelectTarget($_SESSION['tgt']);

  //Fungsi
  // function SelectTarget($usrType){
  //   switch ($usrType) {
  //     case 1:
  //       //Admin
  //       return "SELECT * FROM user_klinik WHERE username = '$_SESSION[uid]'";
  //       break;
  //     case 2:
  //       //Dokter
  //       return "SELECT * FROM dokter WHERE username = '$_SESSION[uid]'";
  //       break;
  //     case 3:
  //       //Perawat
  //       return "SELECT * FROM perawat WHERE username = '$_SESSION[uid]'";
  //       break;
  //   }
  // }

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
<head>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Dosen</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <link href="../assets/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- my script -->
    <script type="text/javascript">
      //JQUERY
      $(document).ready(function(){
        //search
        $("#search").keyup(function(){
          var search = document.getElementById("search").value;

          //console.log("ajax/uname_status.php?uname=" + uname);

          $.get("ajax/search_dokter.php?q=" + search, function(data, status){
            $("tbody").html(data);
          });
        });
      });
    </script>
</head>
<body>
	<div class="container">
		<div class="table-responsive-sm">
		<table class="w-auto table table-dark  table-hover table-sm table-bordered">
			<section id="container">
		   		<section id="main-content">
		   			<section class="wrapper">
			   			<h2><center>Daftar Jadwal</center></h2>
			          	<hr>
			        	<div class="row mt">
			        	<div class="col-lg-12">
			            <div class="table-responsive">

			            <form role="search">
			              <div class="form-group">
			                <div id="tabeldata_filter" class="dataTables_filter">
			                  <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="tabeldata" id="search"></label>
			                </div>
			              </div>
			            </form>

		        		<table class="table table-striped table-advance table-hover table-condensed">
		            	<thead>
			              <th>id</th>
			              <th>Nama Dosen</th>
			              <th>Username</th>
			              <th>NIP</th>
			              <th>Password</th>
			              <th>Email</th>
			            </thead>
		            		<tbody>
				              <?php
				              while($dosen = $dataDosen->fetch_assoc()){
				                echo "
				                  <tr>
				                    <td>
				                      $dosen[id]
				                    </td>
				                    <td>
				                      $dosen[nama]
				                    </td>
				                    <td>
				                      $dosen[username]
				                    </td>
				                    <td>
				                      $dosen[nip]
				                    </td>
				                    <td>
				                      $dosen[password]
				                    </td>
				                    <td>
				                      $dosen[email]
				                    </td>
				                ";

				                echo "
				                    </td>
				                    <td align =\"right\">
				                      <a href=\"edit_dosen.php?id=$dosen[id]\" class=\"btn btn-primary btn-xs\" role=\"button\"><i class=\"fa fa-pencil\"></i></a>

				                    	<a onclick =\"return confirm('Yakin Ingin menghapus data?')\" href=\"hapus_dosen.php?id_dosen=$dosen[id]\" class=\"btn btn-danger btn-xs\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
				                    </td>
				                  </tr>
				                ";
				              }
				              ?>
		           			</tbody>
		            	</table>
		            	<a href="add_dosen.php" style="float: right" class="btn btn-round btn-theme02" role="button">Tambah</a>
		        	</div>
		        	</div>
		        	</div>
			     	</section>
   		 		</section>
   			</section>
   		</table>
		</div>
	</div>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="inputmakul">
	  Input Makul
	</button>

	<!-- Modal -->
	<div class="modal fade" id="inputmakul" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-scrollable" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        ...
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>
</body>