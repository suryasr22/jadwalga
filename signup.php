<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<title>Hello, world!</title>
	</head>

	<body>
		<!--KONTEN-->
		<div class="container col-md-7">
			<form class="form-group" method="POST" action="process/signup.php">
				<h2>Sign Up</h2><hr>
				<div class="form-group" data-dismiss="alert" >
					<label>Nama</label>
					<input type="text" class="form-control" placeholder="Nama" name="nama" required="true">
				</div>
				<div class="form-group" data-dismiss="alert" >
					<label>Username</label>
					<input type="text" class="form-control" placeholder="Username" name="username" required="true">
				</div>
				<div class="form-group">
					<label>NIP</label>
					<input type="text" class="form-control" placeholder="NIP" name="nip" required="true"required="true">
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
				<p>
				<button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
				<br><br>
				sudah punya punya akun? <a href="index.php">Sign in</a>
				</p>
				<br>
			</form>
		</div>
		<!--HABIS KONTEN-->

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>