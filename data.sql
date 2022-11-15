/*Marcas*/
INSERT INTO `marcas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(2, 'Vatech', '2022-11-15 22:29:04', '2022-11-15 22:29:04'),
(3, 'Pointnix', '2022-11-15 22:29:10', '2022-11-15 22:29:10'),
(4, 'Point Implant ', '2022-11-15 22:29:19', '2022-11-15 22:29:19'),
(5, 'Megagen', '2022-11-15 22:29:27', '2022-11-15 22:29:27'),
(6, 'Kuwotech', '2022-11-15 22:29:34', '2022-11-15 22:29:34'),
(7, 'Zirconio', '2022-11-15 22:35:18', '2022-11-15 22:35:18');

/*Colores*/
INSERT INTO `colors` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'ninguno', '2022-11-15 21:59:08', '2022-11-15 21:59:08'),
(2, 'blanco', '2022-11-15 21:59:08', '2022-11-15 21:59:08'),
(3, 'A1', '2022-11-15 21:59:08', '2022-11-15 21:59:08'),
(4, 'A2', '2022-11-15 21:59:08', '2022-11-15 21:59:08'),
(5, 'A3', '2022-11-15 21:59:08', '2022-11-15 21:59:08'),
(6, 'A3.5', '2022-11-15 21:59:08', '2022-11-15 21:59:08');

/*Categorias*/
INSERT INTO `categorias` (`id`, `nombre`, `slug`, `icono`, `imagen_ruta`, `created_at`, `updated_at`) VALUES
(2, 'Equipos extraorales', 'equipos-extraorales', '<i class=\"fa-brands fa-facebook\"></i>', 'categorias/4IiVO7JB8ZvEEI36mjo7WWiHqIfzrwoSDpLWjuD0.png', '2022-11-15 22:31:13', '2022-11-15 22:31:13'),
(3, 'IMPLANTES', 'implantes', '<i class=\"fa-brands fa-facebook\"></i>', 'categorias/H4FAi1KzbsINqGdpFN4EeRHZMLBepFR1o2eKLISM.png', '2022-11-15 22:33:05', '2022-11-15 22:33:05'),
(4, 'Materiales', 'materiales', '<i class=\"fa-brands fa-facebook\"></i>', 'categorias/EOsTiqVUPq4gqoFag0Pp9UdFUvQhedQmMNqJBvmN.png', '2022-11-15 22:35:45', '2022-11-15 22:35:45'),
(5, 'Equipos intraorales', 'equipos-intraorales', '<i class=\"fa-brands fa-facebook\"></i>', 'categorias/Y6oyGuW03b5mOHaaNCQKqB689d0bgtESHRSjpZmw.jpg', '2022-11-15 22:37:41', '2022-11-15 22:37:41');

/*Categorias Marca*/
INSERT INTO `categoria_marca` (`id`, `categoria_id`, `marca_id`, `created_at`, `updated_at`) VALUES
(2, 2, 2, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 3, 5, NULL, NULL),
(5, 3, 4, NULL, NULL),
(6, 3, 6, NULL, NULL),
(7, 4, 2, NULL, NULL),
(8, 4, 7, NULL, NULL),
(9, 5, 2, NULL, NULL);

/*Subcategorias*/
INSERT INTO `subcategorias` (`id`, `categoria_id`, `nombre`, `slug`, `imagen_ruta`, `tiene_color`, `tiene_medida`, `created_at`, `updated_at`) VALUES
(5, 2, 'Pointnix', 'pointnix', NULL, 0, 0, '2022-11-15 22:32:12', '2022-11-15 22:32:12'),
(6, 2, 'Vatech', 'vatech', NULL, 0, 0, '2022-11-15 22:32:24', '2022-11-15 22:32:24'),
(7, 3, 'Point Implant', 'point-implant', NULL, 0, 1, '2022-11-15 22:33:27', '2022-11-15 22:33:27'),
(8, 3, 'Megagen', 'megagen', NULL, 0, 1, '2022-11-15 22:33:39', '2022-11-15 22:33:39'),
(9, 3, 'Kuwotech', 'kuwotech', NULL, 0, 1, '2022-11-15 22:33:51', '2022-11-15 22:33:51'),
(10, 4, 'Zirconia', 'zirconia', NULL, 1, 1, '2022-11-15 22:35:57', '2022-11-15 22:35:57'),
(11, 5, 'Rayos x Portatil', 'rayos-x-portatil', NULL, 0, 0, '2022-11-15 22:38:06', '2022-11-15 22:38:06'),
(12, 5, 'Sensor RVG', 'sensor-rvg', NULL, 0, 1, '2022-11-15 22:38:27', '2022-11-15 22:38:27');

/*Usuarios*/
INSERT INTO `users` (`id`, `email`, `email_verified_at`, `rol`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mersmith14@gmail.com', NULL, 'administrador', '$2y$10$F4GrK5Vns.kRCozU.PbY1.nIZ9MTE9F2tyR26g7oZisYSUrYOJ9na', NULL, NULL, NULL, NULL, '2022-11-15 21:59:06', '2022-11-15 21:59:06'),
(2, 'sistemas3@digident.com.pe', NULL, 'cliente', '$2y$10$QwmyZVT5zQhR00ELxlKtte2t9vXpjujoD02paaQ.SpB9ucPWWaYQe', NULL, NULL, NULL, NULL, '2022-11-15 21:59:07', '2022-11-15 21:59:07');

/*Administradores*/
INSERT INTO `administradors` (`id`, `user_id`, `nombre`, `apellido`, `correo`, `celular`, `rol`, `imagen_ruta`, `created_at`, `updated_at`) VALUES
(1, 1, 'Emerson Smith', 'Huallpa Zanabria', 'sistemas3@digident.com.pe', '960335525', 'administrador', NULL, '2022-11-15 21:59:06', '2022-11-15 21:59:06');

/*Clientes*/
INSERT INTO `clientes` (`id`, `user_id`, `nombre`, `apellido`, `correo`, `celular`, `puntos`, `rol`, `imagen_ruta`, `created_at`, `updated_at`) VALUES
(1, 2, 'Emerson', 'Huallpa', 'mersmith14@gmail.com', '960335525', 0, 'cliente', NULL, '2022-11-15 21:59:07', '2022-11-15 21:59:07');

/*Modelo Roles*/
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1);

/*Roles*/
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'web', '2022-11-15 21:59:04', '2022-11-15 21:59:04'),
(2, 'almacen', 'web', '2022-11-15 21:59:04', '2022-11-15 21:59:04'),
(3, 'vendedor', 'web', '2022-11-15 21:59:04', '2022-11-15 21:59:04');

/*Permisos*/
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Roles y permisos', 'web', '2022-11-15 21:59:04', '2022-11-15 21:59:04'),
(2, 'Ver panel', 'web', '2022-11-15 21:59:04', '2022-11-15 21:59:04'),
(3, 'Crear productos', 'web', '2022-11-15 21:59:05', '2022-11-15 21:59:05'),
(4, 'Editar productos', 'web', '2022-11-15 21:59:05', '2022-11-15 21:59:05'),
(5, 'Eliminar productos', 'web', '2022-11-15 21:59:05', '2022-11-15 21:59:05'),
(6, 'Actualizar productos', 'web', '2022-11-15 21:59:05', '2022-11-15 21:59:05'),
(7, 'Ver ordenes', 'web', '2022-11-15 21:59:05', '2022-11-15 21:59:05'),
(8, 'Ver orden', 'web', '2022-11-15 21:59:06', '2022-11-15 21:59:06');

/*Roles y Permisos*/
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