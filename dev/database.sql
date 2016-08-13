-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: Videojuegos
-- ------------------------------------------------------
-- Server version	5.6.22-log

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `userName` varchar(45) NOT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `name` varchar(250) NOT NULL,
  `apPaterno` varchar(250) NOT NULL,
  `apMaterno` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) NOT NULL,
  `password` varchar(400) NOT NULL,
  `puntos` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'davidduran94@gmail.com','davs','5542159282','DAvid','Duran','Rodriguez','Volcan Cofre de Perote 100, 07500, CDMX','123456',5678),(2,'Julio','July','66789756','Julio','Bolado',NULL,'Calle 142, 45, Caranza CDMX 331','76821Ds',32),(3,'das@gmail.com','dfghjk','567890','dfghjk','dfghjk','xcvbnm','dfghjk','32erknn ',233);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp(1) NOT NULL DEFAULT CURRENT_TIMESTAMP(1) ON UPDATE CURRENT_TIMESTAMP(1),
  `idCliente` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT '0',
  `IVA` int(11) NOT NULL,
  `juegos` varchar(45) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (1,'2016-08-13 00:52:09.1',1,2124,3422,1643,'1'),(2,'2016-08-13 01:04:29.5',1,342,3,34,'1,3'),(3,'2016-08-13 01:04:29.5',2,131,562,156,'1'),(4,'2016-08-13 13:56:13.0',1,323,22,12,'1'),(5,'2016-08-13 14:35:44.5',3,423,43,23,'3,3,2,4,2,3');
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra-cliente`
--

DROP TABLE IF EXISTS `compra-cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra-cliente` (
  `idcompra` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idcompra`),
  KEY `idcliente_idx` (`idcliente`),
  CONSTRAINT `idcliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idcompra` FOREIGN KEY (`idcompra`) REFERENCES `Compra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra-cliente`
--

LOCK TABLES `compra-cliente` WRITE;
/*!40000 ALTER TABLE `compra-cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra-cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juego`
--

DROP TABLE IF EXISTS `juego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juego` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(512) NOT NULL,
  `desarrollador` varchar(512) NOT NULL,
  `year` datetime NOT NULL DEFAULT '2014-06-01 01:12:26',
  `consolas` varchar(512) NOT NULL,
  `clasificacion` varchar(512) NOT NULL,
  `descripcion` text NOT NULL,
  `genero` varchar(512) NOT NULL,
  `precio` int(11) NOT NULL,
  `existencias` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juego`
--

LOCK TABLES `juego` WRITE;
/*!40000 ALTER TABLE `juego` DISABLE KEYS */;
INSERT INTO `juego` VALUES (1,'Call of Duty','Ubisoft','2014-06-01 01:12:26','XBOX,PS4,PC','R','Juego de sismulacion de guerra tecnologica','SHOOTER',1200,32),(2,'Need For Soeed','EA','2014-06-01 01:12:26','XBOX ONE, PS4','Teen','Carreras callejeras','automovilismo',566,12),(3,'Uncharter','EA','2014-06-01 01:12:26','PS4, PC','M','Historia del dorado','Accion y aventura',450,23),(4,'Minecraft','Microsoft','2014-06-01 01:12:26','XBOX, PC','K','Block pixel Buildings','Toons',250,4568),(65,'Fifa','EA','2016-08-13 05:19:26','XBOX, PC, PS4, Wii','T','Football Simulator','Sport',456,432),(66,'Halo','Ubisoft','2016-08-13 07:08:21','XBOX 360','T','Guerra intergalÃ¡ctica','Shooter',780,4123),(67,'Ninja Gaiden','UBISOFT','2016-08-13 16:37:25','XBOX 360, PS2','M','Ninja del pasado que enfrenta mounstros','Accion',670,23);
/*!40000 ALTER TABLE `juego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'Videojuegos'
--

--
-- Dumping routines for database 'Videojuegos'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-13  9:46:08
