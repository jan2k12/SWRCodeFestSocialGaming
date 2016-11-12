-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: socialgaming
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `episode`
--

DROP TABLE IF EXISTS `episode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `episode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `summary` varchar(245) DEFAULT NULL,
  `show_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_episode_show_idx` (`show_id`),
  CONSTRAINT `fk_episode_show` FOREIGN KEY (`show_id`) REFERENCES `tvshow` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `episode`
--

LOCK TABLES `episode` WRITE;
/*!40000 ALTER TABLE `episode` DISABLE KEYS */;
INSERT INTO `episode` VALUES (1,'Der Mörder ist immer der Gärtner','2016-11-12 21:38:00','2016-11-12 21:38:00','Mördermörder',1);
/*!40000 ALTER TABLE `episode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hint`
--

DROP TABLE IF EXISTS `hint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `episode_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hint_episode1_idx` (`episode_id`),
  CONSTRAINT `fk_hint_episode1` FOREIGN KEY (`episode_id`) REFERENCES `episode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hint`
--

LOCK TABLES `hint` WRITE;
/*!40000 ALTER TABLE `hint` DISABLE KEYS */;
INSERT INTO `hint` VALUES (1,'Täter ist der Möder','2016-11-12 21:38:00',1),(2,'Täter ist nicht die Frau','2016-11-12 21:38:00',1);
/*!40000 ALTER TABLE `hint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suspect`
--

DROP TABLE IF EXISTS `suspect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suspect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `guilty` tinyint(4) NOT NULL,
  `imagePath` text,
  `episode_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_suspect_episode1_idx` (`episode_id`),
  CONSTRAINT `fk_suspect_episode1` FOREIGN KEY (`episode_id`) REFERENCES `episode` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suspect`
--

LOCK TABLES `suspect` WRITE;
/*!40000 ALTER TABLE `suspect` DISABLE KEYS */;
INSERT INTO `suspect` VALUES (1,'Annika Blendel',0,'Annika_Blendel.png',1),(2,'Henrik Paulsen',0,'Henrik_Paulsen.png',1),(3,'killian hagendorf.png',0,'killian_hagendorf.png',1),(4,'Lars Overbeck',1,'Lars_Overbeck.png',1);
/*!40000 ALTER TABLE `suspect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tvshow`
--

DROP TABLE IF EXISTS `tvshow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tvshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tvshow`
--

LOCK TABLES `tvshow` WRITE;
/*!40000 ALTER TABLE `tvshow` DISABLE KEYS */;
INSERT INTO `tvshow` VALUES (1,'Tator');
/*!40000 ALTER TABLE `tvshow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'jan','jan.siegl@gmx.de',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userTipp`
--

DROP TABLE IF EXISTS `userTipp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userTipp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(45) NOT NULL,
  `suspectId` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userTipp`
--

LOCK TABLES `userTipp` WRITE;
/*!40000 ALTER TABLE `userTipp` DISABLE KEYS */;
INSERT INTO `userTipp` VALUES (1,'1','1','2016-11-12 23:01:04');
/*!40000 ALTER TABLE `userTipp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_score`
--

DROP TABLE IF EXISTS `user_score`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` varchar(45) NOT NULL,
  `score` int(11) NOT NULL,
  `episodeId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_score`
--

LOCK TABLES `user_score` WRITE;
/*!40000 ALTER TABLE `user_score` DISABLE KEYS */;
INSERT INTO `user_score` VALUES (1,'1',0,1);
/*!40000 ALTER TABLE `user_score` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-13  0:10:51
