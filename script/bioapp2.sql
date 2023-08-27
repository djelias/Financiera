-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2023 a las 15:41:02
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bioapp`
--

-- --------------------------------------------------------

CREATE TABLE `prestatarios` (
  `id` int(11) NOT NULL,
  `pnombre` char(255) DEFAULT NULL,
  `snombre` char(255) DEFAULT NULL,
  `papellido` char(255) DEFAULT NULL,
  `sapellido` char(255) DEFAULT NULL,
  `capellido` char(255) DEFAULT NULL,
  `dui` char(255) DEFAULT NULL,
  `email` char(255) DEFAULT NULL,
  `tel` char(25) DEFAULT NULL,
  `direccion` char(255) DEFAULT NULL,
  `direccion2` char(255) DEFAULT NULL,
  `ciudad` char(255) DEFAULT NULL,
  `municipio` char(255) DEFAULT NULL,
  `zip` char(255) DEFAULT NULL,
  `pais` char(255) DEFAULT NULL,
  `comentario` char(200) DEFAULT NULL,
  `cuenta` char(200) DEFAULT NULL,
  `balance` char(200) DEFAULT NULL,
  `imagen` char(200) DEFAULT NULL,
  `estatus` char(2) DEFAULT NULL,
  `estatus2` char(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL,
  `idprest` char(255) DEFAULT NULL,
  `codigoPrestamo` char(255) DEFAULT NULL,
  `periodicidad` char(255) DEFAULT NULL,
  `tasa` char(255) DEFAULT NULL,
  `tiempo` char(255) DEFAULT NULL,
  `cantidad` char(255) DEFAULT NULL,
  `descrip` char(255) DEFAULT NULL,
  `pago` char(255) DEFAULT NULL,
  `fechadePago` char(25) DEFAULT NULL,
  `cantidadPagada` char(255) DEFAULT NULL,
  `fechapago` char(255) DEFAULT NULL,
  `intereses` char(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `idprest` char(255) DEFAULT NULL,
  `idprest2` char(255) DEFAULT NULL,
  `fechadepago` char(255) DEFAULT NULL,
  `cantidad` char(255) DEFAULT NULL,
  `intereses` char(255) DEFAULT NULL,
  `comentario` char(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------

--
-- Estructura de tabla para la tabla `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `registroModificado` varchar(50) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `registroModificado`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(2, 'default', 'created', 2, 'App\\Clase', 'clasep', 1, 'App\\User', '[]', '2021-08-16 16:42:58', '2021-08-23 08:39:12'),
(3, 'default', 'deleted', 2, 'App\\Clase', 'clasep', 1, 'App\\User', '[]', '2021-08-16 16:45:12', '2021-08-23 08:39:13'),
(4, 'default', 'created', 3, 'App\\Dominio', 'Dominios1', 1, 'App\\User', '[]', '2021-08-16 16:50:18', '2021-08-23 08:05:23'),
(5, 'default', 'updated', 2, 'App\\Dominio', 'prueba', 1, 'App\\User', '[]', '2021-08-16 16:51:06', '2021-08-23 08:40:12'),
(6, 'default', 'deleted', 2, 'App\\Dominio', 'prueba', 1, 'App\\User', '[]', '2021-08-16 16:52:00', '2021-08-23 08:40:12'),
(7, 'default', 'updated', 3, 'App\\Dominio', 'Dominios1', 1, 'App\\User', '[]', '2021-08-16 16:57:02', '2021-08-23 08:05:23'),
(8, 'default', 'created', 4, 'App\\Dominio', 'archeas', 1, 'App\\User', '[]', '2021-08-16 16:57:50', '2021-08-23 08:40:12'),
(9, 'default', 'created', 5, 'App\\Dominio', 'Dominios', 1, 'App\\User', '[]', '2021-08-20 15:39:15', '2021-08-23 08:21:13'),
(10, 'default', 'created', 6, 'App\\Dominio', 'domin', 1, 'App\\User', '[]', '2021-08-21 11:33:09', '2021-08-21 11:33:09'),
(11, 'default', 'created', 3, 'App\\Clase', 'Clase', 1, 'App\\User', '[]', '2021-08-23 08:20:01', '2021-08-23 08:39:13'),
(12, 'default', 'created', 1, 'App\\TipoInvestigacion', 'Prueba tipo', 1, 'App\\User', '[]', '2021-08-23 10:13:09', '2021-08-23 10:14:27'),
(13, 'default', 'created', 1, 'App\\Municipio', 'Tonacatepeque', 1, 'App\\User', '[]', '2021-08-23 10:16:38', '2021-08-23 10:19:01'),
(14, 'default', 'updated', 1, 'App\\Municipio', 'Tonacatepeque', 1, 'App\\User', '[]', '2021-08-23 10:18:01', '2021-08-23 10:19:01'),
(15, 'default', 'updated', 1, 'App\\Municipio', 'Tonacatepeque', 1, 'App\\User', '[]', '2021-08-23 10:18:57', '2021-08-23 10:19:01'),
(16, 'default', 'deleted', 1, 'App\\Municipio', 'Tonacatepeque', 1, 'App\\User', '[]', '2021-08-23 10:19:39', '2021-08-23 10:20:20'),
(17, 'default', 'created', 1, 'App\\Publicacion', NULL, 1, 'App\\User', '[]', '2021-08-30 10:27:01', '2021-08-30 10:27:01'),
(18, 'default', 'created', 2, 'App\\Publicacion', NULL, 1, 'App\\User', '[]', '2021-08-30 10:42:51', '2021-08-30 10:42:51'),
(19, 'default', 'created', 3, 'App\\Publicacion', NULL, 1, 'App\\User', '[]', '2021-08-30 10:46:26', '2021-08-30 10:46:26'),
(20, 'default', 'created', 1, 'App\\Aprobacion', NULL, 1, 'App\\User', '[]', '2021-09-03 11:28:16', '2021-09-03 11:28:16'),
(21, 'default', 'updated', 1, 'App\\Aprobacion', NULL, 1, 'App\\User', '[]', '2021-09-03 11:28:40', '2021-09-03 11:28:40'),
(22, 'default', 'created', 1, 'App\\Contribuyentes', NULL, 1, 'App\\User', '[]', '2023-07-30 03:19:28', '2023-07-30 03:19:28'),
(23, 'default', 'created', 2, 'App\\Contribuyentes', NULL, 1, 'App\\User', '[]', '2023-07-30 03:50:25', '2023-07-30 03:50:25'),
(24, 'default', 'created', 1, 'App\\Catcuenta', NULL, 1, 'App\\User', '[]', '2023-07-30 04:13:19', '2023-07-30 04:13:19'),
(25, 'default', 'created', 8, 'App\\Libcompras', NULL, 1, 'App\\User', '[]', '2023-08-02 09:48:52', '2023-08-02 09:48:52');

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catcuentas`
--

CREATE TABLE `catcuentas` (
  `id` int(11) NOT NULL,
  `cuenta` char(255) DEFAULT NULL,
  `subcuenta` char(255) DEFAULT NULL,
  `cuentaDetalle` char(255) DEFAULT NULL,
  `tipo` char(50) DEFAULT NULL,
  `rubroDesc` char(255) NOT NULL,
  `estatus` char(2) DEFAULT NULL,
  `estatus2` varchar(200) DEFAULT NULL,
  `saldoInicial` double DEFAULT NULL,
  `debe` double DEFAULT NULL,
  `haber` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contribuyentes`
