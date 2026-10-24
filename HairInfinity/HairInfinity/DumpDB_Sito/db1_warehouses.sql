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
-- Table structure for table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `warehouses` (
  `warehouse_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`warehouse_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouses`
--

LOCK TABLES `warehouses` WRITE;
/*!40000 ALTER TABLE `warehouses` DISABLE KEYS */;
INSERT INTO `warehouses` VALUES (1,'Lockman-Tillman','Cupiditate ipsam at qui saepe.','7045 Micaela Key Suite 616\nNew Norris, MD 92775-3534',382,'2025-01-08 08:41:04','2025-01-08 08:41:04'),(2,'Franecki-Heaney','Et repellendus veritatis dolorum ab officia eum.','3709 Cummings Well Suite 888\nLake Josh, WI 77669-6478',416,'2025-01-08 08:41:04','2025-01-08 08:41:04'),(3,'Considine Group','Aut aut dolor deserunt delectus dolorem saepe voluptas non.','8072 Myron Island\nSouth Jacquelyn, NJ 76866-8356',385,'2025-01-08 08:41:06','2025-01-08 08:41:06'),(4,'Grady-Bartell','Voluptatibus rem dignissimos numquam quod voluptates perspiciatis quasi.','6683 Graham Parkway\nNew Desireechester, MI 92934-1156',124,'2025-01-08 08:41:06','2025-01-08 08:41:06'),(5,'White Ltd','Neque porro dignissimos nam doloremque expedita sunt ipsum.','903 Ezekiel Terrace Suite 074\nNew Fannie, CT 75052-0053',63,'2025-01-08 08:41:07','2025-01-08 08:41:07'),(6,'Stroman, Brown and Bechtelar','Dolores aspernatur rerum possimus sequi delectus deserunt.','83800 Christa Turnpike Suite 572\nHermistonmouth, CA 57521-9424',363,'2025-01-08 08:41:07','2025-01-08 08:41:07'),(7,'Beahan PLC','Magni consequatur cumque molestiae ut.','705 August Turnpike\nPort Chauncey, HI 06561',150,'2025-01-08 11:22:11','2025-01-08 11:22:11'),(8,'Nitzsche-Conroy','Ipsa exercitationem fugit voluptatibus est eaque ut cupiditate.','3562 Lauren Branch\nTyrellmouth, OR 60829-1030',291,'2025-01-08 11:22:11','2025-01-08 11:22:11');
/*!40000 ALTER TABLE `warehouses` ENABLE KEYS */;
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
