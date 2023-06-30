-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2023 a las 04:09:27
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nueva_york`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`) VALUES
('Galletas'),
('Integrales'),
('Panes'),
('Rosquitas'),
('Tostadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `ubicacion` varchar(20) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `tipo_cliente` varchar(15) NOT NULL,
  `ruta_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `nombre`, `direccion`, `ubicacion`, `telefono`, `correo`, `tipo_cliente`, `ruta_id`) VALUES
('CL0138', 'Cliente1', 'Cl. 79 #42F-110', 'Soledad', '3001234567', 'cliente@gmail.com', 'Minorista', 'R0125'),
('CL0139', 'Cliente2', 'Cl. 79 #42F-110', 'Barranquilla', '3001234567', 'cliente@gmail.com', 'Mayorista', 'R0126'),
('CL0140', 'Cliente3', 'Cl. 79 #42F-110', 'Barranquilla', '3001234567', 'cliente@gmail.com', 'Mayorista', 'R0127');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `historial_id` varchar(10) NOT NULL,
  `venta_id` varchar(10) NOT NULL,
  `cliente_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`historial_id`, `venta_id`, `cliente_id`) VALUES
('H24537', 'V24536', 'CL0138'),
('H24538', 'V24538', 'CL0140');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `insumo_id` varchar(10) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `lote` varchar(12) NOT NULL,
  `cantidad_kg` int(11) NOT NULL,
  `precio_kg` int(11) NOT NULL,
  `proveedor_nit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`insumo_id`, `nombre`, `lote`, `cantidad_kg`, `precio_kg`, `proveedor_nit`) VALUES
('I0547', 'Harina trigo', '10', 3000, 1000, '351456521'),
('I0548', 'Azucar', '10', 200, 4000, '800543168'),
('I0549', 'Queso', '10', 500, 1000, '800543753');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos_por_productos`
--

