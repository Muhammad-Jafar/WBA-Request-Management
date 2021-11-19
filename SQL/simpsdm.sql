-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 06:01 PM
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
  `id_user` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `namalengkap` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_user`, `username`, `email`, `namalengkap`, `password`, `type`, `avatar`) VALUES
(1, 'jafar', 'admin@gmail.com', 'Muhammad Jafar', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'c002a849878f12c22d383a86f3fa1e2b.png'),
(6, 'baak', 'baak@gmail.com', 'Ka. BAAK', 'f6edb4c31cf9be5ce497d12251a9d29e', 'baak', '2b10f8e9a8cf35bd216750928492d585.jpg'),
(7, 'baak2', 'baak2@gmail.com', 'Ka. BAAK 2', '3cf1462ae5dadb71e6d875df74ecbd9f', 'baak', 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` int(255) NOT NULL,
  `nama_bidang` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'Dosen'),
(2, 'Mahasiswa'),
(3, 'Staff ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dkebutuhan`
--

CREATE TABLE `tb_dkebutuhan` (
  `id_dkebutuhan` int(255) NOT NULL,
  `id_kebutuhan` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nim_nip` int(255) NOT NULL,
  `alamat` text NOT NULL,
  `nowa` int(255) NOT NULL,
  `fak_prodi` varchar(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dkebutuhan`
--

INSERT INTO `tb_dkebutuhan` (`id_dkebutuhan`, `id_kebutuhan`, `nama_lengkap`, `nim_nip`, `alamat`, `nowa`, `fak_prodi`, `id_bidang`, `tgl_pengajuan`, `tgl_mulai`, `tgl_akhir`, `status`) VALUES
(1, 4, 'Muhammad Jafar', 1701071075, 'Batu Alang', 414, 'Rekayasa Sistem / TEknik Informatika', 2, '2021-11-02', '2021-11-02', '2021-11-02', 'waiting'),
(3, 0, 'Bukit Permai', 2, '4144', 1701071075, 'Teknik Lingkungan dan Mineral / Teknik Lingkungan', 0, '2021-11-11', '2021-11-11', '2021-11-11', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dkeluhan`
--

CREATE TABLE `tb_dkeluhan` (
  `id_dkeluhan` int(255) NOT NULL,
  `id_keluhan` int(255) NOT NULL,
  `keluhan` text NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nowa` int(255) NOT NULL,
  `nim_nip` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `fak_prodi` varchar(255) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dkeluhan`
--

INSERT INTO `tb_dkeluhan` (`id_dkeluhan`, `id_keluhan`, `keluhan`, `nama_lengkap`, `alamat`, `nowa`, `nim_nip`, `id_bidang`, `fak_prodi`, `tgl_pengajuan`, `status`) VALUES
(4, 1, 'Siakad terblokir', 'Jafar', 'Buton', 312313, 1701071075, 2, 'Rekayasa Sistem / Teknik Informatika', '2021-11-04', 'approved'),
(5, 1, 'Lupa sandi siakad', 'Deni', 'Bukit Permai', 12132, 1801061055, 2, 'Teknik Lingkungan dan Mineral / Teknik Lingkungan', '2021-11-04', 'waiting'),
(6, 1, 'Lapar, belum makan', 'Fazril', 'Wolowa Buton', 15352, 1701, 2, 'Psikologi / Psikologi', '2021-11-05', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Teknobiologi'),
(2, 'Psikologi'),
(3, 'Teknik Lingkungan dan Mineral'),
(4, 'Rekayasa Sistem'),
(5, 'Ilmu Komunikasi'),
(6, 'Teknologi Pertanian'),
(7, 'Ekonomi Dan Bisnis');

-- --------------------------------------------------------

--
-- Table structure for table `tb_izin`
--

CREATE TABLE `tb_izin` (
  `id_izin` int(255) NOT NULL,
  `id_namaizin` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `tglawal` date NOT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tglakhir` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_izin`
--

INSERT INTO `tb_izin` (`id_izin`, `id_namaizin`, `id`, `tglawal`, `tempat`, `tglakhir`, `status`) VALUES
(2, 2, 11, '2018-08-17', 'Jakarta', '2018-08-16', 'waiting'),
(3, 2, 10, '2018-08-01', 'Jakarta', '2018-08-04', 'approved'),
(4, 5, 10, '2018-08-21', 'Depok', '2018-08-22', 'waiting'),
(5, 3, 11, '2018-10-05', 'Jakarta', '2018-12-01', 'rejected'),
(8, 14, 12, '2018-08-22', 'Bekasi', '2018-08-24', 'waiting'),
(9, 12, 10, '2018-08-16', 'Bekasi', '2018-08-20', 'approved'),
(10, 11, 11, '2018-09-21', 'Bandung', '2018-09-22', 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(255) NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Deputi'),
(3, 'Sekretaris'),
(5, 'Bendahara');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kebutuhan`
--

CREATE TABLE `tb_kebutuhan` (
  `id_kebutuhan` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nama_kebutuhan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kebutuhan`
--

INSERT INTO `tb_kebutuhan` (`id_kebutuhan`, `type`, `nama_kebutuhan`) VALUES
(1, 'Cuti', 'Cuti Sakit'),
(2, 'Cuti', 'Cuti Hamil'),
(3, 'Pembuatan Surat', 'Pengunduran Diri'),
(4, 'Pembuatan Surat', 'Rekomendasi Studi S2'),
(5, 'Cuti', 'Cuti Melahirkan'),
(6, 'cuti', 'Cuti Stress');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluhan`
--

CREATE TABLE `tb_keluhan` (
  `id_keluhan` int(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_keluhan`
--

INSERT INTO `tb_keluhan` (`id_keluhan`, `type`) VALUES
(1, 'Administrasi'),
(2, 'Hubungan Kerja'),
(3, 'Penggajian'),
(4, 'Lain - lain');

-- --------------------------------------------------------

--
-- Table structure for table `tb_namaizin`
--

CREATE TABLE `tb_namaizin` (
  `id_namaizin` int(255) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nama_izin` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_namaizin`
--

INSERT INTO `tb_namaizin` (`id_namaizin`, `type`, `nama_izin`) VALUES
(1, 'cuti', 'Cuti Hamil'),
(2, 'cuti', 'Cuti Lebaran'),
(3, 'cuti', 'Cuti Natal'),
(4, 'sekolah', 'Rapat Petinggi Kampus'),
(5, 'sekolah', 'Rapat Guru'),
(6, 'seminar', 'Seminar Bela Negara'),
(7, 'seminar', 'Seminar Compfest'),
(8, 'seminar', 'Seminar Sinaptika 2018'),
(9, 'seminar', 'Seminar Gemastik 11'),
(11, 'sekolah', 'Rapat Kurikulum'),
(12, 'cuti', 'Cuti Idul Adha'),
(13, 'cuti', 'Cuti Pregnant'),
(14, 'seminar', 'Seminar Google I/O 2018');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nip` int(255) NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status_perkawinan` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status_pegawai` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_jabatan` int(255) NOT NULL,
  `id_bidang` int(255) NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `no_ktp` int(255) NOT NULL,
  `no_rumah` int(255) NOT NULL,
  `no_handphone` int(255) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tanggal_pengangkatan` date NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id`, `nama`, `nip`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan_terakhir`, `status_perkawinan`, `status_pegawai`, `id_jabatan`, `id_bidang`, `agama`, `alamat`, `no_ktp`, `no_rumah`, `no_handphone`, `email`, `password`, `id_user`, `tanggal_pengangkatan`, `avatar`) VALUES
(10, 'Nalika Alzahra', 41551, 'Jakarta', '1989-02-09', 'Perempuan', 'S1', 'Belum kawin', 'Karyawan tetap', 3, 1, 'Islam', 'Komplek Permata Hijau No. 12', 2147483647, 12, 2147483647, 'pegawai@gmail.com', '047aeeb234644b9e2d4138ed3bc7976a', 'pegawai', '2018-07-04', '2c8d297706acce932eb1f14232370517.jpg'),
(11, 'Kendal Janner', 144124, 'Bandung', '1990-07-10', 'Perempuan', 'S3', 'Belum kawin', 'Karyawan tetap', 1, 1, 'Kristen Protestan', 'Komplek Permata Hijau No. 12', 2147483647, 21, 2147483647, 'pegawai1@gmail.com', '0b96cb1d0dfbcc85f6b57041656abc49', 'pegawai1', '2017-09-01', 'b0ff73b761a90fa10d9b8b9570a58b6e.jpg'),
(12, 'Benjamin Aljabar R', 412411, 'Jakarta', '1997-01-06', 'Laki-laki', 'SMP/SMA', 'Belum kawin', 'Karyawan kontrak', 3, 1, 'Islam', 'Komplek Permata Hijau No. 12', 2147483647, 22, 2147483647, 'pegawai2@gmail.com', 'fa23517aa1adfaab707494340009a330', 'pegawai2', '2018-02-06', '37d631763c91e22324dd08cd4d20d40b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(255) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`) VALUES
(1, 1, 'Bioteknologi'),
(2, 2, 'Psikologi'),
(3, 4, 'Teknik Informatika'),
(4, 4, 'Teknik Mesin'),
(5, 4, 'Teknik Elektro'),
(6, 3, 'Teknik Sipil'),
(7, 6, 'Teknologi Industri Pertanian'),
(8, 6, 'Teknologi Hasil Pertanian'),
(9, 3, 'Teknik Lingkungan'),
(10, 5, 'Ilmu Komunikasi'),
(11, 3, 'Teknik Industri'),
(12, 3, 'Teknik Metalurgi'),
(13, 1, 'Peternakan'),
(14, 1, 'Ilmu Perikanan'),
(15, 7, 'Akuntansi'),
(16, 7, 'Manajemen'),
(17, 7, 'Ekonomi Pembangunan'),
(18, 7, 'Bisnis Digital'),
(19, 7, 'Kewirausahaan');

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
-- Indexes for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tb_izin`
--
ALTER TABLE `tb_izin`
  ADD PRIMARY KEY (`id_izin`);

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
-- Indexes for table `tb_namaizin`
--
ALTER TABLE `tb_namaizin`
  ADD PRIMARY KEY (`id_namaizin`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_dkebutuhan`
--
ALTER TABLE `tb_dkebutuhan`
  MODIFY `id_dkebutuhan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_dkeluhan`
--
ALTER TABLE `tb_dkeluhan`
  MODIFY `id_dkeluhan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_izin`
--
ALTER TABLE `tb_izin`
  MODIFY `id_izin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kebutuhan`
--
ALTER TABLE `tb_kebutuhan`
  MODIFY `id_kebutuhan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_keluhan`
--
ALTER TABLE `tb_keluhan`
  MODIFY `id_keluhan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_namaizin`
--
ALTER TABLE `tb_namaizin`
  MODIFY `id_namaizin` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
