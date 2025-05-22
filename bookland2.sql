-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 08:30 AM
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
-- Database: `bookland2`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `Buku_ID` varchar(6) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Kategori` enum('Fiksi','Non-Fiksi','Edukasi','Komik','Biografi') NOT NULL,
  `Harga` int(11) NOT NULL,
  `Stok` int(11) NOT NULL CHECK (`Stok` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `Detail_ID` varchar(15) NOT NULL,
  `Transaksi_ID` varchar(15) NOT NULL,
  `Buku_ID` varchar(6) NOT NULL,
  `Jumlah` int(11) NOT NULL CHECK (`Jumlah` > 0),
  `Subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `Pengiriman_ID` varchar(10) NOT NULL,
  `Transaksi_ID` varchar(15) NOT NULL,
  `Kurir` varchar(50) NOT NULL,
  `Nomor_Resi` varchar(20) NOT NULL,
  `Status` enum('Sedang Diproses','Dikirim','Sampai') DEFAULT 'Sedang Diproses',
  `Tanggal_Kirim` date DEFAULT NULL,
  `Tanggal_Terima` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `Transaksi_ID` varchar(15) NOT NULL,
  `User_ID` varchar(6) NOT NULL,
  `Tanggal_Transaksi` date DEFAULT curdate(),
  `Total_Harga` int(11) NOT NULL,
  `Metode_Pembayaran` enum('COD','Transfer Bank','E-Wallet') NOT NULL,
  `Status_Pembayaran` enum('Pending','Lunas') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `Ulasan_ID` varchar(10) NOT NULL,
  `User_ID` varchar(6) NOT NULL,
  `Buku_ID` varchar(6) NOT NULL,
  `Rating` int(11) DEFAULT NULL CHECK (`Rating` between 1 and 5),
  `Komentar` text DEFAULT NULL,
  `Tanggal_Ulasan` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` varchar(6) NOT NULL,
  `Nama_Lengkap` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `No_Telepon` varchar(15) NOT NULL,
  `Alamat` text NOT NULL,
  `Tanggal_Registrasi` date DEFAULT curdate(),
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `Wishlist_ID` varchar(10) NOT NULL,
  `User_ID` varchar(6) NOT NULL,
  `Buku_ID` varchar(6) NOT NULL,
  `Tanggal_Ditambahkan` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`Buku_ID`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`Detail_ID`),
  ADD KEY `Transaksi_ID` (`Transaksi_ID`),
  ADD KEY `Buku_ID` (`Buku_ID`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`Pengiriman_ID`),
  ADD UNIQUE KEY `Nomor_Resi` (`Nomor_Resi`),
  ADD KEY `Transaksi_ID` (`Transaksi_ID`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Transaksi_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`Ulasan_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Buku_ID` (`Buku_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`Wishlist_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Buku_ID` (`Buku_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_ibfk_1` FOREIGN KEY (`Transaksi_ID`) REFERENCES `transaksi` (`Transaksi_ID`),
  ADD CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`Buku_ID`) REFERENCES `buku` (`Buku_ID`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`Transaksi_ID`) REFERENCES `transaksi` (`Transaksi_ID`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `ulasan_ibfk_2` FOREIGN KEY (`Buku_ID`) REFERENCES `buku` (`Buku_ID`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`Buku_ID`) REFERENCES `buku` (`Buku_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
