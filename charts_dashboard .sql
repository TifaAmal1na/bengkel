-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2024 at 03:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charts_dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `ID_AKTIVITAS` int(11) NOT NULL,
  `ID_PEKERJAAN` int(11) DEFAULT NULL,
  `DESKRIPSI` text NOT NULL,
  `TANGGAL` date NOT NULL,
  `STATUS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`ID_AKTIVITAS`, `ID_PEKERJAAN`, `DESKRIPSI`, `TANGGAL`, `STATUS`) VALUES
(1, 1, 'Mengumpulkan data untuk analisis', '2024-09-01', 'Selesai'),
(2, 2, 'Mendesain struktur sistem', '2024-09-02', 'Dalam Proses'),
(3, 3, 'Menjalankan pengujian awal', '2024-09-03', 'Selesai'),
(4, 4, 'Menyusun dokumentasi proyek', '2024-09-04', 'Selesai'),
(5, 1, 'Mengadakan rapat tim', '2024-09-05', 'Aktif'),
(6, 5, 'Mereview hasil pekerjaan', '2024-09-06', 'Menunggu'),
(7, 2, 'Menyiapkan presentasi', '2024-09-07', 'Aktif'),
(8, 3, 'Melakukan analisis risiko', '2024-09-08', 'Selesai'),
(9, 4, 'Evaluasi hasil proyek', '2024-09-09', 'Aktif'),
(10, 5, 'Menentukan langkah selanjutnya', '2024-09-10', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dikerjakan`
--

