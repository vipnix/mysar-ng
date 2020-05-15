-- MySQL dump 10.13  Distrib 5.5.33, for Linux (i686)
--
-- Host: localhost    Database: mysar
-- ------------------------------------------------------
-- Server version	5.5.33

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
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) NOT NULL DEFAULT '',
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES ('defaultAllSitesByteUnit','M'),('defaultAllSitesOrderBy','cachePercent'),('defaultAllSitesOrderMethod','DESC'),('defaultDateTimeByteUnit','K'),('defaultDateTimeOrderBy','time'),('defaultDateTimeOrderMethod','DESC'),('defaultindexByteUnit','M'),('defaultindexOrderBy','date'),('defaultindexOrderMethod','DESC'),('defaultIPSitesSummaryByteUnit','M'),('defaultIPSitesSummaryOrderBy','bytes'),('defaultIPSitesSummaryOrderMethod','DESC'),('defaultIPSummaryByteUnit','M'),('defaultIPSummaryOrderBy','cachePercent'),('defaultIPSummaryOrderMethod','DESC'),('defaultSiteUsersByteUnit','M'),('defaultSiteUsersOrderBy','bytes'),('defaultSiteUsersOrderMethod','DESC'),('firstLogTimestamp','1402023721.887'),('keepHistoryDays','32'),('lastCleanUp','2014-06-06'),('lastImportedRecordsNumber','3'),('lastLogOffset','4087204'),('lastTimestamp','1394247637.832'),('mysarImporter','enabled'),('optimizeCounter','31'),('resolveClients','disabled'),('schemaVersion','3'),('squidLogPath','/var/log/squid/access.log'),('topGrouping','Daily');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hostnames`
--

DROP TABLE IF EXISTS `hostnames`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hostnames` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varbinary(32) NOT NULL DEFAULT '0',
  `description` varchar(50) NOT NULL DEFAULT '',
  `isResolved` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `hostname` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `isResolved` (`isResolved`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hostnames`
--

LOCK TABLES `hostnames` WRITE;
/*!40000 ALTER TABLE `hostnames` DISABLE KEYS */;
INSERT INTO `hostnames` VALUES (1,3232249700,'',0,'192.168.55.100'),(2,3232249661,'',0,'192.168.55.61'),(3,3232249671,'',0,'192.168.55.71'),(4,3232249640,'',0,'192.168.55.40'),(5,3232249669,'',0,'192.168.55.69'),(6,3232249647,'',0,'192.168.55.47'),(7,3232249655,'',0,'192.168.55.55'),(8,3232249665,'',0,'192.168.55.65'),(9,3232249672,'',0,'192.168.55.72');
/*!40000 ALTER TABLE `hostnames` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `site` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `date_site` (`date`,`site`)
) ENGINE=InnoDB AUTO_INCREMENT=6582 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traffic`
--

DROP TABLE IF EXISTS `traffic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `traffic` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `time` time NOT NULL DEFAULT '00:00:00',
  `ip` varbinary(32) NOT NULL DEFAULT '0',
  `resultCode` varchar(50) NOT NULL DEFAULT '',
  `bytes` bigint(20) unsigned NOT NULL DEFAULT '0',
  `url` varchar(255) NOT NULL DEFAULT '',
  `authuser` varchar(30) NOT NULL DEFAULT '',
  `sitesID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `usersID` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `date_ip_sitesID_usersID` (`date`,`ip`,`sitesID`,`usersID`)
) ENGINE=InnoDB AUTO_INCREMENT=109092 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traffic`
--

LOCK TABLES `traffic` WRITE;
/*!40000 ALTER TABLE `traffic` DISABLE KEYS */;
/*!40000 ALTER TABLE `traffic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trafficSummaries`
--

DROP TABLE IF EXISTS `trafficSummaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trafficSummaries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL DEFAULT '0000-00-00',
  `ip` varbinary(32) NOT NULL DEFAULT '0',
  `usersID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `inCache` bigint(20) unsigned NOT NULL DEFAULT '0',
  `outCache` bigint(20) unsigned NOT NULL DEFAULT '0',
  `sitesID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `summaryTime` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `date_ip_usersID_sitesID_summaryTime` (`date`,`ip`,`usersID`,`sitesID`,`summaryTime`)
) ENGINE=InnoDB AUTO_INCREMENT=14757 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trafficSummaries`
--

LOCK TABLES `trafficSummaries` WRITE;
/*!40000 ALTER TABLE `trafficSummaries` DISABLE KEYS */;
/*!40000 ALTER TABLE `trafficSummaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `authuser` varchar(50) NOT NULL DEFAULT '',
  `date` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `date_authuser` (`date`,`authuser`),
  KEY `authuser` (`authuser`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2014-06-06 11:31:42
