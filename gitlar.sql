-- MySQL dump 10.13  Distrib 8.0.12, for Linux (x86_64)
--
-- Host: localhost    Database: gitlar
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `gl_city`
--

DROP TABLE IF EXISTS `gl_city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_city` (
  `CityID` bigint(20) NOT NULL,
  `CityName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ZipCode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProvinceID` bigint(20) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`CityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_city`
--

LOCK TABLES `gl_city` WRITE;
/*!40000 ALTER TABLE `gl_city` DISABLE KEYS */;
/*!40000 ALTER TABLE `gl_city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_company`
--

DROP TABLE IF EXISTS `gl_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `belong` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` date DEFAULT NULL,
  `recommend` text COLLATE utf8_unicode_ci,
  `background` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `web` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_company`
--

LOCK TABLES `gl_company` WRITE;
/*!40000 ALTER TABLE `gl_company` DISABLE KEYS */;
INSERT INTO `gl_company` VALUES (1,'简跃',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `gl_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_contact`
--

DROP TABLE IF EXISTS `gl_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `content` char(60) COLLATE utf8_unicode_ci NOT NULL,
  `img` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_contact`
--

LOCK TABLES `gl_contact` WRITE;
/*!40000 ALTER TABLE `gl_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `gl_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_district`
--

DROP TABLE IF EXISTS `gl_district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_district` (
  `DistrictID` bigint(20) NOT NULL,
  `DistrictName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CityID` bigint(20) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`DistrictID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_district`
--

LOCK TABLES `gl_district` WRITE;
/*!40000 ALTER TABLE `gl_district` DISABLE KEYS */;
/*!40000 ALTER TABLE `gl_district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_dream`
--

DROP TABLE IF EXISTS `gl_dream`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_dream` (
  `ID` int(11) NOT NULL,
  `Group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Detail` text COLLATE utf8_unicode_ci,
  `Url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_dream`
--

LOCK TABLES `gl_dream` WRITE;
/*!40000 ALTER TABLE `gl_dream` DISABLE KEYS */;
/*!40000 ALTER TABLE `gl_dream` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_menu`
--

DROP TABLE IF EXISTS `gl_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `belong` int(11) NOT NULL DEFAULT '1',
  `table` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `is_show` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_menu`
--

LOCK TABLES `gl_menu` WRITE;
/*!40000 ALTER TABLE `gl_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `gl_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_migrations`
--

DROP TABLE IF EXISTS `gl_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_migrations`
--

LOCK TABLES `gl_migrations` WRITE;
/*!40000 ALTER TABLE `gl_migrations` DISABLE KEYS */;
INSERT INTO `gl_migrations` VALUES (1,'2016_11_07_075705_create_gl_city_table',1),(2,'2016_11_07_075705_create_gl_district_table',1),(3,'2016_11_07_075705_create_gl_dream_table',1),(4,'2016_11_07_075705_create_gl_menu_table',1),(5,'2016_11_07_075705_create_gl_project_table',1),(6,'2016_11_07_075705_create_gl_proset_table',1),(7,'2016_11_07_075705_create_gl_province_table',1),(8,'2016_11_07_075705_create_gl_user_table',1),(9,'2016_11_07_075705_create_gl_web_table',1),(10,'2016_11_07_075705_create_gl_webset_table',1),(11,'2016_11_30_090325_create_gl_company_table',1),(12,'2016_11_30_090325_create_gl_contact_table',1);
/*!40000 ALTER TABLE `gl_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_project`
--

DROP TABLE IF EXISTS `gl_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `img` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `belong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `is_show` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_project`
--

LOCK TABLES `gl_project` WRITE;
/*!40000 ALTER TABLE `gl_project` DISABLE KEYS */;
/*!40000 ALTER TABLE `gl_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_proset`
--

DROP TABLE IF EXISTS `gl_proset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_proset` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_show` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_proset`
--

LOCK TABLES `gl_proset` WRITE;
/*!40000 ALTER TABLE `gl_proset` DISABLE KEYS */;
/*!40000 ALTER TABLE `gl_proset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_province`
--

DROP TABLE IF EXISTS `gl_province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_province` (
  `ProvinceID` bigint(20) NOT NULL,
  `ProvinceName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  `DateUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`ProvinceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_province`
--

LOCK TABLES `gl_province` WRITE;
/*!40000 ALTER TABLE `gl_province` DISABLE KEYS */;
/*!40000 ALTER TABLE `gl_province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_user`
--

DROP TABLE IF EXISTS `gl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_user`
--

LOCK TABLES `gl_user` WRITE;
/*!40000 ALTER TABLE `gl_user` DISABLE KEYS */;
INSERT INTO `gl_user` VALUES (1,'gitlar','e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `gl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_web`
--

DROP TABLE IF EXISTS `gl_web`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_web` (
  `id` int(11) NOT NULL,
  `web_type` char(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_web`
--

LOCK TABLES `gl_web` WRITE;
/*!40000 ALTER TABLE `gl_web` DISABLE KEYS */;
/*!40000 ALTER TABLE `gl_web` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_webset`
--

DROP TABLE IF EXISTS `gl_webset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_webset` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu-belong` int(11) DEFAULT NULL,
  `menu-header` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu-middle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu-footer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_webset`
--

LOCK TABLES `gl_webset` WRITE;
/*!40000 ALTER TABLE `gl_webset` DISABLE KEYS */;
/*!40000 ALTER TABLE `gl_webset` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-16  2:00:01
