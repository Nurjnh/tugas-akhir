-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jul 2024 pada 14.13
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `nama` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `nip` text DEFAULT NULL,
  `jabatan` text DEFAULT NULL,
  `akun_bidang_id` text DEFAULT NULL,
  `password` text NOT NULL,
  `level` text NOT NULL,
  `no_telp` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `flag_erase` text NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `nama`, `email`, `nip`, `jabatan`, `akun_bidang_id`, `password`, `level`, `no_telp`, `foto`, `flag_erase`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin@gmail.com', '19780212 200405 3 003', 'Operator Dinas', NULL, '$2y$12$.GfVvz4hok/mGJLOhHcHtuP6wwjpODKXhjLTEpuIMLk3w2CBIrqsu', '1', '081234567890', 'app/profil/1721973939-6DOQP.png', '1', '2024-07-25 22:28:47', '2024-07-25 23:05:39'),
(2, 'vini', 'Vini@gmail.com', '1234567', 'pengelola', '67156254-5774-4a06-a87f-1b5ab18c6544', '$2y$12$7mVo4n7WI8NnXD/o/uHx5O6osiAVg0vcU2kYy/ommtXWIEP8AVMZS', '2', NULL, 'app/profil/1721976668-fowFD.png', '1', '2024-07-25 23:03:37', '2024-07-25 23:51:09'),
(3, 'nur', 'Nur@gmail.com', '345678', 'koordinator', 'cf5e5f29-115e-4306-81e1-1c90b7e30b10', '$2y$12$U3bxiowCIm8tENsig6qPxukJW8r53XNTSO/eKU4uBVGZFEUEQAAiK', '2', NULL, 'app/profil/1721976551-kcLQr.jpg', '1', '2024-07-25 23:05:03', '2024-07-25 23:49:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `akun_nama` text DEFAULT NULL,
  `nip` text DEFAULT NULL,
  `jabatan` text DEFAULT NULL,
  `akun_bidang_id` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `flag_erase` text NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset`
--

CREATE TABLE `aset` (
  `aset_id` char(36) NOT NULL,
  `no_surat_pengada` text DEFAULT NULL,
  `tanggal_surat_pengada` date DEFAULT NULL,
  `nip_pejabat_pengada` text DEFAULT NULL,
  `nama_pejabat_pengada` text DEFAULT NULL,
  `jabatan_pejabat_pengada` text DEFAULT NULL,
  `nama_vendor` text DEFAULT NULL,
  `jabatan_vendor` text DEFAULT NULL,
  `akta_notaris_nomor` text DEFAULT NULL,
  `tanggal_akta` text DEFAULT NULL,
  `notaris` text DEFAULT NULL,
  `nama_perusahaan` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aset`
--

INSERT INTO `aset` (`aset_id`, `no_surat_pengada`, `tanggal_surat_pengada`, `nip_pejabat_pengada`, `nama_pejabat_pengada`, `jabatan_pejabat_pengada`, `nama_vendor`, `jabatan_vendor`, `akta_notaris_nomor`, `tanggal_akta`, `notaris`, `nama_perusahaan`, `flag_erase`, `created_at`, `updated_at`) VALUES
('37520dd3-fe42-4e99-82fa-e25dfad1470c', '34687', '2024-03-12', '123456', 'wawan', 'pengelola aset', 'CICI', 'aset', '678', NULL, NULL, 'PT.ASET', 1, '2024-07-25 23:08:25', '2024-07-25 23:08:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_detail`
--

CREATE TABLE `aset_detail` (
  `aset_detail_id` char(36) NOT NULL,
  `aset_id` text DEFAULT NULL,
  `aset_kategori_id` text DEFAULT NULL,
  `aset_bidang_id` text DEFAULT NULL,
  `aset_nama` text DEFAULT NULL,
  `aset_qty` text DEFAULT NULL,
  `aset_harga` text DEFAULT NULL,
  `aset_tanggal_masuk` text DEFAULT NULL,
  `aset_foto` text DEFAULT NULL,
  `aset_deskripsi` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aset_detail`
--

INSERT INTO `aset_detail` (`aset_detail_id`, `aset_id`, `aset_kategori_id`, `aset_bidang_id`, `aset_nama`, `aset_qty`, `aset_harga`, `aset_tanggal_masuk`, `aset_foto`, `aset_deskripsi`, `flag_erase`, `created_at`, `updated_at`) VALUES
('338f694b-f8f2-49d7-a07b-f92a3cf38ed2', '37520dd3-fe42-4e99-82fa-e25dfad1470c', '39dc8713-5408-4c81-ab02-a0bcef279867', 'cf5e5f29-115e-4306-81e1-1c90b7e30b10', 'avanza', '2', '15000000', '2024-06-12', 'gambar-aset/aset-cu7gK-YdZ15-1721974105.jpg', NULL, 1, '2024-07-25 23:08:25', '2024-07-25 23:08:25'),
('873d1d70-936b-44e8-852c-c8d4974537fc', '37520dd3-fe42-4e99-82fa-e25dfad1470c', 'b0d93782-e206-47ef-accf-56662cc1c733', '67156254-5774-4a06-a87f-1b5ab18c6544', 'laptop acer', '4', '6000000', '2024-07-15', 'gambar-aset/aset-BKpmV-vMSbl-1721974105.jpg', NULL, 1, '2024-07-25 23:08:25', '2024-07-25 23:08:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_permohonan`
--

CREATE TABLE `aset_permohonan` (
  `aset_permohonan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` text NOT NULL,
  `qty_barang` text NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `author_id` text NOT NULL,
  `bidang_id` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aset_permohonan`
--

INSERT INTO `aset_permohonan` (`aset_permohonan_id`, `nama_barang`, `qty_barang`, `deskripsi_barang`, `author_id`, `bidang_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'laptop asus', '1', 'untuk mempermudah pekerjaan', '3', 'cf5e5f29-115e-4306-81e1-1c90b7e30b10', 2, '2024-07-25 23:44:23', '2024-07-25 23:58:33'),
(2, 'motor', '1', 'butuh motor untuk menuju ke kantor', '3', 'cf5e5f29-115e-4306-81e1-1c90b7e30b10', 1, '2024-07-25 23:53:02', '2024-07-25 23:59:36'),
(3, 'motor', '2', 'untuk kerja', '2', '67156254-5774-4a06-a87f-1b5ab18c6544', 0, '2024-07-28 21:48:30', '2024-07-28 21:48:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aset_unit`
--

CREATE TABLE `aset_unit` (
  `aset_unit_id` char(36) NOT NULL,
  `aset_id` text DEFAULT NULL,
  `bidang_id` text DEFAULT NULL,
  `unit_pemegang` text DEFAULT NULL,
  `unit_keadaan` int(11) DEFAULT NULL,
  `unit_kode` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aset_unit`
--

INSERT INTO `aset_unit` (`aset_unit_id`, `aset_id`, `bidang_id`, `unit_pemegang`, `unit_keadaan`, `unit_kode`, `created_at`, `updated_at`) VALUES
('379c33ae-253a-4386-98dd-0a9404c9b951', '338f694b-f8f2-49d7-a07b-f92a3cf38ed2', 'cf5e5f29-115e-4306-81e1-1c90b7e30b10', 'gusti', 1, '769', '2024-07-25 23:36:43', '2024-07-26 07:51:24'),
('4646f2cd-6a99-4498-9700-4f643aec39e4', '338f694b-f8f2-49d7-a07b-f92a3cf38ed2', 'cf5e5f29-115e-4306-81e1-1c90b7e30b10', 'rian', 0, '986', '2024-07-25 23:36:43', '2024-07-26 07:51:24'),
('7d300315-f574-4eab-b2ee-e123f6c68198', '873d1d70-936b-44e8-852c-c8d4974537fc', '67156254-5774-4a06-a87f-1b5ab18c6544', 'nunu', 0, '012', '2024-07-25 23:39:57', '2024-07-25 23:39:57'),
('ad218af8-74c0-4ed2-9d13-d892c048e6dd', '873d1d70-936b-44e8-852c-c8d4974537fc', '67156254-5774-4a06-a87f-1b5ab18c6544', 'nina', 0, '654', '2024-07-25 23:39:57', '2024-07-25 23:39:57'),
('b1a36e7a-e00f-435f-b2bd-20f194b83a10', '873d1d70-936b-44e8-852c-c8d4974537fc', '67156254-5774-4a06-a87f-1b5ab18c6544', 'nini', 1, '987', '2024-07-25 23:39:57', '2024-07-25 23:39:57'),
('cf623a68-40fb-47d9-b0b0-21b6667f918e', '873d1d70-936b-44e8-852c-c8d4974537fc', '67156254-5774-4a06-a87f-1b5ab18c6544', 'nana', 1, '765', '2024-07-25 23:39:57', '2024-07-25 23:39:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `bidang_id` char(36) NOT NULL,
  `bidang_nama` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`bidang_id`, `bidang_nama`, `flag_erase`, `created_at`, `updated_at`) VALUES
('67156254-5774-4a06-a87f-1b5ab18c6544', 'Bidang SMP', 1, '2024-07-25 22:28:49', '2024-07-25 22:28:49'),
('69072e7f-2182-403a-8988-1cd0aab1d999', 'Bidang SMA', 1, '2024-07-25 22:28:49', '2024-07-25 22:28:49'),
('9038d71b-aee6-493b-a979-ab0b88c88b03', 'Bidang PAUD', 1, '2024-07-25 22:28:49', '2024-07-25 22:28:49'),
('cf5e5f29-115e-4306-81e1-1c90b7e30b10', 'Bidang SD', 1, '2024-07-25 22:28:49', '2024-07-25 22:28:49');

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
-- Struktur dari tabel `kategori_aset`
--

CREATE TABLE `kategori_aset` (
  `kategori_id` char(36) NOT NULL,
  `kategori_nama` text DEFAULT NULL,
  `flag_erase` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_aset`
--

INSERT INTO `kategori_aset` (`kategori_id`, `kategori_nama`, `flag_erase`, `created_at`, `updated_at`) VALUES
('095e1c2d-f0cf-4771-9855-8fae46025a20', 'Tablet', 1, '2024-07-25 22:28:49', '2024-07-25 22:28:49'),
('39dc8713-5408-4c81-ab02-a0bcef279867', 'mobil', 1, '2024-07-25 22:28:49', '2024-07-25 22:28:49'),
('91fc6d09-1008-4bd7-afbb-a3018b34b48d', 'motor', 1, '2024-07-25 22:28:49', '2024-07-25 22:28:49'),
('b0d93782-e206-47ef-accf-56662cc1c733', 'laptop/pc', 1, '2024-07-25 22:28:49', '2024-07-25 22:28:49');

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
(4, '2024_02_29_165255_create_kategori_aset_table', 1),
(5, '2024_02_29_165303_create_aset_table', 1),
(6, '2024_02_29_165315_create_pemegang_aset_table', 1),
(7, '2024_03_02_135132_create_aset_detail_table', 1),
(8, '2024_05_07_134033_create_akun_table', 1),
(9, '2024_05_07_140310_create_bidang_table', 1),
(10, '2024_05_14_065535_create_admin_table', 1),
(11, '2024_05_30_064544_create_aset_unit_table', 1),
(12, '2024_05_31_215122_create_aset_permohonan_table', 1);

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
-- Struktur dari tabel `pemegang_aset`
--

CREATE TABLE `pemegang_aset` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HV3laKVCKxkGOUYT9NBPqD7PVris8rfBNJ3H6AeD', '2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZE9pSGlUNmRtRUpzVnNuWkx4NXhyR2U1WEc3QlVXZHNwaGJUMnp6QiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cDovL2xvY2FsaG9zdC9zaW1vbmEvYWRtaW4vYXNldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vbG9jYWxob3N0L3NpbW9uYS94L2FzZXQtcnVzYWsiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1722077723),
('T2o7JK8SBho0Az3OYoyRjsVZdWknHm9CokJI1bm6', '1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiejlIUzVQZnZLQU1lMGYydXdmY1VWZkxKNnFoeVVpQlNHVjVncjIyWiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cDovL2xvY2FsaG9zdC9zaW1vbmEvYWRtaW4vYXNldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjUwOiJodHRwOi8vbG9jYWxob3N0L3NpbW9uYS9hZG1pbi9wZXJtb2hvbmFuLWFzZXQtYmFydSI7fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1722228560),
('vsd85i9ImxLsfQM1h4eQ01IH3VvvVYYTkgvp4mKX', '1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMVZiQXFHV2NtcFhXYkVtNzZjY1l6VHdaNXg5SDJUUWYzT2Q0Szg5MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3QvdHVnYXMtYWtoaXIvYWRtaW4va2F0ZWdvcmktYXNldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1722255087);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aset`
--
ALTER TABLE `aset`
  ADD PRIMARY KEY (`aset_id`);

--
-- Indeks untuk tabel `aset_detail`
--
ALTER TABLE `aset_detail`
  ADD PRIMARY KEY (`aset_detail_id`);

--
-- Indeks untuk tabel `aset_permohonan`
--
ALTER TABLE `aset_permohonan`
  ADD PRIMARY KEY (`aset_permohonan_id`);

--
-- Indeks untuk tabel `aset_unit`
--
ALTER TABLE `aset_unit`
  ADD PRIMARY KEY (`aset_unit_id`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`bidang_id`);

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
-- Indeks untuk tabel `kategori_aset`
--
ALTER TABLE `kategori_aset`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pemegang_aset`
--
ALTER TABLE `pemegang_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`(768)),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `aset_permohonan`
--
ALTER TABLE `aset_permohonan`
  MODIFY `aset_permohonan_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pemegang_aset`
--
ALTER TABLE `pemegang_aset`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
