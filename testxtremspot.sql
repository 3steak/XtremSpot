-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2023 at 11:51 AM
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
(1, 'WOW', NULL, '2023-03-07 12:25:50', NULL, 2, 3),
(2, 'OUI', NULL, '2023-03-07 12:25:50', NULL, 2, 4),
(3, 'dingue', NULL, '2023-03-07 12:26:37', NULL, 1, 3),
(4, 'EZ', NULL, '2023-03-07 15:19:30', NULL, 1, 4),
(5, 'damn', '2023-03-14 16:27:33', '2023-03-14 16:28:18', NULL, 3, 3),
(6, 'Incroyable ! ', '2023-03-07 12:21:58', '2023-03-29 21:47:23', NULL, 6, 8),
(7, 'Commentaire sur image name', '2023-03-29 20:09:53', '2023-03-29 22:09:27', NULL, 4, 6),
(8, 'oui', '2023-03-30 19:44:40', '2023-03-30 21:39:59', NULL, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int NOT NULL,
  `idPublications` int NOT NULL,
  `idUsers` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `idPublications`, `idUsers`) VALUES
(1, 4, 1),
(3, 3, 3),
(4, 3, 2),
(5, 4, 3),
(6, 4, 1);

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
(3, 'Superbe spot gngngn', 'Spot rocheux !', NULL, '2023-03-04 12:28:01', '1.3833300', '50.0660720', NULL, 'Le Tréport', NULL, 0, 4, 1, ''),
(4, 'Skatepark bien null ', 'une rape a fromage le truc ! ', NULL, '2023-03-04 12:28:01', '2.0810700', '50.0148960', NULL, 'Flixecourt', NULL, 0, 1, 2, ''),
(5, 'premiere publication poster en DB', 'FAIT CHIER', NULL, '2023-03-13 12:01:41', '-1.2495090', '44.4745110', '2023-03-15 22:01:14', 'Mont-de-Marsan', NULL, 3, 3, 3, 'img_640f029599138.3.png'),
(6, 'Test image name', 'Ceci est un test pour les beaux chiens', NULL, '2023-03-13 16:51:40', '-1.7555490', '48.1160300', '2023-03-19 10:18:10', 'Rennes', NULL, 6, 3, 3, 'img_640f468c890bc.3.png'),
(7, 'BMX Sunset', 'test BMX sunset', NULL, '2023-03-13 20:35:31', '1.3862530', '50.0657660', '2023-03-08 16:55:58', 'Le Tréport', NULL, 4, 3, 3, 'img_640f7b032e357.3.jpg'),
(8, 'Session bowl avé les copaings', 'test du bowl du prado !', NULL, '2023-03-20 12:32:41', '5.3744280', '43.2519000', '2023-03-20 11:37:23', 'Marseille', NULL, 2, 2, 4, 'img_64184459cc57b.4.jpg'),
(13, 'test', '', NULL, '2023-03-31 12:28:15', '1.9101930', '47.9036170', NULL, 'Orléans', NULL, 0, 5, 6, 'img_6426b5be97284.6.jpg');

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
(1, 'Jean', 'Bon', 'Jeanbonsiisouioui', 'avatar_0.png', 'oioioioioio', 'jean@gmail.com', '2023-03-04 12:26:09', NULL, NULL, NULL, 0, 1),
(2, 'Aqueuse', 'Cat', 'Acqueuse', 'avatar_0.png', 'IOIOIOIO', 'aqueuse@gmail.com', '2023-03-04 12:27:00', NULL, NULL, NULL, 0, 1),
(3, 'Sakai', 'Asinbit', 'Sakai', 'avatar_0.png', 'ouioui', 'sakaiasinbit@gmail.com', '2023-03-04 12:27:45', '2023-03-28 22:29:48', NULL, NULL, 1, 2),
(4, 'Armi', 'Niusnius', 'Arminius', 'avatar_4.png', '$2y$10$6CLksHXjL.wqP6d2reXTzecRsakvdxCiYxhbYnwaEb/07/sXdfpa.', 'Arminius30000@gmail.com', '2023-03-13 22:11:21', NULL, NULL, NULL, 0, 5),
(6, 'Florian', 'Billault', 'Flo', 'avatar_0.png', '$2y$10$7pBIDSr7iadJ9FKUB6A8tO8ceFjW0KaOR807iWcM7vGhl0.mPNINi', 'florianbillault@gmail.com', '2023-03-28 15:43:37', '2023-03-29 21:28:14', '2023-03-28 15:47:37', NULL, 1, 5);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`idPublications`) REFERENCES `publications` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`idUsers`) REFERENCES `users` (`id`);

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
