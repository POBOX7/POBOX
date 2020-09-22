-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: pobox
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
-- Table structure for table `about_us`
--

DROP TABLE IF EXISTS `about_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading_image` varchar(500) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_us`
--

LOCK TABLES `about_us` WRITE;
/*!40000 ALTER TABLE `about_us` DISABLE KEYS */;
INSERT INTO `about_us` VALUES (1,'hero_bg.jpg','Who we are','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.','img-1.jpg',0,1,'2020-06-20 07:00:32','2020-06-20 07:00:32');
/*!40000 ALTER TABLE `about_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(225) NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT '1' COMMENT '1 for home page 2 for new arrival 3 for trending 4 for kurties 5 for kurta set 6 for dress',
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (1,'1593273665.png',1,'https://raisinglobal.com/collections/kurta-set','2020-05-31 04:29:58','2020-06-27 16:01:05',NULL),(13,'1593623069.png',2,NULL,'2020-06-09 10:33:22','2020-07-01 17:04:29',NULL),(16,'1593622948.png',1,NULL,'2020-06-15 11:02:33','2020-07-01 17:02:28',NULL),(24,'1593273637.png',1,NULL,'2020-06-25 10:09:29','2020-06-27 16:00:37',NULL),(25,'1593622870.png',1,'https://raisinglobal.com/collections/kurtis/products/off-white-embroidered-cotton-kurti-pants-set','2020-06-28 07:25:52','2020-07-01 17:01:33',NULL),(26,'1593273595.png',3,NULL,'2020-06-09 10:33:22','2020-06-17 16:18:30',NULL),(27,'1593273595.png',4,NULL,'2020-06-09 10:33:22','2020-06-17 16:18:30',NULL),(28,'1593273595.png',5,NULL,'2020-06-09 10:33:22','2020-06-17 16:18:30',NULL),(29,'1593273595.png',6,NULL,'2020-06-09 10:33:22','2020-06-17 16:18:30',NULL);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_image` varchar(500) NOT NULL,
  `blog_date` timestamp NULL DEFAULT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_description` longtext NOT NULL,
  `post_category` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'blog1.jpg','2020-05-15 18:30:00','A look at some of the post-lockdown measures that can be taken by the Fashion Retail Industry.','With the corona pandemic looming all over the world resulting in a complete lockdown in several countries, industries in all sectors everywhere have taken quite a hit especially the F&B sector and the retail industry. With malls and retail outlets being shut a drop-down in sales is inevitable moreover with the factories also being on a standstill one can witness disruption in the supply chain. The impact of the lockdown is one of the biggest crises that the apparel industry has seen in a long time. Amid these inescapable crises of declining demands and inventory build-ups, online platforms are a way to keep sales afloat. But this too has its own set of drawbacks, delayed deliveries being one of the biggest ones. The scenario right now may look bleak however we will eventually see a gradual pick-up in sales once the lockdown is over. While the conditions seem to be quite unpredictable at this point of time, but once the lockdown is over, we will surely witness a surge in offers ranging from major discounts to cashbacks and promotional offers to entice people and make up for the lost sales. The lockdown has led to an increase in the screen time of users where you can find people thoroughly active across the various social media platforms. Branding will a major role in the scenario since all the brands will be vying for customer attention, what is important here is to stand out and provide the customers with the most engaging content that is relevant to the current atmosphere. The brands will then have to swiftly recover from this state and transition proactively into building content that is relevant and keeps the user interested even after lockdown is over. It may require some time for people to bounce back to their pre-pandemic sales behaviour in such a scenario, omni-channel marketing is a great mechanism to leverage on for pushing sales. Since the customers today are omnichannel, it is imperative to adopt this means to serve customers efficiently and effectively. The post lockdown period will witness aggressive marketing strategies from brands to win the goodwill of customers and recover the loses.','ORGANIC','Rakesh','',1,0,'2020-05-16 11:32:55','2020-05-16 11:32:55'),(2,'blog2.jpg','2020-05-15 18:30:00','Why brands should follow their niche and cater the market accordingly?','“A niche market is a small part of a larger market that has its own specific needs, which are different from the larger market in some way.” Defining who your target market is one of the foremost and the most fundamental step of a business. The old adage “Jack of all trades, masters of none” will help you understand the concept of niche marketing better. A business cannot serve everyone and all their needs otherwise hence one needs to be specific when defining your audience. A niche is a specialised portion of a broader market that a brand should target and optimise in order to achieve success in their particular field of business.','ORGANIC','Bhargav','',1,0,'2020-05-16 11:33:14','2020-05-16 11:33:14'),(3,'post-thumb-01.jpg','2020-05-15 18:30:00','Ashwagandha: The #1 Herb in the World for Anxiety?','Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...','Kurties','','',1,0,'2020-05-16 11:33:14','2020-05-16 11:33:14'),(4,'post-thumb-01.jpg','2020-05-15 18:30:00','Ashwagandha: The #1 Herb in the World for Anxiety?','Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...','Kurta Sets','','',1,0,'2020-05-16 11:33:14','2020-05-16 11:33:14'),(5,'post-thumb-01.jpg','2020-05-15 18:30:00','Ashwagandha: The #1 Herb in the World for Anxiety?','Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...','Dress','','',1,0,'2020-05-16 11:33:14','2020-05-16 11:33:14'),(6,'post-thumb-01.jpg','2020-05-15 18:30:00','Ashwagandha: The #1 Herb in the World for Anxiety?','Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...','ORGANIC','','',1,0,'2020-05-16 11:33:14','2020-05-16 11:33:14'),(7,'post-thumb-01.jpg','2020-05-15 18:30:00','Ashwagandha: The #1 Herb in the World for Anxiety?','Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...','ORGANIC','','',1,0,'2020-05-16 11:33:15','2020-05-16 11:33:15'),(8,'post-thumb-01.jpg','2020-05-15 18:30:00','Ashwagandha: The #1 Herb in the World for Anxiety?','Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...','ORGANIC','','',1,0,'2020-05-16 11:33:15','2020-05-16 11:33:15'),(9,'post-thumb-01.jpg','2020-05-15 18:30:00','Ashwagandha: The #1 Herb in the World for Anxiety?','Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...','ORGANIC','','',1,0,'2020-05-16 11:33:15','2020-05-16 11:33:15'),(10,'post-thumb-01.jpg','2020-05-15 18:30:00','Ashwagandha: The #1 Herb in the World for Anxiety?','Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...','ORGANIC','','',1,0,'2020-05-16 11:33:15','2020-05-16 11:33:15'),(11,'post-thumb-01.jpg','2020-05-15 18:30:00','Ashwagandha: The #1 Herb in the World for Anxiety?','Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...','','','',1,0,'2020-05-16 11:33:15','2020-05-16 11:33:15');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'brand new',1,1,'2020-06-12 06:20:23','2020-06-11 13:47:43','2020-06-08 12:26:27'),(2,'brand2',1,1,'2020-06-12 06:20:23','2020-06-12 06:09:41','2020-06-08 12:26:42'),(3,'Melange',1,0,'2020-06-12 06:20:23','2020-06-22 11:14:12','2020-06-08 12:26:42'),(4,'Indiya',1,0,'2020-06-12 06:20:23','2020-06-22 11:14:27','2020-06-08 12:26:42'),(5,'Biba',1,0,'2020-06-12 06:20:23','2020-06-17 16:58:32','2020-06-08 12:26:42'),(6,'Puma',1,0,'2020-06-12 06:20:23','2020-06-19 09:44:51','2020-06-08 12:26:42'),(7,'brand7',1,1,'2020-06-12 06:20:23','2020-06-11 13:51:13','2020-06-08 12:26:42'),(8,'brand8',1,1,'2020-06-12 06:20:23','2020-06-17 07:03:25','2020-06-08 12:26:42'),(9,'Zara',1,1,'2020-06-12 06:54:23','2020-06-17 10:09:27','2020-06-12 06:54:23'),(10,'Test1',1,1,'2020-06-12 06:56:53','2020-06-17 07:11:51','2020-06-12 06:56:53'),(11,'Testn',1,1,'2020-06-13 07:07:04','2020-06-13 07:07:58','2020-06-13 07:07:04'),(12,'test',1,1,'2020-06-15 07:58:25','2020-06-17 07:00:46','2020-06-15 07:58:25'),(13,'Levies',1,1,'2020-06-17 07:01:08','2020-06-17 07:01:19','2020-06-17 07:01:08'),(14,'skjhdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddewkaeiwoewhdsnfkcndfoeirheosfnsknfionwownds cidnsdsd',1,1,'2020-06-19 07:14:22','2020-06-19 12:30:12','2020-06-19 07:14:22'),(15,'test hhhhknnknk',0,0,'2020-06-22 09:32:21','2020-06-22 13:39:41','2020-06-22 09:32:21'),(16,'njdsjdbsj ni111',1,1,'2020-06-22 09:32:39','2020-06-22 09:32:44','2020-06-22 09:32:39'),(17,'laxmipati saree',1,0,'2020-06-24 07:02:49','2020-06-24 13:01:33','2020-06-24 07:02:49'),(18,'vedik',1,0,'2020-06-24 13:01:46','2020-06-24 13:01:46','2020-06-24 13:01:46');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Kurties','1593840928.png',1,0,'2020-05-30 20:15:11','2020-07-04 05:35:28',NULL),(2,'Kurta Sets','green-potted-plants-on-brown-wooden-rack-3489129.jpg',1,0,'2020-05-30 20:15:24','2020-06-17 16:37:23',NULL),(3,'Dress','quick delivery.png',1,0,'2020-05-30 20:15:11','2020-06-17 16:38:26',NULL),(4,'c1','download.jpg',1,1,'2020-06-05 06:27:55','2020-06-05 06:28:06',NULL),(5,'d','download.jpg',1,1,'2020-06-05 06:31:09','2020-06-05 06:31:15',NULL),(6,'Testing','100939_2.jpg',1,1,'2020-06-06 06:51:07','2020-06-06 06:51:12',NULL),(7,'Test','pexels-photo-220453.jpeg',1,1,'2020-06-08 05:10:04','2020-06-08 05:10:04',NULL),(8,'Test','download (1).jpg',1,1,'2020-06-08 06:21:27','2020-06-08 06:21:52',NULL),(9,'test','pexels-photo-220453.jpeg',1,1,'2020-06-08 11:35:17','2020-06-08 11:36:01',NULL),(10,'TESTINGggg','ISSUE_3.png',1,1,'2020-06-08 12:07:20','2020-06-08 12:07:47',NULL),(11,'SHIVANI','ISSUE_3.png',1,1,'2020-06-08 12:57:58','2020-06-08 12:58:33',NULL),(12,'test','images.jpg',1,1,'2020-06-09 05:39:16','2020-06-09 05:39:38',NULL),(13,'c1','download.jpg',1,1,'2020-06-09 06:40:29','2020-06-09 06:40:33',NULL),(14,'Kurties','1593001180.png',1,1,'2020-06-12 10:41:13','2020-06-24 12:19:40',NULL),(15,'testing','ISSUE_3.png',1,1,'2020-06-17 06:58:43','2020-06-17 07:00:13',NULL),(16,'test','ISSUE_6.png',1,1,'2020-06-17 07:00:27','2020-06-17 07:00:31',NULL),(17,'Test1sadsasadsakjbkjasjlnlkasnklasnkldnaskldnlkasndlknsakdnlasndklasndlkasndlnaslkdnlkasndklasnklnasslkdnaslknaslkndlkasndlksa','maxresdefault.jpg',1,1,'2020-06-17 07:23:50','2020-06-17 07:26:11',NULL),(18,'sadasdasndlknasndklsandklnasdnlksandklanlsdnlansklnlksanlknandnaslkdnlaknsd','maxresdefault.jpg',1,1,'2020-06-17 07:26:28','2020-06-17 07:26:45',NULL),(19,'Test1sadsasadsakjbkjasjlnlkasnklasnkldnaskldnlkasndlknsakdnlasndklasndlkasndlnaslkdnlkasndklasnklnasslkdnaslknaslkndlkasndlksa','maxresdefault.jpg',1,1,'2020-06-17 07:27:05','2020-06-17 07:27:13',NULL),(20,'Test1sadsasadsakjbkjasjlnlkasnklasnkldnaskldnlkasndlknsakdnlasndklasndlkasndlnaslkdnlkasndklasnklnasslkdnaslknaslkndlkasndlksa','maxresdefault.jpg',0,1,'2020-06-17 07:27:26','2020-06-17 11:14:14',NULL),(21,'Mariadsjdkhskhshffhkdlfhkdlhflkdhflkdshflskflksdfkldkfhdjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjfkkkkkkkllllllljddddddjkhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhshfkldhfdlhgllllllllllllllllllllllllllllllllll','1592550811.jpg',1,1,'2020-06-19 07:13:31','2020-06-19 09:44:11',NULL),(22,'fdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd','1592559123.jpg',1,1,'2020-06-19 09:32:03','2020-06-19 12:20:47',NULL),(23,'Maria Character limit','1592569276.jpg',1,1,'2020-06-19 09:40:56','2020-06-22 11:13:38',NULL),(24,'Ready Made','1592569302.jpg',1,1,'2020-06-19 12:21:42','2020-06-27 16:01:35',NULL),(25,'Fabric','1593273800.jpg',1,0,'2020-06-19 12:23:09','2020-06-27 16:03:20',NULL),(26,'vccccccccccccvvvvvxd','1592818277.jpg',1,1,'2020-06-22 09:31:17','2020-06-22 10:39:57',NULL),(27,'New Test','1593001196.jpg',1,1,'2020-06-24 12:19:56','2020-06-24 12:20:00',NULL),(28,'sarees','1593001794.jpg',1,1,'2020-06-24 12:29:54','2020-06-27 16:01:27',NULL),(29,'Designer ware','1593273825.png',1,0,'2020-06-27 16:03:45','2020-06-27 16:03:45',NULL),(30,'Western wear','1593273874.jpg',0,0,'2020-06-27 16:04:34','2020-07-01 16:21:50',NULL),(31,'Tops','1593414503.jpg',1,1,'2020-06-29 07:08:23','2020-07-01 13:24:02',NULL),(32,'Skirt','1593620608.jpg',1,0,'2020-07-01 16:23:29','2020-07-01 16:23:29',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `hex_code` varchar(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (1,'Black','#000000',1,0,'2020-06-09 09:10:32','2020-07-01 16:40:10'),(2,'Green','#139a2a',1,0,'2020-06-09 09:11:53','2020-07-01 16:40:09'),(3,'Red','#e60a0a',1,0,'2020-06-09 09:41:24','2020-07-01 16:40:08'),(4,'Orange','#e86721',1,0,'2020-06-09 12:51:49','2020-07-01 16:40:08'),(5,'Pink','#d41c7e',0,0,'2020-06-09 12:52:01','2020-07-01 16:40:07'),(6,'White',NULL,1,1,'2020-06-09 12:52:20','2020-06-09 12:52:20'),(7,'cream',NULL,1,1,'2020-06-09 12:52:28','2020-06-15 10:03:17'),(8,'Blue',NULL,1,1,'2020-06-11 13:52:40','2020-06-11 13:53:00'),(9,'brown','#6f4444',1,1,'2020-06-12 06:31:15','2020-06-17 16:59:23'),(10,'Snow white','#f5f5f5',1,0,'2020-06-12 06:37:18','2020-07-01 16:40:46'),(11,'Black1',NULL,1,1,'2020-06-12 07:10:27','2020-06-15 08:06:06'),(12,'purple','#9729c7',1,1,'2020-06-15 07:58:48','2020-06-17 16:59:09'),(13,'Baby pink','#dfb9d9',1,1,'2020-06-15 09:07:14','2020-06-17 16:59:59'),(14,'Grey','#ccc7c7',1,1,'2020-06-15 10:32:34','2020-06-17 13:05:36'),(15,'biege','#ffffff',1,1,'2020-06-15 12:19:55','2020-06-17 12:12:46'),(16,'yellow','#ffff80',1,1,'2020-06-15 12:33:30','2020-06-17 07:29:24'),(17,'Sky bluee','#207c7e',1,1,'2020-06-17 07:13:25','2020-06-17 07:13:39'),(18,'Neon','#d1fa05',0,0,'2020-06-17 17:04:03','2020-07-01 16:40:06'),(19,'Mariajwkkkkkkkkkkk','#000000',1,1,'2020-06-24 06:12:53','2020-06-24 13:04:33'),(20,'Maria','#d39797',1,1,'2020-06-24 07:03:11','2020-06-24 13:04:44'),(21,'Light B','#85e0ff',1,0,'2020-07-01 16:25:52','2020-07-02 06:31:27');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `contact_message` longtext NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` VALUES (1,'test','testemail@gmail.com',9856656344,'test message',0,1,'2020-06-30 14:12:32','2020-06-30 14:12:32'),(2,'test','testemail@gmail.com',9856656344,'test message',0,1,'2020-06-30 14:13:20','2020-06-30 14:13:20'),(3,'Ramesh','rakeshsathwara.rc@gmail.com',9856236589,'testts',0,1,'2020-07-01 10:24:04','2020-07-01 10:24:04'),(4,'Ramesh','rakeshsathwara.rc@gmail.com',9856236589,'testts',0,1,'2020-07-01 10:24:34','2020-07-01 10:24:34'),(5,'Rakesh','rakeshsathwara.rc@gmail.com',9856236589,'test',0,1,'2020-07-01 10:36:14','2020-07-01 10:36:14'),(6,'Rakesh','rakeshsathwara.rc@gmail.com',8956546565,'tests',0,1,'2020-07-01 10:50:21','2020-07-01 10:50:21');
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discount_banner`
--

DROP TABLE IF EXISTS `discount_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discount_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discount_banner`
--

LOCK TABLES `discount_banner` WRITE;
/*!40000 ALTER TABLE `discount_banner` DISABLE KEYS */;
INSERT INTO `discount_banner` VALUES (1,'1593622992.jpg','http://3.7.41.47/pobox_new/pobox/public/new-arrival','2020-06-09 13:36:37','2020-07-01 17:03:47');
/*!40000 ALTER TABLE `discount_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `heading_image` varchar(500) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 = inactive, 1 = active',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (2,'colorful-fabrics-5872.jpg','Term & Condition','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec porttitor lectus. Morbi suscipit imperdiet egestas. Etiam sollicitudin velit vitae nibh lacinia sodales. Aenean fringilla odio eu venenatis maximus. Nullam porta, erat porta auctor malesuada, mi tortor blandit neque, at blandit leo nisl nec nibh. Mauris sed iaculis nulla. Nullam dictum nec nunc at molestie. Phasellus sollicitudin eu elit a convallis. Pellentesque pulvinar nec lectus eget consequat. Integer ullamcorper ipsum sem, id dignissim metus interdum non.</p>\r\n\r\n<p><strong>TEST TEST TEST TETS</strong></p>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>',1,0,NULL,'2020-07-01 16:57:07','2020-07-01 16:57:07'),(3,'colorful-fabrics-5872.jpg','Return Policy','<p>Term &amp; Condition Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec porttitor lectus. Morbi suscipit imperdiet egestas. Etiam sollicitudin velit vitae nibh lacinia sodales. Aenean fringilla odio eu venenatis maximus. Nullam porta, erat porta auctor malesuada, mi tortor blandit neque, at blandit leo nisl nec nibh. Mauris sed iaculis nulla. Nullam dictum nec nunc at molestie. Phasellus sollicitudin eu elit a convallis. Pellentesque pulvinar nec lectus eget consequat. Integer ullamcorper ipsum sem, id dignissim metus interdum non.</p>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>\r\n\r\n<ol>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>',1,0,NULL,'2020-06-27 16:38:18','2020-06-27 16:38:18'),(4,'colorful-fabrics-5872.jpg','How to order','<h1>How to order</h1>\r\n\r\n<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec porttitor lectus. Morbi suscipit imperdiet egestas. Etiam sollicitudin velit vitae nibh lacinia sodales. Aenean fringilla odio eu venenatis maximus. Nullam porta, erat porta auctor malesuada, mi tortor blandit neque, at blandit leo nisl nec nibh. Mauris sed iaculis nulla. Nullam dictum nec nunc at molestie. Phasellus sollicitudin eu elit a convallis. Pellentesque pulvinar nec lectus eget consequat. Integer ullamcorper ipsum sem, id dignissim metus interdum non.</h2>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>',1,0,NULL,'2020-06-27 16:38:32','2020-06-27 16:38:32'),(5,'colorful-fabrics-5872.jpg','How to track','<h1><strong>How to track </strong></h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec porttitor lectus. Morbi suscipit imperdiet egestas. Etiam sollicitudin velit vitae nibh lacinia sodales. Aenean fringilla odio eu venenatis maximus. Nullam porta, erat porta auctor malesuada, mi tortor blandit neque, at blandit leo nisl nec nibh. Mauris sed iaculis nulla. Nullam dictum nec nunc at molestie. Phasellus sollicitudin eu elit a convallis. Pellentesque pulvinar nec lectus eget consequat. Integer ullamcorper ipsum sem, id dignissim metus interdum non.</p>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<ol>\r\n	<li>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</li>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n</ol>',1,0,NULL,'2020-06-27 16:38:39','2020-06-27 16:38:39'),(6,'colorful-fabrics-5872.jpg','Privacy Policy','<p><strong>Privacy Policy&nbsp;</strong></p>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.msn.com/en-in/news/other/army-rushes-more-troops-to-ladakh-after-galwan-clash/ar-BB15K2IP?ocid=spartan-ntp-feeds\" style=\"float:left\" />Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>',1,0,NULL,'2020-06-29 07:34:46','2020-06-29 07:34:46'),(7,'hero_bg.jpg','Fashion Blogger','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec porttitor lectus. Morbi suscipit imperdiet egestas. Etiam sollicitudin velit vitae nibh lacinia sodales. Aenean fringilla odio eu venenatis maximus. Nullam porta, erat porta auctor malesuada, mi tortor blandit neque, at blandit leo nisl nec nibh. Mauris sed iaculis nulla. Nullam dictum nec nunc at molestie. Phasellus sollicitudin eu elit a convallis. Pellentesque pulvinar nec lectus eget consequat. Integer ullamcorper ipsum sem, id dignissim metus interdum non.</p>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<ul>\r\n	<li>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</li>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n</ul>',1,0,NULL,'2020-06-26 07:12:39','2020-06-26 07:12:39'),(8,'colorful-fabrics-5872.jpg','Affiliate','<ol>\r\n	<li><em><strong>Affiliate Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec porttitor lectus. Morbi suscipit imperdiet egestas. Etiam sollicitudin velit vitae nibh lacinia sodales. Aenean fringilla odio eu venenatis maximus. Nullam porta, erat porta auctor malesuada, mi tortor blandit neque, at blandit leo nisl nec nibh. Mauris sed iaculis nulla. Nullam dictum nec nunc at molestie. Phasellus sollicitudin eu elit a convallis. Pellentesque pulvinar nec lectus eget consequat. Integer ullamcorper ipsum sem, id dignissim metus interdum non.</strong></em></li>\r\n</ol>\r\n\r\n<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>\r\n\r\n<ol>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus.</li>\r\n	<li>Ut congue consequat auctor. Nunc a neque justo.</li>\r\n	<li>Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet.</li>\r\n	<li>Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n</ol>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>',1,0,NULL,'2020-06-27 16:37:36','2020-06-27 16:37:36'),(9,'colorful-fabrics-5872.jpg','Shipping Info','<p>Quisque condimentum pretium tempor. Suspendisse ornare molestie purus, id porta purus convallis nec. Duis sit amet ante ante. Quisque feugiat ornare magna eu efficitur. Integer ut est eu elit suscipit faucibus. In a volutpat sapien, in varius massa. Curabitur faucibus a lectus sed hendrerit. Curabitur volutpat quis metus sed maximus. Cras est tortor, convallis volutpat magna at, euismod interdum arcu. Nulla vel volutpat nisl. Duis et scelerisque neque. Sed non molestie eros, eu scelerisque nibh. Aliquam dapibus, lorem ac tincidunt feugiat, augue augue scelerisque lectus, ac scelerisque urna urna vel erat. Nulla a orci neque. Maecenas turpis est, mollis ullamcorper augue id, pharetra semper sem.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>\r\n\r\n<p>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus. Ut congue consequat auctor. Nunc a neque justo. Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet. Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</p>\r\n\r\n<ol>\r\n	<li>Suspendisse a lectus est. Donec consequat mauris sit amet accumsan finibus.</li>\r\n	<li>Ut congue consequat auctor. Nunc a neque justo.</li>\r\n	<li>Etiam interdum condimentum nunc, a sollicitudin mauris elementum sit amet.</li>\r\n	<li>Mauris sit amet congue quam. Etiam ac molestie leo, id pellentesque nunc.</li>\r\n</ol>\r\n\r\n<p>Sed sit amet euismod ipsum. Ut ut tellus purus. Ut sollicitudin metus at posuere laoreet. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas varius pulvinar porta. Etiam non ligula mi. Donec eget dui mollis, interdum risus non, tincidunt nisi. Vivamus et nunc at justo volutpat sodales nec in leo. Proin ac lorem hendrerit, vulputate nisl sit amet, varius eros.</p>',1,0,NULL,'2020-06-27 16:38:01','2020-06-27 16:38:01');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image`
--

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
INSERT INTO `product_image` VALUES (1,1,'kurta_1.jpg',1,0,'2020-06-08 12:02:40','2020-06-08 12:02:40'),(2,1,'kurta_3.jpg',1,0,'2020-06-08 12:03:17','2020-06-08 12:03:17'),(3,1,'kurta_1.jpg',1,0,'2020-06-08 13:47:22','2020-06-08 13:47:22'),(4,2,'kurta_3.jpg',1,0,'2020-06-08 13:47:41','2020-06-08 13:47:41'),(5,11,'kurta_1.jpg',1,0,'2020-06-08 13:47:41','2020-06-08 13:47:41'),(6,1,'kurta_1.jpg',1,0,'2020-06-08 13:47:41','2020-06-08 13:47:41'),(7,11,'pobox_2_black.jpg',1,0,'2020-06-09 12:04:38','2020-06-09 12:04:38'),(8,16,'pobox_1_black.jpg',1,0,'2020-06-09 12:04:38','2020-06-09 12:04:38'),(9,12,'pobox_2_black.jpg',1,0,'2020-06-09 12:05:12','2020-06-09 12:05:12'),(10,12,'pobox_1_black.jpg',1,0,'2020-06-09 12:05:12','2020-06-09 12:05:12'),(12,7,'pobox_1_black.jpg',1,0,'2020-06-11 10:14:09','2020-06-11 10:14:09'),(13,13,'pobox_3_black.jpg',1,0,'2020-06-11 11:02:04','2020-06-11 11:02:04'),(20,14,'images.jpg',1,0,'2020-06-12 08:07:39','2020-06-12 08:07:39'),(21,17,'pobox_3_black.jpg',1,0,'2020-06-15 12:24:01','2020-06-15 12:24:01'),(22,19,'pobox_3_black.jpg',1,0,'2020-06-17 07:31:08','2020-06-17 07:31:08'),(23,20,'pobox_3_black.jpg',1,0,'2020-06-17 07:46:11','2020-06-17 07:46:11'),(24,21,'pobox_3_black.jpg',1,0,'2020-06-17 07:54:25','2020-06-17 07:54:25'),(28,22,'A10I5918 copy.jpg',1,0,'2020-06-17 17:06:38','2020-06-17 17:06:38'),(29,6,'A10I5915 copy.jpg',1,0,'2020-06-17 17:06:38','2020-06-17 17:06:38'),(30,22,'A10I5913 copy.jpg',1,0,'2020-06-17 17:06:38','2020-06-17 17:06:38'),(31,26,'159297933710.jpg',1,0,'2020-06-24 06:15:37','2020-06-24 06:15:37'),(32,4,'15930638405.webp',1,0,'2020-06-25 05:44:00','2020-06-25 05:44:00'),(33,4,'15930638405.jpeg',1,0,'2020-06-25 05:44:00','2020-06-25 05:44:00'),(34,4,'159306384015.jpg',1,0,'2020-06-25 05:44:00','2020-06-25 05:44:00'),(36,29,'image1.jpg',1,0,'2020-06-26 13:00:45','2020-06-26 13:00:45'),(37,29,'159317644511.jpg',1,0,'2020-06-26 13:00:45','2020-06-26 13:00:45'),(38,29,'15931764456.jpg',1,0,'2020-06-26 13:00:45','2020-06-26 13:00:45'),(39,38,'159359437715.jpg',1,0,'2020-07-01 09:06:17','2020-07-01 09:06:17'),(40,39,'15936214269.jpg',1,0,'2020-07-01 16:37:07','2020-07-01 16:37:07'),(41,39,'159362142714.jpg',1,0,'2020-07-01 16:37:08','2020-07-01 16:37:08'),(42,39,'159362142814.jpg',1,0,'2020-07-01 16:37:09','2020-07-01 16:37:09'),(44,50,'15937727408.jpg',1,0,'2020-07-03 10:39:00','2020-07-03 10:39:00'),(45,50,'159377274015.jpg',1,0,'2020-07-03 10:39:00','2020-07-03 10:39:00'),(48,30,'159383726312.jpg',1,0,'2020-07-04 04:34:24','2020-07-04 04:34:24'),(49,30,'15938372645.jpg',1,0,'2020-07-04 04:34:25','2020-07-04 04:34:25'),(50,30,'159383726514.jpg',1,0,'2020-07-04 04:34:26','2020-07-04 04:34:26'),(51,30,'159383726611.jpg',1,0,'2020-07-04 04:34:27','2020-07-04 04:34:27'),(52,51,'159383745115.jpg',1,0,'2020-07-04 04:37:32','2020-07-04 04:37:32'),(53,51,'159383745213.jpg',1,0,'2020-07-04 04:37:33','2020-07-04 04:37:33'),(54,51,'15938374538.jpg',1,0,'2020-07-04 04:37:34','2020-07-04 04:37:34'),(55,51,'15938374546.jpg',1,0,'2020-07-04 04:37:35','2020-07-04 04:37:35'),(56,44,'15938389478.jpg',1,0,'2020-07-04 05:02:28','2020-07-04 05:02:28'),(57,44,'159383894812.jpg',1,0,'2020-07-04 05:02:28','2020-07-04 05:02:28'),(58,44,'15938389486.jpg',1,0,'2020-07-04 05:02:29','2020-07-04 05:02:29'),(59,35,'159383899411.jpg',1,0,'2020-07-04 05:03:15','2020-07-04 05:03:15'),(60,35,'159383899513.jpg',1,0,'2020-07-04 05:03:16','2020-07-04 05:03:16'),(61,35,'159383899611.jpg',1,0,'2020-07-04 05:03:17','2020-07-04 05:03:17'),(62,35,'159383899710.jpg',1,0,'2020-07-04 05:03:18','2020-07-04 05:03:18'),(63,34,'15938390609.jpg',1,0,'2020-07-04 05:04:21','2020-07-04 05:04:21'),(64,34,'15938390618.jpg',1,0,'2020-07-04 05:04:22','2020-07-04 05:04:22'),(65,34,'159383906214.jpg',1,0,'2020-07-04 05:04:23','2020-07-04 05:04:23'),(66,34,'15938390635.jpg',1,0,'2020-07-04 05:04:24','2020-07-04 05:04:24'),(67,33,'159383912012.jpg',1,0,'2020-07-04 05:05:20','2020-07-04 05:05:20'),(68,33,'159383912013.jpg',1,0,'2020-07-04 05:05:21','2020-07-04 05:05:21'),(69,33,'159383912114.jpg',1,0,'2020-07-04 05:05:22','2020-07-04 05:05:22'),(70,33,'159383912213.jpg',1,0,'2020-07-04 05:05:23','2020-07-04 05:05:23'),(71,43,'159384106414.jpg',1,0,'2020-07-04 05:37:45','2020-07-04 05:37:45'),(72,43,'15938410659.jpg',1,0,'2020-07-04 05:37:46','2020-07-04 05:37:46'),(73,43,'159384106612.jpg',1,0,'2020-07-04 05:37:47','2020-07-04 05:37:47'),(74,43,'159384106713.jpg',1,0,'2020-07-04 05:37:47','2020-07-04 05:37:47'),(75,42,'159384109615.jpg',1,0,'2020-07-04 05:38:16','2020-07-04 05:38:16'),(76,42,'159384109611.jpg',1,0,'2020-07-04 05:38:17','2020-07-04 05:38:17'),(77,42,'159384109711.jpg',1,0,'2020-07-04 05:38:18','2020-07-04 05:38:18'),(78,42,'15938410989.jpg',1,0,'2020-07-04 05:38:19','2020-07-04 05:38:19'),(79,41,'15938413728.jpg',1,0,'2020-07-04 05:42:53','2020-07-04 05:42:53'),(80,41,'15938413739.jpg',1,0,'2020-07-04 05:42:54','2020-07-04 05:42:54'),(81,41,'15938413746.jpg',1,0,'2020-07-04 05:42:55','2020-07-04 05:42:55'),(82,41,'159384137511.jpg',1,0,'2020-07-04 05:42:56','2020-07-04 05:42:56'),(83,50,'159385086510.jpg',1,0,'2020-07-04 08:21:05','2020-07-04 08:21:05'),(84,52,'159385112214.jpg',1,0,'2020-07-04 08:25:23','2020-07-04 08:25:23'),(85,52,'159385112315.jpg',1,0,'2020-07-04 08:25:23','2020-07-04 08:25:23');
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_size`
--

DROP TABLE IF EXISTS `product_size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=355 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_size`
--

LOCK TABLES `product_size` WRITE;
/*!40000 ALTER TABLE `product_size` DISABLE KEYS */;
INSERT INTO `product_size` VALUES (13,13,1,5,'2020-06-11 11:02:04',NULL),(41,15,2,10,'2020-06-15 10:29:27',NULL),(56,2,2,10,'2020-06-16 09:37:04',NULL),(66,20,2,2,'2020-06-17 07:56:38',NULL),(76,18,4,1,'2020-06-17 16:02:30',NULL),(77,18,3,5,'2020-06-17 16:02:30',NULL),(78,18,1,10,'2020-06-17 16:02:30',NULL),(98,14,1,1,'2020-06-22 06:54:53',NULL),(100,23,2,3,'2020-06-22 13:23:14',NULL),(107,22,1,5,'2020-06-23 11:33:02',NULL),(108,22,2,10,'2020-06-23 11:33:02',NULL),(109,22,3,5,'2020-06-23 11:33:02',NULL),(126,7,3,10,'2020-06-25 05:17:10',NULL),(127,27,2,2,'2020-06-25 05:34:59',NULL),(128,27,4,1,'2020-06-25 05:34:59',NULL),(132,26,3,4,'2020-06-25 08:50:14',NULL),(133,1,1,10,'2020-06-25 08:51:44',NULL),(134,24,1,1,'2020-06-25 09:40:54',NULL),(146,16,1,10,'2020-06-26 10:04:44',NULL),(147,17,5,2,'2020-06-26 10:24:07',NULL),(148,10,2,10,'2020-06-26 12:02:54',NULL),(149,10,3,10,'2020-06-26 12:02:54',NULL),(158,6,2,15,'2020-06-29 04:34:38',NULL),(174,31,2,1,'2020-06-30 07:09:41',NULL),(175,32,3,3,'2020-06-30 08:51:18',NULL),(176,5,3,5,'2020-06-30 09:04:37',NULL),(177,25,2,10,'2020-06-30 09:10:21',NULL),(178,4,1,10,'2020-06-30 09:11:21',NULL),(179,4,2,15,'2020-06-30 09:11:21',NULL),(180,4,3,20,'2020-06-30 09:11:21',NULL),(201,36,1,10,'2020-07-01 08:58:44',NULL),(202,36,2,10,'2020-07-01 08:58:44',NULL),(203,36,3,10,'2020-07-01 08:58:44',NULL),(207,38,1,10,'2020-07-01 09:06:17',NULL),(208,38,2,10,'2020-07-01 09:06:17',NULL),(209,38,3,10,'2020-07-01 09:06:17',NULL),(213,37,1,10,'2020-07-01 12:05:16',NULL),(214,37,2,15,'2020-07-01 12:05:16',NULL),(215,37,3,10,'2020-07-01 12:05:16',NULL),(242,29,2,20,'2020-07-02 06:42:09',NULL),(261,21,3,5,'2020-07-03 05:34:54',NULL),(262,21,2,10,'2020-07-03 05:34:54',NULL),(263,21,1,15,'2020-07-03 05:34:54',NULL),(264,45,2,2,'2020-07-03 06:57:33',NULL),(265,46,2,10,'2020-07-03 07:00:57',NULL),(266,47,1,1,'2020-07-03 07:01:24',NULL),(270,48,1,0,'2020-07-03 07:48:44',NULL),(271,19,3,5,'2020-07-03 07:57:20',NULL),(280,28,1,5,'2020-07-03 10:49:07',NULL),(281,28,2,10,'2020-07-03 10:49:07',NULL),(282,28,3,15,'2020-07-03 10:49:07',NULL),(283,28,4,20,'2020-07-03 10:49:07',NULL),(293,39,1,5,'2020-07-03 11:56:10',NULL),(294,39,5,10,'2020-07-03 11:56:10',NULL),(295,49,1,1,'2020-07-03 12:03:02',NULL),(306,30,2,1,'2020-07-04 04:38:35',NULL),(307,30,1,2,'2020-07-04 04:38:35',NULL),(308,30,3,5,'2020-07-04 04:38:35',NULL),(309,30,8,6,'2020-07-04 04:38:35',NULL),(310,51,1,1,'2020-07-04 04:43:48',NULL),(311,51,6,5,'2020-07-04 04:43:48',NULL),(312,51,3,3,'2020-07-04 04:43:48',NULL),(322,35,1,10,'2020-07-04 05:11:22',NULL),(329,43,1,10,'2020-07-04 05:37:47',NULL),(330,43,3,10,'2020-07-04 05:37:48',NULL),(331,43,2,10,'2020-07-04 05:37:48',NULL),(332,42,1,10,'2020-07-04 05:38:19',NULL),(333,42,3,10,'2020-07-04 05:38:19',NULL),(334,41,1,10,'2020-07-04 05:42:56',NULL),(335,41,3,10,'2020-07-04 05:42:56',NULL),(336,41,2,10,'2020-07-04 05:42:56',NULL),(337,34,1,5,'2020-07-04 05:43:43',NULL),(338,34,2,10,'2020-07-04 05:43:43',NULL),(339,33,1,5,'2020-07-04 05:43:46',NULL),(340,33,2,10,'2020-07-04 05:43:46',NULL),(341,33,3,15,'2020-07-04 05:43:47',NULL),(342,33,4,20,'2020-07-04 05:43:47',NULL),(346,50,1,5,'2020-07-04 08:21:05',NULL),(347,50,2,10,'2020-07-04 08:21:05',NULL),(348,50,3,5,'2020-07-04 08:21:05',NULL),(349,52,1,5,'2020-07-04 08:25:23',NULL),(350,52,2,5,'2020-07-04 08:25:23',NULL),(351,52,3,5,'2020-07-04 08:25:23',NULL),(354,44,2,5,'2020-07-06 13:28:19',NULL);
/*!40000 ALTER TABLE `product_size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `name` varchar(225) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `description` text,
  `slider_image` varchar(500) DEFAULT NULL,
  `image` varchar(225) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `mrp` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `gst` decimal(10,2) NOT NULL DEFAULT '0.00',
  `gstper` int(11) NOT NULL DEFAULT '5',
  `sku` varchar(255) DEFAULT NULL,
  `highlight` int(11) NOT NULL DEFAULT '1',
  `is_featured` tinyint(4) DEFAULT '0',
  `is_trending` tinyint(4) NOT NULL DEFAULT '1',
  `is_new_arrival` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,14,6,4,'Kurti','test1 ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnn','Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.','<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>','offer-banner-desktop.PNG','15929800238.jpg',500,100,10,0.00,5,'#123',1,0,1,0,1,0,'2020-05-30 19:52:10','2020-07-01 10:13:57',NULL),(2,3,12,2,'Long Dress',NULL,'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.','<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.2</p>','banner.png','img-product7.png',80,100,20,0.00,5,'#123',1,0,0,1,1,1,'2020-05-30 19:52:10','2020-07-01 10:14:06',NULL),(3,3,4,5,'Pink Dress',NULL,'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.','<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.3</p>','offer-banner-desktop.PNG','Shop Kurta Sets.png',70,30,30,0.00,5,'#6789',1,1,0,1,1,0,'2020-05-30 19:54:47','2020-07-01 10:14:16',NULL),(4,2,4,1,'Kurta pajama set','This is great','Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.','<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.</p>',NULL,'A10I5725 copy.jpg',275,500,45,0.00,5,'#123',1,1,0,1,1,1,'2020-05-30 20:02:36','2020-07-01 10:15:01',NULL),(5,2,3,5,'Kurta 7','test1 ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnn','ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnn','<p>ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnn</p>',NULL,'Shop Kurta Sets.png',1000,1100,10,0.00,5,'#123',1,0,1,1,1,1,'2020-06-01 15:04:12','2020-07-01 10:13:20',NULL),(6,3,3,1,'Kurti 8',NULL,NULL,NULL,NULL,'A10I5915 copy.jpg',100,90,10,0.00,5,'#123',1,1,1,1,1,1,'2020-06-01 15:04:12','2020-07-01 10:17:25',NULL),(7,28,17,5,'Kurti 1','test1 ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnn','ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnnksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnn',NULL,NULL,'pobox_1_black.jpg',90,100,10,0.00,5,'#56778',1,0,1,1,1,1,'2020-06-01 15:05:49','2020-07-01 10:13:45',NULL),(8,2,4,1,'kurta 12',NULL,NULL,NULL,'banner.png','pobox_1_black.jpg',80,90,10,0.00,5,NULL,1,1,0,1,1,0,'2020-06-01 15:05:49',NULL,NULL),(9,2,1,NULL,'kurta 13',NULL,NULL,NULL,NULL,'kurta_1.jpg',90,100,10,0.00,5,NULL,1,0,0,1,1,0,'2020-06-01 15:07:24','2020-06-09 12:45:31',NULL),(10,3,3,4,'Orange dress',NULL,'This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....','<p>This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....</p>',NULL,'pobox_5_black.jpg',2599,2699,10,0.00,5,'#6789',1,0,0,1,1,1,'2020-06-09 12:04:10','2020-07-01 10:17:33',NULL),(11,2,3,9,'Blaze Cotton Kurta',NULL,'This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....','<p>This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....</p>',NULL,'pobox_5_black.jpg',2599,2699,10,0.00,5,'#6789',1,0,1,1,1,0,'2020-06-09 12:04:38','2020-07-01 10:13:32',NULL),(12,2,3,NULL,'Blaze Orange Plain Polly Cotton Straight Kurta Set',NULL,'This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....','<p>This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....This two-piece kurta set in blazing orange is made from supreme quality of cotton. The straight checkered design on the....</p>',NULL,'pobox_1_black.jpg',2599,2699,10,0.00,5,'#6789',1,0,1,1,1,1,'2020-06-09 12:05:12','2020-06-15 12:14:10',NULL),(13,3,7,5,'Test',NULL,'hlhklk','<p>khlh ;jl;j lkhkh</p>',NULL,'pobox_5_black.jpg',2000,2300,15,0.00,5,'#5678',1,0,0,1,1,1,'2020-06-11 11:02:04','2020-06-11 13:53:55',NULL),(14,2,4,4,'Long kuta','shade in orange','good color','<p>Test</p>\r\n\r\n<ol>\r\n	<li>test <strong>color </strong>good text LONG descriptiontfdl</li>\r\n	<li>&nbsp;text text</li>\r\n	<li><strong>color </strong>good text LONG descriptiontfdl</li>\r\n	<li>\r\n	<h1>&nbsp;text text</h1>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>',NULL,'159248017412.jpg',100,900,10,0.00,5,'67677',1,0,1,1,1,0,'2020-06-12 07:28:43','2020-07-01 10:17:40',NULL),(15,1,4,4,'Tunics','subtunics','Test','<p>Test now test</p>\r\n\r\n<p>admin</p>\r\n\r\n<p>test</p>',NULL,'mytri-women-27s-mustard-jacquard-design-angrakha-kurta-500x500.jpg',700,900,22,0.00,5,'7689',1,0,0,0,0,1,'2020-06-15 09:05:45','2020-06-15 12:14:24',NULL),(16,28,17,3,'sarees',NULL,'test','<p>kljkl sdf;ldjl</p>',NULL,'159316588413.jpg',1300,1500,13,0.00,5,'#67898',1,1,1,1,1,0,'2020-06-15 10:38:32','2020-07-01 10:17:54',NULL),(17,2,5,1,'Cotton Kurta','kurti','indian kurti','<p>test</p>\r\n\r\n<p><strong>test</strong></p>\r\n\r\n<p><strong>1234</strong></p>\r\n\r\n<p><strong>test</strong></p>',NULL,'159301569915.jpg',500,1500,67,0.00,5,'134',1,0,0,1,1,0,'2020-06-15 12:05:05','2020-07-01 10:18:02',NULL),(18,2,3,1,'black kurta','black','Black Kkkkk','<p>Test</p>\r\n\r\n<p>da;sd;lasl;asd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dmsal;m;samdl;masd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>daslm;asmdl;asm</p>',NULL,'A10I5695 copy.jpg',10,1000,99,0.00,5,'19009',1,0,0,1,1,1,'2020-06-15 12:39:54','2020-06-17 16:07:05',NULL),(19,1,3,1,'Black Kurti','Test','ndksanlknsakdnksankl','<p>skndlksanasnnsa</p>\r\n\r\n<p>ndlkasnlasnknasnasn</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dnaslkndlsannas</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dnkalsnlksanlknsa</p>',NULL,'pobox_5_black.jpg',450,500,10,0.00,5,'12456',1,0,0,1,1,1,'2020-06-17 07:31:08','2020-07-04 04:53:02',NULL),(20,2,3,14,'Test2','testing222','andksakd;lsamdl;msal;dmsal','<p>skadnklansdkn</p>\r\n\r\n<p>dasd;kas&#39;;kd&#39;ask</p>\r\n\r\n<p>d;lasmd;lma</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dnkslaldnlskandknas</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dnklalsnlkasnd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>dkasndlkasndklnas</p>',NULL,'pobox_5_black.jpg',1000,1250,20,0.00,5,'1234',1,0,0,1,1,1,'2020-06-17 07:46:11','2020-06-17 16:01:10',NULL),(21,1,3,10,'kurti','Testing33','dksandknskadnlaksndknaslkn','<p>ksnakldnakslndknas</p>\r\n\r\n<p>dklsanklasndklasndkasnkas</p>\r\n\r\n<p>nldklasnlkdnaskldnkslandklsndkas</p>\r\n\r\n<p>dnaslknlksnadknsakdnasndlksanlkdnasnd</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>kldasndlkanslkdnasndlkasnda</p>',NULL,'100939_2 copy.jpg',1200,1500,20,0.00,5,'123',1,0,0,0,0,1,'2020-06-17 07:54:25','2020-07-03 05:34:54',NULL),(22,3,5,18,'Neon Dress','Perfect for all occasion','Can be used for marathon','<p>Marathon Dress</p>',NULL,'15925696868.png',995,1020,2,0.00,5,'nion995',1,1,1,1,1,0,'2020-06-17 17:06:38','2020-07-01 10:18:13',NULL),(23,2,3,1,'Maria','t','test','<p>test</p>',NULL,'159283219415.jpg',10,2000,100,0.00,5,'test',1,0,0,0,1,1,'2020-06-22 13:23:14','2020-06-22 13:23:20',NULL),(24,14,3,5,'indo kurti','dsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk','test test test test te ts jkdsjkdgbsjdbskbskjfskfskdnsgauegdakda\r\nadjsgdsjsjbsbdsjgfhbsdbs test teef ewvds dsjdbsjfg fg \r\ndjsugfjsbfndbfndsbf dsbf ds dvshfvhdfvdf','<p>test</p>',NULL,'15929219615.jpg',4000,5800,31,200.00,5,'test',1,0,0,0,1,0,'2020-06-23 14:19:21','2020-07-01 10:18:21',NULL),(25,2,3,2,'Anarkali Kurti','New yesy','klhlk','<p>lhjkshf</p>',NULL,'159292870415.jpg',2399,2599,8,119.95,5,'#7890',1,0,1,1,1,0,'2020-06-23 16:11:44','2020-07-01 10:18:27',NULL),(26,14,4,4,'test','test','test','<p>Test</p>',NULL,'15929793378.jpg',433,433,0,21.65,5,'test',1,1,0,0,1,0,'2020-06-24 06:15:37','2020-07-01 10:18:34',NULL),(27,3,3,4,'dress','indian dress','Black art silk salwar suit with embroidered floral patterns on the kameez.Comes with matching black bottom and dupatta.This product consists of semistitched top','<p>Black art silk salwar suit with embroidered floral patterns on the kameez.Comes with matching black bottom and dupatta.</p>\r\n\r\n<ul>\r\n	<li><em>This product consists of semistitched top,&nbsp;</em>\r\n\r\n	<p>Black art silk salwar suit with embroidered floral patterns on the kameez.Comes with matching black bottom and dupatta.</p>\r\n	</li>\r\n	<li><em>This product consists of semistitched top,&nbsp;</em>\r\n	<p>Black art silk salwar suit with embroidered floral patterns on the kameez.Comes with matching black bottom and dupatta.</p>\r\n	</li>\r\n	<li><em>This product consists of semistitched top,&nbsp;</em></li>\r\n</ul>',NULL,'159300320214.jpeg',4500,6000,25,225.00,5,'test',1,0,1,0,1,0,'2020-06-24 12:53:22','2020-07-01 10:18:40',NULL),(28,29,6,4,'Western top','western top sutitle','Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping. Test','<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping. test test test dummy</p>\r\n\r\n<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping.</p>\r\n\r\n<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping.</p>\r\n\r\n<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping.</p>\r\n\r\n<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping.</p>\r\n\r\n<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping.</p>\r\n\r\n<p>Only Rs.379.0, Buy Jaipur Vastra Womens/girls Rayon Printed Western Top (grey) at Club Factory Online. Free Shipping.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>nn</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>&nbsp;</p>',NULL,'15931484347.jpg',1000,1000,0,20.00,5,'test',1,0,0,1,1,1,'2020-06-26 05:13:54','2020-07-04 04:58:59',NULL),(29,14,4,2,'Blue Top',NULL,'Miss Chase Women\'s  Round Neck Half Sleeved Relaxed Fit Striped Cold Shoulder Top','<ul>\r\n	<li>Care Instructions: Cold machine wash with similar colors, do not bleach, tumble dry low, warm iron</li>\r\n	<li>Fit Type: regular fit</li>\r\n	<li>Material: Cotton</li>\r\n	<li>Color: Black and White</li>\r\n	<li>Neck Type: Round Neck; Sleeve Type: Half Sleeve</li>\r\n	<li>Package Contents: 1 Cut-Out Top</li>\r\n	<li>Occasion: Casual; Fit Type: Regular Fit</li>\r\n</ul>',NULL,'159317665714.jpg',700,900,22,35.00,5,'test',1,0,0,1,1,1,'2020-06-26 13:00:45','2020-07-04 04:59:12',NULL),(30,1,18,2,'simply cotton','test subtitle','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sem arcu, egestas vel elit gravida, vehicula venenatis justo. Morbi tempus, velit vehicula vo','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sem arcu, egestas vel elit gravida, vehicula venenatis justo. Morbi tempus, velit vehicula volutpat viverra, felis nisl dapibus ipsum, sit amet ultrices enim augue ac urna. Mauris vitae aliquam nunc, nec eleifend ante. Morbi interdum est efficitur diam luctus posuere. Suspendisse consequat diam felis, sit amet posuere purus dictum quis. Maecenas condimentum diam vitae est lacinia facilisis. Cras aliquam faucibus nunc id finibus. Integer tempus vulputate libero euismod posuere.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc in malesuada urna, eu pretium erat. Praesent sed nibh imperdiet nulla iaculis lobortis. Donec mauris tortor, eleifend id consequat sit amet, dictum id diam. Nulla condimentum arcu mi, non aliquet nisi fringilla eget. Pellentesque interdum lorem nunc, at posuere tellus lobortis at. Vivamus lacinia interdum neque non cursus. Sed blandit ligula eget ligula blandit, vitae consectetur metus rhoncus. Mauris a metus arcu. Mauris suscipit risus sit amet sodales elementum. Fusce sem arcu, pellentesque sed nulla eget, viverra tempus elit. Etiam rutrum accumsan dui, facilisis porta mauris iaculis quis. Duis convallis, neque at finibus volutpat, odio magna pellentesque enim, sit amet porta metus purus porta magna. Fusce eget diam sit amet nulla hendrerit laoreet sed non tellus. Mauris nibh diam, congue non quam eu, finibus mollis neque.</p>',NULL,'15938372625.jpg',300,300,0,15.00,5,'134',1,0,0,1,0,1,'2020-06-30 05:10:35','2020-07-04 04:38:35',NULL),(31,14,6,10,'White top','test1 ksjdsssssssssnnnfdkfnkdgkfdgnnnnnnnnnnnnnnnnnnnnnnnnnn','Lorem ipsum is a name for a common type of placeholder text. Also known as filler or dummy text, this is simply copy that serves to fill a space without actuall','<p><strong>Lorem ipsum</strong>&nbsp;is a name for a common type of placeholder&nbsp;<strong>text</strong>. Also known as filler or dummy&nbsp;<strong>text</strong>, this is simply copy that serves to fill a space without actually saying anything meaningful. It&#39;s essentially nonsense&nbsp;<strong>text</strong>, but gives an idea of what real&nbsp;<strong>text</strong>&nbsp;will look like in the final product.</p>\r\n\r\n<p><strong>Lorem ipsum</strong>&nbsp;is a name for a common type of placeholder&nbsp;<strong>text</strong>. Also known as filler or dummy&nbsp;<strong>text</strong>, this is simply copy that serves to fill a space without actually saying anything meaningful. It&#39;s essentially nonsense&nbsp;<strong>text</strong>, but gives an idea of what real&nbsp;<strong>text</strong>&nbsp;will look like in the final product.</p>\r\n\r\n<p><strong>Lorem ipsum</strong>&nbsp;is a name for a common type of placeholder&nbsp;<strong>text</strong>. Also known as filler or dummy&nbsp;<strong>text</strong>, this is simply copy that serves to fill a space without actually saying anything meaningful. It&#39;s essentially nonsense&nbsp;<strong>text</strong>, but gives an idea of what real&nbsp;<strong>text</strong>&nbsp;will look like in the final product.</p>',NULL,'159350098111.jpg',2,8,75,0.10,5,'134',1,1,1,0,1,0,'2020-06-30 05:41:43','2020-07-01 16:45:58',NULL),(32,3,4,2,'test hhhhknnknk hdsssssss','dsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk','dsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk','<p>dsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkdsjkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</p>',NULL,'159350707810.jpg',600,700,14,30.00,5,'dsfdfdffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffweeeeeeeeeeeeeeeeeeeeeeeeeeeee',1,0,0,0,1,1,'2020-06-30 08:51:18','2020-06-30 09:02:32',NULL),(33,1,5,10,'casual top','Material : Handloom Cotton, Color : Blue, Pattern : Embroide','Material : Handloom Cotton, Color : Blue, Pattern : Embroidered\r\nNeck Type : Round Neck, Item Length : Calf Length\r\nPackage Contents : 1 Straight Kurti and 1 Prin','<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>',NULL,'15938391195.jpg',800,1500,47,40.00,5,'1',1,0,0,1,0,1,'2020-06-30 10:55:56','2020-07-04 05:43:46',NULL),(34,1,5,2,'Cotton kurti','Material : Handloom Cotton, Color : Blue, Pattern : Embroide','Material : Handloom Cotton, Color : Blue, Pattern : Embroidered\r\nNeck Type : Round Neck, Item Length : Calf Length\r\nPackage Contents : 1 Straight Kurti and 1 Prin','<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered<br />\r\nNeck Type : Round Neck, Item Length : Calf Length<br />\r\nPackage Contents : 1 Straight Kurti and 1 Printed Palazzo<br />\r\nOccasion : Party Wear, Sleeves : 3/4 Sleeve<br />\r\nDisclaimer : Slight Color Variation is possible due to photographic effect &amp; printing limitations.</p>\r\n\r\n<p>&nbsp;</p>',NULL,'159383905915.jpg',3750,5000,25,187.50,5,'1',1,0,0,1,0,1,'2020-06-30 10:57:27','2020-07-04 05:43:43',NULL),(35,1,5,21,'casual top',NULL,'Material : Handloom Cotton, Color : Blue, Pattern : Embroidered Neck Type : Round Neck, Item Length : Calf Length Package Contents : 1 Straight Kurti and 1 Prin','<p>Material : Handloom Cotton, Color : Blue, Pattern : Embroidered Neck Type : Round Neck, Item Length : Calf Length Package Contents : 1 Straight Kurti and 1 Prin</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sem arcu, egestas vel elit gravida, vehicula venenatis justo. Morbi tempus, velit vehicula volutpat viverra, felis nisl dapibus ipsum, sit amet ultrices enim augue ac urna. Mauris vitae aliquam nunc, nec eleifend ante. Morbi interdum est efficitur diam luctus posuere. Suspendisse consequat diam felis, sit amet posuere purus dictum quis. Maecenas condimentum diam vitae est lacinia facilisis. Cras aliquam faucibus nunc id finibus. Integer tempus vulputate libero euismod posuere.</p>\r\n\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n	<li>Proin quis lacus scelerisque, faucibus augue quis, faucibus leo.</li>\r\n	<li>Donec malesuada mi eu ultrices feugiat.</li>\r\n	<li>Nam malesuada massa at velit scelerisque efficitur.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nunc et ipsum vel turpis interdum tempus.</li>\r\n	<li>Maecenas nec odio faucibus, condimentum massa tempor, fringilla felis.</li>\r\n	<li>Cras et dui vel mauris aliquet faucibus.</li>\r\n</ul>',NULL,'159383899312.jpg',7200,9000,20,360.00,5,'1',1,0,1,1,0,1,'2020-06-30 11:02:02','2020-07-04 05:11:22',NULL),(36,31,6,4,'women\'s shirt','causal shirt','solid','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>',NULL,'159359392412.jpg',999,1500,33,49.95,5,'#ABCD',1,1,1,1,1,1,'2020-07-01 08:58:44','2020-07-01 08:58:44',NULL),(37,31,6,3,'women\'s shirt','causal shirt','solid','<p><strong>rem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h</p>',NULL,'159359409611.jpg',500,1500,67,25.00,5,'#ABCD',1,1,1,1,1,1,'2020-07-01 09:01:36','2020-07-01 12:05:16',NULL),(38,31,6,1,'women\'s shirt','causal shirt','solid','<p><strong>rem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h</p>',NULL,'159359437711.jpg',999,1500,33,49.95,5,'#ABCD',1,1,1,1,1,1,'2020-07-01 09:06:17','2020-07-01 09:06:17',NULL),(39,2,3,10,'demo','demo','demo test','<p>demo test</p>',NULL,'15936214259.jpg',99,100,1,4.95,5,'demo1234',1,1,1,1,0,1,'2020-07-01 16:37:06','2020-07-03 11:56:09',NULL),(40,2,4,21,'demo','demo','demo test','<p>demo test</p>',NULL,'15936214259.jpg',990,1000,1,4.95,5,'demo1234',1,1,1,1,1,1,'2020-07-01 16:37:06','2020-07-03 14:27:02',NULL),(41,3,6,1,'women\'s shirt','causal shirt','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce at ornare nisl. Suspendisse vitae laoreet nisi.','<p><strong>Lorem ipsum dolor sit amet</strong>, consectetur adipiscing elit. Fusce at ornare nisl. Suspendisse vitae laoreet nisi. In ullamcorper laoreet risus, vel elementum felis ultricies et. Vestibulum scelerisque lobortis posuere. In et elementum ipsum. Morbi mattis ligula eu purus posuere congue. Maecenas euismod scelerisque purus, vel lobortis felis vestibulum et. Nam porta turpis vitae porta finibus.</p>\r\n\r\n<ol>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n	<li>Proin quis lacus scelerisque, faucibus augue quis, faucibus leo.</li>\r\n	<li>Donec malesuada mi eu ultrices feugiat.</li>\r\n	<li>Nam malesuada massa at velit scelerisque efficitur.</li>\r\n</ol>',NULL,'159384137113.jpg',1500,1500,0,75.00,5,'#dress',1,0,0,1,0,1,'2020-07-01 09:06:17','2020-07-04 05:42:51',NULL),(42,3,6,4,'women\'s shirt','causal shirt','solid','<p><strong>rem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It h</p>',NULL,'159384109511.jpg',0,1500,0,75.00,5,'#dress',1,0,0,1,0,1,'2020-07-01 09:01:36','2020-07-04 05:38:15',NULL),(43,3,6,3,'women\'s shirt','causal shirt','solid','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>',NULL,'159384106313.jpg',0,1500,0,75.00,5,'#dress',1,1,1,1,0,1,'2020-07-01 08:58:44','2020-07-04 05:37:43',NULL),(44,1,5,1,'Melange grey kurti','Lorem ipsum dolor sit amet, consectetur adipiscing elit.','Melange brown kurti with style and grace. Perfect for festive mood. and Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sem arcu, egestas vew','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sem arcu, egestas vel elit gravida, vehicula venenatis justo. Morbi tempus, velit vehicula volutpat viverra, felis nisl dapibus ipsum, sit amet ultrices enim augue ac urna. Mauris vitae aliquam nunc, nec eleifend ante. Morbi interdum est efficitur diam luctus posuere. Suspendisse consequat diam felis, sit amet posuere purus dictum quis. Maecenas condimentum diam vitae est lacinia facilisis. Cras aliquam faucibus nunc id finibus. Integer tempus vulputate libero euismod posuere.</p>\r\n\r\n<ul>\r\n	<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>\r\n	<li>Proin quis lacus scelerisque, faucibus augue quis, faucibus leo.</li>\r\n	<li>Donec malesuada mi eu ultrices feugiat.</li>\r\n	<li>Nam malesuada massa at velit scelerisque efficitur.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Nunc et ipsum vel turpis interdum tempus.</li>\r\n	<li>Maecenas nec odio faucibus, condimentum massa tempor, fringilla felis.</li>\r\n	<li>Cras et dui vel mauris aliquet faucibus.</li>\r\n</ul>',NULL,'159383894515.jpg',800,1000,20,40.00,5,'1',1,1,1,1,0,1,'2020-07-03 05:45:50','2020-07-06 13:28:19',NULL),(45,1,4,1,'dsfsf','dsfsdfsdf','dsfdsafsadfsfsdfsdf','<p>sdfdsfsdaf</p>',NULL,'15937594536.jpg',300,432,31,15.00,5,'yrty',1,1,1,1,1,1,'2020-07-03 06:57:33','2020-07-03 07:56:39',NULL),(46,1,3,2,'dfgdf',NULL,'fdgfdgdfsgfdgfdsgdsfgdf','<p>dgdfsgfgdfgfdsgdsf</p>',NULL,'15937596578.jpg',2000,1000,-100,100.00,5,'yrtyfgfdg',1,0,0,0,1,1,'2020-07-03 07:00:57','2020-07-03 07:45:42',NULL),(47,1,3,10,'Maria',NULL,'test','<p>test</p>',NULL,'159375968413.jpg',2000,1000,-100,100.00,5,'134',1,0,0,0,1,1,'2020-07-03 07:01:24','2020-07-03 07:45:32',NULL),(48,1,4,2,'test',NULL,'It is a long kurti, with beautiful curved neck line and tie and dye print and pockets on both sides Size Chart - S - Chest: 34\'\', Shoulder: 14.5\'\'','<h2>It is a long kurti, with beautiful curved neck line and tie and dye print and pockets on both sides Size Chart - S - Chest: 34&#39;&#39;, Shoulder: 14.5&#39;&#39;</h2>\r\n\r\n<h2>It is a long kurti, with beautiful curved neck line and tie and dye print and pockets on both sides Size Chart - S - Chest: 34&#39;&#39;, Shoulder: 14.5&#39;&#39;</h2>\r\n\r\n<h2>It is a long kurti, with beautiful curved neck line and tie and dye print and pockets on both sides Size Chart - S - Chest: 34&#39;&#39;, Shoulder: 14.5&#39;&#39;</h2>',NULL,'159376243310.jpg',2000,1000,-100,100.00,5,'1',1,0,0,0,1,1,'2020-07-03 07:47:13','2020-07-03 07:48:49',NULL),(49,1,3,21,'school1','dsfdsf','dfsdafsadf','<p>sdafsadfsadfsda</p>',NULL,'15937725325.jpg',900,1000,10,45.00,5,'dsfsadf',1,0,0,0,0,0,'2020-07-03 10:35:32','2020-07-06 12:24:03',NULL),(50,1,6,1,'Women Kurta Set','Women Pink & White Printed Asymmetric A-Line Kurta',NULL,'<p>PRODUCT DETAILS&nbsp;</p>\r\n\r\n<p>Pink and white printed A-line kurta, has a mandarin collar, long sleeves, asymmetric hem, side slits</p>\r\n\r\n<p>Size &amp; Fit</p>\r\n\r\n<p>The model (height 5&#39;8&quot;) is wearing a size S</p>\r\n\r\n<p>Material &amp; Care</p>\r\n\r\n<p>Cotton<br />\r\nMachine-wash</p>',NULL,'15937727405.jpg',1000,1000,0,50.00,5,'123XYZ1',1,1,1,1,0,1,'2020-07-03 10:39:00','2020-07-04 08:21:05',NULL),(51,1,4,21,'Simple','Class aptent taciti sociosqu','Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc in malesuada urna, eu pretium erat.','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sem arcu, egestas vel elit gravida, vehicula venenatis justo. Morbi tempus, velit vehicula volutpat viverra, felis nisl dapibus ipsum, sit amet ultrices enim augue ac urna. Mauris vitae aliquam nunc, nec eleifend ante. Morbi interdum est efficitur diam luctus posuere. Suspendisse consequat diam felis, sit amet posuere purus dictum quis. Maecenas condimentum diam vitae est lacinia facilisis. Cras aliquam faucibus nunc id finibus. Integer tempus vulputate libero euismod posuere.</p>\r\n\r\n<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc in malesuada urna, eu pretium erat. Praesent sed nibh imperdiet nulla iaculis lobortis. Donec mauris tortor, eleifend id consequat sit amet, dictum id diam. Nulla condimentum arcu mi, non aliquet nisi fringilla eget. Pellentesque interdum lorem nunc, at posuere tellus lobortis at. Vivamus lacinia interdum neque non cursus. Sed blandit ligula eget ligula blandit, vitae consectetur metus rhoncus. Mauris a metus arcu. Mauris suscipit risus sit amet sodales elementum. Fusce sem arcu, pellentesque sed nulla eget, viverra tempus elit. Etiam rutrum accumsan dui, facilisis porta mauris iaculis quis. Duis convallis, neque at finibus volutpat, odio magna pellentesque enim, sit amet porta metus purus porta magna. Fusce eget diam sit amet nulla hendrerit laoreet sed non tellus. Mauris nibh diam, congue non quam eu, finibus mollis neque.</p>',NULL,'15938374505.jpg',4750,5000,5,237.50,5,'134',1,0,0,1,0,1,'2020-07-03 13:44:48','2020-07-04 04:43:48',NULL),(52,1,6,2,'Women Kurta Set','Women Green Printed Asymmetric A-Line Kurta',NULL,'<p>PRODUCT DETAILS&nbsp;</p>\r\n\r\n<p>Pink and white printed A-line kurta, has a mandarin collar, long sleeves, asymmetric hem, side slits</p>\r\n\r\n<p>Size &amp; Fit</p>\r\n\r\n<p>The model (height 5&#39;8&quot;) is wearing a size S</p>\r\n\r\n<p>Material &amp; Care</p>\r\n\r\n<p>Cotton<br />\r\nMachine-wash</p>',NULL,'15938511225.jpg',1000,1000,0,50.00,5,'123XYZ1',1,1,1,1,0,1,'2020-07-04 08:25:22','2020-07-04 08:25:22',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `flag` enum('1','2') NOT NULL COMMENT '1:new arrival     2:trends',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,1,'test new arrival','test@gmail.com',3,'test comment arrival','test title arrival','1',0,1,'2020-06-06 13:02:11','2020-06-06 13:02:11'),(2,2,'test2','test2@gmail.com',4,'test','test title','1',0,1,'2020-06-08 10:07:36','2020-06-08 10:07:36');
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size_information`
--

DROP TABLE IF EXISTS `size_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `size_id` int(11) DEFAULT NULL,
  `chest` varchar(45) DEFAULT NULL,
  `waist` varchar(45) DEFAULT NULL,
  `hips` varchar(45) DEFAULT NULL,
  `length` varchar(45) DEFAULT NULL,
  `shoulder` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size_information`
--

LOCK TABLES `size_information` WRITE;
/*!40000 ALTER TABLE `size_information` DISABLE KEYS */;
INSERT INTO `size_information` VALUES (1,1,'36','34','40','28-44','14','2020-06-16 06:21:47','2020-06-16 06:32:07'),(2,2,'38','36','42','28-44','14.5','2020-06-16 06:34:26','2020-06-16 06:34:26'),(4,1,'32','32','32','32','32','2020-06-19 08:42:21','2020-06-23 11:52:52'),(5,1,'32','26','30','12','15','2020-06-22 09:34:04','2020-06-26 10:48:32'),(6,1,'78','89','87','bvb','10','2020-06-23 11:45:31','2020-06-23 11:45:40'),(7,1,'212','221','789','890','90','2020-06-24 07:03:59','2020-06-24 07:03:59'),(8,1,'26','28','28','30','15','2020-06-24 13:05:12','2020-06-24 13:05:12');
/*!40000 ALTER TABLE `size_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sizes`
--

DROP TABLE IF EXISTS `sizes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sizes`
--

LOCK TABLES `sizes` WRITE;
/*!40000 ALTER TABLE `sizes` DISABLE KEYS */;
INSERT INTO `sizes` VALUES (1,'S',1,0,'2020-06-09 07:23:45','2020-06-09 07:24:43'),(2,'M',1,0,'2020-06-09 07:23:50','2020-06-09 07:23:50'),(3,'L',1,0,'2020-06-09 07:23:55','2020-06-09 07:23:55'),(4,'XL',1,0,'2020-06-09 07:24:04','2020-06-09 07:24:04'),(5,'2XL',1,0,'2020-06-10 05:54:38',NULL),(6,'3XL',1,0,'2020-06-10 05:54:51','2020-06-15 07:49:09'),(7,'Testn',0,1,'2020-06-11 13:48:20','2020-06-11 13:48:32'),(8,'4XL',1,0,'2020-06-15 07:58:39','2020-06-24 13:03:31'),(9,'tes',1,1,'2020-06-15 07:59:43','2020-06-17 11:09:28'),(10,'ASs',1,1,'2020-06-17 07:11:20','2020-06-17 11:09:24'),(11,'sd',1,1,'2020-06-17 12:08:54','2020-06-17 12:08:58'),(12,'5XL',1,1,'2020-06-17 16:47:15','2020-06-19 09:45:09'),(13,'6XL',1,1,'2020-06-17 16:47:33','2020-06-17 16:47:43'),(14,'677',1,1,'2020-06-24 07:02:59','2020-06-24 13:02:33'),(15,'p',1,1,'2020-06-24 13:02:21','2020-06-24 13:02:27');
/*!40000 ALTER TABLE `sizes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribe`
--

LOCK TABLES `subscribe` WRITE;
/*!40000 ALTER TABLE `subscribe` DISABLE KEYS */;
INSERT INTO `subscribe` VALUES (1,'rakeshsathwara1994@gmail.com','2020-05-23 12:25:05','2020-05-23 12:25:05'),(3,'shivaniank.rs@gmail.com','2020-05-26 05:41:04','2020-05-26 05:41:04'),(11,'rakeshsathwara.rc@gmail.com','2020-06-08 06:57:13','2020-06-08 06:57:13'),(12,'rakeshsathwara.rc@gmail.com','2020-06-08 06:58:13','2020-06-08 06:58:13'),(13,'rakeshsathwara.rc@gmail.com','2020-06-08 06:59:13','2020-06-08 06:59:13'),(14,'rakeshsathwara.rc@gmail.com','2020-06-08 07:00:22','2020-06-08 07:00:22'),(15,'khyatip.rs@gmail.com','2020-06-08 07:04:23','2020-06-08 07:04:23'),(16,'shivani.anklesh@gmail.com','2020-06-08 13:02:49','2020-06-08 13:02:49'),(17,'k@k.com','2020-06-09 05:01:24','2020-06-09 05:01:24'),(18,'khyatip.rs@gmail.com','2020-06-09 05:05:10','2020-06-09 05:05:10'),(19,'khyatip.rs@gmail.com','2020-06-09 05:14:49','2020-06-09 05:14:49'),(20,'t@t.com','2020-06-09 06:41:43','2020-06-09 06:41:43'),(21,'diyaupa@gmail.com','2020-06-09 09:00:29','2020-06-09 09:00:29'),(22,'kbc@gmail.com','2020-06-09 09:00:48','2020-06-09 09:00:48'),(23,'jayesh.cloudover@gmail.com','2020-06-10 09:19:44','2020-06-10 09:19:44'),(24,'bgoswami57@gmail.com','2020-06-11 13:11:11','2020-06-11 13:11:11'),(25,'test@test.com','2020-06-12 10:59:48','2020-06-12 10:59:48'),(26,'test@test.com','2020-06-12 10:59:50','2020-06-12 10:59:50'),(27,'rakeshsahwara.rc@gmail.com','2020-06-22 09:24:49','2020-06-22 09:24:49'),(28,'rakeshsahwara.rc@gmail.com','2020-06-22 09:24:52','2020-06-22 09:24:52'),(29,'test@test.co','2020-06-22 13:46:29','2020-06-22 13:46:29'),(30,'test@test.com','2020-06-23 05:54:24','2020-06-23 05:54:24'),(31,'kavit@ddd.in','2020-06-23 15:16:12','2020-06-23 15:16:12'),(32,'hitart.rc@gmail.com','2020-06-23 16:32:04','2020-06-23 16:32:04'),(33,'hitart.rc@gmail.com','2020-06-23 16:35:40','2020-06-23 16:35:40'),(34,'hitarth.rc@gmail.ocom','2020-06-23 16:36:54','2020-06-23 16:36:54'),(35,'aa@aa.in','2020-06-23 16:37:00','2020-06-23 16:37:00'),(36,'t@t.com','2020-06-24 05:27:23','2020-06-24 05:27:23'),(37,'t@t.com','2020-06-24 05:27:24','2020-06-24 05:27:24'),(38,'rakeshsathwara.rc@gmail.com','2020-06-24 11:18:57','2020-06-24 11:18:57'),(39,'rakeshsathwara.rc@gmail.com','2020-06-24 11:22:02','2020-06-24 11:22:02'),(40,'t@t.com','2020-06-24 11:37:04','2020-06-24 11:37:04'),(41,'t@t.com','2020-06-24 11:37:31','2020-06-24 11:37:31'),(42,'rakesh@gmail.com','2020-06-24 11:42:56','2020-06-24 11:42:56'),(43,'test@test.com','2020-06-24 11:43:36','2020-06-24 11:43:36'),(44,'t@t.co','2020-06-24 11:44:32','2020-06-24 11:44:32'),(45,'rakesh1994@gmail.com','2020-06-25 13:52:04','2020-06-25 13:52:04'),(46,'manoj@gmail.com','2020-06-25 13:54:00','2020-06-25 13:54:00');
/*!40000 ALTER TABLE `subscribe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testinomial`
--

DROP TABLE IF EXISTS `testinomial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testinomial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testinomial`
--

LOCK TABLES `testinomial` WRITE;
/*!40000 ALTER TABLE `testinomial` DISABLE KEYS */;
INSERT INTO `testinomial` VALUES (2,'Neha Jain','Good collection. I mostly prefered for my concerts.','1593610757.jpg','2020-05-31 04:27:30','2020-07-01 13:39:17',NULL),(17,'Tony stark','Get the latest fashion tips and outfit ideas.','1593003683.jpg','2020-06-18 12:00:15','2020-06-24 13:01:23',NULL),(21,'Maria williams','A bridal saree is more than an outfit. It is a narration of a deep-rooted legacy, the perpetuity of traditions and an 12','1593002212.webp','2020-06-24 12:36:52','2020-07-03 04:43:04',NULL),(22,'Mona Dave','Nice work. Simple and sober','1593003552.jpg','2020-06-24 12:59:12','2020-07-01 13:38:23',NULL),(23,'Chandani Singh','Colours of the actual piece may vary slightly or may not vary at all , from what you see on your monitor. This may be be','1593004133.jpeg','2020-06-24 13:08:53','2020-06-25 04:57:30',NULL);
/*!40000 ALTER TABLE `testinomial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `device_token` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Admin',NULL,NULL,'admin@admin.com',NULL,'$2y$10$OaFtPU7VEK2uR7f9oHS0AeN6x8NdEyaqPXrIQFc/iK3n3JQ.GlJB6',1,0,'',NULL,'2019-11-13 13:00:00','2020-06-23 13:05:26'),(28,1,'Badal',NULL,NULL,'bgoswami57@gmail.com',NULL,'$2y$10$h7aZ/rPEN3ZJiuIyE1ALGOaGJPWe/Wnsn998d00Ig3AI8xv5EgwHC',1,0,NULL,NULL,'2020-05-27 15:15:26','2020-06-22 11:38:23'),(70,2,'shivani',123456788,'test','shivarths@gmail.com',NULL,'$2y$10$XJnhPUR.HN.l36BI/wWtZexLJHPX09zUpsQXSzzo.hjjlwSRUs78.',1,0,NULL,NULL,'2020-06-01 13:44:47','2020-06-01 13:44:47'),(75,0,'tarun patel',9865236598,'ahmedabad','tarun@gmail.com',NULL,'$2y$10$IM43gjWEcbxTo1Q4RzFr/OzwSlkdyU.9tzBTEfZDvlg15TeFPI/Gi',1,0,NULL,NULL,'2020-06-08 06:36:15','2020-06-08 06:36:15'),(76,0,'kalpesh',9865326598,'ahmedabad','kalpesh@gmail.com',NULL,'$2y$10$r4AC51suEFzxb/C.clEnVuVXMpGgAI/T1TaEMf7jy8r/r01EOvptW',1,0,NULL,NULL,'2020-06-08 06:45:29','2020-06-08 06:45:29'),(77,0,'pintu',9865326598,'ahmedabad','pintu@gmail.com',NULL,'$2y$10$x9KdgVODQ2PFBm0mYx6zqOjEEk1ytrKv7yD6IvQ5riuqFiyNBbSFK',1,0,NULL,NULL,'2020-06-08 06:49:10','2020-06-08 06:49:10'),(78,0,'Marrie',9825098250,'jhj','marie@marrie.com',NULL,'$2y$10$XdooVDKqvgSLsr.bVGoWmuylYfw08tjflDYXk9ntCDZ4FIhnnrwHO',1,0,NULL,NULL,'2020-06-08 06:52:48','2020-06-08 06:52:48'),(79,2,'rakesh',9865326556,'ahmedabad','rakeshsathwara.rc@gmail.com',NULL,'$2y$10$AmrzEM42JMh24i/cLFuCu.O7B3P0AReJ0HTN5X6c2I2UFxuky7fBi',1,0,NULL,NULL,'2020-06-08 09:47:22','2020-06-08 15:19:58'),(80,2,'Tia',9825098250,'ahmedabad','tia@po.com',NULL,'$2y$10$HX0hfoLmc4veugOxbAmu/u.L4eMUycFfcH37RPTasL.XhPNiZAQy2',1,0,NULL,NULL,'2020-06-08 09:51:22','2020-06-08 09:51:44'),(81,2,'nk',9828092909,'ahmedabad','khyatip.rs@gmail.com',NULL,'$2y$10$BxlrFoXh.J2m9sVyd0H42e0iVD8yeeDi7LU.t97gnmNlur0kJeE9K',1,0,NULL,NULL,'2020-06-08 10:08:29','2020-06-23 11:51:30'),(85,2,'yatin',9865323256,'ahmedabad','yatin@gmail.com',NULL,'$2y$10$WWgfUNLWspqBBj4xr8uUneDvxwiBauKSyi6h7AtArD0g9tYa83EN2',1,0,NULL,NULL,'2020-06-08 14:35:57','2020-06-08 14:35:57'),(86,2,'bhavesh',9865326598,'ahmedabad','bhavesh@gmail.com',NULL,'$2y$10$ypjmsAQSEYO0WsG/zPslT.crkQrfrupkDAawUbwA8AJj1hD7ZrvC2',1,0,NULL,NULL,'2020-06-08 14:54:06','2020-06-08 14:54:06'),(87,2,'mahesh',9856236588,'ahmedabad','mahesh@gmail.com',NULL,'$2y$10$Rfzkr9hIJtx0AzVQJpaNluKFHb2mVuZv1e44Iz6Ncm9hD7owSgQje',1,0,NULL,NULL,'2020-06-08 16:46:51','2020-06-08 16:46:51'),(88,2,'dnsmd',123458909,'hhff','dsdsm@djsd.co',NULL,'$2y$10$xBT6H2s0fLp/pk5vB35BpO/SGVwQ3jfQluVJfyRAwCdJiSuhlU406',0,0,NULL,NULL,'2020-06-09 04:53:58','2020-06-09 05:51:26'),(90,2,'test',9876787909,'india','test@test.co',NULL,'$2y$10$E8oJ8eBuZT508MZdiB7QXOTVe/n4WBT7yKJ2FQwjliAKkkg4sLRh2',1,0,NULL,NULL,'2020-06-09 06:44:04','2020-06-09 06:44:04'),(91,1,'Deepika',NULL,NULL,'diyaupa@gmail.com',NULL,'$2y$10$oGOGxXDlic2FNQ.AwMQvPekOubbN2CXd7TnkilDm24W7sDs9t4vgy',1,0,NULL,NULL,'2020-06-09 08:41:26','2020-06-09 08:41:26'),(92,2,'Jayesh Barot',9429856233,'Maruti Park Society,Regiment road,Opp. jalaram temple,','jayesh.cloudover@gmail.com',NULL,'$2y$10$962o.NOaIYvIDgFX4Z/1Z.yVCLzu08w9qpuRUX6sORrbBXrNE22me',1,0,NULL,NULL,'2020-06-10 09:19:26','2020-06-10 09:22:25'),(93,2,'Aanal Barot',9429856233,'Maruti Park Society,Regiment road,Opp. jalaram temple,','aanal.cloudover@gmail.com',NULL,'$2y$10$j4ZGsL8Es1HYAxShbgMWiezVfNMxglFe2s0sWgYh2wSkwRRoO9ls2',1,0,NULL,NULL,'2020-06-10 09:41:21','2020-06-10 09:41:21'),(94,2,'vinit',1254784478,'test ahmedabad','modyvinit@gmail.com',NULL,'$2y$10$42DnHFIZxZeBmccsfzBMy.2.pmMUv6zdX3IQ3W/XY7XFW2et64m/C',1,0,NULL,NULL,'2020-06-12 10:56:22','2020-07-01 15:27:12'),(95,2,'test',9825098250,'india','test@po.com',NULL,'$2y$10$nZE5mJd81k4ZgmswmxbN/.loEm921uKfMLevRalwbKhDCg3s1LhC6',1,0,NULL,NULL,'2020-06-15 10:11:03','2020-06-15 10:11:03'),(96,2,'Marrie',9825098250,'India','marrie@po.com',NULL,'$2y$10$T9Odqnbo1Nvp2Y3s5A783eRtClcnrsRaMGFjI2kPnNnxr2PwrscRm',1,0,NULL,NULL,'2020-06-15 10:12:19','2020-06-15 10:12:19'),(97,2,'Kia',9825098250,'Test Now test test now teshdskdhskdhskdhskdhskhdkshdkshdksdksd557557bnsdbsd*&jgjdjdsdjshdjsdjsdsdshdj8897272786868-6728272=26762627587878&8789tetsy test it now tets address','test7887@test.com',NULL,'$2y$10$IbiYBAgwMoPSvmb4vGTIgevCBP.5htRZw0lolT5TrhstKJYVoSoNm',1,0,NULL,NULL,'2020-06-15 10:16:46','2020-06-15 10:16:46'),(98,2,'pinkesh',1234567897,'ahmedabad','pinkesh@gmail.com',NULL,'$2y$10$C8MZ3vX/WJV.UecO0.7wdehbBKenqd0kFVeCIzyYInYbk8yPUzHF2',1,0,NULL,NULL,'2020-06-15 10:32:51','2020-06-15 10:32:51'),(99,2,'Cloud',9033440605,'test','bgoswami579@gmail.com',NULL,'$2y$10$6ff4.COhbSvgOF/3OmkHB.uSGFVoXvtz1cs2n7GOqu8Qwm9V.hO4e',1,0,NULL,NULL,'2020-06-15 12:04:35','2020-06-15 12:04:35'),(100,2,'pratik',9865326556,'test','pp@gmail.com',NULL,'$2y$10$JrLGrxNdkLaLrCalM4oSSubRyvohzG98va9vE9bpoyBAV.KnvYJ2G',1,0,NULL,NULL,'2020-06-15 12:48:42','2020-06-15 12:48:42'),(101,2,'test',9825098250,'ahmedabad','test@rs.com',NULL,'$2y$10$N6/ivC6zTC1mAXCsybYTDO1UgsfLuFl9ki03yFh9tGdISkXMFswZC',1,0,NULL,NULL,'2020-06-15 13:27:51','2020-06-15 13:27:51'),(102,2,'aaa',8965652332,'ahmedabad','aa@gmail.com',NULL,'$2y$10$2w/aBpij.1k7vbInQehyTuoPTqeU05x2CyPgsQb4TwgH0c48S5L2q',1,0,NULL,NULL,'2020-06-15 13:44:19','2020-06-19 09:51:45'),(103,2,'Test',9825098250,'Ahmedabad','test@test.com',NULL,'$2y$10$htZMKDwXn8iZsGl3R2Svfe9sWNxxnLXPpT36wLdHbo1IH06fzUPsO',1,0,NULL,NULL,'2020-06-16 08:24:23','2020-06-16 08:24:23'),(106,1,'sfvsdf',NULL,NULL,'shivaniank.rs@gmail.com',NULL,'$2y$10$.Cpi3mBy6YQFJ/.vA7/qrOkzghU3Gyrn6d3hWv5MviAwLNvP.nsvW',1,0,NULL,NULL,'2020-06-17 12:06:24','2020-06-17 12:06:29'),(110,2,'jayesh',9429856233,'13<marutipark society,nr.regiment road','123@gmail.com',NULL,'$2y$10$fYGoO6eQRU/XYD/oSjcT8.9JSp4mK9FJvTjWH4QdGqpWyYU2nGita',1,0,NULL,NULL,'2020-06-22 11:12:27','2020-06-22 11:12:27'),(111,2,'jayesh',9429856233,'13,marutipark society,nr.regiment road','465@gmail.com',NULL,'$2y$10$eEf9Ky6JFWHx8NfzQAW75ufwF9hGjJaw.p0myHpmTDYGBTtJSXrdu',1,0,NULL,NULL,'2020-06-22 11:13:05','2020-06-22 11:13:05'),(112,2,'jayesh',9429856233,'13,marutipark society,nr.regiment road','jayeshec01@gmail.com',NULL,'$2y$10$DlZID1iIgd15AMCrVeX6z.qjkmW8tVkH4iwaQfM6cahfS5d3zMVte',1,0,NULL,NULL,'2020-06-22 11:15:10','2020-06-22 11:15:10'),(113,2,'test',9876656789,'india','t@te.com',NULL,'$2y$10$vnMG/1wMt4pgPCH4Zuzm/u.JFym1APyM2qLp/y6dOM29wbTcI06h6',1,0,NULL,NULL,'2020-06-22 13:45:51','2020-06-22 13:45:51'),(114,2,'hitrath',1234567890,'qw','hitarth.rc@gmail.com',NULL,'$2y$10$QZ4YKTNlWxabo1Fwep.hKekSiQMQApwTXDCKjV9P8HCxFcZ4YN9e2',1,0,NULL,NULL,'2020-06-23 10:13:24','2020-06-23 10:13:24'),(116,1,'Maria resdklfdg',NULL,NULL,'dds@dd.com',NULL,'$2y$10$209XgO6aB.m9wWMhJR8qWOLvefbgJwBDQW6PoUqDyLY/M585V4HPS',1,0,NULL,NULL,'2020-06-23 14:16:22','2020-06-23 14:16:22'),(117,1,'Maria',NULL,NULL,'sds@sds.co',NULL,'$2y$10$OShaj.ULUuI9.WnDkCs0seLs0i1oWMWEtgnQpYRUHNHu6oq5W2.0C',1,0,NULL,NULL,'2020-06-24 07:00:11','2020-06-24 07:00:11'),(118,2,'Marrie',9828092909,'ahmedabad','m@mm.com',NULL,'$2y$10$KctCpHhMSzmP7gKCi239GOry2uq450xEeIRdTUfWhlDrKE4UgEQiS',1,0,NULL,NULL,'2020-06-24 10:59:47','2020-06-24 10:59:47'),(119,1,'Test L',NULL,NULL,'tl@tl.co',NULL,'$2y$10$dMOMQNT7A4ctYlszLtlv7uxxRpAN4lzmixOMWBgGJk0YpWhpjV6Jy',1,0,NULL,NULL,'2020-06-24 13:00:18','2020-06-24 13:00:36'),(120,2,'manoj',8652332568,'ahmedabad','manoj@gmail.com',NULL,'$2y$10$UkfdV33Im691m0dulvhq7e7nDvuvKSeYo6mvNyZ2J37eRUVaD1GAq',1,0,NULL,NULL,'2020-06-25 13:54:40','2020-06-25 13:54:40'),(121,2,'manish',9856235698,'ahmedabad','manish@gmail.com',NULL,'$2y$10$t/a5O9Ap35DNBuQ1T30dYOP9oZeHJ5nV3ac2p0YImFKmZty27KyHO',1,0,NULL,NULL,'2020-06-25 13:56:47','2020-06-25 13:56:47'),(122,2,'test',9825098250,'ahmedabad','t@tt.com',NULL,'$2y$10$K4qD1L6uOHgQT72ltvhvQuV67KgoibuyKVzUV3xWaXwJLSxjLNHAi',1,0,NULL,NULL,'2020-06-25 14:01:57','2020-06-25 14:01:57'),(123,2,'labhesh',9865323256,'ahmedabad','labhesh@gmail.com',NULL,'$2y$10$3sI0zPYBWdZ/XV83Xfmdhe0YUylixOPBiF2IkW57.3D3MlJEKZdpS',1,0,NULL,NULL,'2020-06-25 14:08:16','2020-06-25 14:08:16'),(124,2,'gaurang',9865323256,'ahmedabad','gaurang@gmail.com',NULL,'$2y$10$pIvz4/drMayKidZXdgQouuSsPMAlUqTamYcpzDI62A8mjv4oaG6cq',1,0,NULL,NULL,'2020-06-25 14:11:19','2020-06-25 14:11:19'),(125,2,'Marrie',9825098251,'india','m@am.com',NULL,'$2y$10$TdxoqplMEare.V1w2N8cQOCVePuBP5YJ2htOpoYaDOB0ZwKeAGIDO',1,0,NULL,NULL,'2020-06-25 14:14:21','2020-06-25 14:14:21'),(126,2,'haresh',9866544788,'ahmedabad','haresh@gmail.com',NULL,'$2y$10$24.4Wmb9ZQqFgGMteUgnBuGBzeYCqJcWjhe0AF4G4vJSu1I2Ds.ju',1,0,NULL,NULL,'2020-06-25 14:18:22','2020-06-25 14:18:22'),(127,2,'Kavit',1374848484,'Sbbdnd','aa@aa.in',NULL,'$2y$10$6mUIP2HlxDAPkvnPhaqKHOA7KL9tXM9MBa0fB9TiaeqSN6snSflzq',1,0,NULL,NULL,'2020-06-25 14:45:00','2020-06-25 14:45:00');
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

-- Dump completed on 2020-07-06 14:15:51
