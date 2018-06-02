-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 01, 2018 at 04:46 PM
-- Server version: 5.6.38
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `songs`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2018_05_15_220150_table_song', 1),
(8, '2018_05_16_015426_table_song_add_field_image', 2),
(9, '2018_05_16_041250_add_monney_for_user', 3),
(10, '2018_05_16_041725_add_monney_for_song', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` int(11) NOT NULL,
  `filename` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `name`, `Price`, `filename`, `image`, `created_at`, `updated_at`) VALUES
(7, 'Cho Họ Ghét ĐI Em', 120000, '1KFAj2-qAC65pwlh-AL6WjYyNYRyYEq8B', '', '2018-05-18 14:51:14', NULL),
(8, 'Đời Dạy Tôi Only C', 22323, '1AubcQK5ESzrhQ4V18geuycLavb2po8Ot', '', '2018-05-18 15:00:12', NULL),
(9, 'Thấy Là Yêu Thương Only-C', 34000, '1i67N86GxLAhZF8INLgoAl1-bBtYBhyXc', '', '2018-05-18 15:01:05', NULL),
(10, 'Test Song', 22323, '13UFNYSmalpmdVgYkHS6zUkA8MlHo3W8I', '', '2018-05-18 15:23:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Monney` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `Monney`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 15000000, 'admin@gmail.com', '$2y$10$eM3U6RI./OUUQINWHMEzvePUKjiv7CBRjEkZg0.hUFo8r2ZPhS4oe', 'Vm8AYlrNhL0w49xIfzd1QR470fBjBDPUqr6LyqsExSPSZRCkfhMXDHNEGNy2', NULL, NULL),
(2, 'Ym72UbDPuJ', 120000, 'xPdzjNZUOw@gmail.com', '$2y$10$R7N3QSSLWnnYqHpqFaPx0.IQZ7m/Lew9yLfMw2Guhh1UReoS6hpDy', NULL, NULL, NULL),
(3, 'MPtd6kybxT', 300000, 'c1uVjCe5aC@gmail.com', '$2y$10$3.7lGdJkt03.mzfffyKdQusn0mwcOCdbEZS2M.K3LwRa6NoqKVKx2', NULL, NULL, NULL),
(4, 'va78hOOvwY', 0, 'rtC6XFQr9m@gmail.com', '$2y$10$pp7Ctif0jHcguFjWVxWb5.uKRxhqJ/OnVc71eG5rhH8mf1yVQCkEG', NULL, NULL, NULL),
(5, 'X4ixvsfpaA', 10000, 'p5dYyB6CTy@gmail.com', '$2y$10$H64K8yNG/lCeQQuMXcRcyu3IA.K8j6VgVNRTG4gWTBSYYj.jNOsxK', NULL, NULL, NULL),
(6, '6pIx1w7Aax', 0, 'YBxJJXSvRx@gmail.com', '$2y$10$wV/vSWVly2dkk4uxGp6cM.II1wpmnlaBmr/7XyDFlkSWkHbihCIWC', NULL, NULL, NULL),
(7, 'V8z07KLb8k', 0, 'JRcovbUjHf@gmail.com', '$2y$10$uLGBdSp49mxhXUiggmlLpuye4/jxuEBEaYegUjMgwDkevks/Y4ZIa', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `song`
--
ALTER TABLE `song`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
