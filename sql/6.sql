-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: 6
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

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
-- Table structure for table `al`
--

DROP TABLE IF EXISTS `al`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `al` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `塑膠` int(11) DEFAULT NULL,
  `鋁` int(11) DEFAULT NULL,
  `鋁擠` int(11) DEFAULT NULL,
  `髮絲` int(11) DEFAULT NULL,
  `衝壓` int(11) DEFAULT NULL,
  `埋射` int(11) DEFAULT NULL,
  `衝切` int(11) DEFAULT NULL,
  `研磨` int(11) DEFAULT NULL,
  `cnc` int(11) DEFAULT NULL,
  `噴砂` int(11) DEFAULT NULL,
  `陽極` int(11) DEFAULT NULL,
  `加工` int(11) DEFAULT NULL,
  `蝕刻` int(11) DEFAULT NULL,
  `雷雕` int(11) DEFAULT NULL,
  `印刷` int(11) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `塑膠` (`塑膠`),
  KEY `鋁` (`鋁`),
  KEY `鋁擠` (`鋁擠`),
  KEY `髮絲` (`髮絲`),
  KEY `衝壓` (`衝壓`),
  KEY `埋射` (`埋射`),
  KEY `衝切` (`衝切`),
  KEY `研磨` (`研磨`),
  KEY `cnc` (`cnc`),
  KEY `噴砂` (`噴砂`),
  KEY `陽極` (`陽極`),
  KEY `加工` (`加工`),
  KEY `蝕刻` (`蝕刻`),
  KEY `雷雕` (`雷雕`),
  KEY `印刷` (`印刷`),
  CONSTRAINT `al_ibfk_1` FOREIGN KEY (`塑膠`) REFERENCES `塑膠` (`id`),
  CONSTRAINT `al_ibfk_10` FOREIGN KEY (`噴砂`) REFERENCES `噴砂` (`id`),
  CONSTRAINT `al_ibfk_11` FOREIGN KEY (`陽極`) REFERENCES `陽極` (`id`),
  CONSTRAINT `al_ibfk_12` FOREIGN KEY (`加工`) REFERENCES `加工` (`id`),
  CONSTRAINT `al_ibfk_13` FOREIGN KEY (`蝕刻`) REFERENCES `蝕刻` (`id`),
  CONSTRAINT `al_ibfk_14` FOREIGN KEY (`雷雕`) REFERENCES `雷雕` (`id`),
  CONSTRAINT `al_ibfk_15` FOREIGN KEY (`印刷`) REFERENCES `印刷` (`id`),
  CONSTRAINT `al_ibfk_2` FOREIGN KEY (`鋁`) REFERENCES `鋁` (`id`),
  CONSTRAINT `al_ibfk_3` FOREIGN KEY (`鋁擠`) REFERENCES `鋁擠` (`id`),
  CONSTRAINT `al_ibfk_4` FOREIGN KEY (`髮絲`) REFERENCES `髮絲` (`id`),
  CONSTRAINT `al_ibfk_5` FOREIGN KEY (`衝壓`) REFERENCES `衝壓` (`id`),
  CONSTRAINT `al_ibfk_6` FOREIGN KEY (`埋射`) REFERENCES `埋射` (`id`),
  CONSTRAINT `al_ibfk_7` FOREIGN KEY (`衝切`) REFERENCES `衝切` (`id`),
  CONSTRAINT `al_ibfk_8` FOREIGN KEY (`研磨`) REFERENCES `研磨` (`id`),
  CONSTRAINT `al_ibfk_9` FOREIGN KEY (`cnc`) REFERENCES `cnc` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `al`
--

