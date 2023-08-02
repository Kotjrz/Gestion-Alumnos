-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2023 a las 21:05:51
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
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `Legajo` int(10) NOT NULL,
  `codigo materia` int(30) NOT NULL,
  `Fecha de calificacion` date NOT NULL,
  `aprobo (si/no)` text NOT NULL,
  `nota numerica` int(30) NOT NULL,
  `idIndicador` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas profesor`
--

CREATE TABLE `horas profesor` (
  `idProfesor` int(10) NOT NULL,
  `idMateria` int(10) NOT NULL,
  `Fecha de toma` date NOT NULL,
  `Categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadores`
--

CREATE TABLE `indicadores` (
  `idAlumno` int(10) NOT NULL,
  `idDocente` int(10) NOT NULL,
  `ind1` varchar(50) NOT NULL,
  `val1` int(5) NOT NULL,
  `ind2` varchar(50) NOT NULL,
  `val2` int(5) NOT NULL,
  `ind3` varchar(50) NOT NULL,
  `val3` int(5) NOT NULL,
  `ind4` varchar(50) NOT NULL,
  `val4` int(5) NOT NULL,
  `ind5` varchar(50) NOT NULL,
  `val5` int(5) NOT NULL,
  `ind6` varchar(50) NOT NULL,
  `val6` int(5) NOT NULL,
  `ind7` varchar(50) NOT NULL,
  `val7` int(5) NOT NULL,
  `ind8` varchar(50) NOT NULL,
  `val8` int(5) NOT NULL,
  `ind9` varchar(50) NOT NULL,
  `val9` int(5) NOT NULL,
  `ind10` varchar(50) NOT NULL,
  `val10` int(5) NOT NULL,
  `ind11` varchar(50) NOT NULL,
  `val11` int(5) NOT NULL,
  `ind12` varchar(50) NOT NULL,
  `val12` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legajo alumno`
--

