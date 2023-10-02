-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-08-2023 a las 23:09:02
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion de alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `ID_curso` int(11) NOT NULL,
  `Nombre_Curso` varchar(255) NOT NULL,
  `Anio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`ID_curso`, `Nombre_Curso`, `Anio`) VALUES
(1, '3°1°', 2020),
(2, '1°3°', 2017),
(3, '7°2°', 2023);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadores`
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
-- Estructura de tabla para la tabla `legajo_alumno`
--

CREATE TABLE `legajo_alumno` (
  `Legajo` int(11) NOT NULL,
  `Nombre_alumno` varchar(255) NOT NULL,
  `Apellido_alumno` varchar(255) NOT NULL,
  `DNI` int(11) NOT NULL,
  `Sexo nacimiento` varchar(255) NOT NULL,
  `Identidad de género` varchar(255) NOT NULL,
  `Anio_entrada` int(11) NOT NULL,
  `Fichas medicas` text NOT NULL,
  `Partida de Nacimiento` text NOT NULL,
  `Certificado pase de primaria` text NOT NULL,
  `Certificado alumno regular` text NOT NULL,
  `Documento Fotocopia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `legajo_alumno`
--

INSERT INTO `legajo_alumno` (`Legajo`, `Nombre_alumno`, `Apellido_alumno`, `DNI`, `Sexo nacimiento`, `Identidad de género`, `Anio_entrada`, `Fichas medicas`, `Partida de Nacimiento`, `Certificado pase de primaria`, `Certificado alumno regular`, `Documento Fotocopia`) VALUES
(1, 'Santiago Leonel', 'Suanez', 46352793, 'Masculino', 'Masculino', 2017, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Horario` varchar(255) NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`Id`, `Nombre`, `Horario`, `curso`) VALUES
(21, 'Biologia', '12:55-14:55', 1),
(22, 'Practicas del Lenguaje', '8hs-18hs', 2),
(23, 'Biologia', '8hs-18hs', 1),
(24, 'Biologia', '8hs-18hs', 1),
(25, 'Biologia', '8hs-18hs', 1),
(26, 'Biologia', '8hs-18hs', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
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
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `Materia`, `Profesor`, `Alumno`, `Instancia`, `Fecha_nota`, `nota_ind1`, `nota_trayect_1`, `nota_ind2`, `nota_trayect_2`, `nota_ind3`, `nota_trayect_3`, `nota_ind4`, `nota_trayect_4`, `nota_ind5`, `nota_trayect_5`, `nota_ind6`, `nota_trayect_6`, `nota_ind7`, `nota_trayect_7`, `nota_ind8`, `nota_trayect_8`, `nota_ind9`, `nota_trayect_9`, `nota_ind10`, `nota_trayect_10`, `nota_ind11`, `nota_trayect_11`, `nota_ind12`, `nota_trayect_12`) VALUES
(17, 22, 3, 1, '1era_Instancia', '2023-08-23', 7, 3, 8, 4, 7, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 22, 3, 1, '2nda_Instancia', '2023-08-31', 6, 3, 7, 4, 5, 3, 5, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 21, 4, 1, '1era_Instancia', '2023-08-31', 9, 5, 8, 4, 10, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `numLegajo` int(11) NOT NULL,
  `Nombre_profesor` varchar(255) NOT NULL,
  `Apellido_profesor` varchar(255) NOT NULL,
  `nacionalidad` varchar(255) NOT NULL,
  `DNI` int(11) NOT NULL,
  `Cuil` varchar(255) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Fecha de nacimiento` date NOT NULL,
  `Numero de telefono` int(11) NOT NULL,
  `Numero de celular` int(11) NOT NULL,
  `Domicilio` varchar(255) NOT NULL,
  `Domicilio_piso` varchar(255) NOT NULL,
  `Domicilio_depto` varchar(255) NOT NULL,
  `Localidad` varchar(255) NOT NULL,
  `Partido` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Mail_abc` varchar(255) NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Legajo` varchar(255) NOT NULL,
  `Files` int(11) NOT NULL,
  `Fecha de ingreso` date NOT NULL,
  `Estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`numLegajo`, `Nombre_profesor`, `Apellido_profesor`, `nacionalidad`, `DNI`, `Cuil`, `Edad`, `Fecha de nacimiento`, `Numero de telefono`, `Numero de celular`, `Domicilio`, `Domicilio_piso`, `Domicilio_depto`, `Localidad`, `Partido`, `Mail`, `Mail_abc`, `Titulo`, `Legajo`, `Files`, `Fecha de ingreso`, `Estado`) VALUES
(3, 'Daniela', 'Pisman', 'Argentina', 23456789, '2034567899', 52, '1971-08-28', 1132456789, 1132456789, 'Ituzaingo 1237', '', '', 'Villa Ballester', 'San Martin', 'santy@mail.com', 'abc@mail.com', 'Profesora de Historia', '1345', 0, '2023-08-25', 'Si'),
(4, 'Andrea', 'Insauralde', 'Argentina', 23234556, '20232345569', 60, '2003-02-28', 1132456789, 1132456789, 'Ituzaingo 1237', '', '', 'Villa Ballester', 'San Martin', 'santy@mail.com', 'abc@mail.com', 'Profesora de Historia', '1345', 0, '2015-04-23', 'Si'),
(5, '', '', '', 0, '', 0, '0000-00-00', 0, 0, '', '', '', '', '', '', '', '', '', 0, '0000-00-00', 'Si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_materia`
--

CREATE TABLE `profesor_materia` (
  `Materia` int(11) NOT NULL,
  `Profesor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`ID_curso`);

--
-- Indices de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  ADD PRIMARY KEY (`id_indicador`),
  ADD KEY `materia` (`materia`);

--
-- Indices de la tabla `legajo_alumno`
--
ALTER TABLE `legajo_alumno`
  ADD PRIMARY KEY (`Legajo`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `curso` (`curso`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `Materia` (`Materia`,`Profesor`),
  ADD KEY `Profesor` (`Profesor`),
  ADD KEY `Alumno` (`Alumno`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`numLegajo`);

--
-- Indices de la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD KEY `Materia` (`Materia`),
  ADD KEY `Profesor` (`Profesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `ID_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  MODIFY `id_indicador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `legajo_alumno`
--
ALTER TABLE `legajo_alumno`
  MODIFY `Legajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `numLegajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `indicadores`
--
ALTER TABLE `indicadores`
  ADD CONSTRAINT `indicadores_ibfk_1` FOREIGN KEY (`materia`) REFERENCES `materia` (`Id`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_3` FOREIGN KEY (`curso`) REFERENCES `curso` (`ID_curso`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_4` FOREIGN KEY (`Materia`) REFERENCES `materia` (`Id`),
  ADD CONSTRAINT `notas_ibfk_5` FOREIGN KEY (`Profesor`) REFERENCES `profesores` (`numLegajo`),
  ADD CONSTRAINT `notas_ibfk_6` FOREIGN KEY (`Alumno`) REFERENCES `legajo_alumno` (`Legajo`);

--
-- Filtros para la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD CONSTRAINT `profesor_materia_ibfk_1` FOREIGN KEY (`Materia`) REFERENCES `materia` (`Id`),
  ADD CONSTRAINT `profesor_materia_ibfk_2` FOREIGN KEY (`Profesor`) REFERENCES `profesores` (`numLegajo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
