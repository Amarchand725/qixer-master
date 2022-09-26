-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 04:34 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quixer`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountdeactives`
--

CREATE TABLE `accountdeactives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `account_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'editor',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_verified`, `role`, `image`, `password`, `remember_token`, `created_at`, `updated_at`, `description`, `designation`) VALUES
(25, 'admin', 'super_admin', 'dhruvk2050@gmail.com', 1, '1', NULL, '$2y$10$TrSMTkdqZ4CkZe8zLOz/AuMG5CYt3vVpO4dHwUN.ecPMsAorlD416', 'tiOITkjKRZzXF3sYiU774Mmi0EyDQsnVT3YyOF68sjPPkHCdR8bRaA5xGXpJ', '2022-07-22 07:40:52', '2022-07-22 07:40:52', NULL, NULL),
(26, 'anshul', 'anshul', 'anshulswarup@yahoo.com', 0, 'editor', NULL, '$2y$10$YbpMcp9Dwf5sk02BTDnXY.1LRdeE2/3dZ3yD5MFJbNq55gq9frl9y', 'c0ppbwM66KpBRuHj5ZW1RjxpEi58tqGFY39nuJ6Rj5YyEVXWl3PHOElsUxAI', '2022-07-25 20:48:34', '2022-07-25 20:48:34', 'super admin', 'super admin'),
(27, 'anas', 'anas', 'anas@gmail.com', 0, 'editor', NULL, '$2y$10$jbZZ8.l/f8Mc.jZmp0HE2ey/tvSgGe0HklY.pJ6MP.mL6IU591Cnu', '0rkOGrO3i52GzpyInGjPd44OHnmMglY3DFDCXtavojIZZbZdcn9tns5kPTyi', '2022-07-26 20:47:00', '2022-07-26 20:47:00', NULL, NULL),
(28, 'Sasha', 'sasharocks', 'ecomshuttle@gmail.com', 0, '4', NULL, '$2y$10$hbpzeEOVVREhXmymjBAfQeQmMX5S709wU/e5hvw9N7xJfevp7co/G', NULL, '2022-08-10 14:02:13', '2022-08-11 01:29:50', NULL, 'senior project manager'),
(29, 'choc', 'choc proj mang', 'test123@gmail.com', 0, '4', NULL, '$2y$10$1GKggNQ.fnsjYHrmLFiX1euxEJvjGSvwCC1Y4Mpb0zyGDY/nEFpSu', NULL, '2022-08-16 13:31:19', '2022-08-16 14:35:48', NULL, 'junior proj manager'),
(30, 'test admin', 'test_admin', 'testadmin@gmail.com', 0, '4', NULL, '$2y$10$g44U2Ma5loH9Rwr5xSr63eOswOOpVdnawnktwHeU9bSIh6P5ACKl6', NULL, '2022-08-16 14:37:13', '2022-08-16 14:37:13', NULL, 'test designation'),
(31, 'projcmangrr', 'proj21', 'prj21@gmail.com', 0, '4', NULL, '$2y$10$pmPiZFrMciVnbh9K4MUr8ueb1On38m9zlnyILtBB35ogtfFUXWpvG', NULL, '2022-08-17 11:28:06', '2022-08-17 11:28:06', NULL, '21proj manag'),
(32, 'james', 'james', 'james@gmail.com', 0, '4', NULL, '$2y$10$ySRPatjP7Lgjx.FvkzNEze.fUbptJdSCAH/y9xwo1gcDLiBuaDK2e', 'OUAjt5HlHOmfoP3QUo0gKuFBTNO4b8jqpp4BepmxxkBQZmVEs0qPhCVVRijv', '2022-08-17 12:30:12', '2022-08-17 12:37:49', 'he is a project manger in us region', 'project manager us');

-- --------------------------------------------------------

--
-- Table structure for table `admin_commissions`
--

CREATE TABLE `admin_commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commission_charge_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_charge_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission_charge` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_commissions`
--

INSERT INTO `admin_commissions` (`id`, `commission_charge_from`, `commission_charge_type`, `commission_charge`, `created_at`, `updated_at`) VALUES
(1, NULL, 'percentage', 10, '2022-01-26 22:26:28', '2022-01-27 01:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `amount_settings`
--

CREATE TABLE `amount_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `min_amount` double DEFAULT NULL,
  `max_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amount_settings`
--

INSERT INTO `amount_settings` (`id`, `min_amount`, `max_amount`, `created_at`, `updated_at`) VALUES
(1, 50, 250, '2022-02-07 07:54:03', '2022-02-07 07:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `user_id`, `admin_id`, `created_by`, `title`, `slug`, `blog_content`, `image`, `author`, `excerpt`, `views`, `visibility`, `featured`, `schedule_date`, `created_at`, `updated_at`, `deleted_at`, `status`, `tag_name`) VALUES
(2, '1', NULL, 22, 'admin', 'AC Repair Service By Expert AC Repair Machenic', 'ac-repair-service-by-expert-ac-repair-machenic', '<div style=\"text-align: justify;\"><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.&nbsp;</span></font></p></div>', '103', 's-admin@gmail.com', '80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending.', '0', 'public', NULL, NULL, '2022-01-08 03:18:18', '2022-02-13 02:50:53', NULL, 'publish', '[\"Electronics\"]'),
(3, '5', NULL, 22, 'admin', 'Get Beard Shaving Service At Low Price', 'get-beard-shaving-service-at-low-price', '<p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.&nbsp;</span></font></p>', '104', 's-admin@gmail.com', '80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending.', '0', 'public', NULL, NULL, '2022-01-08 03:22:45', '2022-02-13 02:50:31', NULL, 'publish', '[\"Salon & Spa\",\"Body Message\"]'),
(4, '4', NULL, 22, 'admin', 'Painting & Renovation Service From Us At Affordable Price', 'painting-&-renovation-service-from-us-at-affordable-price', '<div style=\"text-align: justify;\"><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.&nbsp;</span></font></p></div>', '105', 's-admin@gmail.com', '80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending.', '0', 'public', 'on', NULL, '2022-01-08 05:23:52', '2022-02-13 02:49:52', NULL, 'publish', '[\"Painting\"]'),
(5, '2', NULL, 22, 'admin', 'Cleaning & Renovation Service By Our Expert Cleaner', 'cleaning-&-renovation-service-by-our-expert-cleaner', '<div style=\"text-align: justify;\"><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.&nbsp;</span></font></p></div>', '107', 's-admin@gmail.com', '80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending.', '0', 'public', NULL, NULL, '2022-01-08 05:23:57', '2022-02-13 02:49:21', NULL, 'publish', '[\"Cleaning\"]'),
(6, '1', NULL, 22, 'admin', 'AC Cleaning Service ! Get ASAP And Take The Best Benifits', 'ac-cleaning-service-!-get-asap-and-take-the-best-benifits', '<div style=\"text-align: justify;\"><div style=\"text-align: left;\"><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.&nbsp;</span></font></p></div></div>', '108', 's-admin@gmail.com', '80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending.', '0', 'public', NULL, NULL, '2022-01-08 05:24:04', '2022-02-13 02:48:58', NULL, 'publish', '[\"Electronics\"]'),
(7, '3', NULL, 22, 'admin', 'Moving Service From One Place to Another', 'moving-service-from-one-place-to-another', '<div style=\"text-align: justify;\"><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.&nbsp;</span></font></p></div>', '106', 's-admin@gmail.com', '80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending.', '0', 'public', NULL, NULL, '2022-01-08 05:24:08', '2022-02-13 02:47:43', NULL, 'publish', '[\"Home Move\"]'),
(8, '4', NULL, 22, 'admin', 'Our Cool Painting Service Only For You', 'our-cool-painting-service-only-for-you', '<div style=\"text-align: justify;\"><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.&nbsp;</span></font></p></div>', '109', 's-admin@gmail.com', '80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending.', '0', 'public', 'on', NULL, '2022-01-08 05:24:12', '2022-02-13 02:46:58', NULL, 'publish', '[\"Painting\"]'),
(9, '5', NULL, 22, 'admin', 'Now Get Massage Service From Mr Mahmud', 'now-get-massage-service-from-mr-mahmud', '<div style=\"text-align: justify;\"><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.&nbsp;</span></font></p></div>', '110', 's-admin@gmail.com', '80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending.', '0', 'public', 'on', NULL, '2022-01-08 05:24:17', '2022-02-13 02:46:32', NULL, 'publish', '[\"Salon & Spa\"]'),
(10, '5', NULL, 22, 'admin', 'Hair Cutting Service At Reasonable Price', 'hair-cutting-service-at-reasonable-price', '<div style=\"text-align: justify;\"><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.&nbsp;</span></font></p></div>', '111', 's-admin@gmail.com', '80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending.', '0', 'public', NULL, NULL, '2022-01-08 05:24:24', '2022-02-13 02:46:00', NULL, 'publish', '[\"Hair Cutting\"]'),
(11, '2', NULL, 22, 'admin', 'Car Cleaning Service From Best Cleaner', 'car-cleaning-service-from-best-cleaner', '<div style=\"text-align: justify;\"><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.&nbsp;</span></font></p></div>', '112', 's-admin@gmail.com', '80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending.', '0', 'public', NULL, NULL, '2022-01-08 05:24:28', '2022-02-13 02:45:28', NULL, 'publish', '[\"Car Cleaning\",\"Cleaning\"]'),
(12, '2', NULL, 22, 'admin', 'Get Furniture Cleaning Service At Reasonable Price', 'get-furniture-cleaning-service-at-reasonable-price', '<div style=\"text-align: justify;\"><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p style=\"text-align: left;\"><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.&nbsp;</span></font></p></div>', '113', 's-admin@gmail.com', '80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending.', '0', 'public', NULL, NULL, '2022-01-08 05:44:56', '2022-02-13 02:44:10', NULL, 'publish', '[\"Cleaning\"]'),
(13, '1', NULL, 22, 'admin', 'Get Our Electrice Service For Home and Office', 'get-our-electrice-service-for-home-and-office', '<p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Barnaby The Bear’s my name, never call me Jack or James, I will sing my way to fame, Barnaby the Bear’s my name. Birds taught me to sing, when they took me to their king, first I had to fly, in the sky so high so high, so high so high so high, so — if you want to sing this way, think of what you’d like to say, add a tune and you will see, just how easy it can be. Treacle pudding, fish and chips, fizzy drinks and liquorice, flowers, rivers, sand and sea, snowflakes and the stars are free.</span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">Hey there where ya goin’, not exactly knowin’, who says you have to call just one place home. He’s goin’ everywhere, B.J. McKay and his best friend Bear. He just keeps on movin’, ladies keep improvin’, every day is better than the last. New dreams and better scenes, and best of all I don’t pay property tax. Rollin’ down to Dallas, who’s providin’ my palace, off to New Orleans or who knows where. Places new and ladies, too, I’m B.J. McKay and this is my best friend Bear.</span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending. Time — we’ll fight against the time, and we’ll fly on the white wings of the wind. 80 days around the world, no we won’t say a word before the ship is really back. Round, round, all around the world. Round, all around the world. Round, all around the world. Round, all around the world.</span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\"><br></span></font></p><p><font color=\"#666666\" face=\"Roboto, sans-serif\"><span style=\"font-size: 16px;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.&nbsp;</span></font></p>', '114', 's-admin@gmail.com', '80 days around the world, we’ll find a pot of gold just sitting where the rainbow’s ending.', '0', 'public', NULL, NULL, '2022-01-08 23:09:53', '2022-02-13 02:45:01', NULL, 'publish', '[\"Switch Repair\",\"Board Repair\"]');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `url`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Test1', 'Test1', '24', '2022-01-07 22:17:46', '2022-01-07 22:18:26'),
(4, 'Test2', 'Test2', '25', '2022-01-07 22:18:09', '2022-01-07 22:18:09'),
(5, 'Test3', 'Test3', '26', '2022-01-07 22:19:08', '2022-01-07 22:19:08'),
(6, 'Test4', 'Test4', '27', '2022-01-07 22:19:37', '2022-01-07 22:19:37'),
(7, 'Test5', '#', '25', '2022-01-07 22:20:38', '2022-01-07 22:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `mobile_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `image`, `status`, `mobile_icon`, `created_at`, `updated_at`) VALUES
(1, 'Mobile Apps', 'mobile-apps', 'las la-mobile', '229', 1, '214', '2021-11-29 00:31:11', '2022-08-10 21:53:02'),
(7, 'Block Chain', 'block-chain', 'las la-link', '177', 1, '218', '2022-04-24 00:05:59', '2022-08-05 18:40:37'),
(8, 'Gaming', 'gaming', 'las la-gamepad', '216', 1, NULL, '2022-07-28 20:31:45', '2022-08-05 18:39:25'),
(9, 'Web Apps', 'web-apps', 'las la-laptop-code', '230', 1, NULL, '2022-08-05 18:45:24', '2022-08-16 13:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_details_id` bigint(20) NOT NULL,
  `sender_id` bigint(20) NOT NULL,
  `reciever_id` bigint(20) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `session_id`, `project_details_id`, `sender_id`, `reciever_id`, `is_read`, `created_at`, `updated_at`) VALUES
(1, '632093d19f852', 1, 404, 31, 0, '2022-09-13 09:29:37', '2022-09-13 09:29:37'),
(2, '632093d19f852', 1, 404, 396, 1, '2022-09-13 09:29:37', '2022-09-15 00:41:42'),
(3, '632093dd234bc', 1, 31, 404, 1, '2022-09-13 09:29:49', '2022-09-14 01:09:40'),
(4, '632093dd234bc', 1, 31, 396, 1, '2022-09-13 09:29:49', '2022-09-15 00:41:42'),
(5, '63209456237df', 1, 396, 31, 0, '2022-09-13 09:31:50', '2022-09-13 09:31:50'),
(6, '63209456237df', 1, 396, 404, 1, '2022-09-13 09:31:50', '2022-09-14 01:09:40'),
(7, '63216caa223cf', 1, 404, 31, 0, '2022-09-14 00:54:50', '2022-09-14 00:54:50'),
(8, '63216caa223cf', 1, 404, 396, 1, '2022-09-14 00:54:50', '2022-09-15 00:41:42'),
(9, '63216d7477efc', 1, 404, 31, 0, '2022-09-14 00:58:12', '2022-09-14 00:58:12'),
(10, '63216d7477efc', 1, 404, 396, 1, '2022-09-14 00:58:12', '2022-09-15 00:41:42'),
(11, '6322bb3009455', 1, 396, 31, 0, '2022-09-15 00:42:08', '2022-09-15 00:42:08'),
(12, '6322bb3009455', 1, 396, 404, 1, '2022-09-15 00:42:08', '2022-09-15 09:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 1, '2021-12-06 23:56:27', '2021-12-06 23:56:27'),
(2, 'United States (USA)', 1, '2021-12-06 23:56:42', '2021-12-06 23:56:42'),
(3, 'United Kingdom (UK)', 1, '2021-12-06 23:56:53', '2021-12-06 23:56:53'),
(4, 'Japan', 1, '2021-12-06 23:57:01', '2021-12-06 23:57:01'),
(5, 'Australia', 1, '2021-12-06 23:57:08', '2021-12-06 23:57:08'),
(6, 'India', 1, '2022-02-16 10:10:41', '2022-02-16 10:10:41'),
(7, 'Brazil', 1, '2022-02-16 10:10:53', '2022-02-16 10:10:53'),
(8, 'Canada', 1, '2022-02-16 10:11:01', '2022-02-16 10:11:01'),
(9, 'Pakistan', 1, '2022-02-16 10:11:25', '2022-02-16 10:11:25'),
(10, 'Turkey', 1, '2022-02-27 02:02:58', '2022-02-27 02:02:58'),
(11, 'Germany', 1, '2022-02-27 02:03:07', '2022-02-27 02:03:07'),
(12, 'France', 1, '2022-02-27 02:03:11', '2022-02-27 02:03:11'),
(13, 'Italy', 1, '2022-02-27 02:03:20', '2022-02-27 02:03:20'),
(14, 'Kenya', 1, '2022-02-27 02:03:26', '2022-04-21 01:19:01'),
(15, 'United Arab Emirates(UAE)', 1, '2022-02-27 02:04:07', '2022-02-27 02:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `total_day` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`id`, `day`, `status`, `seller_id`, `total_day`, `created_at`, `updated_at`) VALUES
(1, 'Sat', 0, 1, 7, '2021-12-14 01:27:15', '2022-02-16 12:32:13'),
(7, 'Sun', 0, 1, 7, '2021-12-14 03:52:30', '2022-02-16 12:32:13'),
(8, 'Mon', 0, 1, 7, '2021-12-14 05:28:28', '2022-02-16 12:32:13'),
(9, 'Tue', 0, 1, 7, '2021-12-14 05:28:37', '2022-02-16 12:32:13'),
(14, 'Fri', 0, 2, 12, '2022-01-17 08:27:17', '2022-01-17 08:27:17'),
(15, 'Wed', 0, 1, 7, '2022-02-07 00:24:34', '2022-02-16 12:32:13'),
(16, 'Thu', 0, 1, 7, '2022-02-07 00:24:49', '2022-02-16 12:32:13'),
(17, 'Fri', 0, 1, 7, '2022-02-07 00:49:09', '2022-02-16 12:32:13'),
(19, 'Sat', 0, 2, NULL, '2022-02-07 00:58:21', '2022-02-07 00:58:21'),
(20, 'Sun', 0, 2, NULL, '2022-02-07 00:58:32', '2022-02-07 00:58:32'),
(21, 'Mon', 0, 2, NULL, '2022-02-07 00:58:40', '2022-02-07 00:58:40'),
(22, 'Tue', 0, 2, NULL, '2022-02-07 00:58:49', '2022-02-07 00:58:49'),
(23, 'Wed', 0, 2, NULL, '2022-02-07 00:58:59', '2022-02-07 00:58:59'),
(27, 'Sat', 0, 4, 14, '2022-02-07 02:32:46', '2022-02-14 00:32:17'),
(28, 'Mon', 0, 4, 14, '2022-02-09 00:44:06', '2022-02-14 00:32:17'),
(29, 'Fri', 0, 4, 14, '2022-02-09 00:44:16', '2022-02-14 00:32:17'),
(30, 'Sun', 0, 4, 14, '2022-02-09 00:44:36', '2022-02-14 00:32:17'),
(31, 'Tue', 0, 4, 14, '2022-02-09 00:44:48', '2022-02-14 00:32:17'),
(32, 'Wed', 0, 4, 14, '2022-02-09 00:45:03', '2022-02-14 00:32:17');

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
-- Table structure for table `form_builders`
--

CREATE TABLE `form_builders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fields` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `success_message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_builders`
--

INSERT INTO `form_builders` (`id`, `title`, `email`, `button_text`, `fields`, `success_message`, `created_at`, `updated_at`) VALUES
(1, 'Contact Form', 'nazmuldiu8@gmail.com', 'Send Message', '{\"success_message\":\"Thanx for your message\",\"field_type\":[\"text\",\"email\",\"tel\",\"text\",\"textarea\"],\"field_name\":[\"name\",\"email\",\"phone\",\"address\",\"message\"],\"field_placeholder\":[\"Your Name\",\"Your Email\",\"Your Phone\",\"Your Address\",\"Message\"],\"field_required\":[\"on\",\"on\",\"on\",\"on\",\"on\"]}', 'Thanx for your message', '2021-10-07 01:27:02', '2022-02-15 15:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` int(10) UNSIGNED DEFAULT NULL,
  `direction` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `slug`, `default`, `direction`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English (UK)', 'en_GB', 1, 'ltr', 'publish', '2020-01-03 18:58:44', '2022-02-14 23:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `media_uploads`
--

CREATE TABLE `media_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimensions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_uploads`
--

INSERT INTO `media_uploads` (`id`, `title`, `path`, `alt`, `size`, `dimensions`, `created_at`, `updated_at`, `type`, `user_id`) VALUES
(1, 'favicons.png', 'favicons1637750368.png', NULL, '2.28 KB', '40 x 40 pixels', '2021-11-24 04:39:28', '2021-11-24 04:39:28', 'admin', 22),
(2, 'logo-01.png', 'logo-011637754681.png', NULL, '4.19 KB', '214 x 51 pixels', '2021-11-24 05:51:21', '2021-11-24 05:51:21', 'admin', 22),
(3, 'logo-02.png', 'logo-021637754687.png', NULL, '4.49 KB', '214 x 51 pixels', '2021-11-24 05:51:27', '2021-11-24 05:51:27', 'admin', 22),
(4, 'banner-bg.jpg', 'banner-bg1638104986.jpg', NULL, '743.1 KB', '1920 x 931 pixels', '2021-11-28 07:09:46', '2021-11-28 07:09:46', 'admin', 22),
(5, 'banner1.png', 'banner11638279446.png', NULL, '686.35 KB', '641 x 918 pixels', '2021-11-30 07:37:26', '2021-11-30 07:37:26', 'web', 12),
(6, 'banner2.jpg', 'banner21638339592.jpg', NULL, '253.08 KB', '743 x 743 pixels', '2021-12-01 00:19:53', '2021-12-01 00:19:53', 'web', 12),
(7, 'banner-bg.jpg', 'banner-bg1638446467.jpg', NULL, '743.1 KB', '1920 x 931 pixels', '2021-12-02 06:01:08', '2021-12-02 06:01:08', 'web', 12),
(8, 'author7.jpg', 'author71638610733.jpg', NULL, '45.01 KB', '300 x 220 pixels', '2021-12-04 03:38:53', '2021-12-04 03:38:53', 'web', 12),
(9, 'serviece1.jpg', 'serviece11638621079.jpg', NULL, '30.93 KB', '280 x 200 pixels', '2021-12-04 06:31:19', '2021-12-04 06:31:19', 'web', 12),
(10, 'author7.jpg', 'author71638869659.jpg', NULL, '45.01 KB', '300 x 220 pixels', '2021-12-07 03:34:19', '2021-12-07 03:34:19', 'web', 1),
(11, 'extra1.jpg', 'extra11638872378.jpg', NULL, '6.46 KB', '78 x 78 pixels', '2021-12-07 04:19:38', '2021-12-07 04:19:38', 'web', 1),
(12, 'author2.jpg', 'author21638874607.jpg', NULL, '39.99 KB', '350 x 240 pixels', '2021-12-07 04:56:47', '2021-12-07 04:56:47', 'web', 1),
(13, 's2.jpg', 's21638874652.jpg', NULL, '39.99 KB', '350 x 240 pixels', '2021-12-07 04:57:32', '2021-12-07 04:57:32', 'web', 1),
(14, 's3.jpg', 's31638879054.jpg', NULL, '46.44 KB', '350 x 240 pixels', '2021-12-07 06:10:54', '2021-12-07 06:10:54', 'web', 1),
(15, 's5.jpg', 's51638879454.jpg', NULL, '48.7 KB', '342 x 220 pixels', '2021-12-07 06:17:34', '2021-12-07 06:17:34', 'web', 1),
(16, 's6.jpg', 's61638879755.jpg', NULL, '36.3 KB', '342 x 220 pixels', '2021-12-07 06:22:35', '2021-12-07 06:22:35', 'web', 1),
(17, 's9.jpg', 's91638880201.jpg', NULL, '36.71 KB', '300 x 220 pixels', '2021-12-07 06:30:02', '2021-12-07 06:30:02', 'web', 1),
(18, 's12.jpg', 's121638880499.jpg', NULL, '48.05 KB', '300 x 220 pixels', '2021-12-07 06:34:59', '2021-12-07 06:34:59', 'web', 1),
(19, 'author9.jpg', 'author91638938458.jpg', NULL, '36.71 KB', '300 x 220 pixels', '2021-12-07 22:40:58', '2021-12-07 22:40:58', 'web', 1),
(20, 'image.png', 'image1638946497.png', NULL, '635.92 KB', '512 x 512 pixels', '2021-12-08 00:54:57', '2021-12-08 00:54:57', 'web', 2),
(21, 's12.jpg', 's121638946666.jpg', NULL, '48.05 KB', '300 x 220 pixels', '2021-12-08 00:57:46', '2021-12-08 00:57:46', 'web', 2),
(22, 'author11.jpg', 'author111639044291.jpg', NULL, '39.95 KB', '300 x 220 pixels', '2021-12-09 04:04:51', '2021-12-09 04:04:51', 'web', 2),
(23, 'author9.jpg', 'author91639999147.jpg', NULL, '36.71 KB', '300 x 220 pixels', '2021-12-20 05:19:07', '2021-12-20 05:19:07', 'web', 3),
(24, 'cl1.png', 'cl11641478287.png', NULL, '3.75 KB', '192 x 68 pixels', '2022-01-06 08:11:27', '2022-01-06 08:11:27', 'admin', 22),
(25, 'cl2.png', 'cl21641480573.png', NULL, '4.71 KB', '182 x 76 pixels', '2022-01-06 08:49:33', '2022-01-06 08:49:33', 'admin', 22),
(26, 'cl3.png', 'cl31641615538.png', NULL, '4.45 KB', '172 x 62 pixels', '2022-01-07 22:18:59', '2022-01-07 22:18:59', 'admin', 22),
(27, 'cl4.png', 'cl41641615570.png', NULL, '3.37 KB', '105 x 76 pixels', '2022-01-07 22:19:30', '2022-01-07 22:19:30', 'admin', 22),
(28, 'bd1.jpg', 'bd11641631771.jpg', NULL, '415.87 KB', '1110 x 650 pixels', '2022-01-08 02:49:32', '2022-01-08 02:49:32', 'admin', 22),
(29, 'b2.jpg', 'b21641633715.jpg', NULL, '45.03 KB', '382 x 254 pixels', '2022-01-08 03:21:55', '2022-05-05 19:45:19', 'admin', 22),
(30, 'b5.jpg', 'b51641641302.jpg', NULL, '38.87 KB', '382 x 254 pixels', '2022-01-08 05:28:22', '2022-01-08 05:28:22', 'admin', 22),
(31, 'b1.jpg', 'b11641641414.jpg', NULL, '47.13 KB', '350 x 240 pixels', '2022-01-08 05:30:14', '2022-01-08 05:30:14', 'admin', 22),
(32, 'b9.jpg', 'b91641641557.jpg', NULL, '51.68 KB', '382 x 254 pixels', '2022-01-08 05:32:38', '2022-01-08 05:32:38', 'admin', 22),
(33, 'b3.jpg', 'b31641641631.jpg', NULL, '49.45 KB', '382 x 254 pixels', '2022-01-08 05:33:51', '2022-01-08 05:33:51', 'admin', 22),
(34, 'b6.jpg', 'b61641641712.jpg', NULL, '67.29 KB', '350 x 240 pixels', '2022-01-08 05:35:12', '2022-01-08 05:35:12', 'admin', 22),
(35, 'b7.jpg', 'b71641641793.jpg', NULL, '42.47 KB', '350 x 240 pixels', '2022-01-08 05:36:33', '2022-01-08 05:36:33', 'admin', 22),
(36, 'b8.jpg', 'b81641641872.jpg', NULL, '47.73 KB', '350 x 240 pixels', '2022-01-08 05:37:52', '2022-01-08 05:37:52', 'admin', 22),
(37, 'bd2.jpg', 'bd21641642117.jpg', NULL, '126.62 KB', '540 x 341 pixels', '2022-01-08 05:41:57', '2022-01-08 05:41:57', 'admin', 22),
(38, 'b3.jpg', 'b31641642209.jpg', NULL, '49.45 KB', '382 x 254 pixels', '2022-01-08 05:43:29', '2022-01-08 05:43:29', 'admin', 22),
(39, 'b9.jpg', 'b91641642356.jpg', NULL, '51.68 KB', '382 x 254 pixels', '2022-01-08 05:45:56', '2022-01-08 05:45:56', 'admin', 22),
(40, 'seller2.jpg', 'seller21641902661.jpg', NULL, '128.8 KB', '500 x 443 pixels', '2022-01-11 06:04:22', '2022-01-11 06:04:22', 'admin', 22),
(41, 'banner-smile.png', 'banner-smile1641971297.png', NULL, '1.81 KB', '46 x 46 pixels', '2022-01-12 01:08:17', '2022-01-12 01:08:17', 'admin', 22),
(42, 'dot-square.png', 'dot-square1641971791.png', NULL, '4.9 KB', '163 x 163 pixels', '2022-01-12 01:16:31', '2022-01-12 01:16:31', 'admin', 22),
(43, 'c1.png', 'c11641975772.png', NULL, '4.09 KB', '80 x 80 pixels', '2022-01-12 02:22:52', '2022-01-12 02:22:52', 'admin', 22),
(44, 'c3.png', 'c31641976661.png', NULL, '4.35 KB', '80 x 80 pixels', '2022-01-12 02:37:41', '2022-01-12 02:37:41', 'admin', 22),
(45, 'c2.png', 'c21641976661.png', NULL, '5.71 KB', '80 x 80 pixels', '2022-01-12 02:37:41', '2022-01-12 02:37:41', 'admin', 22),
(46, 'c4.png', 'c41641976661.png', NULL, '4.58 KB', '80 x 80 pixels', '2022-01-12 02:37:41', '2022-01-12 02:37:41', 'admin', 22),
(47, 'c5.png', 'c51641976661.png', NULL, '2.08 KB', '80 x 80 pixels', '2022-01-12 02:37:41', '2022-01-12 02:37:41', 'admin', 22),
(48, 'c6.png', 'c61641976662.png', NULL, '3.54 KB', '80 x 80 pixels', '2022-01-12 02:37:42', '2022-01-12 02:37:42', 'admin', 22),
(49, 'm1.png', 'm11641985855.png', NULL, '2.6 KB', '60 x 60 pixels', '2022-01-12 05:10:55', '2022-01-12 05:10:55', 'admin', 22),
(50, 'm2.png', 'm21641985855.png', NULL, '2.27 KB', '60 x 60 pixels', '2022-01-12 05:10:55', '2022-01-12 05:10:55', 'admin', 22),
(51, 'm3.png', 'm31641985855.png', NULL, '2.44 KB', '60 x 60 pixels', '2022-01-12 05:10:55', '2022-01-12 05:10:55', 'admin', 22),
(52, 'm4.png', 'm41641985855.png', NULL, '2.32 KB', '60 x 60 pixels', '2022-01-12 05:10:55', '2022-01-12 05:10:55', 'admin', 22),
(53, 'market-shape.png', 'market-shape1641985855.png', NULL, '39.73 KB', '608 x 608 pixels', '2022-01-12 05:10:55', '2022-01-12 05:10:55', 'admin', 22),
(54, 'circle1.png', 'circle11641994879.png', NULL, '1.35 KB', '70 x 70 pixels', '2022-01-12 07:41:20', '2022-01-12 07:41:20', 'admin', 22),
(55, 'circle2.png', 'circle21641994879.png', NULL, '5.26 KB', '164 x 164 pixels', '2022-01-12 07:41:20', '2022-01-12 07:41:20', 'admin', 22),
(56, 'dot-square.png', 'dot-square1641994880.png', NULL, '3.79 KB', '138 x 138 pixels', '2022-01-12 07:41:20', '2022-01-12 07:41:20', 'admin', 22),
(57, 'line-cross.png', 'line-cross1641994880.png', NULL, '3.94 KB', '222 x 139 pixels', '2022-01-12 07:41:20', '2022-01-12 07:41:20', 'admin', 22),
(58, 'banner1.png', 'banner11642048429.png', NULL, '686.35 KB', '641 x 918 pixels', '2022-01-12 22:33:49', '2022-01-12 22:33:49', 'admin', 22),
(59, 'logo-01.png', 'logo-011642251277.png', NULL, '4.19 KB', '214 x 51 pixels', '2022-01-15 06:54:37', '2022-01-15 06:54:37', 'admin', 22),
(60, 'c2.png', 'c21642306753.png', NULL, '1.76 KB', '50 x 28 pixels', '2022-01-15 22:19:13', '2022-01-15 22:19:13', 'admin', 22),
(61, 'c1.png', 'c11642306753.png', NULL, '1.39 KB', '50 x 28 pixels', '2022-01-15 22:19:13', '2022-01-15 22:19:13', 'admin', 22),
(62, 'c3.png', 'c31642306753.png', NULL, '2.18 KB', '50 x 28 pixels', '2022-01-15 22:19:13', '2022-01-15 22:19:13', 'admin', 22),
(63, 'c4.png', 'c41642306753.png', NULL, '1.61 KB', '50 x 28 pixels', '2022-01-15 22:19:13', '2022-01-15 22:19:13', 'admin', 22),
(64, 'logo-footer.png', 'logo-footer1642310896.png', NULL, '3.55 KB', '173 x 41 pixels', '2022-01-15 23:28:16', '2022-01-15 23:28:16', 'admin', 22),
(65, 'r2vg1z.jpg', 'r2vg1z1642491053.jpg', NULL, '25.52 KB', '720 x 720 pixels', '2022-01-18 01:30:53', '2022-01-18 01:30:53', 'web', 3),
(66, 'paytm.jpeg', 'paytm1642502870.jpeg', NULL, '18.17 KB', '630 x 336 pixels', '2022-01-18 04:47:50', '2022-01-18 04:47:50', 'admin', 22),
(67, 'stripe.png', 'stripe1642503882.png', NULL, '3.28 KB', '318 x 159 pixels', '2022-01-18 05:04:42', '2022-01-18 05:04:42', 'admin', 22),
(68, 'razorpay.png', 'razorpay1642506994.png', NULL, '20.27 KB', '900 x 230 pixels', '2022-01-18 05:56:34', '2022-01-18 05:56:34', 'admin', 22),
(69, 'paystack.png', 'paystack1642507044.png', NULL, '2.86 KB', '301 x 167 pixels', '2022-01-18 05:57:24', '2022-01-18 05:57:24', 'admin', 22),
(70, 'moli.png', 'moli1642507075.png', NULL, '2.11 KB', '301 x 167 pixels', '2022-01-18 05:57:55', '2022-01-18 05:57:55', 'admin', 22),
(71, 'flutterwave-logo.png', 'flutterwave-logo1642507117.png', NULL, '4.51 KB', '900 x 500 pixels', '2022-01-18 05:58:38', '2022-01-18 05:58:38', 'admin', 22),
(72, 'paypal.png', 'paypal1642511774.png', NULL, '3.14 KB', '300 x 168 pixels', '2022-01-18 07:16:14', '2022-01-18 07:16:14', 'admin', 22),
(73, 'OIP.jpg', 'oip1642584590.jpg', NULL, '10.9 KB', '324 x 173 pixels', '2022-01-19 03:29:50', '2022-05-05 11:52:39', 'admin', 22),
(74, 'payfast.png', 'payfast1642666904.png', NULL, '2.72 KB', '314 x 160 pixels', '2022-01-20 02:21:44', '2022-01-20 02:21:44', 'admin', 22),
(75, 'cashfree.png', 'cashfree1642672230.png', NULL, '4.06 KB', '310 x 162 pixels', '2022-01-20 03:50:30', '2022-01-20 03:50:30', 'admin', 22),
(76, 'instramojo.jpeg', 'instramojo1642673705.jpeg', NULL, '23.94 KB', '827 x 437 pixels', '2022-01-20 04:15:05', '2022-01-20 04:15:05', 'admin', 22),
(77, 'mercadopago.png', 'mercadopago1642674662.png', NULL, '17.66 KB', '1280 x 334 pixels', '2022-01-20 04:31:03', '2022-01-20 04:31:03', 'admin', 22),
(78, 'midtrans.jpg', 'midtrans1642678419.jpg', NULL, '13.1 KB', '710 x 380 pixels', '2022-01-20 05:33:39', '2022-01-20 05:33:39', 'admin', 22),
(79, 'sd.jpg', 'sd1643688644.jpg', NULL, '176.72 KB', '730 x 497 pixels', '2022-01-31 22:10:45', '2022-01-31 22:10:45', 'web', 1),
(80, 'sd4.jpg', 'sd41643689294.jpg', NULL, '165.76 KB', '730 x 497 pixels', '2022-01-31 22:21:35', '2022-01-31 22:21:35', 'web', 1),
(81, 'sd2.jpg', 'sd21643689732.jpg', NULL, '67.69 KB', '730 x 497 pixels', '2022-01-31 22:28:52', '2022-01-31 22:28:52', 'web', 1),
(82, '350.png', '3501643689992.png', NULL, '94.74 KB', '350 x 240 pixels', '2022-01-31 22:33:12', '2022-01-31 22:33:12', 'web', 1),
(83, '730.png', '7301643690061.png', NULL, '324.15 KB', '730 x 500 pixels', '2022-01-31 22:34:22', '2022-01-31 22:34:22', 'web', 1),
(84, '1920.png', '19201643690135.png', NULL, '1.63 MB', '1920 x 1316 pixels', '2022-01-31 22:35:36', '2022-01-31 22:35:36', 'web', 1),
(85, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-54.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-541643693233.png', NULL, '459.88 KB', '730 x 497 pixels', '2022-01-31 23:27:13', '2022-01-31 23:27:13', 'web', 1),
(86, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-61.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-611643693372.png', NULL, '477.29 KB', '730 x 497 pixels', '2022-01-31 23:29:32', '2022-01-31 23:29:32', 'web', 1),
(87, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-58.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-581643693756.png', NULL, '577.83 KB', '730 x 497 pixels', '2022-01-31 23:35:56', '2022-01-31 23:35:56', 'web', 1),
(88, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-20.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-201643693988.png', NULL, '445.6 KB', '730 x 497 pixels', '2022-01-31 23:39:48', '2022-01-31 23:39:48', 'web', 1),
(89, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-49.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-491643694792.png', NULL, '593.68 KB', '730 x 497 pixels', '2022-01-31 23:53:12', '2022-01-31 23:53:12', 'web', 2),
(90, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-51.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-511643694967.png', NULL, '627.07 KB', '730 x 497 pixels', '2022-01-31 23:56:07', '2022-01-31 23:56:07', 'web', 2),
(91, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-7.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-71643695162.png', NULL, '551.09 KB', '730 x 497 pixels', '2022-01-31 23:59:22', '2022-01-31 23:59:22', 'web', 2),
(92, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-9.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-91643695259.png', NULL, '546.44 KB', '730 x 497 pixels', '2022-02-01 00:00:59', '2022-02-01 00:00:59', 'web', 2),
(93, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-64.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-641643695713.png', NULL, '557.07 KB', '730 x 497 pixels', '2022-02-01 00:08:33', '2022-02-01 00:08:33', 'web', 2),
(94, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-31.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-311643696011.png', NULL, '475.09 KB', '730 x 497 pixels', '2022-02-01 00:13:32', '2022-02-01 00:13:32', 'web', 2),
(95, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-35.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-351643700019.png', NULL, '681.53 KB', '730 x 497 pixels', '2022-02-01 01:20:19', '2022-02-01 01:20:19', 'web', 2),
(96, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-57.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-571643701130.png', NULL, '566.57 KB', '730 x 497 pixels', '2022-02-01 01:38:51', '2022-02-01 01:38:51', 'web', 1),
(97, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-19.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-191643709206.png', NULL, '445.87 KB', '730 x 497 pixels', '2022-02-01 03:53:26', '2022-02-01 03:53:26', 'web', 5),
(98, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-15.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-151643709530.png', NULL, '609.5 KB', '730 x 497 pixels', '2022-02-01 03:58:51', '2022-02-01 03:58:51', 'web', 5),
(99, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-34.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-341643710084.png', NULL, '361.25 KB', '730 x 497 pixels', '2022-02-01 04:08:04', '2022-02-01 04:08:04', 'web', 5),
(100, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-22.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-221643710652.png', NULL, '389.29 KB', '730 x 497 pixels', '2022-02-01 04:17:32', '2022-02-01 04:17:32', 'web', 5),
(101, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-56.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-561643711145.png', NULL, '705.04 KB', '730 x 497 pixels', '2022-02-01 04:25:45', '2022-02-01 04:25:45', 'web', 5),
(102, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-45.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-451643711224.png', NULL, '600.61 KB', '730 x 497 pixels', '2022-02-01 04:27:04', '2022-02-01 04:27:04', 'web', 5),
(103, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-5.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-51643712682.png', 'AAAAA', '431.76 KB', '730 x 497 pixels', '2022-02-01 04:51:22', '2022-05-10 14:14:39', 'admin', 22),
(104, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-29.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-291643712832.png', NULL, '612.42 KB', '730 x 497 pixels', '2022-02-01 04:53:52', '2022-02-01 04:53:52', 'admin', 22),
(105, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-8.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-81643712998.png', NULL, '458.52 KB', '730 x 497 pixels', '2022-02-01 04:56:38', '2022-02-01 04:56:38', 'admin', 22),
(106, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-54.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-541643714922.png', NULL, '459.88 KB', '730 x 497 pixels', '2022-02-01 05:28:42', '2022-02-01 05:28:42', 'admin', 22),
(107, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-61.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-611643715007.png', 'ddddd', '477.29 KB', '730 x 497 pixels', '2022-02-01 05:30:08', '2022-04-03 11:02:40', 'admin', 22),
(108, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-58.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-581643715103.png', NULL, '577.83 KB', '730 x 497 pixels', '2022-02-01 05:31:43', '2022-02-01 05:31:43', 'admin', 22),
(109, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-20.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-201643715291.png', NULL, '445.6 KB', '730 x 497 pixels', '2022-02-01 05:34:51', '2022-02-01 05:34:51', 'admin', 22),
(110, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-49.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-491643715397.png', NULL, '593.68 KB', '730 x 497 pixels', '2022-02-01 05:36:37', '2022-02-01 05:36:37', 'admin', 22),
(111, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-52.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-521643715484.png', NULL, '602.87 KB', '730 x 497 pixels', '2022-02-01 05:38:05', '2022-02-01 05:38:05', 'admin', 22),
(112, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-7.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-71643715584.png', NULL, '551.09 KB', '730 x 497 pixels', '2022-02-01 05:39:44', '2022-02-01 05:39:44', 'admin', 22),
(113, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-9.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-91643715796.png', NULL, '546.44 KB', '730 x 497 pixels', '2022-02-01 05:43:16', '2022-02-01 05:43:16', 'admin', 22),
(114, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-31.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-311643715937.png', NULL, '475.09 KB', '730 x 497 pixels', '2022-02-01 05:45:37', '2022-02-01 05:45:37', 'admin', 22),
(115, 'circle1.png', 'circle11643799195.png', NULL, '1.35 KB', '70 x 70 pixels', '2022-02-02 04:53:15', '2022-02-02 04:53:15', 'admin', 22),
(116, 'circle2.png', 'circle21643799195.png', NULL, '5.26 KB', '164 x 164 pixels', '2022-02-02 04:53:15', '2022-02-02 04:53:15', 'admin', 22),
(117, 'dot-square.png', 'dot-square1643799195.png', NULL, '3.79 KB', '138 x 138 pixels', '2022-02-02 04:53:15', '2022-02-02 04:53:15', 'admin', 22),
(118, 'line-cross.png', 'line-cross1643799195.png', NULL, '3.94 KB', '222 x 139 pixels', '2022-02-02 04:53:15', '2022-02-02 04:53:15', 'admin', 22),
(119, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-24.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-241643809860.png', NULL, '455.07 KB', '730 x 497 pixels', '2022-02-02 07:51:01', '2022-02-02 07:51:01', 'web', 14),
(120, 'seller-s2.jpg', 'seller-s21644057790.jpg', NULL, '11.68 KB', '120 x 120 pixels', '2022-02-05 04:43:10', '2022-02-05 04:43:10', 'web', 1),
(121, 'ads.jpg', 'ads1644057883.jpg', NULL, '250.25 KB', '1394 x 315 pixels', '2022-02-05 04:44:44', '2022-02-05 04:44:44', 'web', 1),
(122, 'ads.jpg', 'ads1644069923.jpg', NULL, '250.25 KB', '1394 x 315 pixels', '2022-02-05 08:05:24', '2022-02-05 08:05:24', 'web', 3),
(123, '404.png', '4041644133345.png', NULL, '67.12 KB', '438 x 419 pixels', '2022-02-06 01:42:25', '2022-02-06 01:42:25', 'admin', 22),
(124, 'logo-02.png', 'logo-021644225302.png', NULL, '4.49 KB', '214 x 51 pixels', '2022-02-07 03:15:02', '2022-02-07 03:15:02', 'admin', 22),
(125, 'logo-01.png', 'logo-011644226204.png', NULL, '4.19 KB', '214 x 51 pixels', '2022-02-07 03:30:04', '2022-02-07 03:30:04', 'admin', 22),
(126, 'logo-footer.png', 'logo-footer1644227812.png', NULL, '3.55 KB', '173 x 41 pixels', '2022-02-07 03:56:52', '2022-02-07 03:56:52', 'admin', 22),
(127, 'cashfree.png', 'cashfree1644320824.png', NULL, '4.06 KB', '310 x 162 pixels', '2022-02-08 05:47:04', '2022-02-08 05:47:04', 'admin', 22),
(129, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-59.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-591644410863.png', NULL, '559.72 KB', '730 x 497 pixels', '2022-02-09 06:47:44', '2022-02-09 06:47:44', 'admin', 22),
(130, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-59.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-591644647980.png', NULL, '559.72 KB', '730 x 497 pixels', '2022-02-12 00:39:40', '2022-02-12 00:39:40', 'web', 1),
(131, 'extra1.jpg', 'extra11644649003.jpg', NULL, '6.46 KB', '78 x 78 pixels', '2022-02-12 00:56:43', '2022-02-12 00:56:43', 'web', 1),
(132, 'extra2.jpg', 'extra21644649003.jpg', NULL, '4.38 KB', '78 x 78 pixels', '2022-02-12 00:56:43', '2022-02-12 00:56:43', 'web', 1),
(133, 'extra3.jpg', 'extra31644649004.jpg', NULL, '5.85 KB', '78 x 78 pixels', '2022-02-12 00:56:44', '2022-02-12 00:56:44', 'web', 1),
(134, 'extra4.jpg', 'extra41644649004.jpg', NULL, '6.22 KB', '78 x 78 pixels', '2022-02-12 00:56:44', '2022-02-12 00:56:44', 'web', 1),
(135, 'brick-wall.png', 'brick-wall1644742898.png', NULL, '5.96 KB', '512 x 512 pixels', '2022-02-13 03:01:39', '2022-02-13 03:01:39', 'web', 1),
(136, 'fridge.png', 'fridge1644742898.png', NULL, '7.82 KB', '512 x 512 pixels', '2022-02-13 03:01:39', '2022-02-13 03:01:39', 'web', 1),
(137, 'kitchen.png', 'kitchen1644742899.png', NULL, '18.29 KB', '512 x 512 pixels', '2022-02-13 03:01:39', '2022-02-13 03:01:39', 'web', 1),
(138, 'tv.png', 'tv1644742899.png', NULL, '10.88 KB', '512 x 512 pixels', '2022-02-13 03:01:39', '2022-02-13 03:01:39', 'web', 1),
(139, 'air-conditioner.png', 'air-conditioner1644743229.png', NULL, '12.77 KB', '512 x 512 pixels', '2022-02-13 03:07:09', '2022-02-13 03:07:09', 'web', 1),
(140, 'beauty-treatment.png', 'beauty-treatment1644743435.png', NULL, '22.27 KB', '512 x 512 pixels', '2022-02-13 03:10:35', '2022-02-13 03:10:35', 'web', 1),
(141, 'table.png', 'table1644743548.png', NULL, '7.05 KB', '512 x 512 pixels', '2022-02-13 03:12:28', '2022-02-13 03:12:28', 'web', 1),
(142, 'door.png', 'door1644743630.png', NULL, '5.87 KB', '512 x 512 pixels', '2022-02-13 03:13:50', '2022-02-13 03:13:50', 'web', 1),
(143, 'car.png', 'car1644743744.png', NULL, '9.24 KB', '512 x 512 pixels', '2022-02-13 03:15:44', '2022-02-13 03:15:44', 'web', 1),
(144, 'window.png', 'window1644744549.png', NULL, '21.03 KB', '512 x 512 pixels', '2022-02-13 03:29:09', '2022-02-13 03:29:09', 'web', 1),
(145, 'massage.png', 'massage1644744796.png', NULL, '40.64 KB', '512 x 512 pixels', '2022-02-13 03:33:17', '2022-02-13 03:33:17', 'web', 2),
(146, 'shave.png', 'shave1644744864.png', NULL, '35.19 KB', '512 x 512 pixels', '2022-02-13 03:34:24', '2022-02-13 03:34:24', 'web', 2),
(147, 'hair-style.png', 'hair-style1644744948.png', NULL, '36.43 KB', '512 x 512 pixels', '2022-02-13 03:35:49', '2022-02-13 03:35:49', 'web', 2),
(148, 'car.png', 'car1644745074.png', NULL, '9.24 KB', '512 x 512 pixels', '2022-02-13 03:37:54', '2022-02-13 03:37:54', 'web', 2),
(149, 'full-service.png', 'full-service1644745094.png', NULL, '12 KB', '512 x 512 pixels', '2022-02-13 03:38:14', '2022-02-13 03:38:14', 'web', 2),
(150, 'seater-sofa.png', 'seater-sofa1644745215.png', NULL, '17.08 KB', '512 x 512 pixels', '2022-02-13 03:40:16', '2022-02-13 03:40:16', 'web', 2),
(151, 'broken-wire.png', 'broken-wire1644745364.png', NULL, '13.69 KB', '512 x 512 pixels', '2022-02-13 03:42:44', '2022-02-13 03:42:44', 'web', 2),
(152, 'circuit-board.png', 'circuit-board1644745364.png', NULL, '9.86 KB', '512 x 512 pixels', '2022-02-13 03:42:44', '2022-02-13 03:42:44', 'web', 2),
(153, 'seater-sofa.png', 'seater-sofa1644745402.png', NULL, '17.08 KB', '512 x 512 pixels', '2022-02-13 03:43:22', '2022-02-13 03:43:22', 'web', 2),
(154, 'hairstyle.png', 'hairstyle1644745517.png', NULL, '58.85 KB', '512 x 512 pixels', '2022-02-13 03:45:17', '2022-02-13 03:45:17', 'web', 5),
(155, 'tv.png', 'tv1644745549.png', NULL, '10.88 KB', '512 x 512 pixels', '2022-02-13 03:45:49', '2022-02-13 03:45:49', 'web', 5),
(156, 'electrical-panel.png', 'electrical-panel1644745615.png', NULL, '7.78 KB', '512 x 512 pixels', '2022-02-13 03:46:55', '2022-02-13 03:46:55', 'web', 5),
(157, 'skincare.png', 'skincare1644745720.png', NULL, '29.21 KB', '512 x 512 pixels', '2022-02-13 03:48:40', '2022-06-11 05:44:44', 'web', 5),
(158, 'wheel.png', 'wheel1644746364.png', NULL, '22.29 KB', '512 x 512 pixels', '2022-02-13 03:59:24', '2022-02-13 03:59:24', 'web', 2),
(159, 'massage (1).png', 'massage-11644746519.png', NULL, '27.47 KB', '512 x 512 pixels', '2022-02-13 04:01:59', '2022-02-13 04:01:59', 'web', 2),
(160, 'cleaning.png', 'cleaning1644746825.png', NULL, '19.95 KB', '512 x 512 pixels', '2022-02-13 04:07:05', '2022-02-13 04:07:05', 'web', 1),
(161, 'hairstyle.png', 'hairstyle1644746911.png', 'https://bytesed.com/laravel/qixer/assets/uploads/media-uploader/semi-large-hairstyle1644746911.png', '58.85 KB', '512 x 512 pixels', '2022-02-13 04:08:31', '2022-04-06 11:20:11', 'web', 1),
(162, 'dye.png', 'dye1644746990.png', NULL, '28.43 KB', '512 x 512 pixels', '2022-02-13 04:09:50', '2022-02-13 04:09:50', 'web', 1),
(163, 'door.png', 'door1644747194.png', NULL, '5.87 KB', '512 x 512 pixels', '2022-02-13 04:13:14', '2022-02-13 04:13:14', 'web', 1),
(164, 'about.jpg', 'about1644902065.jpg', NULL, '131.49 KB', '501 x 443 pixels', '2022-02-14 23:14:25', '2022-02-14 23:14:25', 'admin', 22),
(165, 'about-shape.jpg', 'about-shape1644902293.jpg', NULL, '8.18 KB', '208 x 208 pixels', '2022-02-14 23:18:13', '2022-02-14 23:18:13', 'admin', 22),
(166, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-60.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-601645017295.png', NULL, '532.08 KB', '730 x 497 pixels', '2022-02-16 18:14:55', '2022-02-16 18:14:55', 'web', 5),
(167, 'ads.jpg', 'ads1645105027.jpg', NULL, '250.25 KB', '1394 x 315 pixels', '2022-02-17 18:37:07', '2022-02-17 18:37:07', 'web', 5),
(168, 'wim-van-t-einde-ZnSi3W0MBHI-unsplash.jpg', 'wim-van-t-einde-znsi3w0mbhi-unsplash1646643015.jpg', NULL, '3.21 MB', '4032 x 2268 pixels', '2022-03-07 13:50:18', '2022-03-07 13:50:18', 'web', 1),
(169, 'images.jfif', 'images1646676576.jfif', NULL, '5.06 KB', '225 x 225 pixels', '2022-03-07 23:09:36', '2022-03-07 23:09:36', 'web', 36),
(170, 'IMG-20220312-WA0006.jpeg', 'img-20220312-wa00061647203599.jpeg', NULL, '1.41 MB', '2448 x 3264 pixels', '2022-03-14 00:33:21', '2022-04-11 18:56:06', 'web', 1),
(171, '11227939_884665174948836_2162515690193028077_n.jpg', '11227939-884665174948836-2162515690193028077-n1648340971.jpg', NULL, '29.87 KB', '701 x 701 pixels', '2022-03-27 04:29:31', '2022-03-27 04:29:31', 'web', 1),
(172, 'download.png', 'download1648442270.png', NULL, '3.15 KB', '225 x 225 pixels', '2022-03-28 08:37:50', '2022-03-28 08:37:50', 'admin', 22),
(173, '2022_03_28_16.51.03.jpg', '2022-03-28-1651031648477022.jpg', NULL, '400.23 KB', '720 x 1640 pixels', '2022-03-28 18:17:02', '2022-03-28 18:17:02', 'web', 1),
(174, 'Screenshot_20220330-192825.jpg', 'screenshot-20220330-1928251648686596.jpg', NULL, '355.6 KB', '720 x 1640 pixels', '2022-03-31 04:29:57', '2022-03-31 04:29:57', 'web', 1),
(176, 'd99460c91f759a23ca369c00c3774d17.jpg', 'd99460c91f759a23ca369c00c3774d171649133331.jpg', NULL, '1.16 MB', '3600 x 3600 pixels', '2022-04-05 08:35:34', '2022-05-15 10:34:00', 'web', 107),
(177, 'IMG-20220314-WA0000.jpg', 'img-20220314-wa00001649348574.jpg', NULL, '13.67 KB', '553 x 451 pixels', '2022-04-07 20:22:54', '2022-04-07 20:22:54', 'admin', 22),
(178, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-12.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-121651039452.png', NULL, '510.09 KB', '730 x 497 pixels', '2022-04-27 00:04:12', '2022-04-27 00:04:12', 'web', 1),
(179, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-20.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-201651039452.png', NULL, '445.6 KB', '730 x 497 pixels', '2022-04-27 00:04:12', '2022-04-27 00:04:12', 'web', 1),
(180, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-14.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-141651039503.png', NULL, '233.36 KB', '730 x 497 pixels', '2022-04-27 00:05:04', '2022-04-27 00:05:04', 'web', 1),
(181, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-26.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-261651039503.png', NULL, '512.98 KB', '730 x 497 pixels', '2022-04-27 00:05:04', '2022-04-27 00:05:04', 'web', 1),
(182, 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-31.png', 'young-beautiful-cleaner-woman-holding-bucket-with-products-pointing-camera-against-blue-backdrop-311651039504.png', NULL, '475.09 KB', '730 x 497 pixels', '2022-04-27 00:05:04', '2022-04-27 00:05:04', 'web', 1),
(183, 'Frame 21.jpg', 'frame-211651124011.jpg', NULL, '342.43 KB', '730 x 497 pixels', '2022-04-28 09:33:31', '2022-04-28 09:33:31', 'web', 1),
(184, 'Frame 19.jpg', 'frame-191651124014.jpg', NULL, '471.57 KB', '730 x 497 pixels', '2022-04-28 09:33:35', '2022-04-28 09:33:35', 'web', 1),
(185, 'Frame 18.jpg', 'frame-181651124016.jpg', NULL, '340.22 KB', '730 x 497 pixels', '2022-04-28 09:33:36', '2022-04-28 09:33:36', 'web', 1),
(186, 'Frame 20.jpg', 'frame-201651124017.jpg', NULL, '330.88 KB', '730 x 497 pixels', '2022-04-28 09:33:37', '2022-04-28 09:33:37', 'web', 1),
(187, 'Frame 22.jpg', 'frame-221651124049.jpg', NULL, '340.96 KB', '730 x 497 pixels', '2022-04-28 09:34:09', '2022-04-28 09:34:09', 'web', 1),
(188, 'logo 1-01.png', 'logo-1-011651564718.png', NULL, '48.5 KB', '3187 x 964 pixels', '2022-05-03 11:58:39', '2022-05-03 11:58:39', 'admin', 22),
(189, 'favicon.png', 'favicon1651564722.png', NULL, '1.56 KB', '64 x 59 pixels', '2022-05-03 11:58:42', '2022-05-03 11:58:42', 'admin', 22),
(190, '1 (89).jpg', '1-891651715872.jpg', NULL, '401.72 KB', '2508 x 1672 pixels', '2022-05-05 05:57:53', '2022-05-05 12:35:52', 'admin', 22),
(191, 'CR3A3473.JPG', 'cr3a34731651765556.JPG', NULL, '4.89 MB', '5760 x 3840 pixels', '2022-05-05 19:46:02', '2022-05-28 13:31:05', 'admin', 22),
(192, 'Auction.png', 'auction1651785675.png', NULL, '5.23 MB', '1440 x 10103 pixels', '2022-05-06 01:21:20', '2022-05-06 01:21:20', 'web', 163),
(193, 'WhatsApp Image 2022-05-05 at 6.29.36 PM.jpeg', 'whatsapp-image-2022-05-05-at-62936-pm1652006894.jpeg', NULL, '50.68 KB', '929 x 617 pixels', '2022-05-08 14:48:14', '2022-05-08 14:48:38', 'admin', 22),
(194, 'horizontal-shot-of-attentive-asian-housewife-disin-2022-02-03-02-56-59-utc.jpg', 'horizontal-shot-of-attentive-asian-housewife-disin-2022-02-03-02-56-59-utc1652227077.jpg', NULL, '349.89 KB', '2507 x 1672 pixels', '2022-05-11 03:57:58', '2022-05-11 03:57:58', 'web', 182),
(195, 'cleaning-tools-composition-flat-lay-on-yellow-wood-2021-12-09-07-47-44-utc.jpg', 'cleaning-tools-composition-flat-lay-on-yellow-wood-2021-12-09-07-47-44-utc1652227092.jpg', NULL, '359.16 KB', '2508 x 1672 pixels', '2022-05-11 03:58:13', '2022-05-11 03:58:13', 'web', 182),
(196, 'localhost_3000_.png', 'localhost-30001652272930.png', NULL, '231.3 KB', '1903 x 671 pixels', '2022-05-11 16:42:10', '2022-05-11 16:42:10', 'admin', 22),
(197, 'localhost_3000_.png', 'localhost-30001652272951.png', NULL, '231.3 KB', '1903 x 671 pixels', '2022-05-11 16:42:31', '2022-05-11 16:42:31', 'admin', 22),
(198, 'Screenshot_20220512-224224_Chrome.jpg', 'screenshot-20220512-224224-chrome1652627333.jpg', NULL, '349.02 KB', '720 x 1600 pixels', '2022-05-15 19:08:54', '2022-05-15 19:08:54', 'web', 197),
(199, 'Q8e63nHZeAU.jpg', 'q8e63nhzeau1652633642.jpg', NULL, '252.33 KB', '1920 x 1920 pixels', '2022-05-15 20:54:03', '2022-05-15 20:54:03', 'web', 199),
(200, '925981.jpg', '9259811652911511.jpg', NULL, '3.81 KB', '128 x 128 pixels', '2022-05-19 02:05:11', '2022-05-19 02:05:11', 'web', 208),
(201, 'NEWbAsset 11@0.5x.png', 'newbasset-11-at-05x1652984281.png', NULL, '1.18 KB', '91 x 24 pixels', '2022-05-19 22:18:01', '2022-05-19 22:18:01', 'admin', 22),
(202, 'NEWbAsset 10.png', 'newbasset-101652984294.png', NULL, '2.52 KB', '182 x 48 pixels', '2022-05-19 22:18:14', '2022-05-19 22:18:14', 'admin', 22),
(203, 'logo.png', 'logo1652984304.png', NULL, '4.66 KB', '363 x 95 pixels', '2022-05-19 22:18:24', '2022-05-19 22:18:24', 'admin', 22),
(204, 'white.png', 'white1652984305.png', NULL, '2.54 KB', '346 x 95 pixels', '2022-05-19 22:18:25', '2022-05-19 22:18:25', 'admin', 22),
(205, 'logob.png', 'logob1652984305.png', NULL, '2.54 KB', '348 x 95 pixels', '2022-05-19 22:18:25', '2022-05-19 22:19:09', 'admin', 22),
(206, 'logoAsset 9@4x.png', 'logoasset-9-at-4x1652984316.png', NULL, '81.7 KB', '3105 x 1640 pixels', '2022-05-19 22:18:37', '2022-05-19 22:18:37', 'admin', 22),
(207, 'Screenshot_20220521_214016.jpg', 'screenshot-20220521-2140161653236513.jpg', NULL, '364.59 KB', '1080 x 974 pixels', '2022-05-22 20:21:53', '2022-05-22 20:21:53', 'admin', 22),
(208, 'mc.JPG', 'mc1653754798.JPG', NULL, '10.76 KB', '250 x 45 pixels', '2022-05-28 20:19:58', '2022-05-28 20:19:58', 'web', 240),
(209, 'S2.png', 's21654088278.png', NULL, '33.77 KB', '320 x 148 pixels', '2022-06-01 16:57:58', '2022-06-01 16:57:58', 'admin', 22),
(210, 'S1.png', 's11654088278.png', NULL, '62.3 KB', '320 x 148 pixels', '2022-06-01 16:57:58', '2022-06-01 16:57:58', 'admin', 22),
(211, 'S3.png', 's31654088279.png', NULL, '32.1 KB', '320 x 148 pixels', '2022-06-01 16:57:59', '2022-06-01 16:57:59', 'admin', 22),
(212, '001-salon.png', '001-salon1654088379.png', NULL, '7.11 KB', '128 x 128 pixels', '2022-06-01 16:59:39', '2022-06-01 16:59:39', 'admin', 22),
(213, '002-house.png', '002-house1654088380.png', NULL, '5.45 KB', '128 x 128 pixels', '2022-06-01 16:59:40', '2022-06-01 16:59:40', 'admin', 22),
(214, '003-cpu.png', '003-cpu1654088380.png', NULL, '4.95 KB', '128 x 128 pixels', '2022-06-01 16:59:40', '2022-06-01 16:59:40', 'admin', 22),
(215, '004-mop.png', '004-mop1654088380.png', NULL, '6.97 KB', '128 x 128 pixels', '2022-06-01 16:59:40', '2022-06-01 16:59:40', 'admin', 22),
(216, '005-paint-palette.png', '005-paint-palette1654088380.png', NULL, '6.39 KB', '128 x 128 pixels', '2022-06-01 16:59:40', '2022-07-28 20:31:38', 'admin', 22),
(217, '006-help.png', '006-help1654088381.png', NULL, '6.78 KB', '128 x 128 pixels', '2022-06-01 16:59:41', '2022-06-01 16:59:41', 'admin', 22),
(218, '007-social-media.png', '007-social-media1654088381.png', NULL, '10.42 KB', '128 x 128 pixels', '2022-06-01 16:59:41', '2022-06-01 16:59:41', 'admin', 22),
(219, '008-bubbles.png', '008-bubbles1654088381.png', NULL, '7.49 KB', '128 x 128 pixels', '2022-06-01 16:59:42', '2022-06-01 16:59:42', 'admin', 22),
(220, 'image_picker8862614319185928389.jpg.jpg', 'image-picker8862614319185928389jpg1654320007.jpg', NULL, '77.44 KB', '720 x 1600 pixels', '2022-06-04 09:20:08', '2022-06-04 09:20:08', 'admin', NULL),
(221, 'image_picker3395934874189110471.jpg.jpg', 'image-picker3395934874189110471jpg1654321159.jpg', NULL, '167.51 KB', '1080 x 2400 pixels', '2022-06-04 09:39:20', '2022-06-04 09:39:20', 'admin', NULL),
(222, '25-Beautiful-Cinderella-Coloring-Pages-For-Your-Toddler_1-910x1024.jpg', '25-beautiful-cinderella-coloring-pages-for-your-toddler-1-910x10241654351267.jpg', NULL, '68.39 KB', '910 x 1024 pixels', '2022-06-04 18:01:08', '2022-06-04 18:01:08', 'admin', 22),
(223, 'image_picker7975150125260668698.jpg.jpg', 'image-picker7975150125260668698jpg1654704108.jpg', NULL, '178.48 KB', '1300 x 1300 pixels', '2022-06-08 10:01:48', '2022-06-08 10:01:48', 'admin', NULL),
(224, 'image_picker8059686529657847860.jpg.jpg', 'image-picker8059686529657847860jpg1654768310.jpg', NULL, '335.7 KB', '960 x 960 pixels', '2022-06-09 03:51:50', '2022-06-09 03:51:50', 'admin', NULL),
(225, 'image_picker6816185857731392238.jpg.jpg', 'image-picker6816185857731392238jpg1654781471.jpg', NULL, '1.45 MB', '2448 x 3264 pixels', '2022-06-09 07:31:13', '2022-06-09 07:31:13', 'admin', NULL),
(226, 'image_picker5153446679905995484.jpg.jpg', 'image-picker5153446679905995484jpg1654802465.jpg', NULL, '25.81 KB', '480 x 480 pixels', '2022-06-09 13:21:05', '2022-06-09 13:21:05', 'admin', NULL),
(227, 'image_picker1907834294180281395.jpg.jpg', 'image-picker1907834294180281395jpg1654811729.jpg', NULL, '638.24 KB', '1080 x 2340 pixels', '2022-06-09 15:55:30', '2022-06-09 15:55:30', 'admin', NULL),
(228, 'image_picker950017028222866533.jpg.jpg', 'image-picker950017028222866533jpg1654882575.jpg', NULL, '16 MB', '4608 x 3456 pixels', '2022-06-10 11:36:20', '2022-06-10 11:36:20', 'admin', NULL),
(229, 'WhatsApp Image 2022-08-10 at 11.21.48 PM.jpeg', 'whatsapp-image-2022-08-10-at-112148-pm1660153969.jpeg', NULL, '3.21 KB', '100 x 100 pixels', '2022-08-10 21:52:49', '2022-08-10 21:52:49', 'admin', 25),
(230, 'PngItem_1272123.png', 'pngitem-12721231660642593.png', NULL, '440.32 KB', '1660 x 1660 pixels', '2022-08-16 13:36:35', '2022-08-16 13:36:35', 'admin', 25);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Primary Menu', '[{\"ptype\":\"custom\",\"id\":2,\"antarget\":\"\",\"icon\":\"\",\"pname\":\"home\",\"purl\":\"@url\",\"children\":[{\"ptype\":\"pages\",\"id\":3,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":16},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{\"ptype\":\"pages\",\"id\":36,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":22},{},{},{},{},{},{},{},{},{},{\"ptype\":\"pages\",\"id\":45,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":38},{},{},{},{},{},{},{},{\"ptype\":\"pages\",\"id\":52,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":39},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{},{}]},{\"ptype\":\"pages\",\"id\":118,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":31},{\"ptype\":\"pages\",\"id\":119,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":32},{\"ptype\":\"custom\",\"id\":120,\"antarget\":\"\",\"icon\":\"\",\"pname\":\"Pages\",\"purl\":\"\",\"children\":[{\"ptype\":\"pages\",\"id\":121,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":40},{},{},{},{\"ptype\":\"pages\",\"id\":124,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":41},{},{},{\"ptype\":\"pages\",\"id\":126,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":42},{},{},{},{}]},{\"ptype\":\"pages\",\"id\":130,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":35},{\"ptype\":\"pages\",\"id\":131,\"antarget\":\"\",\"icon\":\"\",\"menulabel\":\"\",\"pid\":34}]', 'default', '2021-03-24 08:07:56', '2022-02-12 05:28:05'),
(6, 'Useful Links', '[{\"pslug\":\"about_page_slug\",\"pname\":\"about_page_en_GB_name\",\"ptype\":\"static\",\"id\":3},{\"pslug\":\"contact_page_slug\",\"pname\":\"contact_page_en_GB_name\",\"ptype\":\"static\",\"id\":4},{\"ptype\":\"static\",\"pslug\":\"practice_area_page_slug\",\"pname\":\"practice_area_page_[lang]_name\",\"id\":3},{\"ptype\":\"static\",\"pslug\":\"appointment_page_slug\",\"pname\":\"appointment_page_[lang]_name\",\"id\":4}]', '', '2021-03-29 03:27:29', '2021-09-02 05:37:38'),
(7, 'Footer Menu', '[{\"ptype\":\"custom\",\"pname\":\"Home\",\"purl\":\"@url\",\"id\":1},{\"menulabel\":\"Blog\",\"ptype\":\"pages\",\"pid\":26,\"id\":2},{\"ptype\":\"pages\",\"pid\":20,\"id\":3},{\"ptype\":\"pages\",\"pid\":19,\"id\":5}]', NULL, '2021-10-30 03:41:20', '2021-10-30 03:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `session_id`, `message`, `mime_type`, `attachment`, `created_at`, `updated_at`) VALUES
(1, '632093d19f852', 'Good', 'image', '13-09-2022-142937.png', '2022-09-13 09:29:37', '2022-09-13 09:29:37'),
(2, '632093dd234bc', 'Good', 'image', '13-09-2022-142949.png', '2022-09-13 09:29:49', '2022-09-13 09:29:49'),
(3, '63209456237df', 'nice', NULL, NULL, '2022-09-13 09:31:50', '2022-09-13 09:31:50'),
(4, '63216caa223cf', 'my side', NULL, NULL, '2022-09-14 00:54:50', '2022-09-14 00:54:50'),
(5, '63216d7477efc', 'g', NULL, NULL, '2022-09-14 00:58:12', '2022-09-14 00:58:12'),
(6, '6322bb3009455', 'Good Morning all of you?', NULL, NULL, '2022-09-15 00:42:08', '2022-09-15 00:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `meta_data`
--

CREATE TABLE `meta_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_taggable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta_taggable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_meta_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_meta_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_meta_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meta_data`
--

INSERT INTO `meta_data` (`id`, `meta_taggable_id`, `meta_taggable_type`, `meta_title`, `meta_tags`, `meta_description`, `facebook_meta_tags`, `facebook_meta_description`, `facebook_meta_image`, `twitter_meta_tags`, `twitter_meta_description`, `twitter_meta_image`, `created_at`, `updated_at`) VALUES
(25, 36, 'App\\Blog', 'bloghttp://localhost/ozagi/assets/uploads/media-uploader/image-21633150859.jpg', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-01 22:56:29', '2021-11-17 17:27:36'),
(26, 37, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-01 23:09:43', '2021-11-17 14:13:18'),
(27, 38, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-01 23:09:47', '2021-11-17 19:29:27'),
(28, 39, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-01 23:09:50', '2021-11-10 06:39:03'),
(29, 40, 'App\\Blog', 'blog dd', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-01 23:09:53', '2021-11-17 17:26:41'),
(30, 41, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-01 23:09:55', '2021-11-17 14:09:33'),
(31, 42, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-01 23:10:00', '2021-10-02 00:15:30'),
(32, 43, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-01 23:10:04', '2021-10-01 23:47:51'),
(33, 44, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-01 23:10:18', '2021-10-01 23:46:55'),
(34, 45, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-01 23:10:21', '2021-10-01 23:30:24'),
(40, 55, 'App\\Blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-02 04:57:06', '2021-10-02 04:57:06'),
(41, 56, 'App\\Blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-02 04:58:14', '2021-10-02 04:58:14'),
(42, 57, 'App\\Blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-02 04:58:25', '2021-10-02 04:58:25'),
(43, 62, 'App\\Blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-02 05:01:45', '2021-10-02 05:01:45'),
(44, 64, 'App\\Blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-02 05:02:37', '2021-10-02 05:02:37'),
(45, 65, 'App\\Blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-02 05:03:02', '2021-10-02 05:03:02'),
(46, 73, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-02 05:14:45', '2021-10-02 05:48:52'),
(47, 78, 'App\\Blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-02 06:31:08', '2021-10-02 06:31:08'),
(48, 79, 'App\\Blog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-02 06:31:11', '2021-10-02 06:31:11'),
(52, 83, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-02 06:53:28', '2021-10-02 06:53:28'),
(63, 94, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-02 23:28:22', '2021-10-02 23:28:22'),
(72, 16, 'App\\Page', 'Home Page One', 'test meta', 'test fb meta', 'test', 'test fb meta', '159', 'test', 'test twitter meta', '161', '2021-10-04 07:23:34', '2022-04-21 05:32:24'),
(81, 100, 'App\\Blog', 'sdf', '', 'sdf', '', '', NULL, '', '', NULL, '2021-10-07 06:47:42', '2021-10-07 06:47:42'),
(82, 101, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-07 07:01:03', '2021-10-07 07:01:03'),
(83, 102, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-07 07:13:00', '2021-10-07 07:13:00'),
(84, 103, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-07 07:13:10', '2021-10-07 07:13:10'),
(85, 104, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-07 07:14:09', '2021-10-07 07:14:09'),
(87, 105, 'App\\Blog', 'sdfsdfdsf', 'sd', 'sdf', 'sdfsdf', 'sdf', NULL, 'sdf', 'sdf', NULL, '2021-10-11 22:20:01', '2021-10-20 22:24:56'),
(88, 106, 'App\\Blog', 'dfs', 'sfd', 'sdf', '', '', NULL, '', '', NULL, '2021-10-11 22:40:06', '2021-10-20 22:27:16'),
(89, 107, 'App\\Blog', 'sdf', 'sdf', 'sdf', '', '', NULL, '', '', NULL, '2021-10-11 22:47:16', '2021-10-17 23:57:10'),
(91, 109, 'App\\Blog', 'sf', 'sf', 'sdf', '', '', NULL, '', '', NULL, '2021-10-12 05:38:27', '2021-10-20 22:25:26'),
(92, 110, 'App\\Blog', 'dfgdfg', 'dfg', 'dfg', 'dfg', 'dfg', NULL, 'dfg', 'dfg', NULL, '2021-10-13 00:52:59', '2021-10-13 00:52:59'),
(93, 111, 'App\\Blog', 'sdf', 'sdf', 'sdf', '', '', NULL, '', '', NULL, '2021-10-13 01:11:59', '2021-10-13 01:11:59'),
(95, 22, 'App\\Page', 'Home Page Two', 'test', 'test', 'test', 'test', NULL, '', '', NULL, '2021-10-22 22:35:48', '2022-02-14 09:26:52'),
(99, 112, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-24 04:05:12', '2021-11-01 08:35:13'),
(100, 113, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-24 04:08:21', '2021-11-17 19:21:15'),
(101, 114, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-24 04:09:10', '2021-11-17 18:27:59'),
(102, 115, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-24 04:11:09', '2021-11-17 19:46:01'),
(103, 116, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-24 04:12:11', '2021-11-01 08:33:41'),
(104, 117, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-24 05:55:53', '2021-11-14 06:50:39'),
(105, 118, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-24 05:56:11', '2021-11-14 06:50:21'),
(106, 119, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-24 05:56:14', '2021-11-14 06:49:18'),
(107, 120, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-24 05:56:17', '2021-11-08 07:12:23'),
(108, 121, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-24 06:11:03', '2021-11-17 18:35:34'),
(109, 122, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-24 06:13:24', '2021-11-14 01:01:40'),
(110, 123, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-24 06:14:21', '2021-11-14 06:48:58'),
(111, 124, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-24 06:15:33', '2021-11-14 06:48:37'),
(112, 125, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-24 06:16:41', '2021-11-14 06:48:14'),
(113, 126, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-10-24 06:20:15', '2021-11-17 19:48:15'),
(114, 127, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '213', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '218', '2021-10-24 06:21:15', '2021-11-14 23:44:04'),
(118, 128, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-25 01:23:45', '2021-10-25 01:25:55'),
(119, 129, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-25 01:29:39', '2021-10-25 01:30:16'),
(120, 130, 'App\\Blog', 'dsf', NULL, '', '', '', NULL, '', '', NULL, '2021-10-25 01:36:10', '2021-10-25 01:36:34'),
(121, 139, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-25 04:20:43', '2021-10-27 04:46:22'),
(122, 140, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-25 04:21:44', '2021-10-26 06:52:18'),
(123, 141, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-25 04:25:03', '2021-10-25 04:25:03'),
(126, 143, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-28 03:40:19', '2021-10-28 03:40:19'),
(127, 144, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-28 03:44:12', '2021-10-31 01:11:34'),
(128, 145, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-28 03:45:29', '2021-10-28 03:45:29'),
(129, 146, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-28 03:57:09', '2021-10-28 03:57:09'),
(130, 147, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-30 00:14:08', '2021-10-30 00:14:08'),
(131, 148, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-30 00:19:41', '2021-10-30 00:19:41'),
(132, 149, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-30 00:20:15', '2021-10-30 00:20:15'),
(133, 150, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-30 00:23:30', '2021-10-31 03:37:16'),
(137, 151, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-31 01:14:40', '2021-11-01 01:26:06'),
(138, 152, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-31 03:38:55', '2021-10-31 03:38:55'),
(139, 153, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-31 04:33:24', '2021-10-31 04:33:24'),
(140, 154, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-31 04:38:13', '2021-10-31 04:42:35'),
(141, 155, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-31 04:44:54', '2021-10-31 04:44:54'),
(142, 156, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-10-31 04:45:02', '2021-10-31 04:45:02'),
(143, 157, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-31 04:45:50', '2021-10-31 04:45:50'),
(145, 159, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-10-31 04:47:51', '2021-10-31 04:47:51'),
(146, 160, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-11-01 02:24:19', '2021-11-01 02:24:19'),
(147, 161, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-01 02:27:56', '2021-11-01 02:27:56'),
(148, 162, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-11-01 02:28:23', '2021-11-17 19:49:11'),
(149, 163, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-01 02:39:49', '2021-11-01 02:46:52'),
(150, 164, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-01 02:47:45', '2021-11-01 03:00:26'),
(151, 165, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-01 03:02:09', '2021-11-01 03:40:33'),
(152, 166, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-01 03:40:41', '2021-11-01 03:40:42'),
(153, 167, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-01 03:43:01', '2021-11-01 03:43:01'),
(154, 168, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-01 03:55:40', '2021-11-01 03:57:20'),
(155, 169, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-01 03:58:14', '2021-11-01 03:58:14'),
(156, 170, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-01 03:58:22', '2021-11-01 03:58:22'),
(158, 171, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-07 00:14:59', '2021-11-07 01:24:50'),
(159, 172, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-07 01:40:28', '2021-11-07 01:40:28'),
(160, 173, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-11-11 07:22:45', '2021-11-11 07:22:45'),
(161, 174, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-11-13 03:12:59', '2021-11-13 03:12:59'),
(162, 175, 'App\\Blog', 'sdf ok', 'sdf', 'sdf', '', '', NULL, '', '', NULL, '2021-11-14 04:37:52', '2021-11-14 04:41:37'),
(163, 177, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '213', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '218', '2021-11-17 14:01:54', '2021-11-17 18:34:28'),
(164, 178, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-17 15:32:02', '2021-11-17 15:33:09'),
(165, 179, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-11-17 17:28:58', '2021-11-18 11:23:50'),
(166, 180, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-11-17 19:52:28', '2021-11-17 19:56:54'),
(167, 181, 'App\\Blog', 'blog', 'blog', 'Fighting evil and tyranny, with all his power', 'blog', 'Fighting evil and tyranny, with all his power', '10', 'sdfsdf', 'Fighting evil and tyranny, with all his power', '6', '2021-11-17 19:57:16', '2021-11-17 19:58:51'),
(169, 182, 'App\\Blog', 'dsf', 'sdfdsf', '', '', '', NULL, '', '', NULL, '2021-11-21 16:58:52', '2021-11-21 16:59:10'),
(170, 183, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-21 17:24:42', '2021-11-21 17:34:05'),
(171, 184, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2021-11-21 17:25:00', '2021-11-21 17:25:13'),
(172, 185, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2021-11-21 17:33:41', '2021-11-21 17:33:41'),
(173, 31, 'App\\Page', 'About Us', 'about', 'about', '', '', NULL, '', '', NULL, '2021-11-24 06:44:23', '2022-02-12 04:39:56'),
(174, 32, 'App\\Page', 'service list', 'service-list', '', '', '', NULL, '', '', NULL, '2021-11-24 06:52:32', '2022-02-14 22:28:02'),
(176, 34, 'App\\Page', 'contact', 'contact', '', '', '', NULL, '', '', NULL, '2021-11-24 06:54:28', '2022-02-12 04:28:37'),
(177, 35, 'App\\Page', 'blog', 'blog', '', '', '', NULL, '', '', NULL, '2021-11-24 06:56:35', '2022-02-12 04:42:04'),
(180, 187, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2022-01-08 00:25:46', '2022-01-08 00:25:46'),
(181, 190, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2022-01-08 00:38:44', '2022-01-08 00:38:44'),
(182, 191, 'App\\Blog', 'Test', 'Test', 'Test', '', '', NULL, '', '', NULL, '2022-01-08 00:51:33', '2022-01-08 00:51:33'),
(183, 192, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2022-01-08 00:54:41', '2022-01-08 00:54:41'),
(184, 193, 'App\\Blog', '', '', '', '', '', NULL, '', '', NULL, '2022-01-08 01:04:02', '2022-01-08 01:04:02'),
(186, 2, 'App\\Blog', 'werwe', 'werwer', 'werewr', 'werwer', 'werwer', NULL, 'werwer', 'werwe', NULL, '2022-01-08 01:32:50', '2022-02-13 02:50:53'),
(187, 3, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 01:34:16', '2022-02-13 02:50:31'),
(188, 4, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 01:57:12', '2022-02-13 02:49:52'),
(190, 2, 'App\\Blog', 'werwe', 'werwer', 'werewr', 'werwer', 'werwer', NULL, 'werwer', 'werwe', NULL, '2022-01-08 03:18:18', '2022-02-13 02:50:53'),
(191, 3, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 03:22:45', '2022-02-13 02:50:31'),
(192, 4, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 05:23:52', '2022-02-13 02:49:52'),
(193, 5, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 05:23:57', '2022-02-13 02:49:30'),
(194, 6, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 05:24:04', '2022-02-13 02:48:58'),
(195, 7, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 05:24:08', '2022-02-13 02:47:43'),
(196, 8, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 05:24:12', '2022-02-13 02:46:58'),
(197, 9, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 05:24:17', '2022-02-13 02:46:32'),
(198, 10, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 05:24:24', '2022-02-13 02:46:00'),
(199, 11, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 05:24:28', '2022-02-13 02:45:28'),
(200, 12, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 05:44:56', '2022-02-13 02:44:10'),
(201, 13, 'App\\Blog', '', NULL, '', '', '', NULL, '', '', NULL, '2022-01-08 23:09:53', '2022-02-13 02:45:01'),
(202, 38, 'App\\Page', 'home page main', '', 'home page three', '', '', NULL, '', '', NULL, '2022-01-11 23:30:18', '2022-08-08 23:34:35'),
(203, 39, 'App\\Page', 'Home Page Four', 'Home Page Four', 'Home Page Four', '', '', NULL, '', '', NULL, '2022-01-12 22:21:43', '2022-02-13 08:05:27'),
(204, 40, 'App\\Page', '', '', '', '', '', NULL, '', '', NULL, '2022-01-13 06:53:28', '2022-02-12 04:40:25'),
(205, 41, 'App\\Page', 'Privacy Policy', '', '', '', '', NULL, '', '', NULL, '2022-01-13 07:37:39', '2022-02-13 01:39:42'),
(206, 42, 'App\\Page', 'Terms and Conditions', '', '', '', '', NULL, '', '', NULL, '2022-01-14 22:15:25', '2022-02-13 01:40:10'),
(217, NULL, 'App\\Service', 'test', 'test,test2,test3', 'vsdfgdf', 'test,test2', 'asdasd', '101', 'test,test2', 'asdasd', '97', '2022-02-01 07:28:09', '2022-02-01 07:28:09'),
(218, 21, 'App\\Service', 'tester', 'tester,tessert,Kester', 'sfsfssd', 'sdsf,sdf,Kester', 'sdfs', NULL, 'sdsfsdf,sdfsdf,kester', 'sdfsdf kester', '99', '2022-02-01 07:34:29', '2022-02-01 08:30:57'),
(219, 22, 'App\\Service', 'Test', 'test', 'test', 'test', 'test', '121', 'test', 'test', '19', '2022-02-05 07:24:49', '2022-02-05 07:24:49'),
(220, 23, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-06 00:24:02', '2022-02-06 00:24:02'),
(221, 24, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-06 02:57:21', '2022-02-06 02:57:21'),
(222, 25, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-06 03:07:23', '2022-02-06 03:07:23'),
(223, 26, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-06 03:14:05', '2022-02-06 03:14:05'),
(224, 27, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-06 03:16:06', '2022-02-06 03:16:06'),
(225, 28, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-06 03:16:56', '2022-02-06 03:16:56'),
(226, 29, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-06 03:24:26', '2022-02-06 03:24:26'),
(227, 30, 'App\\Service', 'Molestias consequatu', 'Occaecat vel quaerat', 'Deserunt sunt occaec', '', '', NULL, '', '', NULL, '2022-02-06 07:58:30', '2022-02-06 07:58:30'),
(228, 31, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-07 23:32:27', '2022-02-07 23:32:27'),
(229, 32, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-07 23:33:02', '2022-02-07 23:33:02'),
(230, 33, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-07 23:33:39', '2022-02-07 23:33:39'),
(232, 34, 'App\\Service', 'Et similique eligend', 'Delectus iste et ex', 'Perspiciatis aut ve', '', '', NULL, '', '', NULL, '2022-02-09 04:49:25', '2022-02-09 04:49:25'),
(233, 35, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-10 04:08:29', '2022-02-10 04:08:29'),
(234, 36, 'App\\Service', 'Cleaning your house', 'cleaning', 'Cleaning your house by our experts', '', '', NULL, '', '', NULL, '2022-02-12 00:40:56', '2022-04-28 02:03:55'),
(235, 37, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-12 02:06:34', '2022-02-12 02:06:34'),
(236, 38, 'App\\Service', 'Test', 'test', 'test', '', '', NULL, '', '', NULL, '2022-02-12 03:50:06', '2022-02-12 03:50:06'),
(237, 39, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-02-12 04:07:24', '2022-02-12 04:07:24'),
(238, 40, 'App\\Service', 'Test', 'test', 'test', '', '', NULL, '', '', NULL, '2022-02-16 11:18:31', '2022-02-16 11:30:38'),
(239, 41, 'App\\Service', 'Test', NULL, '', '', '', NULL, '', '', NULL, '2022-02-17 17:40:47', '2022-04-28 09:34:39'),
(240, 42, 'App\\Service', 'Test', 'rest', 'test', '', '', NULL, '', '', NULL, '2022-02-17 17:45:07', '2022-02-17 17:45:07'),
(241, 37, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-21 03:39:26', '2022-04-21 03:39:26'),
(242, 43, 'App\\Page', '', '', '', '', '', NULL, '', '', NULL, '2022-04-21 05:28:48', '2022-05-12 15:37:07'),
(243, 38, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-23 00:24:57', '2022-04-23 00:24:57'),
(244, 39, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-23 00:29:11', '2022-04-23 00:29:11'),
(245, 40, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-24 00:14:43', '2022-04-24 00:14:43'),
(246, 41, 'App\\Service', 'Test', NULL, '', '', '', NULL, '', '', NULL, '2022-04-24 04:12:18', '2022-04-28 09:34:39'),
(247, 42, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-24 23:11:20', '2022-04-24 23:11:20'),
(248, 43, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-24 23:17:12', '2022-04-24 23:17:12'),
(249, 44, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-24 23:20:28', '2022-04-24 23:20:28'),
(250, 45, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-24 23:23:02', '2022-04-24 23:23:02'),
(251, 46, 'App\\Service', '', NULL, '', '', '', NULL, '', '', NULL, '2022-04-26 23:51:33', '2022-04-27 00:03:01'),
(252, 47, 'App\\Service', '', NULL, '', '', '', NULL, '', '', NULL, '2022-04-27 01:57:46', '2022-04-27 02:40:35'),
(253, 48, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-27 02:44:53', '2022-04-27 02:44:53'),
(254, 49, 'App\\Service', 'fsdfsd sf', 'sd fsd', 'fsdfgsdf', '', '', NULL, '', '', NULL, '2022-04-27 02:57:48', '2022-04-28 09:39:26'),
(255, 50, 'App\\Service', '', NULL, '', '', '', NULL, '', '', NULL, '2022-04-28 07:57:51', '2022-04-28 09:40:16'),
(256, 51, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-28 07:59:33', '2022-04-28 07:59:33'),
(257, 52, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-28 08:09:48', '2022-04-28 08:09:48'),
(258, 53, 'App\\Service', '', NULL, '', '', '', NULL, '', '', NULL, '2022-04-28 08:31:38', '2022-04-28 09:38:18'),
(259, 54, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-28 08:35:15', '2022-04-28 08:35:15'),
(260, 55, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-28 08:37:48', '2022-04-28 08:37:48'),
(261, 56, 'App\\Service', '', NULL, '', '', '', NULL, '', '', NULL, '2022-04-28 08:47:42', '2022-04-29 14:07:09'),
(262, 57, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-28 03:15:23', '2022-04-28 03:15:23'),
(263, 58, 'App\\Service', '', '', '', '', '', NULL, '', '', NULL, '2022-04-29 12:26:15', '2022-04-29 12:26:15');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_06_180949_create_admins_table', 1),
(6, '2019_12_07_082524_create_static_options_table', 1),
(7, '2019_12_08_171750_create_counterups_table', 1),
(8, '2019_12_09_063224_create_testimonials_table', 1),
(10, '2019_12_10_125636_create_support_infos_table', 1),
(15, '2019_12_13_221931_create_languages_table', 1),
(27, '2020_04_14_082508_create_media_uploads_table', 4),
(31, '2020_07_22_132250_create_popup_builders_table', 5),
(33, '2020_04_20_170818_create_orders_table', 6),
(34, '2020_04_21_142420_create_payment_logs_table', 7),
(38, '2021_03_24_140243_create_menus_table', 11),
(41, '2021_03_27_113444_create_counterups_table', 14),
(46, '2020_06_14_081955_create_widgets_table', 16),
(47, '2019_12_10_125607_create_social_icons_table', 17),
(59, '2021_04_10_060146_create_infobar_right_icons_table', 18),
(60, '2021_04_11_063158_create_blogs_table', 18),
(61, '2021_04_11_063236_create_blog_langs_table', 18),
(62, '2021_04_11_063420_create_blog_categories_table', 18),
(63, '2021_04_11_063445_create_blog_category_langs_table', 18),
(64, '2019_12_28_140343_create_key_features_table', 19),
(65, '2021_04_18_132805_create_header_sliders_table', 20),
(67, '2020_04_20_073746_create_quotes_table', 22),
(68, '2021_04_24_132853_create_progress_bars_table', 23),
(70, '2021_04_15_105203_create_appointment_bookings_table', 24),
(71, '2021_04_15_105212_create_appointment_reviews_table', 24),
(73, '2021_04_15_121056_create_appointment_booking_times_table', 24),
(76, '2020_07_08_132910_create_product_cupons_table', 26),
(77, '2020_07_08_161737_create_product_shippings_table', 26),
(80, '2020_07_13_124351_create_product_orders_table', 26),
(81, '2020_07_21_053307_create_product_ratings_table', 26),
(82, '2021_04_15_105219_create_appointment_categories_table', 27),
(83, '2021_04_26_090448_create_appointment_category_langs_table', 27),
(84, '2021_04_15_105154_create_appointments_table', 28),
(85, '2021_04_26_095611_create_appointment_langs_table', 28),
(88, '2020_07_09_084606_create_product_categories_table', 29),
(89, '2021_04_28_104831_create_product_category_langs_table', 29),
(93, '2021_04_28_110990_create_products_table', 30),
(94, '2021_04_28_110995_create_products_langs_table', 30),
(102, '2020_01_25_155448_create_pages_table', 31),
(106, '2021_04_30_113454_create_page_langs_table', 32),
(107, '2021_04_30_141804_create_service_category_langs_table', 32),
(108, '2020_01_23_162404_create_service_categories_table', 33),
(109, '2021_05_01_152404_create_services_table', 34),
(110, '2021_05_01_152405_create_services_langs_table', 35),
(111, '2021_05_06_092507_create_price_plans_table', 36),
(112, '2021_05_06_092508_create_price_plan_langs_table', 36),
(113, '2021_05_18_062316_create_practice_areas_table', 37),
(114, '2021_05_18_062351_create_cases_table', 37),
(115, '2021_05_18_062404_create_attorneys_table', 37),
(116, '2021_05_19_111058_create_practice_area_categories_table', 37),
(117, '2021_05_19_111128_create_practice_area_category_langs_table', 37),
(119, '2021_05_20_045324_create_practice_area_langs_table', 38),
(120, '2021_05_20_120226_create_case_categories_table', 39),
(121, '2021_05_20_120508_create_case_category_langs_table', 39),
(122, '2021_05_20_120550_create_case_langs_table', 39),
(123, '2021_05_22_114053_create_attorney_langs_table', 40),
(124, '2021_05_24_050431_create_consulations_table', 41),
(125, '2021_08_17_093522_create_blog_categories_table', 42),
(126, '2021_08_17_093537_create_blogs_table', 42),
(127, '2021_08_18_101922_create_pages_table', 43),
(129, '2021_08_19_042434_create_event_categories_table', 45),
(130, '2021_08_19_042457_create_events_table', 45),
(131, '2021_08_19_130619_create_donations_table', 46),
(132, '2021_08_21_051439_create_contributions_table', 47),
(133, '2021_08_26_130940_create_social_icons_table', 48),
(134, '2021_08_28_061248_create_contribution_payment_logs_table', 49),
(135, '2021_08_28_061308_create_event_payment_logs_table', 49),
(136, '2021_08_28_120014_create_event_attendances_table', 50),
(137, '2021_08_28_122103_create_event_attendances_table', 51),
(138, '2021_09_02_044018_create_permission_tables', 52),
(139, '2021_09_02_060623_create_admin_roles_table', 53),
(140, '2021_09_26_094904_add_column_soft_deletes_to_blogs_table', 54),
(141, '2021_09_27_051529_create_blog_categories_table', 55),
(142, '2021_09_27_051607_create_blogs_table', 55),
(144, '2021_09_27_051709_create_meta_data_table', 55),
(146, '2021_09_27_064329_new_column_status_to_blogs_table', 56),
(147, '2021_10_04_060411_new_column_page_builder_status_to_page_table', 57),
(149, '2021_10_04_063133_create_page_builders_table', 58),
(150, '2021_10_04_122027_new_column_layout_to_pages_table', 59),
(151, '2021_10_07_054604_create_form_builders_table', 60),
(154, '2021_10_09_074153_add_new_column_to_media_uploads_table', 62),
(155, '2021_10_12_070221_new_column_permissions_to_users_table', 63),
(156, '2021_10_13_053529_create_tags_table', 64),
(157, '2021_10_13_054320_add_new_column_tags_to_blogs_table', 64),
(158, '2021_10_13_111623_create_blog_comments_table', 65),
(159, '2021_10_13_112008_add_new_column_image_to_users_table', 66),
(160, '2021_10_13_134025_add_new_column_social_to_users_table', 67),
(161, '2021_10_14_044046_add_new_column_parent_to_blog_comments_table', 68),
(170, '2021_10_21_095323_new_column_sidebar_to_pages_table', 76),
(171, '2021_10_24_063221_new_column_class_to_pages_table', 77),
(172, '2021_10_26_122003_add_column_breadcrumb_status_to_pages_table', 78),
(173, '2021_10_26_133647_add_column_footer_variant_to_pages_table', 79),
(174, '2021_10_30_041624_add_column_widget_style_to_pages_table', 80),
(175, '2021_10_30_044614_add_page_column_to_pages_table', 81),
(176, '2021_11_10_142735_add_column_image_blog_categories_table', 82),
(180, '2021_11_20_094154_add_column_description_to_users_table', 84),
(181, '2021_11_20_094906_add_column_description_to_admins_table', 85),
(183, '2014_10_12_000000_create_users_table', 86),
(184, '2021_11_28_090735_create_accountdeactives_table', 87),
(187, '2021_11_29_061320_create_categories_table', 88),
(190, '2021_11_30_073640_create_subcategories_table', 90),
(191, '2021_11_30_105303_create_services_table', 91),
(193, '2021_12_01_115855_create_serviceincludes_table', 92),
(196, '2021_12_01_131813_add_price_to_services', 93),
(197, '2021_12_02_072539_add_is_service_on_to_services_table', 94),
(198, '2021_12_01_120021_create_serviceadditionals_table', 95),
(199, '2021_12_01_120241_create_servicebenifits_table', 95),
(200, '2021_11_30_053538_create_locations_table', 96),
(201, '2021_12_05_050949_create_service_cities_table', 97),
(202, '2021_12_05_051309_create_service_areas_table', 97),
(203, '2021_12_07_043941_create_countries_table', 98),
(207, '2021_12_13_062919_create_schedules_table', 99),
(210, '2021_12_14_070939_create_days_table', 100),
(211, '2021_12_17_093220_create_orders_table', 101),
(212, '2021_12_17_171630_create_order_includes_table', 102),
(213, '2021_12_17_171651_create_order_additionals_table', 102),
(214, '2021_12_20_070438_create_reviews_table', 103),
(215, '2022_01_06_131123_create_brands_table', 104),
(216, '2022_01_17_041615_create_notifications_table', 105),
(217, '2022_01_17_101451_create_service_coupons_table', 106),
(218, '2022_01_23_041226_create_support_tickets_table', 107),
(220, '2022_01_23_105302_create_support_ticket_messages_table', 108),
(221, '2022_01_24_135321_create_payout_requests_table', 109),
(222, '2022_01_26_074206_create_to_do_lists_table', 110),
(223, '2022_01_26_141520_create_admin_commissions_table', 111),
(224, '2022_02_07_123947_create_amount_settings_table', 112),
(225, '2022_03_17_051426_add_extra_fields_to_user_table', 113),
(226, '2022_03_17_051428_add_extra_fields_to_user_table', 114),
(227, '2022_03_22_075312_create_seller_verifies_table', 115),
(228, '2022_03_23_064136_add_manual_payment_image_to_orders_table', 115),
(229, '2022_03_27_042022_add_order_complete_request_to_orders_table', 115),
(230, '2022_03_27_100209_add_cancel_order_money_return_to_orders_table', 115),
(231, '2022_04_01_040848_change_data_type_of_orders_table', 116),
(232, '2022_04_01_040848_change_data_type_of_orders_table', 116),
(233, '2022_04_01_041340_change_data_type_of_seller_verifies_table', 116),
(234, '2022_04_01_041340_change_data_type_of_seller_verifies_table', 116),
(235, '2022_04_01_041521_change_data_type_of_serviceadditionals_table', 116),
(236, '2022_04_01_041521_change_data_type_of_serviceadditionals_table', 116),
(237, '2022_04_01_041655_change_data_type_of_servicebenifits_table', 116),
(238, '2022_04_01_041655_change_data_type_of_servicebenifits_table', 116),
(239, '2022_04_01_042025_change_data_type_of_serviceincludes_table', 116),
(240, '2022_04_01_042025_change_data_type_of_serviceincludes_table', 116),
(241, '2022_04_01_042222_change_data_type_of_services_table', 116),
(242, '2022_04_01_042222_change_data_type_of_services_table', 116),
(243, '2022_04_01_042426_change_data_type_of_service_coupons_table', 116),
(244, '2022_04_01_042426_change_data_type_of_service_coupons_table', 116),
(245, '2022_04_01_042542_change_data_type_of_support_tickets_table', 116),
(246, '2022_04_01_042542_change_data_type_of_support_tickets_table', 116),
(247, '2022_04_01_042813_change_data_type_of_to_do_lists_table', 116),
(248, '2022_04_01_042813_change_data_type_of_to_do_lists_table', 116),
(249, '2019_12_14_000001_create_personal_access_tokens_table', 117),
(250, '2022_04_20_052902_create_sliders_table', 118),
(252, '2022_04_21_040113_add_sold_count_to_services_table', 119),
(256, '2022_04_24_072211_create_online_service_faqs_table', 121),
(259, '2022_04_24_085125_add_online_service_price_to_services_table', 122),
(260, '2022_04_24_095152_add_delivery_days_to_services_table', 122),
(261, '2022_04_24_095231_add_revision_to_services_table', 122),
(262, '2022_04_25_040102_add_is_service_online_to_services_table', 123),
(263, '2022_04_27_034803_add_is_order_online_to_orders_table', 124),
(264, '2022_04_27_053223_add_image_gallery_to_services_table', 125),
(265, '2022_04_27_073345_add_video_to_services_table', 126),
(266, '2022_04_27_073345_add_country_code_column_to_users_table', 127),
(267, '2022_04_27_073345_add_mobile_icon_fields_to_categories_table', 127),
(268, '2022_06_09_124645_create_reports_table', 128),
(272, '2022_08_05_193745_create_requirements_table', 129),
(276, '2022_09_01_132402_create_milestone_projects_table', 130),
(278, '2022_09_07_063653_create_profiles_table', 132),
(282, '2022_09_07_144027_create_project_details_table', 134),
(283, '2021_11_29_063320_create_projects_table', 135),
(289, '2022_09_09_144605_create_chats_table', 140),
(291, '2022_09_13_085131_create_messages_table', 141),
(297, '2022_09_12_090605_create_project_deliveries_table', 144),
(300, '2022_09_16_074735_create_payments_table', 145);

-- --------------------------------------------------------

--
-- Table structure for table `milestone_projects`
--

CREATE TABLE `milestone_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requirement_id` bigint(20) NOT NULL,
  `service_provider_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` bigint(20) NOT NULL,
  `service_provider_cost` bigint(20) NOT NULL,
  `timeframe` int(11) NOT NULL COMMENT 'days',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0=pending, 1=started, 2=completed, 3=rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `milestone_projects`
--

INSERT INTO `milestone_projects` (`id`, `requirement_id`, `service_provider_id`, `name`, `cost`, `service_provider_cost`, `timeframe`, `description`, `attachment`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 404, 'first', 5, 2, 2, 'lorem ipusm', '05-09-2022-150513.png', 0, '2022-09-05 10:05:13', '2022-09-05 10:05:13'),
(4, 2, 404, 'Second milestone', 10, 4, 15, 'lorem ipsum', '06-09-2022-154009.png', 0, '2022-09-06 10:40:09', '2022-09-06 10:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Admin', 18),
(1, 'App\\Admin', 19),
(1, 'App\\Admin', 22),
(1, 'App\\Admin', 25),
(1, 'App\\Admin', 26),
(1, 'App\\Admin', 27),
(2, 'App\\Admin', 16),
(2, 'App\\Admin', 23),
(2, 'App\\Admin', 24),
(3, 'App\\Admin', 17),
(3, 'App\\Admin', 20),
(3, 'App\\Admin', 21),
(4, 'App\\Admin', 28),
(4, 'App\\Admin', 29),
(4, 'App\\Admin', 30),
(4, 'App\\Admin', 31),
(4, 'App\\Admin', 32);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('47ba56b2-9263-4a53-a5a0-290aa197f5bf', 'App\\Notifications\\OrderNotification', 'App\\User', 1, '{\"order_id\":\"507\",\"service_id\":\"2\",\"seller_id\":\"1\",\"buyer_id\":399,\"order_message\":\"You have a new order\"}', NULL, '2022-08-17 13:12:03', '2022-08-17 13:12:03'),
('e27a616d-b22f-4394-80b1-68e42f23c3f8', 'App\\Notifications\\OrderNotification', 'App\\User', 1, '{\"order_id\":\"506\",\"service_id\":\"53\",\"seller_id\":\"1\",\"buyer_id\":395,\"order_message\":\"You have a new order\"}', NULL, '2022-08-01 17:02:26', '2022-08-01 17:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `online_service_faqs`
--

CREATE TABLE `online_service_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) DEFAULT NULL,
  `seller_id` bigint(20) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_service_faqs`
--

INSERT INTO `online_service_faqs` (`id`, `service_id`, `seller_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 41, 1, 'What is...', 'Desc....', NULL, '2022-04-28 03:06:56'),
(2, 41, 1, 'How much...', 'Desc....', NULL, '2022-04-28 03:06:56'),
(8, 41, 1, 'How to...', 'Desc....', NULL, '2022-04-28 03:06:56'),
(9, 41, 1, 'When I...', 'Desc....', NULL, '2022-04-28 03:06:56'),
(10, 49, 1, 'werwer w', 'wer werw', NULL, NULL),
(11, 49, 1, 'werwer', 'werwer', NULL, NULL),
(12, 56, 1, 'dhjdfsd', 'sdfhsds', NULL, NULL),
(13, 53, 1, 'Faq', 'Faq Details', NULL, '2022-04-28 03:02:09'),
(14, 50, 1, 'Faq', 'Faq Description', NULL, '2022-04-28 03:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` bigint(11) DEFAULT NULL,
  `area` bigint(11) DEFAULT NULL,
  `country` bigint(11) DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_fee` double NOT NULL,
  `extra_service` double NOT NULL,
  `sub_total` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` double DEFAULT NULL,
  `commission_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission_charge` double DEFAULT NULL,
  `commission_amount` double DEFAULT NULL,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=pending, 1=active, 2=completed, 3=delivered, 4=cancelled',
  `is_order_online` int(11) NOT NULL DEFAULT 0,
  `order_complete_request` int(11) NOT NULL DEFAULT 0,
  `cancel_order_money_return` int(11) NOT NULL DEFAULT 0,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `manual_payment_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `service_id`, `seller_id`, `buyer_id`, `name`, `email`, `phone`, `post_code`, `address`, `city`, `area`, `country`, `date`, `schedule`, `package_fee`, `extra_service`, `sub_total`, `tax`, `total`, `coupon_code`, `coupon_type`, `coupon_amount`, `commission_type`, `commission_charge`, `commission_amount`, `payment_gateway`, `payment_status`, `status`, `is_order_online`, `order_complete_request`, `cancel_order_money_return`, `transaction_id`, `order_note`, `created_at`, `updated_at`, `manual_payment_image`) VALUES
(506, 53, 1, 395, 'anshul', 'anshulswarup@yahoo.com', '8779235956', '121001', 'flat 1001, Tower 4, Lakeview Apartment, Sanjay Gandhi Memorial Nagar', NULL, NULL, NULL, '00.00.00', '00.00.00', 140, 0, 140, 0, 140, '', '', 0, 'percentage', 10, 14, 'manual_payment', 'complete', 0, 1, 0, 0, NULL, NULL, '2022-08-01 17:02:26', '2022-08-01 17:04:42', 'manual_attachment_1659358946.jpg'),
(507, 2, 1, 399, 'choc', 'chocovidsofficial@gmail.com', '12345647567', 'asdasd', 'asdasd', 1, 1, 1, 'Wed August 17 2022', '12.00AM-01.00PM', 40, 0, 40, 2, 42, '', '', 0, 'percentage', 10, 4, 'cash_on_delivery', 'pending', 0, 0, 0, 0, NULL, 'asdasd', '2022-08-17 13:12:03', '2022-08-17 13:12:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_additionals`
--

CREATE TABLE `order_additionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_includes`
--

CREATE TABLE `order_includes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` double NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_includes`
--

INSERT INTO `order_includes` (`id`, `order_id`, `title`, `price`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1064, 506, 'Digital Merketing', 0, 0, NULL, '2022-08-01 17:02:26', '2022-08-01 17:02:26'),
(1065, 506, 'Company Profile Build', 0, 0, NULL, '2022-08-01 17:02:26', '2022-08-01 17:02:26'),
(1066, 506, 'Business Growing', 0, 0, NULL, '2022-08-01 17:02:26', '2022-08-01 17:02:26'),
(1067, 506, 'How to Profit', 0, 0, NULL, '2022-08-01 17:02:26', '2022-08-01 17:02:26'),
(1068, 507, 'AC Change', 10, 1, NULL, '2022-08-17 13:12:03', '2022-08-17 13:12:03'),
(1069, 507, 'Ac Repair', 30, 1, NULL, '2022-08-17 13:12:03', '2022-08-17 13:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `page_builder_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sidebar_layout` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `navbar_variant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'container',
  `back_to_top` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcrumb_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_variant` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widget_style` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_column` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `right_column` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `page_content`, `visibility`, `status`, `created_at`, `updated_at`, `page_builder_status`, `layout`, `sidebar_layout`, `navbar_variant`, `page_class`, `back_to_top`, `breadcrumb_status`, `footer_variant`, `widget_style`, `left_column`, `right_column`) VALUES
(16, 'Home Page One', 'home-page-one', '[object Object]', 'all', 'publish', '2021-10-04 07:23:34', '2022-04-21 05:32:24', 'on', 'normal_layout', NULL, '01', 'nav-absolute', NULL, NULL, '01', NULL, NULL, NULL),
(22, 'Home Page Two', 'home-page-two', '[object Object]', 'all', 'publish', '2021-10-22 22:35:47', '2022-02-13 08:15:33', 'on', 'normal_layout', NULL, '02', 'nav-absolute', 'style-02', NULL, '02', NULL, NULL, NULL),
(31, 'About', 'about', '[object Object]', 'all', 'publish', '2021-11-24 06:44:22', '2022-02-12 04:39:56', 'on', 'normal_layout', NULL, '02', NULL, NULL, 'on', '02', NULL, NULL, NULL),
(32, 'Service List', 'service-list', '[object Object]', 'all', 'publish', '2021-11-24 06:52:32', '2022-02-12 04:42:56', 'on', 'normal_layout', NULL, '02', NULL, NULL, 'on', '02', NULL, NULL, NULL),
(34, 'Contact', 'contact', '[object Object]', 'all', 'publish', '2021-11-24 06:54:28', '2022-02-12 04:28:37', 'on', 'normal_layout', NULL, '02', NULL, NULL, 'on', '02', NULL, NULL, NULL),
(35, 'Blog', 'blog', '[object Object]', 'all', 'publish', '2021-11-24 06:56:35', '2022-02-12 04:42:04', 'on', 'normal_layout', NULL, '02', NULL, NULL, 'on', '02', NULL, NULL, NULL),
(38, 'Home Page Three', 'home-page-three', '[object Object]', 'all', 'publish', '2022-01-11 23:30:17', '2022-08-08 23:34:35', 'on', 'normal_layout', NULL, '02', NULL, 'style-03', NULL, '02', NULL, NULL, NULL),
(39, 'Home Page Four', 'home-page-four', '[object Object]', 'all', 'publish', '2022-01-12 22:21:43', '2022-02-13 08:05:10', 'on', 'normal_layout', NULL, '02', 'nav-absolute', 'style-03', NULL, '02', NULL, NULL, NULL),
(40, 'Faq', 'faq', '[object Object]', 'all', 'publish', '2022-01-13 06:53:28', '2022-02-12 04:40:25', 'on', 'normal_layout', NULL, '02', NULL, NULL, 'on', '02', NULL, NULL, NULL),
(41, 'Privacy Policy', 'privacy-policy', '<h1 style=\"outline: 0px; -webkit-font-smoothing: antialiased; line-height: 1.08333; font-size: 48px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\">How can I get a privacy policy on my website? A GDPR compliant privacy policy</h1><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\"><br style=\"outline: 0px; -webkit-font-smoothing: antialiased;\"></p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\">The privacy policy can be written as an independent page on your website, and be made accessible as a link in the header or footer of your website, or on your ‘About’ page. It may also be hosted by a privacy policy-service with a link from your homepage. Basically, it doesn’t matter where you choose to place it, as long as your users have access to it. The privacy policy is a legal text. The phrasing depends on which jurisdictions your website falls under and how&nbsp; website handles data.</p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\"><br style=\"outline: 0px; -webkit-font-smoothing: antialiased;\"></p><h1 style=\"outline: 0px; -webkit-font-smoothing: antialiased; line-height: 1.08333; font-size: 16px; color: rgb(22, 34, 42); font-family: Gotham, sans-serif;\"><span style=\"outline: 0px; -webkit-font-smoothing: antialiased; font-weight: bolder;\">All websites are different. We always recommend that you consult a lawyer to ensure that your privacy policy is compliant with all applicable laws.&nbsp;</span></h1><h1 style=\"outline: 0px; -webkit-font-smoothing: antialiased; line-height: 1.08333; font-size: 16px; color: rgb(22, 34, 42); font-family: Gotham, sans-serif;\"><span style=\"outline: 0px; -webkit-font-smoothing: antialiased; font-weight: bolder;\"><br style=\"outline: 0px; -webkit-font-smoothing: antialiased;\"></span></h1><h1 style=\"outline: 0px; -webkit-font-smoothing: antialiased; line-height: 1.08333; font-size: 16px; color: rgb(22, 34, 42); font-family: Gotham, sans-serif;\"><span style=\"outline: 0px; -webkit-font-smoothing: antialiased; font-weight: bolder;\"><br style=\"outline: 0px; -webkit-font-smoothing: antialiased;\"></span>However, this might seem as a large expense if you are, for instance, a hobby blogger or small business. What you should&nbsp;<a href=\"https://medium.com/@StartupPolicy/five-reasons-why-copying-someone-else-s-terms-of-use-and-privacy-policy-is-a-bad-idea-fd8d126ac0b3\" style=\"background-color: rgb(255, 255, 255); -webkit-font-smoothing: antialiased; color: inherit;\">never do, is to copy a privacy policy from some other website</a>.</h1><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\">That is also why using a privacy policy generator can be a hazardous thing, since you must be very careful to include all the specific information of your website, and not just have privacy policy generator spit out a default one that isn\'t aligned with your domain</p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\"><br style=\"outline: 0px; -webkit-font-smoothing: antialiased;\"></p><h5 style=\"outline: 0px; -webkit-font-smoothing: antialiased; line-height: 1.08333; font-size: 16px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\">GDPR&nbsp;<span style=\"outline: 0px; -webkit-font-smoothing: antialiased; font-weight: bolder;\">privacy policy templates &amp; privacy policy generators</span></h5><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\">There exists numerous tools for creating privacy policies, and privacy policy templates and privacy policy generators on the internet.</p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\">Some are free and others come at a price. Some are not GDPR compliant privacy policies.</p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\"><br style=\"outline: 0px; -webkit-font-smoothing: antialiased;\"></p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\">1) Maintain all the content properly</p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\">2) Ensure your all input is right</p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\">3) if you can do multiple task that will be plus</p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\"><br style=\"outline: 0px; -webkit-font-smoothing: antialiased;\"></p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\">There policy is the numerous tools for creating privacy policies, and privacy policy templates and privacy policy generators on the internet. Some are free and others come at a price. Some are not GDPR compliant privacy policies.</p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\"><br style=\"outline: 0px; -webkit-font-smoothing: antialiased;\"></p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(22, 34, 42); font-family: Gotham, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\"><span style=\"outline: 0px; -webkit-font-smoothing: antialiased; font-weight: bolder;\">Note :&nbsp;</span>just have privacy policy generator spit out a default one that isn\'t aligned with your domain So it\'s very important loyal technical theury of our reservation.</p>', 'all', 'publish', '2022-01-13 07:37:38', '2022-02-13 01:39:08', NULL, 'normal_layout', NULL, '02', NULL, NULL, 'on', '02', NULL, NULL, NULL),
(42, 'Terms and Conditions', 'terms-and-conditions', '<h1 style=\"outline: 0px; -webkit-font-smoothing: antialiased; line-height: 1.08333; font-size: 48px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\">Generate Terms &amp; Conditions for websites</h1><h2 style=\"outline: 0px; -webkit-font-smoothing: antialiased; line-height: 1.08333; font-size: 48px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\"><div style=\"outline: 0px; -webkit-font-smoothing: antialiased; font-size: 16px;\"><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: var(--paragraph-color); font-family: var(--body-font); hyphens: auto; line-height: 1.6;\"><br style=\"outline: 0px; -webkit-font-smoothing: antialiased;\"></p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(74, 80, 115); font-family: &quot;Nunito Sans&quot;, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\"><span style=\"outline: 0px; -webkit-font-smoothing: antialiased; font-weight: bolder;\">1)&nbsp;</span>Creating a Terms &amp; Conditions for your application or website can take a lot of time. You could either spend tons of money on hiring a lawyer, or you could simply use our service and get a unique Terms &amp; Conditions fully customized to your website. You can also generate your Terms &amp; Conditions for website templates like:</p></div><div style=\"outline: 0px; -webkit-font-smoothing: antialiased; font-size: 16px;\"><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: var(--paragraph-color); font-family: &quot;Nunito Sans&quot;, sans-serif; hyphens: auto; line-height: 1.6; font-size: 1rem;\">For any app you are developing you will need a Terms &amp; Conditions to launch it. Termify can help you generate the best for the case and get your app ready for review.</p></div></h2><h4 style=\"outline: 0px; -webkit-font-smoothing: antialiased; line-height: 1.2381; font-size: 20px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\"><br style=\"outline: 0px; -webkit-font-smoothing: antialiased;\"></h4><h6 style=\"outline: 0px; -webkit-font-smoothing: antialiased; line-height: 1.08333; font-size: 14px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\"><span style=\"outline: 0px; -webkit-font-smoothing: antialiased; font-weight: bolder;\">Many platforms like facebook are requiring users that are submitting their official apps to submit a Terms &amp; Conditions even if you are not collecting any data from your users. Generate your Terms &amp; Conditions and get your unique link to submit to those platforms.</span></h6><h2 style=\"outline: 0px; -webkit-font-smoothing: antialiased; line-height: 1.08333; font-size: 48px; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\"><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\"><br style=\"outline: 0px; -webkit-font-smoothing: antialiased;\"></p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(74, 80, 115); font-family: &quot;Nunito Sans&quot;, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\"><span style=\"outline: 0px; -webkit-font-smoothing: antialiased; font-weight: bolder;\">2)</span>&nbsp;Creating a Terms &amp; Conditions for your application or website can take a lot of time. You could either spend tons of money on hiring a lawyer, or you could simply use our service and get a unique Terms &amp; Conditions fully customized to your website. You can also generate your Terms &amp; Conditions for website templates like:</p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\"><br style=\"outline: 0px; -webkit-font-smoothing: antialiased;\"></p><p style=\"outline: 0px; -webkit-font-smoothing: antialiased; color: rgb(74, 80, 115); font-family: &quot;Nunito Sans&quot;, sans-serif; hyphens: auto; line-height: 1.6; font-size: 16px;\"><span style=\"outline: 0px; -webkit-font-smoothing: antialiased; font-weight: bolder;\">Note:</span>&nbsp;For any app you are developing you will need a Terms &amp; Conditions to launch it. Termify can help you generate the best for the case and get your app ready for review. Many platforms like facebook are requiring users that are submitting their official apps to submit a Terms &amp; Conditions even if you are not collecting any data from your users. Generate your Terms &amp; Conditions and get your unique link to submit to those platforms.</p></h2>', 'all', 'publish', '2022-01-14 22:15:25', '2022-02-13 01:40:10', NULL, 'normal_layout', NULL, '02', NULL, NULL, 'on', '02', NULL, NULL, NULL),
(43, 'All Services', 'all-services', NULL, 'all', 'publish', '2022-04-21 05:28:48', '2022-05-12 15:37:07', NULL, 'normal_layout', NULL, '02', NULL, NULL, 'on', '01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_builders`
--

CREATE TABLE `page_builders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `addon_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addon_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addon_namespace` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addon_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addon_order` bigint(20) UNSIGNED DEFAULT NULL,
  `addon_page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `addon_page_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addon_settings` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_builders`
--

INSERT INTO `page_builders` (`id`, `addon_name`, `addon_type`, `addon_namespace`, `addon_location`, `addon_order`, `addon_page_id`, `addon_page_type`, `addon_settings`, `created_at`, `updated_at`) VALUES
(8, 'AboutAuthorStyleOne', 'new', 'App\\PageBuilder\\Addons\\Common\\AboutAuthorStyleOne', 'dynamic_page_with_sidebar', NULL, 15, 'dynamic_page_with_sidebar', 'a:17:{s:10:\"addon_name\";s:19:\"AboutAuthorStyleOne\";s:15:\"addon_namespace\";s:68:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xDb21tb25cQWJvdXRBdXRob3JTdHlsZU9uZQ==\";s:10:\"addon_type\";s:3:\"new\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";N;s:13:\"addon_page_id\";s:2:\"15\";s:15:\"addon_page_type\";s:25:\"dynamic_page_with_sidebar\";s:13:\"header_eleven\";a:14:{s:14:\"subtitle_en_GB\";a:1:{i:0;s:12:\"about author\";}s:11:\"title_en_GB\";a:1:{i:0;N;}s:17:\"description_en_GB\";a:1:{i:0;N;}s:17:\"button_text_en_GB\";a:1:{i:0;N;}s:16:\"button_url_en_GB\";a:1:{i:0;N;}s:17:\"button_icon_en_GB\";a:1:{i:0;N;}s:17:\"right_image_en_GB\";a:1:{i:0;N;}s:11:\"subtitle_ar\";a:1:{i:0;N;}s:8:\"title_ar\";a:1:{i:0;N;}s:14:\"description_ar\";a:1:{i:0;N;}s:14:\"button_text_ar\";a:1:{i:0;N;}s:13:\"button_url_ar\";a:1:{i:0;N;}s:14:\"button_icon_ar\";a:1:{i:0;N;}s:14:\"right_image_ar\";a:1:{i:0;N;}}s:10:\"button_url\";N;s:12:\"author_image\";N;s:11:\"author_name\";N;s:19:\"author_name_summber\";N;s:17:\"summer_note_image\";N;s:18:\"author_name_slider\";s:2:\"50\";s:17:\"author_name_color\";N;s:11:\"padding_top\";s:3:\"200\";s:14:\"padding_bottom\";s:3:\"300\";}', '2021-10-04 07:18:03', '2021-10-04 07:18:03'),
(37, 'ContactArea', 'update', 'App\\PageBuilder\\Addons\\ContactArea\\ContactArea', 'dynamic_page', 1, 19, 'dynamic_page', 'a:14:{s:2:\"id\";s:2:\"37\";s:10:\"addon_name\";s:11:\"ContactArea\";s:15:\"addon_namespace\";s:64:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xDb250YWN0QXJlYVxDb250YWN0QXJlYQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"19\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:11:\"title_en_GB\";s:28:\"Have Any Query? Send Message\";s:8:\"title_ar\";s:55:\"هل لديك أي استفسار؟ أرسل رسالة\";s:28:\"contact_page_contact_info_01\";a:4:{s:11:\"title_en_GB\";a:3:{i:0;s:8:\"Address:\";i:1;s:6:\"Phone:\";i:2;s:6:\"Email:\";}s:17:\"description_en_GB\";a:3:{i:0;s:44:\"2779 Rubaiyat Road,\r\nTraverse City, MI 49684\";i:1;s:30:\"+012 789654321\r\n+969 123456789\";i:2;s:34:\"company@mail.com\r\ncontact@mail.com\";}s:8:\"title_ar\";a:3:{i:0;s:11:\"عنوان:\";i:1;s:9:\"هاتف:\";i:2;s:30:\"بريد الالكتروني:\";}s:14:\"description_ar\";a:3:{i:0;s:44:\"2779 Rubaiyat Road,\r\nTraverse City, MI 49684\";i:1;s:30:\"+012 789654321\r\n+969 123456789\";i:2;s:34:\"company@mail.com\r\ncontact@mail.com\";}}s:14:\"custom_form_id\";s:1:\"1\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";}', '2021-10-06 23:52:42', '2021-11-21 11:02:16'),
(38, 'GoogleMap', 'update', 'App\\PageBuilder\\Addons\\Common\\GoogleMap', 'dynamic_page', 2, 19, 'dynamic_page', 'a:10:{s:2:\"id\";s:2:\"38\";s:10:\"addon_name\";s:9:\"GoogleMap\";s:15:\"addon_namespace\";s:52:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xDb21tb25cR29vZ2xlTWFw\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"2\";s:13:\"addon_page_id\";s:2:\"19\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:8:\"location\";s:22:\"Avenue Afton, MN 55001\";s:10:\"map_height\";s:3:\"500\";}', '2021-10-07 01:44:43', '2021-11-21 10:49:23'),
(39, 'ImageGalleryMasonry', 'update', 'App\\PageBuilder\\Addons\\ImageGallery\\ImageGalleryMasonry', 'dynamic_page', 1, 20, 'dynamic_page', 'a:16:{s:2:\"id\";s:2:\"39\";s:10:\"addon_name\";s:19:\"ImageGalleryMasonry\";s:15:\"addon_namespace\";s:76:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xJbWFnZUdhbGxlcnlcSW1hZ2VHYWxsZXJ5TWFzb25yeQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"20\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:10:\"categories\";a:3:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";}s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"9\";s:17:\"pagination_status\";s:2:\"on\";s:20:\"pagination_alignment\";s:11:\"text-center\";s:11:\"padding_top\";s:3:\"110\";s:14:\"padding_bottom\";s:3:\"110\";}', '2021-10-09 00:19:18', '2021-10-09 05:31:18'),
(46, 'BlogGridTravel', 'update', 'App\\PageBuilder\\Addons\\Blog\\BlogGridTravel', 'dynamic_page', 1, 18, 'dynamic_page', 'a:22:{s:2:\"id\";s:2:\"46\";s:10:\"addon_name\";s:14:\"BlogGridTravel\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCbG9nXEJsb2dHcmlkVHJhdmVs\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"18\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:16:\"share_text_en_GB\";s:5:\"Share\";s:13:\"share_text_ar\";s:10:\"يشارك\";s:10:\"categories\";s:1:\"2\";s:15:\"play_icon_color\";s:18:\"rgb(234, 244, 248)\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"4\";s:7:\"columns\";s:8:\"col-lg-6\";s:9:\"name_icon\";s:11:\"las la-user\";s:9:\"date_icon\";s:12:\"las la-clock\";s:10:\"share_icon\";s:19:\"las la-share-square\";s:20:\"pagination_alignment\";s:11:\"text-center\";s:11:\"padding_top\";s:1:\"0\";s:14:\"padding_bottom\";s:3:\"100\";}', '2021-10-18 03:58:08', '2021-11-17 19:42:06'),
(59, 'HeaderStyleOne', 'update', 'App\\PageBuilder\\Addons\\Header\\HeaderStyleOne', 'dynamic_page', 1, 23, 'dynamic_page', 'a:18:{s:2:\"id\";s:2:\"59\";s:10:\"addon_name\";s:20:\"HeaderStyleOne\";s:15:\"addon_namespace\";s:68:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIZWFkZXJcSGVhZGVyQXJlYVN0eWxlVGhyZWU=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"23\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:11:\"title_en_GB\";s:5:\"Juice\";s:17:\"description_en_GB\";s:63:\"It is a long established fact that a reader will be distracted.\";s:17:\"button_text_en_GB\";s:9:\"Read More\";s:8:\"title_ar\";s:8:\"عصير\";s:14:\"description_ar\";s:110:\"هناك حقيقة مثبتة منذ زمن طويل وهي أن القارئ سوف يشتت انتباهه.\";s:14:\"button_text_ar\";s:17:\"اقرأ أكثر\";s:10:\"button_url\";s:1:\"#\";s:16:\"background_image\";s:3:\"236\";s:11:\"padding_top\";s:1:\"0\";s:14:\"padding_bottom\";s:1:\"0\";}', '2021-10-23 04:54:22', '2021-11-06 07:10:58'),
(60, 'CategoryHighlight', 'update', 'App\\PageBuilder\\Addons\\Home\\CategoryHighlight', 'dynamic_page', 2, 23, 'dynamic_page', 'a:14:{s:2:\"id\";s:2:\"60\";s:10:\"addon_name\";s:17:\"CategoryHighlight\";s:15:\"addon_namespace\";s:60:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXENhdGVnb3J5SGlnaGxpZ2h0\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"2\";s:13:\"addon_page_id\";s:2:\"23\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:15:\"blog_categories\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";i:3;s:1:\"6\";}s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"4\";s:11:\"padding_top\";s:1:\"2\";s:14:\"padding_bottom\";s:1:\"2\";}', '2021-10-23 05:30:37', '2021-11-10 23:47:05'),
(61, 'BlogSliderStyleTwo', 'update', 'App\\PageBuilder\\Addons\\Blog\\BlogSliderStyleTwo', 'dynamic_page', 3, 23, 'dynamic_page', 'a:18:{s:2:\"id\";s:2:\"61\";s:10:\"addon_name\";s:18:\"BlogSliderStyleTwo\";s:15:\"addon_namespace\";s:64:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCbG9nXEJsb2dTbGlkZXJTdHlsZVR3bw==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"3\";s:13:\"addon_page_id\";s:2:\"23\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:19:\"section_title_en_GB\";s:19:\"Highlighted Article\";s:16:\"categories_en_GB\";a:1:{i:0;s:1:\"3\";}s:16:\"section_title_ar\";s:21:\"مقالة مميزة\";s:23:\"section_title_alignment\";s:12:\"center-align\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"3\";s:12:\"slider_items\";s:1:\"3\";s:11:\"padding_top\";s:2:\"80\";s:14:\"padding_bottom\";s:1:\"2\";}', '2021-10-23 05:46:25', '2021-10-31 05:30:41'),
(62, 'BannerOne', 'update', 'App\\PageBuilder\\Addons\\Common\\BannerOne', 'dynamic_page', 4, 23, 'dynamic_page', 'a:12:{s:2:\"id\";s:2:\"62\";s:10:\"addon_name\";s:9:\"BannerOne\";s:15:\"addon_namespace\";s:52:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xDb21tb25cQmFubmVyT25l\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"4\";s:13:\"addon_page_id\";s:2:\"23\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"image\";s:2:\"94\";s:9:\"image_url\";s:1:\"#\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";}', '2021-10-23 05:48:44', '2021-11-15 01:08:38'),
(64, 'BlogGridFood', 'update', 'App\\PageBuilder\\Addons\\Home\\BlogGridFood', 'dynamic_page', 5, 23, 'dynamic_page', 'a:19:{s:2:\"id\";s:2:\"64\";s:10:\"addon_name\";s:12:\"BlogGridFood\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXEJsb2dHcmlkRm9vZA==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"5\";s:13:\"addon_page_id\";s:2:\"23\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:18:\"heading_text_en_GB\";s:14:\"Recent Article\";s:15:\"heading_text_ar\";s:27:\"المادة الأخيرة\";s:10:\"categories\";s:1:\"3\";s:15:\"play_icon_color\";N;s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"4\";s:7:\"columns\";s:8:\"col-lg-6\";s:20:\"pagination_alignment\";s:11:\"text-center\";s:11:\"padding_top\";s:1:\"0\";s:14:\"padding_bottom\";s:1:\"0\";}', '2021-10-23 05:56:07', '2021-11-15 01:09:56'),
(66, 'VideoAreaStyleThree', 'update', 'App\\PageBuilder\\Addons\\Home\\VideoAreaStyleThree', 'dynamic_page', 6, 23, 'dynamic_page', 'a:15:{s:2:\"id\";s:2:\"66\";s:10:\"addon_name\";s:19:\"VideoAreaStyleThree\";s:15:\"addon_namespace\";s:64:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXFZpZGVvQXJlYVN0eWxlVGhyZWU=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"6\";s:13:\"addon_page_id\";s:2:\"23\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:18:\"heading_text_en_GB\";s:6:\"Videos\";s:15:\"heading_text_ar\";s:21:\"أشرطة فيديو\";s:5:\"blogs\";a:2:{i:0;s:3:\"118\";i:1;s:3:\"119\";}s:15:\"play_icon_color\";s:15:\"rgb(36, 36, 36)\";s:5:\"items\";s:1:\"2\";s:11:\"padding_top\";s:1:\"0\";s:14:\"padding_bottom\";s:1:\"0\";}', '2021-10-23 06:51:53', '2021-11-17 17:37:08'),
(67, 'GoogleAdsense', 'update', 'App\\PageBuilder\\Addons\\Common\\Advertise', 'dynamic_page', 7, 23, 'dynamic_page', 'a:12:{s:2:\"id\";s:2:\"67\";s:10:\"addon_name\";s:13:\"GoogleAdsense\";s:15:\"addon_namespace\";s:52:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xDb21tb25cQWR2ZXJ0aXNl\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"7\";s:13:\"addon_page_id\";s:2:\"23\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:18:\"advertisement_type\";s:5:\"image\";s:18:\"advertisement_size\";s:8:\"250*1110\";s:11:\"padding_top\";s:2:\"60\";s:14:\"padding_bottom\";s:3:\"100\";}', '2021-10-23 07:00:46', '2021-11-15 01:11:00'),
(68, 'BestArticle', 'update', 'App\\PageBuilder\\Addons\\Home\\BestArticle', 'dynamic_page', 8, 23, 'dynamic_page', 'a:15:{s:2:\"id\";s:2:\"68\";s:10:\"addon_name\";s:11:\"BestArticle\";s:15:\"addon_namespace\";s:52:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXEJlc3RBcnRpY2xl\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"8\";s:13:\"addon_page_id\";s:2:\"23\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:18:\"heading_text_en_GB\";s:12:\"Best Article\";s:15:\"heading_text_ar\";N;s:10:\"categories\";a:1:{i:0;s:1:\"3\";}s:15:\"play_icon_color\";s:18:\"rgb(251, 250, 250)\";s:5:\"items\";s:1:\"5\";s:11:\"padding_top\";s:1:\"3\";s:14:\"padding_bottom\";s:3:\"100\";}', '2021-10-23 07:01:58', '2021-11-13 04:36:56'),
(70, 'CustomHeaderSliderTwoWithCategory', 'update', 'App\\PageBuilder\\Addons\\HeaderSlider\\CustomHeaderSliderTwoWithCategory', 'dynamic_page', 1, 24, 'dynamic_page', 'a:11:{s:2:\"id\";s:2:\"70\";s:10:\"addon_name\";s:33:\"CustomHeaderSliderTwoWithCategory\";s:15:\"addon_namespace\";s:92:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIZWFkZXJTbGlkZXJcQ3VzdG9tSGVhZGVyU2xpZGVyVHdvV2l0aENhdGVnb3J5\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"24\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:10:\"header_ten\";a:12:{s:20:\"category_title_en_GB\";a:3:{i:0;s:6:\"Flower\";i:1;s:5:\"Music\";i:2;s:6:\"Nature\";}s:18:\"category_url_en_GB\";a:3:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";}s:11:\"title_en_GB\";a:3:{i:0;s:62:\"Working in front of nature one receives far more than he seeks\";i:1;s:46:\"So love is the flower you’ve got to let grow\";i:2;s:63:\"In every walk in with nature one receives far more than he seek\";}s:15:\"title_url_en_GB\";a:3:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";}s:19:\"category_icon_en_GB\";a:3:{i:0;s:10:\"las la-tag\";i:1;s:10:\"las la-tag\";i:2;s:10:\"las la-tag\";}s:22:\"background_image_en_GB\";a:3:{i:0;s:3:\"188\";i:1;s:3:\"196\";i:2;s:3:\"190\";}s:17:\"category_title_ar\";a:3:{i:0;s:6:\"ورد\";i:1;s:12:\"موسيقى\";i:2;s:19:\"طبيعة سجية\";}s:15:\"category_url_ar\";a:3:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";}s:8:\"title_ar\";a:3:{i:0;s:72:\"الحب هو الزهرة التي عليك أن تتركها تنمو.\";i:1;s:72:\"الحب هو الزهرة التي عليك أن تتركها تنمو.\";i:2;s:72:\"الحب هو الزهرة التي عليك أن تتركها تنمو.\";}s:12:\"title_url_ar\";a:3:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";}s:16:\"category_icon_ar\";a:3:{i:0;N;i:1;N;i:2;N;}s:19:\"background_image_ar\";a:3:{i:0;s:3:\"191\";i:1;s:3:\"192\";i:2;s:3:\"195\";}}s:11:\"padding_top\";s:1:\"0\";s:14:\"padding_bottom\";s:1:\"0\";}', '2021-10-23 07:34:20', '2021-11-17 17:57:22'),
(73, 'BlogListStyleFour', 'update', 'App\\PageBuilder\\Addons\\Home\\BlogListStyleFour', 'dynamic_page_with_sidebar', 1, 24, 'dynamic_page_with_sidebar', 'a:20:{s:2:\"id\";s:2:\"73\";s:10:\"addon_name\";s:17:\"BlogListStyleFour\";s:15:\"addon_namespace\";s:60:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXEJsb2dMaXN0U3R5bGVGb3Vy\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"24\";s:15:\"addon_page_type\";s:25:\"dynamic_page_with_sidebar\";s:25:\"comment_button_text_en_GB\";s:7:\"Comment\";s:16:\"share_text_en_GB\";s:5:\"Share\";s:22:\"comment_button_text_ar\";s:10:\"تعليق\";s:13:\"share_text_ar\";s:10:\"يشارك\";s:10:\"categories\";s:1:\"7\";s:15:\"play_icon_color\";N;s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:4:\"desc\";s:5:\"items\";s:1:\"1\";s:7:\"columns\";s:9:\"col-lg-12\";s:11:\"padding_top\";s:1:\"0\";s:14:\"padding_bottom\";s:2:\"50\";}', '2021-10-24 00:14:09', '2021-11-20 10:05:04'),
(74, 'BlogGridOne', 'update', 'App\\PageBuilder\\Addons\\Blog\\BlogGridOne', 'dynamic_page_with_sidebar', 10, 24, 'dynamic_page_with_sidebar', 'a:20:{s:2:\"id\";s:2:\"74\";s:10:\"addon_name\";s:11:\"BlogGridOne\";s:15:\"addon_namespace\";s:52:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCbG9nXEJsb2dHcmlkT25l\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";s:2:\"10\";s:13:\"addon_page_id\";s:2:\"24\";s:15:\"addon_page_type\";s:25:\"dynamic_page_with_sidebar\";s:19:\"comments_text_en_GB\";s:8:\"Comments\";s:16:\"comments_text_ar\";s:14:\"تعليقات\";s:10:\"categories\";a:1:{i:0;s:1:\"7\";}s:15:\"play_icon_color\";s:15:\"rgb(43, 34, 34)\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:4:\"desc\";s:5:\"items\";s:1:\"4\";s:7:\"columns\";s:8:\"col-lg-6\";s:13:\"category_icon\";s:10:\"las la-tag\";s:20:\"pagination_alignment\";s:9:\"text-left\";s:11:\"padding_top\";s:1:\"3\";s:14:\"padding_bottom\";s:1:\"3\";}', '2021-10-24 01:00:29', '2021-11-17 19:59:59'),
(75, 'BannerOne', 'update', 'App\\PageBuilder\\Addons\\Common\\BannerOne', 'dynamic_page_with_sidebar', 11, 24, 'dynamic_page_with_sidebar', 'a:12:{s:2:\"id\";s:2:\"75\";s:10:\"addon_name\";s:9:\"BannerOne\";s:15:\"addon_namespace\";s:52:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCbG9nXEJhbm5lck9uZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";s:1:\"4\";s:13:\"addon_page_id\";s:2:\"24\";s:15:\"addon_page_type\";s:25:\"dynamic_page_with_sidebar\";s:5:\"image\";s:2:\"96\";s:9:\"image_url\";s:1:\"#\";s:11:\"padding_top\";s:1:\"0\";s:14:\"padding_bottom\";s:1:\"0\";}', '2021-10-24 01:15:49', '2021-11-17 17:47:53'),
(76, 'BlogListStyleFour', 'update', 'App\\PageBuilder\\Addons\\Home\\BlogListStyleFour', 'dynamic_page_with_sidebar', 12, 24, 'dynamic_page_with_sidebar', 'a:20:{s:2:\"id\";s:2:\"76\";s:10:\"addon_name\";s:17:\"BlogListStyleFour\";s:15:\"addon_namespace\";s:60:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXEJsb2dMaXN0U3R5bGVGb3Vy\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";s:2:\"12\";s:13:\"addon_page_id\";s:2:\"24\";s:15:\"addon_page_type\";s:25:\"dynamic_page_with_sidebar\";s:25:\"comment_button_text_en_GB\";s:8:\"Comments\";s:16:\"share_text_en_GB\";s:5:\"Share\";s:22:\"comment_button_text_ar\";s:14:\"تعليقات\";s:13:\"share_text_ar\";s:10:\"يشارك\";s:10:\"categories\";s:1:\"7\";s:15:\"play_icon_color\";s:18:\"rgb(243, 243, 243)\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:4:\"desc\";s:5:\"items\";s:1:\"1\";s:7:\"columns\";s:9:\"col-lg-12\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";}', '2021-10-24 01:16:54', '2021-11-20 10:14:27'),
(77, 'BlogGridOne', 'update', 'App\\PageBuilder\\Addons\\Blog\\BlogGridOne', 'dynamic_page_with_sidebar', 13, 24, 'dynamic_page_with_sidebar', 'a:20:{s:2:\"id\";s:2:\"77\";s:10:\"addon_name\";s:11:\"BlogGridOne\";s:15:\"addon_namespace\";s:52:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCbG9nXEJsb2dHcmlkT25l\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";s:2:\"13\";s:13:\"addon_page_id\";s:2:\"24\";s:15:\"addon_page_type\";s:25:\"dynamic_page_with_sidebar\";s:19:\"comments_text_en_GB\";s:8:\"Comments\";s:16:\"comments_text_ar\";s:14:\"تعليقات\";s:10:\"categories\";a:1:{i:0;s:1:\"7\";}s:15:\"play_icon_color\";s:15:\"rgb(75, 69, 69)\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:4:\"desc\";s:5:\"items\";s:1:\"4\";s:7:\"columns\";s:8:\"col-lg-6\";s:13:\"category_icon\";s:10:\"las la-tag\";s:20:\"pagination_alignment\";s:9:\"text-left\";s:11:\"padding_top\";s:2:\"11\";s:14:\"padding_bottom\";s:2:\"10\";}', '2021-10-24 01:19:39', '2021-11-17 20:00:12'),
(82, 'HeaderAreaStyleFive', 'update', 'App\\PageBuilder\\Addons\\Header\\HeaderAreaStyleFive', 'dynamic_page', 1, 25, 'dynamic_page', 'a:31:{s:2:\"id\";s:2:\"82\";s:10:\"addon_name\";s:19:\"HeaderAreaStyleFive\";s:15:\"addon_namespace\";s:68:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIZWFkZXJcSGVhZGVyQXJlYVN0eWxlRml2ZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"25\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:16:\"left_title_en_GB\";s:46:\"Life is a challenge, meet it! Life is a dream.\";s:19:\"left_category_en_GB\";s:4:\"Game\";s:21:\"right_title_one_en_GB\";s:68:\"Men are but flesh and blood. They know their doom, but not the hour.\";s:24:\"right_category_one_en_GB\";s:4:\"Game\";s:21:\"right_title_two_en_GB\";s:65:\"What is a drop of rain, compared to the storm? What is a thought.\";s:24:\"right_category_two_en_GB\";s:4:\"Game\";s:13:\"left_title_ar\";s:69:\"الحياة هي التحدي، مواجهته! الحياة حلم.\";s:16:\"left_category_ar\";s:8:\"لعبة\";s:18:\"right_title_one_ar\";s:110:\"الرجال ما هم إلا لحم ودم. إنهم يعرفون مصيرهم ، لكن ليس الساعة.\";s:21:\"right_category_one_ar\";s:8:\"لعبة\";s:18:\"right_title_two_ar\";s:110:\"الرجال ما هم إلا لحم ودم. إنهم يعرفون مصيرهم ، لكن ليس الساعة.\";s:21:\"right_category_two_ar\";s:8:\"لعبة\";s:14:\"left_title_url\";s:1:\"#\";s:17:\"left_category_url\";s:1:\"#\";s:19:\"right_title_url_one\";s:1:\"#\";s:22:\"right_category_url_one\";s:1:\"#\";s:19:\"right_title_url_two\";s:1:\"#\";s:22:\"right_category_url_two\";s:1:\"#\";s:10:\"left_image\";s:3:\"229\";s:15:\"right_image_one\";s:3:\"231\";s:15:\"right_image_two\";s:3:\"232\";s:11:\"padding_top\";s:2:\"30\";s:14:\"padding_bottom\";s:1:\"0\";}', '2021-10-24 03:29:43', '2021-11-20 09:51:19'),
(83, 'BlogListBig', 'update', 'App\\PageBuilder\\Addons\\Home\\BlogListBig', 'dynamic_page', 2, 25, 'dynamic_page', 'a:18:{s:2:\"id\";s:2:\"83\";s:10:\"addon_name\";s:11:\"BlogListBig\";s:15:\"addon_namespace\";s:52:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXEJsb2dMaXN0Qmln\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"2\";s:13:\"addon_page_id\";s:2:\"25\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:10:\"categories\";s:3:\"115\";s:12:\"button_style\";s:21:\"style_one_violate_tag\";s:15:\"play_icon_color\";N;s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"1\";s:7:\"columns\";s:9:\"col-lg-12\";s:20:\"pagination_alignment\";s:9:\"text-left\";s:11:\"padding_top\";s:1:\"1\";s:14:\"padding_bottom\";s:1:\"1\";}', '2021-10-24 04:23:31', '2021-11-22 11:02:13'),
(85, 'BlogListFive', 'update', 'App\\PageBuilder\\Addons\\Home\\BlogListFive', 'dynamic_page_with_sidebar', 1, 25, 'dynamic_page_with_sidebar', 'a:17:{s:2:\"id\";s:2:\"85\";s:10:\"addon_name\";s:12:\"BlogListFive\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXEJsb2dMaXN0Rml2ZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"25\";s:15:\"addon_page_type\";s:25:\"dynamic_page_with_sidebar\";s:10:\"categories\";a:1:{i:0;s:2:\"12\";}s:12:\"button_style\";s:21:\"style_one_violate_tag\";s:15:\"play_icon_color\";N;s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"3\";s:20:\"pagination_alignment\";s:9:\"text-left\";s:11:\"padding_top\";s:1:\"0\";s:14:\"padding_bottom\";s:1:\"0\";}', '2021-10-24 04:52:03', '2021-11-22 10:48:19'),
(86, 'BannerOne', 'update', 'App\\PageBuilder\\Addons\\Common\\BannerOne', 'dynamic_page_with_sidebar', 2, 25, 'dynamic_page_with_sidebar', 'a:12:{s:2:\"id\";s:2:\"86\";s:10:\"addon_name\";s:9:\"BannerOne\";s:15:\"addon_namespace\";s:52:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCbG9nXEJhbm5lck9uZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";s:1:\"2\";s:13:\"addon_page_id\";s:2:\"25\";s:15:\"addon_page_type\";s:25:\"dynamic_page_with_sidebar\";s:5:\"image\";s:2:\"94\";s:9:\"image_url\";s:1:\"#\";s:11:\"padding_top\";s:1:\"2\";s:14:\"padding_bottom\";s:1:\"2\";}', '2021-10-24 04:59:56', '2021-10-31 05:32:37'),
(87, 'BlogListFive', 'update', 'App\\PageBuilder\\Addons\\Home\\BlogListFive', 'dynamic_page_with_sidebar', 3, 25, 'dynamic_page_with_sidebar', 'a:17:{s:2:\"id\";s:2:\"87\";s:10:\"addon_name\";s:12:\"BlogListFive\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXEJsb2dMaXN0Rml2ZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";s:1:\"3\";s:13:\"addon_page_id\";s:2:\"25\";s:15:\"addon_page_type\";s:25:\"dynamic_page_with_sidebar\";s:10:\"categories\";a:1:{i:0;s:2:\"12\";}s:12:\"button_style\";s:21:\"style_one_violate_tag\";s:15:\"play_icon_color\";N;s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"1\";s:20:\"pagination_alignment\";s:9:\"text-left\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:2:\"76\";}', '2021-10-24 05:00:15', '2021-11-22 10:48:29'),
(88, 'BlogGridOne', 'update', 'App\\PageBuilder\\Addons\\Blog\\BlogGridOne', 'dynamic_page', 1, 26, 'dynamic_page', 'a:22:{s:2:\"id\";s:2:\"88\";s:10:\"addon_name\";s:11:\"BlogGridOne\";s:15:\"addon_namespace\";s:52:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCbG9nXEJsb2dHcmlkT25l\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"26\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:19:\"comments_text_en_GB\";s:8:\"Comments\";s:16:\"comments_text_ar\";s:14:\"تعليقات\";s:10:\"categories\";a:1:{i:0;s:1:\"7\";}s:15:\"play_icon_color\";s:15:\"rgb(70, 65, 65)\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"6\";s:7:\"columns\";s:8:\"col-lg-4\";s:13:\"category_icon\";s:10:\"las la-tag\";s:13:\"comments_icon\";s:14:\"las la-comment\";s:17:\"pagination_status\";s:2:\"on\";s:20:\"pagination_alignment\";s:11:\"text-center\";s:11:\"padding_top\";s:3:\"110\";s:14:\"padding_bottom\";s:3:\"110\";}', '2021-10-24 06:31:14', '2021-11-09 01:54:59'),
(89, 'BlogListFood', 'update', 'App\\PageBuilder\\Addons\\Blog\\BlogListFood', 'dynamic_page', 1, 27, 'dynamic_page', 'a:18:{s:2:\"id\";s:2:\"89\";s:10:\"addon_name\";s:12:\"BlogListFood\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCbG9nXEJsb2dMaXN0Rm9vZA==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"27\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:10:\"categories\";s:1:\"3\";s:15:\"play_icon_color\";s:15:\"rgb(28, 27, 27)\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:4:\"desc\";s:5:\"items\";s:1:\"4\";s:7:\"columns\";s:9:\"col-lg-12\";s:17:\"pagination_status\";s:2:\"on\";s:20:\"pagination_alignment\";s:11:\"text-center\";s:11:\"padding_top\";s:3:\"120\";s:14:\"padding_bottom\";s:3:\"164\";}', '2021-10-24 07:01:11', '2021-11-13 08:19:40'),
(91, 'BlogListNature', 'update', 'App\\PageBuilder\\Addons\\Blog\\BlogListNature', 'dynamic_page_with_sidebar', 1, 28, 'dynamic_page_with_sidebar', 'a:20:{s:2:\"id\";s:2:\"91\";s:10:\"addon_name\";s:14:\"BlogListNature\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCbG9nXEJsb2dMaXN0TmF0dXJl\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"28\";s:15:\"addon_page_type\";s:25:\"dynamic_page_with_sidebar\";s:18:\"comment_text_en_GB\";s:8:\"Comments\";s:16:\"share_text_en_GB\";s:5:\"Share\";s:15:\"comment_text_ar\";s:14:\"تعليقات\";s:13:\"share_text_ar\";s:12:\"يشارك :\";s:10:\"categories\";s:1:\"7\";s:15:\"play_icon_color\";N;s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:4:\"desc\";s:5:\"items\";s:1:\"4\";s:20:\"pagination_alignment\";s:9:\"text-left\";s:11:\"padding_top\";s:1:\"0\";s:14:\"padding_bottom\";s:1:\"0\";}', '2021-10-24 07:37:58', '2021-11-21 12:04:46'),
(100, 'InstagramImage', 'update', 'App\\PageBuilder\\Addons\\Home\\InstagramImage', 'dynamic_page_with_sidebar', 6, 24, 'sortable_02', 'a:15:{s:2:\"id\";s:3:\"100\";s:10:\"addon_name\";s:14:\"InstagramImage\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXEluc3RhZ3JhbUltYWdl\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";s:1:\"6\";s:13:\"addon_page_id\";s:2:\"24\";s:15:\"addon_page_type\";s:11:\"sortable_02\";s:16:\"title_text_en_GB\";s:22:\"Follow us on Instagram\";s:13:\"title_text_ar\";s:44:\"متابعتنا على الانستقرام\";s:9:\"title_url\";s:1:\"#\";s:14:\"instagram_icon\";s:16:\"lab la-instagram\";s:9:\"item_show\";s:1:\"6\";s:11:\"padding_top\";s:2:\"60\";s:14:\"padding_bottom\";s:2:\"60\";}', '2021-11-02 05:15:37', '2021-11-02 05:15:38'),
(101, 'InstagramImage', 'update', 'App\\PageBuilder\\Addons\\Home\\InstagramImage', 'dynamic_page_with_sidebar', 38, 24, 'sortable_02', 'a:15:{s:2:\"id\";s:3:\"101\";s:10:\"addon_name\";s:14:\"InstagramImage\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXEluc3RhZ3JhbUltYWdl\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";s:2:\"38\";s:13:\"addon_page_id\";s:2:\"24\";s:15:\"addon_page_type\";s:11:\"sortable_02\";s:16:\"title_text_en_GB\";s:22:\"Follow us on Instagram\";s:13:\"title_text_ar\";s:44:\"متابعتنا على الانستقرام\";s:9:\"title_url\";s:1:\"#\";s:14:\"instagram_icon\";s:16:\"lab la-instagram\";s:9:\"item_show\";s:1:\"6\";s:11:\"padding_top\";s:2:\"60\";s:14:\"padding_bottom\";s:2:\"60\";}', '2021-11-02 05:25:23', '2021-11-02 05:25:25'),
(102, 'InstagramImage', 'update', 'App\\PageBuilder\\Addons\\Home\\InstagramImage', 'dynamic_page_with_sidebar', 6, 24, 'sortable_02', 'a:15:{s:2:\"id\";s:3:\"102\";s:10:\"addon_name\";s:14:\"InstagramImage\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXEluc3RhZ3JhbUltYWdl\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:25:\"dynamic_page_with_sidebar\";s:11:\"addon_order\";s:1:\"6\";s:13:\"addon_page_id\";s:2:\"24\";s:15:\"addon_page_type\";s:11:\"sortable_02\";s:16:\"title_text_en_GB\";s:22:\"Follow us on Instagram\";s:13:\"title_text_ar\";s:44:\"متابعتنا على الانستقرام\";s:9:\"title_url\";s:1:\"#\";s:14:\"instagram_icon\";s:16:\"lab la-instagram\";s:9:\"item_show\";s:1:\"6\";s:11:\"padding_top\";s:2:\"60\";s:14:\"padding_bottom\";s:2:\"60\";}', '2021-11-02 05:45:15', '2021-11-02 05:45:17'),
(104, 'InstagramImage', 'update', 'App\\PageBuilder\\Addons\\Home\\InstagramImage', 'dynamic_page_with_sidebar_two', 1, 24, 'dynamic_page_with_sidebar_two', 'a:15:{s:2:\"id\";s:3:\"104\";s:10:\"addon_name\";s:14:\"InstagramImage\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXEluc3RhZ3JhbUltYWdl\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:29:\"dynamic_page_with_sidebar_two\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"24\";s:15:\"addon_page_type\";s:29:\"dynamic_page_with_sidebar_two\";s:16:\"title_text_en_GB\";s:22:\"Follow us on Instagram\";s:13:\"title_text_ar\";N;s:9:\"title_url\";s:1:\"#\";s:14:\"instagram_icon\";s:16:\"lab la-instagram\";s:9:\"item_show\";s:1:\"6\";s:11:\"padding_top\";s:1:\"0\";s:14:\"padding_bottom\";s:3:\"100\";}', '2021-11-02 05:50:14', '2021-11-17 12:22:23'),
(109, 'Search', 'update', 'App\\PageBuilder\\Addons\\Common\\Search', 'dynamic_page', 1, 30, 'dynamic_page', 'a:12:{s:2:\"id\";s:3:\"109\";s:10:\"addon_name\";s:6:\"Search\";s:15:\"addon_namespace\";s:48:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xDb21tb25cU2VhcmNo\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"30\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:14:\"tag_titleen_GB\";s:13:\"Top  Keywords\";s:11:\"tag_titlear\";s:38:\"أهم الكلمات الرئيسية\";s:11:\"padding_top\";s:3:\"110\";s:14:\"padding_bottom\";s:3:\"110\";}', '2021-11-20 01:56:38', '2021-11-20 01:56:40'),
(113, 'BrowseCategoryOne', 'update', 'App\\PageBuilder\\Addons\\BrowseCategory\\BrowseCategoryOne', 'dynamic_page', 2, 16, 'dynamic_page', 'a:17:{s:2:\"id\";s:3:\"113\";s:10:\"addon_name\";s:17:\"BrowseCategoryOne\";s:15:\"addon_namespace\";s:76:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCcm93c2VDYXRlZ29yeVxCcm93c2VDYXRlZ29yeU9uZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"2\";s:13:\"addon_page_id\";s:2:\"16\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:17:\"Browse Categories\";s:16:\"title_text_color\";s:17:\"rgb(29, 191, 115)\";s:8:\"subtitle\";s:124:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"6\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;}', '2021-11-28 22:43:25', '2022-02-02 04:08:49'),
(114, 'ServiceListOne', 'update', 'App\\PageBuilder\\Addons\\Service\\ServiceListOne', 'dynamic_page', 1, 32, 'dynamic_page', 'a:18:{s:2:\"id\";s:3:\"114\";s:10:\"addon_name\";s:14:\"ServiceListOne\";s:15:\"addon_namespace\";s:60:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xTZXJ2aWNlXFNlcnZpY2VMaXN0T25l\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"32\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:4:\"desc\";s:5:\"items\";s:1:\"6\";s:7:\"columns\";s:8:\"col-lg-4\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:8:\"category\";N;s:11:\"subcategory\";N;s:8:\"book_now\";N;s:9:\"read_more\";N;}', '2021-12-07 01:45:06', '2022-04-28 02:29:56'),
(115, 'FeatureService', 'update', 'App\\PageBuilder\\Addons\\FeatureService\\FeatureService', 'dynamic_page', 3, 16, 'dynamic_page', 'a:18:{s:2:\"id\";s:3:\"115\";s:10:\"addon_name\";s:14:\"FeatureService\";s:15:\"addon_namespace\";s:72:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xGZWF0dXJlU2VydmljZVxGZWF0dXJlU2VydmljZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"3\";s:13:\"addon_page_id\";s:2:\"16\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:17:\"Featured Services\";s:16:\"title_text_color\";s:17:\"rgb(29, 191, 115)\";s:8:\"subtitle\";s:123:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout\";s:5:\"items\";s:1:\"6\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;s:9:\"btn_color\";s:17:\"rgb(29, 191, 115)\";s:16:\"dot_color_slider\";s:12:\"dot-color-01\";s:16:\"book_appointment\";N;}', '2022-01-04 01:00:48', '2022-04-28 09:12:47'),
(116, 'PopularService', 'update', 'App\\PageBuilder\\Addons\\PopularService\\PopularService', 'dynamic_page', 5, 16, 'dynamic_page', 'a:19:{s:2:\"id\";s:3:\"116\";s:10:\"addon_name\";s:14:\"PopularService\";s:15:\"addon_namespace\";s:72:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xQb3B1bGFyU2VydmljZVxQb3B1bGFyU2VydmljZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"4\";s:13:\"addon_page_id\";s:2:\"16\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:15:\"Popular Service\";s:16:\"title_text_color\";s:17:\"rgb(29, 191, 115)\";s:8:\"subtitle\";s:124:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:5:\"items\";s:1:\"6\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;s:9:\"btn_color\";s:17:\"rgb(29, 191, 115)\";s:17:\"explore_btn_color\";s:13:\"btn-outline-1\";s:11:\"hover_color\";s:11:\"hover_color\";s:17:\"explore_more_link\";N;}', '2022-01-04 03:53:37', '2022-04-28 09:07:06'),
(117, 'WhyOurMarketplace', 'update', 'App\\PageBuilder\\Addons\\WhyOurMarketplace\\WhyOurMarketplace', 'dynamic_page', 6, 16, 'dynamic_page', 'a:15:{s:2:\"id\";s:3:\"117\";s:10:\"addon_name\";s:17:\"WhyOurMarketplace\";s:15:\"addon_namespace\";s:80:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xXaHlPdXJNYXJrZXRwbGFjZVxXaHlPdXJNYXJrZXRwbGFjZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"5\";s:13:\"addon_page_id\";s:2:\"16\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:20:\"Why Our Marketplace?\";s:16:\"title_text_color\";s:17:\"rgb(29, 191, 115)\";s:8:\"subtitle\";s:124:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;s:28:\"contact_page_contact_info_01\";a:3:{s:5:\"icon_\";a:6:{i:0;s:12:\"las la-tools\";i:1;s:16:\"las la-users-cog\";i:2;s:17:\"las la-shield-alt\";i:3;s:16:\"las la-stopwatch\";i:4;s:26:\"las la-file-invoice-dollar\";i:5;s:14:\"las la-headset\";}s:6:\"title_\";a:6:{i:0;s:18:\"Service Commitment\";i:1;s:16:\"Super Experience\";i:2;s:16:\"User Data Secure\";i:3;s:12:\"Fast Service\";i:4;s:14:\"Secure Payment\";i:5;s:17:\"Dedicated Support\";}s:12:\"description_\";a:6:{i:0;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:1;s:125:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader2.\";i:2;s:123:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader\";i:3;s:123:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader\";i:4;s:123:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader\";i:5;s:123:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader\";}}}', '2022-01-04 04:33:37', '2022-04-28 09:07:07'),
(118, 'ProfessionalService', 'update', 'App\\PageBuilder\\Addons\\PopularService\\ProfessionalService', 'dynamic_page', 7, 16, 'dynamic_page', 'a:14:{s:2:\"id\";s:3:\"118\";s:10:\"addon_name\";s:19:\"ProfessionalService\";s:15:\"addon_namespace\";s:76:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xQb3B1bGFyU2VydmljZVxQcm9mZXNzaW9uYWxTZXJ2aWNl\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"6\";s:13:\"addon_page_id\";s:2:\"16\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:29:\"Popular Professional Services\";s:16:\"title_text_color\";s:17:\"rgb(29, 191, 115)\";s:8:\"subtitle\";s:124:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;}', '2022-01-04 07:08:26', '2022-04-28 09:07:07'),
(119, 'BecomeSeller', 'update', 'App\\PageBuilder\\Addons\\BecomeSeller\\BecomeSeller', 'dynamic_page', 8, 16, 'dynamic_page', 'a:19:{s:2:\"id\";s:3:\"119\";s:10:\"addon_name\";s:12:\"BecomeSeller\";s:15:\"addon_namespace\";s:64:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCZWNvbWVTZWxsZXJcQmVjb21lU2VsbGVy\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"7\";s:13:\"addon_page_id\";s:2:\"16\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:15:\"Start As Seller\";s:16:\"title_text_color\";s:17:\"rgb(29, 191, 115)\";s:8:\"subtitle\";s:124:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:10:\"section_bg\";N;s:9:\"btn_color\";s:17:\"rgb(29, 191, 115)\";s:8:\"btn_text\";s:13:\"Become Seller\";s:8:\"btn_link\";N;s:12:\"seller_image\";s:2:\"40\";s:28:\"contact_page_contact_info_01\";a:1:{s:9:\"benifits_\";a:3:{i:0;s:79:\"It is a long established fact that a reader will be distracted by the readable.\";i:1;s:79:\"It is a long established fact that a reader will be distracted by the readable.\";i:2;s:79:\"It is a long established fact that a reader will be distracted by the readable.\";}}s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";}', '2022-01-04 07:32:44', '2022-04-28 09:07:07'),
(123, 'ContactInfo', 'update', 'App\\PageBuilder\\Addons\\Contact\\ContactInfo', 'dynamic_page', 1, 34, 'dynamic_page', 'a:11:{s:2:\"id\";s:3:\"123\";s:10:\"addon_name\";s:11:\"ContactInfo\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xDb250YWN0XENvbnRhY3RJbmZv\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"34\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:28:\"contact_page_contact_info_01\";a:4:{s:5:\"icon_\";a:3:{i:0;s:19:\"las la-phone-volume\";i:1;s:20:\"las la-envelope-open\";i:2;s:12:\"las la-clock\";}s:6:\"title_\";a:3:{i:0;s:7:\"Call Us\";i:1;s:12:\"Mail Address\";i:2;s:12:\"Support Time\";}s:14:\"description_1_\";a:3:{i:0;s:12:\"412-723-5750\";i:1;s:16:\"Contact@mail.com\";i:2;s:18:\"08.00am to 11.00pm\";}s:14:\"description_2_\";a:3:{i:0;s:12:\"978-488-6321\";i:1;s:16:\"Support@mail.com\";i:2;N;}}s:11:\"padding_top\";s:2:\"70\";s:14:\"padding_bottom\";s:2:\"50\";}', '2022-01-05 23:45:50', '2022-02-09 05:54:25'),
(124, 'ContactMessage', 'update', 'App\\PageBuilder\\Addons\\Contact\\ContactMessage', 'dynamic_page', 2, 34, 'dynamic_page', 'a:11:{s:2:\"id\";s:3:\"124\";s:10:\"addon_name\";s:14:\"ContactMessage\";s:15:\"addon_namespace\";s:60:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xDb250YWN0XENvbnRhY3RNZXNzYWdl\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"2\";s:13:\"addon_page_id\";s:2:\"34\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:11:\"padding_top\";s:2:\"50\";s:14:\"padding_bottom\";s:3:\"100\";s:14:\"custom_form_id\";s:1:\"1\";}', '2022-01-06 00:47:38', '2022-02-02 05:56:27'),
(125, 'AboutUs', 'update', 'App\\PageBuilder\\Addons\\About\\AboutUs', 'dynamic_page', 1, 31, 'dynamic_page', 'a:16:{s:2:\"id\";s:3:\"125\";s:10:\"addon_name\";s:7:\"AboutUs\";s:15:\"addon_namespace\";s:48:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xBYm91dFxBYm91dFVz\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"31\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:13:\"Know About Us\";s:8:\"subtitle\";s:249:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:4:\"year\";s:7:\"8 Years\";s:5:\"image\";s:3:\"164\";s:11:\"shape_image\";s:3:\"165\";s:28:\"contact_page_contact_info_01\";a:1:{s:9:\"benifits_\";a:6:{i:0;s:46:\"Complete Sanitization and cleaning of bathroom\";i:1;s:28:\"It\'s  a long established way\";i:2;s:32:\"Biodegradable chemicals are used\";i:3;s:28:\"It\'s  a long established way\";i:4;s:32:\"Biodegradable chemicals are used\";i:5;s:28:\"It\'s  a long established way\";}}s:11:\"padding_top\";s:2:\"70\";s:14:\"padding_bottom\";s:3:\"140\";}', '2022-01-06 03:58:30', '2022-02-14 23:18:20'),
(130, 'Brands', 'update', 'App\\PageBuilder\\Addons\\About\\Brands', 'dynamic_page', 5, 31, 'dynamic_page', 'a:10:{s:2:\"id\";s:3:\"130\";s:10:\"addon_name\";s:6:\"Brands\";s:15:\"addon_namespace\";s:48:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xBYm91dFxCcmFuZHM=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"5\";s:13:\"addon_page_id\";s:2:\"31\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";}', '2022-01-07 22:36:40', '2022-02-02 05:49:25'),
(133, 'AllBlog', 'update', 'App\\PageBuilder\\Addons\\Blog\\AllBlog', 'dynamic_page', 1, 29, 'dynamic_page', 'a:13:{s:2:\"id\";s:3:\"133\";s:10:\"addon_name\";s:7:\"AllBlog\";s:15:\"addon_namespace\";s:48:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCbG9nXEFsbEJsb2c=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"29\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"4\";s:11:\"padding_top\";s:3:\"110\";s:14:\"padding_bottom\";s:3:\"110\";}', '2022-01-07 23:51:05', '2022-01-07 23:51:07'),
(134, 'AllBlog', 'update', 'App\\PageBuilder\\Addons\\Blog\\AllBlog', 'dynamic_page', 2, 35, 'dynamic_page', 'a:13:{s:2:\"id\";s:3:\"134\";s:10:\"addon_name\";s:7:\"AllBlog\";s:15:\"addon_namespace\";s:48:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCbG9nXEFsbEJsb2c=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"35\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"6\";s:11:\"padding_top\";s:2:\"70\";s:14:\"padding_bottom\";s:3:\"100\";}', '2022-01-07 23:53:45', '2022-02-17 16:56:21'),
(135, 'RecentBlog', 'update', 'App\\PageBuilder\\Addons\\Home\\RecentBlog', 'dynamic_page', 9, 16, 'dynamic_page', 'a:18:{s:2:\"id\";s:3:\"135\";s:10:\"addon_name\";s:10:\"RecentBlog\";s:15:\"addon_namespace\";s:52:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXFJlY2VudEJsb2c=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"8\";s:13:\"addon_page_id\";s:2:\"16\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:22:\"Recent Blog & Articles\";s:16:\"title_text_color\";s:17:\"rgb(29, 191, 115)\";s:8:\"subtitle\";s:124:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:4:\"desc\";s:5:\"items\";s:1:\"4\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;s:16:\"dot_color_slider\";s:12:\"dot-color-01\";}', '2022-01-10 03:33:21', '2022-04-28 09:07:09'),
(138, 'HeaderStyleTwo', 'update', 'App\\PageBuilder\\Addons\\Header\\HeaderStyleTwo', 'dynamic_page', 1, 22, 'dynamic_page', 'a:15:{s:2:\"id\";s:3:\"138\";s:10:\"addon_name\";s:14:\"HeaderStyleTwo\";s:15:\"addon_namespace\";s:60:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIZWFkZXJcSGVhZGVyU3R5bGVUd28=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"22\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:35:\"ONE-STOP SOLUTION FOR YOUR SERVICES\";s:8:\"subtitle\";s:40:\"Order any service, anytime from anywhere\";s:12:\"service_type\";s:17:\"Cleaning Service2\";s:12:\"service_icon\";s:12:\"las la-broom\";s:5:\"image\";s:2:\"58\";s:11:\"padding_top\";s:3:\"107\";s:14:\"padding_bottom\";s:3:\"111\";}', '2022-01-10 23:11:40', '2022-02-06 08:26:40'),
(139, 'BrowseCategoryOne', 'update', 'App\\PageBuilder\\Addons\\BrowseCategory\\BrowseCategoryOne', 'dynamic_page', 2, 22, 'dynamic_page', 'a:17:{s:2:\"id\";s:3:\"139\";s:10:\"addon_name\";s:17:\"BrowseCategoryOne\";s:15:\"addon_namespace\";s:76:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCcm93c2VDYXRlZ29yeVxCcm93c2VDYXRlZ29yeU9uZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"2\";s:13:\"addon_page_id\";s:2:\"22\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:17:\"Browse Categories\";s:16:\"title_text_color\";s:15:\"rgb(51, 51, 51)\";s:8:\"subtitle\";s:124:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"6\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";s:18:\"rgb(255, 255, 255)\";}', '2022-01-11 00:22:03', '2022-02-02 04:30:16'),
(147, 'FeatureService', 'update', 'App\\PageBuilder\\Addons\\FeatureService\\FeatureService', 'dynamic_page', 3, 22, 'dynamic_page', 'a:17:{s:2:\"id\";s:3:\"147\";s:10:\"addon_name\";s:14:\"FeatureService\";s:15:\"addon_namespace\";s:72:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xGZWF0dXJlU2VydmljZVxGZWF0dXJlU2VydmljZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"3\";s:13:\"addon_page_id\";s:2:\"22\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:17:\"Featured Services\";s:16:\"title_text_color\";N;s:8:\"subtitle\";s:123:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout\";s:5:\"items\";s:1:\"5\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";s:18:\"rgb(242, 247, 255)\";s:9:\"btn_color\";s:17:\"rgb(71, 201, 237)\";s:16:\"dot_color_slider\";s:12:\"dot-color-02\";}', '2022-01-11 03:51:58', '2022-02-10 00:58:18'),
(148, 'PopularService', 'update', 'App\\PageBuilder\\Addons\\PopularService\\PopularService', 'dynamic_page', 4, 22, 'dynamic_page', 'a:19:{s:2:\"id\";s:3:\"148\";s:10:\"addon_name\";s:14:\"PopularService\";s:15:\"addon_namespace\";s:72:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xQb3B1bGFyU2VydmljZVxQb3B1bGFyU2VydmljZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"4\";s:13:\"addon_page_id\";s:2:\"22\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:16:\"Popular Services\";s:16:\"title_text_color\";N;s:8:\"subtitle\";s:124:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:5:\"items\";s:1:\"6\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";s:18:\"rgb(255, 255, 255)\";s:9:\"btn_color\";s:17:\"rgb(70, 202, 235)\";s:17:\"explore_btn_color\";s:13:\"btn-outline-2\";s:11:\"hover_color\";s:8:\"style-02\";s:17:\"explore_more_link\";N;}', '2022-01-11 04:06:23', '2022-02-10 02:06:09');
INSERT INTO `page_builders` (`id`, `addon_name`, `addon_type`, `addon_namespace`, `addon_location`, `addon_order`, `addon_page_id`, `addon_page_type`, `addon_settings`, `created_at`, `updated_at`) VALUES
(149, 'WhyOurMarketplace', 'update', 'App\\PageBuilder\\Addons\\WhyOurMarketplace\\WhyOurMarketplace', 'dynamic_page', 5, 22, 'dynamic_page', 'a:15:{s:2:\"id\";s:3:\"149\";s:10:\"addon_name\";s:17:\"WhyOurMarketplace\";s:15:\"addon_namespace\";s:80:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xXaHlPdXJNYXJrZXRwbGFjZVxXaHlPdXJNYXJrZXRwbGFjZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"5\";s:13:\"addon_page_id\";s:2:\"22\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:20:\"Why Our Marketplace?\";s:16:\"title_text_color\";N;s:8:\"subtitle\";s:132:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Service\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";s:18:\"rgb(242, 247, 255)\";s:28:\"contact_page_contact_info_01\";a:3:{s:5:\"icon_\";a:6:{i:0;s:12:\"las la-tools\";i:1;s:16:\"las la-users-cog\";i:2;s:17:\"las la-shield-alt\";i:3;s:16:\"las la-stopwatch\";i:4;s:26:\"las la-file-invoice-dollar\";i:5;s:14:\"las la-headset\";}s:6:\"title_\";a:6:{i:0;s:18:\"Service Commitment\";i:1;s:18:\"Service Commitment\";i:2;s:18:\"Service Commitment\";i:3;s:12:\"Fast Service\";i:4;s:12:\"Fast Service\";i:5;s:17:\"Dedicated Support\";}s:12:\"description_\";a:6:{i:0;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:1;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:2;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:3;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:4;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:5;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";}}}', '2022-01-11 04:39:34', '2022-04-28 03:33:16'),
(150, 'RecentBlog', 'update', 'App\\PageBuilder\\Addons\\Home\\RecentBlog', 'dynamic_page', 7, 22, 'dynamic_page', 'a:18:{s:2:\"id\";s:3:\"150\";s:10:\"addon_name\";s:10:\"RecentBlog\";s:15:\"addon_namespace\";s:52:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXFJlY2VudEJsb2c=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"8\";s:13:\"addon_page_id\";s:2:\"22\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:22:\"Recent Blog & Articles\";s:16:\"title_text_color\";N;s:8:\"subtitle\";s:124:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"4\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";s:18:\"rgb(242, 247, 255)\";s:16:\"dot_color_slider\";s:12:\"dot-color-02\";}', '2022-01-11 04:56:46', '2022-04-28 03:33:16'),
(151, 'BecomeSeller', 'update', 'App\\PageBuilder\\Addons\\BecomeSeller\\BecomeSeller', 'dynamic_page', 6, 22, 'dynamic_page', 'a:19:{s:2:\"id\";s:3:\"151\";s:10:\"addon_name\";s:12:\"BecomeSeller\";s:15:\"addon_namespace\";s:64:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCZWNvbWVTZWxsZXJcQmVjb21lU2VsbGVy\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"7\";s:13:\"addon_page_id\";s:2:\"22\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:15:\"Start As Seller\";s:16:\"title_text_color\";N;s:8:\"subtitle\";s:249:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:10:\"section_bg\";N;s:9:\"btn_color\";s:17:\"rgb(71, 201, 237)\";s:8:\"btn_text\";s:14:\"Join as Seller\";s:8:\"btn_link\";N;s:12:\"seller_image\";s:2:\"29\";s:28:\"contact_page_contact_info_01\";a:1:{s:9:\"benifits_\";a:3:{i:0;s:79:\"It is a long established fact that a reader will be distracted by the readable.\";i:1;s:79:\"It is a long established fact that a reader will be distracted by the readable.\";i:2;s:79:\"It is a long established fact that a reader will be distracted by the readable.\";}}s:11:\"padding_top\";s:2:\"70\";s:14:\"padding_bottom\";s:3:\"100\";}', '2022-01-11 05:18:50', '2022-04-28 03:33:16'),
(152, 'WhyOurMarketplace', 'update', 'App\\PageBuilder\\Addons\\WhyOurMarketplace\\WhyOurMarketplace', 'dynamic_page', 2, 31, 'dynamic_page', 'a:15:{s:2:\"id\";s:3:\"152\";s:10:\"addon_name\";s:17:\"WhyOurMarketplace\";s:15:\"addon_namespace\";s:80:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xXaHlPdXJNYXJrZXRwbGFjZVxXaHlPdXJNYXJrZXRwbGFjZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"2\";s:13:\"addon_page_id\";s:2:\"31\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:20:\"Why Our Marketplace?\";s:16:\"title_text_color\";N;s:8:\"subtitle\";s:124:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";s:18:\"rgb(242, 247, 255)\";s:28:\"contact_page_contact_info_01\";a:3:{s:5:\"icon_\";a:6:{i:0;s:12:\"las la-tools\";i:1;s:16:\"las la-users-cog\";i:2;s:17:\"las la-shield-alt\";i:3;s:16:\"las la-stopwatch\";i:4;s:26:\"las la-file-invoice-dollar\";i:5;s:14:\"las la-headset\";}s:6:\"title_\";a:6:{i:0;s:18:\"Service Commitment\";i:1;s:16:\"Super Experience\";i:2;s:16:\"User Data Secure\";i:3;s:12:\"Fast Service\";i:4;s:14:\"Secure Payment\";i:5;s:17:\"Dedicated Support\";}s:12:\"description_\";a:6:{i:0;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:1;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:2;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:3;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:4;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:5;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";}}}', '2022-01-11 22:50:19', '2022-02-02 05:05:07'),
(153, 'BecomeSeller', 'update', 'App\\PageBuilder\\Addons\\BecomeSeller\\BecomeSeller', 'dynamic_page', 4, 31, 'dynamic_page', 'a:19:{s:2:\"id\";s:3:\"153\";s:10:\"addon_name\";s:12:\"BecomeSeller\";s:15:\"addon_namespace\";s:64:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCZWNvbWVTZWxsZXJcQmVjb21lU2VsbGVy\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"4\";s:13:\"addon_page_id\";s:2:\"31\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:15:\"Start As Seller\";s:16:\"title_text_color\";N;s:8:\"subtitle\";s:249:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:10:\"section_bg\";s:18:\"rgb(242, 247, 255)\";s:9:\"btn_color\";N;s:8:\"btn_text\";s:13:\"Become Seller\";s:8:\"btn_link\";N;s:12:\"seller_image\";s:2:\"40\";s:28:\"contact_page_contact_info_01\";a:1:{s:9:\"benifits_\";a:3:{i:0;s:79:\"It is a long established fact that a reader will be distracted by the readable.\";i:1;s:79:\"It is a long established fact that a reader will be distracted by the readable.\";i:2;s:79:\"It is a long established fact that a reader will be distracted by the readable.\";}}s:11:\"padding_top\";s:2:\"70\";s:14:\"padding_bottom\";s:3:\"105\";}', '2022-01-11 22:50:23', '2022-02-02 05:49:59'),
(154, 'BrowseCategoryOne', 'update', 'App\\PageBuilder\\Addons\\BrowseCategory\\BrowseCategoryOne', 'dynamic_page', 3, 31, 'dynamic_page', 'a:17:{s:2:\"id\";s:3:\"154\";s:10:\"addon_name\";s:17:\"BrowseCategoryOne\";s:15:\"addon_namespace\";s:76:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCcm93c2VDYXRlZ29yeVxCcm93c2VDYXRlZ29yeU9uZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"3\";s:13:\"addon_page_id\";s:2:\"31\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:17:\"Browse Categories\";s:16:\"title_text_color\";N;s:8:\"subtitle\";s:124:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";N;s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";s:18:\"rgb(255, 255, 255)\";}', '2022-01-11 23:12:21', '2022-02-02 05:47:33'),
(155, 'HeaderStyleOne', 'update', 'App\\PageBuilder\\Addons\\Header\\HeaderStyleOne', 'dynamic_page', 1, 16, 'dynamic_page', 'a:13:{s:2:\"id\";s:3:\"155\";s:10:\"addon_name\";s:14:\"HeaderStyleOne\";s:15:\"addon_namespace\";s:60:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIZWFkZXJcSGVhZGVyU3R5bGVPbmU=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"16\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:35:\"ONE-STOP SOLUTION FOR YOUR SERVICES\";s:8:\"subtitle\";s:40:\"Order any service, anytime from anywhere\";s:16:\"background_image\";s:1:\"4\";s:11:\"padding_top\";s:2:\"92\";s:14:\"padding_bottom\";s:2:\"87\";}', '2022-01-11 23:51:52', '2022-01-15 04:38:32'),
(158, 'HeaderStyleThree', 'update', 'App\\PageBuilder\\Addons\\Header\\HeaderStyleThree', 'dynamic_page', 1, 38, 'dynamic_page', 'a:18:{s:2:\"id\";s:3:\"158\";s:10:\"addon_name\";s:16:\"HeaderStyleThree\";s:15:\"addon_namespace\";s:64:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIZWFkZXJcSGVhZGVyU3R5bGVUaHJlZQ==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"38\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:35:\"One-stop Solution for your Services\";s:8:\"subtitle\";s:40:\"Order any service, anytime from anywhere\";s:12:\"service_type\";s:15:\"Clening Service\";s:12:\"service_icon\";s:12:\"las la-broom\";s:12:\"service_link\";s:1:\"#\";s:9:\"dot_image\";s:2:\"42\";s:12:\"banner_image\";s:2:\"41\";s:5:\"image\";s:2:\"40\";s:11:\"padding_top\";s:3:\"106\";s:14:\"padding_bottom\";s:3:\"100\";}', '2022-01-12 00:22:33', '2022-01-12 01:16:41'),
(159, 'BrowseCategoryTwo', 'update', 'App\\PageBuilder\\Addons\\BrowseCategory\\BrowseCategoryTwo', 'dynamic_page', 2, 38, 'dynamic_page', 'a:17:{s:2:\"id\";s:3:\"159\";s:10:\"addon_name\";s:17:\"BrowseCategoryTwo\";s:15:\"addon_namespace\";s:76:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCcm93c2VDYXRlZ29yeVxCcm93c2VDYXRlZ29yeVR3bw==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"2\";s:13:\"addon_page_id\";s:2:\"38\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:15:\"Browse Category\";s:11:\"explore_all\";s:11:\"Explore All\";s:12:\"explore_link\";N;s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"6\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:2:\"50\";s:10:\"section_bg\";N;}', '2022-01-12 03:40:35', '2022-02-09 06:27:03'),
(160, 'FeatureServiceTwo', 'update', 'App\\PageBuilder\\Addons\\FeatureService\\FeatureServiceTwo', 'dynamic_page', 3, 38, 'dynamic_page', 'a:16:{s:2:\"id\";s:3:\"160\";s:10:\"addon_name\";s:17:\"FeatureServiceTwo\";s:15:\"addon_namespace\";s:76:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xGZWF0dXJlU2VydmljZVxGZWF0dXJlU2VydmljZVR3bw==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"3\";s:13:\"addon_page_id\";s:2:\"38\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:17:\"Featured Services\";s:11:\"explore_all\";s:11:\"Explore All\";s:12:\"explore_link\";N;s:5:\"items\";s:1:\"4\";s:11:\"padding_top\";s:2:\"50\";s:14:\"padding_bottom\";s:2:\"50\";s:10:\"section_bg\";N;s:9:\"btn_color\";N;}', '2022-01-12 04:25:22', '2022-02-10 01:06:07'),
(162, 'WhyOurMarketplaceTwo', 'update', 'App\\PageBuilder\\Addons\\WhyOurMarketplace\\WhyOurMarketplaceTwo', 'dynamic_page', 4, 38, 'dynamic_page', 'a:18:{s:2:\"id\";s:3:\"162\";s:10:\"addon_name\";s:20:\"WhyOurMarketplaceTwo\";s:15:\"addon_namespace\";s:84:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xXaHlPdXJNYXJrZXRwbGFjZVxXaHlPdXJNYXJrZXRwbGFjZVR3bw==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"4\";s:13:\"addon_page_id\";s:2:\"38\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:31:\"Why you ChooseThis Marketplace?\";s:8:\"subtitle\";s:298:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in rutrum odio, a blandit leo. Mauris placerat vulputate lacus eu eleifend. Donec euismod, metus id consequat egestas, tellus dui fermentum est, id porttitor tellus tortor in tellus. Maecenas non facilisis tortor. Duis et euismod augue.\";s:16:\"background_image\";s:2:\"53\";s:11:\"padding_top\";s:2:\"20\";s:14:\"padding_bottom\";s:2:\"50\";s:10:\"section_bg\";N;s:9:\"btn_color\";N;s:8:\"btn_text\";s:15:\"Join as  Seller\";s:8:\"btn_link\";N;s:28:\"contact_page_contact_info_01\";a:3:{s:6:\"image_\";a:4:{i:0;s:2:\"49\";i:1;s:2:\"50\";i:2;s:2:\"51\";i:3;s:2:\"52\";}s:6:\"title_\";a:4:{i:0;s:18:\"Service Commitment\";i:1;s:16:\"Super Experience\";i:2;s:21:\"Secure Data & Payment\";i:3;s:17:\"Dedecated Support\";}s:12:\"description_\";a:4:{i:0;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:1;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:2;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:3;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";}}}', '2022-01-12 05:56:37', '2022-02-02 04:47:37'),
(163, 'PopularServiceTwo', 'update', 'App\\PageBuilder\\Addons\\PopularService\\PopularServiceTwo', 'dynamic_page', 5, 38, 'dynamic_page', 'a:15:{s:2:\"id\";s:3:\"163\";s:10:\"addon_name\";s:17:\"PopularServiceTwo\";s:15:\"addon_namespace\";s:76:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xQb3B1bGFyU2VydmljZVxQb3B1bGFyU2VydmljZVR3bw==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"5\";s:13:\"addon_page_id\";s:2:\"38\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:16:\"Popular Services\";s:11:\"explore_all\";s:11:\"Explore All\";s:12:\"explore_link\";N;s:5:\"items\";s:1:\"4\";s:11:\"padding_top\";s:2:\"50\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;}', '2022-01-12 06:20:00', '2022-02-10 02:09:27'),
(164, 'BecomeSellerTwo', 'update', 'App\\PageBuilder\\Addons\\BecomeSeller\\BecomeSellerTwo', 'dynamic_page', 7, 38, 'dynamic_page', 'a:20:{s:2:\"id\";s:3:\"164\";s:10:\"addon_name\";s:15:\"BecomeSellerTwo\";s:15:\"addon_namespace\";s:68:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCZWNvbWVTZWxsZXJcQmVjb21lU2VsbGVyVHdv\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"6\";s:13:\"addon_page_id\";s:2:\"38\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:58:\"Join with us to Sale your service & growth your Experience\";s:8:\"subtitle\";s:40:\"Order any service, anytime from anywhere\";s:9:\"btn_color\";s:17:\"rgb(255, 107, 43)\";s:8:\"btn_text\";s:15:\"Become A Seller\";s:8:\"btn_link\";N;s:8:\"circle_1\";s:3:\"115\";s:8:\"circle_2\";s:3:\"116\";s:10:\"dot_square\";s:3:\"117\";s:10:\"line_cross\";s:3:\"118\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;}', '2022-01-12 07:24:18', '2022-04-28 03:40:15'),
(165, 'RecentBlogTwo', 'update', 'App\\PageBuilder\\Addons\\Home\\RecentBlogTwo', 'dynamic_page', 8, 38, 'dynamic_page', 'a:17:{s:2:\"id\";s:3:\"165\";s:10:\"addon_name\";s:13:\"RecentBlogTwo\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXFJlY2VudEJsb2dUd28=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"7\";s:13:\"addon_page_id\";s:2:\"38\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:15:\"Blog & Articles\";s:11:\"explore_all\";s:11:\"Explore All\";s:12:\"explore_link\";N;s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"4\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;}', '2022-01-12 08:11:41', '2022-04-28 03:40:15'),
(166, 'HeaderStyleFour', 'update', 'App\\PageBuilder\\Addons\\Header\\HeaderStyleFour', 'dynamic_page', 1, 39, 'dynamic_page', 'a:18:{s:2:\"id\";s:3:\"166\";s:10:\"addon_name\";s:15:\"HeaderStyleFour\";s:15:\"addon_namespace\";s:60:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIZWFkZXJcSGVhZGVyU3R5bGVGb3Vy\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"39\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:35:\"One-stop Solution for your Services\";s:8:\"subtitle\";s:40:\"Order any service, anytime from anywhere\";s:12:\"service_type\";s:16:\"Cleaning Service\";s:12:\"service_icon\";s:12:\"las la-broom\";s:12:\"service_link\";N;s:9:\"dot_image\";s:2:\"42\";s:12:\"banner_image\";s:2:\"41\";s:5:\"image\";s:2:\"58\";s:11:\"padding_top\";s:3:\"106\";s:14:\"padding_bottom\";s:2:\"99\";}', '2022-01-12 22:34:02', '2022-01-12 23:09:07'),
(167, 'BrowseCategoryTwo', 'update', 'App\\PageBuilder\\Addons\\BrowseCategory\\BrowseCategoryTwo', 'dynamic_page', 2, 39, 'dynamic_page', 'a:17:{s:2:\"id\";s:3:\"167\";s:10:\"addon_name\";s:17:\"BrowseCategoryTwo\";s:15:\"addon_namespace\";s:76:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCcm93c2VDYXRlZ29yeVxCcm93c2VDYXRlZ29yeVR3bw==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"2\";s:13:\"addon_page_id\";s:2:\"39\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:15:\"Browse Category\";s:11:\"explore_all\";s:11:\"Explore All\";s:12:\"explore_link\";N;s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"6\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:2:\"50\";s:10:\"section_bg\";N;}', '2022-01-12 23:15:02', '2022-02-09 06:27:28'),
(168, 'FeatureServiceTwo', 'update', 'App\\PageBuilder\\Addons\\FeatureService\\FeatureServiceTwo', 'dynamic_page', 3, 39, 'dynamic_page', 'a:16:{s:2:\"id\";s:3:\"168\";s:10:\"addon_name\";s:17:\"FeatureServiceTwo\";s:15:\"addon_namespace\";s:76:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xGZWF0dXJlU2VydmljZVxGZWF0dXJlU2VydmljZVR3bw==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"3\";s:13:\"addon_page_id\";s:2:\"39\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:17:\"Featured Services\";s:11:\"explore_all\";s:11:\"Explore All\";s:12:\"explore_link\";N;s:5:\"items\";s:1:\"4\";s:11:\"padding_top\";s:2:\"50\";s:14:\"padding_bottom\";s:2:\"50\";s:10:\"section_bg\";N;s:9:\"btn_color\";N;}', '2022-01-12 23:16:44', '2022-02-10 01:05:54'),
(169, 'BecomeSellerTwo', 'update', 'App\\PageBuilder\\Addons\\BecomeSeller\\BecomeSellerTwo', 'dynamic_page', 7, 39, 'dynamic_page', 'a:20:{s:2:\"id\";s:3:\"169\";s:10:\"addon_name\";s:15:\"BecomeSellerTwo\";s:15:\"addon_namespace\";s:68:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xCZWNvbWVTZWxsZXJcQmVjb21lU2VsbGVyVHdv\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"6\";s:13:\"addon_page_id\";s:2:\"39\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:58:\"Join with us to Sale your service & growth your Experience\";s:8:\"subtitle\";s:40:\"Order any service, anytime from anywhere\";s:9:\"btn_color\";N;s:8:\"btn_text\";s:15:\"Become A Seller\";s:8:\"btn_link\";N;s:8:\"circle_1\";s:3:\"115\";s:8:\"circle_2\";s:3:\"116\";s:10:\"dot_square\";s:3:\"117\";s:10:\"line_cross\";s:3:\"118\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;}', '2022-01-12 23:22:26', '2022-04-28 03:48:58'),
(170, 'WhyOurMarketplaceTwo', 'update', 'App\\PageBuilder\\Addons\\WhyOurMarketplace\\WhyOurMarketplaceTwo', 'dynamic_page', 4, 39, 'dynamic_page', 'a:18:{s:2:\"id\";s:3:\"170\";s:10:\"addon_name\";s:20:\"WhyOurMarketplaceTwo\";s:15:\"addon_namespace\";s:84:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xXaHlPdXJNYXJrZXRwbGFjZVxXaHlPdXJNYXJrZXRwbGFjZVR3bw==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"4\";s:13:\"addon_page_id\";s:2:\"39\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:31:\"Why you ChooseThis Marketplace?\";s:8:\"subtitle\";s:298:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in rutrum odio, a blandit leo. Mauris placerat vulputate lacus eu eleifend. Donec euismod, metus id consequat egestas, tellus dui fermentum est, id porttitor tellus tortor in tellus. Maecenas non facilisis tortor. Duis et euismod augue.\";s:16:\"background_image\";s:2:\"53\";s:11:\"padding_top\";s:2:\"20\";s:14:\"padding_bottom\";s:2:\"50\";s:10:\"section_bg\";N;s:9:\"btn_color\";N;s:8:\"btn_text\";s:15:\"Become A Seller\";s:8:\"btn_link\";N;s:28:\"contact_page_contact_info_01\";a:3:{s:6:\"image_\";a:4:{i:0;s:2:\"49\";i:1;s:2:\"50\";i:2;s:2:\"51\";i:3;s:2:\"52\";}s:6:\"title_\";a:4:{i:0;s:18:\"Service Commitment\";i:1;s:16:\"Super Experience\";i:2;s:21:\"Secure Data & Payment\";i:3;s:17:\"Dedecated Support\";}s:12:\"description_\";a:4:{i:0;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:1;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:2;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";i:3;s:124:\"It is a long established fact that a reader will be distracted by the readable. It is a long established fact that a reader.\";}}}', '2022-01-12 23:30:15', '2022-02-02 04:58:27'),
(171, 'PopularServiceTwo', 'update', 'App\\PageBuilder\\Addons\\PopularService\\PopularServiceTwo', 'dynamic_page', 5, 39, 'dynamic_page', 'a:15:{s:2:\"id\";s:3:\"171\";s:10:\"addon_name\";s:17:\"PopularServiceTwo\";s:15:\"addon_namespace\";s:76:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xQb3B1bGFyU2VydmljZVxQb3B1bGFyU2VydmljZVR3bw==\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"5\";s:13:\"addon_page_id\";s:2:\"39\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:16:\"Popular Services\";s:11:\"explore_all\";s:11:\"Explore All\";s:12:\"explore_link\";N;s:5:\"items\";s:1:\"4\";s:11:\"padding_top\";s:2:\"50\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;}', '2022-01-12 23:34:38', '2022-02-10 02:11:38'),
(172, 'RecentBlogTwo', 'update', 'App\\PageBuilder\\Addons\\Home\\RecentBlogTwo', 'dynamic_page', 8, 39, 'dynamic_page', 'a:17:{s:2:\"id\";s:3:\"172\";s:10:\"addon_name\";s:13:\"RecentBlogTwo\";s:15:\"addon_namespace\";s:56:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xIb21lXFJlY2VudEJsb2dUd28=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"7\";s:13:\"addon_page_id\";s:2:\"39\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:15:\"Blog & Articles\";s:11:\"explore_all\";s:11:\"Explore All\";s:12:\"explore_link\";N;s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"4\";s:11:\"padding_top\";s:3:\"100\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;}', '2022-01-12 23:36:46', '2022-04-28 03:48:58'),
(174, 'Faq', 'update', 'App\\PageBuilder\\Addons\\Faq\\Faq', 'dynamic_page', 1, 40, 'dynamic_page', 'a:12:{s:2:\"id\";s:3:\"174\";s:10:\"addon_name\";s:3:\"Faq\";s:15:\"addon_namespace\";s:40:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xGYXFcRmFx\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"1\";s:13:\"addon_page_id\";s:2:\"40\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:11:\"padding_top\";s:2:\"70\";s:14:\"padding_bottom\";s:3:\"100\";s:10:\"section_bg\";N;s:28:\"contact_page_contact_info_01\";a:2:{s:6:\"title_\";a:4:{i:0;s:53:\"Why is this such an important problem for you to fix?\";i:1;s:32:\"What’s your very first memory?\";i:2;s:34:\"Why do you need this solution now?\";i:3;s:44:\"What are the main features that interest you\";}s:12:\"description_\";a:4:{i:0;s:216:\"Sportsman delighted improving dashwoods gay instantly happiness six. Ham now amounted absolute not mistaken way pleasant whatever. At an these still no dried folly stood thing. Rapid it on hours hills it seven years.\";i:1;s:216:\"Sportsman delighted improving dashwoods gay instantly happiness six. Ham now amounted absolute not mistaken way pleasant whatever. At an these still no dried folly stood thing. Rapid it on hours hills it seven years.\";i:2;s:216:\"Sportsman delighted improving dashwoods gay instantly happiness six. Ham now amounted absolute not mistaken way pleasant whatever. At an these still no dried folly stood thing. Rapid it on hours hills it seven years.\";i:3;s:216:\"Sportsman delighted improving dashwoods gay instantly happiness six. Ham now amounted absolute not mistaken way pleasant whatever. At an these still no dried folly stood thing. Rapid it on hours hills it seven years.\";}}}', '2022-01-13 07:23:00', '2022-02-02 05:52:37'),
(175, 'OnlineService', 'update', 'App\\PageBuilder\\Addons\\OnlineService\\OnlineService', 'dynamic_page', 4, 16, 'dynamic_page', 'a:18:{s:2:\"id\";s:3:\"175\";s:10:\"addon_name\";s:13:\"OnlineService\";s:15:\"addon_namespace\";s:68:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xPbmxpbmVTZXJ2aWNlXE9ubGluZVNlcnZpY2U=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"4\";s:13:\"addon_page_id\";s:2:\"16\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:14:\"Online Service\";s:16:\"title_text_color\";s:17:\"rgb(29, 191, 115)\";s:8:\"subtitle\";s:98:\"Get online services at affordable price and take the best chance to grow your business and pthers.\";s:5:\"items\";s:1:\"6\";s:11:\"padding_top\";s:2:\"42\";s:14:\"padding_bottom\";s:2:\"97\";s:10:\"section_bg\";N;s:9:\"btn_color\";s:17:\"rgb(29, 191, 115)\";s:16:\"dot_color_slider\";s:12:\"dot-color-01\";s:16:\"book_appointment\";s:16:\"Book Appointment\";}', '2022-04-28 09:08:53', '2022-04-28 02:22:44'),
(176, 'OnlineService', 'update', 'App\\PageBuilder\\Addons\\OnlineService\\OnlineService', 'dynamic_page', 8, 22, 'dynamic_page', 'a:18:{s:2:\"id\";s:3:\"176\";s:10:\"addon_name\";s:13:\"OnlineService\";s:15:\"addon_namespace\";s:68:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xPbmxpbmVTZXJ2aWNlXE9ubGluZVNlcnZpY2U=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"8\";s:13:\"addon_page_id\";s:2:\"22\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:14:\"Online Service\";s:16:\"title_text_color\";N;s:8:\"subtitle\";s:61:\"Get Our online services now at affordable price and benifits.\";s:5:\"items\";s:1:\"3\";s:11:\"padding_top\";s:2:\"66\";s:14:\"padding_bottom\";s:2:\"61\";s:10:\"section_bg\";N;s:9:\"btn_color\";s:17:\"rgb(70, 202, 235)\";s:16:\"dot_color_slider\";s:12:\"dot-color-01\";s:16:\"book_appointment\";s:16:\"Book Appointment\";}', '2022-04-28 03:29:26', '2022-04-28 03:33:59'),
(177, 'OnlineServiceTwo', 'update', 'App\\PageBuilder\\Addons\\OnlineService\\OnlineServiceTwo', 'dynamic_page', 6, 38, 'dynamic_page', 'a:14:{s:2:\"id\";s:3:\"177\";s:10:\"addon_name\";s:16:\"OnlineServiceTwo\";s:15:\"addon_namespace\";s:72:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xPbmxpbmVTZXJ2aWNlXE9ubGluZVNlcnZpY2VUd28=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"6\";s:13:\"addon_page_id\";s:2:\"38\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:14:\"Online Service\";s:5:\"items\";s:1:\"4\";s:11:\"padding_top\";s:2:\"95\";s:14:\"padding_bottom\";s:2:\"91\";s:10:\"section_bg\";N;s:16:\"book_appointment\";s:8:\"Book Now\";}', '2022-04-28 03:40:59', '2022-04-28 03:44:12'),
(178, 'OnlineServiceTwo', 'update', 'App\\PageBuilder\\Addons\\OnlineService\\OnlineServiceTwo', 'dynamic_page', 6, 39, 'dynamic_page', 'a:14:{s:2:\"id\";s:3:\"178\";s:10:\"addon_name\";s:16:\"OnlineServiceTwo\";s:15:\"addon_namespace\";s:72:\"QXBwXFBhZ2VCdWlsZGVyXEFkZG9uc1xPbmxpbmVTZXJ2aWNlXE9ubGluZVNlcnZpY2VUd28=\";s:10:\"addon_type\";s:6:\"update\";s:14:\"addon_location\";s:12:\"dynamic_page\";s:11:\"addon_order\";s:1:\"6\";s:13:\"addon_page_id\";s:2:\"39\";s:15:\"addon_page_type\";s:12:\"dynamic_page\";s:5:\"title\";s:14:\"Online Service\";s:5:\"items\";s:1:\"4\";s:11:\"padding_top\";s:2:\"93\";s:14:\"padding_bottom\";s:2:\"88\";s:10:\"section_bg\";N;s:16:\"book_appointment\";s:8:\"Book Now\";}', '2022-04-28 03:49:25', '2022-04-28 03:49:53');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` bigint(20) NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `project_details_id` bigint(20) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'transaction status',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payout_requests`
--

CREATE TABLE `payout_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending 1=complete, 2=cancelled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'admin', '2021-09-01 22:54:39', '2021-09-01 22:54:39'),
(2, 'user-create', 'admin', '2021-09-01 22:54:39', '2021-09-01 22:54:39'),
(3, 'user-edit', 'admin', '2021-09-01 22:54:40', '2021-09-01 22:54:40'),
(4, 'user-delete', 'admin', '2021-09-01 22:54:40', '2021-09-01 22:54:40'),
(53, 'blog-list', 'admin', '2021-09-01 23:13:54', '2021-09-01 23:13:54'),
(54, 'blog-create', 'admin', '2021-09-01 23:13:54', '2021-09-01 23:13:54'),
(55, 'blog-edit', 'admin', '2021-09-01 23:13:54', '2021-09-01 23:13:54'),
(56, 'blog-delete', 'admin', '2021-09-01 23:13:54', '2021-09-01 23:13:54'),
(57, 'category-list', 'admin', '2021-09-01 23:13:54', '2021-09-01 23:13:54'),
(58, 'category-create', 'admin', '2021-09-01 23:13:54', '2021-09-01 23:13:54'),
(59, 'category-edit', 'admin', '2021-09-01 23:13:55', '2021-09-01 23:13:55'),
(60, 'category-delete', 'admin', '2021-09-01 23:13:55', '2021-09-01 23:13:55'),
(62, 'pages-list', 'admin', '2021-09-01 23:16:49', '2021-09-01 23:16:49'),
(63, 'pages-create', 'admin', '2021-09-01 23:16:49', '2021-09-01 23:16:49'),
(64, 'pages-edit', 'admin', '2021-09-01 23:16:50', '2021-09-01 23:16:50'),
(65, 'pages-delete', 'admin', '2021-09-01 23:16:50', '2021-09-01 23:16:50'),
(74, 'form-builder', 'admin', '2021-09-01 23:21:54', '2021-09-01 23:21:54'),
(81, 'appearance-topbar-settings', 'admin', '2021-09-01 23:25:07', '2021-09-01 23:25:07'),
(82, 'appearance-menubar-settings', 'admin', '2021-09-01 23:25:07', '2021-09-01 23:25:07'),
(83, 'appearance-media-image-manage', 'admin', '2021-09-01 23:25:07', '2021-09-01 23:25:07'),
(85, 'appearance-widget-builder', 'admin', '2021-09-01 23:25:07', '2021-09-01 23:25:07'),
(86, 'appearance-menu-list', 'admin', '2021-09-01 23:25:08', '2021-09-01 23:25:08'),
(87, 'appearance-menu-edit', 'admin', '2021-09-01 23:25:08', '2021-09-01 23:25:08'),
(88, 'appearance-menu-delete', 'admin', '2021-09-01 23:25:08', '2021-09-01 23:25:08'),
(97, 'general-settings-site-identity', 'admin', '2021-09-01 23:37:59', '2021-09-01 23:37:59'),
(98, 'general-settings-basic-settings', 'admin', '2021-09-01 23:37:59', '2021-09-01 23:37:59'),
(99, 'general-settings-color-settings', 'admin', '2021-09-01 23:37:59', '2021-09-01 23:37:59'),
(100, 'general-settings-typography-settings', 'admin', '2021-09-01 23:37:59', '2021-09-01 23:37:59'),
(101, 'general-settings-seo-settings', 'admin', '2021-09-01 23:37:59', '2021-09-01 23:37:59'),
(102, 'general-settings-third-party-scripts', 'admin', '2021-09-01 23:37:59', '2021-09-01 23:37:59'),
(103, 'general-settings-email-template', 'admin', '2021-09-01 23:37:59', '2021-09-01 23:37:59'),
(104, 'general-settings-email-settings', 'admin', '2021-09-01 23:37:59', '2021-09-01 23:37:59'),
(105, 'general-settings-smtp-settings', 'admin', '2021-09-01 23:37:59', '2021-09-01 23:37:59'),
(108, 'general-settings-custom-css', 'admin', '2021-09-01 23:37:59', '2021-09-01 23:37:59'),
(109, 'general-settings-custom-js', 'admin', '2021-09-01 23:37:59', '2021-09-01 23:37:59'),
(110, 'general-settings-licence-settings', 'admin', '2021-09-01 23:38:00', '2021-09-01 23:38:00'),
(111, 'general-settings-cache-settings', 'admin', '2021-09-01 23:38:00', '2021-09-01 23:38:00'),
(112, 'language-list', 'admin', '2021-09-01 23:38:01', '2021-09-01 23:38:01'),
(113, 'language-create', 'admin', '2021-09-01 23:38:01', '2021-09-01 23:38:01'),
(114, 'language-edit', 'admin', '2021-09-01 23:38:01', '2021-09-01 23:38:01'),
(115, 'language-delete', 'admin', '2021-09-01 23:38:01', '2021-09-01 23:38:01'),
(119, 'appearance-menu-create', 'admin', '2021-09-05 05:15:19', '2021-09-05 05:15:19'),
(120, 'blog-tag-list', 'admin', NULL, NULL),
(121, 'blog-tag-create', 'admin', '2021-10-28 04:14:02', '2021-10-28 04:14:02'),
(122, 'blog-tag-edit', 'admin', '2021-10-28 04:14:02', '2021-10-28 04:14:02'),
(123, 'blog-tag-delete', 'admin', '2021-10-28 04:14:02', '2021-10-28 04:14:02'),
(124, 'blog-trashed-list', 'admin', '2021-10-28 04:14:02', '2021-10-28 04:14:02'),
(125, 'blog-trashed-restore', 'admin', '2021-10-28 04:14:02', '2021-10-28 04:14:02'),
(126, 'blog-trashed-delete', 'admin', '2021-10-28 04:14:02', '2021-10-28 04:14:02'),
(150, 'general-settings-reading-settings', 'admin', '2021-10-28 04:14:04', '2021-10-28 04:14:04'),
(151, 'general-settings-global-navbar-settings', 'admin', '2021-10-28 04:14:04', '2021-10-28 04:14:04'),
(152, 'general-settings-global-footer-settings', 'admin', '2021-10-28 04:14:04', '2021-10-28 04:14:04'),
(184, 'category-status', 'admin', '2022-01-16 02:46:33', '2022-01-16 02:46:33'),
(185, 'subcategory-list', 'admin', '2022-01-16 02:46:33', '2022-01-16 02:46:33'),
(186, 'subcategory-create', 'admin', '2022-01-16 02:46:33', '2022-01-16 02:46:33'),
(187, 'subcategory-edit', 'admin', '2022-01-16 02:46:33', '2022-01-16 02:46:33'),
(188, 'subcategory-delete', 'admin', '2022-01-16 02:46:33', '2022-01-16 02:46:33'),
(189, 'subcategory-status', 'admin', '2022-01-16 02:46:33', '2022-01-16 02:46:33'),
(190, 'brand-list', 'admin', '2022-01-16 02:46:33', '2022-01-16 02:46:33'),
(191, 'brand-create', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(192, 'brand-edit', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(193, 'brand-delete', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(194, 'country-list', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(195, 'country-create', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(196, 'country-edit', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(197, 'country-delete', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(198, 'country-status', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(199, 'city-list', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(200, 'city-create', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(201, 'city-edit', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(202, 'city-delete', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(203, 'city-status', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(204, 'area-list', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(205, 'area-create', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(206, 'area-edit', 'admin', '2022-01-16 02:46:34', '2022-01-16 02:46:34'),
(207, 'area-delete', 'admin', '2022-01-16 02:46:35', '2022-01-16 02:46:35'),
(208, 'area-status', 'admin', '2022-01-16 02:46:35', '2022-01-16 02:46:35'),
(209, 'service-list', 'admin', '2022-01-16 02:46:35', '2022-01-16 02:46:35'),
(210, 'service-delete', 'admin', '2022-01-16 02:46:35', '2022-01-16 02:46:35'),
(211, 'service-status', 'admin', '2022-01-16 02:46:35', '2022-01-16 02:46:35'),
(212, 'service-view', 'admin', '2022-01-16 02:46:35', '2022-01-16 02:46:35'),
(213, 'order-list', 'admin', '2022-01-16 02:46:35', '2022-01-16 02:46:35'),
(214, 'order-delete', 'admin', '2022-01-16 02:46:35', '2022-01-16 02:46:35'),
(216, 'order-view', 'admin', '2022-01-16 02:46:35', '2022-01-16 02:46:35'),
(227, 'payout-list', 'admin', '2022-02-08 04:21:08', '2022-02-08 04:21:08'),
(228, 'payout-edit', 'admin', '2022-02-08 04:21:08', '2022-02-08 04:21:08'),
(229, 'admin-commission', 'admin', '2022-02-08 04:21:08', '2022-02-08 04:21:08'),
(230, 'amount-settings', 'admin', '2022-02-08 04:21:08', '2022-02-08 04:21:08'),
(232, 'payout-delete', 'admin', '2022-02-08 04:36:26', '2022-02-08 04:36:26'),
(233, 'payout-view', 'admin', '2022-02-08 04:36:26', '2022-02-08 04:36:26'),
(234, 'blog-detail-setting', 'admin', '2022-02-12 23:36:27', '2022-02-12 23:36:27'),
(235, 'service-book-setting', 'admin', '2022-02-12 23:36:27', '2022-02-12 23:36:27'),
(236, 'service-detail-setting', 'admin', '2022-02-12 23:36:27', '2022-02-12 23:36:27'),
(237, 'ticket-list', 'admin', '2022-04-23 03:33:03', '2022-04-23 03:33:03'),
(238, 'ticket-view', 'admin', '2022-04-23 03:33:03', '2022-04-23 03:33:03'),
(239, 'ticket-delete', 'admin', '2022-04-23 03:33:03', '2022-04-23 03:33:03'),
(240, 'slider-list', 'admin', '2022-04-23 03:33:03', '2022-04-23 03:33:03'),
(241, 'slider-edit', 'admin', '2022-04-23 03:33:04', '2022-04-23 03:33:04'),
(242, 'slider-delete', 'admin', '2022-04-23 03:33:04', '2022-04-23 03:33:04'),
(243, 'project-list', 'admin', NULL, NULL),
(244, 'project-create', 'admin', NULL, NULL),
(254, 'project-edit', 'admin', NULL, NULL),
(255, 'project-delete', 'admin', NULL, NULL),
(256, 'project-status', 'admin', NULL, NULL),
(257, 'requirement-list', 'admin', NULL, NULL),
(258, 'requirement-create', 'admin', NULL, NULL),
(259, 'requirement-edit', 'admin', NULL, NULL),
(260, 'requirement-delete', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `recognition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `references` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certifications` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Years of professional experience',
  `apps_developed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_profile_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github_profile_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_availability` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projects_like_to_work` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_bio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `recognition`, `references`, `reference_mobile_no`, `education`, `certifications`, `skills`, `experience`, `apps_developed`, `linkedin_profile_link`, `github_profile_link`, `time_availability`, `projects_like_to_work`, `profile_photo`, `resume`, `short_bio`, `created_at`, `updated_at`) VALUES
(1, 411, 'Libero eos voluptat', 'Explicabo Sunt aspe', 'In commodo libero do', 'graduate', 'Duis aperiam recusan', 'flutter', '3', 'Mollit non eu et et', 'Et odit sit sint i', 'Est nobis qui ut vit', 'full_time', 'Ad sint ipsum cons', NULL, '07-09-2022-092640.pdf', NULL, '2022-09-07 04:26:40', '2022-09-07 04:26:40'),
(2, 412, 'Nulla cupidatat pari', 'Perspiciatis lorem', 'Excepturi dolor omni', 'graduate', 'Est illum eum dist', 'flutter', '3', 'Laborum Doloremque', 'Aut quis at ex labor', 'Incididunt provident', 'full_time', 'Ea rerum repudiandae', NULL, '07-09-2022-093013.pdf', NULL, '2022-09-07 04:30:13', '2022-09-07 04:30:13'),
(3, 413, 'Nisi autem laboriosa', 'Autem nostrum ea et', '1234567', 'graduate', 'Libero cupiditate ne', 'flutter', '3', 'Eveniet qui pariatu', 'Ipsam mollitia deser', 'Enim quas dolorum co', 'full_time', 'Laudantium fugit c', NULL, '26-09-2022-113857.jpg', 'Velit blanditiis co', '2022-09-26 06:38:57', '2022-09-26 06:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requirement_id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL COMMENT 'customer id',
  `service_provider_id` bigint(20) NOT NULL COMMENT 'seller id',
  `convert_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'single project , milestone project',
  `total_cost` int(11) NOT NULL,
  `service_provider_cost` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=started, 2=completed, 3=rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `requirement_id`, `client_id`, `service_provider_id`, `convert_type`, `total_cost`, `service_provider_cost`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 396, 404, 'milestone-project', 50, 10, '<strong>Seller: </strong>started work on it.', 2, '2022-09-09 04:29:33', '2022-09-16 07:56:19'),
(2, 1, 396, 404, 'single-project', 10, 8, NULL, 1, '2022-09-15 08:18:42', '2022-09-26 06:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `project_deliveries`
--

CREATE TABLE `project_deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_detial_id` bigint(20) NOT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `describe` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `is_client_read` tinyint(1) NOT NULL DEFAULT 0,
  `is_seller_read` tinyint(1) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=accept, 3=rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_provider_cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeframe` int(11) NOT NULL COMMENT 'days',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=started, 2=completed, 3=rejected',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`id`, `project_id`, `name`, `slug`, `total_cost`, `service_provider_cost`, `timeframe`, `description`, `attachment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'First milestone', 'first-milestone', '15', '10', 10, 'lorem ipusm', '09-09-2022-092933.png', 1, '2022-09-09 04:29:33', '2022-09-16 07:56:19'),
(2, 1, 'Second Milestone', 'second-milestone', '15', '10', 10, 'lorem ipusm', '09-09-2022-092933.png', 0, '2022-09-09 04:29:33', '2022-09-09 04:29:33'),
(3, 2, 'My updated name', 'my-updated-name', '10', '8', 30, 'lorem ipsum', '15-09-2022-131842.png', 0, '2022-09-15 08:18:42', '2022-09-15 08:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `service_id` bigint(20) DEFAULT NULL,
  `seller_id` bigint(20) NOT NULL,
  `buyer_id` bigint(20) NOT NULL,
  `report_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `report` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE `requirements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requirement_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `project_manager_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachments` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `deliveries` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `budget` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=converted project',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `requirement_name`, `slug`, `client_id`, `project_manager_id`, `contact_mobile`, `contact_email`, `details`, `notes`, `attachments`, `deliveries`, `budget`, `contract`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 'game app development', 'game-app-development', 396, 28, '7977019987', 'anshulswarup@yahoo.com', 'need a game with blocks falling', 'for android and ios', NULL, NULL, '$5000', NULL, 'High', 1, '2022-08-16 13:40:43', '2022-09-15 08:18:42'),
(2, 'anshul client game app', 'anshul-client-game-app', 396, 31, '7977019987', 'anshulswarup@yahoo.com', '-hkghk', NULL, NULL, NULL, '$6000', '[\"requirements\\/anshul client game app\\/contract\\/Poolr Feedback.pdf\"]', 'High', 1, '2022-08-17 12:22:21', '2022-09-09 04:29:33'),
(3, 'Alana Murphy', '', 395, 31, '+1 (985) 209-1502', 'tequsemywu@mailinator.com', 'Excepteur adipisicin', 'Et laboriosam fugia', '[\"requirements\\/Alana Murphy\\/attachments\\/qixer dev.docx\"]', '[\"requirements\\/Alana Murphy\\/deliveries\\/157977812389.jpg\"]', '455', '[\"requirements\\/Alana Murphy\\/contract\\/trust_158114996587.jpg\"]', 'High', 0, '2022-09-26 05:33:44', '2022-09-26 05:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `rating` double NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', '2021-09-01 23:42:51', '2021-09-01 23:42:51'),
(2, 'Admin', 'admin', '2021-09-01 23:45:03', '2021-09-01 23:45:03'),
(3, 'Editor', 'admin', '2021-09-01 23:45:48', '2021-09-02 00:08:10'),
(4, 'Project Manager', 'admin', '2022-08-10 14:00:18', '2022-08-10 14:00:18'),
(5, 'blog creator', 'admin', '2022-08-17 12:32:35', '2022-08-17 12:32:35');

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
(1, 1),
(1, 2),
(1, 4),
(2, 1),
(2, 2),
(2, 4),
(3, 1),
(3, 4),
(4, 1),
(53, 1),
(53, 2),
(53, 4),
(53, 5),
(54, 1),
(54, 2),
(54, 4),
(54, 5),
(55, 1),
(55, 2),
(55, 4),
(55, 5),
(56, 1),
(56, 2),
(56, 4),
(56, 5),
(57, 1),
(57, 2),
(57, 4),
(58, 1),
(58, 2),
(58, 4),
(59, 1),
(59, 2),
(59, 4),
(60, 1),
(60, 2),
(60, 4),
(62, 1),
(62, 4),
(63, 1),
(63, 4),
(64, 1),
(64, 4),
(65, 1),
(65, 4),
(74, 1),
(74, 2),
(74, 4),
(81, 1),
(81, 2),
(81, 4),
(82, 1),
(82, 2),
(82, 4),
(83, 1),
(83, 2),
(83, 4),
(85, 1),
(85, 2),
(85, 4),
(86, 1),
(86, 2),
(86, 4),
(87, 1),
(87, 2),
(87, 4),
(88, 1),
(88, 2),
(88, 4),
(97, 1),
(97, 2),
(97, 4),
(98, 1),
(98, 2),
(98, 4),
(99, 1),
(99, 2),
(99, 4),
(100, 1),
(100, 2),
(100, 4),
(101, 1),
(101, 2),
(101, 4),
(102, 1),
(102, 2),
(102, 4),
(103, 1),
(103, 2),
(103, 4),
(104, 1),
(104, 2),
(104, 4),
(105, 1),
(105, 2),
(105, 4),
(108, 1),
(108, 2),
(108, 4),
(109, 1),
(109, 2),
(109, 4),
(110, 1),
(110, 2),
(110, 4),
(111, 1),
(111, 4),
(112, 1),
(112, 3),
(112, 4),
(113, 1),
(113, 3),
(113, 4),
(114, 1),
(114, 3),
(114, 4),
(115, 1),
(115, 3),
(115, 4),
(119, 1),
(119, 2),
(119, 4),
(120, 2),
(120, 4),
(121, 2),
(121, 4),
(121, 5),
(122, 2),
(122, 5),
(123, 2),
(123, 4),
(123, 5),
(124, 2),
(124, 4),
(125, 2),
(125, 4),
(126, 2),
(126, 4),
(150, 4),
(152, 4),
(184, 2),
(184, 4),
(185, 2),
(185, 4),
(186, 2),
(186, 4),
(187, 2),
(187, 4),
(188, 2),
(189, 2),
(189, 4),
(190, 2),
(190, 4),
(191, 2),
(191, 4),
(192, 2),
(192, 4),
(193, 2),
(193, 4),
(194, 2),
(194, 4),
(195, 4),
(196, 2),
(196, 4),
(197, 4),
(198, 2),
(198, 4),
(199, 2),
(199, 4),
(200, 2),
(200, 4),
(201, 2),
(201, 4),
(202, 4),
(203, 2),
(203, 4),
(204, 2),
(204, 4),
(205, 4),
(206, 2),
(206, 4),
(207, 4),
(208, 2),
(208, 4),
(209, 2),
(209, 4),
(210, 2),
(210, 4),
(211, 2),
(211, 4),
(212, 2),
(212, 4),
(213, 2),
(213, 4),
(214, 4),
(216, 2),
(216, 4),
(227, 2),
(227, 4),
(228, 2),
(229, 2),
(230, 2),
(233, 2),
(233, 4),
(234, 4),
(235, 2),
(235, 4),
(236, 2),
(236, 4),
(237, 4),
(238, 4),
(239, 4),
(240, 4),
(241, 4),
(242, 4),
(243, 4),
(244, 4),
(254, 4),
(255, 4),
(256, 4),
(257, 4),
(258, 4),
(259, 4),
(260, 4);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `schedule` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `day_id`, `seller_id`, `schedule`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '10.00AM-11.00AM', 0, '2021-12-14 00:15:14', '2021-12-14 00:15:14'),
(2, 1, 1, '12.00AM-01.00PM', 0, '2021-12-14 00:18:34', '2021-12-14 00:18:34'),
(9, 7, 1, '10.00AM-11.00AM', 0, '2021-12-14 03:52:49', '2021-12-14 03:52:49'),
(10, 7, 1, '12.00AM-01.00PM', 0, '2021-12-14 03:53:03', '2021-12-14 03:53:03'),
(11, 8, 1, '04.00AM-05.00AM', 0, '2021-12-14 05:29:30', '2021-12-14 05:29:30'),
(12, 9, 1, '12.00AM-01.00PM', 0, '2021-12-14 05:29:54', '2021-12-14 05:29:54'),
(13, 14, 2, '12.00AM-01.00PM', 0, '2022-01-17 08:27:31', '2022-01-17 08:27:31'),
(14, 27, 5, '10.00AM-11.00AM', 0, '2022-02-07 02:33:30', '2022-02-07 02:33:30'),
(15, 15, 1, '12.00AM-01.00PM', 0, '2022-02-09 00:34:36', '2022-02-09 00:34:36'),
(16, 16, 1, '12.00AM-01.00PM', 0, '2022-02-09 00:34:48', '2022-02-09 00:34:48'),
(17, 17, 1, '12.00AM-01.00PM', 0, '2022-02-09 00:34:57', '2022-02-09 00:34:57'),
(18, 19, 2, '10.00AM-11.00PM', 0, '2022-02-09 00:39:31', '2022-02-09 00:39:31'),
(19, 20, 2, '12.00AM-01.00PM', 0, '2022-02-09 00:39:44', '2022-02-09 00:39:44'),
(20, 21, 2, '10.00AM-11.00PM', 0, '2022-02-09 00:39:57', '2022-02-09 00:39:57'),
(21, 22, 2, '4.00AM-6.00PM', 0, '2022-02-09 00:40:19', '2022-02-09 00:40:19'),
(22, 23, 2, '10.00AM-11.00PM', 0, '2022-02-09 00:40:33', '2022-02-09 00:40:33'),
(24, 27, 4, '12.00AM-01.00PM', 0, '2022-02-09 00:45:45', '2022-02-09 00:45:45'),
(25, 28, 4, '10.00AM-11.00PM', 0, '2022-02-09 00:45:54', '2022-02-09 00:45:54'),
(26, 29, 4, '4.00AM-6.00PM', 0, '2022-02-09 00:46:05', '2022-02-09 00:46:05'),
(27, 19, 2, '4.00AM-6.00PM', 0, '2022-02-14 00:46:35', '2022-02-14 00:46:35'),
(28, 20, 2, '10.00AM-11.00PM', 0, '2022-02-14 00:46:59', '2022-02-14 00:46:59'),
(29, 7, 1, '04.00AM-05.00PM', 0, '2022-02-27 01:38:54', '2022-02-27 01:38:54'),
(30, 8, 1, '12.00AM-01.00PM', 0, '2022-02-27 01:39:16', '2022-02-27 01:39:16'),
(31, 8, 1, '10.00AM-11.00PM', 0, '2022-02-27 01:39:28', '2022-02-27 01:39:28'),
(32, 9, 1, '10.00AM-11.00PM', 0, '2022-02-27 01:40:14', '2022-02-27 01:40:14'),
(33, 9, 1, '04.00AM-05.00PM', 0, '2022-02-27 01:40:30', '2022-02-27 01:40:30'),
(34, 15, 1, '03.00AM-04.00PM', 0, '2022-02-27 01:41:05', '2022-02-27 01:41:05'),
(35, 15, 1, '09.00AM-10.00PM', 0, '2022-02-27 01:41:27', '2022-02-27 01:41:27'),
(36, 7, 1, '07.00AM-08.00PM', 0, '2022-02-27 01:46:25', '2022-02-27 01:46:25'),
(37, 27, 4, '10.00AM-11.00PM', 0, '2022-02-27 01:47:21', '2022-02-27 01:47:21'),
(38, 27, 4, '4.00AM-6.00PM', 0, '2022-02-27 01:47:32', '2022-02-27 01:47:32'),
(39, 28, 4, '4.00AM-6.00PM', 0, '2022-02-27 01:47:50', '2022-02-27 01:47:50'),
(40, 29, 4, '10.00AM-11.00PM', 0, '2022-02-27 01:48:17', '2022-02-27 01:48:17'),
(41, 29, 4, '1.00AM-2.00PM', 0, '2022-02-27 01:50:56', '2022-02-27 01:50:56'),
(42, 14, 2, '10.00AM-11.00PM', 0, '2022-02-27 01:51:49', '2022-02-27 01:51:49'),
(43, 19, 2, '11.00AM-12.00PM', 0, '2022-02-27 01:52:05', '2022-02-27 01:52:05'),
(44, 21, 2, '10.00AM-11.00PM', 0, '2022-02-27 01:52:24', '2022-02-27 01:52:24'),
(45, 20, 2, '10.00AM-11.00PM', 0, '2022-02-27 01:52:36', '2022-02-27 01:52:36'),
(46, 22, 2, '10.00AM-11.00PM', 0, '2022-02-27 01:53:30', '2022-02-27 01:53:30'),
(47, 23, 2, '11.00AM-12.00PM', 0, '2022-02-27 01:53:38', '2022-02-27 01:53:51');

-- --------------------------------------------------------

--
-- Table structure for table `seller_verifies`
--

CREATE TABLE `seller_verifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` bigint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_verifies`
--

INSERT INTO `seller_verifies` (`id`, `seller_id`, `national_id`, `address`, `status`, `created_at`, `updated_at`) VALUES
(66, '399', NULL, NULL, 0, '2022-08-17 12:56:01', '2022-09-02 10:09:32'),
(67, '0', NULL, NULL, 0, '2022-09-06 03:37:58', '2022-09-06 03:37:58'),
(68, '0', NULL, NULL, 0, '2022-09-06 04:09:48', '2022-09-06 04:09:48'),
(69, '0', NULL, NULL, 0, '2022-09-06 04:11:44', '2022-09-06 04:11:44'),
(70, '0', NULL, NULL, 0, '2022-09-07 04:26:52', '2022-09-07 04:26:52'),
(71, '0', NULL, NULL, 0, '2022-09-07 04:30:19', '2022-09-07 04:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `serviceadditionals`
--

CREATE TABLE `serviceadditionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(11) DEFAULT NULL,
  `seller_id` bigint(11) DEFAULT NULL,
  `additional_service_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_service_price` double DEFAULT NULL,
  `additional_service_quantity` int(11) DEFAULT NULL,
  `additional_service_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serviceadditionals`
--

INSERT INTO `serviceadditionals` (`id`, `service_id`, `seller_id`, `additional_service_title`, `additional_service_price`, `additional_service_quantity`, `additional_service_image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Kitchen', 20, 2, '137', NULL, '2022-06-02 16:18:43'),
(2, 1, 1, 'Fridge', 10, 1, '136', NULL, '2022-06-02 16:18:43'),
(3, 2, 1, 'Ac Service', 5, 1, '139', NULL, '2022-02-13 03:07:52'),
(4, 3, 1, 'Facial', 5, 1, '140', NULL, '2022-02-13 04:09:55'),
(5, 4, 1, 'Table Moving', 5, 2, '141', NULL, '2022-02-13 03:12:39'),
(6, 5, 1, 'Kitchen Cleaning', 5, 1, '137', NULL, '2022-02-13 03:13:57'),
(7, 5, 1, 'Door Cleaning', 10, 1, '142', NULL, '2022-02-13 03:13:57'),
(8, 6, 1, 'AC Dry Wash', 4, 1, '139', NULL, '2022-02-13 06:00:52'),
(9, 7, 1, 'Kitchen Painting 10x10', 90, 1, '137', NULL, '2022-02-13 03:14:46'),
(10, 8, 2, 'Back Massage', 3, 1, '145', NULL, '2022-02-13 03:33:22'),
(11, 1, 1, 'TV', 11, 1, '138', NULL, '2022-06-02 16:18:43'),
(12, 1, 1, 'Wall2', 12, 1, '135', NULL, '2022-06-02 16:18:43'),
(13, 9, 2, 'Boys Beard Shave', 3, 1, '146', NULL, '2022-02-13 03:35:56'),
(14, 9, 2, 'Cool Cutting Style', 2, 1, '147', NULL, '2022-02-13 03:35:56'),
(18, 12, 2, 'Car Dry Wash', 10, 1, '148', NULL, '2022-02-13 04:00:09'),
(19, 13, 2, 'Sofa Cover Cloth Clean', 3, 1, '150', NULL, '2022-02-13 03:40:47'),
(20, 13, 2, '2 Seater Sofa Dry Wash', 10, 1, '150', NULL, '2022-02-13 03:40:47'),
(21, 14, 2, 'Wire Change', 2, 1, '151', NULL, '2022-02-13 03:42:58'),
(22, 14, 2, 'Circuit Board', 3, 1, '152', NULL, '2022-02-13 03:42:58'),
(23, 15, 2, 'Furniture Set', 30, 1, '153', NULL, '2022-02-13 03:43:28'),
(24, 16, 1, 'Drying Car', 3, 1, '143', NULL, '2022-02-13 03:15:51'),
(25, 12, 2, 'Car Full Service', 50, 1, '149', NULL, '2022-02-13 04:00:09'),
(26, 17, 5, 'Hair Color', 5, 1, '154', NULL, '2022-02-13 03:45:24'),
(27, 18, 5, 'TV Cleaning Service', 10, 1, '155', NULL, '2022-02-13 03:58:02'),
(28, 19, 5, '5 Switch Board Repair', 5, 1, '156', NULL, '2022-02-13 03:47:17'),
(29, 20, 5, 'Only Face Makeup', 5, 1, '157', NULL, '2022-02-13 03:48:46'),
(56, 36, 1, 'Kitchen Cleaning', 20, 1, '137', NULL, '2022-02-13 03:29:25'),
(57, 36, 1, 'Window Clean', 20, 1, '144', NULL, '2022-02-13 03:29:25'),
(58, 36, 1, 'Table', 10, 1, '141', NULL, '2022-02-13 03:29:25'),
(62, 12, 2, 'Tire Change', NULL, 1, '158', NULL, '2022-02-13 04:00:10'),
(63, 8, 2, 'Hand Massage', NULL, 1, '159', NULL, NULL),
(64, 2, 1, 'Ac Clean', 5, 1, '160', NULL, NULL),
(65, 3, 1, 'Hair Color', 5, 1, '162', NULL, '2022-02-13 04:09:55'),
(66, 4, 1, 'Door Moving', 5, 1, '163', NULL, NULL),
(71, 41, 1, 'Get business plan', 10, 1, '139', NULL, '2022-04-28 03:06:56'),
(72, 41, 1, 'Business Idea', 10, 1, '144', NULL, '2022-04-28 03:06:56'),
(82, 49, 1, 'werwer', 10, 1, '168', NULL, NULL),
(83, 49, 1, '1asasd asdas', 20, 1, '170', NULL, NULL),
(84, 56, 1, 'Profile Build', 10, 1, NULL, NULL, NULL),
(85, 56, 1, 'Profile Brand', 20, 1, NULL, NULL, NULL),
(86, 53, 1, 'Service One', 10, 1, '187', NULL, '2022-04-28 03:02:09'),
(87, 53, 1, 'Service Two', 12, 1, '186', NULL, '2022-04-28 03:02:09'),
(88, 53, 1, 'Service Three', 15, 1, '185', NULL, '2022-04-28 03:02:09'),
(89, 50, 1, 'Business scerrt', 10, 1, '186', NULL, '2022-04-28 03:03:07'),
(90, 50, 1, 'Business plan', 10, 1, '183', NULL, '2022-04-28 03:03:07'),
(91, 50, 1, 'Business idea', NULL, 1, '184', NULL, '2022-04-28 03:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `servicebenifits`
--

CREATE TABLE `servicebenifits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(11) DEFAULT NULL,
  `seller_id` bigint(11) DEFAULT NULL,
  `benifits` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicebenifits`
--

INSERT INTO `servicebenifits` (`id`, `service_id`, `seller_id`, `benifits`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Service Gurantee2', NULL, '2022-06-02 16:18:43'),
(2, 1, 1, 'Quality Service2', NULL, '2022-06-02 16:18:43'),
(3, 1, 1, 'Timely Work2', NULL, '2022-06-02 16:18:43'),
(4, 2, 1, 'Service Gurantee', NULL, '2022-02-13 03:07:52'),
(5, 2, 1, 'Quality Service', NULL, '2022-02-13 03:07:52'),
(6, 3, 1, 'Service From Home', NULL, '2022-02-13 04:09:55'),
(7, 3, 1, 'Quality Service', NULL, '2022-02-13 04:09:55'),
(8, 3, 1, 'Timely Service', NULL, '2022-02-13 04:09:55'),
(9, 4, 1, 'Service Gurantee', NULL, '2022-02-13 03:12:39'),
(10, 4, 1, 'Quality Service', NULL, '2022-02-13 03:12:39'),
(11, 5, 1, 'Quality Service', NULL, '2022-02-13 03:13:57'),
(12, 5, 1, 'Service Gurantee', NULL, '2022-02-13 03:13:57'),
(13, 5, 1, 'Timely work', NULL, '2022-02-13 03:13:57'),
(14, 6, 1, 'Home Service', NULL, '2022-02-13 06:00:52'),
(15, 6, 1, 'Service Gurantee', NULL, '2022-02-13 06:00:52'),
(16, 6, 1, 'Quality Service', NULL, '2022-02-13 06:00:52'),
(17, 7, 1, 'Home Service', NULL, '2022-02-13 03:14:46'),
(18, 7, 1, 'Service Gurantee', NULL, '2022-02-13 03:14:46'),
(19, 7, 1, 'Work In Time', NULL, '2022-02-13 03:14:47'),
(20, 8, 2, 'Ouality Service', NULL, '2022-02-13 03:33:22'),
(21, 8, 2, 'Service Guaranty', NULL, '2022-02-13 03:33:22'),
(22, 8, 2, 'Service in Home', NULL, '2022-02-13 03:33:23'),
(23, 1, 1, 'Friendly Service Provider', NULL, '2022-06-02 16:18:43'),
(24, 1, 1, 'customizable', NULL, '2022-06-02 16:18:43'),
(25, 9, 2, 'Service Guaranty', NULL, '2022-02-13 03:35:56'),
(26, 9, 2, 'Quality Service', NULL, '2022-02-13 03:35:56'),
(27, 9, 2, 'Coffee Offer', NULL, '2022-02-13 03:35:56'),
(31, 12, 2, 'Service Guaranty', NULL, '2022-02-13 04:00:10'),
(32, 13, 2, 'Service Guaranty', NULL, '2022-02-13 03:40:47'),
(33, 13, 2, 'Quality Service', NULL, '2022-02-13 03:40:47'),
(34, 13, 2, 'Timely Work', NULL, '2022-02-13 03:40:47'),
(35, 14, 2, 'Service Guaranty', NULL, '2022-02-13 03:42:58'),
(36, 14, 2, 'Quality Service', NULL, '2022-02-13 03:42:58'),
(37, 14, 2, 'Timely Work', NULL, '2022-02-13 03:42:58'),
(38, 15, 2, 'Service Guaranty', NULL, '2022-02-13 03:43:28'),
(39, 15, 2, 'Quality Service', NULL, '2022-02-13 03:43:28'),
(40, 15, 2, 'Timely Work', NULL, '2022-02-13 03:43:28'),
(41, 16, 1, 'Service Gurantee', NULL, '2022-02-13 03:15:51'),
(42, 16, 1, 'Timely Work', NULL, '2022-02-13 03:15:51'),
(43, 16, 1, 'Quality Service', NULL, '2022-02-13 03:15:51'),
(44, 12, 2, 'Quality Service', NULL, '2022-02-13 04:00:10'),
(45, 12, 2, 'Timely Work', NULL, '2022-02-13 04:00:10'),
(46, 17, 5, 'Quality Service', NULL, '2022-02-13 03:45:24'),
(47, 17, 5, 'Service Gurantee', NULL, '2022-02-13 03:45:24'),
(48, 17, 5, 'Schedule Maintain', NULL, '2022-02-13 03:45:24'),
(49, 18, 5, 'Quality Service', NULL, '2022-02-13 03:58:02'),
(50, 18, 5, 'Service Gurantee', NULL, '2022-02-13 03:58:02'),
(51, 18, 5, 'Home Service Available', NULL, '2022-02-13 03:58:02'),
(52, 19, 5, 'Quality Service', NULL, '2022-02-13 03:47:17'),
(53, 19, 5, 'Service Gurantee', NULL, '2022-02-13 03:47:18'),
(54, 19, 5, 'Professional Service', NULL, '2022-02-13 03:47:18'),
(55, 19, 5, 'Home Service', NULL, '2022-02-13 03:47:18'),
(56, 20, 5, 'High Quality Products', NULL, '2022-02-13 03:48:46'),
(57, 20, 5, 'Quality Service', NULL, '2022-02-13 03:48:46'),
(58, 20, 5, 'Home Service Available', NULL, '2022-02-13 03:48:46'),
(76, 36, 1, 'Service Gurantee', NULL, '2022-02-13 03:29:25'),
(86, 36, 1, 'Quality Service', NULL, '2022-02-13 03:29:25'),
(87, 36, 1, 'Timely Work', NULL, '2022-02-13 03:29:25'),
(92, 41, 1, 'Timely work', NULL, '2022-04-28 03:06:56'),
(93, 41, 1, 'Professional work', NULL, '2022-04-28 03:06:56'),
(103, 49, 1, 'wqeqwe qw eqw', NULL, NULL),
(104, 49, 1, 'werwe wer', NULL, NULL),
(105, 56, 1, 'get servie at low cost', NULL, NULL),
(106, 56, 1, 'service your needs', NULL, NULL),
(107, 56, 1, 'revisions opportunity', NULL, NULL),
(108, 53, 1, 'Timely Worked', NULL, '2022-04-28 03:02:09'),
(109, 53, 1, 'Professional Work', NULL, '2022-04-28 03:02:09'),
(110, 53, 1, 'Work Gurenty', NULL, '2022-04-28 03:02:09'),
(111, 50, 1, 'Timely Work', NULL, '2022-04-28 03:03:07'),
(112, 50, 1, 'Professional work', NULL, '2022-04-28 03:03:07'),
(113, 50, 1, 'Task gurentee', NULL, '2022-04-28 03:03:07'),
(114, 50, 1, 'Profitable work get', NULL, '2022-04-28 03:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `serviceincludes`
--

CREATE TABLE `serviceincludes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(11) DEFAULT NULL,
  `seller_id` bigint(11) DEFAULT NULL,
  `include_service_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `include_service_price` double NOT NULL,
  `include_service_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `serviceincludes`
--

INSERT INTO `serviceincludes` (`id`, `service_id`, `seller_id`, `include_service_title`, `include_service_price`, `include_service_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '3 Bed Room', 30, 1, NULL, '2022-06-02 16:18:43'),
(2, 1, 1, '2 Bath Room', 20, 1, NULL, '2022-06-02 16:18:43'),
(3, 2, 1, 'AC Change', 10, 1, NULL, '2022-02-13 03:07:52'),
(4, 2, 1, 'Ac Repair', 30, 1, NULL, '2022-02-13 03:07:52'),
(5, 3, 1, 'Beard Cutting By Machine', 5, 1, NULL, '2022-02-13 04:09:55'),
(6, 3, 1, 'Beard Shave', 5, 1, NULL, '2022-02-13 04:09:55'),
(7, 4, 1, '5 Seater Sofa', 5, 1, NULL, '2022-02-13 03:12:38'),
(8, 4, 1, '3 Seater Sofa', 4, 1, NULL, '2022-02-13 03:12:38'),
(9, 5, 1, 'Table Cleaning', 3.4, 1, NULL, '2022-02-13 03:13:57'),
(10, 5, 1, 'Floor Cleaning (1)', 20, 1, NULL, '2022-02-13 03:13:57'),
(11, 6, 1, 'One Ton AC', 10, 1, NULL, '2022-02-13 06:00:52'),
(12, 6, 1, 'Two Ton AC', 15, 1, NULL, '2022-02-13 06:00:52'),
(13, 7, 1, 'Wall Painting 12x12', 100, 1, NULL, '2022-02-13 03:14:46'),
(14, 8, 2, 'Full Body Massage', 10, 1, NULL, '2022-02-13 03:33:22'),
(15, 8, 2, 'Partial Body Massage', 5, 1, NULL, '2022-02-13 03:33:22'),
(16, 1, 1, '2 Child Room', 50, 1, NULL, '2022-06-02 16:18:43'),
(17, 1, 1, '2 Guest Room', 41, 1, NULL, '2022-06-02 16:18:43'),
(18, 9, 2, 'Hair Cutting Boys', 5, 1, NULL, '2022-02-13 03:35:56'),
(19, 9, 2, 'Hair Cutting Girls', 5, 1, NULL, '2022-02-13 03:35:56'),
(26, 12, 2, 'Car Wash', 10, 1, NULL, '2022-02-13 04:00:09'),
(27, 13, 2, '2 Seater Sofa', 15, 1, NULL, '2022-02-13 03:40:46'),
(28, 13, 2, '3 Seater Sofa', 17, 1, NULL, '2022-02-13 03:40:47'),
(29, 13, 2, '4 Seater Sofa', 18, 1, NULL, '2022-02-13 03:40:47'),
(30, 14, 2, 'Switch Change', 1, 1, NULL, '2022-02-13 03:42:58'),
(31, 14, 2, 'Selling Fan Repair', 5, 1, NULL, '2022-02-13 03:42:58'),
(32, 14, 2, 'Lighting', 1, 1, NULL, '2022-02-13 03:42:58'),
(33, 15, 2, 'Fridge', 5, 1, NULL, '2022-02-13 03:43:27'),
(34, 15, 2, 'TV', 5, 1, NULL, '2022-02-13 03:43:28'),
(35, 15, 2, 'Single Bed', 5, 1, NULL, '2022-02-13 03:43:28'),
(36, 15, 2, 'Double Bed', 6, 1, NULL, '2022-02-13 03:43:28'),
(37, 16, 1, 'Car Cleaning', 12, 1, NULL, '2022-02-13 03:15:51'),
(38, 16, 1, 'Car Washing', 5, 1, NULL, '2022-02-13 03:15:51'),
(39, 12, 2, 'Car inner Dry Wash', 20, 1, NULL, '2022-02-13 04:00:09'),
(40, 17, 5, 'Hair Cutting and Style', 10, 1, NULL, '2022-02-13 03:45:24'),
(41, 17, 5, 'Dry Wash', 5, 1, NULL, '2022-02-13 03:45:24'),
(42, 18, 5, 'LCD/LED TV Repair Services', 10, 1, NULL, '2022-02-13 03:58:01'),
(43, 18, 5, 'TV Wall Mount Installation', 10, 1, NULL, '2022-02-13 03:58:01'),
(44, 19, 5, '10 Switch Repair', 10, 1, NULL, '2022-02-13 03:47:17'),
(45, 19, 5, '3 Switch Board Repair', 15, 1, NULL, '2022-02-13 03:47:17'),
(46, 20, 5, 'Weeding soft  layer makeup', 100, 1, NULL, '2022-02-13 03:48:45'),
(47, 20, 5, 'Hair Bonding', 10, 1, NULL, '2022-02-13 03:48:46'),
(48, 18, 5, 'TV Full Service', 34, 1, NULL, '2022-02-13 03:58:01'),
(65, 36, 1, 'Room Cleaning 15 sf', 15, 1, NULL, '2022-02-13 03:29:25'),
(73, 36, 1, 'Roof Clean', 20, 1, NULL, '2022-02-13 03:29:25'),
(79, 41, 1, 'Branding your company', 0, 0, NULL, '2022-04-28 03:06:56'),
(80, 41, 1, 'Key scereet of success', 0, 0, NULL, '2022-04-28 03:06:56'),
(81, 41, 1, 'Business plans', 0, 0, NULL, '2022-04-28 03:06:56'),
(93, 49, 1, 'test', 0, 0, NULL, NULL),
(94, 49, 1, 'test2', 0, 0, NULL, NULL),
(95, 49, 1, 'test3', 0, 0, NULL, NULL),
(96, 56, 1, 'Get Quality Service', 0, 0, NULL, NULL),
(97, 56, 1, 'Highly Professional Service', 0, 0, NULL, NULL),
(98, 56, 1, 'Service Gurentee', 0, 0, NULL, NULL),
(99, 56, 1, 'Get Minimum Profit', 0, 0, NULL, NULL),
(100, 53, 1, 'Digital Merketing', 0, 0, NULL, '2022-04-28 03:02:09'),
(101, 53, 1, 'Company Profile Build', 0, 0, NULL, '2022-04-28 03:02:09'),
(102, 53, 1, 'Business Growing', 0, 0, NULL, '2022-04-28 03:02:09'),
(103, 53, 1, 'How to Profit', 0, 0, NULL, '2022-04-28 03:02:09'),
(104, 50, 1, 'Business Module Build', 0, 0, NULL, '2022-04-28 03:03:07'),
(105, 50, 1, 'Reach Your Customer', 0, 0, NULL, '2022-04-28 03:03:07'),
(106, 50, 1, 'Branding Your Business', 0, 0, NULL, '2022-04-28 03:03:07'),
(107, 50, 1, 'Get Business Logic', 0, 0, NULL, '2022-04-28 03:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(11) DEFAULT NULL,
  `subcategory_id` bigint(11) DEFAULT NULL,
  `seller_id` bigint(11) DEFAULT NULL,
  `service_city_id` bigint(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_gallery` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `is_service_on` tinyint(4) NOT NULL DEFAULT 1,
  `price` double NOT NULL DEFAULT 0,
  `online_service_price` double NOT NULL DEFAULT 0,
  `delivery_days` bigint(20) NOT NULL DEFAULT 0,
  `revision` bigint(20) NOT NULL DEFAULT 0,
  `is_service_online` tinyint(4) NOT NULL DEFAULT 0,
  `tax` double DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `sold_count` bigint(20) NOT NULL DEFAULT 0,
  `featured` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `category_id`, `subcategory_id`, `seller_id`, `service_city_id`, `title`, `slug`, `description`, `image`, `image_gallery`, `video`, `status`, `is_service_on`, `price`, `online_service_price`, `delivery_days`, `revision`, `is_service_online`, `tax`, `view`, `sold_count`, `featured`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, 1, 1, 'Painting & Renovation Service From Us At Affordable Price', 'painting-&-renovation-service-from-us-at-affordable-price', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.</p><p><br></p><p><span style=\"color: rgb(0, 0, 0);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.</span></p><p><span style=\"color: rgb(0, 0, 0);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.</span><span style=\"color: rgb(0, 0, 0);\"><br></span><br></p>', '79', '179|178', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Uc5i1AKaSTs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 1, 141, 0, 0, 0, 0, 7, 1770, 96, 1, '2022-01-22 03:34:30', '2022-06-12 04:26:19'),
(2, 1, 3, 1, 1, 'AC Repair Service By Expert AC Repair Machenic', 'ac-repair-service-by-expert-ac-repair-machenic', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '80', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Uc5i1AKaSTs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 1, 40, 0, 0, 0, 0, 5, 1801, 48, NULL, '2021-12-07 04:19:58', '2022-08-17 13:12:03'),
(3, 5, 10, 1, 2, 'Get Beard Shaving Service At Low Price', 'get-beard-shaving-service-at-low-price', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '81', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Uc5i1AKaSTs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 1, 10, 0, 0, 0, 0, 6, 716, 34, NULL, '2021-12-07 06:11:11', '2022-06-12 00:15:28'),
(4, 3, 2, 1, 3, 'Moving Service From One Place to Another', 'moving-service-from-one-place-to-another', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '85', NULL, NULL, 1, 1, 9, 0, 0, 0, 0, 10, 857, 30, 1, '2021-12-07 06:17:46', '2022-06-12 01:09:31'),
(5, 2, 11, 1, 3, 'Cleaning & Renovation Service By Our Expert Cleaner', 'cleaning-renovation-service-by-our-expert-cleaner', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '86', NULL, NULL, 1, 1, 23.4, 0, 0, 0, 0, 10, 1248, 69, 1, '2021-12-07 06:22:44', '2022-06-11 23:20:01'),
(6, 1, 3, 1, 3, 'AC Cleaning Service ! Get ASAP And Take The Best Benifits', 'ac-cleaning-service-get-asap-and-take-the-best-benifits', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '87', NULL, NULL, 1, 1, 25, 0, 0, 0, 0, 5, 989, 25, 1, '2021-12-07 06:30:16', '2022-06-12 05:06:05'),
(7, 4, NULL, 1, 2, 'Our Cool Painting Service Only For You', 'our-cool-painting-service-only-for-you', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '88', NULL, NULL, 1, 1, 100, 0, 0, 0, 0, 10, 369, 6, NULL, '2021-12-07 06:35:13', '2022-06-11 09:37:33'),
(8, 5, 7, 2, 1, 'Now Get Massage Service From Mr Mahmud', 'now-get-massage-service-from-mr-mahmud', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '89', NULL, NULL, 1, 1, 15, 0, 0, 0, 0, 10, 359, 6, 0, '2021-12-08 00:59:37', '2022-06-11 14:29:42'),
(9, 5, 7, 2, 1, 'Hair Cutting Service At Reasonable Price', 'hair-cutting-service-at-reasonable-price', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '90', NULL, NULL, 1, 1, 10, 0, 0, 0, 0, 2, 263, 5, NULL, '2021-12-09 04:05:07', '2022-06-12 05:48:04'),
(12, 2, 9, 2, 1, 'Car Cleaning Service From Best Cleaner', 'car-cleaning-service-from-best-cleaner', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '91', NULL, NULL, 1, 1, 30, 0, 0, 0, 0, 3, 823, 27, 1, '2021-12-12 23:06:51', '2022-06-12 03:09:04'),
(13, 2, NULL, 2, 3, 'Get Furniture Cleaning Service At Reasonable Price', 'get-furniture-cleaning-service-at-reasonable-price', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '92', NULL, NULL, 1, 1, 50, 0, 0, 0, 0, 7.5, 214, 6, 0, '2022-01-18 01:05:46', '2022-06-11 13:21:00'),
(14, 1, 8, 2, 3, 'Get Our Electrice Service For Home and Office', 'get-our-electrice-service-for-home-and-office', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '94', NULL, NULL, 1, 1, 7, 0, 0, 0, 0, 5, 188, 6, NULL, '2022-02-01 00:16:55', '2022-08-25 14:08:30'),
(15, 3, 2, 2, 3, 'Home Move Service From One City to Another City', 'home-move-service-from-one-city-to-another-city', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '95', NULL, NULL, 1, 1, 21, 0, 0, 0, 0, 7, 764, 14, 1, '2022-02-01 01:24:40', '2022-06-12 00:40:25'),
(16, 2, 9, 1, 1, 'Car Washing And Cleaning Service At Home or Office', 'car-washing-and-cleaning-service-at-home-or-office', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '96', NULL, NULL, 1, 1, 17, 0, 0, 0, 0, 5, 262, 9, 0, '2022-02-01 01:40:52', '2022-06-12 01:02:13'),
(17, 5, 10, 4, 1, 'Do Stylish Hair Style From Our Experts', 'do-stylish-hair-style-from-our-experts', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '98', NULL, NULL, 1, 1, 15, 0, 0, 0, 0, 8, 110, 2, NULL, '2022-02-01 04:00:20', '2022-06-12 05:18:46'),
(18, 1, 8, 4, 1, 'Get Our TV Repair Service At Reasonable Price', 'get-our-tv-repair-service-at-reasonable-price', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '99', NULL, NULL, 1, 1, 54, 0, 0, 0, 0, 6, 490, 10, 1, '2022-02-01 04:11:01', '2022-06-12 04:26:55'),
(19, 1, 8, 4, 1, 'Switch and Board Repair Service at Low Price', 'switch-and-board-repair-service-at-low-price', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '100', NULL, NULL, 1, 1, 25, 0, 0, 0, 0, 7, 254, 7, NULL, '2022-02-01 04:20:10', '2022-06-11 21:24:12'),
(20, 5, 12, 4, 1, 'Women Beauty Care Service with Expert Beautisian', 'women-beauty-care-service-with-expert-beautisian', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '102', NULL, NULL, 1, 1, 110, 0, 0, 0, 0, 7, 621, 29, 1, '2022-02-01 04:30:11', '2022-06-12 06:27:28'),
(36, 2, 11, 1, 1, 'Cleaning Your Old House From Our Expert Cleaner Team at Low Cost', 'cleaning-your-old-house-from-our-expert-cleaner-team-at-low-cost', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.</p><p><span style=\"color: rgb(0, 0, 0);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.</span><br></p>', '130', NULL, NULL, 1, 1, 35, 0, 0, 0, 0, 6.6, 334, 7, 0, '2022-02-12 00:40:56', '2022-06-11 16:32:13'),
(41, 7, 13, 1, 1, 'Branding your company with us at reasonable price.', 'branding-your-company-with-us-at-reasonable-price-', 'I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.<br><br>Top Cat! The most effectual Top Cat! Who’s intellectual close friends get to call him T.C., providing it’s with dignity. Top Cat! The indisputable leader of the gang. He’s the boss, he’s a pip, he’s the championship. He’s the most tip top, Top Cat.<br><br>Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.<br><br>This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!<br><br>Children of the sun, see your time has just begun, searching for your ways, through adventures every day. Every day and night, with the condor in flight, with all your friends in tow, you search for the Cities of Gold. Ah-ah-ah-ah-ah… wishing for The Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold. Do-do-do-do ah-ah-ah, do-do-do-do, Cities of Gold. Do-do-do-do, Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold. <br>', '183', NULL, NULL, 1, 1, 120, 120, 10, 10, 1, 10, 252, 24, 0, '2022-04-24 04:12:18', '2022-06-11 17:24:08'),
(49, 7, 13, 1, 1, 'Build your Profile in  twitter with us', 'build-your-profile-in--twitter-with-us', '<p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\">It\r\n is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less.</span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\">It\r\n is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less.</span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\"><br></span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\">It\r\n is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less.</span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\">It\r\n is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less.</span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\"></span></p><p></p>', '186', '181|180|179', 'https://youtu.be/Uc5i1AKaSTs', 1, 1, 144, 0, 10, 10, 1, 10, 131, 4, 0, '2022-04-27 02:57:48', '2022-06-12 03:43:59'),
(50, 7, 13, 1, 1, 'Grow your business at low cost from us.', 'grow-your-business-at-low-cost-from-us-', '<p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\">It\r\n is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less.</span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\">It\r\n is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less.</span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\"><br></span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\">It\r\n is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less.</span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\">It\r\n is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less.</span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\"></span></p>', '185', NULL, NULL, 1, 1, 150, 0, 5, 3, 1, 10, 145, 3, 0, '2022-04-28 07:57:51', '2022-06-11 09:22:03'),
(53, 7, 13, 1, 1, 'Be first to take our online services.', 'sdasdjahgha-ashdasjhda-asdahsdasd', '<p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\">It\r\n is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less.</span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\">It\r\n is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less.</span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased;\"></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.</span></p><p style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; margin-top: 0px; margin-bottom: 0px; color: rgb(153, 153, 153); hyphens: auto; line-height: 24px; font-size: 14px; font-family: Roboto, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(0, 0, 0);\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.</span></p><p></p>', '184', NULL, NULL, 1, 1, 140, 0, 10, 7, 1, 0, 270, 23, 0, '2022-04-28 08:31:38', '2022-08-01 17:02:26'),
(56, 7, 13, 1, 1, 'Are you looking some who able to rich you business', 'are-you-looking-some-who-able-to-rich-you-business', '<p><span style=\"color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">I never spend much time in school but I taught ladies plenty. It’s true I hire my body out for pay, hey hey. I’ve gotten burned over Cheryl Tiegs, blown up for Raquel Welch. But when I end up in the hay it’s only hay, hey hey. I might jump an open drawbridge, or Tarzan from a vine. ’Cause I’m the unknown stuntman that makes Eastwood look so fine.</span><br style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Top Cat! The most effectual Top Cat! Who’s intellectual close friends get to call him T.C., providing it’s with dignity. Top Cat! The indisputable leader of the gang. He’s the boss, he’s a pip, he’s the championship. He’s the most tip top, Top Cat.</span><br style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Ulysses, Ulysses — Soaring through all the galaxies. In search of Earth, flying in to the night. Ulysses, Ulysses — Fighting evil and tyranny, with all his power, and with all of his might. Ulysses — no-one else can do the things you do. Ulysses — like a bolt of thunder from the blue. Ulysses — always fighting all the evil forces bringing peace and justice to all.</span><br style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">This is my boss, Jonathan Hart, a self-made millionaire, he’s quite a guy. This is Mrs H., she’s gorgeous, she’s one lady who knows how to take care of herself. By the way, my name is Max. I take care of both of them, which ain’t easy, ’cause when they met it was MURDER!</span><br style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><br style=\"box-sizing: border-box; outline: none; -webkit-font-smoothing: antialiased; color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><span style=\"color: rgb(102, 102, 102); font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Children of the sun, see your time has just begun, searching for your ways, through adventures every day. Every day and night, with the condor in flight, with all your friends in tow, you search for the Cities of Gold. Ah-ah-ah-ah-ah… wishing for The Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold. Do-do-do-do ah-ah-ah, do-do-do-do, Cities of Gold. Do-do-do-do, Cities of Gold. Ah-ah-ah-ah-ah… some day we will find The Cities of Gold.</span></p>', '187', '186|180|179|178', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/QC8iQqtG0hg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1, 1, 120, 0, 5, 6, 1, 0, 366, 57, 0, '2022-04-28 08:47:42', '2022-06-12 05:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `service_areas`
--

CREATE TABLE `service_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_city_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_areas`
--

INSERT INTO `service_areas` (`id`, `service_area`, `service_city_id`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhanmondi', 1, 1, 1, '2021-12-05 03:59:13', '2021-12-07 00:11:54'),
(2, 'FarmGate New', 1, 1, 1, '2021-12-05 04:15:40', '2021-12-11 00:36:10'),
(6, 'Southdarm', 3, 3, 1, '2021-12-05 05:47:12', '2021-12-07 00:11:05'),
(7, 'Wales & Seea', 2, 2, 1, '2021-12-07 00:28:08', '2021-12-07 00:28:08'),
(8, 'Jenerio Street', 2, 2, 1, '2022-02-16 10:18:24', '2022-02-16 10:18:24'),
(9, 'Floda Kings', 2, 2, 1, '2022-02-16 10:18:51', '2022-02-16 10:18:51'),
(10, 'DC Town', 3, 3, 1, '2022-02-16 10:19:12', '2022-02-16 10:19:12'),
(11, 'Anthenio Caderis', 3, 3, 1, '2022-02-16 10:19:42', '2022-02-16 10:19:42'),
(12, 'Mirpur', 1, 1, 1, '2022-02-16 10:20:02', '2022-02-16 10:20:02'),
(13, 'Kazi Para', 1, 1, 1, '2022-02-16 10:20:38', '2022-02-16 10:20:38'),
(14, 'Mosi Mosi', 9, 4, 1, '2022-02-16 10:22:43', '2022-02-16 10:22:43'),
(15, 'Nemeosmo Street', 9, 4, 1, '2022-02-16 10:23:10', '2022-02-16 10:23:10'),
(16, 'Alderio 44/2 North', 9, 4, 1, '2022-02-16 10:23:48', '2022-02-16 10:23:48'),
(17, 'Kings Star 55 Road', 8, 5, 1, '2022-02-16 10:24:58', '2022-02-16 10:24:58'),
(18, 'New Ketlin Park', 8, 5, 1, '2022-02-16 10:25:25', '2022-02-16 10:25:25'),
(19, 'West Dumpin', 8, 5, 1, '2022-02-16 10:26:01', '2022-02-16 10:26:01'),
(20, 'Serinjith Road', 7, 6, 1, '2022-02-16 10:26:42', '2022-02-16 10:26:42'),
(21, 'Super Shop  Town Road', 7, 6, 1, '2022-02-16 10:27:25', '2022-02-16 10:27:25'),
(22, 'Belochi', 7, 6, 1, '2022-02-16 10:27:36', '2022-02-16 10:27:36'),
(23, 'Lerio De Beeks 69', 12, 7, 1, '2022-02-16 10:28:24', '2022-02-16 10:28:24'),
(24, 'Serjio Lipo Eskaton', 12, 7, 1, '2022-02-16 10:29:02', '2022-02-16 10:29:02'),
(25, 'Kaka Del Road', 12, 7, 1, '2022-02-16 10:29:45', '2022-02-16 10:29:45'),
(26, 'Kandy House', 11, 8, 1, '2022-02-16 10:30:22', '2022-02-16 10:30:22'),
(27, 'National Park 44/3', 11, 8, 1, '2022-02-16 10:30:45', '2022-02-16 10:30:45'),
(28, 'New Street Jersy', 11, 8, 1, '2022-02-16 10:31:08', '2022-02-16 10:31:08'),
(29, 'Dilkotech  Area', 10, 9, 1, '2022-02-16 10:31:43', '2022-02-16 10:31:43'),
(30, 'Jela Sultanpur', 10, 9, 1, '2022-02-16 10:33:22', '2022-02-16 10:33:22'),
(31, 'Karinabath', 10, 9, 1, '2022-02-16 10:33:44', '2022-02-16 10:33:44'),
(32, 'Mohammadpur', 1, 1, 1, '2022-02-16 10:35:07', '2022-02-16 10:35:07'),
(33, 'Sheowrapara', 1, 1, 1, '2022-02-16 10:35:40', '2022-02-16 10:35:40'),
(34, 'Andheri East', 15, 6, 1, '2022-02-27 02:51:47', '2022-02-27 02:51:47'),
(35, 'Andheri West', 15, 6, 1, '2022-02-27 02:52:14', '2022-02-27 02:52:14'),
(36, 'Band Stand', 15, 6, 1, '2022-02-27 02:53:25', '2022-02-27 02:53:25'),
(37, 'Agrabad', 14, 1, 1, '2022-02-27 02:54:14', '2022-02-27 02:54:14'),
(38, 'Pahartoli', 14, 1, 1, '2022-02-27 02:54:37', '2022-02-27 02:54:37'),
(39, 'Olongkar', 14, 1, 1, '2022-02-27 02:55:21', '2022-02-27 02:55:21'),
(40, 'Chaina Town', 16, 2, 1, '2022-02-27 02:57:25', '2022-02-27 02:57:25'),
(41, 'Penn Quarter', 16, 2, 1, '2022-02-27 02:58:01', '2022-02-27 02:58:01'),
(42, 'Moston', 17, 3, 1, '2022-02-27 03:00:01', '2022-02-27 03:00:01'),
(43, 'Gorton', 17, 3, 1, '2022-02-27 03:00:24', '2022-02-27 03:00:24'),
(44, 'Eastern Beaches', 18, 5, 1, '2022-02-27 03:08:44', '2022-02-27 03:08:44'),
(45, 'Randwick', 18, 5, 1, '2022-02-27 03:09:32', '2022-02-27 03:09:32'),
(46, 'Pendik', 19, 10, 1, '2022-02-27 03:11:02', '2022-02-27 03:11:02'),
(47, 'Umraniya', 19, 10, 1, '2022-02-27 03:11:16', '2022-02-27 03:11:16'),
(48, 'Uskudar', 19, 10, 1, '2022-02-27 03:12:28', '2022-02-27 03:12:28'),
(49, 'Afsar', 20, 10, 1, '2022-02-27 03:14:17', '2022-02-27 03:14:17'),
(50, 'Ayas', 20, 10, 1, '2022-02-27 03:14:42', '2022-02-27 03:14:42'),
(51, 'Elbatho North', 20, 10, 1, '2022-02-27 03:15:17', '2022-02-27 03:15:17'),
(52, 'City Center', 21, 10, 1, '2022-02-27 03:16:31', '2022-02-27 03:16:31'),
(53, 'Edirne', 21, 10, 1, '2022-02-27 03:17:14', '2022-02-27 03:17:14'),
(54, 'Konya', 20, 10, 1, '2022-02-27 03:17:38', '2022-02-27 03:17:38'),
(55, 'Berjio Leren', 22, 11, 1, '2022-02-27 03:19:25', '2022-02-27 03:19:25'),
(56, 'City West 39', 22, 11, 1, '2022-02-27 03:19:53', '2022-02-27 03:19:53'),
(57, 'Neuenhagen', 23, 11, 1, '2022-02-27 03:22:07', '2022-02-27 03:22:07'),
(58, 'Floda Kings', 23, 11, 1, '2022-02-27 03:25:58', '2022-02-27 03:25:58'),
(59, 'Kazi Para', 23, 11, 1, '2022-02-27 03:26:33', '2022-02-27 03:26:33'),
(60, 'Bavaria', 24, 11, 1, '2022-02-27 03:31:01', '2022-02-27 03:31:01'),
(61, 'Anthenio Caderis', 24, 11, 1, '2022-02-27 03:31:21', '2022-02-27 03:31:21'),
(62, 'City North', 25, 12, 1, '2022-02-27 03:33:43', '2022-02-27 03:33:43'),
(63, 'Partholi Sana', 25, 12, 1, '2022-02-27 03:34:14', '2022-02-27 03:34:14'),
(64, 'Paris Square', 25, 12, 1, '2022-02-27 03:34:38', '2022-02-27 03:34:38'),
(65, 'Lyon East', 26, 12, 1, '2022-02-27 03:35:43', '2022-02-27 03:35:43'),
(66, 'Jenerio Street', 26, 12, 1, '2022-02-27 03:36:06', '2022-02-27 03:36:06'),
(67, 'Auvergne', 27, 12, 1, '2022-02-27 03:36:50', '2022-02-27 03:36:50'),
(68, 'Languedoc', 27, 12, 1, '2022-02-27 03:37:22', '2022-02-27 03:37:22'),
(69, 'Brittany', 27, 12, 1, '2022-02-27 03:37:46', '2022-02-27 03:37:46'),
(70, 'Begoma', 28, 13, 1, '2022-02-27 03:38:19', '2022-02-27 03:38:19'),
(71, 'Corso Del Popolu', 28, 13, 1, '2022-02-27 03:38:58', '2022-02-27 03:38:58'),
(72, 'Anthenio Caderis', 28, 13, 1, '2022-02-27 03:39:13', '2022-02-27 03:39:13'),
(73, 'Palermo', 29, 13, 1, '2022-02-27 03:39:36', '2022-02-27 03:39:36'),
(74, 'Kelaro Do  Penki', 29, 13, 1, '2022-02-27 03:40:11', '2022-02-27 03:40:11'),
(75, 'Florance', 30, 13, 1, '2022-02-27 03:40:35', '2022-02-27 03:40:35'),
(76, 'Grandhe', 30, 13, 1, '2022-02-27 03:40:53', '2022-02-27 03:40:53'),
(77, 'Kiambu', 31, 14, 1, '2022-02-27 03:42:25', '2022-02-27 03:42:25'),
(78, 'Kasarani', 31, 14, 1, '2022-02-27 03:43:06', '2022-02-27 03:43:06'),
(79, 'Kabete', 31, 14, 1, '2022-02-27 03:43:43', '2022-02-27 03:43:43'),
(80, 'Kisanu', 32, 14, 1, '2022-02-27 03:48:03', '2022-02-27 03:48:03'),
(81, 'Nyali', 32, 14, 1, '2022-02-27 03:48:30', '2022-02-27 03:48:30'),
(82, 'Likoni', 32, 14, 1, '2022-02-27 03:49:22', '2022-02-27 03:49:22'),
(83, 'Wilson', 33, 14, 1, '2022-02-27 03:51:16', '2022-02-27 03:51:16'),
(84, 'Aerodrome', 33, 14, 1, '2022-02-27 03:51:53', '2022-02-27 03:51:53'),
(85, 'Zayed City', 34, 15, 1, '2022-02-27 03:58:17', '2022-02-27 03:58:17'),
(86, 'Al Danah', 34, 15, 1, '2022-02-27 03:58:42', '2022-02-27 03:58:42'),
(87, 'Sheikha Fatima Park', 34, 15, 1, '2022-02-27 04:00:27', '2022-02-27 04:00:27'),
(88, 'Abu Dhabi Mall', 34, 15, 1, '2022-02-27 04:01:56', '2022-02-27 04:01:56'),
(89, 'Al Qasba', 35, 15, 1, '2022-02-27 04:03:19', '2022-02-27 04:03:19'),
(90, 'Blue Souk', 35, 15, 1, '2022-02-27 04:03:38', '2022-02-27 04:03:38'),
(91, 'Sharjah Aquarium', 35, 15, 1, '2022-02-27 04:04:10', '2022-02-27 04:04:10'),
(92, 'Global Village Dubai', 36, 15, 1, '2022-02-27 04:06:58', '2022-02-27 04:06:58'),
(93, 'Palm Jumeirah', 36, 15, 1, '2022-02-27 04:08:10', '2022-02-27 04:08:10'),
(94, 'Dubai Marina', 36, 15, 1, '2022-02-27 04:08:47', '2022-02-27 04:08:47'),
(95, 'Dhow Cruise', 36, 15, 1, '2022-02-27 04:09:33', '2022-02-27 04:09:33'),
(96, 'Ankara Castle', 20, 10, 1, '2022-02-27 04:11:24', '2022-02-27 04:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `service_cities`
--

CREATE TABLE `service_cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_cities`
--

INSERT INTO `service_cities` (`id`, `service_city`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, 1, '2021-12-05 01:13:48', '2022-02-27 00:35:40'),
(2, 'New York', 2, 1, '2021-12-05 01:16:07', '2022-02-27 00:35:34'),
(3, 'London', 3, 1, '2021-12-05 01:16:33', '2022-02-27 00:35:20'),
(7, 'Delhi', 6, 1, '2021-12-05 05:29:11', '2022-02-27 00:35:03'),
(8, 'Melbourne', 5, 1, '2022-02-16 10:12:47', '2022-02-27 00:34:54'),
(9, 'Tokyo', 4, 1, '2022-02-16 10:13:23', '2022-02-27 00:34:46'),
(10, 'Lahore', 9, 1, '2022-02-16 10:13:48', '2022-02-27 00:34:31'),
(11, 'Ottawa', 8, 1, '2022-02-16 10:14:25', '2022-02-27 00:34:23'),
(12, 'Rio de Janeiro', 7, 1, '2022-02-16 10:16:36', '2022-02-16 10:16:36'),
(14, 'Chittagong', 1, 1, '2022-02-27 00:36:12', '2022-02-27 00:36:12'),
(15, 'Mumbai', 6, 1, '2022-02-27 00:36:29', '2022-02-27 00:36:29'),
(16, 'Washington', 2, 1, '2022-02-27 00:36:43', '2022-02-27 00:36:43'),
(17, 'Manchester', 3, 1, '2022-02-27 00:37:00', '2022-02-27 00:37:00'),
(18, 'Sydney', 5, 1, '2022-02-27 00:37:23', '2022-02-27 03:04:15'),
(19, 'Istanbul', 10, 1, '2022-02-27 02:05:49', '2022-02-27 02:05:49'),
(20, 'Ankara', 10, 1, '2022-02-27 02:06:39', '2022-02-27 02:06:39'),
(21, 'Bursa', 10, 1, '2022-02-27 02:06:58', '2022-02-27 02:06:58'),
(22, 'Hamburg', 11, 1, '2022-02-27 02:07:33', '2022-02-27 02:07:33'),
(23, 'Berlin', 11, 1, '2022-02-27 02:07:44', '2022-02-27 02:07:44'),
(24, 'Munich', 11, 1, '2022-02-27 02:08:10', '2022-02-27 02:08:10'),
(25, 'Paris', 12, 1, '2022-02-27 02:08:22', '2022-02-27 02:08:22'),
(26, 'Lyon', 12, 1, '2022-02-27 02:08:48', '2022-02-27 02:08:48'),
(27, 'Toulouse', 12, 1, '2022-02-27 02:08:59', '2022-02-27 02:08:59'),
(28, 'Rome', 13, 1, '2022-02-27 02:09:28', '2022-02-27 02:09:28'),
(29, 'Venice', 13, 1, '2022-02-27 02:09:39', '2022-02-27 02:09:39'),
(30, 'Milan', 13, 1, '2022-02-27 02:09:52', '2022-02-27 02:09:52'),
(31, 'Nirobi', 14, 1, '2022-02-27 02:10:50', '2022-02-27 02:10:50'),
(32, 'Mombasa', 14, 1, '2022-02-27 02:11:10', '2022-02-27 02:11:10'),
(33, 'Kibera', 14, 1, '2022-02-27 02:11:27', '2022-02-27 02:11:27'),
(34, 'Abu Dhabi', 15, 1, '2022-02-27 02:12:12', '2022-02-27 02:12:12'),
(35, 'Sharjah', 15, 1, '2022-02-27 02:12:24', '2022-02-27 02:12:24'),
(36, 'Dubai', 15, 1, '2022-02-27 02:12:36', '2022-02-27 04:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `service_coupons`
--

CREATE TABLE `service_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double DEFAULT NULL,
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=inactive 1=active',
  `seller_id` bigint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `background_image`, `title`, `sub_title`, `service_id`, `created_at`, `updated_at`) VALUES
(1, '209', 'Get our Offers', 'Offers are available at affordable price', NULL, '2022-04-20 00:20:23', '2022-06-01 16:58:08'),
(2, '210', 'Get our Offers', 'Offers are available at affordable price', NULL, '2022-04-20 00:28:51', '2022-06-01 16:58:34'),
(3, '211', 'Get our Offers', 'Offers are available at affordable price', NULL, '2022-06-01 16:58:41', '2022-06-01 16:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `social_icons`
--

CREATE TABLE `social_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_icons`
--

INSERT INTO `social_icons` (`id`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(1, 'lab la-facebook-f', '#', '2021-08-27 22:38:07', '2021-11-03 02:21:03'),
(2, 'lab la-instagram', '#', '2021-08-27 22:38:28', '2021-11-03 02:21:13'),
(3, 'lab la-twitter', '#', '2021-08-27 22:40:08', '2021-11-03 02:21:23'),
(4, 'lab la-linkedin-in', '#', '2021-08-27 22:40:22', '2021-11-03 02:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `static_options`
--

CREATE TABLE `static_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_options`
--

INSERT INTO `static_options` (`id`, `option_name`, `option_value`, `created_at`, `updated_at`) VALUES
(210, 'extra-light-color', NULL, '2021-12-30 09:38:18', '2021-12-30 09:38:18'),
(367, 'home_page', '38', '2022-02-14 09:27:14', '2022-04-21 05:28:57'),
(368, 'blog_page', '35', '2022-02-14 09:27:14', '2022-04-21 05:28:57'),
(369, 'service_list_page', '43', '2022-02-14 09:27:14', '2022-04-21 05:28:57'),
(370, 'paypal_preview_logo', '72', '2022-02-14 09:42:57', '2022-09-22 01:45:18'),
(371, 'paypal_mode', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(372, 'paypal_sandbox_client_id', 'AcmiPrFWKIWbGGDUwWkhlVQQ_R0eFVJOR40zeH0cKjhbYwRm_pi0Amst1FyFcxtXHbC_-tL_SnU8Xmpp', '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(373, 'paypal_sandbox_client_secret', 'EBD3xnAcFvlGz67JA1piOJDgYqCPIz1QBd4xQ7woysW-rJF-neBXwiGgM5TTJap-WPHakDryI3T9Lw8I', '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(374, 'paypal_sandbox_app_id', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(375, 'paypal_live_app_id', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(376, 'paypal_payment_action', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(377, 'paypal_currency', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(378, 'paypal_notify_url', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(379, 'paypal_locale', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(380, 'paypal_validate_ssl', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(381, 'paypal_live_client_id', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(382, 'paypal_live_client_secret', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(383, 'paypal_gateway', 'on', '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(384, 'paypal_test_mode', 'on', '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(385, 'razorpay_preview_logo', '68', '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(386, 'razorpay_key', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(387, 'razorpay_secret', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(388, 'razorpay_api_key', 'rzp_test_L4bUep4bXoYM5n', '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(389, 'razorpay_api_secret', 'NeLFvVcn3NiR1AmJEhwyas9h', '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(390, 'razorpay_gateway', 'on', '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(391, 'stripe_preview_logo', '67', '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(392, 'stripe_publishable_key', NULL, '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(393, 'stripe_secret_key', 'sk_test_51LkNUTEIUkGcIaVjf1PeSPivYPzfHXo4wLDHy7UtMeP6yoQxHzsjKmKveCiGKfZaSsMKvCAPtJUgFsCTP3JdUvEH00woZJKCVw', '2022-02-14 09:42:58', '2022-09-22 01:45:18'),
(394, 'stripe_public_key', 'pk_test_51LkNUTEIUkGcIaVjpfXLF0608Y2U0eMlwBzH7r3hytu81eVxO3hj42s1jn8Sa6LgMcg0grlQ2G9Hq2bl00Jxg9L700oTPo5TiX', '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(395, 'stripe_gateway', 'on', '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(396, 'paytm_gateway', 'on', '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(397, 'paytm_preview_logo', '66', '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(398, 'paytm_merchant_key', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(399, 'paytm_merchant_mid', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(400, 'paytm_merchant_website', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(401, 'paytm_test_mode', 'on', '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(402, 'paystack_merchant_email', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(403, 'paystack_preview_logo', '69', '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(404, 'paystack_public_key', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(405, 'paystack_secret_key', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(406, 'paystack_gateway', 'on', '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(407, 'mollie_preview_logo', '70', '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(408, 'mollie_public_key', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:18'),
(409, 'mollie_gateway', 'on', '2022-02-14 09:42:59', '2022-09-22 01:45:19'),
(410, 'marcado_pagp_client_id', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:19'),
(411, 'marcado_pago_client_secret', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:19'),
(412, 'marcado_pago_test_mode', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:19'),
(413, 'cash_on_delivery_gateway', 'on', '2022-02-14 09:42:59', '2022-09-22 01:45:19'),
(414, 'cash_on_delivery_preview_logo', '73', '2022-02-14 09:42:59', '2022-09-22 01:45:19'),
(415, 'flutterwave_preview_logo', '71', '2022-02-14 09:42:59', '2022-09-22 01:45:19'),
(416, 'flutterwave_gateway', 'on', '2022-02-14 09:42:59', '2022-09-22 01:45:19'),
(417, 'flw_public_key', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:19'),
(418, 'flw_secret_key', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:19'),
(419, 'flw_secret_hash', NULL, '2022-02-14 09:42:59', '2022-09-22 01:45:19'),
(420, 'midtrans_preview_logo', '78', '2022-02-14 09:42:59', '2022-09-22 01:45:19'),
(421, 'midtrans_merchant_id', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(422, 'midtrans_server_key', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(423, 'midtrans_client_key', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(424, 'midtrans_environment', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(425, 'midtrans_gateway', 'on', '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(426, 'midtrans_test_mode', 'on', '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(427, 'payfast_preview_logo', '74', '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(428, 'payfast_merchant_id', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(429, 'payfast_merchant_key', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(430, 'payfast_passphrase', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(431, 'payfast_merchant_env', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(432, 'payfast_itn_url', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(433, 'payfast_gateway', 'on', '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(434, 'cashfree_preview_logo', '75', '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(435, 'cashfree_test_mode', 'on', '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(436, 'cashfree_app_id', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(437, 'cashfree_secret_key', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(438, 'cashfree_gateway', 'on', '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(439, 'instamojo_preview_logo', '76', '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(440, 'instamojo_client_id', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(441, 'instamojo_client_secret', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(442, 'instamojo_username', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(443, 'instamojo_password', NULL, '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(444, 'instamojo_test_mode', 'on', '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(445, 'instamojo_gateway', 'on', '2022-02-14 09:43:00', '2022-09-22 01:45:19'),
(446, 'marcadopago_preview_logo', '77', '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(447, 'marcado_pago_client_id', NULL, '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(448, 'marcadopago_gateway', 'on', '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(449, 'marcadopago_test_mode', 'on', '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(450, 'site_global_currency', 'USD', '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(451, 'site_global_payment_gateway', NULL, '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(452, 'site_manual_payment_name', 'Bank Transfer', '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(453, 'site_manual_payment_description', '<p>this is manual payment description example</p>', '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(454, 'manual_payment_preview_logo', '172', '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(455, 'manual_payment_gateway', 'on', '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(456, 'site_usd_to_ngn_exchange_rate', NULL, '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(457, 'site_euro_to_ngn_exchange_rate', NULL, '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(458, 'site_currency_symbol_position', 'left', '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(459, 'site_default_payment_gateway', 'manual_payment', '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(460, 'site_usd_to_idr_exchange_rate', NULL, '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(461, 'site_usd_to_inr_exchange_rate', NULL, '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(462, 'site_usd_to_zar_exchange_rate', NULL, '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(463, 'site_usd_to_brl_exchange_rate', NULL, '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(464, 'site_usd_to_usd_exchange_rate', NULL, '2022-02-14 09:43:01', '2022-09-22 01:45:19'),
(465, 'site_logo', '124', '2022-02-14 14:09:41', '2022-02-15 04:03:26'),
(466, 'site_white_logo', '125', '2022-02-14 14:09:41', '2022-02-15 04:03:26'),
(467, 'site_favicon', '1', '2022-02-14 14:09:41', '2022-02-15 04:03:26'),
(468, 'site_title', 'Qixer', '2022-02-14 14:10:45', '2022-02-19 23:46:42'),
(469, 'site_tag_line', 'Buy & Sale Service', '2022-02-14 14:10:45', '2022-02-19 23:46:42'),
(470, 'site_footer_copyright', 'All copyright (C) 2022 Reserved', '2022-02-14 14:10:45', '2022-02-19 23:46:42'),
(471, 'language_select_option', NULL, '2022-02-14 14:10:46', '2022-02-19 23:46:42'),
(472, 'disable_user_email_verify', NULL, '2022-02-14 14:10:46', '2022-02-19 23:46:42'),
(473, 'site_main_color', NULL, '2022-02-14 14:10:46', '2022-02-19 23:46:42'),
(474, 'site_secondary_color', NULL, '2022-02-14 14:10:46', '2022-02-19 23:46:42'),
(475, 'site_maintenance_mode', NULL, '2022-02-14 14:10:46', '2022-02-19 23:46:42'),
(476, 'admin_loader_animation', NULL, '2022-02-14 14:10:46', '2022-02-19 23:46:42'),
(477, 'site_loader_animation', NULL, '2022-02-14 14:10:46', '2022-02-19 23:46:43'),
(478, 'admin_panel_rtl_status', NULL, '2022-02-14 14:10:46', '2022-02-19 23:46:43'),
(479, 'site_force_ssl_redirection', NULL, '2022-02-14 14:10:46', '2022-02-19 23:46:43'),
(480, 'site_google_captcha_enable', NULL, '2022-02-14 14:10:46', '2022-02-19 23:46:43'),
(481, 'body_font_family', 'Roboto', '2022-02-15 02:54:15', '2022-02-15 02:58:48'),
(482, 'heading_font_family', 'Source Sans Pro', '2022-02-15 02:54:15', '2022-02-15 02:58:48'),
(483, 'extra_body_font', NULL, '2022-02-15 02:54:15', '2022-02-15 02:58:48'),
(484, 'heading_font', 'on', '2022-02-15 02:54:15', '2022-02-15 02:58:48'),
(485, 'body_font_variant', 'a:5:{i:0;s:5:\"0,100\";i:1;s:5:\"0,300\";i:2;s:5:\"0,400\";i:3;s:5:\"0,500\";i:4;s:5:\"0,700\";}', '2022-02-15 02:54:15', '2022-02-15 02:58:49'),
(486, 'heading_font_variant', 'a:4:{i:0;s:5:\"0,200\";i:1;s:5:\"0,400\";i:2;s:5:\"0,600\";i:3;s:5:\"0,700\";}', '2022-02-15 02:54:15', '2022-02-15 02:58:49'),
(487, 'body_font_family_three', NULL, '2022-02-15 02:54:15', '2022-02-15 02:58:49'),
(488, 'body_font_family_four', NULL, '2022-02-15 02:54:15', '2022-02-15 02:58:49'),
(489, 'body_font_family_five', NULL, '2022-02-15 02:54:15', '2022-02-15 02:58:49'),
(490, 'body_font_variant_three', 'a:1:{i:0;s:3:\"400\";}', '2022-02-15 02:54:15', '2022-02-15 02:58:49'),
(491, 'body_font_variant_four', 'a:1:{i:0;s:3:\"400\";}', '2022-02-15 02:54:15', '2022-02-15 02:58:49'),
(492, 'body_font_variant_five', 'a:1:{i:0;s:3:\"400\";}', '2022-02-15 02:54:15', '2022-02-15 02:58:49'),
(493, 'global_navbar_variant', '02', '2022-02-15 03:27:32', '2022-02-15 03:27:32'),
(494, 'maintain_page_title', 'Sorry  we are down for schedule maintenance right now !!', '2022-02-15 04:40:12', '2022-02-15 04:51:24'),
(495, 'maintain_page_description', NULL, '2022-02-15 04:40:12', '2022-02-15 04:51:24'),
(496, 'maintenance_duration', '2022-02-17', '2022-02-15 04:40:12', '2022-02-15 04:51:24'),
(497, 'maintain_page_logo', '126', '2022-02-15 04:40:12', '2022-02-15 04:40:12'),
(498, 'maintain_page_background_image', '117', '2022-02-15 04:51:24', '2022-02-15 04:51:24'),
(499, 'site_global_email', 'nazmul@nazmul.xgenious.com', '2022-02-15 18:58:44', '2022-02-15 18:58:44'),
(500, 'site_global_email_template', 'ssdf', '2022-02-15 18:58:44', '2022-02-15 18:58:44'),
(501, 'site_smtp_mail_mailer', 'smtp', '2022-02-15 19:34:53', '2022-02-15 20:16:18'),
(502, 'site_smtp_mail_host', NULL, '2022-02-15 19:34:53', '2022-02-15 20:16:18'),
(503, 'site_smtp_mail_port', '465', '2022-02-15 19:34:53', '2022-02-15 20:16:18'),
(504, 'site_smtp_mail_username', NULL, '2022-02-15 19:34:53', '2022-02-15 20:16:18'),
(505, 'site_smtp_mail_password', NULL, '2022-02-15 19:34:53', '2022-02-15 20:16:18'),
(506, 'site_smtp_mail_encryption', 'tls', '2022-02-15 19:34:53', '2022-02-15 20:16:18'),
(507, 'error_404_page_title', 'Page Not Found', '2022-02-16 23:33:50', '2022-02-16 23:33:50'),
(508, 'error_404_page_subtitle', 'Page Unavailable!!', '2022-02-16 23:33:51', '2022-02-16 23:33:51'),
(509, 'error_404_page_paragraph', NULL, '2022-02-16 23:33:51', '2022-02-16 23:33:51'),
(510, 'error_404_page_button_text', 'Back To Home', '2022-02-16 23:33:51', '2022-02-16 23:33:51'),
(511, 'error_image', '123', '2022-02-16 23:33:51', '2022-02-16 23:33:51'),
(512, 'site_admin_dark_mode', 'off', '2022-02-17 17:14:17', '2022-09-02 09:54:12'),
(513, 'success_title', 'SUCCESSFULL !', '2022-02-17 17:30:46', '2022-02-17 17:53:54'),
(514, 'success_subtitle', 'Your Order Successfully Completed', '2022-02-17 17:30:46', '2022-02-17 17:53:54'),
(515, 'success_details_title', 'Your Order Details', '2022-02-17 17:30:46', '2022-02-17 17:53:54'),
(516, 'button_title', 'Back To Home', '2022-02-17 17:30:46', '2022-02-17 17:53:54'),
(517, 'button_url', NULL, '2022-02-17 17:30:46', '2022-02-17 17:53:54'),
(518, 'site_disqus_key', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:38'),
(519, 'site_google_analytics', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:38'),
(520, 'tawk_api_key', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:38'),
(521, 'site_third_party_tracking_code', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:38'),
(522, 'site_google_captcha_v3_site_key', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:38'),
(523, 'site_google_captcha_v3_secret_key', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:38'),
(524, 'enable_google_login', 'on', '2022-02-27 11:26:14', '2022-04-21 03:57:38'),
(525, 'google_client_id', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:38'),
(526, 'google_client_secret', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:38'),
(527, 'enable_facebook_login', 'on', '2022-02-27 11:26:14', '2022-04-21 03:57:39'),
(528, 'facebook_client_id', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:39'),
(529, 'facebook_client_secret', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:39'),
(530, 'google_adsense_publisher_id', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:39'),
(531, 'google_adsense_customer_id', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:39'),
(532, 'enable_google_adsense', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:39'),
(533, 'instagram_access_token', NULL, '2022-02-27 11:26:14', '2022-04-21 03:57:39'),
(534, 'site_script_version', '1.2.2', '2022-03-02 22:10:16', '2022-06-12 06:31:26'),
(535, 'site_gdpr_cookie_en_GB_title', 'Cookies & Privacy', '2022-03-28 12:17:23', '2022-03-28 12:17:24'),
(536, 'site_gdpr_cookie_en_GB_message', 'Is education residence conveying so so. Suppose shyness say ten behaved morning had. Any unsatiable assistance compliment occasional too reasonably advantages.', '2022-03-28 12:17:24', '2022-03-28 12:17:24'),
(537, 'site_gdpr_cookie_en_GB_more_info_label', 'More information', '2022-03-28 12:17:24', '2022-03-28 12:17:24'),
(538, 'site_gdpr_cookie_en_GB_more_info_link', '{url}/privacy-policy', '2022-03-28 12:17:24', '2022-03-28 12:17:24'),
(539, 'site_gdpr_cookie_en_GB_accept_button_label', 'Accept', '2022-03-28 12:17:24', '2022-03-28 12:17:24'),
(540, 'site_gdpr_cookie_en_GB_decline_button_label', 'Decline', '2022-03-28 12:17:24', '2022-03-28 12:17:24'),
(541, 'site_gdpr_cookie_en_GB_manage_button_label', 'Manage', '2022-03-28 12:17:24', '2022-03-28 12:17:24'),
(542, 'site_gdpr_cookie_en_GB_manage_title', 'Manage Cookie', '2022-03-28 12:17:24', '2022-03-28 12:17:24'),
(543, 'site_gdpr_cookie_en_GB_manage_item_title', 'a:1:{i:0;N;}', '2022-03-28 12:17:24', '2022-03-28 12:17:24'),
(544, 'site_gdpr_cookie_en_GB_manage_item_description', 'a:1:{i:0;N;}', '2022-03-28 12:17:24', '2022-03-28 12:17:24'),
(545, 'site_gdpr_cookie_delay', '5000', '2022-03-28 12:17:24', '2022-03-28 12:26:55'),
(546, 'site_gdpr_cookie_enabled', 'on', '2022-03-28 12:17:24', '2022-03-28 12:26:56'),
(547, 'site_gdpr_cookie_expire', '30', '2022-03-28 12:17:24', '2022-03-28 12:26:56'),
(548, 'site_gdpr_cookie_title', 'Cookies & Privacy', '2022-03-28 12:23:49', '2022-03-28 12:26:55'),
(549, 'site_gdpr_cookie_message', 'Is education residence conveying so so. Suppose shyness say ten behaved morning had. Any unsatiable assistance compliment occasional too reasonably advantages.', '2022-03-28 12:23:49', '2022-03-28 12:26:55'),
(550, 'site_gdpr_cookie_more_info_label', 'More information', '2022-03-28 12:23:49', '2022-03-28 12:26:55'),
(551, 'site_gdpr_cookie_more_info_link', '{url}/privacy-policy', '2022-03-28 12:23:49', '2022-03-28 12:26:55'),
(552, 'site_gdpr_cookie_accept_button_label', 'Accept', '2022-03-28 12:23:49', '2022-03-28 12:26:55'),
(553, 'site_gdpr_cookie_decline_button_label', 'Decline', '2022-03-28 12:23:49', '2022-03-28 12:26:55'),
(554, 'site_gdpr_cookie_manage_button_label', 'Manage', '2022-03-28 12:23:49', '2022-03-28 12:26:55'),
(555, 'site_gdpr_cookie_manage_title', NULL, '2022-03-28 12:23:49', '2022-03-28 12:26:55'),
(556, 'site_gdpr_cookie_manage_item_title', 'a:3:{i:0;s:16:\"Site Preferences\";i:1;s:9:\"Analytics\";i:2;s:9:\"Marketing\";}', '2022-03-28 12:23:49', '2022-03-28 12:26:55'),
(557, 'site_gdpr_cookie_manage_item_description', 'a:3:{i:0;s:111:\"These are cookies that are related to your site preferences, e.g. remembering your username, site colours, etc.\";i:1;s:51:\"Cookies related to site visits, browser types, etc.\";i:2;s:65:\"Cookies related to marketing, e.g. newsletters, social media, etc\";}', '2022-03-28 12:23:49', '2022-03-28 12:26:55'),
(565, 'site_main_color_one', NULL, '2022-04-08 10:31:08', '2022-04-08 10:31:44'),
(566, 'site_main_color_two', NULL, '2022-04-08 10:31:08', '2022-04-08 10:31:44'),
(567, 'site_main_color_three', NULL, '2022-04-08 10:31:08', '2022-04-08 10:31:44'),
(568, 'heading_color', NULL, '2022-04-08 10:31:08', '2022-04-08 10:31:44'),
(569, 'light_color', NULL, '2022-04-08 10:31:08', '2022-04-08 10:31:44'),
(570, 'extra_light_color', NULL, '2022-04-08 10:31:08', '2022-04-08 10:31:44'),
(571, 'service_create_settings', 'verified_seller', '2022-04-21 02:50:29', '2022-04-21 03:22:00'),
(572, 'service_main_attribute_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:53'),
(573, 'service_additional_attribute_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:53'),
(574, 'service_benifits_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:53'),
(575, 'service_booking_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:53'),
(576, 'service_appoinment_package_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:54'),
(577, 'service_package_fee_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:54'),
(578, 'service_extra_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:54'),
(579, 'service_subtotal_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:54'),
(580, 'service_total_amount_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:54'),
(581, 'service_available_date_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:54'),
(582, 'service_available_schudule_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:54'),
(583, 'service_booking_information_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:54'),
(584, 'service_order_confirm_title', NULL, '2022-04-21 04:26:18', '2022-04-21 04:38:54'),
(585, 'terms_and_conditions_link', NULL, '2022-04-21 04:34:16', '2022-04-21 04:38:54'),
(586, 'login_form_title', 'Sign In', '2022-04-27 04:04:35', '2022-04-27 04:08:41'),
(587, 'register_page_title', 'Register For Join With Us', '2022-04-27 04:04:35', '2022-04-27 04:08:41'),
(588, 'register_seller_title', 'Seller', '2022-04-27 04:04:35', '2022-04-27 04:08:41'),
(589, 'register_buyer_title', 'Buyer', '2022-04-27 04:04:35', '2022-04-27 04:08:41'),
(590, 'enable_disable_decimal_point', 'yes', '2022-09-20 08:26:50', '2022-09-22 01:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` tinyint(4) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Android Apps', 'auto-mobile', NULL, 1, '2021-11-30 03:12:29', '2022-08-17 11:29:16'),
(2, 3, 'House Repair', 'house-repair', '106', 1, '2021-11-30 03:13:01', '2022-02-10 07:03:30'),
(3, 1, 'Ios Apps', 'ac-repair', '80', 1, '2021-11-30 03:13:15', '2022-08-17 11:29:29'),
(7, 5, 'Body Message', 'body-message', '110', 1, '2021-11-30 06:06:52', '2022-02-10 06:57:15'),
(8, 1, 'Repair', 'repair', '114', 1, '2022-02-01 00:55:09', '2022-02-10 06:57:05'),
(9, 2, 'Car Cleaning', 'car-cleaning', '112', 1, '2022-02-01 01:46:58', '2022-02-10 06:55:39'),
(10, 5, 'Hair Cutting', 'hair-cutting', '90', 1, '2022-02-01 02:44:56', '2022-02-10 06:55:25'),
(11, 2, 'House Cleaning', 'house-cleaning', '113', 1, '2022-02-01 03:03:50', '2022-02-10 06:55:15'),
(12, 5, 'Beauty Care', 'beauty-care', '102', 1, '2022-02-01 04:29:49', '2022-02-10 07:05:39'),
(13, 7, 'Profile Build', 'profile-build', '177', 1, '2022-04-24 00:08:23', '2022-04-24 00:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `via` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `operating_system` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(11) DEFAULT NULL,
  `buyer_id` bigint(11) DEFAULT NULL,
  `seller_id` bigint(11) DEFAULT NULL,
  `service_id` bigint(11) DEFAULT NULL,
  `order_id` bigint(11) DEFAULT NULL,
  `admin_id` bigint(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`id`, `title`, `via`, `operating_system`, `user_agent`, `description`, `subject`, `status`, `priority`, `department`, `user_id`, `buyer_id`, `seller_id`, `service_id`, `order_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'dsdsa', NULL, NULL, NULL, 'asdasdasdas', 'asdasdasd', 'open', 'urgent', NULL, NULL, 5, 4, 19, 500, NULL, '2022-06-12 06:01:33', '2022-06-12 06:01:33'),
(2, 'New Order', NULL, NULL, NULL, NULL, 'Order Created By anshul', 'open', 'high', NULL, NULL, 395, 1, 53, 506, NULL, '2022-08-01 17:02:26', '2022-08-01 17:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `support_ticket_messages`
--

CREATE TABLE `support_ticket_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Electronics', 'publish', '2022-01-08 01:20:00', '2022-01-08 01:20:00'),
(5, 'Salon & Spa', 'publish', '2022-01-08 01:20:16', '2022-01-08 01:20:16'),
(6, 'Home Move', 'draft', '2022-01-08 01:20:51', '2022-01-08 01:20:51'),
(7, 'Body Message', 'publish', '2022-01-08 01:21:16', '2022-01-08 01:21:16'),
(9, 'Painting', 'publish', '2022-01-08 05:30:42', '2022-01-08 05:30:42'),
(10, 'Cleaning', 'publish', '2022-01-08 05:30:53', '2022-01-08 05:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `to_do_lists`
--

CREATE TABLE `to_do_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'individual, agency, company',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reg_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_background` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=seller, 1=buyer',
  `user_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=inactive, 1=active',
  `terms_condition` int(11) NOT NULL DEFAULT 1,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(191) DEFAULT NULL,
  `email_verified` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verify_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fb_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `go_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `li_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yo_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twi_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pi_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dr_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `re_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `date_of_birth`, `reg_year`, `email`, `username`, `password`, `phone`, `image`, `profile_background`, `service_city`, `service_area`, `user_type`, `user_status`, `terms_condition`, `address`, `state`, `about`, `post_code`, `country_id`, `email_verified`, `email_verify_token`, `remember_token`, `facebook_id`, `google_id`, `country_code`, `created_at`, `updated_at`, `fb_url`, `tw_url`, `go_url`, `li_url`, `yo_url`, `in_url`, `twi_url`, `pi_url`, `dr_url`, `re_url`) VALUES
(1, NULL, 'Nazmul Hoque', NULL, NULL, 'demo@bytesed.com', 'test_seller', '$2y$10$N1f1pr833Q4v31R6iHIb/u2CSIsftw/8M1JuRN9d7XIU4NCYhHqM6', '541965135', '120', '121', '1', '1', 0, 1, 1, 'Dhanmondi Kalabagan', NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page. It is a long established fact that a reader will be distracted by the readable content of a page', '1205', 1, '1', 'qw23QrtQ', 'NZ6BIR2h3xgMAYoMhmw244ZZgLkUVGYE1rOszTyf0csubAb1qR9OQFcxIBKL', NULL, NULL, NULL, '2021-12-05 07:11:43', '2022-03-17 09:32:17', '#', '#', NULL, NULL, '#', '#', NULL, NULL, NULL, NULL),
(2, NULL, 'Md Mahmud', NULL, NULL, 'haulakaula@gmail.com', 'mahmud', '$2y$10$VW9DGTk2nvnrmMUhr8MVb.AAIxeZPnjedREM8KvbUtsYqB8oWVR0S', '01713808080', '22', NULL, '3', '6', 0, 1, 1, 'Sotheerm Road-12/A', NULL, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.', '1032', 3, '1', 'qw23QrtY', 'k1iYh2gwb1akM5140WEI6B8T8UakcVXwZdfxO0wL1rIlwCdcLCFqVe2v5hkn', NULL, NULL, NULL, '2021-12-05 07:13:59', '2022-02-09 04:32:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'Md Sohan', NULL, NULL, 'testdoc2021@gmail.com', 'sohan', '$2y$10$fwaADkuysNqI1Jq9FHWJ.u/6dFwybTKyNf7CyrJbUPZeJxg9sXg22', '01713606060', '65', '122', '1', '2', 1, 1, 1, '49/3, Dhaka', NULL, 'Hi this is Sohan from Bangladesh', '1203', 1, '1', 'YwO3QPtQ', 'IpNuHHvBiw0wq9YnBeNOiZodL1qw9JX1hoqXgTy9RSTkhbw7rbTljczYVCYd', NULL, NULL, NULL, '2021-12-05 07:15:03', '2022-02-20 15:31:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 'Md Shahadat', NULL, NULL, 'shahadat@gmail.com', 'shahadat', '$2y$10$fwaADkuysNqI1Jq9FHWJ.u/6dFwybTKyNf7CyrJbUPZeJxg9sXg22', '+11955627635', '97', '1', '1', '1', 0, 1, 1, '90/4, New Dhaka', NULL, 'Hi This is Shahadat From Bangladesh', '1378', 1, '1', 'B9a2iZ4u', 'r9J355g9LiIbcrThLLg8zMxHfkqYNGmRY0GJf16apHqD7SdAbcW3B7AmojFL', NULL, NULL, NULL, '2022-02-01 03:48:09', '2022-02-01 03:55:41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(395, NULL, 'dhruv arora', NULL, NULL, 'ecommshuttle@gmail.com', 'ecommshuttle', '$2y$10$fFdsKX8EgUW5NBaUGYTnKO37eeKf6bwbMBpbQ3zx9Cb20GPuOgFGi', '7977019987', NULL, NULL, '2', '7', 1, 1, 1, NULL, NULL, NULL, NULL, 2, '1', 'ydFX3GE9', 'D9hV7fbDZJQRiMCVKTUmAdIO5DxKglqE4PHq2Jqcx5q88CGD2gts09xoie7S', NULL, NULL, NULL, '2022-07-28 21:19:36', '2022-08-01 16:57:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(396, NULL, 'Anshul', NULL, NULL, 'anshulswarup@yahoo.com', 'Anshul', '$2y$10$yYD6vX6hHzjrjah1QWhpfOgWMwqemHcTS5RitV8mrO98YwDZ3/X5O', '8779235956', NULL, NULL, '7', '20', 1, 1, 1, NULL, NULL, NULL, NULL, 6, '1', 'WSCyUq1P', 'ZSSFE8lQMqSk9laq3aZQwMtFvd96vBm8wnOaLHrFgyaOconIXsezFt83IWyy', NULL, NULL, NULL, '2022-08-16 13:20:33', '2022-08-17 12:45:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(397, NULL, 'jacob', NULL, NULL, 'j@gmail.com', 'jacob', '$2y$10$Gz1ZhLOPoZy5vOLq25HFiu1hxI4A/TiZ2i6AdfcVznmAINJGCQg5e', '342435345', NULL, NULL, '2', '7', 1, 1, 1, NULL, NULL, NULL, NULL, 2, NULL, 'SRDIFob1', 'aPi364MMGaU4Cb1QeWNsxgQgDmRIiAb8uLdOVoDlzdy12gfVufujI0WD4iYj', NULL, NULL, NULL, '2022-08-17 12:42:25', '2022-08-17 12:42:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(399, NULL, 'choc', NULL, NULL, 'chocovidsofficial@gmail.com', 'chocseller', '$2y$10$3z8rP0puN6iLIGtdjB81Ze9v0LsMDG9Ki8bxTXdIymAAW/4iw.6ba', '12345647567', NULL, NULL, '2', '7', 0, 1, 1, NULL, NULL, NULL, NULL, 2, '1', 'UnfDCWuo', 'moNbJUUe2jZcgn5NmnBJASV7oJInWKYwIvkEccCSPNMaJ1PKLSAkUQO0yQY4', NULL, NULL, NULL, '2022-08-17 12:55:59', '2022-08-17 12:58:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(400, NULL, 'Michael Whitley', NULL, NULL, 'ticy@mailinator.com', 'lowiqajip', '$2y$10$mDblK5HUSVxIyoB6HoX04OAMiuSgMmV8ciy.GesVd1PbQerlPIlYK', '+1 (316) 507-1075', NULL, NULL, '1', '1', 0, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, 'NxyaHHzC', NULL, NULL, NULL, NULL, '2022-09-06 03:37:50', '2022-09-06 03:37:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(401, NULL, 'Melinda Slater', NULL, NULL, 'tecuwerapy@mailinator.com', 'wufet', '$2y$10$JeWDAyfjNx6kw4SntpsGSuyjcYLxjxYyJevbCLlt5W.wSr97evSIK', '+1 (845) 333-9252', NULL, NULL, '2', '7', 1, 1, 1, NULL, NULL, NULL, NULL, 2, NULL, 'jYXhCix0', NULL, NULL, NULL, NULL, '2022-09-06 04:00:37', '2022-09-06 04:00:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(402, NULL, 'Chase Hubbard', NULL, NULL, 'gyweca@mailinator.com', 'bojobum', '$2y$10$bPk5wAAdWMHyNzhVFoo.QONo2UnZEqLtdOR6MWY7xNTbs5sjOLI6C', '+1 (545) 477-2674', NULL, NULL, '1', '1', 0, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, '8hYZJqn2', NULL, NULL, NULL, NULL, '2022-09-06 04:09:43', '2022-09-06 04:09:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(403, 'individual', 'roar', '2005-06-14', NULL, 'roar@gmail.com', 'dhruvk20350@gmail.com', '$2y$10$Go7ywWhR6YLdazKMFax2vecRaUtP5t3Eu06eQ8a8sNmOzr2jBS.mq', '234234243', NULL, NULL, '1', '1', 0, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, 'eQrg4Q2t', NULL, NULL, NULL, NULL, '2022-09-06 04:11:39', '2022-09-06 04:11:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(404, 'individual', 'Namat', '2011-07-07', NULL, 'softwaredeveloper992@gmail.com', 'namat', '$2y$10$yYD6vX6hHzjrjah1QWhpfOgWMwqemHcTS5RitV8mrO98YwDZ3/X5O', '12345678987', NULL, NULL, '1', '1', 0, 1, 1, NULL, NULL, NULL, NULL, 1, '1', 'zEv5vVbk', 'tTmWzioN9ZXDdzVfPj4NUWBpSi7jeYWsYXcrkqD9wUoSJQC113oOG3KMSm6Z', NULL, NULL, NULL, '2022-09-06 04:24:19', '2022-09-06 04:41:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(405, 'individual', 'John doe', '2022-09-08', NULL, 'johndoe@gmail.com', 'john doe', '$2y$10$A1OTjEwMdIUJo6qLbQYo1OoLPm7bR1fdYYlbtI6YNoE0Af28EIG0S', '12345', NULL, NULL, '1', '1', 0, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, 'Q0VKzpDo', NULL, NULL, NULL, NULL, '2022-09-07 03:57:33', '2022-09-07 03:57:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(406, 'individual', 'Kiran', '2022-09-09', NULL, 'kiran@gmail.com', 'Sama', '$2y$10$4qi/JWKm42nX5AzawiqEh.OeJcFOrgy5FPkcfg56ft/YEEreJeBWu', '12340989', NULL, NULL, '3', '10', 0, 1, 1, NULL, NULL, NULL, NULL, 3, NULL, 'wsnn0Wte', NULL, NULL, NULL, NULL, '2022-09-07 04:01:02', '2022-09-07 04:01:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(407, 'individual', 'Nirash', '2022-09-09', NULL, 'nirash@gmail.com', 'Nirasha', '$2y$10$2ykbx8c5JTEs9bgBAxjJ2O0LGQD5Ql8EXkghGa.arwwNhrxnHAKce', '550098', NULL, NULL, '1', '1', 0, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, 'a18fGKxS', NULL, NULL, NULL, NULL, '2022-09-07 04:06:29', '2022-09-07 04:06:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(408, 'individual', 'Hector Roberts', '2022-09-08', NULL, 'logeciqef@mailinator.com', 'behymiqeqe', '$2y$10$BUnu5n6bsOWH6fcbznEyaOs9nhEFdriT.BkW0cLRVB8NzVL2G09eO', '+1 (259) 116-1827', NULL, NULL, '1', '1', 1, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, '3OqDLOYd', NULL, NULL, NULL, NULL, '2022-09-07 04:11:46', '2022-09-07 04:11:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(409, 'individual', 'Jessica Vazquez', '2022-09-08', NULL, 'pawavubopy@mailinator.com', 'tubudiqoho', '$2y$10$KbL.VDJJtWjDzuEC1gpLf.U.aeaSLXM0wJfybUS/q5qKutRy.P7OK', '+1 (701) 461-2097', NULL, NULL, '2', '7', 1, 1, 1, NULL, NULL, NULL, NULL, 2, NULL, 'ROypFDf9', NULL, NULL, NULL, NULL, '2022-09-07 04:20:35', '2022-09-07 04:20:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(410, 'individual', 'Danielle Moss', '2022-09-08', NULL, 'guxupicop@mailinator.com', 'cizezygoxa', '$2y$10$8g0b8Nd6ygsHnHnzp0qviO5WLw/Ukx5CXLXNMJ7jp6tM.I7IInjaO', '+1 (516) 168-4586', NULL, NULL, '2', '7', 0, 1, 1, NULL, NULL, NULL, NULL, 2, NULL, '88bMlrrq', NULL, NULL, NULL, NULL, '2022-09-07 04:22:20', '2022-09-07 04:22:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(411, 'individual', 'Yoko Brewer', '2022-09-08', NULL, 'gavotonu@mailinator.com', 'haducufiky', '$2y$10$S.GTPQrsytF03JZmVinsB.vu1.W6hyiFEkWzMHEAYSOJs19c6JI.e', '+1 (639) 482-4074', NULL, NULL, '2', '7', 0, 1, 1, NULL, NULL, NULL, NULL, 2, NULL, '928KPn6X', NULL, NULL, NULL, NULL, '2022-09-07 04:26:40', '2022-09-07 04:26:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(412, 'individual', 'Brittany Lindsey', '2022-09-08', NULL, 'cugamohe@mailinator.com', 'muluqoqisy', '$2y$10$4BLLkF.nwT669fYp9y4Yg.7avUp87hwjdj8SkZAZjMtBf84fm1pHK', '+1 (835) 819-3517', NULL, NULL, '1', '1', 0, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, 'eetZcYhC', NULL, NULL, NULL, NULL, '2022-09-07 04:30:13', '2022-09-07 04:30:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(413, 'agency', 'Dacey Melendez', NULL, '2022', 'zysymiho@mailinator.com', 'qudufeviqe', '$2y$10$EdFpoRJKTgInIWpGyoYehej9z58AB6VPl821ThV9uYwGqni77Q9Ja', '+1 (327) 761-5037', NULL, NULL, '1', '1', 1, 1, 1, NULL, NULL, NULL, NULL, 1, NULL, 'kDJ4xCGM', NULL, NULL, NULL, NULL, '2022-09-26 06:38:57', '2022-09-26 06:38:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `widget_area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widget_order` int(11) DEFAULT NULL,
  `widget_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widget_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `widget_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `widget_area`, `widget_order`, `widget_location`, `widget_name`, `widget_content`, `created_at`, `updated_at`) VALUES
(52, NULL, 4, 'footer', 'ContactInfoWidget', 'a:13:{s:2:\"id\";s:2:\"52\";s:11:\"widget_name\";s:17:\"ContactInfoWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"4\";s:5:\"title\";s:12:\"Contact Info\";s:7:\"address\";s:26:\"41/1, Hilton Mall, NY City\";s:12:\"address_icon\";s:21:\"las la-map-marker-alt\";s:5:\"phone\";s:13:\"+012-78901234\";s:10:\"phone_icon\";s:17:\"las la-mobile-alt\";s:5:\"email\";s:13:\"help@mail.com\";s:10:\"email_icon\";s:15:\"las la-envelope\";s:28:\"contact_page_contact_info_01\";a:2:{s:5:\"icon_\";a:4:{i:0;s:17:\"lab la-facebook-f\";i:1;s:14:\"lab la-twitter\";i:2;s:16:\"lab la-instagram\";i:3;s:14:\"lab la-youtube\";}s:4:\"url_\";a:4:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";i:3;s:1:\"#\";}}}', '2021-10-03 07:18:35', '2022-01-15 08:30:11'),
(75, NULL, 1, 'footer_style_two', 'FooterStyleTwoWidget', 'a:12:{s:2:\"id\";s:2:\"75\";s:11:\"widget_name\";s:20:\"FooterStyleTwoWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:16:\"footer_style_two\";s:12:\"widget_order\";s:1:\"1\";s:17:\"email_title_en_GB\";s:5:\"Email\";s:11:\"email_en_GB\";s:16:\"contact@mail.com\";s:18:\"follow_title_en_GB\";s:9:\"Follow me\";s:14:\"email_title_ar\";s:29:\"بريد الالكتروني\";s:8:\"email_ar\";s:16:\"contact@mail.com\";s:15:\"follow_title_ar\";s:12:\"اتبعني\";s:9:\"site_logo\";s:2:\"57\";}', '2021-10-27 07:07:26', '2021-10-27 07:11:36'),
(81, NULL, 1, 'style_one_footer', 'LogoWidget', 'a:5:{s:11:\"widget_name\";s:10:\"LogoWidget\";s:11:\"widget_type\";s:3:\"new\";s:15:\"widget_location\";s:16:\"style_one_footer\";s:12:\"widget_order\";s:1:\"1\";s:9:\"site_logo\";s:2:\"57\";}', '2021-10-27 08:55:49', '2021-10-27 08:55:49'),
(82, NULL, 2, 'style_one_footer', 'NavigationMenuWidget', 'a:7:{s:11:\"widget_name\";s:20:\"NavigationMenuWidget\";s:11:\"widget_type\";s:3:\"new\";s:15:\"widget_location\";s:16:\"style_one_footer\";s:12:\"widget_order\";s:1:\"2\";s:18:\"widget_title_en_GB\";N;s:15:\"widget_title_ar\";N;s:7:\"menu_id\";s:1:\"2\";}', '2021-10-27 08:56:25', '2021-10-27 08:56:25'),
(83, NULL, 2, 'footer_three', 'AboutUsWidget', 'a:8:{s:2:\"id\";s:2:\"83\";s:11:\"widget_name\";s:13:\"AboutUsWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:12:\"footer_three\";s:12:\"widget_order\";s:1:\"1\";s:9:\"site_logo\";s:2:\"57\";s:17:\"description_en_GB\";s:115:\"One advanced diverted domestic repeated bringing you old. Possible procured her trifling laughter thoughts property\";s:14:\"description_ar\";s:173:\"متقدم واحد محوّل محلي متكرر يجلب لك الشيخوخة. من الممكن الحصول على ممتلكات تافهة من أفكار الضحك\";}', '2021-10-27 22:32:16', '2021-11-13 00:29:31'),
(86, NULL, 5, 'footer_three', 'ContactInfoWidget', 'a:12:{s:11:\"widget_name\";s:17:\"ContactInfoWidget\";s:11:\"widget_type\";s:3:\"new\";s:15:\"widget_location\";s:12:\"footer_three\";s:12:\"widget_order\";s:1:\"4\";s:18:\"widget_title_en_GB\";s:10:\"Contact us\";s:14:\"location_en_GB\";s:28:\"66 Brooklyn street, New York\";s:11:\"phone_en_GB\";s:11:\"01847111881\";s:11:\"email_en_GB\";s:18:\"sohan@xgenious.com\";s:15:\"widget_title_ar\";s:15:\"اتصل بنا\";s:11:\"location_ar\";s:28:\"66 Brooklyn street, New York\";s:8:\"phone_ar\";s:12:\"+18274737136\";s:8:\"email_ar\";s:18:\"sohan@xgenious.com\";}', '2021-10-27 22:34:39', '2021-11-13 00:29:31'),
(99, NULL, 1, 'footer', 'AboutUsWidget', 'a:8:{s:2:\"id\";s:2:\"99\";s:11:\"widget_name\";s:13:\"AboutUsWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"1\";s:11:\"description\";s:186:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.\";s:5:\"image\";s:2:\"64\";s:7:\"image_2\";s:3:\"124\";}', '2021-11-24 07:31:12', '2022-02-07 03:15:10'),
(101, NULL, 2, 'footer', 'CommunityWidget', 'a:7:{s:2:\"id\";s:3:\"101\";s:11:\"widget_name\";s:15:\"CommunityWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"2\";s:5:\"title\";s:9:\"Community\";s:28:\"contact_page_contact_info_01\";a:2:{s:9:\"com_text_\";a:4:{i:0;s:15:\"Become A Seller\";i:1;s:14:\"Become A Buyer\";i:2;s:12:\"Join With Us\";i:3;s:6:\"Events\";}s:4:\"url_\";a:4:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";i:3;s:1:\"#\";}}}', '2021-11-24 23:43:46', '2022-01-15 08:02:24'),
(106, NULL, 3, 'footer', 'Category', 'a:5:{s:11:\"widget_name\";s:8:\"Category\";s:11:\"widget_type\";s:3:\"new\";s:15:\"widget_location\";s:6:\"footer\";s:12:\"widget_order\";s:1:\"3\";s:5:\"title\";s:8:\"Category\";}', '2022-01-15 06:27:46', '2022-01-15 08:30:07'),
(108, NULL, 1, 'copyright', 'PrivacyPolicy', 'a:6:{s:2:\"id\";s:3:\"108\";s:11:\"widget_name\";s:13:\"PrivacyPolicy\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:9:\"copyright\";s:12:\"widget_order\";s:1:\"1\";s:28:\"contact_page_contact_info_01\";a:2:{s:6:\"title_\";a:2:{i:0;s:14:\"Privacy Policy\";i:1;s:18:\"Terms & Conditions\";}s:4:\"url_\";a:2:{i:0;s:14:\"privacy-policy\";i:1;s:20:\"terms-and-conditions\";}}}', '2022-01-15 22:02:14', '2022-02-11 22:31:59'),
(109, NULL, 3, 'copyright', 'PaymentGateway', 'a:6:{s:2:\"id\";s:3:\"109\";s:11:\"widget_name\";s:14:\"PaymentGateway\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:9:\"copyright\";s:12:\"widget_order\";s:1:\"2\";s:28:\"contact_page_contact_info_01\";a:2:{s:6:\"image_\";a:4:{i:0;s:2:\"61\";i:1;s:2:\"60\";i:2;s:2:\"62\";i:3;s:2:\"63\";}s:4:\"url_\";a:4:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";i:3;s:1:\"#\";}}}', '2022-01-15 22:19:30', '2022-01-15 22:32:15'),
(110, NULL, 2, 'copyright', 'CopyrightText', 'a:6:{s:2:\"id\";s:3:\"110\";s:11:\"widget_name\";s:13:\"CopyrightText\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:9:\"copyright\";s:12:\"widget_order\";s:1:\"2\";s:5:\"title\";s:31:\"All copyright (C) 2022 Reserved\";}', '2022-01-15 22:32:21', '2022-02-07 04:57:24'),
(112, NULL, 1, 'footer2', 'CommunityWidget', 'a:7:{s:2:\"id\";s:3:\"112\";s:11:\"widget_name\";s:15:\"CommunityWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:7:\"footer2\";s:12:\"widget_order\";s:1:\"1\";s:5:\"title\";s:6:\"werwer\";s:28:\"contact_page_contact_info_01\";a:2:{s:9:\"com_text_\";a:1:{i:0;s:5:\"ewrwe\";}s:4:\"url_\";a:1:{i:0;s:1:\"#\";}}}', '2022-01-16 00:05:30', '2022-01-16 00:06:34'),
(113, NULL, 2, 'footer_one', 'AboutUsWidget', 'a:7:{s:2:\"id\";s:3:\"113\";s:11:\"widget_name\";s:13:\"AboutUsWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:10:\"footer_one\";s:12:\"widget_order\";s:1:\"1\";s:11:\"description\";s:186:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.\";s:5:\"image\";s:3:\"126\";}', '2022-02-07 03:30:09', '2022-02-17 16:10:08'),
(114, NULL, 1, 'footer_two', 'AboutUsWidget', 'a:7:{s:2:\"id\";s:3:\"114\";s:11:\"widget_name\";s:13:\"AboutUsWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:10:\"footer_two\";s:12:\"widget_order\";s:1:\"1\";s:11:\"description\";s:186:\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less.\";s:5:\"image\";s:3:\"124\";}', '2022-02-07 03:30:23', '2022-02-07 03:47:24'),
(115, NULL, 3, 'footer_one', 'CommunityWidget', 'a:10:{s:2:\"id\";s:3:\"115\";s:11:\"widget_name\";s:15:\"CommunityWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:10:\"footer_one\";s:12:\"widget_order\";s:1:\"3\";s:5:\"title\";s:9:\"Community\";s:12:\"seller_title\";s:15:\"Become A Seller\";s:11:\"seller_link\";N;s:11:\"buyer_title\";s:14:\"Become A Buyer\";s:10:\"buyer_link\";N;}', '2022-02-07 03:36:30', '2022-03-03 15:39:29'),
(116, NULL, 4, 'footer_one', 'Category', 'a:9:{s:2:\"id\";s:3:\"116\";s:11:\"widget_name\";s:8:\"Category\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:10:\"footer_one\";s:12:\"widget_order\";s:1:\"4\";s:5:\"title\";s:8:\"Category\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"5\";}', '2022-02-07 03:39:07', '2022-03-03 14:17:03'),
(117, NULL, 5, 'footer_one', 'ContactInfoWidget', 'a:13:{s:2:\"id\";s:3:\"117\";s:11:\"widget_name\";s:17:\"ContactInfoWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:10:\"footer_one\";s:12:\"widget_order\";s:1:\"4\";s:5:\"title\";s:12:\"Contact Info\";s:7:\"address\";s:26:\"41/1, Hilton Mall, NY City\";s:12:\"address_icon\";s:21:\"las la-map-marker-alt\";s:5:\"phone\";s:13:\"+012-78901234\";s:10:\"phone_icon\";s:17:\"las la-mobile-alt\";s:5:\"email\";s:16:\"example@mail.com\";s:10:\"email_icon\";s:15:\"las la-envelope\";s:28:\"contact_page_contact_info_01\";a:2:{s:5:\"icon_\";a:4:{i:0;s:17:\"lab la-facebook-f\";i:1;s:14:\"lab la-twitter\";i:2;s:16:\"lab la-instagram\";i:3;s:14:\"lab la-youtube\";}s:4:\"url_\";a:4:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";i:3;s:1:\"#\";}}}', '2022-02-07 03:45:20', '2022-02-17 16:10:09'),
(118, NULL, 2, 'footer_two', 'CommunityWidget', 'a:10:{s:2:\"id\";s:3:\"118\";s:11:\"widget_name\";s:15:\"CommunityWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:10:\"footer_two\";s:12:\"widget_order\";s:1:\"2\";s:5:\"title\";s:9:\"Community\";s:12:\"seller_title\";s:15:\"Become A Seller\";s:11:\"seller_link\";N;s:11:\"buyer_title\";s:14:\"Become A Buyer\";s:10:\"buyer_link\";N;}', '2022-02-07 03:48:47', '2022-03-03 15:40:20'),
(119, NULL, 3, 'footer_two', 'Category', 'a:9:{s:2:\"id\";s:3:\"119\";s:11:\"widget_name\";s:8:\"Category\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:10:\"footer_two\";s:12:\"widget_order\";s:1:\"3\";s:5:\"title\";s:8:\"Category\";s:8:\"order_by\";s:2:\"id\";s:5:\"order\";s:3:\"asc\";s:5:\"items\";s:1:\"5\";}', '2022-02-07 03:49:42', '2022-03-03 14:16:20'),
(120, NULL, 4, 'footer_two', 'ContactInfoWidget', 'a:13:{s:2:\"id\";s:3:\"120\";s:11:\"widget_name\";s:17:\"ContactInfoWidget\";s:11:\"widget_type\";s:6:\"update\";s:15:\"widget_location\";s:10:\"footer_two\";s:12:\"widget_order\";s:1:\"4\";s:5:\"title\";s:12:\"Contact Info\";s:7:\"address\";s:26:\"41/1, Hilton Mall, NY City\";s:12:\"address_icon\";s:21:\"las la-map-marker-alt\";s:5:\"phone\";s:13:\"+012-78901234\";s:10:\"phone_icon\";s:13:\"las la-mobile\";s:5:\"email\";s:16:\"example@mail.com\";s:10:\"email_icon\";s:15:\"las la-envelope\";s:28:\"contact_page_contact_info_01\";a:2:{s:5:\"icon_\";a:4:{i:0;s:17:\"lab la-facebook-f\";i:1;s:14:\"lab la-twitter\";i:2;s:16:\"lab la-instagram\";i:3;s:14:\"lab la-youtube\";}s:4:\"url_\";a:4:{i:0;s:1:\"#\";i:1;s:1:\"#\";i:2;s:1:\"#\";i:3;s:1:\"#\";}}}', '2022-02-07 03:53:34', '2022-02-07 03:55:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountdeactives`
--
ALTER TABLE `accountdeactives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `admin_commissions`
--
ALTER TABLE `admin_commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amount_settings`
--
ALTER TABLE `amount_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_builders`
--
ALTER TABLE `form_builders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_uploads`
--
ALTER TABLE `media_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_data`
--
ALTER TABLE `meta_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestone_projects`
--
ALTER TABLE `milestone_projects`
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `online_service_faqs`
--
ALTER TABLE `online_service_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_additionals`
--
ALTER TABLE `order_additionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_includes`
--
ALTER TABLE `order_includes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_builders`
--
ALTER TABLE `page_builders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payout_requests`
--
ALTER TABLE `payout_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_deliveries`
--
ALTER TABLE `project_deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_verifies`
--
ALTER TABLE `seller_verifies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceadditionals`
--
ALTER TABLE `serviceadditionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicebenifits`
--
ALTER TABLE `servicebenifits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceincludes`
--
ALTER TABLE `serviceincludes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_areas`
--
ALTER TABLE `service_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_cities`
--
ALTER TABLE `service_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_coupons`
--
ALTER TABLE `service_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_icons`
--
ALTER TABLE `social_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_options`
--
ALTER TABLE `static_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_ticket_messages`
--
ALTER TABLE `support_ticket_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `to_do_lists`
--
ALTER TABLE `to_do_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountdeactives`
--
ALTER TABLE `accountdeactives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `admin_commissions`
--
ALTER TABLE `admin_commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amount_settings`
--
ALTER TABLE `amount_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_builders`
--
ALTER TABLE `form_builders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media_uploads`
--
ALTER TABLE `media_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `meta_data`
--
ALTER TABLE `meta_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `milestone_projects`
--
ALTER TABLE `milestone_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `online_service_faqs`
--
ALTER TABLE `online_service_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT for table `order_additionals`
--
ALTER TABLE `order_additionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;

--
-- AUTO_INCREMENT for table `order_includes`
--
ALTER TABLE `order_includes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1070;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `page_builders`
--
ALTER TABLE `page_builders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payout_requests`
--
ALTER TABLE `payout_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=498;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_deliveries`
--
ALTER TABLE `project_deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `seller_verifies`
--
ALTER TABLE `seller_verifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `serviceadditionals`
--
ALTER TABLE `serviceadditionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `servicebenifits`
--
ALTER TABLE `servicebenifits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `serviceincludes`
--
ALTER TABLE `serviceincludes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `service_areas`
--
ALTER TABLE `service_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `service_cities`
--
ALTER TABLE `service_cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `service_coupons`
--
ALTER TABLE `service_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_icons`
--
ALTER TABLE `social_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `static_options`
--
ALTER TABLE `static_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=591;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `support_ticket_messages`
--
ALTER TABLE `support_ticket_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `to_do_lists`
--
ALTER TABLE `to_do_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=414;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Constraints for dumped tables
--

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
