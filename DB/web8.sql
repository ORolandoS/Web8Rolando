-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.9-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para web8
CREATE DATABASE IF NOT EXISTS `web8` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `web8`;

-- Volcando estructura para tabla web8.compra
CREATE TABLE IF NOT EXISTS `compra` (
  `id_compra` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) unsigned DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla web8.compra: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` (`id_compra`, `id_producto`, `cantidad`, `fecha`, `hora`, `activo`) VALUES
	(1, 1, 20, '2020-09-29', '21:52:23', 1),
	(2, 1, 30, '2020-09-29', '21:53:07', 1),
	(3, 12, 15, '2020-09-29', '21:54:52', 1),
	(4, 12, 16, '2020-09-29', '21:55:06', 1),
	(5, 2, 5, '2020-09-30', '08:58:48', 1),
	(6, 15, 33, '2020-09-30', '09:04:01', 1);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;

-- Volcando estructura para tabla web8.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `id_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `detalle` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla web8.producto: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `detalle`, `foto`, `fecha`, `hora`, `activo`) VALUES
	(1, 'Chocolate', 15, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '22:15:45', 1),
	(2, 'Chocolate', 15, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '16:17:17', 0),
	(3, 'Chocolate', 15, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '16:31:16', 1),
	(4, 'Chocolate', 15, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '16:31:54', 0),
	(5, 'Chocolate', 15, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '16:32:04', 1),
	(6, 'Chocolate', 15, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '16:33:40', 1),
	(7, 'Chocolate', 15, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '16:34:23', 1),
	(8, 'Chocolate', 15, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '16:34:45', 0),
	(9, 'Chocolate', 15, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '16:34:56', 1),
	(10, 'Chocolate', 15, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '16:35:21', 1),
	(11, 'Chocolate', 15, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '16:36:10', 1),
	(12, 'Arroz', 8, 'qweqwe', 'Chocolate.jpg', '2020-09-12', '16:36:41', 1),
	(14, 'galleta de chocolate', 2, 'crocante', 'galleta.jpg', '2020-09-29', '17:04:21', 1),
	(15, 'otra Galleta', 20, 'misma galleta', 'galleta.jpg', '2020-09-29', '17:14:03', 1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;

-- Volcando estructura para tabla web8.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `fotografia` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla web8.usuario: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`, `nombres`, `apellidos`, `fotografia`, `usuario`, `contrasena`, `nivel`, `fecha`, `hora`, `activo`) VALUES
	(1, 'Rol', 'Aruquipa', 'tux01.jpg', 'rol', '96e3f164788cb3c54bbf71647b7f54457ec3c3fb', 1, '2020-09-30', '00:28:40', 1),
	(2, 'Rola', 'Aruquipa', 'tux02.jpg', 'rola', 'ffc5caaeee92ddf691912db5e91706dd4f63c9fd', 1, '2020-09-30', '00:30:03', 1),
	(3, 'carlos', 'mamani', 'tux03.jpg', 'car', 'ab5e2bca84933118bbc9d48ffaccce3bac4eeb64', 1, '2020-09-30', '00:50:35', 1),
	(4, 'maria', 'Acho', 'tux04.jpg', 'maria', 'e21fc56c1a272b630e0d1439079d0598cf8b8329', 1, '2020-09-30', '00:51:09', 1),
	(5, 'jose', 'calle', 'tux05.png', 'jose', '4a3487e57d90e2084654b6d23937e75af5c8ee55', 1, '2020-09-30', '00:56:05', 1),
	(6, 'carolina', 'mamani', 'tux06.jpg', 'carolina', 'c33873c987bc9d5bc6a51e095311d747b85a78e1', 1, '2020-09-30', '00:56:58', 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para tabla web8.venta
CREATE TABLE IF NOT EXISTS `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `nit` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `total` float NOT NULL DEFAULT '0',
  `cancelado` float NOT NULL DEFAULT '0',
  `cambio` float NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla web8.venta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` (`id_venta`, `nombre`, `nit`, `total`, `cancelado`, `cambio`, `fecha`, `hora`, `activo`) VALUES
	(1, 'Juan Carlos', '6060444', 30, 50, 20, '2020-09-30', '07:11:51', 1);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;

-- Volcando estructura para tabla web8.ventadetalle
CREATE TABLE IF NOT EXISTS `ventadetalle` (
  `id_ventadetalle` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_venta` int(10) unsigned NOT NULL,
  `id_producto` int(10) unsigned DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL DEFAULT '0',
  `total` float NOT NULL DEFAULT '0',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `hora` time NOT NULL DEFAULT '00:00:00',
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ventadetalle`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla web8.ventadetalle: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventadetalle` DISABLE KEYS */;
INSERT INTO `ventadetalle` (`id_ventadetalle`, `id_venta`, `id_producto`, `cantidad`, `precio`, `total`, `fecha`, `hora`, `activo`) VALUES
	(1, 1, 1, 2, 15, 30, '2020-09-30', '07:11:51', 1);
/*!40000 ALTER TABLE `ventadetalle` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
