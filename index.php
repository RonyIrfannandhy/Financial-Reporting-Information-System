<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Keuangan</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap & Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700">
  
  <style>
    body {
      background: linear-gradient(to right, #4A90E2, #1E3C72);
      font-family: 'Source Sans Pro', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      width: 360px;
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .login-box h2 {
      font-weight: bold;
      color: #333;
    }

    .login-box img {
      width: 120px;
      margin-bottom: 15px;
    }

    .btn-primary {
      background: #4A90E2;
      border: none;
      transition: 0.3s;
    }

    .btn-primary:hover {
      background: #357ab8;
    }

    .alert {
      margin-bottom: 10px;
      animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>
</head>

<body>

  <div class="login-box">
    <h2>SISTEM INFORMASI KEUANGAN</h2>
    <br />

    <?php
    if (isset($_GET['alert'])) {
      if ($_GET['alert'] == "gagal") {
        echo "<div class='alert alert-danger'>LOGIN GAGAL! USERNAME DAN PASSWORD SALAH!</div>";
      } else if ($_GET['alert'] == "logout") {
        echo "<div class='alert alert-success'>ANDA TELAH BERHASIL LOGOUT</div>";
      } else if ($_GET['alert'] == "belum_login") {
        echo "<div class='alert alert-warning'>ANDA HARUS LOGIN UNTUK MENGAKSES DASHBOARD</div>";
      }
    }
    ?>

    <img src="gambar/sistem/iconlogin.png" alt="Logo Sistem">

    <form action="periksa_login.php" method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required autocomplete="off">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Sign In</button>
    </form>
  </div>

  <!-- Scripts -->
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>
