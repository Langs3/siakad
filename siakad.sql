-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2022 pada 16.57
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'galangartp', 'galangs', 'Galang ARTP'),
(2, 'langs', 'langga', 'Langsartp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `npwp` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `mapel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`npwp`, `nama`, `gender`, `ttl`, `email`, `alamat`, `mapel`) VALUES
(199701123, 'Mahmud Mustofa', 'Laki-Laki', 'Solo, 15 November 1977', 'mmustofa77@gmail.com', 'Kp. Adem Ayem, Cileungsi, Bogor', 'Matematika'),
(200101353, 'Suci Maryanti', 'Perempuan ', 'Bandung, 29 April 1985', 'suciyanti29@gmail.com', 'Kp. Baru, Citeureup, Bogor', 'Bahasa Indonesia'),
(200501257, 'Dani Samudera', 'Laki-Laki', 'Bogor, 19 Juni 1987', 'danism87@gmail.com', 'Kp. Tentram, Gunung Putri, Bogor', 'Fisika'),
(200701439, 'Nana Malika', 'Perempuan', 'Jakarta, 3 Januari 1987', 'namalika3@gmail.com', 'Kp. Doeloe, Cilodong, Depok ', 'Biologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `namakelas` varchar(25) DEFAULT NULL,
  `kapasitas` int(3) DEFAULT NULL,
  `terisi` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `namakelas`, `kapasitas`, `terisi`) VALUES
(1, 'XI IPA U1', 36, 34),
(2, 'XI IPA U2', 36, 34),
(3, 'XI IPA U3', 36, 34),
(4, 'XI IPA U4', 36, 34),
(5, 'XI IPA U5', 36, 34),
(6, 'XI IPA U6', 36, 34),
(7, 'XI IPA U7', 36, 34),
(8, 'XI IPA U8', 36, 34);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `namamapel` varchar(30) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `namamapel`, `sks`) VALUES
(1, 'Matematika', 5),
(2, 'Biologi', 3),
(3, 'Fisika', 3),
(4, 'Kimia', 3),
(5, 'Bahasa Indonesia', 3),
(6, 'Bahasa Inggris', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `ttl` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `gender`, `ttl`, `email`, `alamat`, `kelas_id`) VALUES
(202110015, 'Abdul B', 'Laki-Laki', 'Jakarta, 23 Mei 2005', 'abdul23@gmail.com', 'Citeureup', 1),
(202110118, 'Galang Azzahra Ridho Tri Pangestu', 'Laki-Laki', 'Yogyakarta, 27 Agustus 2005', 'galangazzahra3@gmail.com', 'Griya Bukit Jaya H9 No.2, Tlajung Udik, Gunung Putri, Bogor', 6),
(202110131, 'Naufal Mumtaz Ilmi', 'Laki-laki', 'Bogor, 1 April 2005', 'naufalmtz@gmail.com', 'Cibinong, Bogor', 8),
(202110142, 'Ranty', 'Perempuan', 'Bandung, 4 Juni 2004', 'ranty46@gmail.com', 'Depok', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`npwp`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kelas_id` (`kelas_id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `npwp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200701440;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202110143;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
