-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 06:30 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Medical', '2021-07-12 19:33:05', '2021-07-12 19:33:05'),
(3, 'computer', '2021-07-12 19:33:11', '2021-07-12 19:33:11'),
(4, 'Arts', '2021-07-12 20:20:09', '2021-07-12 20:20:09'),
(6, 'sports', '2021-07-12 22:34:14', '2021-07-12 22:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2021_07_11_075520_add_role_to_users_table', 1),
(19, '2021_07_11_134141_add_vote_to_users_table', 1),
(20, '2021_07_12_150240_create_departments_table', 1),
(25, '2021_07_12_150316_create_positions_table', 2),
(26, '2021_07_12_150354_create_nominees_table', 2);

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
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`, `department_id`) VALUES
(1, 'president', '2021-07-13 17:10:19', '2021-07-13 17:10:19', 1),
(2, 'chancellor', '2021-07-13 17:10:29', '2021-07-13 17:10:29', 1),
(3, 'Jury', '2021-07-13 17:10:40', '2021-07-13 17:10:40', 3),
(4, 'Vice president', '2021-07-13 17:10:54', '2021-07-13 17:10:54', 4),
(5, 'mentor', '2021-07-13 17:10:59', '2021-07-13 17:10:59', 6),
(6, 'chancellor', '2021-07-13 17:11:08', '2021-07-13 17:11:08', 3);

-- --------------------------------------------------------

--
-- Table structure for table `position_user`
--

CREATE TABLE `position_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `position_id` bigint(20) UNSIGNED NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `votes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position_user`
--

INSERT INTO `position_user` (`id`, `user_id`, `position_id`, `Status`, `votes`, `created_at`, `updated_at`) VALUES
(5, 4, 4, 0, 0, '2021-07-13 17:54:11', '2021-07-13 17:54:11'),
(7, 5, 4, 0, 0, '2021-07-13 18:53:03', '2021-07-13 18:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vote` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `vote`) VALUES
(1, 'Ahmad Fraz', 'ahmadfraz2k16@gmail.com', NULL, '$2y$10$FmkcWuBMwAAu6Z48rSZdZeU7taAzNROK0wH8iR4EJePHE5ooOVKCq', NULL, '2021-07-12 19:32:19', '2021-07-12 19:32:19', 'admin', 0),
(3, 'testing', 'testing@gmail.com', NULL, '$2y$10$sNnJOaAtaj7aNxsMvghAIuCsgKjHbYlbcj28IMWN1xgQHhxFK/wTK', NULL, '2021-07-13 12:26:44', '2021-07-13 20:32:01', 'voter', 0),
(4, 'testing2', 'testing2@gmail.com', NULL, '$2y$10$jeQ0RhWhTgK6DJ9GthrxrOEg.EUedBkhhP7sLavw04Mp6CwYnSo26', NULL, '2021-07-13 12:30:17', '2021-07-13 17:54:11', 'candidate', 0),
(5, 'testing3', 'testing3@gmail.com', NULL, '$2y$10$AL8vxlOVGkKeT9Sn99IHbuCQMgPw/yWGrfEa8rEv4hvuCoqWmbMC2', NULL, '2021-07-13 18:52:27', '2021-07-13 18:53:03', 'candidate', 0),
(6, 'testing4', 'testing4@gmail.com', NULL, '$2y$10$pOBNbvQh5LyFJQkJUnMS4eQxMvA30krZvm5.TPJDAGwo/SxHhklOG', NULL, '2021-07-13 19:27:11', '2021-07-13 19:27:11', 'voter', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positions_department_id_foreign` (`department_id`);

--
-- Indexes for table `position_user`
--
ALTER TABLE `position_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_user_user_id_foreign` (`user_id`),
  ADD KEY `position_user_position_id_foreign` (`position_id`);

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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `position_user`
--
ALTER TABLE `position_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `position_user`
--
ALTER TABLE `position_user`
  ADD CONSTRAINT `position_user_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `position_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
