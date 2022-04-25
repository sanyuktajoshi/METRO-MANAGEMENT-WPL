-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: metro_station
-- ------------------------------------------------------
-- Server version	8.0.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `general`
--

DROP TABLE IF EXISTS `general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `general` (
  `AADHAR_NO` bigint NOT NULL,
  `F_NAME` varchar(10) NOT NULL,
  `L_NAME` varchar(10) NOT NULL,
  `AGE` int DEFAULT NULL,
  `GENDER` varchar(10) DEFAULT NULL,
  `ADDRESS` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`AADHAR_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general`
--

LOCK TABLES `general` WRITE;
/*!40000 ALTER TABLE `general` DISABLE KEYS */;
INSERT INTO `general` VALUES (123456789012,'Kavya','Bansal',19,'Female','New Panvel'),(234567890123,'Sanyukta','Joshi',20,'Female','Thane'),(345678901234,'Palak','Chopra',19,'Female','Vidyavihar'),(456789012345,'Rahi','Patil',20,'Female','Thane'),(567890123456,'Apurva','Rasal',19,'Female','Mulund');
/*!40000 ALTER TABLE `general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metro`
--

DROP TABLE IF EXISTS `metro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `metro` (
  `METRO_ID` int NOT NULL,
  `SOURCE` varchar(20) NOT NULL,
  `DESTINATION` varchar(20) NOT NULL,
  PRIMARY KEY (`METRO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metro`
--

LOCK TABLES `metro` WRITE;
/*!40000 ALTER TABLE `metro` DISABLE KEYS */;
INSERT INTO `metro` VALUES (100,'PANVEL','VIDYAVIHAR'),(101,'THANE','CST'),(102,'MULUND','KALYAN'),(103,'VASHI','VIDYAVIHAR'),(104,'POWAI','THANE');
/*!40000 ALTER TABLE `metro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seats`
--

DROP TABLE IF EXISTS `seats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seats` (
  `METRO_ID` int NOT NULL,
  `AVAILABLE` int NOT NULL,
  `RESERVED` int NOT NULL,
  PRIMARY KEY (`METRO_ID`),
  CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`METRO_ID`) REFERENCES `metro` (`METRO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seats`
--

LOCK TABLES `seats` WRITE;
/*!40000 ALTER TABLE `seats` DISABLE KEYS */;
INSERT INTO `seats` VALUES (100,300,100),(101,250,150),(102,300,100),(103,350,50),(104,300,100);
/*!40000 ALTER TABLE `seats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `smart_card`
--

DROP TABLE IF EXISTS `smart_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `smart_card` (
  `SMART_CARD_ID` int NOT NULL,
  `AADHAR_NO` bigint NOT NULL,
  `F_NAME` varchar(10) NOT NULL,
  `L_NAME` varchar(10) NOT NULL,
  `AGE` int DEFAULT NULL,
  `GENDER` varchar(10) DEFAULT NULL,
  `ADDRESS` varchar(20) DEFAULT NULL,
  `BALANCE` int NOT NULL,
  PRIMARY KEY (`SMART_CARD_ID`,`AADHAR_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smart_card`
--

LOCK TABLES `smart_card` WRITE;
/*!40000 ALTER TABLE `smart_card` DISABLE KEYS */;
INSERT INTO `smart_card` VALUES (101,192357484432,'Palak','Chopra',20,'Female','Vidyavihar',435),(102,192357484452,'Kavya','Bansal',20,'Female','Panvel',500),(103,202357484452,'Sanyukta','Joshi',21,'Female','Thane',550),(104,202357484454,'Parth','Roy',26,'Male','Mumbai',600),(105,202357497452,'Shaurya','Rana',24,'Male','Mulund',560);
/*!40000 ALTER TABLE `smart_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `travels_in`
--

DROP TABLE IF EXISTS `travels_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `travels_in` (
  `TICKET_ID` int NOT NULL,
  `AADHAR_NO` bigint DEFAULT NULL,
  `SMART_CARD_ID` int DEFAULT NULL,
  `METRO_ID` int NOT NULL,
  PRIMARY KEY (`TICKET_ID`),
  KEY `METRO_ID` (`METRO_ID`),
  CONSTRAINT `travels_in_ibfk_1` FOREIGN KEY (`METRO_ID`) REFERENCES `metro` (`METRO_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `travels_in`
--

LOCK TABLES `travels_in` WRITE;
/*!40000 ALTER TABLE `travels_in` DISABLE KEYS */;
INSERT INTO `travels_in` VALUES (1234,123456789012,NULL,100),(3456,192357484432,101,103),(5678,234567890123,NULL,101),(7890,202357497452,105,104),(9012,345678901234,NULL,102);
/*!40000 ALTER TABLE `travels_in` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-22 17:57:14
