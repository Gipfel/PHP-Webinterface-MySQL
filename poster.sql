-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 05. Apr 2022 um 18:21
-- Server-Version: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- PHP-Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kunden`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `poster`
--

DROP TABLE IF EXISTS `poster`;
CREATE TABLE `poster` (
  `id` int(11) NOT NULL,
  `NAME` varchar(255) CHARACTER SET utf8mb4 DEFAULT '',
  `TELE` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `ADRESSE` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `TIER` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `TNAME` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT '',
  `GBDATUM` varchar(255) NOT NULL DEFAULT '',
  `INFOS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
