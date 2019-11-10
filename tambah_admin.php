<?php
	//Libraries

	//Fungsi2
	include("functions.php");
	
	//Session checker
	include("session_check.php");
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
			build_navbar('super_admin', 'admin');
		else
			build_navbar('admin', 'admin');
	?>

	<!-- Page Content -->
	<div class="container mh-100 col-9">
		<div class="row">
			<div class="col-lg-9 mx-auto">
				<br>
				<h1 class="mt-5 text-center">Tambah Admin</h1><hr><br>

				<form class="form-horizontal style-form" method="post" action ="process/tambah_admin.php">
			        <!--nama_dosen-->
			        <div class="form-group" data-dismiss="alert" >
						<label>Nama</label>
						<input type="text" class="form-control" placeholder="Nama" name="nama" required="true">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" placeholder="email@example.com" name="email" required="true">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" placeholder="Password" name="password_1" required="true">
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" class="form-control" placeholder="Ulangi Password" name="password_2" required="true">
					</div>
					<center>
			          <button class="btn btn-primary" type="submit" name="submit" id="submit">Submit</button>
			        </center>
			        <br>
			    </form>
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
