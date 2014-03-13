-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: phpproject
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.13.10.2

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
-- Table structure for table `Admin`
--

DROP TABLE IF EXISTS `Admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admin` (
  `Auser_name` varchar(40) NOT NULL,
  `Apassword` varchar(40) NOT NULL,
  PRIMARY KEY (`Auser_name`),
  UNIQUE KEY `Apassword` (`Apassword`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admin`
--

LOCK TABLES `Admin` WRITE;
/*!40000 ALTER TABLE `Admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `Admin` ENABLE KEYS */;
UNLOCK TABLES; 

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `magazine`
--

DROP TABLE IF EXISTS `magazine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `magazine` (
  `mag_id` int(11) NOT NULL AUTO_INCREMENT,
  `mag_date` date NOT NULL,
  `mag_edition` int(11) NOT NULL,
  `mag_title` varchar(50) NOT NULL,
  PRIMARY KEY (`mag_id`),
  UNIQUE KEY `mag_id` (`mag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `magazine`
--

LOCK TABLES `magazine` WRITE;
/*!40000 ALTER TABLE `magazine` DISABLE KEYS */;
/*!40000 ALTER TABLE `magazine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_discount`
--

DROP TABLE IF EXISTS `product_discount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_discount` (
  `pro_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`pro_id`,`discount`),
  CONSTRAINT `product_discount_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_discount`
--

LOCK TABLES `product_discount` WRITE;
/*!40000 ALTER TABLE `product_discount` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_discount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_magazine`
--

DROP TABLE IF EXISTS `product_magazine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_magazine` (
  `prod_id` int(11) NOT NULL,
  `magzn_id` int(11) NOT NULL,
  PRIMARY KEY (`prod_id`,`magzn_id`),
  KEY `magzn_id` (`magzn_id`),
  CONSTRAINT `product_magazine_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_magazine_ibfk_2` FOREIGN KEY (`magzn_id`) REFERENCES `magazine` (`mag_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_magazine`
--

LOCK TABLES `product_magazine` WRITE;
/*!40000 ALTER TABLE `product_magazine` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_magazine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(50) NOT NULL,
  `p_desc` text,
  `p_price` int(11) NOT NULL,
  `p_stock` int(11) NOT NULL,
  `p_img` text,
  `p_QR` text,
  `p_AddData` date NOT NULL,
  `p_category` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `p_id` (`p_id`),
  KEY `p_category` (`p_category`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`p_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-12 15:36:13
