<?php
  //Library
  include "process/koneksi.php";
  //include "process/session_check.php";

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
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <title>Dasbor Admin</title>

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
		<h2><center>Dasbor Admin</center></h2>
  		<hr>
		<ul class="nav nav-tabs ">
			<li class="active"><a data-toggle="tab" href="#dosen">Dosen</a></li>
			<li><a data-toggle="tab" href="#makul">Makul</a></li>
			<li><a data-toggle="tab" href="#jadwal">Jadwal</a></li>
		</ul>

		<div class="tab-content align-middle">

			<!--KONTEN TAB-->

			<!--TAB DOSEN-->
			<div id="dosen" class="tab-pane fade in active">
				<?php include('tab_dosen.php');?>
			</div>

			<!--TAB MAKUL-->
			<div id="makul" class="tab-pane fade">
				<?php include('tab_makul.php');?>
			</div>

			<!--TAB JADWAL-->
			<div id="jadwal" class="tab-pane fade">
				TBD
			</div>
		</div>
	</div>
</body>