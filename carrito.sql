-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-06-2014 a las 15:04:13
-- Versión del servidor: 5.5.35
-- Versión de PHP: 5.3.10-1ubuntu3.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE IF NOT EXISTS `articulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `valor` double unsigned NOT NULL,
  `stock` int(10) unsigned NOT NULL,
  `estado` varchar(13) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Disponible',
  `fk_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria` (`fk_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `nombre`, `descripcion`, `imagen`, `valor`, `stock`, `estado`, `fk_categoria`) VALUES
(2, 'Camara', 'Camara de alta resolucion', 'camara.png', 100000, 5, 'No Disponible', 2),
(3, 'Pinguino Boards', 'Board Pinguino OpenSource OpenHardware para Robotica', 'pinguino.png', 64000, 7, 'Disponible', 1),
(4, 'Ezbot', 'Robot Controlado con Pinguino', 'ezbot.png', 50000, 2, 'Disponible', 1),
(5, 'Robot', 'Robot Futurista', 'robot.png', 60000, 5, 'Disponible', 1),
(6, 'Arduino uno', 'Arduino Uno Board Open Hardware', 'arduino.png', 55000, 5, 'Disponible', 1),
(7, 'Motor paso a paso', 'Motor Mercury Paso a Paso para Robotica', '547874_motor_pap.jpg', 25000, 5, 'Disponible', 1),
(8, 'Camara', 'Camara Alta Definicion', '766561_camara.png', 145000, 5, 'Disponible', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`) VALUES
(1, 'robotica'),
(2, 'tecnologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `celular` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento` (`documento`),
  KEY `fk_usuario` (`fk_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `documento`, `nombre`, `apellidos`, `direccion`, `barrio`, `ciudad`, `celular`, `telefono`, `email`, `fk_usuario`) VALUES
(1, 22334455, 'Jhon Jairo', 'Bravo Castro', 'Via al penal corpoica Casa # 3', '', 'Palmira', '3206178963', '', 'bramasterweb@gmail.com', 1),
(2, 11223344, 'Ever Segundo', 'Bravo Castro', 'Via al penal Corpoica', '', 'Palmira', '3126785432', '', 'ever@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE IF NOT EXISTS `detallefactura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_ventas` int(11) NOT NULL,
  `fk_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_articulo` (`fk_articulo`),
  KEY `fk_ventas` (`fk_ventas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=105 ;

--
-- Volcado de datos para la tabla `detallefactura`
--

INSERT INTO `detallefactura` (`id`, `fk_ventas`, `fk_articulo`, `cantidad`, `subtotal`) VALUES
(1, 1, 2, 1, 100000),
(2, 1, 3, 2, 128000),
(3, 6, 4, 1, 50000),
(4, 7, 4, 1, 50000),
(5, 7, 5, 1, 60000),
(6, 7, 6, 1, 55000),
(7, 8, 5, 2, 120000),
(8, 8, 2, 3, 300000),
(9, 9, 4, 2, 100000),
(10, 9, 2, 2, 200000),
(11, 19, 4, 2, 100000),
(12, 19, 2, 1, 100000),
(13, 21, 3, 1, 64000),
(14, 21, 5, 1, 60000),
(15, 21, 4, 2, 100000),
(16, 22, 5, 1, 60000),
(17, 22, 6, 1, 55000),
(18, 23, 5, 2, 120000),
(19, 23, 6, 1, 55000),
(20, 24, 3, 1, 64000),
(21, 24, 2, 1, 100000),
(22, 25, 5, 1, 60000),
(23, 26, 4, 1, 50000),
(24, 26, 6, 1, 55000),
(25, 27, 4, 1, 50000),
(26, 27, 6, 1, 55000),
(27, 28, 4, 1, 50000),
(28, 28, 3, 1, 64000),
(29, 29, 4, 1, 50000),
(30, 29, 3, 1, 64000),
(31, 30, 4, 1, 50000),
(32, 30, 3, 1, 64000),
(33, 31, 4, 2, 100000),
(34, 31, 6, 2, 110000),
(35, 31, 3, 1, 64000),
(36, 32, 5, 2, 120000),
(37, 33, 5, 2, 120000),
(38, 33, 6, 1, 55000),
(39, 34, 4, 2, 100000),
(40, 34, 6, 1, 55000),
(41, 35, 4, 1, 50000),
(42, 35, 5, 1, 60000),
(43, 36, 3, 1, 64000),
(44, 37, 3, 1, 64000),
(45, 38, 3, 2, 128000),
(46, 38, 5, 1, 60000),
(47, 38, 6, 2, 110000),
(48, 39, 3, 3, 192000),
(49, 39, 5, 1, 60000),
(50, 39, 6, 2, 110000),
(51, 40, 3, 3, 192000),
(52, 40, 5, 1, 60000),
(53, 40, 6, 2, 110000),
(54, 41, 3, 2, 128000),
(55, 41, 5, 3, 180000),
(56, 42, 3, 2, 128000),
(57, 43, 5, 2, 120000),
(58, 44, 4, 2, 100000),
(59, 45, 4, 2, 100000),
(60, 46, 3, 2, 128000),
(61, 47, 6, 2, 110000),
(62, 48, 2, 2, 200000),
(63, 49, 4, 1, 50000),
(64, 50, 6, 1, 55000),
(65, 51, 4, 3, 150000),
(66, 52, 6, 1, 55000),
(67, 53, 2, 2, 200000),
(68, 54, 4, 2, 100000),
(69, 55, 3, 2, 128000),
(70, 57, 4, 2, 100000),
(71, 57, 5, 3, 180000),
(72, 58, 4, 2, 100000),
(73, 59, 4, 2, 100000),
(74, 59, 6, 1, 55000),
(75, 60, 4, 2, 100000),
(76, 61, 7, 2, 50000),
(77, 61, 6, 2, 110000),
(78, 62, 7, 1, 25000),
(79, 63, 5, 3, 180000),
(80, 66, 5, 2, 120000),
(81, 67, 7, 3, 75000),
(82, 7, 3, 1, 64000),
(83, 68, 6, 1, 55000),
(84, 5, 7, 2, 50000),
(85, 69, 6, 1, 55000),
(86, 69, 7, 2, 50000),
(87, 70, 3, 2, 128000),
(88, 70, 5, 2, 120000),
(89, 71, 4, 2, 100000),
(90, 72, 4, 1, 50000),
(91, 73, 5, 2, 120000),
(92, 74, 3, 2, 128000),
(93, 74, 6, 1, 55000),
(94, 75, 6, 3, 165000),
(95, 76, 4, 2, 100000),
(96, 77, 4, 2, 100000),
(97, 77, 5, 3, 180000),
(98, 78, 7, 1, 25000),
(99, 78, 4, 2, 100000),
(100, 78, 5, 1, 60000),
(101, 79, 5, 1, 60000),
(102, 79, 4, 2, 100000),
(103, 79, 8, 1, 145000),
(104, 79, 7, 2, 50000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `total` double NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cliente` (`fk_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=80 ;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `fecha`, `total`, `fk_cliente`) VALUES
(1, '0000-00-00 00:00:00', 300000, 1),
(2, '0000-00-00 00:00:00', 64000, 2),
(3, '0000-00-00 00:00:00', 50000, 1),
(4, '0000-00-00 00:00:00', 50000, 1),
(5, '0000-00-00 00:00:00', 50000, 2),
(6, '0000-00-00 00:00:00', 50000, 2),
(7, '0000-00-00 00:00:00', 165000, 2),
(8, '0000-00-00 00:00:00', 420000, 2),
(9, '0000-00-00 00:00:00', 300000, 2),
(19, '0000-00-00 00:00:00', 200000, 2),
(20, '0000-00-00 00:00:00', 0, 2),
(21, '0000-00-00 00:00:00', 224000, 2),
(22, '2014-06-18 00:00:00', 115000, 2),
(23, '2014-06-18 00:53:14', 175000, 2),
(24, '2014-06-18 00:57:47', 164000, 2),
(25, '2014-06-18 01:06:02', 60000, 2),
(26, '2014-06-18 01:07:01', 105000, 2),
(27, '2014-06-18 01:14:33', 105000, 2),
(28, '2014-06-18 01:16:50', 114000, 2),
(29, '2014-06-18 01:29:29', 114000, 2),
(30, '2014-06-18 01:30:15', 114000, 2),
(31, '2014-06-18 01:36:36', 274000, 2),
(32, '2014-06-18 01:40:08', 120000, 2),
(33, '2014-06-18 20:11:50', 175000, 2),
(34, '2014-06-18 21:56:27', 155000, 2),
(35, '2014-06-18 22:55:21', 110000, 2),
(36, '2014-06-18 23:07:07', 64000, 2),
(37, '2014-06-18 23:23:27', 64000, 2),
(38, '2014-06-18 23:30:35', 298000, 2),
(39, '2014-06-18 23:31:20', 362000, 2),
(40, '2014-06-18 23:32:11', 362000, 2),
(41, '2014-06-18 23:33:47', 308000, 2),
(42, '2014-06-18 23:40:32', 128000, 2),
(43, '2014-06-18 23:42:57', 120000, 2),
(44, '2014-06-18 23:47:08', 100000, 2),
(45, '2014-06-18 23:49:52', 100000, 2),
(46, '2014-06-18 23:52:30', 128000, 2),
(47, '2014-06-18 23:54:13', 110000, 2),
(48, '2014-06-18 23:55:41', 200000, 2),
(49, '2014-06-18 23:56:48', 50000, 2),
(50, '2014-06-19 00:05:21', 55000, 2),
(51, '2014-06-19 00:10:15', 150000, 2),
(52, '2014-06-19 00:11:46', 55000, 2),
(53, '2014-06-19 00:16:11', 200000, 2),
(54, '2014-06-19 00:17:49', 100000, 2),
(55, '2014-06-19 00:21:22', 128000, 2),
(56, '2014-06-19 01:07:54', 0, 2),
(57, '2014-06-19 01:08:54', 280000, 2),
(58, '2014-06-19 01:18:38', 100000, 2),
(59, '2014-06-19 13:11:34', 155000, 2),
(60, '2014-06-19 13:22:57', 100000, 2),
(61, '2014-06-19 16:15:48', 160000, 2),
(62, '2014-06-19 16:17:54', 25000, 2),
(63, '2014-06-19 21:51:22', 180000, 2),
(64, '2014-06-19 22:00:10', 180000, 2),
(65, '2014-06-19 22:00:47', 180000, 2),
(66, '2014-06-19 22:02:46', 120000, 2),
(67, '2014-06-19 22:04:44', 139000, 2),
(68, '2014-06-19 22:07:45', 105000, 2),
(69, '2014-06-19 22:19:13', 105000, 2),
(70, '2014-06-19 23:46:26', 248000, 2),
(71, '2014-06-20 00:23:57', 100000, 2),
(72, '2014-06-20 00:27:12', 50000, 2),
(73, '2014-06-20 00:51:33', 120000, 2),
(74, '2014-06-20 01:21:35', 183000, 2),
(75, '2014-06-20 16:24:42', 165000, 2),
(76, '2014-06-20 19:54:04', 100000, 2),
(77, '2014-06-20 19:54:43', 280000, 2),
(78, '2014-06-20 21:59:37', 185000, 2),
(79, '2014-06-22 18:43:54', 355000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `passwd` varchar(55) COLLATE utf8_spanish_ci NOT NULL,
  `fk_rol` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `usuario` (`user`),
  KEY `fk_rol` (`fk_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `email`, `passwd`, `fk_rol`) VALUES
(1, 'jhon', 'bramasterweb@gmail.com', 'asdf', 1),
(2, 'ever', 'ever@gmail.com', 'asdf', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD CONSTRAINT `detallefactura_ibfk_1` FOREIGN KEY (`fk_ventas`) REFERENCES `factura` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallefactura_ibfk_2` FOREIGN KEY (`fk_articulo`) REFERENCES `articulo` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `clientes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_rol`) REFERENCES `rol` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
