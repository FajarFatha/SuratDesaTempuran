-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2023 pada 14.06
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suratdesa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-01-16-134151', 'App\\Database\\Migrations\\Tertanda', 'default', 'App', 1674097330, 1),
(5, '2023-01-25-025634', 'App\\Database\\Migrations\\Surat', 'default', 'App', 1674652810, 2),
(7, '2023-01-30-053035', 'App\\Database\\Migrations\\User', 'default', 'App', 1675056797, 3),
(8, '2023-01-31-020046', 'App\\Database\\Migrations\\Riwayat', 'default', 'App', 1675131656, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempatlahir` varchar(20) NOT NULL,
  `tanggallahir` varchar(20) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `darah` varchar(2) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `kewarganegaraan` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`id`, `nik`, `nama`, `tempatlahir`, `tanggallahir`, `kelamin`, `darah`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `agama`, `status`, `pekerjaan`, `kewarganegaraan`, `created_at`, `updated_at`) VALUES
(1, '3521102511020002', 'Fajar Fatha Romadhan', 'Tempurejo', '25 November 2002', 'Laki-laki', 'A', 'Tempuran', '009', '002', 'Tempuran', 'Paron', 'Islam', 'Belum Kawin', 'Mahasiswa', 'WNI', '2023-06-11 22:23:10', '2023-06-12 01:50:10'),
(2, '3521100102030003', 'Angga Cristanto', 'Ngawi', '01 Februari 2003', 'Perempuan', 'A', 'Tempuran', '007', '002', 'Tempuran', 'Paron', 'Islam', 'Belum Kawin', 'Mahasiswa', 'WNI', '2023-06-11 23:55:55', '2023-06-12 01:45:38'),
(3, '3521100303030002', 'Fatha', 'Ngawi', '31 Desember 1969', 'Laki-laki', 'B', 'Tempuran', '009', '002', 'Tempuran', 'Paron', 'Islam', 'Kawin', 'Mahasiswa', 'WNI', '2023-06-12 22:18:45', '2023-06-12 22:33:24'),
(4, '3521100104030002', 'Bila', 'Ngawi', '31 Desember 1969', 'Laki-laki', 'AB', 'Ngawi', '009', '001', 'Tempuran', 'Paron', 'Islam', 'Kawin', 'Petani', 'WNI', '2023-06-12 22:51:14', '2023-06-12 22:51:14'),
(5, '3521100104060002', 'Fata', 'Ngawi', '02 Juni 2023', 'Laki-laki', 'AB', 'Ngawi, Jatim', '009', '003', 'Tempuran', 'Paron', 'Islam', 'Kawin', 'Petani', 'WNI', '2023-06-12 22:52:26', '2023-06-12 22:52:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `namasurat` varchar(200) NOT NULL,
  `nourut` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id`, `nama`, `namasurat`, `nourut`, `created_at`, `updated_at`) VALUES
