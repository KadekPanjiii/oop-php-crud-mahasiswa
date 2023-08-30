-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2023 pada 05.07
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_oopsiskampus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `berita` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `berita`, `created_at`, `updated_at`) VALUES
(2, 'Pedoman Akademik Universitas Pramandhita 2022', 'Dalam rangkan mendukung berlangsunya Tri Dharma perguruan tinggi, Universitas Pramandhita menerbitkan Pedoman Akademik yang dapat di unduh pada', '2023-08-26 07:18:24', '2023-08-29 02:53:31'),
(3, 'Peraturan rektor tentang Tugas Akhir', 'Berikut adalah Peraturan Rektor mengenai Pelaksanaan Tugas Akhir, Skripsi dan Tesis di lingkungan Universitas Pramandhita Bali Tahun 2018', '2023-08-26 07:18:24', '2023-08-26 07:18:24'),
(13, 'kambing', 'Hallo gaes', '2023-08-26 08:15:48', '2023-08-29 14:13:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurmtk`
--

CREATE TABLE `tb_jurmtk` (
  `id_jurmtk` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jurmtk`
--

INSERT INTO `tb_jurmtk` (`id_jurmtk`, `id_jurusan`, `id_matkul`) VALUES
(63, 2, 1),
(64, 2, 2),
(65, 2, 3),
(66, 2, 4),
(74, 2, 5),
(75, 2, 6),
(84, 2, 11),
(83, 2, 16),
(56, 3, 1),
(57, 3, 3),
(69, 3, 4),
(76, 3, 8),
(77, 3, 11),
(62, 4, 2),
(70, 4, 3),
(71, 4, 4),
(81, 4, 15),
(82, 4, 16),
(72, 5, 1),
(73, 5, 3),
(78, 5, 12),
(79, 5, 13),
(80, 5, 14),
(85, 6, 14),
(86, 6, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(2, 'Sistem Komputer'),
(3, 'Sistem Informasi'),
(4, 'Manajemen Informatika'),
(5, 'Teknik Informasi'),
(6, 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `nim` varchar(12) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jurusan` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`nim`, `nama`, `jurusan`, `alamat`, `telp`) VALUES
('5078', 'I Kadek Panji Pramandhita', '2', 'Br. Bantas', '081926892383'),
('8888', 'Mas Uddin', '3', 'Bakso', 'Boraks'),
('anta', 'anta', '3', 'anta', 'anta'),
('kuyang', 'kuyang', '5', 'kuyang', 'kayang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `id_matkul` int(11) NOT NULL,
  `nama_matkul` varchar(225) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_matkul`
--

INSERT INTO `tb_matkul` (`id_matkul`, `nama_matkul`, `sks`, `semester`) VALUES
(1, 'Algoritma dan Pemrograman', 3, 1),
(2, 'Jaringan Komputer', 4, 1),
(3, 'Database Security', 4, 1),
(4, 'Audio Visual', 2, 1),
(5, 'Pemrograman Visual', 4, 1),
(6, 'Perancangan Web', 3, 1),
(7, 'Perancangan Web', 3, 1),
(8, 'Rekayasa Perangkat Lunak', 3, 1),
(9, 'Network Security', 4, 1),
(10, 'Bahasa Rakitan', 4, 2),
(11, 'Kalkulus', 3, 2),
(12, 'Pemodelan Berorientasi Obyek', 3, 2),
(13, 'Pemodelan dan Simulasi Sistem', 3, 2),
(14, 'Pemrograman Berorientasi Obyek', 3, 2),
(15, 'Pemrosesan Paralel', 2, 2),
(16, 'Rangkaian Listrik', 3, 2),
(17, 'tes', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`) VALUES
(1, 'a', 'a@gmail.com', 'a'),
(2, 'b', 'b@gmail.com', 'b'),
(4, 'd', 'd@gmail.com', 'd'),
(5, 'l', 'lobig33354@karatic.com', 'l'),
(6, 'z', 'z@gmail.com', 'z'),
(7, 'admin', 'admin@gmail.com', 'admin'),
(8, 'k', 'k', 'k'),
(9, 'u', 'u', 'u'),
(10, 'Kadek Panji', 'dekpanji23@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jurmtk`
--
ALTER TABLE `tb_jurmtk`
  ADD PRIMARY KEY (`id_jurmtk`),
  ADD KEY `id_jurusan` (`id_jurusan`,`id_matkul`),
  ADD KEY `fk_mtk` (`id_matkul`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_jurmtk`
--
ALTER TABLE `tb_jurmtk`
  MODIFY `id_jurmtk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_jurmtk`
--
ALTER TABLE `tb_jurmtk`
  ADD CONSTRAINT `fk_jur` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mtk` FOREIGN KEY (`id_matkul`) REFERENCES `tb_matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
