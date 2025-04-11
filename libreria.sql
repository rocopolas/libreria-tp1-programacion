-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2025 a las 17:43:42
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
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `editorial` varchar(100) DEFAULT NULL,
  `año` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `editorial`, `año`) VALUES
(7, 'Cien años de soledad', 'Gabriel García Márquez', 'Sudamericana', 1967),
(8, 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'Francisco de Robles', 1605),
(9, 'Orgullo y prejuicio', 'Jane Austen', 'T. Egerton', 1813),
(10, '1984', 'George Orwell', 'Secker & Warburg', 1949),
(11, 'Matar a un ruiseñor', 'Harper Lee', 'J.B. Lippincott & Co.', 1960),
(12, 'Crimen y castigo', 'Fiódor Dostoyevski', 'The Russian Messenger', 1866),
(13, 'La metamorfosis', 'Franz Kafka', 'Kurt Wolff Verlag', 1915),
(14, 'El principito', 'Antoine de Saint-Exupéry', 'Reynal & Hitchcock', 1943),
(15, 'Rayuela', 'Julio Cortázar', 'Sudamericana', 1963),
(16, 'Fahrenheit 451', 'Ray Bradbury', 'Ballantine Books', 1953),
(17, 'El nombre de la rosa', 'Umberto Eco', 'Bompiani', 1980),
(18, 'Los miserables', 'Victor Hugo', 'A. Lacroix, Verboeckhoven & Cie.', 1862),
(19, 'El extranjero', 'Albert Camus', 'Gallimard', 1942),
(20, 'Drácula', 'Bram Stoker', 'Archibald Constable and Company', 1897),
(21, 'El gran Gatsby', 'F. Scott Fitzgerald', 'Charles Scribner\'s Sons', 1925);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
