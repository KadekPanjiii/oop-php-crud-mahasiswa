<?php

require 'app/conf/function.php';

if(!empty($_SESSION["id"])){
  header("Location: app");
}

$login = new Login();

if(isset($_POST["submit"])){
  $result = $login->login($_POST["usernameemail"], $_POST["password"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: app");
  }
  elseif($result == 10){
    echo
    "<script> alert('Wrong Password'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vo LTE | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="app/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="app/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="app/AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="app/AdminLTE/index2.html"><b>Vo </b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="usernameemail">
          <div class="input-group-app/AdminLteend">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
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
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" name="submit" class="btn btn-dark btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
        </div>
      </form>
      <p class="text-center">Tidak mempunyai akun? <a href="register.php">Register sekarang!</a></p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="app/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="app/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App/AdminLte -->
<script src="app/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
