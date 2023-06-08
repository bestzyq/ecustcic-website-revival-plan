-- MySQL dump 10.13  Distrib 5.7.40, for Linux (x86_64)
--
-- Host: localhost    Database: cic
-- ------------------------------------------------------
-- Server version	5.7.40-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `fix`
--

DROP TABLE IF EXISTS `fix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `building` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `brandtype` varchar(255) NOT NULL,
  `system` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `note` text,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL,
  `check` varchar(10) DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fix`
--

LOCK TABLES `fix` WRITE;
/*!40000 ALTER TABLE `fix` DISABLE KEYS */;
INSERT INTO `fix` VALUES (1,'111','111','111','111','111','1111','111','1111111','2001:da8:8007:4011:8870:7126:29d5:1029',1685753855,'no'),(2,'123','123','','123','123','','123','123','2001:da8:8007:1629:18dc:76d8:ca0c:d5e8',1686233316,'no'),(3,'123','1234','123','123','123','123','123','123','172.19.134.89',20230608,'yes'),(4,'123','1234','123','123','123','123','123','123','172.19.134.89',20230608,'yes'),(5,'1','2','3','4','5','6','7','8','172.19.134.89',20230608,'yes'),(6,'1','2','3','4','5','6','7','89','172.19.134.89',20230608,'yes'),(7,'123','123','123','123','123','123','123','123','172.19.134.89',20230608,'yes'),(8,'1','2','3','4','5','6','7','89','2001:da8:8007:1629:18dc:76d8:ca0c:d5e8',1686237773,'yes'),(9,'123','123','123','123','123','123','123','123','2001:da8:8007:1629:18dc:76d8:ca0c:d5e8',1686238772,'yes'),(10,'123','123','12','12','12','12','12','12','2001:da8:8007:1629:18dc:76d8:ca0c:d5e8',1686238788,'yes');
/*!40000 ALTER TABLE `fix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'cic'
--

--
-- Dumping routines for database 'cic'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-08 16:27:04
