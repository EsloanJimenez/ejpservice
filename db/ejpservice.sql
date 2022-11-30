-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-11-2022 a las 18:12:27
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejpservice`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `login` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(25) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `password`) VALUES
(1, 'Enrique', '08031994'),
(2, 'Tomas', '26041995'),
(3, 'Yhennifer', '01051994');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bill`
--

CREATE TABLE `bill` (
  `id_bill` int NOT NULL,
  `user_admin` int NOT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `amount` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `bill`
--

INSERT INTO `bill` (`id_bill`, `user_admin`, `description`, `date`, `amount`, `price`) VALUES
(1, 1, 'Logo animado', '2022-09-16 16:00:00', 1, 4000),
(2, 1, 'Pago impuestos', '2022-09-16 17:00:00', 1, 2400),
(4, 1, 'Publicida', '2022-08-16 17:33:00', 1, 550),
(5, 1, 'Copia Para Certificado De Registro Mercantil', '2022-11-22 08:00:00', 1, 500),
(6, 1, 'Pago inpuesto # Referencia 22954539315-0', '2022-11-25 16:00:00', 1, 600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id_customers` int NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `company` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cell_phone` varchar(12) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id_customers`, `name`, `company`, `email`, `cell_phone`) VALUES
(1, 'Jordana', 'Planning Studio', 'Planningstudiojd@gmail.com', '8296697552'),
(2, 'George    ', 'Cafeteria George    ', ' ', '8297758994'),
(3, 'Katherine Ramirez', 'Nicol Fiesta', '', '8296972338'),
(4, 'Vanesa', 'Cooperativa Maestro', '', 'buscarlo!'),
(5, 'Yaniris Perez', 'Events Planner', 'eventsplannerdr@gmail.com', '8094402605'),
(6, 'Ana Ramirez', 'Playa Palmera', '', '8092658251'),
(7, 'Jose Miguel', '', '', '8099669805'),
(8, 'probando', 'si no se borra', '', '54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_waiter`
--

CREATE TABLE `payment_waiter` (
  `id_payment_waiter` int NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `event` int NOT NULL,
  `payment` int NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `payment_waiter`
--

INSERT INTO `payment_waiter` (`id_payment_waiter`, `name`, `date`, `event`, `payment`, `status`) VALUES
(1, 'Esloan Jimenez', '2022-10-15 16:00:00', 1, 2200, 'Pagado'),
(2, 'Tomas Encarnacion', '2022-10-15 16:59:00', 1, 2200, 'Pagado'),
(3, 'Yhennifer Abreu', '2022-10-15 16:00:00', 1, 1600, 'Pagado'),
(4, 'Leiky Piña', '2022-10-15 16:00:00', 1, 1600, 'Pagado'),
(5, 'Erasmo Onniel', '2022-10-15 16:00:00', 1, 1600, 'Pagado'),
(6, 'Esloan Jimenez', '2022-07-23 17:00:00', 2, 2100, 'Pagado'),
(7, 'Tomas Encarnacion', '2022-07-23 17:00:00', 2, 2100, 'Pagado'),
(8, 'Yhennifer Abreu', '2022-07-23 19:43:00', 2, 2100, 'Pagado'),
(9, 'Esloan Jimenez', '2022-06-18 17:00:00', 3, 2100, 'Pagado'),
(10, 'Tomas Encarnacion', '2022-06-18 17:00:00', 3, 2100, 'Pagado'),
(11, 'Yhennifer Abreu', '2022-06-18 17:00:00', 3, 2100, 'Pagado'),
(12, 'Esloan Jimenez', '2022-07-03 16:00:00', 4, 1300, 'Pagado'),
(13, 'Tomas Encarnacion', '2022-07-03 16:00:00', 4, 1300, 'Pagado'),
(14, 'Esloan Jimenez', '2022-08-24 10:00:00', 5, 3000, 'Pagado'),
(15, 'Tomas Encarnacion', '2022-08-24 10:00:00', 5, 3000, 'Pagado'),
(16, 'Tomas Encarnacion', '2022-10-01 17:00:00', 6, 3500, 'Pagado'),
(17, 'Esloan Jimenez', '2022-07-07 07:00:00', 7, 1800, 'Pagado'),
(18, 'Tomas Encarnacion', '2022-07-07 07:00:00', 7, 1800, 'Pagado'),
(19, 'Esloan Jimenez', '2022-08-05 17:32:00', 8, 2500, 'Pagado'),
(20, 'Tomas Encarnacion', '2022-08-05 17:00:00', 8, 2500, 'Pagado'),
(21, 'Antony Ramires', '2022-08-05 17:00:00', 8, 2500, 'Pagado'),
(22, 'Argenis Lebrom', '2022-08-05 17:00:00', 8, 2500, 'Pagado'),
(23, 'Kennedi Rivera', '2022-08-05 17:00:00', 8, 2500, 'Pagado'),
(24, 'Gabriel Jimenez', '2022-08-05 17:00:00', 8, 2500, 'Pagado'),
(25, 'Onil Cuevas', '2022-08-05 17:00:00', 8, 2500, 'Pagado'),
(26, 'Alejandro Olivare', '2022-08-05 17:00:00', 8, 2500, 'Pagado'),
(27, 'Juan Aristides', '2022-08-05 17:00:00', 8, 2500, 'Pagado'),
(28, 'Wister Alexander', '2022-08-05 17:00:00', 8, 2500, 'Pagado'),
(29, 'Argenis Lebrom', '2022-08-06 17:00:00', 9, 2500, 'Pagado'),
(30, 'Kennedi Rivera', '2022-08-06 17:00:00', 9, 2500, 'Pagado'),
(31, 'Gabriel Jimenez', '2022-08-06 17:00:00', 9, 2500, 'Pagado'),
(32, 'Onil Cuevas', '2022-08-06 17:00:00', 9, 2500, 'Pagado'),
(33, 'Alejandro Olivare', '2022-08-06 17:00:00', 9, 2500, 'Pagado'),
(34, 'Juan Aristides', '2022-08-06 17:00:00', 9, 2500, 'Pagado'),
(35, 'Wister Alexander', '2022-08-06 17:00:00', 9, 2500, 'Pagado'),
(36, 'Antony Ramires', '2022-08-06 17:00:00', 9, 2500, 'Pagado'),
(37, 'Esloan Jimenez', '2022-08-06 17:00:00', 9, 2500, 'Pagado'),
(38, 'Tomas Encarnacion', '2022-08-06 17:00:00', 9, 2500, 'Pagado'),
(39, 'Argenis Lebrom', '2022-08-07 17:00:00', 10, 2500, 'Pagado'),
(40, 'Kennedi Rivera', '2022-08-07 17:00:00', 10, 2500, 'Pagado'),
(41, 'Gabriel Jimenez', '2022-08-07 17:00:00', 10, 2500, 'Pagado'),
(42, 'Onil Cuevas', '2022-08-07 17:00:00', 10, 2500, 'Pagado'),
(43, 'Alejandro Olivare', '2022-08-07 17:00:00', 10, 2500, 'Pagado'),
(44, 'Juan Aristides', '2022-08-07 17:00:00', 10, 2500, 'Pagado'),
(45, 'Wister Alexander', '2022-08-07 17:00:00', 10, 2500, 'Pagado'),
(46, 'Antony Ramires', '2022-08-07 17:00:00', 10, 2500, 'Pagado'),
(47, 'Esloan Jimenez', '2022-08-07 17:00:00', 10, 2500, 'Pagado'),
(48, 'Tomas Encarnacion', '2022-08-07 17:00:00', 10, 2500, 'Pagado'),
(49, 'Esloan Jimenez', '2022-08-22 17:00:00', 11, 4300, 'Pagado'),
(50, 'Juan Aristides', '2022-08-22 17:00:00', 11, 4300, 'Pagado'),
(51, 'Wister Alexander', '2022-08-22 17:00:00', 11, 4300, 'Pagado'),
(52, 'Esloan Jimenez', '2022-10-22 15:00:00', 12, 3500, 'Pagado'),
(53, 'Tomas Encarnacion', '2022-10-22 15:00:00', 12, 3500, 'Pagado'),
(54, 'Esloan Jimenez', '2022-10-20 06:00:00', 13, 1500, 'Pagado'),
(55, 'Juan Aristides', '2022-10-20 06:00:00', 13, 1500, 'Pagado'),
(56, 'Esloan Jimenez', '2022-07-22 06:00:00', 14, 1400, 'Pagado'),
(57, 'Yhennifer Abreu', '2022-07-22 06:00:00', 14, 1400, 'Pagado'),
(58, 'Esloan Jimenez', '2022-06-06 06:00:00', 15, 1400, 'Pagado'),
(59, 'Tomas Encarnacion', '2022-06-06 06:00:00', 15, 1400, 'Pagado'),
(60, 'Yhennifer Abreu', '2022-06-06 06:00:00', 15, 1400, 'Pagado'),
(61, 'Enmanuel Alcántara', '2022-10-01 16:00:00', 6, 2000, 'Pagado'),
(62, 'Henlly Tejeda', '2022-10-01 05:43:00', 6, 2000, 'Pagado'),
(63, 'Esloan Jimenez', '2022-11-06 09:00:00', 16, 3000, 'Pagado'),
(64, 'Jose Miguel', '2022-11-06 09:00:00', 16, 3000, 'Pagado'),
(65, 'Esloan Jimenez', '2022-11-06 16:00:00', 17, 2500, 'Pagado'),
(66, 'Jose Miguel', '2022-11-06 16:00:00', 17, 2500, 'Pagado'),
(67, 'Marian Echavarria', '2022-11-11 11:00:00', 18, 1200, 'Pagado'),
(68, 'Ambar Rivas', '2022-11-14 06:00:00', 19, 1000, 'Pagado'),
(69, 'Cristina Rivas', '2022-11-14 06:00:00', 19, 1000, 'Pagado'),
(71, 'Gabriel Jimenez', '2022-11-14 11:00:00', 20, 1000, 'Pagado'),
(73, 'Sarha Santana', '2022-11-15 12:00:00', 22, 1000, 'Pagado'),
(74, 'Nathaly Mota', '2022-11-15 06:00:00', 21, 1000, 'Pagado'),
(75, 'Nathaly Mota', '2022-11-16 06:00:00', 23, 1000, 'Pagado'),
(76, 'Luisa Mateo', '2022-11-16 12:00:00', 24, 1000, 'Pagado'),
(77, 'Tomas Encarnacion', '2022-11-19 17:00:00', 25, 3500, 'Pagado'),
(78, 'Yhennifer Abreu', '2022-11-19 17:00:00', 25, 2000, 'Pagado'),
(79, 'Leiky Piña', '2022-11-19 17:00:00', 25, 2000, 'Pagado'),
(80, 'Esloan Jimenez', '2022-11-19 16:00:00', 26, 3000, 'Pagado'),
(81, 'Keifry Sanchez', '2022-11-19 17:00:00', 25, 2000, 'Pagado'),
(82, 'Nathaly Mota', '2022-11-17 06:00:00', 27, 1000, 'Pagado'),
(83, 'Luisa Mateo', '2022-11-17 12:00:00', 28, 1000, 'Pagado'),
(84, 'Luisa Mateo', '2022-11-18 12:00:00', 29, 1000, 'Pagado'),
(85, 'Luisa Mateo', '2022-11-21 12:00:00', 30, 1000, 'Pagado'),
(86, 'Luisa Mateo', '2022-11-22 12:00:00', 31, 1000, 'Pagado'),
(87, 'Luisa Mateo', '2022-11-23 12:00:00', 32, 1000, 'Pagado'),
(88, 'Luisa Mateo', '2022-11-23 12:00:00', 33, 1000, 'Pagado'),
(90, 'Esloan Jimenez', '2022-12-10 09:00:00', 35, 2800, 'Por Pagar'),
(91, 'Tomas Encarnacion', '2022-12-10 09:00:00', 35, 2800, 'Por Pagar'),
(92, 'Yhennifer Abreu', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(93, 'Leiky Piña', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(94, 'Clariza Gonzalez', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(95, 'Lizbeth Gonzales', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(96, 'Yosmeiry Guerrero', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(97, 'Antony Ramires', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(98, 'Kennedi Rivera', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(99, 'Gabriel Jimenez', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(100, 'Juan Aristides', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(101, 'LeonardoGusman', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(102, 'Keifry Sanchez', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(103, 'Elizabeth Reyes', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(104, 'Genesis Chakira', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(105, 'Esther Perez', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(106, 'Nelson Beato', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(107, 'Roder Ortega', '2022-12-10 10:30:00', 35, 1800, 'Por Pagar'),
(108, 'Luisa Mateo', '2022-11-28 12:00:00', 37, 1000, 'Por Pagar'),
(109, 'Luisa Mateo', '2022-11-29 12:00:00', 38, 1000, 'Por Pagar'),
(110, 'Luisa Mateo', '2022-11-30 12:00:00', 39, 1000, 'Por Pagar'),
(111, 'Luisa Mateo', '2022-12-01 12:00:00', 40, 1000, 'Por Pagar'),
(112, 'Esloan Jimenez', '2022-12-09 09:00:00', 41, 5000, 'Por Pagar'),
(113, 'Tomas Encarnacion', '2022-12-09 09:00:00', 41, 4000, 'Por Pagar'),
(114, 'Transporte', '2022-12-09 09:00:00', 41, 3000, 'Por Pagar'),
(115, 'Marcos Nuñez', '2022-12-09 09:00:00', 41, 3000, 'Por Pagar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchased_events`
--

CREATE TABLE `purchased_events` (
  `id_purchased_events` int NOT NULL,
  `team_member` int NOT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL,
  `hotel` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `hotel_charge` int NOT NULL,
  `waiter_payment` int NOT NULL,
  `status` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `purchased_events`
--

INSERT INTO `purchased_events` (`id_purchased_events`, `team_member`, `date`, `time`, `hotel`, `hotel_charge`, `waiter_payment`, `status`) VALUES
(1, 6, '2022-10-26', '15:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(2, 7, '2022-10-26', '15:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(3, 8, '2022-10-26', '15:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(4, 9, '2022-10-26', '07:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(5, 6, '2022-10-27', '15:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(6, 10, '2022-10-26', '15:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(7, 9, '2022-10-27', '15:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(8, 12, '2022-10-27', '15:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(9, 7, '2022-10-27', '15:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(10, 11, '2022-10-27', '15:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(12, 7, '2022-10-20', '13:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(14, 7, '2022-11-11', '08:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(15, 12, '2022-11-08', '18:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(17, 23, '2022-11-13', '08:00:00', 'Embassy Suite', 1350, 1200, 'Pagado'),
(18, 6, '2022-11-16', '10:00:00', 'Embassy Suite', 1350, 1200, 'Por Pagar'),
(19, 6, '2022-11-22', '07:00:00', 'Embassy Suite', 1350, 1200, 'Por Pagar'),
(20, 7, '2022-11-22', '12:00:00', 'Embassy Suite', 1350, 1200, 'Por Pagar'),
(21, 6, '2022-11-30', '15:00:00', 'Embassy Suite', 1350, 1200, 'Por Pagar'),
(22, 6, '2022-12-02', '17:30:00', 'Embassy Suite', 1350, 1200, 'Por Pagar'),
(23, 9, '2022-11-30', '15:00:00', 'Embassy Suite', 1350, 1200, 'Por Pagar'),
(24, 12, '2022-11-30', '15:00:00', 'Embassy Suite', 1350, 1200, 'Por Pagar'),
(25, 12, '2022-12-02', '17:00:00', 'Embassy Suite', 1350, 1200, 'Por Pagar'),
(26, 38, '2022-11-30', '15:00:00', 'Embassy Suite', 1350, 1200, 'Por Pagar'),
(27, 30, '2022-11-30', '15:00:00', 'Embassy Suite', 1350, 1200, 'Por Pagar'),
(28, 87, '2022-11-30', '15:00:00', 'Embassy Suite', 1350, 1200, 'Por Pagar'),
(30, 6, '2022-11-29', '17:00:00', 'Embassy Suite', 1350, 1200, 'Por Pagar'),
(31, 12, '2022-11-29', '17:00:00', 'Embassy Suite', 1350, 1200, 'Por Pagar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id_sales` int NOT NULL,
  `description` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `customer` int NOT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL,
  `amount` int NOT NULL,
  `price` int NOT NULL,
  `comment` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id_sales`, `description`, `customer`, `date`, `time`, `amount`, `price`, `comment`) VALUES
(1, 'Boda Cristiana', 1, '2022-10-15', '16:00:00', 5, 2200, ''),
(2, '15 años salon sin fonia', 1, '2022-07-23', '17:00:00', 3, 2100, ''),
(3, 'boda salon sinfonia', 1, '2022-06-18', '19:47:00', 3, 2100, ''),
(4, 'Cumple año infantil', 3, '2022-07-03', '16:00:00', 2, 2300, ''),
(5, 'Boda Villa Mella', 3, '2022-08-24', '10:00:00', 2, 3500, ''),
(6, 'Graduacion Irene', 1, '2022-10-01', '17:00:00', 3, 3200, ''),
(7, 'Coffe Breack y Almuerzo', 4, '2022-07-07', '07:00:00', 2, 1800, ''),
(8, 'Punta Cana Viernes', 6, '2022-08-05', '17:00:00', 10, 2500, ''),
(9, 'Punta Cana Sabado', 6, '2022-08-06', '17:00:00', 10, 2500, ''),
(10, 'Punta Cana Domingo', 6, '2022-08-07', '17:00:00', 10, 2500, ''),
(11, 'Punta Cana Lunes', 6, '2022-08-22', '17:00:00', 3, 4300, ''),
(12, 'Boda Boca Chica', 5, '2022-10-22', '15:00:00', 2, 3500, ''),
(13, 'Evento Profesores', 2, '2022-10-20', '06:00:00', 2, 1500, ''),
(14, 'Cafeteria', 2, '2022-07-22', '06:00:00', 2, 1400, ''),
(15, 'Cafeteria', 2, '2022-06-06', '06:00:00', 3, 1400, ''),
(16, 'Innauguracion de colegio en San Cristobal', 7, '2022-11-06', '09:00:00', 2, 3000, ''),
(17, 'Innauguracion de colegio en San Cristobal', 7, '2022-11-06', '16:00:00', 2, 2500, ''),
(18, 'Cafeteria', 2, '2022-11-11', '11:00:00', 1, 1200, ''),
(19, 'Cafeteria Lunes 6Am', 2, '2022-11-14', '06:00:00', 2, 1200, ''),
(20, 'Cafeteria Lunes 11AM', 2, '2022-11-14', '11:00:00', 1, 1200, ''),
(21, 'Cafeteria Martes 6AM', 2, '2022-11-15', '06:00:00', 1, 1200, ''),
(22, 'Cafeteria Martes 12PM ', 2, '2022-11-15', '12:00:00', 1, 1200, ''),
(23, 'Cafeteria Miercoles 6AM', 2, '2022-11-16', '06:00:00', 1, 1200, ''),
(24, 'Cafeteria Miercoles 12PM', 2, '2022-11-16', '12:00:00', 1, 1200, ''),
(25, 'Josep casa club  unos 15 años', 3, '2022-11-19', '17:00:00', 4, 3500, ''),
(26, 'Guachi Bebida   ', 5, '2022-11-19', '15:00:00', 1, 3000, ''),
(27, 'Cafeteria Jueves 6AM', 2, '2022-11-17', '06:00:00', 1, 1200, ''),
(28, 'Cafeteria Jueves 12PM', 2, '2022-11-17', '12:00:00', 1, 1200, ''),
(29, 'Cafeteria Viernes 12PM', 2, '2022-11-18', '12:00:00', 1, 1200, ''),
(30, 'Cafeteria Lunes 12PM ', 2, '2022-11-21', '12:00:00', 1, 1200, ''),
(31, 'Cafeteria Martes 12PM ', 2, '2022-11-22', '12:00:00', 1, 1200, ''),
(32, 'Cafeteria Miercoles 12PM', 2, '2022-11-23', '12:00:00', 1, 1200, ''),
(33, 'Cafeteria Jueves 12PM', 2, '2022-11-24', '12:00:00', 1, 1200, ''),
(35, 'Fiesta Navideña', 3, '2022-12-10', '10:00:00', 18, 2800, 'Falta aclarar lo de los bares y nos falta personal'),
(37, 'Cafeteria Lunes 12PM', 2, '2022-11-28', '12:00:00', 1, 1200, 'Trabajar en la cafeteria'),
(38, 'Cafeteria Martes 12PM', 2, '2022-11-29', '12:00:00', 1, 1200, ''),
(39, 'Cafeteria Miercoles 12PM', 2, '2022-11-30', '12:00:00', 1, 1200, ''),
(40, 'Cafeteria Jueves 12PM', 2, '2022-12-01', '12:00:00', 1, 1200, ''),
(41, 'Bartender Fiesta Navideña', 5, '2022-12-09', '09:00:00', 4, 4000, '1 Capitan de Bares y 2 Bartender para Santiago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_member`
--

CREATE TABLE `team_member` (
  `id_team_member` int NOT NULL,
  `photo` longblob,
  `name` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `identification_card` varchar(13) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `sex` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cell_phone` varchar(11) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cluster` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `bank_name` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `bank_account_type` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `account_number` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `team_member`
--

INSERT INTO `team_member` (`id_team_member`, `photo`, `name`, `identification_card`, `sex`, `cell_phone`, `cluster`, `bank_name`, `bank_account_type`, `account_number`) VALUES
(1, 0x45736c6f616e4a696d656e657a2e6a7067, 'Esloan Jimenez     ', '225-0083745-9', 'Masculino', '8494516666 ', 'Grupo A', 'Popular', 'Ahorro', '797346079'),
(2, 0x546f6d6173456e6361726e6163696f6e2e6a7067, 'Tomas Encarnacion  ', '402-2583786-9', 'Masculino', '8095130627 ', 'Grupo A', 'No Tiene', 'No Tiene', ''),
(3, 0x5968656e6e6966657241627265752e6a7067, 'Yhennifer Abreu', '225-0082308-7', 'Femenina', '8492290108', 'Grupo A', 'BHD Leon', 'Ahorro', '31875650013'),
(4, 0x4c65696b795069c3b1612e6a706567, 'Leiky Piña', '402-0062226-0', 'Femenina', '8492739109', 'Grupo A', 'Banreservas', 'Ahorro', '961103997'),
(5, 0x457261736d6f204f6e6e69656c2e6a706567, 'Erasmo Onniel', '402-4386604-9', 'Masculino', '8298899380', 'Grupo A', 'BHD Leon', 'Ahorro', '31423980016'),
(6, 0x417269736c656964794d6f7264616e2e6a706567, 'Arisleidy Mordan', '013-0053738-6', 'Femenina', '8293613198', 'Grupo B', 'Banreservas', 'Ahorro', '3470013152'),
(7, 0x436c6172697a6120476f6e7a616c657a2e6a706567, 'Clariza Gonzalez ', '001-1945166-4', 'Femenina', '8093184592 ', 'Grupo B', 'Banreservas', 'Ahorro', '9605254895'),
(8, 0x46696f7244616c697a612e6a706567, 'Fior Daliza', '402-2789327-4', 'Femenina', '8292086411', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(9, 0x4c697a62657468476f6e7a616c65732e706e67, 'Lizbeth Gonzales', '402-1359052-0', 'Femenina', '8297990066', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(10, 0x4a65686f76616e6e69614d656a69612e706e67, 'Jehovannia Mejia', '225-0084396-0', 'Masculino', '8496530633', 'Grupo B', 'Banreservas', 'Ahorro', '9605031884'),
(11, 0x416d62617252697661732e6a706567, 'Ambar Rivas', '402-1428966-9', 'Femenina', '8292040233', 'Grupo D', 'No Tiene', 'No Tiene', ''),
(12, 0x596f736d6569727920477565727265726f2e6a706567, 'Yosmeiry Guerrero', '402-3351638-0', 'Femenina', '8298700320', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(13, 0x48656e6c6c7954656a6564612e6a706567, 'Henlly Tejeda', '000-0000000-0', 'Masculino', '8493142453', 'Arroye', 'No Tiene', 'No Tiene', ''),
(14, 0x456d6d616e75656c416c63616e746172612e6a706567, 'Enmanuel Alcántara', '225-0048873-3', 'Masculino', '8298477468', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(15, 0x416e746f6e7952616d697265732e6a7067, 'Antony Ramires', '402-3580863-7', 'Masculino', '8298615757', 'Grupo A', 'No Tiene', 'No Tiene', ''),
(16, 0x417267656e69734c6562726f6d2e6a706567, 'Argenis Lebrom', '402-2666263-9', 'Masculino', '8299644352', 'Grupo B', 'BHD Leon', 'Ahorro', '27825460017'),
(17, 0x4b656e6e6564795269766572612e6a706567, 'Kennedi Rivera', '402-2611475-5', 'Masculino', '8297862787', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(18, 0x6761627269656c206465206c6f732073616e746f2e6a7067, 'Gabriel Jimenez ', '402-1567254-0', 'Masculino', '8493513629 ', 'Grupo C', 'Banreservas', 'Ahorro', '9605273777'),
(19, 0x6f6e696c2e6a7067, 'Onil Cuevas', '402-3429260-1', 'Masculino', '8299188395', 'Grupo D', 'No Tiene', 'No Tiene', ''),
(20, 0x6f6c69766172652e6a7067, 'Alejandro Olivare', '225-0042704-6', 'Masculino', '8097685894', 'Grupo A', 'No Tiene', 'No Tiene', ''),
(21, 0x4a75616e4172697374696465732e6a7067, 'Juan Aristides', '059-0020553-4', 'Masculino', '8297630888', 'Grupo A', 'No Tiene', 'No Tiene', ''),
(22, 0x576973746572416c6578616e6465722e6a7067, 'Wister Alexander', '402-2066493-8', 'Masculino', '8298013606', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(23, 0x6761627269656c20636f6e74726572612e6a706567, 'Gabriel Contrera', '225-0057539-6', 'Masculino', '8294795734', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(24, 0x4a6f73654d6967656c2e6a7067, 'Jose Miguel', '001-1660701-1', 'Masculino', '8099669805', 'Grupo A', 'No Tiene', 'No Tiene', ''),
(25, 0x4a6f7365566963746f7269616e6f2e6a706567, 'Jose Victoriano', '001-0347210-6', 'Masculino', '8098752105', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(26, 0x616e61206573746576657a2e6a706567, 'Ana Estevez', '001-1747497-3', 'Femenina', '8297141247', 'Grupo C', 'Banreservas', 'Ahorro', '9603583979'),
(27, 0x416e616e64794c6f70657a2e6a706567, 'Anandy Lopez', '225-0083039-7', 'Femenina', '8299277042', 'Grupo B', 'Banreservas', 'Ahorro', '9602040363'),
(28, 0x616e67656c6973206465206c6f732073616e746f732e6a706567, 'Angelis De Los Santos', '402-2813492-6', 'Masculino', '8297895635', 'Grupo C', 'Banreservas', 'Ahorro', '9604712421'),
(29, 0x4c656f6e6172646f4775736d616e2e6a7067, 'LeonardoGusman', '225-0020119-3', 'Masculino', '8093196008', 'Grupo A', 'Banreservas', 'Ahorro', '962153983'),
(30, 0x4b656966727953616e6368657a2e6a7067, 'Keifry Sanchez', '402-2602835-1', 'Masculino', '8099355546', 'Grupo B', 'Banreservas', 'Ahorro', '9604530261'),
(31, 0x42657473794a696d656e657a2e6a706567, 'Betsy Jimenez', '402-2808008-7', 'Femenina', '8493507438', 'Grupo A', 'BHD Leon', 'Ahorro', '26599170012'),
(32, 0x53656c76616e537565726f2e6a706567, 'Selvan Suero', '016-0018565-4', 'Masculino', '8299574325', 'Grupo A', 'No Tiene', 'No Tiene', ''),
(33, 0x456c697a616274682052657965732e6a706567, 'Elizabeth Reyes', '225-0048770-1', 'Femenina', '8095466673', 'Grupo B', 'Banreservas', 'Ahorro', '5800319678'),
(34, 0x596172697361204d6f6e7461c3b16f2e6a706567, 'Yarisa Montaño', '402-2767896-4', 'Femenina', '8294250014', 'Grupo B', 'BHD Leon', 'Ahorro', '26621360017'),
(35, 0x47656e6573697343686171756972612e6a706567, 'Genesis Chakira', '402-0985671-1', 'Femenina', '8094907418', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(36, 0x536f6d6d6572526f736172696f2e6a706567, 'Sommer Rosario', '402-4194198-4', 'Femenina', '8098041407', 'Grupo C', 'Banreservas', 'Ahorro', '9604695224'),
(37, 0x4e6174686163686120486572726572612e6a706567, 'Nathacha Herrera', '402-3441394-2', 'Femenina', '8297812236', 'Grupo B', 'Banreservas', 'Ahorro', '63800023250'),
(38, 0x457374686572506572657a2e6a706567, 'Esther Perez', '402-2871056-8', 'Femenina', '8292038124', 'Grupo C', 'Banreservas', 'Ahorro', '90604376909'),
(39, 0x48616c616e6e61466572726572612e6a706567, 'Halanna Ferrera', '402-3197584-4', 'Femenina', '8295099281', 'Grupo B', 'Banreservas', 'Ahorro', '9603270187'),
(40, 0x506564726f46656c697a2e6a706567, 'Pedro Feliz', '001-1146567-0', 'Masculino', '8299866161', 'Grupo B', 'Popular', 'Ahorro', '9603843022'),
(41, 0x59756c69616e2047757a6d616e2e706e67, 'Yulian Guzman', '225-0070222-4', 'Masculino', '8298363353', 'Grupo A', 'No Tiene', 'No Tiene', ''),
(42, 0x4d617269616e6e79204d6f6e7465726f2e6a706567, 'Marianny Montero ', '402-4337378-0', 'Femenina', '8294321059', 'Grupo B', 'Banreservas', 'Ahorro', '9604695198'),
(43, 0x4a65616e204475617274652e6a706567, 'Jean Duarte', '229-0025552-6', 'Masculino', '8094087304', 'Grupo A', 'No Tiene', 'No Tiene', ''),
(44, 0x726f626572742072657965732e6a706567, 'Robert Reyes', '402-0044334-5', 'Masculino', '8294048171', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(45, 0x4e656c736f6e20426561746f2e6a706567, 'Nelson Beato ', '001-1353019-0', 'Masculino', '8497519572', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(46, 0x596f6a616e73656c2e6a706567, 'Yojanzel Tejada', '402-2201848-9', 'Masculino', '8296773910', 'Grupo A', 'BHD Leon', 'Ahorro', '20321770037 '),
(47, 0x4469666f2e706e67, 'Difo De La Cruz', '223-0136441-4', 'Masculino', '8094178182', 'Grupo A', 'Popular', 'Ahorro', '80313697'),
(48, 0x6a75646572737920626174697374612e6a706567, 'Judersy Batista', '402-0048928-0', 'Femenina', '8297443350', 'Grupo C', 'Banreservas', 'Ahorro', '9603043039'),
(49, 0x4d617269616e20456368617661727269612e6a706567, 'Marian Echavarria', '402-3205526-5', 'Femenina', '8294607829', 'Grupo C', 'Popular', 'Ahorro', '825718968'),
(50, 0x4761627269656c2042656c7472652e706e67, 'Gabriel Beltre', '000-0000000-0', 'Masculino', '8492835853', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(51, 0x456c697a616265746820506572657a2e6a706567, 'Elizabeth Perez', '402-3001141-9', 'Masculino', '8496383221', 'Grupo A', 'Banreservas', 'Ahorro', '9604211616'),
(52, 0x6d696368656c6c6520726f6472696775657a2e6a706567, 'Michelle Rodriguez', '402-0063915-7', 'Femenina', '8492638531', 'Grupo C', 'BHD Leon', 'Ahorro', '32043710012'),
(54, 0x416e66656e6954656a6164612e706e67, 'Anfeni Tejada Placencio', '402-3457254-9', 'Masculino', '8292040300', 'Arroye', 'No Tiene', 'No Tiene', ''),
(55, 0x427279616e2074696d6f6e69656c2072616d697265732e6a706567, 'Brayan Ramirez', '402-1868514-3', 'Masculino', '8494721403', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(56, 0x4672616e73697320436f6e74726572612e6a706567, 'Fransis Contrera', '225-0068860-5', 'Masculino', '8293546782', 'Grupo A', 'No Tiene', 'No Tiene', ''),
(57, 0x4372697374696e612052697661732e6a706567, 'Cristina Rivas ', '001-1533805-5', 'Femenina', '8494324560 ', 'Arroye', 'Banreservas', 'Ahorro', '230440877'),
(58, 0x4c75697361204d6174656f2e6a706567, 'Luisa Mateo', '107-0001424-3', 'Femenina', '8097060404', 'Arroye', 'Popular', 'Corriente', '820212025'),
(59, 0x4e69636f6c204375657661732e6a706567, 'Nicol Cuevas', '402-0979408-6', 'Femenina', '8298652087', 'Arroye', 'Banreservas', 'Ahorro', '9603389217'),
(60, 0x53637265656e73686f7420323032322d31312d3131203132303132382e706e67, 'Onel Santana', '027-0043965-2', 'Masculino', '8298152347', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(61, 0x6361726f6c696e654f7a756e612e706e67, 'Caroline Ozuna', '402-1275515-7', 'Femenina', '8293038212', 'Grupo D', 'Popular', 'Ahorro', '830559589'),
(62, 0x53637265656e73686f7420323032322d31312d3131203131353132312e706e67, 'Roder Ortega', '000-0000000-0', 'Masculino', '8296414378', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(64, 0x526f7361416e67656c69732e6a706567, 'Rosa Marte', '402-3156096-8', 'Femenina', '8495692826', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(65, 0x4c61757261427265746f6e2e706e67, 'Laura Breton', '402-3957017-5', 'Femenina', '8098429766', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(66, 0x4a61637175656c696e65426572726f612e6a706567, 'Jacqueline Berroa', '225-0043380-4', 'Femenina', '8496200197', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(67, 0x4361726c6f7354656a6564612e706e67, 'Carlos Tejeda', '224-0022925-2', 'Masculino', '8492692772', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(68, 0x47656e6573697320426572726f612e706e67, 'Genesis Berroa', '225-0084230-1', 'Femenina', '8492847915', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(69, 0x416e65756672616e6943617374726f2e6a706567, 'Aneufrani Castro', '402-1899676-3', 'Masculino', '8296896078', 'Grupo A', 'No Tiene', 'No Tiene', ''),
(70, 0x4b656e6961456e6361726e6163696f6e2e6a706567, 'Kenia Encarnacion', '001-1732772-6', 'Femenina', '8099951775', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(71, 0x4a6f7365506572657a2e706e67, 'Jose Perez', '402-1080604-4', 'Masculino', '8292842855', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(72, 0x4a6f73656c696e537565726f2e706e67, 'Joselin Suero', '016-0020622-9', 'Masculino', '8298909503', 'Grupo D', 'No Tiene', 'No Tiene', ''),
(73, 0x536172686153616e74616e612e6a706567, 'Sarha Santana', '223-0176386-2', 'Femenina', '8099492931', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(74, 0x4e617468616c79204d6f74612e6a706567, 'Nathaly Mota', '001-1843982-7', 'Femenina', '8093861091', 'Grupo C', 'Banreservas', 'Ahorro', '9603431283'),
(75, 0x4a6f636b65696469536f73612e706e67, 'Jockeidi Sosa', '073-0018152-1', 'Masculino', '0000000000', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(76, 0x456c736120526f736172696f2e6a706567, 'Elsa Rosario', '224-0053977-5', 'Femenina', '8094027708', 'Grupo B', 'No Tiene', 'No Tiene', ''),
(77, 0x416e6162656c204465204c6120526f73612e6a706567, 'Anabel De La Rosa', '001-158484-1', 'Femenina', '8096689755', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(78, 0x526f73696f204465204c6120526f73612e6a706567, 'Rosio De La Rosa', '402-3371144-5', 'Femenina', '8092604730', 'Grupo C', 'Banreservas', 'Ahorro', '9602601901'),
(79, 0x6d6972696120636162612e6a706567, 'Miria Caba', '402-2801826-9', 'Femenina', '8293811976', 'Grupo C', 'Banreservas', 'Ahorro', '9604218502'),
(80, 0x437269737469616e20526f6e646f6d2e6a706567, 'Cristian Rondom', '001-1150223-3', 'Masculino', '8097136596', 'Grupo A', 'No Tiene', 'No Tiene', ''),
(81, 0x4d6f72656c69732054656a6564612e6a706567, 'Morelis Tejeda', '402-0075574-8', 'Femenina', '8297548790', 'Grupo A', 'Promerica', 'Ahorro', '11010500020718'),
(82, 0x4a6f726765204d61727465732e6a706567, 'Jorge Martes', '047-0161858-1', 'Masculino', '8492576385', 'Grupo A', 'Popular', 'Ahorro', '816217863'),
(83, 0x4d6172636f732046726961732e6a706567, 'Marcos Frias ', '402-2214240-4', 'Masculino', '8295135215', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(84, 0x59617269747a6120526f736172696f2e6a706567, 'Yaritza Rosario', '402-4061682-7', 'Femenina', '8298189599', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(85, 0x4761627269656c6120526f6d616e2e6a706567, 'Gabriela Roman', '402-4807282-5', 'Femenina', '8296967898', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(86, 0x456c656e612050696e6564612e6a706567, 'Elena Pineda', '402-2029927-1', 'Femenina', '8293797407', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(87, 0x4461797361204d61737369656c20437565746f2e6a706567, 'Daysa Massiel Cueto', '22500641067', 'Femenina', '8092304803', 'Grupo C', 'No Tiene', 'No Tiene', ''),
(88, 0x7472616e73706f7274652e706e67, 'Transporte', '', 'Masculino', '', 'Grupo A', 'No Tiene', 'No Tiene', ''),
(89, 0x4d6172636f73204e75c3b1657a2e6a706567, 'Marcos Nuñez', '001-1792483-7', 'Masculino', '8094018595', 'Grupo A', 'No Tiene', 'No Tiene', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `user_admin` (`user_admin`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customers`);

--
-- Indices de la tabla `payment_waiter`
--
ALTER TABLE `payment_waiter`
  ADD PRIMARY KEY (`id_payment_waiter`),
  ADD KEY `event` (`event`);

--
-- Indices de la tabla `purchased_events`
--
ALTER TABLE `purchased_events`
  ADD PRIMARY KEY (`id_purchased_events`),
  ADD KEY `team_member` (`team_member`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`),
  ADD KEY `customer` (`customer`);

--
-- Indices de la tabla `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`id_team_member`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customers` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `payment_waiter`
--
ALTER TABLE `payment_waiter`
  MODIFY `id_payment_waiter` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `purchased_events`
--
ALTER TABLE `purchased_events`
  MODIFY `id_purchased_events` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `team_member`
--
ALTER TABLE `team_member`
  MODIFY `id_team_member` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`user_admin`) REFERENCES `admin` (`id_admin`);

--
-- Filtros para la tabla `payment_waiter`
--
ALTER TABLE `payment_waiter`
  ADD CONSTRAINT `payment_waiter_ibfk_1` FOREIGN KEY (`event`) REFERENCES `sales` (`id_sales`);

--
-- Filtros para la tabla `purchased_events`
--
ALTER TABLE `purchased_events`
  ADD CONSTRAINT `purchased_events_ibfk_1` FOREIGN KEY (`team_member`) REFERENCES `team_member` (`id_team_member`);

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customers` (`id_customers`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
