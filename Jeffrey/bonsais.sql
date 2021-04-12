-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2021 a las 20:36:19
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bonsais`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bonsais`
--

CREATE TABLE `bonsais` (
  `id` int(11) NOT NULL,
  `ImageURL` varchar(255) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bonsais`
--

INSERT INTO `bonsais` (`id`, `ImageURL`, `Nombre`, `Price`, `Quantity`) VALUES
(15, 'Diagrama Arquitectura.png', 'asdasdasdasdasdasd', 5, 3),
(16, 'Registrar', 'asdasdasdasdasd', 5, 1),
(17, 'CU-001.png', 'asdasdasdasdaasd', 4, 4),
(18, 'images/Diagrama Arquitectura.png', 'Jeffrey', 3, 2),
(19, 'images/', 'qwe', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bonsais`
--
ALTER TABLE `bonsais`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bonsais`
--
ALTER TABLE `bonsais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
