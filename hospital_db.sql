-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 02:16 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_num` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_uptade_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `phone`, `mobile`, `code`, `address`, `national_num`, `created_at`, `updated_at`, `deleted_at`, `last_uptade_by`) VALUES
(1, 'محمد خير بك', '1234567', '0933333333', '80', 'دمشق - شارع الثورة', '05012345678', '2019-10-27 14:06:29', '2019-10-27 14:28:25', '2019-10-27 14:28:25', 1),
(2, 'محمد خير بك', '1234567', '0933333333', '80', 'دمشق - شارع الثورة', '05012345678', '2019-10-27 14:28:37', '2019-10-27 14:28:42', '2019-10-27 14:28:42', 1),
(3, 'محمد خير بك', '1234567', '0933333333', '80', 'دمشق - شارع الثورة', '05012345678', '2019-10-27 14:28:57', '2019-10-27 14:28:57', NULL, 1),
(4, 'محمد الزكور', 'يبي', '6226262', '2121', 'البيمي', '01252225555', '2019-10-28 15:19:38', '2019-10-28 15:19:38', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_user` bigint(20) UNSIGNED NOT NULL,
  `to_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message_user`
--

CREATE TABLE `message_user` (
  `message_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_25_091753_create_surgeries_table', 1),
(5, '2019_10_25_095227_create_contacts_table', 1),
(6, '2019_10_25_104242_create_messages_table', 1),
(7, '2019_10_25_112316_create_message_user_table', 1),
(8, '2019_10_25_143152_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\User', 1),
(5, 'App\\User', 3),
(6, 'App\\User', 4);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(9, 'show surgery', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(10, 'edit surgery', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(11, 'delete surgery', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(12, 'list surgeries', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(13, 'show contact', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(14, 'edit contact', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(15, 'delete contact', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(16, 'list contacts', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(17, 'add surgery', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(18, 'add contact', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(19, 'show message', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(20, 'edit message', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(21, 'delete message', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(22, 'list messages', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(23, 'add message', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(24, 'manage user', 'web', '2019-11-06 22:00:00', '2019-11-06 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'Super Admin', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(5, 'Surgery Emp', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36'),
(6, 'Reception Emp', 'web', '2019-10-25 13:07:36', '2019-10-25 13:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(9, 4),
(10, 4),
(10, 5),
(11, 4),
(11, 5),
(12, 4),
(12, 5),
(12, 6),
(13, 4),
(13, 5),
(13, 6),
(14, 4),
(14, 5),
(14, 6),
(15, 4),
(15, 5),
(15, 6),
(16, 4),
(16, 5),
(16, 6),
(17, 4),
(17, 5),
(18, 4),
(18, 5),
(18, 6),
(19, 4),
(19, 5),
(19, 6),
(20, 4),
(21, 4),
(22, 4),
(22, 5),
(22, 6),
(23, 4),
(24, 4);

-- --------------------------------------------------------

--
-- Table structure for table `surgeries`
--

CREATE TABLE `surgeries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `specialization` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('waiting','in_progress','finished','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hall` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surgeries`
--

INSERT INTO `surgeries` (`id`, `name`, `date_time`, `specialization`, `doctor_name`, `status`, `hall`, `patient_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'قلب مفتوح', '2019-10-25 15:30:00', 'قلبية', 'زاهر غنم', 'waiting', 'عمليات 2', 'حسن الحكيم', '2019-10-25 19:48:04', '2019-10-26 11:47:56', '2019-10-26 11:47:56'),
(2, 'قلب مفتوح', '2019-10-30 11:30:00', 'قلبية', 'زاهر غنم', 'finished', 'عمليات 2', 'حسن الحكيم', '2019-10-26 10:55:11', '2019-10-26 11:33:59', '2019-10-26 11:33:59'),
(3, 'قلب مفتوح', '2019-10-30 23:30:00', 'قلبية', 'زاهر غنم', 'finished', 'عمليات 2', 'حسن الحكيم', '2019-10-26 10:55:36', '2019-10-26 11:30:12', '2019-10-26 11:30:12'),
(4, 'قلب مفتوح', '2019-11-01 09:30:00', 'قلبية', 'زاهر غنم', 'in_progress', 'عمليات 2', 'حسن الحكيم', '2019-10-26 11:10:08', '2019-10-26 11:30:10', '2019-10-26 11:30:10'),
(5, 'قلب مفتوح', '2019-10-30 11:30:00', 'قلبية', 'زاهر غنم', 'finished', 'عمليات 2', 'حسن الحكيم', '2019-10-26 11:48:27', '2019-10-26 11:59:39', '2019-10-26 11:59:39'),
(6, 'قلب مفتوح', '2019-10-26 15:25:00', 'قلبية', 'زاهر غنم', 'waiting', 'عمليات 2', 'حسن الحكيم', '2019-10-26 12:00:15', '2019-10-26 13:06:29', '2019-10-26 13:06:29'),
(7, 'قلب مفتوح', '2019-10-29 13:25:00', 'قلبية', 'زاهر غنم', 'finished', 'عمليات 2', 'حسن الحكيم', '2019-10-26 13:25:07', '2019-10-26 13:25:07', NULL),
(8, 'الزائدة الدودية', '2019-11-05 09:30:00', 'داخلية', 'عامر الحلبي', 'waiting', 'عمليات 1', 'أحمد الأحمد', '2019-10-26 13:33:59', '2019-10-26 13:35:25', '2019-10-26 13:35:25'),
(9, 'الزائدة الدودية', '2019-11-05 09:30:00', 'داخلية', 'عامر الحلبي', 'waiting', 'عمليات 1', 'أحمد الأحمد', '2019-10-26 13:36:03', '2019-10-26 13:36:13', NULL),
(10, 'فتق اربي', '2019-10-29 17:17:00', 'عصبية', 'هاني المنياوي', 'in_progress', 'الاولى', 'محمد المحمد', '2019-10-28 15:17:53', '2019-10-28 15:17:53', NULL),
(11, 'قلب مفتوح', '2019-10-30 11:30:00', 'قلبية', 'هاني المنياوي', 'canceled', 'عمليات 2', 'خالد محمود', '2019-10-30 06:40:48', '2019-10-30 06:40:48', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'مدير النظام', 'super-admin@hospital.com', '2019-10-24 22:00:00', '$2y$12$gG2LnwrPcERosRJ0DkEib.bmHeZvX4tg6p9TzsaUBrQBrWFQuO1da', 'cLUFBjnJk5qyC4H57ALdIfuUcQDqPXgDyOJgGWFT0ucW6ekdnDwbByOcrGAG', '2019-10-24 22:00:00', '2019-11-06 23:53:10', NULL),
(3, 'حمزة غنم', 'h.ghanam@abbasien.com', NULL, '$2y$10$/h32iLpSeYPjYg83d6knt.Uq2izvsei1E8BHcIzHphOk5R/EWiX1e', NULL, '2019-11-06 23:22:37', '2019-11-06 23:22:37', NULL),
(4, 'موظف استقبال', 'ha.ghanam@abbasien.com', NULL, '$2y$10$OLDZVhk2XW7I8cW9klxBtuOk2GACDjTvvBeVNVMBewDWF4F10v4ma', NULL, '2019-11-06 23:25:08', '2019-11-06 23:25:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_user`
--
ALTER TABLE `message_user`
  ADD KEY `message_user_message_id_foreign` (`message_id`),
  ADD KEY `message_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `surgeries`
--
ALTER TABLE `surgeries`
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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `surgeries`
--
ALTER TABLE `surgeries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message_user`
--
ALTER TABLE `message_user`
  ADD CONSTRAINT `message_user_message_id_foreign` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
