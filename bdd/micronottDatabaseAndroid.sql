-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2014 at 12:25 AM
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
-- Table structure for table `followers`
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
-- Table structure for table `followersuser`
--

CREATE TABLE IF NOT EXISTS `followersuser` (
  `idfollowersuser` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfollowers` int(11) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  PRIMARY KEY (`idfollowersuser`),
  UNIQUE KEY `idfollowersuser_UNIQUE` (`idfollowersuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `followersuser`
--

INSERT INTO `followersuser` (`idfollowersuser`, `iduser`, `idfollowers`, `nickname`) VALUES
(4, 11, 6, 'rledesma'),
(6, 16, 16, 'jesy'),
(10, 11, 11, 'n4nd0'),
(56, 17, 17, 'mau'),
(57, 18, 18, 'kev'),
(59, 17, 11, 'n4nd0'),
(62, 17, 7, 'vgonzales'),
(63, 17, 16, 'jesy'),
(64, 0, 7, 'vgonzales');

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

-- --------------------------------------------------------

--
-- Table structure for table `post`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idpost`, `postContent`, `postingTime`, `postStatus`, `idUser`) VALUES
(1, 'Lorem ', '0000-00-00 00:00:00', 0, 6),
(2, 'Lorem 2', '0000-00-00 00:00:00', 0, 6),
(3, 'Esto es un texto ingresado desde la interfaz web!!! :)', '0000-00-00 00:00:00', 0, 6),
(103, 'segundo post :) ', '0000-00-00 00:00:00', 0, 6),
(104, 'prueba de niveles de seguridad', '0000-00-00 00:00:00', 0, 6),
(105, 'Este es un post desde jesy', '0000-00-00 00:00:00', 0, 16),
(106, 'la aplicación esta casi terminada jejejeje :) :)', '0000-00-00 00:00:00', 0, 11),
(107, 'este es  un post desde frledesma', '0000-00-00 00:00:00', 0, 6),
(111, 'post con tiempo desde jesy', '2014-05-31 23:03:49', 0, 16),
(112, 'djcjfkck', '2014-06-01 00:11:14', 0, 17),
(113, 'hola', '2014-06-01 00:16:42', 0, 17),
(114, 'este un post desde la app web', '2014-06-01 00:18:22', 0, 17),
(115, 'segundo post :) ', '2014-06-01 00:32:12', 0, 17),
(116, 'tercer texto', '2014-06-01 00:32:43', 0, 17),
(117, 'nuevo', '2014-06-01 01:05:54', 0, 17),
(118, 'ola la ase', '2014-06-01 04:45:05', 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `idprofile` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `userProfileDesc` varchar(200) DEFAULT NULL,
  `lastProfileChange` datetime NOT NULL,
  `profileImage` blob,
  PRIMARY KEY (`idprofile`),
  KEY `usr-profile` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`idprofile`, `iduser`, `userProfileDesc`, `lastProfileChange`, `profileImage`) VALUES
(1, 17, 'esto es una descripcion', '2014-05-16 00:00:00', NULL),
(2, 6, 'descrpcion de 6', '0000-00-00 00:00:00', NULL),
(4, 7, 'desc 7 ', '2014-05-16 00:00:00', NULL),
(5, 16, 'desc 16 ', '2014-05-01 00:00:00', NULL),
(6, 16, 'desc 16 ', '2014-05-02 00:00:00', NULL),
(8, 18, 'desc 18 ', '2014-05-01 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surename` varchar(45) DEFAULT NULL,
  `nickname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `name`, `surename`, `nickname`, `email`) VALUES
(6, 'Roberto', 'Ledesma', 'rledesma', 'rober@mail.com'),
(7, 'veronica', 'gonzales', 'vgonzales', 'vero@gmail.com'),
(11, 'fernando', 'Ledesma', 'n4nd0', 'nando10_-@hotmail.com'),
(16, 'Jessica', 'Ledesma', 'jesy', 'jledesma@mail.com'),
(17, 'victor', 'mauricio', 'mau', 'oiciruam73@hotmail.com'),
(18, 'kevin', 'segura', 'kev', 'kevsegura@hotmail.com');

--
-- Triggers `user`
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
-- Table structure for table `userscredentials`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `userscredentials`
--

INSERT INTO `userscredentials` (`idUsersCredentials`, `iduser`, `usrnickname`, `password`, `salt`, `creationdate`, `status`) VALUES
(6, 6, 'rledesma', '9fda2f5f2f943d51af03119d136a735a28858e46', '', '2014-05-06 10:18:08', 0),
(7, 7, 'vgonzales', 'e048357f526399a9a83aa0a0814bae97f5f49d28', '', '2014-05-10 22:09:36', 0),
(11, 11, 'n4nd0', '9fda2f5f2f943d51af03119d136a735a28858e46', '', '2014-05-11 21:08:27', 0),
(16, 16, 'jesy', '3ab19f66fe8408b23da86966ea4b69c538741a23', '', '2014-05-18 14:49:47', 0),
(17, 17, 'mau', 'b976752f34c19297d34e79f31c8d62f1c741cb91', '', '2014-05-31 17:05:47', 0),
(18, 18, 'kev', '130fb91555749545b1a873c811a4d55b58167840', '', '2014-05-31 17:06:02', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `user-following` FOREIGN KEY (`idfollower`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `usr-post` FOREIGN KEY (`idUser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `usr-profile` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
