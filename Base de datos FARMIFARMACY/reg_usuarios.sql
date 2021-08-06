-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2021 a las 19:25:24
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reg_usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `correo`, `contrasena`) VALUES
(9, 'heelenlizeth.canomoreno@gmail.com', '1126c606acc8127d5ad2b288dfee5bd838dc9a7ef3d47859037153b139db18048146f73bfc1b12e3050260aa469bce8e7206525895a5d4e5cc4c1fb769dbf13f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombres` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `tipo_doc` varchar(30) NOT NULL,
  `documento` varchar(30) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `apellidos`, `correo`, `tipo_doc`, `documento`, `direccion`, `numero`, `pass`, `fecha`) VALUES
(108, 'Heelen Lizeth ', 'Cano Moreno ', 'heelenlizeth.canomoreno@gmail.com', 'TI', '1034656167', 'cll 78 #78-71 sur ', '3153130156', '1126c606acc8127d5ad2b288dfee5bd838dc9a7ef3d47859037153b139db18048146f73bfc1b12e3050260aa469bce8e7206525895a5d4e5cc4c1fb769dbf13f', '2003-12-29'),
(110, 'Heydi Lizbeth ', 'Cano Moreno ', 'heydilizbeth.canomoreno@gmail.com', 'TI', '1034656166', 'cll 78 #78-71 sur ', '3156807090', '0c8fe193b695dab707fd8b88f86700271ee428e02538674ebbc76f9058bff9bb10073eab1ffd795188be9b04bbf09d3472d890370e307e985d52e724bcf2a1cd', '2003-12-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `tipo_doc` varchar(30) NOT NULL,
  `documento` varchar(50) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `contrasena` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombres`, `apellidos`, `tipo_doc`, `documento`, `rol`, `estado`, `contrasena`) VALUES
(13, 'Heydi Lizbeth ', 'Cano Moreno ', 'TI', '1034656166', 'Empleado', 'activo', '5c27e40f06de123588a7407c21f24b6ae86989b49862fa795c850610a0f149b4a3753aec4d47bf8dd5eb1a11503c47acfec1f3a533633277360906ae04caf7e3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
