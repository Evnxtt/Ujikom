-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 03:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_masyarakat`
--

CREATE TABLE `data_masyarakat` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tlp` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_masyarakat`
--

INSERT INTO `data_masyarakat` (`nik`, `nama`, `username`, `password`, `tlp`) VALUES
('11111111', 'Muhamad Zakki', 'zaki', '1234', '082463132123'),
('22222222', 'Cika jesika', 'cika22', '4444', '0872135463'),
('3513091704430003', 'Jamaludin', 'Agus', 'agus', '081236541254'),
('3513091704430008', 'Erik', 'Erik', '1234', '0812365478965');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengaduan`
--

CREATE TABLE `data_pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgl_kejadian` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `isi_laporan` text NOT NULL,
  `file` longtext NOT NULL,
  `status` enum('Belum Ditanggapi','Sudah Ditanggapi','Pengaduan Ditolak','Sedang Di Proses') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_pengaduan`
--

INSERT INTO `data_pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `tgl_kejadian`, `nik`, `kategori`, `isi_laporan`, `file`, `status`) VALUES
(3, '2023-03-02 06:51:36', '0000-00-00', '3513091704430003', 'Jalanan', 'Jalanan Rusak', '63feb4d0b235b.jpeg', 'Sudah Ditanggapi'),
(6, '2023-03-02 03:30:46', '0000-00-00', '3513091704430005', 'Lainya', 'Tawuran Pelajar', '63fffcfe517f4.jpeg', 'Belum Ditanggapi');

-- --------------------------------------------------------

--
-- Table structure for table `data_petugas`
--

CREATE TABLE `data_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `level` enum('Admin','Petugas','','') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_petugas`
--

INSERT INTO `data_petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `tlp`, `level`) VALUES
(1002, 'Wildan susanto', 'wildan', '12', '082463132123', 'Admin'),
(2002, 'Linda pramesti', 'linda', '23', '0893215631', 'Petugas'),
(3002, 'Reza Parmesan', 'Reza', '1234', '081236541254', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `data_tanggapan`
--

CREATE TABLE `data_tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggapan` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_petugas` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `data_tanggapan`
--

INSERT INTO `data_tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `status`, `id_petugas`) VALUES
(1, 1, '2023-03-02 06:04:42', 'Pengaduan Sudah Kami Laporkan Masa', 'Pending', 'Wildan susanto'),
(10, 0, '2023-03-02 06:04:19', 'Tawuranya Sedang Dibubarkan', 'Diproses', 'Wildan susanto'),
(6, 0, '2023-03-02 06:05:02', 'Tanah Longsor Sudah Kami Atasi', 'Diproses', 'Linda pramesti');

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_pengaduan`
-- (See below for the actual view)
--
CREATE TABLE `detail_pengaduan` (
`id_pengaduan` int(11)
,`tgl_pengaduan` date
,`nik` varchar(16)
,`nama` varchar(255)
,`kategori` varchar(255)
,`isi_laporan` text
,`foto` longtext
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `detail_tanggapan`
-- (See below for the actual view)
--
CREATE TABLE `detail_tanggapan` (
`id_tanggapan` int(11)
,`id_pengaduan` int(11)
,`tgl_pengaduan` date
,`nik` varchar(16)
,`nama` varchar(255)
,`tgl_tanggapan` date
,`status` varchar(10)
,`tanggapan` text
,`nama_petugas` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `detail_pengaduan`
--
DROP TABLE IF EXISTS `detail_pengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_pengaduan`  AS SELECT `p`.`id_pengaduan` AS `id_pengaduan`, `p`.`tgl_pengaduan` AS `tgl_pengaduan`, `m`.`nik` AS `nik`, `m`.`nama` AS `nama`, `p`.`kategori` AS `kategori`, `p`.`isi_laporan` AS `isi_laporan`, `p`.`foto` AS `foto` FROM (`db_pengaduan`.`data_masyarakat` `m` join `db_pengaduan`.`data_pengaduan` `p`) WHERE `m`.`nik` = `p`.`nik``nik`  ;

-- --------------------------------------------------------

--
-- Structure for view `detail_tanggapan`
--
DROP TABLE IF EXISTS `detail_tanggapan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_tanggapan`  AS SELECT `t`.`id_tanggapan` AS `id_tanggapan`, `p`.`id_pengaduan` AS `id_pengaduan`, `p`.`tgl_pengaduan` AS `tgl_pengaduan`, `m`.`nik` AS `nik`, `m`.`nama` AS `nama`, `t`.`tgl_tanggapan` AS `tgl_tanggapan`, `t`.`status` AS `status`, `t`.`tanggapan` AS `tanggapan`, `g`.`nama_petugas` AS `nama_petugas` FROM (((`db_pengaduan`.`data_masyarakat` `m` join `db_pengaduan`.`data_pengaduan` `p`) join `db_pengaduan`.`data_tanggapan` `t`) join `db_pengaduan`.`data_petugas` `g`) WHERE `m`.`nik` = `p`.`nik` AND `p`.`id_pengaduan` = `t`.`id_pengaduan` AND `g`.`id_petugas` = `t`.`id_petugas``id_petugas`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_masyarakat`
--
ALTER TABLE `data_masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `data_pengaduan`
--
ALTER TABLE `data_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `data_tanggapan`
--
ALTER TABLE `data_tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pengaduan`
--
ALTER TABLE `data_pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_petugas`
--
ALTER TABLE `data_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5003;

--
-- AUTO_INCREMENT for table `data_tanggapan`
--
ALTER TABLE `data_tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
