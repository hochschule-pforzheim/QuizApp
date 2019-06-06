-- MySQL dump 10.16  Distrib 10.1.23-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: wingduell2
-- ------------------------------------------------------
-- Server version	10.1.23-MariaDB-9+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `Antwort`
--

LOCK TABLES `Antwort` WRITE;
/*!40000 ALTER TABLE `Antwort` DISABLE KEYS */;
INSERT  IGNORE INTO `Antwort` (`m_oid`, `c_ts`, `m_ts`, `Antworttext`, `korrekt`, `to_Frage`, `ts`) VALUES (1,NULL,NULL,'4',5,2,'2019-01-14 08:25:02');
/*!40000 ALTER TABLE `Antwort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Frage`
--

LOCK TABLES `Frage` WRITE;
/*!40000 ALTER TABLE `Frage` DISABLE KEYS */;
INSERT  IGNORE INTO `Frage` (`m_oid`, `c_ts`, `m_ts`, `beschreibung`, `Kategorie`, `ts`) VALUES (1,2525252,24242,'test',2,'2019-01-14 08:35:59'),(2,4545,454646,'text2',1,'2019-01-14 08:36:11');
/*!40000 ALTER TABLE `Frage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `KategorieT`
--

LOCK TABLES `KategorieT` WRITE;
/*!40000 ALTER TABLE `KategorieT` DISABLE KEYS */;
INSERT  IGNORE INTO `KategorieT` (`myval`, `codes`, `valActive`, `rno`, `ts`) VALUES ('IT',0,1,0,'2019-01-14 08:21:13'),('Controlling',1,1,1,'2019-01-14 08:21:13'),('Professoren',2,1,2,'2019-01-14 08:21:13'),('Pforzheim',3,1,3,'2019-01-14 08:21:13'),('Kneipen',4,1,4,'2019-01-14 08:21:13'),('Mathematik',5,1,5,'2019-01-14 08:21:13'),('SPO',6,1,6,'2019-01-14 08:21:13');
/*!40000 ALTER TABLE `KategorieT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ResultT`
--

LOCK TABLES `ResultT` WRITE;
/*!40000 ALTER TABLE `ResultT` DISABLE KEYS */;
INSERT  IGNORE INTO `ResultT` (`myval`, `codes`, `valActive`, `rno`, `ts`) VALUES ('offen',0,1,0,'2019-01-14 08:21:13'),('falsch',1,1,1,'2019-01-14 08:21:13'),('richtig',2,1,2,'2019-01-14 08:21:13');
/*!40000 ALTER TABLE `ResultT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Runde`
--

LOCK TABLES `Runde` WRITE;
/*!40000 ALTER TABLE `Runde` DISABLE KEYS */;
INSERT  IGNORE INTO `Runde` (`m_oid`, `c_ts`, `m_ts`, `Nummer`, `resultat`, `to_Antwort`, `to_Frage`, `to_Spiel`, `to_User`, `ts`) VALUES (1,235325,23523535,2,3,1,1,2,3,'2019-01-14 08:36:29');
/*!40000 ALTER TABLE `Runde` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Spiel`
--

LOCK TABLES `Spiel` WRITE;
/*!40000 ALTER TABLE `Spiel` DISABLE KEYS */;
INSERT  IGNORE INTO `Spiel` (`m_oid`, `c_ts`, `m_ts`, `status0`, `punkteA`, `punkteB`, `Teilnehmer`, `Ersteller`, `Gewinner`, `ts`) VALUES (1,NULL,NULL,3,3,3,3,3,3,'2019-01-14 08:36:38');
/*!40000 ALTER TABLE `Spiel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `StatusT`
--

LOCK TABLES `StatusT` WRITE;
/*!40000 ALTER TABLE `StatusT` DISABLE KEYS */;
INSERT  IGNORE INTO `StatusT` (`myval`, `codes`, `valActive`, `rno`, `ts`) VALUES ('erstellt',0,1,0,'2019-01-14 08:21:13'),('gestartet',1,1,1,'2019-01-14 08:21:13'),('beendet',2,1,2,'2019-01-14 08:21:13');
/*!40000 ALTER TABLE `StatusT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT  IGNORE INTO `User` (`m_oid`, `c_ts`, `m_ts`, `nachname`, `vorname`, `kennung`, `passwort`, `gruppe`, `rating`, `nickname`, `bild`, `ts`) VALUES (1,1,1359615962,'Nippa','Markus','nippa','098f6bcd4621d373cade4e832627b4f6',1,NULL,NULL,NULL,'2019-01-14 10:24:39'),(2,2,1359615962,'Schätter','Alfred','schaetter','098f6bcd4621d373cade4e832627b4f6',2,NULL,NULL,NULL,'2019-01-14 10:24:39');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-14 11:26:02
