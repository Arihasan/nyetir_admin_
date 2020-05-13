-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 10:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nyetir`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE IF NOT EXISTS `t_admin` (
`idadmin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` char(30) NOT NULL,
  `sandi` char(100) NOT NULL,
  `stts_admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`idadmin`, `nama_admin`, `username`, `sandi`, `stts_admin`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0),
(90, 'ari', 'ari', '81dc9bdb52d04dc20036dbd8313ed055', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis_mobil`
--

CREATE TABLE IF NOT EXISTS `t_jenis_mobil` (
`id_jenis` int(11) NOT NULL,
  `jns_mobil` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_jenis_mobil`
--

INSERT INTO `t_jenis_mobil` (`id_jenis`, `jns_mobil`) VALUES
(1, 'Manual'),
(2, 'Matic');

-- --------------------------------------------------------

--
-- Table structure for table `t_metode`
--

CREATE TABLE IF NOT EXISTS `t_metode` (
`id_metode` int(11) NOT NULL,
  `nm_metode` varchar(60) NOT NULL,
  `kode` varchar(60) NOT NULL,
  `jns_metode` int(11) NOT NULL DEFAULT '0',
  `ket` text NOT NULL,
  `stts_metode` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_metode`
--

INSERT INTO `t_metode` (`id_metode`, `nm_metode`, `kode`, `jns_metode`, `ket`, `stts_metode`) VALUES
(5, 'OVO', '123 123 123 123', 1, '', 0),
(6, 'BCA', '1234556', 0, '', 0),
(7, 'DANA', '67578678687', 1, '', 0),
(10, 'Mandiri', '87900012', 0, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_paket`
--

CREATE TABLE IF NOT EXISTS `t_paket` (
`id_paket` int(11) NOT NULL,
  `nm_paket` varchar(60) NOT NULL,
  `hrg_paket` int(11) NOT NULL,
  `dtl_paket` text NOT NULL,
  `stts_paket` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_paket`
--

INSERT INTO `t_paket` (`id_paket`, `nm_paket`, `hrg_paket`, `dtl_paket`, `stts_paket`) VALUES
(5, 'Paket 1', 250000, '4x Pertemuan(Durasi 45 Menit) ', 0),
(6, 'Paket 2', 370000, '6x Pertemuan(Durasi 45 Menit)', 0),
(7, 'Paket 3', 500000, '8x Pertemuan(Durasi 45 Menit)', 0),
(8, 'Paket 4', 625000, '10x Pertemuan(Durasi 45 Menit)', 0),
(9, 'Paket 5', 700000, '12x Pertemuan(Durasi 45 Menit)', 0),
(10, 'Paket 6', 800000, '15x Pertemuan(Durasi 45 Menit)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `t_pendaftaran` (
  `id_daftar` char(20) NOT NULL,
  `id_peserta` char(20) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `sc_sim` text,
  `sc_ktp` text,
  `sc_bukti` text,
  `tgl_daftar` date NOT NULL,
  `tgl_jemput` date NOT NULL,
  `penjemputan` int(11) DEFAULT NULL,
  `idadmin` int(11) DEFAULT NULL,
  `stts_daftar` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_penjemputan`
--

CREATE TABLE IF NOT EXISTS `t_penjemputan` (
`id_jemput` int(11) NOT NULL,
  `penjemputan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_penjemputan`
--

INSERT INTO `t_penjemputan` (`id_jemput`, `penjemputan`) VALUES
(5, 'Sesuai kehendak Peserta');

-- --------------------------------------------------------

--
-- Table structure for table `t_peserta`
--

CREATE TABLE IF NOT EXISTS `t_peserta` (
  `id_peserta` char(20) NOT NULL,
  `nik` char(16) NOT NULL,
  `nm_lgkp` varchar(60) NOT NULL,
  `no_hp` char(20) NOT NULL,
  `email` char(60) NOT NULL,
  `alamat` text NOT NULL,
  `sandi` text NOT NULL,
  `stts_peserta` int(11) NOT NULL DEFAULT '0',
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
 ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `t_jenis_mobil`
--
ALTER TABLE `t_jenis_mobil`
 ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `t_metode`
--
ALTER TABLE `t_metode`
 ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `t_paket`
--
ALTER TABLE `t_paket`
 ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `t_pendaftaran`
--
ALTER TABLE `t_pendaftaran`
 ADD PRIMARY KEY (`id_daftar`), ADD KEY `id_peserta` (`id_peserta`), ADD KEY `id_paket` (`id_paket`), ADD KEY `idadmin` (`idadmin`), ADD KEY `id_metode` (`id_metode`), ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `t_penjemputan`
--
ALTER TABLE `t_penjemputan`
 ADD PRIMARY KEY (`id_jemput`);

--
-- Indexes for table `t_peserta`
--
ALTER TABLE `t_peserta`
 ADD PRIMARY KEY (`id_peserta`), ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_admin`
--
ALTER TABLE `t_admin`
MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `t_jenis_mobil`
--
ALTER TABLE `t_jenis_mobil`
MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_metode`
--
ALTER TABLE `t_metode`
MODIFY `id_metode` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_paket`
--
ALTER TABLE `t_paket`
MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `t_penjemputan`
--
ALTER TABLE `t_penjemputan`
MODIFY `id_jemput` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_pendaftaran`
--
ALTER TABLE `t_pendaftaran`
ADD CONSTRAINT `t_pendaftaran_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `t_paket` (`id_paket`) ON UPDATE CASCADE,
ADD CONSTRAINT `t_pendaftaran_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `t_peserta` (`id_peserta`) ON UPDATE CASCADE,
ADD CONSTRAINT `t_pendaftaran_ibfk_3` FOREIGN KEY (`idadmin`) REFERENCES `t_admin` (`idadmin`) ON UPDATE CASCADE,
ADD CONSTRAINT `t_pendaftaran_ibfk_4` FOREIGN KEY (`id_metode`) REFERENCES `t_metode` (`id_metode`) ON UPDATE CASCADE,
ADD CONSTRAINT `t_pendaftaran_ibfk_5` FOREIGN KEY (`id_jenis`) REFERENCES `t_jenis_mobil` (`id_jenis`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
