-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2023 a las 02:56:15
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
-- Base de datos: `db_futbol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `equipo` varchar(250) NOT NULL,
  `liga` varchar(250) NOT NULL,
  `pais` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `equipo`, `liga`, `pais`) VALUES
(0, 'Manchester City', 'Premier League', 'Inglaterra'),
(1, 'Lille Olympique', 'League One', 'Francia'),
(2, 'Inter de Milán ', 'Serie A', 'Italia'),
(3, 'Napoli', 'Serie A', 'Italia'),
(4, 'PSG', 'League One', 'Francia'),
(5, 'La Roma', 'Serie A', 'Italia'),
(6, 'Bayern de Múnich', 'Bundesliga', 'Alemania'),
(7, 'Ittihad FC', 'Liga Profesional Saudí', 'Arabia Saudita'),
(8, 'Olympique de Lyon', 'League One', 'Francia'),
(9, 'Barcelona', 'LaLiga', 'España'),
(10, 'Manchester United', 'Premier League', 'Inglaterra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `id_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `nombre`, `apellido`, `id_equipo`) VALUES
(1, 'Erling ', 'Haaland', 0),
(2, 'Julian ', 'Alvarez', 0),
(3, 'Phil ', 'Foden', 0),
(4, 'Robert ', 'Lewandowski', 9),
(5, 'Ferran ', 'Torres', 9),
(6, 'Jules ', 'Koundé', 9),
(7, 'Jonathan ', 'David', 1),
(8, 'Benjamin ', 'André', 1),
(9, 'Rémy ', 'Cabella', 1),
(10, 'Lautaro', 'Martinez', 2),
(11, 'Hakan ', 'Calhanoglu', 2),
(12, 'Henrikh ', 'Mkhitaryan', 2),
(13, 'Victor ', 'Osimhen', 3),
(14, 'Matteo', 'Politano', 3),
(15, 'Piotr ', 'Zielinski', 3),
(16, 'Kylian ', 'Mbappé', 4),
(17, 'Achraf ', 'Hakimi', 4),
(18, 'Goncalo ', 'Ramos', 4),
(19, 'Romelu ', 'Lukaku', 5),
(20, 'Andrea ', 'Belotti', 5),
(21, 'Paulo ', 'Dybala', 5),
(22, 'Harry ', 'Kane', 6),
(23, 'Leroy ', 'Sané', 6),
(24, 'Jamal ', 'Musiala', 6),
(25, 'Karim ', 'Benzema', 7),
(26, 'N\'Golo ', 'Kanté', 7),
(27, 'Igor ', 'Coronado', 7),
(28, 'Alexandre ', 'Lacazette', 8),
(29, 'Nicolás ', 'Tagliafico', 8),
(30, 'Corentin ', 'Tolisso', 8),
(31, 'Bruno ', 'Fernandes', 10),
(33, 'Marcus ', 'Rashford', 10),
(34, 'Raphaël ', 'Varane', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`) VALUES
(1, 'webadmin', '$2a$12$t9H0dO/9JIks9pUOsUjVbOajSJq9Ww.oajDGfrngRQ6DQbwiJxjaa');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
