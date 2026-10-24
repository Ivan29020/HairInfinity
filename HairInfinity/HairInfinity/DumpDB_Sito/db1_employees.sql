-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: db1
-- ------------------------------------------------------
-- Server version	8.0.37

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
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `employee_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `tax_code` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int DEFAULT '0',
  `salary` decimal(10,2) NOT NULL,
  `gender` enum('M','F') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_hire` date DEFAULT '2025-01-10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `employees_email_unique` (`email`),
  UNIQUE KEY `employees_tax_code_unique` (`tax_code`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'prova@example.com','prova','prova','prova','$2y$12$CosebhXpBGPDCHv0WG0.se/eyEEbfXTdo1gtu6lp5yeC7aPNv5gdG','1990-01-01','TAXCOD1234567890',36,3000.51,'M','2023-01-01','2025-01-08 08:40:50','2025-01-09 15:15:53',NULL),(2,'Dario.Capellone@example.org','Dario','Capellone','Capellone','$2y$12$phRQwotnH8qF7/vCFHmDx.KqIDANtMGtuo9MLX/Bfu/QzKx0bhDEq','1977-08-15','DARCAP01A01A111A',47,1400.00,'M','1987-05-16','2025-01-08 08:41:04','2025-01-23 12:11:02',NULL),(22,'Carlo.Pastello@example.org','Carlo','Pastello','Pastello','$2y$12$k3TB3Dw0F8EUN0QfqvtcZueBYmMcFGIgVrfKgPmr8a4Bay7xGIJcG','1988-05-20','CARPAS01F01F111Q',0,1400.00,'M','2025-01-10','2025-01-23 12:08:32','2025-01-23 12:14:42',NULL),(23,'Antonio.Splendente@example.org','Antonio','Splendente','Splendente','$2y$12$CI4WCJdttL09sdsu3Sv.Oes98xaQmqVZHKnyt/8ekSddM1P29/JcC','1977-12-19','ANTSPL01A01A111A',0,1600.00,'M','2025-01-10','2025-01-23 12:13:56','2025-01-23 12:13:56',NULL),(24,'Giovanni.Lametta@example.org','Giovanni','Lametta','Lametta','$2y$12$8Ht43Wr/JX/.NTAWQ2VObeT7Wv9srGDtI0kt5s5VTMWKH/GHBWZOa','2000-01-25','GIOLAM01A01A111A',0,1500.00,'M','2025-01-10','2025-01-23 12:18:54','2025-01-23 12:18:54',NULL);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-23 14:31:54
