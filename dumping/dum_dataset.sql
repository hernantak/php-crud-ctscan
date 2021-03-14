-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: skirpsi_db
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.16.04.1

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
-- Table structure for table `dataset`
--

DROP TABLE IF EXISTS `dataset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dataset` (
  `dataset_id` varchar(20) NOT NULL,
  `dataset_name` varchar(255) NOT NULL,
  `medic_record` varchar(255) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`dataset_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dataset`
--

LOCK TABLES `dataset` WRITE;
/*!40000 ALTER TABLE `dataset` DISABLE KEYS */;
INSERT INTO `dataset` VALUES ('azkJCHMW60KZ6TfoSDki','data_ct_scan_kjgjh','sadasd',NULL,'2021-02-04'),('NNa1AGn1AtrJFn3WkNhL','data_ct_scan_kiki','jkdga776',NULL,'2021-02-06'),('qZhZuPyp4fce6nxVTkbI','data_ct_scan_nanta','trrrr',NULL,'2021-02-06');
/*!40000 ALTER TABLE `dataset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `image_data`
--

DROP TABLE IF EXISTS `image_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image_data` (
  `file_name` varchar(255) NOT NULL,
  `dataset_id` varchar(20) DEFAULT NULL,
  `validate` varchar(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  PRIMARY KEY (`file_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `image_data`
--

LOCK TABLES `image_data` WRITE;
/*!40000 ALTER TABLE `image_data` DISABLE KEYS */;
INSERT INTO `image_data` VALUES ('aaa.png','azkJCHMW60KZ6TfoSDki','Valid','2021-02-04','2021-02-04','upload/azkJCHMW60KZ6TfoSDki/aaa.png'),('bbb.png','azkJCHMW60KZ6TfoSDki','Valid','2021-02-04','2021-02-04','upload/azkJCHMW60KZ6TfoSDki/bbb.png'),('bola.jpeg','azkJCHMW60KZ6TfoSDki','Valid','2021-02-04','2021-02-04','upload/azkJCHMW60KZ6TfoSDki/bola.jpeg'),('citoo.png','NNa1AGn1AtrJFn3WkNhL',NULL,'2021-02-06','2021-02-06','upload/NNa1AGn1AtrJFn3WkNhL/citoo.png'),('images.jpeg','NNa1AGn1AtrJFn3WkNhL',NULL,'2021-02-06','2021-02-06','upload/NNa1AGn1AtrJFn3WkNhL/images.jpeg'),('loginPage.png','NNa1AGn1AtrJFn3WkNhL',NULL,'2021-02-06','2021-02-06','upload/NNa1AGn1AtrJFn3WkNhL/loginPage.png'),('mi.png','NNa1AGn1AtrJFn3WkNhL',NULL,'2021-02-06','2021-02-06','upload/NNa1AGn1AtrJFn3WkNhL/mi.png'),('new.png','NNa1AGn1AtrJFn3WkNhL',NULL,'2021-02-06','2021-02-06','upload/NNa1AGn1AtrJFn3WkNhL/new.png'),('topic_cam.png','qZhZuPyp4fce6nxVTkbI',NULL,'2021-02-06','2021-02-06','upload/qZhZuPyp4fce6nxVTkbI/topic_cam.png'),('topic_cam2.png','qZhZuPyp4fce6nxVTkbI',NULL,'2021-02-06','2021-02-06','upload/qZhZuPyp4fce6nxVTkbI/topic_cam2.png'),('web2.png','qZhZuPyp4fce6nxVTkbI',NULL,'2021-02-06','2021-02-06','upload/qZhZuPyp4fce6nxVTkbI/web2.png'),('webb.png','qZhZuPyp4fce6nxVTkbI',NULL,'2021-02-06','2021-02-06','upload/qZhZuPyp4fce6nxVTkbI/webb.png');
/*!40000 ALTER TABLE `image_data` ENABLE KEYS */;
UNLOCK TABLES;
