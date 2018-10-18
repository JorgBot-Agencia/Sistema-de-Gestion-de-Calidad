-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2018 a las 15:53:59
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadores`
--

CREATE TABLE `indicadores` (
  `id` int(10) UNSIGNED NOT NULL,
  `indicador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proceso_id` int(10) UNSIGNED NOT NULL,
  `subproceso_id` int(10) UNSIGNED NOT NULL,
  `formula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frecuencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interpretacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `funcionarios` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_cucuta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_bucaramanga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `indicadores`
--

INSERT INTO `indicadores` (`id`, `indicador`, `proceso_id`, `subproceso_id`, `formula`, `frecuencia`, `interpretacion`, `origen`, `funcionarios`, `meta_cucuta`, `meta_bucaramanga`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, '% INCREMENTO EN VENTAS DE GRUPO N°1 MICHELIN - BFC', 1, 1, '(Promedio de ventas en $ de los 3 meses / Presupuesto establecido) X 100%', 'TRIMESTRAL', 'verificar el incremento de la ventas tomando como base el presupuesto en pesos de LLANTAS', 'Reporte solin CONSOLIDADO MENSUAL/ SUCURSAL.', 'Todos los que lo necesiten', '-', '-', 2, '2018-10-17 20:50:57', '2018-10-17 20:50:57', NULL),
(1, '% INCREMENTO EN VENTAS DE GRUPO N°2 IMPORTADOS', 1, 1, '(Promedio de ventas en $ de los 3 meses / Presupuesto establecido) X 100%', 'TRIMESTRAL', 'verificar el incremento de la ventas tomando como base el presupuesto en pesos de LLANTAS', 'Reporte solin CONSOLIDADO MENSUAL/ SUCURSAL.', 'Todos los que lo necesiten', '-', '-', 2, '2018-10-17 20:53:06', '2018-10-17 20:53:06', NULL),
(2, '% INCREMENTO EN VENTAS DE LLANTAS', 1, 1, '(Promedio de ventas en $ de los 3 meses / Presupuesto establecido) X 100%', 'TRIMESTRAL', 'verificar el incremento de la ventas tomando como base el presupuesto en pesos de LLANTAS', 'Reporte solin CONSOLIDADO MENSUAL/ SUCURSAL.', 'Todos los que lo necesiten', '-', '-', 2, '2018-04-11 17:50:04', '2018-04-25 00:49:36', NULL),
(3, '% INCREMENTO EN VENTAS DE FILTROS', 1, 1, '(Promedio de ventas en $ de los 3 meses / Presupuesto establecido) X 100% ', 'TRIMESTRAL', 'verificar el incremento de la ventas tomando como base el presupuesto en pesos de FILTROS', 'Reporte solin CONSOLIDADO MENSUAL/ SUCURSAL', 'Todos los que lo necesiten', '', '', 3, '2018-04-11 17:50:04', '2018-04-11 17:50:04', NULL),
(4, '% INCREMENTO EN VENTAS DE LUBRICANTES Y ADITIVOS', 1, 1, '(Promedio de ventas en $ de los 3 meses / Presupuesto establecido) X 100% ', 'TRIMESTRAL', 'verificar el incremento de la ventas tomando como base el presupuesto en pesos de LUBRICANTES', 'Reporte solin CONSOLIDADO MENSUAL/ SUCURSAL', 'Todos los que lo necesiten', '', '', 4, '2018-04-11 17:50:05', '2018-04-11 17:50:05', NULL),
(5, 'CUMPLIMIENTO VENTAS GLOBALES', 1, 1, 'ventas a credito de todas las lineas + ventas de contado de todas las lineas en todos los establecimientos comerciales.', 'MENSUAL', 'Establecer un monto mínimo de ventas a nivel general', 'Reporte solin Cumplimi vendedor marca SGC', 'Todos los que lo necesiten', '-', '-', 3, '2018-04-11 17:50:05', '2018-04-19 18:53:48', '2018-04-19 18:53:48'),
(6, 'ROTACIÓN DE CARTERA', 2, 4, '(Total cartera pendiente / Ventas a Crédito ) *30 días', 'MENSUAL', 'TIEMPO QUE SE DEMORA EN COBRAR LA CARTERA', 'FACTURAS DE VENTA A CRÉDITO Y COMPROBANTES DE RECAUDO DE CARTERA', 'GERENTE ADMINISTRATIVO Y FINANCIERO JEFE DE VENTAS, COORDINADOR DE CALIDAD', '', '', 4, '2018-04-11 18:49:53', '2018-04-11 18:49:53', NULL),
(7, 'APROBACIÓN Y AMPLIACIÓN DE CRÉDITOS', 2, 4, 'TOTAL SOLICITUDES CRÉDITOS APROBADAS + TOTAL CUPOS AMPLIADOS / TOTAL SOLICITUDES CRÉDITO RECIBIDAS', 'MENSUAL', 'CANTIDAD DE CUPOS DE CRÉDITOS OTORGADOS', 'SOLICITUDES DE CRÉDITO', 'GERENTE ADMINISTRATIVO Y FINANCIERO JEFE DE VENTAS, COORDINADOR DE CALIDAD', '', '', 4, '2018-04-11 18:51:35', '2018-04-11 18:51:35', NULL),
(8, 'VOLUMEN DE VENTAS PROMEDIO DE LA EMPRESA', 2, 3, 'VENTAS A CRÉDITO + VENTAS DE CONTADO DE LOS ESTABLECIMIENTOS COMERCIALES', 'MENSUAL', 'NIVEL DE INGRESOS DE LA EMPRESA', 'FACTURAS DE VENTA', 'GERENTE ADMINISTRATIVO Y FINANCIERO JEFES DE ESTABLECIMIENTO COORDINADOR DE CALIDAD', 'Cúcuta', 'Bucaramanga', 12, '2018-04-11 18:55:43', '2018-04-11 18:55:43', NULL),
(9, '%CLIENTES SATISFECHOS', 2, 3, '( NÚMERO DE CLIENTES SATISFECHOS/TOTAL ENCUESTADO )*100', 'TRIMESTRAL', 'NIVEL DE SATISFACCIÓN DEL CLIENTE', 'ENCUESTA DE SATISFACCIÓN', 'GERENTE ADMINISTRATIVO Y FINANCIERO JEFES DE ESTABLECIMIENTO COORDINADOR DE CALIDAD', 'Cúcuta', 'Bucaramanga', 12, '2018-04-11 18:59:09', '2018-04-11 18:59:09', NULL),
(10, '% CUMPLIMIENTO DEL PROVEEDOR', 3, 5, 'CANTIDAD RECIBIDA / CANTIDAD SOLICITADA', 'TRIMESTRAL', 'CUMPLIMIENTO EN LAS CANTIDADES ENTREGADAS DE MERCANCÍA', 'FACTURA DE COMPRA', 'COORDINADOR DE CALIDAD', '', '', 12, '2018-04-11 19:46:49', '2018-04-11 19:46:49', NULL),
(11, 'OPORTUNIDAD DE ENTREGA', 3, 5, 'FECHA EJECUTADA - FECHA ESTABLECIDA / # DE CRONOGRAMAS', 'TRIMESTRAL', 'CUMPLIMIENTO EN EL TIEMPO DE ENTREGA DE MERCANCÍA', 'FACTURA DE COMPRA', 'COORDINADOR DE CALIDAD', '', '', 12, '2018-04-11 19:48:13', '2018-04-11 19:48:13', NULL),
(12, 'CALIF. PROVEEDORES CONFIABLES', 3, 5, 'CALIFICACIÓN PROMEDIO DE LOS PROVEEDORES CONFIABLES', 'TRIMESTRAL', 'PROMEDIO DE CALIFICACIONES', 'EVALUACIÓN DE PROVEEDOR', 'COORDINADOR DE CALIDAD', '', '', 12, '2018-04-11 19:49:05', '2018-04-11 19:49:05', NULL),
(13, 'ROTACIÓN MÍNIMA DE INVENTARIOS', 3, 5, 'EXISTENCIAS DE INVENTARIOS POR PROMEDIO DE VENTAS', 'TRIMESTRAL', 'CANTIDAD DE VECES QUE EL INVENTARIO ROTA', 'EXISTENCIA DE INVENTARIOS  UNIDADES VENDIDAS', 'COORDINADOR DE CALIDAD', '', '', 13, '2018-04-11 19:49:46', '2018-04-24 18:58:45', '2018-04-24 18:58:45'),
(14, '% PROVEEDORES CONFIABLES', 4, 6, 'TABULACIÓN DEL % DE CONFIABILIDAD OBTENIDO POR LOS PROVEEDORES EN LA\r\nRE - EVALUACIÓN', 'TRIMESTRAL', 'CALIFICACIÓN PROMEDIO DE LOS PROVEEDORES', 'FORMATO EVALUACIÓN DE PROVEEDORES', 'JEFE DE MANTENIMIENTO', 'Cúcuta', 'Bucaramanga', 14, '2018-04-11 20:18:36', '2018-04-11 20:18:36', NULL),
(15, '%EFICACIA DE MANTENIMIENTOS', 4, 6, 'Sumatoria de calificaciones de  los mantenimientos / Total Mantenimientos realizados', 'TRIMESTRAL', 'CALIFICACIÓN PROMEDIO DE LOS MANTENIMIENTOS REALIZADOS', 'REGISTRO DE MANTENIMIENTOS', 'JEFE DE MANTENIMIENTO', 'Cúcuta', 'Bucaramanga', 14, '2018-04-11 20:19:30', '2018-04-11 20:19:30', NULL),
(16, '% OPORTUNIDAD EN ENTREGA ELEMENTOS DE CONSUMO', 4, 7, 'TABULACIÓN DEL % DE ENTREGA OBTENIDO POR LAS SUCURSALES EN LA EVALUACIÓN', 'TRIMESTRAL', 'TIEMPO DE ENTREGA DE LOS ELEMENTOS DE CONSUMO', 'EVALUACIÓN DE PRESTACIÓN DEL SERVICIO', 'GERENTE ADMINISTRATIVO Y FINANCIERO', '', '', 15, '2018-04-11 20:20:33', '2018-04-11 20:20:33', NULL),
(17, '% PROVEEDORES CONFIABLES', 4, 7, 'TABULACIÓN DEL % DE CONFIABILIAD OBTENIDO POR LOS PROVEEDORES EN LA\r\nRE - EALUACIÓN', 'TRIMESTRAL', 'CALIFICACIÓN PROMEDIO DE LOS PROVEEDORES', 'FORMATO EVALUACIÓN DE PROVEEDORES', 'GERENTE ADMINISTRATIVO Y FINANCIERO', 'Cúcuta', 'Bucaramanga', 2, '2018-04-11 20:23:24', '2018-04-11 20:23:24', NULL),
(18, '% ASISTENCIA A LAS CAPACITACIONES', 5, 8, '(#ASISTENTES A LAS JORNADAS DE CAPACITACION  / #CONVOCADOS A LAS JORNADAS DE CAPACITACION)*100', 'TRIMESTRAL', 'NIVEL DE ASISTENCIA', 'LISTADO DE ASISTENCIA', 'GERENTE ADMINISTRATIVO\r\nJEFE DE VENTAS\r\nCOORDINADOR DE CALIDAD', '', '', 5, '2018-04-11 20:28:42', '2018-04-11 20:28:42', NULL),
(19, 'NIVEL DE APRENDIZAJE DEL PERSONAL', 5, 8, 'PROMEDIO DE CALIFICACIÓN DE LAS EVALUACIONES DE LA CAPACITACIÓN', 'TRIMESTRAL', 'PROMEDIO DE LAS CALIFICACIONES DEL PERSONAL', 'EVALUACIÓN DE LAS CAPACITACIONES', 'GERENTE ADMINISTRATIVO\r\nJEFE DE VENTAS\r\nCOORDINADOR DE CALIDAD', '', '', 5, '2018-04-11 20:29:48', '2018-04-11 20:29:48', NULL),
(20, 'ROTACIÓN DE PERSONAL', 5, 8, '(# DE EMPLEADOS RETIRADOS EN EL TRIMESTRE / # DE EMPLEADOS  A  INICIO DE TRIMESTRE) *100', 'TRIMESTRAL', 'NIVEL DE ROTACIÓN DE PERSONAL', 'SOLIN', 'GERENTE ADMINISTRATIVO\r\nJEFE DE VENTAS\r\nCOORDINADOR DE CALIDAD', '', '', 5, '2018-04-11 20:31:38', '2018-04-11 20:31:38', NULL),
(21, '%CUMPLIMIENTO DEL PLAN ANUAL DE TRABAJO', 6, 10, '(SUMATORIA DEL NIVEL DE AVANCE DE EJECUCIÓN DE LOS PLANES DE ACCIÓN PROGRAMADOS / TOTAL DE PLANES DE ACCIÓN PROGRAMADOS)  * 100%', 'TRIMESTRAL', 'EL NIVEL DE AVANCE EN LA EJECUCIÓN DE LOS PLANES PROPUESTOS', 'REVISIÓN POR DIRECCIÓN', 'GERENTE ADMINISTRATIVO\r\nY FINANCIERO', '', '', 17, '2018-04-11 20:37:59', '2018-04-11 20:37:59', NULL),
(22, '%EFICACIA DE LAS ACCIONES IMPLEMENTADAS', 6, 10, '(TOTAL DE ACCIONES EFICACES / TOTAL ACCIONES CON PLAZO VENCIDO) * 100%', 'TRIMESTRAL', 'PROPORCIÓN DE ACCIONES PROPUESTAS QUE HAN SIDO CERRADAS EFICAZMENTE', 'AUDITORIAS INTERNAS O EXTERNAS DE GESTIÓN, REVISIÓN POR LA DIRECCIÓN NO CONFORMIDADES, SUGERENCIAS, ETC', 'GERENTE ADMINISTRATIVO Y\r\nJEFE DE CALIDAD', '', '', 17, '2018-04-11 20:39:15', '2018-04-11 20:39:15', NULL),
(23, '%CUMPLIMIENTO DE LAS AUDITORIAS', 6, 10, '(TOTAL AUDITORIAS REALIZADAS /TOTAL AUDITORIAS PROGRAMADAS ) *100%', 'TRIMESTRAL', 'PROPORCIÓN DE AUDITORIAS PROGRAMAS QUE HAN SIDO REALIZADAS', 'PLAN DE AUDITORIAS,\r\nINFORME DE AUDITORIAS', 'GERENTE ADMINISTRATIVO Y\r\nJEFE DE CALIDAD', '', '', 17, '2018-04-11 20:40:05', '2018-04-11 20:40:05', NULL),
(24, '%CUMPLIMIENTO DEL CRONOGRAMA DE ACTIVIDADES', 6, 9, '(N°. ACTIVIDADES EJECUTADS / NO. ACTIVIDADES PROGRAMADAS )* 100%', 'TRIMESTRAL', 'EL NIVEL DE AVANCE EN LA EJECUCIÓN DE LAS ACTIVIDADES', 'CRONOGRAMA DE ACTIVIDADES', 'AUTORIDAD Y JEFES DE PROCESO', 'Cúcuta', 'Bucaramanga', 16, '2018-04-11 20:40:52', '2018-04-11 20:40:52', NULL),
(25, 'TASA DE ACCIDENTALIDAD', 6, 9, '(N°. ACCIDENTES LABORALES PRESENTADOS / N° de trabajadores) * 100', 'MENSUAL', '% DE ACCIDENTES CON RESPECTO A LA CANTIDAD DE TRABAJADORES EN UN MES', 'REGISTRO DE ACCIDENTES, ENF. LABORAL O PRIMEROS AUXILIOS', 'AUTORIDAD Y JEFES DE PROCESO', '', '', 16, '2018-04-11 20:41:49', '2018-04-11 20:41:49', NULL),
(26, 'SEVERIDAD DE AUSENTISMO GENERAL', 6, 9, '(TOTAL DIAS PERDIDOS POR LAS AUSENCIAS / Total hrs hombre de trabajo esperado ) *20000', 'MENSUAL', 'DIAS DE INCAPACIDAD POR ACCIDENTES, ENF. LABORALES PERDIDOS EN EL MES', 'REGISTRO DE INCAPACIDADES MEDICAS', 'AUTORIDAD Y JEFES DE PROCESO', '', '', 16, '2018-04-11 20:42:30', '2018-04-11 20:42:30', NULL),
(27, 'INDICE DE LESIONES INCAPACITANTES (ILI)', 6, 9, '(FRECUENCIA DE ACCIDENTALIDAD X SEVERIDAD AUSENTISMO ) /1000', 'MENSUAL', 'ANALIZAR LOS RESULTADOS DEL PROGRAMA DE SEGURIDAD', 'FRECUENCIA Y SEVERIDAD', 'AUTORIDAD Y JEFES DE PROCESO', '-', '-', 16, '2018-04-11 20:43:19', '2018-04-24 21:31:17', NULL),
(28, 'PREVALENCIA DE ENFERMEDADES LABORALES', 6, 9, '(N°  casos nuevo y antiguos de Enfermedades Laborales calificadas/ N° promedio de trabajadores) * 100', 'TRIMESTRAL', '% DE ENFERMEDADES LABORALES CALIFICADAS EN UN AÑO', 'CERTIFICADO DE ENFERMEDAD LABORAL DE LA ARL', 'AUTORIDAD Y JEFES DE PROCESO', '', '', 16, '2018-04-11 20:45:22', '2018-04-11 20:45:22', NULL),
(29, 'CUMPLIMIENTO INSPECCIONES', 6, 9, '(N° de inspecciones ejecutadas / N° de inspecciones programadas) * 100', 'TRIMESTRAL', '% DE CUMPLIMIENTO DE LAS INSPECCIONES PROGRAMADAS EN UN SEMESTRE', 'CRONOGRAMA DE INSPECCIONES, REGISTROS FISICOS DE LAS INSPECCIONES', 'AUTORIDAD Y JEFES DE PROCESO', '', '', 16, '2018-04-11 20:45:58', '2018-04-11 20:45:58', NULL),
(30, 'AUSENTISMO LABORAL', 6, 9, '(Total dias de ausencia por incapacidad / Total dias de trabajo programado) * 100', 'MENSUAL', '% DIAS AUSENCIA PERDIDOS POR ACCIDENTE LABORAL, ENFERMEDAD LABORAL, ENFERMEDAD GENERAL, MATERNIDAD, LEY MARIA Y PERMISOS', 'INCAPACIDADES POR ACCIDENTE LABORAL, ENFERMEDAD LABORAL, ENFERMEDAD GENERAL, MATERNIDAD, LEY MARIA Y PERMISOS', 'AUTORIDAD Y JEFES DE PROCESO', '-', '-', 16, '2018-04-11 20:46:46', '2018-05-11 02:36:31', NULL),
(31, 'CUMPLIMIENTO LEGISLACIÓN SST', 6, 9, '(Cumplimiento de requisitos legales / Total de requisitos legales aplicables) * 100', 'TRIMESTRAL', '% CUMPLIMIENTO POR PARTE DE LA EMPRESA DE LA LEGISLACION NACIONAL APLICABLE', 'MATRIZ LEGAL', 'AUTORIDAD Y JEFES DE PROCESO', '', '', 16, '2018-04-11 20:47:27', '2018-04-11 20:47:27', NULL),
(32, '% INEFICACIA DEL PROGRAMA DE MANTENIMIENTOS A VEHICULOS', 4, 6, '(Numero de vehículos varados en la ruta en el trimestre /  Numero de vehículos despachados en el trimestre) * 100', 'TRIMESTRAL', 'PORCENTAJE DE VEHÍCULOS VARADOS', 'REPORTE DE VARADOS POR INFORMACIÓN DE LOS ADMINISTRADORES.', 'AUX. MANTENIMIENTO INFRAESTRUCTURA, AUX SST, COMITÉ SEGURIDAD VIAL', '', '', 14, '2018-04-11 21:15:20', '2018-04-11 21:15:20', NULL),
(33, 'IMPACTO ECONÓMICO ASOCIADO A EVENTOS VIALES', 4, 6, 'VALOR TOTAL DE LAS REPARACIONES + LUCRO CESANTE- INDEMNIZACIONES EN EL PERIODO', 'TRIMESTRAL', 'PORCENTAJE DEL IMPACTO ECONÓMICO', 'CONTRATO DE TRANSACCIÓN DE TERCEROS EMITIDO POR LA POLIZA', 'AUX. MANTENIMIENTO INFRAESTRUCTURA, AUX SST, COMITÉ SEGURIDAD VIAL', '', '', 14, '2018-04-11 21:17:48', '2018-04-11 21:17:48', NULL),
(34, 'CUMPLIMIENTO VENTAS GLOBALES', 1, 1, 'ventas a credito de todas las lineas + ventas de contado de todas las lineas en todos los establecimientos comerciales.', 'MENSUAL', 'Establecer un monto mínimo de ventas a nivel general', 'Reporte solin Cumplimi vendedor marca SGC', 'Todos los que lo necesiten', '', '', 3, '2018-04-19 18:53:52', '2018-04-19 18:53:52', NULL),
(35, 'ROTACIÓN MÍNIMA DE INVENTARIOS - LLANTAS', 3, 5, 'EXISTENCIAS DE INVENTARIOS POR PROMEDIO DE VENTAS', 'TRIMESTRAL', 'CANTIDAD DE VECES QUE EL INVENTARIO ROTA', 'EXISTENCIA DE INVENTARIOS  UNIDADES VENDIDAS', 'COORDINADOR DE CALIDAD', '-', '-', 13, '2018-04-24 18:53:18', '2018-04-24 18:53:18', NULL),
(36, 'ROTACIÓN MÍNIMA DE INVENTARIOS - FILTROS', 3, 5, 'EXISTENCIAS DE INVENTARIOS POR PROMEDIO DE VENTAS', 'TRIMESTRAL', 'CANTIDAD DE VECES QUE EL INVENTARIO ROTA', 'EXISTENCIA DE INVENTARIOS  UNIDADES VENDIDAS', 'COORDINADOR DE CALIDAD', '-', '-', 13, '2018-04-24 18:57:01', '2018-04-24 18:57:01', NULL),
(37, 'ROTACIÓN MÍNIMA DE INVENTARIOS - LUBRICANTES', 3, 5, 'EXISTENCIAS DE INVENTARIOS POR PROMEDIO DE VENTAS', 'TRIMESTRAL', 'CANTIDAD DE VECES QUE EL INVENTARIO ROTA', 'EXISTENCIA DE INVENTARIOS  UNIDADES VENDIDAS', 'COORDINADOR DE CALIDAD', '-', '-', 13, '2018-04-24 18:58:08', '2018-04-24 18:58:08', NULL),
(38, '%CUMPLIMIENTO DE LA POLÍTICA DEL SIG', 1, 2, 'SUMATORIA DEL RESULTADO PONDERADO DE OBJETIVOS', 'TRIMESTRAL', 'Mide el cumplimiento de la politica de calidad', 'Resultado de indicadores', 'JEFE DE VENTAS\r\nASISTENTE DE RECURSOS HUMANOS\r\nJEFE DE CARTERA\r\nJEFES DE ESTABLECIMIENTO', '-', '-', 2, '2018-05-11 21:53:33', '2018-05-11 21:53:33', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadores_visores`
--

CREATE TABLE `indicadores_visores` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `indicadore_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadore_user`
--

CREATE TABLE `indicadore_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `indicadore_id` int(10) UNSIGNED NOT NULL,
  `privilegios` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_000000_create_procesos_table', 1),
(2, '2014_10_11_000001_create_subprocesos_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_02_16_061116_create_indicadores_table', 1),
(6, '2018_02_16_061537_create_indicadore_user_table', 1),
(7, '2018_02_16_220324_create_indicadores_visores_table', 1),
(8, '2018_02_17_211401_create_resultados_indicadores_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'DIR. ESTRATÉGICO', 'DIR. ESTRATÉGICO', '2018-04-11 17:50:02', '2018-04-11 17:50:02', NULL),
(2, 'COMERCIALIZACIÓN', 'COMERCIALIZACIÓN', '2018-04-11 17:50:02', '2018-04-11 17:50:02', NULL),
(3, 'COMPRAS', 'COMPRAS', '2018-04-11 17:50:02', '2018-04-11 17:50:02', NULL),
(4, 'SERVICIOS Y SUMINISTROS', 'SERVICIOS Y SUMINISTROS', '2018-04-11 17:50:02', '2018-04-11 17:50:02', NULL),
(5, 'RECURSOS HUMANOS', 'RECURSOS HUMANOS', '2018-04-11 17:50:02', '2018-04-11 17:50:02', NULL),
(6, 'SIG', 'SIG', '2018-04-11 17:50:02', '2018-04-11 17:50:02', NULL),
(7, 'Administrador', 'Admin', '2018-04-23 20:40:58', '2018-04-24 00:30:00', '2018-04-24 00:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_indicadores`
--

CREATE TABLE `resultados_indicadores` (
  `id` int(10) UNSIGNED NOT NULL,
  `indicadore_id` int(10) UNSIGNED NOT NULL,
  `proceso_id` int(10) UNSIGNED NOT NULL,
  `subproceso_id` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `periocidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resultado` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `analisis` varchar(900) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_report` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periocidad_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resultados_indicadores`
--

INSERT INTO `resultados_indicadores` (`id`, `indicadore_id`, `proceso_id`, `subproceso_id`, `fecha_inicio`, `fecha_fin`, `periocidad`, `resultado`, `analisis`, `ciudad`, `meta`, `user_report`, `periocidad_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(68, 19, 5, 8, '2018-01-01', '2018-03-01', 'Enero - Marzo', '4.23', 'AnálisisEnero - Marzo:  El nivel de aprendizaje de las capacitaciones ha sido satisfactorio, en donde se ha evaluado de manera escrita y algunos en la practica el tema hablado en donde según sus respuestas han demostrado la apropiación del tema.  Abril – Junio: Julio – Septiembre :  Octubre – Diciembre:', 'Cucuta', '', 'GERENTE ADMINISTRATIVO, JEFE DE VENTAS, COORDINADOR DE CALIDAD', 1, 5, NULL, '2018-04-24 20:03:12', '2018-05-11 20:02:16'),
(73, 20, 5, 8, '2018-01-01', '2018-03-01', 'Enero - Marzo', '3.950', 'Enero - Marzo: El indicador muestra un comportamiento satisfactorio, lo que evidencia que el indice de rotación de personal mejoro. El personal se muestra comprometido.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Coordinador de Calidad', 1, 5, NULL, '2018-04-24 20:19:56', '2018-04-24 20:19:56'),
(86, 16, 4, 7, '2018-01-01', '2018-03-01', 'Enero - Marzo', '98.44', 'EL PROCESO SE DESEMPEÑO NORMALMENTE APLICANDO LOS RECURSO CON QUE CUENTA LA ORGANIZACION,  PERO   DEBIDO A  LA RESTRICCION VEHICULAR EN LAS FESTIVIDADESDE FIN DE AÑO,  DE SEMANA SANTA Y AL AUMENTO DE MERCANCIA EN LOS DESPACHOS DE BUCARAMANGA HACIA LAS AGENCIAS DE LA COSTA;  IMPIDIO QUE  LOS INSUMOS SE ENVIARAN OPORTUNAMENTE ,    POR LO QUE EL INDICADOR DE ESTE  PRIMER TRIMESTRE DE 2018  BAJO UN POCO CON RESPECTO AL PERIODO ANTERIOR.', 'Cucuta', '', 'ALVA PARADA-BLANCA GONZALEZ -SUCURSALES', 1, 15, NULL, '2018-04-25 02:24:21', '2018-04-25 02:30:01'),
(87, 16, 4, 7, '2017-10-01', '2017-12-01', 'Octubre - Diciembre', '100', 'EN ESTE ULTIMO TRIMESTRE   LOGRAMOS  EL OBJETIVO. YA QUE SE TRABAJO POR SATISFACER  LAS NECESIDADES EXPRESADAS EN CADA UNA DE LAS SOLICITUDES DE LAS SUCURSALES,  TAMBIEN SE DEBE AL CUMPLIMIENTO DE NUESTROS PROVEEDORES,  A  LA  PROGRAMACION  LOGISTICA  DE NUESTRA  ORGANIZACION. GRACIAS A TODO ESTE TRABAJO EN CONJUNTO SE OBTUVO ESTE BUEN RESULTADO.', 'Cucuta', '', 'ALVA PARADA-BLANCA GONZALEZ -SUCURSALES', 4, 15, NULL, '2018-04-25 02:27:33', '2018-04-25 02:27:33'),
(88, 10, 3, 5, '2018-01-01', '2018-03-01', 'Enero - Marzo', '90.66', 'Se logra cumplir la meta en un 90,66% la cual es muy buena teniendo un inicio de año, donde normalmente los proveedores por cambios de condiciones comerciales, se les dificulta despachar toda la mercancía.', 'Cucuta', '', 'Jefe de Compras, Gerencia administrativa, y SIG.', 1, 13, NULL, '2018-04-25 03:59:37', '2018-04-25 04:00:52'),
(91, 14, 4, 6, '2018-01-01', '2018-03-01', 'Enero - Marzo', '100', 'Excelente desempeño de los proveedores que le prestan el servicio al proceso, se logran los objetivos , este logro se debe a la confianza  y la experiencia de las personas contratadas,  se seguira contando con nuestros proveedores para garantiza r siempre un mejor  servicio.', 'Cucuta', 'Cúcuta', 'FELIPE CASTILLA, CLARA SANCHEZ, SANDRA ROA', 1, 14, NULL, '2018-04-25 20:03:45', '2018-04-25 20:03:45'),
(92, 8, 2, 3, '2018-03-01', '2018-03-01', 'Marzo', '137.5', 'EN  EL  MES DE MARZO /18    ALCANZAMOS UN CUMPLIMIENTO DEL PRESUPUESTO AL137,5%  .  CONSOLIDANDOSE COMO EL MAYOR MES EN VENTAS DEL PRIMER TRIMESTRE DEL AÑO 2,018. NUESTRO CANAL DE DISTRIBUCION HA SIDO RECEPITIVO A LAS PROMOCIONES Y  ALIANZAS ENTRE LINEAS DE NUESTRO PROTAFOLIO. . EL DPTO COMERCIAL DE CUCUTA CONCENTRA SUS ESFUERZOS EN  IMPULSAR LOS APOYOS PROMOCIONALES  VIGENTES EN NUESTRO PORTAFOLIO  CON EL COMPROMISO  DE TODOS LOS QUE  LO INTEGRAMOS Y ASI  CONSOLIDAR EL CUMPLIMIENTO DE LOS OBJETIVOS PROPUESTOS PARA ESTE MES DE MARZO  /18', 'Cucuta', 'Cúcuta', 'CRISTINA RAMIREZ ,  MIREYA LAGUADO, ASESORES COMERCIALES, ROBINSON RINCON, CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO.', 3, 12, NULL, '2018-04-26 00:13:38', '2018-05-09 03:33:18'),
(93, 9, 2, 3, '2018-01-01', '2018-03-01', 'Enero - Marzo', '99.63', 'EN EL  PRIMER  TRIMESTRE DEL AÑO 2018 (ENERO, FEBRERO Y MARZO) EL  NIVEL DE SATISFACCION DEL CLIENTE ALCANZO UN CUMPLIMIENTO DEL 99,63% SOBRE UNA MUESTRA DE 298 ENCUESTAS LOGRANDO  UNA CALIFICACIÓN DEL 4,98 %  DE SATISFACCION DEL CLIENTE EN EL PROCESO DE COMERCIALIZACION. SE MEJORÓ LA DISPONIBILIDAD DE LOS INVENTARIOS, SE CONCIENTIZO AL PERSONAL OPERATIVO SOBRE LA IMPORTANCIA DE LA EFECTIVIDAD DEL SERVICIO', 'Cucuta', 'Cúcuta', 'CRISTINA RAMIREZ, MIREYA LAGUADO, ASESORES COMERCIALES,  CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO.', 1, 12, NULL, '2018-04-26 00:15:08', '2018-05-11 20:21:37'),
(97, 9, 2, 3, '2018-01-01', '2018-03-01', 'Enero - Marzo', '98.80', 'EN EL TERCER  TRIMESTRE DEL AÑO 2018 (ENER-FEBR-MARZ) LOS NIVELES DE SATISFACCION DEL CLIENTE ALCANZARON UN CUMPLIMIENTO DEL 98,80% EL BUEN SERVICIO PRESTADO A LAS ENTREGAS DE MERCANCIA A TIEMPO , AL CLIENTE, LAS ENCUESTAS SE HAN HECHO EN ALGUNOS CASOS TELEFONICAMENTE EN CONTACO MAS DIRECTO CON EL CLIENTE ESPERAMOS QUE ESTE 2018 SEGUIR MANTENIENDO EL NIVEL DE SATIFACION UN 100%  Y PRESTAR UN BEUN SERVICIO AL CLEINTE', 'Bucaramanga', 'Bucaramanga', 'LUIS EDUARDO, ASESORES COMERCIALES, ROBINSON RINCON, CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO.', 1, 12, NULL, '2018-04-26 00:19:04', '2018-04-28 21:27:46'),
(140, 34, 1, 1, '2017-09-01', '2017-09-01', 'Septiembre', '353', 'Analisis', 'Cucuta', '', 'gerencia general', 9, 3, NULL, '2018-04-26 01:13:59', '2018-04-26 01:13:59'),
(141, 8, 2, 3, '2018-04-01', '2018-04-01', 'Abril', '112.7', 'EN  EL  MES DE ABRIL /18    ALCANZAMOS UN CUMPLIMIENTO DEL PRESUPUESTO AL 112,7%  .  CONTINUAMOS CON LAS  PROMOCIONES Y  ALIANZAS ENTRE LINEAS DE NUESTRO PROTAFOLIO. . SE GENERARON VENTAS EN NUSTRAA LINEA DE LLANTAS AOTELI Y SE INCREMENTARON EN LA LLINEA MICHELIN.  EL DPTO COMERCIAL DE CUCUTA CONCENTRA SUS ESFUERZOS EN  IMPULSAR LOS APOYOS PROMOCIONALES  VIGENTES EN NUESTRO PORTAFOLIO  CON EL COMPROMISO  DE TODOS LOS QUE  LO INTEGRAMOS EL EQUIPO COMERIAL Y ASI  CONSOLIDAR EL CUMPLIMIENTO DE LOS OBJETIVOS PROPUESTOS PARA ESTE MES DE ABRIL  /18', 'Cucuta', 'Cúcuta', 'CRISTINA RAMIREZ ,  MIREYA LAGUADO, ASESORES COMERCIALES, ROBINSON RINCON, CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO.', 4, 12, NULL, '2018-04-26 01:19:01', '2018-05-09 04:00:02'),
(142, 32, 4, 6, '2018-01-01', '2018-03-01', 'Enero - Marzo', '0', 'EL PROCESO TUVO UN DESEMPEÑO POSITIVO, YA QUE EN EL PRIMER TRIMESTRE NO SE PRESENTARON VEHICULOS VARADOS POR MAS DE UN DIA, LO QUE AYUDA A QUE SE MANTENGA EL INDICADOR SON LOS MANTENIMIENTOS PREVENTIVOS QUE SE LE REALIZAN AL VEHICULO, SE PUEDE SEGUIR MANTENIENDO SI LOS CONDUCTORES Y ADMINSITRADORES SIGUEN REALIZANDO LOS MANTENIMIENTOS A TIEMPO.', 'Cucuta', '', 'AUX DE INFRAESTRUCTURA', 1, 14, NULL, '2018-04-27 01:45:17', '2018-04-27 01:45:17'),
(143, 33, 4, 6, '2018-01-01', '2018-03-01', 'Enero - Marzo', '0', 'EL PROCESO SE HA DESEMPEÑADO BIEN, EN LO QUE VA DEL AÑO NO SE HAN PRESENTADO ACCIDENTES POR LOS CUALES SE DEBIERA AFECTAR LA POLIZA.', 'Cucuta', '', 'AUX DE INFRAESTRUCTURA', 1, 14, NULL, '2018-04-27 01:46:08', '2018-04-27 01:46:08'),
(144, 21, 6, 10, '2018-01-01', '2018-03-01', 'Enero - Marzo', '48', 'El indicador de este 1er trimestre del año no alcanza a cumplir la meta debido a  que esta meta fue trazada para medir un cumplimiento anual, sin embargo el resultado es muy satisfactorio pues evidencia un significativo nivel de avance al 1er trimestre del año, de seguir esta tendencia en el segundo trimestre se habrá alcanzado y superado la meta.', 'Cucuta', '', 'Lideres de procesos', 1, 17, NULL, '2018-04-28 21:15:08', '2018-04-28 21:18:17'),
(145, 7, 2, 4, '2018-03-01', '2018-03-01', 'Marzo', '68', 'el resultado del indicador nos muestra un leve desmejoramiento en la gestion de captacion de clientesen comparacion al mes anterior, lo anterior se podria indicar  que se ve afectado la gestion de captacion en los dias festivos que se presentaron en el mes de marzo dado que esto redujo el tiempo habil laboral desviando la mayor atencion al cumplimiento de la metas de ventas por ser un mes demasiado corto para la fuerza comercial', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTIÓN, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 3, 4, NULL, '2018-04-28 21:49:02', '2018-04-28 21:49:02'),
(146, 6, 2, 4, '2018-01-01', '2018-01-01', 'Enero', '36.70', 'EL INDICADOR DE ROTACION DE CARTERA DEL MES DE ENERO NOS EVIDENCIA  UN BUEN DESEMPEÑO EN EL TRABAJO DE RECAUDO ENTRE EL DEPARTAMENTO DE CARTERA Y LA FUERZA COMERCIAL , LOGRANDO CERRAR EL MES CON UN PROMEDIO DE 36,70 DIAS SIENDO ESTE RESULTADO BASTANTE SUPERIOR A LA META QUE SE TIENE EN MEDICIÓN DEL INDICADOR', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTIÓN, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 1, 4, NULL, '2018-04-28 21:52:02', '2018-06-07 19:47:17'),
(147, 7, 2, 4, '2018-02-01', '2018-02-01', 'Febrero', '83', 'el resultado del indicador nos muestra mejoramiento en el proceso de gestion  captacion de nuevos  clientes en comparacion con el mes anterior, mostrandonos que se ha avanzado en el proceso de  orientacion a nuestra fuerza de ventas y jefes de cartera en los requisitos exigidos por el departamento de cartera general para el otorgamiento del credito, evidenciando en el indicador un balance satisfactorio en relacion a la meta minima establecida en el indicador lo cual nos permite analizar a futuro subir el limite minimo establecido', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTIÓN, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 2, 4, NULL, '2018-04-28 21:54:46', '2018-04-28 21:54:46'),
(148, 6, 2, 4, '2018-02-01', '2018-02-01', 'Febrero', '47.36', 'EL INDICADOR DE ROTACION DE CARTERA DEL MES DE FEBRERO NOS REFLEJA UN INCREMENTO EN LOS DIAS DE RETORNO DE LA MISMA, ESTO DEBIDO A QUE EN EL MES DE FEBRERO FUE MENOR LA FACTURACION EN LA MODALIDAD DE CONTADO UN DIA QUE SE REFLEJÓ EN EL MES DE ENERO POR LAS MULTIPLES ALZAS EN LOS PRODUCTOS DE NUESTRO  PORTAFOLIO, SIENDO AUN EL RESULTADO SATISFACTORIO EN RELACIÓN A LA META ESTABLECIDA DEL INDICADOR.', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTIÓN, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 2, 4, NULL, '2018-04-28 22:43:11', '2018-04-28 22:45:35'),
(149, 6, 2, 4, '2018-03-01', '2018-03-01', 'Marzo', '45.09', 'EL INDICADOR DE ROTACION DE CARTERA DEL MES DE FEBRERO NOS REFLEJA UNA DISMINUCION EN LOS DIAS DE RETORNO DE LA MISMA,  DEBIDO A QUE EN EL MES DE FEBRERO FUE MAYOR LA FACTURACION A CREDITO Y A SU VEZ POR LOS DIAS DE SEMANA SANTA SE DISMINUYE EL RECAUDO  , SIENDO AUN EL RESULTADO SATISFACTORIO EN RELACIÓN A LA META ESTABLECIDA DEL INDICADOR.', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTIÓN, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 3, 4, NULL, '2018-04-28 22:46:33', '2018-04-28 22:46:33'),
(150, 7, 2, 4, '2018-01-01', '2018-01-01', 'Enero', '64', 'el resultado del indicador nos muestra un leve desmejoramiento en el proceso de gestion  captacion de nuevos  clientes en comparacion con el mes anterior, mostrandonos que aun falta profundizar en la orientacion a nuestra fuerza de ventas y jefes de cartera en los requisitos exigidos por el departamento de cartera general para el otorgamiento del credito, aunque nos encontramos en un punto satisfactorio en relacion a la meta establecida del indicador', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTIÓN, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 1, 4, NULL, '2018-04-28 22:58:09', '2018-04-28 22:58:09'),
(151, 10, 3, 5, '2018-01-01', '2018-01-01', 'Enero', '90.66', 'Se logra cumplir la meta en un 90,66% la cual es muy buena teniendo un inicio de año, donde normalmente los proveedores por cambios de condiciones comerciales, se les dificulta despachar toda la mercancía', 'Cucuta', '', 'Jefe de Compras, Gerencia administrativa, y SIG.', 1, 13, NULL, '2018-05-09 01:56:01', '2018-05-09 01:56:01'),
(152, 35, 3, 5, '2018-01-01', '2018-03-01', 'Enero - Marzo', '118', 'Se cumple con la meta, e incluso es un poco alta, quedando en 118 días, esto debido a que hemos comprado suficientes inventarios en las marcas Cordiant y llantas de moto Michelin, por ser negociaciones a precios muy especiales especiales, o compra a precio viejo', 'Cucuta', '-', 'Jefe de Compras, Gerencia administrativa, y SIG.', 1, 13, NULL, '2018-05-09 01:58:16', '2018-05-09 01:58:16'),
(153, 36, 3, 5, '2018-01-01', '2018-03-01', 'Enero - Marzo', '93', 'Se cumple con el indicador quedando en 93 días, el cual queda alto debido a una baja en ventas en este trimestre, y también por compras de inventario especiales a precio viejo, lo cual genera este resultado', 'Cucuta', '-', 'Jefe de Compras, Gerencia administrativa, y SIG.', 1, 13, NULL, '2018-05-09 02:00:12', '2018-05-09 02:00:12'),
(154, 37, 3, 5, '2018-01-01', '2018-03-01', 'Enero - Marzo', '84', 'Se cumple con el indicador obteniendo 84 días, el cual es similar al del periodo anterior, logrando estabilidad en los inventarios. También por la baja en ventas, se bajan un poco los inventarios, pero el indicador se mantiene estable', 'Cucuta', '-', 'Jefe de Compras, Gerencia administrativa, y SIG.', 1, 13, NULL, '2018-05-09 02:00:40', '2018-05-09 02:00:40'),
(155, 11, 3, 5, '2018-01-01', '2018-03-01', 'Enero - Marzo', '0.55', 'Se cumple el indicador en 0,55, mejorando los dos periodos anteriores, lo cual ratifica el buen desempeño del personal de compras al ejecutar el cronograma de pedidos', 'Cucuta', '', 'Jefe de Compras, Gerencia administrativa, y SIG.', 1, 13, NULL, '2018-05-09 02:01:50', '2018-05-09 02:01:50'),
(156, 8, 2, 3, '2018-01-01', '2018-01-01', 'Enero', '136.3', 'EN  EL  MES DE ENERO /18    ALCANZAMOS UN CUMPLIMIENTO DEL PRESUPUESTO AL136,3%  . EL FENOMENO DE ESCASES DE LUBRCIANTES EN  EL VECINO  PAIS DE VENEZUELA, CONTINUA  IMPACTANDO FAVORABLEMENTE LAS VENTAS. LA NUEVA FORMA DE PAGO Y MEJORAMIENTO DE LOS INCENTIVOS  A LA FUERZA DE VENTAS,  LOS APOYOS PROMOCICONALES EN LLANTAS  Y   TODO  SUMADO AL COMPROMISO  DE TODOS LOS QUE INTEGRAMOS   EL EQUIPO COMERCIAL  GENERO EL EXCELENTE  CUMPLIMIENTO DE LOS OBJETIVOS PROPUESTOS PARA ESTE MES DE ENERO /18', 'Cucuta', 'Cúcuta', 'ROSA E. CARRILLO G.,  MIREYA LAGUADO, ASESORES COMERCIALES, ROBINSON RINCON, CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO', 1, 12, NULL, '2018-05-09 03:29:36', '2018-05-09 03:29:36'),
(157, 8, 2, 3, '2018-02-01', '2018-02-01', 'Febrero', '121.8', 'EN  EL  MES DE ENERO /18    ALCANZAMOS UN CUMPLIMIENTO DEL PRESUPUESTO AL121,8%  .  CONTINUA EL INCREMENTO DE LAS VENTAS  HACIA NUESTRO CLIENTES DE CANAL QUE SE REPLICA A SU VEZ EN LOS COMPRADORES DE VENEZUELA, LA EXCELENTE PROMOCION DE OBSEQUIO DE FILTROS PARTMO EN  LAS LINEAS DE LIIVIANO, MEDIANO Y PESADOPOR COMPRAS DE LUBRICANTES STAR OIL OBTUVO UNA  RESPUESTA MUY FAVORABLE EN EL MERCADO. LOS APOYOS PROMOCICONALES EN LLANTAS  Y   TODO  SUMADO AL COMPROMISO  DE TODOS LOS QUE INTEGRAMOS   EL EQUIPO COMERCIAL  GENERO EL EXCELENTE  CUMPLIMIENTO DE LOS OBJETIVOS PROPUESTOS PARA ESTE MES DE FEBRERO /18', 'Cucuta', 'Cúcuta', 'ROSA E. CARRILLO G.,  MIREYA LAGUADO, ASESORES COMERCIALES, ROBINSON RINCON, CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO', 2, 12, NULL, '2018-05-09 03:31:13', '2018-05-09 03:31:13'),
(158, 31, 6, 9, '2018-01-01', '2018-03-01', 'Enero - Marzo', '89.29', 'Se da un cumplimiento del 89.29% de los 84 requisitos identificados como aplicables a la empresa, en enero 19 de 2018 el Ministerio de Trabajo autorizo a la empresa realizar trabajo suplementario, es decir horas extras en todas las sedes y todos los cargos de la empresa, este requisito esta contemplado en la ley 23 de 1967 y ley 129 de 1931.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Jefe de personal, administradores', 1, 16, NULL, '2018-05-11 00:56:31', '2018-05-11 00:56:31'),
(159, 25, 6, 9, '2018-01-01', '2018-01-01', 'Enero', '0', 'No existe variación ya que ningún empleado reporto accidente laboral en el transcurso del mes, ni reporte de AT por parte de los que están por la temporal o prestación de servicios, lo cual demuestra que con el apoyo de las charlas brindadas, el personal ha adquirido cultura de autocuidado en su labor diaria.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 1, 16, NULL, '2018-05-11 00:58:57', '2018-05-11 01:54:45'),
(160, 25, 6, 9, '2018-02-01', '2018-02-01', 'Febrero', '0.472', 'Por los 212 empleados se presento un accidente en el mes, siendo  0,47% un porcentaje mínimo de accidentalidad mas sin embargo se debe intervenir para evitar reincidencia del mismo.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, administradores', 2, 16, NULL, '2018-05-11 01:00:35', '2018-05-11 01:00:35'),
(161, 25, 6, 9, '2018-03-01', '2018-03-01', 'Marzo', '0.469', 'En el mes un conductor de Bucaramanga presento un accidente de trabajo al momento de descargar un tambor del vehículo, generandole una lesión en la mano, por ello se puede evidenciar la variación del indicador, demostrando que de cada 213 empleados sin importar el tipo de contrato 1 se accidenta.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 3, 16, NULL, '2018-05-11 01:04:02', '2018-05-11 01:04:02'),
(162, 25, 6, 9, '2018-04-01', '2018-04-01', 'Abril', '0', 'No existe variación ya que ningún empleado reporto accidente laboral en el transcurso del mes, ni reporte de AT por parte de los que están por la temporal o prestación de servicios.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 4, 16, NULL, '2018-05-11 01:08:16', '2018-05-11 01:08:16'),
(163, 27, 6, 9, '2018-01-01', '2018-01-01', 'Enero', '0', 'En lo transcurrido del mes, se puede evidenciar que no ocurrió accidente laboral por ende no hay variación en el indice de lesiones incapacitantes.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 1, 16, NULL, '2018-05-11 01:10:44', '2018-05-11 01:10:44'),
(164, 27, 6, 9, '2018-02-01', '2018-02-01', 'Febrero', '0.003', 'En lo transcurrido del mes, se puedo evidenciar que ocurrió un evento, el cual dejo 5 días de incapacidad, con prorroga de 9 días para un total 14 días de incapacidad lo que hace que se genere una variación en el indice de lesiones incapacitantes de la empresa.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 2, 16, NULL, '2018-05-11 01:14:04', '2018-05-11 01:14:04'),
(165, 27, 6, 9, '2018-03-01', '2018-03-01', 'Marzo', '0.0005', 'Debido a que se presento un accidente en el mes, esto genero una lesión con incapacidad de 2 días, lo que hace que se genere una variación muy mínima en el indice de lesiones incapacitantes de la empresa.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 3, 16, NULL, '2018-05-11 01:16:55', '2018-05-11 01:16:55'),
(166, 27, 6, 9, '2018-04-01', '2018-04-01', 'Abril', '0', 'En lo transcurrido del mes, no ocurrió accidente laboral por ende no hay variación en el indice de lesiones incapacitantes.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 4, 16, NULL, '2018-05-11 01:18:23', '2018-05-11 01:18:23'),
(167, 28, 6, 9, '2018-01-01', '2018-03-01', 'Enero - Marzo', '1.42', 'Debido al aumento en el promedio de trabajadores por la inclusión de los empleados por prestación de servicios, contratistas y los de inlaserv (de los cuales ninguno tiene alguna enfermedad laboral), el indicador disminuyo, aun sin tener variación en el numero de enfermedades laborales con relación a los empleados directos el cual se mantiene en 3. Esto puede variar en los próximos meses ya que actualmente existe un estudio por parte de la EPS, ARL y junta regional de dos empleados con sospecha de origen de enfermedad laboral.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Jefe de personal, SIG', 1, 16, NULL, '2018-05-11 01:20:50', '2018-05-11 01:20:50'),
(168, 29, 6, 9, '2018-01-01', '2018-03-01', 'Enero - Marzo', '97.4', 'Se evidencia el cumplimiento con relación al diligenciamiento y recorrido que amerita cada inspección programada mensualmente en todas las sucursales, en general las observaciones detectadas en cada inspección son de elementos de los botiquines que se encuentran vencidos y elementos de protección personal que requieren cambio o reposición.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Admistradores', 1, 16, NULL, '2018-05-11 01:35:15', '2018-05-11 01:35:15'),
(169, 24, 6, 9, '2018-01-01', '2018-03-01', 'Enero - Marzo', '88', 'El nivel de cumplimiento del cronograma es de un 88% ejecutando actividades tendientes a cumplir con el Sistema de Gestión de Seguridad y Salud en el Trabajo, pero el 12% restante para alcanzar el 100% corresponde a actividades como: inspección a motos en Tubara, Valledupar, cartagena, Saravena, no se estan ejecutando pausas activas en Bogota, Cartagena, Contecar y Sociedad portuaria. Se concientiza a los administradores y sus auxiliares para el cumplimiento de estas actividades en pro del bienestar de cada empleado y así no llegar a incumplir con el Plan de trabajo establecido para el sistema.', 'Cucuta', 'Cúcuta', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 1, 16, NULL, '2018-05-11 01:42:15', '2018-05-11 01:42:15'),
(170, 26, 6, 9, '2018-01-01', '2018-01-01', 'Enero', '33.5', 'En el análisis del cuadro de ausentismos general se observa que el mayor porcentaje de ausentismo fue por enfermedad general, la causa principal hernia inguinal, seguido de enfermedad laboral por trastorno de disco cervical con radiculopatia.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 1, 16, NULL, '2018-05-11 01:48:07', '2018-05-11 01:48:07'),
(171, 26, 6, 9, '2018-02-01', '2018-02-01', 'Febrero', '55.5', 'El porcentaje de ausentismo aumentó debido a que se presento licencia de maternidad y ley maria, adicional por enfermedad general las causas de ausencia fueron de resfriados, malformaciones congénitas del tórax oseo, y de accidente de trabajo por contusión en el codo.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 2, 16, NULL, '2018-05-11 01:51:27', '2018-05-11 01:51:27'),
(172, 26, 6, 9, '2018-03-01', '2018-03-01', 'Marzo', '54.3', 'Se observa que la severidad de ausentismo se mantiene casi igual al mes anterior ya que se presentó nuevamente un caso por ley maria con 12 días y un caso por maternidad con 31 días y de enfermedad general, la causa principal fue de hernia inguinal, con 30 días perdidos, accidente de trabajo por golpes en la muñeca y mano con 2 días, enfermedad laboral por trastorno de disco cervical con radiculopatia, con 29 días de incapacidad.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 3, 16, NULL, '2018-05-11 01:52:41', '2018-05-11 01:52:41'),
(173, 30, 6, 9, '2018-01-01', '2018-01-01', 'Enero', '1.34', 'Según los resultados arrojados del indicador se puede analizar que el 1,34% de los 209 empleados en el mes se incapacitan, las principales causas fueron por enfermedad general, con diagnósticos de hernia inguinal, por enfermedad laboral la causa fue trastorno de disco cervical con radiculopatia, en el mes de enero de 2018 las ausencias disminuyeron en comparación con mes anterior que fue de 2,22%.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 1, 16, NULL, '2018-05-11 02:38:59', '2018-05-11 02:38:59'),
(174, 30, 6, 9, '2018-02-01', '2018-02-01', 'Febrero', '2.22', 'Con los resultados arrojados  podemos observar que se incrementa el numero de ausentismo casi al doble,  aun así, no  sobrepasa del limite permitido, puesto que fue del 2,22%. Las causas de incapacidades fueron: Enfermedad general por resfriados, malformaciones congénitas del tórax oseo, por accidente de trabajo se dio incapacidad por contusión en el codo,  ademas se presentaron ley maría y maternidad.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 2, 16, NULL, '2018-05-11 02:40:36', '2018-05-11 02:40:36'),
(175, 30, 6, 9, '2018-03-01', '2018-03-01', 'Marzo', '2.17', 'Según los resultados se observa que el indicador de ausentismo se mantiene casi al mismo rango del mes anterior con el 2,17% de ausentismo. Las causas de ausencia por enfermedad general fue hernia inguinal,  por accidente de trabajo fue debido a golpes en la muñeca y mano, enfermedad laboral por trastorno de disco cervical con radiculopatia, 1 caso por ley maría y 1 caso por maternidad.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 3, 16, NULL, '2018-05-11 02:41:19', '2018-05-11 02:41:19'),
(176, 18, 5, 8, '2018-01-01', '2018-03-01', 'Enero - Marzo', '92.35', 'En el primer trimestre del año el nivel de asistencia a las capacitaciones y formaciones planeadas fue satisfactorio en la gran mayoria, notandose aun así la inasistencia de algunas personas cuya razón principal fue que se encontraban de correria y no alcanzaban a llegar a la capacitación.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, SIG', 1, 5, NULL, '2018-05-11 20:01:01', '2018-05-11 20:01:01'),
(177, 30, 6, 9, '2018-04-01', '2018-04-01', 'Abril', '2.91', 'Abril: Se observa que el indicador de ausentismo aumento en un 0,75% a diferencia del mes anterior, debido a que se presenta de nuevo 1 evento por ley maría, con 11 días perdidos y 1 evento por maternidad, con 30 días perdidos. También se presentan 24 casos por enfermedad general con 114 días perdidos.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 4, 16, NULL, '2018-05-11 21:04:45', '2018-05-11 21:04:45'),
(178, 26, 6, 9, '2018-04-01', '2018-04-01', 'Abril', '72.8', 'Se evidencia que el porcentaje de ausentismo aumentó debido a que se presentaron 24 casos por enfermedad general, la causa principal fue hernia inguinal bilateral, sin obstrucción ni gangrena, y al igual que el mes anterior se presentan de nuevo, 1 evento por ley maría con 11 días de incapacidad y 1 evento por maternidad con 30 días.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 4, 16, NULL, '2018-05-11 21:08:10', '2018-05-11 21:08:10'),
(179, 38, 1, 2, '2018-01-01', '2018-03-01', 'Enero - Marzo', '95.81', '.', 'Cucuta', '-', 'JEFE DE VENTAS\nASISTENTE DE RECURSOS HUMANOS\nJEFE DE CARTERA\nJEFES DE ESTABLECIMIENTO', 1, 2, NULL, '2018-05-11 21:54:36', '2018-05-11 21:54:36'),
(180, 8, 2, 3, '2018-01-01', '2018-01-01', 'Enero', '98', 'EN LOS RESULTADOS DEL MES DE ENERO DE 2018 OBTUVIMOS UNAS VENTAS FINALES DE $ 803 MILL, CON UN PORCENTAJE EN CUMPLIMIENTO DEL 98% RESULTADOS QUE NOS PERMITIERON MEJORAR CON RESPECTO AL MES INMEDIATAMENTE ANTERIOR EN $ 114 MILL LO QUE CORRESPONDE A UN PORCENTAJE MAYOR DEL 17%, RESULTADO QUE SE LOGRO AL GRAN APOYO POR PARTE DE LA COMPAÑIA CON BUENAS PROMOCIONES EL ALZA DE PRECIOS EN VARIAS LINEAS QUE TAMBIEN AYUDO A FINIQUITAR NEGOCIOS CON MAYORES COMPRAS, ADICIONAL A ESTO EL COMPROMISO EN LA LABOR COMERCIAL POR PARTE DE LA FUERZA DE VENTAS DE LAS ZONAS 1 A LA 5 Y A NEGOCIOS QUE SE LOGRARON CONCRETAR Y QUE SE FACTURARON AL CODIGO DE OFICINA, PARA EL MES DE FEBRERO ESPERAMOS MANTENERMOS FIRMES EN EL COMPROMISO DE LOGRAR EXCELENTES RESULTADOS ASI COMO LOS LOGRADOS EN EL MES DE ENERO.', 'Bucaramanga', 'Bucaramanga', 'Robinson Rincon, Clara Sanchez, Doris Ruiz, Juan Carlos Chamucero', 1, 20, NULL, '2018-05-15 06:16:16', '2018-05-15 06:27:45'),
(181, 8, 2, 3, '2018-02-01', '2018-02-01', 'Febrero', '80', 'EN LOS RESULTADOS DEL MES DE FEBRERO DE 2018 OBTUVIMOS UNAS VENTAS FINALES DE $ 655 MILL, CON UN PORCENTAJE EN CUMPLIMIENTO DEL 80% RESULTADOS QUE AFECTO NUESTROS CUMPLIMIENTOS RESPECTO AL MES INMEDIATAMENTE ANTERIOR PUES DISMINUIMOS EN NUESTRAS VENTAS EN $ 180 MILL LO QUE CORRESPONDE A UN PORCENTAJE MENOR DEL 21%, RESULTADO QUE AFECTA CONSIDERABLEMENTE EL DESEMPEÑO DE LA SUCURSAL PUES PARA EL AÑO 2018 SE TIENE PLANEADO LOGRAR EL CUMPLIMIENTO AL 100% DEL PRESUPUESTO CON EL MANEJO DE NUEVAS LINEAS DE PRODUCTO Y EL CRECIMIENTO DE LAS QUE YA SE VIENEN MANEJANDO, PARA EL MES DE MARZO SE TOMARAN LAS MEDIDAS PERTINENTES PARA LOGRAR MEJORES RESULTADOS CON EL FIN DE LOGRAR EL CUMPLIMIENTO DEL PRESUPUESTO DE LA SUCURSAL', 'Bucaramanga', 'Bucaramanga', 'CLARA SANCHEZ, ROBINSON RINCON, JUAN CARLOS CHAMUCERO Y DORIS RUIZ', 2, 20, NULL, '2018-05-22 03:25:44', '2018-05-22 03:25:44'),
(182, 8, 2, 3, '2018-04-01', '2018-04-01', 'Abril', '93', 'EN LOS RESULTADOS DEL MES DE ABRIL DE 2018 OBTUVIMOS UNAS VENTAS DE 791 MILL CON UN CUMPLIMIENTO DEL 93%, RESULTADO QUE INDICA QUE DISMINUIMOS CON RESPECTO AL MES INMEDIATAMENTE ANTERIOR EN $ 44 MILL ESTO SE DEBE A LAS VENTAS BAJAS OBTENIDAS POR UNOS ASESORES POR UN TEMA DE COMPETENCIA EN LA LINEA DE 2R MICHELIN YA QUE LA COMPETENCIA ESTA VENDIENDO CON PRECIOS MUY POR DEBAJO DE LOS QUE ESTAMOS VENDIENDO EN PROCAR, PARA EL MES DE MAYO SE BUSCARA SOLUCION O SE REEMPLAZARA LAS VENTAS PERDIDAS EN ESTA LINEA CON OTRA PUES TENEMOS OTRAS ALTERNATIVAS CON LAS CUALES PODEMOS LLEGAR A LOS OBJETIVOS QUE QUEREMOS, EL 100% DE NUESTRO PRESUPUESTO', 'Bucaramanga', 'Bucaramanga', 'CLARA SANCHEZ, ROBINSON RINCON, JUAN CARLOS CHAMUCERO Y DORIS RUIZ', 4, 20, NULL, '2018-05-22 03:52:11', '2018-05-22 03:52:11'),
(183, 8, 2, 3, '2018-05-01', '2018-05-01', 'Mayo', '116.3', 'EN  EL  MES DE MAYO  /18    ALCANZAMOS UN CUMPLIMIENTO DEL PRESUPUESTO AL 116.3%  .  CONTINUAMOS CON LAS  PROMOCIONES Y  ALIANZAS ENTRE LINEAS DE NUESTRO PROTAFOLIO. . SE GENERARON VENTAS EN NUESTRA LINEA DE LLANTAS AOTELI Y SE INCREMENTARON EN LA LLINEA MICHELIN.  EL DPTO. COMERCIAL DE CUCUTA CONCENTRA SUS ESFUERZOS EN  IMPULSAR LOS APOYOS PROMOCIONALES  VIGENTES EN NUESTRO PORTAFOLIO  CON EL COMPROMISO  DE TODOS LOS QUE  LO INTEGRAMOS Y ASI  CONSOLIDAR EL CUMPLIMIENTO DE LOS OBJETIVOS PROPUESTOS PARA ESTE MES DE MAYO   /18', 'Cucuta', 'Cúcuta', 'CRISTINA RAMIREZ ,  MIREYA LAGUADO, ASESORES COMERCIALES, ROBINSON RINCON, CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO.', 5, 12, NULL, '2018-06-02 22:59:20', '2018-06-02 22:59:20'),
(184, 8, 2, 3, '2018-05-01', '2018-05-01', 'Mayo', '90', 'CON RESPECTO A LOS RESULTADOS DEL MES DE MAYO DE 2018 SE LOGRO UN CUMPLIMIENTO DEL 90% $ 27 MILL MENOS QUE EN EL MES DE ABRIL ESTO DEBIDO A QUE EN LA LINEA DE 2R SE HAN DISMINUIDO LAS VENTAS A CASI TODOS NUESTROS CLIENTES POR UN TEMA DE PRECIOS VS LA COMPETENCIA FANALCA Y DISTRIMOTOS YA QUE SUS PRECIOS SON MUY BAJOS CON RESPECTO A PROCAR INVERSIONES AUNQUE PROCAR HA HECHO UN ESFUERZO EN AJUSTAR PRECIOS PARA SER COMPETITIVOS EN ESTA LINEA AUN SEGUIMOS POR ENCIMA EN PRECIOS LO QUE NOS HA LLEVADO A DISMINUIR CONSIDERABLEMENTE EN LAS VENTAS DE ESTA LINEA, PARA EL MES DE JUNIO ESPERAMOS AUMENTAR LAS VENTAS YA SEA EN LA MISMA LINEA O BUSCAR REEMPLAZAR LAS VENTAS QUE SE HAN PERDIDO CON OTRA LINEA, PARA MANTENERNOS Y LOGRAR LLEGAR A LOS RESULTADOS QUE ESPERA LA COMPAÑIA', 'Bucaramanga', 'Bucaramanga', 'ROBINSON RINCON, CLARA SANCHEZ, JUAN CARLOS CHAMUCERO Y DORIS RUIZ', 5, 20, NULL, '2018-06-06 17:58:59', '2018-06-06 17:58:59'),
(185, 7, 2, 4, '2018-05-01', '2018-05-01', 'Mayo', '85', 'el resultado del indicador nos muestra mejoramiento en la gestion  en comparacion al mes anterior, lo anterior  despues de la implementacion de plan de  actualizacion y mejoramientos de cupos de credito para clientes tradicionales que se fortalecio a partir del mes de abril', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTION, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 5, 4, NULL, '2018-06-07 19:38:11', '2018-06-07 19:38:11'),
(186, 7, 2, 4, '2018-04-01', '2018-04-01', 'Abril', '81', 'el resultado del indicador nos muestra mejoramiento en la gestión  en comparación al mes anterior, lo anterior  después de la implementación de plan de  actualización y mejoramientos de cupos de crédito para clientes tradicionales que se fortaleció a partir del mes de abril', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTION, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 4, 4, NULL, '2018-06-07 19:40:28', '2018-06-07 19:40:28'),
(187, 6, 2, 4, '2018-04-01', '2018-04-01', 'Abril', '45.5', 'EL INDICADOR DE ROTACION DE CARTERA DEL MES DEABRIL NOS REFLEJA VARIACION EN LOS DIAS DE RETORNO DE LA MISMA,  DEBIDO A UN ESTANCAMIENTO DE A NIVEL NACIONAL DE LA ECONOMIA QUE HA IMPACTADO AL SECTOR COMERCIAL LO CUAL SE ESTA REFLEJANDO EN EL  RECAUDO  , SIENDO AUN EL RESULTADO SATISFACTORIO EN RELACIÓN A LA META ESTABLECIDA DEL INDICADOR.', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTION, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 4, 4, NULL, '2018-06-07 19:46:21', '2018-06-07 19:46:21'),
(188, 2, 1, 1, '2018-01-01', '2018-03-01', 'Enero - Marzo', '-1.36', 'Las ventas respecto al presupuesto establecido estuvieron por DEBAJO en un 1,36% resultado de los incrementos en el mes de Enero por parte de Michelin, y tambien por las referencias que no ha despachado la fabrica por desabastecimiento.', 'Cucuta', '-', 'Gerencia General, Gerente Ejecutivo', 1, 21, NULL, '2018-06-29 00:41:32', '2018-06-29 00:41:32'),
(189, 3, 1, 1, '2018-01-01', '2018-03-01', 'Enero - Marzo', '0.6', 'Las ventas respecto al presupuesto establecido estuvieron  por ENCIMA de lo establecido en un 0,6%, pués en el mes de Enero se presento alza de precios contribuyendo a nivel general en el aumento de las ventas y adicionalemente se mantuvieron las promociones en varias referencias de alta rotación', 'Cucuta', '', 'Gerencia General, Gerente Ejecutivo', 1, 21, NULL, '2018-06-29 00:45:22', '2018-06-29 00:45:22'),
(190, 4, 1, 1, '2018-01-01', '2018-03-01', 'Enero - Marzo', '104.9', 'Las ventas respecto al presupuesto establecido estuvieron por ENCIMA en un 104,9%, resultado de las ventas en las sucursales de Cucuta, Valledupar y Santa Marta por desabastecimiento de lubricantes en venezuela.', 'Cucuta', '', 'Gerencia General, Gerente Ejecutivo', 1, 21, NULL, '2018-06-29 00:48:57', '2018-06-29 00:48:57'),
(191, 34, 1, 1, '2018-01-01', '2018-01-01', 'Enero', '4369332537', 'Las ventas repecto al Vr. Minimo establecido estuvieron por ENCIMA en un  21,37%, gracias al incremento de precios en las lineas de producto, el fortalecimiento en los pagos de los incentivos, los cuales se comenzaron a pagar en efectivo, y al ingreso de lineas como BLUE WHALE', 'Cucuta', '', 'Gerencia General, Gerente Ejecutivo', 1, 21, NULL, '2018-06-29 01:21:02', '2018-06-29 01:21:02'),
(192, 34, 1, 1, '2018-02-01', '2018-02-01', 'Febrero', '3789222050', 'Las ventas repecto al Vr. Minimo establecido estuvieron por ENCIMA en un  5,2%, las ventas respecto al mes anterior disminuyen, por que despues del alza en los precios los clientes incrementan los stock minimos de mercancía y por ende solo compran lo que se les agota', 'Cucuta', '', 'Gerencia General, Gerente Ejecutivo', 2, 21, NULL, '2018-06-29 01:23:16', '2018-06-29 01:23:16'),
(193, 34, 1, 1, '2018-03-01', '2018-03-01', 'Marzo', '4105144253', 'Las ventas repecto al Vr. Minimo establecido estuvieron por ENCIMA en un  14,03%, pues se mantiene el incremento en la venta de lubricantes por las sucursales de Cúcuta, Santa Marta y Valledupar por el tema de Venezuela, e ingresa la nueva linea de llantas marca AOTELI', 'Cucuta', '', 'Gerencia General, Gerente Ejecutivo', 3, 21, NULL, '2018-06-29 01:27:25', '2018-06-29 01:27:25'),
(194, 34, 1, 1, '2018-04-01', '2018-04-01', 'Abril', '3930968250', 'Las ventas repecto al Vr. Minimo establecido estuvieron por ENCIMA en un  9,2%, las ventas respecto al mes anterior disminuyen en un 4,2%, por que perdemos participación respecto a que la competencia en llantas de moto otorga condiciones comerciales con margenes de rentabilidad muy bajos que están entre un 7 y 8% que no cubre nuestros costos fijos.', 'Cucuta', '', 'Gerencia General, Gerente Ejecutivo', 4, 21, NULL, '2018-06-29 01:44:25', '2018-06-29 01:44:25'),
(195, 34, 1, 1, '2018-05-01', '2018-05-01', 'Mayo', '3883649100', 'Las ventas repecto al Vr. Minimo establecido estuvieron por ENCIMA en un  7,8%%, las ventas respecto al mes anterior disminuyen en un 1,2%, por que se mantiene la perdida de  participación respecto a que la competencia en llantas de moto otorga condiciones comerciales con margenes de rentabilidad muy bajos que están entre un 7 y 8% que no cubre nuestros costos fijos, y adicionalmente se presenta algo similar con algunos clientes en la linea de filtros, sin embargo  en la primera semana del mes de Junio entra a nuestro portafolio nuestra NUEVA línea de FILTROS ELEMFIL, como medida de choque para contra restar la disminución en las ventas', 'Cucuta', '', 'Gerencia General, Gerente Ejecutivo', 5, 21, NULL, '2018-06-29 01:54:33', '2018-06-29 01:54:33'),
(197, 15, 4, 6, '2018-04-01', '2018-06-01', 'Abril - Junio', '100', 'De acuerdo a la evaluación se mantuvo el 100% por el buen trabajo en calidad y precio del proveedores, ADICIONAL A ESTO ESTAMOS MANEJANDO LOS ARREGLOS DE INFRAESTRUCTURA CON PERSONAL DE PROCAR (JOSE GÓMEZ)', 'Bucaramanga', 'Bucaramanga', 'SANDRA ROA', 2, 22, NULL, '2018-07-04 20:38:53', '2018-07-04 20:38:53'),
(198, 17, 4, 7, '2018-01-01', '2018-03-01', 'Enero - Marzo', '94', 'Se realizo la evaluación a 2 proveedores que venimos trabajando con un porcentaje del 94% la cual se han mantenido la calidad y los buenos precios del servicio.', 'Bucaramanga', 'Bucaramanga', 'SANDRA ROA', 1, 22, NULL, '2018-07-04 20:40:42', '2018-07-04 20:40:42'),
(199, 7, 2, 4, '2018-06-01', '2018-06-01', 'Junio', '79', 'el resultado del indicador nos muestra un leve desmejoramiento en la gestion  en comparacion al mes anterior esta variante minmia puede ser constante debido a clientes que deben ser negados los creditos por reportes negativos en centrales de riesgo , se mantieneel proceso  de  actualizacion y mejoramientos de cupos de credito para clientes tradicionales que se fortalecio a partir del mes de abril ,', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTION, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 6, 4, NULL, '2018-07-05 00:15:22', '2018-07-05 00:15:22'),
(200, 6, 2, 4, '2018-05-01', '2018-05-01', 'Mayo', '48.26', 'EL INDICADOR DE ROTACIÓN DE CARTERA DEL MES DE MAYO NOS REFLEJA UN LEVE DESMEJORAMIENTO  EN LOS DÍAS DE RETORNO DE LA  CARTERA,  DEBIDO AL ESTANCAMIENTO  DE LA ECONOMÍA A NIVEL DE TODO EL PAÍS, ESTO SUMADO A UN PERIODO LARGO DE CAMPAÑA ELECTORAL , SIENDO AUN EL RESULTADO SATISFACTORIO EN RELACIÓN A LA META ESTABLECIDA DEL INDICADOR.', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTIÓN, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 5, 4, NULL, '2018-07-05 00:21:30', '2018-07-05 00:21:30'),
(201, 15, 4, 6, '2018-01-01', '2018-03-01', 'Enero - Marzo', '100', 'De acuerdo a la evaluación se mantuvo el 100% por el buen trabajo en calidad y precio del proveedores.', 'Bucaramanga', 'Bucaramanga', 'SANDRA ROA', 1, 22, NULL, '2018-07-05 00:21:44', '2018-07-05 00:21:44'),
(202, 17, 4, 7, '2018-04-01', '2018-06-01', 'Abril - Junio', '94', 'Se realizo la evaluación a 2 proveedores que venimos trabajando con un porcentaje del 94% la cual se han mantenido la calidad y los buenos precios del servicio.', 'Cucuta', 'Cúcuta', 'SANDRA ROA', 2, 22, NULL, '2018-07-05 00:23:11', '2018-07-05 00:23:11'),
(203, 17, 4, 7, '2018-04-01', '2018-06-01', 'Abril - Junio', '94', 'Se realizo la evaluación a 2 proveedores que venimos trabajando con un porcentaje del 94% la cual se han mantenido la calidad y los buenos precios del servicio.', 'Bucaramanga', 'Bucaramanga', 'SANDRA ROA', 2, 22, NULL, '2018-07-05 00:25:30', '2018-07-05 00:25:30'),
(204, 21, 6, 10, '2018-04-01', '2018-06-01', 'Abril - Junio', '67', 'El resultado del indicador es muy satisfactorio, evidencia un buen nivel de avance en las actividades programadas para el 1er semestre del año, de seguir esta tendencia se estima que a mediados del 2do semestre se habrá alcanzado y superado la meta del 70%.', 'Cucuta', '', 'Gerentes y jefes de proceso', 2, 17, NULL, '2018-07-06 03:52:24', '2018-07-06 03:52:24'),
(205, 2, 1, 1, '2018-04-01', '2018-06-01', 'Abril - Junio', '-0.75', 'Las ventas respecto al presupuesto establecido estuvieron por DEBAJO en un 0,75% resultado de los nuevos incrementos en precios por parte de Michelin, y las condiciones comerciales de la competencia como Fanalca y Distrimotos en  clientes con altos volumenes de compra, sin embargo se espera recuperar estas ventas con las nuevas marcas Aoteli y Blue Whale', 'Cucuta', '-', 'GERENCIA GENERAL - GERENCIA EJECUTIVA', 2, 21, NULL, '2018-07-07 00:03:08', '2018-07-07 00:03:08'),
(206, 6, 2, 4, '2018-06-01', '2018-06-01', 'Junio', '51.01', 'EL INDICADOR DE ROTACION DE CARTERA DEL MES DE JUNIO NOS REFLEJA UN INCREMENTO  EN LOS DIAS DE RETORNO DE LA MISMA,  DEBIDO A QUE EN EL MES DE  FUE MENOR LA FACTURACION A CREDITO, DEBIDO A QUE LAS VENTAS A UN DIA A DISMINUIDO Y EL RECAUDO A MAYOR TIEMPO SE A EXTENDIDO AL MAXIMO \"90 DIAS\"   , SIENDO AUN EL RESULTADO SATISFACTORIO EN RELACIÓN A LA META ESTABLECIDA DEL INDICADOR.', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTION, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 6, 4, NULL, '2018-07-07 00:09:17', '2018-07-07 00:09:17'),
(207, 3, 1, 1, '2018-04-01', '2018-06-01', 'Abril - Junio', '2', 'Las ventas respecto al presupuesto establecido estuvieron  por ENCIMA de lo establecido en un 2%, pués  durante el trimestre se ha mantenido un listado de referencias de alta rotación el cual ha permitido cerrar la brecha con la competencia lo que a permitida a nivel general en el aumento de las ventas y adicionalmente se han mejorado los despachos por parte de la fabrica, minimizando los agotados.', 'Cucuta', '', 'GERENCIA GENERAL - GERENCIA EJECUTIVA', 2, 21, NULL, '2018-07-07 00:09:38', '2018-07-07 00:09:38'),
(208, 4, 1, 1, '2018-04-01', '2018-06-01', 'Abril - Junio', '75.43', 'Las ventas respecto al presupuesto establecido estuvieron por ENCIMA en un 75,43%, resultado de los incrementos que se mantienen por la zona de frontera con Venezuela, y el posicionamiento de la marca Star Oil en todas sus lineas gracias al respaldo del proveedor PETROBRAS que Maquila el producto, lo que genera confianza y tranquilidad a nuestra amplia clientela', 'Cucuta', '', 'GERENCIA GENERAL - GERENCIA EJECUTIVA', 2, 21, NULL, '2018-07-07 00:17:27', '2018-07-07 00:17:27'),
(209, 34, 1, 1, '2018-06-01', '2018-06-01', 'Junio', '3849485652', 'Las ventas repecto al Vr. Minimo establecido estuvieron por ENCIMA en un  6,93%,  y respecto al mes de Mayo se evidencia una disminución del 0,87%, lo que quiere decir que no se presentó un decrecimiento significativo, a pesar de el entorno respecto a las elecciones presidenciales y el mundial de futbol Russia 2018', 'Cucuta', '', 'GERENCIA GENERAL - GERENCIA EJECUTIVA', 6, 21, NULL, '2018-07-07 00:28:52', '2018-07-07 00:28:52'),
(210, 8, 2, 3, '2018-06-01', '2018-06-01', 'Junio', '149.89', 'EN  EL  MES DE  JUNIO  /18    ALCANZAMOS UN CUMPLIMIENTO DEL PRESUPUESTO AL 118,5%  .  CONTINUAMOS CON LAS  PROMOCIONES Y  ALIANZAS ENTRE LINEAS DE NUESTRO PROTAFOLIO. STAR OIL /PARTMO , 2R CON STAR OIL/BLUEWHALE. LAS PROMOCIONES  EN LLANTAS AOTELI  GENERARON UNA IMPORTANTE ROTACION EN ESTA LINEA. Y SE INCREMENTARON EN LA LINEA MICHELIN.  EL DPTO COMERCIAL DE CUCUTA CONCENTRA SUS ESFUERZOS EN  IMPULSAR LOS APOYOS PROMOCIONALES  VIGENTES EN NUESTRO PORTAFOLIO  CON EL COMPROMISO  DE TODOS LOS QUE  LO INTEGRAMOS EL EQUIPO COMERCIAL Y ASI  CONSOLIDAR EL CUMPLIMIENTO DE LOS OBJETIVOS PROPUESTOS PARA ESTE MES DE JUNIO   /18', 'Cucuta', 'Cúcuta', 'ASESORES COMERCIALES, CRISTINA RAMIREZ ,  MIREYA LAGUADO, SANDRA ROA, CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO.', 6, 12, NULL, '2018-07-07 19:14:23', '2018-07-07 19:14:23'),
(211, 9, 2, 3, '2018-04-01', '2018-06-01', 'Abril - Junio', '99,83%', 'EN EL TERCER  TRIMESTRE DEL AÑO 2018 (ABRI-MAY-JUN)) LOS NIVELES DE SATISFACCION DEL CLIENTE ALCANZARON UN CUMPLIMIENTO DEL 99,83%  ,LA  ATENCION DE LOS CONDUCTORES ES BUENA-GRAN VARIEDAD DE PRODUCTOS    ESPERAMOS QUE ESTE 2018 SEGUIR MANTENIENDO EL NIVEL DE SATIFACION UN 100%  Y PRESTAR UN BEUN SERVICIO AL CLEINTE', 'Bucaramanga', 'Bucaramanga', 'LUIS EDUARDO, ASESORES COMERCIALES, ROBINSON RINCON, CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO.', 2, 19, NULL, '2018-07-07 20:31:22', '2018-07-07 20:31:22'),
(212, 9, 2, 3, '2018-04-01', '2018-06-01', 'Abril - Junio', '99.52', 'EN EL  SEGUNDO  TRIMESTRE DEL AÑO 2018 (ABRIL- MAYO-JUNIO ) EL  NIVEL DE SATISFACCION DEL CLIENTE ALCANZO UN CUMPLIMIENTO DEL 99,50% SOBRE UNA MUESTRA DE 238 ENCUESTAS LOGRANDO  UNA CALIFICACIÓN DEL 4,98 %  DE SATISFACCION DEL CLIENTE EN EL PROCESO DE COMERCIALIZACION. SE HA MANTENIDO GRACIAS A LA DISPONIBILIDAD DE INVENTARIO. EL ALQUILER DE UNA BODEGA ALTERNA NOS HA PERMITIDO MANTENER MAS MERCANCIA DISPONIBLE PARA LOS DESPACHOS.', 'Cucuta', 'Cúcuta', 'CRISTINA RAMIREZ, MIREYA LAGUADO, ASESORES COMERCIALES,  CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO.', 2, 12, NULL, '2018-07-07 23:22:47', '2018-07-07 23:24:04'),
(213, 20, 5, 8, '2018-04-01', '2018-06-01', 'Abril - Junio', '2.53', 'Abril - Junio: El indicador sigue mpsuestra un comportamiento satisfactorio, el personal se muestra comprometido, hay que seguir en el acompañamiento de como se ejecutan las funciones para seguir manteniendo el indicador controlado..', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección y Coordinador de Calidad.', 2, 5, NULL, '2018-07-09 18:46:15', '2018-07-09 18:46:15'),
(214, 8, 2, 3, '2018-06-01', '2018-06-01', 'Junio', '73', 'CON RESPECTO A LOS RESULTADOS EN LAS VENTAS DEL MES DE JUNIO DE 2018 SE PRESENTA UN DESCENSO EN LAS VENTAS CON RESPECTO AL MES ANTERIOR EN $ 145 MILL EQUIVALENTE A UN 17% MENOS CON RESPECTO AL MES INMEDIATAMENTE ANTERIOR DEBIDO A UNA DISMINUCION EN VENTAS EN LA LINEA DE LLANTAS PL MICHELIN, CORDIANT Y BFGOODRICH  ASI COMO TAMBIEN EN LA LINEA DE 2R MICHELIN PUES DEBIDO A LOS PRECIOS DE OTROS DISTRIBUIDORES LAS VENTAS EN ESTA LINEA DISMINUYERON, PARA EL MES DE JULIO SE ESPERA UN REPUNTE PARA RECUPERAR LAS VENTAS O LOGRAR UNOS BUENOS RESULTADOS EN TODAS LAS LINEAS CON EL EQUIPO COMERCIAL Y LA SUCURSAL TENIENDO EN CUENTA LAS NUEVAS LINEAS ASI COMO PROMOCIONES QUE NOS LLEVEN A OBTENER UNOS EXCELENTES RESULTADOS.', 'Bucaramanga', 'Bucaramanga', 'Robinson Rincon,  Clara Sanchez, Juan Carlos Chamucero y Doris Ruiz', 6, 20, NULL, '2018-07-09 20:09:02', '2018-07-09 20:09:02'),
(215, 16, 4, 7, '2018-04-01', '2018-06-01', 'Abril - Junio', '100', 'El indicador de este segundo trimestre mejoró con respecto del periodo  anterior,  debido a que hemos estado trabajando para adelantar la fecha de los despachos, gracias a la  colaboración de las agencias quienes han respondido al cambio de fecha en el envío de   las solicitudes de insumos.  Poco a poco lo hemos ido logrando.', 'Cucuta', '', 'Alva Parada - Blanca González - sucursales', 2, 15, NULL, '2018-07-10 00:42:47', '2018-07-10 00:42:47'),
(216, 14, 4, 6, '2018-04-01', '2018-06-01', 'Abril - Junio', '100', 'MUY BUEN DESEMPEÑO DE LOS PROVEEDORES QUE SE CONTRATAN  PARA PRESTARNOS EL SERVICIO, LOGRANDO LOS OBJETIVOS PROPUESTOS Y GARANTIZANDO UN MEJOR SERVICIO.', 'Cucuta', 'Cúcuta', 'JEFE DE INFRAESTRUCTURA.', 2, 14, NULL, '2018-07-10 03:40:00', '2018-07-10 03:40:00'),
(217, 25, 6, 9, '2018-05-01', '2018-05-01', 'Mayo', '0', 'En el transcurso del mes ningun empleado reporto Accidente de trabajo, observando que las condiciones y actos inseguros estan controlados, por ende no hay variación en el indicador', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 5, 16, NULL, '2018-07-10 21:36:14', '2018-07-10 21:36:14'),
(218, 25, 6, 9, '2018-06-01', '2018-06-01', 'Junio', '0.448', 'En la sede de Santa Marta el auxiliar de bodega, German Cera, presento un accidente en el mes de junio debido al riesgo biomecanico, lo que genero que de 223 empelados, el 0,45 sea el porcentaje de accidentalidad en la empresa, el indicador se mantiene dentro de lo aceptable.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 6, 16, NULL, '2018-07-10 22:03:26', '2018-07-10 22:03:26'),
(219, 27, 6, 9, '2018-05-01', '2018-05-01', 'Mayo', '0', 'En el transcurso del mes ningún empleado reporto Accidente de trabajo, por lo que se puede observar que la frecuencia y la severidad en el mes fue de 0, observando que las condiciones y actos inseguros están controlados, por ende no hay variación en el indice de lesiones incapacitantes.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 5, 16, NULL, '2018-07-11 00:08:23', '2018-07-11 00:08:23'),
(220, 27, 6, 9, '2018-06-01', '2018-06-01', 'Junio', '0.001', 'Debido al Accidente de trabajo que se presento en el transcurso del mes de junio se reporta 5 días de incapacidad con causa de contusión en el hombro y brazo, lo que genera una variación en el indicador que se mantiene dentro de lo aceptable con 0,001 de ILI.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 6, 16, NULL, '2018-07-11 00:09:42', '2018-07-11 00:09:42'),
(221, 28, 6, 9, '2018-04-01', '2018-06-01', 'Abril - Junio', '1.35', 'El indicador se mantiene en lo aceptable; prevalecen las 3 enfermedades de origen laboral determinadas en años anteriores, a la fecha se encuentra en estudio por presuntas enfermedades de origen laboral las de 3 empleados uno de la sede de Santa Marta, uno en Cúcuta y otro en Bucaramanga, por el momento no se ha determinado por concreto el origen por lo que la incidencia de EL es de 0.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Jefe de personal, SIG', 2, 16, NULL, '2018-07-11 00:47:09', '2018-07-11 00:47:09'),
(222, 31, 6, 9, '2018-04-01', '2018-06-01', 'Abril - Junio', '90.48', 'Se da cumplimiento del 90,48% de los requisitos identificados como aplicables a la empresa, dando cumplimiento a las mediciones ocupacionales de sonometria realizada el 30/05/2018 para validar si la empresa cumple con los valores limites permisible de exposición al ruido establecidos en la Resolución 1792.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Jefe de personal', 2, 16, NULL, '2018-07-11 01:25:37', '2018-07-11 01:25:37');
INSERT INTO `resultados_indicadores` (`id`, `indicadore_id`, `proceso_id`, `subproceso_id`, `fecha_inicio`, `fecha_fin`, `periocidad`, `resultado`, `analisis`, `ciudad`, `meta`, `user_report`, `periocidad_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(223, 26, 6, 9, '2018-05-01', '2018-05-01', 'Mayo', '57.9', 'Según lo observado, el ausentismo este mes disminuyo en un 14,9% a diferencia del mes anterior y a pesar de que en el mes anterior se presentaron menos casos (26 casos) que en el actual (33 casos), los casos en el mes de mayo presentaron menos dias de incapacidad, las causas derivadas de enfermedad general son por infecciones respiratorias, intestinales y afecciones a nivel de espalda.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 5, 16, NULL, '2018-07-11 02:10:04', '2018-07-11 02:10:04'),
(224, 26, 6, 9, '2018-06-01', '2018-06-01', 'Junio', '43.4', 'Según los resultados arrojados, podemos observar que se disminuyo el numero de ausentismo a diferencia del mes de mayo, ya que disminuyeron los casos de enfermedad común como resfriados. En el mes se presentaron 3 casos de maternidad con 70 días de incapacidad, los casos por  enfermedad general fueron 7 con 18 días perdidos, siendo la causa principal diarrea y gastroenteritis de presunto origen infeccioso,  y 1 evento por accidente de trabajo con 5 días de incapacidad.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 6, 16, NULL, '2018-07-11 02:11:10', '2018-07-11 02:11:10'),
(225, 18, 5, 8, '2018-04-01', '2018-06-01', 'Abril - Junio', '85.48', 'Abril - Junio: En este trimestre del año el nivel de asistencia a las capacitaciones y formaciones  el indicador bajo debido a la inasistencia de algunas personas cuya razón principal fue que se encontraban de correría y no alcanzaban a llegar a la capacitación.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, SIG.', 2, 5, NULL, '2018-07-11 02:11:48', '2018-07-11 02:11:48'),
(226, 30, 6, 9, '2018-05-01', '2018-05-01', 'Mayo', '2.31', 'Se observa que el ausentismo disminuyó debido a que a diferencia del mes pasado este mes no se presento incapacidad por fractura de hueso, ley maria y hernias, en el mes de Mayo se presento 29 casos de enfermedad general con 62 días de incapacidad, y 4 casos de maternidad con 63 días de ausencia.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 5, 16, NULL, '2018-07-11 02:12:04', '2018-07-11 02:12:04'),
(227, 30, 6, 9, '2018-06-01', '2018-06-01', 'Junio', '1.74', 'El ausentismo se mantiene en el rango establecido, en el transcurso del mes se presentaron 6 casos por enfermedad general con 13 días de ausencia,  1 evento por accidente de trabajo con 5 días perdidos, y 3 casos de maternidad con 70 días de incapacidad.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 6, 16, NULL, '2018-07-11 02:14:38', '2018-07-11 02:14:38'),
(228, 19, 5, 8, '2018-04-01', '2018-06-01', 'Abril - Junio', '4.37', 'Abril - Junio:  El nivel de aprendizaje de las capacitaciones ha sido satisfactorio, demuestran mucho interés en cada una de las capacitaciones.', 'Cucuta', '', 'GERENTE ADMINISTRATIVA, REVISION POR LA DIRECCION, SIG.', 2, 5, NULL, '2018-07-11 02:42:26', '2018-07-11 02:42:26'),
(229, 12, 3, 5, '2018-04-01', '2018-06-01', 'Abril - Junio', '4.1', 'Se logra cumplir la meta en un 94,2% obteniendo un muy buen comportamiento con todos los proveedores logrando mas estabilidad en los inventarios.', 'Cucuta', '', 'GERENTE EJECUTIVO - JEFE DE COMPRAS', 2, 13, NULL, '2018-07-11 21:31:11', '2018-07-11 21:31:11'),
(230, 35, 3, 5, '2018-04-01', '2018-06-01', 'Abril - Junio', '120', 'Se cumple con la meta, quedando con 120 días la cual es alta, debido a las nuevas negociaciones con nuevos proveedores de productos importados, lo cual hace que se haga una apuesta en nuevos portafolio, lo que hace que el inventario en llantas crezca esperando desarrollar nuevas ventas.', 'Cucuta', '-', 'GERENTE GENERAL', 2, 13, NULL, '2018-07-11 21:33:43', '2018-07-11 21:33:43'),
(231, 36, 3, 5, '2018-04-01', '2018-06-01', 'Abril - Junio', '73', 'Se cumple con el indicador quedando en 73 días, lo cual mejora con el periodo anterior logrando un mejor equilibrio, esto también se genera por un mejor control de traslados de filtros entre las agencias.', 'Cucuta', '-', 'GERENTE EJECUTIVO', 2, 13, NULL, '2018-07-11 21:34:21', '2018-07-11 21:34:21'),
(232, 11, 3, 5, '2018-04-01', '2018-06-01', 'Abril - Junio', '1', 'ESTE INDICADOR YA NO EXISTE EN COMPRAS', 'Cucuta', '', 'NINGUNO', 2, 13, NULL, '2018-07-11 21:35:19', '2018-07-11 21:35:19'),
(233, 37, 3, 5, '2018-04-01', '2018-06-01', 'Abril - Junio', '106', 'Se cumple con el indicador obteniendo 106 días, aunque se aleja mucho del objetivo básicamente porque las ventas han bajado.', 'Cucuta', '-', 'GERENTE EJECUTIVO', 2, 13, NULL, '2018-07-11 21:36:24', '2018-07-11 21:36:24'),
(234, 10, 3, 5, '2018-04-01', '2018-06-01', 'Abril - Junio', '94.2', 'Se logra cumplir la meta en un 94,2% obteniendo un muy buen comportamiento con todos los proveedores logrando mas estabilidad en los inventarios.', 'Cucuta', '', 'Jefe de Compras, Gerencia administrativa, y SIG.', 2, 13, NULL, '2018-07-11 21:37:54', '2018-07-11 21:37:54'),
(235, 29, 6, 9, '2018-04-01', '2018-06-01', 'Abril - Junio', '97.3', 'De las 75 diversas inspecciones programadas en las 9 sucursales de la empresa, se ejecutaron 73, obteniendo un porcentaje de 97,3%, el cual cumple con la meta establecida,  las sedes que ha la fecha de publicación del indicador no hicieron llegar evidencia de realización de la inspección fueron Bucaramanga y Valledupar.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Admistradores', 2, 16, NULL, '2018-07-12 17:51:06', '2018-07-12 17:51:06'),
(236, 24, 6, 9, '2018-04-01', '2018-06-01', 'Abril - Junio', '90', 'El indicador tiene un comportamiento aceptable, el nivel de cumplimiento del cronograma es de un 90% ejecutando actividades tendientes a cumplir con el Sistema de Gestión de Seguridad y Salud en el Trabajo y con cada uno de los objetivos planteados, con actividades como divulgación de política de prevención del uso y consumo de sustancias psicoactivas, socializacion de protocolos de atención a victimas viales, mediciones ambientales, re-inducción personal de Cúcuta, seguimiento al pago de la seguridad social, entre otros.', 'Cucuta', 'Cúcuta', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 2, 16, NULL, '2018-07-12 19:58:36', '2018-07-12 19:58:36'),
(237, 32, 4, 6, '2018-04-01', '2018-06-01', 'Abril - Junio', '5.56', '2 TRIMESTRE: En el segundo trimestre se presentaron 4 vehiculos varados en la ruta de entrega de mercancías, de los cuales en dos ocasiones se presento con el vehiculo BDV 096 de Cartagena, en abril el arreglo derivado fue de cambio de bomba de gasolina, y en junio cambio de bomba de clouths. En Bucaramanga con el vehiculo XVZ 179 en junio fue debido a recalentamiento por fuga en el radiador y en Cúcuta en el mes de junio con el vehiculo XVY 256 se varo debido a recalentamiento se le realizo cambio de empaque de culata y revisión de radiador. Por el total de vehiculos despachados en el trimestre (72) el indicador no altera la meta.', 'Cucuta', '', 'Sistema Integrado de gestión', 2, 14, NULL, '2018-07-23 19:52:16', '2018-07-23 19:52:56'),
(238, 33, 4, 6, '2018-04-01', '2018-06-01', 'Abril - Junio', '0', 'EL PROCESO SE HA DESEMPEÑADO BIEN, EN LO QUE VA DEL AÑO NO SE HAN PRESENTADO ACCIDENTES POR LOS CUALES SE DEBERÍA AFECTAR LA POLIZA', 'Cucuta', '', 'AUXILIAR DE INFRAESRUCTURA', 2, 14, NULL, '2018-07-24 00:11:48', '2018-07-24 00:11:48'),
(239, 8, 2, 3, '2018-07-01', '2018-07-01', 'Julio', '162.8', 'EN  EL  MES DE  JULIO  /18    ALCANZAMOS UN CUMPLIMIENTO DEL PRESUPUESTO AL 162,8%  .  NUESTRA MARCA PROPIA STAR OIL CON SU EXCELENTE CALIDAD SE CONSOLIDA EN EL MERCADO CUCUTEÑO, LOGRANDO POSICIONARSE MES A MES. LA BUENA DISPONIBILIDAD  DE PRODUCTOS GRACIAS AL ARRENDAMIENTO DE UNA BODEGA ALTERNA NOS HA PERMITIDO CONTAR CON MAYORES INVENTARIOS. SE HAN INCREMENTADO LAS VENTAS EN LA LINEA DE LLANTAS.   EL DPTO COMERCIAL DE CUCUTA CONCENTRA SUS ESFUERZOS EN  IMPULSAR LOS APOYOS PROMOCIONALES  VIGENTES EN NUESTRO PORTAFOLIO  CON EL COMPROMISO  DE TODOS LOS QUE  LO INTEGRAMOS EL EQUIPO COMERCIAL Y ASI  CONSOLIDAR EL CUMPLIMIENTO DE LOS OBJETIVOS PROPUESTOS PARA ESTE MES DE JULIO   /18', 'Cucuta', 'Cúcuta', 'ASESORES COMERCIALES, CRISTINA RAMIREZ ,  MIREYA LAGUADO, SANDRA ROA, CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO.', 7, 12, NULL, '2018-08-03 00:38:44', '2018-08-03 00:38:44'),
(240, 8, 2, 3, '2018-07-01', '2018-07-01', 'Julio', '85', 'CON RESPECTO A LOS RESULTADOS DEL MES DE JULIO DE 2018 PRESENTAMOS UN INCREMENTO EN LAS VENTAS CON RESPECTO AL MES ANTERIOR EN 101 MILL QUE EN PORCENTAJE SIGNIFICA UN 12%, ESTO SE DEBE AL TRABAJO REALIZADO CON TODO EL EQUIPO COMERCIAL OFRECIENDO TODAS LAS LINEAS DE PRODUCTOS ESPECIALEMENTE MARCA PROPIA, REALIZACION DE EVENTOS A NUESTROS CLIENTES FIDELIZANDOLOS Y POSICIONANDO A PROCAR INVERSIONES COMO UN DISTRIBUIDOR FUERTE EN LA REGION CON MARCAS PREMIUM Y MARCAS PROPIAS DE MUY ALTA CALIDAD QUE ESTAN APALANCANDO MAS VENTAS Y NUEVOS CLIENTES QUE FORTALECEN LA LABOR COMERCIAL', 'Bucaramanga', 'Bucaramanga', 'CLARA SANCHEZ, ROBINSON RINCON, JUAN CARLOS CHAMUCERO Y DORIS RUIZ', 7, 20, NULL, '2018-08-10 15:56:58', '2018-08-10 15:56:58'),
(241, 22, 6, 10, '2018-01-01', '2018-03-01', 'Enero - Marzo', '80', 'Se logro cumplir un 80%, se evidencia que a las acciones enviadas  están cumpliendo con sus actividades en el tiempo estimado, logrando eficacia en las acciones propuestas.', 'Cucuta', '', 'GERENTE ADMINISTRATIVO Y JEFE DE CALIDAD', 1, 23, NULL, '2018-08-16 21:00:31', '2018-08-16 21:00:31'),
(242, 6, 2, 4, '2018-07-01', '2018-07-01', 'Julio', '47.60', 'EL INDICADOR NOS MUESTRA UN MEJORAMIENTO EN LOS DÍAS DE ROTACIÓN DE LA CARTERA EN COMPARACIÓN CON EL MES DE JUNIO, ES DE RESALTAR QUE EL MES DE JUNIO ESTUVO MUY LENTO EL PROCESO DE RECAUDO LO QUE DEMUESTRA ESTE INDICADOR YA QUE  REFLEJA UN MEJOR PROCESO DENTRO DEL MES DE JUNIO, SIENDO LOS INDICADORES A LA FECHA  SATISFACTORIOS A LA META ESTIPULADA COMO BASE DE MEDICION', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTIÓN, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 7, 4, NULL, '2018-08-21 19:39:06', '2018-08-21 19:39:06'),
(243, 7, 2, 4, '2018-07-01', '2018-07-01', 'Julio', '90', 'el resultado del indicador nos muestra mejoramiento en la gestión  en comparación al mes anterior ,se mantiene el proceso  de  actualización y mejoramientos de cupos de crédito para clientes tradicionales que se fortaleció a partir del mes de abril ,', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTIÓN, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 7, 4, NULL, '2018-08-21 19:45:52', '2018-08-21 19:45:52'),
(244, 34, 1, 1, '2018-07-01', '2018-07-01', 'Julio', '4204238689', 'Las ventas repecto al Vr. Minimo establecido estuvieron por ENCIMA en un  16,78%, gracias al incremento en las ventas de la linea de lubricantes Star Oil, el aumento en referencias del portafolio de Filtros Partmo, la comercialización de la Nueva linea de Filtros ELEMFIL', 'Cucuta', '', 'GERENCIA GENERAL y GERENCIA EJECUTIVA', 7, 21, NULL, '2018-08-23 22:42:01', '2018-08-23 22:42:01'),
(245, 25, 6, 9, '2018-07-01', '2018-07-01', 'Julio', '0.450', 'En la sede de Barranquilla el auxiliar de auditoria Joymar Coll, debido a orden del administrador Gonzalo Patiño, se dispuso a realizar labores de mensajería y de regreso a las instalaciones de la empresa debido a un liquido en la carretera, le provoca una caída de la moto generándole quemadura en mano izquierda y rodilla derecha e izquierda. Por ende el indicador tiene una variación, arrojando el resultado de 0,45 de accidentalidad, es decir, 1 accidente por 222 empleados.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 7, 16, NULL, '2018-08-25 18:03:08', '2018-08-25 18:03:08'),
(246, 27, 6, 9, '2018-07-01', '2018-07-01', 'Julio', '0.002', 'En el transcurso del mes debido al accidente en la sede de Barranquilla con el empleado Joymar Coll presento una incapacidad de 7 días por motivo de Quemadura por fricción de aproximadamente 3% en superficie mano izquierda y rodilla derecha e izquierda, generando que el indice de lesiones incapacitantes en el mes diera un resultado de 0,002.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 7, 16, NULL, '2018-08-25 18:12:02', '2018-08-25 18:12:02'),
(247, 7, 2, 4, '2018-08-01', '2018-08-01', 'Agosto', '92', 'el resultado del indicador nos muestra mejoramiento en la gestion  en comparacion al mes anterior . Se fortalece el proceso de mejoramiento de cupos a clientes antiguos adecuandolos a la necesidad del mercado que actualmente manejan y se aprovecha este proceso para revisar la documentacion y actualizarla en conformidad a los requisitos minimos de credito y cartera y respetando la politica de tratamiento de datos', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTION, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 8, 4, NULL, '2018-09-01 02:13:38', '2018-09-01 02:13:38'),
(248, 26, 6, 9, '2018-07-01', '2018-07-01', 'Julio', '61.5', 'Se evidencia que el porcentaje de ausentismo creció  este mes a diferencia del mes pasado, se presento un caso de enfermedad laboral con 10 días de incapacidad por dolencia a nivel lumbar, por enfermedad general  la causa principal fue migraña, lumbago, cervicalgia con 9 días de ausencia, un accidente de trabajo con 7 días de ausencia y dos casos de maternidad con 60 días de incapacidad.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 7, 16, NULL, '2018-09-03 20:27:06', '2018-09-03 20:27:06'),
(249, 30, 6, 9, '2018-07-01', '2018-07-01', 'Julio', '2.46', 'Los resultados cambiaron considerablemente; se encuentran en un rango mas alto se  duplicaron los eventos y los días de incapacidad mas que el mes de junio, una de las causas mayores de ausencia fue gastroententiritis abdominal con 12 días de ausencia, 1 enfermedad laboral con 10 días, este mes hubo un caso de  accidente de trabajo con 7 días de ausencia y 2 casos de licencia de maternidad con 60 días de incapacidad al igual se presento un trastorno intervertebral con 10 días de incapacidad, 1 evento por epicondilitis lateral con 5 días de ausencia.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 7, 16, NULL, '2018-09-03 20:30:19', '2018-09-03 20:30:19'),
(250, 22, 6, 10, '2018-04-01', '2018-06-01', 'Abril - Junio', '85.71', 'Incremento de acciones por motivo de la auditoria interna', 'Cucuta', '', 'alta gerencia', 2, 17, NULL, '2018-09-04 19:16:50', '2018-09-04 19:16:50'),
(251, 8, 2, 3, '2018-08-01', '2018-08-01', 'Agosto', '110.9', 'EN  EL  MES DE  AGOSTO   /18    ALCANZAMOS UN CUMPLIMIENTO DEL PRESUPUESTO AL 110,9%  . STAR OIL CONTIINUA CONSOLIDANDOSE EN EL MERCADO, LOS APOYOS PROMOCIONALES CON LOS FILTROOS PARTMO APALANCAN NUESTRAS VENTAS. LA LINEA DE LLANTAS HA TENIDO IMPORTANTES INCREMENTOS EN ESTE MES ..   EL DPTO COMERCIAL DE CUCUTA CONCENTRA SUS ESFUERZOS EN  IMPULSAR LOS APOYOS PROMOCIONALES  VIGENTES EN NUESTRO PORTAFOLIO  CON EL COMPROMISO  DE TODOS LOS QUE  LO INTEGRAMOS EL EQUIPO COMERCIAL Y ASI  CONSOLIDAR EL CUMPLIMIENTO DE LOS OBJETIVOS PROPUESTOS PARA ESTE MES DE AGOSTO    /18', 'Cucuta', 'Cúcuta', 'ASESORES COMERCIALES, CRISTINA RAMIREZ ,  MIREYA LAGUADO, SANDRA ROA, CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO.', 8, 12, NULL, '2018-09-07 02:08:14', '2018-09-07 02:08:14'),
(252, 30, 6, 9, '2018-08-01', '2018-08-01', 'Agosto', '2.61', 'con los resultados arrojados  en el ausentismo demuestra aumento en números de días y eventos en enfermedad general con una apendicitis de 28 días de ausencia, cirugía de pterigio nasal con 10 días de incapacidad, hubo un caso por neumonia con 7 días, los rangos de accidentes fueron 3 eventos con 3 días de ausencia, 2 licencia de maternidad con 62 días.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 8, 16, NULL, '2018-09-07 17:42:23', '2018-09-07 17:42:23'),
(253, 26, 6, 9, '2018-08-01', '2018-08-01', 'Agosto', '65.3', 'observando las evidencias del ausentismo de este mes se incrementaron los casos  por enfermedad general,  20 eventos con  incapacidad de  80 días, una de ellas con la causa principal de cirugía de apendicitis con 28 días de ausencia, 1 por pterigio nasal con 10 días, y  una neumonia de 7 días de ausencia; se presentaron tres accidentes de trabajo con 3 días que involucran el mes, se presentaron dos licencias de maternidad de 62 días.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, SIG, recursos humanos', 8, 16, NULL, '2018-09-07 17:43:28', '2018-09-07 17:43:28'),
(254, 25, 6, 9, '2018-08-01', '2018-08-01', 'Agosto', '1.351', 'En el transcurso del mes de Agosto reportaron los empleados 3 accidentes de trabajo, dos de ellos sucedieron en Cartagena con dos operarios de patio que se encontraban realizando labores en Sociedad portuaria, uno que por la manipulación de llantas presento un fuerte dolor de espalda y el otro realizando labor de montaje se golpeo la mano, respecto al otro accidente fue de transito con una asesora de Santa Marta, quien se cayó de la moto al realizar un cruce.', 'Cucuta', '', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 8, 16, NULL, '2018-09-07 18:16:22', '2018-09-07 18:16:22'),
(255, 27, 6, 9, '2018-08-01', '2018-08-01', 'Agosto', '0.005', 'Debido a los 3 accidentes de trabajo que se presentaron en el mes, el indicador de lesiones incapacitantes arrojo 0,005 debido a que se presentaron 8 días de incapacidad en total, con diagnósticos como traumatismo en muñeca, mano y pierna, lumbago y contusión de la muñeca y mano.', 'Cucuta', '-', 'Gerente Administrativa, Revisión por la Dirección, Administradores', 8, 16, NULL, '2018-09-07 18:17:15', '2018-09-07 18:17:15'),
(256, 6, 2, 4, '2018-08-01', '2018-08-01', 'Agosto', '43.34', 'INDICADOR DE MES DE AGOSTO MUESTRA MEJORAMIENTO EN EL RETORNO DE LA CARTERA SIENDO UN RESULTADO SATISFACTORIO EN RELACION A LA META MINIMA ESTABLECIDA', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTION, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 8, 4, NULL, '2018-09-10 20:16:05', '2018-09-10 20:16:05'),
(257, 34, 1, 1, '2018-08-01', '2018-08-01', 'Agosto', '4253089851', 'Las ventas repecto al Vr. Minimo establecido estuvieron por ENCIMA en un  18,14%, gracias al incremento la linea de llantas recuperando participación en el segmento de llantas 2 ruedas y camión , adicionalemnte se puede confirmar la motivación de los asesores  en los pagos de los incentivos lo que ha llevado al cumplimiento de las metas de cada sucursal en las diferentes lineas de producto', 'Cucuta', '', 'Gerencia General Gerencia Ejecutiva', 8, 21, NULL, '2018-09-26 03:07:01', '2018-09-26 03:07:01'),
(258, 34, 1, 1, '2018-08-01', '2018-08-01', 'Agosto', '4253089851', 'Las ventas repecto al Vr. Minimo establecido estuvieron por ENCIMA en un  18,14%, gracias al incremento la linea de llantas recuperando participación en el segmento de llantas 2 ruedas y camión , adicionalemnte se puede confirmar la motivación de los asesores  en los pagos de los incentivos lo que ha llevado al cumplimiento de las metas de cada sucursal en las diferentes lineas de producto', 'Cucuta', '', 'Gerencia General Gerencia Ejecutiva', 8, 21, NULL, '2018-09-26 03:07:01', '2018-09-26 03:07:01'),
(259, 8, 2, 3, '2018-09-01', '2018-09-01', 'Septiembre', '135.9', 'EN  EL  MES DE  SEPIEMBRE /18    ALCANZAMOS UN CUMPLIMIENTO DEL PRESUPUESTO AL 135,9%  .  CONTINUAMOS CON EL POSICIONAMIENTO DE NUESTRA MARCA PROPIA STAR OIL, QUE CON SU EXECLENTE CALIDAD RESPALDA NUESTRA GESTION COMERCIAL. PROMOCIONES EN LA LINEAS DE FILTROS PARTMO, LIQUIDO WAGNER , SILICONAS LOCTITE ENTRE OTROS CONSOLIDA LAS VENTAS EN ESTAS LINEAS.    EL DPTO COMERCIAL DE CUCUTA CONCENTRA SUS ESFUERZOS EN  IMPULSAR LOS APOYOS PROMOCIONALES  VIGENTES EN NUESTRO PORTAFOLIO  CON EL COMPROMISO  DE TODOS LOS QUE  LO INTEGRAMOS EL EQUIPO COMERCIAL Y ASI  CONSOLIDAR EL CUMPLIMIENTO DE LOS OBJETIVOS PROPUESTOS PARA ESTE MES DE SEPTIEMBRE   /18', 'Cucuta', 'Cúcuta', 'ASESORES COMERCIALES, CRISTINA RAMIREZ ,  MIREYA LAGUADO, SANDRA ROA, CLARA SANCHEZ, DORIS RUIZ, LAURA PULIDO.', 9, 12, NULL, '2018-10-04 20:13:20', '2018-10-04 20:13:20'),
(260, 15, 4, 6, '2018-07-01', '2018-09-01', 'Julio - Septiembre', '100', '1', 'Cucuta', 'Cúcuta', 'FELIPE CASTILLA, MANUELA NOVOA , LUIS EDUARDO VELASQUEZ', 3, 14, NULL, '2018-10-09 20:25:50', '2018-10-09 20:25:50'),
(261, 15, 4, 6, '2018-07-01', '2018-09-01', 'Julio - Septiembre', '100', 'De acuerdo a la evaluación se mantuvo el 100% por el buen trabajo en calidad y precio del proveedores.', 'Bucaramanga', 'Bucaramanga', 'LUIS EDUARDO VELASQUEZ', 3, 22, NULL, '2018-10-10 19:11:37', '2018-10-10 19:11:37'),
(262, 17, 4, 7, '2018-07-01', '2018-09-01', 'Julio - Septiembre', '96', 'Se realizo la evaluación a 2 proveedores que venimos trabajando con un porcentaje del 96% la cual se han mantenido la calidad y los buenos precios del servicio.', 'Bucaramanga', 'Bucaramanga', 'LUIS EDUARDO VELASQUEZ', 3, 22, NULL, '2018-10-10 19:12:39', '2018-10-10 19:12:39'),
(263, 14, 4, 6, '2018-07-01', '2018-09-01', 'Julio - Septiembre', '89.99', 'MUY BUEN DESEMPEÑO DE LOS PROVEEDORES QUE NOS PRESTAN EL SERVICIO , LOGRANDO LOS OBJETIVOS PROPUESTOS Y CUMPLIENDO CON EL  INDICADOR , ESTO SE DEBE A LA EXPERIENCIA  DE LAS PERSONAS CONTRATADAS.', 'Cucuta', 'Cúcuta', 'FELIPE CASTILLA ,CLARA SANCHEZ,MANUELA NOVOA', 3, 14, NULL, '2018-10-12 03:31:08', '2018-10-12 03:31:08'),
(264, 3, 1, 1, '2018-07-01', '2018-09-01', 'Julio - Septiembre', '6.16', 'Las ventas respecto al presupuesto establecido estuvieron  por ENCIMA de lo establecido en un 6,16%, pues en el  último trimestre ingreso al portafolio de productos la nueva marca ELEMFIL para contra restar la oferta en el mercado de Filtros Importados y adicionalmente se mantuvieron las promociones en varias referencias de alta rotación', 'Cucuta', '', 'GERENCIA GENERAL - GERENCIA EJECUTIVA', 3, 21, NULL, '2018-10-17 02:39:43', '2018-10-17 02:39:43'),
(265, 4, 1, 1, '2018-07-01', '2018-09-01', 'Julio - Septiembre', '84.57', 'Las ventas respecto al presupuesto establecido estuvieron por ENCIMA en un 84,57%, resultado de las ventas en las sucursales de Cucuta, Saravena, Valledupar y Santa Marta por desabastecimiento de lubricantes en venezuela, y adicionalmente por las acciones comerciales respecto al posicionamiento de la marca propia Star Oil', 'Cucuta', '', 'GERENTE GENERAL - GERENTE EJECUTIVO', 3, 21, NULL, '2018-10-17 02:44:25', '2018-10-17 02:44:25'),
(266, 34, 1, 1, '2018-09-01', '2018-09-01', 'Septiembre', '3861131210', 'Las ventas repecto al Vr. Minimo establecido estuvieron por ENCIMA en un  7,25%,  aunque disminuyeron en comparación al mes anterior  se  pudo confirmar el incremento en las ventas en la línea de llantas importadas \n y el seguir otorgando los incentivos en efectivo, como también la facturación en la línea de Lubricantes por Norte de Santander', 'Cucuta', '', 'GERENCIA GENERAL - GERENCIA EJECUTIVA', 9, 21, NULL, '2018-10-17 02:51:45', '2018-10-17 02:51:45'),
(267, 23, 6, 10, '2018-01-01', '2018-03-01', 'Enero - Marzo', '100', 'se programó y ejecutó la auditoria satisfactoriamente en los tiempos previstos', 'Cucuta', '', 'Jefes de procesos, auditores internos', 1, 17, NULL, '2018-10-17 19:10:13', '2018-10-17 19:10:13'),
(268, 23, 6, 10, '2018-04-01', '2018-06-01', 'Abril - Junio', '100', 'Igual al resultado anterior, solo se programa 1 auditoria interna por semestre', 'Cucuta', '', 'Jefes de proceso, auditores internos', 2, 17, NULL, '2018-10-17 19:11:31', '2018-10-17 19:11:31'),
(269, 23, 6, 10, '2018-07-01', '2018-09-01', 'Julio - Septiembre', '100', 'Se llevo a cabo la auditoria interna programada para el 2do semestre satisfactoriamente.', 'Cucuta', '', 'jefes de proceso, auditores internas', 3, 17, NULL, '2018-10-17 19:12:31', '2018-10-17 19:12:31'),
(270, 23, 6, 10, '2018-10-01', '2018-12-01', 'Octubre - Diciembre', '100', 'se mantiene el mismo indicador del trimestre anterior, porque solo se programa 1 auditoria por semestre.', 'Cucuta', '', 'jefes de proceso, audiores internos.', 4, 17, NULL, '2018-10-17 19:13:27', '2018-10-17 19:13:27'),
(275, 6, 2, 4, '2018-09-01', '2018-09-01', 'Septiembre', '52.12', 'EL INDICADO NOS MUESTRA COMO SE HA LOGRADO MANTENER UN BUEN PROMEDIO DE TIEMPO DE RECAUDO EN RELACIÓN A LA META, DEMOSTRANDO UN BUEN TRABAJO EN EQUIPO DE LA PARTE COMERCIAL Y EL AREA DE CARTERA', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTION, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 9, 4, NULL, '2018-10-18 01:14:16', '2018-10-18 01:14:16'),
(276, 7, 2, 4, '2018-09-01', '2018-09-01', 'Septiembre', '81', 'el resultado del indicador nos muestra que se mantiene el fortalecimiento proceso de mejoramiento de cupos a clientes antiguos adecuándolos a la necesidad del mercado que actualmente manejan y se aprovecha este proceso para revisar la documentación y actualizarla en conformidad a los requisitos mínimos de crédito y cartera y respetando la política de tratamiento de datos', 'Cucuta', '', 'ASISTENTE SISTEMA INTEGRADO DE GESTIÓN, GERENTE ADMINISTRATIVO Y JEFES DE CARTERA', 9, 4, NULL, '2018-10-18 01:18:35', '2018-10-18 01:18:35'),
(277, 1, 1, 1, '2018-07-01', '2018-09-01', 'Julio - Septiembre', '17.27', 'Las ventas en la línea de llantas correspondientes al grupo de importadas tuvieron un incremento del 17,27 respecto al presupuesto establecido en el mes de Julio de 2018, lo que nos permite confirmar que las promociones, los incentivos y las estrategias comerciales establecidas para estas marcas están cumpliendo con los objetivos trazados por la Gerencia General.', 'Cucuta', '-', 'GERENTE GENERAL - GERENTE EJECUTIVO', 3, 21, NULL, '2018-10-18 03:09:17', '2018-10-18 03:09:17'),
(278, 0, 1, 1, '2018-07-01', '2018-09-01', 'Julio - Septiembre', '-0.73', 'Las ventas de llantas correspondientes al Grupo Michelin, BFG disminuyeron en un 0,73% respecto al presupuesto establecido en el mes de Julio de 2018, lo que corresponde al aumento de marcas asiáticas al mercado con bajos precios en los clientes sub distribuidores y la disminución de referencias de las Gamma en la marca Tigar del portafolio de productos disponibles', 'Cucuta', '-', 'GERENCIA GENERAL- GERENCIA EJECUTIVA', 3, 21, NULL, '2018-10-18 03:18:30', '2018-10-18 03:18:30'),
(279, 15, 4, 6, '2018-10-01', '2018-12-01', 'Octubre - Diciembre', '50', 'demo', 'Cucuta', 'Cúcuta', 'demo', 4, 14, NULL, '2018-10-18 03:22:33', '2018-10-18 03:22:33'),
(280, 15, 4, 6, '2018-01-01', '2018-03-01', 'Enero - Marzo', '50', 'demo', 'Cucuta', 'Cúcuta', 'demo', 1, 14, NULL, '2018-10-18 03:23:42', '2018-10-18 03:23:42'),
(281, 15, 4, 6, '2018-04-01', '2018-06-01', 'Abril - Junio', '50', 'demo', 'Cucuta', 'Cúcuta', 'demo', 2, 14, NULL, '2018-10-18 03:23:59', '2018-10-18 03:23:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subprocesos`
--

CREATE TABLE `subprocesos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proceso_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `unir` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subprocesos`
--

INSERT INTO `subprocesos` (`id`, `nombre`, `descripcion`, `proceso_id`, `created_at`, `updated_at`, `deleted_at`, `unir`) VALUES
(1, 'Gerencia ejecutiva', 'Gerencia ejecutiva', 1, '2018-04-11 17:50:02', '2018-04-11 17:50:02', NULL, 7),
(2, 'Gerencia administrativa', 'Gerencia administrativa', 1, '2018-04-11 17:50:02', '2018-04-11 17:50:02', NULL, 1),
(3, 'Gestión comercial y distribución', 'Gestión comercial y distribución', 2, '2018-04-11 17:50:02', '2018-04-11 17:50:02', NULL, 2),
(4, 'Crédito y Cartera', 'Crédito y Cartera', 2, '2018-04-11 17:50:02', '2018-04-11 17:50:02', NULL, 2),
(5, 'Compras y traslado de mercancías', 'Compras y traslado de mercancías', 3, '2018-04-11 17:50:02', '2018-04-11 17:50:02', NULL, 7),
(6, 'Infraestructura', 'Infraestructura', 4, '2018-04-11 17:50:03', '2018-04-11 17:50:03', NULL, 4),
(7, 'Suministros', 'Suministros', 4, '2018-04-11 17:50:03', '2018-04-11 17:50:03', NULL, 2),
(8, 'Gestión de personal', 'Gestión de personal', 5, '2018-04-11 17:50:03', '2018-04-11 17:50:03', NULL, 3),
(9, 'Seguridad y salud en el trabajo', 'Seguridad y salud en el trabajo', 6, '2018-04-11 17:50:03', '2018-04-11 17:50:03', NULL, 8),
(10, 'Calidad', 'Calidad', 6, '2018-04-11 17:50:03', '2018-04-11 17:50:03', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proceso_id` int(10) UNSIGNED NOT NULL,
  `subproceso_id` int(10) UNSIGNED NOT NULL,
  `privilegios` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `proceso_id`, `subproceso_id`, `privilegios`, `created_at`, `updated_at`, `remember_token`, `deleted_at`) VALUES
(2, 'Gerente Administrativa', 'gerente.admin@procar.com.co', '$2a$07$qiSmVhP3PxtQJXPN9EWRDOEeMpqxQk6aEk8nPxULr1BH7rGaUsb0e', 1, 2, 2, '2018-04-11 17:50:03', '2018-04-11 17:50:03', 'IxlzC4Mc7DgMeDPsmwqpDt6GhDm5TtQLLAGNIbq1kQzG9qAYpZ6j3fw1v4GC', NULL),
(3, 'Gerencia ejecutiva', 'carlos.felipe@procar.com.co', '$2a$07 $ Ee49DnyKEbI1FudCuhLphODmMIqBTDFNAyjzBQuOR2mXd9j.o3OyO', 1, 1, 2, '2018-04-11 17:50:03', '2018-04-11 17:50:03', 'VUHpCnELrKkNziLkiq0GSaP6OjGRxdPk97sauneDA11eme5cmNKRAiXcM5Sb', NULL),
(4, 'Crédito y Cartera', 'auditor.cartera@procar.com.co', '$2a$07$354wZmDEX906HapC1xCDMutnbwCi4rzoEHfIL6zPxZ9bqTS9OOwD6', 2, 4, 2, '2018-04-11 17:50:04', '2018-04-11 17:50:04', 'GHCw3UN2aStN18VkxuncEdZdWEEGmhivNhcJuqOkoj6QvIedq3CoOxu9FUow', NULL),
(5, 'Gestión de personal', 'personal@procar.com.co', '$2a$07$1hHfQmcmELybjZK3rg1qReCF0lFw8zGfv5ys.6TWUMAorP3N0/i2W', 5, 8, 2, '2018-04-11 17:50:04', '2018-04-11 17:50:04', 'HT7SoMTPtcmuGkMkezkjwhiEqmNDwGJBkyfQJnPB3oNfHFrKQnPgJmoM2FAE', NULL),
(12, 'Gestión comercial y distribución', 'lubricar.cucuta@procar.com.co', '$2a$07$3nDnRtdswyAbKdijLDoiPORA4i9kBJ0a.sc72DcqkpSakREgxEl/C', 2, 3, 2, '2018-04-11 18:09:37', '2018-04-11 18:09:37', 'gwSMviJr4vdOl49DQBFt7r2yQvquqek94vHr8R4ViYgEngeGua6MKCdYX6EH', NULL),
(13, 'Compras y Traslados de Mercancía', 'compras@procar.com.co', '$2y$10$e4AikRm9KSQjX43hwxVrMepi6yEQfzB6fBZ9T3BKpQwBaO.K7vbJW', 3, 5, 2, '2018-04-11 18:13:08', '2018-04-11 18:13:08', 'CTJCjMMTsXMfCSiqzj1mNJR7PRs55ayjm1z8RvgLhzW2ltD8zaV8HgaodHNi', NULL),
(14, 'Infraestructura', 'tecnillantas.cucuta@procar.com.co', '$2a$07$CtlaNK4B3w3wOGz7wdJbCep5EYsikML6PTkL7d93kaoQY22zOreYO', 4, 6, 2, '2018-04-11 18:15:23', '2018-04-11 18:15:23', '8RiuqfbQOUrp2D3ttsFbxxpC4HRCFlnZNNUcKHIdlOzpNjaswlu6yLehoW1d', NULL),
(15, 'Suministros', 'archivo@procar.com.co', '$2a$07$RkJUeXk29m08vlG44jsabOaXssCdOHSZiBz2CfXzAp0fUUcVtuzYK', 4, 7, 2, '2018-04-11 18:15:49', '2018-04-11 18:15:49', 'k9s8F3Cvf5IlCqQ6O6ETEP0fubz17OG0LPak5PQxhghUPfMMdcDAzjW6nyrj', NULL),
(16, 'Seguridad y Salud en el Trabajo', 'recursosh@procar.com.co', '$2a$07$zb0GcvzGhE2YjB9UV8HZaOs43jEjMR5UL2br.lABliSrFR0cHrMLe', 6, 9, 2, '2018-04-11 18:17:29', '2018-04-11 18:17:29', 'ihA4ZHhbBPUQVtmY3rxbQydNJl6HgGECP4fps046CaW5UHfkpA3Je63zOGmH', NULL),
(17, 'Calidad', 'jefe.sistemas@procar.com.co', '$2a$07$2Jfli41VEKc7nFDU8ksAHOapin0MLAxDRaNsSXhhjIoyyJ8uNRuqi', 6, 10, 2, '2018-04-11 18:18:02', '2018-04-11 18:18:02', 'vR2JvZpAhaN7yVjE9geBNvLm45vYzQFSE8PGoklJQFjzyBpn5wITVavZMkjd', NULL),
(18, 'adminprocar', 'adminprocar@procar.com.co', '$2y$10$dHHPVNQny7kLXxzutexp4O8zoFS/RjNfOnM6sA4DSrpsNH1gOkiSm', 1, 2, 4, '2018-04-24 18:36:57', '2018-04-24 18:36:57', 'fOD2MYOcEAAtrOO4cjg09S4GuLLhHLSdtMjtXqcrLB2x0zGEyrIswjZ33WJ1', NULL),
(19, 'Factu Parque', 'factu.parque@procar.com.co', '$2y$10$9Uwec9AHSVkQ/AMghD5ZPOf74TuiE00sKg7hS051EFovopHMvNkMy', 2, 3, 2, '2018-04-28 21:22:39', '2018-04-28 21:22:39', '5LoErNpaTDUI1SUvZ3dmo7ZdD1qJwoYYMDsiKDezsEYXtwPuHWVHbW9acLoG', NULL),
(20, 'Adrian Barajas', 'ventas.bga@procar.com.co', '$2y$10$i6z1bY2GZJg6CsyY31aH2e6uDEQM1nuBrt04EFmSyi1yNL3Vd9NFy', 2, 3, 2, '2018-05-12 22:44:20', '2018-05-12 22:44:20', 'p1XTguBRIQtkdh1IbkHWeesQYwKhyVwJYc1dw7730c4s9cD5aSzgBweugk7g', NULL),
(21, 'Gerencia ejecutiva', 'gerente.comercial@procar.com.co', '$2y$10$y1nET6vL4dmQHLV22m6ET.EvqmHjR8PnH34UjeHbQx6SlCkEJ1F62', 1, 1, 2, '2018-06-23 22:25:53', '2018-06-23 22:25:53', 'YdboJKezVYVjzpfOxFODUjPoUG9FV4L3r3MtVF8LSJuXlM11dh0SIZ5DS2BH', NULL),
(22, 'Luis Velasquez', 'procar.bga@procar.com.co', '$2y$10$ErBmroVYGTooTbsw9LGYlOM4KY9sSRbxDRR5FmvnT16hIbA/FRnVS', 4, 6, 2, '2018-07-04 03:22:27', '2018-07-04 03:22:27', '51zulYdzedK9lnRTjOvIZa4SllwFgsYieWvqKFNeSLrgGgXI51LtLvnLoiU1', NULL),
(23, 'Lennys Cuberos', 'aux.compras@procar.com.co', '$2y$10$iUSmccO6EIXpt2VaIz/h/.p5B4Jiuy60y/Wx23I23qnkQRX8mRKnm', 6, 10, 2, '2018-08-16 20:39:55', '2018-08-16 20:39:55', 'givNPpT3hNmDPKyyyGLW56yKKyU1isoZpI6OZvF729Jq7X29kER8I4IEO4fs', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indicadores_proceso_id_foreign` (`proceso_id`),
  ADD KEY `indicadores_subproceso_id_foreign` (`subproceso_id`),
  ADD KEY `indicadores_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `indicadores_visores`
--
ALTER TABLE `indicadores_visores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indicadores_visores_user_id_foreign` (`user_id`),
  ADD KEY `indicadores_visores_indicadore_id_foreign` (`indicadore_id`);

--
-- Indices de la tabla `indicadore_user`
--
ALTER TABLE `indicadore_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indicadore_user_user_id_foreign` (`user_id`),
  ADD KEY `indicadore_user_indicadore_id_foreign` (`indicadore_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultados_indicadores`
--
ALTER TABLE `resultados_indicadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resultados_indicadores_indicadore_id_foreign` (`indicadore_id`),
  ADD KEY `resultados_indicadores_proceso_id_foreign` (`proceso_id`),
  ADD KEY `resultados_indicadores_subproceso_id_foreign` (`subproceso_id`),
  ADD KEY `resultados_indicadores_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `subprocesos`
--
ALTER TABLE `subprocesos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subprocesos_proceso_id_foreign` (`proceso_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_proceso_id_foreign` (`proceso_id`),
  ADD KEY `users_subproceso_id_foreign` (`subproceso_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `indicadores_visores`
--
ALTER TABLE `indicadores_visores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `indicadore_user`
--
ALTER TABLE `indicadore_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `resultados_indicadores`
--
ALTER TABLE `resultados_indicadores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT de la tabla `subprocesos`
--
ALTER TABLE `subprocesos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `indicadores`
--
ALTER TABLE `indicadores`
  ADD CONSTRAINT `indicadores_proceso_id_foreign` FOREIGN KEY (`proceso_id`) REFERENCES `procesos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `indicadores_subproceso_id_foreign` FOREIGN KEY (`subproceso_id`) REFERENCES `subprocesos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `indicadores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `indicadores_visores`
--
ALTER TABLE `indicadores_visores`
  ADD CONSTRAINT `indicadores_visores_indicadore_id_foreign` FOREIGN KEY (`indicadore_id`) REFERENCES `indicadores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `indicadores_visores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `indicadore_user`
--
ALTER TABLE `indicadore_user`
  ADD CONSTRAINT `indicadore_user_indicadore_id_foreign` FOREIGN KEY (`indicadore_id`) REFERENCES `indicadores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `indicadore_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `resultados_indicadores`
--
ALTER TABLE `resultados_indicadores`
  ADD CONSTRAINT `resultados_indicadores_indicadore_id_foreign` FOREIGN KEY (`indicadore_id`) REFERENCES `indicadores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resultados_indicadores_proceso_id_foreign` FOREIGN KEY (`proceso_id`) REFERENCES `procesos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resultados_indicadores_subproceso_id_foreign` FOREIGN KEY (`subproceso_id`) REFERENCES `subprocesos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resultados_indicadores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `subprocesos`
--
ALTER TABLE `subprocesos`
  ADD CONSTRAINT `subprocesos_proceso_id_foreign` FOREIGN KEY (`proceso_id`) REFERENCES `procesos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_proceso_id_foreign` FOREIGN KEY (`proceso_id`) REFERENCES `procesos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_subproceso_id_foreign` FOREIGN KEY (`subproceso_id`) REFERENCES `subprocesos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
