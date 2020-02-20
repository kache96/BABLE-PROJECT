-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-02-2020 a las 06:52:20
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `babledb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `namec` varchar(70) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `code` varchar(15) NOT NULL,
  `email` varchar(70) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`client_id`, `namec`, `lastname`, `code`, `email`) VALUES
(30, 'Admin', 'Istrator', '7338118', 'adminIstrator73@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `signup_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `username`, `pass`, `signup_date`) VALUES
(12, 'administrator', 'bab8518a923c061567a34df0d583748a', '2020-02-20 01:11:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userquest`
--

CREATE TABLE IF NOT EXISTS `userquest` (
  `uquest_id` int(11) NOT NULL AUTO_INCREMENT,
  `squest1` varchar(7) NOT NULL,
  `sanswer1` varchar(100) NOT NULL,
  `squest2` varchar(7) NOT NULL,
  `sanswer2` varchar(100) NOT NULL,
  PRIMARY KEY (`uquest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `userquest`
--

INSERT INTO `userquest` (`uquest_id`, `squest1`, `sanswer1`, `squest2`, `sanswer2`) VALUES
(18, 'quest1', '42bd372d077bdb3c4ebadb7fc542f6', 'quest2', '442f17bf95f821c7c0ab918643b000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
