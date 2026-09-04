-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2026 a las 02:00:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto__`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activo_tecnologico`
--

CREATE TABLE `activo_tecnologico` (
  `id_activo` int(11) NOT NULL,
  `tipo_dispositivo` varchar(50) NOT NULL,
  `estado_actual` varchar(50) NOT NULL,
  `numero_serie` varchar(100) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo_inventario` varchar(50) DEFAULT NULL,
  `ubicacion_fisica` varchar(100) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `activo_tecnologico`
--

INSERT INTO `activo_tecnologico` (`id_activo`, `tipo_dispositivo`, `estado_actual`, `numero_serie`, `marca`, `modelo`, `codigo_inventario`, `ubicacion_fisica`, `observaciones`) VALUES
(9, 'Monitor', 'En reparación', 'test01', 'Samsung', 'Odyssey G3', 'it-001', 'ceibal', 'pantalla rota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_asignacion`
--

CREATE TABLE `historial_asignacion` (
  `id_asignacion` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intervencion_diagnostico`
--

CREATE TABLE `intervencion_diagnostico` (
  `id_intervencion` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `id_activo` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `diagnostico` text NOT NULL,
  `solucion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`) VALUES
(4, 'Acer'),
(9, 'AOC'),
(6, 'Apple'),
(5, 'ASUS'),
(13, 'Brother'),
(14, 'Canon'),
(3, 'Dell'),
(17, 'Desconocida'),
(12, 'Epson'),
(16, 'Genius'),
(1, 'HP'),
(2, 'Lenovo'),
(8, 'LG'),
(15, 'Logitech'),
(11, 'Philips'),
(7, 'Samsung'),
(10, 'ViewSonic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `nombre_modelo` varchar(50) NOT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nombre_modelo`, `id_marca`) VALUES
(1, 'Pavilion', 1),
(2, 'ThinkPad', 2),
(3, 'Inspiron', 3),
(4, 'Aspire', 4),
(5, 'VivoBook', 5),
(6, 'MacBook Air', 6),
(7, 'ProBook', 1),
(8, 'EliteBook', 1),
(9, 'ProDesk', 1),
(10, 'IdeaPad', 2),
(11, 'ThinkCentre', 2),
(12, 'Latitude', 3),
(13, 'OptiPlex', 3),
(14, 'Veriton', 4),
(15, 'ExpertBook', 5),
(16, 'MacBook Pro', 6),
(17, 'iMac', 6),
(18, 'Odyssey G3', 7),
(19, 'Essential Monitor', 7),
(20, 'UltraGear', 8),
(21, 'UltraWide', 8),
(22, 'Serie B2', 9),
(23, 'Serie G2', 9),
(24, 'VA Series', 10),
(25, 'VX Series', 10),
(26, 'Serie V', 11),
(27, 'EcoTank', 12),
(28, 'WorkForce', 12),
(29, 'HL Series', 13),
(30, 'DCP Series', 13),
(31, 'PIXMA', 14),
(32, 'imageCLASS', 14),
(33, 'Desconocido', 15),
(34, 'Desconocido', 16),
(35, 'Desconocido', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre`, `descripcion`) VALUES
(1, 'Solicitante', 'Crea tickets y solicitudes'),
(2, 'Técnico', 'Atiende tickets y solicitudes'),
(3, 'Administrador', 'Administra el sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `prioridad` varchar(20) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'Pendiente',
  `fecha_creacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `id_usuario`, `titulo`, `tipo`, `prioridad`, `descripcion`, `estado`, `fecha_creacion`) VALUES
(2, 5, 'instalar windows', 'instalacion_software', 'Media', 'instalar windows 10 en pc 001', 'En proceso', '2026-09-01 21:45:59'),
(3, 5, 'instalar windows', 'instalacion_software', 'Media', 'instalar windows 10 en pc 001', 'Finalizada', '2026-09-01 21:46:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE `tecnico` (
  `id_tecnico` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`id_tecnico`, `id_usuario`, `rol`, `area`, `especialidad`) VALUES
(2, 5, 'Técnico de mantenimiento', 'Software', 'Reparación de equipos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `prioridad` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_clierre` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `id_usuario`, `titulo`, `descripcion`, `prioridad`, `estado`, `fecha_creacion`, `fecha_clierre`) VALUES
(6, 5, 'no lee disco', 'no enciende', 'alta', 'Cerrado', '2026-08-29 13:38:00', '2026-09-03 00:58:32'),
(7, 14, 'la computadora no enciende', 'no enciende', 'alta', 'Cerrado', '2026-09-03 01:01:15', '2026-09-03 01:03:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_activo` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasenia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_rol`, `nombre`, `correo`, `contrasenia`) VALUES
(5, 3, 'sofi', 'lukinhasnuevo2007@gmail.com', '$2y$10$AhQLc0.1pWeVS2OUNPE1kOWsD1.ajATfPTwpYUtMhm3lbkmppEY4y'),
(14, 1, 'lucas', 'lucaassxs@gmail.com', '$2y$10$e5IDfiEDV.mNKFXH7/toP.J5DzeEN7jQ8IB/QY1RD2rOyjTGlbHyS'),
(15, 2, 'tecnico1', 'tecnico@gmail.com', '$2y$10$3ESGT0UZ64vVdui0VXcfnu1Hkzo7otAu.rxgKUqpyUkRUIYJnAWJy'),
(16, 3, 'administrador', 'administrado2@gmail.com', '$2y$10$gQ5PjPq7OH8hHa/NT0g10edzmpiCPE8mItBlX1O9I/Q8NguWXLVwm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activo_tecnologico`
--
ALTER TABLE `activo_tecnologico`
  ADD PRIMARY KEY (`id_activo`),
  ADD UNIQUE KEY `numero_serie` (`numero_serie`),
  ADD UNIQUE KEY `codigo_inventario` (`codigo_inventario`);

--
-- Indices de la tabla `historial_asignacion`
--
ALTER TABLE `historial_asignacion`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `fk_historial_ticket` (`id_ticket`),
  ADD KEY `fk_historial_tecnico` (`id_tecnico`);

--
-- Indices de la tabla `intervencion_diagnostico`
--
ALTER TABLE `intervencion_diagnostico`
  ADD PRIMARY KEY (`id_intervencion`),
  ADD KEY `fk_intervencion_ticket` (`id_ticket`),
  ADD KEY `fk_intervencion_tecnico` (`id_tecnico`),
  ADD KEY `fk_intervencion_activo` (`id_activo`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`),
  ADD UNIQUE KEY `nombre_marca` (`nombre_marca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`id_tecnico`),
  ADD KEY `fk_tecnico_usuario` (`id_usuario`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `fk_ticket_usuario` (`id_usuario`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`),
  ADD KEY `fk_ubicacion_usuario` (`id_usuario`),
  ADD KEY `fk_ubicacion_activo` (`id_activo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `fk_usuario_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activo_tecnologico`
--
ALTER TABLE `activo_tecnologico`
  MODIFY `id_activo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `historial_asignacion`
--
ALTER TABLE `historial_asignacion`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `intervencion_diagnostico`
--
ALTER TABLE `intervencion_diagnostico`
  MODIFY `id_intervencion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id_tecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_asignacion`
--
ALTER TABLE `historial_asignacion`
  ADD CONSTRAINT `fk_historial_tecnico` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnico` (`id_tecnico`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_historial_ticket` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id_ticket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `intervencion_diagnostico`
--
ALTER TABLE `intervencion_diagnostico`
  ADD CONSTRAINT `fk_intervencion_activo` FOREIGN KEY (`id_activo`) REFERENCES `activo_tecnologico` (`id_activo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_intervencion_tecnico` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnico` (`id_tecnico`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_intervencion_ticket` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id_ticket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD CONSTRAINT `fk_tecnico_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `fk_ubicacion_activo` FOREIGN KEY (`id_activo`) REFERENCES `activo_tecnologico` (`id_activo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ubicacion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
