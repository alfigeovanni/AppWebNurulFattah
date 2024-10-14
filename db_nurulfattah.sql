-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 12:51 PM
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
-- Database: `db_nurulfattah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_konten_sub_materi`
--

CREATE TABLE `tb_konten_sub_materi` (
  `id_konten_sub_materi` int(11) NOT NULL,
  `id_sub_materi` int(11) NOT NULL,
  `nama_konten_materi` varchar(100) NOT NULL,
  `file_konten_materi` varchar(255) NOT NULL,
  `date_update` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_konten_sub_materi`
--

INSERT INTO `tb_konten_sub_materi` (`id_konten_sub_materi`, `id_sub_materi`, `nama_konten_materi`, `file_konten_materi`, `date_update`) VALUES
(8, 9, 'Doa Makan', '1807066469_0614317742024.pdf', '2024-06-14 15:15:31'),
(9, 9, 'Doa Mandi Junub', '2030679219_06145849092024.pdf', '2024-06-14 15:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `nama_materi` varchar(100) NOT NULL,
  `date_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `nama_materi`, `date_update`) VALUES
(1, 'Doa', '2024-03-20 19:33:29'),
(11, 'Wirid', '2024-03-28 02:39:57'),
(12, 'Tutorial Ibadah', '2024-06-05 17:46:24'),
(13, 'Maulid', '2024-06-05 17:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_materi`
--

CREATE TABLE `tb_sub_materi` (
  `id_sub_materi` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `nama_sub_materi` varchar(100) NOT NULL,
  `date_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sub_materi`
--

INSERT INTO `tb_sub_materi` (`id_sub_materi`, `id_materi`, `nama_sub_materi`, `date_update`) VALUES
(9, 1, 'Doa Keseharian', '2024-06-13 17:48:25'),
(15, 1, 'Doa Rezeki', '2024-06-14 09:16:47'),
(16, 1, 'Doa Tolak Bala', '2024-06-14 09:17:03'),
(17, 1, 'Doa Kesehatan', '2024-06-14 09:17:24'),
(18, 1, 'Doa Perjalanan', '2024-06-14 09:17:24'),
(19, 1, 'Doa Ilmu', '2024-06-14 09:17:45'),
(20, 1, 'Doa Waktu Tertentu', '2024-06-14 09:17:45'),
(21, 1, 'Doa Kualitas Diri', '2024-06-14 09:18:26'),
(22, 1, 'Doa Pernikahan & Rumah Tangga', '2024-06-14 09:18:26'),
(23, 1, 'Doa Hamil & Persalinan', '2024-06-14 09:19:10'),
(24, 1, 'Doa para Nabi di Al-Qur\'an', '2024-06-14 09:19:10'),
(25, 1, 'Doa Wudhu', '2024-06-14 09:19:39'),
(26, 1, 'Doa Shalat', '2024-06-14 09:19:39'),
(27, 1, 'Doa Haji & Umrah', '2024-06-14 09:20:03'),
(28, 11, 'Wirid Harian', '2024-06-14 09:21:44'),
(29, 11, 'Shalawat', '2024-06-14 09:21:44'),
(30, 12, 'Sholat Fardhu', '2024-06-14 09:38:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `date_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `fullname`, `date_update`) VALUES
(1, 'adminganteng', '21232f297a57a5a743894a0e4a801fc3', 'Geovanni', '2024-03-18 20:23:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_konten_sub_materi`
--
ALTER TABLE `tb_konten_sub_materi`
  ADD PRIMARY KEY (`id_konten_sub_materi`),
  ADD KEY `id_sub_materi` (`id_sub_materi`) USING BTREE;

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `tb_sub_materi`
--
ALTER TABLE `tb_sub_materi`
  ADD PRIMARY KEY (`id_sub_materi`),
  ADD KEY `id_materi` (`id_materi`) USING BTREE;

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_konten_sub_materi`
--
ALTER TABLE `tb_konten_sub_materi`
  MODIFY `id_konten_sub_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_sub_materi`
--
ALTER TABLE `tb_sub_materi`
  MODIFY `id_sub_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_konten_sub_materi`
--
ALTER TABLE `tb_konten_sub_materi`
  ADD CONSTRAINT `tb_konten_sub_materi_ibfk_1` FOREIGN KEY (`id_sub_materi`) REFERENCES `tb_sub_materi` (`id_sub_materi`);

--
-- Constraints for table `tb_sub_materi`
--
ALTER TABLE `tb_sub_materi`
  ADD CONSTRAINT `tb_sub_materi_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
