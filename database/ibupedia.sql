-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 02:23 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibupedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(2, 'admin', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `id_anak` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_vaksin` int(11) NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `berat_badan` decimal(3,2) NOT NULL,
  `tinggi_badan` decimal(3,0) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mpasi`
--

CREATE TABLE `mpasi` (
  `id_mpasi` int(11) NOT NULL,
  `nama_mpasi` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL,
  `bulan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mpasi`
--

INSERT INTO `mpasi` (`id_mpasi`, `nama_mpasi`, `deskripsi`, `gambar`, `bulan`) VALUES
(1, 'asd', 'asd', '1-asd.png', 45);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `no_hp` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `nama`, `jk`, `no_hp`) VALUES
(2, 'agus', 'agus', 'Agus', 'Laki-Laki', '098732');

-- --------------------------------------------------------

--
-- Table structure for table `tumbang`
--

CREATE TABLE `tumbang` (
  `id_tumbang` int(11) NOT NULL,
  `usia` int(11) NOT NULL,
  `pertumbuhan` text NOT NULL,
  `perkembangan` text NOT NULL,
  `stimulasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tumbang`
--

INSERT INTO `tumbang` (`id_tumbang`, `usia`, `pertumbuhan`, `perkembangan`, `stimulasi`) VALUES
(1, 2, 'asd145', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `vaksin`
--

CREATE TABLE `vaksin` (
  `id_vaksin` int(11) NOT NULL,
  `nama_vaksin` varchar(25) NOT NULL,
  `deskripsi` text NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaksin`
--

INSERT INTO `vaksin` (`id_vaksin`, `nama_vaksin`, `deskripsi`, `bulan`, `tahun`) VALUES
(3, 'Vaksin 1', 'Deksripaisd', 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id_anak`),
  ADD KEY `id_pengguna` (`id_pengguna`,`id_vaksin`),
  ADD KEY `id_vaksin` (`id_vaksin`);

--
-- Indexes for table `mpasi`
--
ALTER TABLE `mpasi`
  ADD PRIMARY KEY (`id_mpasi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tumbang`
--
ALTER TABLE `tumbang`
  ADD PRIMARY KEY (`id_tumbang`);

--
-- Indexes for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD PRIMARY KEY (`id_vaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mpasi`
--
ALTER TABLE `mpasi`
  MODIFY `id_mpasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tumbang`
--
ALTER TABLE `tumbang`
  MODIFY `id_tumbang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaksin`
--
ALTER TABLE `vaksin`
  MODIFY `id_vaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anak`
--
ALTER TABLE `anak`
  ADD CONSTRAINT `anak_ibfk_1` FOREIGN KEY (`id_vaksin`) REFERENCES `vaksin` (`id_vaksin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anak_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
