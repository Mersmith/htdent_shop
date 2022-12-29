-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-12-2022 a las 10:10:31
-- Versión del servidor: 10.3.37-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `htdentshopdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradors`
--

CREATE TABLE `administradors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `rol` varchar(255) DEFAULT 'administrador',
  `imagen_ruta` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `administradors`
--

INSERT INTO `administradors` (`id`, `user_id`, `nombre`, `apellido`, `correo`, `celular`, `rol`, `imagen_ruta`, `created_at`, `updated_at`) VALUES
(1, 1, 'Susanna Cummings', 'Kshlerin', 'mersmith14@gmail.com', '+1-475-725-2196', 'administrador', NULL, '2022-12-21 02:05:28', '2022-12-21 02:05:28'),
(2, 3, 'Prof. Hillard Leuschke', 'Langworth', 'jacinthe09@example.com', '272-265-6662', 'administrador', NULL, '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(3, 4, 'Edward Trantow', 'Kessler', 'nolan.benton@example.com', '+1.352.493.2919', 'administrador', NULL, '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(4, 5, 'Emilio Swaniawski', 'Hyatt', 'schimmel.dora@example.net', '+1-854-561-9379', 'administrador', NULL, '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(5, 6, 'Prof. Gloria Denesik PhD', 'Wilderman', 'morgan.lesch@example.com', '(339) 765-3066', 'administrador', NULL, '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(6, 7, 'Augusta Langosh PhD', 'Graham', 'vida.senger@example.org', '+1-303-319-7061', 'administrador', NULL, '2022-12-21 02:05:29', '2022-12-21 02:05:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `imagen_ruta` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `slug`, `icono`, `imagen_ruta`, `created_at`, `updated_at`) VALUES
(2, 'Equipos Intraorales', 'equipos-intraorales', '<i class=\"fa-solid fa-box\"></i>', 'categorias/NojajqzGma7OsIjzO27GyHsOq8T3KuKedyfDT2MH.jpg', '2022-12-21 03:40:53', '2022-12-21 03:40:53'),
(3, 'Equipos Extraorales', 'equipos-extraorales', '<i class=\"fa-solid fa-box\"></i>', 'categorias/e4rvFUEIrtvNNWHVEVlbKjIN8z1WRTZmbV7zSCsD.jpg', '2022-12-21 22:32:10', '2022-12-21 22:32:10'),
(4, 'Implantes', 'implantes', '<i class=\"fa-solid fa-box\"></i>', 'categorias/t3UmXBflweJZbUfEl6JLb8SEbbCW0H95u8z9GLX7.png', '2022-12-22 01:24:16', '2022-12-22 01:24:16'),
(6, 'Materiales', 'materiales', '<i class=\"fa-solid fa-box\"></i>', 'categorias/KUe6R0UvHWq7raBowHG2sDguUxn837RmkEMfnVGq.png', '2022-12-23 22:28:46', '2022-12-23 22:28:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_marca`
--

CREATE TABLE `categoria_marca` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `marca_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_marca`
--

