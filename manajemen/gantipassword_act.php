<?php 
include '../koneksi.php';
session_start();
$id = $_SESSION['id'];

// Hash password baru sebelum disimpan
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Update password ke database
$query = "UPDATE user SET user_password='$password' WHERE user_id='$id'";
mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

header("location:gantipassword.php?alert=sukses");
?>
