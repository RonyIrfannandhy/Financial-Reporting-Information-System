<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $api_url = "https://login-bir3msoyja-et.a.run.app";
    $post_data = json_encode([
        'username' => $username,
        'password' => $password
    ]);

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code == 200) {
        $_SESSION['user'] = $username;
        header("Location: dashboard_awal.php");
        exit();
    } else {
        echo "<script>alert('Login gagal, coba lagi!'); window.location.href='login_awal.php';</script>";
    }
}
?>
