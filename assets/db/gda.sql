-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 10:52 PM
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
-- Database: `gda`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `idAlumno` int(11) NOT NULL,
  `apellidos` varchar(24) NOT NULL,
  `nombres` varchar(24) NOT NULL,
  `fechaDeNacimiento` date NOT NULL,
  `DNI` int(10) NOT NULL,
  `CUIL` int(12) NOT NULL,
  `CPI` enum('si','no','Si','No') DEFAULT NULL,
  `documentoExtranjero` enum('si','no','Si','No') DEFAULT NULL,
  `tipoDoc` varchar(32) DEFAULT NULL,
  `DNIe` int(24) DEFAULT NULL,
  `idenGenero` enum('Masculino','Femenino','Trans masculino','Trans femenino','No binario','Otra','No desea responder') NOT NULL,
  `nacionalidad` varchar(32) NOT NULL,
  `provincia` varchar(32) DEFAULT NULL,
  `direccion` varchar(32) DEFAULT NULL,
  `distrito` varchar(32) DEFAULT NULL,
  `localidad` varchar(32) DEFAULT NULL,
  `otra` varchar(32) DEFAULT NULL,
  `piso` int(12) DEFAULT NULL,
  `torre` int(32) DEFAULT NULL,
  `depto` int(32) DEFAULT NULL,
  `entre` varchar(32) DEFAULT NULL,
  `yEntre` varchar(32) DEFAULT NULL,
  `otroDato` varchar(32) DEFAULT NULL,
  `provDomicilio` varchar(32) DEFAULT NULL,
  `distriDomicilio` varchar(32) DEFAULT NULL,
  `localiDomicilio` varchar(32) DEFAULT NULL,
  `telefonoFijo` varchar(32) DEFAULT NULL,
  `telefonoCelular` varchar(32) DEFAULT NULL,
  `cantHermanos` int(20) DEFAULT NULL,
  `hermEscuela` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`idAlumno`, `apellidos`, `nombres`, `fechaDeNacimiento`, `DNI`, `CUIL`, `CPI`, `documentoExtranjero`, `tipoDoc`, `DNIe`, `idenGenero`, `nacionalidad`, `provincia`, `direccion`, `distrito`, `localidad`, `otra`, `piso`, `torre`, `depto`, `entre`, `yEntre`, `otroDato`, `provDomicilio`, `distriDomicilio`, `localiDomicilio`, `telefonoFijo`, `telefonoCelular`, `cantHermanos`, `hermEscuela`) VALUES
