-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 14 juin 2019 à 04:23
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `book_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_from` date NOT NULL,
  `book_to` date NOT NULL,
  `adult_number` int(11) NOT NULL,
  `child_number` int(11) NOT NULL,
  `book_room` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_status` tinyint(4) NOT NULL DEFAULT '0',
  `booking_date` date NOT NULL,
  `booking_price` int(11) NOT NULL,
  `book_service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_price` int(11) NOT NULL,
  `booking_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `book_name`, `book_lname`, `book_email`, `book_contact`, `book_from`, `book_to`, `adult_number`, `child_number`, `book_room`, `book_status`, `booking_date`, `booking_price`, `book_service`, `service_price`, `booking_total`, `created_at`, `updated_at`) VALUES
(6, 'Nick', 'Koffi', 'nick@gmail.com', '89229768', '2019-06-12', '2019-06-14', 1, 0, 'Negresco room', 0, '2019-06-12', 100000, 'parking,sport', 5000, 105000, '2019-06-12 16:45:10', '2019-06-12 16:45:10');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_image`, `category_desc`, `created_at`, `updated_at`) VALUES
(2, 'Chambre Standard', 'images/Chambre Standard_photo.jpg', 'Commodite standard', '2019-05-28 10:50:38', '2019-05-28 10:50:38'),
(3, 'Chambre Moderne', 'images/Chambre Moderne_photo.jpg', 'Commodité moderne', '2019-05-31 10:27:26', '2019-05-31 10:27:26');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `event_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `event_title`, `event_date`, `event_desc`, `event_image`, `event_category`, `event_type`, `created_at`, `updated_at`) VALUES
(3, 'Intelligence artificielle', '2019-06-15', 'A la decouverte de l\'intelligence artificielle, tous savoir sur l\'AI', 'images/Intelligence artificielle_photo.jpg', 'technologie', 'conference', '2019-06-13 11:22:55', '2019-06-13 11:22:55');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_21_224031_create_categories_table', 1),
(4, '2019_05_22_132050_create_rooms_table', 1),
(5, '2019_05_22_221452_create_books_table', 1),
(7, '2019_05_31_141541_create_events_table', 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_price` int(11) NOT NULL,
  `room_size` int(11) NOT NULL,
  `room_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_status` tinyint(4) NOT NULL DEFAULT '0',
  `room_number` int(11) NOT NULL,
  `total_room` int(11) NOT NULL,
  `disponibility_room` tinyint(4) NOT NULL DEFAULT '0',
  `room_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rooms`
--

INSERT INTO `rooms` (`id`, `room_code`, `room_name`, `room_price`, `room_size`, `room_category`, `room_photo`, `room_image`, `room_status`, `room_number`, `total_room`, `disponibility_room`, `room_description`, `created_at`, `updated_at`) VALUES
(1, 'A2', 'Negresco room', 50000, 50, '2', 'images/A2_photo2.jpg', 'images/A2_photo.jpg', 0, 3, 7, 0, 'wifi gratuit,TV LCD/plasma, climatisation\r\nDouche,Baignoire', '2019-05-28 12:01:09', '2019-05-28 12:01:09'),
(2, 'A3', 'Ritz', 60000, 55, '2', 'images/A3_photo2.jpg', 'images/A3_photo.jpg', 0, 10, 10, 0, '', '2019-05-28 12:31:17', '2019-05-28 12:31:17'),
(3, 'A5', 'Royal Room', 150000, 100, '3', 'images/A5_photo2.jpg', 'images/A5_photo.jpg', 0, 3, 5, 0, 'WIFI,climatisation,Mini-bar,TV LCD/plasma\r\nCoffre fort,toilette', '2019-05-31 11:22:04', '2019-05-31 11:22:04');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(2, 'nick dev', 'nickdev@gmail.com', NULL, '$2y$10$3.wWLDzfSg5EPus331VZwe1Ohj4CDQywlXihMAj.Kwh1Ee2FLMN.S', NULL, 'admin', '2019-05-28 10:19:15', '2019-05-28 10:19:15'),
(3, 'azerty', 'hello@gmail.com', NULL, '$2y$10$hNaX01Sh1L/3KtDAbuLPjeVamKr8VwUYqp3hInNf81ExsMsIFBRNC', NULL, 'gerant(e)', '2019-06-02 10:24:53', '2019-06-02 10:24:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
