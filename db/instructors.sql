-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-07-2022 a las 20:57:58
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
-- Estructura de tabla para la tabla `instructors`
--

DROP TABLE IF EXISTS `instructors`;
CREATE TABLE IF NOT EXISTS `instructors` (
  `id_instructor` int(11) NOT NULL AUTO_INCREMENT,
  `name_instructor` varchar(100) NOT NULL,
  `username_instructor` varchar(100) NOT NULL,
  `email_instructor` varchar(70) NOT NULL,
  `password_instructor` varchar(50) NOT NULL,
  `token_instructor` varchar(150) NOT NULL,
  PRIMARY KEY (`id_instructor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instructors`
--

INSERT INTO `instructors` (`id_instructor`, `name_instructor`, `username_instructor`, `email_instructor`, `password_instructor`, `token_instructor`) VALUES
(1, 'Aldo Rodrigo Hernandez Lopez', 'aldorodrigo27', 'aldo1rodrigo@gmail.com', '123456', ''),
(2, 'Fernando Rubio Rivera', 'fernandoriverar', 'sasukerivera@gmail.com', '123456789', ''),
(3, 'Claudia Flores Moreno', 'claudiaflores', 'caludiaflores@gmail.com', '123456', ''),
(4, 'Victor Marquez Moncada', 'victormm', 'victormm@gmail.com', '123456789', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
