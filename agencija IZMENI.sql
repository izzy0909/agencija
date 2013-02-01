-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2013 at 04:08 PM
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
(8, 'Vračar'),
(9, 'Zemun'),
(10, 'Zvezdara'),
(11, 'Barajevo'),
(12, 'Grocka'),
(13, 'Lazarevac'),
(14, 'Mladenovac'),
(15, 'Obrenovac'),
(16, 'Sopot'),
(17, 'Surčin');

-- --------------------------------------------------------

--
-- Table structure for table `podsetnik`
--

CREATE TABLE IF NOT EXISTS `podsetnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `korisnik_id` int(11) NOT NULL,
  `poruka` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `zavrsen` int(11) NOT NULL DEFAULT '0',
  `datum_dodavanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `datum_podsecanja` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `podsetnik`
--

INSERT INTO `podsetnik` (`id`, `korisnik_id`, `poruka`, `zavrsen`, `datum_dodavanja`, `datum_podsecanja`) VALUES
(2, 2, '0', 0, '0000-00-00 00:00:00', NULL),
(3, 2, 'dasdasd', 0, '0000-00-00 00:00:00', NULL),
(4, 2, 'sadasdasd', 0, '0000-00-00 00:00:00', NULL),
(7, 1, 'dasdasdasdsad', 0, '2013-01-08 20:39:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ponude`
--

CREATE TABLE IF NOT EXISTS `ponude` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kategorija` enum('izdavanje','prodaja') COLLATE utf8_unicode_ci NOT NULL,
  `tip` enum('Stan','Kuća','Poslovni prostor','Magacin','Lokal') COLLATE utf8_unicode_ci NOT NULL,
  `stan_tip` enum('Garsonjera','Jednosoban','Jednoiposoban','Dvosoban','Dvoiposoban','Trosoban','Troiposoban','Četvorosoban','Četvoroiposoban','Petosoban i više') COLLATE utf8_unicode_ci NOT NULL,
  `vlasnik` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lokacija_id` int(225) NOT NULL,
  `ulica` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `br` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sprat` enum('Suteren','Prizemlje','Visoko prozemlje','1. sprat','2. sprat','3. sprat','4. sprat','5. sprat','6. sprat','7. sprat','8. sprat','9. sprat','9. sprat','10. sprat','11. sprat','12. sprat','13. sprat','14. sprat','15. sprat','16. sprat','17. sprat','18. sprat','19. sprat','20. sprat i više') COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kvadratura` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `grejanje` enum('CG','EG','TA','PG','Klima uređaj') COLLATE utf8_unicode_ci NOT NULL,
  `namestenost` enum('Namešten','Nenamešten') COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `datum_dodavanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t_kablovska` int(11) NOT NULL DEFAULT '0',
  `t_tv` int(11) NOT NULL DEFAULT '0',
  `t_klima` int(11) NOT NULL DEFAULT '0',
  `t_internet` int(11) NOT NULL DEFAULT '0',
  `t_telefon` int(11) NOT NULL DEFAULT '0',
  `t_frizider` int(11) NOT NULL DEFAULT '0',
  `t_sporet` int(11) NOT NULL DEFAULT '0',
  `t_vesmasina` int(11) NOT NULL DEFAULT '0',
  `t_kuhinjskielementi` int(11) NOT NULL DEFAULT '0',
  `t_plakari` int(11) NOT NULL DEFAULT '0',
  `t_interfon` int(11) NOT NULL DEFAULT '0',
  `t_lift` int(11) NOT NULL DEFAULT '0',
  `t_bazen` int(11) NOT NULL DEFAULT '0',
  `t_garaza` int(11) NOT NULL DEFAULT '0',
  `t_parking` int(11) NOT NULL DEFAULT '0',
  `t_dvoriste` int(11) NOT NULL DEFAULT '0',
  `t_potkrovlje` int(11) NOT NULL DEFAULT '0',
  `t_terasa` int(11) NOT NULL DEFAULT '0',
  `t_novogradnja` int(11) NOT NULL DEFAULT '0',
  `t_renovirano` int(11) NOT NULL DEFAULT '0',
  `t_lux` int(11) NOT NULL DEFAULT '0',
  `t_penthaus` int(11) NOT NULL DEFAULT '0',
  `t_salonski` int(11) NOT NULL DEFAULT '0',
  `t_lodja` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ponude`
--

INSERT INTO `ponude` (`id`, `kategorija`, `tip`, `stan_tip`, `vlasnik`, `lokacija_id`, `ulica`, `br`, `sprat`, `telefon`, `email`, `cena`, `kvadratura`, `grejanje`, `namestenost`, `opis`, `datum_dodavanja`, `t_kablovska`, `t_tv`, `t_klima`, `t_internet`, `t_telefon`, `t_frizider`, `t_sporet`, `t_vesmasina`, `t_kuhinjskielementi`, `t_plakari`, `t_interfon`, `t_lift`, `t_bazen`, `t_garaza`, `t_parking`, `t_dvoriste`, `t_potkrovlje`, `t_terasa`, `t_novogradnja`, `t_renovirano`, `t_lux`, `t_penthaus`, `t_salonski`, `t_lodja`) VALUES
(1, 'izdavanje', 'Stan', 'Garsonjera', 'Đoka Balašević', 4, 'Nelomite Mibagrenje BB', '', 'Suteren', '213123123', '', '1337', '150', 'CG', 'Namešten', 'Garnisera', '2013-01-25 18:17:00', 0, 1, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 0),
(4, 'izdavanje', 'Stan', 'Garsonjera', 'Marko Markovic', 7, 'Neznanog Junaka BB', '', 'Suteren', '456321', '', '200', '200', 'CG', 'Namešten', 'asdasdasd', '2013-01-26 22:54:03', 0, 0, 1, 0, 1, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 1, 0, 0, 1, 0, 0, 1, 1, 0),
(5, 'izdavanje', 'Stan', 'Garsonjera', 'Marko Markovic', 1, 'Neka ulica', '55', 'Suteren', '123456', '', '200', '200', 'CG', 'Namešten', 'dfsdfsdf', '2013-01-31 01:26:34', 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 0, 0, 1, 1, 0, 0, 0),
(8, 'izdavanje', '', '', 'Igor Martinović', 1, 'Neka ulica', '43', 'Suteren', '456321', 'igor@nekretnina.com', '200', '200', 'CG', 'Namešten', 'jhhhhhh', '2013-01-31 02:22:41', 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 1, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slike`
--

CREATE TABLE IF NOT EXISTS `slike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `stan_id` int(11) NOT NULL,
  `putanja` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `glavna` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  `vrsta` enum('mala','velika') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stanovi`
--

CREATE TABLE IF NOT EXISTS `stanovi` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kategorija` enum('izdavanje','prodaja') COLLATE utf8_unicode_ci NOT NULL,
  `tip` enum('Stan','Kuća','Poslovni prostor','Magacin','Lokal') COLLATE utf8_unicode_ci NOT NULL,
  `stan_tip` enum('Garsonjera','Jednosoban','Jednoiposoban','Dvosoban','Dvoiposoban','Trosoban','Troiposoban','Četvorosoban','Četvoroiposoban','Petosoban i više') COLLATE utf8_unicode_ci NOT NULL,
  `vlasnik` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lokacija_id` int(255) NOT NULL,
  `ulica` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `br` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sprat` enum('Suteren','Prizemlje','Visoko prozemlje','1. sprat','2. sprat','3. sprat','4. sprat','5. sprat','6. sprat','7. sprat','8. sprat','9. sprat','9. sprat','10. sprat','11. sprat','12. sprat','13. sprat','14. sprat','15. sprat','16. sprat','17. sprat','18. sprat','19. sprat','20. sprat i više') COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kvadratura` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `grejanje` enum('CG','EG','TA','PG','Klima uređaj') COLLATE utf8_unicode_ci NOT NULL,
  `namestenost` enum('Namešten','Nenamešten') COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `broj_soba` int(11) NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vidljiv` int(11) NOT NULL,
  `datum_dodavanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `stanovi`
--

INSERT INTO `stanovi` (`id`, `kategorija`, `tip`, `stan_tip`, `vlasnik`, `lokacija_id`, `ulica`, `br`, `sprat`, `telefon`, `email`, `cena`, `kvadratura`, `grejanje`, `namestenost`, `opis`, `broj_soba`, `status`, `vidljiv`, `datum_dodavanja`) VALUES
(3, 'izdavanje', 'Stan', 'Garsonjera', 'Izzy', 4, 'ASdasd', '', 'Suteren', '124124124', '', '434', '90', 'CG', 'Namešten', 'asdasd', 0, '0', 0, '2013-01-06 19:46:08'),
(6, 'izdavanje', 'Stan', 'Garsonjera', 'asdasdasd', 5, 'fadsfafasf', '', 'Suteren', '213123123', '', '1323', '32', 'CG', 'Namešten', 'dfdvsdfgbsgsdg', 0, '0', 0, '2013-01-08 20:32:28'),
(7, 'izdavanje', 'Stan', 'Garsonjera', 'asdasdasd', 6, 'fadsfafasf', '', 'Suteren', '13123123', '', '1323', '32', 'CG', 'Namešten', 'hbdfhdfhdfh', 0, '0', 0, '2013-01-08 21:09:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
