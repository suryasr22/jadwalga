<!DOCTYPE html>
<html>
  <head>
    <title>Silahkan Masuk</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="container">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#signin">Sign In</a></li>
      <li><a data-toggle="tab" href="#signup">Sign Up</a></li>
    </ul>
    <div class="tab-content">
      <div id="signin" class="tab-pane fade in active">
        <div class="sign container col-md-7">
          <div class="loginbox col-md-6 mx-auto">        
            <form class="form-group" method="POST" action="proses_signin.php">
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
                  <br><br>
                  Belum punya punya akun? <a href="signup.php">Sign Up</a>
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
      </div>
      <div id="signup" class="tab-pane fade">
        <div class="signup container col-md-12">
          <div class="mx-auto">
            <form class="col-md-11 form-group w-35 p-3 mx-auto rounded-top" method="POST" action="  proses_signup.php">
              <!--display validation errors here-->
              <div class="modal-header">
                <h2 class="mx-auto">Sign Up</h2>
              </div>
              <div class="row-auto form-row modal-body container rounded-bottom">
                <div class="col-md-6 form-group" data-dismiss="alert" >
                  <label>Nama</label>
                  <input type="text" class="form-control" placeholder="Nama" name="nama">
                </div>
                <div class="col-md-6 form-group" data-dismiss="alert" >
                  <label>Username</label>
                  <input type="text" class="form-control" placeholder="Username" name="username">
                </div>
                <div class="row-auto form-row">
                  <div class="col-md-6 form-group">
                    <label>NIP</label>
                    <input type="text" class="form-control" placeholder="NIP" name="nip">
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="email@example.com" name="email">
                  </div>
                </div>
                <div class="row-auto form-row">
                  <div class="col-md-6 form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="password_1">
                  </div>
                  <div class="col-md-6 form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Ulangi Password" name="password_2">
                  </div>
                </div>
                <p>
                   <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                  <br><br>
                  sudah punya punya akun? <a href="signin.php">Sign in</a>
                </p>
               
              </div>
            </form>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>