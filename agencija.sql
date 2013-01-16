-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2013 at 11:42 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `agencija`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uloga` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `username`, `password`, `uloga`) VALUES
(1, 'admin', 'admin', '1'),
(2, 'izzy0909', '43barabe23izi', '0');

-- --------------------------------------------------------

--
-- Table structure for table `lokacija`
--

CREATE TABLE IF NOT EXISTS `lokacija` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `opstina` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `lokacija`
--

INSERT INTO `lokacija` (`id`, `opstina`) VALUES
(1, 'Čukarica'),
(2, 'Novi Beograd'),
(3, 'Palilula'),
(4, 'Rakovica'),
(5, 'Savski venac'),
(6, 'Stari grad'),
(7, 'Voždovac'),
(8, 'Vračar'),
(9, 'Zemun'),
(10, 'Zvezdara'),
(11, 'Barajevo'),
(12, 'Grocka'),
(13, 'Lazarevac'),
(14, 'Mladenovac'),
(15, 'Obrenovac'),
(16, 'Sopot'),
(17, 'Surčin');

-- --------------------------------------------------------

--
-- Table structure for table `stanovi`
--

CREATE TABLE IF NOT EXISTS `stanovi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `lokacija_id` int(255) NOT NULL,
  `ulica_i_broj` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sprat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `kvadratura` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `datum_dodavanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `stanovi`
--

INSERT INTO `stanovi` (`id`, `lokacija_id`, `ulica_i_broj`, `telefon`, `cena`, `sprat`, `kvadratura`, `opis`, `datum_dodavanja`) VALUES
(1, 1, 'Uzun Mirkova', '223717', '500', '1', '45', 'fgsgsdgsdg', '2013-01-03 23:30:59');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
