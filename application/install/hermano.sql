-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2015 a las 16:38:48
-- Versión del servidor: 5.5.40
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hermano`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `baja`
--

CREATE TABLE IF NOT EXISTS `baja` (
`idBaja` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `pendiente` longtext
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constructor`
--

CREATE TABLE IF NOT EXISTS `constructor` (
  `idConstructor` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `consulta` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
`idContacto` int(11) NOT NULL,
  `nombre_empresa` varchar(100) DEFAULT NULL,
  `tratamiento` enum('Señor','Señora','Señorita') DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `cif` varchar(20) DEFAULT NULL,
  `tipo_via` enum('Calle','Plaza','Avenida') DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `numero` decimal(4,0) DEFAULT NULL,
  `piso` decimal(2,0) DEFAULT NULL,
  `puerta` char(1) DEFAULT NULL,
  `codigo_postal` char(5) DEFAULT NULL,
  `poblacion` varchar(50) DEFAULT NULL,
  `movil` varchar(15) DEFAULT NULL,
  `fijo` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `provincia` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hermano`
--

CREATE TABLE IF NOT EXISTS `hermano` (
`idHermano` int(11) NOT NULL,
  `vivienda` int(11) DEFAULT NULL,
  `tratamiento` enum('Señor','Señora','Señorita') DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `dni` varchar(20) DEFAULT NULL,
  `tipo_via` enum('Calle','Plaza','Avenida') DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `numero` decimal(4,0) DEFAULT NULL,
  `piso` decimal(2,0) DEFAULT NULL,
  `puerta` char(1) DEFAULT NULL,
  `codigo_postal` char(5) DEFAULT NULL,
  `poblacion` varchar(50) DEFAULT NULL,
  `movil` varchar(15) DEFAULT NULL,
  `fijo` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `tipo` enum('Personal','Domiciliado','Residencia habitual','San Telmo') DEFAULT NULL,
  `cuenta_corriente` char(24) DEFAULT NULL,
  `familia` enum('0','1','2','3','4','5') DEFAULT NULL,
  `provincia` int(11) DEFAULT NULL,
  `medalla` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `idHermano` int(11) NOT NULL,
  `idRemesa` int(11) NOT NULL,
  `cuota1` date DEFAULT NULL,
  `cuota2` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `idProvincia` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idProvincia`, `nombre`) VALUES
(1, 'Alava'),
(2, 'Albacete'),
(3, 'Alicante'),
(4, 'Almeria'),
(5, 'Avila'),
(6, 'Badajoz'),
(7, 'Illes Balears'),
(8, 'Barcelona'),
(9, 'Burgos'),
(10, 'Cáceres'),
(11, 'Cádiz'),
(12, 'Castellón'),
(13, 'Ciudad Real'),
(14, 'Córdoba'),
(15, 'A Coruña'),
(16, 'Cuenca'),
(17, 'Girona'),
(18, 'Granada'),
(19, 'Guadalajara'),
(20, 'Guipzcoa'),
(21, 'Huelva'),
(22, 'Huesca'),
(23, 'Jaén'),
(24, 'León'),
(25, 'Lleida'),
(26, 'La Rioja'),
(27, 'Lugo'),
(28, 'Madrid'),
(29, 'Málaga'),
(30, 'Murcia'),
(31, 'Navarra'),
(32, 'Ourense'),
(33, 'Asturias'),
(34, 'Palencia'),
(35, 'Las Palmas'),
(36, 'Pontevedra'),
(37, 'Salamanca'),
(38, 'Santa Cruz de Tenerife'),
(39, 'Cantabria'),
(40, 'Segovia'),
(41, 'Sevilla'),
(42, 'Soria'),
(43, 'Tarragona'),
(44, 'Teruel'),
(45, 'Toledo'),
(46, 'Valencia'),
(47, 'Valladolid'),
(48, 'Vizcaya'),
(49, 'Zamora'),
(50, 'Zaragoza'),
(51, 'Ceuta'),
(52, 'Melilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remesa`
--

CREATE TABLE IF NOT EXISTS `remesa` (
`idRemesa` int(11) NOT NULL,
  `descripcion` mediumtext,
  `anio` decimal(4,0) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contacto`
--

CREATE TABLE IF NOT EXISTS `tipo_contacto` (
`idTipo_Contacto` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_contacto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `clave` varchar(50) DEFAULT NULL,
  `rol` enum('Administrador','Usuario') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vivienda`
--

CREATE TABLE IF NOT EXISTS `vivienda` (
`idVivienda` int(11) NOT NULL,
  `Barriada` enum('Nueva','Vieja','Kiosko') DEFAULT NULL,
  `Linea` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20') DEFAULT NULL,
  `Numero` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20') DEFAULT NULL,
  `Observaciones` mediumtext
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `baja`
--
ALTER TABLE `baja`
 ADD PRIMARY KEY (`idBaja`);

--
-- Indices de la tabla `constructor`
--
ALTER TABLE `constructor`
 ADD PRIMARY KEY (`idConstructor`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
 ADD PRIMARY KEY (`idContacto`), ADD KEY `fk_Contacto_Tipo_Contacto1_idx` (`tipo`), ADD KEY `fk_Contacto_Provincia1_idx` (`provincia`);

--
-- Indices de la tabla `hermano`
--
ALTER TABLE `hermano`
 ADD PRIMARY KEY (`idHermano`), ADD KEY `fk_Hermano_Vivienda_idx` (`vivienda`), ADD KEY `fk_Hermano_Provincia1_idx` (`provincia`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
 ADD PRIMARY KEY (`idHermano`,`idRemesa`), ADD KEY `fk_Pago_Hermano1_idx` (`idHermano`), ADD KEY `fk_Pago_Remesa1_idx` (`idRemesa`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
 ADD PRIMARY KEY (`idProvincia`);

--
-- Indices de la tabla `remesa`
--
ALTER TABLE `remesa`
 ADD PRIMARY KEY (`idRemesa`);

--
-- Indices de la tabla `tipo_contacto`
--
ALTER TABLE `tipo_contacto`
 ADD PRIMARY KEY (`idTipo_Contacto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `vivienda`
--
ALTER TABLE `vivienda`
 ADD PRIMARY KEY (`idVivienda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `baja`
--
ALTER TABLE `baja`
MODIFY `idBaja` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
MODIFY `idContacto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `hermano`
--
ALTER TABLE `hermano`
MODIFY `idHermano` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT de la tabla `remesa`
--
ALTER TABLE `remesa`
MODIFY `idRemesa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tipo_contacto`
--
ALTER TABLE `tipo_contacto`
MODIFY `idTipo_Contacto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `vivienda`
--
ALTER TABLE `vivienda`
MODIFY `idVivienda` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
ADD CONSTRAINT `fk_Contacto_Provincia1` FOREIGN KEY (`provincia`) REFERENCES `provincia` (`idProvincia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Contacto_Tipo_Contacto1` FOREIGN KEY (`tipo`) REFERENCES `tipo_contacto` (`idTipo_Contacto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `hermano`
--
ALTER TABLE `hermano`
ADD CONSTRAINT `fk_Hermano_Provincia1` FOREIGN KEY (`provincia`) REFERENCES `provincia` (`idProvincia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Hermano_Vivienda` FOREIGN KEY (`vivienda`) REFERENCES `vivienda` (`idVivienda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
ADD CONSTRAINT `fk_Pago_Hermano1` FOREIGN KEY (`idHermano`) REFERENCES `hermano` (`idHermano`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Pago_Remesa1` FOREIGN KEY (`idRemesa`) REFERENCES `remesa` (`idRemesa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
