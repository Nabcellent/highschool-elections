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
-- Table structure for table `classes_tbl`
--

DROP TABLE IF EXISTS `classes_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `classes_tbl` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_number` int(2) NOT NULL,
  `stream_name` varchar(10) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes_tbl`
--

LOCK TABLES `classes_tbl` WRITE;
/*!40000 ALTER TABLE `classes_tbl` DISABLE KEYS */;
INSERT INTO `classes_tbl` VALUES (0,0,'Admin'),(2,1,'EARTH'),(3,1,'VENUS'),(4,1,'MARS'),(5,1,'NEPTUNE'),(7,2,'MARS'),(8,2,'NEPTUNE'),(9,2,'JUPITER'),(10,2,'VENUS'),(11,2,'EARTH'),(12,1,'JUPITER'),(13,3,'JUPITER'),(14,3,'VENUS'),(15,3,'MARS'),(16,3,'NEPTUNE'),(17,3,'EARTH'),(18,4,'JUPITER'),(19,4,'VENUS'),(20,4,'MARS'),(21,4,'NEPTUNE'),(22,4,'EARTH');
/*!40000 ALTER TABLE `classes_tbl` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `positions_tbl`
--

DROP TABLE IF EXISTS `positions_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `positions_tbl` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(128) NOT NULL,
  `position_level` varchar(128) NOT NULL,
  `position_eligibility` int(11) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions_tbl`
--

LOCK TABLES `positions_tbl` WRITE;
/*!40000 ALTER TABLE `positions_tbl` DISABLE KEYS */;
INSERT INTO `positions_tbl` VALUES (2,'HEAD BOY','School Level',3),(3,'HEAD GIRL','School Level',3),(4,'GAMES CAPTAIN','School Level',3),(5,'DINING HALL CAPTAIN','School Level',3),(6,'LIBRARY CAPTAIN','School Level',3),(7,'FORM CAPTAIN','Form Level',1234),(8,'CLASS PREFECT','Class Level',1234);
/*!40000 ALTER TABLE `positions_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_tbl`
--

DROP TABLE IF EXISTS `users_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_tbl` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(128) NOT NULL,
  `user_first_name` varchar(128) NOT NULL,
  `user_last_name` varchar(128) NOT NULL,
  `user_class` int(11) NOT NULL,
  `user_gender` varchar(6) NOT NULL,
  `username` varchar(128) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_password` varchar(128) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_class` (`user_class`),
  CONSTRAINT `users_tbl_ibfk_1` FOREIGN KEY (`user_class`) REFERENCES `classes_tbl` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_tbl`
--

