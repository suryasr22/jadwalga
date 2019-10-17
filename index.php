<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

		<title>Sign In</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	</head>

	<body>
		<!--KONTEN-->
    <div class="signin container col-3 rounded shadow-lg">
      <div class="col-12 mx-auto">    
        <form class="form-group" method="POST" action="process/signin.php">
          <div class="row modal-header ">
            <h2 class="mx-auto">Sign In</h2>
          </div>
          <div class="modal-body container rounded-bottom">
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div class="">
            <button type="submit" class="btn btn-primary">Sign in</button>
              <hr><br>
              Belum punya akun? <a href="signup.php">Sign Up</a>
            </div>
          </div>
        </form>
      </div>
			<?php
			if(isset($_GET['status'])){
				$status = $_GET['status'];

				if($status === 'success'){
					echo "
					<div class=\"alert alert-success\">
					<strong>Pendaftaran berhasil~!</strong>
					</div>
					";
				} else {
					echo "
					<div class=\"alert alert-danger\">
					<strong>Pendaftaran gagal~!</strong>
					</div>
					";
				}
			}
			?>
		</div>
		<!--HABIS KONTEN-->


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>