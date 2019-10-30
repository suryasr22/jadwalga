<?php
	//Libraries

	//Koneksi
	include("koneksi.php");

	//Fungsi2
	include("functions.php");

	//Session checker
	include("session_check.php");
	
	$dataRuangan = $conn->query("SELECT * FROM ruangan");
	$tgt = $_SESSION['tgt'];
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<?php print_title($tgt); ?>
</head>

<body class="w-75 p-4 mx-auto shadow-lg">	
	<!--KONTEN-->
	<!-- Navigation -->
	<?php
		if($tgt === '0')
			build_navbar('super_admin', 'ruangan');
		else
			build_navbar('admin', 'ruangan');
	?>

	<!-- Page Content -->
	<div class="container mh-100 col-9">
		<div class="row">
			<div class="col-lg-9 mx-auto">
				<br>
				<h1 class="mt-5 text-center">Data Ruangan</h1><hr><br>
				<a href="tambah_ruangan.php" class="btn btn-primary">Ruangan Baru</a>
				<table class="w-auto table table-dark  table-hover table-sm table-bordered">
					<table class="table table-striped table-advance table-hover table-condensed">
					<thead>
				      <th>id</th>
				      <th>Nama Ruangan</th>
				      <th></th>
				    </thead>
						<tbody>
				          <?php
				          while($ruangan = $dataRuangan->fetch_assoc()){
				            echo "
			              	<tr>
				                <td>
				                  $ruangan[id]
				                </td>
				                <td>
				                  $ruangan[nama]
				                </td>
				                <td>
				            ";

				            echo "
				                <td align =\"right\">
				                  	<a href=\"edit_ruangan.php?id=$ruangan[id]\" class=\"btn btn-primary btn-sm\" role=\"button\"><i class=\"fa fa-pencil\" data-toggle=\"modal\" data-target=\"#myModal\"></i></a>

			                		<a onclick =\"return confirm('Yakin Ingin menghapus data ruangan?')\" href=\"process/hapus_ruangan.php?id=$ruangan[id]\" class=\"btn btn-danger btn-sm\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
				                </td>
			              	</tr>
				            ";
				          }
				          ?>
						</tbody>
					</table>
				</table>
			</div>
		</div>
	</div>
	<!--HABIS KONTEN-->


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</body>

</html>
