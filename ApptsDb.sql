CREATE DATABASE  IF NOT EXISTS `appts_exam` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `appts_exam`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: appts_exam
-- ------------------------------------------------------
-- Server version	5.5.38

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `appt_date` varchar(45) DEFAULT NULL,
  `time` varchar(45) DEFAULT NULL,
  `task` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_appointments_users_idx` (`user_id`),
  CONSTRAINT `fk_appointments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
INSERT INTO `appointments` VALUES (1,1,'2016-06-08','06:00','Stuff!','Pending','2016-06-04 01:41:48','2016-06-04 01:41:48'),(2,1,'2016-06-04','06:00','dlaglkasgjl','Pending','2016-06-04 02:54:37','2016-06-04 02:54:37'),(3,1,'2016-06-03','19:00','kjdfhad','Pending','2016-06-04 03:09:17','2016-06-04 03:09:17'),(4,1,'2016-06-03','19:00','kjadhfkjahdfkjhadf','Pending','2016-06-03 18:13:25','2016-06-03 18:13:25'),(5,2,'2016-06-04','17:06','adhflajdgh','Pending','2016-06-03 19:20:04','2016-06-03 19:20:04'),(6,2,'2016-06-03','22:00','Be joyful','Pending','2016-06-03 19:57:10','2016-06-03 19:57:10'),(7,1,'2016-06-03','22:00','adkhflajhdfasfn','Pending','2016-06-03 20:07:38','2016-06-03 20:07:38'),(8,1,'2016-06-07','19:30','Barbershop!','Pending','2016-06-07 15:15:42','2016-06-07 15:15:42'),(9,2,'2016-06-08','22:00','Thing','Pending','2016-06-07 17:17:54','2016-06-08 18:35:20'),(10,2,'2016-06-09','18:00','afdasfasf','Pending','2016-06-08 14:35:46','2016-06-08 14:35:46'),(13,4,'2016-06-09','19:00','TaSK!','Done','2016-06-09 14:46:45','2016-06-09 14:47:36'),(14,4,'2016-06-10','19:00','THINGS','Pending','2016-06-09 14:46:59','2016-06-09 14:46:59'),(15,4,'2016-06-09','22:00','STUFF','Pending','2016-06-09 15:07:48','2016-06-09 15:07:48'),(16,4,'2016-06-09','15:09','adjfhadj','Pending','2016-06-09 15:08:10','2016-06-09 15:08:10'),(17,4,'2016-06-09','22:00','dfljhaldfh','Pending','2016-06-09 15:11:34','2016-06-09 15:11:34'),(18,4,'2016-06-10','22:00','dfjlhadflhdf','Pending','2016-06-09 15:12:00','2016-06-09 15:12:00'),(19,4,'2016-06-09','16:25','111111111','Pending','2016-06-09 15:24:53','2016-06-09 15:25:49'),(20,4,'2016-06-11','14:00','lahdlaskdjk','Pending','2016-06-09 15:43:38','2016-06-09 15:43:38'),(21,4,'2016-06-09','15:57','fladhflkadjflkadljladjf','Missed','2016-06-09 15:53:40','2016-06-09 15:56:24'),(22,2,'2016-06-10','10:43','Task1','Pending','2016-06-10 10:41:52','2016-06-10 10:42:40'),(23,2,'2016-06-10','21:00','Task2','Done','2016-06-10 10:43:38','2016-06-10 10:43:52');
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `password_confirm` varchar(45) DEFAULT NULL,
  `dob` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Taylor','t@t.com','11111111','11111111','2016-06-01','2016-06-03 03:20:21','2016-06-03 03:20:21'),(2,'Steve','s@s.com','11111111','11111111','2016-06-01','2016-06-03 03:23:01','2016-06-03 03:23:01'),(3,'Newbie','n@n.com','11111111','11111111','2016-06-01','2016-06-03 03:37:50','2016-06-03 03:37:50'),(4,'Eric','e@e.com','11111111','11111111','2016-06-08','2016-06-09 23:24:42','2016-06-09 23:24:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-14 16:54:04
