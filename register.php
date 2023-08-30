<?php
require 'app//conf/function.php';

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

$register = new Register();

if(isset($_POST["submit"])){
  $result = $register->registration($_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"]);

  if($result == 1){
    echo
    "<script> alert('Registration Successful'); </script>";
  }
  elseif($result == 10){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('Password Does Not Match'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="app/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="app/AdminLTE/index2.html"><b>Vo </b>LTE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Daftarkan keanggotaan baru</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-appteend">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-appteend">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-app/AdminLteend">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirm Password" name="confirmpassword">
          <div class="input-group-app/AdminLteend">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" name="submit" class="btn btn-dark btn-block">Daftar</button>
          </div>
          <!-- /.col -->
        </div>
        </div>
      </form>
      <p class="text-center">Sudah mempunyai akun? <a href="login.php">Masuk sekarang!</a></p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="app/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App/AdminLte -->
<script src="app/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
