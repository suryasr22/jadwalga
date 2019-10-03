<?php
  //Library
  include "koneksi.php";
  include "session_check.php";

  //Ambil data
  //$userData = GetData($conn, SelectTarget($_SESSION['tgt']));
  $dataMakul = $conn->query("SELECT * FROM matakuliah");
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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Dashboard Dosen</title>

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
<body class="vh-100 w-75 mx-auto shadow p-3 mb-5 bg-white rounded">
	<div class="container  col-7 w-50">
		<ul class="nav nav-tabs ">
			<li class="active"><a data-toggle="tab" href="#makul">Mata Kuliah</a></li>
			<li><a data-toggle="tab" href="#editakun">Edit Akun</a></li>
		</ul>

		<div class="tab-content align-middle">
			<div id="makul" class="table-responsive-sm tab-pane fade in active">
		  	<table class="w-auto table table-dark  table-hover table-sm table-bordered">
				<section id="container">
		   	  	<section id="main-content">
		   		<section class="wrapper">
		        	<div class="row mt">
	        			<div class="col-lg-12">
	            		<div class="table-responsive">
		              		<div class="row-auto">
		              			<br>
				        		<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#inputmakul">Input Makul</button>

								<!-- Modal -->
								<?php include ('modal_tambahmakul.php'); ?>

									
						    </div>
				        </div>
						</div>
					</div>

					<table class="table table-striped table-advance table-hover table-condensed">
		            	<thead>
			              <th>Mata Kuliah</th>
			              <th>SKS</th>
			            </thead>
	            		<tbody>
			              <?php
			              while($makul = $dataMakul->fetch_assoc()){
			                echo "
			                  <tr>
			                    <td>
			                      $matakuliah[sks]
			                    </td>
			                    <td>
			                      $matakuliah[nama]
			                    </td>
			                   ";

			                echo "
			                    </td>
			                    <td align =\"right\">
			                      <a href=\"edit_makul.php?id=$matakuliah[id]\" class=\"btn btn-primary btn-xs\" role=\"button\"><i class=\"fa fa-pencil\"></i></a>

			                    	<a onclick =\"return confirm('Yakin Ingin menghapus data?')\" href=\"hapus_makul.php?id_dosen=$dosen[id]\" class=\"btn btn-danger btn-xs\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
				                    </td>
				                  </tr>
				                ";
				              }
				              ?>
	           			</tbody>
            		</table>
            	</section>
				</section>
				</section>
			</table>
	  		</div>   
    	</div>

	    <!--Tabs-->
		<div id="editakun" class="tab-pane fade">
		<h3>Menu 1</h3>
		  <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>   
	</div>
</body>