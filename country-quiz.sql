-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 03. Jan 2014 um 19:49
-- Server Version: 5.6.11
-- PHP-Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `country-quiz`
--
CREATE DATABASE IF NOT EXISTS `country-quiz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `country-quiz`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `highscore`
--

DROP TABLE IF EXISTS `highscore`;
CREATE TABLE IF NOT EXISTS `highscore` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `highscore`
--

INSERT INTO `highscore` (`id`, `user`, `score`, `time`) VALUES
(1, 'Walther', 10400, '2014-01-03 18:47:01'),
(2, 'Sebastian', 10400, '2014-01-03 18:47:58'),
(3, 'Diana', 10400, '2014-01-03 18:47:58'),
(4, 'Gamer007', 5000, '2014-01-03 18:48:53'),
(5, 'GangsterOfquiz', 4100, '2014-01-03 18:48:53'),
(6, 'SonnenGlanz80', 600, '2014-01-03 18:49:30'),
(7, 'JoachimNeukölln', 10, '2014-01-03 18:49:30');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `X` double NOT NULL,
  `Y` double NOT NULL,
  `is_live` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=9 ;

--
-- Daten für Tabelle `question`
--

INSERT INTO `question` (`id`, `level`, `question`, `answer`, `X`, `Y`, `is_live`) VALUES
(1, 1, 'Wo liegt Berlin?', 'Deutschland', 52.514549, 13.397369, 1),
(2, 1, 'Wo liegt London?', 'Großbritannien', 51.508742, -0.127258, 1),
(3, 1, 'Wo liegt Paris', 'Frankreich', 48.853873, 2.350616, 1),
(4, 1, 'Wo liegt Brüssel?', 'Belgien', 50.833698, 4.337768, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
