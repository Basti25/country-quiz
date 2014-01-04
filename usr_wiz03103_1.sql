-- phpMyAdmin SQL Dump
-- version 2.11.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 04. Januar 2014 um 09:41
-- Server Version: 4.1.13
-- PHP-Version: 4.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `usr_wiz03103_1`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `highscore`
--

DROP TABLE IF EXISTS `highscore`;
CREATE TABLE IF NOT EXISTS `highscore` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `score` int(11) NOT NULL default '0',
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

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
  `id` int(11) NOT NULL auto_increment,
  `level` int(11) NOT NULL default '0',
  `question` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `answer` varchar(255) collate utf8_unicode_ci NOT NULL default '',
  `X` double NOT NULL default '0',
  `Y` double NOT NULL default '0',
  `is_live` tinyint(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `question`
--

INSERT INTO `question` (`id`, `level`, `question`, `answer`, `X`, `Y`, `is_live`) VALUES
(1, 1, 'Wo liegt Berlin?', 'Deutschland', 52.514549, 13.397369, 1),
(2, 1, 'Wo liegt London?', 'Großbritannien', 51.508742, -0.127258, 1),
(3, 1, 'Wo liegt Paris', 'Frankreich', 48.853873, 2.350616, 1),
(4, 1, 'Wo liegt Brüssel?', 'Belgien', 50.833698, 4.337768, NULL);
