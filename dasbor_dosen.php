<?php
  //Library
  include "/process/koneksi.php";
  include "/process/session_check.php";

  //Ambil data
  $dataMakul = $conn->query("SELECT * FROM matakuliah");

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
    <link href="css/font-awesome/css/font-awesome.css" rel="stylesheet" />

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

        <!--konten-->
    		<div class="tab-content align-middle">
    			<?php include('tab_tambah-makul.php'); ?>
        </div>

        <!--Tabs-->
    		<div id="editakun" class="tab-pane fade">
          <?php include('tab_edit-akun.php'); ?>
    		</div>   
  	</div>
</body>