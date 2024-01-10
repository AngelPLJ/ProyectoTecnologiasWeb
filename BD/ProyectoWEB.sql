-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-01-2024 a las 20:55:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ProyectoWEB`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Noticias`
--

CREATE TABLE `Noticias` (
  `id_noticia` int(20) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `imagen` varchar(300) NOT NULL,
  `texto` varchar(5000) NOT NULL,
  `tituloNot` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Noticias`
--

INSERT INTO `Noticias` (`id_noticia`, `autor`, `imagen`, `texto`, `tituloNot`) VALUES
(1, 'CNN', '/opt/lampp/htdocs/ProyectoWEB/imagenes/noticia1.webp', 'El presidente Noboa decretó el conflicto interno armado después de que hombres encapuchados irrumpieron las instalaciones del canal TC Televisión en Guayaquil.', 'Conflicto armado en Ecuador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `fechaCom` date NOT NULL,
  `Noticia` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Noticias`
--
ALTER TABLE `Noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `Noticia` (`Noticia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Noticias`
--
ALTER TABLE `Noticias`
  MODIFY `id_noticia` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`Noticia`) REFERENCES `Noticias` (`id_noticia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
