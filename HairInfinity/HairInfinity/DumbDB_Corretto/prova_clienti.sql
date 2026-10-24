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
-- Table structure for table `clienti`
--

DROP TABLE IF EXISTS `clienti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clienti` (
  `id_cliente` int NOT NULL AUTO_INCREMENT,
  `codice_fiscale_fk` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `uk_cliente_codice_fiscale` (`codice_fiscale_fk`),
  CONSTRAINT `fk_cliente_anagrafica` FOREIGN KEY (`codice_fiscale_fk`) REFERENCES `anagrafica` (`codice_fiscale`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienti`
--

LOCK TABLES `clienti` WRITE;
/*!40000 ALTER TABLE `clienti` DISABLE KEYS */;
INSERT INTO `clienti` VALUES (1,'RSSMRA80A01H501A','mario.rossi@email.com','hash_pw'),(2,'BNCGPP75B02H501B','giuseppe.bianchi@email.com','hash_pw'),(3,'VRDLGI85C03H501C','luigi.verdi@email.com','hash_pw'),(4,'GLLGNA90D04H501D','anna.gialli@email.com','hash_pw'),(5,'RMNLRA92E05H501E','laura.romani@email.com','hash_pw'),(6,'FSTPQL88F06H501F','paola.festa@email.com','hash_pw'),(7,'MNTFNC70G07H501G','francesco.monti@email.com','hash_pw'),(8,'CSTFNC82H08H501H','francesca.costa@email.com','hash_pw'),(9,'GRGPLA95I09H501I','paolo.greco@email.com','hash_pw'),(10,'MLLSRA98L10H501L','sara.melli@email.com','hash_pw'),(11,'FERELN01A45H501Z','elena.ferrari@email.com','hash_pw'),(12,'RICCAR65B21H501Y','carlo.ricci@email.com','hash_pw'),(13,'MARVAL99C62H501X','valentina.marino@email.com','hash_pw'),(14,'CONSIM87D15H501W','simone.conti@email.com','hash_pw'),(15,'GALLUC79E55H501V','lucia.gallo@email.com','hash_pw'),(16,'LONFAB94F12H501U','fabio.longo@email.com','hash_pw'),(17,'BRUALE02G41H501T','alessia.bruno@email.com','hash_pw'),(18,'RIZMAT81H18H501S','matteo.rizzo@email.com','hash_pw'),(19,'MORELI96I29H501R','elisa.moretti@email.com','hash_pw'),(20,'BARROB72J03H501Q','roberto.barbieri@email.com','hash_pw');
/*!40000 ALTER TABLE `clienti` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-29 14:45:36
