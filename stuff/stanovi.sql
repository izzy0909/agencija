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
  `sprat` enum('Suteren','Prizemlje','Visoko prizemlje','1. sprat','2. sprat','3. sprat','4. sprat','5. sprat','6. sprat','7. sprat','8. sprat','9. sprat','9. sprat','10. sprat','11. sprat','12. sprat','13. sprat','14. sprat','15. sprat','16. sprat','17. sprat','18. sprat','19. sprat','20. sprat i više') COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cena` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kvadratura` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `grejanje` enum('CG','EG','TA','PG','Klima uređaj') COLLATE utf8_unicode_ci NOT NULL,
  `namestenost` enum('Namešten','Nenamešten') COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `vidljiv` int(11) NOT NULL,
  `datum_dodavanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `stanovi`
--

INSERT INTO `stanovi` (`id`, `kategorija`, `tip`, `stan_tip`, `vlasnik`, `lokacija_id`, `ulica`, `br`, `sprat`, `telefon`, `email`, `cena`, `kvadratura`, `grejanje`, `namestenost`, `opis`, `status`, `vidljiv`, `datum_dodavanja`) VALUES
(3, 'izdavanje', 'Stan', 'Garsonjera', 'Izzy', 4, 'ASdasd', '', 'Suteren', '124124124', '', '434', '90', 'CG', 'Namešten', 'asdasd', '0', 0, '2013-01-06 19:46:08'),
(6, 'izdavanje', 'Stan', 'Garsonjera', 'asdasdasd', 5, 'fadsfafasf', '', 'Suteren', '213123123', '', '1323', '32', 'CG', 'Namešten', 'dfdvsdfgbsgsdg', '0', 0, '2013-01-08 20:32:28'),
(7, 'izdavanje', 'Stan', 'Garsonjera', 'asdasdasd', 6, 'fadsfafasf', '', 'Suteren', '13123123', '', '1323', '32', 'CG', 'Namešten', 'hbdfhdfhdfh', '0', 0, '2013-01-08 21:09:27'),
(9, 'izdavanje', 'Stan', 'Garsonjera', 'Pop Dražić', 1, 'Neka ulica', '43', 'Suteren', '123564789', 'pop@bog.com', '1000', '200', 'CG', 'Namešten', 'sfsdfsdfasdasdasdasd', '', 0, '2013-02-04 23:16:09'),
(14, 'izdavanje', 'Stan', 'Garsonjera', 'Marko Markovic', 1, 'Neka ulica', '55', 'Suteren', '123456', 'asd@sadasd.com', '200', '200', 'CG', 'Namešten', 'dfsdfsdf', '', 0, '2013-02-05 03:10:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
