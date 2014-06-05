-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2014 at 02:57 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11
use micronott;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `followersuser`
--

INSERT INTO `followersuser` (`idfollowersuser`, `iduser`, `idfollowers`, `nickname`) VALUES
(68, 22, 22, 'nando'),
(69, 23, 23, 'drosero'),
(70, 23, 22, 'nando'),
(71, 22, 23, 'drosero'),
(72, 24, 24, 'diego'),
(73, 24, 22, 'nando');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `photosuser`
--

INSERT INTO `photosuser` (`idphotosuser`, `iduser`, `location`, `caption`) VALUES
(48, 22, 'photos/1017720_749012348456108_416909511_n.jpg', 'charla'),
(50, 23, 'photos/6b115042-fe6e-4dfe-9e82-a747cba2a6f2.png', 'para pensar'),
(51, 24, 'photos/unknown.png', 'foto del usuario');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`idpost`, `postContent`, `postingTime`, `postStatus`, `idUser`) VALUES
(121, 'este es un post desde la configuracion', '2014-06-03 03:09:58', 1, 22),
(122, 'este es un post desde todos los usuarios', '2014-06-03 03:10:32', 1, 22),
(123, 'envio un post desde diego', '2014-06-03 05:01:20', 1, 23),
(124, 'post sin retweet', '2014-06-04 00:40:16', 1, 22),
(125, 'lo imposible se hizo posible :)', '2014-06-04 02:51:26', 1, 23);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`idprofile`, `iduser`, `userProfileDesc`, `lastProfileChange`, `profileImage`) VALUES
(15, 22, 'Erase una vez ....', '0000-00-00 00:00:00', NULL),
(17, 23, 'Probando esta magnifica app', '0000-00-00 00:00:00', NULL),
(18, 24, 'pon tu descripcion', '2014-06-04 00:28:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `retweet`
--

CREATE TABLE IF NOT EXISTS `retweet` (
  `idretweet` int(11) NOT NULL AUTO_INCREMENT,
  `idpost` int(11) NOT NULL,
  `idOwner` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idretweet`),
  KEY `post-retweet` (`idpost`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `retweet`
--

INSERT INTO `retweet` (`idretweet`, `idpost`, `idOwner`, `idUser`) VALUES
(26, 123, 23, 22),
(27, 122, 22, 23),
(28, 121, 22, 23),
(29, 122, 22, 24),
(30, 121, 22, 24),
(31, 125, 23, 22),
(32, 124, 22, 23);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `name`, `surename`, `nickname`, `email`) VALUES
(22, 'Fernando', 'Ledesma', 'nando', 'ledesma.nando@yahoo.com'),
(23, 'Diego', 'Rosero', 'drosero', 'diego@asdf.com'),
(24, 'Diego', 'De la cruz', 'diego', 'diego@gmail.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `userscredentials`
--

INSERT INTO `userscredentials` (`idUsersCredentials`, `iduser`, `usrnickname`, `password`, `salt`, `creationdate`, `status`) VALUES
(22, 22, 'nando', '9fda2f5f2f943d51af03119d136a735a28858e46', '', '2014-06-02 19:14:25', 0),
(23, 23, 'drosero', '31d5aabbddcc7652506481acfeae7ef0e7d56eaf', '', '2014-06-02 21:59:31', 0),
(24, 24, 'diego', '9fda2f5f2f943d51af03119d136a735a28858e46', '', '2014-06-03 17:28:47', 0);

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
