-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 08:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion de alumnos`
--

-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `idDocente` int(20) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `nacionalidad` varchar(24) NOT NULL,
  `DNI` int(8) NOT NULL,
  `cuil` int(12) NOT NULL,
  `Edad` int(5) NOT NULL,
  `Fecha de nacimiento` date NOT NULL,
  `Numero de telefono` int(11) NOT NULL,
  `Numero de celular` int(11) NOT NULL,
  `domicilio` varchar(32) NOT NULL,
  `domicilio_piso` int(4) NOT NULL,
  `domicilio_depto` int(4) NOT NULL,
  `localidad` varchar(24) NOT NULL,
  `partido` varchar(24) NOT NULL,
  `Mail` text NOT NULL,
  `mailAbc` varchar(32) NOT NULL,
  `Titulo` text NOT NULL,
  `legajo` int(12) NOT NULL,
  `files` int(11) NOT NULL,
  `Fecha de ingreso` date NOT NULL,
  `estado` enum('Activo','No Activo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`idDocente`, `Nombre`, `Apellido`, `nacionalidad`, `DNI`, `cuil`, `Edad`, `Fecha de nacimiento`, `Numero de telefono`, `Numero de celular`, `domicilio`, `domicilio_piso`, `domicilio_depto`, `localidad`, `partido`, `Mail`, `mailAbc`, `Titulo`, `legajo`, `files`, `Fecha de ingreso`, `estado`) VALUES
(1, 'Santiago Leonel', 'Suanez', '', 46352793, 0, 18, '0000-00-00', 2147483647, 1126536019, '', 0, 0, '', '', 'suanezsanty@gmail.com', '0', 'no', 0, 0, '2023-03-28', ''),
(2, 'a', 'a', 'a', 2322, 897897, 43, '2023-08-29', 1132689772, 1132689772, 'BvBallester 5359', 1, 0, 'sk', 'xmskmx', 'snkx@js.com', '0', 'zxsxsxxsx', 0, 0, '2023-08-14', ''),
(3, 'b', 'b', 'a', 2322, 897897, 43, '2023-08-29', 1132689772, 1132689772, 'BvBallester 5359', 1, 0, 'sk', 'xmskmx', 'snkx@js.com', '0', 'zxsxsxxsx', 0, 0, '2023-08-14', ''),
(4, 'asd', 'dadasasdas', 'dsadas', 323432, 343, 21, '2023-08-22', 1122332, 123123, 'hjshc', 2, 2, 'jkajkx', 'xkjas', 'kjsakx@xjskax.com', '0', 'xmjac', 0, 0, '2023-08-22', ''),
(5, '', '', '', 0, 0, 0, '0000-00-00', 0, 0, '', 0, 0, '', '', '', '0', '', 0, 0, '0000-00-00', ''),
(6, '', '', '', 0, 0, 0, '0000-00-00', 0, 0, '', 0, 0, '', '', '', '0', '', 0, 0, '0000-00-00', ''),
(7, '', '', '', 0, 0, 0, '0000-00-00', 0, 0, '', 0, 0, '', '', '', '0', '', 0, 0, '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`idDocente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profesores`
--
ALTER TABLE `profesores`
  MODIFY `idDocente` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