CREATE TABLE `dikerjakan` (
  `ID_PERSONEL` int(11) NOT NULL,
  `ID_PEKERJAAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dikerjakan`
--

INSERT INTO `dikerjakan` (`ID_PERSONEL`, `ID_PEKERJAAN`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(3, 5),
(3, 6),
(4, 7),
(4, 8),
(5, 9),
(5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menggunakan`
--

CREATE TABLE `menggunakan` (
  `ID_PEKERJAAN` int(11) NOT NULL,
  `ID_TOOLS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menggunakan`
--

INSERT INTO `menggunakan` (`ID_PEKERJAAN`, `ID_TOOLS`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(3, 4),
(3, 5),
(4, 2),
(5, 6),
(6, 7),
(7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(7, '0001_01_01_000000_create_users_table', 1),
(8, '0001_01_01_000001_create_cache_table', 1),
(9, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `ID_NOTIFIKASI` int(11) NOT NULL,
  `ID_PROYEK` int(11) DEFAULT NULL,
  `JUDUL` varchar(255) NOT NULL,
  `DESKRIPSI` text NOT NULL,
  `TANGGAL` date NOT NULL,
  `PRIORITAS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`ID_NOTIFIKASI`, `ID_PROYEK`, `JUDUL`, `DESKRIPSI`, `TANGGAL`, `PRIORITAS`) VALUES
(1, 1, 'Pemberitahuan Proyek Alpha', 'Proyek Alpha telah dimulai.', '2024-09-01', 'Tinggi'),
(2, 2, 'Pemberitahuan Proyek Beta', 'Proyek Beta telah selesai.', '2024-09-10', 'Sedang'),
(3, 3, 'Pemberitahuan Proyek Gamma', 'Analisis proyek Gamma sedang dilakukan.', '2024-09-15', 'Tinggi'),
(4, 4, 'Pemberitahuan Proyek Delta', 'Proyek Delta menunggu persetujuan.', '2024-09-20', 'Rendah'),
(5, 5, 'Pemberitahuan Proyek Epsilon', 'Proyek Epsilon akan dimulai pada akhir bulan.', '2024-09-25', 'Tinggi'),
(6, 6, 'Pemberitahuan Proyek Zeta', 'Proyek Zeta telah selesai.', '2024-09-28', 'Sedang'),
(7, 7, 'Pemberitahuan Proyek Eta', 'Proyek Eta dalam tahap pengembangan.', '2024-10-01', 'Tinggi'),
(8, 8, 'Pemberitahuan Proyek Theta', 'Proyek Theta menunggu persetujuan.', '2024-10-02', 'Rendah'),
(9, 9, 'Pemberitahuan Proyek Iota', 'Proyek Iota sedang dalam pengujian.', '2024-10-03', 'Sedang'),
(10, 10, 'Pemberitahuan Proyek Kappa', 'Proyek Kappa telah selesai dan akan di-deploy.', '2024-10-04', 'Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `ID_PEKERJAAN` int(11) NOT NULL,
  `ID_GRAFIK` int(11) DEFAULT NULL,
  `ID_PROYEK` int(11) DEFAULT NULL,
  `NAMA` varchar(255) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  `KATEGORI` varchar(100) NOT NULL,
  `TANGGAL` date NOT NULL,
  `JUMLAH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`ID_PEKERJAAN`, `ID_GRAFIK`, `ID_PROYEK`, `NAMA`, `STATUS`, `KATEGORI`, `TANGGAL`, `JUMLAH`) VALUES
(1, 1, 1, 'Pengumpulan Data', 'Selesai', 'Analisis', '2024-09-01', 5),
(2, 2, 1, 'Desain Sistem', 'Dalam Proses', 'Pengembangan', '2024-09-05', 3),
(3, 3, 2, 'Uji Coba Prototipe', 'Menunggu', 'Pengujian', '2024-09-10', 7),
(4, 4, 3, 'Implementasi Fitur', 'Selesai', 'Pengembangan', '2024-09-15', 4),
(5, 5, 4, 'Dokumentasi', 'Dalam Proses', 'Dokumentasi', '2024-09-20', 2),
(6, 6, 5, 'Review Kode', 'Aktif', 'Pengembangan', '2024-09-25', 6),
(7, 7, 6, 'Integrasi Sistem', 'Selesai', 'Integrasi', '2024-09-28', 8),
(8, 8, 7, 'Pemeliharaan Sistem', 'Aktif', 'Pemeliharaan', '2024-10-01', 5),
(9, 9, 8, 'Evaluasi Proyek', 'Menunggu', 'Analisis', '2024-10-03', 3),
(10, 10, 9, 'Pengiriman Laporan', 'Selesai', 'Dokumentasi', '2024-10-04', 4);

-- --------------------------------------------------------

--
-- Table structure for table `personel`
--

CREATE TABLE `personel` (
  `ID_PERSONEL` int(11) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  `JUMLAH_PEKERJA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personel`
--

INSERT INTO `personel` (`ID_PERSONEL`, `NAMA`, `STATUS`, `JUMLAH_PEKERJA`) VALUES
(1, 'Tim A', 'Aktif', 5),
(2, 'Tim B', 'Tidak Aktif', 8),
(3, 'Tim C', 'Aktif', 6),
(4, 'Tim D', 'Aktif', 7),
(5, 'Tim E', 'Tidak Aktif', 10),
(6, 'Tim F', 'Aktif', 4),
(7, 'Tim G', 'Dalam Perbaikan', 9),
(8, 'Tim H', 'Aktif', 12),
(9, 'Tim I', 'Tidak Aktif', 5),
(10, 'Tim J', 'Aktif', 11);

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `ID_PROYEK` int(11) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  `JUMLAH_PEKERJA` int(11) NOT NULL,
  `TANGGAL_MULAI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`ID_PROYEK`, `NAMA`, `STATUS`, `JUMLAH_PEKERJA`, `TANGGAL_MULAI`) VALUES
(1, 'Proyek Alpha', 'Aktif', 15, '2024-09-01'),
(2, 'Proyek Beta', 'Selesai', 10, '2024-08-15'),
(3, 'Proyek Gamma', 'Dalam Proses', 8, '2024-09-10'),
(4, 'Proyek Delta', 'Menunggu', 12, '2024-09-20'),
(5, 'Proyek Epsilon', 'Aktif', 14, '2024-09-25'),
(6, 'Proyek Zeta', 'Selesai', 9, '2024-07-30'),
(7, 'Proyek Eta', 'Dalam Proses', 11, '2024-09-28'),
(8, 'Proyek Theta', 'Menunggu', 13, '2024-10-01'),
(9, 'Proyek Iota', 'Aktif', 16, '2024-08-05'),
(10, 'Proyek Kappa', 'Selesai', 7, '2024-06-12'),
(11, 'fdfdf', 'aktif', 1, '2024-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `revisi_gambar`
--

CREATE TABLE `revisi_gambar` (
  `ID_REVISI` int(11) NOT NULL,
  `ID_PEKERJAAN` int(11) DEFAULT NULL,
  `DESKRIPSI` text NOT NULL,
  `TANGGAL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `revisi_gambar`
--

INSERT INTO `revisi_gambar` (`ID_REVISI`, `ID_PEKERJAAN`, `DESKRIPSI`, `TANGGAL`) VALUES
(1, 1, 'Revisi desain awal berdasarkan feedback', '2024-09-11'),
(2, 1, 'Perubahan layout untuk efisiensi', '2024-09-12'),
(3, 2, 'Update warna sesuai dengan brand guidelines', '2024-09-13'),
(4, 3, 'Perbaikan ukuran elemen UI', '2024-09-14'),
(5, 4, 'Penyempurnaan detail teknis gambar', '2024-09-15'),
(6, 5, 'Penambahan elemen baru sesuai permintaan klien', '2024-09-16'),
(7, 6, 'Membuat versi alternatif desain', '2024-09-17'),
(8, 7, 'Revisi berdasarkan masukan pengguna', '2024-09-18'),
(9, 8, 'Finalisasi gambar untuk presentasi', '2024-09-19'),
(10, 9, 'Koreksi kesalahan dalam gambar', '2024-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DRdvHJT9PEb2t4yyq4VFNeGyPPrycfB5NJTZfiBE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnVnWlFUNVhEQzBkVG43V1ZoZUo2Z1RKTFFSMWwzazNpdlByZ0RwbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm95ZWsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1727860419),
('GBi15EHsri6DtMMv8xsTXy7cHK5q7JFKtgAYjHxr', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXU5V3V5SlZ5QzBpaUZyRWVKUTF1QUJreXFXNEN4Uk5kRWpYbUhMUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm95ZWsiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1727874554);

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `ID_TOOLS` int(11) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `STATUS` varchar(50) NOT NULL,
  `TANGGAL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`ID_TOOLS`, `NAMA`, `STATUS`, `TANGGAL`) VALUES
(1, 'Visual Studio Code', 'Aktif', '2024-09-25'),
(2, 'Git', 'Aktif', '2024-09-26'),
(3, 'Postman', 'Tidak Aktif', '2024-09-27'),
(4, 'Docker', 'Aktif', '2024-09-28'),
(5, 'Jenkins', 'Dalam Perbaikan', '2024-09-29'),
(6, 'Kubernetes', 'Aktif', '2024-09-30'),
(7, 'Nginx', 'Tidak Aktif', '2024-10-01'),
(8, 'MySQL Workbench', 'Aktif', '2024-10-02'),
(9, 'Slack', 'Aktif', '2024-10-03'),
(10, 'Terraform', 'Aktif', '2024-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workload_analysis`
--

CREATE TABLE `workload_analysis` (
  `ID_GRAFIK` int(11) NOT NULL,
  `STANDARD` float NOT NULL,
  `TANGGAL` date NOT NULL,
  `JUMLAH_PEKERJAAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workload_analysis`
--

INSERT INTO `workload_analysis` (`ID_GRAFIK`, `STANDARD`, `TANGGAL`, `JUMLAH_PEKERJAAN`) VALUES
(1, 75.5, '2024-09-25', 8),
(2, 80, '2024-09-26', 10),
(3, 70.2, '2024-09-27', 6),
(4, 85.3, '2024-09-28', 12),
(5, 78.4, '2024-09-29', 9),
(6, 88.7, '2024-09-30', 13),
(7, 90, '2024-10-01', 14),
(8, 82.1, '2024-10-02', 11),
(9, 76.3, '2024-10-03', 8),
(10, 79.9, '2024-10-04', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`ID_AKTIVITAS`),
  ADD KEY `DIIKUTI_FK` (`ID_PEKERJAAN`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dikerjakan`
--
ALTER TABLE `dikerjakan`
  ADD PRIMARY KEY (`ID_PERSONEL`,`ID_PEKERJAAN`),
  ADD KEY `DIKERJAKAN_FK` (`ID_PERSONEL`),
  ADD KEY `DIKERJAKAN2_FK` (`ID_PEKERJAAN`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menggunakan`
--
ALTER TABLE `menggunakan`
  ADD PRIMARY KEY (`ID_PEKERJAAN`,`ID_TOOLS`),
  ADD KEY `MENGGUNAKAN_FK` (`ID_PEKERJAAN`),
  ADD KEY `MENGGUNAKAN2_FK` (`ID_TOOLS`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`ID_NOTIFIKASI`),
  ADD KEY `MENGHASILKAN_FK` (`ID_PROYEK`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`ID_PEKERJAAN`),
  ADD KEY `MEMILIKI_FK` (`ID_PROYEK`),
  ADD KEY `MENUNJUKKAN_FK` (`ID_GRAFIK`);

--
-- Indexes for table `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`ID_PERSONEL`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`ID_PROYEK`);

--
-- Indexes for table `revisi_gambar`
--
ALTER TABLE `revisi_gambar`
  ADD PRIMARY KEY (`ID_REVISI`),
  ADD KEY `MELIBATKAN_FK` (`ID_PEKERJAAN`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`ID_TOOLS`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workload_analysis`
--
ALTER TABLE `workload_analysis`
  ADD PRIMARY KEY (`ID_GRAFIK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `ID_AKTIVITAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `ID_NOTIFIKASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `ID_PEKERJAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personel`
--
ALTER TABLE `personel`
  MODIFY `ID_PERSONEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `ID_PROYEK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `revisi_gambar`
--
ALTER TABLE `revisi_gambar`
  MODIFY `ID_REVISI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `ID_TOOLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workload_analysis`
--
ALTER TABLE `workload_analysis`
  MODIFY `ID_GRAFIK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD CONSTRAINT `FK_DIIKUTI` FOREIGN KEY (`ID_PEKERJAAN`) REFERENCES `pekerjaan` (`ID_PEKERJAAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
