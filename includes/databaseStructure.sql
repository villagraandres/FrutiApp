-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-07-2022 a las 23:07:55
-- Versión del servidor: 8.0.28
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fruteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `usuarioId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `fecha`, `hora`, `usuarioId`) VALUES
(111, '2022-07-28', '18:03:00', 42),
(112, '2022-07-20', '18:03:00', 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenesproductos`
--

CREATE TABLE `ordenesproductos` (
  `id` int NOT NULL,
  `ordenesId` int DEFAULT NULL,
  `productoId` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `ordenesproductos`
--

INSERT INTO `ordenesproductos` (`id`, `ordenesId`, `productoId`, `cantidad`) VALUES
(105, 111, 62, 2),
(106, 111, 63, 1),
(107, 112, 63, 2),
(108, 112, 64, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `resumen` varchar(150) DEFAULT NULL,
  `descripcion` longtext,
  `precio` decimal(8,2) DEFAULT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `seccion` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `resumen`, `descripcion`, `precio`, `imagen`, `seccion`) VALUES
(61, 'Prueba larga ', 'adasda', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Proin magna ipsum, commodo in leo nec, molestie convallis nisi. Vivamus sed ante quis dui dignissim lacinia at sit amet felis. Pellentesque vulputate elit tortor. Sed ac lacus nec dolor euismod porta eu non orci. In efficitur a nisi eget pulvinar. Cras rutrum ligula sed odio pulvinar, nec suscipit eros cursus. Interdum et malesuada fames ac ante ipsum primis in faucibus.\r\n\r\nNulla quis commodo lorem. In rhoncus, elit eget congue sollicitudin, justo sapien mollis eros, at ornare tellus est quis justo. Donec nec eros vel quam feugiat faucibus. Aliquam lacus sapien, sagittis at urna at, efficitur luctus ipsum. Morbi dignissim mi enim, non imperdiet mi tempus elementum. Morbi faucibus a ex et dapibus. Fusce placerat varius ligula, nec feugiat ligula mollis vitae. Cras vel tellus vel lacus vulputate tincidunt vel ac purus. Vestibulum at leo odio. Praesent interdum, nulla sed aliquam iaculis, dolor lorem semper massa, tempor egestas sem elit sit amet tortor. Cras egestas tellus orci, vel sollicitudin justo consectetur sed. Etiam lacinia massa at eleifend accumsan.', '121212.00', 'bf4445380769a29ab1ca2cb22fe1d28b.jpg', 1),
(62, 'dasd', 'asda', 'dasda', '2.00', 'fd88032bafa8181d3de143348e5eaaac.jpg', 1),
(63, 'dasd', 'a', 'd', '2.00', 'd39ce85ac7caf3424307db3cfd7cfcee.jpg', 1),
(64, 'Pedroa', 'a', 'da', '2.00', '7bc7e32ac05b727324ef930b8dabe67b.jpg', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `apellido` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `rol` tinyint(1) DEFAULT NULL,
  `token` varchar(15) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `confirmado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `telefono`, `rol`, `token`, `password`, `confirmado`) VALUES
(39, '', '', 'correo@correo.com', '', 1, '', '$2y$10$UlAIf40w9RfDR9/L70PAkudaaPjUu8GF4E/bCMZvDL76CQ15neYra', 1),
(42, 'Andrés', 'Villagra', 'villagraandres00@gmail.com', '8125976580', 0, '', '$2y$10$Ef5Im1oUrbZiefzqTHQFMeEow9BFylCYaUtdi9zrUIGmEQB/2pC6m', 1),
(43, 'Pedro', 'Villagra', 'cuentadobleverificacion@gmail.com', '8125976580', 0, '', '$2y$10$gghdXfOjrgZjup7L6HCxZuCBb8/AJ20ats3G1HYgi.sfteMkixD3u', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioId_idx` (`usuarioId`);

--
-- Indices de la tabla `ordenesproductos`
--
ALTER TABLE `ordenesproductos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordenesId_idx` (`ordenesId`),
  ADD KEY `productoId_idx` (`productoId`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `ordenesproductos`
--
ALTER TABLE `ordenesproductos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Filtros para la tabla `ordenesproductos`
--
ALTER TABLE `ordenesproductos`
  ADD CONSTRAINT `ordenesproductos_ibfk_2` FOREIGN KEY (`productoId`) REFERENCES `productos` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `ordenesproductos_ibfk_3` FOREIGN KEY (`ordenesId`) REFERENCES `ordenes` (`id`) ON DELETE CASCADE ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
