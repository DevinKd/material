CREATE DATABASE  IF NOT EXISTS `request` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `request`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: request
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
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request` (
  `idrequest` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `who` varchar(45) NOT NULL COMMENT 'Who are the demanders',
  `what` varchar(450) NOT NULL COMMENT 'what request',
  `why` varchar(450) DEFAULT NULL COMMENT 'why is the demand generation reason',
  `where` varchar(450) NOT NULL COMMENT 'Address of the request',
  `when` datetime NOT NULL COMMENT 'Requirement realization time',
  `start` datetime NOT NULL COMMENT 'Start time',
  `end` datetime NOT NULL COMMENT 'Deadline',
  `how` varchar(450) DEFAULT NULL COMMENT 'How to implement requirements',
  `type` varchar(45) NOT NULL COMMENT 'Categorization of requirements',
  `amount` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total` double DEFAULT NULL COMMENT 'The total amount',
  `description` text,
  `remark` text,
  `image` varchar(450) DEFAULT NULL COMMENT 'The image URL of the requirement',
  `audio` varchar(450) DEFAULT NULL COMMENT 'The audio URL of the requirement',
  `video` varchar(450) DEFAULT NULL COMMENT 'The video URL of the requirement',
  `file` varchar(450) DEFAULT NULL COMMENT 'The path to the requirements file',
  `url` varchar(450) DEFAULT NULL COMMENT 'Requirement URL path',
  `status` varchar(45) NOT NULL DEFAULT 'init' COMMENT 'check in,init,ongoing,unsuccessful,succeed,finish,timeout',
  `author` varchar(45) DEFAULT NULL COMMENT 'Requirements Author',
  PRIMARY KEY (`idrequest`,`uuid`,`time`),
  UNIQUE KEY `idrequest_UNIQUE` (`idrequest`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='request';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request`
--

LOCK TABLES `request` WRITE;
/*!40000 ALTER TABLE `request` DISABLE KEYS */;
/*!40000 ALTER TABLE `request` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-30 17:01:22
