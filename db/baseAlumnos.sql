-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2016 a las 22:27:00
-- Versión del servidor: 5.5.15
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `abmalumno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `legajo` varchar(50) NOT NULL,
  `sexo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `legajo`, `sexo`) VALUES
(3, 'Pepon', '128', 'M'),
(11, 'HoracioDi', '123', 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cds`
--

CREATE TABLE IF NOT EXISTS `cds` (
`id` int(11) NOT NULL,
  `titel` varchar(50) NOT NULL,
  `interpret` varchar(50) NOT NULL,
  `jahr` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cds`
--

INSERT INTO `cds` (`id`, `titel`, `interpret`, `jahr`) VALUES
(2, 'tit2', 'Interprete2', '1991'),
(3, 'tit3', 'Interprete3', '1995');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `pathfoto` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `mail`, `password`, `tipo`, `pathfoto`) VALUES
(7, 'admin', 'admin@admin.com', 'admin', 'admin', 'imagenes/20160604222305.jpg'),
(8, 'user', 'user@user.com', 'user', 'user', 'imagenes/20160604222334.jpg'),
(9, 'user2', 'user2@user2.com', 'user2', 'user', 'imagenes/20160604222404.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cds`
--
ALTER TABLE `cds`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `cds`
--
ALTER TABLE `cds`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
