-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 04:42 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metode_des`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisis_des`
--

CREATE TABLE `analisis_des` (
  `id_analisis` int(11) NOT NULL,
  `id_rekam_medis` int(11) NOT NULL,
  `thn_prediksi` varchar(10) NOT NULL,
  `t` double NOT NULL,
  `st` double NOT NULL,
  `bt` double NOT NULL,
  `forecast` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `analisis_des`
--

INSERT INTO `analisis_des` (`id_analisis`, `id_rekam_medis`, `thn_prediksi`, `t`, `st`, `bt`, `forecast`) VALUES
(1, 1, '2010', 1, 126616, 2368.5, 0),
(2, 2, '2011', 2, 130069.5, 2585.49, 128984.5),
(3, 3, '2012', 3, 140370.7, 4128.641, 132654.9),
(4, 4, '2013', 4, 142601.8, 3749.141, 144499.3),
(5, 5, '2014', 5, 135127.1, 1504.365, 146351),
(6, 6, '2015', 6, 135409.7, 1260.022, 136631.5),
(7, 7, '2016', 7, 136600.7, 28076.2, 136669.8),
(8, 8, '2017', 8, 140508.4, 44947.4, 164676.9),
(9, 9, '2018', 9, 140292.2, 55026.9, 185455.8),
(10, 0, '2019', 10, 0, 0, 195319.1);

-- --------------------------------------------------------

--
-- Table structure for table `boking_jdwl`
--

CREATE TABLE `boking_jdwl` (
  `id_boking` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tgl_boking` varchar(20) NOT NULL,
  `tgl_periksa` varchar(20) NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `keluhan_pasien` text NOT NULL,
  `stat_boking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa_dokter`
--

CREATE TABLE `diagnosa_dokter` (
  `id_diagnosa` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `id_boking` int(11) NOT NULL,
  `detail_penyakit` text NOT NULL,
  `saran` text NOT NULL,
  `resep_dokter` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(125) NOT NULL,
  `ahli_dokter` varchar(125) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `foto` text NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `ahli_dokter`, `jk`, `foto`, `alamat`, `no_telp`, `username`, `password`) VALUES
(1, 'Dr. Indri', 'Dokter Umum', 'Perempuan', 'doctor-2027768_12801.png', 'kuningan', '089987656543', 'dokter', 'dokter');

-- --------------------------------------------------------

--
-- Table structure for table `jdwl_dokter`
--

CREATE TABLE `jdwl_dokter` (
  `id_jadwal` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jdwl_dokter`
--

INSERT INTO `jdwl_dokter` (`id_jadwal`, `id_dokter`, `hari`, `jam`) VALUES
(1, 1, 'Senin', '07.00 - 10.00');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `bb` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `ttl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(125) NOT NULL,
  `stat_penyakit` varchar(125) NOT NULL,
  `gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `stat_penyakit`, `gejala`) VALUES
(1, 'ISPA', 'MENULAR', 'zdsdf');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rekam_medis` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `thn_periode` int(11) NOT NULL,
  `jml_pengidap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rekam_medis`, `id_penyakit`, `thn_periode`, `jml_pengidap`) VALUES
(1, 1, 2010, 126616),
(2, 1, 2011, 130190),
(3, 1, 2012, 141228),
(4, 1, 2013, 142391),
(5, 1, 2014, 133880),
(6, 1, 2015, 135274),
(7, 1, 2016, 136593),
(8, 1, 2017, 137823),
(9, 1, 2018, 135274);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_telp`, `jk`, `username`, `password`, `level_user`) VALUES
(1, 'Admin', 'Kuningan', '089878765678', 'Laki - Laki', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisis_des`
--
ALTER TABLE `analisis_des`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indexes for table `boking_jdwl`
--
ALTER TABLE `boking_jdwl`
  ADD PRIMARY KEY (`id_boking`);

--
-- Indexes for table `diagnosa_dokter`
--
ALTER TABLE `diagnosa_dokter`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `jdwl_dokter`
--
ALTER TABLE `jdwl_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rekam_medis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisis_des`
--
ALTER TABLE `analisis_des`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `boking_jdwl`
--
ALTER TABLE `boking_jdwl`
  MODIFY `id_boking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnosa_dokter`
--
ALTER TABLE `diagnosa_dokter`
  MODIFY `id_diagnosa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jdwl_dokter`
--
ALTER TABLE `jdwl_dokter`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rekam_medis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
