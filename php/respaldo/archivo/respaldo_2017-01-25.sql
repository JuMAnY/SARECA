-- MySQL dump 10.13  Distrib 5.5.34, for Win32 (x86)
--
-- Host: localhost    Database: sareca
-- ------------------------------------------------------
-- Server version	5.5.34

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
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `id_bitacora` int(10) NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sentencia` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bitacora`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (2,'admin','Francisco Gomez','SELECT Id, Contrasena, Nombre, Nivel FROM usuario WHERE Id=\'admin\'','2017-01-25 07:27:21'),(3,'admin','Francisco Gomez','SELECT Id, Contrasena, Nombre, Nivel FROM usuario WHERE Id=\'admin\'','2017-01-25 07:36:06'),(4,'admin','Francisco Gomez','SELECT Id, Contrasena, Nombre, Nivel FROM usuario WHERE Id=\'admin\'','2017-01-25 07:51:15'),(7,'admin','Francisco Gomez','SELECT Id, Contrasena, Nombre, Nivel FROM usuario WHERE Id=\'admin\'','2017-01-25 08:49:48'),(8,'admin','Francisco Gomez','SELECT Id, Contrasena, Nombre, Nivel FROM usuario WHERE Id=\'admin\'','2017-01-25 08:50:33'),(9,'admin','Francisco Gomez','SELECT Id, Contrasena, Nombre, Nivel FROM usuario WHERE Id=\'admin\'','2017-01-25 08:50:33');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `equipo_audiovisual` VALUES ('A89JN296347',2,2,'07-08-45621','I246S','EPSON','Adquirido octubre de 2002',2),('B8AS123285N',2,1,'05-06-24895','E729C','EPSON','Adquirido octubre de 2002',2),('J7FG568521X',1,2,'02-03-96325','K741L','EPSON','Adquirido octubre de 2009',3),('L5TF953295L',1,3,'03-04-74125','H283A','EPSON','Adquirido octubre de 2009',3),('M1YP239674Q',1,1,'01-02-12345','A275B','EPSON','Adquirido octubre de 2009',2),('O5TG286947Z',2,3,'09-10-37195','T948R','EPSON','Adquirido octubre de 2002',1);
/*!40000 ALTER TABLE `equipo_audiovisual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `Cedula` int(8) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (756412,'Blanca Alviarez','Coordinadora de PNF '),(8125231,'Yudith Sanchez','Coordinadora estudio'),(19146054,'Juan Araque','Director'),(20197068,'Andrea Uzcategui','Presidente FCU'),(20431663,'Jesus Garcia ','Coordinador de Infor'),(20434776,'Yenisey Delgado','Rectora UPTM');
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
  `destino` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Id_usuario_prestador` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Cedula` int(8) NOT NULL,
  `carrera` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(1) NOT NULL,
  `observacion_prestamo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `hora_devolucion` time NOT NULL,
  `id_usuario_receptor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `observacion_devolucion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id_usuario` (`Id_usuario_prestador`),
  KEY `Serial_equipo` (`Serial_equipo`),
  KEY `Cedula` (`Cedula`),
  KEY `id_usuario_receptor` (`id_usuario_receptor`),
  CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`Id_usuario_prestador`) REFERENCES `usuario` (`Id`) ON UPDATE CASCADE,
  CONSTRAINT `prestamo_ibfk_5` FOREIGN KEY (`Serial_equipo`) REFERENCES `equipo_audiovisual` (`Serial`) ON UPDATE CASCADE,
  CONSTRAINT `prestamo_ibfk_6` FOREIGN KEY (`Cedula`) REFERENCES `persona` (`Cedula`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prestamo`
--

LOCK TABLES `prestamo` WRITE;
/*!40000 ALTER TABLE `prestamo` DISABLE KEYS */;
INSERT INTO `prestamo` VALUES (4,'B8AS123285N','2016-11-17','23:55:45','09:25:00','Pasillo  A-8','admin',756412,'Informatica',1,'Se entrego el equipo en perfectas condiciones ','2016-11-18','18:13:26','admin','El retroproyector, se quemo al momento en que se estaba utilizando,  mucho uso diariamente por parte'),(5,'M1YP239674Q','2016-11-18','00:01:05','10:00:00','Edificio B-2','admin',8125231,'Radiologia ',2,'Se entrego el equipo en perfectas condiciones ','0000-00-00','00:00:00','',''),(6,'B8AS123285N','2016-11-18','18:17:45','10:55:00','Pasillo  A-5','admin',756412,'Informatica',2,'Se entrego el equipo en perfectas condiciones,  se hace responsable la profesora blanca dicho equipo','0000-00-00','00:00:00','',''),(7,'A89JN296347','2017-01-25','04:20:33','08:59:00','Laboratorio','admin',19146054,'Prueba',1,'Probando bitacora','2017-01-25','04:25:09','admin',''),(8,'A89JN296347','2017-01-25','04:36:25','08:00:00','Laboratorio','admin',19146054,'Prueba dos',2,'','0000-00-00','00:00:00','','');
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
  `Fecha_entrada` date NOT NULL,
  `Nucleo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Departamento` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `falla` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(1) NOT NULL,
  `observacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `resultado` int(1) NOT NULL,
  `observacion_reaparacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_salida` date NOT NULL,
  `responsable` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Serial_equipo` (`Serial_equipo`,`Fecha_entrada`),
  KEY `responsable` (`responsable`),
  CONSTRAINT `reparacion_ibfk_1` FOREIGN KEY (`responsable`) REFERENCES `usuario` (`Id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reparacion`
--

LOCK TABLES `reparacion` WRITE;
/*!40000 ALTER TABLE `reparacion` DISABLE KEYS */;
INSERT INTO `reparacion` VALUES (1,'JN2963','2016-11-18','Ejido','Biblioteca','No prende el cpu',1,'El equipo se recibio con todos sus componentes cpu',1,'','0000-00-00','admin'),(2,'56852X','2016-11-18','Bailadores','direccion ','No da video',1,'El equipo se recibio con todos sus componentes cpu',1,'','0000-00-00','admin'),(3,'G5685k','2016-11-18','Ejido','mantenimiento','la PC se reinicia a cada rato o se cuelga',2,'El equipo se recibio con todos sus componentes cpu',2,'Se verifico el funcionamiento del cooler del microprocesador, se paso un antivirus, se reviso que no haya ningÃºn conflicto de hardware o software al problema','2016-11-18','admin'),(4,'M28697','2016-11-18','Ejido','Control de estudio','Pantalla negra con la siguiente leyenda o similar:',2,'El equipo se recibio con todos sus componentes cpu',2,'Cambio de disco duro.\r\nRecuperaciÃ³n de sistema.\r\nInstalaciÃ³n y conflagraciÃ³n de sistema.\r\nRevisiÃ³n de conexiones de bus.','2016-11-18','admin'),(5,'AC3018','2016-11-18','Tucani','Subdireccion','Al encender manda un mensaje que Windows se cerro ',2,'El equipo se recibio con todos sus componentes cpu',1,'SoluciÃ³n.\nRecuperaciÃ³n de sistema.\nInstalaciÃ³n y conflagraciÃ³n de sistema operativo','2016-11-18','admin'),(7,'BE5916','2016-11-18','Ejido','Administracion ','Se oye un ruido metÃ¡lico continuo proveniente de el disco duro',2,'El equipo se recibio con todos sus componentes cpu',1,'Para este caso no hay soluciÃ³n, sÃ³lo reemplazarlo por otro disco duro','2016-11-18','admin'),(8,'C84A57','2016-11-18','Ejido','Proceso tecnico','La PC se reinicia a cada rato o se cuelga',2,'El equipo se recibio con todos sus componentes cpu',2,'se verifico el funcionamiento del cooler del microprocesador, pasar un antivirus, revisar que no haya ningÃºn conflicto de hardware o software','2016-11-18','admin'),(10,'8F2A36','2016-11-18','Ejido','Control de estudio','Muchas ventanas pop up (publicidad) al navegar en ',2,'El equipo se recibio con todos sus componentes cpu',1,'Limpieza de software (virus, spyware, adware, pop ups, etc) Grado 1, 2 ,3','2016-11-18','admin'),(11,'L15D52','2016-11-18','Tucani','Coordinacion','El video se queda pasmado.',1,'El equipo se recibio con todos sus componentes cpu',1,'','0000-00-00','admin');
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
INSERT INTO `usuario` VALUES ('admin','a2af12d63a5b2f03df06331ca50be18c',1,'Francisco Gomez','soportesareca@gmail.com'),('manuel','a2af12d63a5b2f03df06331ca50be18c',1,'Manuel Sanchez','soportesareca@gmail.com'),('prestamo','a2af12d63a5b2f03df06331ca50be18c',2,'Lucas Zapata','soportesareca@gmail.com'),('reparacion','a2af12d63a5b2f03df06331ca50be18c',3,'Jesus Garcia','soportesareca@gmail.com');
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

-- Dump completed on 2017-01-25  4:44:50
