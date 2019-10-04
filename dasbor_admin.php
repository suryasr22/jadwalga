<?php
  //Library
  include "process/koneksi.php";
  //include "process/session_check.php";

  //Ambil data
  $dataDosen = $conn->query("SELECT * FROM dosen");
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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

      $('#btn-edit-dosen').click(function() {
        $.get($(this).attr('href'), function(msg){
            $("#edit-dosen-content").html(msg);
            $('#myModal').modal('show');
        });
        return false;
      });

      $(document).ready(function(){
        $("#btn-tbh-dsn").click(function(){
          $('.toast').toast('show');
        });
      });
    });
  </script>
</head>
<body>
	<div class="container">
    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="top: 12px;">
      <!-- Then put toasts within -->
      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="1000">
        <div class="toast-body">
          Proses Berhasil.
        </div>
      </div>
    </div>
		<h2><center>Dasbor Admin</center></h2>
  		<hr>
		<ul class="nav nav-tabs">
			<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#dosen">Dosen</a></li>
			<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#makul">Makul</a></li>
			<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#jadwal">Jadwal</a></li>
		</ul>

		<div class="tab-content align-middle">

			<!--KONTEN TAB-->

			<!--TAB DOSEN-->
			<div id="dosen" class="tab-pane fade show active">
				<?php include('tab_dosen.php');?>
			</div>

			<!--MODAL DOSEN-->
			<?php
				include('modal_edit_dosen.php');
			?>

			<!--TAB MAKUL-->
			<div id="makul" class="tab-pane fade">
				<?php include('tab_makul.php');?>
			</div>

			<!--TAB JADWAL-->
			<div id="jadwal" class="tab-pane fade">
				TBD
			</div>

      <button type="button" class="btn btn-primary" id="btn-tbh-dsn">Dosen Baru</button>
		</div>
	</div>
</body>