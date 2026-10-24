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
-- Table structure for table `appuntamenti`
--

DROP TABLE IF EXISTS `appuntamenti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appuntamenti` (
  `id_appuntamento` int NOT NULL AUTO_INCREMENT,
  `data_ora` datetime NOT NULL,
  `descrizione` text,
  `costo_totale` decimal(10,2) DEFAULT NULL,
  `id_cliente_fk` int NOT NULL,
  `id_staff_inserisce_fk` int NOT NULL,
  `id_staff_assegnato_fk` int NOT NULL,
  `id_sala_fk` int NOT NULL,
  PRIMARY KEY (`id_appuntamento`),
  KEY `fk_appuntamento_cliente` (`id_cliente_fk`),
  KEY `fk_appuntamento_staff_inserisce` (`id_staff_inserisce_fk`),
  KEY `fk_appuntamento_staff_assegnato` (`id_staff_assegnato_fk`),
  KEY `fk_appuntamento_sala` (`id_sala_fk`),
  CONSTRAINT `fk_appuntamento_cliente` FOREIGN KEY (`id_cliente_fk`) REFERENCES `clienti` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_appuntamento_sala` FOREIGN KEY (`id_sala_fk`) REFERENCES `sale` (`id_sala`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_appuntamento_staff_assegnato` FOREIGN KEY (`id_staff_assegnato_fk`) REFERENCES `staff` (`id_staff`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_appuntamento_staff_inserisce` FOREIGN KEY (`id_staff_inserisce_fk`) REFERENCES `staff` (`id_staff`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appuntamenti`
--

LOCK TABLES `appuntamenti` WRITE;
/*!40000 ALTER TABLE `appuntamenti` DISABLE KEYS */;
INSERT INTO `appuntamenti` VALUES (1,'2024-01-10 10:00:00','Massaggio schiena',35.00,1,2,6,1),(2,'2024-01-12 15:30:00','Pulizia Viso',45.00,2,2,4,2),(3,'2024-01-18 11:00:00','Manicure Semipermanente',35.00,3,2,5,3),(4,'2024-01-25 17:00:00','Massaggio Rilassante',50.00,4,1,6,1),(5,'2024-01-29 14:00:00','Pedicure Estetico',35.00,5,2,8,3),(6,'2024-02-05 16:00:00','Hot Stone Massage',70.00,6,2,6,4),(7,'2024-02-09 09:30:00','Trattamento Viso Anti-Age',65.00,7,2,4,2),(8,'2024-02-15 18:00:00','Epilazione Laser',60.00,8,1,3,5),(9,'2024-02-21 12:00:00','Sconto compleanno - Massaggio Rilassante',40.00,2,2,6,1),(10,'2024-02-28 10:00:00','Manicure e Pedicure Estetico',70.00,10,2,5,3),(11,'2024-03-04 11:30:00','Pacchetto Relax Totale',75.00,11,2,6,1),(12,'2024-03-08 17:00:00','Laminazione Ciglia',50.00,12,2,7,6),(13,'2024-03-14 14:00:00','Massaggio schiena',35.00,13,2,3,1),(14,'2024-03-22 16:00:00','Promo Primavera',65.00,14,2,7,6),(15,'2024-03-27 10:30:00','Pulizia Viso',45.00,15,2,4,2),(16,'2024-04-03 15:00:00','Manicure Semipermanente',35.00,1,2,5,3),(17,'2024-04-10 12:00:00','Massaggio Rilassante',50.00,16,1,6,1),(18,'2024-04-16 09:00:00','Pedicure Curativo',40.00,17,2,3,6),(19,'2024-04-19 11:00:00','Sconto compleanno - Trattamento Viso',52.00,12,2,4,2),(20,'2024-04-26 17:30:00','Hot Stone Massage',70.00,18,2,6,4),(21,'2024-05-02 14:00:00','Epilazione Laser',60.00,19,1,3,5),(22,'2024-05-08 10:00:00','Speciale Festa della Mamma',80.00,20,2,5,3),(23,'2024-05-15 16:00:00','Pulizia Viso',45.00,2,2,4,2),(24,'2024-05-22 11:30:00','Massaggio schiena',35.00,3,2,6,1),(25,'2024-05-29 18:00:00','Manicure Semipermanente',35.00,4,2,5,3),(26,'2024-06-05 10:00:00','Pacchetto Relax Totale',75.00,5,2,6,1),(27,'2024-06-12 14:30:00','Pedicure Estetico',35.00,6,2,8,3),(28,'2024-06-19 17:00:00','Massaggio Rilassante',50.00,7,1,6,1),(29,'2024-06-26 09:30:00','Trattamento Viso Anti-Age',65.00,8,2,4,2),(30,'2024-07-03 11:00:00','Pulizia Viso e Massaggio Schiena',80.00,9,2,4,2),(31,'2024-07-10 16:00:00','Manicure Semipermanente',35.00,10,2,5,3),(32,'2024-07-17 10:00:00','Hot Stone Massage',70.00,11,1,6,4),(33,'2024-07-24 15:00:00','Laminazione Ciglia',50.00,12,2,7,6),(34,'2024-07-31 18:00:00','Epilazione Laser',60.00,13,1,3,5),(35,'2024-08-07 12:00:00','Massaggio Rilassante',50.00,14,2,6,1),(36,'2024-08-14 10:30:00','Pulizia Viso',45.00,15,2,4,2),(37,'2024-08-21 17:00:00','Pedicure Curativo',40.00,16,2,3,6),(38,'2024-08-28 14:00:00','Manicure Semipermanente',35.00,17,2,5,3),(39,'2024-09-04 11:00:00','Pacchetto Relax Totale',75.00,18,2,6,1),(40,'2024-09-11 16:30:00','Trattamento Viso Anti-Age',65.00,19,2,4,2),(41,'2024-09-18 10:00:00','Massaggio schiena',35.00,20,1,6,1),(42,'2024-09-25 15:00:00','Pulizia Viso',45.00,1,2,4,2),(43,'2024-10-02 10:00:00','Manicure Semipermanente',35.00,2,2,5,3),(44,'2024-10-09 14:00:00','Massaggio Rilassante',50.00,3,2,6,1),(45,'2024-10-16 11:30:00','Trattamento Viso Anti-Age',65.00,4,2,4,2),(46,'2024-10-23 17:00:00','Pedicure Estetico',35.00,5,2,7,3),(47,'2024-10-30 10:00:00','Hot Stone Massage',70.00,6,1,6,4),(48,'2024-11-06 15:00:00','Pulizia Viso',45.00,7,2,4,2),(49,'2024-11-13 12:00:00','Massaggio schiena',35.00,8,2,3,1),(50,'2024-11-20 10:00:00','Manicure Semipermanente',35.00,9,2,5,3),(51,'2024-11-27 16:00:00','Pacchetto Relax Totale',75.00,10,2,6,1),(52,'2024-12-04 11:00:00','Trattamento Viso Anti-Age',65.00,11,2,4,2),(53,'2024-12-11 14:30:00','Massaggio Rilassante',50.00,12,1,6,1),(54,'2024-12-18 10:00:00','Pulizia Viso e Manicure',80.00,13,2,4,2),(55,'2024-12-27 17:00:00','Hot Stone Massage',70.00,14,2,6,4);
/*!40000 ALTER TABLE `appuntamenti` ENABLE KEYS */;
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
