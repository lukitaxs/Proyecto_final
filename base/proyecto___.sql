/*
Navicat MySQL Data Transfer

Source Server         : proyecto
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : sistema_tickets

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2026-07-24 07:50:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `activo_tecnologico`
-- ----------------------------
DROP TABLE IF EXISTS `activo_tecnologico`;
CREATE TABLE `activo_tecnologico` (
  `id_activo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_dispositivo` varchar(50) NOT NULL,
  `estado_actual` varchar(50) NOT NULL,
  `numero_serie` varchar(100) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `codigo_inventario` varchar(50) DEFAULT NULL,
  `ubicacion_fisica` varchar(100) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  PRIMARY KEY (`id_activo`),
  UNIQUE KEY `numero_serie` (`numero_serie`),
  UNIQUE KEY `codigo_inventario` (`codigo_inventario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of activo_tecnologico
-- ----------------------------

-- ----------------------------
-- Table structure for `historial_asignacion`
-- ----------------------------
DROP TABLE IF EXISTS `historial_asignacion`;
CREATE TABLE `historial_asignacion` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id_asignacion`),
  KEY `fk_historial_ticket` (`id_ticket`),
  KEY `fk_historial_tecnico` (`id_tecnico`),
  CONSTRAINT `fk_historial_tecnico` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnico` (`id_tecnico`) ON UPDATE CASCADE,
  CONSTRAINT `fk_historial_ticket` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id_ticket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of historial_asignacion
-- ----------------------------

-- ----------------------------
-- Table structure for `intervencion_diagnostico`
-- ----------------------------
DROP TABLE IF EXISTS `intervencion_diagnostico`;
CREATE TABLE `intervencion_diagnostico` (
  `id_intervencion` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `id_activo` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `diagnostico` text NOT NULL,
  `solucion` text DEFAULT NULL,
  PRIMARY KEY (`id_intervencion`),
  KEY `fk_intervencion_ticket` (`id_ticket`),
  KEY `fk_intervencion_tecnico` (`id_tecnico`),
  KEY `fk_intervencion_activo` (`id_activo`),
  CONSTRAINT `fk_intervencion_activo` FOREIGN KEY (`id_activo`) REFERENCES `activo_tecnologico` (`id_activo`) ON UPDATE CASCADE,
  CONSTRAINT `fk_intervencion_tecnico` FOREIGN KEY (`id_tecnico`) REFERENCES `tecnico` (`id_tecnico`) ON UPDATE CASCADE,
  CONSTRAINT `fk_intervencion_ticket` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id_ticket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of intervencion_diagnostico
-- ----------------------------

-- ----------------------------
-- Table structure for `rol`
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of rol
-- ----------------------------

-- ----------------------------
-- Table structure for `tecnico`
-- ----------------------------
DROP TABLE IF EXISTS `tecnico`;
CREATE TABLE `tecnico` (
  `id_tecnico` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `rol` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tecnico`),
  KEY `fk_tecnico_usuario` (`id_usuario`),
  CONSTRAINT `fk_tecnico_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tecnico
-- ----------------------------

-- ----------------------------
-- Table structure for `ticket`
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `prioridad` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_clierre` datetime DEFAULT NULL,
  PRIMARY KEY (`id_ticket`),
  KEY `fk_ticket_usuario` (`id_usuario`),
  CONSTRAINT `fk_ticket_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of ticket
-- ----------------------------

-- ----------------------------
-- Table structure for `ubicacion`
-- ----------------------------
DROP TABLE IF EXISTS `ubicacion`;
CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_activo` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  PRIMARY KEY (`id_ubicacion`),
  KEY `fk_ubicacion_usuario` (`id_usuario`),
  KEY `fk_ubicacion_activo` (`id_activo`),
  CONSTRAINT `fk_ubicacion_activo` FOREIGN KEY (`id_activo`) REFERENCES `activo_tecnologico` (`id_activo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ubicacion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of ubicacion
-- ----------------------------

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `correo` (`correo`),
  KEY `fk_usuario_rol` (`id_rol`),
  CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of usuario
-- ----------------------------
