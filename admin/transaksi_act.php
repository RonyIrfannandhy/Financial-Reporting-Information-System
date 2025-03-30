<?php 
include '../koneksi.php';

// Ambil data dari form
$tanggal    = $_POST['tanggal'];
$jenis      = $_POST['jenis'];
$kategori   = $_POST['kategori'];
$nominal    = $_POST['nominal'];
$keterangan = $_POST['keterangan'];
$bank       = $_POST['bank'];

// Validasi: Pastikan semua input tidak kosong
if (empty($tanggal) || empty($jenis) || empty($kategori) || empty($nominal) || empty($bank)) {
    die("Harap isi semua data!");
}

// Ambil saldo saat ini dari bank yang dipilih
$query_rekening = $koneksi->prepare("SELECT bank_saldo FROM bank WHERE bank_id = ?");
$query_rekening->bind_param("i", $bank);
$query_rekening->execute();
$result = $query_rekening->get_result();
$r = $result->fetch_assoc();

// Pastikan bank ditemukan
if (!$r) {
    die("Bank tidak ditemukan!");
}

$saldo_sekarang = $r['bank_saldo'];

// Hitung saldo baru berdasarkan jenis transaksi
if ($jenis == "Pemasukan") {
    $total = $saldo_sekarang + $nominal;
} elseif ($jenis == "Pengeluaran") {
    if ($saldo_sekarang < $nominal) {
        die("Saldo tidak cukup!");
    }
    $total = $saldo_sekarang - $nominal;
} else {
    die("Jenis transaksi tidak valid!");
}

// Update saldo bank
$query_update_saldo = $koneksi->prepare("UPDATE bank SET bank_saldo = ? WHERE bank_id = ?");
$query_update_saldo->bind_param("di", $total, $bank);
$query_update_saldo->execute();

// Masukkan data transaksi ke database
$query_insert_transaksi = $koneksi->prepare("INSERT INTO transaksi (transaksi_tanggal, transaksi_jenis, transaksi_kategori, transaksi_nominal, transaksi_keterangan, transaksi_bank) VALUES (?, ?, ?, ?, ?, ?)");
$query_insert_transaksi->bind_param("ssidis", $tanggal, $jenis, $kategori, $nominal, $keterangan, $bank);
$query_insert_transaksi->execute();

// Redirect ke halaman transaksi
header("location: transaksi.php");
exit();
?>
