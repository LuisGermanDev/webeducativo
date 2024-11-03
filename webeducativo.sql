-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 03-11-2024 a las 07:41:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webeducativo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE `contenido` (
  `id` int(11) NOT NULL,
  `titulo` text DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `materia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id`, `titulo`, `contenido`, `img`, `materia`) VALUES
(1, 'asdf', 'sd', 'https://1.bp.blogspot.com/-ZUONvPkopEw/XlaYGNAFD4I/AAAAAAAAO98/_wQbyX1t2zgB3QMDwjPSws_LXT-gEWA0gCLcBGAsYHQ/s900/localhost_phpmyadmin.png', 'matematica'),
(2, 'sfadsf', 'sadfadf', 'https://www.dzoom.org.es/wp-content/uploads/2010/09/mirada-ojos-encuadre-primer-plano-sexy-810x540.jpg', 'matematica'),
(3, 'sdfas', 'asdfaf', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmpa-OPGCHyX-GPQRrwoR289o79lh94R-ERw&s', 'historia'),
(4, 'sadf', 'sadf', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTmpa-OPGCHyX-GPQRrwoR289o79lh94R-ERw&s', 'historia'),
(5, 'asdf', 'sadf', 'safda', 'ciencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `titulo` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `materia` text DEFAULT NULL,
  `enlace` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `titulo`, `descripcion`, `materia`, `enlace`) VALUES
(1, 'sdf', 'sdf', 'matematica', 'https://www.google.com/search?client=opera-gx&hs=Sdo&sca_esv=b6652a83a08e5308&sxsrf=ADLYWIJSRum_E1ApGlxUpsfwvkyWaenYZA:1730597094240&q=perfil&udm=2&fbs=AEQNm0CbCVgAZ5mWEJDg6aoPVcBgWizR0-0aFOH11Sb5tlNhdzvguW7TJ8ZJj4v-NOGupFjybypXATN8-ElM0wR8g3shybH7ipkdhG1NG_Mzn5NCSzqB5G5CgUoVnVabscUAYwF1_3gn6z6gv-urS9izuzNL1vhWnVp-swj9NVxg6WM0NSDVmlq3sJEyQMd0fNMytD5gLRcV&sa=X&ved=2ahUKEwiktLTIgL-JAxUCqZUCHSeQKDAQtKgLegQIChAB&biw=1879&bih=969&dpr=1#vhid=4_J8rwj0GeWPTM&vssid=mosaic'),
(2, 'asfa', 'asdf', 'matematica', 'https://www.google.com/search?client=opera-gx&hs=Sdo&sca_esv=b6652a83a08e5308&sxsrf=ADLYWIJSRum_E1ApGlxUpsfwvkyWaenYZA:1730597094240&q=perfil&udm=2&fbs=AEQNm0CbCVgAZ5mWEJDg6aoPVcBgWizR0-0aFOH11Sb5tlNhdzvguW7TJ8ZJj4v-NOGupFjybypXATN8-ElM0wR8g3shybH7ipkdhG1NG_Mzn5NCSzqB5G5CgUoVnVabscUAYwF1_3gn6z6gv-urS9izuzNL1vhWnVp-swj9NVxg6WM0NSDVmlq3sJEyQMd0fNMytD5gLRcV&sa=X&ved=2ahUKEwiktLTIgL-JAxUCqZUCHSeQKDAQtKgLegQIChAB&biw=1879&bih=969&dpr=1#vhid=4_J8rwj0GeWPTM&vssid=mosaic');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
