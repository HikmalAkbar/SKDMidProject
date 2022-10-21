<?php 
// error_reporting(E_ERROR | E_PARSE);
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'skd_uts');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
    
if(isset($_POST['login'])){

    $email = $_POST['email'];
    $pass = md5('rahasia'. $_POST['pass']);

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    
    if($query -> num_rows > 0){
        
        $row = mysqli_fetch_array($query);
        $_SESSION ['actor'] = $row['actor'];
        $_SESSION ['email'] = $row['email'];
        $_SESSION ['nama'] = $row['nama'];
        
        // ?> <script> alert("Berhasil login") 
        window.location="index.php" </script> <?php
      }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login.php</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index2.html" class="h1"><b>SIA</b>KAD</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan login jika sudah memiliki akun?!!</p>
      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
          </div>
          <!-- /.col -->
        </div>
        <div class="mb-3 form-check text-center">
          <span>Belum memiliki akun?!! <a class="text-decoration-none" href="register.php"><b>Register</b></a>?!!</span>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

