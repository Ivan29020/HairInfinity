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
-- Table structure for table `prodotti`
--

DROP TABLE IF EXISTS `prodotti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodotti` (
  `id_prodotto` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descrizione` text,
  `prezzo` decimal(10,2) NOT NULL,
  `nome_categoria_fk` varchar(100) NOT NULL,
  `id_fornitore_fk` int NOT NULL,
  PRIMARY KEY (`id_prodotto`),
  KEY `fk_prodotto_categoria` (`nome_categoria_fk`),
  KEY `fk_prodotto_fornitore` (`id_fornitore_fk`),
  CONSTRAINT `fk_prodotto_categoria` FOREIGN KEY (`nome_categoria_fk`) REFERENCES `categorie` (`nome`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk_prodotto_fornitore` FOREIGN KEY (`id_fornitore_fk`) REFERENCES `fornitori` (`id_fornitore`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodotti`
--

LOCK TABLES `prodotti` WRITE;
/*!40000 ALTER TABLE `prodotti` DISABLE KEYS */;
INSERT INTO `prodotti` VALUES (1,'Crema Viso Idratante H24','Crema con acido ialuronico.',29.90,'Creme Viso',1),(2,'Olio Massaggio Lavanda Relax','Olio con essenza di lavanda.',15.50,'Oli da Massaggio',2),(3,'Smalto Semipermanente \"Rosso Passione\"','Colore intenso, durata 3 settimane.',19.90,'Prodotti Unghie',3),(4,'Cera Brasiliana Titanio Rosa','Cera delicata per pelli sensibili.',18.00,'Cere Epilatorie',1),(5,'Siero Contorno Occhi \"Luce Istantanea\"','Siero defaticante per borse e occhiaie.',25.00,'Creme Viso',1),(6,'Olio di Mandorle Dolci Puro 500ml','Olio vettore per massaggi.',22.00,'Oli da Massaggio',2),(7,'Kit Guanti in Nitrile (100 pz)','Guanti monouso senza lattice.',9.50,'Monouso',4),(8,'Protezione Solare SPF 50+','Protezione molto alta per viso e corpo.',24.00,'Solari',1);
/*!40000 ALTER TABLE `prodotti` ENABLE KEYS */;
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
