-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 12, 2021 at 02:29 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kuisioner`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_pengguna` varchar(64) NOT NULL,
  `katasandi_pengguna` varchar(64) NOT NULL,
  `identitas_pengguna` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`id_admin`, `nama_pengguna`, `katasandi_pengguna`, `identitas_pengguna`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `table_biodata`
--

CREATE TABLE `table_biodata` (
  `id_biodata` int(11) NOT NULL,
  `nomor_kartukeluarga` varchar(64) NOT NULL,
  `nomor_ktp` varchar(64) NOT NULL,
  `nama_lengkap` char(200) NOT NULL,
  `jenis_kelamin` char(200) NOT NULL,
  `tempat_lahir` char(200) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_dataindividu`
--

CREATE TABLE `table_dataindividu` (
  `nomor_ktp` varchar(64) NOT NULL,
  `agama` char(200) NOT NULL,
  `pendidikan` char(200) NOT NULL,
  `jenis_pekerjaan` char(200) NOT NULL,
  `status_perkawinan` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_status`
--

CREATE TABLE `table_status` (
  `nomor_ktp` varchar(64) NOT NULL,
  `status_hubungan` char(200) NOT NULL,
  `kewarganegaraan` char(200) NOT NULL,
  `nama_ayah` char(200) NOT NULL,
  `nama_ibu` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `password_user` varchar(64) NOT NULL,
  `nomor_kartukeluarga` varchar(64) NOT NULL,
  `no_hp` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`id_user`, `user_name`, `password_user`, `nomor_kartukeluarga`, `no_hp`) VALUES
(1, 'samueladriel9802', 'ed9bdc0373fab94b535d11a95bf7a038', '1271072011060017', '085276750553'),
(2, 'rio', '202cb962ac59075b964b07152d234b70', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `table_wilayah`
--

CREATE TABLE `table_wilayah` (
  `nomor_kartukeluarga` varchar(64) NOT NULL,
  `nama_kepalakeluarga` char(200) NOT NULL,
  `alamat` char(200) NOT NULL,
  `nomorrt` varchar(2) NOT NULL,
  `nomorrw` varchar(2) NOT NULL,
  `nama_desakelurahan` char(200) NOT NULL,
  `nama_kecamatan` char(200) NOT NULL,
  `nama_kabupatenkota` char(200) NOT NULL,
  `kode_pos` int(6) NOT NULL,
  `nama_provinsi` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `table_biodata`
--
ALTER TABLE `table_biodata`
  ADD PRIMARY KEY (`id_biodata`);

--
-- Indexes for table `table_dataindividu`
--
ALTER TABLE `table_dataindividu`
  ADD PRIMARY KEY (`nomor_ktp`);

--
-- Indexes for table `table_status`
--
ALTER TABLE `table_status`
  ADD PRIMARY KEY (`nomor_ktp`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `table_wilayah`
--
ALTER TABLE `table_wilayah`
  ADD PRIMARY KEY (`nomor_kartukeluarga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_biodata`
--
ALTER TABLE `table_biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
