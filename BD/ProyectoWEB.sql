-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2024 a las 21:25:43
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
-- Base de datos: `proyectoweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(20) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `imagen` varchar(300) NOT NULL,
  `texto` varchar(5000) NOT NULL,
  `tituloNot` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `autor`, `imagen`, `texto`, `tituloNot`) VALUES
(1, 'CNN', '../imagenes/noticia1.webp', 'El presidente Noboa decretó el conflicto interno armado después de que hombres encapuchados irrumpieron las instalaciones del canal TC Televisión en Guayaquil.', 'Conflicto armado en Ecuador'),
(2, 'Ricardo Gomez Guzman', '../imagenes/noticia2.png', 'Apenas se enfrentan algunos de los retos que nos ha dejado la pandemia por COVID-19. Sus altos costos humanos y los desafíos impuestos a la educación en un contexto de confinamiento han sido difíciles de superar, pero también han dejado grandes enseñanzas, tal vez la más importante, la relevancia de apostar por una educación que adopte las nuevas tecnologías y las aproveche en favor del estudiantado.', 'La educación Híbrida'),
(3, 'Adda Avedaño', '../imagenes/noticia3.png', 'La formación integral de las y los jóvenes requiere no sólo de prestar atención a sus necesidades académicas, sino de proveerles de los medios necesarios para un desarrollo físico saludable.', 'Touchdown por las mujeres'),
(4, 'Nubia Hernandez', '../imagenes/noticia4.png', 'El miércoles 22 de noviembre, el Presidente Andrés Manuel López Obrador anunció en la conferencia matutina la ratificación del doctor Arturo Reyes Sandoval como director general del Instituto Politécnico Nacional (IPN) por otros tres años.', 'Proyecto Vanguardista'),
(5, 'Andrés Echeverria', '../imagenes/noticia5.png', 'Nuestro momento es ahora. En el Instituto Politécnico Nacional (IPN) vivimos una era de logros y consecución de éxitos.', 'La fiesta del IPN'),
(6, 'Yo', 'No hay', 'Blablablabla', 'Blablbal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
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
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `Noticia` (`Noticia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`Noticia`) REFERENCES `noticias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
