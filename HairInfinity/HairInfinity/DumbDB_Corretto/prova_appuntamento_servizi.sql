-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: prova
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appuntamento_servizi`
--

DROP TABLE IF EXISTS `appuntamento_servizi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appuntamento_servizi` (
  `id_appuntamento_fk` int NOT NULL,
  `id_servizio_fk` int NOT NULL,
  PRIMARY KEY (`id_appuntamento_fk`,`id_servizio_fk`),
  KEY `fk_as_servizio` (`id_servizio_fk`),
  CONSTRAINT `fk_as_appuntamento` FOREIGN KEY (`id_appuntamento_fk`) REFERENCES `appuntamenti` (`id_appuntamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_as_servizio` FOREIGN KEY (`id_servizio_fk`) REFERENCES `servizi` (`id_servizio`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appuntamento_servizi`
--

LOCK TABLES `appuntamento_servizi` WRITE;
/*!40000 ALTER TABLE `appuntamento_servizi` DISABLE KEYS */;
INSERT INTO `appuntamento_servizi` VALUES (4,1),(9,1),(17,1),(28,1),(35,1),(44,1),(53,1),(2,2),(15,2),(23,2),(30,2),(36,2),(42,2),(48,2),(54,2),(3,3),(10,3),(16,3),(25,3),(31,3),(38,3),(43,3),(50,3),(54,3),(18,4),(37,4),(8,5),(21,5),(34,5),(1,6),(13,6),(24,6),(30,6),(41,6),(49,6),(6,7),(20,7),(32,7),(47,7),(55,7),(7,8),(19,8),(29,8),(40,8),(45,8),(52,8),(12,9),(33,9),(5,10),(10,10),(27,10),(46,10);
/*!40000 ALTER TABLE `appuntamento_servizi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-29 14:45:35
