<div class="sign container col-md-7">
  <div class="loginbox">        
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