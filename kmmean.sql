-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2023 pada 14.55
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
-- Database: `kmmean`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `kode_alternatif` varchar(11) NOT NULL,
  `nama_alternatif` varchar(30) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`kode_alternatif`, `nama_alternatif`, `ket`) VALUES
('A', '_TIKTOK', 'TARGET 1'),
('B', 'TIKTOK DANCE', 'TARGET 2'),
('C', 'TIKTOK OPM', 'TARGET 3'),
('D', 'TIKTOK PHILIPPINES', 'TARGET 4'),
('E', '_TIKTOK', 'TARGET 5'),
('F', 'TIKTOK DANCE', 'TARGET 6'),
('G', 'TIKTOK PHILIPPINES', 'TARGET 7'),
('H', 'TIKTOK OPM', 'TARGET 8'),
('I', 'TIKTOK DANCE', 'TARGET 9'),
('J', 'TIKTOK PHILIPPINES', 'TARGET 10'),
('K', 'TIKTOK OPM', 'TARGET 11'),
('L', 'TIKTOK DANCE', 'TARGET 12'),
('M', 'TIKTOK PHILIPPINES', 'TARGET 13'),
('N', '_TIKTOK', 'TARGET 14'),
('O', '_TIKTOK', 'TARGET 15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `nama_kriteria`) VALUES
('C1', 'tempo'),
('C2', 'valence'),
('C3', 'liveness');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `password`, `last_login`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '2017-05-05 16:05:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `kode_alternatif` varchar(10) DEFAULT NULL,
  `kode_kriteria` varchar(10) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `kode_alternatif`, `kode_kriteria`, `nilai`) VALUES
(10, 'C', 'C1', 143),
(9, 'B', 'C1', 85),
(59, 'D', 'C2', 1),
(11, 'C', 'C2', 1),
(58, 'D', 'C1', 103),
(14, 'B', 'C2', 1),
(16, 'B', 'C3', 0),
(17, 'A', 'C3', 0),
(18, 'C', 'C3', 0),
(19, 'A', 'C1', 71),
(20, 'A', 'C2', 1),
(60, 'D', 'C3', 0),
(93, 'O', 'C3', 1),
(92, 'O', 'C2', 1),
(91, 'O', 'C1', 123),
(90, 'N', 'C3', 1),
(89, 'N', 'C2', 0),
(88, 'N', 'C1', 95),
(87, 'M', 'C3', 0),
(86, 'M', 'C2', 1),
(85, 'M', 'C1', 150),
(84, 'L', 'C3', 1),
(83, 'L', 'C2', 0),
(75, 'I', 'C3', 0),
(74, 'I', 'C2', 0),
(73, 'I', 'C1', 113),
(72, 'H', 'C3', 1),
(71, 'H', 'C2', 1),
(61, 'E', 'C1', 100),
(70, 'H', 'C1', 72),
(69, 'G', 'C3', 0),
(68, 'G', 'C2', 1),
(67, 'G', 'C1', 99),
(66, 'F', 'C3', 1),
(65, 'F', 'C2', 1),
(82, 'L', 'C1', 148),
(81, 'K', 'C3', 0),
(80, 'K', 'C2', 0),
(79, 'K', 'C1', 111),
(78, 'J', 'C3', 0),
(77, 'J', 'C2', 1),
(76, 'J', 'C1', 77),
(64, 'F', 'C1', 132),
(63, 'E', 'C3', 1),
(62, 'E', 'C2', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
