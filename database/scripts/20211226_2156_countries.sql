-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-12-2021 a las 02:54:06
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
(1, '+54', 'Argentina', '2021-12-12 20:52:21', '2021-12-22 15:10:17', NULL, 1, 11, NULL),
(2, '+61', 'Australia', '2021-12-12 20:52:21', '2021-12-22 15:45:38', NULL, 1, 11, NULL),
(3, '+591', 'Bolivia', '2021-12-12 20:52:21', '2021-12-22 15:46:03', NULL, 1, 11, NULL),
(4, '+55', 'Brasil', '2021-12-12 20:52:21', '2021-12-22 15:46:22', NULL, 1, 11, NULL),
(5, '+1', 'Canadá', '2021-12-12 20:52:21', '2021-12-22 15:46:42', NULL, 1, 11, NULL),
(6, '+56', 'Chile', '2021-12-12 20:52:21', '2021-12-22 15:46:59', NULL, 1, 11, NULL),
(7, '+86', 'China', '2021-12-12 20:52:21', '2021-12-22 15:47:53', NULL, 1, 11, NULL),
(8, '+57', 'Colombia', '2021-12-12 20:52:21', '2021-12-22 14:54:57', NULL, 1, 11, NULL),
(9, '+506', 'Costa Rica', '2021-12-12 20:52:21', '2021-12-22 15:48:20', NULL, 1, 11, NULL),
(10, '+593', 'Ecuador', '2021-12-12 20:52:21', '2021-12-22 15:48:36', NULL, 1, 11, NULL),
(11, '+1', 'EEUU', '2021-12-12 20:52:21', '2021-12-22 15:48:58', NULL, 1, 11, NULL),
(12, '+503', 'El Salvador', '2021-12-12 20:52:21', '2021-12-22 15:49:21', NULL, 1, 11, NULL),
(13, '+34', 'España', '2021-12-12 20:52:21', '2021-12-22 15:49:38', NULL, 1, 11, NULL),
(14, '+358', 'Finlandia', '2021-12-12 20:52:21', '2021-12-22 15:50:20', NULL, 1, 11, NULL),
(15, '+33', 'Francia', '2021-12-12 20:52:21', '2021-12-22 15:50:43', NULL, 1, 11, NULL),
(16, '+502', 'Guatemala', '2021-12-12 20:52:21', '2021-12-22 15:51:11', NULL, 1, 11, NULL),
(17, '+93', 'Italia', '2021-12-12 20:52:21', '2021-12-22 15:53:18', NULL, 1, 11, NULL),
(18, '+52', 'Mexico', '2021-12-12 20:52:21', '2021-12-22 15:53:44', NULL, 1, 11, NULL),
(19, '+505', 'Nicaragua', '2021-12-12 20:52:21', '2021-12-22 15:54:07', NULL, 1, 11, NULL),
(20, '+507', 'Panamá', '2021-12-12 20:52:21', '2021-12-22 15:54:26', NULL, 1, 11, NULL),
(21, '+595', 'Paraguay', '2021-12-12 20:52:21', '2021-12-22 15:54:46', NULL, 1, 11, NULL),
(22, '+51', 'Perú', '2021-12-12 20:52:21', '2021-12-22 15:57:43', NULL, 1, 11, NULL),
(23, '+1787', 'Puerto Rico', '2021-12-12 20:52:21', '2021-12-22 15:58:09', NULL, 1, 11, NULL),
(24, '+1809', 'Rep Dominicana', '2021-12-12 20:52:21', '2021-12-22 15:44:41', NULL, 1, 11, NULL),
(25, '+65', 'Singapur', '2021-12-12 20:52:21', '2021-12-22 15:16:22', NULL, 1, 11, NULL),
(26, '+598', 'Uruguay', '2021-12-12 20:52:21', '2021-12-22 15:15:47', NULL, 1, 11, NULL),
(27, '+58', 'Venezuela', '2021-12-12 20:52:21', '2021-12-22 15:15:18', NULL, 1, 11, NULL),
(28, '+966', 'Arabia', '2021-12-22 15:07:01', '2021-12-22 15:07:01', NULL, 11, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
