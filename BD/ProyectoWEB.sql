-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2024 a las 00:45:00
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
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Email` text NOT NULL,
  `Acerca` text NOT NULL,
  `Comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `Nombre`, `Email`, `Acerca`, `Comentario`) VALUES
(1, 'nombre', 'email@correocom', 'Acerca de', 'MEnsaje'),
(2, 'nombre', 'email@correocom', 'Acerca de', 'MEnsaje'),
(3, 'nombre', 'email@correocom', 'Acerca de', 'MEnsaje'),
(4, 'nombre', 'email@correocom', 'Acerca de', 'MEnsaje'),
(5, 'nombre', 'email@correocom', 'Acerca de', 'MEnsaje');

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
(4, 'Nubia Hernandez', '../imagenes/noticia4.png', 'El miércoles 22 de noviembre, el Presidente Andrés Manuel López Obrador anunció en la conferencia matutina la ratificación del doctor Arturo Reyes Sandoval como director general del Instituto Politécnico Nacional (IPN) por otros tres años.', 'Proyecto Vanguardista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `fechaCom` timestamp NOT NULL DEFAULT current_timestamp(),
  `Noticia` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `comentario`, `fechaCom`, `Noticia`) VALUES
(6, 'Ola', 'Comentarios', '2024-01-12 00:18:41', 1),
(7, 'Juanito', 'Como andan', '2024-01-12 00:19:01', 1),
(8, 'Como andan', 'Que tal', '2024-01-12 00:25:38', 4),
(9, 'Hola', 'Como andan', '2024-01-12 17:44:20', 1),
(10, 'Angel', 'Como andamos', '2024-01-12 17:45:12', 2),
(11, 'Pedrito', 'Hola', '2024-01-12 17:49:33', 2),
(12, 'Quienes', 'Como van a ser', '2024-01-12 17:51:00', 3),
(13, 'Como ven', 'Comentarios', '2024-01-12 17:51:22', 3),
(14, 'Vaya vaya', 'Cometario', '2024-01-12 17:55:41', 3),
(15, 'Vaya vaya', 'Cometario', '2024-01-12 17:56:57', 3),
(18, 'Prueba', 'Locacion', '2024-01-12 18:34:37', 1),
(19, 'YA jalo', 'No', '2024-01-12 18:35:14', 2),
(20, 'Otra prueba', 'Mas pruebas', '2024-01-12 18:37:18', 2),
(21, 'Nombre', 'Comentario', '2024-01-12 18:37:48', 1),
(22, 'Mas nombre', 'Mas comentarios', '2024-01-12 18:39:54', 1),
(23, 'MAS', 'COMENTARIOS', '2024-01-12 18:41:45', 1),
(24, 'MAS', 'COMENTARIOS', '2024-01-12 18:46:46', 1),
(25, 'Pruebas', 'Comentario', '2024-01-12 18:47:00', 4),
(26, 'YA debe de jalar', 'Creo', '2024-01-12 18:48:59', 1),
(27, 'Pruebas', 'Comentario', '2024-01-12 18:50:57', 4),
(28, 'Holita', 'Alo', '2024-01-12 18:51:06', 3),
(29, 'Si', 'No', '2024-01-12 18:52:04', 3),
(30, 'Ya', 'Porfavor', '2024-01-12 18:53:11', 3),
(31, 'Porfavor', 'Pls', '2024-01-12 18:53:41', 4),
(32, 'Porfavor', 'Pls', '2024-01-12 18:53:47', 4),
(33, 'Porfavor', 'Pls', '2024-01-12 18:53:53', 4),
(34, 'Pls', 'Pls', '2024-01-12 18:56:11', 1),
(35, 'Porfavor', 'Pls', '2024-01-12 18:56:24', 4),
(36, 'Mo', 'No', '2024-01-12 18:56:31', 4),
(37, 'Sip', 'Nop', '2024-01-12 18:56:45', 1),
(38, 'Vaya ahora si ya jalo', 'Simon', '2024-01-12 23:08:21', 1),
(39, 'Vaya ahora si ya jalo', 'Simon', '2024-01-12 23:08:56', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
