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
-- Table structure for table `recensioni`
--

DROP TABLE IF EXISTS `recensioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recensioni` (
  `id_recensione` int NOT NULL AUTO_INCREMENT,
  `id_appuntamento_fk` int NOT NULL,
  `valutazione` tinyint NOT NULL,
  `descrizione` text,
  `data_creazione` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_recensione`),
  UNIQUE KEY `uk_recensione_appuntamento` (`id_appuntamento_fk`),
  CONSTRAINT `fk_recensione_appuntamento` FOREIGN KEY (`id_appuntamento_fk`) REFERENCES `appuntamenti` (`id_appuntamento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recensioni`
--

LOCK TABLES `recensioni` WRITE;
/*!40000 ALTER TABLE `recensioni` DISABLE KEYS */;
INSERT INTO `recensioni` VALUES (1,2,5,'Pulizia viso fantastica con Roberta, molto professionale.','2024-01-13 09:00:00'),(2,3,4,'Manicure ben fatta, ma il colore scelto era quasi finito.','2024-01-19 08:30:00'),(3,6,5,'Hot stone massage è un\'esperienza celestiale. Gianni ha le mani d\'oro.','2024-02-06 10:00:00'),(4,8,4,'Trattamento laser efficace, Marco è veloce e competente.','2024-02-16 18:00:00'),(5,11,5,'Pacchetto super rilassante, vale ogni centesimo. Consigliatissimo!','2024-03-05 13:00:00'),(6,14,5,'Promo molto conveniente, Chiara è stata bravissima!','2024-03-23 17:00:00'),(7,17,3,'Massaggio ok, ma la sala era un po\' fredda.','2024-04-11 07:00:00'),(8,20,5,'Davvero un massaggio spettacolare, sono uscito rinato.','2024-04-27 08:00:00'),(9,22,5,'Ho regalato il pacchetto a mia moglie, era felicissima! Grazie a Laura per la gentilezza.','2024-05-09 10:00:00'),(10,26,4,'Ottimo pacchetto, mi sono rilassato. La prossima volta proverò il massaggio hot stone.','2024-06-06 13:00:00'),(11,29,5,'Roberta è la migliore per i trattamenti viso, senza dubbio.','2024-06-27 09:00:00'),(12,30,4,'Buoni entrambi i trattamenti, ma c\'è stata un po\' di attesa tra uno e l\'altro.','2024-07-04 08:00:00'),(13,32,5,'Non delude mai. Il top.','2024-07-18 12:00:00'),(14,37,4,'Pedicure curativo molto efficace, Marco sa il fatto suo.','2024-08-22 16:00:00'),(15,39,5,'Regalo di compleanno perfetto. Sono stati tutti gentilissimi.','2024-09-05 11:00:00'),(16,42,4,'Solita pulizia viso, sempre un buon servizio.','2024-09-26 14:00:00');
/*!40000 ALTER TABLE `recensioni` ENABLE KEYS */;
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
