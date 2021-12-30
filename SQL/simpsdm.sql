-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 09:43 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpsdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_user` int(4) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `namalengkap` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `type` varchar(12) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_user`, `username`, `email`, `namalengkap`, `password`, `type`, `avatar`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Pengelola', '21232f297a57a5a743894a0e4a801fc3', 'admin', '227e94513592b1c6f265d690ba01222c.png'),
(8, 'Supervisor', 'kepalapsdm@uts.ac.id', 'Kepala PSDM', '202cb962ac59075b964b07152d234b70', 'supervisor', 'e5f6b17df68567d098256a9081aecc6b.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` int(4) NOT NULL,
  `nama_bidang` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Dosen Tetap'),
(2, 'Dosen SKS'),
(3, 'Tenaga Penunjang'),
(4, 'Tenaga Pendidik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dkebutuhan`
--

CREATE TABLE `tb_dkebutuhan` (
  `id_dkebutuhan` int(4) NOT NULL,
  `id_kebutuhan` int(4) NOT NULL,
  `id_nkebutuhan` int(4) NOT NULL,
  `id` int(4) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dkebutuhan`
--

INSERT INTO `tb_dkebutuhan` (`id_dkebutuhan`, `id_kebutuhan`, `id_nkebutuhan`, `id`, `tgl_pengajuan`, `tgl_mulai`, `tgl_akhir`, `status`) VALUES
(1, 1, 1, 1, '2021-12-31', '2021-12-30', '2021-12-31', 'approved'),
(10, 1, 1, 1, '2021-12-31', '2021-12-31', '2022-01-20', 'waiting'),
(13, 1, 3, 1, '2021-12-31', '2021-12-31', '2022-05-28', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dkeluhan`
--

CREATE TABLE `tb_dkeluhan` (
  `id_dkeluhan` int(4) NOT NULL,
  `id_keluhan` int(4) NOT NULL,
  `id` int(4) NOT NULL,
  `keluhan` text NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dkeluhan`
--

INSERT INTO `tb_dkeluhan` (`id_dkeluhan`, `id_keluhan`, `id`, `keluhan`, `tgl_pengajuan`, `status`) VALUES
(1, 3, 1, 'Gaji belum keluar', '2021-12-31', 'waiting'),
(4, 2, 1, 'Belum ada duit bayar SPP', '2021-12-31', 'waiting'),
(5, 3, 1, 'Gaji belom keluar', '2021-12-31', 'waiting'),
(6, 2, 1, 'Gaji sudah masuk tapi belom ada notifikasi', '2021-12-31', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosensks`
--

CREATE TABLE `tb_dosensks` (
  `id_dosensks` int(4) NOT NULL,
  `id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosentetap`
--

CREATE TABLE `tb_dosentetap` (
  `id_dosentetap` int(4) NOT NULL,
  `id` int(4) NOT NULL,
  `nip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dosentetap`
--

INSERT INTO `tb_dosentetap` (`id_dosentetap`, `id`, `nip`) VALUES
(1, 1, 34244234);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(4) NOT NULL,
  `nama_jabatan` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Supervisor'),
(2, 'Admin'),
(3, 'Sekretaris'),
(4, 'Admin 2'),
(5, 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kebutuhan`
--

CREATE TABLE `tb_kebutuhan` (
  `id_kebutuhan` int(4) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kebutuhan`
--

INSERT INTO `tb_kebutuhan` (`id_kebutuhan`, `type`) VALUES
(1, 'Cuti'),
(2, 'Pembuatan Surat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluhan`
--

CREATE TABLE `tb_keluhan` (
  `id_keluhan` int(4) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keluhan`
--

INSERT INTO `tb_keluhan` (`id_keluhan`, `type`) VALUES
(1, 'Administrasi'),
(2, 'Hubungan Kerja'),
(3, 'Penggajian'),
(4, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nkebutuhan`
--

CREATE TABLE `tb_nkebutuhan` (
  `id_nkebutuhan` int(4) NOT NULL,
  `id_kebutuhan` int(4) NOT NULL,
  `nama_kebutuhan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_nkebutuhan`
--

INSERT INTO `tb_nkebutuhan` (`id_nkebutuhan`, `id_kebutuhan`, `nama_kebutuhan`) VALUES
(1, 1, 'Cuti Sakit'),
(2, 2, 'Rekomendasi Studi S2'),
(3, 1, 'Cuti Hamil');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(4) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `id_jabatan` int(4) NOT NULL,
  `id_bidang` int(4) NOT NULL,
  `alamat` text NOT NULL,
  `no_handphone` int(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `tanggal_regis` date NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `id_jabatan`, `id_bidang`, `alamat`, `no_handphone`, `email`, `password`, `id_user`, `tanggal_regis`, `avatar`) VALUES
(1, 'Muhammad Jafar', 'Batu Alang', '2021-12-30', 'Laki-laki', 8, 1, 'Batu Alang', 595324, 'pengguna@gmail.com', '202cb962ac59075b964b07152d234b70', 'Pengguna', '2021-12-30', '81932d6553707b24e56ee2702b77ce8d.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tedik`
--

CREATE TABLE `tb_tedik` (
  `id_tedik` int(4) NOT NULL,
  `id` int(4) NOT NULL,
  `nip` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tepen`
--

CREATE TABLE `tb_tepen` (
  `id_tepen` int(4) NOT NULL,
  `id` int(4) NOT NULL,
  `nik` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `tb_dkebutuhan`
--
ALTER TABLE `tb_dkebutuhan`
  ADD PRIMARY KEY (`id_dkebutuhan`);

--
-- Indexes for table `tb_dkeluhan`
--
ALTER TABLE `tb_dkeluhan`
  ADD PRIMARY KEY (`id_dkeluhan`);

--
-- Indexes for table `tb_dosensks`
--
ALTER TABLE `tb_dosensks`
  ADD PRIMARY KEY (`id_dosensks`);

--
-- Indexes for table `tb_dosentetap`
--
ALTER TABLE `tb_dosentetap`
  ADD PRIMARY KEY (`id_dosentetap`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_kebutuhan`
--
ALTER TABLE `tb_kebutuhan`
  ADD PRIMARY KEY (`id_kebutuhan`);

--
-- Indexes for table `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  ADD PRIMARY KEY (`id_keluhan`);

--
-- Indexes for table `tb_nkebutuhan`
--
ALTER TABLE `tb_nkebutuhan`
  ADD PRIMARY KEY (`id_nkebutuhan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tedik`
--
ALTER TABLE `tb_tedik`
  ADD PRIMARY KEY (`id_tedik`);

--
-- Indexes for table `tb_tepen`
--
ALTER TABLE `tb_tepen`
  ADD PRIMARY KEY (`id_tepen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_dkebutuhan`
--
ALTER TABLE `tb_dkebutuhan`
  MODIFY `id_dkebutuhan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_dkeluhan`
--
ALTER TABLE `tb_dkeluhan`
  MODIFY `id_dkeluhan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_dosensks`
--
ALTER TABLE `tb_dosensks`
  MODIFY `id_dosensks` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_dosentetap`
--
ALTER TABLE `tb_dosentetap`
  MODIFY `id_dosentetap` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kebutuhan`
--
ALTER TABLE `tb_kebutuhan`
  MODIFY `id_kebutuhan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  MODIFY `id_keluhan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_nkebutuhan`
--
ALTER TABLE `tb_nkebutuhan`
  MODIFY `id_nkebutuhan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_tedik`
--
ALTER TABLE `tb_tedik`
  MODIFY `id_tedik` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tepen`
--
ALTER TABLE `tb_tepen`
  MODIFY `id_tepen` int(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
