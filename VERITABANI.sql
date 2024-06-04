SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `telefonrehberiproje`;
CREATE DATABASE `telefonrehberiproje`;
USE `telefonrehberiproje`;

DROP TABLE IF EXISTS `telefonrehberi`;
CREATE TABLE `telefonrehberi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adisoyadi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `telefonu` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `address` text COLLATE utf8_turkish_ci DEFAULT NULL,
  `job_title` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `notes` text COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `telefonrehberi` (`id`, `adisoyadi`, `telefonu`, `email`, `address`, `job_title`, `company`, `profile_picture`, `notes`) VALUES
(1, 'Yusuf Atıs', '123123', 'yusuf@example.com', '123 Street, City', 'Müdür', 'Example Co.', 'path/to/profile1.jpg', 'Notlar...'),
(2, 'Yusuff', '1112', 'yusuff@example.com', '456 Avenue, City', 'Hademe', 'Example Co.', 'path/to/profile2.jpg', 'Notlar...');
