-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2023 a las 21:54:50
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
(59, 'Erling ', 'Haaland', 0),
(62, 'Julian ', 'Alvarez', 0),
(63, 'Phil ', 'Foden', 0),
(64, 'Robert ', 'Lewandowski', 9),
(66, 'Ferran ', 'Torres', 9),
(68, 'Jules ', 'Koundé', 9),
(70, 'Jonathan ', 'David', 1),
(72, 'Benjamin ', 'André', 1),
(75, 'Rémy ', 'Cabella', 1),
(76, 'Lautaro', 'Martinez', 2),
(78, 'Hakan ', 'Calhanoglu', 2),
(79, 'Henrikh ', 'Mkhitaryan', 2),
(83, 'Victor ', 'Osimhen', 3),
(85, 'Matteo', 'Politano', 3),
(87, 'Piotr ', 'Zielinski', 3),
(89, 'Kylian ', 'Mbappé', 4),
(91, 'Achraf ', 'Hakimi', 4),
(93, 'Goncalo ', 'Ramos', 4),
(94, 'Romelu ', 'Lukaku', 5),
(96, 'Andrea ', 'Belotti', 5),
(98, 'Paulo ', 'Dybala', 5),
(100, 'Harry ', 'Kane', 6),
(102, 'Leroy ', 'Sané', 6),
(103, 'Jamal ', 'Musiala', 6),
(105, 'Karim ', 'Benzema', 7),
(107, 'N\'Golo ', 'Kanté', 7),
(109, 'Igor ', 'Coronado', 7),
(111, 'Alexandre ', 'Lacazette', 8),
(113, 'Nicolás ', 'Tagliafico', 8),
(115, 'Corentin ', 'Tolisso', 8),
(117, 'Bruno ', 'Fernandes', 10),
(119, 'Marcus ', 'Rashford', 10),
(121, 'Raphaël ', 'Varane', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'franerre15@gmail.com', '$2y$10$L2Fr/m2ADI8MXbvAPns.O.mM6DbF/3sXPAajIHRjtdayLp7a0.5Pm');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

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
