-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2022 at 05:58 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip2`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokus`
--

CREATE TABLE `dokus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kat_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `tipe_doku` enum('Nakes','Dokter') COLLATE utf8mb4_unicode_ci DEFAULT 'Nakes',
  `oleh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_oleh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokus`
--

INSERT INTO `dokus` (`id`, `name`, `kat_id`, `unit_id`, `tipe_doku`, `oleh`, `update_oleh`, `file`, `created_at`, `updated_at`) VALUES
(18, 'Gass', 4, 1, 'Nakes', 'Fajar', 'Nakesss', '202203101018document_12.pdf', '2022-03-10 03:18:45', '2022-03-12 03:19:55'),
(19, '3161', 2, 1, 'Dokter', 'Fajar Test', 'DOkter3', '202203101020document_2.pdf', '2022-03-10 03:20:53', '2022-03-12 03:21:47'),
(20, '231', 4, 2, 'Nakes', 'Fajar', 'Nakesss', '202203101030JUKLAK-MOKA-SERASI-Maret-2022.pdf', '2022-03-10 03:30:19', '2022-03-12 02:55:54'),
(21, 'sf', 1, 1, 'Dokter', 'Fajar', 'Maimunah', '202203101040Pengumuman_Mekanisme_Pembelajaran_Tatap_Muka_Dan_Dalam_Jaringan_Pada_Semester_Genap_20212022.pdf', '2022-03-10 03:40:02', '2022-03-11 19:57:29'),
(22, 'Tester', 1, 3, 'Nakes', 'Fajar', '', '2022031108431614370057_143_18_LAMPIRAN.pdf', '2022-03-10 06:45:41', '2022-03-11 01:43:20'),
(23, 'A23', 2, 1, 'Nakes', 'Fajar', 'Maimunah', '202203110848202203091319document_2.pdf', '2022-03-11 01:48:23', '2022-03-11 20:43:13'),
(24, '5266', 2, 2, 'Nakes', 'Fajar', 'Nakesss', '202203110907document_9.pdf', '2022-03-11 02:07:05', '2022-03-12 03:13:19'),
(25, '5226', 2, 2, 'Nakes', 'Fajar', 'Nakesss', '202203110907document_3.pdf', '2022-03-11 02:07:39', '2022-03-12 03:13:42'),
(26, '24sf', 2, 2, 'Nakes', 'Fajar', '', '202203111041document_27.pdf', '2022-03-11 03:41:39', '2022-03-11 03:41:39'),
(27, '34', 2, 1, 'Dokter', 'Fajar Test', '', '202203120214DataTables - Frest - Bootstrap HTML admin template.pdf', '2022-03-11 19:14:21', '2022-03-11 19:14:21'),
(28, 'ere', 4, 1, 'Dokter', 'Fajar Test', '', '202203120215DataTables - Frest - Bootstrap HTML admin template (1).pdf', '2022-03-11 19:15:15', '2022-03-11 19:15:15'),
(29, 'Nakes baru', 4, 1, 'Nakes', 'Maimunah', NULL, '202203120328DataTables - Frest - Bootstrap HTML admin template.pdf', '2022-03-11 20:28:25', '2022-03-11 20:28:25'),
(30, 'ada2', 2, 2, 'Dokter', 'Fajar', NULL, '202203120950DataTables - Frest - Bootstrap HTML admin template.pdf', '2022-03-12 02:50:00', '2022-03-12 02:50:00'),
(31, 'dad42', 1, 7, 'Nakes', 'Nakesss', 'Nakesss', '202203120956document_10.pdf', '2022-03-12 02:56:30', '2022-03-12 02:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `dok_privates`
--

CREATE TABLE `dok_privates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `kat_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `unit_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dok_privates`
--

INSERT INTO `dok_privates` (`id`, `user_id`, `kat_id`, `unit_id`, `name`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'minah', '202203110908document_9.pdf', '2022-03-11 02:08:23', '2022-03-11 02:08:23'),
(2, 1, 2, 2, '123', '202203111031document_7.pdf', '2022-03-11 03:31:31', '2022-03-11 03:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'JBT32', NULL, '2022-03-12 02:47:47'),
(2, 'JBT 65', '2022-03-12 01:43:00', '2022-03-12 01:44:40'),
(3, 'JBT52', '2022-03-12 01:43:27', '2022-03-12 02:11:45'),
(9, 'JBT55', '2022-03-12 02:11:59', '2022-03-12 02:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'K3', NULL, NULL),
(2, 'K - 124', '2022-03-11 03:55:19', '2022-03-12 02:00:04'),
(4, 'K -12', '2022-03-12 01:56:41', '2022-03-12 01:59:38'),
(6, 'w4', '2022-03-12 02:02:35', '2022-03-12 02:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_08_121015_create_kategoris_table', 1),
(6, '2022_03_09_034659_create_units_table', 1),
(7, '2022_03_09_095751_create_jabatans_table', 1),
(8, '2022_03_09_120949_create_dokus_table', 2),
(9, '2022_03_10_105842_create_dok_privates_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'U3', NULL, NULL),
(2, 'adas', '2022-03-12 01:54:11', '2022-03-12 01:54:17'),
(3, 'ad', NULL, NULL),
(7, '2341ea', '2022-03-12 02:14:24', '2022-03-12 02:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `hak` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `jabatan_id`, `unit_id`, `hak`, `dob`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fajar Admin', 'fajar@admin.com', NULL, '$2y$10$S7muPNRLtH/rUM/kD2FZzuR/qHKXfVD4OlzjicDxG7sC7DfATDUj.', 1, 7, 1, '2022-03-04', '202203120754WhatsApp Image 2022-03-10 at 21.23.16.jpeg', NULL, '2022-03-09 03:20:07', '2022-03-12 02:51:52'),
(2, 'Fajar Tester', 'fajar@test.com', NULL, '$2y$10$g/tfeGNTVFX8gtmTpjL3V.nVa5I.u8Knd3xhkbNwgQFT2dqh/iWOi', 2, 3, 3, '2022-03-01', NULL, NULL, '2022-03-09 03:21:37', '2022-03-09 03:52:23'),
(3, 'Maimunah', 'minah@test.com', NULL, '$2y$10$2fXIgul.H6b/tGDhdqZYEuhqLs25uHeQ6dHmu9Nn5DVWM4S4PY24K', 3, 1, 4, '2022-03-04', '202203120525Desain tanpa judul (2).png', NULL, '2022-03-09 03:29:59', '2022-03-11 22:34:30'),
(6, 'Fajar 3', 'fajar3@admin.com', NULL, '$2y$10$bru6o8P3Mn7djPOhq2DY2.GRaNKOI5vdWhzi9X7C5XC4p5abSviY6', 2, 2, 4, '2022-03-01', NULL, NULL, '2022-03-09 05:00:25', '2022-03-09 05:00:25'),
(7, 'Dokter', 'fajar2@test.com', NULL, '$2y$10$CHOPEHPxSqv0/BBX/0/9FurRFu1jkk6R8/5QechoVOeo2Z/LxM86q', 2, 2, 3, '2022-03-01', '202203120738WhatsApp Image 2022-01-06 at 13.40.06.jpeg', NULL, '2022-03-09 20:09:03', '2022-03-12 02:43:22'),
(8, 'Dokter2', 'ada@tes.com', NULL, '$2y$10$vjci4R2cq3byMHJPJHaDYO3.TxEzcmEOGtvGNxZVrrXzAA9fUPrpG', 2, 3, 3, '2022-04-08', NULL, NULL, '2022-03-09 23:29:25', '2022-03-12 03:15:18'),
(9, 'DOkter3', 'dokter@test.com', NULL, '$2y$10$cj.9nHXd7jCqbbYtkLgYeuDIDqt.hSCuOrWrUuv9yfX1ygYI10m4S', 2, 3, 3, '2022-03-31', NULL, NULL, '2022-03-09 23:56:05', '2022-03-12 03:20:43'),
(10, 'Nakesss', 'nakes@user.com', NULL, '$2y$10$0vmH21WK84EUPbTvL37.uuZX0bD4EY8oulJQqbDeB50tnYOqDzoeq', 2, 2, 4, '2022-04-02', NULL, NULL, '2022-03-12 02:43:57', '2022-03-12 02:43:57'),
(11, 'sf', 'nakes2@user.com', NULL, '$2y$10$H.lXVaF5u/J01uirfkSgpeyo3HFlvSvkpScnanvb6XIJ7QFrGFtWy', 2, 1, 4, '2022-03-01', NULL, NULL, '2022-03-12 02:47:32', '2022-03-12 02:47:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokus`
--
ALTER TABLE `dokus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dok_privates`
--
ALTER TABLE `dok_privates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `dokus`
--
ALTER TABLE `dokus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `dok_privates`
--
ALTER TABLE `dok_privates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
