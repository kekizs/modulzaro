CREATE DATABASE  IF NOT EXISTS `modulzaro` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `modulzaro`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: modulzaro
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB

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
-- Table structure for table `busz`
--

DROP TABLE IF EXISTS `busz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `busz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rendszam` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `busz`
--

LOCK TABLES `busz` WRITE;
/*!40000 ALTER TABLE `busz` DISABLE KEYS */;
INSERT INTO `busz` VALUES (36,'aaa-111'),(37,'bbb-222'),(38,'ccc-333'),(39,'ddd-444');
/*!40000 ALTER TABLE `busz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sofor`
--

DROP TABLE IF EXISTS `sofor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sofor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nev` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sofor`
--

LOCK TABLES `sofor` WRITE;
/*!40000 ALTER TABLE `sofor` DISABLE KEYS */;
INSERT INTO `sofor` VALUES (13,'Béla'),(14,'Zoli'),(15,'Kata'),(16,'Sanyi');
/*!40000 ALTER TABLE `sofor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utazas`
--

DROP TABLE IF EXISTS `utazas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utazas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` date NOT NULL,
  `celallomas` varchar(45) CHARACTER SET armscii8 NOT NULL,
  `sofor_id` int(10) NOT NULL,
  `busz_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `busz_id_idx` (`busz_id`),
  KEY `sofor_pk_idx` (`sofor_id`),
  CONSTRAINT `busz_pk` FOREIGN KEY (`busz_id`) REFERENCES `busz` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `sofor_pk` FOREIGN KEY (`sofor_id`) REFERENCES `sofor` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utazas`
--

LOCK TABLES `utazas` WRITE;
/*!40000 ALTER TABLE `utazas` DISABLE KEYS */;
INSERT INTO `utazas` VALUES (15,'2017-05-13','Budapest',13,36),(16,'2017-06-13','Tatabanya',14,37),(17,'2017-07-13','Szeged',15,38),(18,'2017-08-13','Fehervar',13,36);
/*!40000 ALTER TABLE `utazas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-31 13:50:57
