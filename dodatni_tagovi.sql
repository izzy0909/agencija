-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2013 at 06:20 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

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
-- Table structure for table `dodatni_tagovi`
--

CREATE TABLE IF NOT EXISTS `dodatni_tagovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stan_id` int(11) NOT NULL,
  `kablovska` int(11) NOT NULL,
  `tv` int(11) NOT NULL,
  `klima` int(11) NOT NULL,
  `internet` int(11) NOT NULL,
  `telefon` int(11) NOT NULL,
  `frizider` int(11) NOT NULL,
  `sporet` int(11) NOT NULL,
  `ves_masina` int(11) NOT NULL,
  `kuhinjski_elementi` int(11) NOT NULL,
  `plakari` int(11) NOT NULL,
  `interfon` int(11) NOT NULL,
  `lift` int(11) NOT NULL,
  `bazen` int(11) NOT NULL,
  `garaza` int(11) NOT NULL,
  `parking` int(11) NOT NULL,
  `dvoriste` int(11) NOT NULL,
  `potkrovlje` int(11) NOT NULL,
  `terasa` int(11) NOT NULL,
  `novogradnja` int(11) NOT NULL,
  `renovirano` int(11) NOT NULL,
  `lux` int(11) NOT NULL,
  `penthaus` int(11) NOT NULL,
  `salonski` int(11) NOT NULL,
  `lodja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dodatni_tagovi`
--

INSERT INTO `dodatni_tagovi` (`id`, `stan_id`, `kablovska`, `tv`, `klima`, `internet`, `telefon`, `frizider`, `sporet`, `ves_masina`, `kuhinjski_elementi`, `plakari`, `interfon`, `lift`, `bazen`, `garaza`, `parking`, `dvoriste`, `potkrovlje`, `terasa`, `novogradnja`, `renovirano`, `lux`, `penthaus`, `salonski`, `lodja`) VALUES
(1, 9, 1, 1, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 1, 1, 0),
(3, 14, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