INSERT INTO `categoria_marca` (`id`, `categoria_id`, `marca_id`, `created_at`, `updated_at`) VALUES
(2, 2, 10, NULL, NULL),
(3, 2, 12, NULL, NULL),
(4, 2, 13, NULL, NULL),
(5, 3, 14, NULL, NULL),
(6, 3, 13, NULL, NULL),
(7, 4, 11, NULL, NULL),
(8, 4, 15, NULL, NULL),
(10, 6, 14, NULL, NULL),
(11, 2, 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ckeditors`
--

CREATE TABLE `ckeditors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen_ruta` varchar(255) NOT NULL,
  `ckeditorable_id` bigint(20) UNSIGNED NOT NULL,
  `ckeditorable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ckeditors`
--

INSERT INTO `ckeditors` (`id`, `imagen_ruta`, `ckeditorable_id`, `ckeditorable_type`, `created_at`, `updated_at`) VALUES
(2, 'ckeditor/tienda_008190_6553cfe8a7ddb0c91bbf7b67d9af25d8b33d7247_producto_xlarge_100.png', 4, 'App\\Models\\Producto', '2022-12-21 23:02:41', '2022-12-21 23:02:41'),
(3, 'ckeditor/tienda_008190_925d76fd72109c29c09168f71ebc50d0044c7702_producto_xlarge_100.png', 4, 'App\\Models\\Producto', '2022-12-21 23:02:41', '2022-12-21 23:02:41'),
(4, 'ckeditor/tienda_008190_33c7d7973ba5a977318d651c814c1ab5b224da75_producto_xlarge_100.png', 4, 'App\\Models\\Producto', '2022-12-21 23:02:41', '2022-12-21 23:02:41'),
(7, 'ckeditor/e8oWKrnBrucS1RitHpXNEbd2H2C6Fm5QogWviUIw.png', 4, 'App\\Models\\Producto', '2022-12-22 00:50:14', '2022-12-22 00:50:14'),
(8, 'ckeditor/EIjcnur3AeIHzQvQH61ysgVi0dCqUkiQqWJ8M9BX.png', 4, 'App\\Models\\Producto', '2022-12-22 00:50:14', '2022-12-22 00:50:14'),
(9, 'ckeditor/fce06cefe89f3752aa72e44c3024efcf.jpg', 5, 'App\\Models\\Producto', '2022-12-22 01:18:34', '2022-12-22 01:18:34'),
(10, 'ckeditor/A9-02.png', 5, 'App\\Models\\Producto', '2022-12-22 01:18:34', '2022-12-22 01:18:34'),
(11, 'ckeditor/8ba8fef20f7da9ef7b90bd10bd9db23c.png', 5, 'App\\Models\\Producto', '2022-12-22 01:18:34', '2022-12-22 01:18:34'),
(12, 'ckeditor/A9-03.png', 5, 'App\\Models\\Producto', '2022-12-22 01:18:34', '2022-12-22 01:18:34'),
(13, 'ckeditor/5_Pax-i3D_22.png', 5, 'App\\Models\\Producto', '2022-12-22 01:18:34', '2022-12-22 01:18:34'),
(14, 'ckeditor/5_Pax-i3D_22.png', 5, 'App\\Models\\Producto', '2022-12-22 01:18:34', '2022-12-22 01:18:34'),
(15, 'ckeditor/A9-04.png', 5, 'App\\Models\\Producto', '2022-12-22 01:18:34', '2022-12-22 01:18:34'),
(16, 'ckeditor/a8c2180cd6d798c2e1e00bad88e5a23c.png', 5, 'App\\Models\\Producto', '2022-12-22 01:18:34', '2022-12-22 01:18:34'),
(17, 'ckeditor/4fbb62eb3ba5a062616f92ddeb4f91b7.png', 5, 'App\\Models\\Producto', '2022-12-22 01:18:34', '2022-12-22 01:18:34'),
(18, 'ckeditor/592be15421a966356d84353b932a9e6b.png', 5, 'App\\Models\\Producto', '2022-12-22 01:18:34', '2022-12-22 01:18:34'),
(19, 'ckeditor/fDR7rBoomN5Q1zZTrFAeuxcAXka3XqIXHDjxdfbR.png', 15, 'App\\Models\\Producto', '2022-12-27 20:00:41', '2022-12-27 20:00:41'),
(20, 'ckeditor/0KOiXZYVemL2GenB1E08N6ZV15zL5oSWxCaLcm2X.jpg', 15, 'App\\Models\\Producto', '2022-12-27 20:00:42', '2022-12-27 20:00:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `puntos` int(11) DEFAULT 0,
  `rol` varchar(255) DEFAULT 'cliente',
  `imagen_ruta` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `user_id`, `nombre`, `apellido`, `correo`, `celular`, `puntos`, `rol`, `imagen_ruta`, `created_at`, `updated_at`) VALUES
(1, 2, 'Keaton Friesen', 'Schaden', 'sistemas3@digident.com.pe', '925.329.3021', 100, 'cliente', 'perfiles/clientes/X2wlXZv8sysLxn2jjArZMQKwddJ3bWzmXQfU6O9Q.jpg', '2022-12-21 02:05:29', '2022-12-23 03:30:23'),
(2, 8, 'Dena Collier', 'Stehr', 'treva.kshlerin@example.net', '(475) 854-5011', 500, 'cliente', NULL, '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(3, 9, 'Gianni Klein', 'Walsh', 'vspinka@example.com', '+1 (678) 286-1708', 50, 'cliente', NULL, '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(4, 10, 'Chance Price', 'Auer', 'jimmy99@example.net', '843-827-9327', 500, 'cliente', NULL, '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(5, 11, 'Mrs. Libby Nicolas', 'Effertz', 'morgan.hagenes@example.org', '+1 (682) 239-1202', 70, 'cliente', NULL, '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(6, 12, 'Quinton Bernhard', 'Mayert', 'jeff25@example.net', '(540) 352-1624', 70, 'cliente', NULL, '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(7, 13, 'clarita', 'rey', 'sistemas2@digident.com.pe', '943584264', 0, 'cliente', '', '2022-12-23 02:25:13', '2022-12-23 02:25:59'),
(8, 14, 'clarita', 'rey', 'sistemas1@digident.com.pe', '94325843', 0, 'cliente', 'perfiles/clientes/IgSKKbHCT3Wb1TQyiJoKpfrJNvx0O12DRywB5i7T.png', '2022-12-23 02:53:25', '2022-12-23 03:09:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'ninguno', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(2, 'blanco', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(3, 'A1', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(4, 'A2', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(5, 'A3', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(6, 'A3.5', '2022-12-21 02:05:29', '2022-12-21 02:05:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color_medida`
--

CREATE TABLE `color_medida` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `medida_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `color_medida`
--

INSERT INTO `color_medida` (`id`, `color_id`, `medida_id`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, NULL, NULL),
(2, 1, 2, 5, NULL, NULL),
(3, 1, 3, 5, NULL, NULL),
(4, 1, 4, 5, NULL, NULL),
(5, 1, 5, 5, NULL, NULL),
(6, 1, 6, 5, NULL, NULL),
(7, 1, 7, 5, NULL, NULL),
(8, 1, 8, 5, NULL, NULL),
(9, 1, 9, 5, NULL, NULL),
(10, 1, 10, 5, NULL, NULL),
(11, 1, 11, 5, NULL, NULL),
(12, 1, 12, 5, NULL, NULL),
(13, 1, 13, 5, NULL, NULL),
(14, 1, 14, 5, NULL, NULL),
(15, 1, 15, 5, NULL, NULL),
(16, 1, 16, 5, NULL, NULL),
(17, 1, 17, 5, NULL, NULL),
(18, 1, 18, 5, NULL, NULL),
(19, 1, 19, 5, NULL, NULL),
(20, 1, 20, 5, NULL, NULL),
(21, 1, 21, 5, NULL, NULL),
(22, 1, 22, 5, NULL, NULL),
(23, 1, 23, 5, NULL, NULL),
(24, 1, 24, 5, NULL, NULL),
(25, 1, 25, 5, NULL, NULL),
(26, 1, 26, 5, NULL, NULL),
(27, 1, 27, 5, NULL, NULL),
(28, 1, 28, 5, NULL, NULL),
(29, 1, 29, 5, NULL, NULL),
(30, 1, 30, 5, NULL, NULL),
(31, 1, 31, 5, NULL, NULL),
(32, 1, 32, 5, NULL, NULL),
(33, 1, 33, 5, NULL, NULL),
(34, 1, 34, 5, NULL, NULL),
(35, 1, 35, 5, NULL, NULL),
(36, 1, 36, 5, NULL, NULL),
(37, 3, 42, 5, NULL, NULL),
(38, 2, 42, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color_producto`
--

CREATE TABLE `color_producto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupons`
--

CREATE TABLE `cupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `tipo` enum('fijo','porcentaje') NOT NULL DEFAULT 'fijo',
  `descuento` double(8,2) NOT NULL,
  `carrito_monto` double(8,2) NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'AMAZONAS', NULL, NULL),
(2, 'ANCASH', NULL, NULL),
(3, 'APURIMAC', NULL, NULL),
(4, 'AREQUIPA', NULL, NULL),
(5, 'AYACUCHO', NULL, NULL),
(6, 'CAJAMARCA', NULL, NULL),
(7, 'CUSCO', NULL, NULL),
(8, 'HUANCAVELICA', NULL, NULL),
(9, 'HUANUCO', NULL, NULL),
(10, 'ICA', NULL, NULL),
(11, 'JUNIN', NULL, NULL),
(12, 'LA LIBERTAD', NULL, NULL),
(13, 'LAMBAYEQUE', NULL, NULL),
(14, 'LIMA', NULL, NULL),
(15, 'LORETO', NULL, NULL),
(16, 'MADRE DE DIOS', NULL, NULL),
(17, 'MOQUEGUA', NULL, NULL),
(18, 'PASCO', NULL, NULL),
(19, 'PIURA', NULL, NULL),
(20, 'PUNO', NULL, NULL),
(21, 'SAN MARTIN', NULL, NULL),
(22, 'TACNA', NULL, NULL),
(23, 'TUMBES', NULL, NULL),
(24, 'UCAYALI', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccions`
--

CREATE TABLE `direccions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `departamento_id` varchar(255) NOT NULL,
  `departamento_nombre` varchar(255) NOT NULL,
  `provincia_id` varchar(255) NOT NULL,
  `provincia_nombre` varchar(255) NOT NULL,
  `distrito_id` varchar(255) NOT NULL,
  `distrito_nombre` varchar(255) NOT NULL,
  `codigo_postal` varchar(255) NOT NULL,
  `posicion` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `provincia_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id`, `nombre`, `provincia_id`, `created_at`, `updated_at`) VALUES
(1, 'ARAMANGO', 1, NULL, NULL),
(2, 'COPALLIN', 1, NULL, NULL),
(3, 'EL PARCO', 1, NULL, NULL),
(4, 'IMAZA', 1, NULL, NULL),
(5, 'LA PECA', 1, NULL, NULL),
(6, 'CHISQUILLA', 2, NULL, NULL),
(7, 'CHURUJA', 2, NULL, NULL),
(8, 'COROSHA', 2, NULL, NULL),
(9, 'CUISPES', 2, NULL, NULL),
(10, 'FLORIDA', 2, NULL, NULL),
(11, 'JAZAN', 2, NULL, NULL),
(12, 'JUMBILLA', 2, NULL, NULL),
(13, 'RECTA', 2, NULL, NULL),
(14, 'SAN CARLOS', 2, NULL, NULL),
(15, 'SHIPASBAMBA', 2, NULL, NULL),
(16, 'VALERA', 2, NULL, NULL),
(17, 'YAMBRASBAMBA', 2, NULL, NULL),
(18, 'ASUNCION', 3, NULL, NULL),
(19, 'BALSAS', 3, NULL, NULL),
(20, 'CHACHAPOYAS', 3, NULL, NULL),
(21, 'CHETO', 3, NULL, NULL),
(22, 'CHILIQUIN', 3, NULL, NULL),
(23, 'CHUQUIBAMBA', 3, NULL, NULL),
(24, 'GRANADA', 3, NULL, NULL),
(25, 'HUANCAS', 3, NULL, NULL),
(26, 'LA JALCA', 3, NULL, NULL),
(27, 'LEIMEBAMBA', 3, NULL, NULL),
(28, 'LEVANTO', 3, NULL, NULL),
(29, 'MAGDALENA', 3, NULL, NULL),
(30, 'MARISCAL CASTILLA', 3, NULL, NULL),
(31, 'MOLINOPAMPA', 3, NULL, NULL),
(32, 'MONTEVIDEO', 3, NULL, NULL),
(33, 'OLLEROS', 3, NULL, NULL),
(34, 'QUINJALCA', 3, NULL, NULL),
(35, 'SAN FRANCISCO DE DAGUAS', 3, NULL, NULL),
(36, 'SAN ISIDRO DE MAINO', 3, NULL, NULL),
(37, 'SOLOCO', 3, NULL, NULL),
(38, 'SONCHE', 3, NULL, NULL),
(39, 'EL CENEPA', 4, NULL, NULL),
(40, 'NIEVA', 4, NULL, NULL),
(41, 'RIO SANTIAGO', 4, NULL, NULL),
(42, 'CAMPORREDONDO', 5, NULL, NULL),
(43, 'COCABAMBA', 5, NULL, NULL),
(44, 'COLCAMAR', 5, NULL, NULL),
(45, 'CONILA', 5, NULL, NULL),
(46, 'INGUILPATA', 5, NULL, NULL),
(47, 'LAMUD', 5, NULL, NULL),
(48, 'LONGUITA', 5, NULL, NULL),
(49, 'LONYA CHICO', 5, NULL, NULL),
(50, 'LUYA', 5, NULL, NULL),
(51, 'LUYA VIEJO', 5, NULL, NULL),
(52, 'MARIA', 5, NULL, NULL),
(53, 'OCALLI', 5, NULL, NULL),
(54, 'OCUMAL', 5, NULL, NULL),
(55, 'PISUQUIA', 5, NULL, NULL),
(56, 'PROVIDENCIA', 5, NULL, NULL),
(57, 'SAN CRISTOBAL', 5, NULL, NULL),
(58, 'SAN FRANCISCO DEL YESO', 5, NULL, NULL),
(59, 'SAN JERONIMO', 5, NULL, NULL),
(60, 'SAN JUAN DE LOPECANCHA', 5, NULL, NULL),
(61, 'SANTA CATALINA', 5, NULL, NULL),
(62, 'SANTO TOMAS', 5, NULL, NULL),
(63, 'TINGO', 5, NULL, NULL),
(64, 'TRITA', 5, NULL, NULL),
(65, 'CHIRIMOTO', 6, NULL, NULL),
(66, 'COCHAMAL', 6, NULL, NULL),
(67, 'HUAMBO', 6, NULL, NULL),
(68, 'LIMABAMBA', 6, NULL, NULL),
(69, 'LONGAR', 6, NULL, NULL),
(70, 'MARISCAL BENAVIDES', 6, NULL, NULL),
(71, 'MILPUC', 6, NULL, NULL),
(72, 'OMIA', 6, NULL, NULL),
(73, 'SAN NICOLAS', 6, NULL, NULL),
(74, 'SANTA ROSA', 6, NULL, NULL),
(75, 'TOTORA', 6, NULL, NULL),
(76, 'VISTA ALEGRE', 6, NULL, NULL),
(77, 'BAGUA GRANDE', 7, NULL, NULL),
(78, 'CAJARURO', 7, NULL, NULL),
(79, 'CUMBA', 7, NULL, NULL),
(80, 'EL MILAGRO', 7, NULL, NULL),
(81, 'JAMALCA', 7, NULL, NULL),
(82, 'LONYA GRANDE', 7, NULL, NULL),
(83, 'YAMON', 7, NULL, NULL),
(84, 'AIJA', 8, NULL, NULL),
(85, 'CORIS', 8, NULL, NULL),
(86, 'HUACLLAN', 8, NULL, NULL),
(87, 'LA MERCED', 8, NULL, NULL),
(88, 'SUCCHA', 8, NULL, NULL),
(89, 'ACZO', 9, NULL, NULL),
(90, 'CHACCHO', 9, NULL, NULL),
(91, 'CHINGAS', 9, NULL, NULL),
(92, 'LLAMELLIN', 9, NULL, NULL),
(93, 'MIRGAS', 9, NULL, NULL),
(94, 'SAN JUAN DE RONTOY', 9, NULL, NULL),
(95, 'ACOCHACA', 10, NULL, NULL),
(96, 'CHACAS', 10, NULL, NULL),
(97, 'ABELARDO PARDO LEZAMETA', 11, NULL, NULL),
(98, 'ANTONIO RAYMONDI', 11, NULL, NULL),
(99, 'AQUIA', 11, NULL, NULL),
(100, 'CAJACAY', 11, NULL, NULL),
(101, 'CANIS', 11, NULL, NULL),
(102, 'CHIQUIAN', 11, NULL, NULL),
(103, 'COLQUIOC', 11, NULL, NULL),
(104, 'HUALLANCA', 11, NULL, NULL),
(105, 'HUASTA', 11, NULL, NULL),
(106, 'HUAYLLACAYAN', 11, NULL, NULL),
(107, 'LA PRIMAVERA', 11, NULL, NULL),
(108, 'MANGAS', 11, NULL, NULL),
(109, 'PACLLON', 11, NULL, NULL),
(110, 'SAN MIGUEL DE CORPANQUI', 11, NULL, NULL),
(111, 'TICLLOS', 11, NULL, NULL),
(112, 'ACOPAMPA', 12, NULL, NULL),
(113, 'AMASHCA', 12, NULL, NULL),
(114, 'ANTA', 12, NULL, NULL),
(115, 'ATAQUERO', 12, NULL, NULL),
(116, 'CARHUAZ', 12, NULL, NULL),
(117, 'MARCARA', 12, NULL, NULL),
(118, 'PARIAHUANCA', 12, NULL, NULL),
(119, 'SAN MIGUEL DE ACO', 12, NULL, NULL),
(120, 'SHILLA', 12, NULL, NULL),
(121, 'TINCO', 12, NULL, NULL),
(122, 'YUNGAR', 12, NULL, NULL),
(123, 'SAN LUIS', 13, NULL, NULL),
(124, 'SAN NICOLAS', 13, NULL, NULL),
(125, 'YAUYA', 13, NULL, NULL),
(126, 'BUENA VISTA ALTA', 14, NULL, NULL),
(127, 'CASMA', 14, NULL, NULL),
(128, 'COMANDANTE NOEL', 14, NULL, NULL),
(129, 'YAUTAN', 14, NULL, NULL),
(130, 'ACO', 15, NULL, NULL),
(131, 'BAMBAS', 15, NULL, NULL),
(132, 'CORONGO', 15, NULL, NULL),
(133, 'CUSCA', 15, NULL, NULL),
(134, 'LA PAMPA', 15, NULL, NULL),
(135, 'YANAC', 15, NULL, NULL),
(136, 'YUPAN', 15, NULL, NULL),
(137, 'COCHABAMBA', 16, NULL, NULL),
(138, 'COLCABAMBA', 16, NULL, NULL),
(139, 'HUANCHAY', 16, NULL, NULL),
(140, 'HUARAZ', 16, NULL, NULL),
(141, 'INDEPENDENCIA', 16, NULL, NULL),
(142, 'JANGAS', 16, NULL, NULL),
(143, 'LA LIBERTAD', 16, NULL, NULL),
(144, 'OLLEROS', 16, NULL, NULL),
(145, 'PAMPAS', 16, NULL, NULL),
(146, 'PARIACOTO', 16, NULL, NULL),
(147, 'PIRA', 16, NULL, NULL),
(148, 'TARICA', 16, NULL, NULL),
(149, 'ANRA', 17, NULL, NULL),
(150, 'CAJAY', 17, NULL, NULL),
(151, 'CHAVIN DE HUANTAR', 17, NULL, NULL),
(152, 'HUACACHI', 17, NULL, NULL),
(153, 'HUACCHIS', 17, NULL, NULL),
(154, 'HUACHIS', 17, NULL, NULL),
(155, 'HUANTAR', 17, NULL, NULL),
(156, 'HUARI', 17, NULL, NULL),
(157, 'MASIN', 17, NULL, NULL),
(158, 'PAUCAS', 17, NULL, NULL),
(159, 'PONTO', 17, NULL, NULL),
(160, 'RAHUAPAMPA', 17, NULL, NULL),
(161, 'RAPAYAN', 17, NULL, NULL),
(162, 'SAN MARCOS', 17, NULL, NULL),
(163, 'SAN PEDRO DE CHANA', 17, NULL, NULL),
(164, 'UCO', 17, NULL, NULL),
(165, 'COCHAPETI', 18, NULL, NULL),
(166, 'CULEBRAS', 18, NULL, NULL),
(167, 'HUARMEY', 18, NULL, NULL),
(168, 'HUAYAN', 18, NULL, NULL),
(169, 'MALVAS', 18, NULL, NULL),
(170, 'CARAZ', 19, NULL, NULL),
(171, 'HUALLANCA', 19, NULL, NULL),
(172, 'HUATA', 19, NULL, NULL),
(173, 'HUAYLAS', 19, NULL, NULL),
(174, 'MATO', 19, NULL, NULL),
(175, 'PAMPAROMAS', 19, NULL, NULL),
(176, 'PUEBLO LIBRE', 19, NULL, NULL),
(177, 'SANTA CRUZ', 19, NULL, NULL),
(178, 'SANTO TORIBIO', 19, NULL, NULL),
(179, 'YURACMARCA', 19, NULL, NULL),
(180, 'CASCA', 20, NULL, NULL),
(181, 'ELEAZAR GUZMAN BARRON', 20, NULL, NULL),
(182, 'FIDEL OLIVAS ESCUDERO', 20, NULL, NULL),
(183, 'LLAMA', 20, NULL, NULL),
(184, 'LLUMPA', 20, NULL, NULL),
(185, 'LUCMA', 20, NULL, NULL),
(186, 'MUSGA', 20, NULL, NULL),
(187, 'PISCOBAMBA', 20, NULL, NULL),
(188, 'ACAS', 21, NULL, NULL),
(189, 'CAJAMARQUILLA', 21, NULL, NULL),
(190, 'CARHUAPAMPA', 21, NULL, NULL),
(191, 'COCHAS', 21, NULL, NULL),
(192, 'CONGAS', 21, NULL, NULL),
(193, 'LLIPA', 21, NULL, NULL),
(194, 'OCROS', 21, NULL, NULL),
(195, 'SAN CRISTOBAL DE RAJAN', 21, NULL, NULL),
(196, 'SAN PEDRO', 21, NULL, NULL),
(197, 'SANTIAGO DE CHILCAS', 21, NULL, NULL),
(198, 'BOLOGNESI', 22, NULL, NULL),
(199, 'CABANA', 22, NULL, NULL),
(200, 'CONCHUCOS', 22, NULL, NULL),
(201, 'HUACASCHUQUE', 22, NULL, NULL),
(202, 'HUANDOVAL', 22, NULL, NULL),
(203, 'LACABAMBA', 22, NULL, NULL),
(204, 'LLAPO', 22, NULL, NULL),
(205, 'PALLASCA', 22, NULL, NULL),
(206, 'PAMPAS', 22, NULL, NULL),
(207, 'SANTA ROSA', 22, NULL, NULL),
(208, 'TAUCA', 22, NULL, NULL),
(209, 'HUAYLLAN', 23, NULL, NULL),
(210, 'PAROBAMBA', 23, NULL, NULL),
(211, 'POMABAMBA', 23, NULL, NULL),
(212, 'QUINUABAMBA', 23, NULL, NULL),
(213, 'CATAC', 24, NULL, NULL),
(214, 'COTAPARACO', 24, NULL, NULL),
(215, 'HUAYLLAPAMPA', 24, NULL, NULL),
(216, 'LLACLLIN', 24, NULL, NULL),
(217, 'MARCA', 24, NULL, NULL),
(218, 'PAMPAS CHICO', 24, NULL, NULL),
(219, 'PARARIN', 24, NULL, NULL),
(220, 'RECUAY', 24, NULL, NULL),
(221, 'TAPACOCHA', 24, NULL, NULL),
(222, 'TICAPAMPA', 24, NULL, NULL),
(223, 'CACERES DEL PERU', 25, NULL, NULL),
(224, 'CHIMBOTE', 25, NULL, NULL),
(225, 'COISHCO', 25, NULL, NULL),
(226, 'MACATE', 25, NULL, NULL),
(227, 'MORO', 25, NULL, NULL),
(228, 'NEPEÑA', 25, NULL, NULL),
(229, 'NUEVO CHIMBOTE', 25, NULL, NULL),
(230, 'SAMANCO', 25, NULL, NULL),
(231, 'SANTA', 25, NULL, NULL),
(232, 'ACOBAMBA', 26, NULL, NULL),
(233, 'ALFONSO UGARTE', 26, NULL, NULL),
(234, 'CASHAPAMPA', 26, NULL, NULL),
(235, 'CHINGALPO', 26, NULL, NULL),
(236, 'HUAYLLABAMBA', 26, NULL, NULL),
(237, 'QUICHES', 26, NULL, NULL),
(238, 'RAGASH', 26, NULL, NULL),
(239, 'SAN JUAN', 26, NULL, NULL),
(240, 'SICSIBAMBA', 26, NULL, NULL),
(241, 'SIHUAS', 26, NULL, NULL),
(242, 'CASCAPARA', 27, NULL, NULL),
(243, 'MANCOS', 27, NULL, NULL),
(244, 'MATACOTO', 27, NULL, NULL),
(245, 'QUILLO', 27, NULL, NULL),
(246, 'RANRAHIRCA', 27, NULL, NULL),
(247, 'SHUPLUY', 27, NULL, NULL),
(248, 'YANAMA', 27, NULL, NULL),
(249, 'YUNGAY', 27, NULL, NULL),
(250, 'ABANCAY', 28, NULL, NULL),
(251, 'CHACOCHE', 28, NULL, NULL),
(252, 'CIRCA', 28, NULL, NULL),
(253, 'CURAHUASI', 28, NULL, NULL),
(254, 'HUANIPACA', 28, NULL, NULL),
(255, 'LAMBRAMA', 28, NULL, NULL),
(256, 'PICHIRHUA', 28, NULL, NULL),
(257, 'SAN PEDRO DE CACHORA', 28, NULL, NULL),
(258, 'TAMBURCO', 28, NULL, NULL),
(259, 'ANDAHUAYLAS', 29, NULL, NULL),
(260, 'ANDARAPA', 29, NULL, NULL),
(261, 'CHIARA', 29, NULL, NULL),
(262, 'HUANCARAMA', 29, NULL, NULL),
(263, 'HUANCARAY', 29, NULL, NULL),
(264, 'HUAYANA', 29, NULL, NULL),
(265, 'KAQUIABAMBA', 29, NULL, NULL),
(266, 'KISHUARA', 29, NULL, NULL),
(267, 'PACOBAMBA', 29, NULL, NULL),
(268, 'PACUCHA', 29, NULL, NULL),
(269, 'PAMPACHIRI', 29, NULL, NULL),
(270, 'POMACOCHA', 29, NULL, NULL),
(271, 'SAN ANTONIO DE CACHI', 29, NULL, NULL),
(272, 'SAN JERONIMO', 29, NULL, NULL),
(273, 'SAN MIGUEL DE CHACCRAMPA', 29, NULL, NULL),
(274, 'SANTA MARIA DE CHICMO', 29, NULL, NULL),
(275, 'TALAVERA', 29, NULL, NULL),
(276, 'TUMAY HUARACA', 29, NULL, NULL),
(277, 'TURPO', 29, NULL, NULL),
(278, 'ANTABAMBA', 30, NULL, NULL),
(279, 'EL ORO', 30, NULL, NULL),
(280, 'HUAQUIRCA', 30, NULL, NULL),
(281, 'JUAN ESPINOZA MEDRANO', 30, NULL, NULL),
(282, 'OROPESA', 30, NULL, NULL),
(283, 'PACHACONAS', 30, NULL, NULL),
(284, 'SABAINO', 30, NULL, NULL),
(285, 'CAPAYA', 31, NULL, NULL),
(286, 'CARAYBAMBA', 31, NULL, NULL),
(287, 'CHALHUANCA', 31, NULL, NULL),
(288, 'CHAPIMARCA', 31, NULL, NULL),
(289, 'COLCABAMBA', 31, NULL, NULL),
(290, 'COTARUSE', 31, NULL, NULL),
(291, 'HUAYLLO', 31, NULL, NULL),
(292, 'JUSTO APU SAHUARAURA', 31, NULL, NULL),
(293, 'LUCRE', 31, NULL, NULL),
(294, 'POCOHUANCA', 31, NULL, NULL),
(295, 'SAN JUAN DE CHACÑA', 31, NULL, NULL),
(296, 'SAÑAYCA', 31, NULL, NULL),
(297, 'SORAYA', 31, NULL, NULL),
(298, 'TAPAIRIHUA', 31, NULL, NULL),
(299, 'TINTAY', 31, NULL, NULL),
(300, 'TORAYA', 31, NULL, NULL),
(301, 'YANACA', 31, NULL, NULL),
(302, 'ANCO-HUALLO', 32, NULL, NULL),
(303, 'CHINCHEROS', 32, NULL, NULL),
(304, 'COCHARCAS', 32, NULL, NULL),
(305, 'HUACCANA', 32, NULL, NULL),
(306, 'OCOBAMBA', 32, NULL, NULL),
(307, 'ONGOY', 32, NULL, NULL),
(308, 'RANRACANCHA', 32, NULL, NULL),
(309, 'URANMARCA', 32, NULL, NULL),
(310, 'CHALLHUAHUACHO', 33, NULL, NULL),
(311, 'COTABAMBAS', 33, NULL, NULL),
(312, 'COYLLURQUI', 33, NULL, NULL),
(313, 'HAQUIRA', 33, NULL, NULL),
(314, 'MARA', 33, NULL, NULL),
(315, 'TAMBOBAMBA', 33, NULL, NULL),
(316, 'CHUQUIBAMBILLA', 34, NULL, NULL),
(317, 'CURASCO', 34, NULL, NULL),
(318, 'CURPAHUASI', 34, NULL, NULL),
(319, 'GAMARRA', 34, NULL, NULL),
(320, 'HUAYLLATI', 34, NULL, NULL),
(321, 'MAMARA', 34, NULL, NULL),
(322, 'MICAELA BASTIDAS', 34, NULL, NULL),
(323, 'PATAYPAMPA', 34, NULL, NULL),
(324, 'PROGRESO', 34, NULL, NULL),
(325, 'SAN ANTONIO', 34, NULL, NULL),
(326, 'SANTA ROSA', 34, NULL, NULL),
(327, 'TURPAY', 34, NULL, NULL),
(328, 'VILCABAMBA', 34, NULL, NULL),
(329, 'VIRUNDO', 34, NULL, NULL),
(330, 'ALTO SELVA ALEGRE', 35, NULL, NULL),
(331, 'AREQUIPA', 35, NULL, NULL),
(332, 'CAYMA', 35, NULL, NULL),
(333, 'CERRO COLORADO', 35, NULL, NULL),
(334, 'CHARACATO', 35, NULL, NULL),
(335, 'CHIGUATA', 35, NULL, NULL),
(336, 'JACOBO HUNTER', 35, NULL, NULL),
(337, 'JOSE LUIS BUSTAMANTE Y RIVERO', 35, NULL, NULL),
(338, 'LA JOYA', 35, NULL, NULL),
(339, 'MARIANO MELGAR', 35, NULL, NULL),
(340, 'MIRAFLORES', 35, NULL, NULL),
(341, 'MOLLEBAYA', 35, NULL, NULL),
(342, 'PAUCARPATA', 35, NULL, NULL),
(343, 'POCSI', 35, NULL, NULL),
(344, 'POLOBAYA', 35, NULL, NULL),
(345, 'QUEQUEÑA', 35, NULL, NULL),
(346, 'SABANDIA', 35, NULL, NULL),
(347, 'SACHACA', 35, NULL, NULL),
(348, 'SAN JUAN DE SIGUAS', 35, NULL, NULL),
(349, 'SAN JUAN DE TARUCANI', 35, NULL, NULL),
(350, 'SANTA ISABEL DE SIGUAS', 35, NULL, NULL),
(351, 'SANTA RITA DE SIGUAS', 35, NULL, NULL),
(352, 'SOCABAYA', 35, NULL, NULL),
(353, 'TIABAYA', 35, NULL, NULL),
(354, 'UCHUMAYO', 35, NULL, NULL),
(355, 'VITOR  1/', 35, NULL, NULL),
(356, 'YANAHUARA', 35, NULL, NULL),
(357, 'YARABAMBA', 35, NULL, NULL),
(358, 'YURA', 35, NULL, NULL),
(359, 'CAMANA', 36, NULL, NULL),
(360, 'JOSE MARIA QUIMPER', 36, NULL, NULL),
(361, 'MARIANO NICOLAS VALCARCEL', 36, NULL, NULL),
(362, 'MARISCAL CACERES', 36, NULL, NULL),
(363, 'NICOLAS DE PIEROLA', 36, NULL, NULL),
(364, 'OCOÑA', 36, NULL, NULL),
(365, 'QUILCA', 36, NULL, NULL),
(366, 'SAMUEL PASTOR', 36, NULL, NULL),
(367, 'ACARI', 37, NULL, NULL),
(368, 'ATICO', 37, NULL, NULL),
(369, 'ATIQUIPA', 37, NULL, NULL),
(370, 'BELLA UNION', 37, NULL, NULL),
(371, 'CAHUACHO', 37, NULL, NULL),
(372, 'CARAVELI', 37, NULL, NULL),
(373, 'CHALA', 37, NULL, NULL),
(374, 'CHAPARRA', 37, NULL, NULL),
(375, 'HUANUHUANU', 37, NULL, NULL),
(376, 'JAQUI', 37, NULL, NULL),
(377, 'LOMAS', 37, NULL, NULL),
(378, 'QUICACHA', 37, NULL, NULL),
(379, 'YAUCA', 37, NULL, NULL),
(380, 'ANDAGUA', 38, NULL, NULL),
(381, 'APLAO', 38, NULL, NULL),
(382, 'AYO', 38, NULL, NULL),
(383, 'CHACHAS', 38, NULL, NULL),
(384, 'CHILCAYMARCA', 38, NULL, NULL),
(385, 'CHOCO', 38, NULL, NULL),
(386, 'HUANCARQUI', 38, NULL, NULL),
(387, 'MACHAGUAY', 38, NULL, NULL),
(388, 'ORCOPAMPA', 38, NULL, NULL),
(389, 'PAMPACOLCA', 38, NULL, NULL),
(390, 'TIPAN', 38, NULL, NULL),
(391, 'UÑON', 38, NULL, NULL),
(392, 'URACA', 38, NULL, NULL),
(393, 'VIRACO', 38, NULL, NULL),
(394, 'ACHOMA', 39, NULL, NULL),
(395, 'CABANACONDE', 39, NULL, NULL),
(396, 'CALLALLI', 39, NULL, NULL),
(397, 'CAYLLOMA', 39, NULL, NULL),
(398, 'CHIVAY', 39, NULL, NULL),
(399, 'COPORAQUE', 39, NULL, NULL),
(400, 'HUAMBO', 39, NULL, NULL),
(401, 'HUANCA', 39, NULL, NULL),
(402, 'ICHUPAMPA', 39, NULL, NULL),
(403, 'LARI', 39, NULL, NULL),
(404, 'LLUTA', 39, NULL, NULL),
(405, 'MACA', 39, NULL, NULL),
(406, 'MADRIGAL', 39, NULL, NULL),
(407, 'MAJES', 39, NULL, NULL),
(408, 'SAN ANTONIO DE CHUCA', 39, NULL, NULL),
(409, 'SIBAYO', 39, NULL, NULL),
(410, 'TAPAY', 39, NULL, NULL),
(411, 'TISCO', 39, NULL, NULL),
(412, 'TUTI', 39, NULL, NULL),
(413, 'YANQUE', 39, NULL, NULL),
(414, 'ANDARAY', 40, NULL, NULL),
(415, 'CAYARANI', 40, NULL, NULL),
(416, 'CHICHAS', 40, NULL, NULL),
(417, 'CHUQUIBAMBA', 40, NULL, NULL),
(418, 'IRAY', 40, NULL, NULL),
(419, 'RIO GRANDE', 40, NULL, NULL),
(420, 'SALAMANCA', 40, NULL, NULL),
(421, 'YANAQUIHUA', 40, NULL, NULL),
(422, 'COCACHACRA', 41, NULL, NULL),
(423, 'DEAN VALDIVIA', 41, NULL, NULL),
(424, 'ISLAY', 41, NULL, NULL),
(425, 'MEJIA', 41, NULL, NULL),
(426, 'MOLLENDO', 41, NULL, NULL),
(427, 'PUNTA DE BOMBON', 41, NULL, NULL),
(428, 'ALCA', 42, NULL, NULL),
(429, 'CHARCANA', 42, NULL, NULL),
(430, 'COTAHUASI', 42, NULL, NULL),
(431, 'HUAYNACOTAS', 42, NULL, NULL),
(432, 'PAMPAMARCA', 42, NULL, NULL),
(433, 'PUYCA', 42, NULL, NULL),
(434, 'QUECHUALLA', 42, NULL, NULL),
(435, 'SAYLA', 42, NULL, NULL),
(436, 'TAURIA', 42, NULL, NULL),
(437, 'TOMEPAMPA', 42, NULL, NULL),
(438, 'TORO', 42, NULL, NULL),
(439, 'CANGALLO', 43, NULL, NULL),
(440, 'CHUSCHI', 43, NULL, NULL),
(441, 'LOS MOROCHUCOS', 43, NULL, NULL),
(442, 'MARIA PARADO DE BELLIDO', 43, NULL, NULL),
(443, 'PARAS', 43, NULL, NULL),
(444, 'TOTOS', 43, NULL, NULL),
(445, 'ACOCRO', 44, NULL, NULL),
(446, 'ACOS VINCHOS', 44, NULL, NULL),
(447, 'AYACUCHO', 44, NULL, NULL),
(448, 'CARMEN ALTO', 44, NULL, NULL),
(449, 'CHIARA', 44, NULL, NULL),
(450, 'JESUS NAZARENO', 44, NULL, NULL),
(451, 'OCROS', 44, NULL, NULL),
(452, 'PACAYCASA', 44, NULL, NULL),
(453, 'QUINUA', 44, NULL, NULL),
(454, 'SAN JOSE DE TICLLAS', 44, NULL, NULL),
(455, 'SAN JUAN BAUTISTA', 44, NULL, NULL),
(456, 'SANTIAGO DE PISCHA', 44, NULL, NULL),
(457, 'SOCOS', 44, NULL, NULL),
(458, 'TAMBILLO', 44, NULL, NULL),
(459, 'VINCHOS', 44, NULL, NULL),
(460, 'CARAPO', 45, NULL, NULL),
(461, 'SACSAMARCA', 45, NULL, NULL),
(462, 'SANCOS', 45, NULL, NULL),
(463, 'SANTIAGO DE LUCANAMARCA', 45, NULL, NULL),
(464, 'AYAHUANCO', 46, NULL, NULL),
(465, 'HUAMANGUILLA', 46, NULL, NULL),
(466, 'HUANTA', 46, NULL, NULL),
(467, 'IGUAIN', 46, NULL, NULL),
(468, 'LLOCHEGUA', 46, NULL, NULL),
(469, 'LURICOCHA', 46, NULL, NULL),
(470, 'SANTILLANA', 46, NULL, NULL),
(471, 'SIVIA', 46, NULL, NULL),
(472, 'ANCO', 47, NULL, NULL),
(473, 'AYNA', 47, NULL, NULL),
(474, 'CHILCAS', 47, NULL, NULL),
(475, 'CHUNGUI', 47, NULL, NULL),
(476, 'LUIS CARRANZA', 47, NULL, NULL),
(477, 'SAN MIGUEL', 47, NULL, NULL),
(478, 'SANTA ROSA', 47, NULL, NULL),
(479, 'TAMBO', 47, NULL, NULL),
(480, 'AUCARA', 48, NULL, NULL),
(481, 'CABANA', 48, NULL, NULL),
(482, 'CARMEN SALCEDO', 48, NULL, NULL),
(483, 'CHAVIÑA', 48, NULL, NULL),
(484, 'CHIPAO', 48, NULL, NULL),
(485, 'HUAC-HUAS', 48, NULL, NULL),
(486, 'LARAMATE', 48, NULL, NULL),
(487, 'LEONCIO PRADO', 48, NULL, NULL),
(488, 'LLAUTA', 48, NULL, NULL),
(489, 'LUCANAS', 48, NULL, NULL),
(490, 'OCAÑA', 48, NULL, NULL),
(491, 'OTOCA', 48, NULL, NULL),
(492, 'PUQUIO', 48, NULL, NULL),
(493, 'SAISA', 48, NULL, NULL),
(494, 'SAN CRISTOBAL', 48, NULL, NULL),
(495, 'SAN JUAN', 48, NULL, NULL),
(496, 'SAN PEDRO', 48, NULL, NULL),
(497, 'SAN PEDRO DE PALCO', 48, NULL, NULL),
(498, 'SANCOS', 48, NULL, NULL),
(499, 'SANTA ANA DE HUAYCAHUACHO', 48, NULL, NULL),
(500, 'SANTA LUCIA', 48, NULL, NULL),
(501, 'CHUMPI', 49, NULL, NULL),
(502, 'CORACORA', 49, NULL, NULL),
(503, 'CORONEL CASTAÑEDA', 49, NULL, NULL),
(504, 'PACAPAUSA', 49, NULL, NULL),
(505, 'PULLO', 49, NULL, NULL),
(506, 'PUYUSCA', 49, NULL, NULL),
(507, 'SAN FRANCISCO DE RAVACAYCO', 49, NULL, NULL),
(508, 'UPAHUACHO', 49, NULL, NULL),
(509, 'COLTA', 50, NULL, NULL),
(510, 'CORCULLA', 50, NULL, NULL),
(511, 'LAMPA', 50, NULL, NULL),
(512, 'MARCABAMBA', 50, NULL, NULL),
(513, 'OYOLO', 50, NULL, NULL),
(514, 'PARARCA', 50, NULL, NULL),
(515, 'PAUSA', 50, NULL, NULL),
(516, 'SAN JAVIER DE ALPABAMBA', 50, NULL, NULL),
(517, 'SAN JOSE DE USHUA', 50, NULL, NULL),
(518, 'SARA SARA', 50, NULL, NULL),
(519, 'BELEN', 51, NULL, NULL),
(520, 'CHALCOS', 51, NULL, NULL),
(521, 'CHILCAYOC', 51, NULL, NULL),
(522, 'HUACAÑA', 51, NULL, NULL),
(523, 'MORCOLLA', 51, NULL, NULL),
(524, 'PAICO', 51, NULL, NULL),
(525, 'QUEROBAMBA', 51, NULL, NULL),
(526, 'SAN PEDRO DE LARCAY', 51, NULL, NULL),
(527, 'SAN SALVADOR DE QUIJE', 51, NULL, NULL),
(528, 'SANTIAGO DE PAUCARAY', 51, NULL, NULL),
(529, 'SORAS', 51, NULL, NULL),
(530, 'ALCAMENCA', 52, NULL, NULL),
(531, 'APONGO', 52, NULL, NULL),
(532, 'ASQUIPATA', 52, NULL, NULL),
(533, 'CANARIA', 52, NULL, NULL),
(534, 'CAYARA', 52, NULL, NULL),
(535, 'COLCA', 52, NULL, NULL),
(536, 'HUAMANQUIQUIA', 52, NULL, NULL),
(537, 'HUANCAPI', 52, NULL, NULL),
(538, 'HUANCARAYLLA', 52, NULL, NULL),
(539, 'HUAYA', 52, NULL, NULL),
(540, 'SARHUA', 52, NULL, NULL),
(541, 'VILCANCHOS', 52, NULL, NULL),
(542, 'ACCOMARCA', 53, NULL, NULL),
(543, 'CARHUANCA', 53, NULL, NULL),
(544, 'CONCEPCION', 53, NULL, NULL),
(545, 'HUAMBALPA', 53, NULL, NULL),
(546, 'INDEPENDENCIA', 53, NULL, NULL),
(547, 'SAURAMA', 53, NULL, NULL),
(548, 'VILCAS HUAMAN', 53, NULL, NULL),
(549, 'VISCHONGO', 53, NULL, NULL),
(550, 'CACHACHI', 54, NULL, NULL),
(551, 'CAJABAMBA', 54, NULL, NULL),
(552, 'CONDEBAMBA', 54, NULL, NULL),
(553, 'SITACOCHA', 54, NULL, NULL),
(554, 'ASUNCION', 55, NULL, NULL),
(555, 'CAJAMARCA', 55, NULL, NULL),
(556, 'CHETILLA', 55, NULL, NULL),
(557, 'COSPAN', 55, NULL, NULL),
(558, 'ENCAÑADA', 55, NULL, NULL),
(559, 'JESUS', 55, NULL, NULL),
(560, 'LLACANORA', 55, NULL, NULL),
(561, 'LOS BAÑOS DEL INCA', 55, NULL, NULL),
(562, 'MAGDALENA', 55, NULL, NULL),
(563, 'MATARA', 55, NULL, NULL),
(564, 'NAMORA', 55, NULL, NULL),
(565, 'SAN JUAN', 55, NULL, NULL),
(566, 'CELENDIN', 56, NULL, NULL),
(567, 'CHUMUCH', 56, NULL, NULL),
(568, 'CORTEGANA', 56, NULL, NULL),
(569, 'HUASMIN', 56, NULL, NULL),
(570, 'JORGE CHAVEZ', 56, NULL, NULL),
(571, 'JOSE GALVEZ', 56, NULL, NULL),
(572, 'LA LIBERTAD DE PALLAN', 56, NULL, NULL),
(573, 'MIGUEL IGLESIAS', 56, NULL, NULL),
(574, 'OXAMARCA', 56, NULL, NULL),
(575, 'SOROCHUCO', 56, NULL, NULL),
(576, 'SUCRE', 56, NULL, NULL),
(577, 'UTCO', 56, NULL, NULL),
(578, 'ANGUIA', 57, NULL, NULL),
(579, 'CHADIN', 57, NULL, NULL),
(580, 'CHALAMARCA', 57, NULL, NULL),
(581, 'CHIGUIRIP', 57, NULL, NULL),
(582, 'CHIMBAN', 57, NULL, NULL),
(583, 'CHOROPAMPA', 57, NULL, NULL),
(584, 'CHOTA', 57, NULL, NULL),
(585, 'COCHABAMBA', 57, NULL, NULL),
(586, 'CONCHAN', 57, NULL, NULL),
(587, 'HUAMBOS', 57, NULL, NULL),
(588, 'LAJAS', 57, NULL, NULL),
(589, 'LLAMA', 57, NULL, NULL),
(590, 'MIRACOSTA', 57, NULL, NULL),
(591, 'PACCHA', 57, NULL, NULL),
(592, 'PION', 57, NULL, NULL),
(593, 'QUEROCOTO', 57, NULL, NULL),
(594, 'SAN JUAN DE LICUPIS', 57, NULL, NULL),
(595, 'TACABAMBA', 57, NULL, NULL),
(596, 'TOCMOCHE', 57, NULL, NULL),
(597, 'CHILETE', 58, NULL, NULL),
(598, 'CONTUMAZA', 58, NULL, NULL),
(599, 'CUPISNIQUE', 58, NULL, NULL),
(600, 'GUZMANGO', 58, NULL, NULL),
(601, 'SAN BENITO', 58, NULL, NULL),
(602, 'SANTA CRUZ DE TOLEDO', 58, NULL, NULL),
(603, 'TANTARICA', 58, NULL, NULL),
(604, 'YONAN', 58, NULL, NULL),
(605, 'CALLAYUC', 59, NULL, NULL),
(606, 'CHOROS', 59, NULL, NULL),
(607, 'CUJILLO', 59, NULL, NULL),
(608, 'CUTERVO', 59, NULL, NULL),
(609, 'LA RAMADA', 59, NULL, NULL),
(610, 'PIMPINGOS', 59, NULL, NULL),
(611, 'QUEROCOTILLO', 59, NULL, NULL),
(612, 'SAN ANDRES DE CUTERVO', 59, NULL, NULL),
(613, 'SAN JUAN DE CUTERVO', 59, NULL, NULL),
(614, 'SAN LUIS DE LUCMA', 59, NULL, NULL),
(615, 'SANTA CRUZ', 59, NULL, NULL),
(616, 'SANTO TOMAS', 59, NULL, NULL),
(617, 'SOCOTA', 59, NULL, NULL),
(618, 'STO. DOMINGO DE LA CAPILLA', 59, NULL, NULL),
(619, 'TORIBIO CASANOVA', 59, NULL, NULL),
(620, 'BAMBAMARCA', 60, NULL, NULL),
(621, 'CHUGUR', 60, NULL, NULL),
(622, 'HUALGAYOC', 60, NULL, NULL),
(623, 'BELLAVISTA', 61, NULL, NULL),
(624, 'CHONTALI', 61, NULL, NULL),
(625, 'COLASAY', 61, NULL, NULL),
(626, 'HUABAL', 61, NULL, NULL),
(627, 'JAEN', 61, NULL, NULL),
(628, 'LAS PIRIAS', 61, NULL, NULL),
(629, 'POMAHUACA', 61, NULL, NULL),
(630, 'PUCARA', 61, NULL, NULL),
(631, 'SALLIQUE', 61, NULL, NULL),
(632, 'SAN FELIPE', 61, NULL, NULL),
(633, 'SAN JOSE DEL ALTO', 61, NULL, NULL),
(634, 'SANTA ROSA', 61, NULL, NULL),
(635, 'CHIRINOS', 62, NULL, NULL),
(636, 'HUARANGO', 62, NULL, NULL),
(637, 'LA COIPA', 62, NULL, NULL),
(638, 'NAMBALLE', 62, NULL, NULL),
(639, 'SAN IGNACIO', 62, NULL, NULL),
(640, 'SAN JOSE DE LOURDES', 62, NULL, NULL),
(641, 'TABACONAS', 62, NULL, NULL),
(642, 'CHANCAY', 63, NULL, NULL),
(643, 'EDUARDO VILLANUEVA', 63, NULL, NULL),
(644, 'GREGORIO PITA', 63, NULL, NULL),
(645, 'ICHOCAN', 63, NULL, NULL),
(646, 'JOSE MANUEL QUIROZ', 63, NULL, NULL),
(647, 'JOSE SABOGAL', 63, NULL, NULL),
(648, 'PEDRO GALVEZ', 63, NULL, NULL),
(649, 'BOLIVAR', 64, NULL, NULL),
(650, 'CALQUIS', 64, NULL, NULL),
(651, 'CATILLUC', 64, NULL, NULL),
(652, 'EL PRADO', 64, NULL, NULL),
(653, 'LA FLORIDA', 64, NULL, NULL),
(654, 'LLAPA', 64, NULL, NULL),
(655, 'NANCHOC', 64, NULL, NULL),
(656, 'NIEPOS', 64, NULL, NULL),
(657, 'SAN GREGORIO', 64, NULL, NULL),
(658, 'SAN MIGUEL', 64, NULL, NULL),
(659, 'SAN SILVESTRE DE COCHAN', 64, NULL, NULL),
(660, 'TONGOD', 64, NULL, NULL),
(661, 'UNION AGUA BLANCA', 64, NULL, NULL),
(662, 'SAN BERNARDINO', 65, NULL, NULL),
(663, 'SAN LUIS', 65, NULL, NULL),
(664, 'SAN PABLO', 65, NULL, NULL),
(665, 'TUMBADEN', 65, NULL, NULL),
(666, 'ANDABAMBA', 66, NULL, NULL),
(667, 'CATACHE', 66, NULL, NULL),
(668, 'CHANCAYBAÑOS', 66, NULL, NULL),
(669, 'LA ESPERANZA', 66, NULL, NULL),
(670, 'NINABAMBA', 66, NULL, NULL),
(671, 'PULAN', 66, NULL, NULL),
(672, 'SANTA CRUZ', 66, NULL, NULL),
(673, 'SAUCEPAMPA', 66, NULL, NULL),
(674, 'SEXI', 66, NULL, NULL),
(675, 'UTICYACU', 66, NULL, NULL),
(676, 'YAUYUCAN', 66, NULL, NULL),
(677, 'ACOMAYO', 67, NULL, NULL),
(678, 'ACOPIA', 67, NULL, NULL),
(679, 'ACOS', 67, NULL, NULL),
(680, 'MOSOC LLACTA', 67, NULL, NULL),
(681, 'POMACANCHI', 67, NULL, NULL),
(682, 'RONDOCAN', 67, NULL, NULL),
(683, 'SANGARARA', 67, NULL, NULL),
(684, 'ANCAHUASI', 68, NULL, NULL),
(685, 'ANTA', 68, NULL, NULL),
(686, 'CACHIMAYO', 68, NULL, NULL),
(687, 'CHINCHAYPUJIO', 68, NULL, NULL),
(688, 'HUAROCONDO', 68, NULL, NULL),
(689, 'LIMATAMBO', 68, NULL, NULL),
(690, 'MOLLEPATA', 68, NULL, NULL),
(691, 'PUCYURA', 68, NULL, NULL),
(692, 'ZURITE', 68, NULL, NULL),
(693, 'CALCA', 69, NULL, NULL),
(694, 'COYA', 69, NULL, NULL),
(695, 'LAMAY', 69, NULL, NULL),
(696, 'LARES', 69, NULL, NULL),
(697, 'PISAC', 69, NULL, NULL),
(698, 'SAN SALVADOR', 69, NULL, NULL),
(699, 'TARAY', 69, NULL, NULL),
(700, 'YANATILE', 69, NULL, NULL),
(701, 'CHECCA', 70, NULL, NULL),
(702, 'KUNTURKANKI', 70, NULL, NULL),
(703, 'LANGUI', 70, NULL, NULL),
(704, 'LAYO', 70, NULL, NULL),
(705, 'PAMPAMARCA', 70, NULL, NULL),
(706, 'QUEHUE', 70, NULL, NULL),
(707, 'TUPAC AMARU', 70, NULL, NULL),
(708, 'YANAOCA', 70, NULL, NULL),
(709, 'CHECACUPE', 71, NULL, NULL),
(710, 'COMBAPATA', 71, NULL, NULL),
(711, 'MARANGANI', 71, NULL, NULL),
(712, 'PITUMARCA', 71, NULL, NULL),
(713, 'SAN PABLO', 71, NULL, NULL),
(714, 'SAN PEDRO', 71, NULL, NULL),
(715, 'SICUANI', 71, NULL, NULL),
(716, 'TINTA', 71, NULL, NULL),
(717, 'CAPACMARCA', 72, NULL, NULL),
(718, 'CHAMACA', 72, NULL, NULL),
(719, 'COLQUEMARCA', 72, NULL, NULL),
(720, 'LIVITACA', 72, NULL, NULL),
(721, 'LLUSCO', 72, NULL, NULL),
(722, 'QUIÑOTA', 72, NULL, NULL),
(723, 'SANTO TOMAS', 72, NULL, NULL),
(724, 'VELILLE', 72, NULL, NULL),
(725, 'CCORCA', 73, NULL, NULL),
(726, 'CUSCO', 73, NULL, NULL),
(727, 'POROY', 73, NULL, NULL),
(728, 'SAN JERONIMO', 73, NULL, NULL),
(729, 'SAN SEBASTIAN', 73, NULL, NULL),
(730, 'SANTIAGO', 73, NULL, NULL),
(731, 'SAYLLA', 73, NULL, NULL),
(732, 'WANCHAQ', 73, NULL, NULL),
(733, 'ALTO PICHIGUA', 74, NULL, NULL),
(734, 'CONDOROMA', 74, NULL, NULL),
(735, 'COPORAQUE', 74, NULL, NULL),
(736, 'ESPINAR', 74, NULL, NULL),
(737, 'OCORURO', 74, NULL, NULL),
(738, 'PALLPATA', 74, NULL, NULL),
(739, 'PICHIGUA', 74, NULL, NULL),
(740, 'SUYCKUTAMBO', 74, NULL, NULL),
(741, 'ECHARATE', 75, NULL, NULL),
(742, 'HUAYOPATA', 75, NULL, NULL),
(743, 'MARANURA', 75, NULL, NULL),
(744, 'OCOBAMBA', 75, NULL, NULL),
(745, 'PICHARI', 75, NULL, NULL),
(746, 'QUELLOUNO', 75, NULL, NULL),
(747, 'QUIMBIRI', 75, NULL, NULL),
(748, 'SANTA ANA', 75, NULL, NULL),
(749, 'SANTA TERESA', 75, NULL, NULL),
(750, 'VILCABAMBA', 75, NULL, NULL),
(751, 'ACCHA', 76, NULL, NULL),
(752, 'CCAPI', 76, NULL, NULL),
(753, 'COLCHA', 76, NULL, NULL),
(754, 'HUANOQUITE', 76, NULL, NULL),
(755, 'OMACHA', 76, NULL, NULL),
(756, 'PACCARITAMBO', 76, NULL, NULL),
(757, 'PARURO', 76, NULL, NULL),
(758, 'PILLPINTO', 76, NULL, NULL),
(759, 'YAURISQUE', 76, NULL, NULL),
(760, 'CAICAY', 77, NULL, NULL),
(761, 'CHALLABAMBA', 77, NULL, NULL),
(762, 'COLQUEPATA', 77, NULL, NULL),
(763, 'HUANCARANI', 77, NULL, NULL),
(764, 'KOSÑIPATA', 77, NULL, NULL),
(765, 'PAUCARTAMBO', 77, NULL, NULL),
(766, 'ANDAHUAYLILLAS', 78, NULL, NULL),
(767, 'CAMANTI', 78, NULL, NULL),
(768, 'CCARHUAYO', 78, NULL, NULL),
(769, 'CCATCA', 78, NULL, NULL),
(770, 'CUSIPATA', 78, NULL, NULL),
(771, 'HUARO', 78, NULL, NULL),
(772, 'LUCRE', 78, NULL, NULL),
(773, 'MARCAPATA', 78, NULL, NULL),
(774, 'OCONGATE', 78, NULL, NULL),
(775, 'OROPESA', 78, NULL, NULL),
(776, 'QUIQUIJANA', 78, NULL, NULL),
(777, 'URCOS', 78, NULL, NULL),
(778, 'CHINCHERO', 79, NULL, NULL),
(779, 'HUAYLLABAMBA', 79, NULL, NULL),
(780, 'MACHUPICCHU', 79, NULL, NULL),
(781, 'MARAS', 79, NULL, NULL),
(782, 'OLLANTAYTAMBO', 79, NULL, NULL),
(783, 'URUBAMBA', 79, NULL, NULL),
(784, 'YUCAY', 79, NULL, NULL),
(785, 'ACOBAMBA', 80, NULL, NULL),
(786, 'ANDABAMBA', 80, NULL, NULL),
(787, 'ANTA', 80, NULL, NULL),
(788, 'CAJA', 80, NULL, NULL),
(789, 'MARCAS', 80, NULL, NULL),
(790, 'PAUCARA', 80, NULL, NULL),
(791, 'POMACOCHA', 80, NULL, NULL),
(792, 'ROSARIO', 80, NULL, NULL),
(793, 'ANCHONGA', 81, NULL, NULL),
(794, 'CALLANMARCA', 81, NULL, NULL),
(795, 'CCOCHACCASA', 81, NULL, NULL),
(796, 'CHINCHO', 81, NULL, NULL),
(797, 'CONGALLA', 81, NULL, NULL),
(798, 'HUANCA-HUANCA', 81, NULL, NULL),
(799, 'HUAYLLAY GRANDE', 81, NULL, NULL),
(800, 'JULCAMARCA', 81, NULL, NULL),
(801, 'LIRCAY', 81, NULL, NULL),
(802, 'SAN ANTONIO DE ANTAPARCO', 81, NULL, NULL),
(803, 'SANTO TOMAS DE PATA', 81, NULL, NULL),
(804, 'SECCLLA', 81, NULL, NULL),
(805, 'ARMA', 82, NULL, NULL),
(806, 'AURAHUA', 82, NULL, NULL),
(807, 'CAPILLAS', 82, NULL, NULL),
(808, 'CASTROVIRREYNA', 82, NULL, NULL),
(809, 'CHUPAMARCA', 82, NULL, NULL),
(810, 'COCAS', 82, NULL, NULL),
(811, 'HUACHOS', 82, NULL, NULL),
(812, 'HUAMATAMBO', 82, NULL, NULL),
(813, 'MOLLEPAMPA', 82, NULL, NULL),
(814, 'SAN JUAN', 82, NULL, NULL),
(815, 'SANTA ANA', 82, NULL, NULL),
(816, 'TANTARA', 82, NULL, NULL),
(817, 'TICRAPO', 82, NULL, NULL),
(818, 'ANCO', 83, NULL, NULL),
(819, 'CHINCHIHUASI', 83, NULL, NULL),
(820, 'CHURCAMPA', 83, NULL, NULL),
(821, 'EL CARMEN', 83, NULL, NULL),
(822, 'LA MERCED', 83, NULL, NULL),
(823, 'LOCROJA', 83, NULL, NULL),
(824, 'PACHAMARCA', 83, NULL, NULL),
(825, 'PAUCARBAMBA', 83, NULL, NULL),
(826, 'SAN MIGUEL DE MAYOCC', 83, NULL, NULL),
(827, 'SAN PEDRO DE CORIS', 83, NULL, NULL),
(828, 'ACOBAMBILLA', 84, NULL, NULL),
(829, 'ACORIA', 84, NULL, NULL),
(830, 'ASCENCION', 84, NULL, NULL),
(831, 'CONAYCA', 84, NULL, NULL),
(832, 'CUENCA', 84, NULL, NULL),
(833, 'HUACHOCOLPA', 84, NULL, NULL),
(834, 'HUANCAVELICA', 84, NULL, NULL),
(835, 'HUANDO', 84, NULL, NULL),
(836, 'HUANDO', 84, NULL, NULL),
(837, 'HUAYLLAHUARA', 84, NULL, NULL),
(838, 'IZCUCHACA', 84, NULL, NULL),
(839, 'LARIA', 84, NULL, NULL),
(840, 'MANTA', 84, NULL, NULL),
(841, 'MARISCAL CACERES', 84, NULL, NULL),
(842, 'MOYA', 84, NULL, NULL),
(843, 'NUEVO OCCORO', 84, NULL, NULL),
(844, 'PALCA', 84, NULL, NULL),
(845, 'PILCHACA', 84, NULL, NULL),
(846, 'VILCA', 84, NULL, NULL),
(847, 'YAULI', 84, NULL, NULL),
(848, 'AYAVI', 85, NULL, NULL),
(849, 'CORDOVA', 85, NULL, NULL),
(850, 'HUAYACUNDO ARMA', 85, NULL, NULL),
(851, 'HUAYTARA', 85, NULL, NULL),
(852, 'LARAMARCA', 85, NULL, NULL),
(853, 'OCOYO', 85, NULL, NULL),
(854, 'PILPICHACA', 85, NULL, NULL),
(855, 'QUERCO', 85, NULL, NULL),
(856, 'QUITO-ARMA', 85, NULL, NULL),
(857, 'SAN ANTONIO DE CUSICANCHA', 85, NULL, NULL),
(858, 'SAN FSCO. DE SANGAYAICO', 85, NULL, NULL),
(859, 'SAN ISIDRO', 85, NULL, NULL),
(860, 'SANTIAGO DE CHOCORVOS', 85, NULL, NULL),
(861, 'SANTIAGO DE QUIRAHUARA', 85, NULL, NULL),
(862, 'SANTO DOMINGO DE CAPILLAS', 85, NULL, NULL),
(863, 'TAMBO', 85, NULL, NULL),
(864, 'ACOSTAMBO', 86, NULL, NULL),
(865, 'ACRAQUIA', 86, NULL, NULL),
(866, 'AHUAYCHA', 86, NULL, NULL),
(867, 'COLCABAMBA', 86, NULL, NULL),
(868, 'DANIEL HERNANDEZ', 86, NULL, NULL),
(869, 'HUACHOCOLPA', 86, NULL, NULL),
(870, 'HUARIBAMBA', 86, NULL, NULL),
(871, 'PAMPAS', 86, NULL, NULL),
(872, 'PAZOS', 86, NULL, NULL),
(873, 'QUISHUAR', 86, NULL, NULL),
(874, 'SALCABAMBA', 86, NULL, NULL),
(875, 'SALCAHUASI', 86, NULL, NULL),
(876, 'SAN MARCOS DE ROCCHAC', 86, NULL, NULL),
(877, 'SURCUBAMBA', 86, NULL, NULL),
(878, 'TINTAY PUNCU', 86, NULL, NULL),
(879, 'YAHUIMPUQUIO', 86, NULL, NULL),
(880, 'AMBO', 87, NULL, NULL),
(881, 'CAYNA', 87, NULL, NULL),
(882, 'COLPAS', 87, NULL, NULL),
(883, 'CONCHAMARCA', 87, NULL, NULL),
(884, 'HUACAR', 87, NULL, NULL),
(885, 'SAN FRANCISCO', 87, NULL, NULL),
(886, 'SAN RAFAEL', 87, NULL, NULL),
(887, 'TOMAYQUICHUA', 87, NULL, NULL),
(888, 'CHUQUIS', 88, NULL, NULL),
(889, 'LA UNION', 88, NULL, NULL),
(890, 'MARIAS', 88, NULL, NULL),
(891, 'PACHAS', 88, NULL, NULL),
(892, 'QUIVILLA', 88, NULL, NULL),
(893, 'RIPAN', 88, NULL, NULL),
(894, 'SHUNQUI', 88, NULL, NULL),
(895, 'SILLAPATA', 88, NULL, NULL),
(896, 'YANAS', 88, NULL, NULL),
(897, 'CANCHABAMBA', 89, NULL, NULL),
(898, 'COCHABAMBA', 89, NULL, NULL),
(899, 'HUACAYBAMBA', 89, NULL, NULL),
(900, 'PINRA', 89, NULL, NULL),
(901, 'ARANCAY', 90, NULL, NULL),
(902, 'CHAVIN DE PARIARCA', 90, NULL, NULL),
(903, 'JACAS GRANDE', 90, NULL, NULL),
(904, 'JIRCAN', 90, NULL, NULL),
(905, 'LLATA', 90, NULL, NULL),
(906, 'MIRAFLORES', 90, NULL, NULL),
(907, 'MONZON', 90, NULL, NULL),
(908, 'PUNCHAO', 90, NULL, NULL),
(909, 'PUÑOS', 90, NULL, NULL),
(910, 'SINGA', 90, NULL, NULL),
(911, 'TANTAMAYO', 90, NULL, NULL),
(912, 'AMARILIS', 91, NULL, NULL),
(913, 'CHINCHAO', 91, NULL, NULL),
(914, 'CHURUBAMBA', 91, NULL, NULL),
(915, 'HUANUCO', 91, NULL, NULL),
(916, 'MARGOS', 91, NULL, NULL),
(917, 'PILCOMARCA', 91, NULL, NULL),
(918, 'QUISQUI', 91, NULL, NULL),
(919, 'SAN FRANCISCO DE CAYRAN', 91, NULL, NULL),
(920, 'SAN PEDRO DE CHAULAN', 91, NULL, NULL),
(921, 'SANTA MARIA DEL VALLE', 91, NULL, NULL),
(922, 'YARUMAYO', 91, NULL, NULL),
(923, 'BAÑOS', 92, NULL, NULL),
(924, 'JESUS', 92, NULL, NULL),
(925, 'JIVIA', 92, NULL, NULL),
(926, 'QUEROPALCA', 92, NULL, NULL),
(927, 'RONDOS', 92, NULL, NULL),
(928, 'SAN FRANCISCO DE ASIS', 92, NULL, NULL),
(929, 'SAN MIGUEL DE CAURI', 92, NULL, NULL),
(930, 'DANIEL ALOMIA  ROBLES', 93, NULL, NULL),
(931, 'HERMILIO VALDIZAN', 93, NULL, NULL),
(932, 'JOSE CRESPO Y CASTILLO', 93, NULL, NULL),
(933, 'LUYANDO', 93, NULL, NULL),
(934, 'MARIANO DAMASO BERAUN', 93, NULL, NULL),
(935, 'RUPA-RUPA', 93, NULL, NULL),
(936, 'CHOLON', 94, NULL, NULL),
(937, 'HUACRACHUCO', 94, NULL, NULL),
(938, 'SAN BUENAVENTURA', 94, NULL, NULL),
(939, 'CHAGLLA', 95, NULL, NULL),
(940, 'MOLINO', 95, NULL, NULL),
(941, 'PANAO', 95, NULL, NULL),
(942, 'UMARI', 95, NULL, NULL),
(943, 'CODO DEL POZUZO', 96, NULL, NULL),
(944, 'HONORIA', 96, NULL, NULL),
(945, 'PUERTO INCA', 96, NULL, NULL),
(946, 'TOURNAVISTA', 96, NULL, NULL),
(947, 'YUYAPICHIS', 96, NULL, NULL),
(948, 'APARICIO POMARES', 97, NULL, NULL),
(949, 'CAHUAC', 97, NULL, NULL),
(950, 'CHACABAMBA', 97, NULL, NULL),
(951, 'CHAVINILLO', 97, NULL, NULL),
(952, 'CHORAS', 97, NULL, NULL),
(953, 'JACAS CHICO', 97, NULL, NULL),
(954, 'OBAS', 97, NULL, NULL),
(955, 'PAMPAMARCA', 97, NULL, NULL),
(956, 'ALTO LARAN', 98, NULL, NULL),
(957, 'CHAVIN', 98, NULL, NULL),
(958, 'CHINCHA ALTA', 98, NULL, NULL),
(959, 'CHINCHA BAJA', 98, NULL, NULL),
(960, 'EL CARMEN', 98, NULL, NULL),
(961, 'GROCIO PRADO', 98, NULL, NULL),
(962, 'PUEBLO NUEVO', 98, NULL, NULL),
(963, 'SAN JUAN DE YANAC', 98, NULL, NULL),
(964, 'SAN PEDRO DE HUACARPANA', 98, NULL, NULL),
(965, 'SUNAMPE', 98, NULL, NULL),
(966, 'TAMBO DE MORA', 98, NULL, NULL),
(967, 'ICA', 99, NULL, NULL),
(968, 'LA TINGUIÑA', 99, NULL, NULL),
(969, 'LOS AQUIJES', 99, NULL, NULL),
(970, 'OCUCAJE', 99, NULL, NULL),
(971, 'PACHACUTEC', 99, NULL, NULL),
(972, 'PARCONA', 99, NULL, NULL),
(973, 'PUEBLO NUEVO', 99, NULL, NULL),
(974, 'SALAS', 99, NULL, NULL),
(975, 'SAN JOSE DE LOS MOLINOS', 99, NULL, NULL),
(976, 'SAN JUAN BAUTISTA', 99, NULL, NULL),
(977, 'SANTIAGO', 99, NULL, NULL),
(978, 'SUBTANJALLA', 99, NULL, NULL),
(979, 'TATE', 99, NULL, NULL),
(980, 'YAUCA DEL ROSARIO', 99, NULL, NULL),
(981, 'CHANGUILLO', 100, NULL, NULL),
(982, 'EL INGENIO', 100, NULL, NULL),
(983, 'MARCONA', 100, NULL, NULL),
(984, 'NAZCA', 100, NULL, NULL),
(985, 'VISTA ALEGRE', 100, NULL, NULL),
(986, 'LLIPATA', 101, NULL, NULL),
(987, 'PALPA', 101, NULL, NULL),
(988, 'RIO GRANDE', 101, NULL, NULL),
(989, 'SANTA CRUZ', 101, NULL, NULL),
(990, 'TIBILLO', 101, NULL, NULL),
(991, 'HUANCANO', 102, NULL, NULL),
(992, 'HUMAY', 102, NULL, NULL),
(993, 'INDEPENDENCIA', 102, NULL, NULL),
(994, 'PARACAS', 102, NULL, NULL),
(995, 'PISCO', 102, NULL, NULL),
(996, 'SAN ANDRES', 102, NULL, NULL),
(997, 'SAN CLEMENTE', 102, NULL, NULL),
(998, 'TUPAC AMARU INCA', 102, NULL, NULL),
(999, 'CHANCHAMAYO', 103, NULL, NULL),
(1000, 'PERENE', 103, NULL, NULL),
(1001, 'PICHANAQUI', 103, NULL, NULL),
(1002, 'SAN LUIS DE SHUARO', 103, NULL, NULL),
(1003, 'SAN RAMON', 103, NULL, NULL),
(1004, 'VITOC', 103, NULL, NULL),
(1005, 'AHUAC', 104, NULL, NULL),
(1006, 'CHONGOS BAJO', 104, NULL, NULL),
(1007, 'CHUPACA', 104, NULL, NULL),
(1008, 'HUACHAC', 104, NULL, NULL),
(1009, 'HUAMANCACA CHICO', 104, NULL, NULL),
(1010, 'SAN JUAN DE ISCOS', 104, NULL, NULL),
(1011, 'SAN JUAN DE JARPA', 104, NULL, NULL),
(1012, 'TRES DE DICIEMBRE', 104, NULL, NULL),
(1013, 'YANACANCHA', 104, NULL, NULL),
(1014, 'ACO', 105, NULL, NULL),
(1015, 'ANDAMARCA', 105, NULL, NULL),
(1016, 'CHAMBARA', 105, NULL, NULL),
(1017, 'COCHAS', 105, NULL, NULL),
(1018, 'COMAS', 105, NULL, NULL),
(1019, 'CONCEPCION', 105, NULL, NULL),
(1020, 'HEROINAS TOLEDO', 105, NULL, NULL),
(1021, 'MANZANARES', 105, NULL, NULL),
(1022, 'MARISCAL CASTILLA', 105, NULL, NULL),
(1023, 'MATAHUASI', 105, NULL, NULL),
(1024, 'MITO', 105, NULL, NULL),
(1025, 'NUEVE DE JULIO', 105, NULL, NULL),
(1026, 'ORCOTUNA', 105, NULL, NULL),
(1027, 'SAN JOSE DE QUERO', 105, NULL, NULL),
(1028, 'SANTA ROSA DE OCOPA', 105, NULL, NULL),
(1029, 'CARHUACALLANGA', 106, NULL, NULL),
(1030, 'CHACAPAMPA', 106, NULL, NULL),
(1031, 'CHICCHE', 106, NULL, NULL),
(1032, 'CHILCA', 106, NULL, NULL),
(1033, 'CHONGOS ALTO', 106, NULL, NULL),
(1034, 'CHUPURO', 106, NULL, NULL),
(1035, 'COLCA', 106, NULL, NULL),
(1036, 'CULLHUAS', 106, NULL, NULL),
(1037, 'EL TAMBO', 106, NULL, NULL),
(1038, 'HUACRAPUQUIO', 106, NULL, NULL),
(1039, 'HUALHUAS', 106, NULL, NULL),
(1040, 'HUANCAN', 106, NULL, NULL),
(1041, 'HUANCAYO', 106, NULL, NULL),
(1042, 'HUASICANCHA', 106, NULL, NULL),
(1043, 'HUAYUCACHI', 106, NULL, NULL),
(1044, 'INGENIO', 106, NULL, NULL),
(1045, 'PARIAHUANCA', 106, NULL, NULL),
(1046, 'PILCOMAYO', 106, NULL, NULL),
(1047, 'PUCARA', 106, NULL, NULL),
(1048, 'QUICHUAY', 106, NULL, NULL),
(1049, 'QUILCAS', 106, NULL, NULL),
(1050, 'SAN AGUSTIN', 106, NULL, NULL),
(1051, 'SAN JERONIMO DE TUNAN', 106, NULL, NULL),
(1052, 'SANTO DOMINGO DE ACOBAMBA', 106, NULL, NULL),
(1053, 'SAÑO', 106, NULL, NULL),
(1054, 'SAPALLANGA', 106, NULL, NULL),
(1055, 'SICAYA', 106, NULL, NULL),
(1056, 'VIQUES', 106, NULL, NULL),
(1057, 'ACOLLA', 107, NULL, NULL),
(1058, 'APATA', 107, NULL, NULL),
(1059, 'ATAURA', 107, NULL, NULL),
(1060, 'CANCHAYLLO', 107, NULL, NULL),
(1061, 'CURICACA', 107, NULL, NULL),
(1062, 'EL MANTARO', 107, NULL, NULL),
(1063, 'HUAMALI', 107, NULL, NULL),
(1064, 'HUARIPAMPA', 107, NULL, NULL),
(1065, 'HUERTAS', 107, NULL, NULL),
(1066, 'JANJAILLO', 107, NULL, NULL),
(1067, 'JAUJA', 107, NULL, NULL),
(1068, 'JULCAN', 107, NULL, NULL),
(1069, 'LEONOR ORDOÑEZ', 107, NULL, NULL),
(1070, 'LLOCLLAPAMPA', 107, NULL, NULL),
(1071, 'MARCO', 107, NULL, NULL),
(1072, 'MASMA', 107, NULL, NULL),
(1073, 'MASMA CHICCHE', 107, NULL, NULL),
(1074, 'MOLINOS', 107, NULL, NULL),
(1075, 'MONOBAMBA', 107, NULL, NULL),
(1076, 'MUQUI', 107, NULL, NULL),
(1077, 'MUQUIYAUYO', 107, NULL, NULL),
(1078, 'PACA', 107, NULL, NULL),
(1079, 'PACCHA', 107, NULL, NULL),
(1080, 'PANCAN', 107, NULL, NULL),
(1081, 'PARCO', 107, NULL, NULL),
(1082, 'POMACANCHA', 107, NULL, NULL),
(1083, 'RICRAN', 107, NULL, NULL),
(1084, 'SAN LORENZO', 107, NULL, NULL),
(1085, 'SAN PEDRO DE CHUNAN', 107, NULL, NULL),
(1086, 'SAUSA', 107, NULL, NULL),
(1087, 'SINCOS', 107, NULL, NULL),
(1088, 'TUNAN MARCA', 107, NULL, NULL),
(1089, 'YAULI', 107, NULL, NULL),
(1090, 'YAUYOS', 107, NULL, NULL),
(1091, 'CARHUAMAYO', 108, NULL, NULL),
(1092, 'JUNIN', 108, NULL, NULL),
(1093, 'ONDORES', 108, NULL, NULL),
(1094, 'ULCUMAYO', 108, NULL, NULL),
(1095, 'COVIRIALI', 109, NULL, NULL),
(1096, 'LLAYLLA', 109, NULL, NULL),
(1097, 'MAZAMARI', 109, NULL, NULL),
(1098, 'PAMPA HERMOSA', 109, NULL, NULL),
(1099, 'PANGOA', 109, NULL, NULL),
(1100, 'RIO NEGRO', 109, NULL, NULL),
(1101, 'RIO TAMBO', 109, NULL, NULL),
(1102, 'SATIPO', 109, NULL, NULL),
(1103, 'ACOBAMBA', 110, NULL, NULL),
(1104, 'HUARICOLCA', 110, NULL, NULL),
(1105, 'HUASAHUASI', 110, NULL, NULL),
(1106, 'LA UNION', 110, NULL, NULL),
(1107, 'PALCA', 110, NULL, NULL),
(1108, 'PALCAMAYO', 110, NULL, NULL),
(1109, 'SAN PEDRO DE CAJAS', 110, NULL, NULL),
(1110, 'TAPO', 110, NULL, NULL),
(1111, 'TARMA', 110, NULL, NULL),
(1112, 'CHACAPALPA', 111, NULL, NULL),
(1113, 'HUAY-HUAY', 111, NULL, NULL),
(1114, 'LA OROYA', 111, NULL, NULL),
(1115, 'MARCAPOMACOCHA', 111, NULL, NULL),
(1116, 'MOROCOCHA', 111, NULL, NULL),
(1117, 'PACCHA', 111, NULL, NULL),
(1118, 'SANTA ROSA DE SACCO', 111, NULL, NULL),
(1119, 'STA. BARBARA DE CARHUACAYAN', 111, NULL, NULL),
(1120, 'SUITUCANCHA', 111, NULL, NULL),
(1121, 'YAULI', 111, NULL, NULL),
(1122, 'ASCOPE', 112, NULL, NULL),
(1123, 'CASA GRANDE', 112, NULL, NULL),
(1124, 'CHICAMA', 112, NULL, NULL),
(1125, 'CHOCOPE', 112, NULL, NULL),
(1126, 'MAGDALENA DE CAO', 112, NULL, NULL),
(1127, 'PAIJAN', 112, NULL, NULL),
(1128, 'RAZURI', 112, NULL, NULL),
(1129, 'SANTIAGO DE CAO', 112, NULL, NULL),
(1130, 'BAMBAMARCA', 113, NULL, NULL),
(1131, 'BOLIVAR', 113, NULL, NULL),
(1132, 'CONDORMARCA', 113, NULL, NULL),
(1133, 'LONGOTEA', 113, NULL, NULL),
(1134, 'UCHUMARCA', 113, NULL, NULL),
(1135, 'UCUNCHA', 113, NULL, NULL),
(1136, 'CHEPEN', 114, NULL, NULL),
(1137, 'PACANGA', 114, NULL, NULL),
(1138, 'PUEBLO NUEVO', 114, NULL, NULL),
(1139, 'CASCAS', 115, NULL, NULL),
(1140, 'LUCMA', 115, NULL, NULL),
(1141, 'MARMOT', 115, NULL, NULL),
(1142, 'SAYAPULLO', 115, NULL, NULL),
(1143, 'CALAMARCA', 116, NULL, NULL),
(1144, 'CARABAMBA', 116, NULL, NULL),
(1145, 'HUASO', 116, NULL, NULL),
(1146, 'JULCAN', 116, NULL, NULL),
(1147, 'AGALLPAMPA', 117, NULL, NULL),
(1148, 'CHARAT', 117, NULL, NULL),
(1149, 'HUARANCHAL', 117, NULL, NULL),
(1150, 'LA CUESTA', 117, NULL, NULL),
(1151, 'MACHE', 117, NULL, NULL),
(1152, 'OTUZCO', 117, NULL, NULL),
(1153, 'PARANDAY', 117, NULL, NULL),
(1154, 'SALPO', 117, NULL, NULL),
(1155, 'SINSICAP', 117, NULL, NULL),
(1156, 'USQUIL', 117, NULL, NULL),
(1157, 'GUADALUPE', 118, NULL, NULL),
(1158, 'JEQUETEPEQUE', 118, NULL, NULL),
(1159, 'PACASMAYO', 118, NULL, NULL),
(1160, 'SAN JOSE', 118, NULL, NULL),
(1161, 'SAN PEDRO DE LLOC', 118, NULL, NULL),
(1162, 'BULDIBUYO', 119, NULL, NULL),
(1163, 'CHILLIA', 119, NULL, NULL),
(1164, 'HUANCASPATA', 119, NULL, NULL),
(1165, 'HUAYLILLAS', 119, NULL, NULL),
(1166, 'HUAYO', 119, NULL, NULL),
(1167, 'ONGON', 119, NULL, NULL),
(1168, 'PARCOY', 119, NULL, NULL),
(1169, 'PATAZ', 119, NULL, NULL),
(1170, 'PIAS', 119, NULL, NULL),
(1171, 'SANTIAGO DE CHALLAS', 119, NULL, NULL),
(1172, 'TAURIJA', 119, NULL, NULL),
(1173, 'TAYABAMBA', 119, NULL, NULL),
(1174, 'URPAY', 119, NULL, NULL),
(1175, 'CHUGAY', 120, NULL, NULL),
(1176, 'COCHORCO', 120, NULL, NULL),
(1177, 'CURGOS', 120, NULL, NULL),
(1178, 'HUAMACHUCO', 120, NULL, NULL),
(1179, 'MARCABAL', 120, NULL, NULL),
(1180, 'SANAGORAN', 120, NULL, NULL),
(1181, 'SARIN', 120, NULL, NULL),
(1182, 'SARTIMBAMBA', 120, NULL, NULL),
(1183, 'ANGASMARCA', 121, NULL, NULL),
(1184, 'CACHICADAN', 121, NULL, NULL),
(1185, 'MOLLEBAMBA', 121, NULL, NULL),
(1186, 'MOLLEPATA', 121, NULL, NULL),
(1187, 'QUIRUVILCA', 121, NULL, NULL),
(1188, 'SANTA CRUZ DE CHUCA', 121, NULL, NULL),
(1189, 'SANTIAGO DE CHUCO', 121, NULL, NULL),
(1190, 'SITABAMBA', 121, NULL, NULL),
(1191, 'EL PORVENIR', 122, NULL, NULL),
(1192, 'FLORENCIA DE MORA', 122, NULL, NULL),
(1193, 'HUANCHACO', 122, NULL, NULL),
(1194, 'LA ESPERANZA', 122, NULL, NULL),
(1195, 'LAREDO', 122, NULL, NULL),
(1196, 'MOCHE', 122, NULL, NULL),
(1197, 'POROTO', 122, NULL, NULL),
(1198, 'SALAVERRY', 122, NULL, NULL),
(1199, 'SIMBAL', 122, NULL, NULL),
(1200, 'TRUJILLO', 122, NULL, NULL),
(1201, 'VICTOR LARCO HERRERA', 122, NULL, NULL),
(1202, 'CHAO', 123, NULL, NULL),
(1203, 'GUADALUPITO', 123, NULL, NULL),
(1204, 'VIRU', 123, NULL, NULL),
(1205, 'CAYALTI', 124, NULL, NULL),
(1206, 'CHICLAYO', 124, NULL, NULL),
(1207, 'CHONGOYAPE', 124, NULL, NULL),
(1208, 'ETEN', 124, NULL, NULL),
(1209, 'ETEN PUERTO', 124, NULL, NULL),
(1210, 'JOSE LEONARDO ORTIZ', 124, NULL, NULL),
(1211, 'LA VICTORIA', 124, NULL, NULL),
(1212, 'LAGUNAS', 124, NULL, NULL),
(1213, 'MONSEFU', 124, NULL, NULL),
(1214, 'NUEVA ARICA', 124, NULL, NULL),
(1215, 'OYOTUN', 124, NULL, NULL),
(1216, 'PATAPO', 124, NULL, NULL),
(1217, 'PICSI', 124, NULL, NULL),
(1218, 'PIMENTEL', 124, NULL, NULL),
(1219, 'POMALCA', 124, NULL, NULL),
(1220, 'PUCALA', 124, NULL, NULL),
(1221, 'REQUE', 124, NULL, NULL),
(1222, 'SANTA ROSA', 124, NULL, NULL),
(1223, 'SAÑA', 124, NULL, NULL),
(1224, 'TUMAN', 124, NULL, NULL),
(1225, 'CANARIS', 125, NULL, NULL),
(1226, 'FERRENAFE', 125, NULL, NULL),
(1227, 'INCAHUASI', 125, NULL, NULL),
(1228, 'MANUEL A. MESONES MURO', 125, NULL, NULL),
(1229, 'PITIPO', 125, NULL, NULL),
(1230, 'PUEBLO NUEVO', 125, NULL, NULL),
(1231, 'CHOCHOPE', 126, NULL, NULL),
(1232, 'ILLIMO', 126, NULL, NULL),
(1233, 'JAYANCA', 126, NULL, NULL),
(1234, 'LAMBAYEQUE', 126, NULL, NULL),
(1235, 'MOCHUMI', 126, NULL, NULL),
(1236, 'MORROPE', 126, NULL, NULL),
(1237, 'MOTUPE', 126, NULL, NULL),
(1238, 'OLMOS', 126, NULL, NULL),
(1239, 'PACORA', 126, NULL, NULL),
(1240, 'SALAS', 126, NULL, NULL),
(1241, 'SAN JOSE', 126, NULL, NULL),
(1242, 'TUCUME', 126, NULL, NULL),
(1243, 'BARRANCA', 127, NULL, NULL),
(1244, 'PARAMONGA', 127, NULL, NULL),
(1245, 'PATIVILCA', 127, NULL, NULL),
(1246, 'SUPE', 127, NULL, NULL),
(1247, 'SUPE PUERTO', 127, NULL, NULL),
(1248, 'CAJATAMBO', 128, NULL, NULL),
(1249, 'COPA', 128, NULL, NULL),
(1250, 'GORGOR', 128, NULL, NULL),
(1251, 'HUANCAPON', 128, NULL, NULL),
(1252, 'MANAS', 128, NULL, NULL),
(1253, 'BELLAVISTA', 129, NULL, NULL),
(1254, 'CALLAO', 129, NULL, NULL),
(1255, 'CARMEN DE LA LEGUA  REYNOSO', 129, NULL, NULL),
(1256, 'LA PERLA', 129, NULL, NULL),
(1257, 'LA PUNTA', 129, NULL, NULL),
(1258, 'VENTANILLA', 129, NULL, NULL),
(1259, 'ARAHUAY', 130, NULL, NULL),
(1260, 'CANTA', 130, NULL, NULL),
(1261, 'HUAMANTANGA', 130, NULL, NULL),
(1262, 'HUAROS', 130, NULL, NULL),
(1263, 'LACHAQUI', 130, NULL, NULL),
(1264, 'SAN BUENAVENTURA', 130, NULL, NULL),
(1265, 'SANTA ROSA DE QUIVES', 130, NULL, NULL),
(1266, 'ASIA', 131, NULL, NULL),
(1267, 'CALANGO', 131, NULL, NULL),
(1268, 'CERRO AZUL', 131, NULL, NULL),
(1269, 'CHILCA', 131, NULL, NULL),
(1270, 'COAYLLO', 131, NULL, NULL),
(1271, 'IMPERIAL', 131, NULL, NULL),
(1272, 'LUNAHUANA', 131, NULL, NULL),
(1273, 'MALA', 131, NULL, NULL),
(1274, 'NUEVO IMPERIAL', 131, NULL, NULL),
(1275, 'PACARAN', 131, NULL, NULL),
(1276, 'QUILMANA', 131, NULL, NULL),
(1277, 'SAN ANTONIO', 131, NULL, NULL),
(1278, 'SAN LUIS', 131, NULL, NULL),
(1279, 'SAN VICENTE DE CAÑETE', 131, NULL, NULL),
(1280, 'SANTA CRUZ DE FLORES', 131, NULL, NULL),
(1281, 'ZUÑIGA', 131, NULL, NULL),
(1282, 'ATAVILLOS ALTO', 132, NULL, NULL),
(1283, 'ATAVILLOS BAJO', 132, NULL, NULL),
(1284, 'AUCALLAMA', 132, NULL, NULL),
(1285, 'CHANCAY', 132, NULL, NULL),
(1286, 'HUARAL', 132, NULL, NULL),
(1287, 'IHUARI', 132, NULL, NULL),
(1288, 'LAMPIAN', 132, NULL, NULL),
(1289, 'PACARAOS', 132, NULL, NULL),
(1290, 'SAN MIGUEL DE ACOS', 132, NULL, NULL),
(1291, 'SANTA CRUZ DE ANDAMARCA', 132, NULL, NULL),
(1292, 'SUMBILCA', 132, NULL, NULL),
(1293, 'VEINTISIETE DE NOVIEMBRE', 132, NULL, NULL),
(1294, 'ANTIOQUIA', 133, NULL, NULL),
(1295, 'CALLAHUANCA', 133, NULL, NULL),
(1296, 'CARAMPOMA', 133, NULL, NULL),
(1297, 'CHICLA', 133, NULL, NULL),
(1298, 'CUENCA', 133, NULL, NULL),
(1299, 'HUACHUPAMPA', 133, NULL, NULL),
(1300, 'HUANZA', 133, NULL, NULL),
(1301, 'HUAROCHIRI', 133, NULL, NULL),
(1302, 'LAHUAYTAMBO', 133, NULL, NULL),
(1303, 'LANGA', 133, NULL, NULL),
(1304, 'LARAOS', 133, NULL, NULL),
(1305, 'MARIATANA', 133, NULL, NULL),
(1306, 'MATUCANA', 133, NULL, NULL),
(1307, 'RICARDO PALMA', 133, NULL, NULL),
(1308, 'SAN ANDRES DE TUPICOCHA', 133, NULL, NULL),
(1309, 'SAN ANTONIO', 133, NULL, NULL),
(1310, 'SAN BARTOLOME', 133, NULL, NULL),
(1311, 'SAN DAMIAN', 133, NULL, NULL),
(1312, 'SAN JUAN DE IRIS', 133, NULL, NULL),
(1313, 'SAN JUAN DE TANTARANCHE', 133, NULL, NULL),
(1314, 'SAN LORENZO DE QUINTI', 133, NULL, NULL),
(1315, 'SAN MATEO', 133, NULL, NULL),
(1316, 'SAN MATEO DE OTAO', 133, NULL, NULL),
(1317, 'SAN PEDRO DE CASTA', 133, NULL, NULL),
(1318, 'SAN PEDRO DE HUANCAYRE', 133, NULL, NULL),
(1319, 'SANGALLAYA', 133, NULL, NULL),
(1320, 'SANTA CRUZ DE COCACHACRA', 133, NULL, NULL),
(1321, 'SANTA EULALIA', 133, NULL, NULL),
(1322, 'SANTIAGO DE ANCHUCAYA', 133, NULL, NULL),
(1323, 'SANTIAGO DE TUNA', 133, NULL, NULL),
(1324, 'STO. DMGO. DE LOS OLLEROS', 133, NULL, NULL),
(1325, 'SURCO', 133, NULL, NULL),
(1326, 'AMBAR', 134, NULL, NULL),
(1327, 'CALETA DE CARQUIN', 134, NULL, NULL),
(1328, 'CHECRAS', 134, NULL, NULL),
(1329, 'HUACHO', 134, NULL, NULL),
(1330, 'HUALMAY', 134, NULL, NULL),
(1331, 'HUAURA', 134, NULL, NULL),
(1332, 'LEONCIO PRADO', 134, NULL, NULL),
(1333, 'PACCHO', 134, NULL, NULL),
(1334, 'SANTA LEONOR', 134, NULL, NULL),
(1335, 'SANTA MARIA', 134, NULL, NULL),
(1336, 'SAYAN', 134, NULL, NULL),
(1337, 'VEGUETA', 134, NULL, NULL),
(1338, 'ANCON', 135, NULL, NULL),
(1339, 'ATE', 135, NULL, NULL),
(1340, 'BARRANCO', 135, NULL, NULL),
(1341, 'BREÑA', 135, NULL, NULL),
(1342, 'CARABAYLLO', 135, NULL, NULL),
(1343, 'CHACLACAYO', 135, NULL, NULL),
(1344, 'CHORRILLOS', 135, NULL, NULL),
(1345, 'CIENEGUILLA', 135, NULL, NULL),
(1346, 'COMAS', 135, NULL, NULL),
(1347, 'EL AGUSTINO', 135, NULL, NULL),
(1348, 'INDEPENDENCIA', 135, NULL, NULL),
(1349, 'JESUS MARIA', 135, NULL, NULL),
(1350, 'LA MOLINA', 135, NULL, NULL),
(1351, 'LA VICTORIA', 135, NULL, NULL),
(1352, 'LIMA', 135, NULL, NULL),
(1353, 'LINCE', 135, NULL, NULL),
(1354, 'LOS OLIVOS', 135, NULL, NULL),
(1355, 'LURIGANCHO', 135, NULL, NULL),
(1356, 'LURIN', 135, NULL, NULL),
(1357, 'MAGDALENA DEL MAR', 135, NULL, NULL),
(1358, 'MAGDALENA VIEJA', 135, NULL, NULL),
(1359, 'MIRAFLORES', 135, NULL, NULL),
(1360, 'PACHACAMAC', 135, NULL, NULL),
(1361, 'PUCUSANA', 135, NULL, NULL),
(1362, 'PUENTE PIEDRA', 135, NULL, NULL),
(1363, 'PUNTA HERMOSA', 135, NULL, NULL),
(1364, 'PUNTA NEGRA', 135, NULL, NULL),
(1365, 'RIMAC', 135, NULL, NULL),
(1366, 'SAN BARTOLO', 135, NULL, NULL),
(1367, 'SAN BORJA', 135, NULL, NULL),
(1368, 'SAN ISIDRO', 135, NULL, NULL),
(1369, 'SAN JUAN DE LURIGANCHO', 135, NULL, NULL),
(1370, 'SAN JUAN DE MIRAFLORES', 135, NULL, NULL),
(1371, 'SAN LUIS', 135, NULL, NULL),
(1372, 'SAN MARTIN DE PORRES', 135, NULL, NULL),
(1373, 'SAN MIGUEL', 135, NULL, NULL),
(1374, 'SANTA ANITA', 135, NULL, NULL),
(1375, 'SANTA MARIA DEL MAR', 135, NULL, NULL),
(1376, 'SANTA ROSA', 135, NULL, NULL),
(1377, 'SANTIAGO DE SURCO', 135, NULL, NULL),
(1378, 'SURQUILLO', 135, NULL, NULL),
(1379, 'VILLA EL SALVADOR', 135, NULL, NULL),
(1380, 'VILLA MARIA DEL TRIUNFO', 135, NULL, NULL),
(1381, 'ANDAJES', 136, NULL, NULL),
(1382, 'CAUJUL', 136, NULL, NULL),
(1383, 'COCHAMARCA', 136, NULL, NULL),
(1384, 'NAVAN', 136, NULL, NULL),
(1385, 'OYON', 136, NULL, NULL),
(1386, 'PACHANGARA', 136, NULL, NULL),
(1387, 'ALIS', 137, NULL, NULL),
(1388, 'AYAUCA', 137, NULL, NULL),
(1389, 'AYAVIRI', 137, NULL, NULL),
(1390, 'AZANGARO', 137, NULL, NULL),
(1391, 'CACRA', 137, NULL, NULL),
(1392, 'CARANIA', 137, NULL, NULL),
(1393, 'CATAHUASI', 137, NULL, NULL),
(1394, 'CHOCOS', 137, NULL, NULL),
(1395, 'COCHAS', 137, NULL, NULL),
(1396, 'COLONIA', 137, NULL, NULL),
(1397, 'HONGOS', 137, NULL, NULL),
(1398, 'HUAMPARA', 137, NULL, NULL),
(1399, 'HUANCAYA', 137, NULL, NULL),
(1400, 'HUANGASCAR', 137, NULL, NULL),
(1401, 'HUANTAN', 137, NULL, NULL),
(1402, 'HUAYEC', 137, NULL, NULL),
(1403, 'LARAOS', 137, NULL, NULL),
(1404, 'LINCHA', 137, NULL, NULL),
(1405, 'MADEAN', 137, NULL, NULL),
(1406, 'MIRAFLORES', 137, NULL, NULL),
(1407, 'OMAS', 137, NULL, NULL),
(1408, 'PUTINZA', 137, NULL, NULL),
(1409, 'QUINCHES', 137, NULL, NULL),
(1410, 'QUINOCAY', 137, NULL, NULL),
(1411, 'SAN JOAQUIN', 137, NULL, NULL),
(1412, 'SAN PEDRO DE PILAS', 137, NULL, NULL),
(1413, 'TANTA', 137, NULL, NULL),
(1414, 'TAURIPAMPA', 137, NULL, NULL),
(1415, 'TOMAS', 137, NULL, NULL),
(1416, 'TUPE', 137, NULL, NULL),
(1417, 'VIÑAC', 137, NULL, NULL),
(1418, 'VITIS', 137, NULL, NULL),
(1419, 'YAUYOS', 137, NULL, NULL),
(1420, 'BALSAPUERTO', 138, NULL, NULL),
(1421, 'BARRANCA', 138, NULL, NULL),
(1422, 'CAHUAPANAS', 138, NULL, NULL),
(1423, 'JEBEROS', 138, NULL, NULL),
(1424, 'LAGUNAS', 138, NULL, NULL),
(1425, 'MANSERICHE', 138, NULL, NULL),
(1426, 'MORONA', 138, NULL, NULL),
(1427, 'PASTAZA', 138, NULL, NULL),
(1428, 'SANTA CRUZ', 138, NULL, NULL),
(1429, 'TENIENTE CESAR LOPEZ ROJAS', 138, NULL, NULL),
(1430, 'YURIMAGUAS', 138, NULL, NULL),
(1431, 'NAUTA', 139, NULL, NULL),
(1432, 'PARINARI', 139, NULL, NULL),
(1433, 'TIGRE', 139, NULL, NULL),
(1434, 'TROMPETEROS', 139, NULL, NULL),
(1435, 'URARINAS', 139, NULL, NULL),
(1436, 'PEBAS', 140, NULL, NULL),
(1437, 'RAMON CASTILLA', 140, NULL, NULL),
(1438, 'SAN PABLO', 140, NULL, NULL);
INSERT INTO `distritos` (`id`, `nombre`, `provincia_id`, `created_at`, `updated_at`) VALUES
(1439, 'YAVARI', 140, NULL, NULL),
(1440, 'ALTO NANAY', 141, NULL, NULL),
(1441, 'BELEN', 141, NULL, NULL),
(1442, 'FERNANDO LORES', 141, NULL, NULL),
(1443, 'INDIANA', 141, NULL, NULL),
(1444, 'IQUITOS', 141, NULL, NULL),
(1445, 'LAS AMAZONAS', 141, NULL, NULL),
(1446, 'MAZAN', 141, NULL, NULL),
(1447, 'NAPO', 141, NULL, NULL),
(1448, 'PUNCHANA', 141, NULL, NULL),
(1449, 'PUTUMAYO', 141, NULL, NULL),
(1450, 'SAN JUAN BAUTISTA', 141, NULL, NULL),
(1451, 'TORRES CAUSANA', 141, NULL, NULL),
(1452, 'ALTO TAPICHE', 142, NULL, NULL),
(1453, 'CAPELO', 142, NULL, NULL),
(1454, 'EMILIO SAN MARTIN', 142, NULL, NULL),
(1455, 'JENARO HERRERA', 142, NULL, NULL),
(1456, 'MAQUIA', 142, NULL, NULL),
(1457, 'PUINAHUA', 142, NULL, NULL),
(1458, 'REQUENA', 142, NULL, NULL),
(1459, 'SAQUENA', 142, NULL, NULL),
(1460, 'SOPLIN', 142, NULL, NULL),
(1461, 'TAPICHE', 142, NULL, NULL),
(1462, 'YAQUERANA', 142, NULL, NULL),
(1463, 'YAQUERANA', 142, NULL, NULL),
(1464, 'CONTAMANA', 143, NULL, NULL),
(1465, 'INAHUAYA', 143, NULL, NULL),
(1466, 'PADRE MARQUEZ', 143, NULL, NULL),
(1467, 'PAMPA HERMOSA', 143, NULL, NULL),
(1468, 'SARAYACU', 143, NULL, NULL),
(1469, 'VARGAS GUERRA', 143, NULL, NULL),
(1470, 'FITZCARRALD', 144, NULL, NULL),
(1471, 'HUEPETUCHE', 144, NULL, NULL),
(1472, 'MADRE DE DIOS', 144, NULL, NULL),
(1473, 'MANU', 144, NULL, NULL),
(1474, 'IBERIA', 145, NULL, NULL),
(1475, 'IÑAPARI', 145, NULL, NULL),
(1476, 'TAHUAMANU', 145, NULL, NULL),
(1477, 'INAMBARI', 146, NULL, NULL),
(1478, 'LABERINTO', 146, NULL, NULL),
(1479, 'LAS PIEDRAS', 146, NULL, NULL),
(1480, 'TAMBOPATA', 146, NULL, NULL),
(1481, 'CHOJATA', 147, NULL, NULL),
(1482, 'COALAQUE', 147, NULL, NULL),
(1483, 'ICHUYA', 147, NULL, NULL),
(1484, 'LA CAPILLA', 147, NULL, NULL),
(1485, 'LLOQUE', 147, NULL, NULL),
(1486, 'MATALAQUE', 147, NULL, NULL),
(1487, 'OMATE', 147, NULL, NULL),
(1488, 'PUQUINA', 147, NULL, NULL),
(1489, 'QUINISTAQUILLAS', 147, NULL, NULL),
(1490, 'UBINAS', 147, NULL, NULL),
(1491, 'YUNGA', 147, NULL, NULL),
(1492, 'EL ALGARROBAL', 148, NULL, NULL),
(1493, 'ILO', 148, NULL, NULL),
(1494, 'PACOCHA', 148, NULL, NULL),
(1495, 'CARUMAS', 149, NULL, NULL),
(1496, 'CUCHUMBAYA', 149, NULL, NULL),
(1497, 'MOQUEGUA', 149, NULL, NULL),
(1498, 'SAMEGUA', 149, NULL, NULL),
(1499, 'SAN CRISTOBAL', 149, NULL, NULL),
(1500, 'TORATA', 149, NULL, NULL),
(1501, 'CHACAYAN', 150, NULL, NULL),
(1502, 'GOYLLARISQUIZGA', 150, NULL, NULL),
(1503, 'PAUCAR', 150, NULL, NULL),
(1504, 'SAN PEDRO DE PILLAO', 150, NULL, NULL),
(1505, 'SANTA ANA DE TUSI', 150, NULL, NULL),
(1506, 'TAPUC', 150, NULL, NULL),
(1507, 'VILCABAMBA', 150, NULL, NULL),
(1508, 'YANAHUANCA', 150, NULL, NULL),
(1509, 'CHONTABAMBA', 151, NULL, NULL),
(1510, 'HUANCABAMBA', 151, NULL, NULL),
(1511, 'OXAPAMPA', 151, NULL, NULL),
(1512, 'PALCAZU', 151, NULL, NULL),
(1513, 'POZUZO', 151, NULL, NULL),
(1514, 'PUERTO BERMUDEZ', 151, NULL, NULL),
(1515, 'VILLA RICA', 151, NULL, NULL),
(1516, 'CHAUPIMARCA', 152, NULL, NULL),
(1517, 'HUACHON', 152, NULL, NULL),
(1518, 'HUARIACA', 152, NULL, NULL),
(1519, 'HUAYLLAY', 152, NULL, NULL),
(1520, 'NINACACA', 152, NULL, NULL),
(1521, 'PALLANCHACRA', 152, NULL, NULL),
(1522, 'PAUCARTAMBO', 152, NULL, NULL),
(1523, 'SAN FCO.DE ASIS DE YARUSYACAN', 152, NULL, NULL),
(1524, 'SIMON BOLIVAR', 152, NULL, NULL),
(1525, 'TICLACAYAN', 152, NULL, NULL),
(1526, 'TINYAHUARCO', 152, NULL, NULL),
(1527, 'VICCO', 152, NULL, NULL),
(1528, 'YANACANCHA', 152, NULL, NULL),
(1529, 'AYABACA', 153, NULL, NULL),
(1530, 'FRIAS', 153, NULL, NULL),
(1531, 'JILILI', 153, NULL, NULL),
(1532, 'LAGUNAS', 153, NULL, NULL),
(1533, 'MONTERO', 153, NULL, NULL),
(1534, 'PACAIPAMPA', 153, NULL, NULL),
(1535, 'PAIMAS', 153, NULL, NULL),
(1536, 'SAPILLICA', 153, NULL, NULL),
(1537, 'SICCHEZ', 153, NULL, NULL),
(1538, 'SUYO', 153, NULL, NULL),
(1539, 'CANCHAQUE', 154, NULL, NULL),
(1540, 'EL CARMEN DE LA FRONTERA', 154, NULL, NULL),
(1541, 'HUANCABAMBA', 154, NULL, NULL),
(1542, 'HUARMACA', 154, NULL, NULL),
(1543, 'LALAQUIZ', 154, NULL, NULL),
(1544, 'SAN MIGUEL DE EL FAIQUE', 154, NULL, NULL),
(1545, 'SONDOR', 154, NULL, NULL),
(1546, 'SONDORILLO', 154, NULL, NULL),
(1547, 'BUENOS AIRES', 155, NULL, NULL),
(1548, 'CHALACO', 155, NULL, NULL),
(1549, 'CHULUCANAS', 155, NULL, NULL),
(1550, 'LA MATANZA', 155, NULL, NULL),
(1551, 'MORROPON', 155, NULL, NULL),
(1552, 'SALITRAL', 155, NULL, NULL),
(1553, 'SAN JUAN DE BIGOTE', 155, NULL, NULL),
(1554, 'SANTA CATALINA DE MOSSA', 155, NULL, NULL),
(1555, 'SANTO DOMINGO', 155, NULL, NULL),
(1556, 'YAMANGO', 155, NULL, NULL),
(1557, 'AMOTAPE', 156, NULL, NULL),
(1558, 'ARENAL', 156, NULL, NULL),
(1559, 'COLAN', 156, NULL, NULL),
(1560, 'LA HUACA', 156, NULL, NULL),
(1561, 'PAITA', 156, NULL, NULL),
(1562, 'TAMARINDO', 156, NULL, NULL),
(1563, 'VICHAYAL', 156, NULL, NULL),
(1564, 'CASTILLA', 157, NULL, NULL),
(1565, 'CATACAOS', 157, NULL, NULL),
(1566, 'CURA MORI', 157, NULL, NULL),
(1567, 'EL TALLAN', 157, NULL, NULL),
(1568, 'LA ARENA', 157, NULL, NULL),
(1569, 'LA UNION', 157, NULL, NULL),
(1570, 'LAS LOMAS', 157, NULL, NULL),
(1571, 'PIURA', 157, NULL, NULL),
(1572, 'TAMBO GRANDE', 157, NULL, NULL),
(1573, 'BELLAVISTA DE LA UNION', 158, NULL, NULL),
(1574, 'BERNAL', 158, NULL, NULL),
(1575, 'CRISTO NOS VALGA', 158, NULL, NULL),
(1576, 'RINCONADA LLICUAR', 158, NULL, NULL),
(1577, 'SECHURA', 158, NULL, NULL),
(1578, 'VICE', 158, NULL, NULL),
(1579, 'BELLAVISTA', 159, NULL, NULL),
(1580, 'IGNACIO ESCUDERO', 159, NULL, NULL),
(1581, 'LANCONES', 159, NULL, NULL),
(1582, 'MARCAVELICA', 159, NULL, NULL),
(1583, 'MIGUEL CHECA', 159, NULL, NULL),
(1584, 'QUERECOTILLO', 159, NULL, NULL),
(1585, 'SALITRAL', 159, NULL, NULL),
(1586, 'SULLANA', 159, NULL, NULL),
(1587, 'EL ALTO', 160, NULL, NULL),
(1588, 'LA BREA', 160, NULL, NULL),
(1589, 'LOBITOS', 160, NULL, NULL),
(1590, 'LOS ORGANOS', 160, NULL, NULL),
(1591, 'MANCORA', 160, NULL, NULL),
(1592, 'PARIÑAS', 160, NULL, NULL),
(1593, 'ACHAYA', 161, NULL, NULL),
(1594, 'ARAPA', 161, NULL, NULL),
(1595, 'ASILLO', 161, NULL, NULL),
(1596, 'AZANGARO', 161, NULL, NULL),
(1597, 'CAMINACA', 161, NULL, NULL),
(1598, 'CHUPA', 161, NULL, NULL),
(1599, 'JOSE D. CHOQUEHUANCA', 161, NULL, NULL),
(1600, 'MUYANI', 161, NULL, NULL),
(1601, 'POTONI', 161, NULL, NULL),
(1602, 'SAMAN', 161, NULL, NULL),
(1603, 'SAN ANTON', 161, NULL, NULL),
(1604, 'SAN JOSE', 161, NULL, NULL),
(1605, 'SAN JUAN DE SALINAS', 161, NULL, NULL),
(1606, 'SANTIAGO DE PUPUJA', 161, NULL, NULL),
(1607, 'TIRAPATA', 161, NULL, NULL),
(1608, 'AJOYANI', 162, NULL, NULL),
(1609, 'AYAPATA', 162, NULL, NULL),
(1610, 'COASA', 162, NULL, NULL),
(1611, 'CORANI', 162, NULL, NULL),
(1612, 'CRUCERO', 162, NULL, NULL),
(1613, 'ITUATA', 162, NULL, NULL),
(1614, 'MACUSANI', 162, NULL, NULL),
(1615, 'OLLACHEA', 162, NULL, NULL),
(1616, 'SAN GABAN', 162, NULL, NULL),
(1617, 'USICAYOS', 162, NULL, NULL),
(1618, 'DESAGUADERO', 163, NULL, NULL),
(1619, 'HUACULLANI', 163, NULL, NULL),
(1620, 'JULI', 163, NULL, NULL),
(1621, 'KELLUYO', 163, NULL, NULL),
(1622, 'PISACOMA', 163, NULL, NULL),
(1623, 'POMATA', 163, NULL, NULL),
(1624, 'ZEPITA', 163, NULL, NULL),
(1625, 'CAPAZO', 164, NULL, NULL),
(1626, 'CONDURIRI', 164, NULL, NULL),
(1627, 'ILAVE', 164, NULL, NULL),
(1628, 'PILCUYO', 164, NULL, NULL),
(1629, 'SANTA ROSA', 164, NULL, NULL),
(1630, 'COJATA', 165, NULL, NULL),
(1631, 'HUANCANE', 165, NULL, NULL),
(1632, 'HUATASANI', 165, NULL, NULL),
(1633, 'INCHUPALLA', 165, NULL, NULL),
(1634, 'PUSI', 165, NULL, NULL),
(1635, 'ROSASPATA', 165, NULL, NULL),
(1636, 'TARACO', 165, NULL, NULL),
(1637, 'VILQUE CHICO', 165, NULL, NULL),
(1638, 'CABANILLA', 166, NULL, NULL),
(1639, 'CALAPUJA', 166, NULL, NULL),
(1640, 'LAMPA', 166, NULL, NULL),
(1641, 'NICASIO', 166, NULL, NULL),
(1642, 'OCUVIRI', 166, NULL, NULL),
(1643, 'PALCA', 166, NULL, NULL),
(1644, 'PARATIA', 166, NULL, NULL),
(1645, 'PUCARA', 166, NULL, NULL),
(1646, 'SANTA LUCIA', 166, NULL, NULL),
(1647, 'VILAVILA', 166, NULL, NULL),
(1648, 'ANTAUTA', 167, NULL, NULL),
(1649, 'AYAVIRI', 167, NULL, NULL),
(1650, 'CUPI', 167, NULL, NULL),
(1651, 'LLALLI', 167, NULL, NULL),
(1652, 'MACARI', 167, NULL, NULL),
(1653, 'NUYOA', 167, NULL, NULL),
(1654, 'ORURILLO', 167, NULL, NULL),
(1655, 'SANTA ROSA', 167, NULL, NULL),
(1656, 'UMACHIRI', 167, NULL, NULL),
(1657, 'CONIMA', 168, NULL, NULL),
(1658, 'HUAYRAPATA', 168, NULL, NULL),
(1659, 'MOHO', 168, NULL, NULL),
(1660, 'TILALI', 168, NULL, NULL),
(1661, 'ACORA', 169, NULL, NULL),
(1662, 'AMANTANI', 169, NULL, NULL),
(1663, 'ATUNCOLLA', 169, NULL, NULL),
(1664, 'CAPACHICA', 169, NULL, NULL),
(1665, 'CHUCUITO', 169, NULL, NULL),
(1666, 'COATA', 169, NULL, NULL),
(1667, 'HUATA', 169, NULL, NULL),
(1668, 'MAYAZO', 169, NULL, NULL),
(1669, 'PAUCARCOLLA', 169, NULL, NULL),
(1670, 'PICHACANI', 169, NULL, NULL),
(1671, 'PLATERIA', 169, NULL, NULL),
(1672, 'PUNO', 169, NULL, NULL),
(1673, 'SAN ANTONIO', 169, NULL, NULL),
(1674, 'TIQUILLACA', 169, NULL, NULL),
(1675, 'VILQUE', 169, NULL, NULL),
(1676, 'ANANEA', 170, NULL, NULL),
(1677, 'PEDRO VILCA APAZA', 170, NULL, NULL),
(1678, 'PUTINA', 170, NULL, NULL),
(1679, 'QUILCAPUNCU', 170, NULL, NULL),
(1680, 'SINA', 170, NULL, NULL),
(1681, 'CABANA', 171, NULL, NULL),
(1682, 'CABANILLAS', 171, NULL, NULL),
(1683, 'CARACOTO', 171, NULL, NULL),
(1684, 'JULIACA', 171, NULL, NULL),
(1685, 'ALTO INAMBARI', 172, NULL, NULL),
(1686, 'CUYOCUYO', 172, NULL, NULL),
(1687, 'LIMBANI', 172, NULL, NULL),
(1688, 'PATAMBUCO', 172, NULL, NULL),
(1689, 'PHARA', 172, NULL, NULL),
(1690, 'QUIACA', 172, NULL, NULL),
(1691, 'SAN JUAN DEL ORO', 172, NULL, NULL),
(1692, 'SANDIA', 172, NULL, NULL),
(1693, 'YANAHUAYA', 172, NULL, NULL),
(1694, 'ANAPIA', 173, NULL, NULL),
(1695, 'COPANI', 173, NULL, NULL),
(1696, 'CUTURAPI', 173, NULL, NULL),
(1697, 'OLLARAYA', 173, NULL, NULL),
(1698, 'TINICACHI', 173, NULL, NULL),
(1699, 'UNICACHI', 173, NULL, NULL),
(1700, 'YUNGUYO', 173, NULL, NULL),
(1701, 'ALTO BIAVO', 174, NULL, NULL),
(1702, 'BAJO BIAVO', 174, NULL, NULL),
(1703, 'BELLAVISTA', 174, NULL, NULL),
(1704, 'HUALLAGA', 174, NULL, NULL),
(1705, 'SAN PABLO', 174, NULL, NULL),
(1706, 'SAN RAFAEL', 174, NULL, NULL),
(1707, 'AGUA BLANCA', 175, NULL, NULL),
(1708, 'SAN JOSE DE SISA', 175, NULL, NULL),
(1709, 'SAN MARTIN', 175, NULL, NULL),
(1710, 'SANTA ROSA', 175, NULL, NULL),
(1711, 'SHATOJA', 175, NULL, NULL),
(1712, 'ALTO SAPOSOA', 176, NULL, NULL),
(1713, 'EL ESLABON', 176, NULL, NULL),
(1714, 'PISCOYACU', 176, NULL, NULL),
(1715, 'SACANCHE', 176, NULL, NULL),
(1716, 'SAPOSOA', 176, NULL, NULL),
(1717, 'TINGO DE SAPOSOA', 176, NULL, NULL),
(1718, 'ALONSO DE ALVARADO', 177, NULL, NULL),
(1719, 'BARRANQUITA', 177, NULL, NULL),
(1720, 'CAYNARACHI', 177, NULL, NULL),
(1721, 'CUÑUMBUQUI', 177, NULL, NULL),
(1722, 'LAMAS', 177, NULL, NULL),
(1723, 'PINTO RECODO', 177, NULL, NULL),
(1724, 'RUMISAPA', 177, NULL, NULL),
(1725, 'SAN ROQUE DE CUMBAZA', 177, NULL, NULL),
(1726, 'SHANAO', 177, NULL, NULL),
(1727, 'TABALOSOS', 177, NULL, NULL),
(1728, 'ZAPATERO', 177, NULL, NULL),
(1729, 'CAMPANILLA', 178, NULL, NULL),
(1730, 'HUICUNGO', 178, NULL, NULL),
(1731, 'JUANJUI', 178, NULL, NULL),
(1732, 'PACHIZA', 178, NULL, NULL),
(1733, 'PAJARILLO', 178, NULL, NULL),
(1734, 'CALZADA', 179, NULL, NULL),
(1735, 'HABANA', 179, NULL, NULL),
(1736, 'JEPELACIO', 179, NULL, NULL),
(1737, 'MOYOBAMBA', 179, NULL, NULL),
(1738, 'SORITOR', 179, NULL, NULL),
(1739, 'YANTALO', 179, NULL, NULL),
(1740, 'BUENOS AIRES', 180, NULL, NULL),
(1741, 'CASPISAPA', 180, NULL, NULL),
(1742, 'PICOTA', 180, NULL, NULL),
(1743, 'PILLUANA', 180, NULL, NULL),
(1744, 'PUCACACA', 180, NULL, NULL),
(1745, 'SAN CRISTOBAL', 180, NULL, NULL),
(1746, 'SAN HILARION', 180, NULL, NULL),
(1747, 'SHAMBOYACU', 180, NULL, NULL),
(1748, 'TINGO DE PONASA', 180, NULL, NULL),
(1749, 'TRES UNIDOS', 180, NULL, NULL),
(1750, 'AWAJUN', 181, NULL, NULL),
(1751, 'ELIAS SOPLIN VARGAS', 181, NULL, NULL),
(1752, 'NUEVA CAJAMARCA', 181, NULL, NULL),
(1753, 'PARDO MIGUEL', 181, NULL, NULL),
(1754, 'POSIC', 181, NULL, NULL),
(1755, 'RIOJA', 181, NULL, NULL),
(1756, 'SAN FERNANDO', 181, NULL, NULL),
(1757, 'YORONGOS', 181, NULL, NULL),
(1758, 'YURACYACU', 181, NULL, NULL),
(1759, 'ALBERTO LEVEAU', 182, NULL, NULL),
(1760, 'CACATACHI', 182, NULL, NULL),
(1761, 'CHAZUTA', 182, NULL, NULL),
(1762, 'CHIPURANA', 182, NULL, NULL),
(1763, 'EL PORVENIR', 182, NULL, NULL),
(1764, 'HUIMBAYOC', 182, NULL, NULL),
(1765, 'JUAN GUERRA', 182, NULL, NULL),
(1766, 'LA BANDA DE SHILCAYO', 182, NULL, NULL),
(1767, 'MORALES', 182, NULL, NULL),
(1768, 'PAPAPLAYA', 182, NULL, NULL),
(1769, 'SAN ANTONIO', 182, NULL, NULL),
(1770, 'SAUCE', 182, NULL, NULL),
(1771, 'SHAPAJA', 182, NULL, NULL),
(1772, 'TARAPOTO', 182, NULL, NULL),
(1773, 'NUEVO PROGRESO', 183, NULL, NULL),
(1774, 'POLVORA', 183, NULL, NULL),
(1775, 'SHUNTE', 183, NULL, NULL),
(1776, 'TOCACHE', 183, NULL, NULL),
(1777, 'UCHIZA', 183, NULL, NULL),
(1778, 'CAIRANI', 184, NULL, NULL),
(1779, 'CAMILACA', 184, NULL, NULL),
(1780, 'CANDARAVE', 184, NULL, NULL),
(1781, 'CURIBAYA', 184, NULL, NULL),
(1782, 'HUANUARA', 184, NULL, NULL),
(1783, 'QUILAHUANI', 184, NULL, NULL),
(1784, 'ILABAYA', 185, NULL, NULL),
(1785, 'ITE', 185, NULL, NULL),
(1786, 'LOCUMBA', 185, NULL, NULL),
(1787, 'ALTO DE LA ALIANZA', 186, NULL, NULL),
(1788, 'CALANA', 186, NULL, NULL),
(1789, 'CIUDAD NUEVA', 186, NULL, NULL),
(1790, 'GREGORIO ALBARRACIN LANCHIPA', 186, NULL, NULL),
(1791, 'INCLAN', 186, NULL, NULL),
(1792, 'PACHIA', 186, NULL, NULL),
(1793, 'PALCA', 186, NULL, NULL),
(1794, 'POCOLLAY', 186, NULL, NULL),
(1795, 'SAMA', 186, NULL, NULL),
(1796, 'TACNA', 186, NULL, NULL),
(1797, 'ESTIQUE', 187, NULL, NULL),
(1798, 'ESTIQUE-PAMPA', 187, NULL, NULL),
(1799, 'HEROES ALBARRACIN', 187, NULL, NULL),
(1800, 'SITAJARA', 187, NULL, NULL),
(1801, 'SUSAPAYA', 187, NULL, NULL),
(1802, 'TARATA', 187, NULL, NULL),
(1803, 'TARUCACHI', 187, NULL, NULL),
(1804, 'TICACO', 187, NULL, NULL),
(1805, 'CASITAS', 188, NULL, NULL),
(1806, 'ZORRITOS', 188, NULL, NULL),
(1807, 'CORRALES', 189, NULL, NULL),
(1808, 'LA CRUZ', 189, NULL, NULL),
(1809, 'PAMPAS DE HOSPITAL', 189, NULL, NULL),
(1810, 'SAN JACINTO', 189, NULL, NULL),
(1811, 'SAN JUAN DE LA VIRGEN', 189, NULL, NULL),
(1812, 'TUMBES', 189, NULL, NULL),
(1813, 'AGUAS VERDES', 190, NULL, NULL),
(1814, 'MATAPALO', 190, NULL, NULL),
(1815, 'PAPAYAL', 190, NULL, NULL),
(1816, 'ZARUMILLA', 190, NULL, NULL),
(1817, 'RAYMONDI', 191, NULL, NULL),
(1818, 'SEPAHUA', 191, NULL, NULL),
(1819, 'TAHUANIA', 191, NULL, NULL),
(1820, 'YURUA', 191, NULL, NULL),
(1821, 'CALLERIA', 192, NULL, NULL),
(1822, 'CAMPOVERDE', 192, NULL, NULL),
(1823, 'IPARIA', 192, NULL, NULL),
(1824, 'MASISEA', 192, NULL, NULL),
(1825, 'NUEVA REQUENA', 192, NULL, NULL),
(1826, 'YARINACOCHA', 192, NULL, NULL),
(1827, 'CURIMANA', 193, NULL, NULL),
(1828, 'IRAZOLA', 193, NULL, NULL),
(1829, 'PADRE ABAD', 193, NULL, NULL),
(1830, 'PURUS', 194, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fortalezas`
--

CREATE TABLE `fortalezas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icono` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fortalezas`
--

INSERT INTO `fortalezas` (`id`, `icono`, `titulo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, '<i class=\"fa fa-commenting\" aria-hidden=\"true\"></i>', 'Comentario', 'Califica tu compra y participa por premios', '2022-12-28 20:47:59', '2022-12-28 20:49:37'),
(2, '<i class=\"fa fa-shopping-bag\" aria-hidden=\"true\"></i>', 'Compra', ' Revisa tus pedidos en Mis Compras', '2022-12-28 20:50:51', '2022-12-28 20:50:51'),
(3, '<i class=\"fa fa-laptop\" aria-hidden=\"true\"></i>', 'registro', 'Regístrate y descubre todos los beneficios', '2022-12-28 20:53:34', '2022-12-28 20:53:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagens`
--

CREATE TABLE `imagens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen_ruta` varchar(255) NOT NULL,
  `imagenable_id` bigint(20) UNSIGNED NOT NULL,
  `imagenable_type` varchar(255) NOT NULL,
  `posicion` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagens`
--

INSERT INTO `imagens` (`id`, `imagen_ruta`, `imagenable_id`, `imagenable_type`, `posicion`, `created_at`, `updated_at`) VALUES
(1, 'marcas/aPZU4nvqrqGaAKQbWwkq26ElAgTsVWYYD9Uh6gBX.jpg', 1, 'App\\Models\\Marca', NULL, '2022-12-21 02:06:52', '2022-12-21 02:06:52'),
(2, 'marcas/PP4KW2Os2uu6JuKkQRIitZxCGyEAmonnuLPhiz8G.png', 2, 'App\\Models\\Marca', NULL, '2022-12-21 02:15:31', '2022-12-21 02:15:31'),
(3, 'marcas/kbRA4tFeQzb4B5Fs0go0yFBbPzoTAoX82I7MbwB3.png', 3, 'App\\Models\\Marca', NULL, '2022-12-21 02:17:13', '2022-12-21 02:17:13'),
(4, 'marcas/pfYnAu6Uurn774UTRh3oxzrQisjhl6SNf2OIoKtI.jpg', 4, 'App\\Models\\Marca', NULL, '2022-12-21 02:19:41', '2022-12-21 02:19:41'),
(5, 'categorias/sLdxObdyzClGQW4wcmmTyaZyBbipOhhbrK4uP2oT.png', 1, 'App\\Models\\Categoria', NULL, '2022-12-21 02:23:13', '2022-12-21 02:23:13'),
(6, 'marcas/UzknpYztEh2xFcW5oSigTgTfZV24wi7WGPyISV8f.png', 5, 'App\\Models\\Marca', NULL, '2022-12-21 02:26:30', '2022-12-21 02:26:30'),
(7, 'marcas/gXTxXCpowXn9NfCSj9mbd91YNBprgs5XMthI7jEL.jpg', 6, 'App\\Models\\Marca', NULL, '2022-12-21 02:27:56', '2022-12-21 02:27:56'),
(8, 'marcas/HGeGr9UYztbr6CgZIDklFdjtqNDvJOJEpypdEJos.png', 7, 'App\\Models\\Marca', NULL, '2022-12-21 02:57:25', '2022-12-21 02:57:25'),
(9, 'marcas/SSyb2RzX51LVu6XMOtSZXGrzUGQakpZb5z2KDCuv.png', 8, 'App\\Models\\Marca', NULL, '2022-12-21 03:01:13', '2022-12-21 03:01:13'),
(10, 'marcas/fOuW40ESNgBgXrdhN811gtjGpxC9DWi8WqpglrIx.png', 9, 'App\\Models\\Marca', NULL, '2022-12-21 03:05:40', '2022-12-21 03:05:40'),
(11, 'marcas/KaDjsxAHAXe8015FHTo2Us0pPSzVnozCdOIvgNUa.jpg', 10, 'App\\Models\\Marca', NULL, '2022-12-21 03:40:23', '2022-12-21 03:40:23'),
(12, 'categorias/NojajqzGma7OsIjzO27GyHsOq8T3KuKedyfDT2MH.jpg', 2, 'App\\Models\\Categoria', NULL, '2022-12-21 03:40:53', '2022-12-21 03:40:53'),
(13, 'productos/bpMZ48djVqmVVkzysHr8NuyF3XllSE0SoZk4N79Y.jpg', 1, 'App\\Models\\Producto', 1, '2022-12-21 03:48:42', '2022-12-21 03:48:42'),
(14, 'productos/0CaZlew8OxToKOu3jGOcqH2h2AHGqjkU7GXaONSf.png', 1, 'App\\Models\\Producto', 2, '2022-12-21 03:48:42', '2022-12-21 03:48:42'),
(15, 'marcas/q3W6v6BoBd8bNNqtPiP3BXyH0Ai1mc1bYEq9EkpY.png', 11, 'App\\Models\\Marca', NULL, '2022-12-21 03:54:42', '2022-12-21 03:54:42'),
(16, 'marcas/k6fIwExlwjbdjYGx3UDBIKrlJISjCzx1MdQ4Ox8s.png', 12, 'App\\Models\\Marca', NULL, '2022-12-21 21:27:42', '2022-12-21 21:27:42'),
(17, 'productos/8RrwlmGyt4WePEkr5MYLBAV4D4lD5OG7pYcoh73K.jpg', 2, 'App\\Models\\Producto', 2, '2022-12-21 21:54:22', '2022-12-22 02:36:24'),
(18, 'productos/1duhvnPkC8Mgj6Z7bZD84joUROxPKj7RZFFIlJ6G.jpg', 2, 'App\\Models\\Producto', 3, '2022-12-21 21:54:22', '2022-12-22 02:36:24'),
(19, 'productos/NdYRrnHdkpknIbFXohUTgXpGyMgh5jswm1lc49XZ.jpg', 2, 'App\\Models\\Producto', 1, '2022-12-21 21:54:22', '2022-12-22 02:36:24'),
(20, 'productos/0ZSlF1XmWQ7pdL4kjsW4nLlcgeWnMxrzM2tjED3P.jpg', 2, 'App\\Models\\Producto', 4, '2022-12-21 21:54:23', '2022-12-21 21:54:23'),
(21, 'marcas/oNoPIiZSFW00lykko2uXvgoLApgBn4OpJMMtBJO9.png', 13, 'App\\Models\\Marca', NULL, '2022-12-21 22:12:10', '2022-12-21 22:12:10'),
(27, 'marcas/CmX3dQTEJu79dHeWchb6k2RqCD0Eet3vdUTraXwm.png', 14, 'App\\Models\\Marca', NULL, '2022-12-21 22:30:41', '2022-12-21 22:30:41'),
(28, 'categorias/e4rvFUEIrtvNNWHVEVlbKjIN8z1WRTZmbV7zSCsD.jpg', 3, 'App\\Models\\Categoria', NULL, '2022-12-21 22:32:10', '2022-12-21 22:32:10'),
(29, 'productos/2ElNHVblXn9FNewJzgQBYF4XNZqheu4j3hQZTRXu.jpg', 4, 'App\\Models\\Producto', 1, '2022-12-21 23:02:40', '2022-12-21 23:02:40'),
(30, 'productos/nGYpmpr6BV5HvyQowbN0S31Lv2rl9am4mhUo7hrh.png', 4, 'App\\Models\\Producto', 2, '2022-12-21 23:02:41', '2022-12-21 23:02:41'),
(31, 'productos/x1HSzKgzjucatBYYSPVyVc9WkOzlpPJ66jIWhzoV.png', 4, 'App\\Models\\Producto', 3, '2022-12-21 23:02:41', '2022-12-21 23:02:41'),
(32, 'productos/NeXNCXDLSKS4gM32579ur8TMgjBeU9SJAFbcCh7c.png', 4, 'App\\Models\\Producto', 4, '2022-12-21 23:02:41', '2022-12-21 23:02:41'),
(33, 'productos/TRgPDX9uNexn0zWdFbH1j4YxOPCnBM7xC0ulVQaZ.png', 4, 'App\\Models\\Producto', 5, '2022-12-21 23:02:41', '2022-12-21 23:02:41'),
(39, 'categorias/t3UmXBflweJZbUfEl6JLb8SEbbCW0H95u8z9GLX7.png', 4, 'App\\Models\\Categoria', NULL, '2022-12-22 01:24:16', '2022-12-22 01:24:16'),
(43, 'productos/XBaCCm8XH0Rn4tH14Ey1Q8yu1LrTQi21pG37LxZi.png', 6, 'App\\Models\\Producto', 1, '2022-12-22 01:34:53', '2022-12-22 01:34:56'),
(45, 'productos/Lnuc9BxUaVJN3AamcelOVL6Ji6WlPZ6RcaLZTEAX.png', 7, 'App\\Models\\Producto', 1, '2022-12-22 01:40:15', '2022-12-22 01:46:54'),
(46, 'productos/IRBZpShE5eAoIVf3ad4Ed53W7hosT614Bk1wVYqS.png', 6, 'App\\Models\\Producto', 2, '2022-12-22 01:50:27', '2022-12-22 01:50:27'),
(47, 'productos/63xkItgnuXSZRjnT6rXYUvMokYdq8s4P3o1QcxS2.png', 7, 'App\\Models\\Producto', 2, '2022-12-22 01:51:47', '2022-12-22 01:51:47'),
(48, 'productos/3jwOJrIne9W5jEPKYMO08cB8JPlXCBvTsyPIUh2t.png', 5, 'App\\Models\\Producto', 1, '2022-12-22 01:52:24', '2022-12-22 01:52:24'),
(49, 'productos/GonRjtMbvZEcs6I7AtluODdAkyoxdTKKoStd8ivF.png', 5, 'App\\Models\\Producto', 2, '2022-12-22 01:52:41', '2022-12-22 01:52:41'),
(50, 'productos/FEPAnC21AMY3rtZnHsE2ng2SV7uUoLWjumFAQuLH.png', 5, 'App\\Models\\Producto', 3, '2022-12-22 01:52:51', '2022-12-22 01:52:51'),
(51, 'productos/jLqupvefF399BVsWbay0OU5A6BBoDp9U8lKFXoMp.png', 5, 'App\\Models\\Producto', 4, '2022-12-22 01:52:57', '2022-12-22 01:52:57'),
(53, 'productos/JHi16nnC1SjDptE0l6x9e4fiNMhzIEOBI8wBNrgz.jpg', 3, 'App\\Models\\Producto', 2, '2022-12-22 01:54:11', '2022-12-22 01:54:11'),
(54, 'productos/CTMvs0GDdtObBAATuLjqtywsMr4b8CQgT8dsJoSE.jpg', 3, 'App\\Models\\Producto', 3, '2022-12-22 01:54:11', '2022-12-22 01:54:11'),
(55, 'productos/5PofGszrCeZmfwvtXifWAwN8DwBgK4zRPHYQqvHi.jpg', 3, 'App\\Models\\Producto', 4, '2022-12-22 01:54:12', '2022-12-22 01:54:12'),
(56, 'productos/kUgmBXzVizLomC7Sm6js52xmG2JovdKiVCy1G0xV.jpg', 3, 'App\\Models\\Producto', 5, '2022-12-22 01:54:12', '2022-12-22 01:54:12'),
(57, 'marcas/faV7kr61DMrg9Oom7SOUwhC0HydK8uHzjXCyPDAo.jpg', 15, 'App\\Models\\Marca', NULL, '2022-12-22 02:03:42', '2022-12-22 02:03:42'),
(58, 'productos/kI1bgwyHMKRYObTI81xAbfqSILpQoGzClCyshbYz.png', 8, 'App\\Models\\Producto', 1, '2022-12-22 02:06:47', '2022-12-22 02:06:47'),
(59, 'productos/JvQkdOajEcleQF3Wty8JAppYmrq45cMTvCi2EGN9.png', 9, 'App\\Models\\Producto', 1, '2022-12-22 02:17:29', '2022-12-22 02:17:29'),
(60, 'productos/AlSTbslnVJVHKyV27ghyW0fXeWlsh9FDnS1uXPUK.png', 10, 'App\\Models\\Producto', 1, '2022-12-22 02:30:17', '2022-12-22 02:30:17'),
(61, 'productos/ez4kNYDeNMxmSP8BAr0fZwWZx6YIqS9tDEy2ARsv.png', 11, 'App\\Models\\Producto', 1, '2022-12-22 02:47:35', '2022-12-22 02:47:35'),
(62, 'productos/srjYK0QVJyrLZp8M3XSzRUUy9xIRsZcpavhxs9D5.png', 12, 'App\\Models\\Producto', 1, '2022-12-22 03:08:29', '2022-12-22 03:08:29'),
(63, 'productos/e8ilK6Wu1sxgPems06y2aXoInEq1tWqIvnffi6su.png', 13, 'App\\Models\\Producto', 1, '2022-12-22 03:19:56', '2022-12-22 03:19:56'),
(64, 'productos/NjpmQAzy0R1l6D6I0d9yH1rGF32UWECkptYiE9Sm.png', 12, 'App\\Models\\Producto', 2, '2022-12-22 03:23:13', '2022-12-22 03:23:13'),
(65, 'productos/nWocutZCnvPxJxPOqoJiwwIgwqw9GfgamEznwld0.png', 12, 'App\\Models\\Producto', 3, '2022-12-22 03:23:13', '2022-12-22 03:23:13'),
(66, 'categorias/suT3AMWIJTHg7ZR3SFxKFKOjhxiwThDrJh4DsnlX.png', 5, 'App\\Models\\Categoria', NULL, '2022-12-22 03:41:56', '2022-12-22 03:41:56'),
(67, 'productos/MzbWwERiaBRpPUz5qwT6e47odOlj0iE1wB3VZs45.png', 14, 'App\\Models\\Producto', 1, '2022-12-22 03:44:37', '2022-12-22 03:44:37'),
(68, 'categorias/KUe6R0UvHWq7raBowHG2sDguUxn837RmkEMfnVGq.png', 6, 'App\\Models\\Categoria', NULL, '2022-12-23 22:28:46', '2022-12-23 22:28:46'),
(69, 'marcas/EnX7G7e03AONe9auBSDjO4KjiumSDOoJhR47tE6l.png', 16, 'App\\Models\\Marca', NULL, '2022-12-27 19:35:46', '2022-12-27 19:35:46'),
(70, 'productos/4so8Uj0ucEDX2qPezaJASrAQPQK89Vo42JKrRRaw.png', 15, 'App\\Models\\Producto', 1, '2022-12-27 20:00:41', '2022-12-27 20:00:41'),
(71, 'productos/hImuwLsIhqS6549lKnUinLKoivu3emKq2OBISTy8.png', 15, 'App\\Models\\Producto', 2, '2022-12-27 20:00:53', '2022-12-27 20:00:53'),
(72, 'productos/byaRmbQv36xbKuBuBa94UHN0zW8LPQ2g8ewKNB1W.png', 15, 'App\\Models\\Producto', 3, '2022-12-27 20:00:53', '2022-12-27 20:00:53'),
(73, 'productos/lXWGUVKRhrltxA1GE7UOWkgVgXr0fCDmOV24u6xf.jpg', 3, 'App\\Models\\Producto', 1, '2022-12-27 20:06:37', '2022-12-27 20:06:40'),
(74, 'testimonios/qwSVNdglhJ1p3QLZ5fC6khPBPRES7NkX9COAVzXX.jpg', 1, 'App\\Models\\Testimonio', NULL, '2022-12-28 21:11:53', '2022-12-28 21:11:53'),
(75, 'testimonios/4PWldXn0TCMn0E6JcCqAyl4Fgu5kmVpYTHb3BPXp.jpg', 2, 'App\\Models\\Testimonio', NULL, '2022-12-28 21:17:04', '2022-12-28 21:17:04'),
(76, 'medios/4HT7BsilECHA3oYhYtKQOocFTALEDuyhBNbrkHCs.webp', 1, 'App\\Models\\MediosPago', NULL, '2022-12-28 21:46:16', '2022-12-28 21:46:16'),
(77, 'medios/eanngPI1J71od8FhkSrYC9zFF0UKtn61rQA6NWa2.png', 2, 'App\\Models\\MediosPago', NULL, '2022-12-28 21:49:49', '2022-12-28 21:49:49'),
(78, 'medios/qc1ad22U8kcLpedfkmi9gBEoxrpK8qRzwrHgS43d.png', 3, 'App\\Models\\MediosPago', NULL, '2022-12-28 21:51:42', '2022-12-28 21:51:42'),
(79, 'medios/0NoHnxwzh4sLSyJRG8n7VClH0mTC18cueBoFN36r.png', 4, 'App\\Models\\MediosPago', NULL, '2022-12-28 21:51:51', '2022-12-28 21:51:51'),
(80, 'medios/7Ul1YwfIeLwfJsArJsCNMUyfMMjFFOnYDa2o27Qj.png', 5, 'App\\Models\\MediosPago', NULL, '2022-12-28 21:52:35', '2022-12-28 21:52:35'),
(81, 'medios/1za80ppSBatZQsyHtmffDeH33ZOwxZaVQovLhQVG.png', 6, 'App\\Models\\MediosPago', NULL, '2022-12-28 21:52:45', '2022-12-28 21:52:45'),
(82, 'medios/YBMkSXienets2c6g76SjFo4pX4F2PGc9SOrJao3A.png', 7, 'App\\Models\\MediosPago', NULL, '2022-12-28 21:52:55', '2022-12-28 21:52:55'),
(83, 'medios/3exhUdFxor59lBXMdYBAYSomt2eY41lF0zVgmPJP.png', 8, 'App\\Models\\MediosPago', NULL, '2022-12-28 21:53:06', '2022-12-28 21:53:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(10, 'Nanoray', '2022-12-21 03:40:23', '2022-12-21 03:40:23'),
(11, 'Kuwotech', '2022-12-21 03:54:42', '2022-12-21 03:54:42'),
(12, 'Cruxell', '2022-12-21 21:27:42', '2022-12-21 21:27:42'),
(13, 'Pointnix', '2022-12-21 22:12:10', '2022-12-21 22:12:10'),
(14, 'Vatech', '2022-12-21 22:30:41', '2022-12-21 22:30:41'),
(15, 'Megagen', '2022-12-22 02:03:42', '2022-12-22 02:03:42'),
(16, 'VSI', '2022-12-27 19:35:46', '2022-12-27 19:35:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id`, `producto_id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 6, ' Ø4.0 x 7.0mm', '2022-12-22 01:31:15', '2022-12-22 01:31:15'),
(2, 6, 'Ø4.0 x 8.5mm', '2022-12-22 01:31:40', '2022-12-22 01:31:40'),
(3, 6, 'Ø4.0 x 10.0mm', '2022-12-22 01:32:11', '2022-12-22 01:32:11'),
(4, 6, 'Ø4.0 x 11.5mm', '2022-12-22 01:32:30', '2022-12-22 01:32:30'),
(5, 6, 'Ø4.0 x 13.0mm', '2022-12-22 01:32:48', '2022-12-22 01:32:48'),
(6, 7, 'Ø4.5 x 7.0mm', '2022-12-22 01:47:24', '2022-12-22 01:47:24'),
(7, 7, 'Ø4.5 x 8.5mm', '2022-12-22 01:47:39', '2022-12-22 01:47:39'),
(8, 7, 'Ø4.5 x 10.0mm', '2022-12-22 01:47:51', '2022-12-22 01:47:51'),
(9, 7, 'Ø4.5 x 11.5mm', '2022-12-22 01:48:01', '2022-12-22 01:48:01'),
(10, 7, 'Ø4.5 x 13.0mm', '2022-12-22 01:48:11', '2022-12-22 01:48:11'),
(11, 8, 'Ø3.5 x 7mm', '2022-12-22 02:07:12', '2022-12-22 02:07:12'),
(12, 8, 'Ø3.5 x 8.5mm', '2022-12-22 02:07:30', '2022-12-22 02:07:30'),
(13, 8, 'Ø3.5 x 10mm', '2022-12-22 02:07:47', '2022-12-22 02:07:47'),
(14, 8, 'Ø3.5 x 11.5mm', '2022-12-22 02:08:05', '2022-12-22 02:08:05'),
(15, 8, 'Ø3.5 x 13mm', '2022-12-22 02:08:25', '2022-12-22 02:08:25'),
(16, 8, 'Ø3.5 x 15mm', '2022-12-22 02:08:47', '2022-12-22 02:08:47'),
(17, 9, 'Ø4.0 x 7mm', '2022-12-22 02:17:47', '2022-12-22 02:17:47'),
(18, 9, 'Ø4.0 x 8.5mm', '2022-12-22 02:18:03', '2022-12-22 02:18:03'),
(19, 9, 'Ø4.0 x 10mm', '2022-12-22 02:18:20', '2022-12-22 02:18:20'),
(20, 9, 'Ø4.0 x 13mm', '2022-12-22 02:18:36', '2022-12-22 02:18:36'),
(21, 9, 'Ø4.0 x 15mm', '2022-12-22 02:18:49', '2022-12-22 02:18:49'),
(22, 10, 'Ø4.5x1.5mmx4.5mm', '2022-12-22 02:30:55', '2022-12-22 02:51:51'),
(23, 10, 'Ø4.5x1.5mmx5.5mm', '2022-12-22 02:31:03', '2022-12-22 02:52:13'),
(24, 10, 'Ø4.5x1.5mmx7.0mm', '2022-12-22 02:31:14', '2022-12-22 02:52:29'),
(25, 10, 'Ø4.5x2.5mmx4.5mm', '2022-12-22 02:31:34', '2022-12-22 02:52:44'),
(26, 10, 'Ø4.5x2.5mmx5.5mm', '2022-12-22 02:31:51', '2022-12-22 02:52:54'),
(27, 10, 'Ø4.5x2.5mmx7.0mm', '2022-12-22 02:32:15', '2022-12-22 02:53:05'),
(28, 10, 'Ø4.5x3.5mmx4.5mm', '2022-12-22 02:32:31', '2022-12-22 02:53:17'),
(29, 10, 'Ø4.5x3.5mmx5.5mm', '2022-12-22 02:32:38', '2022-12-22 02:53:27'),
(30, 10, 'Ø4.5x3.5mmx7.0mm', '2022-12-22 02:32:58', '2022-12-22 02:53:37'),
(31, 10, 'Ø4.5x4.5mmx4.5mm', '2022-12-22 02:33:18', '2022-12-22 02:53:46'),
(32, 10, 'Ø4.5x4.5mmx5.5mm', '2022-12-22 02:33:26', '2022-12-22 02:53:54'),
(33, 10, 'Ø4.5x4.5mmx7.0mm', '2022-12-22 02:33:36', '2022-12-22 02:54:03'),
(34, 10, 'Ø4.5x5.5mmx4.5mm', '2022-12-22 02:33:46', '2022-12-22 02:54:12'),
(35, 10, 'Ø4.5x5.5mmx5.5mm', '2022-12-22 02:34:05', '2022-12-22 02:54:20'),
(36, 10, 'Ø4.5x5.5mmx7.0mm', '2022-12-22 02:34:13', '2022-12-22 02:54:27'),
(37, 11, 'Ø4 x 3mm', '2022-12-22 02:48:45', '2022-12-22 02:48:45'),
(38, 11, 'Ø4 x 4mm', '2022-12-22 02:48:54', '2022-12-22 02:48:54'),
(39, 11, 'Ø4 x 5mm', '2022-12-22 02:49:10', '2022-12-22 02:49:10'),
(40, 11, 'Ø4 x 6mm', '2022-12-22 02:49:32', '2022-12-22 02:49:32'),
(41, 11, 'Ø4 x 7mm', '2022-12-22 02:49:46', '2022-12-22 02:49:46'),
(42, 12, 'Ø4.5', '2022-12-22 03:21:00', '2022-12-22 03:21:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios_pagos`
--

CREATE TABLE `medios_pagos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posicion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medios_pagos`
--

INSERT INTO `medios_pagos` (`id`, `posicion`, `created_at`, `updated_at`) VALUES
(3, 1, '2022-12-28 21:51:42', '2022-12-28 21:51:42'),
(4, 2, '2022-12-28 21:51:51', '2022-12-28 21:51:51'),
(5, 3, '2022-12-28 21:52:35', '2022-12-28 21:52:35'),
(6, 4, '2022-12-28 21:52:45', '2022-12-28 21:52:45'),
(7, 5, '2022-12-28 21:52:55', '2022-12-28 21:52:55'),
(8, 6, '2022-12-28 21:53:05', '2022-12-28 21:53:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_10_04_172540_create_permission_tables', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(5, '2018_12_23_120000_create_shoppingcart_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_10_03_192100_create_sessions_table', 1),
(8, '2022_10_03_193619_create_administradors_table', 1),
(9, '2022_10_04_160448_create_clientes_table', 1),
(10, '2022_10_10_164540_create_sliders_table', 1),
(11, '2022_10_10_192340_create_categorias_table', 1),
(12, '2022_10_10_192521_create_subcategorias_table', 1),
(13, '2022_10_10_192533_create_marcas_table', 1),
(14, '2022_10_10_192557_create_categoria_marca_table', 1),
(15, '2022_10_10_192612_create_productos_table', 1),
(16, '2022_10_10_192620_create_colors_table', 1),
(17, '2022_10_10_192632_create_color_producto_table', 1),
(18, '2022_10_10_192639_create_medidas_table', 1),
(19, '2022_10_10_192648_create_color_medida_table', 1),
(20, '2022_10_10_192654_create_imagens_table', 1),
(21, '2022_11_02_175012_create_departamentos_table', 1),
(22, '2022_11_02_175123_create_provincias_table', 1),
(23, '2022_11_02_175130_create_distritos_table', 1),
(24, '2022_11_02_175134_create_ordens_table', 1),
(25, '2022_11_02_192429_create_cupons_table', 1),
(26, '2022_11_08_175755_create_resenas_table', 1),
(27, '2022_11_15_230037_create_direccions_table', 1),
(28, '2022_12_12_172826_create_fortalezas_table', 1),
(29, '2022_12_12_200926_create_testimonios_table', 1),
(30, '2022_12_12_225531_create_medios_pagos_table', 1),
(31, '2022_12_15_212254_create_ckeditors_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordens`
--

CREATE TABLE `ordens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estado` enum('1','2','3','4','5') NOT NULL DEFAULT '1',
  `contacto` varchar(255) NOT NULL,
  `celular` varchar(255) NOT NULL,
  `tipo_envio` enum('1','2') NOT NULL,
  `costo_envio` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `contenido` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `envio` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `puntos_canjeados` varchar(255) DEFAULT NULL,
  `cupon_descuento` varchar(255) DEFAULT NULL,
  `cupon_precio` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ordens`
--

INSERT INTO `ordens` (`id`, `user_id`, `estado`, `contacto`, `celular`, `tipo_envio`, `costo_envio`, `total`, `contenido`, `envio`, `puntos_canjeados`, `cupon_descuento`, `cupon_precio`, `created_at`, `updated_at`) VALUES
(1, 2, '2', 'Keaton Friesen', '925.329.3021', '1', 0.00, 45.00, '{\"76e94aade5d713840dbfaaae47e0bef8\":{\"rowId\":\"76e94aade5d713840dbfaaae47e0bef8\",\"id\":10,\"name\":\"Pilar Fino Recto \\u00d84.5\",\"qty\":1,\"price\":45,\"weight\":550,\"options\":{\"cantidad\":\"5\",\"imagen\":\"\\/storage\\/productos\\/AlSTbslnVJVHKyV27ghyW0fXeWlsh9FDnS1uXPUK.png\",\"puntos_ganar\":\"0\",\"puntos_tope\":\"0\",\"color_id\":1,\"color\":\"ninguno\",\"medida_id\":22,\"medida\":\"\\u00d84.5x1.5mmx4.5mm\"},\"discount\":0,\"tax\":9.45,\"subtotal\":45}}', NULL, '0', NULL, '0', '2022-12-27 22:03:52', '2022-12-27 22:05:13');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Roles y permisos', 'web', '2022-12-21 02:05:28', '2022-12-21 02:05:28'),
(2, 'Ver panel', 'web', '2022-12-21 02:05:28', '2022-12-21 02:05:28'),
(3, 'Crear productos', 'web', '2022-12-21 02:05:28', '2022-12-21 02:05:28'),
(4, 'Editar productos', 'web', '2022-12-21 02:05:28', '2022-12-21 02:05:28'),
(5, 'Eliminar productos', 'web', '2022-12-21 02:05:28', '2022-12-21 02:05:28'),
(6, 'Actualizar productos', 'web', '2022-12-21 02:05:28', '2022-12-21 02:05:28'),
(7, 'Ver ordenes', 'web', '2022-12-21 02:05:28', '2022-12-21 02:05:28'),
(8, 'Ver orden', 'web', '2022-12-21 02:05:28', '2022-12-21 02:05:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategoria_id` bigint(20) UNSIGNED NOT NULL,
  `marca_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `precio` double(8,2) NOT NULL,
  `precio_real` double(8,2) NOT NULL,
  `stock_total` int(11) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `informacion` text NOT NULL,
  `puntos_ganar` int(11) DEFAULT NULL,
  `puntos_tope` int(11) DEFAULT NULL,
  `link_video` varchar(255) DEFAULT NULL,
  `tiene_detalle` tinyint(1) NOT NULL DEFAULT 0,
  `incluye_igv` tinyint(1) NOT NULL DEFAULT 0,
  `detalle` text DEFAULT NULL,
  `estado` enum('1','2') NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `subcategoria_id`, `marca_id`, `nombre`, `slug`, `sku`, `precio`, `precio_real`, `stock_total`, `descripcion`, `informacion`, `puntos_ganar`, `puntos_tope`, `link_video`, `tiene_detalle`, `incluye_igv`, `detalle`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, 10, 'Rayos-X Portatil NANORAY', 'rayos-x-portatil-nanoray', 'RA-S19AY', 3200.00, 3200.00, 4, 'Diseño ergonómico de ultra generación que permite disparar con una sola mano.', '<p><strong>Descripción:</strong></p><ul><li>Diseño ergonómico de ultra generación que permite disparar con una sola mano.</li><li>El equipo es más ligero y manejable.</li><li>El peso del equipo es de 1,64 kg con condensador.</li><li>Carga rápida (entre 10-15 segundos para cargar completamente).</li><li>Eficiencia energética sostenible (mantiene el 100% de la eficiencia energética incluso en disparos continuos).</li><li>Superior en calidad de imagen (el punto focal del tubo de 0,4 mm proporciona un procesamiento de imágenes mucho más claro y un rango más amplio).</li><li>Sistema de carga sin bateria (evita que se descarguen, exploten y compliquen los requisitos de mantenimiento regular).</li></ul><p><strong>Número 1 en:</strong></p><ul><li>Imagenes dentales.</li><li>Terapia digital.</li><li>Centros de rayos X digitales.</li></ul>', 50, 0, NULL, 1, 1, '<figure class=\"table\"><table><tbody><tr><td rowspan=\"2\">Potencia de entrada nominal</td><td>Dispositivo</td><td>DC 12V 5A</td></tr><tr><td>Adaptador</td><td>100-240 VAC, 50-60HZ/1.5A</td></tr><tr><td colspan=\"2\">Potencia de salida nominal</td><td>210W</td></tr><tr><td colspan=\"2\">Poder interno</td><td>10,8 VDC [súpercondensador], 8EA</td></tr><tr><td colspan=\"2\">KV/mA</td><td>70KV/3.0 mA, 60KV/3.0mA</td></tr><tr><td colspan=\"2\">Intervalo de tiempo de exposición [seg]</td><td>0.01 - 1.00 seg ±5%</td></tr><tr><td rowspan=\"2\">Medición de la eficiencia</td><td>[KV]</td><td>±10%</td></tr><tr><td>[seg]</td><td>±5%</td></tr><tr><td colspan=\"2\">[mA]</td><td>±20%</td></tr><tr><td colspan=\"2\">Monitor</td><td>LCD Panel Display(35lnch, BTN LCD, 1/4Duty, 13BIAS)</td></tr><tr><td rowspan=\"3\">Tubo de rayos-X</td><td>Modelo</td><td>KL-11-0.4-70(Kailong)</td></tr><tr><td>Filtración inherente</td><td>Min 0.8mm AL Eq. @75KV</td></tr><tr><td>Tamaño del punto focal</td><td>0.4mm</td></tr><tr><td rowspan=\"4\">Filtración total</td><td>Filtración inherente</td><td>0.8mmAL Eq. @75KV</td></tr><tr><td>Filtración agregada</td><td>0.5mmAL</td></tr><tr><td>Filtración de cono</td><td>15mmAL eQ. @70KV</td></tr><tr><td>Filtración total</td><td>2.8mmAL Eq. @70KV</td></tr><tr><td colspan=\"2\">Longitud del CONO (desde el punto focal)</td><td>200mm(60KV, 70KV)</td></tr><tr><td colspan=\"2\">Material de CONO</td><td>PB, ABS</td></tr><tr><td colspan=\"2\">Idioma</td><td>Español</td></tr><tr><td colspan=\"2\">Cuerpo principal</td><td>Total 1,6kg ±10%(Cone 200mm 260g ±10%)</td></tr><tr><td colspan=\"2\">Base</td><td>540g ±10%</td></tr></tbody></table></figure>', '1', '2022-12-21 03:48:42', '2022-12-22 03:55:02'),
(2, 4, 12, 'Cruxcan', 'cruxcan', 'CR-S318AN', 4500.00, 4500.00, 3, 'CRUXCAN tiene la característica de ser pequeño y liviano y le brinda una imagen de escaneo clara en poco tiempo.', '<p>Marca muy conocida de procedencia Coreana.</p><p>&nbsp;</p><p>CRUXCAN es un escáner PSP dental que se especializa en el sistema de imágenes de rayos X dentales de alta calidad.</p><p>&nbsp;</p><p>Innovadora tecnología de procesamiento de imágenes de rayos X y proporciona imágenes de rayos X intraorales de alta calidad. CRUXCAN tiene la característica de ser pequeño y liviano y le brinda una imagen de escaneo clara en poco tiempo, lo que le brinda una alta productividad y un diagnóstico más exacto.&nbsp;Cruxcan puede generar calidad de imagen en modo SR / HR y obtener imágenes de calidad en todos los modos.</p><p>&nbsp;</p><p>Cruxcan tiene otras características como un enlace PACS, impresión DICOM y más están disponibles para programas fáciles de usar.Un total de 4 placas de imágenes de tamaño le permiten fotografíe varias áreas dentales o tamaños dentales.</p>', 0, 0, 'https://www.youtube.com/embed/XbisuCGjXQo', 1, 1, '<figure class=\"table\"><table><thead><tr><th colspan=\"2\"><strong>ESPECIFICACIÓN CRX-1000</strong></th></tr></thead><tbody><tr><td>IP admitida &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td><td>Talla 0/1/2/3 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td></tr><tr><td>Resolución (lp/mm)&nbsp;</td><td>SR:20 / HR:10</td></tr><tr><td>Monitor</td><td>Pantalla tactil de 4\'</td></tr><tr><td>Interfaz</td><td>Ethernet</td></tr><tr><td>Practicas multiusuario</td><td>Si</td></tr><tr><td>Modo de reposo</td><td>Si</td></tr><tr><td>Peso (Kg)</td><td>3.3</td></tr><tr><td>Dimensiones (H x W x Dmm)</td><td>233 x 141 x 191.5</td></tr></tbody></table></figure>', '1', '2022-12-21 21:54:22', '2022-12-21 22:25:36'),
(3, 3, 13, 'PDX-1000', 'pdx-1000', 'PD-S2700', 2990.00, 3500.00, 5, 'Sensor RVG PDX – 1000 tipo CMOS', '<p>PDX – 1000 es un producto único que se caracteriza por ser&nbsp;flexible de esta forma evita deteriorarse. Se ha prevenido la cortadura del cable al hacerlo mas flexible, el sensor tipo CMOS asegura una calidad de imagen 2 veces superior al sensor anterior CDR.</p><p>&nbsp;</p><ul><li>Cable totalmente flexible.</li><li>Mejor calidad de imagen por el tipo de sensor CMOS.</li><li>Tipo de entrada USB.</li><li>Las imágenes se pueden visualizar en tiempo real.</li><li>Calidad de imagen superior al sensor CDR anterior.</li></ul>', 0, 0, 'https://www.youtube.com/embed/D4d-SQLfB5Y', 1, 1, '<figure class=\"table\"><table><tbody><tr><td>Productos</td><td>Size 1</td><td>Size 2</td></tr><tr><td>Dimensiones mecánicas (mm3)</td><td>25,0 × 38,5 × 4,5</td><td>31.0 × 40.0 × 4.5</td></tr><tr><td>Área Activa (mm²)</td><td>20 × 30</td><td>26 × 36</td></tr><tr><td>Matriz de píxeles</td><td>25,0 × 38,5 × 4,5</td><td>(2.34 M) 1300 × 1800</td></tr><tr><td>Tecnología de sensor</td><td colspan=\"2\">APS CMOS</td></tr><tr><td>Centelleador</td><td colspan=\"2\">CsI:Tl depositado directamente</td></tr><tr><td>Longitud del cable (m)</td><td colspan=\"2\">Estándar 3m / Opción 5m</td></tr><tr><td>Pixel Pitch (μm)</td><td colspan=\"2\">20</td></tr><tr><td>Resolución espacial (lp/mm)</td><td colspan=\"2\">Teórico: 25 lp/mm Real: 14 ~ 16 lp/mm (alta sensibilidad) 18 ~ 20 lp/mm (alta resolución)</td></tr><tr><td>Nivel de gris</td><td colspan=\"2\">16 bits, grado 65535</td></tr><tr><td>Modo de exposición</td><td colspan=\"2\">DEA inteligente</td></tr><tr><td>Protección de ingreso</td><td colspan=\"2\">IP68 para desinfección por remojo</td></tr><tr><td>Adicional</td><td colspan=\"2\">Soporta protocolo TWAIN;</td></tr><tr><td>Sistema operativo</td><td colspan=\"2\">Windows 7 y superior, 32/64 bits</td></tr></tbody></table></figure>', '1', '2022-12-21 22:23:22', '2022-12-21 22:23:22'),
(4, 5, 14, 'Pax-i SC', 'pax-i-sc', 'PA-S11SC', 46000.00, 46000.00, 0, 'Sensores especializados para PANO y CEPH', '<figure class=\"table\"><table><tbody><tr><td><strong>Calidad de imagen superior</strong></td><td><ul><li>Imagen óptima para un diagnóstico preciso</li></ul></td></tr><tr><td><strong>Dos sensores dedicados</strong></td><td><ul><li>Sensores especializados para Pano y Ceph</li><li>Flujo de trabajo optimizado y vida útil prolongada de los sensores</li></ul></td></tr><tr><td><strong>Diseño moderno y compacto</strong></td><td><ul><li>Aumente el valor del diseño de su clínica</li><li>Ahorre espacio de instalación en su clínica</li></ul></td></tr></tbody></table></figure><p>&nbsp;</p><p><strong>La Solución Avanzada de Imágenes Para un Diagnostico Dental Exacto</strong></p><p>PaX-i SC proporciona la imagen panorámica más precisa y de alta calidad al combinar procesamiento de imágenes y experiencia acumulada en imágenes dentales de VATECH. Esto mejorará su precisión diagnóstica con una mayor planificación del tratamiento y la satisfacción del paciente.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://s3.amazonaws.com/mitiendape/uploads/tienda_008190/tienda_008190_6553cfe8a7ddb0c91bbf7b67d9af25d8b33d7247_producto_xlarge_100.png\"></figure><p>&nbsp;</p><p><strong>Haga su Diagnostico Fácil y Eficiente con Varios Modos de Captura</strong></p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://s3.amazonaws.com/mitiendape/uploads/tienda_008190/tienda_008190_925d76fd72109c29c09168f71ebc50d0044c7702_producto_xlarge_100.png\"><figcaption>Modo Bitewing</figcaption></figure><p>&nbsp; &nbsp;</p><figure class=\"image\"><img src=\"https://s3.amazonaws.com/mitiendape/uploads/tienda_008190/tienda_008190_33c7d7973ba5a977318d651c814c1ab5b224da75_producto_xlarge_100.png\"><figcaption>Modo TMJ</figcaption></figure><p>&nbsp;</p><figure class=\"table\"><table><tbody><tr><td><strong>SELECCIÓN</strong></td><td><strong>ARCO</strong></td><td><strong>MODO DE EXAMEN</strong></td></tr><tr><td rowspan=\"2\"><strong>EXAMEN PANORÁMICO</strong></td><td>Estrecho / Normal Ancho / Niño</td><td>Estándar / Derecha / Delantera / Izquierda</td></tr><tr><td>Ortogonal</td><td>Ortogonal Estándar / Derecha / Delantera / Izquierda Bitewing Estándar / Derecha / Delantera / Izquierda</td></tr><tr><td><strong>EXAMEN ESPECIAL</strong></td><td>Normal</td><td>TMJ LAT Abrir / Cerrar<br>TMJ PA Abrir / Cerrar<br>Sinus LAT / PA</td></tr></tbody></table></figure><p>&nbsp;</p><p><strong>Cefalometrico (Scan Ceph)</strong></p><p>El PaX-i SC proporciona imágenes óptimas diseñadas exclusivamente para la ortodoncia.<br>&nbsp;</p><figure class=\"image\"><img src=\"/storage/ckeditor/e8oWKrnBrucS1RitHpXNEbd2H2C6Fm5QogWviUIw.png\"><figcaption><strong>Lateral</strong></figcaption></figure><figure class=\"image\"><img src=\"/storage/ckeditor/EIjcnur3AeIHzQvQH61ysgVi0dCqUkiQqWJ8M9BX.png\"><figcaption><strong>Full Lateral</strong></figcaption></figure>', 0, 0, NULL, 1, 1, '<figure class=\"table\"><table><tbody><tr><td><strong>Función</strong></td><td>Panorámica + cefalométrica</td></tr><tr><td><strong>Tiempo de escaneo</strong></td><td>Panorámica: HD 13,5 s/Normal 10,1 s<br>Cef: Escaneo 12,9 s/One Shot 0,9 s</td></tr><tr><td><strong>Punto focal</strong></td><td>0,5mm</td></tr><tr><td><strong>Voltaje / corriente del tubo</strong></td><td>Panorámica: 50~90 Kvp / 4-10 mA</td></tr><tr><td><strong>Tamaño del FOV cefalométrico</strong></td><td><strong>SC</strong><br>21 cm x 23 cm [LAT, PA, SMV, Waters View, Carpus]<br>27 cm x 23 cm [Full LAT]<br><strong>OP</strong><br>30,5 cm x 25,4 cm [LAT, PA, SMV, Waters View, Carpus]</td></tr><tr><td><strong>escala de grises</strong></td><td>14 bits</td></tr><tr><td><strong>Posicionamiento del paciente</strong></td><td>De pie / Accesible en silla de ruedas</td></tr></tbody></table></figure>', '1', '2022-12-21 23:02:40', '2022-12-22 03:56:23'),
(5, 6, 14, 'Vatech A9', 'vatech-a9', 'VA-S169A9', 110000.00, 110000.00, 1, 'SISTEMA DE RAYOS X 3 EN 1', '<h2><strong>UNA NUEVA DIMENSIÓN MÁS ALLÁ DE TUS EXPECTATIVAS, A9</strong></h2><p>El Vatech A9 proporciona las imágenes panorámicas más precisas y de alta calidad al combinar el procesamiento de imágenes y la experiencia acumulada en imágenes dentales de Vatech. Esto aumentará la precisión de su diagnóstico para mejorar la planificación del tratamiento y la satisfacción del paciente.</p><figure class=\"image\"><img src=\"https://www.vatech.com/files/attach/images/288/891/035/fce06cefe89f3752aa72e44c3024efcf.jpg\" alt=\"Catálogo Vatech A9_Actualizado.jpg\"></figure><p><img src=\"http://www.digident.com.pe/imagenes/productos/A9/A9-02.png\" alt=\"\"></p><h3><strong>CAMPO DE VISIÓN 8X8</strong></h3><p>Las imágenes de 8x8 permiten diagnósticos fundamentales y planificación del tratamiento, incluidas las áreas maxilar y<br>mandibular, en un solo escaneo. Es útil para cirugías de implantes y diagnósticos.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://www.vatech.com/files/attach/images/288/891/035/8ba8fef20f7da9ef7b90bd10bd9db23c.png\" alt=\"2204.png\"></figure><p><img src=\"http://www.digident.com.pe/imagenes/productos/A9/A9-03.png\" alt=\"\"></p><h3>&nbsp;</h3><h3><strong>TECNOLOGÍA EMERGENTE DE IA CON MAGIC PAN</strong></h3><p>MAGIC PAN utiliza cientos de capas de imágenes panorámicas durante la adquisición. La Inteligencia Artificial de Vatech examina todas las capas, las reconstruye y proporciona la óptima.</p><figure class=\"image\"><img src=\"https://www.vatech.com/images/5_Pax-i3D_22.png\"><figcaption>Con Magic Pan</figcaption></figure><figure class=\"image\"><img src=\"https://www.vatech.com/images/5_Pax-i3D_22.png\"><figcaption>Imagen Normal</figcaption></figure><p>&nbsp;</p><p>&nbsp;<img src=\"http://www.digident.com.pe/imagenes/productos/A9/A9-04.png\" alt=\"\"><strong>EL ARTE-V</strong></p><p>ART-V es el nuevo nombre de la función MAR de Vatech.<br>(Tecnología de reducción de artefactos de Vatech)</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://www.vatech.com/files/attach/images/288/455/034/a8c2180cd6d798c2e1e00bad88e5a23c.png\"><figcaption><strong>ART-V encendido</strong></figcaption></figure><p>&nbsp;</p><figure class=\"image\"><img src=\"https://www.vatech.com/files/attach/images/288/455/034/4fbb62eb3ba5a062616f92ddeb4f91b7.png\"><figcaption><strong>ART-V Apagado</strong></figcaption></figure><h2>&nbsp;</h2><h2><strong>MINIMICE LOS ARTEFACTOS DE MOVIMIENTO CON LA TECNOLOGÍA RAPID CEPH</strong></h2><p>El siguiente paso en tecnología cefalométrica, el nuevo Rapid Ceph de Vatech, minimiza los artefactos de movimiento y<br>permite un flujo de trabajo de diagnóstico más rápido al tiempo que proporciona imágenes digitales de la más alta calidad.</p><p><br><img src=\"https://www.vatech.com/files/attach/images/288/891/035/592be15421a966356d84353b932a9e6b.png\" alt=\"2204_02.png\"><br>&nbsp;</p>', 0, 0, 'https://www.youtube.com/embed/8UlX4a_zYNk', 0, 1, NULL, '1', '2022-12-22 01:18:33', '2022-12-22 03:58:39'),
(6, 7, 11, 'Implante BT Ø4.0 (Compatible)', 'implante-bt-o40-compatible', 'IM-S394E)', 80.00, 80.00, NULL, 'Implante BT (Compatible)', '<p>Implante compatible con los accesorios de las marcas <strong>Anyone</strong>,&nbsp;<strong>Dentium,&nbsp;Neobiotech y otros productos de procedencia coreana</strong>.</p><p>&nbsp;</p><ul><li>Tipo de rosca abierta para reducir la carga durante la colocación</li><li>Diseño cónico recto para una colocación estable</li><li>Fácil entrada debido a ápice afilado</li><li>Función de autorroscado mejorada cortando</li></ul>', 0, 0, NULL, 1, 1, '<figure class=\"table\"><table><tbody><tr><td><ul><li><strong>Diametro:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Ø4.0</p></td><td><ul><li><strong>Configuración:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Conico, Recto</p></td></tr><tr><td><ul><li><strong>Material:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Titanio</p></td><td><ul><li><strong>Conexión:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Hexagonal Interno</p></td></tr><tr><td colspan=\"2\"><ul><li><strong>Longitud de Implante:</strong></li><li>7.0mm, 8.5mm, 10.0mm, 11.5mm y 13.0mm</li></ul></td></tr></tbody></table></figure>', '1', '2022-12-22 01:29:36', '2022-12-22 01:51:06'),
(7, 7, 11, 'Implante BT Ø4.5 (Compatible)', 'implante-bt-o45-compatible', 'IM-S205E)', 80.00, 80.00, NULL, 'Implante BT (Compatible)', '<p><strong>Información del producto:</strong></p><p>&nbsp;</p><p>Implante compatible con los accesorios de las marcas <strong>Anyone</strong>,&nbsp;<strong>Dentium,&nbsp;Neobiotech y otros productos de procedencia coreana</strong>.</p><p>&nbsp;</p><ul><li>Tipo de rosca abierta para reducir la carga durante la colocación</li><li>Diseño cónico recto para una colocación estable</li><li>Fácil entrada debido a ápice afilado</li><li>Función de autorroscado mejorada cortando</li></ul>', 0, 0, NULL, 1, 1, '<figure class=\"table\"><table><tbody><tr><td><ul><li><strong>Diametro:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Ø4.5</p></td><td><ul><li><strong>Configuración:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Conico, Recto</p></td></tr><tr><td><ul><li><strong>Material:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Titanio</p></td><td><ul><li><strong>Conexión:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Hexagonal Interno</p></td></tr><tr><td colspan=\"2\"><ul><li><strong>Longitud de Implante:</strong></li><li>7.0mm, 8.5mm, 10.0mm, 11.5mm y 13.0mm</li></ul></td></tr></tbody></table></figure>', '1', '2022-12-22 01:40:14', '2022-12-22 01:40:14'),
(8, 7, 15, 'Implante AnyOne Ø3.5', 'implante-anyone-o35', 'IM-S160.5', 100.00, 100.00, NULL, 'Implante AO', '<p>Los implante de AnyOne son compatible con los implantes de las marcas <strong>Kuwotech, Dentium, Neobiotech y otro producto de procedencia coreana</strong></p>', 0, 0, NULL, 1, 1, '<figure class=\"table\"><table><tbody><tr><td><ul><li><strong>Diametro:&nbsp;</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ø4.0</p></td><td><ul><li><strong>Configuración:&nbsp;</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Conico, Recto</p></td></tr><tr><td><ul><li><strong>Material:</strong></li></ul><p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Titanio</p></td><td><ul><li><strong>Conexión:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Hexagonal Interno&nbsp;</p></td></tr><tr><td colspan=\"2\"><ul><li><strong>Longitud de Implates:&nbsp;</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;7mm, 8.5mm, 10mm, 11.5mm, 13mm,&nbsp;15mm</p></td></tr></tbody></table></figure>', '1', '2022-12-22 02:06:47', '2022-12-22 02:22:37'),
(9, 7, 15, 'Implante AnyOne Ø4.0', 'implante-anyone-o40', 'IM-S67.0', 100.00, 100.00, NULL, 'Implante AO', '<p><strong>Información del producto:</strong></p><p>&nbsp;</p><p>Los implante de AnyOne son compatible con los implantes de las marcas <strong>Kuwotech, Dentium, Neobiotech y otro producto de procedencia coreana</strong></p>', 0, 0, NULL, 1, 1, '<figure class=\"table\"><table><tbody><tr><td><ul><li><strong>Diametro:&nbsp;</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ø4.0</p></td><td><ul><li><strong>Configuración:&nbsp;</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Conico, Recto</p></td></tr><tr><td><ul><li><strong>Material:</strong></li></ul><p><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>Titanio</p></td><td><ul><li><strong>Conexión:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Hexagonal Interno&nbsp;</p></td></tr><tr><td colspan=\"2\"><ul><li><strong>Longitud de Implates:&nbsp;</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;7mm, 8.5mm, 10mm, 11.5mm, 13mm, 15mm</p></td></tr></tbody></table></figure>', '1', '2022-12-22 02:17:29', '2022-12-22 02:19:03'),
(10, 8, 11, 'Pilar Fino Recto Ø4.5', 'pilar-fino-recto-o45', 'PI-S133.5', 45.00, 45.00, NULL, 'Pilar Fino Recto KW', '<p>&nbsp;Pilar Fino Recto compatible con los implantes de las marcas&nbsp;<strong>Anyone</strong>,&nbsp;<strong>Dentium, Neobiotech y otros productos de procedencia coreana</strong></p><p>&nbsp;</p><ul><li>Torque Recomendado : 35Ncm</li><li>Incluido un tornillo de pilar</li></ul>', 0, 0, NULL, 1, 1, '<figure class=\"table\"><table><tbody><tr><td><ul><li><strong>Diametro:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Ø4.5</p></td><td><ul><li><strong>Configuración:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Recto</p></td></tr><tr><td><ul><li><strong>Material:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Titanio</p></td><td><ul><li><strong>Conexión:</strong></li></ul><p>&nbsp; &nbsp; &nbsp; &nbsp; Hexagonal y No Hexagonal</p></td></tr><tr><td colspan=\"2\"><ul><li><strong>Cuff:</strong></li><li>1.5mm, 2.5mm, 3.5mm, 4.5mm y 5.5mm</li><li><strong>Longitud de Pilar:</strong></li><li>4.5mm, 5.5mm y 7.0mm</li></ul></td></tr></tbody></table></figure>', '1', '2022-12-22 02:30:17', '2022-12-22 02:30:17'),
(11, 8, 15, 'Healing Ø4 AnyOne', 'healing-o4-anyone', 'HE-S244NE', 25.00, 25.00, NULL, 'Healing AnyOne', '<p>Healing&nbsp;de AnyOne son compatible con los implantes de las marcas <strong>Kuwotech, Dentium, Neobiotech y otro producto de procedencia coreana</strong></p>', 0, 0, NULL, 1, 1, '<figure class=\"table\"><table><tbody><tr><td><p><strong>Diametro:</strong></p><p>&nbsp; &nbsp; &nbsp; Ø 4&nbsp;&nbsp;</p></td><td><p><strong>Altura:&nbsp;</strong></p><p>&nbsp; &nbsp; &nbsp; 3mm, 4mm, 5mm, 6mm, 7mm</p></td></tr><tr><td colspan=\"2\"><p><strong>Material:&nbsp;</strong></p><p><strong>&nbsp; &nbsp; &nbsp;</strong>Titanio</p></td></tr></tbody></table></figure>', '1', '2022-12-22 02:47:35', '2022-12-22 02:47:35'),
(12, 8, 15, 'Calcinable Ø4.5 AnyOne', 'calcinable-o45-anyone', 'CA-S176NE', 60.00, 60.00, NULL, 'Calcinable Ø4.5 AO', '<p>El Calcinable de AnyOne son compatible con los implantes de las marcas <strong>Kuwotech, Dentium, Neobiotech y otro producto de procedencia coreana</strong></p>', 0, 0, NULL, 1, 1, '<figure class=\"table\"><table><tbody><tr><td><ul><li><strong>Diámetro:&nbsp;</strong>Ø4.5</li></ul></td><td><ul><li><strong>Altura cofia:&nbsp;</strong>1.0mm</li><li><strong>Altura post: </strong>11.0mm</li></ul></td></tr><tr><td colspan=\"2\"><ul><li><strong>Tipo:&nbsp;</strong>Hexagonal y No Hexagonal&nbsp;</li></ul></td></tr></tbody></table></figure>', '1', '2022-12-22 03:08:29', '2022-12-22 03:08:29'),
(15, 2, 16, 'Clarox VX-30', 'clarox-vx-30', 'CL-S40430', 2990.00, 3200.00, 1, 'SISTEMA DE RAYOS X DENTAL', '<p>Clarox VX-30 de VSI Korea , el sistema de rayos X intraoral portátil más ligero , que satisface todas las necesidades primarias de diagnóstico dental al crear las imágenes mas claras en todo momento, liderando en el sector de Rayos x del mundo con tecnología de nanotubos de carbono (CNT).</p><p>&nbsp;</p><p><strong>Aplicación de fuente de rayos X digital de nanotubos de carbono libres de filamentos (CNT)</strong></p><p>&nbsp;</p><p>Control de pulso digital ultrarrápido en menos de ㎲ (1/1000000 seg)</p><p>-Irradiación precisa de rayos X en el momento deseado por el usuario<br>-No se requiere tiempo de preparación<br>-Imágenes claras mediante la emisión de rayos X de onda cuadrada perfecta<br>-Control de dosis activo por operación en modo pulso</p><figure class=\"image\"><img src=\"/storage/ckeditor/fDR7rBoomN5Q1zZTrFAeuxcAXka3XqIXHDjxdfbR.png\"></figure><p><strong>Interfaz de usuario sencilla y fácil de usar (UI)</strong></p><p><br>Seleccione todas las funciones y condiciones de irradiación con un dial</p><p>-Ajuste el tiempo de irradiación en incrementos de 0,01 segundos adaptados al entorno de examen del usuario.<br>-Fácil de usar seleccionando el menú intuitivo de la interfaz de usuario.<br>-Limitar el control de la operación para evitar malas manipulaciones.</p><p>&nbsp;</p><p><strong>Amplio rango de aplicación con alta energía/alta dosis de 70kV, 2mA</strong></p><p>&nbsp;</p><p>-No solo para fines dentales, sino también para exámenes médicos de emergencia e inspección industrial no destructiva, permite imágenes digitales y películas.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"/storage/ckeditor/0KOiXZYVemL2GenB1E08N6ZV15zL5oSWxCaLcm2X.jpg\"></figure>', 0, 0, NULL, 1, 1, '<figure class=\"table\"><table><tbody><tr><th>Punto Focal</th><td>0.4mm [IEC 60336]</td></tr><tr><th>Voltaje de tubo</th><td>70kV</td></tr><tr><th>Corriente de tubo</th><td>2mA</td></tr><tr><th>Rango de tiempo de exposicion</th><td>0.05 ~ 1 sec</td></tr><tr><th>Filtracion Total</th><td>2.1mm Al</td></tr><tr><th>Distancia de la fuente a la piel</th><td>20cm</td></tr><tr><th>FOV</th><td>60mm Round</td></tr><tr><th>Ciclo de trabajo (máximo)&nbsp;&nbsp;&nbsp;&nbsp;</th><td>1:30</td></tr><tr><th>Entrada de alimentación&nbsp;&nbsp;&nbsp;&nbsp;</th><td>24V (22.5V)</td></tr><tr><th>Exposiciones máximas con carga completa&nbsp;&nbsp;&nbsp;&nbsp;</th><td>800 times at 70 kV, 2 mA, 0.5sec</td></tr><tr><th>Peso</th><td>1.5kg [2.2 lbs]</td></tr></tbody></table></figure>', '1', '2022-12-27 20:00:41', '2022-12-27 20:00:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `departamento_id` bigint(20) UNSIGNED NOT NULL,
  `costo` double(8,2) NOT NULL DEFAULT 200.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `nombre`, `departamento_id`, `costo`, `created_at`, `updated_at`) VALUES
(1, 'BAGUA', 1, 200.00, NULL, NULL),
(2, 'BONGARA', 1, 200.00, NULL, NULL),
(3, 'CHACHAPOYAS', 1, 200.00, NULL, NULL),
(4, 'CONDORCANQUI', 1, 200.00, NULL, NULL),
(5, 'LUYA', 1, 200.00, NULL, NULL),
(6, 'RODRIGUEZ DE MENDOZA', 1, 200.00, NULL, NULL),
(7, 'UTCUBAMBA', 1, 200.00, NULL, NULL),
(8, 'AIJA', 2, 200.00, NULL, NULL),
(9, 'ANTONIO RAYMONDI', 2, 200.00, NULL, NULL),
(10, 'ASUNCION', 2, 200.00, NULL, NULL),
(11, 'BOLOGNESI', 2, 200.00, NULL, NULL),
(12, 'CARHUAZ', 2, 200.00, NULL, NULL),
(13, 'CARLOS F.FITZCARRALD', 2, 200.00, NULL, NULL),
(14, 'CASMA', 2, 200.00, NULL, NULL),
(15, 'CORONGO', 2, 200.00, NULL, NULL),
(16, 'HUARAZ', 2, 200.00, NULL, NULL),
(17, 'HUARI', 2, 200.00, NULL, NULL),
(18, 'HUARMEY', 2, 200.00, NULL, NULL),
(19, 'HUAYLAS', 2, 200.00, NULL, NULL),
(20, 'MARISCAL LUZURIAGA', 2, 200.00, NULL, NULL),
(21, 'OCROS', 2, 200.00, NULL, NULL),
(22, 'PALLASCA', 2, 200.00, NULL, NULL),
(23, 'POMABAMBA', 2, 200.00, NULL, NULL),
(24, 'RECUAY', 2, 200.00, NULL, NULL),
(25, 'SANTA', 2, 200.00, NULL, NULL),
(26, 'SIHUAS', 2, 200.00, NULL, NULL),
(27, 'YUNGAY', 2, 200.00, NULL, NULL),
(28, 'ABANCAY', 3, 200.00, NULL, NULL),
(29, 'ANDAHUAYLAS', 3, 200.00, NULL, NULL),
(30, 'ANTABAMBA', 3, 200.00, NULL, NULL),
(31, 'AYMARAES', 3, 200.00, NULL, NULL),
(32, 'CHINCHEROS', 3, 200.00, NULL, NULL),
(33, 'COTABAMBAS', 3, 200.00, NULL, NULL),
(34, 'GRAU', 3, 200.00, NULL, NULL),
(35, 'AREQUIPA', 4, 200.00, NULL, NULL),
(36, 'CAMANA', 4, 200.00, NULL, NULL),
(37, 'CARAVELI', 4, 200.00, NULL, NULL),
(38, 'CASTILLA', 4, 200.00, NULL, NULL),
(39, 'CAYLLOMA', 4, 200.00, NULL, NULL),
(40, 'CONDESUYOS', 4, 200.00, NULL, NULL),
(41, 'ISLAY', 4, 200.00, NULL, NULL),
(42, 'LA UNION', 4, 200.00, NULL, NULL),
(43, 'CANGALLO', 5, 200.00, NULL, NULL),
(44, 'HUAMANGA', 5, 200.00, NULL, NULL),
(45, 'HUANCA SANCOS', 5, 200.00, NULL, NULL),
(46, 'HUANTA', 5, 200.00, NULL, NULL),
(47, 'LA MAR', 5, 200.00, NULL, NULL),
(48, 'LUCANAS', 5, 200.00, NULL, NULL),
(49, 'PARINACOCHAS', 5, 200.00, NULL, NULL),
(50, 'PAUCAR DEL SARA SARA', 5, 200.00, NULL, NULL),
(51, 'SUCRE', 5, 200.00, NULL, NULL),
(52, 'VICTOR FAJARDO', 5, 200.00, NULL, NULL),
(53, 'VILCASHUAMAN', 5, 200.00, NULL, NULL),
(54, 'CAJABAMBA', 6, 200.00, NULL, NULL),
(55, 'CAJAMARCA', 6, 200.00, NULL, NULL),
(56, 'CELENDIN', 6, 200.00, NULL, NULL),
(57, 'CHOTA', 6, 200.00, NULL, NULL),
(58, 'CONTUMAZA', 6, 200.00, NULL, NULL),
(59, 'CUTERVO', 6, 200.00, NULL, NULL),
(60, 'HUALGAYOC', 6, 200.00, NULL, NULL),
(61, 'JAEN', 6, 200.00, NULL, NULL),
(62, 'SAN IGNACIO', 6, 200.00, NULL, NULL),
(63, 'SAN MARCOS', 6, 200.00, NULL, NULL),
(64, 'SAN MIGUEL', 6, 200.00, NULL, NULL),
(65, 'SAN PABLO', 6, 200.00, NULL, NULL),
(66, 'SANTA CRUZ', 6, 200.00, NULL, NULL),
(67, 'ACOMAYO', 7, 200.00, NULL, NULL),
(68, 'ANTA', 7, 200.00, NULL, NULL),
(69, 'CALCA', 7, 200.00, NULL, NULL),
(70, 'CANAS', 7, 200.00, NULL, NULL),
(71, 'CANCHIS', 7, 200.00, NULL, NULL),
(72, 'CHUMBIVILCAS', 7, 200.00, NULL, NULL),
(73, 'CUSCO', 7, 200.00, NULL, NULL),
(74, 'ESPINAR', 7, 200.00, NULL, NULL),
(75, 'LA CONVENCION', 7, 200.00, NULL, NULL),
(76, 'PARURO', 7, 200.00, NULL, NULL),
(77, 'PAUCARTAMBO', 7, 200.00, NULL, NULL),
(78, 'QUISPICANCHI', 7, 200.00, NULL, NULL),
(79, 'URUBAMBA', 7, 200.00, NULL, NULL),
(80, 'ACOBAMBA', 8, 200.00, NULL, NULL),
(81, 'ANGARAES', 8, 200.00, NULL, NULL),
(82, 'CASTROVIRREYNA', 8, 200.00, NULL, NULL),
(83, 'CHURCAMPA', 8, 200.00, NULL, NULL),
(84, 'HUANCAVELICA', 8, 200.00, NULL, NULL),
(85, 'HUAYTARA', 8, 200.00, NULL, NULL),
(86, 'TAYACAJA', 8, 200.00, NULL, NULL),
(87, 'AMBO', 9, 200.00, NULL, NULL),
(88, 'DOS DE MAYO', 9, 200.00, NULL, NULL),
(89, 'HUACAYBAMBA', 9, 200.00, NULL, NULL),
(90, 'HUAMALIES', 9, 200.00, NULL, NULL),
(91, 'HUANUCO', 9, 200.00, NULL, NULL),
(92, 'LAURICOCHA', 9, 200.00, NULL, NULL),
(93, 'LEONCIO PRADO', 9, 200.00, NULL, NULL),
(94, 'MARAÑON', 9, 200.00, NULL, NULL),
(95, 'PACHITEA', 9, 200.00, NULL, NULL),
(96, 'PUERTO INCA', 9, 200.00, NULL, NULL),
(97, 'YAROWILCA', 9, 200.00, NULL, NULL),
(98, 'CHINCHA', 10, 200.00, NULL, NULL),
(99, 'ICA', 10, 200.00, NULL, NULL),
(100, 'NAZCA', 10, 200.00, NULL, NULL),
(101, 'PALPA', 10, 200.00, NULL, NULL),
(102, 'PISCO', 10, 200.00, NULL, NULL),
(103, 'CHANCHAMAYO', 11, 200.00, NULL, NULL),
(104, 'CHUPACA', 11, 200.00, NULL, NULL),
(105, 'CONCEPCION', 11, 200.00, NULL, NULL),
(106, 'HUANCAYO', 11, 200.00, NULL, NULL),
(107, 'JAUJA', 11, 200.00, NULL, NULL),
(108, 'JUNIN', 11, 200.00, NULL, NULL),
(109, 'SATIPO', 11, 200.00, NULL, NULL),
(110, 'TARMA', 11, 200.00, NULL, NULL),
(111, 'YAULI', 11, 200.00, NULL, NULL),
(112, 'ASCOPE', 12, 200.00, NULL, NULL),
(113, 'BOLIVAR', 12, 200.00, NULL, NULL),
(114, 'CHEPEN', 12, 200.00, NULL, NULL),
(115, 'GRAN CHIMU', 12, 200.00, NULL, NULL),
(116, 'JULCAN', 12, 200.00, NULL, NULL),
(117, 'OTUZCO', 12, 200.00, NULL, NULL),
(118, 'PACASMAYO', 12, 200.00, NULL, NULL),
(119, 'PATAZ', 12, 200.00, NULL, NULL),
(120, 'SANCHEZ CARRION', 12, 200.00, NULL, NULL),
(121, 'SANTIAGO DE CHUCO', 12, 200.00, NULL, NULL),
(122, 'TRUJILLO', 12, 200.00, NULL, NULL),
(123, 'VIRU', 12, 200.00, NULL, NULL),
(124, 'CHICLAYO', 13, 200.00, NULL, NULL),
(125, 'FERREÑAFE', 13, 200.00, NULL, NULL),
(126, 'LAMBAYEQUE', 13, 200.00, NULL, NULL),
(127, 'BARRANCA', 14, 200.00, NULL, NULL),
(128, 'CAJATAMBO', 14, 200.00, NULL, NULL),
(129, 'CALLAO', 14, 200.00, NULL, NULL),
(130, 'CANTA', 14, 200.00, NULL, NULL),
(131, 'CAÑETE', 14, 200.00, NULL, NULL),
(132, 'HUARAL', 14, 200.00, NULL, NULL),
(133, 'HUAROCHIRI', 14, 200.00, NULL, NULL),
(134, 'HUAURA', 14, 200.00, NULL, NULL),
(135, 'LIMA', 14, 200.00, NULL, NULL),
(136, 'OYON', 14, 200.00, NULL, NULL),
(137, 'YAUYOS', 14, 200.00, NULL, NULL),
(138, 'ALTO AMAZONAS', 15, 200.00, NULL, NULL),
(139, 'LORETO', 15, 200.00, NULL, NULL),
(140, 'MARISCAL R.CASTILLA', 15, 200.00, NULL, NULL),
(141, 'MAYNAS', 15, 200.00, NULL, NULL),
(142, 'REQUENA', 15, 200.00, NULL, NULL),
(143, 'UCAYALI', 15, 200.00, NULL, NULL),
(144, 'MANU', 16, 200.00, NULL, NULL),
(145, 'TAHUAMANU', 16, 200.00, NULL, NULL),
(146, 'TAMBOPATA', 16, 200.00, NULL, NULL),
(147, 'GENERAL SANCHEZ CERRO', 17, 200.00, NULL, NULL),
(148, 'ILO', 17, 200.00, NULL, NULL),
(149, 'MARISCAL NIETO', 17, 200.00, NULL, NULL),
(150, 'DANIEL ALCIDES CARRION', 18, 200.00, NULL, NULL),
(151, 'OXAPAMPA', 18, 200.00, NULL, NULL),
(152, 'PASCO', 18, 200.00, NULL, NULL),
(153, 'AYABACA', 19, 200.00, NULL, NULL),
(154, 'HUANCABAMBA', 19, 200.00, NULL, NULL),
(155, 'MORROPON', 19, 200.00, NULL, NULL),
(156, 'PAITA', 19, 200.00, NULL, NULL),
(157, 'PIURA', 19, 200.00, NULL, NULL),
(158, 'SECHURA', 19, 200.00, NULL, NULL),
(159, 'SULLANA', 19, 200.00, NULL, NULL),
(160, 'TALARA', 19, 200.00, NULL, NULL),
(161, 'AZANGARO', 20, 200.00, NULL, NULL),
(162, 'CARABAYA', 20, 200.00, NULL, NULL),
(163, 'CHUCUITO', 20, 200.00, NULL, NULL),
(164, 'EL COLLAO', 20, 200.00, NULL, NULL),
(165, 'HUANCANE', 20, 200.00, NULL, NULL),
(166, 'LAMPA', 20, 200.00, NULL, NULL),
(167, 'MELGAR', 20, 200.00, NULL, NULL),
(168, 'MOHO', 20, 200.00, NULL, NULL),
(169, 'PUNO', 20, 200.00, NULL, NULL),
(170, 'SAN ANTONIO DE PUTINA', 20, 200.00, NULL, NULL),
(171, 'SAN ROMAN', 20, 200.00, NULL, NULL),
(172, 'SANDIA', 20, 200.00, NULL, NULL),
(173, 'YUNGUYO', 20, 200.00, NULL, NULL),
(174, 'BELLAVISTA', 21, 200.00, NULL, NULL),
(175, 'EL DORADO', 21, 200.00, NULL, NULL),
(176, 'HUALLAGA', 21, 200.00, NULL, NULL),
(177, 'LAMAS', 21, 200.00, NULL, NULL),
(178, 'MARISCAL CACERES', 21, 200.00, NULL, NULL),
(179, 'MOYOBAMBA', 21, 200.00, NULL, NULL),
(180, 'PICOTA', 21, 200.00, NULL, NULL),
(181, 'RIOJA', 21, 200.00, NULL, NULL),
(182, 'SAN MARTIN', 21, 200.00, NULL, NULL),
(183, 'TOCACHE', 21, 200.00, NULL, NULL),
(184, 'CANDARAVE', 22, 200.00, NULL, NULL),
(185, 'JORGE BASADRE', 22, 200.00, NULL, NULL),
(186, 'TACNA', 22, 200.00, NULL, NULL),
(187, 'TARATA', 22, 200.00, NULL, NULL),
(188, 'CONTRALMIRANTE VILLAR', 23, 200.00, NULL, NULL),
(189, 'TUMBES', 23, 200.00, NULL, NULL),
(190, 'ZARUMILLA', 23, 200.00, NULL, NULL),
(191, 'ATALAYA', 24, 200.00, NULL, NULL),
(192, 'CORONEL PORTILLO', 24, 200.00, NULL, NULL),
(193, 'PADRE ABAD', 24, 200.00, NULL, NULL),
(194, 'PURUS', 24, 200.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resenas`
--

CREATE TABLE `resenas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comentario` text NOT NULL,
  `puntaje` int(11) NOT NULL,
  `padre_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'web', '2022-12-21 02:05:28', '2022-12-21 02:05:28'),
(2, 'almacen', 'web', '2022-12-21 02:05:28', '2022-12-21 02:05:28'),
(3, 'vendedor', 'web', '2022-12-21 02:05:28', '2022-12-21 02:05:28');

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
(2, 2),
(2, 3),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 2),
(8, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('zk2W4iT9dCZuj9FUksU2O3ZhPK7uUcaZp4IDhZi9', 1, '181.65.25.125', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibkVVaUlVY2JMdnRkYVpKV3NDMThacjNGOWxIaVJyZVVZc0tpVU1zOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9odGRlbnRwcnVlYmEuZGlnaWRlbnQuY29tLnBlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1672246783);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) NOT NULL,
  `instance` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imagen_ruta` varchar(255) DEFAULT NULL,
  `link` varchar(255) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=visible, 1=oculto',
  `posicion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `imagen_ruta`, `link`, `estado`, `posicion`, `created_at`, `updated_at`) VALUES
(1, 'imagenes/slider/slider1.jpg', 'equipos-intraorales', 0, 1, '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(2, 'imagenes/slider/slider2.jpg', 'materiales', 0, 2, '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(3, 'imagenes/slider/slider3.jpg', 'implantes', 0, 3, '2022-12-21 02:05:29', '2022-12-21 02:05:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `imagen_ruta` varchar(255) DEFAULT NULL,
  `tiene_color` tinyint(1) NOT NULL DEFAULT 0,
  `tiene_medida` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `categoria_id`, `nombre`, `slug`, `imagen_ruta`, `tiene_color`, `tiene_medida`, `created_at`, `updated_at`) VALUES
(2, 2, 'Rayos x Portatil', 'rayos-x-portatil', NULL, 0, 0, '2022-12-21 03:44:15', '2022-12-21 03:44:15'),
(3, 2, 'Sensor RVG', 'sensor-rvg', NULL, 0, 0, '2022-12-21 21:59:47', '2022-12-21 21:59:47'),
(4, 2, 'Digitalizador Intraoral', 'digitalizador-intraoral', NULL, 0, 0, '2022-12-21 22:25:03', '2022-12-21 22:25:03'),
(5, 3, '2D', '2d', NULL, 0, 0, '2022-12-21 22:32:47', '2022-12-21 22:32:47'),
(6, 3, '3D', '3d', NULL, 0, 0, '2022-12-21 22:32:57', '2022-12-21 22:32:57'),
(7, 4, 'Implantes', 'implantes', NULL, 0, 1, '2022-12-22 01:25:00', '2022-12-22 02:13:09'),
(8, 4, 'Accesorios', 'accesorios', NULL, 0, 1, '2022-12-22 02:04:33', '2022-12-23 22:37:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonios`
--

CREATE TABLE `testimonios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `posicion` int(11) NOT NULL,
  `imagen_ruta` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `testimonios`
--

INSERT INTO `testimonios` (`id`, `nombre`, `cargo`, `comentario`, `posicion`, `imagen_ruta`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Marco Pella', 'Clinica de Ortodoncia Pella', 'Estoy muy satisfecho con el equipo Pointnix, las imágenes superan en calidad a la competencia', 1, NULL, '2022-12-28 21:11:53', '2022-12-28 21:18:52'),
(2, 'Dr. Joel Pacheco', 'Clinica Dorthon', 'Comparando con el equipo que tenía antes, este equipo Panorámico que tengo ahora es mucho mejor, la calidad de imagen es muy buena y puedo aprovechar el software para mejorar los implantes.', 2, NULL, '2022-12-28 21:17:04', '2022-12-28 21:17:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `rol` enum('administrador','cliente') NOT NULL DEFAULT 'cliente',
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `rol`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mersmith14@gmail.com', NULL, 'administrador', '$2y$10$hA//xTNTGEcgVRMeZGWfqOKvq5l4bMfAT/0wtxBImzQxw.tWIKRly', NULL, NULL, NULL, NULL, '2022-12-21 02:05:28', '2022-12-21 02:05:28'),
(2, 'sistemas3@digident.com.pe', NULL, 'cliente', '$2y$10$07WE6Kt2UZkaJs4wpeDFoOHGn4jl6ZKG.GrB/M8TUjJYLcckMKlkW', NULL, NULL, NULL, NULL, '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(3, 'jacinthe09@example.com', '2022-12-21 02:05:29', 'administrador', '$2y$10$/2wjn32qO4Txky.XE2GTS.uknzUWgTPrCfYSpO/WpJFftp5uzoHju', NULL, NULL, NULL, 'pvZnwnI9E4', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(4, 'nolan.benton@example.com', '2022-12-21 02:05:29', 'administrador', '$2y$10$mXonvC85bhdGLCBOeRzx1e8vQvR.YyiJWeIP74R6iwqP.aoPUosX6', NULL, NULL, NULL, 'Ztzp12Yahi', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(5, 'schimmel.dora@example.net', '2022-12-21 02:05:29', 'administrador', '$2y$10$3oICSD1MH43OXLQLwbFT..sL73n.cMCBGG4uDwQf4uj5cB6WHzj2K', NULL, NULL, NULL, '6I9QVsNya6', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(6, 'morgan.lesch@example.com', '2022-12-21 02:05:29', 'administrador', '$2y$10$5xzllmbtp4MdnikH/6Xz7uZlntNxOlCEBinbbvSU9IhTp.9ZdCG8q', NULL, NULL, NULL, 'H7LdQH9gfy', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(7, 'vida.senger@example.org', '2022-12-21 02:05:29', 'administrador', '$2y$10$ALYNBjXjoWoSWvlo4KloeOVE4O5nospcbvbCcYD8R0RMBZPl7TaNW', NULL, NULL, NULL, '8g16cnqk45', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(8, 'treva.kshlerin@example.net', '2022-12-21 02:05:29', 'cliente', '$2y$10$j0SSTZh14KN/KGeOsGr/Au.tbkk8njOxgESDaZ1UfxW5W6QR/YAvG', NULL, NULL, NULL, 'zPuFgqJWyZ', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(9, 'vspinka@example.com', '2022-12-21 02:05:29', 'cliente', '$2y$10$4VzCam5Aup2mmZ4FQElaX.9oL.lqY2eH27kIcaHhGlH/5Tsq0Y4tm', NULL, NULL, NULL, 'fxkiddnUvL', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(10, 'jimmy99@example.net', '2022-12-21 02:05:29', 'cliente', '$2y$10$5vy6wOVntV2aqEmzWtFd5./.rXyTFR8yS6FQ9t3C5ec1IwhJ1hGDW', NULL, NULL, NULL, 'zZ2pbNtvoe', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(11, 'morgan.hagenes@example.org', '2022-12-21 02:05:29', 'cliente', '$2y$10$gS5VTeGwOuCajSmyWxPmQ.N0lm0f/LNtIfBFEgCRtCGHlTQLJYVaO', NULL, NULL, NULL, 'InESvtad28', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(12, 'jeff25@example.net', '2022-12-21 02:05:29', 'cliente', '$2y$10$yBdcGoRJyLeqVqb3MU69j.JQu1TWT5eKAVFllGsKoC8zuzt2IDfWy', NULL, NULL, NULL, 'uk8Yg2zWVM', '2022-12-21 02:05:29', '2022-12-21 02:05:29'),
(13, 'sistemas2@digident.com.pe', NULL, 'cliente', '$2y$10$6NOou0x5rjYnykSMUw7jn.4LqZp6LfzvPYXQLetUtpFhTaooHcxiq', NULL, NULL, NULL, NULL, '2022-12-23 02:25:12', '2022-12-23 02:25:12'),
(14, 'sistemas1@digident.com.pe', NULL, 'cliente', '$2y$10$6dFwU0Mgyf5K6rXCc.8L6.92dYSlZiFuOgc6keoyO9QuL0GUL0/EC', NULL, NULL, NULL, NULL, '2022-12-23 02:53:24', '2022-12-23 02:53:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradors`
--
ALTER TABLE `administradors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administradors_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `administradors_correo_unique` (`correo`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_marca`
--
ALTER TABLE `categoria_marca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_marca_marca_id_foreign` (`marca_id`),
  ADD KEY `categoria_marca_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `ckeditors`
--
ALTER TABLE `ckeditors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientes_user_id_unique` (`user_id`),
  ADD UNIQUE KEY `clientes_correo_unique` (`correo`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `color_medida`
--
ALTER TABLE `color_medida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_medida_color_id_foreign` (`color_id`),
  ADD KEY `color_medida_medida_id_foreign` (`medida_id`);

--
-- Indices de la tabla `color_producto`
--
ALTER TABLE `color_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_producto_color_id_foreign` (`color_id`),
  ADD KEY `color_producto_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cupons_codigo_unique` (`codigo`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `direccions`
--
ALTER TABLE `direccions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `direccions_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distritos_provincia_id_foreign` (`provincia_id`);

--
-- Indices de la tabla `fortalezas`
--
ALTER TABLE `fortalezas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medidas_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `medios_pagos`
--
ALTER TABLE `medios_pagos`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `ordens`
--
ALTER TABLE `ordens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordens_user_id_foreign` (`user_id`);

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
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productos_slug_unique` (`slug`),
  ADD UNIQUE KEY `productos_sku_unique` (`sku`),
  ADD KEY `productos_subcategoria_id_foreign` (`subcategoria_id`),
  ADD KEY `productos_marca_id_foreign` (`marca_id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provincias_departamento_id_foreign` (`departamento_id`);

--
-- Indices de la tabla `resenas`
--
ALTER TABLE `resenas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resena_resena` (`padre_id`),
  ADD KEY `resenas_user_id_foreign` (`user_id`),
  ADD KEY `resenas_producto_id_foreign` (`producto_id`);

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
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategorias_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradors`
--
ALTER TABLE `administradors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoria_marca`
--
ALTER TABLE `categoria_marca`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ckeditors`
--
ALTER TABLE `ckeditors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `color_medida`
--
ALTER TABLE `color_medida`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `color_producto`
--
ALTER TABLE `color_producto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cupons`
--
ALTER TABLE `cupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `direccions`
--
ALTER TABLE `direccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1831;

--
-- AUTO_INCREMENT de la tabla `fortalezas`
--
ALTER TABLE `fortalezas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagens`
--
ALTER TABLE `imagens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `medios_pagos`
--
ALTER TABLE `medios_pagos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `ordens`
--
ALTER TABLE `ordens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT de la tabla `resenas`
--
ALTER TABLE `resenas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administradors`
--
ALTER TABLE `administradors`
  ADD CONSTRAINT `administradors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `categoria_marca`
--
ALTER TABLE `categoria_marca`
  ADD CONSTRAINT `categoria_marca_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categoria_marca_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `color_medida`
--
ALTER TABLE `color_medida`
  ADD CONSTRAINT `color_medida_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `color_medida_medida_id_foreign` FOREIGN KEY (`medida_id`) REFERENCES `medidas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `color_producto`
--
ALTER TABLE `color_producto`
  ADD CONSTRAINT `color_producto_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `color_producto_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `direccions`
--
ALTER TABLE `direccions`
  ADD CONSTRAINT `direccions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD CONSTRAINT `distritos_provincia_id_foreign` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD CONSTRAINT `medidas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

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
-- Filtros para la tabla `ordens`
--
ALTER TABLE `ordens`
  ADD CONSTRAINT `ordens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_subcategoria_id_foreign` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `provincias_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `resenas`
--
ALTER TABLE `resenas`
  ADD CONSTRAINT `fk_resena_resena` FOREIGN KEY (`padre_id`) REFERENCES `resenas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resenas_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resenas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD CONSTRAINT `subcategorias_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
