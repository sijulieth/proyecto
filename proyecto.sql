-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-11-2012 a las 03:05:44
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `cod_adm` int(11) NOT NULL,
  `persona_id_pers` int(11) NOT NULL,
  PRIMARY KEY (`cod_adm`),
  KEY `fk_Administrador_Persona1_idx` (`persona_id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`cod_adm`, `persona_id_pers`) VALUES
(21, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE IF NOT EXISTS `director` (
  `cod_dir` int(11) NOT NULL,
  `persona_id_pers` int(11) NOT NULL,
  `cod_proy` int(11) NOT NULL,
  PRIMARY KEY (`cod_dir`,`persona_id_pers`),
  KEY `fk_Director_Persona1` (`persona_id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`cod_dir`, `persona_id_pers`, `cod_proy`) VALUES
(31, 5, 11),
(32, 4, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director_has_proyecto`
--

CREATE TABLE IF NOT EXISTS `director_has_proyecto` (
  `Director_cod_dir` int(11) NOT NULL,
  `Director_Persona_id_pers` int(11) NOT NULL,
  `Proyecto_cod_proy` int(11) NOT NULL,
  PRIMARY KEY (`Director_cod_dir`,`Director_Persona_id_pers`,`Proyecto_cod_proy`),
  KEY `fk_Director_has_Proyecto_Proyecto1_idx` (`Proyecto_cod_proy`),
  KEY `fk_Director_has_Proyecto_Director1_idx` (`Director_cod_dir`,`Director_Persona_id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `director_has_proyecto`
--

INSERT INTO `director_has_proyecto` (`Director_cod_dir`, `Director_Persona_id_pers`, `Proyecto_cod_proy`) VALUES
(31, 5, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `cod_est` int(11) NOT NULL,
  `persona_id_pers` int(11) NOT NULL,
  `proyecto_cod_proy` int(11) NOT NULL,
  PRIMARY KEY (`cod_est`,`persona_id_pers`),
  KEY `fk_Estudiante_Persona1` (`persona_id_pers`),
  KEY `fk_Estudiante_Proyecto1_idx` (`proyecto_cod_proy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`cod_est`, `persona_id_pers`, `proyecto_cod_proy`) VALUES
(41, 1, 11),
(42, 2, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jurado`
--

CREATE TABLE IF NOT EXISTS `jurado` (
  `cod_jura` int(11) NOT NULL,
  `persona_id_pers` int(11) NOT NULL,
  `cod_proy` int(11) NOT NULL,
  PRIMARY KEY (`cod_jura`,`persona_id_pers`),
  KEY `fk_Jurado_Persona1` (`persona_id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jurado`
--

INSERT INTO `jurado` (`cod_jura`, `persona_id_pers`, `cod_proy`) VALUES
(51, 4, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `id_pers` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `persona` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  PRIMARY KEY (`id_pers`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_pers`, `nombre`, `apellido`, `telefono`, `direccion`, `email`, `fecha`, `persona`, `usuario`, `contrasena`) VALUES
(1, 'Sindry', 'Rueda', '3126668686', 'Cll 29 #29-51 - 7 de Agosto', 'siyurudu@hotmail.com', '2012-11-13 15:03:27', 'administrador', 'srueda', '123'),
(2, 'Karina', 'Santana', '3004566543', 'Villa Castro', 'kari@hotmail.com', '2012-11-13 15:03:27', 'administrador', 'ksantana', '234'),
(3, 'Braulio', 'Barrios', '3153456543', 'Fundadores', 'braulio@gmail.com', '2012-11-13 15:03:27', 'administrador', 'bbarrios', '345'),
(4, 'Oswaldo', 'Rueda', '3012345432', 'Altos de confacesar', 'oswaldo@gmail.com', '2012-11-13 15:03:27', 'administrador', 'orueda', '456'),
(5, 'Roberto', 'Fernandez', '3018764587', 'Cortijos', 'roberto@unicesar.edu.co', '2012-11-13 15:03:27', 'administrador', 'rfernandez', '567'),
(98, '', '', '', '', '', '2012-11-13 15:03:27', '', 'wer', '567'),
(6544, '', '', '', '', '', '2012-11-13 15:03:27', '', '', '567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `cod_proy` int(11) NOT NULL,
  `tema` varchar(45) NOT NULL,
  `lin_inves` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_proy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`cod_proy`, `tema`, `lin_inves`) VALUES
(11, 'Sistema de seguimineto a proyectos de grado', 'Ingenieria de software'),
(12, 'Sistema de organizacion de asignatura', 'Ingenieria de Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_has_jurado`
--

CREATE TABLE IF NOT EXISTS `proyecto_has_jurado` (
  `Proyecto_cod_proy` int(11) NOT NULL,
  `Jurado_cod_jura` int(11) NOT NULL,
  `Jurado_Persona_id_pers` int(11) NOT NULL,
  PRIMARY KEY (`Proyecto_cod_proy`,`Jurado_cod_jura`,`Jurado_Persona_id_pers`),
  KEY `fk_Proyecto_has_Jurado_Jurado1_idx` (`Jurado_cod_jura`,`Jurado_Persona_id_pers`),
  KEY `fk_Proyecto_has_Jurado_Proyecto1_idx` (`Proyecto_cod_proy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyecto_has_jurado`
--

INSERT INTO `proyecto_has_jurado` (`Proyecto_cod_proy`, `Jurado_cod_jura`, `Jurado_Persona_id_pers`) VALUES
(11, 51, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE IF NOT EXISTS `seguimiento` (
  `cod_seg` int(11) NOT NULL,
  `proyecto_cod_proy` int(11) NOT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `fecha_limite` date NOT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `etapa` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cod_seg`),
  KEY `fk_Seguimiento_Proyecto1` (`proyecto_cod_proy`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`cod_seg`, `proyecto_cod_proy`, `fecha_inicial`, `fecha_final`, `fecha_limite`, `observaciones`, `etapa`, `estado`) VALUES
(61, 11, '2012-10-23', '2013-03-23', '2013-03-23', 'Mejorar marco teotico', 'Prupuesta', 'En revision');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_Administrador_Persona1` FOREIGN KEY (`persona_id_pers`) REFERENCES `persona` (`id_pers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `fk_Director_Persona1` FOREIGN KEY (`persona_id_pers`) REFERENCES `persona` (`id_pers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `director_has_proyecto`
--
ALTER TABLE `director_has_proyecto`
  ADD CONSTRAINT `fk_Director_has_Proyecto_Director1` FOREIGN KEY (`Director_cod_dir`, `Director_Persona_id_pers`) REFERENCES `director` (`cod_dir`, `Persona_id_pers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Director_has_Proyecto_Proyecto1` FOREIGN KEY (`Proyecto_cod_proy`) REFERENCES `proyecto` (`cod_proy`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `fk_Estudiante_Persona1` FOREIGN KEY (`persona_id_pers`) REFERENCES `persona` (`id_pers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estudiante_Proyecto1` FOREIGN KEY (`proyecto_cod_proy`) REFERENCES `proyecto` (`cod_proy`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `jurado`
--
ALTER TABLE `jurado`
  ADD CONSTRAINT `fk_Jurado_Persona1` FOREIGN KEY (`persona_id_pers`) REFERENCES `persona` (`id_pers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyecto_has_jurado`
--
ALTER TABLE `proyecto_has_jurado`
  ADD CONSTRAINT `fk_Proyecto_has_Jurado_Jurado1` FOREIGN KEY (`Jurado_cod_jura`, `Jurado_Persona_id_pers`) REFERENCES `jurado` (`cod_jura`, `Persona_id_pers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Proyecto_has_Jurado_Proyecto1` FOREIGN KEY (`Proyecto_cod_proy`) REFERENCES `proyecto` (`cod_proy`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `fk_Seguimiento_Proyecto1` FOREIGN KEY (`proyecto_cod_proy`) REFERENCES `proyecto` (`cod_proy`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
