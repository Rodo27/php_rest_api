-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-07-2022 a las 20:58:24
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id_course` int(11) NOT NULL AUTO_INCREMENT,
  `title_course` text,
  `description_course` text,
  `id_instructor_course` int(11) NOT NULL DEFAULT '0',
  `image_course` text,
  `price_course` float NOT NULL DEFAULT '0',
  `date_created_course` date DEFAULT NULL,
  `date_updated_course` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_course`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `courses`
--

INSERT INTO `courses` (`id_course`, `title_course`, `description_course`, `id_instructor_course`, `image_course`, `price_course`, `date_created_course`, `date_updated_course`) VALUES
(1, 'JavaScript', 'How to use JavaScript ', 1, '4', 14.99, '2022-07-18', '2022-07-18 14:50:49'),
(2, 'Python', 'Learn Python and create an App.', 1, '4', 24.5, '2022-07-18', '2022-07-18 14:50:51'),
(3, 'PHP', 'PHP is a language to developer web applications.', 2, '4', 30, '2022-07-18', '2022-07-18 19:49:31'),
(4, 'HTML', 'HTML is a tag language.', 3, '4', 15, '2022-07-18', '2022-07-18 19:49:35'),
(5, 'CSS', 'CSS helps to set a Style in your web.', 4, '3', 12, '2022-07-18', '2022-07-18 19:49:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
