-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2014 a las 19:27:07
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`idpost`, `postContent`, `postingTime`, `postStatus`, `idUser`) VALUES
(1, 'Lorem ', '0000-00-00 00:00:00', 0, 6),
(2, 'Lorem 2', '0000-00-00 00:00:00', 0, 6),
(3, 'Esto es un texto ingresado desde la interfaz web!!! :)', '0000-00-00 00:00:00', 0, 6),
(103, 'segundo post :) ', '0000-00-00 00:00:00', 0, 6),
(104, 'prueba de niveles de seguridad', '0000-00-00 00:00:00', 0, 6),
(105, 'hola', '0000-00-00 00:00:00', 0, 6),
(106, 'sdlkfjsd', '0000-00-00 00:00:00', 0, 6),
(107, 'sdfkjsdf', '0000-00-00 00:00:00', 0, 6),
(108, 'sdfsdf', '0000-00-00 00:00:00', 0, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `idprofile` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `userProfileDesc` varchar(200) DEFAULT NULL,
  `lastProfileChange` datetime NOT NULL,
  `profileImage` blob,
  PRIMARY KEY (`idprofile`),
  KEY `usr-profile` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

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
(15, 'Javier', 'Negrete', 'JNegrete', 'javiernn18@gmail.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

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
(15, 15, 'JNegrete', '9fda2f5f2f943d51af03119d136a735a28858e46', '', '2014-05-13 12:19:05', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `user-following` FOREIGN KEY (`idfollower`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
