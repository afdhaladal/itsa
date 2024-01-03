-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jan 2024 pada 23.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itsa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth`
--

CREATE TABLE `auth` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `oauth_id` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lpj`
--

CREATE TABLE `lpj` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `angkatan` varchar(11) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `nohp` varchar(11) NOT NULL,
  `namakegiatan` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'diterima'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lpj`
--

INSERT INTO `lpj` (`id`, `nama`, `nim`, `angkatan`, `kelas`, `nohp`, `namakegiatan`, `file_path`, `status`) VALUES
(1, 18, '18', '18', '18', '23', 'itsa farewel party', 'Afdhal_DW_2TIB_P15.pdf', 'Diterima'),
(2, 21, '21', '21', '21', '123123', 'xczx', 'POSTER.pdf', 'Ditolak'),
(3, 19, '19', '19', '19', '87', 'xy', 'Untitled_document.pdf', 'Ditolak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `angkatan` varchar(11) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `pengaduan` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'diterima'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `nama`, `nim`, `angkatan`, `kelas`, `pengaduan`, `status`) VALUES
(10, 18, '18', '18', '18', 'asdasdasdasdasdasdasd', 'Selesai'),
(11, 19, '19', '19', '19', 'ihuihijnju', 'Selesai'),
(12, 18, '18', '18', '18', 'rfgdwswefegeerghrthfghrtht', 'Proses'),
(13, 18, '18', '18', '18', 'asd', 'Proses'),
(14, 18, '18', '18', '18', 'dfw', 'Proses'),
(15, 19, '19', '19', '19', 'werwe', 'Diterima'),
(16, 21, '21', '21', '21', 'asuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu', 'Diterima'),
(21, 18, '18', '18', '18', 'asdasdasd', 'Selesai'),
(22, 21, '21', '21', '21', 'asdfsdf', 'Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `nama` int(11) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `angkatan` varchar(11) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `nohp` varchar(11) NOT NULL,
  `namakegiatan` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `status` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL DEFAULT 'diterima'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `proposal`
--

INSERT INTO `proposal` (`id`, `nama`, `nim`, `angkatan`, `kelas`, `nohp`, `namakegiatan`, `file_path`, `status`) VALUES
(20, 18, '18', '18', '18', '', '', 'project.pdf', 'Selesai'),
(21, 18, '18', '18', '18', '08956118669', 'sdf', 'project1.pdf', 'Proses'),
(22, 21, '21', '21', '21', '08956118669', 'dsccccccccccccccccccc', 'PRAKTIKUM_DHCPv4_OSPF_dan_BGP_-_Hardware.pdf', 'Selesai'),
(23, 19, '19', '19', '19', '89561186690', '1asd2er2ef23r123', 'NO.pdf', 'Proses'),
(24, 19, '19', '19', '19', '08237312816', 'rh', 'JKKelompok1_P14.pdf', 'Diterima'),
(25, 19, '19', '19', '19', '234', 'itsa farewel party', 'WhatsApp_Image_2023-12-06_at_23_55_16_be6d2f74.pdf', 'Diterima'),
(26, 19, '19', '19', '19', '23', 'itsa farewel party', 'pengurutan-revisi.pdf', 'Ditolak'),
(27, 22, '22', '22', '22', '123123', 'xczx', 'Peserta_4.pdf', 'Proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `angkatan` varchar(11) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `nim`, `angkatan`, `kelas`, `email`, `password`, `gambar`, `role`, `date_created`) VALUES
(18, 'Afdhalll', '2255301003', '22', '22 TIB', 'afdhal22ti@mahasiswa.pcr.ac.id', '$2y$10$SKOLSRGhtMhRY80k5Jyq8updps1yIW1Wi/uinIpIn/SWr5.tVffha', 'default.jpg', 'User', 1703893662),
(19, 'rodatul aisi', '2355301003', '23', '23 TIB', 'aisi22ti@mahasiswa.pcr.ac.id', '$2y$10$EkMfUXfBMc6YnDsdznS/d.EKEN0lVzxHtbTSCdtyX4bSDcD/HkK/W', 'default.jpg', 'User', 1703893847),
(20, 'adol', '21', '22', '22 TIB', 'adol@gmail.com', '$2y$10$sT6xIsGXA5gm8Dj3dmd7KOg5QuHw6kyDy.QgSufP8VemTQOBqNC3S', 'pp.jpg', 'Admin', 1703893919),
(21, 'abdul', '2155301003', '21', '21TIB', 'abdul21ti@mahasiswa.pcr.ac.id', '$2y$10$01YT5.XWZC4kMosp../fB.0ZPBYoRw1qEjxpp59HwUSrkxaHray4i', 'default.jpg', 'User', 1703930266),
(22, 'asu', '2055301005', '20', '20TIB', 'asu22ti@mahasiswa.pcr.ac.id', '$2y$10$XNLspXgWzdF66b6dw4aVveP7mafGltGDpkssT3yyU9RdLLSkEqn2e', 'pp.jpg', 'User', 1703931159);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `lpj`
--
ALTER TABLE `lpj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `namalpj` (`nama`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indeks untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `namapro` (`nama`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth`
--
ALTER TABLE `auth`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lpj`
--
ALTER TABLE `lpj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lpj`
--
ALTER TABLE `lpj`
  ADD CONSTRAINT `namalpj` FOREIGN KEY (`nama`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `nama` FOREIGN KEY (`nama`) REFERENCES `user` (`id`);

--
-- Ketidakleluasaan untuk tabel `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `namapro` FOREIGN KEY (`nama`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
