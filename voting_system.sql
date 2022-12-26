-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 26 déc. 2022 à 17:45
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `voting_system`
--

-- --------------------------------------------------------

--
-- Structure de la table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Medical', '2021-07-12 19:33:05', '2021-07-12 19:33:05'),
(3, 'computer', '2021-07-12 19:33:11', '2021-07-12 19:33:11'),
(4, 'Arts', '2021-07-12 20:20:09', '2021-07-12 20:20:09'),
(6, 'sports', '2021-07-12 22:34:14', '2021-07-12 22:34:14');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2021_07_11_075520_add_role_to_users_table', 1),
(19, '2021_07_11_134141_add_vote_to_users_table', 1),
(20, '2021_07_12_150240_create_departments_table', 1),
(25, '2021_07_12_150316_create_positions_table', 2),
(26, '2021_07_12_150354_create_nominees_table', 2),
(28, '2022_12_21_141917_create_polls_table', 3),
(29, '2022_12_21_142549_create_poll_answers_table', 3),
(30, '2022_12_23_110854_create_voted_user_polls_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `polls`
--

CREATE TABLE `polls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `polls`
--

INSERT INTO `polls` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'What\'s your favorite programming language?', '', NULL, NULL),
(2, 'National Configuration Coordinator', 'asdas', '2022-12-21 15:39:24', '2022-12-21 15:39:24'),
(3, 'National Configuration Coordinator', 'asdas', '2022-12-21 15:40:26', '2022-12-21 15:40:26'),
(4, 'National Configuration Coordinator', 'asdas', '2022-12-21 15:41:55', '2022-12-21 15:41:55'),
(5, 'National Configuration Coordinator', 'asdas', '2022-12-21 15:45:22', '2022-12-21 15:45:22'),
(8, 'National Configuration Coordinatorsa', 'asdasd', '2022-12-21 15:47:20', '2022-12-21 15:47:20'),
(9, 'National Configuration Coordinator', 'asdas', '2022-12-21 15:49:59', '2022-12-21 15:49:59'),
(10, 'What favorite color?', 'Pleas choose only one color.', '2022-12-23 10:47:15', '2022-12-23 10:47:15'),
(11, 'What are your hobbies', 'Please choose one', '2022-12-26 12:51:18', '2022-12-26 12:51:18');

-- --------------------------------------------------------

--
-- Structure de la table `poll_answers`
--

CREATE TABLE `poll_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poll_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `votes` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `poll_answers`
--

INSERT INTO `poll_answers` (`id`, `poll_id`, `title`, `votes`, `created_at`, `updated_at`) VALUES
(1, 1, 'PHP', 4, NULL, '2022-12-23 09:16:11'),
(2, 1, 'Python', 3, NULL, '2022-12-23 09:02:36'),
(3, 1, 'C#', 3, NULL, '2022-12-23 09:02:23'),
(4, 1, 'Java', 6, NULL, '2022-12-26 14:43:31'),
(5, 4, 'swimming', 0, '2022-12-21 15:41:55', '2022-12-21 15:41:55'),
(6, 5, 'playing', NULL, '2022-12-21 15:45:22', '2022-12-21 15:45:22'),
(7, 5, 'sleeping', 2, '2022-12-21 15:45:22', '2022-12-26 09:40:05'),
(8, 5, 'working', 2, '2022-12-21 15:45:22', '2022-12-22 13:37:47'),
(18, 9, 'saad', 6, '2022-12-21 15:49:59', '2022-12-26 08:54:34'),
(19, 9, 'ahmed', 10, '2022-12-21 15:49:59', '2022-12-26 08:42:26'),
(20, 9, 'rabii', 10, '2022-12-21 15:49:59', '2022-12-26 08:54:52'),
(21, 10, 'Red', 8, '2022-12-23 10:47:15', '2022-12-26 09:10:23'),
(22, 10, 'Green', 8, '2022-12-23 10:47:15', '2022-12-26 09:19:43'),
(23, 10, 'Pink', 2, '2022-12-23 10:47:15', '2022-12-26 09:11:56'),
(24, 10, 'Yellow', 2, '2022-12-23 10:47:15', '2022-12-26 09:12:18'),
(25, 11, 'Swimming ', 2, '2022-12-26 12:51:18', '2022-12-26 15:34:58'),
(26, 11, 'Reading ', 1, '2022-12-26 12:51:18', '2022-12-26 13:09:28'),
(27, 11, 'Hiking ', NULL, '2022-12-26 12:51:18', '2022-12-26 12:51:18'),
(28, 11, 'Playing', NULL, '2022-12-26 12:51:18', '2022-12-26 12:51:18');

-- --------------------------------------------------------

--
-- Structure de la table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `positions`
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
-- Structure de la table `position_user`
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
-- Déchargement des données de la table `position_user`
--

INSERT INTO `position_user` (`id`, `user_id`, `position_id`, `Status`, `votes`, `created_at`, `updated_at`) VALUES
(5, 4, 4, 0, 0, '2021-07-13 17:54:11', '2021-07-13 17:54:11'),
(7, 5, 4, 0, 0, '2021-07-13 18:53:03', '2021-07-13 18:53:03'),
(8, 7, 1, 0, 0, '2022-12-21 10:03:15', '2022-12-21 10:03:15');

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `vote`) VALUES
(1, 'Ahmad Fraz', 'ahmadfraz2k16@gmail.com', NULL, '$2y$10$FmkcWuBMwAAu6Z48rSZdZeU7taAzNROK0wH8iR4EJePHE5ooOVKCq', NULL, '2021-07-12 19:32:19', '2021-07-12 19:32:19', 'admin', 0),
(3, 'testing', 'testing@gmail.com', NULL, '$2y$10$sNnJOaAtaj7aNxsMvghAIuCsgKjHbYlbcj28IMWN1xgQHhxFK/wTK', NULL, '2021-07-13 12:26:44', '2021-07-13 20:32:01', 'voter', 0),
(4, 'testing2', 'testing2@gmail.com', NULL, '$2y$10$jeQ0RhWhTgK6DJ9GthrxrOEg.EUedBkhhP7sLavw04Mp6CwYnSo26', NULL, '2021-07-13 12:30:17', '2021-07-13 17:54:11', 'candidate', 0),
(5, 'testing3', 'testing3@gmail.com', NULL, '$2y$10$AL8vxlOVGkKeT9Sn99IHbuCQMgPw/yWGrfEa8rEv4hvuCoqWmbMC2', NULL, '2021-07-13 18:52:27', '2021-07-13 18:53:03', 'candidate', 0),
(6, 'testing4', 'testing4@gmail.com', NULL, '$2y$10$pOBNbvQh5LyFJQkJUnMS4eQxMvA30krZvm5.TPJDAGwo/SxHhklOG', NULL, '2021-07-13 19:27:11', '2021-07-13 19:27:11', 'voter', 0),
(7, 'saad', 'elghanemysaad@gmail.com', NULL, '$2y$10$An8YP5RKh1S5AeiRzISix.EokhljwdRC9lbbwuwLa6hwPdM4umVYO', NULL, '2022-12-21 10:02:54', '2022-12-21 10:03:15', 'candidate', 0);

