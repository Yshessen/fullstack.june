-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 21 jun 2022 om 11:17
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `animelisto`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `acounts`
--

DROP TABLE IF EXISTS `acounts`;
CREATE TABLE IF NOT EXISTS `acounts` (
  `idAcount` int(10) NOT NULL AUTO_INCREMENT,
  `AcountName` varchar(15) NOT NULL,
  `AcountPassword` varchar(20) NOT NULL,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`idAcount`),
  UNIQUE KEY `idAcount_UNIQUE` (`idAcount`),
  UNIQUE KEY `AcountName_UNIQUE` (`AcountName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `anime's`
--

DROP TABLE IF EXISTS `anime's`;
CREATE TABLE IF NOT EXISTS `anime's` (
  `idAnime's` int(5) NOT NULL AUTO_INCREMENT,
  `AnimeName` varchar(45) NOT NULL,
  `Describtion` varchar(5000) DEFAULT NULL,
  `afbeelding` varchar(45) DEFAULT NULL,
  `Seasons` int(11) NOT NULL,
  PRIMARY KEY (`idAnime's`),
  UNIQUE KEY `idAnime's_UNIQUE` (`idAnime's`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `favouriteanimes`
--

DROP TABLE IF EXISTS `favouriteanimes`;
CREATE TABLE IF NOT EXISTS `favouriteanimes` (
  `Acounts_idAcount` int(11) NOT NULL,
  `Anime's_idAnime's` int(11) NOT NULL,
  PRIMARY KEY (`Acounts_idAcount`,`Anime's_idAnime's`),
  KEY `fk_Acounts_has_Anime's_Anime's1_idx` (`Anime's_idAnime's`),
  KEY `fk_Acounts_has_Anime's_Acounts_idx` (`Acounts_idAcount`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `favouriteanimes`
--
ALTER TABLE `favouriteanimes`
  ADD CONSTRAINT `fk_Acounts_has_Anime's_Acounts` FOREIGN KEY (`Acounts_idAcount`) REFERENCES `acounts` (`idAcount`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Acounts_has_Anime's_Anime's1` FOREIGN KEY (`Anime's_idAnime's`) REFERENCES `anime's` (`idAnime's`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
