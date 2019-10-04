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
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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

      $('#btneditmakul').click(function() {
        $.get($(this).attr('href'), function(msg){
          $("#edit-dosen-content").html(msg);
          $('#myModal').modal('show');
        });
        return false;
      });
    });
    </script>
</head>
<body class="vh-100 w-75 mx-auto shadow p-3 mb-5 bg-white rounded">
    <div class="container  col-7 w-50">
    		<ul class="nav nav-tabs ">
    			<li class="nav-item active"><a data-toggle="tab" class="nav-link active" href="#makul">Mata Kuliah</a></li>
    			<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#editakun">Edit Akun</a></li>
    		</ul>

        <!--konten-->
    		<div class="tab-content align-middle">
    			<?php include('modal_edit-makul.php'); ?>

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
                      $makul[nama]
                    </td>
                    <td>
                      $makul[sks]
                    </td>
                   ";

                echo "
                    <td align =\"right\">
                      <a href=\"modal_edit-makul.php?id=$makul[id]\" id=\"btneditmakul\" class=\"btn btn-primary btn-xs\" role=\"button\" data-toggle=\"#modal\" data-target=\"#editmakul\"><i class=\"fa fa-pencil\"></i></a>
                      <a onclick =\"return confirm('Yakin Ingin menghapus data?')\" href=\"/process/hapus_makul.php?id_makul=$makul[id]\" class=\"btn btn-danger btn-xs\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
                    </td>
                  </tr>
                   ";
                  }
                ?>
            </tbody>
          </table>
        </div>
       
        <!--Tabs-->
    		<div id="editakun" class="tab-pane fade">
          <?php include('tab_edit-akun.php'); ?>
    		</div>   
  	</div>
</body>