LOCK TABLES `users_tbl` WRITE;
/*!40000 ALTER TABLE `users_tbl` DISABLE KEYS */;
INSERT INTO `users_tbl` VALUES (1,'admin','Michael','Nabangi',0,'-','NabangiMichael','miguelnabz@gmail.com','$2y$10$xQozqiZz/XW9IDlrBG3Gk.qbcDcJNHpbRK5mhQHTIYfXl4BDQY.WK'),(2,'student','Edward','Abira',2,'M','AbiraEdward','AbiraEdward.elec@gmail.com','$2y$10$23otS95I9mmPPJu7yEoAn.gMEyLTwbXqnyIX.WfvydjnhUFtwU5vW'),(3,'student','Jane','Adhiambo',11,'F','adhiambojane','adhiambojane.elec@gmail.com','$2y$10$bWy/Ewa1wYEj94Uea.iD..RZGvH/g.UYM6fS2h2VJdH.SgDCqaza2'),(4,'student','Michelle','Ambunya',17,'F','ambunyamichelle','ambunyamichelle.elec@gmail.com','$2y$10$Mah0ZdcCzbwg2wdhP/SJMeCyW6G0jUDvA11EcVHNUMNLmgsWrc6Li'),(5,'student','Samuel','Asuna',18,'M','asunasamuel','asunasamuel.elec@gmail.com','$2y$10$7rVE7TTq.bbc1lDsW8.ejuK.a0PeOaTAHAUzaGmB3YJ3wMAv2U.tK'),(6,'student','Harry','Atulah',16,'M','atulahharry','atulahharry.elec@gmail.com','$2y$10$yo0a5IVb9sIGSv7ajNIHw.66L/hgh2fLZDHKzNyqz.C304y8/3n0W'),(7,'student','Favour','Aiyela',15,'F','aiyelafavour','aiyelafavour.elec@gmail.com','$2y$10$dN8d8ABkR0yUApWI0ZKjf.f1HKifgqsTL.yG4kUaJMofJW4y1gl6O'),(8,'student','Leo ','Bikuri',15,'M','bikurileo ','bikurileo .elec@gmail.com','$2y$10$Vi.4MER4hDjuVuWMYRl74urC.TSEPQwsIibKub2If6hKlUviXjiGG'),(9,'student','Cindy','Bosibori',5,'F','bosiboricindy','bosiboricindy.elec@gmail.com','$2y$10$fxvRXfM3zBkzVdCjjYBP3OmWNUazf2XsaaCcmx6dkQ5OzWVqOwEty'),(10,'student','Wamaitha','Gatonye',12,'F','gatonyewamaitha','gatonyewamaitha.elec@gmail.com','$2y$10$rbgjI6X03KRVDLShWx/UpOd4nCkjhvIAIJyBNziuNSkcKbYgyMdbW'),(11,'student','Natasha','Gichuhi',9,'F','gichuhinatasha','gichuhinatasha.elec@gmail.com','$2y$10$nnar7ClbuqhWli7uj2WnEeHlbyBU71UfENiCnNWIw.TY7JkhnNyoS'),(12,'student','Victor','Githaiga',13,'M','githaigavictor','githaigavictor.elec@gmail.com','$2y$10$dxKNxr4Xxm7i.mFvKcHYT.j3KQArLQwcoth7CzWUJyc4e0BN.NWJG'),(13,'student','Kendi','Ibeere',14,'F','ibeerekendi','ibeerekendi.elec@gmail.com','$2y$10$qHTMwKELLdOaeWGnJm2WmezAh4TMAMYoqKLPLo3k3R6id0Tu/tL0y'),(14,'student','Joseph','Vunanga',3,'M','vunangajoseph','vunangajoseph.elec@gmail.com','$2y$10$Ug1xzoT/kGqYQEjp43aTgexB9a6eNZxXVgeZUhbvndWwZYSvnqhKy'),(15,'student','Eric','Maina',10,'M','mainaeric','mainaeric.elec@gmail.com','$2y$10$2sKuwix0fdOLCdpIJ2fG.O1TjDMKnKERDWIVXfn/ZfHocptqsu.tW'),(16,'student','Trevor','Kamatu',19,'M','kamatutrevor','kamatutrevor.elec@gmail.com','$2y$10$kafxY1139SBaor9wxsg4lu3yDLJB3FOC8TBCGhwvCLDgtjizy2njS'),(17,'student','Ethan','Maina',4,'M','mainaethan','mainaethan.elec@gmail.com','$2y$10$BhTpioSLKCqX925C0bUVh.uh01D3LCyvfKkMXSoKGfeO2qHmKPWGK'),(18,'student','Jacob','Manyara',7,'M','manyarajacob','manyarajacob.elec@gmail.com','$2y$10$yBlQI.Yh86ZEsXED6asPse9DdwBywBA3wHQddp9URnZ1QH47nHx9a'),(19,'student','Nene','Karingi',20,'M','karinginene','karinginene.elec@gmail.com','$2y$10$qSZrVTYl4Dxsz2I4bCL7gebUhMtmQfACAw.7TmfdbRlxuhG6besFy'),(20,'student','Edwin','Kariuki',8,'M','kariukiedwin','kariukiedwin.elec@gmail.com','$2y$10$qLZiNfO/0muBHyiDiyTiY.jrkg9xgjmIJp10/tvfIEyfOHPYNpfX2'),(21,'student','Yahya','Khalif',21,'M','khalifyahya','khalifyahya.elec@gmail.com','$2y$10$DxiNQBlcZJfnNMec5FqBN.sSNqyZfJTJ9Et9YOJvMVnHnrVrntgvG'),(22,'student','Elvis','Kibet',22,'M','kibetelvis','kibetelvis.elec@gmail.com','$2y$10$htXqrrhsSM9b/U9QIofgVOdElWsff67kwUJ0kk..sv7VX5s0U.rNa'),(23,'student','Jeff','Kioko',2,'M','kiokojeff','kiokojeff.elec@gmail.com','$2y$10$r30LbPlSS0eSGDjTdS960O1mXXlHeRwT05Jydu8lKlGKBxF6m5sNm'),(24,'student','Henry','Kiok',8,'M','kiokhenry','kiokhenry.elec@gmail.com','$2y$10$4m4UV5biQbHGhcsyazZSeusgor6C/LCJgH0Nw9qUpZzlZF.nywx9a'),(25,'student','Kevin','Kipkoech',18,'M','kipkoechkevin','kipkoechkevin.elec@gmail.com','$2y$10$e3cTPy6u2FL.2jSIuY/Wp.YQYI3mwEBI4ef.LpPmG2fBUpTJaliJe'),(26,'student','Ian','Kiragu',21,'M','kiraguian','kiraguian.elec@gmail.com','$2y$10$Pf7opRS5UXcNfF7Jlxhg2uAfsFg5gqqgt2VApOKWIcXAwp1uTWPYq'),(27,'student','Abigael','Kirwa',4,'F','kirwaabigael','kirwaabigael.elec@gmail.com','$2y$10$/idBLHIyO7rQYFc0E44UM.k47BAS6/pnE2LH4vFi8BsMqYNWogtpK'),(28,'student','Alvis','Koech',12,'M','koechalvis','koechalvis.elec@gmail.com','$2y$10$pnQSfxJIUq9MXbhQ.ztr9uSFeuBWSaANit3FYCUf9IEmH3B6LQIFK'),(29,'student','Sean','Kimutai',16,'M','kimutaisean','kimutaisean.elec@gmail.com','$2y$10$tpk5vVgXoHuRNqfUioYMKOh1.5qO2zMaOJiku8VdqCaMJ.s2QWEpe'),(30,'student','Catherine','Kuria',14,'F','kuriacatherine','kuriacatherine.elec@gmail.com','$2y$10$8Y0Dh2D2gQBiKGUA1JU2Y.1jP0wsQ0jVCNyNkRaDRpjRZ/USCVzWq'),(31,'student','Timothy','Kuria',20,'M','kuriatimothy','kuriatimothy.elec@gmail.com','$2y$10$LA6tbLiCVhpxutdqpKNNK.6ci4Oz2Ww1L6MwDw3eCmKPkNeLotjP2'),(32,'student','Nicolas','Kweyu',8,'M','kweyunicolas','kweyunicolas.elec@gmail.com','$2y$10$F//NMjVOlASDgokTQrBDNOGOrHg83MHUaYBDAToR2WoEfPauvpJOa'),(33,'student','Eric','Lesilau',2,'M','lesilaueric','lesilaueric.elec@gmail.com','$2y$10$O0jXOZZPRnDaj3kpFtefx..7T8utFlPLKJC6ogosLsshAOR2ZE9y2'),(34,'student','Timothy','Lidede',2,'M','lidedetimothy','lidedetimothy.elec@gmail.com','$2y$10$aahaAH0UrKAbjwRLdak/Qe9YJTJOR9oPwxWOO3oi5gMWL0yFN4OcC'),(35,'student','Julie','Maina',2,'F','mainajulie','mainajulie.elec@gmail.com','$2y$10$b/7b7D2go/WyomixjS6/i.fcic17GUB/g.1Bn8I6wcWimXLrlE5.6'),(36,'student','Sam','Mariera',4,'M','marierasam','marierasam.elec@gmail.com','$2y$10$BtX9GsK4yUXHoCFzruTwXuc3X.bj7CxC10wb.wMGsujW2l6YCwzDG'),(37,'student','Joy','Mithamo',4,'F','mithamojoy','mithamojoy.elec@gmail.com','$2y$10$THFuBsrExbdcmEvyzsK.SupXGbuTbyEn1c2nwn6aSWXb7Qy9gBHuC'),(38,'student','Breden','Mugambi',4,'M','mugambibreden','mugambibreden.elec@gmail.com','$2y$10$c7xR1Tx26s7IibqK2RpPHOomPh2Nsj4RIFeVS5HpDSXmjVJqgzvYS'),(39,'student','Faith','Muiruri',5,'F','muirurifaith','muirurifaith.elec@gmail.com','$2y$10$c/kXvKk4USlZRK3t/STAGuRKAXBb.xGrWgMD3HDFY2yQZicXXa4Kq'),(40,'student','Rebecca','Muiruri',5,'F','muirurirebecca','muirurirebecca.elec@gmail.com','$2y$10$xOCNdj3HzJ32gi1XtAa8FOZZkBjDTU9kOhFnfIarqAA4NgH9vr/Lm'),(41,'student','Viola','Mukoba',5,'F','mukobaviola','mukobaviola.elec@gmail.com','$2y$10$YE2y7nY31Yz17ipum7X6Ce4mpxrA3LsittaxWaZkPeM16HOn4nFf.'),(42,'student','Joy','Mukui',5,'F','mukuijoy','mukuijoy.elec@gmail.com','$2y$10$ei4TBeV6tUs56E2WVxcnFubadW2I8GAs8FMtlgaIinKv2yZCm1V.C'),(43,'student','Deborah','Munene',17,'F','munenedeborah','munenedeborah.elec@gmail.com','$2y$10$6hYcQ4jOW1v3bmh5yPLN8uEE1uw6frAo0HIBtgXVbZUu0p1EihWNO'),(44,'student','Newton','Munene',17,'M','munenenewton','munenenewton.elec@gmail.com','$2y$10$CkaCCEaUss.DTukak/QGRulFMGrtxVg2XeWYcVQwCplrB0wB59.p2'),(45,'student','David','Mungai',17,'M','mungaidavid','mungaidavid.elec@gmail.com','$2y$10$oVH71CUWEKbkoIFLsbN.YeZz8N0Ki4hw2snJm73grz7d9cLJ44wZW'),(46,'student','Christopher','Mungiria',17,'M','mungiriachristopher','mungiriachristopher.elec@gmail.com','$2y$10$RtTLxh0FjZgecA0UiVoIwObND5eS12J.VDsXb7MCChdPhovTPh6p.'),(47,'student','Jeremy','Munroe',15,'M','munroejeremy','munroejeremy.elec@gmail.com','$2y$10$pl.sUq/mNOlxaCpEafIOJuC2AiKAzti6kSa2ADGI/ueiDQPUGXJwi'),(48,'student','Jeff','Munyigi',15,'M','munyigijeff','munyigijeff.elec@gmail.com','$2y$10$FFDvJurQPx7wM5HTfffILO.ykSwwZpzziFz.p1G6La8yVpBIjhPGW'),(49,'student','Cynthia','Musila',15,'F','musilacynthia','musilacynthia.elec@gmail.com','$2y$10$VWCfK3C0NVHmp0unU3TyFed0lOu6fO6m3wasIwNZSeq2kTCB.wh4u'),(50,'student','Trevor','Muthoka',16,'M','muthokatrevor','muthokatrevor.elec@gmail.com','$2y$10$mJXq3e4t/EM80FmpZB.h1OGGLxTMH/QEPbxS/Ry3NuewOugsw7f5i'),(51,'student','Claire','Muthoni',14,'F','muthoniclaire','muthoniclaire.elec@gmail.com','$2y$10$QxQb.m.ICxQc4iforZOJyuB8hoztZjQJn3IIlLhCB21exsQyZvLye'),(52,'student','Larry','Mutoni',14,'M','mutonilarry','mutonilarry.elec@gmail.com','$2y$10$nreEYoG2Ut0ufe/9.tekKe6AEBKI.oU/HWed2XulLRHiO8vKvUMdm'),(53,'student','Danroy','Mwangi',14,'M','mwangidanroy','mwangidanroy.elec@gmail.com','$2y$10$l0UkX.29M7R3bSiyRKMY2.UBgVvGMMpdS8sR.fCXvtS.z6N26gsWK'),(54,'student','Joy','Mwangi',16,'F','mwangijoy','mwangijoy.elec@gmail.com','$2y$10$xBLcjk0QXCO/iWBMiuMvsOjxOP5YImOVDZwqNiiRixmSg69HVLkmC'),(55,'student','Peter','Mwangi',16,'M','mwangipeter','mwangipeter.elec@gmail.com','$2y$10$YBXd195NFA1TAVDx6ok5Zeja3K3bo0mYGhjgW1O1Oc4jwtN8Bq9d.'),(56,'student','Sharon','Mwangi',13,'F','mwangisharon','mwangisharon.elec@gmail.com','$2y$10$aJq93mqJdQ6iic/Jf4.pK.3N4qyeeG4KZ8qbHsaRta8XLyHsUhP4m'),(57,'student','Michael','Mwasha',13,'M','mwashamichael','mwashamichael.elec@gmail.com','$2y$10$XMr4pKneODIWXatG2ghYJ.x.C4FJLpDsnnO52CO4iSsXgdQIaPAYG'),(58,'student','Benjamin','Mwengi',13,'M','mwengibenjamin','mwengibenjamin.elec@gmail.com','$2y$10$sf22bqvCMiQPCpfSbnJgUOnwfuI5zqVefCASCmNJV0E5B6PvfrkjO'),(59,'student','Shivan','Nantono',13,'F','nantonoshivan','nantonoshivan.elec@gmail.com','$2y$10$TbdSGBE39xvZR7edDd/N/OILtebY6ro8Qq7lNDtW4PISQSuPHjo5K'),(60,'student','Hellen','Ndathi',12,'F','ndathihellen','ndathihellen.elec@gmail.com','$2y$10$6Q4jav7ce8.1840MUFNygug/Ysj.j.PYZN0U29Uy.nCRHSb4nem8e'),(61,'student','Kennedy','Ngigi',12,'M','ngigikennedy','ngigikennedy.elec@gmail.com','$2y$10$KVhcSKbA6yoq/xDvUknLL.jr9oQRM/nxJBYDbQWGSrI47W278N/Ee'),(62,'student','June','Ngumbau',12,'F','ngumbaujune','ngumbaujune.elec@gmail.com','$2y$10$O.KSNDEqJaNOmnFMLijK/.QMfhER8OpCuz3x/7N6A4QAGeC4ql7oC'),(63,'student','Andrew','Njenga',3,'M','njengaandrew','njengaandrew.elec@gmail.com','$2y$10$8CCYMFuTdjc3oABi4kyPEO2Mphp7YKa4SHQgP/pVPWC9LMQ5rFP9a'),(64,'student','Kendi','Njeru',3,'F','njerukendi','njerukendi.elec@gmail.com','$2y$10$0riUhiBIA2Cy5f5ukmPfcOEPPHRJ/2PoL09jEWHSZsJJAFv8dAjhu'),(65,'student','Wacuka','Nyaga',3,'F','nyagawacuka','nyagawacuka.elec@gmail.com','$2y$10$QA6/xFbykzu7edIyRT8UZuer2rFhSlQvYi2y.NC67OgavD.zApVuq'),(66,'student','Tricia','Nyoike',3,'F','nyoiketricia','nyoiketricia.elec@gmail.com','$2y$10$zTRybhNL.DhUSWUHSzkhjum6/3LzMNh6Hu2BUBWvRNLVAgJ3OOXvO'),(67,'student','Nicole','Ochieng',11,'F','ochiengnicole','ochiengnicole.elec@gmail.com','$2y$10$WAMPBAU9tYr9ec9AqVCTSeSl5tqXQHYEp2i9pVEAlJkNCMXR.46Hm'),(68,'student','Ian','Odipo',11,'M','odipoian','odipoian.elec@gmail.com','$2y$10$vxngL.R4M4L/y4m2vjded.gOiC.AQ0bY.1Z0mYYMNuO1xpWk3XQVi'),(69,'student','Evans','Okania',11,'M','okaniaevans','okaniaevans.elec@gmail.com','$2y$10$hb.NbGvZbjQjAmmZ.KACAOZNpEy1QvVPteq/1oitX75D97vaTQEJe'),(70,'student','Grant','Okello',11,'M','okellogrant','okellogrant.elec@gmail.com','$2y$10$N2U3FtaPoCPpPDCDaymvn.M0ONPBugAR3Omc6TERAYMtstICnEvci'),(71,'student','Oduor','Okoth',7,'M','okothoduor','okothoduor.elec@gmail.com','$2y$10$lKh63DlFWaxpX6er6w87q.FgYmBfT918e8R5ezcPoq.M1.ZyZymxq'),(72,'student','Ezekiel','Olubandwa',7,'M','olubandwaezekiel','olubandwaezekiel.elec@gmail.com','$2y$10$HJBhsEuqk/CeXh4QiH9iUOc4B6lMEJb38ZTv0slvNOPxv5qfw4eai'),(73,'student','Ryan','Ombatti',7,'M','ombattiryan','ombattiryan.elec@gmail.com','$2y$10$Ngc2iGH27oibZeTEtujM6uqWONTAERehBWeqMQASWjB9KvS1dB9g2'),(74,'student','Natalie','Omondi',7,'F','omondinatalie','omondinatalie.elec@gmail.com','$2y$10$peNbohMY118D1EhF45S/5.JiW6ZGUiftFEOax7Cd866s/w0L0RxfW'),(75,'student','Trevor','Omondi',8,'M','omonditrevor','omonditrevor.elec@gmail.com','$2y$10$NUNeHhmgQqTsW34KeiYKc.EF3GPpNE7ZlAjtkbqWJPaqt/3pmCa3K'),(76,'student','Jeffery','Ongicho',8,'M','ongichojeffery','ongichojeffery.elec@gmail.com','$2y$10$Y8CbKPi1OC.SlQV5lJW4IO8ZNeLCODPQZgZJTUK882/SVEs553q.e'),(77,'student','Michael','Onyoin',9,'M','onyoinmichael','onyoinmichael.elec@gmail.com','$2y$10$FZc7qtHxaUHX1zhX80dKdeqMDtIZ/XpTkKosNfgLWQEdqQ/SlWfZ6'),(78,'student','Binita','Patel',9,'F','patelbinita','patelbinita.elec@gmail.com','$2y$10$qwBI.xXFm08lA0IO1SoCmuG6ZaBuM/Q2X.iRn/hlcqxMxtv1K63Mi'),(79,'student','Shubh','Patel',9,'F','patelshubh','patelshubh.elec@gmail.com','$2y$10$s3VDKO31caapnTXrJNEv7.T7xOCAQ3CtVSAB3PwAAvJNiHTmaI3j.'),(80,'student','Nathan','Ruru',9,'M','rurunathan','rurunathan.elec@gmail.com','$2y$10$CRpNj2VjUgq5Ni3EOPCoPuB3HmKEVO2KUkeC4qLd525jSTvtI4vg2'),(81,'student','Walid','Saidi',10,'M','saidiwalid','saidiwalid.elec@gmail.com','$2y$10$m0hdJqVjibI3DSQh5eUqk.roujxxvrYnOOm4c7Ka1Z8uLnLZCXkVi'),(82,'student','Ali','Sheikh',10,'M','sheikhali','sheikhali.elec@gmail.com','$2y$10$ilocyyzzl2tKz2eHcx6qAeROUzdW73GVRnc1.EZWo8tGiO47qvRzS'),(83,'student','Nathaniel','Shibadu',10,'M','shibadunathaniel','shibadunathaniel.elec@gmail.com','$2y$10$ehnkDr.vXM5Tf.q47sGbzuU9kUZDam.Vm0k8E4SvlBz4D84lfIDdG'),(84,'student','Royne','Thuo',10,'M','thuoroyne','thuoroyne.elec@gmail.com','$2y$10$54u78IQx6UjsL.zF2FUd0eSNq0.cMmuhm7Q6az4TN5rMyBTF9rfoW'),(85,'student','Adrian','Odhiambo',22,'M','odhiamboadrian','odhiamboadrian.elec@gmail.com','$2y$10$aKC88UykB9rkIq.diBkuNOxbq6Jq/gP5Kb8.hNZ/okXUo7D1q1L.e'),(86,'student','Michael','Wachira',22,'M','wachiramichael','wachiramichael.elec@gmail.com','$2y$10$ERxOodUWFvVng0Ptf5gAdu2pLm0kwaRntdHfTQC6pmwRMprvwPYUm'),(87,'student','Peter','Wachira',22,'M','wachirapeter','wachirapeter.elec@gmail.com','$2y$10$u.1EKiw1FId29feGVxWdbelqepAvd6Jg0iu465APqNtVi/ADKQNC.'),(88,'student','Lexie','Wambui',22,'F','wambuilexie','wambuilexie.elec@gmail.com','$2y$10$DeLd.lznROR8aL7RviZJIuXZV5kdk1YHInpZ.8NwnB9f2yPBvDP9a'),(89,'student','Adrian','Wangalwa',20,'M','wangalwaadrian','wangalwaadrian.elec@gmail.com','$2y$10$Y.PZfoygxRjSIMzp1aA6kO9VLgp7x7aQZJ8B16iiHrKikAeSk1Jui'),(90,'student','Benard','Wanyande',20,'M','wanyandebenard','wanyandebenard.elec@gmail.com','$2y$10$OEgTzqn8s9LEGRTETw45oOF/zQwQT0mcNQpM0S..7.YAoikwaoo9K'),(91,'student','Jean','Wasike',20,'F','wasikejean','wasikejean.elec@gmail.com','$2y$10$acDydKVdsQZK.F.Om1aqHO7ZZr.i36s0GnDvi1pbnU1XVi/HUvmBC'),(92,'student','Betty','Yuda',21,'F','yudabetty','yudabetty.elec@gmail.com','$2y$10$hIf5f1XbDn6mCty.iJxrxe9Zs03H/cEjZ3g05TdXoz6JpChrea2VG'),(93,'student','Abraham','Zawadi',21,'M','zawadiabraham','zawadiabraham.elec@gmail.com','$2y$10$b/g5O0nK15Hk07j8x183zOoauQmIQxrDM1daeWHGP8PJZK67JfqpC'),(94,'student','Felix','Achachi',21,'M','achachifelix','achachifelix.elec@gmail.com','$2y$10$FzGY1U9IsNHN57V4WxDre.1cbacIGSN2A5J6Gr8LPz2Dak0Cu/fAu'),(95,'student','Gato','Jessica',18,'F','jessicagato','jessicagato.elec@gmail.com','$2y$10$wHdO3wkKH1U3AekPFfpYk.TDvcBqo3pkv2D.kZAQIbGpUwC3SzB6a'),(96,'student','Ian','Kasili',18,'M','kasiliian','kasiliian.elec@gmail.com','$2y$10$46RQjK6A9DKjPRBi0LIcYeL545vlYNpz0KsGG0cY9X7ExSDFgM6tm'),(97,'student','Derek','Keane',18,'M','keanederek','keanederek.elec@gmail.com','$2y$10$21Q0cDgCL77EDPd5bsQBV.wH0LKIFpFBCI3PuG1r3MvaciWLqB87m'),(98,'student','Michael','Kidero',19,'M','kideromichael','kideromichael.elec@gmail.com','$2y$10$hGRHdCpzLIEnVEDYP2URF.GXspTvJT6s2VEsA06oL574kwlYn2.Lu'),(99,'student','Tonny','Langat',19,'M','langattonny','langattonny.elec@gmail.com','$2y$10$B2Ev47XeESMteUoHPx6RnecD6ziLA/6LDude.VU8fQ.Ax/HHFEvNi'),(100,'student','Leslie','Lemaron',19,'M','lemaronleslie','lemaronleslie.elec@gmail.com','$2y$10$Ug3sjCdmvybUXGu9WU80GuAC15W5pt.llRz6V.JgkZeWKv9Rr7L3i'),(101,'student','Nancy','Madison',19,'F','madisonnancy','madisonnancy.elec@gmail.com','$2y$10$.CrcPvNyRHjfKuv7af1FA.w2f32ALtD.H18lj5hwXpQoGnHo.TxNm'),(102,'student','Jotham','Mbithi',17,'M','mbithijotham','mbithijotham.elec@gmail.com','$2y$10$QLTJJ.TeGcDSyiQlYmjnOehGQgdF8oR5vjTi94riXoXDd394X3QCK'),(103,'student','Joy','Muisyo',17,'F','muisyojoy','muisyojoy.elec@gmail.com','$2y$10$gUS8dEAJch5TjHuXWk0TNeOx23pE5AAgBjzzX1jdfw9JX6ENXpofK'),(104,'student','Brenda','Musembi',16,'F','musembibrenda','musembibrenda.elec@gmail.com','$2y$10$w3X.0t2nr7XHO5VWCirmqusjnT/HWSsZnvD8Iw3Ds8UT2Tq/BjOAG'),(105,'student','Leone','Oluoch',16,'M','oluochleone','oluochleone.elec@gmail.com','$2y$10$uGyxxtIezSII67nsSznXYuQJVyzg5o89N8OXpuFBI3eJaDVJp.vJi'),(106,'student','Mcdeddis','Opot',15,'M','opotmcdeddis','opotmcdeddis.elec@gmail.com','$2y$10$Q/aZ7DfuYRj.hyoaBknGleFsC9uUBW90aNZ1B74xfQg2bGnw0G4m.'),(107,'student','Sandy','Osoro',15,'F','osorosandy','osorosandy.elec@gmail.com','$2y$10$fiJYdkA4t4ZlvP8jj.wUcuj88oc0ElaYSHUX3Yay.JU4Vqzvkps8q'),(108,'student','Byebi','Roland',14,'M','rolandbyebi','rolandbyebi.elec@gmail.com','$2y$10$X2ZT/TYpaHMnmsBlq3pnNuJI23gJo8UaSyYWkeVaimUN.4hHNDE6i'),(109,'student','Owen','Rotich',14,'M','rotichowen','rotichowen.elec@gmail.com','$2y$10$5zjqdMKIhdNKoa/VmuQKWOxOcHJR7.3gIbOj71hVpFAW.cXPy1YzC'),(110,'student','Alwanga','Stacy',13,'F','stacyalwanga','stacyalwanga.elec@gmail.com','$2y$10$3miyM1fwo1CxhH.CpPHngedovo43HUjpRadfGorjnpNePKTdWKJSa'),(111,'student','Kevin','Tarus',13,'M','taruskevin','taruskevin.elec@gmail.com','$2y$10$ZBQZgGQlLoW817QRAaQ.1O7j11Y/macXuG5EHlp4O4RxWWuKle72a'),(112,'student','Tinda','Canon',17,'M','canontinda','canontinda.elec@gmail.com','$2y$10$z/WVu/bLav4v015fneg2cethzOQQjUZYVkquYmzzQ.8.fs4KTorQe'),(113,'student','Bradley','Waweru',17,'M','wawerubradley','wawerubradley.elec@gmail.com','$2y$10$5X.GcLYAB0H79j4VqGX3jOiWBMpUn13b74jm94.tTqjw22J5QNrau'),(114,'student','Abigail','Muthuri',17,'F','muthuriabigail','muthuriabigail.elec@gmail.com','$2y$10$AocAfi1bq/au6lZqdp5DHuDwxiydYpkKTbgB9tVZD6In3yZqH7wJa'),(115,'student','Allan','Karanja',13,'M','karanjaallan','karanjaallan.elec@gmail.com','$2y$10$H/Cyxd5Lgm.B2jxht/No2OJj7ByvQ5hPm9qprHCQcCuhkyzBoRQqO'),(116,'student','Angela','Masaki',13,'F','masakiangela','masakiangela.elec@gmail.com','$2y$10$4/AHtv1CvQrffczPHGKFMusE29dL3nA2SOKAWEOPa1PXv6V638bfa'),(117,'student','Assumpta','Mwikali',13,'F','mwikaliassumpta','mwikaliassumpta.elec@gmail.com','$2y$10$7VtKYgONei2RwqJ4x/LJguV/kjjxv3SvJDPRpNnHkXfqyWeOz0SmK'),(118,'student','Constance','Syombua',15,'F','syombuaconstance','syombuaconstance.elec@gmail.com','$2y$10$KwfOCzQ5DF95izA7MGgss.mqXp2b6FnrxgLHJrL1QYPU/W7h.zvTe'),(119,'student','David','Kungu',15,'M','kungudavid','kungudavid.elec@gmail.com','$2y$10$OHV9L9lnM1NIDuwD0QIhHuR2WiELLYDtUenWyz0IbQGbOArCellEy'),(120,'student','Edward','Kariuki',15,'M','kariukiedward','kariukiedward.elec@gmail.com','$2y$10$swmJ.bSTl7jnexWBAemyBuhFgzIQPksG3o5qOMpEeZ/x4CcqcKa8e'),(121,'student','Eli','Ochieng',16,'M','ochiengeli','ochiengeli.elec@gmail.com','$2y$10$OkahbhFy5g0LKh17Vo0yjuj7fyQbeWMTE4Dw6sPtAkmWI6RwNoPO6'),(122,'student','Fleskine','Omondi',16,'M','omondifleskine','omondifleskine.elec@gmail.com','$2y$10$doaRjEWpRkYMKGJ4Lyhfz.HDseSLqBdmcy.mCoOXgAjSyeU.UpVD6'),(123,'student','Imo','Etemesi',16,'M','etemesiimo','etemesiimo.elec@gmail.com','$2y$10$5t24NWRWSKnFRwsKxbU7Y.dYIB9FVirrAzB6OOtlyhHEufdVYMO9y'),(124,'student','Jeff','Rogers',14,'M','rogersjeff','rogersjeff.elec@gmail.com','$2y$10$8.34KmRnwQzddCxio1kKV.EoCKj7D8NJuoWXO4vJoqFt5F0Nf9/2y'),(125,'student','Kevin','Moseti',14,'M','mosetikevin','mosetikevin.elec@gmail.com','$2y$10$YLkcpKPcqmpqs0YQa4epSO7Fa5n8wEzpU/gei3G4CWdxuFlG8fi.O'),(126,'student','Leo','Mugambi',14,'M','mugambileo','mugambileo.elec@gmail.com','$2y$10$GrAjWDU58OOPaP8mWICGPeB/qogg07byxHPULw3ZrVL/pzQCI7D2e'),(127,'student','Leon','Kimutai',2,'M','kimutaileon','kimutaileon.elec@gmail.com','$2y$10$yccjMoMZSjR/oaMdGaqvkelsrWFNazp1KY17MpoK8woqDL59cHPVO'),(128,'student','Marie','Muthoni',12,'F','muthonimarie','muthonimarie.elec@gmail.com','$2y$10$CzV3ALHSTSUABDULjenXROwHc.816zlvwAkBTyEqVp/uRYIXXwwUa'),(129,'student','Michael','Muya',4,'M','muyamichael','muyamichael.elec@gmail.com','$2y$10$nEmnPGH0ufaeGrn.e7E9N.mcQMOp.JfaPsjgPFCHQcFqQnmhbSIxS'),(130,'student','Muchira','Munene',5,'M','munenemuchira','munenemuchira.elec@gmail.com','$2y$10$jeYpfe9HoAj8xVXcp84bRef1tjOvtrho.WgcfPPJTHOz2OswqLqXS'),(131,'student','Omtatah','Murtallah',19,'M','murtallahomtatah','murtallahomtatah.elec@gmail.com','$2y$10$uwIUlvbKiGac1MHqOfe1yONuXqFB.wkS2sI.R08VDXrVPmiryPQzi'),(132,'student','Peter','Kimutai',3,'M','kimutaipeter','kimutaipeter.elec@gmail.com','$2y$10$cglSx8Z6aOv0d3AoOUyhMuKI/jWi1mv355usFnvUxbgsHCJAkAcTi'),(133,'student','Phil','Nyaga',11,'M','nyagaphil','nyagaphil.elec@gmail.com','$2y$10$leXdvyS9eciBzvGHRH4qR.xY/L8l5w900USyIpjt7wYm1g6Xd2jAG'),(134,'student','Samuel','Ochieng',9,'M','ochiengsamuel','ochiengsamuel.elec@gmail.com','$2y$10$iqeygpTHmDSvkYTuapW7eOYWdPMbtN0bS3EfTchDWycR05w8UOLfK'),(135,'student','Sheldon','Kimely',7,'M','kimelysheldon','kimelysheldon.elec@gmail.com','$2y$10$fGt0mEY83u4eZrAkGlciI.JVgPeJJSysCspzRIMEHd5LnJmYPv8d6'),(136,'student','Trevor','Joseph',8,'M','josephtrevor','josephtrevor.elec@gmail.com','$2y$10$tiqqt.frJSaGPtXruc5nCOwDxI9YVyi.YrusLCUOgg0FEUboFkqia'),(137,'student','Trudeau','Okech',10,'M','okechtrudeau','okechtrudeau.elec@gmail.com','$2y$10$Snb90RUHBAevCnWKSBt7m.67PxQ11zkdOWcx9FGGvnwg8BFsgMWJe'),(138,'student','Victor','Mwai',22,'M','mwaivictor','mwaivictor.elec@gmail.com','$2y$10$r34AJXAWa87TmsLvFbS7WOoEIpXUcQ37k5sZGXkrn4NmhU9owCT9G'),(139,'student','Lelo','Abera',18,'F','aberalelo','aberalelo.elec@gmail.com','$2y$10$3ealzhi7sHJgkqm/k8dIpedqIppSgCG9DfzB6XLqTof0.lhfRp3dC'),(140,'student','Lil','Nabz',20,'M','nabzlil','nabzlil.elec@gmail.com','$2y$10$TJYnqmOEqh4YRvFp3HCa.O6V806Hy9AhibzQ2Q59ZQJkj9.hPRlei'),(141,'student','Jane','Mudeitsi',21,'F','mudeitsijane','mudeitsijane.elec@gmail.com','$2y$10$p4E9lP7gUSfIJ3l5LaHQxetP8f3FgbdVzWbYs1v6tOnIyJGsAgR7G'),(151,'admin','Rehema','Ngari',0,'-','NgariRehema','ngarirehema@gmail.com','$2y$10$zimm6JpAhPCiFEwWAyRdd.t8Rxx.0l40bSeQBLSomlX/pYMvvnHfW');
/*!40000 ALTER TABLE `users_tbl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vote_tbl`
--

DROP TABLE IF EXISTS `vote_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vote_tbl` (
  `vote_id` int(11) NOT NULL AUTO_INCREMENT,
  `voter_id` int(11) NOT NULL,
  `head_boy_id` int(11) NOT NULL,
  `head_girl_id` int(11) NOT NULL,
  `dh_capt_id` int(11) NOT NULL,
  `games_capt_id` int(11) NOT NULL,
  `lib_capt_id` int(11) NOT NULL,
  `form_capt_id` int(11) NOT NULL,
  `class_prefect_id` int(11) NOT NULL,
  PRIMARY KEY (`vote_id`),
  KEY `head_boy` (`head_boy_id`),
  KEY `head_girl` (`head_girl_id`),
  KEY `dh_capt` (`dh_capt_id`),
  KEY `games_capt` (`games_capt_id`),
  KEY `lib_capt` (`lib_capt_id`),
  KEY `form_capt` (`form_capt_id`),
  KEY `class_prefect` (`class_prefect_id`),
  KEY `voter` (`voter_id`),
  CONSTRAINT `vote_tbl_ibfk_1` FOREIGN KEY (`voter_id`) REFERENCES `users_tbl` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `vote_tbl_ibfk_2` FOREIGN KEY (`head_boy_id`) REFERENCES `users_tbl` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `vote_tbl_ibfk_3` FOREIGN KEY (`head_girl_id`) REFERENCES `users_tbl` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `vote_tbl_ibfk_4` FOREIGN KEY (`dh_capt_id`) REFERENCES `users_tbl` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `vote_tbl_ibfk_5` FOREIGN KEY (`games_capt_id`) REFERENCES `users_tbl` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `vote_tbl_ibfk_6` FOREIGN KEY (`lib_capt_id`) REFERENCES `users_tbl` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `vote_tbl_ibfk_7` FOREIGN KEY (`form_capt_id`) REFERENCES `users_tbl` (`user_id`) ON UPDATE CASCADE,
  CONSTRAINT `vote_tbl_ibfk_8` FOREIGN KEY (`class_prefect_id`) REFERENCES `users_tbl` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote_tbl`
--

LOCK TABLES `vote_tbl` WRITE;
/*!40000 ALTER TABLE `vote_tbl` DISABLE KEYS */;
INSERT INTO `vote_tbl` VALUES (6,63,107,117,123,53,103,65,64),(7,23,46,30,123,53,103,65,34),(8,34,46,117,123,53,103,23,34),(9,35,46,30,123,53,103,65,34),(10,127,46,30,123,53,103,23,34),(11,30,46,30,123,53,103,51,13),(21,49,46,30,123,53,103,51,47),(31,64,46,30,123,53,103,65,64);
/*!40000 ALTER TABLE `vote_tbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-12 10:24:15
