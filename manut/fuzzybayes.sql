-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 02:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuzzybayes`
--

-- --------------------------------------------------------

--
-- Table structure for table `datasensor`
--

CREATE TABLE `datasensor` (
  `id` int(128) NOT NULL,
  `HWID` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `rh` text NOT NULL,
  `suhu_udara` text NOT NULL,
  `suhu_daun` text NOT NULL,
  `media_tanam` text NOT NULL,
  `ppm` text NOT NULL,
  `ph` text NOT NULL,
  `oksigen` text NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datasensor`
--

INSERT INTO `datasensor` (`id`, `HWID`, `time`, `rh`, `suhu_udara`, `suhu_daun`, `media_tanam`, `ppm`, `ph`, `oksigen`, `email`) VALUES
(1, 'VP221201D', '2023-02-16 17:00:00', '60', '18', '15', '70', '836', '7', '9', 'admin@admin.com'),
(2, 'VP221201D', '2023-02-16 17:00:00', '63', '18', '15', '70', '836', '9', '6.3', 'admin@admin.com'),
(4, 'VP221201D', '2023-02-19 14:59:03', '63', '18', '15', '70', '836', '9', '6.3', 'admin@admin.com'),
(5, 'VP221201D', '2023-02-19 18:19:53', '63', '18', '15', '70', '836', '9', '6.3', 'admin@admin.com'),
(6, 'b5nAOUDx', '2023-02-19 18:20:49', '60', '20', '16', '64', '800', '4', '7', 'rosyadi.asad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `data_pelatihan`
--

CREATE TABLE `data_pelatihan` (
  `id` int(11) NOT NULL,
  `rh` text NOT NULL,
  `suhu_udara` text NOT NULL,
  `suhu_daun` text NOT NULL,
  `hasil_vpd` text NOT NULL,
  `media_tanam` text NOT NULL,
  `ppm` text NOT NULL,
  `ph` text NOT NULL,
  `oksigen` text NOT NULL,
  `debit` text NOT NULL,
  `kontrol_suhu` text NOT NULL,
  `kontrol_kelembapan` text NOT NULL,
  `kontrol_nutrisiair` text NOT NULL,
  `kontrol_ph` text NOT NULL,
  `hasil_kondisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pelatihan`
--

INSERT INTO `data_pelatihan` (`id`, `rh`, `suhu_udara`, `suhu_daun`, `hasil_vpd`, `media_tanam`, `ppm`, `ph`, `oksigen`, `debit`, `kontrol_suhu`, `kontrol_kelembapan`, `kontrol_nutrisiair`, `kontrol_ph`, `hasil_kondisi`) VALUES
(2, 'Ideal', 'Dingin', 'Dingin', 'Sangat buruk', 'Ideal', 'Ideal', 'Asam', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', '-', '-', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(3, 'Ideal', 'Dingin', 'Panas', 'Sangat buruk', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', '-', '-', '-', 'Sangat buruk'),
(4, 'Ideal', 'Dingin', 'Dingin', 'Sangat buruk', 'Ideal', 'Ideal', 'Basa', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', '-', '-', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(5, 'Ideal', 'Dingin', 'Dingin', 'Sangat buruk', 'Kering', 'Berlebih', 'Ideal', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', '-', 'Pompa Penguras Menyala', '-', 'Sangat buruk'),
(6, 'Ideal', 'Dingin', 'Dingin', 'Sangat buruk', 'Ideal', 'Kurang', 'Ideal', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', '-', 'Pompa Nutrisi AB Menyala', '-', 'Sangat buruk'),
(7, 'Ideal', 'Dingin', 'Dingin', 'Sangat buruk', 'Lembab', 'Ideal', 'Basa', 'Kurang', 'Sedang', 'Pemanas & LED Menyala', '-', '-', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(8, 'Ideal', 'Dingin', 'Dingin', 'Sangat buruk', 'Lembab', 'Berlebih', 'Basa', 'Kurang', 'Lambat', 'Pemanas & LED Menyala', '-', 'Pompa Penguras Menyala', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(9, 'Ideal', 'Panas', 'Panas', 'Buruk', 'Ideal', 'Kurang', 'Ideal', 'Ideal', 'Lambat', 'Pendigin Menyala', '-', 'Pompa Nutrisi AB Menyala', '-', 'Buruk'),
(10, 'Ideal', 'Dingin', 'Dingin', 'Sangat buruk', 'Lembab', 'Ideal', 'Asam', 'Kurang', 'Sedang', 'Pemanas & LED Menyala', '-', '-', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(11, 'Ideal', 'Dingin', 'Dingin', 'Sangat buruk', 'Lembab', 'Berlebih', 'Asam', 'Kurang', 'Lambat', 'Pemanas & LED Menyala', '-', 'Pompa Penguras Menyala', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(12, 'Ideal', 'Panas', 'Dingin', 'Sangat buruk', 'Lembab', 'Berlebih', 'Asam', 'Kurang', 'Sedang', 'Pemanas & LED Menyala', '-', 'Pompa Penguras Menyala', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(13, 'Ideal', 'Panas', 'Panas', 'Buruk', 'Lembab', 'Kurang', 'Basa', 'Ideal', 'Sedang', 'Pendigin Menyala', '-', 'Pompa Nutrisi AB Menyala', 'Pompa pH Turun Menyala', 'Buruk'),
(14, 'Ideal', 'Ideal', 'Ideal', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(15, 'Ideal', 'Ideal', 'Panas', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(16, 'Ideal', 'Ideal', 'Dingin', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(17, 'Ideal', 'Panas', 'Ideal', 'Buruk', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'Pendigin Menyala', '-', '-', '-', 'Baik'),
(18, 'Ideal', 'Panas', 'Panas', 'Buruk', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'Pendigin Menyala', '-', '-', '-', 'Baik'),
(19, 'Ideal', 'Panas', 'panas', 'Buruk', 'Ideal', 'Berlebih', 'Ideal', 'Ideal', 'Lambat', 'Pendigin Menyala', '-', 'Pompa Penguras Menyala', '-', 'Buruk'),
(20, 'Ideal', 'Panas', 'Panas', 'Buruk', 'Lembab', 'Kurang', 'Asam', 'Ideal', 'Sedang', 'Pendigin Menyala', '-', 'Pompa Nutrisi AB Menyala', 'Pompa pH Naik Menyala', 'Buruk'),
(21, 'Ideal', 'Panas', 'Panas', 'Buruk', 'Lembab', 'Ideal', 'Basa', 'Ideal', 'Sedang', 'Pendigin Menyala', '-', '-', 'Pompa pH Turun Menyala', 'Buruk'),
(22, 'Ideal', 'Panas', 'Panas', 'Buruk', 'Lembab', 'Berlebih', 'Basa', 'Ideal', 'Sedang', 'Pendigin Menyala', '-', 'Pompa Penguras Menyala', 'Pompa pH Turun Menyala', 'Buruk'),
(23, 'Kering', 'Ideal', 'Ideal', 'Baik', 'Ideal', 'Kurang', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', 'Humidifer Menyala', 'Pompa Nutrisi AB Menyala', '-', 'Baik'),
(24, 'Ideal', 'Panas', 'Panas', 'Buruk', 'Lembab', 'Ideal', 'Asam', 'Ideal', 'Sedang', 'Pendigin Menyala', '-', '-', 'Pompa pH Naik Menyala', 'Buruk'),
(25, 'Ideal', 'Panas', 'Panas', 'Buruk', 'Lembab', 'Berlebih', 'Asam', 'Ideal', 'Sedang', 'Pendigin Menyala', '-', 'Pompa Penguras Menyala', 'Pompa pH Naik Menyala', 'Buruk'),
(26, 'Kering', 'Ideal', 'Ideal', 'Baik', 'Lembab', 'Kurang', 'Basa', 'Ideal', 'Sedang', 'LED Menyala', 'Humidifer Menyala', 'Pompa Nutrisi AB Menyala', 'Pompa pH Turun Menyala', 'Baik'),
(27, 'Ideal', 'Ideal', 'Ideal', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(28, 'Ideal', 'Ideal', 'Ideal', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(29, 'Ideal', 'Ideal', 'Ideal', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(30, 'Ideal', 'Ideal', 'Ideal', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(31, 'Ideal', 'Ideal', 'Ideal', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(32, 'Ideal', 'Ideal', 'Ideal', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(33, 'Kering', 'Dingin', 'Dingin', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(34, 'Kering', 'Dingin', 'Ideal', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(35, 'Kering', 'Dingin', 'Ideal', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(36, 'Kering', 'Panas', 'Panas', 'Sangat Buruk', 'Kering', 'Kurang', 'Ideal', 'Ideal', 'Sedang', 'Pendigin Menyala', 'Humidifer Menyala', 'Pompa Nutrisi AB Menyala', '-', 'Sangat buruk'),
(37, 'Kering', 'Ideal', 'Dingin', 'Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', 'Humidifer Menyala', '-', '-', 'Baik'),
(38, 'Kering', 'Ideal', 'Panas', 'Buruk', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'Pendigin Menyala', '-', '-', '-', 'Baik'),
(39, 'Kering', 'Ideal', 'Ideal', 'Baik', 'Lembab', 'Ideal', 'Basa', 'Ideal', 'Sedang', 'LED Menyala', 'Humidifer Menyala', '-', 'Pompa pH Turun Menyala', 'Baik'),
(40, 'Kering', 'Ideal', 'Ideal', 'Baik', 'Lembab', 'Berlebih', 'Basa', 'Ideal', 'Sedang', 'LED Menyala', 'Humidifer Menyala', 'Pompa Penguras Menyala', 'Pompa pH Turun Menyala', 'Buruk'),
(41, 'Sangat Lembab', 'Dingin', 'Dingin', 'Sangat Buruk', 'Lembab', 'Kurang', 'Ideal', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', 'Pompa Nutrisi AB Menyala', '-', 'Sangat buruk'),
(42, 'Kering', 'Ideal', 'Ideal', 'Baik', 'Kering', 'Ideal', 'Asam', 'Ideal', 'Sedang', 'LED Menyala', 'Humidifer Menyala', '-', 'Pompa pH Naik Menyala', 'Baik'),
(43, 'Kering', 'Ideal', 'Ideal', 'Baik', 'Kering', 'Berlebih', 'Asam', 'Ideal', 'Sedang', 'LED Menyala', 'Humidifer Menyala', 'Pompa Nutrisi AB Menyala', 'Pompa pH Naik Menyala', 'Buruk'),
(44, 'Kering', 'Panas', 'Panas', 'Sangat Buruk', 'Kering', 'Ideal', 'Ideal', 'Ideal', 'Sedang', 'Pendigin Menyala', 'Humidifer Menyala', '-', '-', 'Sangat buruk'),
(45, 'Kering', 'Panas', 'Ideal', 'Sangat Buruk', 'Kering', 'Ideal', 'Ideal', 'Ideal', 'Sedang', 'Pendigin Menyala', 'Humidifer Menyala', '-', '-', 'Sangat buruk'),
(46, 'Kering', 'Panas', 'Panas', 'Sangat Buruk', 'Kering', 'Berlebih', 'Ideal', 'Ideal', 'Sedang', 'Pendigin Menyala', 'Humidifer Menyala', 'Pompa Penguras Menyala', '-', 'Sangat buruk'),
(47, 'Sangat Lembab', 'Dingin', 'Dingin', 'Sangat Buruk', 'Kering', 'Kurang', 'Basa', 'Ideal', 'Sedang', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', 'Pompa Nutrisi AB Menyala', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(48, 'Kering', 'Panas', 'Panas', 'Sangat Buruk', 'Kering', 'Ideal', 'Basa', 'Kurang', 'Cepat', 'Pendigin Menyala', 'Humidifer Menyala', '-', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(49, 'Kering', 'Panas', 'Panas', 'Sangat Buruk', 'Kering', 'Berlebih', 'Basa', 'Kurang', 'Cepat', 'Pendigin Menyala', 'Humidifer Menyala', 'Pompa Penguras Menyala', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(50, 'Sangat Lembab', 'Dingin', 'Dingin', 'Sangat Buruk', 'Lembab', 'Kurang', 'Asam', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', 'Pompa Nutrisi AB Menyala', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(51, 'Kering', 'Panas', 'Panas', 'Sangat Buruk', 'Lembab', 'Ideal', 'Asam', 'Kurang', 'Cepat', 'Pendigin Menyala', 'Humidifer Menyala', '-', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(52, 'Kering', 'Panas', 'Panas', 'Sangat Buruk', 'Lembab', 'Berlebih', 'Asam', 'Kurang', 'Cepat', 'Pendigin Menyala', 'Humidifer Menyala', 'Pompa Penguras Menyala', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(53, 'Sangat Lembab', 'Ideal', 'Panas', 'Sangat Buruk', 'Lembab', 'Kurang', 'Ideal', 'Ideal', 'Lambat', 'Pendigin Menyala', 'Dehumidifer Menyala', 'Pompa Nutrisi AB Menyala', '-', 'Sangat buruk'),
(54, 'Kering', 'Dingin', 'Dingin', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(55, 'Kering', 'Dingin', 'Dingin', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(56, 'Kering', 'Dingin', 'Dingin', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(57, 'Kering', 'Dingin', 'Dingin', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(58, 'Kering', 'Dingin', 'Dingin', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(59, 'Kering', 'Dingin', 'Dingin', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(60, 'Kering', 'Dingin', 'Dingin', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(61, 'Kering', 'Dingin', 'Dingin', 'Sangat Baik', 'Ideal', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', '-', '-', '-', 'Sangat Baik'),
(62, 'Sangat Lembab', 'Dingin', 'Dingin', 'Sangat Buruk', 'Lembab', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', '-', '-', 'Sangat buruk'),
(63, 'Sangat Lembab', 'Dingin', 'Ideal', 'Sangat Buruk', 'Lembab', 'Berlebih', 'Ideal', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', 'Pompa Penguras Menyala', '-', 'Sangat buruk'),
(64, 'Sangat Lembab', 'Dingin', 'Dingin', 'Sangat Buruk', 'Lembab', 'Berlebih', 'Ideal', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', 'Pompa Penguras Menyala', '-', 'Sangat buruk'),
(65, 'Sangat Lembab', 'Ideal', 'Ideal', 'Buruk', 'Lembab', 'Kurang', 'Ideal', 'Ideal', 'Lambat', 'LED Menyala', 'Dehumidifer Menyala', 'Pompa Nutrisi AB Menyala', '-', 'Buruk'),
(66, 'Sangat Lembab', 'Dingin', 'Dingin', 'Sangat Buruk', 'Ideal', 'Ideal', 'Basa', 'Ideal', 'Sedang', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', '-', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(67, 'Sangat Lembab', 'Dingin', 'Dingin', 'Sangat Buruk', 'Kering', 'Berlebih', 'Basa', 'Ideal', 'Sedang', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', 'Pompa Penguras Menyala', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(68, 'Sangat Lembab', 'Ideal', 'Ideal', 'Buruk', 'Lembab', 'Kurang', 'Basa', 'Ideal', 'Lambat', 'LED Menyala', 'Dehumidifer Menyala', 'Pompa Nutrisi AB Menyala', 'Pompa pH Turun Menyala', 'Buruk'),
(69, 'Sangat Lembab', 'Dingin', 'Dingin', 'Sangat Buruk', 'Lembab', 'Ideal', 'Asam', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', '-', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(70, 'Sangat Lembab', 'Dingin', 'Dingin', 'Sangat Buruk', 'Lembab', 'Berlebih', 'Asam', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', 'Pompa Penguras Menyala', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(71, 'Sangat Lembab', 'Dingin', 'Dingin', 'Sangat Buruk', 'Lembab', 'Berlebih', 'Asam', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', 'Pompa Penguras Menyala', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(72, 'Sangat Lembab', 'Panas', 'Panas', 'Sangat Buruk', 'Lembab', 'Kurang', 'Ideal', 'Ideal', 'Lambat', 'Pendigin Menyala', 'Dehumidifer Menyala', 'Pompa Nutrisi AB Menyala', '-', 'Sangat buruk'),
(73, 'Sangat Lembab', 'Ideal', 'Ideal', 'Buruk', 'Lembab', 'Berlebih', 'Ideal', 'Ideal', 'Lambat', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', 'Pompa Penguras Menyala', '-', 'Buruk'),
(74, 'Sangat Lembab', 'Ideal', 'Dingin', 'Sangat Buruk', 'Lembab', 'Berlebih', 'Ideal', 'Kurang', 'Lambat', 'Pemanas & LED Menyala', 'Dehumidifer Menyala', 'Pompa Penguras Menyala', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(75, 'Ideal', 'Dingin', 'Dingin', 'Sangat buruk', 'Lembab', 'Kurang', 'Basa', 'Kurang', 'Sedang', 'Pemanas & LED Menyala', '-', 'Pompa Nutrisi AB Menyala', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(76, 'Ideal', 'Dingin', 'Dingin', 'Sangat buruk', 'Lembab', 'Kurang', 'Asam', 'Kurang', 'Sedang', 'Pemanas & LED Menyala', '-', 'Pompa Nutrisi AB Menyala', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(77, 'Sangat Lembab', 'Ideal', 'Ideal', 'Buruk', 'Lembab', 'Ideal', 'Basa', 'Ideal', 'Lambat', 'LED Menyala', 'Dehumidifer Menyala', '-', 'Pompa pH Turun Menyala', 'Buruk'),
(78, 'Sangat Lembab', 'Ideal', 'Ideal', 'Buruk', 'Lembab', 'Berlebih', 'Basa', 'Ideal', 'Lambat', 'LED Menyala', 'Dehumidifer Menyala', 'Pompa Penguras Menyala', 'Pompa pH Turun Menyala', 'Buruk'),
(79, 'Kering', 'Panas', 'Panas', 'Sangat Buruk', 'Kering', 'Kurang', 'Basa', 'Kurang', 'Cepat', 'Pendigin Menyala', 'Humidifer Menyala', 'Pompa Nutrisi AB Menyala', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(80, 'Sangat Lembab', 'Ideal', 'Ideal', 'Buruk', 'Lembab', 'Ideal', 'Asam', 'Ideal', 'Lambat', 'LED Menyala', 'Dehumidifer Menyala', '-', 'Pompa pH Naik Menyala', 'Buruk'),
(81, 'Sangat Lembab', 'Ideal', 'Ideal', 'Buruk', 'Lembab', 'Berlebih', 'Asam', 'Ideal', 'Lambat', 'LED Menyala', 'Dehumidifer Menyala', 'Pompa Nutrisi AB Menyala', 'Pompa pH Naik Menyala', 'Buruk'),
(82, 'Sangat Lembab', 'Panas', 'Ideal', 'Buruk', 'Lembab', 'Berlebih', 'Asam', 'Ideal', 'Lambat', 'Pendigin Menyala', 'Dehumidifer Menyala', 'Pompa Nutrisi AB Menyala', 'Pompa pH Naik Menyala', 'Buruk'),
(83, 'Sangat Lembab', 'Panas', 'Panas', 'Buruk', 'Lembab', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'Pendigin Menyala', 'Dehumidifer Menyala', '-', '-', 'Buruk'),
(84, 'Sangat Lembab', 'Panas', 'Panas', 'Sangat Buruk', 'Lembab', 'Ideal', 'Ideal', 'Ideal', 'Lambat', 'Pendigin Menyala', 'Dehumidifer Menyala', '-', '-', 'Sangat buruk'),
(85, 'Sangat Lembab', 'Panas', 'Panas', 'Sangat Buruk', 'Lembab', 'Berlebih', 'Ideal', 'Ideal', 'Lambat', 'Pendigin Menyala', 'Dehumidifer Menyala', 'Pompa Penguras Menyala', '-', 'Sangat buruk'),
(86, 'Kering', 'Panas', 'Panas', 'Sangat Buruk', 'Lembab', 'Kurang', 'Asam', 'Kurang', 'Cepat', 'Pendigin Menyala', 'Humidifer Menyala', 'Pompa Nutrisi AB Menyala', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(87, 'Sangat Lembab', 'Panas', 'Panas', 'Sangat Buruk', 'Kering', 'Ideal', 'Basa', 'Kurang', 'Sedang', 'Pendigin Menyala', 'Dehumidifer Menyala', '-', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(88, 'Sangat Lembab', 'Panas', 'Panas', 'Sangat Buruk', 'Kering', 'Berlebih', 'Basa', 'Kurang', 'Sedang', 'Pendigin Menyala', 'Dehumidifer Menyala', 'Pompa Penguras Menyala', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(89, 'Sangat Lembab', 'Panas', 'Panas', 'Sangat Buruk', 'Kering', 'Kurang', 'Basa', 'Kurang', 'Sedang', 'Pendigin Menyala', 'Dehumidifer Menyala', 'Pompa Nutrisi AB Menyala', 'Pompa pH Turun Menyala', 'Sangat buruk'),
(90, 'Sangat Lembab', 'Panas', 'Panas', 'Sangat Buruk', 'Lembab', 'Ideal', 'Asam', 'Kurang', 'Sedang', 'Pendigin Menyala', 'Dehumidifer Menyala', '-', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(91, 'Sangat Lembab', 'Panas', 'Panas', 'Sangat Buruk', 'Lembab', 'Berlebih', 'Asam', 'Kurang', 'Sedang', 'Pendigin Menyala', 'Dehumidifer Menyala', 'Pompa Penguras Menyala', 'Pompa pH Naik Menyala', 'Sangat buruk'),
(92, 'Sangat Lembab', 'Panas', 'Panas', 'Sangat Buruk', 'Lembab', 'Kurang', 'Asam', 'Kurang', 'Sedang', 'Pendigin Menyala', 'Dehumidifer Menyala', 'Pompa Nutrisi AB Menyala', 'Pompa pH Naik Menyala', 'Sangat buruk');

-- --------------------------------------------------------

--
-- Table structure for table `fuzzyrule`
--

CREATE TABLE `fuzzyrule` (
  `id` int(11) NOT NULL,
  `HWID` text NOT NULL,
  `min_rh` varchar(11) NOT NULL,
  `mid_rh` varchar(11) NOT NULL,
  `mid2_rh` varchar(11) NOT NULL,
  `max_rh` varchar(11) NOT NULL,
  `min_suhu_udara` varchar(11) NOT NULL,
  `mid_suhu_udara` varchar(11) NOT NULL,
  `mid2_suhu_udara` varchar(11) NOT NULL,
  `max_suhu_udara` varchar(11) NOT NULL,
  `min_suhu_daun` varchar(11) NOT NULL,
  `mid_suhu_daun` varchar(11) NOT NULL,
  `mid2_suhu_daun` varchar(11) NOT NULL,
  `max_suhu_daun` varchar(11) NOT NULL,
  `min_media_tanam` varchar(11) NOT NULL,
  `mid_media_tanam` varchar(11) NOT NULL,
  `mid2_media_tanam` varchar(11) NOT NULL,
  `max_media_tanam` varchar(11) NOT NULL,
  `min_ppm` varchar(11) NOT NULL,
  `mid_ppm` varchar(11) NOT NULL,
  `mid2_ppm` varchar(11) NOT NULL,
  `max_ppm` varchar(11) NOT NULL,
  `min_ph` varchar(11) NOT NULL,
  `mid_ph` varchar(11) NOT NULL,
  `mid2_ph` varchar(11) NOT NULL,
  `max_ph` varchar(11) NOT NULL,
  `min_oksigen` varchar(11) NOT NULL,
  `mid_oksigen` varchar(11) NOT NULL,
  `mid2_oksigen` varchar(11) NOT NULL,
  `max_oksigen` varchar(11) NOT NULL,
  `jeda_pembacaan` varchar(11) NOT NULL,
  `waktu_penguras` varchar(11) NOT NULL,
  `email` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuzzyrule`
--

INSERT INTO `fuzzyrule` (`id`, `HWID`, `min_rh`, `mid_rh`, `mid2_rh`, `max_rh`, `min_suhu_udara`, `mid_suhu_udara`, `mid2_suhu_udara`, `max_suhu_udara`, `min_suhu_daun`, `mid_suhu_daun`, `mid2_suhu_daun`, `max_suhu_daun`, `min_media_tanam`, `mid_media_tanam`, `mid2_media_tanam`, `max_media_tanam`, `min_ppm`, `mid_ppm`, `mid2_ppm`, `max_ppm`, `min_ph`, `mid_ph`, `mid2_ph`, `max_ph`, `min_oksigen`, `mid_oksigen`, `mid2_oksigen`, `max_oksigen`, `jeda_pembacaan`, `waktu_penguras`, `email`) VALUES
(1, 'VP221201D', '35', '40', '60', '65', '15', '20', '28', '20', '15', '20', '28', '33', '65', '70', '75', '80', '560', '570', '830', '840', '5', '6', '7', '8', '6', '7', '100', '100', '10', '5', 'admin@admin.com'),
(3, 'b5nAOUDx', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '45', '12', 'rosyadi.asad@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `token` text NOT NULL,
  `HWID` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `token`, `HWID`) VALUES
(1, 'admin', 'admin@admin.com', 'default.jpg', '$2y$10$KCGfI4Htsth8LBUvkeHueuiZ8ax1cuwTMlgNELjh4oXpR.SMLXm92', 1, 1, 1676634227, 'zwJdmaOCQoDW9XgH', 'VP221201D'),
(4, 'Mohammad As\'ad Rosyadi', 'rosyadi.asad@gmail.com', 'default.jpg', '$2y$10$NWkAIw/IG5DWHj36lJJVU..2b.7RyCiRUJ0hi2s/9q7IYj3VgsY/.', 2, 1, 1676830845, 'hb8MxX0jdrF2TcZw', 'b5nAOUDx');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 2),
(6, 2, 5),
(10, 1, 4),
(12, 1, 3),
(17, 2, 6),
(19, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Userdata'),
(5, 'Device'),
(6, 'Rest');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Data Pelatihan', 'admin', 'fas fa-fw fa-solid fa-leaf', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(8, 8, 'User Data', 'userdata', 'fa-fw fas fa-users', 1),
(9, 4, 'User Data', 'userdata', 'fas fa-fw fa-users', 1),
(10, 5, 'Fuzzy Rule Device', 'device/fuzzyrule', 'fas fa-fw fa-gamepad', 1),
(11, 5, 'Perhitungan Fuzzy Bayes', 'device', 'fas fa-fw fa-laptop-code', 1),
(12, 1, 'Probabilitas Hasil', 'admin/hasil', 'fas fa-fw fa-solid fa-leaf	', 1),
(13, 1, 'Probabilitas Output', 'admin/output', 'fas fa-fw fa-solid fa-globe', 1),
(14, 5, 'Monitoring', 'device/monitoring', 'fas fa-fw fa-solid fa-desktop', 1),
(15, 5, 'History Device', 'device/historydevice', 'fas fa-fw fa-regular fa-clock', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datasensor`
--
ALTER TABLE `datasensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pelatihan`
--
ALTER TABLE `data_pelatihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuzzyrule`
--
ALTER TABLE `fuzzyrule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datasensor`
--
ALTER TABLE `datasensor`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_pelatihan`
--
ALTER TABLE `data_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `fuzzyrule`
--
ALTER TABLE `fuzzyrule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
