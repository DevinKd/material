CREATE DATABASE  IF NOT EXISTS `materiel` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `materiel`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: materiel
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `action`
--

DROP TABLE IF EXISTS `action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `action` (
  `idaction` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`idaction`,`uuid`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`),
  UNIQUE KEY `idaction_UNIQUE` (`idaction`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action`
--

LOCK TABLES `action` WRITE;
/*!40000 ALTER TABLE `action` DISABLE KEYS */;
/*!40000 ALTER TABLE `action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finance`
--

DROP TABLE IF EXISTS `finance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `finance` (
  `idfinance` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  PRIMARY KEY (`idfinance`,`uuid`),
  UNIQUE KEY `idfinance_UNIQUE` (`idfinance`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finance`
--

LOCK TABLES `finance` WRITE;
/*!40000 ALTER TABLE `finance` DISABLE KEYS */;
/*!40000 ALTER TABLE `finance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `how`
--

DROP TABLE IF EXISTS `how`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `how` (
  `idhow` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  PRIMARY KEY (`idhow`,`uuid`),
  UNIQUE KEY `idhow_UNIQUE` (`idhow`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `how`
--

LOCK TABLES `how` WRITE;
/*!40000 ALTER TABLE `how` DISABLE KEYS */;
/*!40000 ALTER TABLE `how` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materiel` (
  `idmateriel` bigint NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Inbound time or input to database time  or timeline',
  `name` varchar(100) NOT NULL,
  `type` varchar(45) NOT NULL COMMENT 'Category',
  `barcode` varchar(45) NOT NULL COMMENT 'Bar code',
  `serial_number` varchar(45) NOT NULL,
  `part_number` varchar(45) NOT NULL,
  `date_code` varchar(45) NOT NULL,
  `inbound_quantity` double NOT NULL DEFAULT '0' COMMENT 'Inbound quantity',
  `cost_price` decimal(12,2) DEFAULT NULL COMMENT 'Cost price',
  `total_cost` decimal(20,2) DEFAULT NULL COMMENT 'total_cost = inbound_quantity *  cost_price',
  `price` decimal(12,2) DEFAULT NULL COMMENT 'Selling price or Current price  ',
  `manufacturer` varchar(450) DEFAULT NULL,
  `manufacture_date` datetime DEFAULT NULL COMMENT 'Production date ,Date of manufacture',
  `life_date` datetime DEFAULT NULL COMMENT 'Shelf life  or expiration data',
  `location` varchar(450) NOT NULL COMMENT 'where is location ',
  `owner` varchar(45) DEFAULT NULL COMMENT 'Who Owner',
  `from` varchar(45) DEFAULT NULL COMMENT 'owner or address ',
  `to` varchar(45) DEFAULT NULL COMMENT 'owner or address ',
  `how` varchar(45) DEFAULT NULL COMMENT 'how from to owner or Logistics tracking number',
  `who` varchar(45) DEFAULT NULL COMMENT 'who is recoder ',
  `what` varchar(450) DEFAULT NULL COMMENT 'What is the purpose of the material',
  `when` datetime DEFAULT NULL,
  `where` varchar(45) DEFAULT NULL,
  `why` varchar(45) DEFAULT NULL COMMENT 'point why database uuid',
  `action` varchar(45) DEFAULT NULL COMMENT 'buy sell  input output ',
  `country` varchar(45) DEFAULT NULL COMMENT 'The country where the material was produced',
  `url` varchar(450) DEFAULT NULL COMMENT 'site url',
  `status` varchar(45) NOT NULL COMMENT 'Stock Status',
  `remark` varchar(450) DEFAULT NULL,
  `priority` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`idmateriel`,`uuid`,`time`,`name`,`type`,`barcode`,`serial_number`,`part_number`,`date_code`,`priority`),
  UNIQUE KEY `idmateriel_UNIQUE` (`idmateriel`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materiel`
--

LOCK TABLES `materiel` WRITE;
/*!40000 ALTER TABLE `materiel` DISABLE KEYS */;
/*!40000 ALTER TABLE `materiel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `price` (
  `idprice` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  PRIMARY KEY (`idprice`,`uuid`),
  UNIQUE KEY `idprice_UNIQUE` (`idprice`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price`
--

LOCK TABLES `price` WRITE;
/*!40000 ALTER TABLE `price` DISABLE KEYS */;
/*!40000 ALTER TABLE `price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `idstatus` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idstatus`,`name`),
  UNIQUE KEY `idstatus_UNIQUE` (`idstatus`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type` (
  `idtype` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`idtype`,`uuid`),
  UNIQUE KEY `idtype_UNIQUE` (`idtype`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `url`
--

DROP TABLE IF EXISTS `url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `url` (
  `idurl` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `who` varchar(45) DEFAULT NULL COMMENT 'who create the link item .',
  `what` varchar(100) NOT NULL COMMENT 'what the link item information ?',
  `type` varchar(45) DEFAULT NULL,
  `url` varchar(200) NOT NULL COMMENT 'where the URL address',
  `logo` varchar(200) NOT NULL COMMENT 'where the URL logo path',
  `when` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'the link create time .',
  `status` varchar(45) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `priority` int NOT NULL DEFAULT '0',
  `where` varchar(45) NOT NULL DEFAULT 'china',
  PRIMARY KEY (`idurl`,`uuid`,`time`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`),
  UNIQUE KEY `idurl_UNIQUE` (`idurl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COMMENT='URL links .';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `url`
--

LOCK TABLES `url` WRITE;
/*!40000 ALTER TABLE `url` DISABLE KEYS */;
/*!40000 ALTER TABLE `url` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `what`
--

DROP TABLE IF EXISTS `what`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `what` (
  `idwhat` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  PRIMARY KEY (`idwhat`,`uuid`),
  UNIQUE KEY `idwhat_UNIQUE` (`idwhat`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `what`
--

LOCK TABLES `what` WRITE;
/*!40000 ALTER TABLE `what` DISABLE KEYS */;
/*!40000 ALTER TABLE `what` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `when`
--

DROP TABLE IF EXISTS `when`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `when` (
  `idwhen` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  PRIMARY KEY (`idwhen`,`uuid`),
  UNIQUE KEY `idwhen_UNIQUE` (`idwhen`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `when`
--

LOCK TABLES `when` WRITE;
/*!40000 ALTER TABLE `when` DISABLE KEYS */;
/*!40000 ALTER TABLE `when` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `where`
--

DROP TABLE IF EXISTS `where`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `where` (
  `idwhere` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  PRIMARY KEY (`idwhere`,`uuid`),
  UNIQUE KEY `idwhere_UNIQUE` (`idwhere`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `where`
--

LOCK TABLES `where` WRITE;
/*!40000 ALTER TABLE `where` DISABLE KEYS */;
/*!40000 ALTER TABLE `where` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `who`
--

DROP TABLE IF EXISTS `who`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `who` (
  `idwho` int NOT NULL AUTO_INCREMENT,
  `uuis` varchar(45) NOT NULL,
  PRIMARY KEY (`idwho`,`uuis`),
  UNIQUE KEY `idwho_UNIQUE` (`idwho`),
  UNIQUE KEY `uuis_UNIQUE` (`uuis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `who`
--

LOCK TABLES `who` WRITE;
/*!40000 ALTER TABLE `who` DISABLE KEYS */;
/*!40000 ALTER TABLE `who` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `why`
--

DROP TABLE IF EXISTS `why`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `why` (
  `idwhy` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  PRIMARY KEY (`idwhy`,`uuid`),
  UNIQUE KEY `idwhy_UNIQUE` (`idwhy`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `why`
--

LOCK TABLES `why` WRITE;
/*!40000 ALTER TABLE `why` DISABLE KEYS */;
/*!40000 ALTER TABLE `why` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-22 15:52:00
