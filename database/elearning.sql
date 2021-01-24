-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2021 at 05:07 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` int(10) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `alamat`) VALUES
(1710000001, 'Agus', 'Mataram'),
(1710000002, 'Adam', 'Mataram'),
(1710000003, 'Ahmad', 'Mataram'),
(1710000004, 'Yunus', 'Mataram'),
(1710000005, 'Maulana', 'Mataram');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_kelas`
--

CREATE TABLE `dosen_kelas` (
  `id` int(10) NOT NULL,
  `kd_kelas` int(10) NOT NULL,
  `nip_dosen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen_kelas`
--

INSERT INTO `dosen_kelas` (`id`, `kd_kelas`, `nip_dosen`) VALUES
(1, 1, 1710000001),
(2, 2, 1710000002),
(3, 3, 1710000003),
(4, 1, 1710000004),
(5, 5, 1710000005);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kd_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `deskripsi_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kd_kelas`, `nama_kelas`, `deskripsi_kelas`) VALUES
(1, 'Pemrograman Web TA 20/21 Ganjil A', 'Kelas A'),
(2, 'Pemrograman Web TA 20/21 Ganjil B', 'Kelas B'),
(3, 'Analisa Algoritma TA 20/21 Ganjil A', 'Kelas A'),
(4, 'Analisa Algoritma TA 20/21 Ganjil B', 'Kelas B'),
(5, 'Testing dan Implementasi TA 20/21 Ganjil A', 'Kelas A'),
(6, 'Testing dan Implementasi TA 20/21 Ganjil B', 'Kelas B'),
(7, 'Pemrograman Linear TA 20/21 Ganjil A', 'Kelas A'),
(8, 'Pemrograman Linear TA 20/21 Ganjil B', 'Kelas B');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `prodi`) VALUES
(1810510007, 'Samuel Kent Nahason Yehuda', 'S1 ILKOM A'),
(1810510013, 'Ferdinand Felix Civanto', 'S1 ILKOM A'),
(1810510014, 'Azra Mahendra', 'S1 ILKOM A'),
(1810520037, 'William Adams Soeherman', 'S1 ILKOM A'),
(1810520039, 'Rahmat Maulana', 'S1 ILKOM A'),
(1810520041, 'Buyung Pratama', 'S1 ILKOM A'),
(1810520042, 'Ogigs', 'S1 ILKOM A'),
(1810520046, 'Dandi', 'S1 ILKOM A'),
(1810520052, 'Jalal', 'S1 ILKOM A');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_kelas`
--

CREATE TABLE `mahasiswa_kelas` (
  `id` int(10) NOT NULL,
  `kd_kelas` int(10) NOT NULL,
  `nim_mahasiswa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa_kelas`
--

INSERT INTO `mahasiswa_kelas` (`id`, `kd_kelas`, `nim_mahasiswa`) VALUES
(1, 1, 1810520037),
(2, 3, 1810520037),
(3, 1, 1810510007),
(4, 3, 1810510007),
(5, 7, 1810520039),
(6, 1, 1810520039);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `nama_dosen` (`nama_dosen`);

--
-- Indexes for table `dosen_kelas`
--
ALTER TABLE `dosen_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip_dosen` (`nip_dosen`),
  ADD KEY `kd_kelas` (`kd_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kd_kelas`),
  ADD UNIQUE KEY `nama_kelas` (`nama_kelas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `nama_mahasiswa` (`nama_mahasiswa`);

--
-- Indexes for table `mahasiswa_kelas`
--
ALTER TABLE `mahasiswa_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim_mahasiswa` (`nim_mahasiswa`),
  ADD KEY `kd_kelas` (`kd_kelas`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen_kelas`
--
ALTER TABLE `dosen_kelas`
  ADD CONSTRAINT `dosen_kelas_ibfk_1` FOREIGN KEY (`nip_dosen`) REFERENCES `dosen` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosen_kelas_ibfk_2` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa_kelas`
--
ALTER TABLE `mahasiswa_kelas`
  ADD CONSTRAINT `mahasiswa_kelas_ibfk_2` FOREIGN KEY (`kd_kelas`) REFERENCES `kelas` (`kd_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_kelas_ibfk_3` FOREIGN KEY (`nim_mahasiswa`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
