-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Jan 2022 um 18:08
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `check24_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `article`
--

CREATE TABLE `article` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(2048) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `author` varchar(1024) DEFAULT NULL,
  `image` varchar(4000) NOT NULL,
  `text` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `article`
--

INSERT INTO `article` (`id`, `title`, `date`, `author`, `image`, `text`) VALUES
(4, 'Osama', '2022-01-22 13:44:48', 'Osama Sado', 'article_2776.png', 'Test'),
(5, 'Osama Test', '2022-01-22 16:49:02', 'Osama Sado', 'article_235.jpg', 'Osama Osama Osama Osama Osama Osama Osama Osama Osama Osama Osama \r\nOsama Osama Osama Osama Osama Osama Osama Osama Osama Osama Osama \r\nOsama Osama Osama Osama Osama Osama Osama Osama Osama Osama Osama \r\nOsama Osama Osama Osama Osama Osama Osama Osama Osama Osama Osama '),
(6, 'Osama Sado', '2022-01-22 17:53:17', 'osama', 'article_3918.jpg', 'cycxcyxcyxcyxcxycxycyxcxycreadable English. Many desktop publishing'),
(7, 'Test', '2022-01-22 17:55:06', 'osama', 'article_3307.jpg', 'Osama OsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsamaOsama');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(2048) NOT NULL,
  `mail` varchar(2028) DEFAULT NULL,
  `url` varchar(3000) DEFAULT NULL,
  `text` text NOT NULL,
  `id_article` int(11) NOT NULL COMMENT 'foreign key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `comment`
--

INSERT INTO `comment` (`id`, `date`, `name`, `mail`, `url`, `text`, `id_article`) VALUES
(3, '2022-01-22 16:56:49', 'cordova', 'asasasas', 'asasa', 'asasasas', 5),
(4, '2022-01-22 17:32:00', 'OSama', 'Osama.sadow@gmail.com', 'www.osama.com', 'sdsdsdsdsdsdsd', 5),
(5, '2022-01-22 17:32:57', 'OSama', 'Osama.sadow@gmail.com', 'www.osama.com', 'sdsdsdsdsdsdsd', 5),
(8, '2022-01-22 17:38:57', 'Osama Sado', '', '', 'sdasdasdasdasdasdasdasdasdasdasdasd', 5);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