CREATE TABLE `legajo alumno` (
  `Legajo` int(10) NOT NULL,
  `Nombres` text NOT NULL,
  `Apellido` text NOT NULL,
  `Foto_Alumno` text NOT NULL,
  `DNI` int(10) NOT NULL,
  `Sexo nacimiento` text NOT NULL,
  `Identidad de género` text NOT NULL,
  `Año de entrada` int(10) NOT NULL,
  `Fichas medicas` text NOT NULL,
  `Partida de Nacimiento` text NOT NULL,
  `Certificado pase de primaria` text NOT NULL,
  `Certificado alumno regular` text NOT NULL,
  `Documento Fotocopia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `legajo alumno`
--

INSERT INTO `legajo alumno` (`Legajo`, `Nombres`, `Apellido`, `Foto_Alumno`, `DNI`, `Sexo nacimiento`, `Identidad de género`, `Año de entrada`, `Fichas medicas`, `Partida de Nacimiento`, `Certificado pase de primaria`, `Certificado alumno regular`, `Documento Fotocopia`) VALUES
(1345, 'Santiago Leonel', 'Suanez', '', 46352793, 'masculino', 'masculino', 2017, '', '', '', '', ''),
(4565, '', '', '', 0, '', '', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia curso`
--

CREATE TABLE `materia curso` (
  `codigo materia` int(30) NOT NULL,
  `nombre materia` text NOT NULL,
  `año` int(30) NOT NULL,
  `curso` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `numLegajo` int(20) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `DNI` int(8) NOT NULL,
  `Edad` int(5) NOT NULL,
  `Fecha de nacimiento` date NOT NULL,
  `Numero de telefono` int(11) NOT NULL,
  `Numero de celular` int(11) NOT NULL,
  `Mail` text NOT NULL,
  `Domicilio` text NOT NULL,
  `Titulo` text NOT NULL,
  `Fecha de ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`numLegajo`, `Nombre`, `Apellido`, `DNI`, `Edad`, `Fecha de nacimiento`, `Numero de telefono`, `Numero de celular`, `Mail`, `Domicilio`, `Titulo`, `Fecha de ingreso`) VALUES
(1, 'Santiago Leonel', 'Suanez', 46352793, 18, '0000-00-00', 2147483647, 1126536019, 'suanezsanty@gmail.com', 'ituzaingo 1237', 'no', '2023-03-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo indicador (materia)`
--

CREATE TABLE `tipo indicador (materia)` (
  `Tipo` varchar(50) NOT NULL,
  `Valor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD KEY `Legajo` (`Legajo`,`codigo materia`),
  ADD KEY `codigo materia` (`codigo materia`),
  ADD KEY `idIndicador` (`idIndicador`);

--
-- Indices de la tabla `horas profesor`
--
ALTER TABLE `horas profesor`
  ADD KEY `idProfesor` (`idProfesor`,`idMateria`),
  ADD KEY `idMateria` (`idMateria`);

--
-- Indices de la tabla `indicadores`
--
ALTER TABLE `indicadores`
  ADD KEY `idAlumno` (`idAlumno`,`idDocente`),
  ADD KEY `idDocente` (`idDocente`),
  ADD KEY `ind1` (`ind1`,`val1`,`ind2`,`val2`,`ind3`,`val3`,`ind4`,`val4`,`ind5`,`val5`,`ind6`,`val6`,`ind7`,`val7`,`ind8`,`val8`,`ind9`,`val9`,`ind10`,`val10`,`ind11`,`val11`,`ind12`,`val12`),
  ADD KEY `ind2` (`ind2`),
  ADD KEY `ind3` (`ind3`),
  ADD KEY `ind4` (`ind4`),
  ADD KEY `ind5` (`ind5`),
  ADD KEY `ind6` (`ind6`),
  ADD KEY `ind7` (`ind7`),
  ADD KEY `ind8` (`ind8`),
  ADD KEY `ind9` (`ind9`),
  ADD KEY `ind10` (`ind10`),
  ADD KEY `ind11` (`ind11`),
  ADD KEY `ind12` (`ind12`);

--
-- Indices de la tabla `legajo alumno`
--
ALTER TABLE `legajo alumno`
  ADD PRIMARY KEY (`Legajo`);

--
-- Indices de la tabla `materia curso`
--
ALTER TABLE `materia curso`
  ADD PRIMARY KEY (`codigo materia`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`numLegajo`);

--
-- Indices de la tabla `tipo indicador (materia)`
--
ALTER TABLE `tipo indicador (materia)`
  ADD PRIMARY KEY (`Tipo`,`Valor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `legajo alumno`
--
ALTER TABLE `legajo alumno`
  MODIFY `Legajo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4566;

--
-- AUTO_INCREMENT de la tabla `materia curso`
--
ALTER TABLE `materia curso`
  MODIFY `codigo materia` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`Legajo`) REFERENCES `legajo alumno` (`Legajo`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`codigo materia`) REFERENCES `materia curso` (`codigo materia`);

--
-- Filtros para la tabla `horas profesor`
--
ALTER TABLE `horas profesor`
  ADD CONSTRAINT `horas profesor_ibfk_1` FOREIGN KEY (`idProfesor`) REFERENCES `profesores` (`numLegajo`),
  ADD CONSTRAINT `horas profesor_ibfk_2` FOREIGN KEY (`idMateria`) REFERENCES `materia curso` (`codigo materia`);

--
-- Filtros para la tabla `indicadores`
--
ALTER TABLE `indicadores`
  ADD CONSTRAINT `indicadores_ibfk_1` FOREIGN KEY (`idAlumno`) REFERENCES `legajo alumno` (`Legajo`),
  ADD CONSTRAINT `indicadores_ibfk_10` FOREIGN KEY (`ind8`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_11` FOREIGN KEY (`ind9`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_12` FOREIGN KEY (`ind10`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_13` FOREIGN KEY (`ind11`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_14` FOREIGN KEY (`ind12`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_2` FOREIGN KEY (`idDocente`) REFERENCES `profesores` (`numLegajo`),
  ADD CONSTRAINT `indicadores_ibfk_3` FOREIGN KEY (`ind1`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_4` FOREIGN KEY (`ind2`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_5` FOREIGN KEY (`ind3`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_6` FOREIGN KEY (`ind4`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_7` FOREIGN KEY (`ind5`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_8` FOREIGN KEY (`ind6`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_9` FOREIGN KEY (`ind7`) REFERENCES `tipo indicador (materia)` (`Tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
