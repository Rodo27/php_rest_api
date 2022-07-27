-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-07-2022 a las 20:21:21
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

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
-- Estructura de tabla para la tabla `instructors`
--

DROP TABLE IF EXISTS `instructors`;
CREATE TABLE IF NOT EXISTS `instructors` (
  `id_instructor` int(11) NOT NULL AUTO_INCREMENT,
  `name_instructor` varchar(100) DEFAULT NULL,
  `username_instructor` varchar(100) DEFAULT NULL,
  `email_instructor` varchar(70) NOT NULL,
  `password_instructor` varchar(150) NOT NULL,
  `token_instructor` varchar(150) DEFAULT NULL,
  `token_exp_instructor` varchar(150) DEFAULT NULL,
  `date_created_instructor` date DEFAULT NULL,
  `date_update_instructor` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_instructor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instructors`
--

INSERT INTO `instructors` (`id_instructor`, `name_instructor`, `username_instructor`, `email_instructor`, `password_instructor`, `token_instructor`, `token_exp_instructor`, `date_created_instructor`, `date_update_instructor`) VALUES
(1, NULL, NULL, 'aldo1rodrigo@cmgo.org.mx', '$2a$07$Cam8h88K3NHemXNGPql1cukslZNik3BxJJByrGNwuazlgP59MY4AS', NULL, NULL, NULL, '2022-07-27 18:25:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
