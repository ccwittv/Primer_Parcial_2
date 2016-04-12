-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2015 a las 18:40:52
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `votacion`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DameLosVotos`()
    NO SQL
select * from voto$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DameUnaVotacion`(IN `pid` INT)
    NO SQL
select * from voto
 where id = pid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteVoto`(IN `pid` BIGINT)
    NO SQL
delete from voto where id = pid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarVotacion`(IN `pdni` BIGINT, IN `pprovincia` VARCHAR(100), IN `pcandidato` VARCHAR(100), IN `psexo` VARCHAR(100), IN `plocalidad` VARCHAR(100), IN `pdireccion` VARCHAR(100))
    NO SQL
insert into voto
 (dni, provincia, candidato, sexo, localidad, direccion)
 values
 (pdni, pprovincia, pcandidato, psexo, plocalidad, pdireccion)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateVotox`(IN `pid` BIGINT, IN `pdni` BIGINT, IN `pprovincia` VARCHAR(100), IN `pcandidato` VARCHAR(100), IN `psexo` VARCHAR(100), IN `plocalidad` VARCHAR(100), IN `pdireccion` VARCHAR(100))
    NO SQL
update voto
	set dni=pdni,
        provincia=pprovincia,
	    candidato=pcandidato,
	    sexo=psexo,
        localidad=plocalidad,
        direccion=pdireccion
	WHERE id=pid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voto`
--

CREATE TABLE IF NOT EXISTS `voto` (
`id` bigint(20) NOT NULL,
  `dni` bigint(20) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `candidato` varchar(100) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `voto`
--

INSERT INTO `voto` (`id`, `dni`, `provincia`, `candidato`, `sexo`, `localidad`, `direccion`) VALUES
(1, 24042853, 'Buenos Aires', 'Macri', 'femenino', 'CABA', 'Isabel La Católica 904'),
(26, 23232323, 'San Luis', 'Scioli', 'femenino', 'Merlo', 'El zorzal 100'),
(27, 24098787, 'Buenos Aires', 'Massa', 'masculino', 'Avellaneda', 'Mitre 750');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `voto`
--
ALTER TABLE `voto`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `voto`
--
ALTER TABLE `voto`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
