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
-- Table structure for table `gl_component`
--

DROP TABLE IF EXISTS `gl_component`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_component` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '组件名',
  `type` int(2) NOT NULL DEFAULT '0' COMMENT '组件类型',
  `html` varchar(255) NOT NULL COMMENT 'html位置',
  `css` varchar(255) NOT NULL DEFAULT '' COMMENT 'css文件目录',
  `js` varchar(255) NOT NULL DEFAULT '' COMMENT 'js文件路径',
  `plugins` text COMMENT '所用插件位置',
  `data` text COMMENT '组件数据格式',
  `create_time` timestamp NOT NULL DEFAULT '2017-12-31 16:00:00',
  `update_time` timestamp NOT NULL DEFAULT '2017-12-31 16:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='组件表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_component`
--

LOCK TABLES `gl_component` WRITE;
/*!40000 ALTER TABLE `gl_component` DISABLE KEYS */;
INSERT INTO `gl_component` VALUES (1,'zotikos',1,'component/zotikos/index.html','component/zotikos/index.css','component/zotikos/index.js','component/zotikos/plugins.json',NULL,'2017-12-31 16:00:00','2017-12-31 16:00:00');
/*!40000 ALTER TABLE `gl_component` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gl_page`
--

DROP TABLE IF EXISTS `gl_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gl_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '路由地址',
  `name` varchar(50) NOT NULL DEFAULT '',
  `component_ids` varchar(255) NOT NULL DEFAULT '' COMMENT '组件ID',
  `content` text COMMENT '各组件的数据',
  `created_at` datetime NOT NULL DEFAULT '2018-01-01 00:00:00',
  `updated_at` datetime NOT NULL DEFAULT '2018-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='前段页面表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gl_page`
--

LOCK TABLES `gl_page` WRITE;
/*!40000 ALTER TABLE `gl_page` DISABLE KEYS */;
INSERT INTO `gl_page` VALUES (1,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(2,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(3,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(4,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(5,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(6,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(7,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(8,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(9,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(10,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(11,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(12,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(13,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(14,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(15,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(16,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(17,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(18,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(19,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(20,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(21,'','test','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00'),(22,'','test2','1',NULL,'2018-01-01 00:00:00','2018-01-01 00:00:00');
/*!40000 ALTER TABLE `gl_page` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-18  2:00:01
