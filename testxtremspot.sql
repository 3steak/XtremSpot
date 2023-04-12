-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2023 at 12:36 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testxtremspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Skate'),
(2, 'Roller'),
(3, 'Bmx'),
(4, 'Surf'),
(5, 'Paddle');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `validated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `idUsers` int NOT NULL,
  `idPublications` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `description`, `validated_at`, `created_at`, `deleted_at`, `idUsers`, `idPublications`) VALUES
(59, 'Dingue !', '2023-04-10 20:41:08', '2023-04-10 22:35:00', NULL, 6, 34),
(60, 'C&#39;est fat !!', '2023-04-10 20:41:12', '2023-04-10 22:35:11', NULL, 6, 32),
(61, 'oui c&#39;était super !', '2023-04-10 20:47:05', '2023-04-10 22:42:13', NULL, 16, 36),
(62, 'Magnifique !', '2023-04-10 20:47:09', '2023-04-10 22:42:42', NULL, 16, 32),
(63, 'jy suis deja allé c&#39;est super !', NULL, '2023-04-10 22:43:30', NULL, 15, 38),
(66, 'damn&#10;', '2023-04-12 07:34:56', '2023-04-12 09:34:46', NULL, 6, 36);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int NOT NULL,
  `idPublications` int NOT NULL,
  `idUsers` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `idPublications`, `idUsers`, `created_at`) VALUES
(51, 34, 16, '2023-04-10 22:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `idUsers` int NOT NULL,
  `idPublications` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `created_at`, `idUsers`, `idPublications`) VALUES
(41, '2023-04-10 22:34:55', 6, 34),
(43, '2023-04-10 22:42:28', 16, 34),
(50, '2023-04-12 13:46:00', 6, 38);

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `marker_longitude` decimal(9,7) DEFAULT NULL,
  `marker_latitude` decimal(9,7) DEFAULT NULL,
  `validated_at` datetime DEFAULT NULL,
  `town` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `report` tinyint(1) DEFAULT NULL,
  `likes` smallint DEFAULT '0',
  `idCategories` int DEFAULT NULL,
  `idUsers` int NOT NULL,
  `image_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `title`, `description`, `deleted_at`, `created_at`, `marker_longitude`, `marker_latitude`, `validated_at`, `town`, `report`, `likes`, `idCategories`, `idUsers`, `image_name`) VALUES
(32, 'Petit aprem non loin d&#39;Angresse', 'Le spot est à Hossegor sur la plage centrale', NULL, '2023-04-10 22:20:02', '-1.4433550', '43.6651280', '2023-04-10 20:34:03', 'Angresse', NULL, 0, 4, 14, 'img_64346f71e8b9f.14.jpg'),
(33, 'Skate à Mers les Bains !', 'Super pool à Mers les Bains ! la mer est pas loin en plus !', NULL, '2023-04-10 22:22:09', '1.3860660', '50.0656790', NULL, 'Mers-les-Bains', NULL, 0, 1, 14, 'img_64346ff16bceb.14.jpg'),
(34, 'Gros air !', 'Test du skatepark de toulouse', NULL, '2023-04-10 22:25:58', '1.4165540', '43.6113540', '2023-04-10 20:34:10', 'Toulouse', NULL, 2, 3, 15, 'img_643470d64bc8e.15.jpg'),
(35, 'Champ de bosses à Toulouse', '', NULL, '2023-04-10 22:27:23', '1.4126830', '43.6000470', NULL, 'Toulouse', NULL, 0, 3, 15, 'img_6434712af2c35.15.jpg'),
(36, 'Journée au lac', 'balade en solo au lac blanc :)', NULL, '2023-04-10 22:32:16', '7.0906280', '48.1264200', '2023-04-10 20:34:19', 'Orbey', NULL, 0, 5, 16, 'img_6434725029662.16.jpg'),
(38, 'Bowl du grand marais Amiens', 'Skatepark du Grand Marais Amiens', NULL, '2023-04-10 22:40:45', '2.2619220', '49.9198880', '2023-04-10 20:40:59', 'Amiens', NULL, 1, 2, 6, 'img_6434744dc6bcb.6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pseudo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'avatar_0.png',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `validated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `idCategories` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `pseudo`, `avatar`, `password`, `email`, `created_at`, `updated_at`, `validated_at`, `deleted_at`, `admin`, `idCategories`) VALUES
(6, 'Florian', 'Billault', 'Flo', 'avatar_1.png', '$2y$10$bpW9luf/x62pj1cqSAUrfunlIW7HOhcXDXwiB1q85Io/U7Ym2x0KW', 'florianbillault@gmail.com', '2023-03-28 15:43:37', '2023-04-12 12:01:31', '2023-03-28 15:47:37', NULL, 1, 2),
(14, 'Cyprien', 'Bocquet', 'Cyp', 'avatar_1.png', '$2y$10$9KJc5KK2RfwS5.bSzbIt/OO61a8mVVfqjQr4w/X8Fgn5Lktgeqnx6', 'cyprien.bocquet@gmail.com', '2023-04-10 21:49:52', '2023-04-10 22:15:57', '2023-04-10 21:50:14', NULL, 0, 1),
(15, 'Jean', 'BMXman', 'JeanBmx', 'avatar_4.png', '$2y$10$mflvXcQtMqwIcxe/LDyMquOhFd0SN6agDEaPmkY9kUM15TOkW4wj.', 'jean@gmail.com', '2023-04-10 22:23:13', '2023-04-11 12:26:48', '2023-04-10 22:23:28', NULL, 0, 3),
(16, 'Jade', 'Paddle', 'JadePaddle', 'avatar_3.png', '$2y$10$eNyqTgrsjGjDKaRHySxkuOSvXtnfVTw9W6w99fp8x0QH.D9busD9S', 'Jade@gmail.com', '2023-04-10 22:28:26', '2023-04-10 22:32:30', '2023-04-10 22:28:43', NULL, 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsers` (`idUsers`),
  ADD KEY `idPublications` (`idPublications`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPublications` (`idPublications`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsers` (`idUsers`),
  ADD KEY `idPublications` (`idPublications`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategories` (`idCategories`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategories` (`idCategories`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`idPublications`) REFERENCES `publications` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`idPublications`) REFERENCES `publications` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`idPublications`) REFERENCES `publications` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`idCategories`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `publications_ibfk_2` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idCategories`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
