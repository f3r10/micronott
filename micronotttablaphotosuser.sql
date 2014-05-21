-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2014 a las 01:02:31
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
-- Estructura de tabla para la tabla `followers`
--

CREATE TABLE IF NOT EXISTS `followers` (
  `idfollowers` int(11) NOT NULL AUTO_INCREMENT,
  `idfollower` int(11) NOT NULL,
  `idfollowing` int(11) NOT NULL,
  `dateFollow` datetime NOT NULL,
  `statusFollow` tinyint(1) NOT NULL,
  PRIMARY KEY (`idfollowers`),
  KEY `user-following` (`idfollower`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  UNIQUE KEY `idfollowersuser_UNIQUE` (`idfollowersuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Volcado de datos para la tabla `followersuser`
--

INSERT INTO `followersuser` (`idfollowersuser`, `iduser`, `idfollowers`, `nickname`) VALUES
(50, 15, 0, ' '),
(51, 16, 16, 'DRosero'),
(52, 16, 6, 'rledesma'),
(53, 16, 7, 'vgonzales'),
(54, 16, 15, 'JNegrete'),
(55, 16, 11, 'n4nd0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photosuser`
--

CREATE TABLE IF NOT EXISTS `photosuser` (
  `idphotosuser` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `caption` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idphotosuser`),
  KEY `user-photosUser` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `photosuser`
--

INSERT INTO `photosuser` (`idphotosuser`, `iduser`, `location`, `caption`) VALUES
(1, 16, 'photos/Penguins.jpg', 'prueba de caption'),
(2, 16, 'photos/Jellyfish.jpg', 'foto'),
(3, 16, 'photos/Koala.jpg', 'koala'),
(4, 16, 'photos/Lighthouse.jpg', 'faro'),
(5, 16, 'photos/Hydrangeas.jpg', 'hortensias'),
(6, 16, 'photos/Tulips.jpg', 'qwe'),
(7, 16, 'photos/Penguins.jpg', 'mbnb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `idpost` int(11) NOT NULL AUTO_INCREMENT,
  `postContent` varchar(160) NOT NULL,
  `postingTime` datetime NOT NULL,
  `postStatus` tinyint(1) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idpost`),
  UNIQUE KEY `idpost_UNIQUE` (`idpost`),
  KEY `usr-post_idx` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`idpost`, `postContent`, `postingTime`, `postStatus`, `idUser`) VALUES
(1, 'Lorem ', '0000-00-00 00:00:00', 0, 6),
(2, 'Lorem 2', '0000-00-00 00:00:00', 0, 6),
(3, 'Esto es un texto ingresado desde la interfaz web!!! :)', '0000-00-00 00:00:00', 0, 6),
(103, 'segundo post :) ', '0000-00-00 00:00:00', 0, 6),
(104, 'prueba de niveles de seguridad', '0000-00-00 00:00:00', 0, 6),
(105, 'esto es una prueba', '0000-00-00 00:00:00', 0, 15),
(106, 'hola', '0000-00-00 00:00:00', 0, 15),
(107, 'ksdfj', '0000-00-00 00:00:00', 0, 15),
(108, 'dfgdfg', '0000-00-00 00:00:00', 0, 15),
(109, 'kh', '0000-00-00 00:00:00', 0, 16),
(110, 'lkjcvxv', '0000-00-00 00:00:00', 0, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `idprofile` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `userProfileDesc` varchar(200) DEFAULT NULL,
  `lastProfileChange` datetime DEFAULT NULL,
  PRIMARY KEY (`idprofile`),
  KEY `usr-profile` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`idprofile`, `iduser`, `userProfileDesc`, `lastProfileChange`) VALUES
(1, 16, NULL, NULL),
(2, 16, 'sdkjfhdsjkfd', NULL),
(3, 16, 'sdkjfhdsjkfd', NULL),
(4, 16, 'jhbhbn', NULL),
(5, 16, NULL, NULL),
(6, 16, 'wasxcde', NULL),
(7, 16, NULL, NULL),
(8, 16, 'sdfsdfsd', NULL),
(9, 16, 'asdasd', NULL),
(10, 16, 'asdasd', NULL),
(11, 16, 'sdfsdfsdf', NULL),
(12, 16, 'asdasdasd', NULL),
(13, 16, 'asdasdasdsd', NULL),
(14, 16, 'prueba de perfil', NULL),
(15, 16, 'asd', NULL),
(16, 16, 'kjh', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surename` varchar(45) DEFAULT NULL,
  `nickname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `name`, `surename`, `nickname`, `email`) VALUES
(6, 'Roberto', 'Ledesma', 'rledesma', 'rober@mail.com'),
(7, 'veronica', 'gonzales', 'vgonzales', 'vero@gmail.com'),
(11, 'fernando', 'Ledesma', 'n4nd0', 'nando10_-@hotmail.com'),
(12, 'Mac', 'OS', 'air', 'apple@mail.com'),
(13, 'fernando', 'Lede', 'nando', 'ledesma.nando@yahoo.com'),
(14, 'Jessica', 'Ledesma', 'jesy', 'ledesma.jesy@email.com'),
(15, 'Javier', 'Negrete', 'JNegrete', 'jnegrete@mail.com'),
(16, 'Diego', 'Rosero', 'DRosero', 'diego@mail.com');

--
-- Disparadores `user`
--
DROP TRIGGER IF EXISTS `create_usr_trigger`;
DELIMITER //
CREATE TRIGGER `create_usr_trigger` AFTER INSERT ON `user`
 FOR EACH ROW begin
insert into userscredentials
(iduser,usrnickname,password,salt,creationdate,status)
values
(new.iduser,new.nickname,'','',NOW(),0);
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userscredentials`
--

CREATE TABLE IF NOT EXISTS `userscredentials` (
  `idUsersCredentials` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `usrnickname` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` varchar(200) NOT NULL,
  `creationdate` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUsersCredentials`),
  UNIQUE KEY `idUsersCredentials_UNIQUE` (`idUsersCredentials`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `userscredentials`
--

INSERT INTO `userscredentials` (`idUsersCredentials`, `iduser`, `usrnickname`, `password`, `salt`, `creationdate`, `status`) VALUES
(6, 6, 'rledesma', '9fda2f5f2f943d51af03119d136a735a28858e46', '', '2014-05-06 10:18:08', 0),
(7, 7, 'vgonzales', 'e048357f526399a9a83aa0a0814bae97f5f49d28', '', '2014-05-10 22:09:36', 0),
(11, 11, 'n4nd0', '9fda2f5f2f943d51af03119d136a735a28858e46', '', '2014-05-11 21:08:27', 0),
(12, 12, 'air', 'b892d271c473cc67be0a0f641893b5e6827677c3', '', '2014-05-11 21:19:05', 0),
(13, 13, 'nando', '9fda2f5f2f943d51af03119d136a735a28858e46', '', '2014-05-11 21:22:17', 0),
(14, 14, 'jesy', 'e4067216ee418b6505e97da8eefec05a7b4c7144', '', '2014-05-11 21:29:49', 0),
(15, 15, 'JNegrete', '9fda2f5f2f943d51af03119d136a735a28858e46', '', '2014-05-17 20:05:22', 0),
(16, 16, 'DRosero', '9fda2f5f2f943d51af03119d136a735a28858e46', '', '2014-05-19 18:01:55', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `user-following` FOREIGN KEY (`idfollower`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `photosuser`
--
ALTER TABLE `photosuser`
  ADD CONSTRAINT `user-photosUser` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `usr-post` FOREIGN KEY (`idUser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `usr-profile` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
