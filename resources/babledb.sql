-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2020 a las 07:29:54
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `babledb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `branchn`
--

CREATE TABLE `branchn` (
  `branchN_id` int(2) NOT NULL,
  `getBranchN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `branchn`
--

INSERT INTO `branchn` (`branchN_id`, `getBranchN`) VALUES
(1, 'Arkadia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendarevent`
--

CREATE TABLE `calendarevent` (
  `event_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `langLvl` varchar(40) NOT NULL,
  `branch` varchar(30) NOT NULL,
  `bookType` varchar(20) NOT NULL,
  `bookSubtype` varchar(20) NOT NULL,
  `numberClass` int(2) DEFAULT NULL,
  `numberUnit` int(2) DEFAULT NULL,
  `start` varchar(35) NOT NULL,
  `bookTime` varchar(20) NOT NULL,
  `textColor` varchar(20) NOT NULL,
  `color` varchar(20) NOT NULL,
  `dateEvent` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calendarevent`
--

INSERT INTO `calendarevent` (`event_id`, `title`, `langLvl`, `branch`, `bookType`, `bookSubtype`, `numberClass`, `numberUnit`, `start`, `bookTime`, `textColor`, `color`, `dateEvent`) VALUES
(1, 'andreah934', 'English A1', 'Arkadia', 'Class', 'tutorship', 32, 12, 'jueves, 21 mayo, 2020 06:00', '06:00', '#FFFFFF', '#9b0000', '2020-04-01 02:07:34'),
(2, 'andreah934', 'English A1', 'Arkadia', 'Class', 'tutorship', 32, 11, 'martes, mayo 26, 2020 06:00', '06:00', '#FFFFFF', '#9b0000', '2020-04-01 02:08:41'),
(3, 'andreah934', 'English A1', 'Arkadia', 'Class', 'tutorship', 58, 14, 'miércoles, 11 marzo, 2020 06:00', '06:00', '#FFFFFF', '#9b0000', '2020-04-01 01:04:14'),
(4, 'andreah934', 'English A1', 'Arkadia', 'Class', 'tutorship', 14, 14, 'miércoles, 17 junio, 2020 10:30', '15:59', '#FFFFFF', '#9b0000', '2020-03-31 04:51:14'),
(34, 'andreah934', 'Alemán A1', 'Arkadia', 'Quiz', 'repetition', NULL, 14, 'viernes, 15 mayo, 2020 10:30', '10:30', '#FFFFFF', '#9b0000', '2020-04-03 03:46:51'),
(35, 'andreah934', 'English A2', 'Poblado', 'Class', 'tutorship', 5, 14, 'jueves, 21 mayo, 2020 09:00', '09:00', '#FFFFFF', '#9b0000', '2020-04-03 03:48:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `nameC` varchar(100) NOT NULL,
  `emailC` varchar(100) NOT NULL,
  `messageC` varchar(250) NOT NULL,
  `contactDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contact`
--

INSERT INTO `contact` (`contact_id`, `nameC`, `emailC`, `messageC`, `contactDate`) VALUES
(1, 'Andrea', 'kache920@gmail.com', 'ddtgrdgbtdre', '2020-04-05 23:12:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `namec` varchar(70) NOT NULL,
  `lastname` varchar(70) NOT NULL,
  `code` varchar(15) NOT NULL,
  `email` varchar(70) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `squest1` varchar(150) NOT NULL,
  `sanswer1` varchar(100) NOT NULL,
  `squest2` varchar(150) NOT NULL,
  `sanswer2` varchar(100) NOT NULL,
  `signup_date` datetime NOT NULL,
  `accountUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `namec`, `lastname`, `code`, `email`, `username`, `pass`, `squest1`, `sanswer1`, `squest2`, `sanswer2`, `signup_date`, `accountUpdated`) VALUES
(4, 'Andrea', 'Hernandez', '7338118', 'kache920@gmail.com', 'andreah934', '8ebad15376a9bdd79afd4b7c891d8606', '¿En que ciudad se conocieron tus padres?', '42bd372d077bdb3c4ebadb7fc542f647', '¿Cual seria tu trabajo ideal?', '442f17bf95f821c7c0ab918643b0000f', '2020-04-04 05:10:01', '2020-04-05 17:34:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usernotes`
--

CREATE TABLE `usernotes` (
  `notes_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `langlevel` varchar(40) NOT NULL,
  `typeExam` varchar(15) NOT NULL,
  `units` varchar(4) NOT NULL,
  `note` decimal(10,0) NOT NULL,
  `recordDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usernotes`
--

INSERT INTO `usernotes` (`notes_id`, `username`, `langlevel`, `typeExam`, `units`, `note`, `recordDate`) VALUES
(1, 'andreah934', 'English A2', 'Quiz', '12', '4', '2020-04-05 20:26:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `branchn`
--
ALTER TABLE `branchn`
  ADD PRIMARY KEY (`branchN_id`);

--
-- Indices de la tabla `calendarevent`
--
ALTER TABLE `calendarevent`
  ADD PRIMARY KEY (`event_id`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `usernotes`
--
ALTER TABLE `usernotes`
  ADD PRIMARY KEY (`notes_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendarevent`
--
ALTER TABLE `calendarevent`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usernotes`
--
ALTER TABLE `usernotes`
  MODIFY `notes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
