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
	
	$dataMakulDosen = $conn->query("SELECT DISTINCT matakuliah.kode, matakuliah.kelas, matakuliah.id, matakuliah.nama, matakuliah.semester, matakuliah.sks FROM dosen_makul, matakuliah WHERE matakuliah.id NOT IN (SELECT id_makul FROM dosen_makul)");

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
	<?php build_navbar('dosen', 'makul'); ?>

	<!-- Page Content -->
	<div class="container mh-100 col-9">
		<div class="row">
			<div class="col-lg-12">
				<br>
				<h1 class="mt-5 text-center">Tambah Mata Kuliah</h1><hr>
				<br>
				<form class="form-horizontal style-form" method="post" action ="process/tambah_makul_dosen.php?id=<?php echo $id_dosen;?>">
					<table class="mx-auto table table-hover table-sm table-bordered table-striped table-advance table-condensed">
						<?php
				          if($dataMakulDosen->num_rows > 0){
				          	echo '<thead>
								      <th>KODE</th>
								      <th>Nama Mata Kuliah</th>
								      <th>Kelas</th>
								      <th>Semester</th>
								      <th>SKS</th>
								      <th></th>
							    	</thead>';
						}?>
						<tbody>
				          <?php
				          if($dataMakulDosen->num_rows > 0){
					          while($makulDosen = $dataMakulDosen->fetch_assoc()){
					            echo "
				              	<tr>
					                <td>
					                	$makulDosen[kode]
					                </td>
					                <td>
					                	$makulDosen[nama]
					                </td>
					                <td>
					                	$makulDosen[kelas]
					                </td>
					                <td>
					                	$makulDosen[semester]
					                </td>
					                <td>
					                	$makulDosen[sks]
					                </td>
					                <td>
					                	<input type=\"checkbox\" name=\"cb_" . $makulDosen['id'] . "\">
					                </td>
					            </tr>
					            ";
					          }
					      } else {
					      	echo "<tr><td colspan=\"4\">Maaf, seluruh mata kuliah telah dipilih oleh dosen.</td></tr>";
					      }
				          ?>
						</tbody>
					</table>
					<center>
						<?php if($dataMakulDosen->num_rows > 0){
							echo '<button class="btn btn-primary" type="submit" name="submit" id="submit">Submit</button>';
						} else {
							echo '<a href="dasbor_dosen.php" class="btn btn-primary">Kembali</a>';
						}
						?>
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
