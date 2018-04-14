-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2017 a las 06:56:37
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daw`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `publicaEvento` (IN `u_idTipoEVento` INT(11), IN `u_tituloEvento` VARCHAR(40), IN `u_descripcionEvento` TEXT, IN `u_lugarEvento` VARCHAR(140), IN `u_fechaInicio` DATE, IN `u_horaInicio` TIME, IN `u_fechaFin` DATE, IN `u_horaFin` TIME)  BEGIN INSERT INTO evento (idTipoEvento, tituloEvento, descripcionEvento, lugarEvento, fechaInicio, horaInicio, fechaFin, horaFin) VALUES (u_idTipoEVento, u_tituloEvento, u_descripcionEvento, u_lugarEvento, u_fechaInicio, u_horaInicio, u_fechaFin, u_horaFin); END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idEvento` int(11) NOT NULL,
  `idTipoEvento` int(11) NOT NULL,
  `tituloEvento` varchar(40) NOT NULL,
  `descripcionEvento` text NOT NULL,
  `lugarEvento` varchar(140) NOT NULL,
  `fechaInicio` date NOT NULL,
  `horaInicio` time NOT NULL,
  `fechaFin` date NOT NULL,
  `horaFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idEvento`, `idTipoEvento`, `tituloEvento`, `descripcionEvento`, `lugarEvento`, `fechaInicio`, `horaInicio`, `fechaFin`, `horaFin`) VALUES
(1, 2, 'Primeros Auxilios', 'Cómo actuar en situaciones a las que están expuestas las personas de cualquier edad.', 'Instalaciones de CEPCQ', '2017-10-06', '11:00:00', '2017-10-06', '13:00:00'),
(2, 2, 'Sismo', 'El simulacro se basará en un supuesto de un sismo de 8 grados en la escala de Richter, con duración de un minuto...', 'Centro de Querétaro', '2017-10-16', '11:00:00', '2017-10-16', '13:00:00'),
(3, 3, 'Junta de Consejo', 'Participará el director general de CEPCQ, así como los directores de cada departamento...', 'Sala de juntas de CEPCQ', '2017-10-25', '10:30:00', '2017-10-10', '12:30:00'),
(4, 1, 'Escuela segura', 'Se enseñarán las medidas de seguridad básicas para prevenir accidentes en una escuela...', 'Escuelas de la región', '2017-10-09', '09:00:00', '2017-10-12', '09:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoevento`
--

CREATE TABLE `tipoevento` (
  `idTipoEvento` int(11) NOT NULL,
  `nombreTipoEvento` varchar(20) NOT NULL,
  `descripcionTipoEvento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoevento`
--

INSERT INTO `tipoevento` (`idTipoEvento`, `nombreTipoEvento`, `descripcionTipoEvento`) VALUES
(1, 'Taller', 'Curso en el que se enseña una determinada actividad práctica.'),
(2, 'Simulacro', 'Se imita un suceso real para tomar las medidas necesarias de seguridad.'),
(3, 'Junta', 'Se reunen los directores y representantes de la organización para aclarar inquietudes.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idEvento`),
  ADD KEY `idTipoEvento` (`idTipoEvento`);

--
-- Indices de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  ADD PRIMARY KEY (`idTipoEvento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tipoevento`
--
ALTER TABLE `tipoevento`
  MODIFY `idTipoEvento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`idTipoEvento`) REFERENCES `tipoevento` (`idTipoEvento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
