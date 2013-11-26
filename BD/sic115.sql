-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-11-2013 a las 14:41:14
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sic115`
--
CREATE DATABASE IF NOT EXISTS `sic115` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sic115`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anio_contable`
--

CREATE TABLE IF NOT EXISTS `anio_contable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `anio_contable` year(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `anio_contable`
--

INSERT INTO `anio_contable` (`id`, `anio_contable`) VALUES
(1, 2013);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_clasificaciones`
--

CREATE TABLE IF NOT EXISTS `catalogo_clasificaciones` (
  `codigo_clasificacion` int(11) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`codigo_clasificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_clasificaciones`
--

INSERT INTO `catalogo_clasificaciones` (`codigo_clasificacion`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Pasivo'),
(3, 'Capital'),
(4, 'Resultado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_cuentas`
--

CREATE TABLE IF NOT EXISTS `catalogo_cuentas` (
  `codigo_cuenta` varchar(20) NOT NULL,
  `naturaleza` varchar(20) NOT NULL,
  `subgrupo` varchar(10) NOT NULL,
  `nombre_cuenta` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_cuenta`),
  KEY `subgrupo` (`subgrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_cuentas`
--

INSERT INTO `catalogo_cuentas` (`codigo_cuenta`, `naturaleza`, `subgrupo`, `nombre_cuenta`) VALUES
('1.2.1.1', 'activo', '1.2.1', 'Materiales Directos'),
('1.2.1.2', 'activo', '1.2.1', 'Materiales Indirectos'),
('1.2.2.1', 'activo', '1.2.2', 'Botellas de Vino de Naranja'),
('1.2.2.2', 'activo', '1.2.2', 'Botellas de Vino de Mandarina'),
('1.2.2.3', 'activo', '1.2.2', 'Botellas de Vino de Piña'),
('1.2.2.4', 'activo', '1.2.2', 'Botellas de Vino de Marañón'),
('1.2.2.5', 'activo', '1.2.2', 'Botellas de Vino de Coco'),
('1.2.2.6', 'activo', '1.2.2', 'Botellas de Vino de Rosa de Jamaica'),
('4.1.1.1', 'resultado', '4.1.1', 'Mano de Obra Directa'),
('4.1.1.2', 'resultado', '4.1.1', 'Costo de Materias Primas'),
('4.1.2.1', 'resultado', '4.1.2', 'Sueldos y Salarios'),
('4.1.2.2', 'resultado', '4.1.2', 'Prestaciones Laborales'),
('4.1.2.3', 'resultado', '4.1.2', 'Servicios Médicos'),
('4.1.3.1', 'resultado', '4.1.3', 'Luz'),
('4.1.3.2', 'resultado', '4.1.3', 'Teléfono'),
('4.1.3.3', 'resultado', '4.1.3', 'Agua'),
('4.1.3.4', 'resultado', '4.1.3', 'Internet'),
('4.1.4.1', 'resultado', '4.1.4', 'Depreciación de bienes Muebles'),
('4.1.4.2', 'resultado', '4.1.4', 'Depreciación de Maquinaria y equipo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_grupos`
--

CREATE TABLE IF NOT EXISTS `catalogo_grupos` (
  `codigo_grupo` varchar(10) NOT NULL,
  `clasificacion` int(11) DEFAULT NULL,
  `naturaleza` varchar(15) NOT NULL,
  `nombre_grupo` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_grupo`),
  KEY `clasificacion` (`clasificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_grupos`
--

INSERT INTO `catalogo_grupos` (`codigo_grupo`, `clasificacion`, `naturaleza`, `nombre_grupo`) VALUES
('1.1', 1, 'activo', 'Activo Circulante'),
('1.2', 1, 'activo', 'Inventarios'),
('1.3', 1, 'activo', 'Activo Fijo'),
('1.4', 1, 'activo', 'Depreciación Acumulada'),
('2.1', 2, 'pasivo', 'Cuentas por Pagar'),
('3.1', 3, 'capital', 'Capital Social'),
('4.1', 4, 'resultado', 'Costos'),
('4.2', 4, 'resultado', 'Ingresos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_subcuentas`
--

CREATE TABLE IF NOT EXISTS `catalogo_subcuentas` (
  `codigo_subcuenta` varchar(20) NOT NULL,
  `naturaleza` varchar(20) NOT NULL,
  `cuenta` varchar(20) NOT NULL,
  `nombre_subcuenta` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_subcuenta`),
  KEY `cuenta` (`cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_subcuentas`
--

INSERT INTO `catalogo_subcuentas` (`codigo_subcuenta`, `naturaleza`, `cuenta`, `nombre_subcuenta`) VALUES
('1.2.1.1.1', 'activo', '1.2.1.1', 'Naranja'),
('1.2.1.1.2', 'activo', '1.2.1.1', 'Mandarina'),
('1.2.1.1.3', 'activo', '1.2.1.1', 'Piña'),
('1.2.1.1.4', 'activo', '1.2.1.1', 'Marañón'),
('1.2.1.1.5', 'activo', '1.2.1.1', 'Coco'),
('1.2.1.1.6', 'activo', '1.2.1.1', 'Rosa de Jamaica'),
('1.2.1.2.1', 'activo', '1.2.1.2', 'Azúcar'),
('1.2.1.2.2', 'activo', '1.2.1.2', 'Levadura'),
('1.2.1.2.3', 'activo', '1.2.1.2', 'Cápsulas de Seguridad'),
('1.2.1.2.4', 'activo', '1.2.1.2', 'Etiquetas'),
('1.2.1.2.5', 'activo', '1.2.1.2', 'Cajas'),
('4.1.2.2.1', 'resultado', '4.1.2.2', 'Aguinaldo'),
('4.1.2.2.2', 'resultado', '4.1.2.2', 'Vacaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo_subgrupos`
--

CREATE TABLE IF NOT EXISTS `catalogo_subgrupos` (
  `codigo_subgrupo` varchar(20) NOT NULL,
  `naturaleza` varchar(15) NOT NULL,
  `grupo` varchar(20) NOT NULL,
  `nombre_subgrupo` varchar(50) NOT NULL,
  PRIMARY KEY (`codigo_subgrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo_subgrupos`
--

INSERT INTO `catalogo_subgrupos` (`codigo_subgrupo`, `naturaleza`, `grupo`, `nombre_subgrupo`) VALUES
('1.1.1', 'activo', '1.1', 'Efectivo en Caja'),
('1.2.1', 'activo', '1.2', 'Materia Prima'),
('1.2.2', 'activo', '1.2', 'Producto Terminado'),
('1.3.1', 'activo', '1.3', 'Edificio'),
('1.3.2', 'activo', '1.3', 'Maquinaria'),
('1.3.3', 'activo', '1.3', 'Inventario'),
('1.3.4', 'activo', '1.3', 'Automóviles'),
('2.1.1', 'pasivo', '2.1', 'Proveedores'),
('2.1.2', 'pasivo', '2.1', 'Pasivos a Largo plazo'),
('4.1.1', 'resultado', '4.1', 'Costos de Producción'),
('4.1.2', 'resultado', '4.1', 'Gastos de Administración'),
('4.1.3', 'resultado', '4.1', 'Costos Indirectos'),
('4.1.4', 'resultado', '4.1', 'Depreciación'),
('4.2.1', 'resultado', '4.2', 'Ingresos por Venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificaciones`
--

CREATE TABLE IF NOT EXISTS `clasificaciones` (
  `codigo_clasificacion` int(11) NOT NULL,
  `nombre_clasificacion` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`codigo_clasificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `clasificaciones`
--

INSERT INTO `clasificaciones` (`codigo_clasificacion`, `nombre_clasificacion`) VALUES
(1, 'Activo'),
(2, 'Pasivo'),
(3, 'Capital'),
(4, 'Resultado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `codigo_cuenta` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `subgrupo` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `nombre_cuenta` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `tiene_subcuenta` enum('Si','No') COLLATE latin1_general_ci NOT NULL,
  `descripcion_cuenta` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `saldo_debe` double NOT NULL,
  `saldo_haber` double NOT NULL,
  PRIMARY KEY (`codigo_cuenta`),
  KEY `subgrupo` (`subgrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`codigo_cuenta`, `subgrupo`, `nombre_cuenta`, `tiene_subcuenta`, `descripcion_cuenta`, `saldo_debe`, `saldo_haber`) VALUES
('1.2.1.1', '1.2.1', 'Materiales Directos', 'Si', NULL, 0, 0),
('1.2.1.2', '1.2.1', 'Materiales Indirectos', 'Si', NULL, 0, 0),
('1.2.2.1', '1.2.2', 'Botellas de Vino de Naranja', 'No', NULL, 1500, 0),
('1.2.2.2', '1.2.2', 'Botellas de Vino de Mandarina', 'No', NULL, 0, 0),
('1.2.2.3', '1.2.2', 'Botellas de Vino de Piña', 'No', NULL, 0, 0),
('1.2.2.4', '1.2.2', 'Botellas de Vino de Marañón', 'No', NULL, 0, 0),
('1.2.2.5', '1.2.2', 'Botellas de Vino de Coco', 'No', NULL, 0, 1500),
('1.2.2.6', '1.2.2', 'Botellas de Vino de Rosa de Jamaica', 'No', NULL, 0, 0),
('4.1.1.1', '4.1.1', 'Mano de Obra Directa', 'No', NULL, 1500, 0),
('4.1.1.2', '4.1.1', 'Costo de Materias Primas', 'No', NULL, 0, 0),
('4.1.2.1', '4.1.2', 'Sueldos y Salarios', 'No', NULL, 0, 50),
('4.1.2.2', '4.1.2', 'Prestaciones Laborales', 'Si', NULL, 0, 0),
('4.1.2.3', '4.1.2', 'Servicios Médicos', 'No', NULL, 0, 0),
('4.1.3.1', '4.1.3', 'Luz', 'No', NULL, 0, 0),
('4.1.3.2', '4.1.3', 'Teléfono', 'No', NULL, 0, 0),
('4.1.3.3', '4.1.3', 'Agua', 'No', NULL, 0, 1500),
('4.1.3.4', '4.1.3', 'Internet', 'No', NULL, 0, 1250),
('4.1.4.1', '4.1.4', 'Depreciación de bienes Muebles', 'No', NULL, 0, 0),
('4.1.4.2', '4.1.4', 'Depreciación de Maquinaria y Equipo', 'No', NULL, 455.9, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `codigo_grupo` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `nombre_grupo` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `clasificacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`codigo_grupo`),
  KEY `clasificacion` (`clasificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`codigo_grupo`, `nombre_grupo`, `clasificacion`) VALUES
('1.1', 'Activo Circulante', 1),
('1.2', 'Inventarios', 1),
('1.3', 'Activo Fijo', 1),
('1.4', 'Depreciacion Acumulada', 1),
('2.1', 'Cuentas por Pagar', 2),
('3.1', 'Capital Social', 3),
('4.1', 'Costos', 4),
('4.2', 'Ingresos', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iva`
--

CREATE TABLE IF NOT EXISTS `iva` (
  `id` int(1) unsigned NOT NULL,
  `iva` decimal(5,2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `iva`
--

INSERT INTO `iva` (`id`, `iva`) VALUES
(1, '0.13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `transaccion` int(11) NOT NULL,
  `cuenta` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `concepto` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `debe` decimal(18,2) DEFAULT NULL,
  `haber` decimal(18,2) DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `partida_doble` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_creacion` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `usuario_modif` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ip` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `fecha`, `transaccion`, `cuenta`, `concepto`, `debe`, `haber`, `descripcion`, `partida_doble`, `fecha_modificacion`, `usuario_creacion`, `usuario_modif`, `ip`) VALUES
(1, '2013-11-24', 1, '1.2.1.1.1', 'Compra de 120 naranjas agrias', '30.00', '0.00', 'Se compraron 120 naranjas a $0.25 c/u.', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(2, '2013-11-24', 1, '1.2.1.2.1', 'Compra de 40 libras de azúcar', '20.00', '0.00', 'Se compraron 40 libras de azúcar a $0.50 la libra.', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(20, '2013-11-24', 1, '4.1.2.1', 'Cargo de compras', '0.00', '50.00', 'Se cargó el gasto de compras de naranja y azúcar a la cuenta de sueldos y salarios.', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(22, '2013-11-25', 3, '4.1.1.1', 'Pago de los empleados', '1500.00', '0.00', 'Se incurrió en el pago de los empleados por $1500 al contado.', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(23, '2013-11-24', 3, '1.2.2.5', 'Saldando', '0.00', '1500.00', 'Hora de saldar.', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(28, '2013-11-24', 4, '1.2.1.1.1', 'Compra de naranjas abonado a mis vacaciones :(', '500.52', '0.00', 'Ni modo :(', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(29, '2013-11-24', 4, '4.1.2.2.2', 'Compra de naranjas abonado a mis vacaciones :(', '0.00', '500.52', 'Ni modo :(', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(30, '2013-11-06', 4, '1.2.2.1', 'Prueba cuentas', '1500.00', '0.00', '1.2.2.1 al debe, 4.1.3.3 al haber', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(31, '2013-11-06', 4, '4.1.3.3', 'Prueba cuentas', '0.00', '1500.00', '1.2.2.1 al debe, 4.1.3.3 al haber', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(32, '2013-11-08', 5, '1.2.1.1.3', 'test', '1250.00', '0.00', 'test', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(33, '2013-11-08', 5, '4.1.3.4', 'test', '0.00', '1250.00', 'test', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(34, '2013-11-24', 5, '4.1.4.2', 'test', '455.90', '0.00', 'test', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(35, '2013-11-24', 5, '4.1.2.2.2', 'test', '0.00', '455.90', 'test', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(36, '2013-11-24', 5, '4.1.2.2.1', 'Aguinaldo y vacaciones', '2000.00', '0.00', ':O', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(37, '2013-11-24', 5, '4.1.2.2.2', 'Aguinaldo y vacaciones', '0.00', '2000.00', ':O', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(38, '2013-11-25', 6, '1.2.1.1.1', 'Mas naranjitas', '135.26', '0.00', ':D', NULL, NULL, 'administrador', NULL, '127.0.0.1'),
(39, '2013-11-25', 7, '1.2.1.2.3', 'Compra de 10,000 cápsulas de seguridad', '100.00', '0.00', 'Cápsulas de seguridad.', NULL, NULL, 'administrador', NULL, '127.0.0.1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_log`
--

CREATE TABLE IF NOT EXISTS `security_log` (
  `id_evento` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `evento` varchar(160) COLLATE latin1_general_ci NOT NULL,
  `user` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ip` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `security_log`
--

INSERT INTO `security_log` (`id_evento`, `fecha`, `evento`, `user`, `ip`) VALUES
(3, '2013-11-22 18:46:54', 'Se insertó un nuevo registro en la tabla subcuentas. El valor es: 4.1.2.2.4', 'root@localhost', 'root@localhost');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcuentas`
--

CREATE TABLE IF NOT EXISTS `subcuentas` (
  `codigo_subcuenta` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `cuenta` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nombre_subcuenta` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `descripcion` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `naturaleza` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `saldo_debe` double NOT NULL,
  `saldo_haber` double NOT NULL,
  PRIMARY KEY (`codigo_subcuenta`),
  KEY `cuenta` (`cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `subcuentas`
--

INSERT INTO `subcuentas` (`codigo_subcuenta`, `cuenta`, `nombre_subcuenta`, `descripcion`, `naturaleza`, `saldo_debe`, `saldo_haber`) VALUES
('1.2.1.1.1', '1.2.1.1', 'Naranja', 'Cuenta para registrar los movimientos del activo "Naranja"', 'Activo', 665.78, 0),
('1.2.1.1.2', '1.2.1.1', 'Mandarina', 'Cuenta para registrar los movimientos del activo "Mandarina"', 'Activo', 0, 0),
('1.2.1.1.3', '1.2.1.1', 'Piña', 'Cuenta para registrar los movimientos del activo "Piña"', 'Activo', 1250, 0),
('1.2.1.1.4', '1.2.1.1', 'Marañón', 'Cuenta para registrar los movimientos del activo "Marañón"', 'Activo', 0, 0),
('1.2.1.1.5', '1.2.1.1', 'Coco', 'Cuenta para registrar los movimientos del activo "Coco"', 'Activo', 0, 0),
('1.2.1.1.6', '1.2.1.1', 'Rosa de Jamaica', 'Cuenta para registrar los movimientos del activo "Rosa de Jamaica"', 'Activo', 0, 0),
('1.2.1.2.1', '1.2.1.2', 'Azúcar', 'Cuenta para registrar los movimientos del activo "Azucar"', 'Activo', 20, 0),
('1.2.1.2.2', '1.2.1.2', 'Levadura', 'Cuenta para registrar los movimientos del activo "Levadura"', 'Activo', 0, 0),
('1.2.1.2.3', '1.2.1.2', 'Cápsulas de Seguridad', 'Cuenta para registrar los movimientos del activo "Cápsulas de Seguridad"', 'Activo', 100, 0),
('1.2.1.2.4', '1.2.1.2', 'Etiquetas', 'Cuenta para registrar los movimientos del activo "Etiquetas"', 'Activo', 0, 0),
('1.2.1.2.5', '1.2.1.2', 'Cajas', 'Cuenta para registrar los movimientos del activo "Cajas"', 'Activo', 0, 0),
('4.1.2.2.1', '4.1.2.2', 'Aguinaldo', 'Pago equivalente a una quincena de trabajo. El aguinaldo se le dará a un empleado que tenga más de 1 año laborando para la empresa.', 'Resultado', 2000, 0),
('4.1.2.2.2', '4.1.2.2', 'Vacaciones', 'Pago de las vacaciones del empleado.', 'Resultado', 0, 2956.42);

--
-- Disparadores `subcuentas`
--
DROP TRIGGER IF EXISTS `log_insert_subcuentas`;
DELIMITER //
CREATE TRIGGER `log_insert_subcuentas` AFTER INSERT ON `subcuentas`
 FOR EACH ROW BEGIN
		INSERT INTO `sic115`.`security_log` (`fecha`, `evento`, `user`, `ip`) 
		VALUES (concat_ws(' ',CURDATE(), curtime()), concat_WS(' ','Se insertó un nuevo registro en la tabla subcuentas. El valor es:',new.codigo_subcuenta), user(), current_user());
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subgrupos`
--

CREATE TABLE IF NOT EXISTS `subgrupos` (
  `codigo_subgrupo` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nombre_subgrupo` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `grupo` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`codigo_subgrupo`),
  KEY `grupo` (`grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Volcado de datos para la tabla `subgrupos`
--

INSERT INTO `subgrupos` (`codigo_subgrupo`, `nombre_subgrupo`, `grupo`) VALUES
('1.1.1', 'Efectivo en Caja', '1.1'),
('1.2.1', 'Materia Prima', '1.2'),
('1.2.2', 'Producto Terminado', '1.2'),
('1.3.1', 'Edificio', '1.3'),
('1.3.2', 'Maquinaria', '1.3'),
('1.3.3', 'Inventario', '1.3'),
('1.3.4', 'Automóviles', '1.3'),
('2.1.1', 'Proveedores', '2.1'),
('2.1.2', 'Pasivos a Largo Plazo', '2.1'),
('4.1.1', 'Costos de Producción', '4.1'),
('4.1.2', 'Gastos de Administración', '4.1'),
('4.1.3', 'Costos Indirectos', '4.1'),
('4.1.4', 'Depreciación', '4.1'),
('4.2.1', 'Ingresos por Venta', '4.2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario` char(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(40) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(25) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `password`, `fecha`, `tipo`) VALUES
('administrador', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2013-01-10', 'administrador'),
('alex', '60c6d277a8bd81de7fdde19201bf9c58a3df08f4', '2011-08-01', 'estandar'),
('jose', '4a3487e57d90e2084654b6d23937e75af5c8ee55', '2013-11-17', 'administrador'),
('juan', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2013-11-17', 'estandar'),
('pedro', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', '2013-11-22', 'estandar');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ver_subcuentas`
--
CREATE TABLE IF NOT EXISTS `ver_subcuentas` (
`codigo_clasificacion` int(11)
,`codigo_grupo` varchar(10)
,`codigo_subgrupo` varchar(20)
,`codigo_cuenta` varchar(20)
,`codigo_subcuenta` varchar(20)
,`naturaleza` varchar(20)
,`nombre_subcuenta` varchar(50)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `ver_subcuentas`
--
DROP TABLE IF EXISTS `ver_subcuentas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ver_subcuentas` AS (select `a`.`codigo_clasificacion` AS `codigo_clasificacion`,`b`.`codigo_grupo` AS `codigo_grupo`,`c`.`codigo_subgrupo` AS `codigo_subgrupo`,`d`.`codigo_cuenta` AS `codigo_cuenta`,`e`.`codigo_subcuenta` AS `codigo_subcuenta`,`e`.`naturaleza` AS `naturaleza`,`e`.`nombre_subcuenta` AS `nombre_subcuenta` from ((((`clasificaciones` `a` join `catalogo_grupos` `b`) join `catalogo_subgrupos` `c`) join `catalogo_cuentas` `d`) join `catalogo_subcuentas` `e`) where ((`e`.`cuenta` = `d`.`codigo_cuenta`) and (`d`.`subgrupo` = `c`.`codigo_subgrupo`) and (`c`.`grupo` = `b`.`codigo_grupo`) and (`b`.`clasificacion` = `a`.`codigo_clasificacion`)));

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catalogo_cuentas`
--
ALTER TABLE `catalogo_cuentas`
  ADD CONSTRAINT `catalogo_cuentas_ibfk_1` FOREIGN KEY (`subgrupo`) REFERENCES `catalogo_subgrupos` (`codigo_subgrupo`);

--
-- Filtros para la tabla `catalogo_grupos`
--
ALTER TABLE `catalogo_grupos`
  ADD CONSTRAINT `catalogo_grupos_ibfk_1` FOREIGN KEY (`clasificacion`) REFERENCES `catalogo_clasificaciones` (`codigo_clasificacion`);

--
-- Filtros para la tabla `catalogo_subcuentas`
--
ALTER TABLE `catalogo_subcuentas`
  ADD CONSTRAINT `catalogo_subcuentas_ibfk_1` FOREIGN KEY (`cuenta`) REFERENCES `catalogo_cuentas` (`codigo_cuenta`);

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`subgrupo`) REFERENCES `subgrupos` (`codigo_subgrupo`);

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`clasificacion`) REFERENCES `clasificaciones` (`codigo_clasificacion`);

--
-- Filtros para la tabla `subcuentas`
--
ALTER TABLE `subcuentas`
  ADD CONSTRAINT `subcuentas_ibfk_1` FOREIGN KEY (`cuenta`) REFERENCES `cuentas` (`codigo_cuenta`);

--
-- Filtros para la tabla `subgrupos`
--
ALTER TABLE `subgrupos`
  ADD CONSTRAINT `subgrupos_ibfk_1` FOREIGN KEY (`grupo`) REFERENCES `grupos` (`codigo_grupo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