(2, 'Fajar Fatha Romadhann', 'Surat Keterangan Identitas', '03', '2023-01-31 10:04:17', '2023-01-30 21:44:16'),
(4, 'Fajar Fatha Romadhan', 'Surat Keterangan Izin Beli BBM', '04', '2023-05-17 10:22:22', '2023-05-17 10:22:22'),
(5, 'Fajar Fatha Romadhan', 'Surat Keterangan Belum Pernah Menikah', '03', '2023-05-17 12:35:53', '2023-05-17 12:35:53'),
(6, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '04', '2023-05-28 13:46:56', '2023-05-28 13:46:56'),
(7, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '05', '2023-05-28 13:49:24', '2023-05-28 13:49:24'),
(8, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '06', '2023-05-28 13:50:49', '2023-05-28 13:50:49'),
(9, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '07', '2023-05-28 13:53:34', '2023-05-28 13:53:34'),
(10, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '08', '2023-05-28 13:58:59', '2023-05-28 13:58:59'),
(11, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '09', '2023-05-28 14:01:48', '2023-05-28 14:01:48'),
(12, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '010', '2023-05-28 14:22:50', '2023-05-28 14:22:50'),
(13, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '011', '2023-05-28 14:23:38', '2023-05-28 14:23:38'),
(14, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '012', '2023-05-28 14:31:09', '2023-05-28 14:31:09'),
(15, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '013', '2023-05-28 14:34:31', '2023-05-28 14:34:31'),
(16, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '014', '2023-05-28 14:37:53', '2023-05-28 14:37:53'),
(17, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '015', '2023-05-28 14:43:32', '2023-05-28 14:43:32'),
(18, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '016', '2023-05-28 14:46:41', '2023-05-28 14:46:41'),
(19, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '017', '2023-05-28 14:54:01', '2023-05-28 14:54:01'),
(20, 'Fajar Fatha Romadhan', 'Surat Keterangan Izin Beli BBM', '05', '2023-05-28 14:54:58', '2023-05-28 14:54:58'),
(21, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '018', '2023-05-28 14:58:55', '2023-05-28 14:58:55'),
(22, 'Fajar Fatha Romadhan', 'Surat Keterangan Izin Cuti', '03', '2023-05-28 20:12:52', '2023-05-28 20:12:52'),
(23, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '019', '2023-05-28 20:18:20', '2023-05-28 20:18:20'),
(24, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '020', '2023-05-28 20:22:43', '2023-05-28 20:22:43'),
(25, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '021', '2023-05-28 20:36:23', '2023-05-28 20:36:23'),
(26, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '022', '2023-05-28 20:55:21', '2023-05-28 20:55:21'),
(27, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '023', '2023-05-28 21:15:01', '2023-05-28 21:15:01'),
(28, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '024', '2023-05-28 21:15:42', '2023-05-28 21:15:42'),
(29, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '025', '2023-05-28 21:30:24', '2023-05-28 21:30:24'),
(30, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '026', '2023-05-29 10:54:41', '2023-05-29 10:54:41'),
(31, 'Angga Cristanto', 'Surat Keterangan Identitas', '027', '2023-05-29 11:41:04', '2023-05-29 11:41:04'),
(32, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '028', '2023-05-30 07:41:33', '2023-05-30 07:41:33'),
(33, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '029', '2023-05-30 07:51:13', '2023-05-30 07:51:13'),
(34, 'Fajar Fatha Romadhan', 'Surat Keterangan Dispensasi', '05', '2023-05-30 07:51:56', '2023-05-30 07:51:56'),
(35, 'Fajar Fatha Romadhan', 'Surat Keterangan Dispensasi', '06', '2023-05-30 10:09:12', '2023-05-30 10:09:12'),
(36, 'Fajar', 'Surat Keterangan Identitas', '030', '2023-05-30 10:16:35', '2023-05-30 10:16:35'),
(37, 'Fajar Fatha Romadhan', 'Surat Keterangan Dispensasi', '07', '2023-05-30 10:24:24', '2023-05-30 10:24:24'),
(38, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '031', '2023-05-30 10:24:54', '2023-05-30 10:24:54'),
(39, 'Angga Cristanto', 'Surat Keterangan Identitas', '032', '2023-05-30 17:17:24', '2023-05-30 17:17:24'),
(40, 'Fajar Fatha Romadhan', 'Surat Keterangan Izin Beli BBM', '06', '2023-05-30 17:22:14', '2023-05-30 17:22:14'),
(41, 'Fajar Fatha Romadhan', 'Surat Keterangan Izin Beli BBM', '06', '2023-05-30 17:22:28', '2023-05-30 17:22:28'),
(42, 'Fajar Fatha Romadhan', 'Surat Keterangan Kehilangan', '03', '2023-06-03 09:10:12', '2023-06-03 09:10:12'),
(43, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '033', '2023-06-04 19:30:37', '2023-06-04 19:30:37'),
(44, 'Fajar Fatha Romadhan', 'Surat Keterangan Izin Beli BBM', '07', '2023-06-04 19:56:49', '2023-06-04 19:56:49'),
(45, 'Fajar Fatha Romadhan', 'Surat Keterangan Identitas', '034', '2023-06-06 12:09:41', '2023-06-06 12:09:41'),
(46, 'Fajar Fatha Romadhan', 'Surat Keterangan Izin Beli BBM', '08', '2023-06-17 12:09:59', '2023-06-17 12:09:59'),
(47, 'Fajar Fatha Romadhan', 'Surat Keterangan Izin Beli BBM', '08', '2023-06-17 12:16:55', '2023-06-17 12:16:55'),
(48, 'Fajar Fatha Romadhan', 'Surat Keterangan Izin Beli BBM', '08', '2023-06-17 12:17:20', '2023-06-17 12:17:20'),
(49, 'Fajar Fatha Romadhan', 'Surat Keterangan Izin Beli BBM', '08', '2023-06-17 12:18:07', '2023-06-17 12:18:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id` int(11) UNSIGNED NOT NULL,
  `surat` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `nourut` varchar(200) NOT NULL,
  `klasifikasi` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id`, `surat`, `title`, `slug`, `nourut`, `klasifikasi`, `created_at`, `updated_at`) VALUES
(1, 'Surat Keterangan Izin Beli BBM', 'Beli BBM', 'belibbm', '08', '474', '2023-01-25 07:40:34', '2023-06-17 12:18:07'),
(2, 'Surat Keterangan Belum Pernah Menikah', 'Belum Menikah', 'belummenikah', '03', '472', '2023-01-25 07:40:34', '2023-05-17 12:35:49'),
(3, 'Surat Keterangan Dispensasi', 'Dispensasi', 'dispensasi', '07', '474', '2023-01-25 07:40:34', '2023-05-30 10:24:24'),
(4, 'Surat Keterangan Domisili', 'Domisili', 'domisili', '02', '472', '2023-01-25 07:40:34', '2023-01-29 21:01:19'),
(5, 'Surat Keterangan Identitas', 'Identitas', 'identitas', '034', '472', '2023-01-25 07:40:34', '2023-06-06 12:09:41'),
(6, 'Surat Keterangan Izin Cuti', 'Izin Cuti', 'izincuti', '03', '850', '2023-01-25 07:40:34', '2023-05-28 20:12:52'),
(7, 'Surat Permohonan Izin Keramaian', 'Izin Keramaian', 'izinkeramaian', '02', '300', '2023-01-25 07:40:34', '2023-01-29 21:03:04'),
(8, 'Surat Permohonan Izin Mendirikan Terop di Jalan', 'Izin Mendirikan Terop', 'izinterop', '02', '300', '2023-01-25 07:40:34', '2023-01-29 21:04:44'),
(9, 'Surat Keterangan Izin Pendirian', 'Izin Pendirian', 'izinpendirian', '02', '472', '2023-01-25 07:40:34', '2023-01-29 21:05:17'),
(10, 'Surat Keterangan Kehilangan', 'Keterangan Kehilangan', 'keteranganhilang', '03', '470', '2023-01-25 07:40:34', '2023-06-03 09:10:12'),
(11, 'Surat Keterangan Kelahiran', 'Keterangan Kelahiran', 'keterangankelahiran', '03', '472', '2023-01-25 07:40:34', '2023-01-31 10:13:20'),
(12, 'Surat Keterangan Kematian', 'Keterangan Kematian', 'keterangankematian', '02', '472', '2023-01-25 07:40:34', '2023-01-29 21:12:52'),
(13, 'Surat Keterangan Merantau', 'Keterangan Merantau', 'keteranganmerantau', '02', '472', '2023-01-25 07:40:34', '2023-01-29 21:13:52'),
(14, 'Surat Keterangan Lain-lain', 'Keterangan Lain', 'keteranganlain', '02', '472', '2023-01-25 07:40:34', '2023-01-29 21:14:40'),
(15, 'Surat Keterangan Usaha', 'Keterangan Usaha', 'usaha', '02', '510', '2023-01-25 07:40:34', '2023-01-29 21:15:34'),
(16, 'Surat Perintah Tugas', 'Perintah Tugas', 'perintahtugas', '02', '188', '2023-01-25 07:40:34', '2023-01-29 21:16:27'),
(17, 'Surat Pernyataan Miskin', 'Pernyataan Miskin', 'pernyataanmiskin', '02', '440', '2023-01-25 07:40:34', '2023-01-29 21:17:14'),
(18, 'Surat Keterangan Catatan Kepolisian', 'SKCK', 'skck', '02', '145', '2023-01-25 07:40:34', '2023-01-29 21:17:55'),
(19, 'Surat Keterangan Tidak Mampu', 'SKTM', 'sktm', '02', '401', '2023-01-25 07:40:34', '2023-01-29 21:18:48'),
(20, 'Surat Perintah Perjalanan Dinas', 'SPPD', 'sppd', '02', '090', '2023-01-25 07:40:34', '2023-01-29 21:19:32'),
(21, 'Surat Kuasa', 'Surat Kuasa', 'kuasa', '01', '', '2023-01-25 07:40:34', '2023-01-25 07:40:34'),
(22, 'Undangan', 'Undangan', 'undangan', '02', '005', '2023-01-25 07:40:34', '2023-01-29 21:22:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tertanda`
--

CREATE TABLE `tertanda` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tertanda`
--

INSERT INTO `tertanda` (`id`, `nama`, `jabatan`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'MUHAJI', 'Kepala Desa Tempuran', 'Munggur', '2023-01-18 21:02:18', '2023-01-24 08:11:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'tempuran', '7a1f608318ae1994a674202e7509c216', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tertanda`
--
ALTER TABLE `tertanda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tertanda`
--
ALTER TABLE `tertanda`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
