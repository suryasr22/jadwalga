<?php
	//Libraries

	//Koneksi
	include("koneksi.php");

	//Fungsi2
	include("functions.php");

	//Session checker
	include("session_check.php");

	$id = $_GET['id'];
	$dataAdmin = $conn->query("SELECT * FROM admin WHERE id = '$id'");
	$admin = $dataAdmin->fetch_assoc();
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

	<?php print_title($tgt); ?>
</head>

<body>
	<!--KONTEN-->
	<!-- Navigation -->
	<?php
		if($tgt === '0')
			build_navbar('super_admin', 'admin');
		else
			build_navbar('admin', 'admin');
	?>

	<!-- Page Content -->
	<div class="container mh-100">
		<div class="row">
			<div class="col-lg-12">
				<br>
				<h1 class="mt-5 text-center">Edit Admin</h1><hr>

				<form class="form-horizontal style-form" method="post" action ="process/edit_admin.php?id=<?php echo $id;?>">
			        <!--nama_dosen-->
			        <div class="form-group">
		          		<label for="nama_dosen">Nama Admin</label>
		            	<input type="text" class="form-control" name="nama" value="<?php echo $admin['nama'];?>" autocomplete="off" required>
			        </div>

			        <!--email-->
			        <div class="form-group">
		      			<label for="email">Email</label>
		            	<input type="email" class="form-control" name="email" value="<?php echo $admin['email'];?>" autocomplete="off" required>
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