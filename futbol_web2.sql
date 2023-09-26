-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2023 a las 02:56:25
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
-- Base de datos: `futbol_web2`
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
(1, 'Manchester City', 'Premier League', 'Inglaterra'),
(2, 'Inter de Milán ', 'Serie A', 'Italia'),
(3, 'Napoli', 'Serie A', 'Italia'),
(4, 'PSG', 'League One', 'Francia'),
(5, 'La Roma', 'Serie A', 'Italia'),
(6, 'Bayern de Múnich', 'Bundesliga', 'Alemania'),
(7, 'Ittihad FC', 'Liga Profesional Saudí', 'Arabia Saudita'),
(8, 'Olympique de Lyon', 'League One', 'Francia'),
(9, 'Barcelona', 'LaLiga', 'España'),
(10, 'Lille Olympique', 'League One', 'Francia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `goles` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `nombre`, `apellido`, `goles`, `id_equipo`) VALUES
(1, 'Erling', 'Haaland', 37, 1),
(2, 'Kylian', 'Mbappe', 33, 4),
(3, 'Harry', 'Kane', 32, 6),
(4, 'Victor', 'Osimhen', 29, 3),
(5, 'Lautaro', 'Martinez', 26, 2),
(6, 'Romelu', 'Lukaku', 24, 5),
(7, 'Robert', 'Lewandowski', 24, 9),
(8, 'Karim', 'Benzema', 23, 7),
(9, 'Jonathan', 'David', 23, 10),
(10, 'Alexandre', 'Lacazette', 22, 8);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
