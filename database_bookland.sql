-- phpMyAdmin SQL Dump
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `database_bookland`
--

CREATE DATABASE IF NOT EXISTS `database_bookland`;
USE `database_bookland`;

-- --------------------------------------------------------

-- Table structure for table `buku`

CREATE TABLE `buku` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `judul_buku` VARCHAR(255) NOT NULL,
  `penulis` VARCHAR(255) NOT NULL,
  `kategori_buku` VARCHAR(255) NOT NULL,
  `harga_buku` INT NOT NULL,
  `jumlah_buku` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
