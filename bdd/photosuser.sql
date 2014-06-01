-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2014 at 12:21 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `micronott`
--

-- --------------------------------------------------------

--
-- Table structure for table `photosuser`
--

CREATE TABLE IF NOT EXISTS `photosuser` (
  `idphotosuser` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `caption` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idphotosuser`),
  KEY `user-photosUser` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `photosuser`
--

INSERT INTO `photosuser` (`idphotosuser`, `iduser`, `location`, `caption`) VALUES
(31, 17, 'photos/20140531_204411.jpg', 'foto del usuario');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
