<?php
	//Libraries

	//Koneksi
	include("koneksi.php");

	//Fungsi2
	include("functions.php");

	//Session checker
	include("session_check.php");

	$dataDosen = $conn->query("SELECT * FROM dosen");
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
			build_navbar('super_admin', 'jadwal');
		else
			build_navbar('admin', 'jadwal');
	?>

	<!-- Page Content -->
	<div class="container mh-100 col-9">
		<div class="row">
			<div class="col-lg-12 mx-auto">
				<br>
				<h1 class="mt-5 text-center">Jadwal</h1><hr>
				<div class="col-12">
					<div class="row">
						<div class="col-4">
							<button class="btn btn-primary" id="mail-first">Kirim Email Pengingat Awal Masa Pengisian Jadwal</button>
						</div>
						<div class="col-4">
							<button class="btn btn-primary" id="mail-three-day">Kirim Email Pengingat Masa Pengisian Jadwal kurang dari 3 hari</button>
						</div>
						<div class="col-4">
							<button class="btn btn-primary" id="mail-one-day">Kirim Email Pengingat Masa Pengisian Jadwal kurang dari 1 hari</button>
						</div>
					</div>
				</div>
				<hr>
				<center><a href="GA.php" class="btn btn-primary">Generate Jadwal</a></center>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home">Jadwal Umum</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu1">Jadwal per Ruangan</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#menu2">Jadwal per Semester</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div id="home" class="container tab-pane active"><br>
						<?php build_jadwal_ga($conn);?>
					</div>
					<div id="menu1" class="container tab-pane fade"><br>
						<?php build_jadwal_ruang($conn);?>
					</div>
					<div id="menu2" class="container tab-pane fade"><br>
						<?php build_jadwal_semester($conn);?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--HABIS KONTEN-->


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//cek isi form
			//cek kesamaan password lama
			$('#mail-first').click(function(){
				$.get("process/mailer.php?act=1", function(data, status){
	            	alert(data);
	            	console.log(data);
	          	});
			});

			$('#mail-three-day').click(function(){
				$.get("process/mailer.php?act=2", function(data, status){
	            	alert(data);
	            	console.log(data);
	          	});
			});

			$('#mail-one-day').click(function(){
				$.get("process/mailer.php?act=3", function(data, status){
	            	alert(data);
	            	console.log(data);
	          	});
			});
		});
	</script>
</body>

</body>

</html>