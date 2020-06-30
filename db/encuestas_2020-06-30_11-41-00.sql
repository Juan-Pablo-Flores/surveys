-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: encuestas
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
-- Table structure for table `encuestas`
--

DROP TABLE IF EXISTS `encuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(201) CHARACTER SET utf8 NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL,
  `aleatoria` int(11) NOT NULL,
  `anonima` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuestas`
--

LOCK TABLES `encuestas` WRITE;
/*!40000 ALTER TABLE `encuestas` DISABLE KEYS */;
INSERT INTO `encuestas` VALUES (1,'Gustos','¿Cuáles son tus gustos? en esta encuesta responderás sobre tus gustos a partir de cuatro opciones disponibles',1,1),(3,'Historia','¿Recuerdas la historia del México antiguo?... ¡ponte a prueba! Este es un pequeño examen sobre la historia del México antiguo.',0,0);
/*!40000 ALTER TABLE `encuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opciones`
--

DROP TABLE IF EXISTS `opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `opcion` varchar(100) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_pregunta` (`id_pregunta`),
  CONSTRAINT `fk_id_pregunta` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opciones`
--

LOCK TABLES `opciones` WRITE;
/*!40000 ALTER TABLE `opciones` DISABLE KEYS */;
INSERT INTO `opciones` VALUES (1,'Coatlicue',1),(2,'Huitzilopochtli',1),(3,'Quetzalcóatl',1),(4,'Tláloc',1),(5,'Maya',2),(6,'Mexica',2),(7,'Olmeca',2),(8,'Tolteca',2),(9,'Mexica',3),(10,'Mixteca',3),(11,'Olmeca',3),(12,'Tolteca',3),(13,'Chinampa',4),(14,'Encomienda',4),(15,'Ejido',4),(16,'Hacienda',4),(17,'Jeroglífico',5),(18,'Pictograma',5),(19,'Libro',5),(20,'Códice',5),(21,'Palenque',6),(22,'Chichén Itzá',6),(23,'Teotihuacan',6),(24,'Uxmal',6),(25,'Aztlán',7),(26,'Tula',7),(27,'Tenochtitlán',7),(28,'Mictlán',7),(29,'La papa',8),(30,'El trigo',8),(31,'El arroz',8),(32,'El maíz',8),(33,'Tolteca',9),(34,'Maya',9),(35,'Totonaca',9),(36,'Olmeca',9),(37,'1521',10),(38,'1650',10),(39,'1410',10),(40,'1621',10),(41,'Alemania',11),(42,'España',11),(43,'Italia',11),(44,'Francia',11),(45,'Enchiladas',12),(46,'Pizza',12),(47,'Hamburguesa',12),(48,'Tacos',12),(49,'Chivas',13),(50,'Morelia xd',13),(51,'Mazatlan xd',13),(52,'America',13),(53,'Morelia',14),(54,'Damasco',14),(55,'chernobyl',14),(56,'wuhan',14),(57,'Acapulco',15),(58,'cozumel',15),(59,'sayulita',15),(60,'mazatlan',15),(61,'videojuegos',16),(62,'juegos de mesa',16),(63,'juegos de pelota',16),(64,'escuchar musica',16),(65,'Botas',17),(66,'tenis',17),(67,'huaraches',17),(68,'zapato casual',17),(69,'El de los dioses \"Ajedrez\"',18),(70,'Futbol',18),(71,'basquetbol',18),(72,'beisbol',18),(73,'the back to the future',19),(74,'barbie y el cascanueces',19),(75,'la toalla del mojado',19),(76,'El codigo enigma',19),(77,'michis',20),(78,'Doggys',20),(79,'elefante',20),(80,'Dinosaurio',20);
/*!40000 ALTER TABLE `opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(255) NOT NULL,
  `id_encuesta` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_encuestas` (`id_encuesta`),
  CONSTRAINT `fk_id_encuestas` FOREIGN KEY (`id_encuesta`) REFERENCES `encuestas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preguntas`
--

LOCK TABLES `preguntas` WRITE;
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
INSERT INTO `preguntas` VALUES (1,'Deidad Del Mexico antiguo conocida como \"La serpiente emplumada\"',3),(2,'Cultura que se desarrollo en la ciudad de palenque ',3),(3,'Las cabezas colosales son creaciones de la cultura: ',3),(4,'Terreno construido sobre las lagunas del valle de México que sirvió de base al sistema productivo del altiplano central. En la actualidad, puede encontrarse en Xochimilco:',3),(5,'Manuscrito en papel amate o sobre cuero con representaciones pictóricas que relataba asuntos históricos y religiosos del México antiguo:',3),(6,'¿En dónde se encuentran las pirámides del Sol y la Luna?',3),(7,'Al lugar mítico de donde partieron los mexicas e iniciaron su migración se le conoce como:',3),(8,'La base alimenticia de los pueblos mesoamericanos fue:',3),(9,'Chichén Itzá fue una poderosa ciudad:',3),(10,'Año en que los españoles conquistaron México Tenochtitlán:',3),(11,'elije un país del continente europeo:',1),(12,'Elige un platillo',1),(13,'Elige un Equipo de futbol Mexicano',1),(14,'Elige una ciudad para vivir',1),(15,'Elige una playa para visitar',1),(16,'Elige un hobie',1),(17,'Elige un calzado',1),(18,'Elige un deporte',1),(19,'Elige una pelicula',1),(20,'Elige una mascota',1);
/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_opcion` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_pregunta` int(11) NOT NULL,
  `instante` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_id_opcion` (`id_opcion`),
  KEY `fk_id_usuario` (`id_usuario`),
  CONSTRAINT `fk_id_opcion` FOREIGN KEY (`id_opcion`) REFERENCES `opciones` (`id`),
  CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuestas`
--

LOCK TABLES `respuestas` WRITE;
/*!40000 ALTER TABLE `respuestas` DISABLE KEYS */;
INSERT INTO `respuestas` VALUES (1,11,NULL,44,'2020-06-30 16:24:28'),(2,12,NULL,45,'2020-06-30 16:24:28'),(3,13,NULL,50,'2020-06-30 16:24:28'),(4,14,NULL,55,'2020-06-30 16:24:28'),(5,15,NULL,59,'2020-06-30 16:24:28'),(6,16,NULL,62,'2020-06-30 16:24:28'),(7,17,NULL,65,'2020-06-30 16:24:28'),(8,18,NULL,71,'2020-06-30 16:24:28'),(9,19,NULL,73,'2020-06-30 16:24:28'),(10,20,NULL,79,'2020-06-30 16:24:28');
/*!40000 ALTER TABLE `respuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (7,'Pablo','Flores'),(8,'PabloF','Flores');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-30 16:42:41
