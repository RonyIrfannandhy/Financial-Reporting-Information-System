-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2025 at 04:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_nama` varchar(255) NOT NULL,
  `bank_nomor` varchar(255) NOT NULL,
  `bank_pemilik` varchar(255) NOT NULL,
  `bank_saldo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_nama`, `bank_nomor`, `bank_pemilik`, `bank_saldo`) VALUES
(1, 'BANK BRI', 'Rony', '0933-3393', 14500000),
(3, 'BANK BCA', 'Irfan', '18280-232-23', 3765000);

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `hutang_id` int(11) NOT NULL,
  `hutang_tanggal` date NOT NULL,
  `hutang_nominal` int(11) NOT NULL,
  `hutang_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`hutang_id`, `hutang_tanggal`, `hutang_nominal`, `hutang_keterangan`) VALUES
(2, '2025-03-18', 100000, 'Setor\r\n\r\n'),
(5, '2025-03-09', 20000, 'Setor');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori`) VALUES
(1, 'Lainnya'),
(3, 'Keluarga'),
(4, 'Penjualan Aplikasi'),
(5, 'Gaji Karyawan'),
(6, 'Keperluan Pribadi'),
(8, 'Keperluan Kantor'),
(9, 'Keperluan Rumah'),
(10, 'Biaya Tak Terduga'),
(11, 'Cicilan Rumah'),
(12, 'Pembuatan Aplikasi'),
(13, 'Tunjangan Karyawan'),
(14, 'Biaya Hosting Website'),
(17, 'Biaya Server Internet'),
(18, 'Biaya Antena V.1.0');

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `piutang_id` int(11) NOT NULL,
  `piutang_tanggal` date NOT NULL,
  `piutang_nominal` int(11) NOT NULL,
  `piutang_keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`piutang_id`, `piutang_tanggal`, `piutang_nominal`, `piutang_keterangan`) VALUES
(1, '2019-06-22', 1000000, 'Hutang oleh Rony'),
(3, '2019-06-23', 70000, 'Hutang oleh rony untuk beli paketan internet smartfren');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_tanggal` date NOT NULL,
  `transaksi_jenis` enum('Pengeluaran','Pemasukan') NOT NULL,
  `transaksi_kategori` int(11) NOT NULL,
  `transaksi_nominal` int(11) NOT NULL,
  `transaksi_keterangan` text NOT NULL,
  `transaksi_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_tanggal`, `transaksi_jenis`, `transaksi_kategori`, `transaksi_nominal`, `transaksi_keterangan`, `transaksi_bank`) VALUES
(1, '2022-04-06', 'Pemasukan', 3, 1000000, 'Margaretha\r\n', 1),
(4, '2022-09-14', 'Pengeluaran', 8, 50000, 'Beli Alat Kantor', 1),
(5, '2023-01-20', 'Pemasukan', 4, 1500000, 'Keperluan Sewa', 1),
(6, '2023-02-16', 'Pemasukan', 1, 13570000, 'Pembayaran Project', 1),
(8, '2023-07-26', 'Pemasukan', 12, 20000000, 'Pembuatan Aplikasi Sistem Rumah Sakit Karya Bakti', 1),
(9, '2024-07-22', 'Pengeluaran', 13, 200000, 'Biaya Berobat Pak Tele', 1),
(10, '2024-08-29', 'Pemasukan', 3, 4000000, 'Pembuatan Aplikasi Klinik', 3),
(11, '2024-09-25', 'Pemasukan', 3, 1000000, 'biaya BPJS', 1),
(12, '2024-11-22', 'Pengeluaran', 10, 32000000, 'tes', 3),
(13, '2024-11-30', 'Pengeluaran', 14, 300000, 'Hosting Tahunan', 1),
(15, '2024-12-19', 'Pengeluaran', 14, 300000, 'Biaya Hosting tahun Depan', 3),
(16, '2024-12-31', 'Pemasukan', 4, 2000000, 'Penjualan Aplikasi Laba Rugi', 1),
(17, '2025-01-01', 'Pemasukan', 4, 2000000, 'Penjualan Aplikasi Akademik Sekolah SMP 888', 1),
(19, '2025-02-12', 'Pemasukan', 4, 2000000, 'Pembuatan aplikasi web + hosting', 3),
(21, '2025-03-27', 'Pengeluaran', 6, 5000, 'Alhamdulilah laku keras', 3),
(22, '2025-03-30', 'Pemasukan', 4, 70000, 'Bagus rony kamu dapat bonus', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_foto` varchar(100) DEFAULT NULL,
  `user_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_foto`, `user_level`) VALUES
(1, 'Rony Irfannandhy', 'admin', '0192023a7bbd73250516f069df18b500', '216263123_dami bg.jpg', 'administrator'),
(6, 'rony', 'rony', '7822ffef1339279ec93971ee7cd8158e', '922519401_dami bg.jpg', 'manajemen'),
(9, 'irfan', 'irfan', '718b84c99141527de725aeb999ea897d', '34703434_dami bg.jpg', 'manajemen');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`hutang_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`piutang_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `hutang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `piutang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
