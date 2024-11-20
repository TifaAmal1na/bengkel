-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 03:27 AM
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
  `TANGGAL_SELESAI` date DEFAULT NULL,
  `STATUS` enum('Selesai','Dalam Proses') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`ID_AKTIVITAS`, `ID_PEKERJAAN`, `DESKRIPSI`, `TANGGAL`, `TANGGAL_SELESAI`, `STATUS`) VALUES
(1, 1, 'Mengumpulkan data untuk analisis', '2024-01-01', '2024-01-31', 'Selesai'),
(2, 2, 'Mendesain struktur sistem', '2024-02-01', '2024-02-29', 'Dalam Proses'),
(3, 3, 'Menjalankan pengujian awal', '2024-03-01', '2024-03-31', 'Selesai'),
(4, 4, 'Menyusun dokumentasi proyek', '2024-04-01', '0000-00-00', 'Selesai'),
(5, 1, 'Mengadakan rapat tim', '2024-05-01', '2024-05-31', ''),
(6, 5, 'Mereview hasil pekerjaan', '2024-06-01', '2024-06-30', ''),
(7, 2, 'Menyiapkan presentasi', '2024-07-01', '2024-07-31', ''),
(8, 3, 'Melakukan analisis risiko', '2024-08-01', '2024-08-31', 'Selesai'),
(9, 4, 'Evaluasi hasil proyek', '2024-09-01', '2024-09-30', ''),
(10, 5, 'Menentukan langkah selanjutnya', '2024-10-01', '2024-10-31', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('tfaamalina01@gmail.com|127.0.0.1', 'i:2;', 1730338678),
('tfaamalina01@gmail.com|127.0.0.1:timer', 'i:1730338678;', 1730338678),
('tifa01@gmail.com|127.0.0.1', 'i:2;', 1730351358),
('tifa01@gmail.com|127.0.0.1:timer', 'i:1730351358;', 1730351358);

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
(9, '0001_01_01_000002_create_jobs_table', 1),
(16, '2024_10_07_091030_add_timestamps_to_pekerjaan_table', 2),
(17, '2024_10_07_091427_change_status_column_in_pekerjaan_table', 2),
(18, '2024_10_07_095820_change_status_column_in_proyek_table', 2),
(19, '2024_10_09_050410_change_status_column_in_tools_table', 3),
(20, '2024_10_09_054951_change_status_column_in_personel_table', 4),
(21, '2024_10_15_045015_create_notifications_table', 5),
(22, '2024_10_21_080639_update_aktivitas_table_foreign_key', 5),
(23, '2024_10_22_065508_add_last_login_to_users_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` enum('increase','decrease','neutral') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `STATUS` enum('Selesai','Dalam Proses') NOT NULL DEFAULT 'Dalam Proses',
  `KATEGORI` varchar(100) NOT NULL,
  `TANGGAL_MULAI` date NOT NULL,
  `TANGGAL_SELESAI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`ID_PEKERJAAN`, `ID_GRAFIK`, `ID_PROYEK`, `NAMA`, `STATUS`, `KATEGORI`, `TANGGAL_MULAI`, `TANGGAL_SELESAI`) VALUES
(1, 1, 1, 'Pengumpulan Data', 'Selesai', 'Analisis', '2024-09-01', '2024-11-30'),
(2, 2, 1, 'Desain Sistem', 'Dalam Proses', 'Pengembangan', '2024-09-05', '0000-00-00'),
(3, 3, 2, 'Uji Coba Prototipe', 'Dalam Proses', 'Pengujian', '2024-09-10', '0000-00-00'),
(4, 4, 3, 'Implementasi Fitur', 'Selesai', 'Pengembangan', '2024-09-15', '0000-00-00'),
(5, 5, 4, 'Dokumentasi', 'Dalam Proses', 'Dokumentasi', '2024-09-20', '0000-00-00'),
(6, 6, 5, 'Review Kode', '', 'Pengembangan', '2024-09-25', '0000-00-00'),
(7, 7, 6, 'Integrasi Sistem', 'Selesai', 'Integrasi', '2024-09-28', '0000-00-00'),
(8, 8, 7, 'Pemeliharaan Sistem', 'Dalam Proses', 'Pemeliharaan', '2024-10-01', '0000-00-00'),
(9, 9, 8, 'Evaluasi Proyek', 'Selesai', 'Analisis', '2024-10-03', '0000-00-00'),
(10, 10, 9, 'Pengiriman Laporan', 'Selesai', 'Dokumentasi', '2024-10-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `personel`
--

CREATE TABLE `personel` (
  `ID_PERSONEL` int(11) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `STATUS` enum('Aktif','Tidak Aktif') NOT NULL,
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
(7, 'Tim G', 'Aktif', 9),
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
  `STATUS` enum('dalam proses','selesai') NOT NULL,
  `JUMLAH_PEKERJA` int(11) NOT NULL,
  `TANGGAL_MULAI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`ID_PROYEK`, `NAMA`, `STATUS`, `JUMLAH_PEKERJA`, `TANGGAL_MULAI`) VALUES
(1, 'Proyek Alpha', '', 15, '2024-09-01'),
(2, 'Proyek Beta', 'selesai', 10, '2024-08-15'),
(3, 'Proyek Gamma', 'dalam proses', 8, '2024-09-10'),
(4, 'Proyek Delta', '', 12, '2024-09-20'),
(5, 'Proyek Epsilon', '', 14, '2024-09-25'),
(6, 'Proyek Zeta', 'selesai', 9, '2024-07-30'),
(7, 'Proyek Eta', 'dalam proses', 11, '2024-09-28'),
(8, 'Proyek Theta', '', 13, '2024-10-01'),
(9, 'Proyek Iota', '', 16, '2024-08-05'),
(10, 'Proyek Kappa', 'selesai', 7, '2024-06-12');

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
('035mgxn0KUcJNDh7DQzc2ohrpDQCuj1XwJQ1rd3J', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFhCOHJwN0xxeHBhenNzcjdkS2dQUm1RaENVN0hzOVVDd0RyMmZabCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1729649125),
('4stJ00Fi7LiYIq2EeUoPfQXJkJhX3I4PboizqAlB', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMjRkUjhoZ3lCSWVWZzZWYVg1ekR4Zk0wbFp4UVhmb0JIcGl5UzRoUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZWtlcmphYW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2O30=', 1730358188),
('7Pian8YrD1ZUO8b8t3N1GSHnxwTfU549k5cjzo6V', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT2JOcE1sWTdkY21vdDBWRFBmWHpiY0RTS2JHTlIwRHppTXByMXVRRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93b3JrbG9hZF9hbmFseXNpcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1730342102),
('D14MXDMDi81jtvvWtJyC01c9wvJA938y9tealp1s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1U5a1YwT0NPS2ZHODBwdnpidEV6SFVmd2k5Z0tJdFVvVVpwTTN4diI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1731910967),
('jECv4i267XNIaKZ7N7cSuyCmL7OenbTnlDbLrdzs', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMjA1NUM5djdDYmVZY2NyM3FsS29VSmJyZU1QWDZqZmlsRXJhQUdOOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O30=', 1731911387),
('LGWA0VLrklf2ZPJtykEyOYzKCv4Qq5K862afGyXn', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTFNTNVdnOFZidUJ1MEx6cDJYNFlLZEtSMFV6MjdmMklRMHVpbUlXcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZWtlcmphYW4iO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3Mjk1ODAyNjQ7fX0=', 1729584149),
('PqTe9C5Azmb47O2QF6RFpanBteOVLfK2FfrRs53d', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMmRSQVU0QTZGV3A4bU9Md3ZQZHFIcUZtVEFDRG0yMjhlZXFwemJaViI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3Mjk2NDkwODk7fX0=', 1729650448),
('qYhYhehYfH5xaxRdOf0Ggx56hvIzisrRwsH3Pv6g', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMEtwRE9PRmozNTVUemxLT3lPd0RjRzhKUkRQSVg2a09kSGxmSEZDRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTcyODYxOTcwMTt9fQ==', 1728633538);

-- --------------------------------------------------------

--
-- Table structure for table `standard`
--

CREATE TABLE `standard` (
  `ID_GRAFIK` int(11) NOT NULL,
  `STANDARD` float NOT NULL,
  `TANGGAL_MULAI` date NOT NULL,
  `TANGGAL_SELESAI` date DEFAULT NULL,
  `STATUS` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `standard`
--

INSERT INTO `standard` (`ID_GRAFIK`, `STANDARD`, `TANGGAL_MULAI`, `TANGGAL_SELESAI`, `STATUS`) VALUES
(1, 5, '2024-01-01', '2024-01-31', 'Tidak Aktif'),
(2, 5, '2024-02-01', '2024-02-29', 'Aktif'),
(3, 6, '2024-03-01', '2024-03-31', 'Aktif'),
(4, 6, '2024-04-01', '2024-04-30', 'Aktif'),
(5, 6, '2024-05-01', '2024-05-31', 'Aktif'),
(6, 7, '2024-06-01', '2024-06-30', 'Aktif'),
(7, 5, '2024-07-01', '2024-07-31', 'Aktif'),
(8, 7, '2024-08-01', '2024-08-31', 'Aktif'),
(9, 5, '2024-09-01', '2024-09-30', 'Aktif'),
(10, 6, '2024-10-01', '2024-10-31', 'Aktif'),
(12, 5, '2024-11-01', '2024-11-30', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `ID_TOOLS` int(11) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `STATUS` enum('Aktif','Perlu Kalibrasi') NOT NULL,
  `TANGGAL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`ID_TOOLS`, `NAMA`, `STATUS`, `TANGGAL`) VALUES
(1, 'Multimeter', 'Aktif', '2024-09-25'),
(2, 'Soldering Iron', 'Aktif', '2024-09-26'),
(3, 'Oscilloscope', 'Perlu Kalibrasi', '2024-09-27'),
(4, 'Docker', 'Aktif', '2024-09-28'),
(5, 'Jenkins', 'Perlu Kalibrasi', '2024-09-29'),
(6, 'Kubernetes', 'Aktif', '2024-09-30'),
(7, 'Nginx', 'Perlu Kalibrasi', '2024-10-01'),
(8, 'MySQL Workbench', 'Aktif', '2024-10-02'),
(9, 'Slack', 'Aktif', '2024-10-03'),
(10, 'Terraform', 'Aktif', '2024-10-04'),
(12, 'Visual Studio Code hah', 'Aktif', '2024-06-01');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login`) VALUES
(2, 'admin', 'admin@admin.com', '2024-10-21 23:45:14', '$2y$12$zNoV2EweHmBX53b/3pURcuKyAE4BDOtPIYeZI23ELWj81tREhqG3K', 'EflIGz3otqljyZ7iKUsHKMO76PSICrwnFtQphHqBL7lOjsCDKPyvrMlP20Or', '2024-10-21 23:45:14', '2024-10-21 23:45:14', NULL),
(3, 'user', 'user@user.com', '2024-10-21 23:45:14', '$2y$12$V66eluuh7O4NhEo/YaYy3.AjXN0G.ag6tSSegVZ16R1CQ5q6ghYF6', 'JLCsOM5YRz', '2024-10-21 23:45:15', '2024-10-21 23:45:15', NULL),
(4, 'Test User', 'test@example.com', '2024-10-21 23:47:52', '$2y$12$iLwMyfQAzzu0V.f8aunNOewJvY0xz6iMWn.9Wvcn7nsvGbUIuj79q', 'VKTQB6jy9T', '2024-10-21 23:47:53', '2024-10-21 23:47:53', NULL),
(6, 'Tifa Amalina', 'tifa01@gmail.com', NULL, '$2y$12$e0eKHLUMGQhTZ6ROUF43M.29Vk78qQa4Y/cvU.miuJr5W/fgD7w7q', NULL, '2024-10-30 22:10:43', '2024-10-30 22:10:43', NULL),
(7, 'tifa', 'tfaamalina01@gmail.com', NULL, '$2y$12$XqQ6P5iXF0E39bVmd1fyvu1GrrfQWnxvtBO00ibAALNCA8xTrbk.2', NULL, '2024-11-17 23:23:59', '2024-11-17 23:23:59', NULL);

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
  ADD KEY `ID_PROYEK` (`ID_PROYEK`),
  ADD KEY `ID_GRAFIK` (`ID_GRAFIK`);

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
-- Indexes for table `standard`
--
ALTER TABLE `standard`
  ADD PRIMARY KEY (`ID_GRAFIK`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `ID_NOTIFIKASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `ID_PEKERJAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personel`
--
ALTER TABLE `personel`
  MODIFY `ID_PERSONEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `ID_PROYEK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `revisi_gambar`
--
ALTER TABLE `revisi_gambar`
  MODIFY `ID_REVISI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `standard`
--
ALTER TABLE `standard`
  MODIFY `ID_GRAFIK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `ID_TOOLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD CONSTRAINT `FK_DIIKUTI` FOREIGN KEY (`ID_PEKERJAAN`) REFERENCES `pekerjaan` (`ID_PEKERJAAN`);

--
-- Constraints for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `ID_GRAFIK` FOREIGN KEY (`ID_GRAFIK`) REFERENCES `standard` (`ID_GRAFIK`),
  ADD CONSTRAINT `ID_PROYEK` FOREIGN KEY (`ID_PROYEK`) REFERENCES `proyek` (`ID_PROYEK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