--

CREATE TABLE `contribuyentes` (
  `id` int(11) NOT NULL,
  `tipo` char(255) DEFAULT NULL,
  `tipo2` char(255) DEFAULT NULL,
  `nombreContrib` char(255) DEFAULT NULL,
  `noIdentif` char(25) DEFAULT NULL,
  `noRegistro` char(25) DEFAULT NULL,
  `giro` char(255) DEFAULT NULL,
  `direccion` char(255) DEFAULT NULL,
  `categoria` char(255) DEFAULT NULL,
  `estatus` char(2) DEFAULT NULL,
  `estatus2` char(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contribuyentes`
--

INSERT INTO `contribuyentes` (`id`, `tipo`, `tipo2`, `nombreContrib`, `noIdentif`, `noRegistro`, `giro`, `direccion`, `categoria`, `estatus`, `estatus2`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Diego', '123456', NULL, 'p', 'prueba direccion', '1', NULL, NULL, '2023-07-30 03:19:28', '2023-07-30 03:19:28'),
(2, NULL, NULL, 'prueba contribuyente', '654321', NULL, '654654', 'prueba direccion2', '1', NULL, NULL, '2023-07-30 03:50:25', '2023-07-30 03:50:25');

-- --------------------------------------------------------

CREATE TABLE `partidacs` (
  `id` int(11) NOT NULL,
  `idcatalogo` char(255) DEFAULT NULL,
  `tipo` char(255) DEFAULT NULL,
  `tipo2` char(255) DEFAULT NULL,
  `correlativo` char(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` char(255) DEFAULT NULL,
  `estatus` char(255) DEFAULT NULL,
  `saldoInicial` double DEFAULT NULL,
  `debe` double DEFAULT NULL,
  `haber` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `estatus` char(10) DEFAULT NULL,
  `estatus2` char(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- ------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

--
-- Estructura de tabla para la tabla `detalleusuarios`
--

CREATE TABLE `detalleusuarios` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `permisoInvestigacion` char(255) NOT NULL,
  `fechaInicioPermiso` date NOT NULL,
  `fechaFinPermiso` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libcompras`
--

CREATE TABLE `libcompras` (
  `id` int(11) NOT NULL,
  `tipoDoc` char(255) DEFAULT NULL,
  `tipo2` char(255) DEFAULT NULL,
  `ccf` varchar(50) DEFAULT NULL,
  `fechaccf` date DEFAULT NULL,
  `mes` char(255) DEFAULT NULL,
  `año` char(20) DEFAULT NULL,
  `idContribuyente` char(20) DEFAULT NULL,
  `estatus` char(2) DEFAULT NULL,
  `montoGravado` double DEFAULT NULL,
  `sneto` double DEFAULT NULL,
  `iva` double DEFAULT NULL,
  `riva` double DEFAULT NULL,
  `renta` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libcompras`
--

INSERT INTO `libcompras` (`id`, `tipoDoc`, `tipo2`, `ccf`, `fechaccf`, `mes`, `año`, `idContribuyente`, `estatus`, `montoGravado`, `sneto`, `iva`, `riva`, `renta`, `created_at`, `updated_at`) VALUES
(5, 'Compra Local', NULL, '100', '2023-04-01', '04', '2023', 'prueba contribuyente', '1', 100, 88.5, 11.5, NULL, NULL, '2023-04-02 09:44:00', '2023-04-02 09:44:00'),
(6, 'Compra Local', 'En blanco', '1a', '2023-05-10', '06', '2023', 'prueba contribuyente', '1', 113, 100, 13, 0, 0, '2023-05-11 17:39:59', '2023-05-11 17:39:59'),
(7, 'Compra Local', 'Iva', '1b', '2023-05-10', '05', '2023', 'prueba contribuyente', '1', 100, 88.5, 11.5, 0, 0, '2023-05-11 17:39:59', '2023-05-11 17:39:59'),
(8, 'Compra Local', 'Iva', '1a', '2023-08-01', '08', '2023', 'Diego', '1', 100, 88.5, 11.5, 0, 0, '2023-08-02 09:48:52', '2023-08-02 09:48:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obtenido_ens`
--

CREATE TABLE `obtenido_ens` (
  `id` int(11) NOT NULL,
  `idInv` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Roles', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(2, 'Crear Rol', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(3, 'Editar Rol', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(4, 'Eliminar Rol', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(5, 'Usuarios', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(6, 'Crear Usuarios', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(7, 'Editar Usuarios', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(8, 'Eliminar Usuarios', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(9, 'Departamentos', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(10, 'Crear Departamentos', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(11, 'Editar Departamentos', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(12, 'Eliminar Departamentos', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(13, 'Colecciones', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(14, 'Crear Colecciones', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(15, 'Editar Colecciones', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(16, 'Eliminar Colecciones', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(17, 'EspeciesAmenazadas', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(18, 'Crear EspecieAmenazada', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(19, 'Editar EspecieAmenazada', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(20, 'Eliminar EspecieAmenazada', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(21, 'Zonas', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(22, 'Crear Zona', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(23, 'Editar Zona', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(24, 'Eliminar Zona', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(25, 'Secuencias', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(26, 'Crear Secuencia', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(27, 'Editar Secuencia', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(28, 'Eliminar Secuencia', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(29, 'TiposInvestigaciones', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(30, 'Crear TipoInvestigacion', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(31, 'Editar TipoInvestigacion', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(32, 'Eliminar TipoInvestigacion', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(33, 'Riesgos', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(34, 'Crear Riesgo', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(35, 'Editar Riesgo', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(36, 'Eliminar Riesgo', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(37, 'Municipios', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(38, 'Crear Municipio', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(39, 'Editar Municipio', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(40, 'Eliminar Municipio', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(41, 'Taxonomias', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(42, 'Crear Taxonomia', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(43, 'Editar Taxonomia', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(44, 'Eliminar Taxonomia', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(45, 'Especimenes', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(46, 'Crear Especimen', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(47, 'Editar Especimen', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(48, 'Eliminar Especimen', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(49, 'Clases', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(50, 'Crear Clase', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(51, 'Editar Clase', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(52, 'Eliminar Clase', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(53, 'Dominios', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(54, 'Crear Dominio', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(55, 'Editar Dominio', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(56, 'Eliminar Dominio', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(57, 'Especies', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(58, 'Crear Especie', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(59, 'Editar Especie', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(60, 'Eliminar Especie', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(61, 'Familias', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(62, 'Crear Familia', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(63, 'Editar Familia', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(64, 'Eliminar Familia', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(65, 'Filums', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(66, 'Crear Filum', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(67, 'Editar Filum', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(68, 'Eliminar Filum', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(69, 'Generos', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(70, 'Crear Genero', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(71, 'Editar Genero', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(72, 'Eliminar Genero', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(73, 'Investigaciones', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(74, 'Crear Investigacion', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(75, 'Editar Investigacion', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(76, 'Eliminar Investigacion', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(77, 'Ordenes', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(78, 'Crear Orden', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(79, 'Editar Orden', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(80, 'Eliminar Orden', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(81, 'Reinos', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(82, 'Crear Reino', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(83, 'Editar Reino', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(84, 'Eliminar Reino', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(85, 'Secuencias', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(86, 'Crear Secuencia', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(87, 'Editar Secuencia', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(88, 'Eliminar Secuencia', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(89, 'Publicaciones', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(90, 'Crear Publicacion', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(91, 'Editar Publicacion', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(92, 'Eliminar Publicacion', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(93, 'Aprobaciones', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(94, 'Crear Aprobacion', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(95, 'Editar Aprobacion', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31'),
(96, 'Eliminar Aprobacion', 'web', '2021-02-24 16:24:31', '2021-02-24 16:24:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacions`
--

CREATE TABLE `publicacions` (
  `id` int(11) NOT NULL,
  `nombrePublicacion` char(255) NOT NULL,
  `descripcionPub` char(255) NOT NULL,
  `url` char(255) DEFAULT NULL,
  `imagen` char(255) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reinos`
--

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-02-24 16:25:35', '2021-02-24 16:25:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rols`
--

CREATE TABLE `rols` (
  `id` int(11) NOT NULL,
  `idDetalleUsuario` int(11) DEFAULT NULL,
  `nombreRol` char(255) NOT NULL,
  `estado` char(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secuencias`
--

--
-- Estructura de tabla para la tabla `se_realizans`
--

CREATE TABLE `se_realizans` (
  `id` int(11) NOT NULL,
  `idInv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taxonomias`
--

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Diego', 'diego@gmail.com', NULL, '$2y$10$.N3WdI85CXw4D6C1HGUKreI39lDsHF7id1OKdZUDqwIBPuhmFOHQa', NULL, '2021-02-24 16:28:46', '2021-02-24 16:28:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `idDetalleUsuario` int(11) DEFAULT NULL,
  `nombreUsuario` char(255) NOT NULL,
  `correoElectronico1` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`),
  ADD KEY `subject` (`subject_id`,`subject_type`),
  ADD KEY `causer` (`causer_id`,`causer_type`);

--
-- Indices de la tabla `aprobacions`
--
ALTER TABLE `aprobacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_APROBACION_PERTENECE_A_UNA_INVESTIGACION` (`idInvestigacion`);

--
-- Indices de la tabla `catcuentas`
--
ALTER TABLE `catcuentas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_CLASE_POSEE_UN_FILUM` (`idFilum`);

--
-- Indices de la tabla `coleccions`
--
ALTER TABLE `coleccions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contribuyentes`
--
ALTER TABLE `contribuyentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalleusuarios`
--
ALTER TABLE `detalleusuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DETALLEU_OBTIENE_ROL` (`idRol`),
  ADD KEY `FK_DETALLEU_POSEE2_USUARIO` (`idUsuario`);

--
-- Indices de la tabla `dominios`
--
ALTER TABLE `dominios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DOMINIO_PERTENECE_REINO` (`idReino`);

--
-- Indices de la tabla `especieamenazadas`
--
ALTER TABLE `especieamenazadas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ESPECIEA_TIENE_UNA_RIESGO` (`idRiesgo`);

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ESPECIE_POSEE_UNA_TAXONOMI` (`idTaxonomia`),
  ADD KEY `FK_ESPECIE_PUEDE_SER_ESPECIEA` (`idEspamen`),
  ADD KEY `FK_ESPECIE_TIENE_____GENERO` (`idGenero`);

--
-- Indices de la tabla `especimens`
--
ALTER TABLE `especimens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ESPECIME_POSEE_UNA_TAXONOMI` (`idTaxonomia`),
  ADD KEY `FK_SECUENCI_TIENE_____SECUENCIA` (`idSecuencia`),
  ADD KEY `FK_ESPECIMEN_PERTENECE_INVESTIGACION` (`idInvestigacion`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FAMILIA_TIENE_UNA_ORDEN` (`idOrden`);

--
-- Indices de la tabla `filums`
--
ALTER TABLE `filums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FILUM_TIENE_____REINO` (`idReino`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_GENERO_PEERTENEC_FAMILIA` (`idFamilia`);

--
-- Indices de la tabla `investigacions`
--
ALTER TABLE `investigacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_INVESTIG_PERTENECE_ZONA` (`idZona`),
  ADD KEY `FK_INVESTIG_RELATIONS_USUARIO` (`idUsuario`),
  ADD KEY `FK_INVESTIG_TIENE_UN_TIPOINVE` (`idTipo`);

--
-- Indices de la tabla `libcompras`
--
ALTER TABLE `libcompras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_MUNICIPI_COMPUESTO_DEPARTAM` (`idDepto`);

--
-- Indices de la tabla `obtenido_ens`
--
ALTER TABLE `obtenido_ens`
  ADD PRIMARY KEY (`id`,`idInv`),
  ADD KEY `FK_OBTENIDO_OBTENIDO__INVESTIG` (`idInv`);

--
-- Indices de la tabla `ordens`
--
ALTER TABLE `ordens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ORDEN_RELATIONS_CLASE` (`idClase`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicacions`
--
ALTER TABLE `publicacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reinos`
--
ALTER TABLE `reinos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_REINO_PERTENECE_DOMINIO` (`idDominio`);

--
-- Indices de la tabla `riesgos`
--
ALTER TABLE `riesgos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ROL_OBTIENE2_DETALLEU` (`idDetalleUsuario`);

--
-- Indices de la tabla `secuencias`
--
ALTER TABLE `secuencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `se_realizans`
--
ALTER TABLE `se_realizans`
  ADD PRIMARY KEY (`id`,`idInv`),
  ADD KEY `FK_SE_REALI_SE_REALIZ_INVESTIG` (`idInv`);

--
-- Indices de la tabla `taxonomias`
--
ALTER TABLE `taxonomias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TAXONOMI_POSEE_UNA_ESPECIME` (`idEspecimen`),
  ADD KEY `FK_TAXONOMI_POSEE_UNA_ESPECIE` (`idEspecie`),
  ADD KEY `FK_TAXONOMI_SE_CONFOR_COLECCIO` (`idColeccion`);

--
-- Indices de la tabla `tipoinvestigacions`
--
ALTER TABLE `tipoinvestigacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_TIPOINVE_TIENE_UN2_INVESTIG` (`idInv`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_USUARIO_POSEE_DETALLEU` (`idDetalleUsuario`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ZONA_PERTENECE_A_UN_MUNICIPIO` (`idMunicipio`),
  ADD KEY `FK_ZONA_PERTENECE_A_UN_DEPARTAMENTO` (`idDepto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `aprobacions`
--
ALTER TABLE `aprobacions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catcuentas`
--
ALTER TABLE `catcuentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=537;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `coleccions`
--
ALTER TABLE `coleccions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contribuyentes`
--
ALTER TABLE `contribuyentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalleusuarios`
--
ALTER TABLE `detalleusuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dominios`
--
ALTER TABLE `dominios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especieamenazadas`
--
ALTER TABLE `especieamenazadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especimens`
--
ALTER TABLE `especimens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `filums`
--
ALTER TABLE `filums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `investigacions`
--
ALTER TABLE `investigacions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libcompras`
--
ALTER TABLE `libcompras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `obtenido_ens`
--
ALTER TABLE `obtenido_ens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordens`
--
ALTER TABLE `ordens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `publicacions`
--
ALTER TABLE `publicacions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reinos`
--
ALTER TABLE `reinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `riesgos`
--
ALTER TABLE `riesgos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rols`
--
ALTER TABLE `rols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `secuencias`
--
ALTER TABLE `secuencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `se_realizans`
--
ALTER TABLE `se_realizans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `taxonomias`
--
ALTER TABLE `taxonomias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoinvestigacions`
--
ALTER TABLE `tipoinvestigacions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprobacions`
--
ALTER TABLE `aprobacions`
  ADD CONSTRAINT `FK_APROBACION_PERTENECE_A_UNA_INVESTIGACION` FOREIGN KEY (`idInvestigacion`) REFERENCES `investigacions` (`id`);

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `FK_CLASE_POSEE_UN_FILUM` FOREIGN KEY (`idFilum`) REFERENCES `filums` (`id`);

--
-- Filtros para la tabla `detalleusuarios`
--
ALTER TABLE `detalleusuarios`
  ADD CONSTRAINT `FK_DETALLEU_OBTIENE_ROL` FOREIGN KEY (`idRol`) REFERENCES `rols` (`id`),
  ADD CONSTRAINT `FK_DETALLEU_POSEE2_USUARIO` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `dominios`
--
ALTER TABLE `dominios`
  ADD CONSTRAINT `FK_DOMINIO_PERTENECE_REINO` FOREIGN KEY (`idReino`) REFERENCES `reinos` (`id`);

--
-- Filtros para la tabla `especieamenazadas`
--
ALTER TABLE `especieamenazadas`
  ADD CONSTRAINT `FK_ESPECIEA_TIENE_UNA_RIESGO` FOREIGN KEY (`idRiesgo`) REFERENCES `riesgos` (`id`);

--
-- Filtros para la tabla `especies`
--
ALTER TABLE `especies`
  ADD CONSTRAINT `FK_ESPECIE_POSEE_UNA_TAXONOMI` FOREIGN KEY (`idTaxonomia`) REFERENCES `taxonomias` (`id`),
  ADD CONSTRAINT `FK_ESPECIE_PUEDE_SER_ESPECIEA` FOREIGN KEY (`idEspamen`) REFERENCES `especieamenazadas` (`id`),
  ADD CONSTRAINT `FK_ESPECIE_TIENE_____GENERO` FOREIGN KEY (`idGenero`) REFERENCES `generos` (`id`);

--
-- Filtros para la tabla `especimens`
--
ALTER TABLE `especimens`
  ADD CONSTRAINT `FK_ESPECIMEN_PERTENECE_INVESTIGACION` FOREIGN KEY (`idInvestigacion`) REFERENCES `investigacions` (`id`),
  ADD CONSTRAINT `FK_ESPECIME_POSEE_UNA_TAXONOMI` FOREIGN KEY (`idTaxonomia`) REFERENCES `taxonomias` (`id`),
  ADD CONSTRAINT `FK_SECUENCI_TIENE_____SECUENCIA` FOREIGN KEY (`idSecuencia`) REFERENCES `secuencias` (`id`);

--
-- Filtros para la tabla `familias`
--
ALTER TABLE `familias`
  ADD CONSTRAINT `FK_FAMILIA_TIENE_UNA_ORDEN` FOREIGN KEY (`idOrden`) REFERENCES `ordens` (`id`);

--
-- Filtros para la tabla `filums`
--
ALTER TABLE `filums`
  ADD CONSTRAINT `FK_FILUM_TIENE_____REINO` FOREIGN KEY (`idReino`) REFERENCES `reinos` (`id`);

--
-- Filtros para la tabla `generos`
--
ALTER TABLE `generos`
  ADD CONSTRAINT `FK_GENERO_PEERTENEC_FAMILIA` FOREIGN KEY (`idFamilia`) REFERENCES `familias` (`id`);

--
-- Filtros para la tabla `investigacions`
--
ALTER TABLE `investigacions`
  ADD CONSTRAINT `FK_INVESTIG_PERTENECE_ZONA` FOREIGN KEY (`idZona`) REFERENCES `zonas` (`id`),
  ADD CONSTRAINT `FK_INVESTIG_RELATIONS_USUARIO` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `FK_INVESTIG_TIENE_UN_TIPOINVE` FOREIGN KEY (`idTipo`) REFERENCES `tipoinvestigacions` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `FK_MUNICIPI_COMPUESTO_DEPARTAM` FOREIGN KEY (`idDepto`) REFERENCES `departamentos` (`id`);

--
-- Filtros para la tabla `obtenido_ens`
--
ALTER TABLE `obtenido_ens`
  ADD CONSTRAINT `FK_OBTENIDO_OBTENIDO__ESPECIME` FOREIGN KEY (`id`) REFERENCES `especimens` (`id`),
  ADD CONSTRAINT `FK_OBTENIDO_OBTENIDO__INVESTIG` FOREIGN KEY (`idInv`) REFERENCES `investigacions` (`id`);

--
-- Filtros para la tabla `ordens`
--
ALTER TABLE `ordens`
  ADD CONSTRAINT `FK_ORDEN_RELATIONS_CLASE` FOREIGN KEY (`idClase`) REFERENCES `clases` (`id`);

--
-- Filtros para la tabla `reinos`
--
ALTER TABLE `reinos`
  ADD CONSTRAINT `FK_REINO_PERTENECE_DOMINIO` FOREIGN KEY (`idDominio`) REFERENCES `dominios` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `rols`
--
ALTER TABLE `rols`
  ADD CONSTRAINT `FK_ROL_OBTIENE2_DETALLEU` FOREIGN KEY (`idDetalleUsuario`) REFERENCES `detalleusuarios` (`id`);

--
-- Filtros para la tabla `se_realizans`
--
ALTER TABLE `se_realizans`
  ADD CONSTRAINT `FK_SE_REALI_SE_REALIZ_INVESTIG` FOREIGN KEY (`idInv`) REFERENCES `investigacions` (`id`),
  ADD CONSTRAINT `FK_SE_REALI_SE_REALIZ_MUNICIPI` FOREIGN KEY (`id`) REFERENCES `municipios` (`id`);

--
-- Filtros para la tabla `taxonomias`
--
ALTER TABLE `taxonomias`
  ADD CONSTRAINT `FK_TAXONOMI_POSEE_UNA_ESPECIE` FOREIGN KEY (`idEspecie`) REFERENCES `especies` (`id`),
  ADD CONSTRAINT `FK_TAXONOMI_POSEE_UNA_ESPECIME` FOREIGN KEY (`idEspecimen`) REFERENCES `especimens` (`id`),
  ADD CONSTRAINT `FK_TAXONOMI_SE_CONFOR_COLECCIO` FOREIGN KEY (`idColeccion`) REFERENCES `coleccions` (`id`);

--
-- Filtros para la tabla `tipoinvestigacions`
--
ALTER TABLE `tipoinvestigacions`
  ADD CONSTRAINT `FK_TIPOINVE_TIENE_UN2_INVESTIG` FOREIGN KEY (`idInv`) REFERENCES `investigacions` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_USUARIO_POSEE_DETALLEU` FOREIGN KEY (`idDetalleUsuario`) REFERENCES `detalleusuarios` (`id`);

--
-- Filtros para la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD CONSTRAINT `FK_ZONA_PERTENECE_A_UN_DEPARTAMENTO` FOREIGN KEY (`idDepto`) REFERENCES `departamentos` (`id`),
  ADD CONSTRAINT `FK_ZONA_PERTENECE_A_UN_MUNICIPIO` FOREIGN KEY (`idMunicipio`) REFERENCES `municipios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
