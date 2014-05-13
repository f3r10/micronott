-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2014 a las 23:28:35
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `micronott`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `followersuser`
--

CREATE TABLE IF NOT EXISTS `followersuser` (
  `idfollowersuser` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfollowers` int(11) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  PRIMARY KEY (`idfollowersuser`),
  UNIQUE KEY `idfollowersuser_UNIQUE` (`idfollowersuser`),
  UNIQUE KEY `idfollowers` (`idfollowers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `followersuser`
--

INSERT INTO `followersuser` (`idfollowersuser`, `iduser`, `idfollowers`, `nickname`) VALUES
(1, 15, 6, 'n4nd0'),
(2, 15, 0, ' ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
