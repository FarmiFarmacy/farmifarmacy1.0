-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2021 a las 19:19:20
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `farmifarmacy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_usuario`
--

CREATE TABLE `grupo_usuario` (
  `id` int(11) NOT NULL,
  `nombre_grupo` varchar(150) NOT NULL,
  `nivel_grupo` int(11) NOT NULL,
  `estado_grupo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo_usuario`
--

INSERT INTO `grupo_usuario` (`id`, `nombre_grupo`, `nivel_grupo`, `estado_grupo`) VALUES
(1, 'Usuario', 0, 1),
(2, 'Administrador ', 1, 1),
(3, 'Empleado ', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `nombre_archivo` varchar(225) NOT NULL,
  `tipo_archivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(225) NOT NULL,
  `cantidad` varchar(50) DEFAULT NULL,
  `precio_compra` decimal(25,0) DEFAULT NULL,
  `precio_venta` decimal(25,0) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_media` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `nombre_usuario` varchar(60) NOT NULL,
  `contraseña` varchar(225) NOT NULL,
  `nivel_usuario` int(11) NOT NULL,
  `imagen` varchar(225) DEFAULT NULL,
  `estado` int(1) NOT NULL,
  `último_acceso` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `nombre_usuario`, `contraseña`, `nivel_usuario`, `imagen`, `estado`, `último_acceso`) VALUES
(0, 'Empleado User', 'Empleado', 'f9f011a553550aef31a8ee2690e1d1b5f261c9ff', 2, NULL, 1, '2021-11-22 19:18:20'),
(1, 'Heelen Lizeth ', 'Heelen Cano ', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, NULL, 1, '2021-11-22 19:17:33'),
(2, 'Admin Users', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, NULL, 1, '2021-11-22 18:56:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(25,0) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`) USING BTREE;

--
-- Indices de la tabla `grupo_usuario`
--
ALTER TABLE `grupo_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nivel_grupo` (`nivel_grupo`) USING BTREE;

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`) USING BTREE,
  ADD KEY `id_categoria` (`id_categoria`) USING BTREE,
  ADD KEY `id_media` (`id_media`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`) USING BTREE,
  ADD KEY `nivel_usuario` (`nivel_usuario`) USING BTREE;

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
