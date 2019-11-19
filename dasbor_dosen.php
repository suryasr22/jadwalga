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
	
	$dataMakulDosen = $conn->query("SELECT * FROM dosen, matakuliah, dosen_makul WHERE dosen.id = $id_dosen AND dosen.id = dosen_makul.id_dosen AND matakuliah.id = dosen_makul.id_makul");

	$dataRuangDosen = $conn->query("SELECT * FROM dosen, ruangan, dosen_ruang WHERE dosen.id = $id_dosen AND dosen.id = dosen_ruang.id_dosen AND ruangan.id = dosen_ruang.id_ruang");

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
				<h1 class="mt-5 text-center">Jadwal Anda</h1><hr><br>
				<div class="border border-secondary rounded-lg col-12 mx-auto bg-light">
					<br>
					<h6>Mata kuliah yang diampu:</h6>

					<table class="mx-auto table table-hover table-sm table-bordered table-striped table-advance table-condensed">
						<thead>
							<th>No.</th>
						    <th>Nama Mata Kuliah</th>
						    <th>Kelas</th>
						    <th>Semester</th>
						    <th>SKS</th>
						    <th></th>
					    </thead>
						<tbody>
				          <?php
				          $count = 1;
				          while($makulDosen = $dataMakulDosen->fetch_assoc()){
				            echo "
			              	<tr>
			              		<td>
			              			$count.
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
				                <td align =\"right\">
				                	<a onclick =\"return confirm('Yakin Ingin menghapus mata kuliah yang diampu?')\" href=\"process/hapus_makul_dosen.php?idd=$makulDosen[id_dosen]&idm=$makulDosen[id_makul]\" class=\"btn btn-danger btn-sm\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
				                </td>
				            </tr>
				            ";
				            $count++;
				          }
				          ?>
						</tbody>
					</table>
					<hr>
					<a href="tambah_makul_dosen.php" class="btn btn-primary">Tambah Mata Kuliah</a>
					<br><br>
				</div>
				

				<br>
				<div class="border border-secondary rounded-lg col-12 mx-auto bg-light">
					<br>
					<h6>Ruang kuliah:</h6>
					<table class="mx-auto table table-hover table-sm table-bordered table-striped table-advance table-condensed">
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
						                <td align =\"right\">
						                	<a onclick =\"return confirm('Yakin Ingin menghapus data ruangan perkuliahan?')\" href=\"process/hapus_ruang_dosen.php?idd=$ruangDosen[id_dosen]&idr=$ruangDosen[id_ruang]\" class=\"btn btn-danger btn-sm\" role=\"button\"><i class=\"fa fa-trash-o\"></i></a>
						                </td>
					                </tr>
				        			";
				        			$count++;
				        		}
				        	?>
						</tbody>
					</table>
					<hr>
					<a href="tambah_ruang_dosen.php" class="btn btn-primary">Tambah Ruangan</a>
					<br><br>
				</div>	
				<br>
				<div class="border border-secondary rounded-lg col-12 mx-auto bg-light table-hover table-sm table-bordered table-striped table-advance table-condensed">
					<br>
					<h6>Jam ajar:</h6>

					<form method="post" action="process/dosen_jam.php?id=<?php echo $id_dosen; ?>">
						<?php build_konten_jadwal($conn, $id_dosen);?>
						<button class="btn btn-primary" type="submit" name="submit" id="submit">Ubah Jam Ajar</button>
						<br><br>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
	<!--HABIS KONTEN-->


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#cb_pagi").change(function(){
				var jam = 11;
				var hari = 5;
				var i, j;
				var idJam = 0;
				var idCbJam = "";

				if(this.checked){
					console.log("Checked");
					for(i = 1; i <= hari; i ++){
						for(j = 1; j <= jam; j ++){
							idJam = (i - 1) * jam + j;
							idCbJam = "#cb_j_" + idJam;

							if(j <= 5){
								console.log(idCbJam);
								$(idCbJam).prop('checked', true);
							}
						}
					}
				} else {
					console.log("Not Checked");
					for(i = 1; i <= hari; i ++){
						for(j = 1; j <= jam; j ++){
							idJam = (i - 1) * jam + j;
							idCbJam = "#cb_j_" + idJam;

							if(j <= 5){
								console.log(idCbJam);
								$(idCbJam).prop('checked', false);
							}
						}
					}
				}
			});

			$("#cb_siang").change(function(){
				var jam = 11;
				var hari = 5;
				var i, j;
				var idJam = 0;
				var idCbJam = "";

				if(this.checked){
					console.log("Checked");
					for(i = 1; i <= hari; i ++){
						for(j = 1; j <= jam; j ++){
							idJam = (i - 1) * jam + j;
							idCbJam = "#cb_j_" + idJam;

							if(j > 5){
								console.log(idCbJam);
								$(idCbJam).prop('checked', true);
							}
						}
					}
				} else {
					console.log("Not Checked");
					for(i = 1; i <= hari; i ++){
						for(j = 1; j <= jam; j ++){
							idJam = (i - 1) * jam + j;
							idCbJam = "#cb_j_" + idJam;

							if(j > 5){
								console.log(idCbJam);
								$(idCbJam).prop('checked', false);
							}
						}
					}
				}
			});
		});		
	</script>
</body>

</body>

</html>
