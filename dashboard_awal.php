<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['login_awal'])) {
    header("Location: login_awal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Awal</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(to right, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 320px;
        }

        h2 {
            color: #333;
            margin-bottom: 15px;
        }

        a {
            display: block;
            margin: 10px 0;
            padding: 12px;
            background: #4a90e2;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
        }

        a:hover {
            background: #357ab8;
        }

        .logout {
            background: red;
        }

        .logout:hover {
            background: darkred;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Bidang Terkait</h2>
    <p>Selamat datang!</p>
    <a href="periksa_login.php?role=admin">Login Admin</a>
    <a href="periksa_login.php?role=manajemen">Login Manajemen</a>
    <a href="login_awal.php" class="logout">Logout</a>
</div>

</body>
</html>
