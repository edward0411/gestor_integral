-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-01-2022 a las 18:55:27
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
(1, 'Salud Ocupacional', 100, 1, '2021-12-13 03:20:02', '2021-12-13 03:24:54', NULL, 12, 12, NULL);

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
  `deleted_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bonds`
--

INSERT INTO `bonds` (`id`, `id_user`, `id_type_bond`, `id_type_value`, `b_value`, `b_state`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 3, 24, 21, 88, 1, '2022-01-18 17:59:45', '2022-01-18 18:31:22', NULL, 1, NULL, NULL),
(2, 3, 23, 22, 150000, 1, '2022-01-18 18:36:02', '2022-01-18 18:36:02', NULL, 1, NULL, NULL);

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
(3, 'Balboa panameño', 'PAB', '3900.00', 100, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(4, 'Bolívar fuerte', 'VEF', '839.00', 200, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(5, 'Boliviano', 'BOB', '560.00', 300, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(6, 'Colón costarricense', 'CRC', '6.10', 400, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(7, 'Córdoba nicaragüense', 'NIO', '110.00', 500, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(8, 'Dólar australiano', 'AUD', '2700.00', 600, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(9, 'Dólar canadiense', 'CAD', '3050.00', 700, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(10, 'Dólar de Singapur', 'SGD', '2850.00', 800, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(11, 'Dólar estadounidense', 'USD', '3800.00', 900, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(12, 'Euro', 'EUR', '4300.00', 1000, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(13, 'Guaraní', 'PYG', '0.50', 1100, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(14, 'Nuevo sol', 'PEN', '950.00', 1200, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(15, 'Peso argentino', 'ARS', '38.00', 1300, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(16, 'Peso chileno', 'CLP', '4.50', 1400, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(17, 'Peso colombiano', 'COP', '1.00', 1500, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(18, 'Peso dominicano', 'DOP', '68.00', 1600, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(19, 'Peso mexicano', 'MXN', '185.00', 1700, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(20, 'Peso uruguayo', 'UYU', '88.00', 1800, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(21, 'Quetzal guatemalteco', 'GTQ', '505.00', 1900, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(22, 'Real brasileño', 'BRL', '690.00', 2000, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL),
(23, 'Yuan chino', 'CNY', '610.00', 2100, 1, '2021-12-12 21:45:15', NULL, NULL, 1, NULL, NULL);

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
(1, '', 'Argentina', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(2, '', 'Australia', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(3, '', 'Bolivia', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(4, '', 'Brasil', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(5, '', 'Canadá', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(6, '', 'Chile', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(7, '', 'China', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(8, '', 'Colombia', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(9, '', 'Costa Rica', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(10, '', 'Ecuador', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(11, '', 'EEUU', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(12, '', 'El Salvador', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(13, '', 'España', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(14, '', 'Finlandia', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(15, '', 'Francia', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(16, '', 'Guatemala', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(17, '', 'Italia', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(18, '', 'Mexico', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(19, '', 'Nicaragua', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(20, '', 'Panamá', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(21, '', 'Paraguay', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(22, '', 'Perú', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(23, '', 'Puerto Rico', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(24, '', 'Rep Dominicana', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(25, '', 'Singapur', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(26, '', 'Uruguay', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL),
(27, '', 'Venezuela', '2021-12-12 20:52:21', NULL, NULL, 1, NULL, NULL);

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
(1, 2, 13, 'certificación.pdf', NULL, 2, NULL, '2022-01-14 14:18:58', NULL, NULL, NULL, NULL),
(2, 2, 12, 'orden_externa.pdf', NULL, 0, '2022-01-17 22:22:13', '2022-01-17 22:22:44', NULL, NULL, NULL, NULL);

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
(4, '2021_11_27_113307_create_parametrics_table', 1),
(5, '2021_11_29_191725_create_permission_tables', 1),
(6, '2021_11_29_213537_alter_users', 1),
(7, '2021_11_27_113309_create_parametrics_table', 2),
(8, '2021_12_02_192730_create_countries_table', 2),
(9, '2021_12_04_144727_alter_roles', 2),
(10, '2021_12_12_120603_alter_users_state', 3),
(11, '2021_12_10_194140_create_coins_table', 4),
(12, '2021_12_12_162916_alter_coins_table', 5),
(13, '2021_12_12_130413_create_areas_table', 6),
(14, '2021_12_12_162238_create_subjects_table', 6),
(15, '2021_12_12_162654_create_topics_table', 6),
(16, '2021_12_12_174533_alter_parametrics_table', 6),
(17, '2021_12_22_085134_alter_countries_table', 7),
(18, '2021_12_27_174423_create_language_tutors_table', 7),
(19, '2021_12_27_174857_create_tutors_topics_table', 7),
(20, '2021_12_27_174949_create_tutors_systems_table', 7),
(21, '2021_12_27_175108_create_tutors_bank_details_table', 7),
(22, '2021_12_27_185143_create_tutors_services_table', 7),
(23, '2022_01_10_214513_create_bonds_table', 8),
(24, '2022_01_11_184552_alter_table_tutors_bank_details', 9),
(25, '2022_01_14_115926_alter_table_add_observation', 10),
(26, '2022_01_17_120054_alter_table_changed_nullable', 11);

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
(6, 'App\\User', 2),
(4, 'App\\User', 3);

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
(5, 'type_documents', 'Cédula Ciudadania', 100, NULL, NULL, NULL, 1, NULL, NULL),
(6, 'type_documents', 'Pasaporte', 200, NULL, NULL, NULL, 1, NULL, NULL),
(7, 'type_documents', 'NIT', 300, NULL, NULL, NULL, 1, NULL, NULL),
(8, 'type_documents', 'Cédula Extranjera', 400, NULL, NULL, NULL, 1, NULL, NULL),
(9, 'param_list_banks', 'Bancolombia s.a.', 100, '2022-01-11 23:56:20', NULL, NULL, 1, NULL, NULL),
(10, 'param_type_acount', 'Cuenta de Ahorros', 100, '2022-01-11 23:58:48', NULL, NULL, 1, NULL, NULL),
(11, 'param_type_acount', 'Cuenta Corriente', 200, '2022-01-11 23:58:48', NULL, NULL, 1, NULL, NULL),
(12, 'param_list_languages', 'Ingles', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'param_list_languages', 'Español', 200, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'param_list_systems', 'Excell', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'param_list_systems', 'Word', 200, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'param_list_services', 'Clase', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'param_list_services', 'Tesis', 200, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'param_list_services', 'Materia virtual', 300, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'param_list_services', 'Trabajo', 400, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'param_list_services', 'Examen', 500, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'param_type_value', 'Porcentaje', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'param_type_value', 'Valor', 200, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'param_type_bonds', 'Bono', 100, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'param_type_bonds', 'Anticipo', 200, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'Administrador', 'web', '2022-01-04 02:46:30', '2022-01-04 02:46:30'),
(2, 'Administrador_clientes_ver', 'web', '2022-01-04 02:46:30', '2022-01-04 02:46:30'),
(3, 'Administrador_clientes_crear', 'web', '2022-01-04 02:46:30', '2022-01-04 02:46:30'),
(4, 'Administrador_clientes_editar', 'web', '2022-01-04 02:46:30', '2022-01-04 02:46:30'),
(5, 'Administrador_clientes_activar', 'web', '2022-01-04 02:46:30', '2022-01-04 02:46:30'),
(6, 'Administrador_clientes_inactivar', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(7, 'Administrador_tutores_ver', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(8, 'Administrador_tutores_crear', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(9, 'Administrador_tutores_editar', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(10, 'Administrador_tutores_activar', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(11, 'Administrador_tutores_inactivar', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(12, 'Administrador_empleados_ver', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(13, 'Administrador_empleados_crear', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(14, 'Administrador_empleados_editar', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(15, 'Administrador_empleados_eliminar', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(16, 'Administrador_roles_ver', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(17, 'Administrador_roles_crear', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(18, 'Administrador_roles_editar', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(19, 'Administrador_roles_eliminar', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(20, 'Administrador_paises_ver', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(21, 'Administrador_paises_crear', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(22, 'Administrador_paises_editar', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(23, 'Administrador_paises_eliminar', 'web', '2022-01-04 02:46:31', '2022-01-04 02:46:31'),
(24, 'Administrador_parametricas_ver', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(25, 'Administrador_parametricas_crear', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(26, 'Administrador_parametricas_editar', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(27, 'Administrador_parametricas_eliminar', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(28, 'Administrador_monedas_ver', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(29, 'Administrador_monedas_crear', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(30, 'Administrador_monedas_editar', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(31, 'Administrador_monedas_eliminar', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(32, 'Administrador_areas_ver', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(33, 'Administrador_areas_crear', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(34, 'Administrador_areas_editar', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(35, 'Administrador_areas_eliminar', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(36, 'Preregistro', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(37, 'Preregistro_historial_ver', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(38, 'Preregistro_listado_ver', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(39, 'Perfil', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(40, 'Perfil_datosBasicos_ver', 'web', '2022-01-04 02:46:32', '2022-01-04 02:46:32'),
(41, 'Perfil_bonos_ver', 'web', '2022-01-04 02:46:33', '2022-01-04 02:46:33'),
(42, 'Comunicaciones', 'web', '2022-01-04 02:46:33', '2022-01-04 02:46:33'),
(43, 'Comunicaciones_bandeja', 'web', '2022-01-04 02:46:33', '2022-01-04 02:46:33'),
(44, 'Cotizaciones', 'web', '2022-01-10 19:49:59', '2022-01-10 19:49:59'),
(45, 'Cotizaciones_pendientes_ver', 'web', '2022-01-10 19:49:59', '2022-01-10 19:49:59'),
(46, 'Cotizaciones_historial_ver', 'web', '2022-01-10 19:49:59', '2022-01-10 19:49:59'),
(47, 'Cotizaciones_misCotizaciones_ver', 'web', '2022-01-10 19:49:59', '2022-01-10 19:49:59'),
(48, 'Billetera_virtual', 'web', '2022-01-10 19:49:59', '2022-01-10 19:49:59'),
(49, 'Billetera_virtual_miBilletera_ver', 'web', '2022-01-10 19:49:59', '2022-01-10 19:49:59'),
(50, 'Billetera_virtual_HistoriarPagos_ver', 'web', '2022-01-10 19:49:59', '2022-01-10 19:49:59'),
(51, 'Pagos', 'web', '2022-01-10 19:50:00', '2022-01-10 19:50:00'),
(52, 'Pagos_HistorialPagosClientes_ver', 'web', '2022-01-10 19:50:00', '2022-01-10 19:50:00'),
(53, 'Reportes', 'web', '2022-01-10 19:50:00', '2022-01-10 19:50:00'),
(54, 'Reportes_Listado_ver', 'web', '2022-01-10 19:50:00', '2022-01-10 19:50:00');

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
(1, 'Administrador', 'web', '2021-12-03 01:01:37', '2021-12-03 01:01:37', NULL),
(2, 'Configuracion', 'web', '2021-12-03 01:01:38', '2021-12-03 01:01:38', NULL),
(3, 'Comercial', 'web', '2021-12-03 01:01:38', '2021-12-03 01:01:38', NULL),
(4, 'Cliente', 'web', '2021-12-03 01:01:38', '2021-12-03 01:01:38', NULL),
(5, 'Monitor', 'web', '2021-12-03 01:01:38', '2021-12-03 01:01:38', NULL),
(6, 'Tutor', 'web', '2021-12-03 01:01:38', '2021-12-03 01:01:38', NULL);

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
(54, 1);

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
(1, 1, 'enfermeria basica', 100, 1, '2021-12-13 03:25:21', '2021-12-13 03:27:36', NULL, 12, 12, NULL);

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
(1, 1, 'Vacunción', 100, 1, NULL, NULL, NULL, NULL, NULL, NULL);

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
  `t_b_namefile` text COLLATE utf8mb4_unicode_ci,
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
(1, 2, 9, 11, '11254', 'Certificado_MTE0NDE1Mjk2Nw==_55765679.pdf', 2, 'prueba de aprobación', NULL, '2022-01-17 22:19:07', '2022-01-17 22:19:07', NULL, 2, NULL),
(2, 2, 9, 11, '444444444444', 'Cuenta_corriente.pdf', 1, 'Aprobado', '2022-01-12 00:03:07', '2022-01-17 22:32:37', NULL, 1, 2, NULL),
(3, 2, 9, 10, '8526588', 'cedula Edward Arevalo.pdf', 2, 'Por motivos', '2022-01-12 04:04:54', '2022-01-18 18:37:50', NULL, 2, 2, NULL),
(4, 2, 9, 11, '225563325214', 'Carta familiar.pdf', 0, NULL, '2022-01-12 04:06:08', '2022-01-12 04:06:08', NULL, 2, NULL, NULL),
(5, 2, 9, 10, '65456765456', 'Certificado - comunicacion-asertiva.pdf', 0, NULL, '2022-01-12 04:10:05', '2022-01-12 04:10:05', NULL, 2, NULL, NULL),
(6, 2, 9, 10, '3456765456', 'cedula Edward Arevalo.pdf', 0, NULL, '2022-01-12 04:30:41', '2022-01-12 04:30:41', NULL, 2, NULL, NULL),
(7, 2, 9, 10, '111111111', 'Certificado_MTE0NDE1Mjk2Nw==_55765679.pdf', 0, NULL, '2022-01-12 04:49:11', '2022-01-12 04:49:11', NULL, 2, NULL, NULL),
(8, 2, 9, 10, '8526588888', 'Certificado_MTE0NDE1Mjk2Nw==_55765679.pdf', 0, NULL, '2022-01-12 15:36:07', '2022-01-12 15:36:08', NULL, 2, NULL, NULL),
(9, 2, 9, 10, '8526588', 'Certificado_MTE0NDE1Mjk2Nw==_55765679.pdf', 0, NULL, '2022-01-12 15:38:05', '2022-01-12 15:38:05', NULL, 2, NULL, NULL),
(10, 2, 9, 10, '8526588', 'Certificado_MTE0NDE1Mjk2Nw==_55765679.pdf', 0, NULL, '2022-01-12 15:38:13', '2022-01-12 15:38:14', NULL, 2, NULL, NULL),
(11, 2, 9, 11, '85265884689', 'Certificado_MTE0NDE1Mjk2Nw==_55765679.pdf', 0, NULL, '2022-01-12 15:40:37', '2022-01-12 15:40:37', NULL, 2, NULL, NULL),
(12, 2, 9, 11, '3454565', 'Certificado_MTE0NDE1Mjk2Nw==_55765679.pdf', 0, NULL, '2022-01-12 15:41:06', '2022-01-12 15:41:06', NULL, 2, NULL, NULL);

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
(1, 2, 17, NULL, 0, '2022-01-17 22:44:26', '2022-01-17 22:44:26', NULL, NULL, NULL, NULL),
(2, 2, 17, NULL, 0, '2022-01-17 22:44:32', '2022-01-17 22:44:32', NULL, NULL, NULL, NULL),
(3, 2, 17, NULL, 0, '2022-01-17 22:44:39', '2022-01-17 22:44:39', NULL, NULL, NULL, NULL),
(4, 2, 20, NULL, 0, '2022-01-17 22:45:22', '2022-01-17 22:49:15', '2022-01-17 22:49:15', NULL, NULL, NULL),
(5, 2, 20, NULL, 0, '2022-01-17 22:45:58', '2022-01-17 22:49:32', NULL, NULL, NULL, NULL),
(6, 2, 20, NULL, 0, '2022-01-17 22:56:47', '2022-01-17 22:56:47', NULL, NULL, NULL, NULL);

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
(1, 2, 14, 'orden_externa.pdf', NULL, 0, '2022-01-17 22:51:04', '2022-01-17 22:51:50', '2022-01-17 22:51:50', NULL, NULL, NULL);

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
(1, 2, 1, 'orden_externa.pdf', NULL, 0, '2022-01-17 22:29:48', '2022-01-17 22:44:01', '2022-01-17 22:44:01', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `u_key_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_indicativo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_type_doc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_num_doc` int(11) DEFAULT NULL,
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
(1, '3103332244', '+57', 'Soporte Testing', 'Soporte_test', '5', 1234567890, 8, 1, 17, NULL, '1', 'soporte.test@gestorintegarl.com', NULL, '$2y$10$rZXg9v/c4LU2444bIEKBUuVOuAMbxM/uET0XLM8NqRiOITrTlrJuO', NULL, '2021-12-13 03:59:04', '2021-12-13 03:59:04', NULL, 1, NULL, NULL),
(2, '3214456677', '+57', 'Alfredo Lopez', 'totor0515', '5', 232321234, 8, 1, NULL, 1, '1', 'tutor0515@gmail.com', NULL, '$2y$10$kAL.bQgRhsN5jozDJulVWeNtNoiDkROvIm0Xcpgsom25KWNzZnfoS', NULL, '2022-01-05 02:39:19', '2022-01-14 14:51:24', NULL, NULL, NULL, NULL),
(3, '30521254563', '+57', 'Jose Romero', 'JoseRomero1234', NULL, NULL, 8, 1, 17, NULL, '2', 'Jose12345romero@test.com', NULL, '$2y$10$9nBJnzNptEaRyvf5PyXLCuO2uy4ecmJ/IjprCuIX8iRaUZsgjgVku', NULL, '2022-01-15 19:01:56', '2022-01-18 17:24:42', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

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
  ADD KEY `bonds_id_type_value_foreign` (`id_type_value`);

--
-- Indices de la tabla `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `bonds`
--
ALTER TABLE `bonds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `coins`
--
ALTER TABLE `coins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `language_tutors`
--
ALTER TABLE `language_tutors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `parametrics`
--
ALTER TABLE `parametrics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tutors_bank_details`
--
ALTER TABLE `tutors_bank_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tutors_services`
--
ALTER TABLE `tutors_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tutors_systems`
--
ALTER TABLE `tutors_systems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tutors_topics`
--
ALTER TABLE `tutors_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bonds`
--
ALTER TABLE `bonds`
  ADD CONSTRAINT `bonds_id_type_bond_foreign` FOREIGN KEY (`id_type_bond`) REFERENCES `parametrics` (`id`),
  ADD CONSTRAINT `bonds_id_type_value_foreign` FOREIGN KEY (`id_type_value`) REFERENCES `parametrics` (`id`),
  ADD CONSTRAINT `bonds_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `language_tutors`
--
ALTER TABLE `language_tutors`
  ADD CONSTRAINT `language_tutors_id_language_foreign` FOREIGN KEY (`id_language`) REFERENCES `parametrics` (`id`),
  ADD CONSTRAINT `language_tutors_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
