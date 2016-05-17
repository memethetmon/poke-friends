-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: red_belt_exam
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `poke`
--

DROP TABLE IF EXISTS `poke`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poke` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `poked_by_id` int(11) NOT NULL DEFAULT '0',
  `poke_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`poked_by_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poke`
--

LOCK TABLES `poke` WRITE;
/*!40000 ALTER TABLE `poke` DISABLE KEYS */;
INSERT INTO `poke` VALUES (1,10,5),(3,1,0),(4,1,0),(5,1,0),(10,1,0);
/*!40000 ALTER TABLE `poke` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `alias` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'MeMe','Mee','meme@gmail.com','82033d782fe5b1dd4f7613aa9ed58e19','1989-11-11','2016-01-23 00:46:40','2016-01-23 00:47:51'),(2,'Naing Lin','Nai','nainglin@yahoo.com','2dc88889d85885c6eb5834fcf63bc3b8','0000-00-00','2016-01-23 00:48:23','2016-01-23 09:48:23'),(3,'Justin','Jcho','justincho@yahoo.com','790c9c0aab0527e476a3aa4414059b06','0000-00-00','2016-01-23 00:48:47','2016-01-23 09:48:47'),(5,'Aye Mon','Aye','ayemon@gmail.com','53271038ed12f5d6f8bfbc227bbfa149','0000-00-00','2016-01-23 00:52:35','2016-01-23 09:52:35'),(6,'Mu','Mu','mumu@yahoo.com','3f60c4a7ecc2ee4ac9436182d32bce15','0000-00-00','2016-01-25 19:01:53','2016-01-26 04:01:53'),(7,'wnc','wnc','wnc@yahoo.com','1e68c6efbab5162a03f3d2be9ad66094','0000-00-00','2016-01-25 19:08:03','2016-01-26 04:08:03'),(9,'CD','CD','cd@codingdojo.com','48d73438cb5f2a71232518aec195d8a0','0000-00-00','2016-01-25 19:22:28','2016-01-26 04:22:28'),(10,'Nay Tun','Nay','naytunchen@gmail.com','8b029a0f506a130c4583e867488331a1','2016-01-01','2016-01-27 07:31:50','2016-01-27 07:31:50');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-27 16:00:16
