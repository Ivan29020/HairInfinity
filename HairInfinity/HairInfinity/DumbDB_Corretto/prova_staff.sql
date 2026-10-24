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
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `id_staff` int NOT NULL AUTO_INCREMENT,
  `codice_fiscale_fk` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `ruolo` enum('Proprietario','Dipendente') NOT NULL COMMENT 'Ruolo fondamentale all''interno dell''azienda',
  `specializzazione` varchar(100) DEFAULT NULL COMMENT 'Mansione specifica del dipendente (es. Estetista, Massaggiatore)',
  PRIMARY KEY (`id_staff`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `uk_staff_codice_fiscale` (`codice_fiscale_fk`),
  CONSTRAINT `fk_staff_anagrafica` FOREIGN KEY (`codice_fiscale_fk`) REFERENCES `anagrafica` (`codice_fiscale`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'BRBFLV85M11H501M','flavia.barbi@staff.com','hash_pw_staff','Proprietario','Direttore Tecnico'),(2,'DNTLCA78N12H501N','luca.donati@staff.com','hash_pw_staff','Dipendente','Receptionist'),(3,'GTTMRC91P13H501P','marco.gatti@staff.com','hash_pw_staff','Dipendente','Estetista Senior'),(4,'LMBRRT93Q14H501Q','roberta.lombardi@staff.com','hash_pw_staff','Dipendente','Estetista Specializzata Viso'),(5,'SPSLRA89S15H501S','laura.esposito@staff.com','hash_pw_staff','Dipendente','Onicotecnica'),(6,'PALGIA80T16H501A','gianni.palmieri@staff.com','hash_pw_staff','Dipendente','Massaggiatore Olistico'),(7,'VTLCHR95U17H501B','chiara.vitali@staff.com','hash_pw_staff','Dipendente','Estetista'),(8,'FRNAND03V18H501C','andrea.franchi@staff.com','hash_pw_staff','Dipendente','Tirocinante');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
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
