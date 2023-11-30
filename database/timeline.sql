CREATE DATABASE  IF NOT EXISTS `timeline` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `timeline`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: timeline
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
-- Table structure for table `timeline`
--

DROP TABLE IF EXISTS `timeline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `timeline` (
  `idtimeline` int NOT NULL AUTO_INCREMENT,
  `uuid` varchar(45) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uuid_what` varchar(45) NOT NULL COMMENT 'for link other database uuid ',
  `who` varchar(45) NOT NULL COMMENT 'Who are the timeline',
  `what` varchar(450) NOT NULL COMMENT 'what timeline',
  `why` varchar(450) DEFAULT NULL COMMENT 'why is the timeline generation reason',
  `where` varchar(450) NOT NULL COMMENT 'Address of the timeline',
  `when` datetime NOT NULL COMMENT 'Requirement realization time',
  `start` datetime NOT NULL COMMENT 'Start time',
  `end` datetime NOT NULL COMMENT 'Deadline',
  `how` varchar(450) DEFAULT NULL COMMENT 'How to implement timelines',
  `type` varchar(45) NOT NULL COMMENT 'Categorization of timelines',
  `amount` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `total` double DEFAULT NULL COMMENT 'The total amount',
  `description` text,
  `remark` text,
  `image` varchar(450) DEFAULT NULL COMMENT 'The image URL of the timeline',
  `audio` varchar(450) DEFAULT NULL COMMENT 'The audio URL of the timeline',
  `video` varchar(450) DEFAULT NULL COMMENT 'The video URL of the timeline',
  `file` varchar(450) DEFAULT NULL COMMENT 'The path to the timelines file',
  `url` varchar(450) DEFAULT NULL COMMENT 'Requirement URL path',
  `status` varchar(45) NOT NULL DEFAULT 'init' COMMENT 'check in,init,ongoing,unsuccessful,succeed,finish,timeout',
  `author` varchar(45) DEFAULT NULL COMMENT 'Requirements Author',
  PRIMARY KEY (`idtimeline`,`uuid`,`time`,`uuid_what`),
  UNIQUE KEY `idtimeline_UNIQUE` (`idtimeline`),
  UNIQUE KEY `uuid_UNIQUE` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='timeline';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timeline`
--

LOCK TABLES `timeline` WRITE;
/*!40000 ALTER TABLE `timeline` DISABLE KEYS */;
/*!40000 ALTER TABLE `timeline` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-30 17:19:03
