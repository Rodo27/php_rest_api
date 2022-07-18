-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2022 a las 11:46:44
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database_1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `courses`
--

CREATE TABLE `courses` (
  `id_course` int(11) NOT NULL,
  `title_course` text DEFAULT NULL,
  `description_course` text DEFAULT NULL,
  `id_instructor_course` int(11) NOT NULL DEFAULT 0,
  `image_course` text DEFAULT NULL,
  `price_course` float NOT NULL DEFAULT 0,
  `date_created_course` date DEFAULT NULL,
  `date_updated_course` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id_course`, `title_course`, `description_course`, `id_instructor_course`, `image_course`, `price_course`, `date_created_course`, `date_updated_course`) VALUES
(1, 'JavaScript', 'How to use JavaScript ', 1, NULL, 14.99, '2022-07-18', '2022-07-18 08:22:08'),
(2, 'Python', 'Learn Python and create an App.', 1, NULL, 24.5, '2022-07-18', '2022-07-18 09:40:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutors`
--

CREATE TABLE `tutors` (
  `id_tutor` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id_course`);

--
-- Indices de la tabla `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id_tutor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `courses`
--
ALTER TABLE `courses`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
