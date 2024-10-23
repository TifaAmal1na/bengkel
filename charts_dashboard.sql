-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Okt 2024 pada 04.31
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.24

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
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE `aktivitas` (
  `ID_AKTIVITAS` int(11) NOT NULL,
  `ID_PEKERJAAN` int(11) DEFAULT NULL,
  `DESKRIPSI` text NOT NULL,
  `TANGGAL` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `STATUS` enum('Selesai','Dalam Proses','Aktif','Menunggu') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `aktivitas`
--

INSERT INTO `aktivitas` (`ID_AKTIVITAS`, `ID_PEKERJAAN`, `DESKRIPSI`, `TANGGAL`, `tanggal_selesai`, `STATUS`) VALUES
(1, 1, 'Mengumpulkan data untuk analisis', '2024-09-01', '2024-10-10', 'Selesai'),
(2, 2, 'Mendesain struktur sistem', '2024-09-08', '2024-10-10', 'Dalam Proses'),
(3, 3, 'Menjalankan pengujian awal', '2024-09-03', NULL, 'Selesai'),
(4, 4, 'Menyusun dokumentasi proyek', '2024-09-04', NULL, 'Selesai'),
(5, 1, 'Mengadakan rapat tim', '2024-09-05', NULL, 'Aktif'),
(6, 5, 'Mereview hasil pekerjaan', '2024-09-06', NULL, 'Menunggu'),
(7, 2, 'Menyiapkan presentasi', '2024-09-07', NULL, 'Aktif'),
(8, 3, 'Melakukan analisis risiko', '2024-09-08', NULL, 'Selesai'),
(9, 4, 'Evaluasi hasil proyek', '2024-09-09', NULL, 'Aktif'),
(10, 5, 'Menentukan langkah selanjutnya', '2024-09-10', NULL, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dikerjakan`
--

CREATE TABLE `dikerjakan` (
  `ID_PERSONEL` int(11) NOT NULL,
  `ID_PEKERJAAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dikerjakan`
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
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `menggunakan`
--

CREATE TABLE `menggunakan` (
  `ID_PEKERJAAN` int(11) NOT NULL,
  `ID_TOOLS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menggunakan`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
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
-- Struktur dari tabel `notifications`
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
-- Struktur dari tabel `notifikasi`
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
-- Dumping data untuk tabel `notifikasi`
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
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `ID_PEKERJAAN` int(11) NOT NULL,
  `ID_GRAFIK` int(11) DEFAULT NULL,
  `ID_PROYEK` int(11) DEFAULT NULL,
  `NAMA` varchar(255) NOT NULL,
  `STATUS` enum('Selesai','Dalam Proses','Aktif','Menunggu') NOT NULL DEFAULT 'Aktif',
  `KATEGORI` varchar(100) NOT NULL,
  `TANGGAL` date NOT NULL,
  `date_end` date NOT NULL,
  `JUMLAH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`ID_PEKERJAAN`, `ID_GRAFIK`, `ID_PROYEK`, `NAMA`, `STATUS`, `KATEGORI`, `TANGGAL`, `date_end`, `JUMLAH`) VALUES
(1, 1, 1, 'Pengumpulan Data', 'Selesai', 'Analisis', '2024-09-01', '0000-00-00', 5),
(2, 2, 1, 'Desain Sistem', 'Dalam Proses', 'Pengembangan', '2024-09-05', '0000-00-00', 3),
(3, 3, 2, 'Uji Coba Prototipe', 'Menunggu', 'Pengujian', '2024-09-10', '0000-00-00', 7),
(4, 4, 3, 'Implementasi Fitur', 'Selesai', 'Pengembangan', '2024-09-15', '0000-00-00', 4),
(5, 5, 4, 'Dokumentasi', 'Dalam Proses', 'Dokumentasi', '2024-09-20', '0000-00-00', 2),
(6, 6, 5, 'Review Kode', 'Aktif', 'Pengembangan', '2024-09-25', '0000-00-00', 6),
(7, 7, 6, 'Integrasi Sistem', 'Selesai', 'Integrasi', '2024-09-28', '0000-00-00', 8),
(8, 8, 7, 'Pemeliharaan Sistem', 'Aktif', 'Pemeliharaan', '2024-10-01', '0000-00-00', 5),
(9, 9, 8, 'Evaluasi Proyek', 'Menunggu', 'Analisis', '2024-10-03', '0000-00-00', 3),
(10, 10, 9, 'Pengiriman Laporan', 'Selesai', 'Dokumentasi', '2024-10-04', '0000-00-00', 4),
(13, 5, 5, 'tifa cantik jelita', 'Selesai', 'Analisis', '2004-09-09', '0000-00-00', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personel`
--

CREATE TABLE `personel` (
  `ID_PERSONEL` int(11) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `STATUS` enum('Aktif','Tidak Aktif') NOT NULL,
  `JUMLAH_PEKERJA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `personel`
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
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `ID_PROYEK` int(11) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `STATUS` enum('aktif','menunggu','dalam proses','selesai') NOT NULL,
  `JUMLAH_PEKERJA` int(11) NOT NULL,
  `TANGGAL_MULAI` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`ID_PROYEK`, `NAMA`, `STATUS`, `JUMLAH_PEKERJA`, `TANGGAL_MULAI`) VALUES
(1, 'Proyek Alpha', 'aktif', 15, '2024-09-01'),
(2, 'Proyek Beta', 'selesai', 10, '2024-08-15'),
(3, 'Proyek Gamma', 'dalam proses', 8, '2024-09-10'),
(4, 'Proyek Delta', 'menunggu', 12, '2024-09-20'),
(5, 'Proyek Epsilon', 'aktif', 14, '2024-09-25'),
(6, 'Proyek Zeta', 'selesai', 9, '2024-07-30'),
(7, 'Proyek Eta', 'dalam proses', 11, '2024-09-28'),
(8, 'Proyek Theta', 'menunggu', 13, '2024-10-01'),
(9, 'Proyek Iota', 'aktif', 16, '2024-08-05'),
(10, 'Proyek Kappa', 'selesai', 7, '2024-06-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `revisi_gambar`
--

CREATE TABLE `revisi_gambar` (
  `ID_REVISI` int(11) NOT NULL,
  `ID_PEKERJAAN` int(11) DEFAULT NULL,
  `DESKRIPSI` text NOT NULL,
  `TANGGAL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `revisi_gambar`
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
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('035mgxn0KUcJNDh7DQzc2ohrpDQCuj1XwJQ1rd3J', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFhCOHJwN0xxeHBhenNzcjdkS2dQUm1RaENVN0hzOVVDd0RyMmZabCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1729649125),
('LGWA0VLrklf2ZPJtykEyOYzKCv4Qq5K862afGyXn', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTFNTNVdnOFZidUJ1MEx6cDJYNFlLZEtSMFV6MjdmMklRMHVpbUlXcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZWtlcmphYW4iO31zOjM6InVybCI7YTowOnt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3Mjk1ODAyNjQ7fX0=', 1729584149),
('PqTe9C5Azmb47O2QF6RFpanBteOVLfK2FfrRs53d', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMmRSQVU0QTZGV3A4bU9Md3ZQZHFIcUZtVEFDRG0yMjhlZXFwemJaViI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MjtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3Mjk2NDkwODk7fX0=', 1729650448),
('qYhYhehYfH5xaxRdOf0Ggx56hvIzisrRwsH3Pv6g', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMEtwRE9PRmozNTVUemxLT3lPd0RjRzhKUkRQSVg2a09kSGxmSEZDRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTcyODYxOTcwMTt9fQ==', 1728633538);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tools`
--

CREATE TABLE `tools` (
  `ID_TOOLS` int(11) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `STATUS` enum('Aktif','Perlu Kalibrasi') NOT NULL,
  `TANGGAL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tools`
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
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login`) VALUES
(1, 'tifa', 'tfaamalina01@gmail.com', NULL, '$2y$12$yxdfb7Y/N2f9meSFYb1scO2tIvd4BhHpeEI1nMyZ9UbaszwLePcSC', NULL, '2024-10-08 18:59:39', '2024-10-08 18:59:39', NULL),
(2, 'admin', 'admin@admin.com', '2024-10-21 23:45:14', '$2y$12$zNoV2EweHmBX53b/3pURcuKyAE4BDOtPIYeZI23ELWj81tREhqG3K', 'EflIGz3otqljyZ7iKUsHKMO76PSICrwnFtQphHqBL7lOjsCDKPyvrMlP20Or', '2024-10-21 23:45:14', '2024-10-21 23:45:14', NULL),
(3, 'user', 'user@user.com', '2024-10-21 23:45:14', '$2y$12$V66eluuh7O4NhEo/YaYy3.AjXN0G.ag6tSSegVZ16R1CQ5q6ghYF6', 'JLCsOM5YRz', '2024-10-21 23:45:15', '2024-10-21 23:45:15', NULL),
(4, 'Test User', 'test@example.com', '2024-10-21 23:47:52', '$2y$12$iLwMyfQAzzu0V.f8aunNOewJvY0xz6iMWn.9Wvcn7nsvGbUIuj79q', 'VKTQB6jy9T', '2024-10-21 23:47:53', '2024-10-21 23:47:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `workload_analysis`
--

CREATE TABLE `workload_analysis` (
  `ID_GRAFIK` int(11) NOT NULL,
  `STANDARD` float NOT NULL,
  `TANGGAL` date NOT NULL,
  `JUMLAH_PEKERJAAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `workload_analysis`
--

INSERT INTO `workload_analysis` (`ID_GRAFIK`, `STANDARD`, `TANGGAL`, `JUMLAH_PEKERJAAN`) VALUES
(1, 1, '2024-09-25', 8),
(2, 1, '2024-09-26', 10),
(3, 2, '2024-09-27', 6),
(4, 1, '2024-09-28', 12),
(5, 3, '2024-09-29', 9),
(6, 3, '2024-09-30', 13),
(7, 5, '2024-10-01', 14),
(8, 7, '2024-10-02', 11),
(9, 5, '2024-10-03', 8),
(10, 6, '2024-10-04', 9);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`ID_AKTIVITAS`),
  ADD KEY `DIIKUTI_FK` (`ID_PEKERJAAN`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `dikerjakan`
--
ALTER TABLE `dikerjakan`
  ADD PRIMARY KEY (`ID_PERSONEL`,`ID_PEKERJAAN`),
  ADD KEY `DIKERJAKAN_FK` (`ID_PERSONEL`),
  ADD KEY `DIKERJAKAN2_FK` (`ID_PEKERJAAN`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menggunakan`
--
ALTER TABLE `menggunakan`
  ADD PRIMARY KEY (`ID_PEKERJAAN`,`ID_TOOLS`),
  ADD KEY `MENGGUNAKAN_FK` (`ID_PEKERJAAN`),
  ADD KEY `MENGGUNAKAN2_FK` (`ID_TOOLS`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`ID_NOTIFIKASI`),
  ADD KEY `MENGHASILKAN_FK` (`ID_PROYEK`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`ID_PEKERJAAN`),
  ADD KEY `MEMILIKI_FK` (`ID_PROYEK`),
  ADD KEY `MENUNJUKKAN_FK` (`ID_GRAFIK`);

--
-- Indeks untuk tabel `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`ID_PERSONEL`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`ID_PROYEK`);

--
-- Indeks untuk tabel `revisi_gambar`
--
ALTER TABLE `revisi_gambar`
  ADD PRIMARY KEY (`ID_REVISI`),
  ADD KEY `MELIBATKAN_FK` (`ID_PEKERJAAN`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`ID_TOOLS`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `workload_analysis`
--
ALTER TABLE `workload_analysis`
  ADD PRIMARY KEY (`ID_GRAFIK`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `ID_AKTIVITAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `ID_NOTIFIKASI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `ID_PEKERJAAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `personel`
--
ALTER TABLE `personel`
  MODIFY `ID_PERSONEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `ID_PROYEK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `revisi_gambar`
--
ALTER TABLE `revisi_gambar`
  MODIFY `ID_REVISI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tools`
--
ALTER TABLE `tools`
  MODIFY `ID_TOOLS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `workload_analysis`
--
ALTER TABLE `workload_analysis`
  MODIFY `ID_GRAFIK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD CONSTRAINT `FK_DIIKUTI` FOREIGN KEY (`ID_PEKERJAAN`) REFERENCES `pekerjaan` (`ID_PEKERJAAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
