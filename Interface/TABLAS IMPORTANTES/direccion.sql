-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2015 a las 03:36:34
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pensionesmatricula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
  `idDireccion` int(11) NOT NULL AUTO_INCREMENT,
  `Dreccion` varchar(100) NOT NULL,
  `Distrito` varchar(45) NOT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Departamento` varchar(45) DEFAULT NULL,
  `Manzana` varchar(10) DEFAULT NULL,
  `Lote` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDireccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `Dreccion`, `Distrito`, `Numero`, `Departamento`, `Manzana`, `Lote`) VALUES
(1, '', '', 0, 'Arequipa', '', 0),
(2, 'Jr Marquez', 'Cayma', 12, 'Arequipa', '3', 5),
(3, '', '', 0, 'Arequipa', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
