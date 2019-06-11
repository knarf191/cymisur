-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2016 a las 01:59:48
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cymisur`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `id` varchar(75) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `email`, `password`) VALUES
('1', 'root', 'root', 'cymisur321'),
('2', 'Zosimo Reyes Alor', 'zosimo_reyes@hotmail.com', 'pumas21'),
('3', 'Frank Reyes Martinez', 'frank_reyesm@hotmail.com', 'admin321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imss` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `curp` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `direccion`, `telefono`, `imss`, `curp`, `categoria`) VALUES
('1', 'Zosimo Reyes', 'Hidalgo 508 int', '9221062107', '14253647589', 'REAZ641226K33', 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `foto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `informacion` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`foto`, `informacion`) VALUES
('Barda.png', 'Construccion de barda particular, Jaltipan, Ver.'),
('estructura.png', 'Estructura en taller de mantenimiento, Minsa Planta Jaltipan, Ver.'),
('pararrayo.png', 'Instalacion de pararrayo, Silice del Itsmo, Sayula de Aleman, Ver.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestor_clientes`
--

CREATE TABLE IF NOT EXISTS `gestor_clientes` (
  `id` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `gestor_clientes`
--

INSERT INTO `gestor_clientes` (`id`, `nombre`, `direccion`, `telefono`, `email`, `empresa`) VALUES
('1', 'Rodolfo Martinez', 'S/N', '9211232222', 'rodol.martinez@cemex.com', 'cemex'),
('2', 'Gerardo Escudero', 'S/N', '9222642811', 'g.escudero@minsa.com', 'minsa sa de cv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE IF NOT EXISTS `herramientas` (
  `id` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `herramienta` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(150) NOT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `bodega` int(150) NOT NULL,
  `obra` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`id`, `herramienta`, `cantidad`, `tipo`, `bodega`, `obra`) VALUES
('2', 'Pala Cuadrada', 8, 'Civil', 0, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `empresa` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `direccion`, `telefono`, `email`, `empresa`) VALUES
('1', 'Angel Hdez.', 'S/N', '9217894512', 'angel.hdez@aybt.com', 'Alta y Baja Tension'),
('2', 'Dolores', 'S/N', '9246546655', 'dolores@interceramic.com', 'Interceramic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_gestor`
--

CREATE TABLE IF NOT EXISTS `usuarios_gestor` (
  `id` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios_gestor`
--

INSERT INTO `usuarios_gestor` (`id`, `nombre`, `email`, `password`) VALUES
('1', 'root', 'root', 'pumas21'),
('2', 'Zosimo Reyes Alor', 'zosimo_reyes@hotmail.com', 'admin321');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
 ADD PRIMARY KEY (`id`,`email`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
 ADD PRIMARY KEY (`id`,`nombre`,`imss`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
 ADD PRIMARY KEY (`foto`);

--
-- Indices de la tabla `gestor_clientes`
--
ALTER TABLE `gestor_clientes`
 ADD PRIMARY KEY (`id`,`nombre`,`email`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
 ADD PRIMARY KEY (`id`,`herramienta`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
 ADD PRIMARY KEY (`id`,`nombre`);

--
-- Indices de la tabla `usuarios_gestor`
--
ALTER TABLE `usuarios_gestor`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
