-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 01:51 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_survey`
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
  `tanggal_lahir` date NOT NULL,
  `url_foto` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_biodata`
--

INSERT INTO `table_biodata` (`id_biodata`, `nomor_kartukeluarga`, `nomor_ktp`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `url_foto`) VALUES
(1, '1271072011060017', '1271071109690002', 'ROBERT MANURUNG', 'Laki - Laki', 'DAIRI', '1969-09-11', ''),
(2, '1271072011060017', '1271071109690003', 'Rio Wirawan', 'Laki - Laki', 'Medan', '1969-09-11', ''),
(3, '1271072011060018', '1271071109690005', 'Winda Aulia', 'Perempuan', 'Medan', '1969-09-11', ''),
(4, '1271072011060018', '1271071109690004', 'Widya', 'Perempuan', 'Medan', '1969-09-11', ''),
(5, '1271072011060018', '1271071109690001', 'Ganep Noven Siregar', 'Laki - Laki', 'Medan', '1969-09-11', '');

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

--
-- Dumping data for table `table_dataindividu`
--

INSERT INTO `table_dataindividu` (`nomor_ktp`, `agama`, `pendidikan`, `jenis_pekerjaan`, `status_perkawinan`) VALUES
('1271071109690002', 'Protestan', 'D3', 'Karyawan Swasta', 'KAWIN');

-- --------------------------------------------------------

--
-- Table structure for table `table_hasilsurvey`
--

CREATE TABLE `table_hasilsurvey` (
  `id_hasil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `hasil` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`hasil`))
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

--
-- Dumping data for table `table_status`
--

INSERT INTO `table_status` (`nomor_ktp`, `status_hubungan`, `kewarganegaraan`, `nama_ayah`, `nama_ibu`) VALUES
('1271071109690001', 'KEPALA KELUARGA', 'INDONESIA', 'Nait Siregar', 'Muliasnah'),
('1271071109690002', 'KEPALA KELUARGA', 'INDONESIA', 'MANGASA MANURUNG', 'REKSI BR PASARIBU');

-- --------------------------------------------------------

--
-- Table structure for table `table_survey`
--

CREATE TABLE `table_survey` (
  `id_survey` int(11) NOT NULL,
  `judul_survey` text NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_survey`
--

INSERT INTO `table_survey` (`id_survey`, `judul_survey`, `data`) VALUES
(1, 'Judul', '{\"title\":\"Judul\",\"completedHtml\":\"<h3>Thank you for your feedback.</h3> <h5>Your thoughts and ideas will help us to create a great product!</h5>\",\"pages\":[{\"name\":\"bagianA\",\"navigationTitle\":\"Bagian A\",\"title\":\"A\",\"elements\":[{\"type\":\"rating\",\"name\":\"rating_score_1_A\",\"title\":\"Pert\",\"isRequired\":true,\"rateMin\":\"1\",\"rateMax\":\"10\",\"minRateDescription\":\"Min\",\"maxRateDescription\":\"Max\"}]}],\"showQuestionNumbers\":\"on\",\"showProgressBar\":\"top\",\"progressBarType\":\"buttons\"}');

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
-- Dumping data for table `table_wilayah`
--

INSERT INTO `table_wilayah` (`nomor_kartukeluarga`, `nama_kepalakeluarga`, `alamat`, `nomorrt`, `nomorrw`, `nama_desakelurahan`, `nama_kecamatan`, `nama_kabupatenkota`, `kode_pos`, `nama_provinsi`) VALUES
('1271072011060017', 'ROBERT MANURUNG', 'JL. IRIGASI NO. 151 MEDAN', '00', '00', 'Kemenangan Tani', 'Medan Tuntungan', 'Kota Medan', 20136, 'Sumatera Utara'),
('1271072011060018', 'Ganep Noven Siregar', 'JL. IRIGASI NO. 151 MEDAN', '00', '00', 'Kemenangan Tani', 'Medan Tuntungan', 'Kota Medan', 20136, 'Sumatera Utara');

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
-- Indexes for table `table_hasilsurvey`
--
ALTER TABLE `table_hasilsurvey`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `table_status`
--
ALTER TABLE `table_status`
  ADD PRIMARY KEY (`nomor_ktp`);

--
-- Indexes for table `table_survey`
--
ALTER TABLE `table_survey`
  ADD PRIMARY KEY (`id_survey`);

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
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_hasilsurvey`
--
ALTER TABLE `table_hasilsurvey`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_survey`
--
ALTER TABLE `table_survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
