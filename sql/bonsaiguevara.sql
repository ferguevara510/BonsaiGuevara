-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2021 a las 01:48:45
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bonsaiguevara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `usuario` varchar(25) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoPaterno` varchar(100) NOT NULL,
  `apellidoMaterno` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `numTelefono` varchar(10) NOT NULL,
  `contrasena` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`usuario`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `correo`, `direccion`, `numTelefono`, `contrasena`) VALUES
('admin', 'admin', '.', '.', 'admin@outlook.com', 'av. Xalapa', '8157653', 'admin'),
('OctavioGuevara', 'OCTAVIO CESAR', 'GUEVARA', 'TORRES', 'bonsai_guevara@outlook.com', 'CALLE DEL CAMPESINO #46 COLONIA OBRERO CAMPESINA CP:91020 XALAPA VERACRUZ', '2281774694', '62f82f9a8d525347bcbfec24924fd6ad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bonsai`
--

CREATE TABLE `bonsai` (
  `id_bonsai` int(5) NOT NULL,
  `imagenBonsai` varchar(250) NOT NULL,
  `id_especie` int(5) NOT NULL,
  `estilo` int(1) NOT NULL,
  `nombreCientifico` varchar(50) NOT NULL,
  `nombreComun` varchar(50) NOT NULL,
  `edad` varchar(50) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bonsai`
--

INSERT INTO `bonsai` (`id_bonsai`, `imagenBonsai`, `id_especie`, `estilo`, `nombreCientifico`, `nombreComun`, `edad`, `precio`) VALUES
(1, '../../publico/imagenes/default.jpg', 14, 1, 'prueba', 'prueba', '1 año.', 999),
(2, '../../publico/imagenes/default.jpg', 14, 1, 'prueba1', 'prueba1', '1 año.', 199),
(3, '../../publico/imagenes/default.jpg', 14, 1, 'prueba1', 'prueba2', '1 año.', 1599),
(4, '../../publico/imagenes/default.jpg', 14, 1, 'prueba1', 'prueba3', '1 año.', 499);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritoventa`
--

CREATE TABLE `carritoventa` (
  `id_carrito` int(5) NOT NULL,
  `id_cliente` int(5) NOT NULL,
  `id_bonsai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carritoventa`
--

INSERT INTO `carritoventa` (`id_carrito`, `id_cliente`, `id_bonsai`) VALUES
(16094, 3, 1),
(16094, 3, 2),
(16094, 3, 3),
(25055, 3, 1),
(25055, 3, 2),
(25186, 3, 1),
(25186, 3, 2),
(25186, 3, 3),
(75849, 3, 4),
(81376, 3, 3),
(83560, 3, 4),
(86849, 3, 1),
(86849, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `folio` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `duracion` int(1) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `id_cliente` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoPaterno` varchar(100) NOT NULL,
  `apellidoMaterno` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(64) NOT NULL,
  `numTelefono` varchar(10) NOT NULL,
  `imagenPerfil` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `correo`, `contrasena`, `numTelefono`, `imagenPerfil`) VALUES
(1, 'Johnny', 'Bonilla', 'Lara', 'johnny@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2281190765', '../../publico/perfiles/608862291eb7d'),
(2, 'root', '-', '-', 'root@gmail.com', '63a9f0ea7bb98050796b649e85481845', '911', '../../publico/imagenes/perfil.jpg'),
(3, 'Pedro', 'Martinez', 'Sanchez', 'pedro@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2281987654', '../../publico/imagenes/perfil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuidado`
--

CREATE TABLE `cuidado` (
  `id_cuidado` int(5) NOT NULL,
  `id_especie` int(5) NOT NULL,
  `estilo` int(1) NOT NULL,
  `cantidadRiego` varchar(100) NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `maceta` varchar(100) NOT NULL,
  `tiempoTransplante` varchar(50) NOT NULL,
  `tipoCultivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id_direccion` int(5) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numExt` varchar(5) NOT NULL,
  `numInt` varchar(5) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `codigoPostal` varchar(5) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `calle`, `numExt`, `numInt`, `colonia`, `codigoPostal`, `ciudad`, `estado`) VALUES
(22, 'Diego Rivera', '19', '19', 'Unidad y Progreso', '91020', 'Xalapa', 'Veracruz'),
(23, 'Martires 28 de Agosto', '22', '22', 'San Bruno', '91049', 'Xalapa', 'Veracruz'),
(24, 'Diego Rivera', '19', '19', 'Unidad y Progreso', '91043', 'Xalapa', 'Veracruz'),
(25, 'Diego Rivera', '19', '19', 'Unidad y Progreso', '91043', 'Xalapa', 'Veracruz'),
(26, 'Diego Rivera', '19', '19', 'Unidad y Progreso', '91080', 'Cancún', 'Quintana Roo'),
(27, 'Londres', '247', '247', 'Coyoacan', '04100', 'Ciudad de México', 'CDMX'),
(28, 'Londres', '22', '22', 'San Bruno', '04100', 'Cancún', 'Quintana Roo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `duda`
--

CREATE TABLE `duda` (
  `id_duda` int(5) NOT NULL,
  `correo` varchar(75) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `respuesta` varchar(500) NOT NULL,
  `id_cliente` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especie`
--

CREATE TABLE `especie` (
  `id_especie` int(5) NOT NULL,
  `nombreEspecie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especie`
--

INSERT INTO `especie` (`id_especie`, `nombreEspecie`) VALUES
(1, 'CONIFERA'),
(2, 'FICOS RETUSA'),
(3, 'FICOS NERIFOLIA'),
(4, 'FICOS VARIEGADO'),
(5, 'CAPALES'),
(6, 'BUGAMBILIA ESPECTABILIS'),
(7, 'JUNIPEROS PROCUMBENS'),
(8, 'GINGO BILOBA'),
(9, 'PINO PINEA'),
(10, 'ABIES RELIGIOSA'),
(11, 'ABIES ALBA'),
(12, 'PIRACANTA ANGUSTITULIA AMARILLA'),
(13, 'PIRACANTA ANGUSTITULIA ROJA'),
(14, 'ACACIA PENATULA'),
(15, 'ACER PALMATUM'),
(16, 'JACARANDA MIMOSIDOLIA'),
(17, 'CRIJOTOMENA JAPONICA'),
(18, 'CEIBA PENTANDRA'),
(19, 'RODADEN DRUM INDICUM'),
(20, 'CEDRELLA O DORATA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `monto` float NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id_pago`, `fecha`, `monto`, `tipo`) VALUES
(675, '2021-05-18', 1498, 'OXXO'),
(3951, '2021-05-17', 1198, 'Tarjeta'),
(14279, '2021-05-15', 2797, 'PayPal'),
(17654, '2021-05-15', 499, 'Contra-Entrega'),
(75046, '2021-05-17', 499, 'Contra-Entrega'),
(81949, '2021-05-18', 1599, 'Tarjeta'),
(95989, '2021-05-17', 2797, 'Tarjeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `folio` int(5) NOT NULL,
  `id_carrito` int(5) NOT NULL,
  `id_direccion` int(5) NOT NULL,
  `id_pago` int(5) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`folio`, `id_carrito`, `id_direccion`, `id_pago`, `estado`) VALUES
(1, 75849, 22, 17654, 'Enviado'),
(2, 16094, 23, 14279, 'Preparando'),
(3, 83560, 24, 75046, 'Cancelado'),
(4, 25055, 25, 3951, 'Enviado'),
(5, 25186, 26, 95989, 'Cancelado'),
(6, 86849, 27, 675, 'Preparando'),
(7, 81376, 28, 81949, 'Enviado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `bonsai`
--
ALTER TABLE `bonsai`
  ADD PRIMARY KEY (`id_bonsai`),
  ADD KEY `id_especie` (`id_especie`);

--
-- Indices de la tabla `carritoventa`
--
ALTER TABLE `carritoventa`
  ADD PRIMARY KEY (`id_carrito`,`id_cliente`,`id_bonsai`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cuidado`
--
ALTER TABLE `cuidado`
  ADD PRIMARY KEY (`id_cuidado`),
  ADD KEY `id_especie` (`id_especie`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `duda`
--
ALTER TABLE `duda`
  ADD PRIMARY KEY (`id_duda`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `especie`
--
ALTER TABLE `especie`
  ADD PRIMARY KEY (`id_especie`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `id_carrito` (`id_carrito`),
  ADD KEY `id_direccion` (`id_direccion`),
  ADD KEY `id_pago` (`id_pago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bonsai`
--
ALTER TABLE `bonsai`
  MODIFY `id_bonsai` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `folio` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cuidado`
--
ALTER TABLE `cuidado`
  MODIFY `id_cuidado` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_direccion` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `duda`
--
ALTER TABLE `duda`
  MODIFY `id_duda` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especie`
--
ALTER TABLE `especie`
  MODIFY `id_especie` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99898;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `folio` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bonsai`
--
ALTER TABLE `bonsai`
  ADD CONSTRAINT `bonsai_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `especie` (`id_especie`);

--
-- Filtros para la tabla `carritoventa`
--
ALTER TABLE `carritoventa`
  ADD CONSTRAINT `carritoventa_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `carritoventa_ibfk_2` FOREIGN KEY (`id_bonsai`) REFERENCES `bonsai` (`id_bonsai`);

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `cuidado`
--
ALTER TABLE `cuidado`
  ADD CONSTRAINT `cuidado_ibfk_1` FOREIGN KEY (`id_especie`) REFERENCES `especie` (`id_especie`);

--
-- Filtros para la tabla `duda`
--
ALTER TABLE `duda`
  ADD CONSTRAINT `duda_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_carrito`) REFERENCES `carritoventa` (`id_carrito`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_direccion`) REFERENCES `direccion` (`id_direccion`),
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`id_pago`) REFERENCES `pago` (`id_pago`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
