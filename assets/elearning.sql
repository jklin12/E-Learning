-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 08:04 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `t_jadwal`
--

CREATE TABLE `t_jadwal` (
  `id_jadwal` int(15) NOT NULL,
  `id_mapel` varchar(55) NOT NULL,
  `id_kelas` varchar(55) NOT NULL,
  `nip` int(15) NOT NULL,
  `hari` int(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_jadwal`
--

INSERT INTO `t_jadwal` (`id_jadwal`, `id_mapel`, `id_kelas`, `nip`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, 'BING', 'XIPA1', 696, 1, '07:00:00', '09:00:00'),
(2, 'BI', 'XIPA1', 999, 1, '09:15:00', '11:15:00'),
(3, 'IPA', 'XIPA1', 999, 2, '09:15:00', '11:15:00'),
(4, 'IPS', 'XIPA1', 696, 3, '07:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_kelas`
--

CREATE TABLE `t_kelas` (
  `id_kelas` varchar(55) NOT NULL,
  `nama_kelas` varchar(155) NOT NULL,
  `urutan_kelas` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `nama_kelas`, `urutan_kelas`) VALUES
('XIPA1', 'X-IPA 1', 1),
('XIPA2', 'X-IPA 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_mapel`
--

CREATE TABLE `t_mapel` (
  `id_mapel` varchar(55) NOT NULL,
  `nama_mapel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_mapel`
--

INSERT INTO `t_mapel` (`id_mapel`, `nama_mapel`) VALUES
('BI', 'Bahasa Indonesia'),
('BING', 'Bahasa Inggris'),
('IPA', 'Ilmu Pengetahuan Alam'),
('IPS', 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `t_materi`
--

CREATE TABLE `t_materi` (
  `id_materi` int(15) NOT NULL,
  `id_mapel` varchar(55) NOT NULL,
  `id_pertemuan` int(12) NOT NULL,
  `id_kelas` varchar(12) NOT NULL,
  `nip` int(15) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `materi` varchar(255) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_materi`
--

INSERT INTO `t_materi` (`id_materi`, `id_mapel`, `id_pertemuan`, `id_kelas`, `nip`, `judul`, `deskripsi`, `materi`, `tgl_upload`) VALUES
(1, 'BING', 1, 'XIPA1', 696, 'materi B inggris pertemuan 1', 'materi B inggris pertemuan 1', '', '2020-12-02 14:38:12'),
(2, 'BING', 2, '', 696, 'materi B inggris pertemuan 1', 'materi B inggris pertemuan 1', '', '2020-12-02 13:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `t_pengajar`
--

CREATE TABLE `t_pengajar` (
  `nip` varchar(45) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL,
  `tempat_lahir` varchar(45) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_pengajar`
--

INSERT INTO `t_pengajar` (`nip`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `foto`) VALUES
('696', 'Arbi Putra', 'L', 'Nganjuk', '1990-01-02', 'jl Nganjuk guyangan', 'userfiles/images/default_pp.png'),
('999', 'Zuhdi Latip', 'L', 'Nganjuk', '1990-01-02', 'jl Nganjuk guyangan', NULL),
('6565', 'Willy saputra', 'P', 'Pacitan', '1990-09-11', 'mbuh', NULL),
('98532', 'hari', 'L', 'yogyakarta', '1194-05-04', 'alamat', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_pertemuan`
--

CREATE TABLE `t_pertemuan` (
  `id_pertemuan` int(12) NOT NULL,
  `id_jadwal` int(12) NOT NULL,
  `tgl_pertemuan` date NOT NULL,
  `urutan_pertemuan` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pertemuan`
--

INSERT INTO `t_pertemuan` (`id_pertemuan`, `id_jadwal`, `tgl_pertemuan`, `urutan_pertemuan`) VALUES
(1, 1, '2020-12-05', 1),
(2, 1, '2020-12-14', 2),
(3, 3, '2020-12-08', 1),
(4, 3, '2020-12-15', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE `t_siswa` (
  `nis` varchar(45) NOT NULL,
  `id_kelas` varchar(55) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('P','L','','') NOT NULL COMMENT 'Laki-laki dan Perempuan',
  `tempat_lahir` varchar(45) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` char(7) DEFAULT NULL,
  `alamat` varchar(255) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status_id` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=aktif, 2=blok, 3=alumni, 4=deleted'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_siswa`
--

INSERT INTO `t_siswa` (`nis`, `id_kelas`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat`, `tahun_masuk`, `foto`, `status_id`) VALUES
('666', 'XIPA1', 'faris aizy', 'L', 'Magetan', '1998-07-18', 'Islam', 'baciro yogyakarta', 2010, 'userfiles/images/default_siswi.png', 0),
('254', 'XIPA1', 'faris aizy', 'L', 'magetan', '1994-07-16', NULL, 'alamat', 0000, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `pengajar_id` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL COMMENT '0=tidak,1=ya',
  `reset_kode` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `siswa_id`, `pengajar_id`, `is_admin`, `reset_kode`) VALUES
(1, 'faris123', 'caf1a3dfb505ffed0d024130f58c5cfa', 666, NULL, 0, NULL),
(2, 'arbi', '202cb962ac59075b964b07152d234b70', NULL, 696, 0, NULL),
(7, 'willy', '202cb962ac59075b964b07152d234b70', NULL, 6565, 0, NULL),
(8, 'admin', '202cb962ac59075b964b07152d234b70', NULL, NULL, 1, NULL),
(9, 'hari', '202cb962ac59075b964b07152d234b70', NULL, 98532, 0, NULL),
(10, 'faris', '202cb962ac59075b964b07152d234b70', 254, NULL, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `t_mapel`
--
ALTER TABLE `t_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `t_materi`
--
ALTER TABLE `t_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `t_pengajar`
--
ALTER TABLE `t_pengajar`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `t_pertemuan`
--
ALTER TABLE `t_pertemuan`
  ADD PRIMARY KEY (`id_pertemuan`);

--
-- Indexes for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_id` (`siswa_id`,`pengajar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_jadwal`
--
ALTER TABLE `t_jadwal`
  MODIFY `id_jadwal` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_materi`
--
ALTER TABLE `t_materi`
  MODIFY `id_materi` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_pertemuan`
--
ALTER TABLE `t_pertemuan`
  MODIFY `id_pertemuan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