-- --------------------------------------------------------

--
-- Structure de la table `voted_user_polls`
--

CREATE TABLE `voted_user_polls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poll_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `poll_answer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `voted_user_polls`
--

INSERT INTO `voted_user_polls` (`id`, `poll_id`, `user_id`, `poll_answer_id`, `created_at`, `updated_at`) VALUES
(1, 9, 7, NULL, '2022-12-01 09:02:09', NULL),
(13, 10, 7, 22, '2022-12-26 09:19:43', '2022-12-26 09:19:43'),
(14, 5, 7, 7, '2022-12-26 09:40:05', '2022-12-26 09:40:05'),
(17, 15, 7, 29, '2022-12-26 13:59:18', '2022-12-26 13:59:18'),
(18, 1, 7, 4, '2022-12-26 14:43:31', '2022-12-26 14:43:31'),
(19, 11, 7, 25, '2022-12-26 15:01:04', '2022-12-26 15:01:04'),
(20, 11, 7, 25, '2022-12-26 15:34:58', '2022-12-26 15:34:58');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `poll_answers`
--
ALTER TABLE `poll_answers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positions_department_id_foreign` (`department_id`);

--
-- Index pour la table `position_user`
--
ALTER TABLE `position_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_user_user_id_foreign` (`user_id`),
  ADD KEY `position_user_position_id_foreign` (`position_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `voted_user_polls`
--
ALTER TABLE `voted_user_polls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `poll_answers`
--
ALTER TABLE `poll_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `position_user`
--
ALTER TABLE `position_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `voted_user_polls`
--
ALTER TABLE `voted_user_polls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `position_user`
--
ALTER TABLE `position_user`
  ADD CONSTRAINT `position_user_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`),
  ADD CONSTRAINT `position_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
