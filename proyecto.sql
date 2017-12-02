-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: proyecto
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

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
-- Table structure for table `articulos_carrito`
--

DROP TABLE IF EXISTS `articulos_carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos_carrito` (
  `id_carrito` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo` int(11) DEFAULT NULL,
  `id_img_sop` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos_carrito`
--

LOCK TABLES `articulos_carrito` WRITE;
/*!40000 ALTER TABLE `articulos_carrito` DISABLE KEYS */;
INSERT INTO `articulos_carrito` VALUES (1,3,2000,0,1),(6,3,3000,34,5),(6,10,150000,38,15),(1,1,15000,42,19),(6,3,45000,41,21),(7,2,30000,38,23),(6,3,45000,43,40),(1,10,150000,37,50),(1,10,150000,38,51),(1,10,150000,39,52),(8,5,75000,34,53),(9,5,75000,43,54),(11,10,150000,34,55),(12,6,90000,34,56),(13,6,90000,39,58),(14,10,10,44,59),(15,1,15000,34,60);
/*!40000 ALTER TABLE `articulos_carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
INSERT INTO `carrito` VALUES (1,4,4,'2017-12-02 00:18:00'),(6,1,0,'2017-12-01 01:53:24'),(7,5,1,'2017-12-01 15:17:13'),(8,4,0,'2017-12-02 00:22:44'),(9,4,0,'2017-12-02 00:26:22'),(10,4,2,'2017-12-02 00:26:34'),(11,1,0,'2017-12-02 01:08:31'),(12,1,0,'2017-12-02 01:10:56'),(13,1,0,'2017-12-02 01:11:32'),(14,1,0,'2017-12-02 01:14:24'),(15,1,2,'2017-12-02 01:24:59');
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `name` varchar(100) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES ('about_user','Awildo, mi mejor amigo.'),('id','1'),('image_user','img/profile/image_user'),('name_user','Ayboi'),('save','Guardar'),('status','1');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` text,
  `name` varchar(100) NOT NULL,
  `mostrar` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenes`
--

LOCK TABLES `imagenes` WRITE;
/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
INSERT INTO `imagenes` VALUES (27,'upload/5a206d2722fc3','Love',1),(28,'upload/5a206d5568c3e','Mars Border',1),(29,'upload/5a206d82ee12a','Nebula',1),(30,'upload/5a206d9b93f46','Online',1),(31,'upload/5a206db7925fd','Sleigh',1),(32,'upload/5a206decbd49e','Pastel Noir',1),(33,'upload/5a206e0f84fba','Violet',1),(34,'upload/5a206e35a7f77','Aesthetic',1);
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_sop_size`
--

DROP TABLE IF EXISTS `img_sop_size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_sop_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_imagen` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `id_soporte` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `complejo` (`id_imagen`,`id_soporte`,`id_size`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_sop_size`
--

LOCK TABLES `img_sop_size` WRITE;
/*!40000 ALTER TABLE `img_sop_size` DISABLE KEYS */;
INSERT INTO `img_sop_size` VALUES (34,27,1,15000,4),(35,27,1,18000,5),(36,27,2,12000,7),(37,28,1,15000,4),(38,29,1,15000,4),(39,30,1,15000,4),(40,31,1,15000,4),(41,32,1,15000,4),(42,33,1,15000,4),(43,34,1,15000,4),(44,27,1,1,7);
/*!40000 ALTER TABLE `img_sop_size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensaje`
--

DROP TABLE IF EXISTS `mensaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensaje` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_carrito` int(11) DEFAULT NULL,
  `mensaje` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje`
--

LOCK TABLES `mensaje` WRITE;
/*!40000 ALTER TABLE `mensaje` DISABLE KEYS */;
INSERT INTO `mensaje` VALUES (3,4,1,'hola pepe'),(4,4,1,'hole pepe necesito mas informacion'),(5,4,1,'pepe veis que lo que escribis en el textarea no es legible correcto?'),(6,1,6,'hay pepito ojala guarde'),(7,1,6,'hay pepito'),(8,1,6,'hay pepe'),(9,1,6,'la vieja y confiable'),(10,1,6,'pepe'),(11,4,1,'pepe'),(12,4,1,'lo necesito en mi vida'),(13,4,1,'sadaw'),(14,4,1,'cualquier vaina'),(15,4,1,'sdasd'),(16,4,1,'sdawdw'),(17,4,8,'erfwe'),(18,1,11,'asdklfhaskhfukashdfhauiwhuid'),(19,1,12,'sadw'),(20,1,14,'los quiero para maÃ±ana a las 9');
/*!40000 ALTER TABLE `mensaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `resolucion` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` VALUES (1,'Tabloide','279mmx432 mm'),(2,'Carta','216mmx279mm');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soporte`
--

DROP TABLE IF EXISTS `soporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soporte`
--

LOCK TABLES `soporte` WRITE;
/*!40000 ALTER TABLE `soporte` DISABLE KEYS */;
INSERT INTO `soporte` VALUES (4,'Opalina'),(5,'Canvas Impreso'),(7,'Glasse 300');
/*!40000 ALTER TABLE `soporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` enum('Admin','User') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin','admin','admin@admin.com','21232f297a57a5a743894a0e4a801fc3','Admin'),(2,'jeecks','Ender','Bohorquez','enderdavidbohorquez@webo.com','d41d8cd98f00b204e9800998ecf8427e','User'),(4,'zerkc','gustavo','gonzalez','gustavo.a.g.latorre@gmail.com','910d6704555513e272cf87caddf4b9bd','User'),(5,'lucho','Luis','Barboza','luisbarboza1990@gmail.com','f44f1a457b85127844253b5f67d6719b','User'),(6,'avilioabr','Avilio','Boscan','avilio@yolopido.com','2b273b48d465b2fc3b3e67d344bd4ebd','User');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votos`
--

DROP TABLE IF EXISTS `votos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `votos` (
  `id_imagen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `voto` enum('GOOD','BAD') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votos`
--

LOCK TABLES `votos` WRITE;
/*!40000 ALTER TABLE `votos` DISABLE KEYS */;
/*!40000 ALTER TABLE `votos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-02  1:55:56
