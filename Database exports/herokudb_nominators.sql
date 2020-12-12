-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: us-cdbr-east-02.cleardb.com    Database: heroku_10d0d80b7c8f4b3
-- ------------------------------------------------------
-- Server version	5.5.62-log

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
-- Table structure for table `nominators_tbl`
--

DROP TABLE IF EXISTS `nominators_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nominators_tbl` (
  `nominator_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `nominee_id` int(11) NOT NULL,
  `nominee_class_id` int(11) NOT NULL,
  `nominator_type` varchar(128) NOT NULL,
  `position_id` int(11) NOT NULL,
  PRIMARY KEY (`nominator_id`),
  KEY `student_id` (`student_id`),
  KEY `nominee_id` (`nominee_id`),
  KEY `nominee_class` (`nominee_class_id`),
  KEY `position_id` (`position_id`),
  CONSTRAINT `nominators_tbl_ibfk_1` FOREIGN KEY (`nominee_class_id`) REFERENCES `classes_tbl` (`class_id`),
  CONSTRAINT `nominators_tbl_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users_tbl` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nominators_tbl_ibfk_3` FOREIGN KEY (`nominee_id`) REFERENCES `users_tbl` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `nominators_tbl_ibfk_4` FOREIGN KEY (`position_id`) REFERENCES `positions_tbl` (`position_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=341 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nominators_tbl`
--

LOCK TABLES `nominators_tbl` WRITE;
/*!40000 ALTER TABLE `nominators_tbl` DISABLE KEYS */;
INSERT INTO `nominators_tbl` VALUES (1,13,13,14,'proposer',8),(2,13,7,15,'seconder',2),(3,11,15,10,'proposer',7),(4,5,16,19,'proposer',7),(5,30,117,13,'seconder',3),(6,53,123,16,'proposer',5),(7,117,103,17,'proposer',6),(8,6,122,16,'seconder',8),(12,6,107,15,'proposer',2),(13,66,64,3,'proposer',8),(14,23,65,3,'seconder',7),(15,23,34,2,'proposer',8),(16,126,53,14,'seconder',4),(17,123,53,14,'seconder',4),(18,122,53,14,'proposer',4),(19,114,53,14,'proposer',4),(20,124,53,14,'seconder',4),(21,119,117,13,'seconder',3),(22,125,117,13,'proposer',3),(23,121,117,13,'proposer',3),(25,118,117,13,'seconder',3),(26,112,117,13,'seconder',3),(27,35,34,2,'seconder',8),(28,2,34,2,'seconder',8),(29,29,122,16,'proposer',8),(30,29,117,13,'seconder',3),(31,63,23,2,'proposer',7),(32,3,67,11,'proposer',7),(33,4,46,17,'proposer',2),(34,4,30,14,'proposer',3),(35,4,123,16,'proposer',5),(36,4,53,14,'seconder',4),(37,4,51,14,'proposer',7),(38,43,46,17,'proposer',2),(39,43,30,14,'seconder',3),(40,43,123,16,'seconder',5),(41,43,53,14,'seconder',4),(42,43,51,14,'proposer',7),(43,44,46,17,'seconder',2),(44,44,30,14,'proposer',3),(45,44,123,16,'seconder',5),(46,44,51,14,'seconder',7),(47,45,46,17,'seconder',2),(48,45,30,14,'seconder',3),(49,45,123,16,'seconder',5),(50,45,51,14,'seconder',7),(51,46,46,17,'seconder',2),(52,46,30,14,'seconder',3),(53,46,123,16,'seconder',5),(54,46,51,14,'seconder',7),(55,102,46,17,'seconder',2),(56,102,30,14,'seconder',3),(57,102,123,16,'seconder',5),(58,102,51,14,'seconder',7),(59,103,46,17,'seconder',2),(60,103,30,14,'seconder',3),(61,103,51,14,'seconder',7),(62,2,23,2,'proposer',7),(63,68,67,11,'seconder',7),(71,49,47,15,'proposer',8),(81,17,65,3,'proposer',7),(91,129,65,3,'proposer',7),(101,33,23,2,'seconder',7),(111,10,23,2,'seconder',7),(121,9,23,2,'seconder',7),(131,42,42,5,'proposer',8),(141,65,64,3,'seconder',8),(151,14,64,3,'seconder',8),(161,119,119,15,'seconder',8),(171,37,23,2,'seconder',7),(181,60,128,12,'proposer',8),(191,61,128,12,'seconder',8),(201,28,128,12,'seconder',8),(211,36,38,4,'proposer',8),(221,129,38,4,'seconder',8),(231,17,38,4,'seconder',8),(241,63,132,3,'proposer',8),(251,64,132,3,'seconder',8),(261,130,42,5,'seconder',8),(271,40,42,5,'seconder',8),(281,19,140,20,'proposer',7),(291,90,140,20,'proposer',7),(301,31,140,20,'seconder',7),(311,93,140,20,'seconder',7),(321,99,140,20,'seconder',7),(331,22,140,20,'seconder',7);
/*!40000 ALTER TABLE `nominators_tbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-12 10:28:17