CREATE TABLE `insumos_por_productos` (
  `insumo_producto_id` varchar(10) NOT NULL,
  `producto_id` varchar(10) NOT NULL,
  `insumo_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insumos_por_productos`
--

INSERT INTO `insumos_por_productos` (`insumo_producto_id`, `producto_id`, `insumo_id`) VALUES
('IPP1064', 'PG256', 'I0547'),
('IPP1066', 'PP254', 'I0547'),
('IPP1067', 'PT257', 'I0547');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinarias`
--

CREATE TABLE `maquinarias` (
  `maquinaria_id` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `marca` varchar(10) NOT NULL,
  `modelo` varchar(10) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha_adquisicion` date NOT NULL,
  `trabajador_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maquinarias`
--

INSERT INTO `maquinarias` (`maquinaria_id`, `nombre`, `marca`, `modelo`, `estado`, `fecha_adquisicion`, `trabajador_id`) VALUES
('M12782', 'Horno', 'Arpan', 'mk3', 'activo', '2021-02-10', '1002033314'),
('M12783', 'Refrigerador de agua', 'Inmeza', 'mrt13', 'activo', '2018-04-09', '1002033315'),
('M12784', 'Amasadora', 'imusa', 'mk12', 'inactivo', '2017-07-12', '1002033320');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `categoria_id` varchar(20) NOT NULL,
  `peso_gr` int(11) NOT NULL,
  `valor_unitario` int(11) NOT NULL,
  `insumo_id` varchar(10) NOT NULL,
  `stock` int(11) NOT NULL,
  `fecha_exp` datetime NOT NULL,
  `fecha_ven` datetime NOT NULL,
  `maquinaria_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `nombre`, `categoria_id`, `peso_gr`, `valor_unitario`, `insumo_id`, `stock`, `fecha_exp`, `fecha_ven`, `maquinaria_id`) VALUES
('PG256', 'Galleta punto rojo', 'Galletas', 45, 1800, 'I0547', 156, '2022-07-15 07:48:29', '2024-08-08 07:16:50', 'M12784'),
('PP254', 'Pan tajado', 'Panes', 45, 1800, 'I0547', 156, '2022-07-15 07:48:29', '2024-08-08 07:16:50', 'M12782'),
('PT257', 'Tostada', 'Tostadas', 45, 1800, 'I0547', 156, '2022-07-15 07:48:29', '2024-08-08 07:16:50', 'M12782');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `proveedor_nit` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `ubicacion` varchar(20) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`proveedor_nit`, `nombre`, `direccion`, `ubicacion`, `telefono`, `correo`) VALUES
('351456521', 'proveedor1', 'Cl. 79 #42F-110', 'Atlantico/Bqlla', '3003214561', 'proveedor1@gmail.com'),
('800543168', 'Proveedor2', 'Cl. 79 #42F-110', 'Atlantico/Bqlla', '3003214561', 'proveedor2@gmail.com'),
('800543753', 'Proveedor3', 'Cl. 79 #42F-110', 'Atlantico/Bqlla', '3003214561', 'proveedor3@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `puesto_id` char(7) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `salario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`puesto_id`, `nombre`, `salario`) VALUES
('ADM-DIR', 'Director Ejecutivo', 10000000),
('ADM-GAF', 'Gerente de administracion y finanzas', 7000000),
('ADM-GCA', 'Gerente de calidad', 7000000),
('ADM-GLO', 'Gerente de logistica', 7000000),
('ADM-GPR', 'Gerente de produccion', 7000000),
('ADM-GVE', 'Gerente de ventas', 7000000),
('ADM-SEC', 'Secretaria general', 6000000),
('AFI-CON', 'Area de contabilidad', 2000000),
('AFI-REH', 'Recursos humanos', 1200000),
('CAL-CTR', 'Control de calidad', 1300000),
('LOG-CHO', 'Conductor/Chofer', 1200000),
('LOG-COR', 'Coordinador de almacen', 2000000),
('PRO-SUP', 'Supervisor linea de produccion', 2600000),
('PRO-TRA', 'Trabajador linea de produccion', 1200000),
('VEN-ACL', 'Atencion al cliente', 1300000),
('VEN-RED', 'Representante de ventas', 2000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

CREATE TABLE `rutas` (
  `ruta_id` varchar(10) NOT NULL,
  `distancia` decimal(5,2) NOT NULL,
  `zona_ubicacion` varchar(20) NOT NULL,
  `transporte_id` char(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`ruta_id`, `distancia`, `zona_ubicacion`, `transporte_id`) VALUES
('R0125', '14.00', 'Soledad', 'ABC-125'),
('R0126', '10.00', 'Barranquilla', 'ABC-126'),
('R0127', '8.00', 'Barranquilla', 'ABC-125');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas_por_transporte`
--

CREATE TABLE `rutas_por_transporte` (
  `rutas_transporte_id` varchar(10) DEFAULT NULL,
  `ruta_id` varchar(10) NOT NULL,
  `transporte_id` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rutas_por_transporte`
--

INSERT INTO `rutas_por_transporte` (`rutas_transporte_id`, `ruta_id`, `transporte_id`) VALUES
('RPT0354', 'R0125', 'ABC-125'),
('RPT0355', 'R0126', 'ABC-126'),
('RPT0356', 'R0127', 'ABC-127');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `trabajador_id` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(10) NOT NULL,
  `edad` int(11) NOT NULL,
  `genero` char(1) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `fecha_contratacion` date NOT NULL,
  `puesto_id` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`trabajador_id`, `nombre`, `apellido`, `edad`, `genero`, `direccion`, `telefono`, `correo`, `fecha_contratacion`, `puesto_id`) VALUES
('1002033314', 'Henry', 'Tabares', 30, 'M', 'Cl. 79 #42F-110', '3003214561', 'henryt@gmail.com', '2018-12-06', 'ADM-GPR'),
('1002033315', 'Anuar', 'Gonzales', 46, 'M', 'Cl. 79 #42F-110', '3003214561', 'anuart@gmail.com', '2018-12-06', 'ADM-GPR'),
('1002033320', 'Juliana', 'Gomez', 28, 'F', 'Cl. 79 #42F-110', '3003214561', 'Julianat@gmail.com', '2020-11-18', 'LOG-COR'),
('1002033346', 'Maria', 'Muñoz', 60, 'F', 'Cl. 79 #42F-110', '3003214561', 'Mariat@gmail.com', '2015-09-10', 'ADM-GVE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportes`
--

CREATE TABLE `transportes` (
  `transporte_id` char(7) NOT NULL,
  `tipo_transporte` varchar(20) NOT NULL,
  `capacidad_maxima` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `fecha_adquisicion` date NOT NULL,
  `ruta_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `transportes`
--

INSERT INTO `transportes` (`transporte_id`, `tipo_transporte`, `capacidad_maxima`, `estado`, `fecha_adquisicion`, `ruta_id`) VALUES
('ABC-125', 'Camion', 1020, 'activo', '2019-02-05', 'R0125'),
('ABC-126', 'Camion ', 1456, 'activo', '2018-09-20', 'R0126'),
('ABC-127', 'Motocicleta', 80, 'inactivo', '2021-09-11', 'R0127');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `venta_id` varchar(10) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `cliente_id` varchar(10) NOT NULL,
  `producto_id` varchar(10) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_total` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`venta_id`, `fecha_hora`, `cliente_id`, `producto_id`, `cantidad`, `valor_total`, `estado`) VALUES
('V24536', '2023-06-26 08:19:15', 'CL0139', 'PG256', 1, 1800, 'completado'),
('V24538', '2023-08-17 08:21:13', 'CL0140', 'PP254', 1, 1800, 'Pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`),
  ADD KEY `ruta_id` (`ruta_id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`historial_id`),
  ADD KEY `venta_id` (`venta_id`,`cliente_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`insumo_id`),
  ADD KEY `proveedor_nit` (`proveedor_nit`);

--
-- Indices de la tabla `insumos_por_productos`
--
ALTER TABLE `insumos_por_productos`
  ADD PRIMARY KEY (`insumo_producto_id`),
  ADD KEY `producto_id` (`producto_id`,`insumo_id`),
  ADD KEY `insumo_id` (`insumo_id`);

--
-- Indices de la tabla `maquinarias`
--
ALTER TABLE `maquinarias`
  ADD PRIMARY KEY (`maquinaria_id`),
  ADD KEY `trabajor_id` (`trabajador_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `categoria_id` (`categoria_id`,`insumo_id`,`maquinaria_id`),
  ADD KEY `maquinaria_id` (`maquinaria_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`proveedor_nit`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`puesto_id`);

--
-- Indices de la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`ruta_id`),
  ADD KEY `transporte_id` (`transporte_id`);

--
-- Indices de la tabla `rutas_por_transporte`
--
ALTER TABLE `rutas_por_transporte`
  ADD KEY `ruta_id` (`ruta_id`,`transporte_id`),
  ADD KEY `transporte_id` (`transporte_id`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`trabajador_id`),
  ADD KEY `puesto_id` (`puesto_id`);

--
-- Indices de la tabla `transportes`
--
ALTER TABLE `transportes`
  ADD PRIMARY KEY (`transporte_id`),
  ADD KEY `ruta_id` (`ruta_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `cliente_id` (`cliente_id`,`producto_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`ruta_id`) REFERENCES `rutas` (`ruta_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`venta_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD CONSTRAINT `insumos_ibfk_1` FOREIGN KEY (`proveedor_nit`) REFERENCES `proveedores` (`proveedor_nit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `insumos_por_productos`
--
ALTER TABLE `insumos_por_productos`
  ADD CONSTRAINT `insumos_por_productos_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `insumos_por_productos_ibfk_2` FOREIGN KEY (`insumo_id`) REFERENCES `insumos` (`insumo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maquinarias`
--
ALTER TABLE `maquinarias`
  ADD CONSTRAINT `maquinarias_ibfk_1` FOREIGN KEY (`trabajador_id`) REFERENCES `trabajadores` (`trabajador_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`maquinaria_id`) REFERENCES `maquinarias` (`maquinaria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rutas_por_transporte`
--
ALTER TABLE `rutas_por_transporte`
  ADD CONSTRAINT `rutas_por_transporte_ibfk_1` FOREIGN KEY (`ruta_id`) REFERENCES `rutas` (`ruta_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rutas_por_transporte_ibfk_2` FOREIGN KEY (`transporte_id`) REFERENCES `transportes` (`transporte_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD CONSTRAINT `trabajadores_ibfk_1` FOREIGN KEY (`puesto_id`) REFERENCES `puestos` (`puesto_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
