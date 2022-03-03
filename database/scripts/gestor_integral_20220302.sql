-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-03-2022 a las 04:03:48
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor_integral`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_process`
--

CREATE TABLE `admin_process` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `ap_status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `admin_process`
--

INSERT INTO `admin_process` (`id`, `id_user`, `ap_status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 9, 'ACTIVO', '2022-02-22 13:02:24', '2022-02-22 13:02:24', NULL, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `a_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_order` int(11) NOT NULL,
  `a_state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `a_name`, `a_order`, `a_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Ciencias Humanas', 100, 1, '2022-02-02 04:00:35', '2022-02-02 04:00:35', NULL, NULL, NULL, NULL),
(2, 'Ciencias Sociales', 200, 1, '2022-02-02 04:00:35', '2022-02-02 04:00:35', NULL, NULL, NULL, NULL),
(3, 'Arte y Diseño', 300, 1, '2022-02-02 04:00:36', '2022-02-02 04:00:36', NULL, NULL, NULL, NULL),
(4, 'Otras áreas', 400, 1, '2022-02-02 04:00:36', '2022-02-02 04:00:36', NULL, NULL, NULL, NULL),
(5, 'Ciencias Exactas', 500, 1, '2022-02-02 04:00:36', '2022-02-02 04:00:36', NULL, NULL, NULL, NULL),
(6, 'Ciencias Económicas', 600, 1, '2022-02-02 04:00:36', '2022-02-02 04:00:36', NULL, NULL, NULL, NULL),
(7, 'Ciencias de la Salud', 700, 1, '2022-02-02 04:00:36', '2022-02-02 04:00:36', NULL, NULL, NULL, NULL),
(8, 'Ciencias Legales', 800, 1, '2022-02-02 04:00:36', '2022-02-02 04:00:36', NULL, NULL, NULL, NULL),
(9, 'Ingenierías y Arquitectura', 900, 1, '2022-02-02 04:00:36', '2022-02-02 04:00:36', NULL, NULL, NULL, NULL),
(10, 'Educación', 1000, 1, '2022-02-02 04:00:36', '2022-02-02 04:00:36', NULL, NULL, NULL, NULL),
(11, 'Idiomas', 1100, 1, '2022-02-02 04:00:36', '2022-02-02 04:00:36', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bonds`
--

CREATE TABLE `bonds` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_type_bond` int(10) UNSIGNED NOT NULL,
  `id_type_value` int(10) UNSIGNED NOT NULL,
  `b_value` int(10) UNSIGNED NOT NULL,
  `b_state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `id_coin` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bonds`
--

INSERT INTO `bonds` (`id`, `id_user`, `id_type_bond`, `id_type_value`, `b_value`, `b_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`, `id_coin`) VALUES
(10, 2, 107, 105, 10, 2, '2022-02-21 22:31:45', '2022-02-27 01:09:02', NULL, 1, 1, NULL, 17),
(11, 2, 108, 106, 500, 2, '2022-02-21 22:32:05', '2022-03-02 01:21:19', NULL, 1, 1, NULL, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bond_quotes`
--

CREATE TABLE `bond_quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bond_id` int(10) UNSIGNED NOT NULL,
  `request_quote_id` bigint(20) UNSIGNED NOT NULL,
  `value_bond` decimal(24,4) NOT NULL,
  `trm_assigned` decimal(24,4) NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bond_quotes`
--

INSERT INTO `bond_quotes` (`id`, `bond_id`, `request_quote_id`, `value_bond`, `trm_assigned`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(97, 10, 138, '1848.6489', '185.0000', 1, NULL, NULL, '2022-02-27 00:13:28', '2022-02-27 00:13:28', NULL),
(98, 10, 139, '170025.4500', '185.0000', 1, NULL, NULL, '2022-02-27 01:08:14', '2022-02-27 01:08:14', NULL),
(99, 10, 140, '170025.4500', '185.0000', 1, NULL, NULL, '2022-02-27 01:09:01', '2022-02-27 01:09:01', NULL),
(100, 11, 141, '500.0000', '185.0000', 1, NULL, NULL, '2022-03-01 02:40:45', '2022-03-01 02:40:45', NULL),
(101, 11, 142, '500.0000', '185.0000', 1, NULL, NULL, '2022-03-01 02:42:28', '2022-03-01 02:42:28', NULL),
(102, 11, 143, '500.0000', '185.0000', 1, NULL, NULL, '2022-03-01 16:33:53', '2022-03-01 16:33:53', NULL),
(103, 11, 144, '500.0000', '185.0000', 1, NULL, NULL, '2022-03-02 01:21:16', '2022-03-02 01:21:16', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `change_requests`
--

CREATE TABLE `change_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `request_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_observation` text COLLATE utf8mb4_unicode_ci,
  `request_state` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `change_requests`
--

INSERT INTO `change_requests` (`id`, `id_user`, `request_name`, `request_value`, `request_observation`, `request_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 2, 'u_key_number', '8569459455', NULL, 1, '2022-02-16 14:05:06', '2022-02-16 14:08:28', NULL, 2, NULL, NULL),
(2, 2, 'u_id_means', '4', NULL, 1, '2022-02-16 14:05:06', '2022-02-16 14:08:08', NULL, 2, NULL, NULL),
(3, 2, 'u_id_country', '1', NULL, 1, '2022-02-16 14:06:40', '2022-02-16 14:08:18', NULL, 2, NULL, NULL),
(4, 2, 'u_indicativo', '+54', NULL, 1, '2022-02-16 14:06:40', '2022-02-16 14:08:14', NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coins`
--

CREATE TABLE `coins` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_currency` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_type_currency` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_trm_currency` decimal(6,2) NOT NULL,
  `c_order` int(11) NOT NULL,
  `c_state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `coins`
--

INSERT INTO `coins` (`id`, `c_currency`, `c_type_currency`, `c_trm_currency`, `c_order`, `c_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Balboa panameño', 'PAB', '4000.00', 100, 1, '2021-12-12 21:45:15', '2022-02-17 22:50:55', NULL, 1, 1, NULL),
(2, 'Bolívar fuerte', 'VEF', '839.00', 200, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(3, 'Boliviano', 'BOB', '560.00', 300, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(4, 'Colón costarricense', 'CRC', '6.10', 400, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(5, 'Córdoba nicaragüense', 'NIO', '110.00', 500, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(6, 'Dólar australiano', 'AUD', '2700.00', 600, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(7, 'Dólar canadiense', 'CAD', '3050.00', 700, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(8, 'Dólar de Singapur', 'SGD', '2850.00', 800, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(9, 'Dólar estadounidense', 'USD', '3800.00', 900, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(10, 'Euro', 'EUR', '4300.00', 1000, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(11, 'Guaraní', 'PYG', '0.50', 1100, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(12, 'Nuevo sol', 'PEN', '950.00', 1200, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(13, 'Peso argentino', 'ARS', '38.00', 1300, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(14, 'Peso chileno', 'CLP', '4.50', 1400, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(15, 'Peso colombiano', 'COP', '1.00', 1500, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(16, 'Peso dominicano', 'DOP', '68.00', 1600, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(17, 'Peso mexicano', 'MXN', '185.00', 1900, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(18, 'Peso uruguayo', 'UYU', '88.00', 1800, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(19, 'Quetzal guatemalteco', 'GTQ', '505.00', 1900, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(20, 'Real brasileño', 'BRL', '690.00', 2000, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(21, 'Yuan chino', 'CNY', '610.00', 2100, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `communications`
--

CREATE TABLE `communications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_request` bigint(20) UNSIGNED NOT NULL,
  `c_status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `communications`
--

INSERT INTO `communications` (`id`, `id_user`, `id_request`, `c_status`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 2, 11, 'ACTIVO', '2022-02-04 01:28:31', '2022-02-04 01:28:31', NULL, NULL, NULL, NULL),
(2, 2, 12, 'ACTIVO', '2022-02-04 18:28:30', '2022-02-04 18:28:30', NULL, NULL, NULL, NULL),
(3, 2, 13, 'ACTIVO', '2022-02-04 18:30:23', '2022-02-04 18:30:23', NULL, NULL, NULL, NULL),
(4, 2, 14, 'ACTIVO', '2022-02-04 18:30:51', '2022-02-04 18:30:51', NULL, NULL, NULL, NULL),
(5, 2, 15, 'ACTIVO', '2022-02-04 18:31:21', '2022-02-04 18:31:21', NULL, NULL, NULL, NULL),
(6, 2, 16, 'ACTIVO', '2022-02-04 18:31:35', '2022-02-04 18:31:35', NULL, NULL, NULL, NULL),
(7, 2, 17, 'ACTIVO', '2022-02-04 18:32:39', '2022-02-04 18:32:39', NULL, NULL, NULL, NULL),
(8, 2, 18, 'ACTIVO', '2022-02-04 18:33:59', '2022-02-04 18:33:59', NULL, NULL, NULL, NULL),
(9, 2, 19, 'ACTIVO', '2022-02-04 18:35:38', '2022-02-04 18:35:38', NULL, NULL, NULL, NULL),
(10, 2, 20, 'ACTIVO', '2022-02-04 18:37:00', '2022-02-04 18:37:00', NULL, NULL, NULL, NULL),
(11, 2, 21, 'ACTIVO', '2022-02-04 18:38:42', '2022-02-04 18:38:42', NULL, NULL, NULL, NULL),
(12, 2, 22, 'ACTIVO', '2022-02-04 18:39:00', '2022-02-04 18:39:00', NULL, NULL, NULL, NULL),
(13, 2, 23, 'ACTIVO', '2022-02-04 18:40:19', '2022-02-04 18:40:19', NULL, NULL, NULL, NULL),
(14, 2, 25, 'ACTIVO', '2022-02-04 19:11:36', '2022-02-04 19:11:36', NULL, NULL, NULL, NULL),
(15, 2, 24, 'ACTIVO', '2022-02-04 19:11:36', '2022-02-04 19:11:36', NULL, NULL, NULL, NULL),
(16, 2, 26, 'ACTIVO', '2022-02-04 19:11:57', '2022-02-04 19:11:57', NULL, NULL, NULL, NULL),
(17, 1, 27, 'ACTIVO', '2022-02-04 22:33:22', '2022-02-04 22:33:22', NULL, NULL, NULL, NULL),
(18, 2, 28, 'ACTIVO', '2022-02-04 22:33:33', '2022-02-04 22:33:33', NULL, NULL, NULL, NULL),
(19, 2, 29, 'ACTIVO', '2022-02-13 19:23:26', '2022-02-13 19:23:26', NULL, NULL, NULL, NULL),
(20, 2, 30, 'ACTIVO', '2022-02-14 15:50:57', '2022-02-14 15:50:57', NULL, NULL, NULL, NULL),
(21, 2, 31, 'ACTIVO', '2022-03-01 16:19:36', '2022-03-01 16:19:36', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `c_indicative` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `countries`
--

INSERT INTO `countries` (`id`, `c_indicative`, `c_name`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '+54', 'Argentina', '2021-12-13 01:52:21', '2021-12-22 20:10:17', NULL, 1, 11, NULL),
(2, '+61', 'Australia', '2021-12-13 01:52:21', '2021-12-22 20:45:38', NULL, 1, 11, NULL),
(3, '+591', 'Bolivia', '2021-12-13 01:52:21', '2021-12-22 20:46:03', NULL, 1, 11, NULL),
(4, '+55', 'Brasil', '2021-12-13 01:52:21', '2021-12-22 20:46:22', NULL, 1, 11, NULL),
(5, '+1', 'Canadá', '2021-12-13 01:52:21', '2021-12-22 20:46:42', NULL, 1, 11, NULL),
(6, '+56', 'Chile', '2021-12-13 01:52:21', '2021-12-22 20:46:59', NULL, 1, 11, NULL),
(7, '+86', 'China', '2021-12-13 01:52:21', '2021-12-22 20:47:53', NULL, 1, 11, NULL),
(8, '+57', 'Colombia', '2021-12-13 01:52:21', '2021-12-22 19:54:57', NULL, 1, 11, NULL),
(9, '+506', 'Costa Rica', '2021-12-13 01:52:21', '2021-12-22 20:48:20', NULL, 1, 11, NULL),
(10, '+593', 'Ecuador', '2021-12-13 01:52:21', '2021-12-22 20:48:36', NULL, 1, 11, NULL),
(11, '+1', 'EEUU', '2021-12-13 01:52:21', '2021-12-22 20:48:58', NULL, 1, 11, NULL),
(12, '+503', 'El Salvador', '2021-12-13 01:52:21', '2021-12-22 20:49:21', NULL, 1, 11, NULL),
(13, '+34', 'España', '2021-12-13 01:52:21', '2021-12-22 20:49:38', NULL, 1, 11, NULL),
(14, '+358', 'Finlandia', '2021-12-13 01:52:21', '2021-12-22 20:50:20', NULL, 1, 11, NULL),
(15, '+33', 'Francia', '2021-12-13 01:52:21', '2021-12-22 20:50:43', NULL, 1, 11, NULL),
(16, '+502', 'Guatemala', '2021-12-13 01:52:21', '2021-12-22 20:51:11', NULL, 1, 11, NULL),
(17, '+93', 'Italia', '2021-12-13 01:52:21', '2021-12-22 20:53:18', NULL, 1, 11, NULL),
(18, '+52', 'Mexico', '2021-12-13 01:52:21', '2021-12-22 20:53:44', NULL, 1, 11, NULL),
(19, '+505', 'Nicaragua', '2021-12-13 01:52:21', '2021-12-22 20:54:07', NULL, 1, 11, NULL),
(20, '+507', 'Panamá', '2021-12-13 01:52:21', '2021-12-22 20:54:26', NULL, 1, 11, NULL),
(21, '+595', 'Paraguay', '2021-12-13 01:52:21', '2021-12-22 20:54:46', NULL, 1, 11, NULL),
(22, '+51', 'Perú', '2021-12-13 01:52:21', '2021-12-22 20:57:43', NULL, 1, 11, NULL),
(23, '+1787', 'Puerto Rico', '2021-12-13 01:52:21', '2021-12-22 20:58:09', NULL, 1, 11, NULL),
(24, '+1809', 'Rep Dominicana', '2021-12-13 01:52:21', '2021-12-22 20:44:41', NULL, 1, 11, NULL),
(25, '+65', 'Singapur', '2021-12-13 01:52:21', '2021-12-22 20:16:22', NULL, 1, 11, NULL),
(26, '+598', 'Uruguay', '2021-12-13 01:52:21', '2021-12-22 20:15:47', NULL, 1, 11, NULL),
(27, '+58', 'Venezuela', '2021-12-13 01:52:21', '2021-12-22 20:15:18', NULL, 1, 11, NULL),
(28, '+966', 'Arabia', '2021-12-22 20:07:01', '2021-12-22 20:07:01', NULL, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deliverables`
--

CREATE TABLE `deliverables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_delivery` date NOT NULL COMMENT 'fecha de entrega',
  `status` int(11) NOT NULL COMMENT '1 = subido; 2 = descargable',
  `status_deliverable` int(11) NOT NULL DEFAULT '1' COMMENT '1 = ENTREGABLE PTE APROBACIÓN; 2 = ENTREGABLE APROBADO; 3= ENTREGABLE RECHAZADO',
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `deliverables`
--

INSERT INTO `deliverables` (`id`, `date_delivery`, `status`, `status_deliverable`, `file`, `work_id`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-02-21', 2, 2, NULL, 1, NULL, NULL, NULL, '2022-02-22 03:31:38', '2022-02-22 03:31:38', NULL),
(2, '2022-02-21', 1, 1, NULL, 2, NULL, NULL, NULL, '2022-02-22 03:31:40', '2022-02-22 03:31:40', NULL),
(3, '2022-02-21', 2, 3, NULL, 3, NULL, NULL, NULL, '2022-02-22 03:31:41', '2022-02-22 03:31:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `language_tutors`
--

CREATE TABLE `language_tutors` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_language` int(10) UNSIGNED NOT NULL,
  `l_t_namefile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_t_state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `language_tutors`
--

INSERT INTO `language_tutors` (`id`, `id_user`, `id_language`, `l_t_namefile`, `observation`, `l_t_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 4, 52, NULL, 'Aprobado', 1, '2022-02-05 20:09:00', '2022-02-05 20:21:36', NULL, NULL, NULL, NULL),
(2, 4, 55, NULL, 'Aprobado', 1, '2022-02-05 20:09:10', '2022-02-05 20:21:44', NULL, NULL, NULL, NULL),
(3, 4, 57, NULL, 'No hay constancia', 1, '2022-02-05 20:09:18', '2022-02-05 20:21:55', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_communication` bigint(20) UNSIGNED NOT NULL,
  `m_date_message` datetime NOT NULL,
  `m_text_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_state` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `messages`
--

INSERT INTO `messages` (`id`, `id_user`, `id_communication`, `m_date_message`, `m_text_message`, `m_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 1, '2022-02-03 20:28:31', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #1, nuestro personal está atento a responder tus mensajes', 1, '2022-02-04 01:28:31', '2022-02-04 01:29:31', NULL, NULL, NULL, NULL),
(2, 2, 1, '2022-02-03 20:29:41', 'Muchas gracias', 1, '2022-02-04 01:29:41', '2022-02-04 01:30:28', NULL, NULL, NULL, NULL),
(3, 2, 1, '2022-02-03 20:29:48', 'tengo una duda', 1, '2022-02-04 01:29:48', '2022-02-04 01:30:28', NULL, NULL, NULL, NULL),
(4, 1, 2, '2022-02-04 13:28:30', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #2, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 18:28:30', '2022-02-04 18:28:30', NULL, NULL, NULL, NULL),
(5, 1, 3, '2022-02-04 13:30:23', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #3, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 18:30:23', '2022-02-04 18:30:23', NULL, NULL, NULL, NULL),
(6, 1, 4, '2022-02-04 13:30:51', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #4, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 18:30:51', '2022-02-04 18:30:51', NULL, NULL, NULL, NULL),
(7, 1, 5, '2022-02-04 13:31:21', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #5, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 18:31:21', '2022-02-04 18:31:21', NULL, NULL, NULL, NULL),
(8, 1, 6, '2022-02-04 13:31:35', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #6, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 18:31:35', '2022-02-04 18:31:35', NULL, NULL, NULL, NULL),
(9, 1, 7, '2022-02-04 13:32:39', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #7, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 18:32:39', '2022-02-04 18:32:39', NULL, NULL, NULL, NULL),
(10, 1, 8, '2022-02-04 13:33:59', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #8, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 18:33:59', '2022-02-04 18:33:59', NULL, NULL, NULL, NULL),
(11, 1, 9, '2022-02-04 13:35:38', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #9, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 18:35:38', '2022-02-04 18:35:38', NULL, NULL, NULL, NULL),
(12, 1, 10, '2022-02-04 13:37:00', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #10, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 18:37:00', '2022-02-04 18:37:00', NULL, NULL, NULL, NULL),
(13, 1, 11, '2022-02-04 13:38:43', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #11, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 18:38:43', '2022-02-04 18:38:43', NULL, NULL, NULL, NULL),
(14, 1, 12, '2022-02-04 13:39:00', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #12, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 18:39:00', '2022-02-04 18:39:00', NULL, NULL, NULL, NULL),
(15, 1, 13, '2022-02-04 13:40:19', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #13, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 18:40:19', '2022-02-04 18:40:19', NULL, NULL, NULL, NULL),
(16, 1, 14, '2022-02-04 14:11:36', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #14, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 19:11:36', '2022-02-04 19:11:36', NULL, NULL, NULL, NULL),
(17, 1, 15, '2022-02-04 14:11:36', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #15, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 19:11:36', '2022-02-04 19:11:36', NULL, NULL, NULL, NULL),
(18, 1, 16, '2022-02-04 14:11:57', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #16, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 19:11:57', '2022-02-04 19:11:57', NULL, NULL, NULL, NULL),
(19, 1, 17, '2022-02-04 17:33:22', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #17, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 22:33:22', '2022-02-04 22:33:22', NULL, NULL, NULL, NULL),
(20, 1, 18, '2022-02-04 17:33:33', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #18, nuestro personal está atento a responder tus mensajes', 0, '2022-02-04 22:33:33', '2022-02-04 22:33:33', NULL, NULL, NULL, NULL),
(21, 1, 19, '2022-02-13 14:23:26', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #19, nuestro personal está atento a responder tus mensajes', 0, '2022-02-13 19:23:26', '2022-02-13 19:23:26', NULL, NULL, NULL, NULL),
(22, 1, 20, '2022-02-14 10:50:57', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #20, nuestro personal está atento a responder tus mensajes', 0, '2022-02-14 15:50:57', '2022-02-14 15:50:57', NULL, NULL, NULL, NULL),
(23, 1, 21, '2022-03-01 11:19:37', 'Bienvenido a tusTareas.com nos complace darte la bienvenida a nuestra plataforma,por medio de esta sala puedes dejar tus comentarios, dudas e inquietudes sobre tu cotización #21, nuestro personal está atento a responder tus mensajes', 0, '2022-03-01 16:19:37', '2022-03-01 16:19:37', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages_admin`
--

CREATE TABLE `messages_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_admin_process` bigint(20) UNSIGNED NOT NULL,
  `ma_date_message` datetime NOT NULL,
  `ma_text_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_state` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `messages_admin`
--

INSERT INTO `messages_admin` (`id`, `id_user`, `id_admin_process`, `ma_date_message`, `ma_text_message`, `ma_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 1, '2022-02-22 08:02:25', '¡Te damos la bienvenida! a tusTareas.com en nombre de la institución, reciban el más cordial saludoQuedamos muy pendientes de cualquier inquietud o comentario…Recuerda que puedes contactarnos en cualquier momento…', 0, '2022-02-22 13:02:25', '2022-02-22 13:02:25', NULL, 1, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_11_27_113309_create_parametrics_table', 1),
(5, '2021_11_29_191725_create_permission_tables', 1),
(6, '2021_11_29_213537_alter_users', 1),
(7, '2021_12_02_192730_create_countries_table', 1),
(8, '2021_12_04_144727_alter_roles', 1),
(9, '2021_12_10_194140_create_coins_table', 1),
(10, '2021_12_12_120603_alter_users_state', 1),
(11, '2021_12_12_130413_create_areas_table', 1),
(12, '2021_12_12_162238_create_subjects_table', 1),
(13, '2021_12_12_162654_create_topics_table', 1),
(14, '2021_12_12_162916_alter_coins_table', 1),
(15, '2021_12_12_174533_alter_parametrics_table', 1),
(16, '2021_12_22_085134_alter_countries_table', 1),
(17, '2021_12_27_174423_create_language_tutors_table', 1),
(18, '2021_12_27_174857_create_tutors_topics_table', 1),
(19, '2021_12_27_174949_create_tutors_systems_table', 1),
(20, '2021_12_27_175108_create_tutors_bank_details_table', 1),
(21, '2021_12_27_185143_create_tutors_services_table', 1),
(22, '2022_01_10_214513_create_bonds_table', 1),
(23, '2022_01_11_184552_alter_table_tutors_bank_details', 1),
(24, '2022_01_14_115926_alter_table_add_observation', 1),
(25, '2022_01_17_120054_alter_table_changed_nullable', 1),
(26, '2022_01_21_172541_create_request_tables', 1),
(27, '2022_01_24_112037_alter_table_request_relation', 1),
(28, '2022_02_01_215516_create_communications_table', 2),
(29, '2022_02_01_221607_create_messages_table', 2),
(30, '2022_02_02_140801_create_payments_table', 2),
(31, '2022_02_03_201442_alter_table_request_quote_tutors', 3),
(32, '2022_02_03_214714_alter_table_request', 4),
(33, '2022_02_03_214715_alter_table_request', 5),
(34, '2022_02_04_134420_alter_table_request_history', 5),
(35, '2022_02_03_214716_alter_table_request', 6),
(36, '2022_02_04_134421_alter_table_request_history', 6),
(37, '2022_02_03_214718_alter_table_request', 7),
(38, '2022_02_04_134423_alter_table_request_history', 7),
(39, '2022_02_04_165132_alter_table_request_private_note', 8),
(40, '2022_02_04_165133_alter_table_request_private_note', 9),
(41, '2022_02_05_145733_alter_table_tutors_bank_details_null_file', 10),
(42, '2022_02_08_201127_alter_table_request_topics', 11),
(43, '2022_02_08_193428_create_change_requests_table', 12),
(44, '2022_02_11_220532_alter_bonds_table', 13),
(45, '2022_02_15_113304_create_wallet_tables', 13),
(46, '2022_02_17_180848_create_work_details_table', 13),
(47, '2022_02_17_200856_create_admin_process_table', 13),
(48, '2022_02_17_201430_create_messages_admin_table', 13),
(49, '2022_02_18_165302_alter_tables_camps_payment', 14),
(50, '2022_02_25_002202_create_table_quotes_bond', 15),
(51, '2022_02_25_002203_table_quotes_bond', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(4, 'App\\User', 2),
(4, 'App\\User', 3),
(6, 'App\\User', 4),
(6, 'App\\User', 5),
(3, 'App\\User', 6),
(3, 'App\\User', 7),
(4, 'App\\User', 8),
(6, 'App\\User', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observations_services`
--

CREATE TABLE `observations_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_service` bigint(20) UNSIGNED NOT NULL,
  `text_observation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametrics`
--

CREATE TABLE `parametrics` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `parametrics`
--

INSERT INTO `parametrics` (`id`, `p_category`, `p_text`, `p_order`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'means_type', 'Publicidad web', 100, NULL, NULL, NULL, 1, NULL, NULL),
(2, 'means_type', 'Llamada de campaña', 200, NULL, NULL, NULL, 1, NULL, NULL),
(3, 'means_type', 'Referido', 300, NULL, NULL, NULL, 1, NULL, NULL),
(4, 'means_type', 'Publicidad Mediatica', 400, NULL, NULL, NULL, 1, NULL, NULL),
(5, 'means_type', 'Facebook', 400, NULL, NULL, NULL, 1, NULL, NULL),
(6, 'means_type', 'Google', 400, NULL, NULL, NULL, 1, NULL, NULL),
(7, 'means_type', 'Instagram', 400, NULL, NULL, NULL, 1, NULL, NULL),
(8, 'means_type', 'Tic Tok', 400, NULL, NULL, NULL, 1, NULL, NULL),
(9, 'means_type', 'Referido', 400, NULL, NULL, NULL, 1, NULL, NULL),
(10, 'means_type', 'Linkedin', 400, NULL, NULL, NULL, 1, NULL, NULL),
(11, 'means_type', 'Aviso Físico', 400, NULL, NULL, NULL, 1, NULL, NULL),
(12, 'means_type', 'Otro', 400, NULL, NULL, NULL, 1, NULL, NULL),
(13, 'type_documents', 'Cédula Ciudadania', 100, NULL, NULL, NULL, 1, NULL, NULL),
(14, 'type_documents', 'Pasaporte', 200, NULL, NULL, NULL, 1, NULL, NULL),
(15, 'type_documents', 'NIT', 300, NULL, NULL, NULL, 1, NULL, NULL),
(16, 'type_documents', 'Cédula Extranjera', 400, NULL, NULL, NULL, 1, NULL, NULL),
(17, 'param_list_banks', 'Banco agrario', 100, NULL, NULL, NULL, 1, NULL, NULL),
(18, 'param_list_banks', 'Av Villas', 100, NULL, NULL, NULL, 1, NULL, NULL),
(19, 'param_list_banks', 'BBVA', 100, NULL, NULL, NULL, 1, NULL, NULL),
(20, 'param_list_banks', 'Banco BCSC', 100, NULL, NULL, NULL, 1, NULL, NULL),
(21, 'param_list_banks', 'Banco Caja Social', 100, NULL, NULL, NULL, 1, NULL, NULL),
(22, 'param_list_banks', 'Banco Citibank', 100, NULL, NULL, NULL, 1, NULL, NULL),
(23, 'param_list_banks', 'Banco Coopcentral', 100, NULL, NULL, NULL, 1, NULL, NULL),
(24, 'param_list_banks', 'Banco Davivienda', 100, NULL, NULL, NULL, 1, NULL, NULL),
(25, 'param_list_banks', 'Banco de Bogotá', 100, NULL, NULL, NULL, 1, NULL, NULL),
(26, 'param_list_banks', 'Banco de la República', 100, NULL, NULL, NULL, 1, NULL, NULL),
(27, 'param_list_banks', 'Banco de Occidente', 100, NULL, NULL, NULL, 1, NULL, NULL),
(28, 'param_list_banks', 'Banco Falabella', 100, NULL, NULL, NULL, 1, NULL, NULL),
(29, 'param_list_banks', 'Banco Finandina', 100, NULL, NULL, NULL, 1, NULL, NULL),
(30, 'param_list_banks', 'Banco GNB Sudameris', 100, NULL, NULL, NULL, 1, NULL, NULL),
(31, 'param_list_banks', 'Banco Itaú corpbanca coalombia S.A', 100, NULL, NULL, NULL, 1, NULL, NULL),
(32, 'param_list_banks', 'Banco Mundo Mujer', 100, NULL, NULL, NULL, 1, NULL, NULL),
(33, 'param_list_banks', 'Banco Pichincha', 100, NULL, NULL, NULL, 1, NULL, NULL),
(34, 'param_list_banks', 'Banco Popular', 100, NULL, NULL, NULL, 1, NULL, NULL),
(35, 'param_list_banks', 'Banco Santander de Negocios Colombia S.A.', 100, NULL, NULL, NULL, 1, NULL, NULL),
(36, 'param_list_banks', 'Banco Serfinanza', 100, NULL, NULL, NULL, 1, NULL, NULL),
(37, 'param_list_banks', 'Bancolombia', 100, NULL, NULL, NULL, 1, NULL, NULL),
(38, 'param_list_banks', 'Bancoomeva', 100, NULL, NULL, NULL, 1, NULL, NULL),
(39, 'param_list_banks', 'Banco JP Morgan Colombia', 100, NULL, NULL, NULL, 1, NULL, NULL),
(40, 'param_list_banks', 'Nequi', 100, NULL, NULL, NULL, 1, NULL, NULL),
(41, 'param_list_banks', 'Daviplata', 100, NULL, NULL, NULL, 1, NULL, NULL),
(42, 'param_list_banks', 'Colpatria', 100, NULL, NULL, NULL, 1, NULL, NULL),
(43, 'param_list_banks', 'Banco Nacional de México (Banamex)', 100, NULL, NULL, NULL, 1, NULL, NULL),
(44, 'param_list_banks', 'Banco Santander (México)', 100, NULL, NULL, NULL, 1, NULL, NULL),
(45, 'param_list_banks', 'HSBC México.', 100, NULL, NULL, NULL, 1, NULL, NULL),
(46, 'param_list_banks', 'BBVA Bancomer.', 100, NULL, NULL, NULL, 1, NULL, NULL),
(47, 'param_list_banks', 'Paypal', 100, NULL, NULL, NULL, 1, NULL, NULL),
(48, 'param_type_acount', 'Ahorros', 100, NULL, NULL, NULL, 1, NULL, NULL),
(49, 'param_type_acount', 'Crédito', 200, NULL, NULL, NULL, 1, NULL, NULL),
(50, 'param_type_acount', 'Vista', 200, NULL, NULL, NULL, 1, NULL, NULL),
(51, 'param_type_acount', 'Debito', 200, NULL, NULL, NULL, 1, NULL, NULL),
(52, 'param_list_languages', 'Ingles', 100, NULL, NULL, NULL, 1, NULL, NULL),
(53, 'param_list_languages', 'Español', 200, NULL, NULL, NULL, 1, NULL, NULL),
(54, 'param_list_languages', 'Alemán', 200, NULL, NULL, NULL, 1, NULL, NULL),
(55, 'param_list_languages', 'Francés', 200, NULL, NULL, NULL, 1, NULL, NULL),
(56, 'param_list_languages', 'Inglés', 200, NULL, NULL, NULL, 1, NULL, NULL),
(57, 'param_list_languages', 'Italiano', 200, NULL, NULL, NULL, 1, NULL, NULL),
(58, 'param_list_languages', 'Mandarín', 200, NULL, NULL, NULL, 1, NULL, NULL),
(59, 'param_list_languages', 'Portugués', 200, NULL, NULL, NULL, 1, NULL, NULL),
(60, 'param_list_systems', 'Excell', 100, NULL, NULL, NULL, 1, NULL, NULL),
(61, 'param_list_systems', 'Word', 200, NULL, NULL, NULL, 1, NULL, NULL),
(62, 'param_list_systems', 'Adobe', 200, NULL, NULL, NULL, 1, NULL, NULL),
(63, 'param_list_systems', 'Arcgis', 200, NULL, NULL, NULL, 1, NULL, NULL),
(64, 'param_list_systems', 'Arena', 200, NULL, NULL, NULL, 1, NULL, NULL),
(65, 'param_list_systems', 'Atlas TI', 200, NULL, NULL, NULL, 1, NULL, NULL),
(66, 'param_list_systems', 'Autocad', 200, NULL, NULL, NULL, 1, NULL, NULL),
(67, 'param_list_systems', 'C++', 200, NULL, NULL, NULL, 1, NULL, NULL),
(68, 'param_list_systems', 'Civil 3d', 200, NULL, NULL, NULL, 1, NULL, NULL),
(69, 'param_list_systems', 'Dialux', 200, NULL, NULL, NULL, 1, NULL, NULL),
(70, 'param_list_systems', 'Diseño grafico editorial', 200, NULL, NULL, NULL, 1, NULL, NULL),
(71, 'param_list_systems', 'Epanet', 200, NULL, NULL, NULL, 1, NULL, NULL),
(72, 'param_list_systems', 'Erdas', 200, NULL, NULL, NULL, 1, NULL, NULL),
(73, 'param_list_systems', 'Ess', 200, NULL, NULL, NULL, 1, NULL, NULL),
(74, 'param_list_systems', 'Evievws', 200, NULL, NULL, NULL, 1, NULL, NULL),
(75, 'param_list_systems', 'Global mapper', 200, NULL, NULL, NULL, 1, NULL, NULL),
(76, 'param_list_systems', 'Visual', 200, NULL, NULL, NULL, 1, NULL, NULL),
(77, 'param_list_systems', 'Statgraphic', 200, NULL, NULL, NULL, 1, NULL, NULL),
(78, 'param_list_systems', 'Global mapper', 200, NULL, NULL, NULL, 1, NULL, NULL),
(79, 'param_list_systems', 'Ilustrator', 200, NULL, NULL, NULL, 1, NULL, NULL),
(80, 'param_list_systems', 'Indesing', 200, NULL, NULL, NULL, 1, NULL, NULL),
(81, 'param_list_systems', 'Latex', 200, NULL, NULL, NULL, 1, NULL, NULL),
(82, 'param_list_systems', 'Lt spice', 200, NULL, NULL, NULL, 1, NULL, NULL),
(83, 'param_list_systems', 'Matlab', 200, NULL, NULL, NULL, 1, NULL, NULL),
(84, 'param_list_systems', 'Multisim', 200, NULL, NULL, NULL, 1, NULL, NULL),
(85, 'param_list_systems', 'Netbeans', 200, NULL, NULL, NULL, 1, NULL, NULL),
(86, 'param_list_systems', 'Ni', 200, NULL, NULL, NULL, 1, NULL, NULL),
(87, 'param_list_systems', 'Octave', 200, NULL, NULL, NULL, 1, NULL, NULL),
(88, 'param_list_systems', 'Orcad', 200, NULL, NULL, NULL, 1, NULL, NULL),
(89, 'param_list_systems', 'Project power bi', 200, NULL, NULL, NULL, 1, NULL, NULL),
(90, 'param_list_systems', 'Promodel', 200, NULL, NULL, NULL, 1, NULL, NULL),
(91, 'param_list_systems', 'Proteus', 200, NULL, NULL, NULL, 1, NULL, NULL),
(92, 'param_list_systems', 'Python', 200, NULL, NULL, NULL, 1, NULL, NULL),
(93, 'param_list_systems', 'Qgis', 200, NULL, NULL, NULL, 1, NULL, NULL),
(94, 'param_list_systems', 'R', 200, NULL, NULL, NULL, 1, NULL, NULL),
(95, 'param_list_systems', 'Solid edgel', 200, NULL, NULL, NULL, 1, NULL, NULL),
(96, 'param_list_systems', 'Solidworks', 200, NULL, NULL, NULL, 1, NULL, NULL),
(97, 'param_list_systems', 'SPSS', 200, NULL, NULL, NULL, 1, NULL, NULL),
(98, 'param_list_systems', 'Stata', 200, NULL, NULL, NULL, 1, NULL, NULL),
(99, 'param_list_services', 'Clase', 100, NULL, NULL, NULL, 1, NULL, NULL),
(100, 'param_list_services', 'Tesis', 200, NULL, NULL, NULL, 1, NULL, NULL),
(101, 'param_list_services', 'Materia virtual', 300, NULL, NULL, NULL, 1, NULL, NULL),
(102, 'param_list_services', 'Trabajo', 400, NULL, NULL, NULL, 1, NULL, NULL),
(103, 'param_list_services', 'Examen', 500, NULL, NULL, NULL, 1, NULL, NULL),
(104, 'param_list_services', 'Servicio profesional', 600, NULL, NULL, NULL, 1, NULL, NULL),
(105, 'param_type_value', 'Porcentaje', 100, NULL, NULL, NULL, 1, NULL, NULL),
(106, 'param_type_value', 'Valor', 200, NULL, NULL, NULL, 1, NULL, NULL),
(107, 'param_type_bonds', 'Bono', 100, NULL, NULL, NULL, 1, NULL, NULL),
(108, 'param_type_bonds', 'Anticipo', 200, NULL, NULL, NULL, 1, NULL, NULL),
(109, 'params_methods_payment', 'Descuento', 100, '2022-02-27 21:47:51', NULL, NULL, 1, NULL, NULL),
(110, 'params_methods_payment', 'Ahorro', 200, '2022-02-27 21:47:51', NULL, NULL, 1, NULL, NULL),
(111, 'params_methods_payment', 'Transferencia', 300, '2022-02-27 21:56:40', NULL, NULL, 1, NULL, NULL),
(112, 'params_methods_payment', 'Efectivo', 400, '2022-02-27 21:56:40', NULL, NULL, 400, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` double(8,2) NOT NULL COMMENT 'valor del pago',
  `trm_assigned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` enum('PARCIAL','TOTAL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'refrencia de pago',
  `observation` text COLLATE utf8mb4_unicode_ci,
  `vaucher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_quote_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `value`, `trm_assigned`, `payment_type`, `payment_reference`, `observation`, `vaucher`, `request_quote_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7303.00, NULL, 'PARCIAL', 'SAB66814', 'Todo bien', NULL, 2, 'ACTIVO', NULL, NULL, NULL, '2022-02-04 01:16:07', '2022-02-08 04:41:25', NULL),
(2, 98006.00, NULL, 'PARCIAL', 'XG67009', 'Todo bien', NULL, 2, 'ACTIVO', NULL, NULL, NULL, '2022-02-04 01:16:07', '2022-02-08 04:41:15', '2022-02-08 04:41:15'),
(3, 55184.00, NULL, 'TOTAL', 'SAB65713', 'todo indica que esta bien', NULL, 3, 'ACTIVO', NULL, NULL, NULL, '2022-02-04 01:16:07', '2022-02-04 01:16:07', NULL),
(4, 50000.00, NULL, 'PARCIAL', 'YFG1245', 'pago por  nequi', 'factura de pc.pdf', 1, 'ACTIVO', NULL, NULL, NULL, '2022-02-06 21:21:28', '2022-02-07 23:27:47', '2022-02-07 23:27:47'),
(5, 30000.00, NULL, 'PARCIAL', 'uitutyu', 'prueba', 'WIN_20210509_14_23_44_Pro.jpg', 1, 'ACTIVO', NULL, NULL, NULL, '2022-02-07 23:31:22', '2022-02-07 23:31:44', NULL),
(6, 57023.00, NULL, 'TOTAL', 'tytu', 'listo', NULL, 1, 'ACTIVO', NULL, NULL, NULL, '2022-02-07 23:32:38', '2022-02-17 22:52:03', '2022-02-17 22:52:03'),
(7, 5000.00, NULL, 'PARCIAL', 'ufhjb', 'prueba', NULL, 2, 'ACTIVO', NULL, NULL, NULL, '2022-02-08 04:41:46', '2022-02-08 04:41:46', NULL),
(8, 12500.00, NULL, 'PARCIAL', 'edffre456', 'test', NULL, 2, 'ACTIVO', NULL, NULL, NULL, '2022-02-08 04:42:23', '2022-02-08 04:42:23', NULL),
(9, 29696.00, NULL, 'TOTAL', '5475643', 'prueba final', NULL, 2, 'ACTIVO', NULL, NULL, NULL, '2022-02-08 04:43:11', '2022-02-08 04:43:11', NULL),
(10, 9294.00, NULL, 'TOTAL', 'nequi', NULL, NULL, 3, 'ACTIVO', NULL, NULL, NULL, '2022-02-14 22:06:22', '2022-02-17 22:46:43', '2022-02-17 22:46:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(2, 'Administrador_clientes_ver', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(3, 'Administrador_clientes_crear', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(4, 'Administrador_clientes_editar', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(5, 'Administrador_clientes_activar', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(6, 'Administrador_clientes_inactivar', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(7, 'Administrador_tutores_ver', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(8, 'Administrador_tutores_crear', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(9, 'Administrador_tutores_editar', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(10, 'Administrador_tutores_activar', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(11, 'Administrador_tutores_inactivar', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(12, 'Administrador_empleados_ver', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(13, 'Administrador_empleados_crear', 'web', '2022-02-02 04:15:34', '2022-02-02 04:15:34'),
(14, 'Administrador_empleados_editar', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(15, 'Administrador_empleados_eliminar', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(16, 'Administrador_roles_ver', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(17, 'Administrador_roles_crear', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(18, 'Administrador_roles_editar', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(19, 'Administrador_roles_eliminar', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(20, 'Administrador_paises_ver', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(21, 'Administrador_paises_crear', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(22, 'Administrador_paises_editar', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(23, 'Administrador_paises_eliminar', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(24, 'Administrador_parametricas_ver', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(25, 'Administrador_parametricas_crear', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(26, 'Administrador_parametricas_editar', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(27, 'Administrador_parametricas_eliminar', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(28, 'Administrador_monedas_ver', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(29, 'Administrador_monedas_crear', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(30, 'Administrador_monedas_editar', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(31, 'Administrador_monedas_eliminar', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(32, 'Administrador_monedas_inactivar', 'web', '2022-02-02 04:15:35', '2022-02-02 04:15:35'),
(33, 'Administrador_monedas_activar', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(34, 'Administrador_areas_ver', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(35, 'Administrador_areas_crear', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(36, 'Administrador_areas_editar', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(37, 'Administrador_areas_eliminar', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(38, 'Preregistro', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(39, 'Preregistro_historial_ver', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(40, 'Preregistro_listado_ver', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(41, 'Perfil', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(42, 'Perfil_datosBasicos_ver', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(43, 'Perfil_bonos_ver', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(44, 'Comunicaciones', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(45, 'Comunicaciones_bandeja', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(46, 'Cotizaciones', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(47, 'Cotizaciones_pendientes_ver', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(48, 'Cotizaciones_historial_ver', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(49, 'Cotizaciones_misCotizaciones_ver', 'web', '2022-02-02 04:15:36', '2022-02-02 04:15:36'),
(50, 'Billetera_virtual', 'web', '2022-02-02 04:15:37', '2022-02-02 04:15:37'),
(51, 'Billetera_virtual_miBilletera_ver', 'web', '2022-02-02 04:15:37', '2022-02-02 04:15:37'),
(52, 'Billetera_virtual_HistoriarPagos_ver', 'web', '2022-02-02 04:15:37', '2022-02-02 04:15:37'),
(53, 'Pagos', 'web', '2022-02-02 04:15:37', '2022-02-02 04:15:37'),
(54, 'Pagos_HistorialPagosClientes_ver', 'web', '2022-02-02 04:15:37', '2022-02-02 04:15:37'),
(55, 'Reportes', 'web', '2022-02-02 04:15:37', '2022-02-02 04:15:37'),
(56, 'Reportes_Listado_ver', 'web', '2022-02-02 04:15:37', '2022-02-02 04:15:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_delivery` date NOT NULL COMMENT 'fecha de entrega',
  `observation` text COLLATE utf8mb4_unicode_ci,
  `type_service_id` int(10) UNSIGNED NOT NULL COMMENT 'tipo de servicio',
  `request_state_id` bigint(20) UNSIGNED NOT NULL COMMENT 'estado de solicitud',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `note_private_comercial` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `requests`
--

INSERT INTO `requests` (`id`, `date_delivery`, `observation`, `type_service_id`, `request_state_id`, `user_id`, `note_private_comercial`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-03-11', NULL, 99, 1, 2, NULL, 2, 2, 2, '2022-02-02 14:00:17', '2022-02-05 01:29:51', '2022-02-05 01:29:51'),
(2, '2022-03-11', 'Observaciones de prueba', 99, 1, 2, NULL, 2, NULL, 2, '2022-02-02 14:01:15', '2022-02-05 01:29:55', '2022-02-05 01:29:55'),
(3, '2022-04-28', 'Solicitud de prueba', 99, 2, 2, 'texto', 1, 1, 1, '2022-02-03 23:20:38', '2022-02-27 20:48:13', '2022-02-27 20:48:13'),
(4, '2022-03-03', 'prueba', 103, 3, 2, NULL, 2, 1, NULL, '2022-02-03 23:27:32', '2022-02-27 01:08:14', NULL),
(5, '2022-02-03', 'todo indica que esta bien', 100, 1, 4, NULL, NULL, NULL, NULL, '2022-02-04 01:00:48', '2022-02-04 01:00:48', NULL),
(6, '2022-02-03', 'por favor evaluar presupuesto', 102, 1, 5, NULL, NULL, NULL, NULL, '2022-02-04 01:00:48', '2022-02-04 01:00:48', NULL),
(7, '2022-02-03', 'todo indica que esta bien', 102, 1, 4, NULL, NULL, NULL, NULL, '2022-02-04 01:00:48', '2022-02-04 01:00:48', NULL),
(8, '2022-02-03', 'por favor evaluar presupuesto', 101, 1, 5, NULL, NULL, NULL, NULL, '2022-02-04 01:16:06', '2022-02-04 01:16:06', NULL),
(9, '2022-02-03', 'Todo bien', 100, 1, 7, NULL, NULL, NULL, NULL, '2022-02-04 01:16:06', '2022-02-04 01:16:06', NULL),
(10, '2022-02-03', 'Todo bien', 104, 1, 7, NULL, NULL, NULL, NULL, '2022-02-04 01:16:06', '2022-02-04 01:16:06', NULL),
(11, '2022-02-24', 'prueba', 102, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 01:28:31', '2022-02-04 01:28:31', NULL),
(12, '2022-03-10', 'prueba de guardado', 99, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 18:28:30', '2022-02-04 18:28:30', NULL),
(13, '2022-02-24', 'pruevaa', 103, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 18:30:23', '2022-02-04 18:30:23', NULL),
(14, '2022-02-24', 'pruevaa', 103, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 18:30:51', '2022-02-04 18:30:51', NULL),
(15, '2022-02-24', 'pruevaa', 103, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 18:31:20', '2022-02-04 18:31:20', NULL),
(16, '2022-02-24', 'pruevaa', 103, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 18:31:35', '2022-02-04 18:31:35', NULL),
(17, '2022-02-17', NULL, 100, 1, 2, NULL, 2, 2, NULL, '2022-02-04 18:32:39', '2022-02-04 19:54:04', NULL),
(18, '2022-02-17', NULL, 100, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 18:33:58', '2022-02-04 18:33:58', NULL),
(19, '2022-02-17', NULL, 100, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 18:35:38', '2022-02-04 18:35:38', NULL),
(20, '2022-02-18', 'prueba', 99, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 18:37:00', '2022-02-04 18:37:00', NULL),
(21, '2022-02-18', NULL, 99, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 18:38:42', '2022-02-04 18:38:42', NULL),
(22, '2022-02-18', NULL, 99, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 18:39:00', '2022-02-04 18:39:00', NULL),
(23, '2022-03-09', NULL, 99, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 18:40:19', '2022-02-04 18:40:19', NULL),
(24, '2022-03-10', 'prueba', 99, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 19:11:36', '2022-02-04 19:11:36', NULL),
(25, '2022-03-10', 'prueba', 99, 1, 2, NULL, 2, NULL, NULL, '2022-02-04 19:11:36', '2022-02-04 19:11:36', NULL),
(26, '2022-03-31', 'prueba de edición', 104, 1, 2, NULL, 2, 2, NULL, '2022-02-04 19:11:57', '2022-02-04 19:40:19', NULL),
(27, '2022-02-23', NULL, 99, 1, 2, 'Toca preguntar mas información', 1, NULL, NULL, '2022-02-04 22:33:22', '2022-02-04 22:33:22', NULL),
(28, '2022-02-10', 'necesito relacionar mas cosas pero no se como', 99, 2, 2, NULL, 2, 1, NULL, '2022-02-04 22:33:33', '2022-02-04 23:28:24', NULL),
(29, '2022-05-18', 'prueba de solicitud', 99, 3, 2, NULL, 2, 1, NULL, '2022-02-13 19:23:25', '2022-03-02 01:21:18', NULL),
(30, '2022-02-25', NULL, 99, 1, 2, NULL, 2, NULL, NULL, '2022-02-14 15:50:57', '2022-02-14 15:50:57', NULL),
(31, '2022-04-01', 'Favor Cotizar', 99, 2, 2, NULL, 2, 1, NULL, '2022-03-01 16:19:36', '2022-03-01 16:21:11', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_files`
--

CREATE TABLE `request_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `request_files`
--

INSERT INTO `request_files` (`id`, `file`, `request_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Certificado(1).pdf', 1, 'ACTIVO', 2, NULL, 1, '2022-02-02 14:00:17', '2022-02-04 21:37:30', '2022-02-04 21:37:30'),
(2, 'Certificado(1).pdf', 2, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:01:15', '2022-02-02 14:01:15', NULL),
(3, '09-1144152967.pdf', 3, 'ACTIVO', 2, NULL, NULL, '2022-02-03 23:20:39', '2022-02-03 23:20:39', NULL),
(4, '30000025093387.pdf', 4, 'ACTIVO', 2, NULL, NULL, '2022-02-03 23:27:33', '2022-02-03 23:27:33', NULL),
(5, 'FE_1003771__0__48.pdf', 11, 'ACTIVO', 2, NULL, NULL, '2022-02-04 01:28:31', '2022-02-04 01:28:31', NULL),
(6, 'FE_1003771__0__48_.pdf', 1, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:19:43', '2022-02-04 18:19:43', NULL),
(7, 'FE_1003771__0__48_.pdf', 12, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:28:31', '2022-02-04 18:28:31', NULL),
(8, 'FE_1003771__0__48.pdf', 26, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:37:13', '2022-02-04 19:37:13', '2022-02-04 19:02:41'),
(9, 'Proformas Edward Mauricio Arevalo 2701 pdf.pdf', 26, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:37:14', '2022-02-04 19:37:14', '2022-02-04 19:02:41'),
(10, 'Certificado(1).pdf', 26, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:40:21', '2022-02-04 19:40:21', '2022-02-04 19:02:41'),
(11, 'FE_1003771__0__48.pdf', 17, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:54:04', '2022-02-04 19:54:05', '2022-02-04 20:02:40'),
(12, '30000025093387.pdf', 17, 'ACTIVO', 2, NULL, 2, '2022-02-04 20:16:40', '2022-02-04 21:39:22', '2022-02-04 21:39:22'),
(13, 'FE_1003771__0__48.pdf', 17, 'ACTIVO', 2, NULL, NULL, '2022-02-04 20:42:42', '2022-02-04 20:42:42', NULL),
(14, 'WIN_20210509_14_23_44_Pro.jpg', 29, 'ACTIVO', 2, NULL, NULL, '2022-02-13 19:23:26', '2022-02-13 19:23:26', NULL),
(15, 'invoice.pdf', 31, 'ACTIVO', 2, NULL, NULL, '2022-03-01 16:19:38', '2022-03-01 16:19:38', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_history`
--

CREATE TABLE `request_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` datetime NOT NULL COMMENT 'fecha de inicio',
  `end_date` datetime DEFAULT NULL COMMENT 'fecha fin',
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `request_state_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `request_history`
--

INSERT INTO `request_history` (`id`, `start_date`, `end_date`, `request_id`, `request_state_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-02-04 00:00:00', '2022-02-08 00:00:00', 3, 1, 'ACTIVO', 2, 1, NULL, '2022-02-04 19:11:36', '2022-02-09 01:31:04', NULL),
(2, '2022-02-04 00:00:00', '2022-02-09 00:00:00', 4, 1, 'ACTIVO', 2, 1, NULL, '2022-02-04 19:11:36', '2022-02-09 15:55:58', NULL),
(3, '2022-02-04 00:00:00', NULL, 26, 1, 'ACTIVO', 2, NULL, NULL, '2022-02-04 19:11:57', '2022-02-04 19:11:57', NULL),
(4, '2022-02-04 00:00:00', NULL, 27, 1, 'ACTIVO', 1, NULL, NULL, '2022-02-04 22:33:22', '2022-02-04 22:33:22', NULL),
(5, '2022-02-04 00:00:00', '2022-02-04 00:00:00', 28, 1, 'ACTIVO', 2, 1, NULL, '2022-02-04 22:33:33', '2022-02-04 23:28:23', NULL),
(6, '2022-02-04 00:00:00', NULL, 28, 2, 'ACTIVO', 1, NULL, NULL, '2022-02-04 23:28:24', '2022-02-04 23:28:24', NULL),
(7, '2022-02-08 00:00:00', NULL, 3, 2, 'ACTIVO', 1, NULL, NULL, '2022-02-09 01:31:04', '2022-02-09 01:31:04', NULL),
(8, '2022-02-09 00:00:00', '2022-02-26 00:00:00', 4, 2, 'ACTIVO', 1, 1, NULL, '2022-02-09 15:55:58', '2022-02-27 01:09:01', NULL),
(9, '2022-02-13 00:00:00', '2022-02-13 00:00:00', 29, 1, 'ACTIVO', 2, 1, NULL, '2022-02-13 19:23:26', '2022-02-13 20:24:11', NULL),
(10, '2022-02-13 00:00:00', '2022-03-01 00:00:00', 29, 2, 'ACTIVO', 1, 1, NULL, '2022-02-13 20:24:11', '2022-03-02 01:21:17', NULL),
(11, '2022-02-14 00:00:00', NULL, 30, 1, 'ACTIVO', 2, NULL, NULL, '2022-02-14 15:50:57', '2022-02-14 15:50:57', NULL),
(12, '2022-02-26 00:00:00', NULL, 4, 3, 'ACTIVO', 1, NULL, NULL, '2022-02-27 01:08:14', '2022-02-27 01:08:14', NULL),
(13, '2022-02-26 00:00:00', NULL, 4, 3, 'ACTIVO', 1, NULL, NULL, '2022-02-27 01:09:02', '2022-02-27 01:09:02', NULL),
(14, '2022-02-28 00:00:00', '2022-03-01 00:00:00', 29, 3, 'ACTIVO', 1, 1, NULL, '2022-03-01 02:40:45', '2022-03-01 16:41:11', NULL),
(15, '2022-02-28 00:00:00', NULL, 29, 3, 'ACTIVO', 1, NULL, NULL, '2022-03-01 02:42:28', '2022-03-01 02:42:28', NULL),
(16, '2022-03-01 00:00:00', NULL, 29, 2, 'ACTIVO', 1, NULL, NULL, '2022-03-01 05:49:15', '2022-03-01 05:49:15', NULL),
(17, '2022-03-01 00:00:00', '2022-03-01 00:00:00', 31, 1, 'ACTIVO', 2, 1, NULL, '2022-03-01 16:19:37', '2022-03-01 16:21:11', NULL),
(18, '2022-03-01 00:00:00', NULL, 31, 2, 'ACTIVO', 1, NULL, NULL, '2022-03-01 16:21:11', '2022-03-01 16:21:11', NULL),
(19, '2022-03-01 00:00:00', NULL, 29, 3, 'ACTIVO', 1, NULL, NULL, '2022-03-01 16:33:54', '2022-03-01 16:33:54', NULL),
(20, '2022-03-01 00:00:00', NULL, 29, 2, 'ACTIVO', 1, NULL, NULL, '2022-03-01 16:41:11', '2022-03-01 16:41:11', NULL),
(21, '2022-03-01 00:00:00', NULL, 29, 3, 'ACTIVO', 1, NULL, NULL, '2022-03-02 01:21:18', '2022-03-02 01:21:18', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_languages`
--

CREATE TABLE `request_languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL COMMENT 'tipo de lenguaje',
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `request_languages`
--

INSERT INTO `request_languages` (`id`, `request_id`, `language_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 57, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:00:17', '2022-02-02 14:00:17', NULL),
(2, 2, 57, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:01:15', '2022-02-02 14:01:15', NULL),
(3, 3, 56, 'ACTIVO', 2, NULL, 1, '2022-02-03 23:20:38', '2022-02-03 23:20:38', '2022-02-09 01:02:10'),
(4, 4, 54, 'ACTIVO', 2, NULL, 1, '2022-02-03 23:27:33', '2022-02-03 23:27:33', '2022-02-09 15:02:37'),
(5, 11, 54, 'ACTIVO', 2, NULL, NULL, '2022-02-04 01:28:31', '2022-02-04 01:28:31', NULL),
(6, 1, 57, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:19:42', '2022-02-04 18:19:42', NULL),
(7, 1, 54, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:19:43', '2022-02-04 18:19:43', NULL),
(8, 1, 57, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:22:32', '2022-02-04 18:22:32', NULL),
(9, 1, 54, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:22:32', '2022-02-04 18:22:32', NULL),
(10, 1, 57, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:58', '2022-02-04 18:23:58', NULL),
(11, 1, 57, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(12, 1, 54, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(13, 1, 57, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(14, 1, 54, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(15, 12, 54, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:28:30', '2022-02-04 18:28:30', NULL),
(16, 16, 52, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:31:35', '2022-02-04 18:31:35', NULL),
(17, 26, 54, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:37:13', '2022-02-04 19:37:13', '2022-02-04 19:02:40'),
(18, 26, 57, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:40:20', '2022-02-04 19:40:20', '2022-02-04 19:02:41'),
(19, 26, 59, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:40:20', '2022-02-04 19:40:20', '2022-02-04 19:02:41'),
(20, 26, 57, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:45:47', '2022-02-04 19:45:47', '2022-02-04 19:02:41'),
(21, 26, 59, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:45:47', '2022-02-04 19:45:47', '2022-02-04 19:02:41'),
(22, 26, 57, 'ACTIVO', 2, NULL, NULL, '2022-02-04 19:46:41', '2022-02-04 19:46:41', NULL),
(23, 26, 59, 'ACTIVO', 2, NULL, NULL, '2022-02-04 19:46:42', '2022-02-04 19:46:42', NULL),
(24, 3, 56, 'ACTIVO', 1, NULL, 1, '2022-02-09 00:47:43', '2022-02-09 00:47:43', '2022-02-09 01:02:10'),
(25, 3, 56, 'ACTIVO', 1, NULL, 1, '2022-02-09 00:53:33', '2022-02-09 00:53:33', '2022-02-09 01:02:10'),
(26, 3, 56, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:02:43', '2022-02-09 01:02:43', '2022-02-09 01:02:10'),
(27, 3, 56, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:04:55', '2022-02-09 01:04:55', '2022-02-09 01:02:11'),
(28, 3, 56, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:05:27', '2022-02-09 01:05:27', '2022-02-09 01:02:11'),
(29, 3, 56, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:25:54', '2022-02-09 01:25:54', '2022-02-09 01:02:11'),
(30, 3, 56, 'ACTIVO', 1, NULL, NULL, '2022-02-09 01:26:11', '2022-02-09 01:26:11', NULL),
(31, 4, 54, 'ACTIVO', 1, NULL, NULL, '2022-02-09 15:53:38', '2022-02-09 15:53:38', NULL),
(32, 30, 52, 'ACTIVO', 2, NULL, NULL, '2022-02-14 15:50:58', '2022-02-14 15:50:58', NULL),
(33, 31, 56, 'ACTIVO', 2, NULL, 1, '2022-03-01 16:19:37', '2022-03-01 16:19:37', '2022-03-01 16:03:01'),
(34, 31, 56, 'ACTIVO', 1, NULL, NULL, '2022-03-01 16:21:01', '2022-03-01 16:21:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_questions`
--

CREATE TABLE `request_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_type` enum('ABIERTA','CERRADA') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'tipo de pregunta',
  `type_service_id` int(10) UNSIGNED NOT NULL COMMENT 'tipo de servicio',
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `request_questions`
--

INSERT INTO `request_questions` (`id`, `question`, `question_type`, `type_service_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Parámetros o requisitos del trabajo o tarea', 'ABIERTA', 102, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL),
(2, 'Fecha para cuándo lo necesitas?', 'ABIERTA', 102, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL),
(3, 'Temas que te van a evaluar?', 'ABIERTA', 103, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:11', '2022-02-02 04:01:11', NULL),
(4, 'Fecha para cuándo tendrás el examen y hora?', 'ABIERTA', 103, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:11', '2022-02-02 04:01:11', NULL),
(5, 'Duración del examen, cuestionario, prueba, test, quiz, control o seguimiento', 'ABIERTA', 103, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:11', '2022-02-02 04:01:11', NULL),
(6, 'El anteproyecto o propuesta de investigación que te haya aprobado la universidad o institución o el tema que deseas investigar', 'ABIERTA', 100, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:11', '2022-02-02 04:01:11', NULL),
(7, 'Nombre de la carrera.?', 'ABIERTA', 100, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:11', '2022-02-02 04:01:11', NULL),
(8, 'Los lineamientos de la universidad referentes a este tipo de trabajo, como partes o cantidad de hojas.', 'ABIERTA', 100, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:11', '2022-02-02 04:01:11', NULL),
(9, 'El cronograma de avances y fecha final de entrega', 'ABIERTA', 100, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:11', '2022-02-02 04:01:11', NULL),
(10, 'Nombre de la materia que requieres?', 'ABIERTA', 101, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:11', '2022-02-02 04:01:11', NULL),
(11, 'Fecha de inicio y terminación del curso, o si tienes algún cronograma en específico.', 'ABIERTA', 101, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:11', '2022-02-02 04:01:11', NULL),
(12, 'Cantidad de actividades?', 'ABIERTA', 101, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:11', '2022-02-02 04:01:11', NULL),
(13, 'Si tienes el link para acceder a la plataforma o si cuentas con el contenido del curso', 'ABIERTA', 101, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:11', '2022-02-02 04:01:11', NULL),
(14, 'Temas que requieres para la explicación?', 'ABIERTA', 99, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:11', '2022-02-02 04:01:11', NULL),
(15, 'Fecha para cuándo requieres la clase o asesoría y hora?', 'ABIERTA', 99, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:12', '2022-02-02 04:01:12', NULL),
(16, 'Duración de la clase, cantidad de personas que asistirían', 'ABIERTA', 99, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:12', '2022-02-02 04:01:12', NULL),
(17, 'Tipo de servicio profesional', 'ABIERTA', 104, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:12', '2022-02-02 04:01:12', NULL),
(18, 'Fecha para cuándo requieres la clase?', 'ABIERTA', 104, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:12', '2022-02-02 04:01:12', NULL),
(19, 'Especificaciones del servicio?', 'ABIERTA', 104, 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:12', '2022-02-02 04:01:12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_quotes`
--

CREATE TABLE `request_quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` double NOT NULL COMMENT 'valor de la cotización',
  `value_utility` double(10,2) NOT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `private_note` text COLLATE utf8mb4_unicode_ci,
  `request_quote_tutor_id` bigint(20) UNSIGNED NOT NULL,
  `utility_type_id` int(10) UNSIGNED NOT NULL COMMENT 'tipo de utilidad',
  `date_quote` date DEFAULT NULL,
  `date_validate` date DEFAULT NULL,
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `trm_assigned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `request_quotes`
--

INSERT INTO `request_quotes` (`id`, `value`, `value_utility`, `observation`, `private_note`, `request_quote_tutor_id`, `utility_type_id`, `date_quote`, `date_validate`, `status`, `trm_assigned`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 87023, 16686.00, 'Todo bien', 'por favor evaluar presupuesto', 3, 106, NULL, NULL, 'ACTIVO', NULL, NULL, NULL, NULL, '2022-02-04 01:16:06', '2022-02-04 01:16:06', NULL),
(2, 54499, 12495.00, 'por favor evaluar presupuesto', 'Todo bien', 3, 106, NULL, NULL, 'ACTIVO', NULL, NULL, NULL, NULL, '2022-02-04 01:16:06', '2022-02-04 01:16:06', NULL),
(3, 64478, 11974.00, 'Todo bien', 'todo indica que esta bien', 1, 106, NULL, NULL, 'ACTIVO', NULL, NULL, NULL, NULL, '2022-02-04 01:16:06', '2022-02-04 01:16:06', NULL),
(138, 16637.84, 80.00, 'observaciones', 'texto', 4, 105, '2022-02-26', '2022-02-27', 'ACTIVO', '185.00', 1, NULL, NULL, '2022-02-27 00:13:28', '2022-02-27 00:13:28', NULL),
(139, 1530229.05, 50.00, 'De prueba', 'nota interna', 3, 105, '2022-02-26', '2022-02-27', 'ACTIVO', '185.00', 1, NULL, NULL, '2022-02-27 01:08:13', '2022-02-27 01:08:13', NULL),
(141, 4060, 85.00, 'texto', 'Procesos', 5, 105, '2022-02-28', '2022-03-01', 'ACTIVO', '185.00', 1, NULL, 1, '2022-03-01 02:40:44', '2022-03-01 05:54:28', '2022-03-01 05:54:28'),
(143, 3197.3, 50.00, 'Cotización formal unica', NULL, 5, 105, '2022-03-01', '2022-03-02', 'ACTIVO', '185.00', 1, NULL, 1, '2022-03-01 16:33:53', '2022-03-01 16:41:11', '2022-03-01 16:41:11'),
(144, 3936.76, 80.00, 'obs cargadas', 'texto pata tutores', 5, 105, '2022-03-01', '2022-03-02', 'ACTIVO', '185.00', 1, NULL, NULL, '2022-03-02 01:21:15', '2022-03-02 01:21:15', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_quote_tutors`
--

CREATE TABLE `request_quote_tutors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` double NOT NULL COMMENT 'valor de la cotización del tutor',
  `observation` text COLLATE utf8mb4_unicode_ci,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `trm_assigned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `application_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `request_quote_tutors`
--

INSERT INTO `request_quote_tutors` (`id`, `value`, `observation`, `request_id`, `user_id`, `status`, `trm_assigned`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`, `application_date`) VALUES
(1, 35580, 'todo indica que esta bien', 7, 3, 'ACTIVO', NULL, NULL, NULL, NULL, '2022-02-04 01:16:06', '2022-02-04 01:16:06', NULL, '2022-02-03'),
(2, 38585, 'todo indica que esta bien', 2, 5, 'ACTIVO', NULL, NULL, NULL, NULL, '2022-02-04 01:16:06', '2022-02-04 01:16:06', NULL, '2022-02-03'),
(3, 1133503, 'todo indica que esta bien', 4, 3, 'ACTIVO', NULL, NULL, NULL, NULL, '2022-02-04 01:16:06', '2022-02-04 01:16:06', NULL, '2022-02-03'),
(4, 500, 'Con mas de 8 años de experiencia en el tema', 3, 4, 'ACTIVO', '3800.00', 4, 4, NULL, '2022-02-09 04:54:11', '2022-02-22 02:02:11', NULL, '2022-04-28'),
(5, 120, 'experiencia', 29, 4, 'ACTIVO', '3800.00', 4, 4, NULL, '2022-02-21 20:55:45', '2022-02-22 04:04:18', NULL, '2022-05-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_responses`
--

CREATE TABLE `request_responses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `response` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'respuesta',
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `request_question_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `request_responses`
--

INSERT INTO `request_responses` (`id`, `response`, `request_id`, `request_question_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'respuesta 1', 1, 14, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:00:17', '2022-02-02 14:00:17', NULL),
(2, 'respuesta 7', 1, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:00:17', '2022-02-02 14:00:17', NULL),
(3, 'respuesta 8', 1, 16, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:00:17', '2022-02-02 14:00:17', NULL),
(4, 'respuesta 1', 2, 14, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:01:15', '2022-02-02 14:01:15', NULL),
(5, 'respuesta 7', 2, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:01:15', '2022-02-02 14:01:15', NULL),
(6, 'respuesta 8', 2, 16, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:01:15', '2022-02-02 14:01:15', NULL),
(7, 'respuesta 1', 3, 14, 'ACTIVO', 2, NULL, 1, '2022-02-03 23:20:38', '2022-02-03 23:20:38', NULL),
(8, 'respuesta 2', 3, 15, 'ACTIVO', 2, NULL, 1, '2022-02-03 23:20:38', '2022-02-03 23:20:38', '2022-02-09 01:02:09'),
(9, 'respuesta 7', 3, 16, 'ACTIVO', 2, NULL, 1, '2022-02-03 23:20:38', '2022-02-03 23:20:38', '2022-02-09 01:02:09'),
(10, 'respuesta 1', 4, 14, 'ACTIVO', 2, NULL, 1, '2022-02-03 23:27:33', '2022-02-03 23:27:33', '2022-02-09 15:02:37'),
(11, 'respuesta 7', 4, 15, 'ACTIVO', 2, NULL, 1, '2022-02-03 23:27:33', '2022-02-03 23:27:33', '2022-02-09 15:02:37'),
(12, 'respuesta 1', 4, 16, 'ACTIVO', 2, NULL, 1, '2022-02-03 23:27:33', '2022-02-03 23:27:33', '2022-02-09 15:02:37'),
(13, 'respuesta 1', 11, 1, 'ACTIVO', 2, NULL, NULL, '2022-02-04 01:28:31', '2022-02-04 01:28:31', NULL),
(14, 'respuesta 7', 11, 2, 'ACTIVO', 2, NULL, NULL, '2022-02-04 01:28:31', '2022-02-04 01:28:31', NULL),
(15, 'respuesta 1 editado', 1, 14, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:19:42', '2022-02-04 18:19:42', NULL),
(16, 'respuesta 7 edwitado', 1, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:19:42', '2022-02-04 18:19:42', NULL),
(17, 'respuesta 8 editado', 1, 16, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:19:42', '2022-02-04 18:19:42', NULL),
(18, 'respuesta 1 editado', 1, 14, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:22:32', '2022-02-04 18:22:32', NULL),
(19, 'respuesta 8 editado', 1, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:22:32', '2022-02-04 18:22:32', NULL),
(20, 'respuesta 7 editado', 1, 16, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:22:32', '2022-02-04 18:22:32', NULL),
(21, 'respuesta 1 editado', 1, 14, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:58', '2022-02-04 18:23:58', NULL),
(22, 'respuesta 7 editado', 1, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:58', '2022-02-04 18:23:58', NULL),
(23, 'respuesta 8 editado', 1, 16, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:58', '2022-02-04 18:23:58', NULL),
(24, 'respuesta 1 editado', 12, 14, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:28:30', '2022-02-04 18:28:30', NULL),
(25, 'respuesta 7 editado', 12, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:28:30', '2022-02-04 18:28:30', NULL),
(26, 'respuesta 16 editado', 12, 16, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:28:30', '2022-02-04 18:28:30', NULL),
(27, 'respuesta 7', 16, 3, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:31:35', '2022-02-04 18:31:35', NULL),
(28, 'respuesta 1', 16, 4, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:31:35', '2022-02-04 18:31:35', NULL),
(29, 'respuesta 1 editado', 16, 5, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:31:35', '2022-02-04 18:31:35', NULL),
(30, 'respuesta 7', 19, 6, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:35:38', '2022-02-04 18:35:38', NULL),
(31, 'respuesta 1', 19, 7, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:35:38', '2022-02-04 18:35:38', NULL),
(32, 'respuesta 1', 19, 8, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:35:38', '2022-02-04 18:35:38', NULL),
(33, 'respuesta 1 editado', 19, 9, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:35:38', '2022-02-04 18:35:38', NULL),
(34, 'respuesta 1 editado', 20, 14, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:37:00', '2022-02-04 18:37:00', NULL),
(35, 'respuesta 1', 20, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:37:00', '2022-02-04 18:37:00', NULL),
(36, 'respuesta 7', 20, 16, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:37:00', '2022-02-04 18:37:00', NULL),
(37, 'respuesta 1', 22, 14, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:39:00', '2022-02-04 18:39:00', NULL),
(38, 'respuesta 1 editado', 22, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:39:00', '2022-02-04 18:39:00', NULL),
(39, 'respuesta 7', 22, 16, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:39:00', '2022-02-04 18:39:00', NULL),
(40, 'respuesta 1', 26, 14, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:11:57', '2022-02-04 19:11:57', '2022-02-04 19:02:40'),
(41, 'respuesta 1 editado', 26, 15, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:11:57', '2022-02-04 19:11:57', '2022-02-04 19:02:40'),
(42, 'respuesta 7', 26, 16, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:11:57', '2022-02-04 19:11:57', '2022-02-04 19:02:40'),
(43, 'respuesta  editado 2', 26, 14, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:37:12', '2022-02-04 19:37:12', '2022-02-04 19:02:40'),
(44, 'respuesta editado 1', 26, 15, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:37:13', '2022-02-04 19:37:13', '2022-02-04 19:02:40'),
(45, 'respuesta editado 3', 26, 16, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:37:13', '2022-02-04 19:37:13', '2022-02-04 19:02:40'),
(46, 'resp 1', 26, 17, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:40:20', '2022-02-04 19:40:20', '2022-02-04 19:02:40'),
(47, 'resp 2', 26, 18, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:40:20', '2022-02-04 19:40:20', '2022-02-04 19:02:40'),
(48, 'resp 3', 26, 19, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:40:20', '2022-02-04 19:40:20', '2022-02-04 19:02:40'),
(49, 'resp 1', 26, 17, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:45:47', '2022-02-04 19:45:47', '2022-02-04 19:02:40'),
(50, 'resp 2', 26, 18, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:45:47', '2022-02-04 19:45:47', '2022-02-04 19:02:40'),
(51, 'resp 3', 26, 19, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:45:47', '2022-02-04 19:45:47', '2022-02-04 19:02:40'),
(52, 'resp 1', 26, 17, 'ACTIVO', 2, NULL, NULL, '2022-02-04 19:46:41', '2022-02-04 19:46:41', NULL),
(53, 'resp 2', 26, 18, 'ACTIVO', 2, NULL, NULL, '2022-02-04 19:46:41', '2022-02-04 19:46:41', NULL),
(54, 'resp 3', 26, 19, 'ACTIVO', 2, NULL, NULL, '2022-02-04 19:46:41', '2022-02-04 19:46:41', NULL),
(55, 'preg 1', 27, 14, 'ACTIVO', 1, NULL, NULL, '2022-02-04 22:33:22', '2022-02-04 22:33:22', NULL),
(56, 'preg 2', 27, 15, 'ACTIVO', 1, NULL, NULL, '2022-02-04 22:33:22', '2022-02-04 22:33:22', NULL),
(57, 'preg 3', 27, 16, 'ACTIVO', 1, NULL, NULL, '2022-02-04 22:33:22', '2022-02-04 22:33:22', NULL),
(58, 'respuesta 1 editado', 28, 14, 'ACTIVO', 2, NULL, NULL, '2022-02-04 22:33:33', '2022-02-04 22:33:33', NULL),
(59, 'respuesta 1', 28, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-04 22:33:33', '2022-02-04 22:33:33', NULL),
(60, 'respuesta  editado 2', 28, 16, 'ACTIVO', 2, NULL, NULL, '2022-02-04 22:33:33', '2022-02-04 22:33:33', NULL),
(61, 'respuesta 1', 3, 14, 'ACTIVO', 1, NULL, 1, '2022-02-09 00:47:43', '2022-02-09 00:47:43', '2022-02-09 01:02:09'),
(62, 'respuesta 2', 3, 15, 'ACTIVO', 1, NULL, 1, '2022-02-09 00:47:43', '2022-02-09 00:47:43', '2022-02-09 01:02:10'),
(63, 'respuesta 7', 3, 16, 'ACTIVO', 1, NULL, 1, '2022-02-09 00:47:43', '2022-02-09 00:47:43', '2022-02-09 01:02:10'),
(64, 'respuesta 1', 3, 14, 'ACTIVO', 1, NULL, 1, '2022-02-09 00:53:33', '2022-02-09 00:53:33', '2022-02-09 01:02:10'),
(65, 'respuesta 2', 3, 15, 'ACTIVO', 1, NULL, 1, '2022-02-09 00:53:33', '2022-02-09 00:53:33', '2022-02-09 01:02:10'),
(66, 'respuesta 7', 3, 16, 'ACTIVO', 1, NULL, 1, '2022-02-09 00:53:33', '2022-02-09 00:53:33', '2022-02-09 01:02:10'),
(67, 'respuesta 1', 3, 14, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:02:43', '2022-02-09 01:02:43', '2022-02-09 01:02:10'),
(68, 'respuesta 2', 3, 15, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:02:43', '2022-02-09 01:02:43', '2022-02-09 01:02:10'),
(69, 'respuesta 7', 3, 16, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:02:43', '2022-02-09 01:02:43', '2022-02-09 01:02:10'),
(70, 'respuesta 1', 3, 14, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:04:55', '2022-02-09 01:04:55', '2022-02-09 01:02:10'),
(71, 'respuesta 2', 3, 15, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:04:55', '2022-02-09 01:04:55', '2022-02-09 01:02:10'),
(72, 'respuesta 7', 3, 16, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:04:55', '2022-02-09 01:04:55', '2022-02-09 01:02:10'),
(73, 'respuesta 1', 3, 14, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:05:27', '2022-02-09 01:05:27', '2022-02-09 01:02:10'),
(74, 'respuesta 2', 3, 15, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:05:27', '2022-02-09 01:05:27', '2022-02-09 01:02:10'),
(75, 'respuesta 7', 3, 16, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:05:27', '2022-02-09 01:05:27', '2022-02-09 01:02:10'),
(76, 'respuesta 1', 3, 14, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:25:54', '2022-02-09 01:25:54', '2022-02-09 01:02:10'),
(77, 'respuesta 2', 3, 15, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:25:54', '2022-02-09 01:25:54', '2022-02-09 01:02:10'),
(78, 'respuesta 7', 3, 16, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:25:54', '2022-02-09 01:25:54', '2022-02-09 01:02:10'),
(79, 'respuesta 1', 3, 14, 'ACTIVO', 1, NULL, NULL, '2022-02-09 01:26:11', '2022-02-09 01:26:11', NULL),
(80, 'respuesta 2', 3, 15, 'ACTIVO', 1, NULL, NULL, '2022-02-09 01:26:11', '2022-02-09 01:26:11', NULL),
(81, 'respuesta 7', 3, 16, 'ACTIVO', 1, NULL, NULL, '2022-02-09 01:26:11', '2022-02-09 01:26:11', NULL),
(82, '27 de abril a las 6 pm', 4, 3, 'ACTIVO', 1, NULL, NULL, '2022-02-09 15:53:38', '2022-02-09 15:53:38', NULL),
(83, 'respuesta 1', 4, 4, 'ACTIVO', 1, NULL, NULL, '2022-02-09 15:53:38', '2022-02-09 15:53:38', NULL),
(84, 'preg 3', 4, 5, 'ACTIVO', 1, NULL, NULL, '2022-02-09 15:53:38', '2022-02-09 15:53:38', NULL),
(85, 'respuesta 1', 29, 14, 'ACTIVO', 2, NULL, 1, '2022-02-13 19:23:26', '2022-02-13 19:23:26', '2022-02-13 20:02:03'),
(86, 'El examen dura 4 horas', 29, 15, 'ACTIVO', 2, NULL, 1, '2022-02-13 19:23:26', '2022-02-13 19:23:26', '2022-02-13 20:02:03'),
(87, 'respuesta 14', 29, 16, 'ACTIVO', 2, NULL, 1, '2022-02-13 19:23:26', '2022-02-13 19:23:26', '2022-02-13 20:02:04'),
(88, 'respuesta 1', 29, 14, 'ACTIVO', 1, NULL, NULL, '2022-02-13 20:24:04', '2022-02-13 20:24:04', NULL),
(89, 'El examen dura 4 horas', 29, 15, 'ACTIVO', 1, NULL, NULL, '2022-02-13 20:24:04', '2022-02-13 20:24:04', NULL),
(90, 'respuesta 14', 29, 16, 'ACTIVO', 1, NULL, NULL, '2022-02-13 20:24:04', '2022-02-13 20:24:04', NULL),
(91, 'preg 1', 30, 14, 'ACTIVO', 2, NULL, NULL, '2022-02-14 15:50:57', '2022-02-14 15:50:57', NULL),
(92, 'respuesta 14', 30, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-14 15:50:58', '2022-02-14 15:50:58', NULL),
(93, 'respuesta 1', 30, 16, 'ACTIVO', 2, NULL, NULL, '2022-02-14 15:50:58', '2022-02-14 15:50:58', NULL),
(94, 'Clase_001', 31, 14, 'ACTIVO', 2, NULL, 1, '2022-03-01 16:19:37', '2022-03-01 16:19:37', '2022-03-01 16:03:01'),
(95, 'clase_002', 31, 15, 'ACTIVO', 2, NULL, 1, '2022-03-01 16:19:37', '2022-03-01 16:19:37', '2022-03-01 16:03:01'),
(96, 'Clase_003', 31, 16, 'ACTIVO', 2, NULL, 1, '2022-03-01 16:19:37', '2022-03-01 16:19:37', '2022-03-01 16:03:01'),
(97, 'Clase_001', 31, 14, 'ACTIVO', 1, NULL, NULL, '2022-03-01 16:21:01', '2022-03-01 16:21:01', NULL),
(98, 'clase_002', 31, 15, 'ACTIVO', 1, NULL, NULL, '2022-03-01 16:21:01', '2022-03-01 16:21:01', NULL),
(99, 'Clase_003', 31, 16, 'ACTIVO', 1, NULL, NULL, '2022-03-01 16:21:01', '2022-03-01 16:21:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_states`
--

CREATE TABLE `request_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `request_states`
--

INSERT INTO `request_states` (`id`, `name`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'CREADA', 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:12', '2022-02-02 04:01:12', NULL),
(2, 'ENVIADA AL TUTOR', 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:12', '2022-02-02 04:01:12', NULL),
(3, 'EN COTIZACIÓN', 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:12', '2022-02-02 04:01:12', NULL),
(4, 'EN DESARROLLO', 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:12', '2022-02-02 04:01:12', NULL),
(5, 'ENTREGABLE PDT EN APROBACIÓN', 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:12', '2022-02-02 04:01:12', NULL),
(6, 'ENTREGABLE APROBADO', 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:12', '2022-02-02 04:01:12', NULL),
(7, 'ENTREGABLE RECHAZADO', 'ACTIVO', NULL, NULL, NULL, '2022-02-02 04:01:12', '2022-02-02 04:01:12', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_systems`
--

CREATE TABLE `request_systems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `system_id` int(10) UNSIGNED NOT NULL COMMENT 'tipo de sistema',
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `request_systems`
--

INSERT INTO `request_systems` (`id`, `request_id`, `system_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 77, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:00:17', '2022-02-02 14:00:17', NULL),
(2, 2, 77, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:01:15', '2022-02-02 14:01:15', NULL),
(3, 3, 74, 'ACTIVO', 2, NULL, 1, '2022-02-03 23:20:39', '2022-02-03 23:20:39', '2022-02-09 01:02:11'),
(4, 4, 63, 'ACTIVO', 2, NULL, 1, '2022-02-03 23:27:33', '2022-02-03 23:27:33', '2022-02-09 15:02:37'),
(5, 11, 63, 'ACTIVO', 2, NULL, NULL, '2022-02-04 01:28:31', '2022-02-04 01:28:31', NULL),
(6, 1, 77, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:19:43', '2022-02-04 18:19:43', NULL),
(7, 1, 65, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:19:43', '2022-02-04 18:19:43', NULL),
(8, 1, 77, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:22:32', '2022-02-04 18:22:32', NULL),
(9, 1, 65, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:22:33', '2022-02-04 18:22:33', NULL),
(10, 1, 77, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(11, 1, 77, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(12, 1, 65, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(13, 1, 77, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(14, 1, 65, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(15, 12, 61, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:28:31', '2022-02-04 18:28:31', NULL),
(16, 26, 63, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:37:13', '2022-02-04 19:37:13', '2022-02-04 19:02:41'),
(17, 26, 67, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:40:20', '2022-02-04 19:40:20', '2022-02-04 19:02:41'),
(18, 26, 92, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:40:21', '2022-02-04 19:40:21', '2022-02-04 19:02:41'),
(19, 26, 85, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:40:21', '2022-02-04 19:40:21', '2022-02-04 19:02:41'),
(20, 26, 67, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:45:47', '2022-02-04 19:45:47', '2022-02-04 19:02:41'),
(21, 26, 92, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:45:47', '2022-02-04 19:45:47', '2022-02-04 19:02:41'),
(22, 26, 85, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:45:47', '2022-02-04 19:45:47', '2022-02-04 19:02:41'),
(23, 26, 67, 'ACTIVO', 2, NULL, NULL, '2022-02-04 19:46:42', '2022-02-04 19:46:42', NULL),
(24, 26, 92, 'ACTIVO', 2, NULL, NULL, '2022-02-04 19:46:42', '2022-02-04 19:46:42', NULL),
(25, 26, 85, 'ACTIVO', 2, NULL, NULL, '2022-02-04 19:46:42', '2022-02-04 19:46:42', NULL),
(26, 3, 74, 'ACTIVO', 1, NULL, 1, '2022-02-09 00:47:43', '2022-02-09 00:47:43', '2022-02-09 01:02:11'),
(27, 3, 74, 'ACTIVO', 1, NULL, 1, '2022-02-09 00:53:33', '2022-02-09 00:53:33', '2022-02-09 01:02:11'),
(28, 3, 74, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:02:43', '2022-02-09 01:02:43', '2022-02-09 01:02:11'),
(29, 3, 74, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:04:55', '2022-02-09 01:04:55', '2022-02-09 01:02:11'),
(30, 3, 74, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:05:27', '2022-02-09 01:05:27', '2022-02-09 01:02:11'),
(31, 3, 74, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:25:54', '2022-02-09 01:25:54', '2022-02-09 01:02:11'),
(32, 3, 74, 'ACTIVO', 1, NULL, NULL, '2022-02-09 01:26:11', '2022-02-09 01:26:11', NULL),
(33, 4, 63, 'ACTIVO', 1, NULL, NULL, '2022-02-09 15:53:38', '2022-02-09 15:53:38', NULL),
(34, 30, 70, 'ACTIVO', 2, NULL, NULL, '2022-02-14 15:50:58', '2022-02-14 15:50:58', NULL),
(35, 31, 67, 'ACTIVO', 2, NULL, 1, '2022-03-01 16:19:37', '2022-03-01 16:19:37', '2022-03-01 16:03:01'),
(36, 31, 67, 'ACTIVO', 1, NULL, NULL, '2022-03-01 16:21:01', '2022-03-01 16:21:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request_topics`
--

CREATE TABLE `request_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL COMMENT 'tipo de tema',
  `status` enum('ACTIVO','INACTIVO') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVO',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `request_topics`
--

INSERT INTO `request_topics` (`id`, `request_id`, `topic_id`, `status`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:00:17', '2022-02-02 14:00:17', NULL),
(2, 2, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-02 14:01:15', '2022-02-02 14:01:15', NULL),
(3, 3, 2, 'ACTIVO', 2, NULL, 1, '2022-02-03 23:20:39', '2022-02-03 23:20:39', '2022-02-09 01:02:11'),
(4, 4, 22, 'ACTIVO', 2, NULL, 1, '2022-02-03 23:27:33', '2022-02-03 23:27:33', '2022-02-09 15:02:38'),
(5, 11, 3, 'ACTIVO', 2, NULL, NULL, '2022-02-04 01:28:31', '2022-02-04 01:28:31', NULL),
(6, 1, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:19:43', '2022-02-04 18:19:43', NULL),
(7, 1, 40, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:19:43', '2022-02-04 18:19:43', NULL),
(8, 1, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:22:33', '2022-02-04 18:22:33', NULL),
(9, 1, 40, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:22:33', '2022-02-04 18:22:33', NULL),
(10, 1, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(11, 1, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(12, 1, 40, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(13, 1, 15, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(14, 1, 40, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:23:59', '2022-02-04 18:23:59', NULL),
(15, 12, 40, 'ACTIVO', 2, NULL, NULL, '2022-02-04 18:28:31', '2022-02-04 18:28:31', NULL),
(16, 26, 11, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:37:13', '2022-02-04 19:37:13', '2022-02-04 19:02:41'),
(17, 26, 1, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:37:13', '2022-02-04 19:37:13', '2022-02-04 19:02:41'),
(19, 26, 21, 'ACTIVO', 2, NULL, 2, '2022-02-04 19:45:47', '2022-02-04 19:45:47', '2022-02-04 19:02:41'),
(20, 26, 21, 'ACTIVO', 2, NULL, NULL, '2022-02-04 19:46:42', '2022-02-04 19:46:42', NULL),
(24, 3, 154, 'ACTIVO', 1, NULL, 1, '2022-02-09 01:25:54', '2022-02-09 01:25:54', '2022-02-09 01:02:11'),
(25, 3, 154, 'ACTIVO', 1, NULL, NULL, '2022-02-09 01:26:11', '2022-02-09 01:26:11', NULL),
(26, 4, 22, 'ACTIVO', 1, NULL, NULL, '2022-02-09 15:53:38', '2022-02-09 15:53:38', NULL),
(27, 4, 154, 'ACTIVO', 1, NULL, NULL, '2022-02-09 15:53:38', '2022-02-09 15:53:38', NULL),
(28, 29, 154, 'ACTIVO', 1, NULL, NULL, '2022-02-13 20:24:04', '2022-02-13 20:24:04', NULL),
(29, 31, 153, 'ACTIVO', 1, NULL, NULL, '2022-03-01 16:21:01', '2022-03-01 16:21:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrador', 'web', '2022-02-02 04:00:24', '2022-02-02 04:00:24', NULL),
(2, 'Configuracion', 'web', '2022-02-02 04:00:24', '2022-02-02 04:00:24', NULL),
(3, 'Comercial', 'web', '2022-02-02 04:00:24', '2022-02-02 04:00:24', NULL),
(4, 'Cliente', 'web', '2022-02-02 04:00:24', '2022-02-02 04:00:24', NULL),
(5, 'Monitor', 'web', '2022-02-02 04:00:24', '2022-02-02 04:00:24', NULL),
(6, 'Tutor', 'web', '2022-02-02 04:00:24', '2022-02-02 04:00:24', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
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
(41, 4),
(42, 4),
(43, 4),
(44, 4),
(45, 4),
(38, 6),
(39, 6),
(41, 6),
(42, 6),
(44, 6),
(45, 6),
(50, 6),
(51, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_area` int(10) UNSIGNED NOT NULL,
  `s_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_order` int(11) NOT NULL,
  `s_state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`id`, `id_area`, `s_name`, `s_order`, `s_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Archivo', 100, 1, '2022-02-02 04:00:36', '2022-02-02 04:00:36', NULL, NULL, NULL, NULL),
(2, 1, 'Corrección de Estilo', 200, 1, '2022-02-02 04:00:36', '2022-02-02 04:00:36', NULL, NULL, NULL, NULL),
(3, 1, 'Estudios Literarios', 300, 1, '2022-02-02 04:00:36', '2022-02-02 04:00:36', NULL, NULL, NULL, NULL),
(4, 1, 'Filosofía', 400, 1, '2022-02-02 04:00:37', '2022-02-02 04:00:37', NULL, NULL, NULL, NULL),
(5, 1, 'Historia', 500, 1, '2022-02-02 04:00:37', '2022-02-02 04:00:37', NULL, NULL, NULL, NULL),
(6, 1, 'Humanidades', 600, 1, '2022-02-02 04:00:37', '2022-02-02 04:00:37', NULL, NULL, NULL, NULL),
(7, 1, 'Información y Documentación', 700, 1, '2022-02-02 04:00:37', '2022-02-02 04:00:37', NULL, NULL, NULL, NULL),
(8, 1, 'Lingüística', 800, 1, '2022-02-02 04:00:38', '2022-02-02 04:00:38', NULL, NULL, NULL, NULL),
(9, 1, 'Redacción de documentos', 900, 1, '2022-02-02 04:00:38', '2022-02-02 04:00:38', NULL, NULL, NULL, NULL),
(10, 1, 'Teología', 1000, 1, '2022-02-02 04:00:38', '2022-02-02 04:00:38', NULL, NULL, NULL, NULL),
(11, 2, 'Antropología', 100, 1, '2022-02-02 04:00:38', '2022-02-02 04:00:38', NULL, NULL, NULL, NULL),
(12, 2, 'Cine / Cinematografía', 200, 1, '2022-02-02 04:00:38', '2022-02-02 04:00:38', NULL, NULL, NULL, NULL),
(13, 2, 'Comunicación', 300, 1, '2022-02-02 04:00:38', '2022-02-02 04:00:38', NULL, NULL, NULL, NULL),
(14, 2, 'Comunicación Audiovisual', 400, 1, '2022-02-02 04:00:38', '2022-02-02 04:00:38', NULL, NULL, NULL, NULL),
(15, 2, 'Geografía', 500, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(16, 2, 'Geografía y Ordenación del Territorio', 600, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(17, 2, 'Periodismo', 700, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(18, 2, 'Psicología', 800, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(19, 2, 'Sociología', 900, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(20, 2, 'Trabajo Social', 1000, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(21, 3, 'Artes Escénicas', 100, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(22, 3, 'Artes Plásticas', 200, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(23, 3, 'Conservación Restauración de Bienes Culturales', 300, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(24, 3, 'Danza', 400, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(25, 3, 'Diseño', 500, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(26, 3, 'Diseño de Interiores', 600, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(27, 3, 'Diseño de Moda', 700, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(28, 3, 'Diseño de Productos', 800, 1, '2022-02-02 04:00:39', '2022-02-02 04:00:39', NULL, NULL, NULL, NULL),
(29, 3, 'Diseño Digital y Multimedia', 900, 1, '2022-02-02 04:00:40', '2022-02-02 04:00:40', NULL, NULL, NULL, NULL),
(30, 3, 'Diseño gráfico', 1000, 1, '2022-02-02 04:00:40', '2022-02-02 04:00:40', NULL, NULL, NULL, NULL),
(31, 3, 'Fotografía', 1100, 1, '2022-02-02 04:00:40', '2022-02-02 04:00:40', NULL, NULL, NULL, NULL),
(32, 3, 'Historia del Arte', 1200, 1, '2022-02-02 04:00:40', '2022-02-02 04:00:40', NULL, NULL, NULL, NULL),
(33, 3, 'Música', 1300, 1, '2022-02-02 04:00:40', '2022-02-02 04:00:40', NULL, NULL, NULL, NULL),
(34, 3, 'Paisajismo', 1400, 1, '2022-02-02 04:00:40', '2022-02-02 04:00:40', NULL, NULL, NULL, NULL),
(35, 4, 'Gastronomía y Artes Culinarias', 100, 1, '2022-02-02 04:00:40', '2022-02-02 04:00:40', NULL, NULL, NULL, NULL),
(36, 4, 'Hotelería', 200, 1, '2022-02-02 04:00:40', '2022-02-02 04:00:40', NULL, NULL, NULL, NULL),
(37, 4, 'Turismo', 300, 1, '2022-02-02 04:00:40', '2022-02-02 04:00:40', NULL, NULL, NULL, NULL),
(38, 5, 'Astronomía y Astrofísica', 100, 1, '2022-02-02 04:00:40', '2022-02-02 04:00:40', NULL, NULL, NULL, NULL),
(39, 5, 'Biología', 200, 1, '2022-02-02 04:00:40', '2022-02-02 04:00:40', NULL, NULL, NULL, NULL),
(40, 5, 'Bioquímica', 300, 1, '2022-02-02 04:00:41', '2022-02-02 04:00:41', NULL, NULL, NULL, NULL),
(41, 5, 'Biotecnología', 400, 1, '2022-02-02 04:00:41', '2022-02-02 04:00:41', NULL, NULL, NULL, NULL),
(42, 5, 'Ciencia e Ingeniería de Datos', 500, 1, '2022-02-02 04:00:41', '2022-02-02 04:00:41', NULL, NULL, NULL, NULL),
(43, 5, 'Ciencia y Tecnología de los Alimentos', 600, 1, '2022-02-02 04:00:41', '2022-02-02 04:00:41', NULL, NULL, NULL, NULL),
(44, 5, 'Ciencias Ambientales', 700, 1, '2022-02-02 04:00:41', '2022-02-02 04:00:41', NULL, NULL, NULL, NULL),
(45, 5, 'Ciencias del Mar', 800, 1, '2022-02-02 04:00:41', '2022-02-02 04:00:41', NULL, NULL, NULL, NULL),
(46, 5, 'Ciencias Experimentales', 900, 1, '2022-02-02 04:00:42', '2022-02-02 04:00:42', NULL, NULL, NULL, NULL),
(47, 5, 'Enología', 1000, 1, '2022-02-02 04:00:42', '2022-02-02 04:00:42', NULL, NULL, NULL, NULL),
(48, 5, 'Estadística', 1100, 1, '2022-02-02 04:00:42', '2022-02-02 04:00:42', NULL, NULL, NULL, NULL),
(49, 5, 'Física', 1200, 1, '2022-02-02 04:00:42', '2022-02-02 04:00:42', NULL, NULL, NULL, NULL),
(50, 5, 'Geología', 1300, 1, '2022-02-02 04:00:42', '2022-02-02 04:00:42', NULL, NULL, NULL, NULL),
(51, 5, 'Matemáticas', 1400, 1, '2022-02-02 04:00:42', '2022-02-02 04:00:42', NULL, NULL, NULL, NULL),
(52, 5, 'Nanociencia y Nanotecnología', 1500, 1, '2022-02-02 04:00:42', '2022-02-02 04:00:42', NULL, NULL, NULL, NULL),
(53, 5, 'Química', 1600, 1, '2022-02-02 04:00:42', '2022-02-02 04:00:42', NULL, NULL, NULL, NULL),
(54, 6, 'Administración y Dirección de Empresas', 100, 1, '2022-02-02 04:00:42', '2022-02-02 04:00:42', NULL, NULL, NULL, NULL),
(55, 6, 'Asistencia en Dirección', 200, 1, '2022-02-02 04:00:42', '2022-02-02 04:00:42', NULL, NULL, NULL, NULL),
(56, 6, 'Ciencias del Trabajo y Recursos Humanos', 300, 1, '2022-02-02 04:00:42', '2022-02-02 04:00:42', NULL, NULL, NULL, NULL),
(57, 6, 'Ciencias del Transporte y Logística', 400, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(58, 6, 'Ciencias Políticas y de la Administración Pública', 500, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(59, 6, 'Comercio', 600, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(60, 6, 'Contabilidad y Finanzas', 700, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(61, 6, 'Criminología', 800, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(62, 6, 'Economía', 900, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(63, 6, 'Marketing', 1000, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(64, 6, 'Marketing', 1100, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(65, 6, 'Matemáticas Financiera', 1200, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(66, 6, 'Negocios internacionales', 1300, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(67, 6, 'Protocolo y Organización de Eventos', 1400, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(68, 6, 'Publicidad y Relaciones Públicas', 1500, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(69, 6, 'Relaciones Internacionales', 1600, 1, '2022-02-02 04:00:43', '2022-02-02 04:00:43', NULL, NULL, NULL, NULL),
(70, 6, 'Seguridad y Control de Riesgos', 1700, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(71, 7, 'Ciencias Biomédicas', 100, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(72, 7, 'Ciencias de la Actividad Física y del Deporte', 200, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(73, 7, 'Enfermería', 300, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(74, 7, 'Genética', 400, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(75, 7, 'Farmacia', 500, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(76, 7, 'Fisioterapia', 600, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(77, 7, 'Logopedia', 700, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(78, 7, 'Medicina', 800, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(79, 7, 'Nutrición Humana y Dietética', 900, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(80, 7, 'Odontología', 1000, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(81, 7, 'Óptica y Optometría', 1100, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(82, 7, 'Podología', 1200, 1, '2022-02-02 04:00:44', '2022-02-02 04:00:44', NULL, NULL, NULL, NULL),
(83, 7, 'Terapia Ocupacional', 1300, 1, '2022-02-02 04:00:45', '2022-02-02 04:00:45', NULL, NULL, NULL, NULL),
(84, 7, 'Veterinaria', 1400, 1, '2022-02-02 04:00:45', '2022-02-02 04:00:45', NULL, NULL, NULL, NULL),
(85, 8, 'Derecho', 100, 1, '2022-02-02 04:00:45', '2022-02-02 04:00:45', NULL, NULL, NULL, NULL),
(86, 8, 'Política', 200, 1, '2022-02-02 04:00:46', '2022-02-02 04:00:46', NULL, NULL, NULL, NULL),
(87, 8, 'Derechos humanos', 300, 1, '2022-02-02 04:00:46', '2022-02-02 04:00:46', NULL, NULL, NULL, NULL),
(88, 9, 'Animación', 100, 1, '2022-02-02 04:00:46', '2022-02-02 04:00:46', NULL, NULL, NULL, NULL),
(89, 9, 'Arquitectura', 200, 1, '2022-02-02 04:00:46', '2022-02-02 04:00:46', NULL, NULL, NULL, NULL),
(90, 9, 'Arquitectura Técnica / Ingeniería de la Edificación', 300, 1, '2022-02-02 04:00:46', '2022-02-02 04:00:46', NULL, NULL, NULL, NULL),
(91, 9, 'Desarrollo de Aplicaciones Web', 400, 1, '2022-02-02 04:00:46', '2022-02-02 04:00:46', NULL, NULL, NULL, NULL),
(92, 9, 'Diseño y Desarrollo de videojuegos', 500, 1, '2022-02-02 04:00:46', '2022-02-02 04:00:46', NULL, NULL, NULL, NULL),
(93, 9, 'Grado Abierto en Ingeniería y Arquitectura', 600, 1, '2022-02-02 04:00:46', '2022-02-02 04:00:46', NULL, NULL, NULL, NULL),
(94, 9, 'Ingeniería Aeroespacial', 700, 1, '2022-02-02 04:00:46', '2022-02-02 04:00:46', NULL, NULL, NULL, NULL),
(95, 9, 'Ingeniería Agroambiental', 800, 1, '2022-02-02 04:00:46', '2022-02-02 04:00:46', NULL, NULL, NULL, NULL),
(96, 9, 'Ingeniería Alimentaria', 900, 1, '2022-02-02 04:00:46', '2022-02-02 04:00:46', NULL, NULL, NULL, NULL),
(97, 9, 'Ingeniería Ambiental', 1000, 1, '2022-02-02 04:00:47', '2022-02-02 04:00:47', NULL, NULL, NULL, NULL),
(98, 9, 'Ingeniería Biomédica', 1100, 1, '2022-02-02 04:00:47', '2022-02-02 04:00:47', NULL, NULL, NULL, NULL),
(99, 9, 'Ingeniería Civil', 1200, 1, '2022-02-02 04:00:47', '2022-02-02 04:00:47', NULL, NULL, NULL, NULL),
(100, 9, 'Ingeniería de Caminos Canales y Puertos', 1300, 1, '2022-02-02 04:00:47', '2022-02-02 04:00:47', NULL, NULL, NULL, NULL),
(101, 9, 'Ingeniería de la Automoción', 1400, 1, '2022-02-02 04:00:47', '2022-02-02 04:00:47', NULL, NULL, NULL, NULL),
(102, 9, 'Ingeniería de la Energía', 1500, 1, '2022-02-02 04:00:47', '2022-02-02 04:00:47', NULL, NULL, NULL, NULL),
(103, 9, 'Ingeniería de las Industrias Agrarias y Alimentarias', 1600, 1, '2022-02-02 04:00:47', '2022-02-02 04:00:47', NULL, NULL, NULL, NULL),
(104, 9, 'Ingeniería de los Materiales', 1700, 1, '2022-02-02 04:00:47', '2022-02-02 04:00:47', NULL, NULL, NULL, NULL),
(105, 9, 'Ingeniería de Minas', 1800, 1, '2022-02-02 04:00:47', '2022-02-02 04:00:47', NULL, NULL, NULL, NULL),
(106, 9, 'Ingeniería de Sistemas Audiovisuales / Sonido e Imagen', 1900, 1, '2022-02-02 04:00:47', '2022-02-02 04:00:47', NULL, NULL, NULL, NULL),
(107, 9, 'Ingeniería de Sistemas Biológicos', 2000, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(108, 9, 'Ingeniería de Sistemas', 2100, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(109, 9, 'Ingeniería de Tecnología y Diseño Textil', 2200, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(110, 9, 'Ingeniería de Telecomunicación(Teleco) y de Sistemas de Comunicación', 2300, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(111, 9, 'Ingeniería del Software', 2400, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(112, 9, 'Ingeniería Eléctrica y Electrónica', 2500, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(113, 9, 'Ingeniería en Diseño Industrial y Desarrollo de Producto', 2600, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(114, 9, 'Ingeniería en Informática', 2700, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(115, 9, 'Ingeniería en Organización Industrial', 2800, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(116, 9, 'Ingeniería en Tecnologías Industriales', 2900, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(117, 9, 'Ingeniería Física', 3000, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(118, 9, 'Ingeniería Forestal/Ingeniería del Medio Natural', 3100, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(119, 9, 'Ingeniería Geológica', 3200, 1, '2022-02-02 04:00:48', '2022-02-02 04:00:48', NULL, NULL, NULL, NULL),
(120, 9, 'Ingeniería Geomática y Topografía', 3300, 1, '2022-02-02 04:00:49', '2022-02-02 04:00:49', NULL, NULL, NULL, NULL),
(121, 9, 'Ingeniería Industrial', 3400, 1, '2022-02-02 04:00:49', '2022-02-02 04:00:49', NULL, NULL, NULL, NULL),
(122, 9, 'Ingeniería Matemática', 3500, 1, '2022-02-02 04:00:49', '2022-02-02 04:00:49', NULL, NULL, NULL, NULL),
(123, 9, 'Ingeniería Mecánica', 3600, 1, '2022-02-02 04:00:49', '2022-02-02 04:00:49', NULL, NULL, NULL, NULL),
(124, 9, 'Ingeniería Mecatrónica', 3700, 1, '2022-02-02 04:00:49', '2022-02-02 04:00:49', NULL, NULL, NULL, NULL),
(125, 9, 'Ingeniería Náutica y Transporte Marítimo', 3800, 1, '2022-02-02 04:00:49', '2022-02-02 04:00:49', NULL, NULL, NULL, NULL),
(126, 9, 'Ingeniería Naval y Oceánica', 3900, 1, '2022-02-02 04:00:49', '2022-02-02 04:00:49', NULL, NULL, NULL, NULL),
(127, 9, 'Ingeniería Química', 4000, 1, '2022-02-02 04:00:49', '2022-02-02 04:00:49', NULL, NULL, NULL, NULL),
(128, 9, 'Ingeniería Robótica', 4100, 1, '2022-02-02 04:00:49', '2022-02-02 04:00:49', NULL, NULL, NULL, NULL),
(129, 9, 'Ingeniería Telemática', 4200, 1, '2022-02-02 04:00:49', '2022-02-02 04:00:49', NULL, NULL, NULL, NULL),
(130, 9, 'Piloto y Dirección de Operaciones Aéreas', 4300, 1, '2022-02-02 04:00:49', '2022-02-02 04:00:49', NULL, NULL, NULL, NULL),
(131, 9, 'Termodinámica', 4400, 1, '2022-02-02 04:00:49', '2022-02-02 04:00:49', NULL, NULL, NULL, NULL),
(132, 10, 'Educación Infantil', 100, 1, '2022-02-02 04:00:50', '2022-02-02 04:00:50', NULL, NULL, NULL, NULL),
(133, 10, 'Pedagogía', 200, 1, '2022-02-02 04:00:50', '2022-02-02 04:00:50', NULL, NULL, NULL, NULL),
(134, 10, 'Educación', 300, 1, '2022-02-02 04:00:50', '2022-02-02 04:00:50', NULL, NULL, NULL, NULL),
(135, 11, 'Idiomas', 100, 1, '2022-02-02 04:00:50', '2022-02-02 04:00:50', NULL, NULL, NULL, NULL),
(136, 11, 'Lenguas Modernas -Lenguas Clásicas-Filologías', 200, 1, '2022-02-02 04:00:50', '2022-02-02 04:00:50', NULL, NULL, NULL, NULL),
(137, 11, 'Traducción e Interpretación', 300, 1, '2022-02-02 04:00:50', '2022-02-02 04:00:50', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_subject` int(10) UNSIGNED NOT NULL,
  `t_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_order` int(11) NOT NULL,
  `t_state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `topics`
--

INSERT INTO `topics` (`id`, `id_subject`, `t_name`, `t_order`, `t_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 1, 'Archivo', 100, 1, '2022-02-02 04:00:50', '2022-02-02 04:00:50', NULL, NULL, NULL, NULL),
(2, 2, 'Corrección de Estilo', 200, 1, '2022-02-02 04:00:50', '2022-02-02 04:00:50', NULL, NULL, NULL, NULL),
(3, 3, 'Estudios Literarios', 300, 1, '2022-02-02 04:00:50', '2022-02-02 04:00:50', NULL, NULL, NULL, NULL),
(4, 4, 'Filosofía', 400, 1, '2022-02-02 04:00:51', '2022-02-02 04:00:51', NULL, NULL, NULL, NULL),
(5, 5, 'Historia', 500, 1, '2022-02-02 04:00:51', '2022-02-02 04:00:51', NULL, NULL, NULL, NULL),
(6, 6, 'Humanidades', 600, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(7, 7, 'Información y Documentación', 700, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(8, 8, 'Lingüística', 800, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(9, 9, 'Redacción de documentos', 900, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(10, 10, 'Teología', 1000, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(11, 11, 'Antropología', 1100, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(12, 12, 'Cine / Cinematografía', 1200, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(13, 13, 'Comunicación', 1300, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(14, 14, 'Comunicación Audiovisual', 1400, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(15, 15, 'Geografía', 1500, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(16, 16, 'Geografía y Ordenación del Territorio', 1600, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(17, 17, 'Periodismo', 1700, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(18, 18, 'Psicología', 1800, 1, '2022-02-02 04:00:52', '2022-02-02 04:00:52', NULL, NULL, NULL, NULL),
(19, 19, 'Sociología', 1900, 1, '2022-02-02 04:00:53', '2022-02-02 04:00:53', NULL, NULL, NULL, NULL),
(20, 20, 'Trabajo Social', 2000, 1, '2022-02-02 04:00:53', '2022-02-02 04:00:53', NULL, NULL, NULL, NULL),
(21, 21, 'Artes Escénicas', 2100, 1, '2022-02-02 04:00:53', '2022-02-02 04:00:53', NULL, NULL, NULL, NULL),
(22, 22, 'Artes Plásticas', 2200, 1, '2022-02-02 04:00:53', '2022-02-02 04:00:53', NULL, NULL, NULL, NULL),
(23, 23, 'Conservación Restauración de Bienes Culturales', 2300, 1, '2022-02-02 04:00:53', '2022-02-02 04:00:53', NULL, NULL, NULL, NULL),
(24, 24, 'Danza', 2400, 1, '2022-02-02 04:00:53', '2022-02-02 04:00:53', NULL, NULL, NULL, NULL),
(25, 25, 'Diseño', 2500, 1, '2022-02-02 04:00:53', '2022-02-02 04:00:53', NULL, NULL, NULL, NULL),
(26, 26, 'Diseño de Interiores', 2600, 1, '2022-02-02 04:00:53', '2022-02-02 04:00:53', NULL, NULL, NULL, NULL),
(27, 27, 'Diseño de Moda', 2700, 1, '2022-02-02 04:00:53', '2022-02-02 04:00:53', NULL, NULL, NULL, NULL),
(28, 28, 'Diseño de Productos', 2800, 1, '2022-02-02 04:00:53', '2022-02-02 04:00:53', NULL, NULL, NULL, NULL),
(29, 29, 'Diseño Digital y Multimedia', 2900, 1, '2022-02-02 04:00:53', '2022-02-02 04:00:53', NULL, NULL, NULL, NULL),
(30, 30, 'Diseño gráfico', 3000, 1, '2022-02-02 04:00:54', '2022-02-02 04:00:54', NULL, NULL, NULL, NULL),
(31, 31, 'Fotografía', 3100, 1, '2022-02-02 04:00:54', '2022-02-02 04:00:54', NULL, NULL, NULL, NULL),
(32, 32, 'Historia del Arte', 3200, 1, '2022-02-02 04:00:54', '2022-02-02 04:00:54', NULL, NULL, NULL, NULL),
(33, 33, 'Música', 3300, 1, '2022-02-02 04:00:54', '2022-02-02 04:00:54', NULL, NULL, NULL, NULL),
(34, 34, 'Paisajismo', 3400, 1, '2022-02-02 04:00:54', '2022-02-02 04:00:54', NULL, NULL, NULL, NULL),
(35, 35, 'Gastronomía y Artes Culinarias', 3500, 1, '2022-02-02 04:00:54', '2022-02-02 04:00:54', NULL, NULL, NULL, NULL),
(36, 36, 'Hotelería', 3600, 1, '2022-02-02 04:00:54', '2022-02-02 04:00:54', NULL, NULL, NULL, NULL),
(37, 37, 'Turismo', 3700, 1, '2022-02-02 04:00:54', '2022-02-02 04:00:54', NULL, NULL, NULL, NULL),
(38, 38, 'Astronomía y Astrofísica', 3800, 1, '2022-02-02 04:00:54', '2022-02-02 04:00:54', NULL, NULL, NULL, NULL),
(39, 39, 'Biología', 3900, 1, '2022-02-02 04:00:54', '2022-02-02 04:00:54', NULL, NULL, NULL, NULL),
(40, 40, 'Bioquímica', 4000, 1, '2022-02-02 04:00:54', '2022-02-02 04:00:54', NULL, NULL, NULL, NULL),
(41, 41, 'Biotecnología', 4100, 1, '2022-02-02 04:00:54', '2022-02-02 04:00:54', NULL, NULL, NULL, NULL),
(42, 42, 'Ciencia e Ingeniería de Datos', 4200, 1, '2022-02-02 04:00:55', '2022-02-02 04:00:55', NULL, NULL, NULL, NULL),
(43, 43, 'Ciencia y Tecnología de los Alimentos', 4300, 1, '2022-02-02 04:00:55', '2022-02-02 04:00:55', NULL, NULL, NULL, NULL),
(44, 44, 'Ciencias Ambientales', 4400, 1, '2022-02-02 04:00:55', '2022-02-02 04:00:55', NULL, NULL, NULL, NULL),
(45, 45, 'Ciencias del Mar', 4500, 1, '2022-02-02 04:00:55', '2022-02-02 04:00:55', NULL, NULL, NULL, NULL),
(46, 46, 'Ciencias Experimentales', 4600, 1, '2022-02-02 04:00:55', '2022-02-02 04:00:55', NULL, NULL, NULL, NULL),
(47, 47, 'Enología', 4700, 1, '2022-02-02 04:00:55', '2022-02-02 04:00:55', NULL, NULL, NULL, NULL),
(48, 48, 'Estadística', 4800, 1, '2022-02-02 04:00:55', '2022-02-02 04:00:55', NULL, NULL, NULL, NULL),
(49, 48, 'Cartas de control', 4900, 1, '2022-02-02 04:00:55', '2022-02-02 04:00:55', NULL, NULL, NULL, NULL),
(50, 48, 'Estadística', 5000, 1, '2022-02-02 04:00:55', '2022-02-02 04:00:55', NULL, NULL, NULL, NULL),
(51, 48, 'Estadística descriptiva', 5100, 1, '2022-02-02 04:00:55', '2022-02-02 04:00:55', NULL, NULL, NULL, NULL),
(52, 48, 'Estadística inferencial', 5200, 1, '2022-02-02 04:00:55', '2022-02-02 04:00:55', NULL, NULL, NULL, NULL),
(53, 48, 'Probabilidad', 5300, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(54, 49, 'Física', 5400, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(55, 49, 'Dinámica', 5500, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(56, 49, 'Electromagnetismo', 5600, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(57, 49, 'Física', 5700, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(58, 49, 'Mecánica', 5800, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(59, 49, 'Ondas', 5900, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(60, 50, 'Geología', 6000, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(61, 50, 'Abstracta', 6100, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(62, 50, 'Álgebra', 6200, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(63, 50, 'Álgebra Lineal', 6300, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(64, 50, 'Análisis Numérico', 6400, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(65, 50, 'Cálculo actuarial', 6500, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(66, 50, 'Cálculo diferencial', 6600, 1, '2022-02-02 04:00:56', '2022-02-02 04:00:56', NULL, NULL, NULL, NULL),
(67, 50, 'Cálculo espacial', 6700, 1, '2022-02-02 04:00:57', '2022-02-02 04:00:57', NULL, NULL, NULL, NULL),
(68, 50, 'Cálculo integral', 6800, 1, '2022-02-02 04:00:57', '2022-02-02 04:00:57', NULL, NULL, NULL, NULL),
(69, 50, 'Cálculo vectorial', 6900, 1, '2022-02-02 04:00:57', '2022-02-02 04:00:57', NULL, NULL, NULL, NULL),
(70, 50, 'Ecuaciones diferenciales', 7000, 1, '2022-02-02 04:00:57', '2022-02-02 04:00:57', NULL, NULL, NULL, NULL),
(71, 50, 'Geometría', 7100, 1, '2022-02-02 04:00:57', '2022-02-02 04:00:57', NULL, NULL, NULL, NULL),
(72, 50, 'Geometría', 7200, 1, '2022-02-02 04:00:58', '2022-02-02 04:00:58', NULL, NULL, NULL, NULL),
(73, 50, 'Geometría Euclidiana', 7300, 1, '2022-02-02 04:00:58', '2022-02-02 04:00:58', NULL, NULL, NULL, NULL),
(74, 50, 'Gestión de operaciones', 7400, 1, '2022-02-02 04:00:59', '2022-02-02 04:00:59', NULL, NULL, NULL, NULL),
(75, 50, 'Integración numérica', 7500, 1, '2022-02-02 04:00:59', '2022-02-02 04:00:59', NULL, NULL, NULL, NULL),
(76, 50, 'Lógica', 7600, 1, '2022-02-02 04:00:59', '2022-02-02 04:00:59', NULL, NULL, NULL, NULL),
(77, 51, 'Matemáticas', 7700, 1, '2022-02-02 04:00:59', '2022-02-02 04:00:59', NULL, NULL, NULL, NULL),
(78, 51, 'Programación lineal', 7800, 1, '2022-02-02 04:00:59', '2022-02-02 04:00:59', NULL, NULL, NULL, NULL),
(79, 51, 'Topología', 7900, 1, '2022-02-02 04:00:59', '2022-02-02 04:00:59', NULL, NULL, NULL, NULL),
(80, 51, 'Trigonometría', 8000, 1, '2022-02-02 04:00:59', '2022-02-02 04:00:59', NULL, NULL, NULL, NULL),
(81, 51, 'Vectorial', 8100, 1, '2022-02-02 04:00:59', '2022-02-02 04:00:59', NULL, NULL, NULL, NULL),
(82, 52, 'Nanociencia y Nanotecnología', 8200, 1, '2022-02-02 04:00:59', '2022-02-02 04:00:59', NULL, NULL, NULL, NULL),
(83, 53, 'Química', 8300, 1, '2022-02-02 04:00:59', '2022-02-02 04:00:59', NULL, NULL, NULL, NULL),
(84, 53, 'Inorgánica', 8400, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(85, 53, 'Orgánica', 8500, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(86, 54, 'Administración y Dirección de Empresas', 8600, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(87, 54, 'Estudio de mercados', 8700, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(88, 54, 'Evaluación de proyectos', 8800, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(89, 54, 'Gerencia de Valor', 8900, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(90, 54, 'Gestión de personas', 9000, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(91, 54, 'Gestión de procesos', 9100, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(92, 54, 'Recursos humanos', 9200, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(93, 54, 'Toma de decisiones', 9300, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(94, 54, 'Ventas', 9400, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(95, 55, 'Asistencia en Dirección', 9500, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(96, 56, 'Ciencias del Trabajo y Recursos Humanos', 9600, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(97, 57, 'Ciencias del Transporte y Logística', 9700, 1, '2022-02-02 04:01:00', '2022-02-02 04:01:00', NULL, NULL, NULL, NULL),
(98, 58, 'Ciencias Políticas y de la Administración Pública', 9800, 1, '2022-02-02 04:01:01', '2022-02-02 04:01:01', NULL, NULL, NULL, NULL),
(99, 59, 'Comercio', 9900, 1, '2022-02-02 04:01:01', '2022-02-02 04:01:01', NULL, NULL, NULL, NULL),
(100, 60, 'Contabilidad y Finanzas', 10000, 1, '2022-02-02 04:01:01', '2022-02-02 04:01:01', NULL, NULL, NULL, NULL),
(101, 60, 'Análisis Contable', 10100, 1, '2022-02-02 04:01:01', '2022-02-02 04:01:01', NULL, NULL, NULL, NULL),
(102, 60, 'Auditoría', 10200, 1, '2022-02-02 04:01:01', '2022-02-02 04:01:01', NULL, NULL, NULL, NULL),
(103, 60, 'Contabilidad y Finanzas', 10300, 1, '2022-02-02 04:01:01', '2022-02-02 04:01:01', NULL, NULL, NULL, NULL),
(104, 60, 'Costos', 10400, 1, '2022-02-02 04:01:01', '2022-02-02 04:01:01', NULL, NULL, NULL, NULL),
(105, 65, 'Matemáticas Financiera', 10500, 1, '2022-02-02 04:01:01', '2022-02-02 04:01:01', NULL, NULL, NULL, NULL),
(106, 65, 'Mercado de opciones', 10600, 1, '2022-02-02 04:01:01', '2022-02-02 04:01:01', NULL, NULL, NULL, NULL),
(107, 65, 'Presupuesto', 10700, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(108, 65, 'Tributaria', 10800, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(109, 61, 'Criminología', 10900, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(110, 62, 'Economía', 11000, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(111, 62, 'Macroeconomía', 11100, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(112, 62, 'Microeconomía', 11200, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(113, 62, 'Política económica', 11300, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(114, 63, 'Marketing', 11400, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(115, 63, 'Marketing', 11500, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(116, 63, 'Marketing globalizado', 11600, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(117, 65, 'Matemáticas Financiera', 11700, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(118, 66, 'Negocios internacionales', 11800, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(119, 67, 'Protocolo y Organización de Eventos', 11900, 1, '2022-02-02 04:01:02', '2022-02-02 04:01:02', NULL, NULL, NULL, NULL),
(120, 68, 'Publicidad y Relaciones Públicas', 12000, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(121, 69, 'Relaciones Internacionales', 12100, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(122, 70, 'Seguridad y Control de Riesgos', 12200, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(123, 71, 'Ciencias Biomédicas', 12300, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(124, 72, 'Ciencias de la Actividad Física y del Deporte', 12400, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(125, 73, 'Enfermería', 12500, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(126, 74, 'Genética', 12600, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(127, 75, 'Farmacia', 12700, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(128, 76, 'Fisioterapia', 12800, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(129, 77, 'Logopedia', 12900, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(130, 78, 'Medicina', 13000, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(131, 78, 'Anatomía', 13100, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(132, 78, 'Fisiopatología', 13200, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(133, 78, 'Histología', 13300, 1, '2022-02-02 04:01:03', '2022-02-02 04:01:03', NULL, NULL, NULL, NULL),
(134, 78, 'Inmunidad', 13400, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(135, 78, 'Medicina', 13500, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(136, 78, 'Radiología', 13600, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(137, 79, 'Nutrición Humana y Dietética', 13700, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(138, 80, 'Odontología', 13800, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(139, 81, 'Óptica y Optometría', 13900, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(140, 82, 'Podología', 14000, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(141, 83, 'Terapia Ocupacional', 14100, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(142, 84, 'Veterinaria', 14200, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(143, 85, 'Derecho', 14300, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(144, 85, 'Internacional', 14400, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(145, 85, 'Ambiental', 14500, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(146, 85, 'Civil', 14600, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(147, 85, 'Penal', 14700, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(148, 86, 'Política', 14800, 1, '2022-02-02 04:01:04', '2022-02-02 04:01:04', NULL, NULL, NULL, NULL),
(149, 87, 'Derechos humanos', 14900, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(150, 88, 'Animación', 15000, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(151, 89, 'Arquitectura', 15100, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(152, 90, 'Arquitectura Técnica / Ingeniería de la Edificación', 15200, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(153, 91, 'Desarrollo de Aplicaciones Web', 15300, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(154, 92, 'Diseño y Desarrollo de videojuegos', 15400, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(155, 93, 'Grado Abierto en Ingeniería y Arquitectura', 15500, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(156, 94, 'Ingeniería Aeroespacial', 15600, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(157, 95, 'Ingeniería Agroambiental', 15700, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(158, 96, 'Ingeniería Alimentaria', 15800, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(159, 97, 'Ingeniería Ambiental', 15900, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(160, 98, 'Ingeniería Biomédica', 16000, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(161, 99, 'Ingeniería Civil', 16100, 1, '2022-02-02 04:01:05', '2022-02-02 04:01:05', NULL, NULL, NULL, NULL),
(162, 99, 'Hidráulica', 16200, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(163, 99, 'Hormigon', 16300, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(164, 99, 'Ingeniería Civil', 16400, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(165, 99, 'Resistencia de materiales', 16500, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(166, 99, 'Suelos', 16600, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(167, 99, 'Vigas y esfuerzos', 16700, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(168, 100, 'Ingeniería de Caminos Canales y Puertos', 16800, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(169, 101, 'Ingeniería de la Automoción', 16900, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(170, 102, 'Ingeniería de la Energía', 17000, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(171, 103, 'Ingeniería de las Industrias Agrarias y Alimentarias', 17100, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(172, 104, 'Ingeniería de los Materiales', 17200, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(173, 105, 'Ingeniería de Minas', 17300, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(174, 106, 'Ingeniería de Sistemas Audiovisuales / Sonido e Imagen', 17400, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(175, 107, 'Ingeniería de Sistemas Biológicos', 17500, 1, '2022-02-02 04:01:06', '2022-02-02 04:01:06', NULL, NULL, NULL, NULL),
(176, 108, 'Ingeniería de Sistemas', 17600, 1, '2022-02-02 04:01:07', '2022-02-02 04:01:07', NULL, NULL, NULL, NULL),
(177, 108, 'Bases de Datos', 17700, 1, '2022-02-02 04:01:07', '2022-02-02 04:01:07', NULL, NULL, NULL, NULL),
(178, 108, 'Algoritmos', 17800, 1, '2022-02-02 04:01:07', '2022-02-02 04:01:07', NULL, NULL, NULL, NULL),
(179, 108, 'Ingeniería de Sistemas', 17900, 1, '2022-02-02 04:01:07', '2022-02-02 04:01:07', NULL, NULL, NULL, NULL),
(180, 108, 'Programación', 18000, 1, '2022-02-02 04:01:07', '2022-02-02 04:01:07', NULL, NULL, NULL, NULL),
(181, 109, 'Ingeniería de Tecnología y Diseño Textil', 18100, 1, '2022-02-02 04:01:07', '2022-02-02 04:01:07', NULL, NULL, NULL, NULL),
(182, 110, 'Ingeniería de Telecomunicación(Teleco) y de Sistemas de Comunicación', 18200, 1, '2022-02-02 04:01:07', '2022-02-02 04:01:07', NULL, NULL, NULL, NULL),
(183, 111, 'Ingeniería del Software', 18300, 1, '2022-02-02 04:01:07', '2022-02-02 04:01:07', NULL, NULL, NULL, NULL),
(184, 112, 'Ingeniería Eléctrica y Electrónica', 18400, 1, '2022-02-02 04:01:07', '2022-02-02 04:01:07', NULL, NULL, NULL, NULL),
(185, 113, 'Ingeniería en Diseño Industrial y Desarrollo de Producto', 18500, 1, '2022-02-02 04:01:07', '2022-02-02 04:01:07', NULL, NULL, NULL, NULL),
(186, 114, 'Ingeniería en Informática', 18600, 1, '2022-02-02 04:01:07', '2022-02-02 04:01:07', NULL, NULL, NULL, NULL),
(187, 115, 'Ingeniería en Organización Industrial', 18700, 1, '2022-02-02 04:01:07', '2022-02-02 04:01:07', NULL, NULL, NULL, NULL),
(188, 116, 'Ingeniería en Tecnologías Industriales', 18800, 1, '2022-02-02 04:01:08', '2022-02-02 04:01:08', NULL, NULL, NULL, NULL),
(189, 117, 'Ingeniería Física', 18900, 1, '2022-02-02 04:01:08', '2022-02-02 04:01:08', NULL, NULL, NULL, NULL),
(190, 118, 'Ingeniería Forestal/Ingeniería del Medio Natural', 19000, 1, '2022-02-02 04:01:08', '2022-02-02 04:01:08', NULL, NULL, NULL, NULL),
(191, 119, 'Ingeniería Geológica', 19100, 1, '2022-02-02 04:01:09', '2022-02-02 04:01:09', NULL, NULL, NULL, NULL),
(192, 120, 'Ingeniería Geomática y Topografía', 19200, 1, '2022-02-02 04:01:09', '2022-02-02 04:01:09', NULL, NULL, NULL, NULL),
(193, 121, 'Ingeniería Industrial', 19300, 1, '2022-02-02 04:01:09', '2022-02-02 04:01:09', NULL, NULL, NULL, NULL),
(194, 122, 'Ingeniería Matemática', 19400, 1, '2022-02-02 04:01:09', '2022-02-02 04:01:09', NULL, NULL, NULL, NULL),
(195, 123, 'Ingeniería Mecánica', 19500, 1, '2022-02-02 04:01:09', '2022-02-02 04:01:09', NULL, NULL, NULL, NULL),
(196, 124, 'Ingeniería Mecatrónica', 19600, 1, '2022-02-02 04:01:09', '2022-02-02 04:01:09', NULL, NULL, NULL, NULL),
(197, 125, 'Ingeniería Náutica y Transporte Marítimo', 19700, 1, '2022-02-02 04:01:09', '2022-02-02 04:01:09', NULL, NULL, NULL, NULL),
(198, 126, 'Ingeniería Naval y Oceánica', 19800, 1, '2022-02-02 04:01:09', '2022-02-02 04:01:09', NULL, NULL, NULL, NULL),
(199, 127, 'Ingeniería Química', 19900, 1, '2022-02-02 04:01:09', '2022-02-02 04:01:09', NULL, NULL, NULL, NULL),
(200, 128, 'Ingeniería Robótica', 20000, 1, '2022-02-02 04:01:09', '2022-02-02 04:01:09', NULL, NULL, NULL, NULL),
(201, 129, 'Ingeniería Telemática', 20100, 1, '2022-02-02 04:01:09', '2022-02-02 04:01:09', NULL, NULL, NULL, NULL),
(202, 130, 'Piloto y Dirección de Operaciones Aéreas', 20200, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(203, 131, 'Termodinámica', 20300, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(204, 132, 'Educación Infantil', 20400, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(205, 133, 'Pedagogía', 20500, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(206, 134, 'Educación', 20600, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(207, 135, 'Idiomas', 20700, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(208, 135, 'Alemán', 20800, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(209, 135, 'Francés', 20900, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(210, 135, 'Inglés', 21000, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(211, 135, 'Italiano', 21100, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(212, 135, 'Mandarín', 21200, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(213, 135, 'Portugués', 21300, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(214, 136, 'Lenguas Modernas -Lenguas Clásicas-Filologías', 21400, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL),
(215, 137, 'Traducción e Interpretación', 21500, 1, '2022-02-02 04:01:10', '2022-02-02 04:01:10', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutors_bank_details`
--

CREATE TABLE `tutors_bank_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_bank` int(10) UNSIGNED NOT NULL,
  `id_type_account` int(10) UNSIGNED NOT NULL,
  `t_b_number_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_b_namefile` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_b_state` int(11) NOT NULL,
  `t_b_observations` longtext COLLATE utf8mb4_unicode_ci COMMENT 'campo para guardar las observaciones de el que autoriza o rechaza',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tutors_bank_details`
--

INSERT INTO `tutors_bank_details` (`id`, `id_user`, `id_bank`, `id_type_account`, `t_b_number_account`, `t_b_namefile`, `t_b_state`, `t_b_observations`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 4, 28, 48, '444444444444', NULL, 1, 'Aprobado pero requiere subir archivo', '2022-02-05 20:00:00', '2022-02-05 20:21:01', NULL, 4, NULL, NULL),
(2, 4, 28, 48, '444444444444', NULL, 0, NULL, '2022-02-05 20:01:48', '2022-02-05 20:02:50', '2022-02-05 20:02:50', 4, NULL, NULL),
(3, 4, 28, 48, '444444444444', NULL, 0, NULL, '2022-02-05 20:02:25', '2022-02-05 20:02:46', '2022-02-05 20:02:46', 4, NULL, NULL),
(4, 4, 34, 49, '8526588888', NULL, 1, 'Aprobado pero requiere subir archivo', '2022-02-05 20:03:10', '2022-02-05 20:21:10', NULL, 4, NULL, NULL),
(5, 5, 19, 48, '854585', NULL, 0, NULL, '2022-03-02 00:59:48', '2022-03-02 00:59:48', NULL, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutors_services`
--

CREATE TABLE `tutors_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_service` int(10) UNSIGNED NOT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_s_state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tutors_services`
--

INSERT INTO `tutors_services` (`id`, `id_user`, `id_service`, `observation`, `t_s_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 4, 99, 'Aprobado', 1, '2022-02-05 20:14:40', '2022-02-05 20:29:35', NULL, NULL, NULL, NULL),
(2, 4, 100, 'Aprobado', 1, '2022-02-05 20:14:51', '2022-02-05 20:29:57', NULL, NULL, NULL, NULL),
(3, 4, 102, 'Aprobado', 1, '2022-02-05 20:14:55', '2022-02-05 20:30:03', NULL, NULL, NULL, NULL),
(4, 4, 101, 'Aprobado', 1, '2022-02-05 20:15:05', '2022-02-05 20:30:09', NULL, NULL, NULL, NULL),
(5, 4, 103, 'rechazado', 2, '2022-02-05 20:15:10', '2022-02-05 20:30:25', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutors_systems`
--

CREATE TABLE `tutors_systems` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_system` int(10) UNSIGNED NOT NULL,
  `t_s_namefile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_s_state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tutors_systems`
--

INSERT INTO `tutors_systems` (`id`, `id_user`, `id_system`, `t_s_namefile`, `observation`, `t_s_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 4, 67, NULL, 'Aprobado', 1, '2022-02-05 20:15:34', '2022-02-05 20:26:31', NULL, NULL, NULL, NULL),
(2, 4, 92, NULL, 'Aprobado', 1, '2022-02-05 20:15:50', '2022-02-05 20:26:42', NULL, NULL, NULL, NULL),
(3, 4, 85, NULL, 'Aprobado', 1, '2022-02-05 20:15:57', '2022-02-05 20:27:26', NULL, NULL, NULL, NULL),
(4, 4, 70, NULL, 'no aplica a este sistema', 2, '2022-02-05 20:16:03', '2022-02-05 20:28:13', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutors_topics`
--

CREATE TABLE `tutors_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_topic` int(10) UNSIGNED NOT NULL,
  `t_t_namefile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_t_state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tutors_topics`
--

INSERT INTO `tutors_topics` (`id`, `id_user`, `id_topic`, `t_t_namefile`, `observation`, `t_t_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 4, 154, NULL, 'Aprobado', 1, '2022-02-05 20:10:48', '2022-02-05 20:28:52', NULL, NULL, NULL, NULL),
(2, 4, 176, NULL, 'Aprobado', 1, '2022-02-05 20:12:01', '2022-02-05 20:28:56', NULL, NULL, NULL, NULL),
(3, 4, 177, NULL, 'Aprobado', 1, '2022-02-05 20:12:24', '2022-02-05 20:29:01', NULL, NULL, NULL, NULL),
(4, 4, 178, NULL, 'Aprobado', 1, '2022-02-05 20:13:08', '2022-02-05 20:29:10', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `u_key_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_indicativo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_type_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_num_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_id_country` int(11) NOT NULL,
  `u_id_means` int(11) DEFAULT NULL,
  `u_id_money` int(11) DEFAULT NULL,
  `u_line_first` int(11) DEFAULT NULL,
  `u_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `u_key_number`, `u_indicativo`, `u_name`, `u_nickname`, `u_type_doc`, `u_num_doc`, `u_id_country`, `u_id_means`, `u_id_money`, `u_line_first`, `u_state`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '3103332244', '+57', 'Soporte Testing', 'Soporte_test', '5', '1234567890', 8, 1, 17, NULL, '1', 'soporte.test@gestorintegarl.com', NULL, '$2y$10$LqYVxK2VSr892WzNBkvZ6.gTrKM5J4oQeWkSW/hm0dU0Tk4owR/Hu', NULL, '2022-02-02 04:00:24', '2022-02-02 04:00:24', NULL, 1, NULL, NULL),
(2, '8569459455', '+54', 'Client1 Testing', 'Client_test1', '5', '12123123121', 1, 4, 17, NULL, '1', 'cliente1.test@gestorintegarl.com', NULL, '$2y$10$1.WMqBlPmk8Fyp4lyf6.8eVs4LoGhailnWCXU6r9ss3sM2TnuRPiW', NULL, '2022-02-02 04:00:25', '2022-02-16 14:08:28', NULL, 1, NULL, NULL),
(3, '31033322424', '+57', 'Client2 Testing', 'Client_test2', '5', '1212121212', 8, 1, 17, NULL, '1', 'cliente2.test@gestorintegarl.com', NULL, '$2y$10$.ubkt5Wb9pbfqjX4zDQttOPIje1cW4yl4FtOfH/YAPIRqB7Si3U2.', NULL, '2022-02-02 04:00:25', '2022-02-02 04:00:25', NULL, 1, NULL, NULL),
(4, '310333223', '+57', 'Tutor1 Testing', 'Tutor_test1', '5', '121212121', 8, 1, 9, 1, '2', 'Tutor1.test@gestorintegarl.com', NULL, '$2y$10$Du5HGUfY/wrZcqJ9GVdCSelT.BNXdE0THYEf/pTXzfzImZrSoYktC', NULL, '2022-02-02 04:00:25', '2022-02-22 01:57:06', NULL, 1, NULL, NULL),
(5, '3103332334', '+57', 'Tutor2 Testing', 'Tutor_test2', '5', '121212126996', 8, 1, 17, NULL, '1', 'Tutor2.test@gestorintegarl.com', NULL, '$2y$10$0znu49tO3p/NBgzbodwM6uV0RPMPQhEBqLdSpPK/MtbTlezQfv8G2', NULL, '2022-02-02 04:00:25', '2022-02-02 04:00:25', NULL, 1, NULL, NULL),
(6, '310333220080', '+57', 'Comercial2 Testing', 'Comercial_test1', '5', '12121219692', 8, 1, 17, NULL, '1', 'Comercial1.test@gestorintegarl.com', NULL, '$2y$10$hrzZSbop6OEAVp7zxsxTNexbSEtxoHsZlY21gq7QSWERQnR1VYbjy', NULL, '2022-02-02 04:00:26', '2022-02-08 04:33:44', NULL, 1, NULL, NULL),
(7, '3103332979724', '+57', 'Comercial2 Testing', 'Comercial_test2', '5', '121215757212', 8, 1, 17, NULL, '1', 'Comercial2.test@gestorintegarl.com', NULL, '$2y$10$5aHElTCYZl4V3o03kepwzu3fSJCSsJzi/GW.Bgn2Jcdfo26.lwuby', NULL, '2022-02-02 04:00:26', '2022-02-02 04:00:26', NULL, 1, NULL, NULL),
(8, '31023251452', '+57', NULL, 'Juan_1523', NULL, NULL, 8, 11, 15, NULL, '1', NULL, NULL, '$2y$10$1xeH1nLX0Yi9lC27A9jN1O5B/5lwE5e5Xs/iSLi.htnmd2ccapCbO', NULL, '2022-02-21 21:07:10', '2022-02-21 21:07:10', NULL, NULL, NULL, NULL),
(9, '4567897654', '+55', 'tutor003', 'tutor003', '13', '89345678', 4, 6, NULL, 0, '1', 'edward04112arevalo@gmail.com', NULL, '$2y$10$wCsk7tHTM99mRqxCrFRDSuPUUPEOB2pabH5Ll.OYxTkdkuQcC/c56', NULL, '2022-02-22 13:02:15', '2022-02-22 13:15:04', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wallet_details`
--

CREATE TABLE `wallet_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` double(8,2) NOT NULL COMMENT 'valor de pago',
  `trm_assigned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'referencia',
  `vaucher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'factura',
  `observation` text COLLATE utf8mb4_unicode_ci,
  `wallet_virtual_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wallet_details`
--

INSERT INTO `wallet_details` (`id`, `value`, `trm_assigned`, `reference`, `vaucher`, `observation`, `wallet_virtual_id`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 99707.00, NULL, 'SAB88885', NULL, NULL, 1, NULL, NULL, NULL, '2022-02-22 03:31:39', '2022-02-22 03:31:39', NULL),
(2, 78638.00, NULL, 'SAB92743', NULL, NULL, 1, NULL, NULL, NULL, '2022-02-22 03:31:40', '2022-02-22 03:31:40', NULL),
(3, 90413.00, NULL, 'SAB97599', NULL, NULL, 2, NULL, NULL, NULL, '2022-02-22 03:31:41', '2022-02-22 03:31:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wallet_virtual`
--

CREATE TABLE `wallet_virtual` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 = Pte_pago; 2 = paagda;',
  `work_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `wallet_virtual`
--

INSERT INTO `wallet_virtual` (`id`, `status`, `work_id`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, '2022-02-22 03:31:39', '2022-02-22 03:31:39', NULL),
(2, 1, 1, NULL, NULL, NULL, '2022-02-22 03:31:40', '2022-02-22 03:31:40', NULL),
(3, 1, 2, NULL, NULL, NULL, '2022-02-22 03:31:41', '2022-02-22 03:31:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL COMMENT 'fecha de inicio',
  `end_date` date NOT NULL COMMENT 'fecha de fin',
  `request_quote_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `works`
--

INSERT INTO `works` (`id`, `start_date`, `end_date`, `request_quote_id`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2022-02-21', '2022-02-21', 1, NULL, NULL, NULL, '2022-02-22 03:31:38', '2022-02-22 03:31:38', NULL),
(2, '2022-02-21', '2022-02-21', 2, NULL, NULL, NULL, '2022-02-22 03:31:40', '2022-02-22 03:31:40', NULL),
(3, '2022-02-21', '2022-02-21', 3, NULL, NULL, NULL, '2022-02-22 03:31:41', '2022-02-22 03:31:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work_details`
--

CREATE TABLE `work_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `deleted_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `work_details`
--

INSERT INTO `work_details` (`id`, `observation`, `file`, `work_id`, `created_by`, `updated_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, 1, NULL, NULL, NULL, '2022-02-22 03:31:39', '2022-02-22 03:31:39', NULL),
(2, NULL, NULL, 1, NULL, NULL, NULL, '2022-02-22 03:31:41', '2022-02-22 03:31:41', NULL),
(3, NULL, NULL, 3, NULL, NULL, NULL, '2022-02-22 03:31:41', '2022-02-22 03:31:41', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin_process`
--
ALTER TABLE `admin_process`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_process_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bonds`
--
ALTER TABLE `bonds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bonds_id_user_foreign` (`id_user`),
  ADD KEY `bonds_id_type_bond_foreign` (`id_type_bond`),
  ADD KEY `bonds_id_type_value_foreign` (`id_type_value`),
  ADD KEY `bonds_id_coin_foreign` (`id_coin`);

--
-- Indices de la tabla `bond_quotes`
--
ALTER TABLE `bond_quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bond_quotes_bond_id_foreign` (`bond_id`),
  ADD KEY `bond_quotes_request_quote_id_foreign` (`request_quote_id`);

--
-- Indices de la tabla `change_requests`
--
ALTER TABLE `change_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `change_requests_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `communications`
--
ALTER TABLE `communications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communications_id_user_foreign` (`id_user`),
  ADD KEY `communications_id_request_foreign` (`id_request`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deliverables`
--
ALTER TABLE `deliverables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliverables_work_id_foreign` (`work_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `language_tutors`
--
ALTER TABLE `language_tutors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_tutors_id_user_foreign` (`id_user`),
  ADD KEY `language_tutors_id_language_foreign` (`id_language`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_id_user_foreign` (`id_user`),
  ADD KEY `messages_id_communication_foreign` (`id_communication`);

--
-- Indices de la tabla `messages_admin`
--
ALTER TABLE `messages_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_admin_id_user_foreign` (`id_user`),
  ADD KEY `messages_admin_id_admin_process_foreign` (`id_admin_process`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `observations_services`
--
ALTER TABLE `observations_services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parametrics`
--
ALTER TABLE `parametrics`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_payment_reference_unique` (`payment_reference`),
  ADD KEY `payments_request_quote_id_foreign` (`request_quote_id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_type_service_id_foreign` (`type_service_id`),
  ADD KEY `requests_request_state_id_foreign` (`request_state_id`),
  ADD KEY `requests_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `request_files`
--
ALTER TABLE `request_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_files_request_id_foreign` (`request_id`);

--
-- Indices de la tabla `request_history`
--
ALTER TABLE `request_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_history_request_id_foreign` (`request_id`),
  ADD KEY `request_history_request_state_id_foreign` (`request_state_id`);

--
-- Indices de la tabla `request_languages`
--
ALTER TABLE `request_languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_languages_request_id_foreign` (`request_id`),
  ADD KEY `request_languages_language_id_foreign` (`language_id`);

--
-- Indices de la tabla `request_questions`
--
ALTER TABLE `request_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_questions_type_service_id_foreign` (`type_service_id`);

--
-- Indices de la tabla `request_quotes`
--
ALTER TABLE `request_quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_quotes_request_quote_tutor_id_foreign` (`request_quote_tutor_id`),
  ADD KEY `request_quotes_utility_type_id_foreign` (`utility_type_id`);

--
-- Indices de la tabla `request_quote_tutors`
--
ALTER TABLE `request_quote_tutors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_quote_tutors_user_id_foreign` (`user_id`),
  ADD KEY `request_quote_tutors_request_id_foreign` (`request_id`);

--
-- Indices de la tabla `request_responses`
--
ALTER TABLE `request_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_responses_request_id_foreign` (`request_id`),
  ADD KEY `request_responses_request_question_id_foreign` (`request_question_id`);

--
-- Indices de la tabla `request_states`
--
ALTER TABLE `request_states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `request_systems`
--
ALTER TABLE `request_systems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_systems_request_id_foreign` (`request_id`),
  ADD KEY `request_systems_system_id_foreign` (`system_id`);

--
-- Indices de la tabla `request_topics`
--
ALTER TABLE `request_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_topics_request_id_foreign` (`request_id`),
  ADD KEY `request_topics_topic_id_foreign` (`topic_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_id_area_foreign` (`id_area`);

--
-- Indices de la tabla `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_id_subject_foreign` (`id_subject`);

--
-- Indices de la tabla `tutors_bank_details`
--
ALTER TABLE `tutors_bank_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutors_bank_details_id_user_foreign` (`id_user`),
  ADD KEY `tutors_bank_details_id_bank_foreign` (`id_bank`),
  ADD KEY `tutors_bank_details_id_type_account_foreign` (`id_type_account`);

--
-- Indices de la tabla `tutors_services`
--
ALTER TABLE `tutors_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutors_services_id_user_foreign` (`id_user`),
  ADD KEY `tutors_services_id_service_foreign` (`id_service`);

--
-- Indices de la tabla `tutors_systems`
--
ALTER TABLE `tutors_systems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutors_systems_id_user_foreign` (`id_user`),
  ADD KEY `tutors_systems_id_system_foreign` (`id_system`);

--
-- Indices de la tabla `tutors_topics`
--
ALTER TABLE `tutors_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutors_topics_id_user_foreign` (`id_user`),
  ADD KEY `tutors_topics_id_topic_foreign` (`id_topic`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_u_key_number_unique` (`u_key_number`),
  ADD UNIQUE KEY `users_u_nickname_unique` (`u_nickname`);

--
-- Indices de la tabla `wallet_details`
--
ALTER TABLE `wallet_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_details_wallet_virtual_id_foreign` (`wallet_virtual_id`);

--
-- Indices de la tabla `wallet_virtual`
--
ALTER TABLE `wallet_virtual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_virtual_work_id_foreign` (`work_id`);

--
-- Indices de la tabla `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `works_request_quote_id_foreign` (`request_quote_id`);

--
-- Indices de la tabla `work_details`
--
ALTER TABLE `work_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_details_work_id_foreign` (`work_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin_process`
--
ALTER TABLE `admin_process`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `bonds`
--
ALTER TABLE `bonds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `bond_quotes`
--
ALTER TABLE `bond_quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `change_requests`
--
ALTER TABLE `change_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `coins`
--
ALTER TABLE `coins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `communications`
--
ALTER TABLE `communications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `deliverables`
--
ALTER TABLE `deliverables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `language_tutors`
--
ALTER TABLE `language_tutors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `messages_admin`
--
ALTER TABLE `messages_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `observations_services`
--
ALTER TABLE `observations_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `parametrics`
--
ALTER TABLE `parametrics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `request_files`
--
ALTER TABLE `request_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `request_history`
--
ALTER TABLE `request_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `request_languages`
--
ALTER TABLE `request_languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `request_questions`
--
ALTER TABLE `request_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `request_quotes`
--
ALTER TABLE `request_quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT de la tabla `request_quote_tutors`
--
ALTER TABLE `request_quote_tutors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `request_responses`
--
ALTER TABLE `request_responses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `request_states`
--
ALTER TABLE `request_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `request_systems`
--
ALTER TABLE `request_systems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `request_topics`
--
ALTER TABLE `request_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT de la tabla `tutors_bank_details`
--
ALTER TABLE `tutors_bank_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tutors_services`
--
ALTER TABLE `tutors_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tutors_systems`
--
ALTER TABLE `tutors_systems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tutors_topics`
--
ALTER TABLE `tutors_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `wallet_details`
--
ALTER TABLE `wallet_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `wallet_virtual`
--
ALTER TABLE `wallet_virtual`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `work_details`
--
ALTER TABLE `work_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admin_process`
--
ALTER TABLE `admin_process`
  ADD CONSTRAINT `admin_process_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `bonds`
--
ALTER TABLE `bonds`
  ADD CONSTRAINT `bonds_id_coin_foreign` FOREIGN KEY (`id_coin`) REFERENCES `coins` (`id`),
  ADD CONSTRAINT `bonds_id_type_bond_foreign` FOREIGN KEY (`id_type_bond`) REFERENCES `parametrics` (`id`),
  ADD CONSTRAINT `bonds_id_type_value_foreign` FOREIGN KEY (`id_type_value`) REFERENCES `parametrics` (`id`),
  ADD CONSTRAINT `bonds_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `bond_quotes`
--
ALTER TABLE `bond_quotes`
  ADD CONSTRAINT `bond_quotes_bond_id_foreign` FOREIGN KEY (`bond_id`) REFERENCES `bonds` (`id`),
  ADD CONSTRAINT `bond_quotes_request_quote_id_foreign` FOREIGN KEY (`request_quote_id`) REFERENCES `request_quotes` (`id`);

--
-- Filtros para la tabla `change_requests`
--
ALTER TABLE `change_requests`
  ADD CONSTRAINT `change_requests_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `communications`
--
ALTER TABLE `communications`
  ADD CONSTRAINT `communications_id_request_foreign` FOREIGN KEY (`id_request`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `communications_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `deliverables`
--
ALTER TABLE `deliverables`
  ADD CONSTRAINT `deliverables_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`);

--
-- Filtros para la tabla `language_tutors`
--
ALTER TABLE `language_tutors`
  ADD CONSTRAINT `language_tutors_id_language_foreign` FOREIGN KEY (`id_language`) REFERENCES `parametrics` (`id`),
  ADD CONSTRAINT `language_tutors_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_id_communication_foreign` FOREIGN KEY (`id_communication`) REFERENCES `communications` (`id`),
  ADD CONSTRAINT `messages_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `messages_admin`
--
ALTER TABLE `messages_admin`
  ADD CONSTRAINT `messages_admin_id_admin_process_foreign` FOREIGN KEY (`id_admin_process`) REFERENCES `admin_process` (`id`),
  ADD CONSTRAINT `messages_admin_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

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
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_request_quote_id_foreign` FOREIGN KEY (`request_quote_id`) REFERENCES `request_quotes` (`id`);

--
-- Filtros para la tabla `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_request_state_id_foreign` FOREIGN KEY (`request_state_id`) REFERENCES `request_states` (`id`),
  ADD CONSTRAINT `requests_type_service_id_foreign` FOREIGN KEY (`type_service_id`) REFERENCES `parametrics` (`id`),
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `request_files`
--
ALTER TABLE `request_files`
  ADD CONSTRAINT `request_files_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`);

--
-- Filtros para la tabla `request_history`
--
ALTER TABLE `request_history`
  ADD CONSTRAINT `request_history_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `request_history_request_state_id_foreign` FOREIGN KEY (`request_state_id`) REFERENCES `request_states` (`id`);

--
-- Filtros para la tabla `request_languages`
--
ALTER TABLE `request_languages`
  ADD CONSTRAINT `request_languages_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `parametrics` (`id`),
  ADD CONSTRAINT `request_languages_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`);

--
-- Filtros para la tabla `request_questions`
--
ALTER TABLE `request_questions`
  ADD CONSTRAINT `request_questions_type_service_id_foreign` FOREIGN KEY (`type_service_id`) REFERENCES `parametrics` (`id`);

--
-- Filtros para la tabla `request_quotes`
--
ALTER TABLE `request_quotes`
  ADD CONSTRAINT `request_quotes_request_quote_tutor_id_foreign` FOREIGN KEY (`request_quote_tutor_id`) REFERENCES `request_quote_tutors` (`id`),
  ADD CONSTRAINT `request_quotes_utility_type_id_foreign` FOREIGN KEY (`utility_type_id`) REFERENCES `parametrics` (`id`);

--
-- Filtros para la tabla `request_quote_tutors`
--
ALTER TABLE `request_quote_tutors`
  ADD CONSTRAINT `request_quote_tutors_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_quote_tutors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `request_responses`
--
ALTER TABLE `request_responses`
  ADD CONSTRAINT `request_responses_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `request_responses_request_question_id_foreign` FOREIGN KEY (`request_question_id`) REFERENCES `request_questions` (`id`);

--
-- Filtros para la tabla `request_systems`
--
ALTER TABLE `request_systems`
  ADD CONSTRAINT `request_systems_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `request_systems_system_id_foreign` FOREIGN KEY (`system_id`) REFERENCES `parametrics` (`id`);

--
-- Filtros para la tabla `request_topics`
--
ALTER TABLE `request_topics`
  ADD CONSTRAINT `request_topics_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`),
  ADD CONSTRAINT `request_topics_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_id_area_foreign` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id`);

--
-- Filtros para la tabla `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_id_subject_foreign` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id`);

--
-- Filtros para la tabla `tutors_bank_details`
--
ALTER TABLE `tutors_bank_details`
  ADD CONSTRAINT `tutors_bank_details_id_bank_foreign` FOREIGN KEY (`id_bank`) REFERENCES `parametrics` (`id`),
  ADD CONSTRAINT `tutors_bank_details_id_type_account_foreign` FOREIGN KEY (`id_type_account`) REFERENCES `parametrics` (`id`),
  ADD CONSTRAINT `tutors_bank_details_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `tutors_services`
--
ALTER TABLE `tutors_services`
  ADD CONSTRAINT `tutors_services_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `parametrics` (`id`),
  ADD CONSTRAINT `tutors_services_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `tutors_systems`
--
ALTER TABLE `tutors_systems`
  ADD CONSTRAINT `tutors_systems_id_system_foreign` FOREIGN KEY (`id_system`) REFERENCES `parametrics` (`id`),
  ADD CONSTRAINT `tutors_systems_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `tutors_topics`
--
ALTER TABLE `tutors_topics`
  ADD CONSTRAINT `tutors_topics_id_topic_foreign` FOREIGN KEY (`id_topic`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `tutors_topics_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `wallet_details`
--
ALTER TABLE `wallet_details`
  ADD CONSTRAINT `wallet_details_wallet_virtual_id_foreign` FOREIGN KEY (`wallet_virtual_id`) REFERENCES `wallet_virtual` (`id`);

--
-- Filtros para la tabla `wallet_virtual`
--
ALTER TABLE `wallet_virtual`
  ADD CONSTRAINT `wallet_virtual_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`);

--
-- Filtros para la tabla `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_request_quote_id_foreign` FOREIGN KEY (`request_quote_id`) REFERENCES `request_quotes` (`id`);

--
-- Filtros para la tabla `work_details`
--
ALTER TABLE `work_details`
  ADD CONSTRAINT `work_details_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
