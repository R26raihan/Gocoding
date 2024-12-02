-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2024 at 03:22 PM
-- Server version: 5.7.39
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gocodingweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` text,
  `code_1` text,
  `code_2` text,
  `code_3` text,
  `code_4` text,
  `code_5` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`, `code`, `code_1`, `code_2`, `code_3`, `code_4`, `code_5`) VALUES
(1, 'HTML: Dasar Pembangun Situs Web', 'HTML (HyperText Markup Language)\r\nHTML adalah bahasa yang digunakan untuk membuat dan menyusun halaman web. HTML memberikan struktur dasar pada halaman web dan memungkinkan pengembang untuk mengatur teks, gambar, tautan, form, dan berbagai elemen lainnya.\r\n\r\nSejarah HTML\r\nHTML pertama kali diciptakan oleh Tim Berners-Lee pada tahun 1991 dengan tujuan untuk membuat dokumen yang dapat diakses melalui jaringan internet. Seiring perkembangan waktu, HTML kini menjadi elemen inti dalam pengembangan web modern.', '1733149310.png', '2024-12-02 07:21:50', '2024-12-02 08:03:57', '<!DOCTYPE html>\r\n<html lang=\"id\">\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <title>Judul Halaman</title>\r\n</head>\r\n<body>\r\n    <h1>Selamat Datang di Dunia HTML</h1>\r\n    <p>HTML adalah bahasa markup standar untuk membuat halaman web.</p>\r\n</body>\r\n</html>', '<!DOCTYPE html>\r\n<html lang=\"id\">\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <title>Judul Halaman</title>\r\n</head>\r\n<body>\r\n    <h1>Selamat Datang di Dunia HTML</h1>\r\n    <p>HTML adalah bahasa markup standar untuk membuat halaman web.</p>\r\n</body>\r\n</html>', '<h1>Judul Utama</h1>\r\n<h2>Subjudul</h2>\r\n<p>Ini adalah paragraf pertama dalam halaman HTML ini.</p>\r\n\r\n<a href=\"https://www.example.com\">Kunjungi Example</a>\r\n\r\n<img src=\"gambar.jpg\" alt=\"Deskripsi Gambar\">\r\n\r\n<ul>\r\n    <li>Item pertama</li>\r\n    <li>Item kedua</li>\r\n</ul>\r\n\r\n<ol>\r\n    <li>Langkah pertama</li>\r\n    <li>Langkah kedua</li>\r\n</ol>\r\n\r\n<form action=\"/submit\" method=\"POST\">\r\n    <label for=\"nama\">Nama:</label>\r\n    <input type=\"text\" id=\"nama\" name=\"nama\">\r\n    <input type=\"submit\" value=\"Kirim\">\r\n</form>', NULL, NULL, NULL),
(3, 'Belajar Javascript', 'JavaScript adalah bahasa pemrograman yang digunakan terutama untuk pengembangan aplikasi web. JavaScript memungkinkan pengembang untuk membuat halaman web yang interaktif dan dinamis dengan memungkinkan perubahan pada elemen halaman web tanpa harus memuat ulang halaman sepenuhnya. Ini menjadikannya sangat penting dalam pengembangan web modern.\r\n\r\nBerikut adalah beberapa konsep penting dalam JavaScript:\r\n\r\nBahasa Pemrograman Berorientasi Objek (OOP): JavaScript adalah bahasa yang mendukung paradigma pemrograman berorientasi objek, yang berarti kita dapat membuat objek yang memiliki properti dan metode tertentu. Objek ini bisa digunakan untuk mengelola dan mengorganisasi data serta fungsionalitas dalam aplikasi.\r\n\r\nFungsi: JavaScript menggunakan fungsi untuk mengelompokkan kode yang dapat dipanggil ulang di berbagai tempat dalam program. Fungsi dapat menerima parameter dan mengembalikan nilai.\r\n\r\nVariabel: Variabel digunakan untuk menyimpan data yang bisa berubah selama program berjalan. Variabel dalam JavaScript bisa dideklarasikan dengan kata kunci let, const, atau var, yang masing-masing memiliki aturan dan scope (jangkauan) yang berbeda.\r\n\r\nEvent Handling: JavaScript memungkinkan pengembang untuk menangani berbagai macam interaksi dari pengguna seperti klik, ketikan keyboard, atau hover. Event handling ini memungkinkan halaman web berinteraksi dengan pengguna secara real-time tanpa perlu memuat ulang halaman.\r\n\r\nDOM (Document Object Model): DOM adalah representasi struktur halaman web yang terdiri dari elemen-elemen HTML. JavaScript dapat digunakan untuk memanipulasi DOM, misalnya untuk mengubah teks, menambahkan atau menghapus elemen, atau mengubah atribut elemen. Dengan demikian, JavaScript dapat digunakan untuk memperbarui halaman web secara dinamis.\r\n\r\nAsynchronous Programming: JavaScript mendukung pemrograman asinkron, yang memungkinkan proses untuk berjalan secara paralel tanpa mengganggu alur program utama. Hal ini sangat berguna untuk operasi yang memerlukan waktu lama, seperti permintaan ke server, agar aplikasi tetap responsif.\r\n\r\nAPI (Application Programming Interface): JavaScript memungkinkan kita untuk berinteraksi dengan API, baik itu API eksternal seperti Google Maps atau API server untuk berkomunikasi dengan backend. Ini membuka banyak kemungkinan bagi aplikasi web untuk mengakses berbagai layanan dan data secara real-time.\r\n\r\nLibraries dan Frameworks: JavaScript memiliki berbagai pustaka (libraries) dan framework yang menyederhanakan pengembangan aplikasi web. Pustaka seperti jQuery dan framework seperti React, Angular, dan Vue.js memudahkan pembuatan aplikasi web yang kompleks dengan menyediakan komponen dan fungsionalitas yang sudah jadi.\r\n\r\nSecara keseluruhan, JavaScript adalah bahasa yang sangat penting untuk pengembangan web modern. Dengan kemampuannya dalam manipulasi DOM, penanganan event, dan pemrograman asinkron, JavaScript memungkinkan pembuatan aplikasi web yang dinamis dan interaktif.', 'images/bHh4L3c5hIzblB3y86Rjvmvo8VVX3fnXFZ9zZAle.png', '2024-12-02 08:15:56', '2024-12-02 08:18:40', NULL, '// Fungsi untuk menampilkan pesan\r\nfunction tampilkanPesan(nama) {\r\n    console.log(\"Halo, \" + nama);\r\n}\r\n\r\n// Memanggil fungsi\r\ntampilkanPesan(\"Alice\");', '// Menggunakan jQuery untuk menangani klik\r\n$(document).ready(function() {\r\n    $(\"#myButton\").click(function() {\r\n        alert(\"Tombol diklik menggunakan jQuery!\");\r\n    });\r\n});', 'let umur = 18;\r\n\r\nif (umur >= 18) {\r\n    console.log(\"Anda sudah dewasa.\");\r\n} else {\r\n    console.log(\"Anda masih di bawah umur.\");\r\n}', '// Perulangan menggunakan for\r\nfor (let i = 1; i <= 5; i++) {\r\n    console.log(i); // Akan mencetak 1, 2, 3, 4, 5\r\n}', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('P1FCOsz3nURvGoiE7dIhhO8f7h9VbfCj5Fk2UarR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianV4TWNIMTVLT29EamdFWDlFRGpST0EwU1VqQWRtbmZ5U0pORVdoSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYWZ0YXJhcnRpY2xlcy8zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733152733);

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'salma', 'salama79@gmail.com', NULL, '$2y$12$siPsYWzvLHiJTCNDhzwnZuvn.3t9zqu6Pto9CDDb87QJkxLClIXdC', NULL, '2024-12-01 05:36:24', '2024-12-01 05:36:24'),
(2, 'ANDYA RAIHAN SETIAWAN', '41522010157@student.mercubuana.ac.id', NULL, '$2y$12$IXaCG1J4VCray/r.G.62refVTPEQs22Fv.TDNR0LG8i5ehctcONhm', NULL, '2024-12-01 05:40:04', '2024-12-01 05:40:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