LOCK TABLES `al` WRITE;
/*!40000 ALTER TABLE `al` DISABLE KEYS */;
/*!40000 ALTER TABLE `al` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assembly`
--

DROP TABLE IF EXISTS `assembly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assembly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `膠` int(11) DEFAULT NULL,
  `點膠` int(11) DEFAULT NULL,
  `壓合` int(11) DEFAULT NULL,
  `熱熔` int(11) DEFAULT NULL,
  `組裝` int(11) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `膠` (`膠`),
  KEY `點膠` (`點膠`),
  KEY `壓合` (`壓合`),
  KEY `熱熔` (`熱熔`),
  KEY `組裝` (`組裝`),
  CONSTRAINT `assembly_ibfk_1` FOREIGN KEY (`膠`) REFERENCES `膠` (`id`),
  CONSTRAINT `assembly_ibfk_2` FOREIGN KEY (`點膠`) REFERENCES `點膠` (`id`),
  CONSTRAINT `assembly_ibfk_3` FOREIGN KEY (`壓合`) REFERENCES `壓合` (`id`),
  CONSTRAINT `assembly_ibfk_4` FOREIGN KEY (`熱熔`) REFERENCES `熱熔` (`id`),
  CONSTRAINT `assembly_ibfk_5` FOREIGN KEY (`組裝`) REFERENCES `組裝` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assembly`
--

LOCK TABLES `assembly` WRITE;
/*!40000 ALTER TABLE `assembly` DISABLE KEYS */;
/*!40000 ALTER TABLE `assembly` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(50) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch_content`
--

DROP TABLE IF EXISTS `branch_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_content` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `component_id` int(10) NOT NULL,
  `assembly_id` int(10) NOT NULL,
  `branch_id` int(10) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `component_id` (`component_id`),
  KEY `assembly_id` (`assembly_id`),
  KEY `branch_id` (`branch_id`),
  CONSTRAINT `branch_content_ibfk_1` FOREIGN KEY (`component_id`) REFERENCES `components` (`id`),
  CONSTRAINT `branch_content_ibfk_2` FOREIGN KEY (`assembly_id`) REFERENCES `assembly` (`id`),
  CONSTRAINT `branch_content_ibfk_3` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_content`
--

LOCK TABLES `branch_content` WRITE;
/*!40000 ALTER TABLE `branch_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `branch_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cnc`
--

DROP TABLE IF EXISTS `cnc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cnc` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `CNC工程種類` varchar(500) DEFAULT NULL,
  `CNC機台廠牌` varchar(300) DEFAULT NULL,
  `CNC機台型號` varchar(300) DEFAULT NULL,
  `CNC秒數` varchar(300) DEFAULT NULL,
  `CNC良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cnc`
--

LOCK TABLES `cnc` WRITE;
/*!40000 ALTER TABLE `cnc` DISABLE KEYS */;
INSERT INTO `cnc` VALUES (1,'參照設計',NULL,NULL,'秒',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `cnc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `components`
--

DROP TABLE IF EXISTS `components`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `components` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `material_id` int(10) DEFAULT NULL,
  `layer` varchar(50) DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `components`
--

LOCK TABLES `components` WRITE;
/*!40000 ALTER TABLE `components` DISABLE KEYS */;
INSERT INTO `components` VALUES (3,'P3','Plastic',3,'option','甚麼供應商grf;\'\'\'.\"//_ +=','33\';;;;\'\"','備註要寫啥?????@@@','2021-05-21 06:58:03'),(5,'p5','Plastic',5,'option','甚麼供應商grf;\'\'\'.\"//_ +=','33\';;;;\'\"','備註要寫啥?????@@@','2021-05-21 06:59:23'),(6,'mg1','MG',1,'basfsfgf\'\';;sdfaef','甚麼供應商','234342','DXVDVZFG','2021-05-24 02:14:52');
/*!40000 ALTER TABLE `components` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ed`
--

DROP TABLE IF EXISTS `ed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ed` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ED載具產出` varchar(300) DEFAULT NULL,
  `ED陽極線編號` varchar(300) DEFAULT NULL,
  `ED時數` varchar(300) DEFAULT NULL,
  `ED良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ed`
--

LOCK TABLES `ed` WRITE;
/*!40000 ALTER TABLE `ed` DISABLE KEYS */;
INSERT INTO `ed` VALUES (1,'件',NULL,'小時',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `ed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mg`
--

DROP TABLE IF EXISTS `mg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `塑膠` int(11) DEFAULT NULL,
  `鎂鋁` int(11) DEFAULT NULL,
  `漆` int(11) DEFAULT NULL,
  `冷鍛` int(11) DEFAULT NULL,
  `壓鑄` int(11) DEFAULT NULL,
  `埋射` int(11) DEFAULT NULL,
  `衝切` int(11) DEFAULT NULL,
  `研磨` int(11) DEFAULT NULL,
  `cnc` int(11) DEFAULT NULL,
  `皮膜` int(11) DEFAULT NULL,
  `塗裝` int(11) DEFAULT NULL,
  `加工` int(11) DEFAULT NULL,
  `雷雕` int(11) DEFAULT NULL,
  `印刷` int(11) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `塑膠` (`塑膠`),
  KEY `鎂鋁` (`鎂鋁`),
  KEY `漆` (`漆`),
  KEY `冷鍛` (`冷鍛`),
  KEY `壓鑄` (`壓鑄`),
  KEY `埋射` (`埋射`),
  KEY `衝切` (`衝切`),
  KEY `研磨` (`研磨`),
  KEY `cnc` (`cnc`),
  KEY `皮膜` (`皮膜`),
  KEY `塗裝` (`塗裝`),
  KEY `加工` (`加工`),
  KEY `雷雕` (`雷雕`),
  KEY `印刷` (`印刷`),
  CONSTRAINT `mg_ibfk_1` FOREIGN KEY (`塑膠`) REFERENCES `塑膠` (`id`),
  CONSTRAINT `mg_ibfk_10` FOREIGN KEY (`皮膜`) REFERENCES `皮膜` (`id`),
  CONSTRAINT `mg_ibfk_11` FOREIGN KEY (`塗裝`) REFERENCES `塗裝` (`id`),
  CONSTRAINT `mg_ibfk_12` FOREIGN KEY (`加工`) REFERENCES `加工` (`id`),
  CONSTRAINT `mg_ibfk_13` FOREIGN KEY (`雷雕`) REFERENCES `雷雕` (`id`),
  CONSTRAINT `mg_ibfk_14` FOREIGN KEY (`印刷`) REFERENCES `印刷` (`id`),
  CONSTRAINT `mg_ibfk_2` FOREIGN KEY (`鎂鋁`) REFERENCES `鎂鋁` (`id`),
  CONSTRAINT `mg_ibfk_3` FOREIGN KEY (`漆`) REFERENCES `漆` (`id`),
  CONSTRAINT `mg_ibfk_4` FOREIGN KEY (`冷鍛`) REFERENCES `冷鍛` (`id`),
  CONSTRAINT `mg_ibfk_5` FOREIGN KEY (`壓鑄`) REFERENCES `壓鑄` (`id`),
  CONSTRAINT `mg_ibfk_6` FOREIGN KEY (`埋射`) REFERENCES `埋射` (`id`),
  CONSTRAINT `mg_ibfk_7` FOREIGN KEY (`衝切`) REFERENCES `衝切` (`id`),
  CONSTRAINT `mg_ibfk_8` FOREIGN KEY (`研磨`) REFERENCES `研磨` (`id`),
  CONSTRAINT `mg_ibfk_9` FOREIGN KEY (`cnc`) REFERENCES `cnc` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mg`
--

LOCK TABLES `mg` WRITE;
/*!40000 ALTER TABLE `mg` DISABLE KEYS */;
INSERT INTO `mg` VALUES (1,NULL,NULL,NULL,2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-24 02:14:52');
/*!40000 ALTER TABLE `mg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nut`
--

DROP TABLE IF EXISTS `nut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nut` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Nut型號` varchar(500) DEFAULT NULL,
  `Nut品牌` varchar(300) DEFAULT NULL,
  `Nut用量` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nut`
--

LOCK TABLES `nut` WRITE;
/*!40000 ALTER TABLE `nut` DISABLE KEYS */;
INSERT INTO `nut` VALUES (1,NULL,NULL,'PC','2021-05-21 06:02:13');
/*!40000 ALTER TABLE `nut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plastic`
--

DROP TABLE IF EXISTS `plastic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plastic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `塑膠` int(11) DEFAULT NULL,
  `漆` int(11) DEFAULT NULL,
  `nut` int(11) DEFAULT NULL,
  `成型` int(11) DEFAULT NULL,
  `熱熔nut` int(11) DEFAULT NULL,
  `濺鍍` int(11) DEFAULT NULL,
  `cnc` int(11) DEFAULT NULL,
  `vm` int(11) DEFAULT NULL,
  `電鍍` int(11) DEFAULT NULL,
  `塗裝` int(11) DEFAULT NULL,
  `印刷` int(11) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `塑膠` (`塑膠`),
  KEY `漆` (`漆`),
  KEY `nut` (`nut`),
  KEY `成型` (`成型`),
  KEY `熱熔nut` (`熱熔nut`),
  KEY `濺鍍` (`濺鍍`),
  KEY `cnc` (`cnc`),
  KEY `vm` (`vm`),
  KEY `電鍍` (`電鍍`),
  KEY `塗裝` (`塗裝`),
  KEY `印刷` (`印刷`),
  CONSTRAINT `plastic_ibfk_1` FOREIGN KEY (`塑膠`) REFERENCES `塑膠` (`id`),
  CONSTRAINT `plastic_ibfk_10` FOREIGN KEY (`塗裝`) REFERENCES `塗裝` (`id`),
  CONSTRAINT `plastic_ibfk_11` FOREIGN KEY (`印刷`) REFERENCES `印刷` (`id`),
  CONSTRAINT `plastic_ibfk_2` FOREIGN KEY (`漆`) REFERENCES `漆` (`id`),
  CONSTRAINT `plastic_ibfk_3` FOREIGN KEY (`nut`) REFERENCES `nut` (`id`),
  CONSTRAINT `plastic_ibfk_4` FOREIGN KEY (`成型`) REFERENCES `成型` (`id`),
  CONSTRAINT `plastic_ibfk_5` FOREIGN KEY (`熱熔nut`) REFERENCES `熱熔nut` (`id`),
  CONSTRAINT `plastic_ibfk_6` FOREIGN KEY (`濺鍍`) REFERENCES `濺鍍` (`id`),
  CONSTRAINT `plastic_ibfk_7` FOREIGN KEY (`cnc`) REFERENCES `cnc` (`id`),
  CONSTRAINT `plastic_ibfk_8` FOREIGN KEY (`vm`) REFERENCES `vm` (`id`),
  CONSTRAINT `plastic_ibfk_9` FOREIGN KEY (`電鍍`) REFERENCES `電鍍` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plastic`
--

LOCK TABLES `plastic` WRITE;
/*!40000 ALTER TABLE `plastic` DISABLE KEYS */;
INSERT INTO `plastic` VALUES (3,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-21 06:58:03'),(5,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-05-21 06:59:23');
/*!40000 ALTER TABLE `plastic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `root`
--

DROP TABLE IF EXISTS `root`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `root` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `root_name` varchar(50) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `root`
--

LOCK TABLES `root` WRITE;
/*!40000 ALTER TABLE `root` DISABLE KEYS */;
/*!40000 ALTER TABLE `root` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `root_content`
--

DROP TABLE IF EXISTS `root_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `root_content` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(50) DEFAULT NULL,
  `table_id` int(10) NOT NULL,
  `root_id` int(10) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `root_id` (`root_id`),
  CONSTRAINT `root_content_ibfk_1` FOREIGN KEY (`root_id`) REFERENCES `root` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `root_content`
--

LOCK TABLES `root_content` WRITE;
/*!40000 ALTER TABLE `root_content` DISABLE KEYS */;
/*!40000 ALTER TABLE `root_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sheet_metal`
--

DROP TABLE IF EXISTS `sheet_metal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sheet_metal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `鐵件` int(11) DEFAULT NULL,
  `漆` int(11) DEFAULT NULL,
  `nut` int(11) DEFAULT NULL,
  `銅柱` int(11) DEFAULT NULL,
  `衝壓` int(11) DEFAULT NULL,
  `cnc` int(11) DEFAULT NULL,
  `ed` int(11) DEFAULT NULL,
  `塗裝` int(11) DEFAULT NULL,
  `加工` int(11) DEFAULT NULL,
  `蝕刻` int(11) DEFAULT NULL,
  `雷雕` int(11) DEFAULT NULL,
  `印刷` int(11) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `鐵件` (`鐵件`),
  KEY `漆` (`漆`),
  KEY `nut` (`nut`),
  KEY `銅柱` (`銅柱`),
  KEY `衝壓` (`衝壓`),
  KEY `cnc` (`cnc`),
  KEY `ed` (`ed`),
  KEY `塗裝` (`塗裝`),
  KEY `加工` (`加工`),
  KEY `蝕刻` (`蝕刻`),
  KEY `雷雕` (`雷雕`),
  KEY `印刷` (`印刷`),
  CONSTRAINT `sheet_metal_ibfk_1` FOREIGN KEY (`鐵件`) REFERENCES `鐵件` (`id`),
  CONSTRAINT `sheet_metal_ibfk_10` FOREIGN KEY (`蝕刻`) REFERENCES `蝕刻` (`id`),
  CONSTRAINT `sheet_metal_ibfk_11` FOREIGN KEY (`雷雕`) REFERENCES `雷雕` (`id`),
  CONSTRAINT `sheet_metal_ibfk_12` FOREIGN KEY (`印刷`) REFERENCES `印刷` (`id`),
  CONSTRAINT `sheet_metal_ibfk_2` FOREIGN KEY (`漆`) REFERENCES `漆` (`id`),
  CONSTRAINT `sheet_metal_ibfk_3` FOREIGN KEY (`nut`) REFERENCES `nut` (`id`),
  CONSTRAINT `sheet_metal_ibfk_4` FOREIGN KEY (`銅柱`) REFERENCES `銅柱` (`id`),
  CONSTRAINT `sheet_metal_ibfk_5` FOREIGN KEY (`衝壓`) REFERENCES `衝壓` (`id`),
  CONSTRAINT `sheet_metal_ibfk_6` FOREIGN KEY (`cnc`) REFERENCES `cnc` (`id`),
  CONSTRAINT `sheet_metal_ibfk_7` FOREIGN KEY (`ed`) REFERENCES `ed` (`id`),
  CONSTRAINT `sheet_metal_ibfk_8` FOREIGN KEY (`塗裝`) REFERENCES `塗裝` (`id`),
  CONSTRAINT `sheet_metal_ibfk_9` FOREIGN KEY (`加工`) REFERENCES `加工` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sheet_metal`
--

LOCK TABLES `sheet_metal` WRITE;
/*!40000 ALTER TABLE `sheet_metal` DISABLE KEYS */;
/*!40000 ALTER TABLE `sheet_metal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vm`
--

DROP TABLE IF EXISTS `vm`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vm` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `VM載具產出` varchar(300) DEFAULT NULL,
  `VM陽極線編號` varchar(300) DEFAULT NULL,
  `VM時數` varchar(300) DEFAULT NULL,
  `VM良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vm`
--

LOCK TABLES `vm` WRITE;
/*!40000 ALTER TABLE `vm` DISABLE KEYS */;
INSERT INTO `vm` VALUES (1,'件',NULL,'小時',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `vm` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `冷鍛`
--

DROP TABLE IF EXISTS `冷鍛`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `冷鍛` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `冷鍛工程種類` varchar(500) DEFAULT NULL,
  `冷鍛機台廠牌` varchar(300) DEFAULT NULL,
  `冷鍛機台型號或噸數` varchar(300) DEFAULT NULL,
  `冷鍛工段` varchar(300) DEFAULT NULL,
  `冷鍛良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `冷鍛`
--

LOCK TABLES `冷鍛` WRITE;
/*!40000 ALTER TABLE `冷鍛` DISABLE KEYS */;
INSERT INTO `冷鍛` VALUES (1,'參照設計',NULL,NULL,'工段數量',NULL,'2021-05-21 06:02:13'),(2,'dds','冷鍛機台廠牌','冷鍛機台型號或噸數','ㄈㄏㄏ','55^^&&&&','2021-05-24 02:14:52');
/*!40000 ALTER TABLE `冷鍛` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `加工`
--

DROP TABLE IF EXISTS `加工`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `加工` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `加工項目` varchar(500) DEFAULT NULL,
  `加工秒數` varchar(300) DEFAULT NULL,
  `加工良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `加工`
--

LOCK TABLES `加工` WRITE;
/*!40000 ALTER TABLE `加工` DISABLE KEYS */;
INSERT INTO `加工` VALUES (1,'件',NULL,NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `加工` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `印刷`
--

DROP TABLE IF EXISTS `印刷`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `印刷` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `印刷項目` varchar(500) DEFAULT NULL,
  `印刷機台廠牌` varchar(300) DEFAULT NULL,
  `印刷機台型號` varchar(300) DEFAULT NULL,
  `印刷數量` varchar(300) DEFAULT NULL,
  `印刷良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `印刷`
--

LOCK TABLES `印刷` WRITE;
/*!40000 ALTER TABLE `印刷` DISABLE KEYS */;
INSERT INTO `印刷` VALUES (1,'參照設計',NULL,NULL,NULL,NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `印刷` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `噴砂`
--

DROP TABLE IF EXISTS `噴砂`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `噴砂` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `噴砂工程種類` varchar(500) DEFAULT NULL,
  `噴砂用砂型號` varchar(300) DEFAULT NULL,
  `噴砂機台廠牌` varchar(300) DEFAULT NULL,
  `噴砂機台型號` varchar(300) DEFAULT NULL,
  `噴砂秒數` varchar(300) DEFAULT NULL,
  `噴砂良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `噴砂`
--

LOCK TABLES `噴砂` WRITE;
/*!40000 ALTER TABLE `噴砂` DISABLE KEYS */;
INSERT INTO `噴砂` VALUES (1,NULL,'參照設計',NULL,NULL,'參照設計',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `噴砂` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `埋射`
--

DROP TABLE IF EXISTS `埋射`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `埋射` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `埋射塑件名稱` varchar(500) DEFAULT NULL,
  `埋射成型種類` varchar(300) DEFAULT NULL,
  `埋射機台廠牌或種類` varchar(300) DEFAULT NULL,
  `埋射機台型號或噸數` varchar(300) DEFAULT NULL,
  `埋射模具穴數` varchar(300) DEFAULT NULL,
  `埋射秒數` varchar(300) DEFAULT NULL,
  `埋射良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `埋射`
--

LOCK TABLES `埋射` WRITE;
/*!40000 ALTER TABLE `埋射` DISABLE KEYS */;
INSERT INTO `埋射` VALUES (1,NULL,'RHCM/HTM/後段噴漆/一般咬花/特殊咬花',NULL,NULL,'一模幾穴','秒',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `埋射` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `塑膠`
--

DROP TABLE IF EXISTS `塑膠`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `塑膠` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `塑料名稱1` varchar(500) DEFAULT NULL,
  `重量1` varchar(300) DEFAULT NULL,
  `塑料名稱2` varchar(500) DEFAULT NULL,
  `重量2` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `塑膠`
--

LOCK TABLES `塑膠` WRITE;
/*!40000 ALTER TABLE `塑膠` DISABLE KEYS */;
INSERT INTO `塑膠` VALUES (1,NULL,'克(含料頭)',NULL,'克(含料頭)','2021-05-21 06:02:13'),(4,'plastic22','2g','plastic2','3 g','2021-05-21 06:58:03'),(6,'plastic22','2g','plastic2','3 g','2021-05-21 06:59:23');
/*!40000 ALTER TABLE `塑膠` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `塗裝`
--

DROP TABLE IF EXISTS `塗裝`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `塗裝` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `塗裝工程名稱` varchar(500) DEFAULT NULL,
  `塗裝載具產出` varchar(300) DEFAULT NULL,
  `塗裝線種類` varchar(300) DEFAULT NULL,
  `塗裝線編號` varchar(300) DEFAULT NULL,
  `塗裝秒數` varchar(300) DEFAULT NULL,
  `塗裝良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `塗裝`
--

LOCK TABLES `塗裝` WRITE;
/*!40000 ALTER TABLE `塗裝` DISABLE KEYS */;
INSERT INTO `塗裝` VALUES (1,'參照設計','件',NULL,NULL,'秒',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `塗裝` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `壓合`
--

DROP TABLE IF EXISTS `壓合`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `壓合` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `壓合子件名稱` varchar(3000) DEFAULT NULL,
  `壓合機台廠牌` varchar(300) DEFAULT NULL,
  `壓合機台型號` varchar(300) DEFAULT NULL,
  `壓合秒數` varchar(500) DEFAULT NULL,
  `壓合良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `壓合`
--

LOCK TABLES `壓合` WRITE;
/*!40000 ALTER TABLE `壓合` DISABLE KEYS */;
INSERT INTO `壓合` VALUES (1,NULL,NULL,NULL,'參照設計',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `壓合` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `壓合子件id`
--

DROP TABLE IF EXISTS `壓合子件id`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `壓合子件id` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tables` varchar(50) DEFAULT NULL,
  `壓合id` int(10) DEFAULT NULL,
  `子件id` int(10) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `壓合id` (`壓合id`),
  CONSTRAINT `壓合子件id_ibfk_1` FOREIGN KEY (`壓合id`) REFERENCES `壓合` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `壓合子件id`
--

LOCK TABLES `壓合子件id` WRITE;
/*!40000 ALTER TABLE `壓合子件id` DISABLE KEYS */;
/*!40000 ALTER TABLE `壓合子件id` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `壓鑄`
--

DROP TABLE IF EXISTS `壓鑄`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `壓鑄` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `壓鑄模具穴數` varchar(500) DEFAULT NULL,
  `壓鑄機台廠牌` varchar(300) DEFAULT NULL,
  `壓鑄機台型號` varchar(300) DEFAULT NULL,
  `壓鑄秒數` varchar(300) DEFAULT NULL,
  `壓鑄良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `壓鑄`
--

LOCK TABLES `壓鑄` WRITE;
/*!40000 ALTER TABLE `壓鑄` DISABLE KEYS */;
INSERT INTO `壓鑄` VALUES (1,'一模幾穴',NULL,NULL,'秒',NULL,'2021-05-21 06:02:13'),(2,'4','台廠牌','台型號','3s','0','2021-05-24 02:14:52');
/*!40000 ALTER TABLE `壓鑄` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `成型`
--

DROP TABLE IF EXISTS `成型`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `成型` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `成型_成型種類` varchar(500) DEFAULT NULL,
  `成型機台廠牌或種類` varchar(300) DEFAULT NULL,
  `成型機台型號或噸數` varchar(300) DEFAULT NULL,
  `成型模具穴數` varchar(300) DEFAULT NULL,
  `成型秒數` varchar(300) DEFAULT NULL,
  `成型良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `成型`
--

LOCK TABLES `成型` WRITE;
/*!40000 ALTER TABLE `成型` DISABLE KEYS */;
INSERT INTO `成型` VALUES (1,'RHCM/HTM/後段噴漆/一般咬花/特殊咬花',NULL,NULL,'一模幾穴','秒',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `成型` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `漆`
--

DROP TABLE IF EXISTS `漆`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `漆` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `主漆料型號` varchar(500) DEFAULT NULL,
  `主漆料品牌` varchar(300) DEFAULT NULL,
  `主漆料比例` varchar(300) DEFAULT NULL,
  `硬化劑型號` varchar(500) DEFAULT NULL,
  `硬化劑品牌` varchar(300) DEFAULT NULL,
  `硬化劑比例` varchar(300) DEFAULT NULL,
  `稀釋劑型號` varchar(500) DEFAULT NULL,
  `稀釋劑品牌` varchar(300) DEFAULT NULL,
  `稀釋劑比例` varchar(300) DEFAULT NULL,
  `塗裝件數` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `漆`
--

LOCK TABLES `漆` WRITE;
/*!40000 ALTER TABLE `漆` DISABLE KEYS */;
INSERT INTO `漆` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'片/KG','2021-05-21 06:02:13');
/*!40000 ALTER TABLE `漆` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `濺鍍`
--

DROP TABLE IF EXISTS `濺鍍`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `濺鍍` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `濺鍍良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `濺鍍`
--

LOCK TABLES `濺鍍` WRITE;
/*!40000 ALTER TABLE `濺鍍` DISABLE KEYS */;
INSERT INTO `濺鍍` VALUES (1,'百分比','2021-05-21 06:02:13');
/*!40000 ALTER TABLE `濺鍍` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `熱熔`
--

DROP TABLE IF EXISTS `熱熔`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `熱熔` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `熱熔子件名稱` varchar(3000) DEFAULT NULL,
  `熱熔機台廠牌` varchar(300) DEFAULT NULL,
  `熱熔機台型號` varchar(300) DEFAULT NULL,
  `熱熔秒數` varchar(500) DEFAULT NULL,
  `熱熔良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `熱熔`
--

LOCK TABLES `熱熔` WRITE;
/*!40000 ALTER TABLE `熱熔` DISABLE KEYS */;
INSERT INTO `熱熔` VALUES (1,NULL,NULL,NULL,'參照設計',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `熱熔` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `熱熔nut`
--

DROP TABLE IF EXISTS `熱熔nut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `熱熔nut` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `熱熔Nut秒數` varchar(300) DEFAULT NULL,
  `熱熔Nut良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `熱熔nut`
--

LOCK TABLES `熱熔nut` WRITE;
/*!40000 ALTER TABLE `熱熔nut` DISABLE KEYS */;
INSERT INTO `熱熔nut` VALUES (1,'秒',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `熱熔nut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `熱熔子件id`
--

DROP TABLE IF EXISTS `熱熔子件id`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `熱熔子件id` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tables` varchar(50) DEFAULT NULL,
  `熱熔id` int(10) DEFAULT NULL,
  `子件id` int(10) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `熱熔id` (`熱熔id`),
  CONSTRAINT `熱熔子件id_ibfk_1` FOREIGN KEY (`熱熔id`) REFERENCES `熱熔` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `熱熔子件id`
--

LOCK TABLES `熱熔子件id` WRITE;
/*!40000 ALTER TABLE `熱熔子件id` DISABLE KEYS */;
/*!40000 ALTER TABLE `熱熔子件id` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `皮膜`
--

DROP TABLE IF EXISTS `皮膜`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `皮膜` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `皮膜載具產出` varchar(300) DEFAULT NULL,
  `皮膜陽極線編號` varchar(300) DEFAULT NULL,
  `皮膜時數` varchar(300) DEFAULT NULL,
  `皮膜良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `皮膜`
--

LOCK TABLES `皮膜` WRITE;
/*!40000 ALTER TABLE `皮膜` DISABLE KEYS */;
INSERT INTO `皮膜` VALUES (1,'件',NULL,'小時',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `皮膜` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `研磨`
--

DROP TABLE IF EXISTS `研磨`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `研磨` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `研磨工程種類` varchar(500) DEFAULT NULL,
  `研磨機台廠牌` varchar(300) DEFAULT NULL,
  `研磨機台型號` varchar(300) DEFAULT NULL,
  `研磨秒數` varchar(300) DEFAULT NULL,
  `研磨良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `研磨`
--

LOCK TABLES `研磨` WRITE;
/*!40000 ALTER TABLE `研磨` DISABLE KEYS */;
INSERT INTO `研磨` VALUES (1,'人工/汽動…',NULL,NULL,'秒',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `研磨` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `組裝`
--

DROP TABLE IF EXISTS `組裝`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `組裝` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `組裝件種類` varchar(500) DEFAULT NULL,
  `組裝數量` varchar(300) DEFAULT NULL,
  `組裝秒數` varchar(300) DEFAULT NULL,
  `組裝良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `組裝`
--

LOCK TABLES `組裝` WRITE;
/*!40000 ALTER TABLE `組裝` DISABLE KEYS */;
INSERT INTO `組裝` VALUES (1,'參照設計','數量','秒數',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `組裝` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `膠`
--

DROP TABLE IF EXISTS `膠`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `膠` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `用膠型號` varchar(500) DEFAULT NULL,
  `膠品牌` varchar(300) DEFAULT NULL,
  `膠用量` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `膠`
--

LOCK TABLES `膠` WRITE;
/*!40000 ALTER TABLE `膠` DISABLE KEYS */;
INSERT INTO `膠` VALUES (1,NULL,NULL,'ml/pc','2021-05-21 06:02:13');
/*!40000 ALTER TABLE `膠` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `蝕刻`
--

DROP TABLE IF EXISTS `蝕刻`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `蝕刻` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `蝕刻載具產出` varchar(300) DEFAULT NULL,
  `蝕刻線編號` varchar(300) DEFAULT NULL,
  `蝕刻時數` varchar(300) DEFAULT NULL,
  `蝕刻良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `蝕刻`
--

LOCK TABLES `蝕刻` WRITE;
/*!40000 ALTER TABLE `蝕刻` DISABLE KEYS */;
INSERT INTO `蝕刻` VALUES (1,'件',NULL,'小時',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `蝕刻` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `衝切`
--

DROP TABLE IF EXISTS `衝切`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `衝切` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `衝切工程種類` varchar(500) DEFAULT NULL,
  `衝切機台廠牌` varchar(300) DEFAULT NULL,
  `衝切機台型號或噸數` varchar(300) DEFAULT NULL,
  `衝切非連續模工段` varchar(300) DEFAULT NULL,
  `衝切良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `衝切`
--

LOCK TABLES `衝切` WRITE;
/*!40000 ALTER TABLE `衝切` DISABLE KEYS */;
INSERT INTO `衝切` VALUES (1,'參照設計',NULL,NULL,'工段數量',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `衝切` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `衝壓`
--

DROP TABLE IF EXISTS `衝壓`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `衝壓` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `衝壓工程種類` varchar(500) DEFAULT NULL,
  `衝壓機台廠牌` varchar(300) DEFAULT NULL,
  `衝壓機台型號或噸數` varchar(300) DEFAULT NULL,
  `衝壓連續模工段` varchar(300) DEFAULT NULL,
  `衝壓非連續模工段` varchar(300) DEFAULT NULL,
  `衝壓良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `衝壓`
--

LOCK TABLES `衝壓` WRITE;
/*!40000 ALTER TABLE `衝壓` DISABLE KEYS */;
INSERT INTO `衝壓` VALUES (1,'參照設計',NULL,NULL,'工段數量','工段數量',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `衝壓` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `銅柱`
--

DROP TABLE IF EXISTS `銅柱`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `銅柱` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `銅柱型號` varchar(500) DEFAULT NULL,
  `銅柱品牌` varchar(300) DEFAULT NULL,
  `銅柱用量` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `銅柱`
--

LOCK TABLES `銅柱` WRITE;
/*!40000 ALTER TABLE `銅柱` DISABLE KEYS */;
INSERT INTO `銅柱` VALUES (1,NULL,NULL,'PC','2021-05-21 06:02:13');
/*!40000 ALTER TABLE `銅柱` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `鋁`
--

DROP TABLE IF EXISTS `鋁`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `鋁` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `鋁長` varchar(300) DEFAULT NULL,
  `鋁寬` varchar(300) DEFAULT NULL,
  `鋁厚` varchar(300) DEFAULT NULL,
  `鋁金屬名稱` varchar(500) DEFAULT NULL,
  `鋁比重` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `鋁`
--

LOCK TABLES `鋁` WRITE;
/*!40000 ALTER TABLE `鋁` DISABLE KEYS */;
INSERT INTO `鋁` VALUES (1,'下料尺寸mm','下料尺寸mm','下料尺寸mm',NULL,NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `鋁` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `鋁擠`
--

DROP TABLE IF EXISTS `鋁擠`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `鋁擠` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `鋁擠工程種類` varchar(500) DEFAULT NULL,
  `鋁擠線種類` varchar(500) DEFAULT NULL,
  `鋁擠線編號` varchar(300) DEFAULT NULL,
  `鋁擠秒數` varchar(300) DEFAULT NULL,
  `鋁擠良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `鋁擠`
--

LOCK TABLES `鋁擠` WRITE;
/*!40000 ALTER TABLE `鋁擠` DISABLE KEYS */;
INSERT INTO `鋁擠` VALUES (1,'參照設計',NULL,NULL,NULL,NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `鋁擠` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `鎂鋁`
--

DROP TABLE IF EXISTS `鎂鋁`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `鎂鋁` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `鎂鋁金屬名稱` varchar(500) DEFAULT NULL,
  `鎂鋁重量` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `鎂鋁`
--

LOCK TABLES `鎂鋁` WRITE;
/*!40000 ALTER TABLE `鎂鋁` DISABLE KEYS */;
INSERT INTO `鎂鋁` VALUES (1,NULL,'克(含料頭)','2021-05-21 06:02:13');
/*!40000 ALTER TABLE `鎂鋁` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `鐵件`
--

DROP TABLE IF EXISTS `鐵件`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `鐵件` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `鐵件長` varchar(300) DEFAULT NULL,
  `鐵件寬` varchar(300) DEFAULT NULL,
  `鐵件厚` varchar(300) DEFAULT NULL,
  `鐵件金屬名稱` varchar(500) DEFAULT NULL,
  `鐵件比重` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `鐵件`
--

LOCK TABLES `鐵件` WRITE;
/*!40000 ALTER TABLE `鐵件` DISABLE KEYS */;
INSERT INTO `鐵件` VALUES (1,'下料尺寸mm','下料尺寸mm','下料尺寸mm',NULL,NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `鐵件` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `陽極`
--

DROP TABLE IF EXISTS `陽極`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `陽極` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `陽極載具產出` varchar(300) DEFAULT NULL,
  `陽極線編號` varchar(300) DEFAULT NULL,
  `陽極時數` varchar(300) DEFAULT NULL,
  `陽極良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `陽極`
--

LOCK TABLES `陽極` WRITE;
/*!40000 ALTER TABLE `陽極` DISABLE KEYS */;
INSERT INTO `陽極` VALUES (1,'件',NULL,'小時',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `陽極` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `雷雕`
--

DROP TABLE IF EXISTS `雷雕`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `雷雕` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `雷雕工程種類` varchar(500) DEFAULT NULL,
  `雷雕機台廠牌` varchar(300) DEFAULT NULL,
  `雷雕機台型號` varchar(300) DEFAULT NULL,
  `雷雕秒數` varchar(300) DEFAULT NULL,
  `雷雕良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `雷雕`
--

LOCK TABLES `雷雕` WRITE;
/*!40000 ALTER TABLE `雷雕` DISABLE KEYS */;
INSERT INTO `雷雕` VALUES (1,'參照設計',NULL,NULL,'參照設計',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `雷雕` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `電鍍`
--

DROP TABLE IF EXISTS `電鍍`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `電鍍` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `電鍍載具產出` varchar(300) DEFAULT NULL,
  `電鍍陽極線編號` varchar(300) DEFAULT NULL,
  `電鍍時數` varchar(300) DEFAULT NULL,
  `電鍍良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `電鍍`
--

LOCK TABLES `電鍍` WRITE;
/*!40000 ALTER TABLE `電鍍` DISABLE KEYS */;
INSERT INTO `電鍍` VALUES (1,'件',NULL,'小時',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `電鍍` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `髮絲`
--

DROP TABLE IF EXISTS `髮絲`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `髮絲` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `髮絲工程種類` varchar(500) DEFAULT NULL,
  `髮絲機台廠牌` varchar(300) DEFAULT NULL,
  `髮絲機台型號` varchar(300) DEFAULT NULL,
  `髮絲秒數` varchar(300) DEFAULT NULL,
  `髮絲良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `髮絲`
--

LOCK TABLES `髮絲` WRITE;
/*!40000 ALTER TABLE `髮絲` DISABLE KEYS */;
INSERT INTO `髮絲` VALUES (1,'參照設計',NULL,NULL,'參照設計',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `髮絲` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `點膠`
--

DROP TABLE IF EXISTS `點膠`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `點膠` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `點膠工程項目` varchar(500) DEFAULT NULL,
  `點膠機台廠牌` varchar(300) DEFAULT NULL,
  `點膠機台型號` varchar(300) DEFAULT NULL,
  `點膠秒數` varchar(300) DEFAULT NULL,
  `點膠良率` varchar(300) DEFAULT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `點膠`
--

LOCK TABLES `點膠` WRITE;
/*!40000 ALTER TABLE `點膠` DISABLE KEYS */;
INSERT INTO `點膠` VALUES (1,'參照設計',NULL,NULL,'參照設計',NULL,'2021-05-21 06:02:13');
/*!40000 ALTER TABLE `點膠` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-26 11:25:01
