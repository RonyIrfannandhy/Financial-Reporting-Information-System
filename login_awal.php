<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['login_awal'])) {
    header("Location: dashboard_awal.php");
    exit();
}

$error = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Konfigurasi API
    $api_url = "https://login-bir3msoyja-et.a.run.app";
    $api_data = json_encode(["username" => $username, "password" => $password]);

    // Request ke API
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $api_data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json"
    ]);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Cek respons dari API
    if ($http_code == 200) { 
        $_SESSION['login_awal'] = true;
        header("Location: dashboard_awal.php");
        exit();
    } else {
        $error = "Login gagal! Username atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Awal</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            background: linear-gradient(-45deg, #1a1a2e, #16213e, #0f3460, #e94560);
            background-size: 400% 400%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: gradientBG 10s ease infinite;
        }
        @keyframes gradientBG { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        .login-container {
            width: 350px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn { from { transform: translateY(-20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        .login-container h2 { margin-bottom: 15px; color: white; font-weight: bold; text-transform: uppercase; }
        .input-group { margin-bottom: 15px; }
        .input-group input {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-align: center;
        }
        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(90deg, #e94560, #0f3460);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            font-weight: bold;
        }
        .btn:hover { background: linear-gradient(90deg, #0f3460, #e94560); transform: scale(1.05); }
        .error-message { color: #ff4d4d; margin-bottom: 10px; font-size: 14px; animation: fadeIn 0.5s ease-in-out; }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>PORTAL IOTERA</h2>
        <h6 style="color: #FFC107; font-weight: bold; background: rgba(0, 0, 0, 0.3); padding: 8px; border-radius: 5px;">
            ⚠️ Selalu Update Username & Password Setelah 14 Hari Kerja!
        </h6><br><br>

        <?php if (!empty($error)) { echo "<p class='error-message'>$error</p>"; } ?>
        <form method="POST">
            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>

</body>
</html>
