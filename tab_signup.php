<div class="signup container col-md-12">
  <div class="mx-auto">
    <form class="col-md-11 form-group w-35 p-3 mx-auto rounded-top" method="POST" action="  proses_signup.php">
  
    <!--display validation errors here-->
      <div class="modal-header">
        <h2 class="mx-auto">Sign Up</h2>
      </div>
      <div class="modal-body row-auto form-row rounded-bottom">
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
      <br>
    </form>
  </div>
</div>