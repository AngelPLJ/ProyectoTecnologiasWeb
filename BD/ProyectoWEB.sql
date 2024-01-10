-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-01-2024 a las 22:01:56
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
(1, 'CNN', '../imagenes/noticia1.webp', 'El presidente Noboa decretó el conflicto interno armado después de que hombres encapuchados irrumpieron las instalaciones del canal TC Televisión en Guayaquil.', 'Conflicto armado en Ecuador'),
(2, 'Ricardo Gomez Guzman', '../imagenes/noticia2.png', 'Apenas se enfrentan algunos de los retos que nos ha dejado la pandemia por COVID-19. Sus altos costos humanos y los desafíos impuestos a la educación en un contexto de confinamiento han sido difíciles de superar, pero también han dejado grandes enseñanzas, tal vez la más importante, la relevancia de apostar por una educación que adopte las nuevas tecnologías y las aproveche en favor del estudiantado.', 'La educación Híbrida'),
(3, 'Adda Avedaño', '../imagenes/noticia3.png', 'La formación integral de las y los jóvenes requiere no sólo de prestar atención a sus necesidades académicas, sino de proveerles de los medios necesarios para un desarrollo físico saludable.', 'Touchdown por las mujeres'),
(4, 'Nubia Hernandez', '../imagenes/noticia4.png', 'El miércoles 22 de noviembre, el Presidente Andrés Manuel López Obrador anunció en la conferencia matutina la ratificación del doctor Arturo Reyes Sandoval como director general del Instituto Politécnico Nacional (IPN) por otros tres años.', 'Proyecto Vanguardista'),
(5, 'Andrés Echeverria', '../imagenes/noticia5.png', 'Nuestro momento es ahora. En el Instituto Politécnico Nacional (IPN) vivimos una era de logros y consecución de éxitos.', 'La fiesta del IPN');

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
  MODIFY `id_noticia` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
