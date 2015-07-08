-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2015 a las 03:54:22
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `pensionesmatriculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoderados`
--

CREATE TABLE IF NOT EXISTS `apoderados` (
  `idApoderado` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `ApellidoPaterno` varchar(45) NOT NULL,
  `ApellidoMaterno` varchar(45) NOT NULL,
  `idDireccion` varchar(45) NOT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Celular` int(11) NOT NULL,
  PRIMARY KEY (`idApoderado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE IF NOT EXISTS `bancos` (
  `idBancos` int(11) NOT NULL,
  `NombredeBanco` varchar(45) NOT NULL,
  `NumeroCuenta` varchar(45) NOT NULL,
  PRIMARY KEY (`idBancos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`idBancos`, `NombredeBanco`, `NumeroCuenta`) VALUES
(111111, 'KECAGYM', '4213550004410147'),
(222222, 'B.N.C.U', '4213550008810168'),
(333333, 'BCPP', '4213550006864521'),
(444444, 'INTERBANKARIO', '4213550006663210');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE IF NOT EXISTS `carrera` (
  `idCarrera` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Duracion` int(45) NOT NULL,
  PRIMARY KEY (`idCarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`idCarrera`, `Nombre`, `Duracion`) VALUES
(200010, 'Electronica', 3),
(200011, 'Mecanica', 3),
(200012, 'Electricidad', 3),
(200013, 'Diseño Grafico', 3),
(200014, 'Redes e Internet', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centrotrabajo`
--

CREATE TABLE IF NOT EXISTS `centrotrabajo` (
  `idCentroTrabajo` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Cargo` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  PRIMARY KEY (`idCentroTrabajo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
  `idDireccion` int(11) NOT NULL,
  `TipoDeLugar` int(11) NOT NULL,
  `NombredelLugar_tipo` varchar(45) NOT NULL,
  `StatusDelLugar` int(11) NOT NULL,
  `NombredelLugar_status` varchar(45) NOT NULL,
  `Numero` int(11) DEFAULT NULL,
  `Departamento` int(11) DEFAULT NULL,
  `Manzana` tinyint(4) DEFAULT NULL,
  `Lote` mediumint(9) DEFAULT NULL,
  `Distrito` varchar(45) NOT NULL,
  PRIMARY KEY (`idDireccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `idEstudiantes` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
  `CentroTrabajo_idCentroTrabajo` int(11) NOT NULL,
  `LugarNacimiento_idLugarNacimiento` int(11) NOT NULL,
  `Apoderados_idApoderado` int(11) NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `ApellidoPaterno` varchar(45) NOT NULL,
  `Apellido Materno` varchar(45) NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Celular` varchar(45) NOT NULL,
  `Grupo_Sang` varchar(45) NOT NULL,
  `EstadoCivil` varchar(45) DEFAULT NULL,
  `Foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstudiantes`),
  KEY `fk_Estudiantes_Direccion1_idx` (`Direccion_idDireccion`),
  KEY `fk_Estudiantes_CentroTrabajo1_idx` (`CentroTrabajo_idCentroTrabajo`),
  KEY `fk_Estudiantes_LugarNacimiento1_idx` (`LugarNacimiento_idLugarNacimiento`),
  KEY `fk_Estudiantes_Apoderados1_idx` (`Apoderados_idApoderado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugarnacimiento`
--

CREATE TABLE IF NOT EXISTS `lugarnacimiento` (
  `idLugarNacimiento` int(11) NOT NULL,
  `Departamento` varchar(45) DEFAULT NULL,
  `Provincia` varchar(45) DEFAULT NULL,
  `Distrito` varchar(45) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`idLugarNacimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE IF NOT EXISTS `matriculas` (
  `idMatriculas` int(11) NOT NULL,
  `Estudiantes_idEstudiantes` int(11) NOT NULL,
  `Sede_idSede` int(11) NOT NULL,
  `Carrera_idCarrera` int(11) NOT NULL,
  `Turno_idTurno` int(11) NOT NULL,
  `Pagos_idPagos` int(11) NOT NULL,
  `Bancos_idBancos` int(11) NOT NULL,
  `FechaMatricula` date NOT NULL,
  PRIMARY KEY (`idMatriculas`),
  KEY `fk_Pago_Pagos1_idx` (`Pagos_idPagos`),
  KEY `fk_ConstanciaPago_Bancos1_idx` (`Bancos_idBancos`),
  KEY `fk_ConstanciaPago_Carrera1_idx` (`Carrera_idCarrera`),
  KEY `fk_Matriculas_Turno1_idx` (`Turno_idTurno`),
  KEY `fk_Matriculas_Sede1_idx` (`Sede_idSede`),
  KEY `fk_Recibo_Estudiantes1_idx` (`Estudiantes_idEstudiantes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `idPagos` int(11) NOT NULL AUTO_INCREMENT,
  `idRegistroSolicitudes` int(11) DEFAULT NULL,
  `TipoDePago` varchar(45) NOT NULL,
  `Monto` int(11) NOT NULL,
  PRIMARY KEY (`idPagos`),
  KEY `fk_Pagos_RegistroSolicitudesDescuentos1_idx` (`idRegistroSolicitudes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensiones`
--

CREATE TABLE IF NOT EXISTS `pensiones` (
  `idPensiones` int(11) NOT NULL,
  `Matriculas_idMatriculas` int(11) NOT NULL,
  `Bancos_idBancos` int(11) NOT NULL,
  `Pagos_idPagos` int(11) NOT NULL,
  `Mes` varchar(45) NOT NULL,
  PRIMARY KEY (`idPensiones`),
  KEY `fk_Pensiones_Matriculas1_idx` (`Matriculas_idMatriculas`),
  KEY `fk_Pensiones_Bancos1_idx` (`Bancos_idBancos`),
  KEY `fk_Pensiones_Pagos1_idx` (`Pagos_idPagos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `idPersonal` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `ApellidoPaterno` varchar(45) NOT NULL,
  `ApellidoMaterno` varchar(45) NOT NULL,
  `Cargo` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Celular` varchar(45) NOT NULL,
  PRIMARY KEY (`idPersonal`),
  KEY `fk_Personal_Direccion1_idx` (`Direccion_idDireccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrosolicitudesdescuentos`
--

CREATE TABLE IF NOT EXISTS `registrosolicitudesdescuentos` (
  `idRegistroSolicitudes` int(11) NOT NULL,
  `Personal_idPersonal` int(11) NOT NULL,
  `Estudiantes_idEstudiantes` int(11) NOT NULL,
  `TiposSolicitud_idTiposSolicitud` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  PRIMARY KEY (`idRegistroSolicitudes`),
  KEY `fk_Solicitud_Personal1_idx` (`Personal_idPersonal`),
  KEY `fk_Solicitud_Estudiantes1_idx` (`Estudiantes_idEstudiantes`),
  KEY `fk_Solicitud_TiposSolicitud1_idx` (`TiposSolicitud_idTiposSolicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE IF NOT EXISTS `sede` (
  `idSede` int(11) NOT NULL,
  `Departamento` varchar(45) NOT NULL,
  `Ciudad` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  PRIMARY KEY (`idSede`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`idSede`, `Departamento`, `Ciudad`, `Direccion`, `Telefono`) VALUES
(12301, 'Arequipa', 'Arequipa', 'Av. Parra 205 ', '616233'),
(12302, 'Arequipa', 'Camana', 'Av. Los Girasoles 132 ', '453599'),
(12303, 'Tacna', 'Tacna', 'Av. Heroes de Tarapaca 209', '660099'),
(12304, 'Tacna', 'Tarata', 'Av. Siempre Viva 201', '520033'),
(12305, 'Lima', 'Lima', 'Av. Always dirty 666', '200001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipossolicitud`
--

CREATE TABLE IF NOT EXISTS `tipossolicitud` (
  `idTiposSolicitud` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `PorcentajeDescuento` decimal(1,1) DEFAULT NULL,
  PRIMARY KEY (`idTiposSolicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipossolicitud`
--

INSERT INTO `tipossolicitud` (`idTiposSolicitud`, `Nombre`, `PorcentajeDescuento`) VALUES
(99901, 'Descuento_matricula', '0.2'),
(99902, 'Descuento_Pensiones', '0.2'),
(99903, 'Descuento_Pensiones2', '0.5'),
(99904, 'Descuento_SegundaCarrera', '0.2'),
(99905, 'Solicitud_segundaCarrera', NULL),
(99906, 'Cambio_carrera', NULL),
(99907, 'Cambio_Horario', NULL),
(99908, 'Cambio_sede', NULL),
(99909, 'Descuento_PagoTramites', '0.5'),
(99910, 'Volver_a_Estudiar', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
  `idTurno` int(11) NOT NULL,
  `Dias` varchar(45) NOT NULL,
  `Horario` varchar(45) NOT NULL,
  PRIMARY KEY (`idTurno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`idTurno`, `Dias`, `Horario`) VALUES
(0, 'LMMJV', '7-12am'),
(1, 'LMMJV', '1-6pm'),
(10, 'LMMJV', '4-9pm'),
(11, 'Sabado-Domingo', '7-1am'),
(100, 'Sabado-Domingo', '1-7pm');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `fk_Estudiantes_Direccion1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `direccion` (`idDireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudiantes_CentroTrabajo1` FOREIGN KEY (`CentroTrabajo_idCentroTrabajo`) REFERENCES `centrotrabajo` (`idCentroTrabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudiantes_LugarNacimiento1` FOREIGN KEY (`LugarNacimiento_idLugarNacimiento`) REFERENCES `lugarnacimiento` (`idLugarNacimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudiantes_Apoderados1` FOREIGN KEY (`Apoderados_idApoderado`) REFERENCES `apoderados` (`idApoderado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `fk_Pago_Pagos1` FOREIGN KEY (`Pagos_idPagos`) REFERENCES `pagos` (`idPagos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recibo_Estudiantes1` FOREIGN KEY (`Estudiantes_idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ConstanciaPago_Bancos1` FOREIGN KEY (`Bancos_idBancos`) REFERENCES `bancos` (`idBancos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ConstanciaPago_Carrera1` FOREIGN KEY (`Carrera_idCarrera`) REFERENCES `carrera` (`idCarrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Matriculas_Turno1` FOREIGN KEY (`Turno_idTurno`) REFERENCES `turno` (`idTurno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Matriculas_Sede1` FOREIGN KEY (`Sede_idSede`) REFERENCES `sede` (`idSede`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_Pagos_RegistroSolicitudesDescuentos1` FOREIGN KEY (`idRegistroSolicitudes`) REFERENCES `registrosolicitudesdescuentos` (`idRegistroSolicitudes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pensiones`
--
ALTER TABLE `pensiones`
  ADD CONSTRAINT `fk_Pensiones_Matriculas1` FOREIGN KEY (`Matriculas_idMatriculas`) REFERENCES `matriculas` (`idMatriculas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pensiones_Bancos1` FOREIGN KEY (`Bancos_idBancos`) REFERENCES `bancos` (`idBancos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pensiones_Pagos1` FOREIGN KEY (`Pagos_idPagos`) REFERENCES `pagos` (`idPagos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `fk_Personal_Direccion1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `direccion` (`idDireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registrosolicitudesdescuentos`
--
ALTER TABLE `registrosolicitudesdescuentos`
  ADD CONSTRAINT `fk_Solicitud_Personal1` FOREIGN KEY (`Personal_idPersonal`) REFERENCES `personal` (`idPersonal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Solicitud_Estudiantes1` FOREIGN KEY (`Estudiantes_idEstudiantes`) REFERENCES `estudiantes` (`idEstudiantes`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Solicitud_TiposSolicitud1` FOREIGN KEY (`TiposSolicitud_idTiposSolicitud`) REFERENCES `tipossolicitud` (`idTiposSolicitud`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
