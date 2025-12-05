-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: techsolutions
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `components`
--

DROP TABLE IF EXISTS `components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `components` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `components`
--

LOCK TABLES `components` WRITE;
/*!40000 ALTER TABLE `components` DISABLE KEYS */;
INSERT INTO `components` VALUES (1,'INTEL CORE I9-11900K',NULL),(2,'Intel Core i7',NULL),(3,'Intel Core Ultra 9',NULL),(4,'AMD Ryzen 9 7900X',NULL),(5,'Intel Core i5-13400',NULL),(6,'NVIDIA GeForce RTX™ 5090',NULL),(7,'RTX 5080',NULL),(8,'RTX 5070',NULL),(9,'AMD Radeon Pro WX 3200 4 GB GDDR5',NULL),(10,'Asus GeForce GT1030 2G BRK',NULL),(11,'MSI MPG B550',NULL),(12,'MSI MPG B550',NULL),(13,'MSI PRO B840-P WIFI ATX',NULL),(14,'MSI MAG X870 TOMAHAWK',NULL),(15,'MSI MAG A850GL PCIE5 – 850W',NULL),(16,'Corsair RM850e',NULL),(17,'CORSAIR CX750 ATX 750W',NULL),(18,'Corsair RMe Series RM1000e',NULL),(19,'be quiet! PURE POWER 12',NULL),(20,'KingSpec 1To 2.5',NULL),(21,'VERBATIM Vi560 S3 M.2 SSD ',NULL),(22,'Samsung SSD Interne 990 EVO Plus, NVMe 2.0',NULL),(23,'Fractal Design Pop Silent Solid',NULL),(24,'Fractal Design Focus 2 RGB',NULL),(25,'Fractal Design Focus 2 Black TG Clear Tint',NULL),(26,'be quiet! Pure Rock Slim 2',NULL),(27,'be quiet! Pure Rock Pro 3 LX',NULL),(28,'be Quiet Dark Rock PRO TR4',NULL),(29,'Écran Dell 24 Plus – S2425HSM',NULL),(30,'Msi PRO MP242A E2',NULL),(31,'MSI MAG 242C',NULL),(32,'Samsung 27\" LED – S27D390GAU',NULL),(33,'K250 Compact Bluetooth',NULL),(34,'Clavier filaire HP Pavilion 300',NULL),(35,'Corsair K55 Core RGB',NULL),(36,'Souris filaire Logitech B100',NULL),(37,'acer Souris Filaire USB',NULL),(38,' Logitech G305 Souris Gamer sans Fil',NULL),(39,' Hp Silent 280M Souris',NULL),(40,'Belkin Micro Casque USB-C, Bluetooth et Jack',NULL),(41,'Casque gaming HS35 SURROUND v2',NULL),(42,'Casque gaming HS35 SURROUND v2',NULL),(43,'Plantronics EncorePro HW520 Digital',NULL),(44,'Logitech Brio 100 Full HD',NULL),(45,'Logitech - Webcam Brio 505',NULL),(46,'Webcam Ultra HD Pro Business BriO',NULL),(47,' AMD Ryzen 7 7800X3D',NULL),(48,'ASUS TUF B650',NULL),(49,'32 Go DDR5 6000 MHz (2×16 Go)',NULL),(50,'NVIDIA RTX 4060 8 Go ',NULL),(51,'Samsung SSD 990 Pro NVMe',NULL),(52,'Fractal Design Pop Silent',NULL),(53,'be quiet! Pure Rock Pro 3 LX ',NULL),(54,'Kingston FURY Beast Noir DDR5 32Go (2x16Go)',NULL),(55,'Kingston Technology FURY Beast RGB',NULL),(56,'G.Skill Trident Z5 Neo DDR5‑6000',NULL);
/*!40000 ALTER TABLE `components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pc_components`
--

DROP TABLE IF EXISTS `pc_components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pc_components` (
  `pc_id` int(10) unsigned NOT NULL,
  `component_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pc_id`,`component_id`),
  KEY `component_id` (`component_id`),
  CONSTRAINT `pc_components_ibfk_1` FOREIGN KEY (`pc_id`) REFERENCES `pcs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pc_components_ibfk_2` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pc_components`
--

LOCK TABLES `pc_components` WRITE;
/*!40000 ALTER TABLE `pc_components` DISABLE KEYS */;
INSERT INTO `pc_components` VALUES (1,5),(1,10),(1,13),(1,17),(1,22),(1,23),(1,26),(1,30),(1,34),(1,36),(1,54),(2,19),(2,28),(2,31),(2,47),(2,48),(2,49),(2,50),(2,51),(2,52),(2,55),(3,4),(3,8),(3,14),(3,18),(3,22),(3,23),(3,32),(3,35),(3,38),(3,53),(3,56),(4,5),(4,9),(4,13),(4,17),(4,22),(4,23),(4,26),(4,29),(4,33),(4,38),(4,55),(5,5),(5,8),(5,14),(5,15),(5,22),(5,23),(5,27),(5,29),(5,35),(5,38),(5,56),(6,5),(6,10),(6,13),(6,17),(6,21),(6,23),(6,26),(6,30),(6,34),(6,36),(6,55),(7,2),(7,9),(7,13),(7,16),(7,22),(7,25),(7,27),(7,32),(7,33),(7,38),(7,46),(7,54);
/*!40000 ALTER TABLE `pc_components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pcs`
--

DROP TABLE IF EXISTS `pcs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pcs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pcs`
--

LOCK TABLES `pcs` WRITE;
/*!40000 ALTER TABLE `pcs` DISABLE KEYS */;
INSERT INTO `pcs` VALUES (1,'PC bureautique','https://m.media-amazon.com/images/I/61CXTQSZQiL.jpg',399.00),(2,'PC développeur','https://m.media-amazon.com/images/I/71vqBRAbofL.jpg',899.00),(3,'PC designer','https://faratech.fr/wp-content/uploads/2020/11/cd78120c-7124-43b6-a917-7869faa86881.jpg',1299.00),(4,'PC maketing/vente','https://media.rueducommerce.fr/r500/mktp/product/productImage/7/185/ad02503ab9e64cc1899dc136e3cdb9fc.webp',560.00),(5,'PC gestion des infrastructures','https://img.vevorstatic.com/fr%2FDNJXZT120MMAXBJ08001V9%2Fgoods_img_big-v1%2Fcomputer-case-m100-1.2.jpg?timestamp=1745301602000&format=webp&format=webp',0.00),(6,'PC service client','https://luigiservices.com/wp-content/uploads/2023/10/PC-TOUR-1-2048x2048.png',0.00),(7,'PC direction','https://media.materiel.net/nbo/matnet/buying-guide-page/boitier-pc/index/boitier-config.jpg',0.00);
/*!40000 ALTER TABLE `pcs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-12-05  9:20:45
