<?php
$koneksi = mysqli_connect("localhost", "root", "", "project_keuangan");

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
