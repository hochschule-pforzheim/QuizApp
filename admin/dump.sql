-- MySQL dump 10.13  Distrib 5.5.9, for Win32 (x86)
--
-- Host: localhost    Database: start2018b
-- ------------------------------------------------------
-- Server version	5.5.9

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
-- Table structure for table `antwort`
--

DROP TABLE IF EXISTS `antwort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `antwort` (
  `m_oid` int(10) unsigned NOT NULL,
  `c_ts` int(10) unsigned NOT NULL,
  `m_ts` int(10) unsigned NOT NULL,
  `Antworttext` varchar(100) NOT NULL,
  `korrekt` tinyint(4) NOT NULL,
  `to_Frage` int(11) NOT NULL,
  UNIQUE KEY `idx0` (`m_oid`),
  KEY `idx1` (`m_ts`),
  KEY `idx2` (`to_Frage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `antwort`
--

LOCK TABLES `antwort` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `frage`
--

DROP TABLE IF EXISTS `frage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frage` (
  `m_oid` int(10) unsigned NOT NULL,
  `c_ts` int(10) unsigned NOT NULL,
  `m_ts` int(10) unsigned NOT NULL,
  `beschreibung` varchar(250) NOT NULL,
  `Kategorie` int(11) DEFAULT NULL,
  UNIQUE KEY `idx3` (`m_oid`),
  KEY `idx4` (`m_ts`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frage`
--

LOCK TABLES `frage` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `inversteller_ersteller`
--

DROP TABLE IF EXISTS `inversteller_ersteller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inversteller_ersteller` (
  `oidn` int(11) NOT NULL,
  `cidn` int(10) unsigned NOT NULL,
  `oid1` int(11) NOT NULL,
  `cid1` int(10) unsigned NOT NULL,
  `status_` int(11) NOT NULL,
  KEY `idx33` (`oidn`),
  KEY `idx34` (`oid1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inversteller_ersteller`
--

LOCK TABLES `inversteller_ersteller` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `invgewinner_gewinner`
--

DROP TABLE IF EXISTS `invgewinner_gewinner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invgewinner_gewinner` (
  `oidn` int(11) NOT NULL,
  `cidn` int(10) unsigned NOT NULL,
  `oid1` int(11) NOT NULL,
  `cid1` int(10) unsigned NOT NULL,
  `status_` int(11) NOT NULL,
  KEY `idx35` (`oidn`),
  KEY `idx36` (`oid1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invgewinner_gewinner`
--

LOCK TABLES `invgewinner_gewinner` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `invteilnehmer_teilnehmer`
--

DROP TABLE IF EXISTS `invteilnehmer_teilnehmer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invteilnehmer_teilnehmer` (
  `oidn` int(11) NOT NULL,
  `cidn` int(10) unsigned NOT NULL,
  `oid1` int(11) NOT NULL,
  `cid1` int(10) unsigned NOT NULL,
  `status_` int(11) NOT NULL,
  KEY `idx31` (`oidn`),
  KEY `idx32` (`oid1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invteilnehmer_teilnehmer`
--

LOCK TABLES `invteilnehmer_teilnehmer` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `kategoriet`
--

DROP TABLE IF EXISTS `kategoriet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategoriet` (
  `myval` varchar(50) DEFAULT NULL,
  `codes` int(11) DEFAULT NULL,
  `valActive` int(11) DEFAULT NULL,
  `rno` int(11) NOT NULL,
  UNIQUE KEY `idx18` (`codes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategoriet`
--

LOCK TABLES `kategoriet` WRITE;
INSERT INTO `kategoriet` VALUES ('IT',0,1,0),('Controlling',1,1,1),('Professoren',2,1,2),('Pforzheim',3,1,3),('Kneipen',4,1,4),('Mathematik',5,1,5),('SPO',6,1,6);
UNLOCK TABLES;

--
-- Table structure for table `resultt`
--

DROP TABLE IF EXISTS `resultt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultt` (
  `myval` varchar(50) DEFAULT NULL,
  `codes` int(11) DEFAULT NULL,
  `valActive` int(11) DEFAULT NULL,
  `rno` int(11) NOT NULL,
  UNIQUE KEY `idx19` (`codes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultt`
--

LOCK TABLES `resultt` WRITE;
INSERT INTO `resultt` VALUES ('offen',0,1,0),('falsch',1,1,1),('richtig',2,1,2);
UNLOCK TABLES;

--
-- Table structure for table `runde`
--

DROP TABLE IF EXISTS `runde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `runde` (
  `m_oid` int(10) unsigned NOT NULL,
  `c_ts` int(10) unsigned NOT NULL,
  `m_ts` int(10) unsigned NOT NULL,
  `Nummer` int(11) DEFAULT NULL,
  `resultat` int(11) DEFAULT NULL,
  `to_Antwort` int(11) NOT NULL,
  `to_Frage` int(11) NOT NULL,
  `to_Spiel` int(11) NOT NULL,
  `to_User` int(11) NOT NULL,
  UNIQUE KEY `idx5` (`m_oid`),
  KEY `idx6` (`m_ts`),
  KEY `idx7` (`to_Antwort`),
  KEY `idx8` (`to_Frage`),
  KEY `idx9` (`to_Spiel`),
  KEY `idx10` (`to_User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `runde`
--

LOCK TABLES `runde` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `spiel`
--

DROP TABLE IF EXISTS `spiel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spiel` (
  `m_oid` int(10) unsigned NOT NULL,
  `c_ts` int(10) unsigned NOT NULL,
  `m_ts` int(10) unsigned NOT NULL,
  `status0` int(11) DEFAULT NULL,
  `punkteA` int(11) DEFAULT NULL,
  `punkteB` int(11) DEFAULT NULL,
  `Teilnehmer` int(11) NOT NULL,
  `Ersteller` int(11) NOT NULL,
  `Gewinner` int(11) NOT NULL,
  UNIQUE KEY `idx11` (`m_oid`),
  KEY `idx12` (`m_ts`),
  KEY `idx13` (`Teilnehmer`),
  KEY `idx14` (`Ersteller`),
  KEY `idx15` (`Gewinner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spiel`
--

LOCK TABLES `spiel` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `statust`
--

DROP TABLE IF EXISTS `statust`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statust` (
  `myval` varchar(50) DEFAULT NULL,
  `codes` int(11) DEFAULT NULL,
  `valActive` int(11) DEFAULT NULL,
  `rno` int(11) NOT NULL,
  UNIQUE KEY `idx20` (`codes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statust`
--

LOCK TABLES `statust` WRITE;
INSERT INTO `statust` VALUES ('erstellt',0,1,0),('gestartet',1,1,1),('beendet',2,1,2);
UNLOCK TABLES;

--
-- Table structure for table `tableerg`
--

DROP TABLE IF EXISTS `tableerg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableerg` (
  `cl` varchar(200) NOT NULL,
  `cname` varchar(200) DEFAULT NULL,
  `ergname` varchar(200) DEFAULT NULL,
  `erglist` varchar(200) DEFAULT NULL,
  `lang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableerg`
--

LOCK TABLES `tableerg` WRITE;
INSERT INTO `tableerg` VALUES ('',NULL,'start2018b','start2018b',0),('Antwort',NULL,'Antwort','Antwort',0),('Antwort','Antworttext','Antworttext','Antworttext',0),('Antwort','korrekt','korrekt','korrekt',0),('Antwort','Ref_to_Frage','Frage','Frage',0),('Antwort','_created','erzeugt am','erzeugt am',0),('Antwort','_last_modified','geändert am','geändert am',0),('Antwort','-to_Frage','Frage','Frage',0),('Antwort','-to_Runde','Runde','Runde',0),('Frage',NULL,'Frage','Frage',0),('Frage','beschreibung','beschreibung','beschreibung',0),('Frage','Kategorie','Kategorie','Kategorie',0),('Frage','antworten','antworten','antworten',0),('Frage','_created','erzeugt am','erzeugt am',0),('Frage','_last_modified','geändert am','geändert am',0),('Frage','-to_Antwort','Antwort','Antwort',0),('Frage','-to_Runde','Runde','Runde',0),('Runde',NULL,'Runde','Runde',0),('Runde','Nummer','Nummer','Nummer',0),('Runde','resultat','resultat','resultat',0),('Runde','Ref_to_Spiel','Spiel','Spiel',0),('Runde','Ref_to_Frage','Frage','Frage',0),('Runde','Ref_to_Antwort','Antwort','Antwort',0),('Runde','Ref_to_User','User','User',0),('Runde','_created','erzeugt am','erzeugt am',0),('Runde','_last_modified','geändert am','geändert am',0),('Runde','-to_Antwort','Antwort','Antwort',0),('Runde','-to_Frage','Frage','Frage',0),('Runde','-to_Spiel','Spiel','Spiel',0),('Runde','-to_User','User','User',0),('Spiel',NULL,'Spiel','Spiel',0),('Spiel','status','status','status',0),('Spiel','punkteA','punkteA','punkteA',0),('Spiel','punkteB','punkteB','punkteB',0),('Spiel','Ref_Teilnehmer','Teilnehmer','Teilnehmer',0),('Spiel','Ref_Ersteller','Ersteller','Ersteller',0),('Spiel','Ref_Gewinner','Gewinner','Gewinner',0),('Spiel','_created','erzeugt am','erzeugt am',0),('Spiel','_last_modified','geändert am','geändert am',0),('Spiel','-to_Runde','Runde','Runde',0),('Spiel','-Teilnehmer','Teilnehmer','Teilnehmer',0),('Spiel','-Ersteller','Ersteller','Ersteller',0),('Spiel','-Gewinner','Gewinner','Gewinner',0),('Spiel','+berechneRating','berechneRating','berechneRating',0),('User',NULL,'User','User',0),('User','nachname','nachname','nachname',0),('User','vorname','vorname','vorname',0),('User','kennung','kennung','kennung',0),('User','passwort','passwort','passwort',0),('User','gruppe','gruppe','gruppe',0),('User','rating','rating','rating',0),('User','nickname','nickname','nickname',0),('User','bild','bild','bild',0),('User','_created','erzeugt am','erzeugt am',0),('User','_last_modified','geändert am','geändert am',0),('User','-to_Runde','Runde','Runde',0),('User','-invTeilnehmer','Spiel','Spiel',0),('User','-invErsteller','Spiel','Spiel',0),('User','-invGewinner','Spiel','Spiel',0),('User','+login','login','login',0),('User','+logout','logout','logout',0),('KategorieT',NULL,'KategorieT','KategorieT',0),('ResultT',NULL,'ResultT','ResultT',0),('StatusT',NULL,'StatusT','StatusT',0);
UNLOCK TABLES;

--
-- Table structure for table `tableoid`
--

DROP TABLE IF EXISTS `tableoid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableoid` (
  `serverCrashed` int(11) DEFAULT NULL,
  `nextOID` int(11) NOT NULL,
  `modelID1` int(11) DEFAULT NULL,
  `modelID2` int(11) DEFAULT NULL,
  `schemaId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableoid`
--

LOCK TABLES `tableoid` WRITE;
INSERT INTO `tableoid` VALUES (0,1,18053713,-2130722811,4);
UNLOCK TABLES;

--
-- Table structure for table `tableproperties`
--

DROP TABLE IF EXISTS `tableproperties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tableproperties` (
  `userId` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `myval` text,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tableproperties`
--

LOCK TABLES `tableproperties` WRITE;
INSERT INTO `tableproperties` VALUES (0,0,'ListDialog.Bounds.TableModel.Antwort','216^70^737^153^0',1),(0,1,'Antwort.sorting','',1),(0,0,'MainWindowSize','960^520^0',1),(0,0,'MainWindowSplitterPos','7^14^79',1),(0,0,'Favorites_/_j_favorites','',1),(0,0,'TrSel_Def','Antwort||',1);
UNLOCK TABLES;

--
-- Table structure for table `to_antwort_to_frage`
--

DROP TABLE IF EXISTS `to_antwort_to_frage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `to_antwort_to_frage` (
  `oidn` int(11) NOT NULL,
  `cidn` int(10) unsigned NOT NULL,
  `oid1` int(11) NOT NULL,
  `cid1` int(10) unsigned NOT NULL,
  `status_` int(11) NOT NULL,
  KEY `idx21` (`oidn`),
  KEY `idx22` (`oid1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `to_antwort_to_frage`
--

LOCK TABLES `to_antwort_to_frage` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `to_antwort_to_runde`
--

DROP TABLE IF EXISTS `to_antwort_to_runde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `to_antwort_to_runde` (
  `oidn` int(11) NOT NULL,
  `cidn` int(10) unsigned NOT NULL,
  `oid1` int(11) NOT NULL,
  `cid1` int(10) unsigned NOT NULL,
  `status_` int(11) NOT NULL,
  KEY `idx23` (`oidn`),
  KEY `idx24` (`oid1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `to_antwort_to_runde`
--

LOCK TABLES `to_antwort_to_runde` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `to_frage_to_runde`
--

DROP TABLE IF EXISTS `to_frage_to_runde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `to_frage_to_runde` (
  `oidn` int(11) NOT NULL,
  `cidn` int(10) unsigned NOT NULL,
  `oid1` int(11) NOT NULL,
  `cid1` int(10) unsigned NOT NULL,
  `status_` int(11) NOT NULL,
  KEY `idx25` (`oidn`),
  KEY `idx26` (`oid1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `to_frage_to_runde`
--

LOCK TABLES `to_frage_to_runde` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `to_runde_to_spiel`
--

DROP TABLE IF EXISTS `to_runde_to_spiel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `to_runde_to_spiel` (
  `oidn` int(11) NOT NULL,
  `cidn` int(10) unsigned NOT NULL,
  `oid1` int(11) NOT NULL,
  `cid1` int(10) unsigned NOT NULL,
  `status_` int(11) NOT NULL,
  KEY `idx27` (`oidn`),
  KEY `idx28` (`oid1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `to_runde_to_spiel`
--

LOCK TABLES `to_runde_to_spiel` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `to_runde_to_user`
--

DROP TABLE IF EXISTS `to_runde_to_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `to_runde_to_user` (
  `oidn` int(11) NOT NULL,
  `cidn` int(10) unsigned NOT NULL,
  `oid1` int(11) NOT NULL,
  `cid1` int(10) unsigned NOT NULL,
  `status_` int(11) NOT NULL,
  KEY `idx29` (`oidn`),
  KEY `idx30` (`oid1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `to_runde_to_user`
--

LOCK TABLES `to_runde_to_user` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `m_oid` int(10) unsigned NOT NULL,
  `c_ts` int(10) unsigned NOT NULL,
  `m_ts` int(10) unsigned NOT NULL,
  `nachname` varchar(25) NOT NULL,
  `vorname` varchar(25) NOT NULL,
  `kennung` varchar(25) NOT NULL,
  `passwort` varchar(32) NOT NULL,
  `gruppe` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `nickname` varchar(20) NOT NULL,
  `bild` varchar(100) NOT NULL,
  UNIQUE KEY `idx16` (`m_oid`),
  KEY `idx17` (`m_ts`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `userlistentries`
--

DROP TABLE IF EXISTS `userlistentries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userlistentries` (
  `listId` int(10) unsigned NOT NULL,
  `clId` int(10) unsigned DEFAULT NULL,
  `m_oid` int(10) unsigned NOT NULL,
  KEY `idx38` (`listId`),
  KEY `idx39` (`m_oid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userlistentries`
--

LOCK TABLES `userlistentries` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `userlists`
--

DROP TABLE IF EXISTS `userlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userlists` (
  `listId` int(10) unsigned NOT NULL,
  `cId` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `ownerId` int(11) DEFAULT NULL,
  `sortExpr` varchar(200) DEFAULT NULL,
  `filterExpr` varchar(200) DEFAULT NULL,
  `properties` int(10) unsigned DEFAULT NULL,
  UNIQUE KEY `idx37` (`listId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userlists`
--

LOCK TABLES `userlists` WRITE;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-14 17:54:13
