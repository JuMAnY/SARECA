-- MySQL dump 10.13  Distrib 5.6.26, for Win32 (x86)
--
-- Host: localhost    Database: sareca
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `equipo_audiovisual`
--

DROP TABLE IF EXISTS `equipo_audiovisual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo_audiovisual` (
  `Serial` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` int(1) NOT NULL,
  `numero` tinyint(4) NOT NULL,
  `rbn` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `marca` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `inf_adic` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(1) NOT NULL,
  PRIMARY KEY (`Serial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo_audiovisual`
--

LOCK TABLES `equipo_audiovisual` WRITE;
/*!40000 ALTER TABLE `equipo_audiovisual` DISABLE KEYS */;
INSERT INTO `equipo_audiovisual` VALUES ('02e5rt',1,0,'','','','',1),('40fg9e',2,0,'','','','',2),('6T5r',1,0,'','','','',3),('tr432',2,1,'02-08-2016K76','hp','hpm64','DonaciÃ³n',3),('uyt65',1,1,'02-08-2016G6','epson','xl54','',1);
/*!40000 ALTER TABLE `equipo_audiovisual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `Carnet` int(9) NOT NULL,
  `Cedula` int(8) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Cargo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Carnet`),
  KEY `Cedula` (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (234234,8706893,'rwerwerwer','werwerwer'),(5546456,2147483647,'ljklj','ljlj'),(10300601,18191839,'Pedro Perez','Estudiante');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prestamo`
--

DROP TABLE IF EXISTS `prestamo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prestamo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Serial_equipo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_prestamo` date NOT NULL,
  `hora_prestamo` time NOT NULL,
  `hora_estimada_devolucion` time NOT NULL,
  `destino` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Id_usuario_prestador` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Carnet` int(9) NOT NULL,
  `carrera` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(1) NOT NULL,
  `observacion_prestamo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_usuario` (`Id_usuario_prestador`),
  KEY `Carnet` (`Carnet`),
  KEY `Serial_equipo` (`Serial_equipo`),
  CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`Id_usuario_prestador`) REFERENCES `usuario` (`Id`) ON UPDATE CASCADE,
  CONSTRAINT `prestamo_ibfk_4` FOREIGN KEY (`Carnet`) REFERENCES `persona` (`Carnet`) ON UPDATE CASCADE,
  CONSTRAINT `prestamo_ibfk_5` FOREIGN KEY (`Serial_equipo`) REFERENCES `equipo_audiovisual` (`Serial`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamo`
--

LOCK TABLES `prestamo` WRITE;
/*!40000 ALTER TABLE `prestamo` DISABLE KEYS */;
INSERT INTO `prestamo` VALUES (1,'40fg9e','2015-10-07','12:15:13','00:00:00','','reparacion',234234,'informatica',1,''),(2,'02e5rt','2015-10-07','06:31:19','00:00:00','','reparacion',10300601,'informatica',1,''),(3,'02e5rt','2015-10-07','13:18:31','00:00:00','','reparacion',10300601,'informatica',1,''),(4,'40fg9e','2015-10-07','14:06:38','00:00:00','','reparacion',5546456,'informatica',1,''),(5,'02e5rt','2015-10-07','14:04:56','00:00:00','','admin',10300601,'informatica',1,''),(6,'02e5rt','2015-10-08','18:36:13','00:00:00','','admin',10300601,'informatica',1,''),(7,'40fg9e','2015-10-08','10:43:05','00:00:00','','admin',10300601,'informatica',2,''),(8,'02e5rt','2015-10-15','07:45:07','00:00:00','','admin',10300601,'informatica',1,''),(9,'02e5rt','2016-09-06','11:40:20','00:00:00','','manuel',234234,'informatica',1,''),(10,'02e5rt','2016-10-09','22:22:40','00:00:00','','admin',234234,'Informatica',1,''),(11,'02e5rt','2016-11-13','14:40:06','15:33:00','','admin',234234,'lol',1,''),(12,'02e5rt','2016-11-13','15:20:05','17:40:00','','admin',234234,'lol',1,'lol'),(13,'02e5rt','2016-11-13','15:43:37','17:45:00','Biblioteca','admin',234234,'lol',1,'prueba');
/*!40000 ALTER TABLE `prestamo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reparacion`
--

DROP TABLE IF EXISTS `reparacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reparacion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Serial_equipo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `Nucleo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Departamento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `falla` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(1) NOT NULL,
  `observacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_entrada` date NOT NULL,
  `resultado` int(1) NOT NULL,
  `observacion_reaparacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_salida` date NOT NULL,
  `responsable` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Serial_equipo` (`Serial_equipo`),
  KEY `responsable` (`responsable`),
  CONSTRAINT `reparacion_ibfk_1` FOREIGN KEY (`responsable`) REFERENCES `usuario` (`Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reparacion`
--

LOCK TABLES `reparacion` WRITE;
/*!40000 ALTER TABLE `reparacion` DISABLE KEYS */;
INSERT INTO `reparacion` VALUES (1,'e33ee3','Ejido','Informatica','Se robaron la memoria RAM',1,'Creo que fue Juan','2015-10-07',2,'Se devolvio la memoria','2015-10-08','reparacion'),(2,'dsfsgdfg','Ejido','Laboratorio 1','Se reinicia',2,'CPU i7','2016-09-06',2,'El problema lo causaba alta temperatura a razÃ³n d','2016-09-06','manuel');
/*!40000 ALTER TABLE `reparacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `Id` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Contrasena` varchar(32) COLLATE utf8_spanish_ci NOT NULL,
  `Nivel` int(1) NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('admin','a2af12d63a5b2f03df06331ca50be18c',1,'Francisco Gomez','soportesareca@gmail.com'),('manuel','1f69ab430ddd180a23b1a4052c1836a4',1,'Manuel Sanchez','soportesareca@gmail.com'),('prestamo','a2af12d63a5b2f03df06331ca50be18c',2,'Lucas Zapata','soportesareca@gmail.com'),('reparacion','a2af12d63a5b2f03df06331ca50be18c',3,'Jesus Garcia','soportesareca@gmail.com');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-13 15:45:36