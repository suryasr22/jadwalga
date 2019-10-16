<!DOCTYPE html>
<html>
  <head>
    <title>Sign In</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div class="signup container col-3 rounded shadow-lg">
      <div class="col-12 mx-auto">        
        <form class="form-group" method="POST" action="process/proses_signin.php">
          <div class="row modal-header ">
            <h2 class="mx-auto">Sign Up</h2>
          </div>
          <div class="modal-body container rounded-bottom">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Masukkan nama anda" name="namadosen">
            </div>
            <div class="form-group">
              <label>Nip</label>
              <input type="text" class="form-control" placeholder="Masukkan NIP anda" name="nipdosen">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="Masukkan Email anda" name="emaildosen">
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" placeholder="Username" name="username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" placeholder="Masukkan Password anda" name="password_1">
            </div>
            <div class="form-group">
              <label>Cornfirm Password</label>
              <input type="password" class="form-control" placeholder="Ulangi Password anda" name="password_2">
            </div>
            <div class="">
            <button type="submit" class="btn btn-primary">Sign Up</button>
              <br><br>
              Sudah punya akun? <a href="signin.php">Sign In</a>
            </div>
          </div>
        </form>
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
    </div>
  </body>
</html>