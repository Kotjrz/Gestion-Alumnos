-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 08:14 PM
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
-- Table structure for table `calificaciones`
--

CREATE TABLE `calificaciones` (
  `Legajo` int(10) NOT NULL,
  `codigo materia` int(30) NOT NULL,
  `Fecha de calificacion` date NOT NULL,
  `aprobo (si/no)` enum('Si','No') NOT NULL,
  `nota numerica` int(30) NOT NULL,
  `idIndicador` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuentas`
--

CREATE TABLE `cuentas` (
  `idCuenta` int(11) NOT NULL,
  `correo` varchar(32) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `tipoCuenta` enum('Alumno','Directivo','Profesor') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horas profesor`
--

CREATE TABLE `horas profesor` (
  `idProfesor` int(10) NOT NULL,
  `idMateria` int(10) NOT NULL,
  `Fecha de toma` date NOT NULL,
  `Categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicadores`
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
-- Table structure for table `materia curso`
--

CREATE TABLE `materia curso` (
  `codigo materia` int(30) NOT NULL,
  `nombre materia` text NOT NULL,
  `año` int(30) NOT NULL,
  `curso` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `tipo indicador (materia)`
--

CREATE TABLE `tipo indicador (materia)` (
  `Tipo` varchar(50) NOT NULL,
  `Valor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD KEY `Legajo` (`Legajo`,`codigo materia`),
  ADD KEY `codigo materia` (`codigo materia`),
  ADD KEY `idIndicador` (`idIndicador`);

--
-- Indexes for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`idCuenta`);

--
-- Indexes for table `horas profesor`
--
ALTER TABLE `horas profesor`
  ADD KEY `idProfesor` (`idProfesor`,`idMateria`),
  ADD KEY `idMateria` (`idMateria`);

--
-- Indexes for table `indicadores`
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
-- Indexes for table `materia curso`
--
ALTER TABLE `materia curso`
  ADD PRIMARY KEY (`codigo materia`);

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`idDocente`);

--
-- Indexes for table `tipo indicador (materia)`
--
ALTER TABLE `tipo indicador (materia)`
  ADD PRIMARY KEY (`Tipo`,`Valor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `idCuenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materia curso`
--
ALTER TABLE `materia curso`
  MODIFY `codigo materia` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profesores`
--
ALTER TABLE `profesores`
  MODIFY `idDocente` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `horas profesor`
--
ALTER TABLE `horas profesor`
  ADD CONSTRAINT `horas profesor_ibfk_2` FOREIGN KEY (`idMateria`) REFERENCES `materia curso` (`codigo materia`);

--
-- Constraints for table `indicadores`
--
ALTER TABLE `indicadores`
  ADD CONSTRAINT `indicadores_ibfk_10` FOREIGN KEY (`ind8`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_11` FOREIGN KEY (`ind9`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_12` FOREIGN KEY (`ind10`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_13` FOREIGN KEY (`ind11`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_14` FOREIGN KEY (`ind12`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_3` FOREIGN KEY (`ind1`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_4` FOREIGN KEY (`ind2`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_5` FOREIGN KEY (`ind3`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_6` FOREIGN KEY (`ind4`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_7` FOREIGN KEY (`ind5`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_8` FOREIGN KEY (`ind6`) REFERENCES `tipo indicador (materia)` (`Tipo`),
  ADD CONSTRAINT `indicadores_ibfk_9` FOREIGN KEY (`ind7`) REFERENCES `tipo indicador (materia)` (`Tipo`);
COMMIT;



-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2023 a las 20:32:28
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
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idAlumno` int(11) NOT NULL,
  `apellidos` varchar(24) NOT NULL,
  `nombres` varchar(24) NOT NULL,
  `fechaDeNacimiento` date NOT NULL,
  `DNI` int(10) NOT NULL,
  `CUIL` int(12) NOT NULL,
  `CPI` enum('si','no','Si','No') NULL,
  `documentoExtranjero` enum('si','no','Si','No') NULL,
  `tipoDoc` varchar(32) NULL,
  `DNIe` int(24) NULL,
  `idenGenero` enum('Masculino','Femenino','Trans masculino','Trans femenino','No binario','Otra','No desea responder') NOT NULL,
  `nacionalidad` varchar(32) NOT NULL,
  `provincia` varchar(32) NULL,
  `direccion` varchar(32) NULL,
  `distrito` varchar(32) NULL,
  `localidad` varchar(32) NULL,
  `otra` varchar(32) NULL,
  `piso` int(12) NULL,
  `torre` int(32) NULL,
  `depto` int(32) NULL,
  `entre` varchar(32) NULL,
  `yEntre` varchar(32) NULL,
  `otroDato` varchar(32) NULL,
  `provDomicilio` varchar(32) NULL,
  `distriDomicilio` varchar(32) NULL,
  `localiDomicilio` varchar(32) NULL,
  `telefonoFijo` varchar(32) NULL,
  `telefonoCelular` varchar(32) NULL,
  `cantHermanos` int(20) NULL,
  `hermEscuela` int(20) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idAlumno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