(1, 'Joaquin', 'Ramirez', '2023-08-15', 89238923, 2147483647, '', '', '', 0, 'Masculino', 'USA', NULL, 'skllls', '', '', '', 0, 0, 0, 'klskdl', 'kdlskdls', 'dslk', 'ksl', 'ksldksl', 'kdsldks', '1121', '121212', 1, 0),
(3, 'Romani', 'Rodriguez', '0000-00-00', 232332323, 32323232, '', '', '', 0, '', '', NULL, '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0),
(4, 'Ramelli', 'Joaquin', '0023-08-15', 2147483647, 2147483647, '', '', '', 0, '', '', NULL, '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0),
(6, 'Pufahl', 'Rodriguez', '0000-00-00', 45678, 12389, '', '', '', 0, '', '', NULL, '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0),
(7, 'Joaco', 'Rodriguez', '0000-00-00', 46098442, 123545, '', '', '', 0, '', '', NULL, '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0),
(8, 'Zanardi', 'Rodriguez', '0000-00-00', 0, 0, '', '', '', 0, '', '', NULL, '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0),
(9, 'Deter', 'Rodriguez', '0000-00-00', 0, 0, '', '', '', 0, '', '', NULL, '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0),
(11, 'Fink', 'Rodriguez', '0000-00-00', 0, 0, '', '', '', 0, '', '', NULL, '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0),
(12, 'Mendez', 'Rodriguez', '2005-12-05', 0, 0, '', '', '', 0, '', '', NULL, '', '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0),
(13, 'Tomaxd', 'Rodriguez', '0000-00-00', 0, 0, '', '', '', 0, '', '', 'Buenos aires', '', 'kajksd', 'jdksjakda', '', 0, 0, 0, '', '', '', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `ID_curso` int(11) NOT NULL,
  `Nombre_Curso` varchar(255) NOT NULL,
  `Anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`ID_curso`, `Nombre_Curso`, `Anio`) VALUES
(1, '3°1°', 2023),
(2, '1°3°', 2017),
(3, '7°1°', 2021),
(4, '2°4', 2014),
(5, '7°2°', 2023),
(6, '1°2°', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `curso_alumnos`
--

CREATE TABLE `curso_alumnos` (
  `id_curso_alumnos` int(11) NOT NULL,
  `Curso_CA` int(11) DEFAULT NULL,
  `Alumnos_CA` int(11) DEFAULT NULL,
  `Grupo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `curso_alumnos`
--

INSERT INTO `curso_alumnos` (`id_curso_alumnos`, `Curso_CA`, `Alumnos_CA`, `Grupo`) VALUES
(4, 5, 1, 'A'),
(5, 4, 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `indicadores`
--

CREATE TABLE `indicadores` (
  `id_indicador` int(11) NOT NULL,
  `materia` int(11) NOT NULL,
  `instancia` varchar(255) NOT NULL,
  `ind1` varchar(255) DEFAULT NULL,
  `ind2` varchar(255) DEFAULT NULL,
  `ind3` varchar(255) DEFAULT NULL,
  `ind4` varchar(255) DEFAULT NULL,
  `ind5` varchar(255) DEFAULT NULL,
  `ind6` varchar(255) DEFAULT NULL,
  `ind7` varchar(255) DEFAULT NULL,
  `ind8` varchar(255) DEFAULT NULL,
  `ind9` varchar(255) DEFAULT NULL,
  `ind10` varchar(255) DEFAULT NULL,
  `ind11` varchar(255) DEFAULT NULL,
  `ind12` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Horario` varchar(255) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`Id`, `Nombre`, `Horario`, `curso`) VALUES
(21, 'Biologia', '12:55-14:55', 1),
(22, 'Practicas del Lenguaje', '8hs-18hs', 2),
(23, 'Biologia', '8hs-18hs', 1),
(24, 'Biologia', '8hs-18hs', 1),
(25, 'Biologia', '8hs-18hs', 1),
(26, 'Biologia', '8hs-18hs', 2),
(28, 'Practicas del Lenguaje', '12:55-14:55', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `id_nota` int(11) NOT NULL,
  `Materia` int(11) DEFAULT NULL,
  `Profesor` int(11) DEFAULT NULL,
  `Alumno` int(11) DEFAULT NULL,
  `Instancia` varchar(255) DEFAULT NULL,
  `Fecha_nota` date NOT NULL,
  `nota_ind1` int(11) DEFAULT NULL,
  `nota_trayect_1` int(11) DEFAULT NULL,
  `nota_ind2` int(11) DEFAULT NULL,
  `nota_trayect_2` int(11) DEFAULT NULL,
  `nota_ind3` int(11) DEFAULT NULL,
  `nota_trayect_3` int(11) DEFAULT NULL,
  `nota_ind4` int(11) DEFAULT NULL,
  `nota_trayect_4` int(11) DEFAULT NULL,
  `nota_ind5` int(11) DEFAULT NULL,
  `nota_trayect_5` int(11) DEFAULT NULL,
  `nota_ind6` int(11) DEFAULT NULL,
  `nota_trayect_6` int(11) DEFAULT NULL,
  `nota_ind7` int(11) DEFAULT NULL,
  `nota_trayect_7` int(11) DEFAULT NULL,
  `nota_ind8` int(11) DEFAULT NULL,
  `nota_trayect_8` int(11) DEFAULT NULL,
  `nota_ind9` int(11) DEFAULT NULL,
  `nota_trayect_9` int(11) DEFAULT NULL,
  `nota_ind10` int(11) DEFAULT NULL,
  `nota_trayect_10` int(11) DEFAULT NULL,
  `nota_ind11` int(11) DEFAULT NULL,
  `nota_trayect_11` int(11) DEFAULT NULL,
  `nota_ind12` int(11) DEFAULT NULL,
  `nota_trayect_12` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`id_nota`, `Materia`, `Profesor`, `Alumno`, `Instancia`, `Fecha_nota`, `nota_ind1`, `nota_trayect_1`, `nota_ind2`, `nota_trayect_2`, `nota_ind3`, `nota_trayect_3`, `nota_ind4`, `nota_trayect_4`, `nota_ind5`, `nota_trayect_5`, `nota_ind6`, `nota_trayect_6`, `nota_ind7`, `nota_trayect_7`, `nota_ind8`, `nota_trayect_8`, `nota_ind9`, `nota_trayect_9`, `nota_ind10`, `nota_trayect_10`, `nota_ind11`, `nota_trayect_11`, `nota_ind12`, `nota_trayect_12`) VALUES
(17, 22, 3, 1, '1era_Instancia', '2023-08-23', 7, 3, 8, 4, 7, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 22, 3, 1, '2nda_Instancia', '2023-08-31', 6, 3, 7, 4, 5, 3, 5, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 21, 4, 1, '1era_Instancia', '2023-08-31', 9, 5, 8, 4, 10, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 21, 4, 1, '4ta_Instancia', '2023-09-04', 9, 5, 8, 4, 7, 4, 5, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  `fechaDeNacimiento` date NOT NULL,
  `numeroDeTelefono` int(11) NOT NULL,
  `numeroDeCelular` int(11) NOT NULL,
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
  `fechaDeIngreso` date NOT NULL,
  `estado` enum('Activo','No Activo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`idDocente`, `Nombre`, `Apellido`, `nacionalidad`, `DNI`, `cuil`, `Edad`, `fechaDeNacimiento`, `numeroDeTelefono`, `numeroDeCelular`, `domicilio`, `domicilio_piso`, `domicilio_depto`, `localidad`, `partido`, `Mail`, `mailAbc`, `Titulo`, `legajo`, `files`, `fechaDeIngreso`, `estado`) VALUES
(10, 'Tomas', 'Tomas', 'Argentino', 22222, 22222, 12, '1212-12-12', 11111, 1111, 'jua 32', 22, 2, 'tomas', 'tomas', 'Tomas@tomas.com', 'tomas@tomas.com', 'qsq', 0, 0, '2321-12-21', '');

-- --------------------------------------------------------

--
-- Table structure for table `profesor_materia`
--

CREATE TABLE `profesor_materia` (
  `id_profesor_materia` int(11) NOT NULL,
  `Materia` int(11) NOT NULL,
  `Profesor` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `toma_posecion` date NOT NULL,
  `finalizacion` date NOT NULL,
  `grupo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profesor_materia`
--

INSERT INTO `profesor_materia` (`id_profesor_materia`, `Materia`, `Profesor`, `categoria`, `toma_posecion`, `finalizacion`, `grupo`) VALUES
(1, 22, 3, 'titular interino', '2023-09-08', '2023-09-29', 'ambos'),
(2, 21, 3, 'suplente', '2023-09-05', '2023-09-23', 'ambos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idAlumno`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`ID_curso`);

--
-- Indexes for table `curso_alumnos`
--
ALTER TABLE `curso_alumnos`
  ADD PRIMARY KEY (`id_curso_alumnos`),
  ADD KEY `Alumnos_CA` (`Alumnos_CA`),
  ADD KEY `Curso_CA` (`Curso_CA`) USING BTREE;

--
-- Indexes for table `indicadores`
--
ALTER TABLE `indicadores`
  ADD PRIMARY KEY (`id_indicador`),
  ADD KEY `materia` (`materia`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `curso` (`curso`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `Materia` (`Materia`,`Profesor`),
  ADD KEY `Profesor` (`Profesor`),
  ADD KEY `Alumno` (`Alumno`);

--
-- Indexes for table `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD PRIMARY KEY (`id_profesor_materia`),
  ADD KEY `Materia` (`Materia`),
  ADD KEY `Profesor` (`Profesor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idAlumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `ID_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `curso_alumnos`
--
ALTER TABLE `curso_alumnos`
  MODIFY `id_curso_alumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `indicadores`
--
ALTER TABLE `indicadores`
  MODIFY `id_indicador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `materia`
--
ALTER TABLE `materia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `profesor_materia`
--
ALTER TABLE `profesor_materia`
  MODIFY `id_profesor_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `indicadores`
--
ALTER TABLE `indicadores`
  ADD CONSTRAINT `indicadores_ibfk_1` FOREIGN KEY (`materia`) REFERENCES `materia` (`Id`);

--
-- Constraints for table `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_3` FOREIGN KEY (`curso`) REFERENCES `curso` (`ID_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
