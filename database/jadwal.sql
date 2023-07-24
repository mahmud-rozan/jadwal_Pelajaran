-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 09:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `jk`, `alamat`) VALUES
(9, 'Ahmad Dahlans', 'laki-laki', 'bandung\r\n'),
(10, 'Cut Nyak Dien', 'perempuan', 'Aceh'),
(17, 'Lemine', 'laki-laki', 'Cimahi'),
(29, 'angkasa', 'laki-laki', 'bandung\r\n'),
(32, 'Dwi Nyoto', 'perempuan', 'bandung\r\n'),
(33, ' Hj. Diani Widiyani', 'perempuan', 'cimahi'),
(34, 'Neneng Rustiniawati', 'perempuan', 'bandung'),
(35, 'Muliana Hertati', 'perempuan', 'bandung'),
(36, 'Dasep', 'laki-laki', 'bandung\r\n'),
(37, 'Dede Rodiatul Munawaroh', 'laki-laki', 'bandung\r\n'),
(38, 'Sarwo Widodo', 'laki-laki', 'bandung');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_ruangan` int(11) DEFAULT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_jam` int(11) DEFAULT NULL,
  `hari` varchar(30) DEFAULT NULL,
  `id_pelajaran` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_ruangan`, `id_jadwal`, `id_guru`, `id_jam`, `hari`, `id_pelajaran`, `id_kelas`) VALUES
(17, 294, 33, 6, 'senin', 13, 26),
(9, 296, 9, 6, 'rabu', NULL, 26),
(11, 297, 10, 6, 'selasa', 12, 27),
(12, 299, NULL, 6, 'rabu', 32, 26),
(6, 300, 10, 6, 'kamis', NULL, 26),
(7, 303, 34, 7, 'selasa', NULL, 26),
(10, 304, 35, 9, 'senin', NULL, 26),
(11, 305, 10, 9, 'selasa', NULL, 26),
(8, 310, NULL, 6, 'kamis', NULL, 26),
(9, 311, NULL, 6, 'kamis', NULL, 26),
(11, 312, NULL, 7, 'selasa', NULL, 26),
(11, 313, 17, 9, 'rabu', NULL, 26),
(12, 314, NULL, 9, 'rabu', 14, 26),
(12, 315, 9, 9, 'kamis', 19, 26),
(11, 316, NULL, 6, 'kamis', NULL, 26),
(10, 317, NULL, 6, 'kamis', NULL, 26),
(12, 318, NULL, 6, 'kamis', NULL, 26),
(7, 319, NULL, 6, 'kamis', NULL, 26),
(12, 320, 17, 7, 'kamis', NULL, 26),
(13, 321, NULL, 7, 'selasa', NULL, 26),
(9, 323, NULL, 11, 'senin', NULL, 26),
(13, 324, 9, 7, 'jumat', NULL, 26),
(12, 326, NULL, 7, 'jumat', NULL, 26),
(8, 327, NULL, 6, 'rabu', NULL, 27),
(14, 328, NULL, 14, 'senin', NULL, 26),
(6, 329, NULL, 14, 'senin', NULL, 26),
(12, 331, NULL, 14, 'senin', NULL, 26),
(NULL, 332, NULL, 6, 'kamis', 20, 26),
(14, 333, NULL, 10, 'kamis', NULL, 26),
(NULL, 334, 17, 6, 'jumat', NULL, 26),
(17, 335, 17, 6, 'selasa', 32, 26),
(NULL, 336, 29, 6, 'senin', 13, 27),
(11, 338, NULL, 6, 'jumat', 14, 26),
(14, 339, 9, 6, 'senin', 32, 44),
(17, 340, 29, 6, 'selasa', NULL, 44),
(NULL, 341, NULL, 6, 'selasa', 32, 44),
(10, 342, 36, 7, 'senin', 19, 26),
(NULL, 343, NULL, 9, 'selasa', 12, 26),
(NULL, 344, NULL, 7, 'selasa', 20, 26),
(NULL, 345, NULL, 9, 'senin', 14, 26),
(10, 346, 32, 7, 'rabu', 15, 26),
(NULL, 347, NULL, 7, 'kamis', 17, 26),
(NULL, 348, NULL, 7, 'jumat', 13, 26),
(12, 349, 38, 9, 'jumat', 19, 26),
(NULL, 350, NULL, 10, 'senin', 12, 26);

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` int(11) NOT NULL,
  `jam` varchar(30) NOT NULL,
  `mulai` varchar(30) NOT NULL,
  `akhir` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `jam`, `mulai`, `akhir`) VALUES
(6, '1', '07:31', '08:00'),
(7, '2', '08:00', '08:30'),
(9, '3', '08:30', '09:00'),
(10, '4', '09:00', '09:30'),
(11, '5', '10:00', '10:30'),
(12, '6', '10:30', '11:00'),
(13, '7', '11:00', '11:30'),
(14, '8', '11:35', '12:00');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `id_semester`) VALUES
(26, 'TKJ1', 10),
(27, 'TKJ2', 10),
(44, 'TKJ 5', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `pelajaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `pelajaran`) VALUES
(12, 'indonesia'),
(13, 'Bahasa Inggris'),
(14, 'Matematika'),
(15, 'IPA'),
(17, 'Kesenian'),
(19, 'Olahraga'),
(20, 'PAI'),
(32, 'SOJ');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `ruangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `ruangan`) VALUES
(6, 'LAB - 2'),
(8, 'R.G.11'),
(9, 'R.G 22'),
(10, 'R.Z 13'),
(11, 'RG.CB'),
(12, 'RG .23'),
(14, 'RC.45'),
(17, 'LAB -1'),
(22, 'R.C 11');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `semester` enum('ganjil','genap','','') NOT NULL,
  `status` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `tahun`, `semester`, `status`) VALUES
(4, '2020/2022', 'ganjil', '0'),
(10, '2020/2022', 'genap', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `level`) VALUES
(10, 'admin', 'admin', 'Administrasi', 1),
(14, 'rubi', 'rubi', 'rubi', 0),
(24, 'mahmud', 'mahmud', 'mahmud ', 1),
(36, 'ilham ', 'ilham', 'ilham', 0),
(40, 'aris', 'aris', 'aris', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_jam` (`id_jam`),
  ADD KEY `id_pelajaran` (`id_pelajaran`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_semester` (`id_semester`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `id_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_jam` FOREIGN KEY (`id_jam`) REFERENCES `jam` (`id_jam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_pelajaran` FOREIGN KEY (`id_pelajaran`) REFERENCES `pelajaran` (`id_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `id_semester` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id_semester`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
