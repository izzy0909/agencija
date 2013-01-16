-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2013 at 06:32 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Database: `agencija`
--

-- --------------------------------------------------------

--
-- Table structure for table `dodatni_tagovi`
--

CREATE TABLE IF NOT EXISTS `dodatni_tagovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stan_id` int(11) NOT NULL,
  `grejanje` int(11) NOT NULL,
  `kablovska` int(11) NOT NULL,
  `tv` int(11) NOT NULL,
  `klima` int(11) NOT NULL,
  `internet` int(11) NOT NULL,
  `telefon` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `imenik`
--

CREATE TABLE IF NOT EXISTS `imenik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agencija` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `broj` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `broj` (`broj`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `imenik`
--

INSERT INTO `imenik` (`id`, `agencija`, `broj`) VALUES
(1, 'asdasd', '123123'),
(8, 'asd', '123');

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
-- Table structure for table `podsetnik`
--

CREATE TABLE IF NOT EXISTS `podsetnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `korisnik_id` int(11) NOT NULL,
  `poruka` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `zavrsen` int(11) NOT NULL DEFAULT '0',
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `podsetnik`
--

INSERT INTO `podsetnik` (`id`, `korisnik_id`, `poruka`, `zavrsen`, `datum`) VALUES
(2, 2, '0', 0, '0000-00-00 00:00:00'),
(3, 2, 'dasdasd', 0, '0000-00-00 00:00:00'),
(4, 2, 'sadasdasd', 0, '0000-00-00 00:00:00'),
(7, 1, 'dasdasdasdsad', 0, '2013-01-08 20:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `stanovi`
--

CREATE TABLE IF NOT EXISTS `stanovi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `vlasnik` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lokacija_id` int(255) NOT NULL,
  `ulica_i_broj` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sprat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `kvadratura` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `broj_soba` int(11) NOT NULL,
  `kategorija` enum('izdavanje','prodaja') COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vidljiv` int(11) NOT NULL,
  `datum_dodavanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stanovi`
--

INSERT INTO `stanovi` (`id`, `vlasnik`, `lokacija_id`, `ulica_i_broj`, `telefon`, `cena`, `sprat`, `kvadratura`, `opis`, `broj_soba`, `kategorija`, `status`, `vidljiv`, `datum_dodavanja`) VALUES
(3, 'Izzy', 4, 'ASdasd', '124124124', '434', '65', '90', 'asdasd', 0, '', '0', 0, '2013-01-06 19:46:08'),
(6, 'asdasdasd', 5, 'fadsfafasf', '213123123', '1323', '12', '32', 'dfdvsdfgbsgsdg', 0, '', '0', 0, '2013-01-08 20:32:28'),
(7, 'asdasdasd', 6, 'fadsfafasf', '13123123', '1323', '12', '32', 'hbdfhdfhdfh', 0, '', '0', 0, '2013-01-08 21:09:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
