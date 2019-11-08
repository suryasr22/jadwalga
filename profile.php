<?php
	//Libraries

	//Koneksi
	include("koneksi.php");

	//Fungsi2
	include("functions.php");

	//Session checker
	include("session_check.php");

	$id = $_SESSION['uid'];

	$tgt = $_SESSION['tgt'];

	if($tgt === '2'){
		$data = GetData($conn, "SELECT * FROM dosen, user_dosen, users WHERE users.id = $id AND dosen.id = user_dosen.id_dosen AND users.id = user_dosen.id_user");
		$id_data = GetData($conn, "SELECT dosen.id FROM dosen, user_dosen, users WHERE users.id = $id AND dosen.id = user_dosen.id_dosen AND users.id = user_dosen.id_user")['id'];
	} else {
		$data = GetData($conn, "SELECT * FROM admin, user_admin, users WHERE users.id = $id AND admin.id = user_admin.id_admin AND users.id = user_admin.id_user");
		$id_data = GetData($conn, "SELECT admin.id FROM admin, user_admin, users WHERE users.id = $id AND admin.id = user_admin.id_admin AND users.id = user_admin.id_user")['id'];
	}
	
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

<body class="w-75 p-4 mx-auto shadow-lg bg-white">
	<!--KONTEN-->
	<!-- Navigation -->
	<?php
		if($tgt === '2')
			build_navbar('dosen', 'profil'); 
		else if($tgt === '1')
			build_navbar('admin', 'profil'); 
		else
			build_navbar('super_admin', 'profil'); 
	?>

	<!-- Page Content -->
	<div class="container mh-100 col-9">		
		<br>
		<h1 class="mt-5 text-center">Ubah Profil</h1>
		<hr><br>
		<div class="row">
			<div class="col-6 card bg-light">
				<form method="post" action="
				<?php
					if($tgt === '2')
						echo 'process/edit_data_dosen.php?id=' . $id_data;
					else
						echo 'process/edit_data_admin.php?id=' . $id_data;
				?>
				">
					<br>
					<h4>Data Diri</h4>
					<hr>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" required="true" 
						value="<?php echo $data['nama'];?>">
					</div>
					<?php 
						if($tgt === '2'){
							echo '
								<div class="form-group">
									<label>Nip</label>
									<input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan nip" required="true" 
									value="' . $data['nip'] . '">
								</div>
							';
						}
					?>					

					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required="true" 
						value="<?php echo $data['email'];?>">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<br>
			</div>
			<div class="col-6 card bg-light">
				<form method="post" action="
				<?php
					if($tgt === '2')
						echo 'process/edit_akun_dosen.php?id=' . $id_data;
					else
						echo 'process/edit_akun_admin.php?id=' . $id_data;
				?>
				" id="accForm">
					<br>
					<h4>Data Akun</h4>
					<hr>
					<input type="hidden" id="idData" value="<?php echo $id_data;?>">
					<input type="hidden" id="tgt" value="<?php echo $tgt;?>">	
					<div class="form-group">
						<label>Old Password</label>
						<input type="password" class="form-control" id="oldpw" placeholder="Masukkan password lama">
					</div>
					<div class="form-group alert alert-danger" style="display: none;" id="wrongPassword">
						<strong>Password salah.</strong>
					</div>
					<div class="form-group">
						<label>New Password</label>
						<input type="password" class="form-control" id="newpw" name="newpw" placeholder="Masukkan password baru">
					</div>
					<div class="form-group">
						<label>Confirm New Password</label>
						<input type="password" class="form-control" id="confirmnewpw" placeholder="Konfirmasi password baru">
					</div>
					<div class="form-group alert alert-danger" style="display: none;" id="samePassword">
						<strong>Password tidak sama.</strong>
					</div>
					<button type="submit" id="accSub" class="btn btn-primary" disabled="false">Submit</button>
				</form>
				<br>
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
	<script>
		var pass = new Array(0, 0, 0, 0, 0);
		$(document).ready(function(){
			//cek isi form
			//cek kesamaan password lama
			$('#oldpw').keyup(function(){
				var oldpw = $('#oldpw').val();
				var id = $('#idData').val();
				var tgt = $('#tgt').val();

				if(oldpw === null || oldpw === ''){
					pass[0] = 0;
				} else {
					pass[0] = 1;
				}

				if(tgt === '2'){
					$.get("process/cek_pw_dosen.php?pw=" + oldpw + "&id=" + id , function(data, status){
		            	if(data == 'yes'){
		            		pass[3] = 1;
		            		$('#wrongPassword').hide();
		            	} else {
		            		pass[3] = 0;
		            		$('#wrongPassword').show();
		            	}
		          	});
				} else {
					$.get("process/cek_pw_admin.php?pw=" + oldpw + "&id=" + id , function(data, status){
		            	if(data == 'yes'){
		            		pass[3] = 1;
		            		$('#wrongPassword').hide();
		            	} else {
		            		pass[3] = 0;
		            		$('#wrongPassword').show();
		            	}
		          	});
				}				
			});

			$('#newpw').keyup(function(){
				var newpw = $('#newpw').val();

				if(newpw === null || newpw === ''){
					pass[1] = 0;
				} else {
					pass[1] = 1;
				}
			});

			//cek kesamaan password baru
			$('#confirmnewpw').keyup(function(){
				var newpw = $('#newpw').val();
				var cnfpw = $('#confirmnewpw').val();

				if(cnfpw === null || cnfpw === ''){
					pass[2] = 0;
				} else {
					pass[2] = 1;
				}

				if(newpw != cnfpw){
					$('#samePassword').show();
					pass[4] = 0;
				} else {
					$('#samePassword').hide();
					pass[4] = 1;
				}
			});

			$('#accForm').keyup(function(){
				var formIsValid = pass[0] && pass[1] && pass[2] && pass[3] && pass[4];
				if(formIsValid){
					$('#accSub').prop('disabled', false);
				} else {
					$('#accSub').prop('disabled', true);
				}
			});
		});
	</script>
</body>

</body>

</html>
