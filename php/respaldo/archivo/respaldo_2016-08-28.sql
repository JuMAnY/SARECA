SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `sareca` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sareca`;

CREATE TABLE IF NOT EXISTS `equipo_audiovisual` (
  `Serial` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(1) NOT NULL,
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `equipo_audiovisual` (`Serial`, `tipo`, `Estado`) VALUES
('02e5rt', 1, 1),
('40fg9e', 2, 2);

CREATE TABLE IF NOT EXISTS `persona` (
  `Carnet` int(9) NOT NULL,
  `Cedula` int(8) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Departamento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Cargo` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `persona` (`Carnet`, `Cedula`, `Nombre`, `Departamento`, `Cargo`) VALUES
(234234, 8706893, 'rwerwerwer', 'werwerwer', 'werwerwer'),
(5546456, 2147483647, 'ljklj', 'ljkljk', 'ljlj'),
(10300601, 18191839, 'Pedro Perez', 'Informatica', 'Estudiante');

CREATE TABLE IF NOT EXISTS `prestamo` (
  `Id` int(11) NOT NULL,
  `Serial_equipo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_prestamo` date NOT NULL,
  `Id_usuario` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Carnet` int(9) NOT NULL,
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `prestamo` (`Id`, `Serial_equipo`, `Fecha_prestamo`, `Id_usuario`, `Carnet`, `Estado`) VALUES
(1, '40fg9e', '2015-10-07', 'reparacion', 234234, 1),
(2, '02e5rt', '2015-10-07', 'reparacion', 10300601, 1),
(3, '02e5rt', '2015-10-07', 'reparacion', 10300601, 1),
(4, '40fg9e', '2015-10-07', 'reparacion', 5546456, 1),
(5, '02e5rt', '2015-10-07', 'admin', 10300601, 1),
(6, '02e5rt', '2015-10-08', 'admin', 10300601, 1),
(7, '40fg9e', '2015-10-08', 'admin', 10300601, 2),
(8, '02e5rt', '2015-10-15', 'admin', 10300601, 1);

CREATE TABLE IF NOT EXISTS `reparacion` (
  `Id` int(11) NOT NULL,
  `Serial_equipo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `Nucleo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `falla` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(1) NOT NULL,
  `observacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_entrada` date NOT NULL,
  `resultado` int(1) NOT NULL,
  `observacion_reaparacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_salida` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `reparacion` (`Id`, `Serial_equipo`, `Nucleo`, `Departamento`, `falla`, `Estado`, `observacion`, `Fecha_entrada`, `resultado`, `observacion_reaparacion`, `Fecha_salida`) VALUES
(1, 'e33ee3', 'Ejido', 'Informatica', 'Se robaron la memoria RAM', 1, 'Creo que fue Juan', '2015-10-07', 2, 'Se devolvio la memoria', '2015-10-08');

CREATE TABLE IF NOT EXISTS `usuario` (
  `Id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Contrasena` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Nivel` int(1) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `usuario` (`Id`, `Contrasena`, `Nivel`, `Nombre`, `correo`) VALUES
('admin', 'a2af12d63a5b2f03df06331ca50be18c', 1, 'Francisco Gomez', 'soportesareca@gmail.com'),
('manuel', '1a55659138d078af736b8a17aca58488', 1, 'Manuel Sanchez', 'soportesareca@gmail.com'),
('prestamo', 'a2af12d63a5b2f03df06331ca50be18c', 2, 'Lucas Zapata', 'soportesareca@gmail.com'),
('reparacion', 'a2af12d63a5b2f03df06331ca50be18c', 3, 'Jesus Garcia', 'soportesareca@gmail.com');


ALTER TABLE `equipo_audiovisual`
  ADD PRIMARY KEY (`Serial`);

ALTER TABLE `persona`
  ADD PRIMARY KEY (`Carnet`),
  ADD KEY `Cedula` (`Cedula`);

ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_usuario` (`Id_usuario`),
  ADD KEY `Carnet` (`Carnet`),
  ADD KEY `Serial_equipo` (`Serial_equipo`);

ALTER TABLE `reparacion`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Serial_equipo` (`Serial_equipo`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`);


ALTER TABLE `prestamo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
ALTER TABLE `reparacion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ibfk_4` FOREIGN KEY (`Carnet`) REFERENCES `persona` (`Carnet`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_ibfk_5` FOREIGN KEY (`Serial_equipo`) REFERENCES `equipo_audiovisual` (`Serial`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
