<?php
	//Libraries

	//Koneksi
	include("koneksi.php");

	//Fungsi2
	include("functions.php");

	//Session checker
	include("session_check.php");

	$id = $_SESSION['uid'];
	$id_dosen = GetData($conn, "SELECT dosen.id FROM dosen, user_dosen, users WHERE users.id = $id AND dosen.id = user_dosen.id_dosen AND users.id = user_dosen.id_user")['id'];
	
	$dataRuangDosen = $conn->query("SELECT DISTINCT ruangan.id, ruangan.nama FROM dosen_ruang, ruangan WHERE ruangan.id NOT IN (SELECT id_ruang FROM dosen_ruang) AND id_dosen = $id_dosen");

	if($dataRuangDosen->num_rows == 0){
		$dataRuangDosen = $conn->query("SELECT * FROM ruangan");
	}

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
	<?php build_navbar('dosen', 'makul'); ?>

	<!-- Page Content -->
	<div class="container mh-100">
		<div class="row">
			<div class="col-lg-12">
				<br>
				<h1 class="mt-5 text-center">Tambah Mata Kuliah</h1><hr>
				<form class="form-horizontal style-form" method="post" action ="process/tambah_ruang_dosen.php?id=<?php echo $id_dosen;?>">
					<table class="w-auto table table-dark  table-hover table-sm table-bordered">
						<table class="table table-striped table-advance table-hover table-condensed">
						<thead>
							<th>No.</th>
					    	<th>Nama Ruang Kuliah</th>
					    	<th></th>
					    </thead>
						<tbody>
				          <?php
				          $count = 1;
				          while ($ruangDosen = $dataRuangDosen->fetch_assoc()) {
				            echo "
			              	<tr>
				                <td>
	              					$count.
			              		</td>
				                <td>
				                	$ruangDosen[nama]
				                </td>
				                <td>
				                	<input type=\"checkbox\" name=\"cb_" . $ruangDosen['id'] . "\">
				                </td>
				            </tr>
				            ";
				            $count++;
				          }
				          ?>
						</tbody>
						</table>
					</table>
					<center>
			          <button class="btn btn-primary" type="submit" name="submit" id="submit">Submit</button>
			        </center>
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
