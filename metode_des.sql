-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2023 pada 05.12
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `analisis_des`
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
-- Dumping data untuk tabel `analisis_des`
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
(9, 0, '2018', 9, 0, 0, 185455.8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rekam_medis` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `thn_periode` int(11) NOT NULL,
  `jml_pengidap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rekam_medis`, `id_penyakit`, `thn_periode`, `jml_pengidap`) VALUES
(1, 1, 2010, 126616),
(2, 1, 2011, 130190),
(3, 1, 2012, 141228),
(4, 1, 2013, 142391),
(5, 1, 2014, 133880),
(6, 1, 2015, 135274),
(7, 1, 2016, 136593),
(8, 1, 2017, 137823);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `analisis_des`
--
ALTER TABLE `analisis_des`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indeks untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rekam_medis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `analisis_des`
--
ALTER TABLE `analisis_des`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rekam_medis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
