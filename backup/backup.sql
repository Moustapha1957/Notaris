-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: notaris
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actes`
--

DROP TABLE IF EXISTS `actes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actes` (
  `id_acte` int(11) NOT NULL AUTO_INCREMENT,
  `id_dossier_client` int(11) NOT NULL,
  `nom_acte` varchar(255) NOT NULL,
  `valeur1` longtext DEFAULT NULL,
  `valeur2` longtext DEFAULT NULL,
  `valeur3` longtext DEFAULT NULL,
  `valeur4` longtext DEFAULT NULL,
  `valeur5` longtext DEFAULT NULL,
  `valeur6` longtext DEFAULT NULL,
  `valeur7` longtext DEFAULT NULL,
  `valeur8` longtext DEFAULT NULL,
  `valeur9` longtext DEFAULT NULL,
  `valeur10` longtext DEFAULT NULL,
  `valeur11` longtext DEFAULT NULL,
  `valeur12` longtext DEFAULT NULL,
  `valeur13` longtext DEFAULT NULL,
  `valeur14` longtext DEFAULT NULL,
  `valeur15` longtext DEFAULT NULL,
  `valeur16` longtext DEFAULT NULL,
  `valeur17` longtext DEFAULT NULL,
  `valeur18` longtext DEFAULT NULL,
  `valeur19` longtext DEFAULT NULL,
  `valeur20` longtext DEFAULT NULL,
  `valeur21` longtext DEFAULT NULL,
  `valeur22` longtext DEFAULT NULL,
  `valeur23` longtext DEFAULT NULL,
  `valeur24` longtext DEFAULT NULL,
  `valeur25` longtext DEFAULT NULL,
  `valeur26` longtext DEFAULT NULL,
  `valeur27` longtext DEFAULT NULL,
  `valeur28` longtext DEFAULT NULL,
  `valeur29` longtext DEFAULT NULL,
  `valeur30` longtext DEFAULT NULL,
  `valeur31` longtext DEFAULT NULL,
  `valeur32` longtext DEFAULT NULL,
  `valeur33` longtext DEFAULT NULL,
  `valeur34` longtext DEFAULT NULL,
  `valeur35` longtext DEFAULT NULL,
  `valeur36` longtext DEFAULT NULL,
  `valeur37` longtext DEFAULT NULL,
  `valeur38` longtext DEFAULT NULL,
  `valeur39` longtext DEFAULT NULL,
  `valeur40` longtext DEFAULT NULL,
  PRIMARY KEY (`id_acte`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actes`
--

LOCK TABLES `actes` WRITE;
/*!40000 ALTER TABLE `actes` DISABLE KEYS */;
INSERT INTO `actes` VALUES (20,1,'QSEF','SARLj','SARLj',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `actes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assurance`
--

DROP TABLE IF EXISTS `assurance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assurance` (
  `id_assurance` int(11) NOT NULL AUTO_INCREMENT,
  `id_sous_dossier` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  `autres_information` varchar(255) NOT NULL,
  PRIMARY KEY (`id_assurance`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assurance`
--

LOCK TABLES `assurance` WRITE;
/*!40000 ALTER TABLE `assurance` DISABLE KEYS */;
INSERT INTO `assurance` VALUES (1,'1','45000000','azertyuiopqsdfghjk'),(2,'4','50000000','vcxwsqaz'),(3,'9','8000000','assurance CEDEAO'),(4,'10','18000000','assurance CEDEAO'),(5,'12','50000000','La maison se situe a KABALA ACI'),(6,'14','50000000','assurance CEDEAO'),(7,'15','1000000','assurance CEDEAO'),(8,'16','5000000','assurance CEDEAO'),(9,'18','200000','Les vehicules sont immatriculés comme suite : BF 2020 MD, CA 4587 MD, BZ 1478 MD et BX 5698 MD'),(10,'21','12000000','qskelfjjqefjil'),(11,'23','4000000','azerty'),(12,'25','100000000','Le Bail Est Effectuer Sur Une Durée De 10 Ans'),(13,'26','1200000',' a raison de 100'),(14,'27','15000000','assurance CEDEAO'),(15,'0','2000000','azerty'),(16,'0','2000000','azerty'),(17,'0','2000000','azerty'),(18,'0','2000000','qsdfgh');
/*!40000 ALTER TABLE `assurance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bails`
--

DROP TABLE IF EXISTS `bails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bails` (
  `id_bails` int(11) NOT NULL AUTO_INCREMENT,
  `id_sous_dossier` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  `autres_information` varchar(255) NOT NULL,
  PRIMARY KEY (`id_bails`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bails`
--

LOCK TABLES `bails` WRITE;
/*!40000 ALTER TABLE `bails` DISABLE KEYS */;
INSERT INTO `bails` VALUES (1,'8','19000000','qsdfgh'),(2,'11','19000000','qsdfgh'),(3,'13','100000000','La parcelle ce trouve a Kalaban Coura '),(4,'17','1000000','qsdfgh'),(5,'19','12000000','Location d\'habitat 2 ans mensuelle : 500.000'),(6,'20','50000000','assurance CEDEAO'),(7,'22','10000000','azerty'),(8,'24','45000000','azerty');
/*!40000 ALTER TABLE `bails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commentaires` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_dossier` int(11) NOT NULL,
  `id_sous_dossier` int(11) NOT NULL,
  `modification` varchar(255) NOT NULL,
  `date_modification` varchar(255) NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `id_user` (`id_user`),
  KEY `id_dossier` (`id_dossier`),
  KEY `id_sous_dossier` (`id_sous_dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentaires`
--

LOCK TABLES `commentaires` WRITE;
/*!40000 ALTER TABLE `commentaires` DISABLE KEYS */;
INSERT INTO `commentaires` VALUES (1,2,1074075064,25,'Modification dans L\'Acte Bail de 5 Hectars Entre L\'ACI 2000 Et','2024-02-07'),(2,2,1074075064,25,'Modification dans L\'Acte Bail de 5 Hectars Entre L\'ACI 2000 Et Moussa DIARRA','2024-02-07'),(3,2,1074075064,20,'Modification dans L\'Acte Bails du Parcelle TF_12345','2024-02-07'),(4,2,1074075064,25,'Modification dans L\'Acte Bail de 5 Hectars Entre L\'ACI 2000 Et Moussa DIARRA A','2024-02-07'),(5,2,1074075064,20,'Modification dans L\'Acte Bails du Parcelle TF_1234578','2024-02-07'),(6,2,1074075064,20,'Modification dans L\'Acte Bails du Parcelle TF_1','2024-02-09'),(7,2,1074075064,20,'Modification dans L\'Acte Bails du Parcelle TF_1','2024-02-12'),(8,2,2147483647,35,'Modification dans L\'Acte Assurance Vie','2024-02-15'),(9,2,2147483647,35,'Modification dans L\'Acte Assurance Vie','2024-02-15'),(10,2,2147483647,36,'Modification dans L\'Acte okledo','2024-02-15'),(11,2,2147483647,38,'Modification dans L\'Acte Azertyiokl','2024-02-15'),(12,2,2147483647,27,'Modification dans L\'Acte Assurance de la Voiture KIA BF 4587 MD 0','2024-02-15'),(13,2,2147483647,34,'Modification dans L\'Acte mali','2024-02-15'),(14,2,1074075064,25,'Modification dans L\'Acte Bail de 5 Hectars Entre L\'ACI 2000 Et Moussa DIARRA M','2024-02-15'),(15,2,2147483647,39,'Modification dans L\'Acte jolie jolie mali','2024-02-15'),(16,2,1074075064,40,'Modification dans L\'Acte Bail de 5 Hectars Entre L\'ACI 2000 Et Moussa DIARRA bv','2024-02-15'),(17,2,2147483647,41,'Modification dans L\'Acte azerty','2024-02-15'),(18,2,2147483647,41,'Modification dans L\'Acte azertydgr','2024-02-15'),(19,2,2147483647,42,'Modification dans L\'Acte Bails du Parcelle TF_11111','2024-02-15'),(20,2,1074075064,40,'Modification dans L\'Acte Bail de 5 Hectars Entre L\'ACI 2000 Et Moussa DIARRA b','2024-02-16'),(21,2,1074075064,45,'Modification dans L\'Acte Acte d\'assurance entre Mr Moussa Diarra et Mme Coulibaly Aminata Diallo','2024-02-16');
/*!40000 ALTER TABLE `commentaires` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departement_user`
--

DROP TABLE IF EXISTS `departement_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departement_user` (
  `id_departement` int(11) NOT NULL,
  `nom_departement` varchar(255) NOT NULL,
  `date_enregis_departement` date NOT NULL,
  PRIMARY KEY (`id_departement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departement_user`
--

LOCK TABLES `departement_user` WRITE;
/*!40000 ALTER TABLE `departement_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `departement_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departements`
--

DROP TABLE IF EXISTS `departements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_departement` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departements`
--

LOCK TABLES `departements` WRITE;
/*!40000 ALTER TABLE `departements` DISABLE KEYS */;
INSERT INTO `departements` VALUES (1,'Notaire'),(2,'Clerc Principal'),(3,'Secrétaire Clerc');
/*!40000 ALTER TABLE `departements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dossier_client`
--

DROP TABLE IF EXISTS `dossier_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dossier_client` (
  `id_dossier_client` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `prenom_client` varchar(255) NOT NULL,
  `adresse_client` varchar(255) NOT NULL,
  `contact_client` varchar(255) NOT NULL,
  `prenom_pere_client` varchar(255) NOT NULL,
  `nom_pere_client` varchar(255) NOT NULL,
  `prenom_mere_client` varchar(255) NOT NULL,
  `nom_mere_client` varchar(255) NOT NULL,
  `autres_informations` varchar(255) NOT NULL,
  `situation_matrimoniale` varchar(255) NOT NULL,
  `email_client` varchar(10) NOT NULL,
  `date_creation` varchar(255) NOT NULL,
  `nombre_acte` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_dossier_client`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dossier_client`
--

LOCK TABLES `dossier_client` WRITE;
/*!40000 ALTER TABLE `dossier_client` DISABLE KEYS */;
INSERT INTO `dossier_client` VALUES ('1','Notaris/202','Kaba DIAKITE','Assa','Sebenicoro','75738580','wrsdfv','QES','dswv','sdwfd','Autres Informations','Mariée','assakaba90',' 	2024-02-13',0),('1074075064','2','DIARRA','Moussa','Moribabougou','66892451','Yacouba','DIARRA','Ramata','TRAORE','Clerc Cabinet Notarial TOURE N&#039;DIAYE','Marié','mdiarra@no',' 	2024-03-13',5),('2024022516471601','2','ilqsEHuifzeq','drfgwsrf','qserggse','qetsg','qers','qers','eqr','qergseve','Autres Informations','reqggrfv','ers@erg.fr','2024-02-14',1),('2024022844478019','3','qsREFC','drfsr','gsefz','dwsfgb','wdrbf','wdrgvg','wsdf','wsgesz','Autres Informations','wsgvvd','sedf@seg.d','2024-02-22',0),('2024022866902027','2','Yalcoué','Hamidou','Kabala','01020304','Alou','Yalcoué','Bintou','Yalcoué','Autres Informations','Marié','hamidouyal',' 	2024-01-13',1),('2024024071092337','2','Coulibaly','Fatoumata','Bacodjicoroni','01010202','azerty','azerty','azertty','azertty','Autres Informations','Célibataire','fc@gmail.c','2024-02-15',2),('202402897047703','2','Boré','Souleymane','Lafiabougou','82266693','azerty','azerty','azerty','azerty','Autres Informations','Célibataire','souleymane','2024-02-13',2),('2806578427','2','Maiga','Hammare Mamadou','Golf','76232541','Maiga','Maiga','Maiga','Maiga','Autres Informations','Mariée','hammare.ma',' 	2024-02-13',0),('464732542','Notaris/2024-01-25/3512159969','DIABY','Ya Moustapha','Sabalibougou','75738580','Zoumana','DIABY','Bintou','GUINDO','Autres Informations','Célibataire','moustaphad',' 	2024-02-13',0);
/*!40000 ALTER TABLE `dossier_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frais_emolument`
--

DROP TABLE IF EXISTS `frais_emolument`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frais_emolument` (
  `id_sous_dossier` varchar(255) NOT NULL,
  `id_frais_emolument` varchar(255) NOT NULL,
  `numero_notaris` varchar(255) NOT NULL,
  `1_2500000` varchar(255) NOT NULL,
  `2500000_5000000` varchar(255) NOT NULL,
  `5000000_10000000` varchar(255) NOT NULL,
  `10000000_plus` varchar(255) NOT NULL,
  `total_frais` varchar(255) NOT NULL,
  `montant_remise` varchar(255) DEFAULT NULL,
  `montant_initiale` varchar(255) NOT NULL,
  `date_creation_emolument` varchar(255) NOT NULL,
  UNIQUE KEY `numero_notaris` (`numero_notaris`),
  KEY `id_sous_dossier` (`id_sous_dossier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frais_emolument`
--

LOCK TABLES `frais_emolument` WRITE;
/*!40000 ALTER TABLE `frais_emolument` DISABLE KEYS */;
INSERT INTO `frais_emolument` VALUES ('14','001/01/2024/AK','10001129766077','50000','0','0','0','50000','40000','2000000','2024-02-14'),('13','003/01/2024/YD','100013383798823','100000','75000','125000','525000','825000','660000','45000000','2024-02-14'),('18','008/02/2024/YD','1000198101852','62500','37500','0','0','100000','80000','5000000','2024-02-14'),('20','004/01/2024/YD','10001982885187','100000','75000','125000','75000','375000','','15000000','2024-02-14'),('41','013/02/2024/YD','100021343226805','100000','45000','0','0','145000','','4000000','2024-02-15'),('35','010/02/2024/YD','100021613616825','12500','0','0','0','12500','','500000','2024-02-15'),('26','007/02/2024/YD','100022313919255','30000','0','0','0','30000','','1200000','2024-02-14'),('40','012/02/2024/YD','100022684892408','100000','75000','125000','0','300000','','10000000','2024-02-15'),('43','014/02/2024/YD','100022737197256','8750','0','0','0','8750','','350000','2024-02-15'),('34','009/02/2024/YD','100022806417431','100000','75000','125000','0','300000','','10000000','2024-02-14'),('36','011/02/2024/YD','100022921245916','60000','0','0','0','60000','','2000000','2024-02-15'),('25','006/02/2024/YD','10002985844559','62500','37500','50000','360000','510000','408000','100000000','2024-02-14'),('12','002/01/2024/YD','1002384662070','62500','37500','50000','140000','290000','232000','45000000','2024-02-14');
/*!40000 ALTER TABLE `frais_emolument` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messagerie` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `email_emetteur` varchar(255) NOT NULL,
  `email_recepteur` varchar(255) NOT NULL,
  `sujet` mediumtext NOT NULL,
  `libelle_messagerie` mediumtext NOT NULL,
  `lecture` varchar(3) NOT NULL DEFAULT 'non',
  `datee` datetime NOT NULL,
  `fichier_pdf` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email_emetteur` (`email_emetteur`),
  KEY `email_recepteur` (`email_recepteur`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messagerie`
--

LOCK TABLES `messagerie` WRITE;
/*!40000 ALTER TABLE `messagerie` DISABLE KEYS */;
INSERT INTO `messagerie` VALUES (16,'moustaphadiaby861@gmail.com','moussadiarra@gmail.com','djhi','qzefd','non','2024-02-13 11:45:11','Dépliant_Imperis SARL_Final.pdf'),(17,'moustaphadiaby861@gmail.com','moustaphadiaby861@gmail.com','aazd','afzadz','non','2024-02-21 10:32:52',NULL);
/*!40000 ALTER TABLE `messagerie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `email_expediteur` varchar(255) NOT NULL,
  `email_destinateur` varchar(255) NOT NULL,
  `indexx` int(11) NOT NULL,
  PRIMARY KEY (`id_notif`),
  KEY `email_expediteur` (`email_expediteur`),
  KEY `email_destinateur` (`email_destinateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (1,'tourendiaye@gmail.com','moustaphadiaby861@gmail.com',3),(2,'tourendiaye@gmail.com','tourendiaye@gmail.com',2),(3,'moustaphadiaby861@gmail.com','tourendiaye@gmail.com',0),(4,'moustaphadiaby861@gmail.com','moustaphadiaby861@gmail.com',1);
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pourcentages`
--

DROP TABLE IF EXISTS `pourcentages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pourcentages` (
  `id_pourcentage` int(11) NOT NULL AUTO_INCREMENT,
  `nom_pourcentage` varchar(255) NOT NULL,
  `premier_pourcentage` varchar(255) NOT NULL,
  `deuxieme_pourcentage` varchar(255) NOT NULL,
  `troisieme_pourcentage` varchar(255) NOT NULL,
  `quatrieme_pourcentage` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pourcentage`),
  UNIQUE KEY `nom_pourcentage` (`nom_pourcentage`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pourcentages`
--

LOCK TABLES `pourcentages` WRITE;
/*!40000 ALTER TABLE `pourcentages` DISABLE KEYS */;
INSERT INTO `pourcentages` VALUES (1,'Baux','4','3','2.5','1.5'),(2,'Assurance','2.5','1.5','1','0.40'),(4,'Vente mobilier','4','2','2.5','1');
/*!40000 ALTER TABLE `pourcentages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `remise`
--

DROP TABLE IF EXISTS `remise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remise` (
  `id_remise` int(11) NOT NULL AUTO_INCREMENT,
  `id_sous_dossier` varchar(255) NOT NULL,
  `montant_remise` varchar(255) NOT NULL,
  PRIMARY KEY (`id_remise`),
  KEY `id_sous_dossier` (`id_sous_dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remise`
--

LOCK TABLES `remise` WRITE;
/*!40000 ALTER TABLE `remise` DISABLE KEYS */;
INSERT INTO `remise` VALUES (37,'13','660000'),(38,'14','40000'),(40,'18','80000'),(47,'25','408000'),(48,'12','232000'),(49,'20','300000'),(51,'45','10000'),(52,'47','40000');
/*!40000 ALTER TABLE `remise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rendez_vous`
--

DROP TABLE IF EXISTS `rendez_vous`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rendez_vous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rendez_vous`
--

LOCK TABLES `rendez_vous` WRITE;
/*!40000 ALTER TABLE `rendez_vous` DISABLE KEYS */;
INSERT INTO `rendez_vous` VALUES (6,'2024-01-02','00:00:08'),(7,'2024-01-02','08:00:00'),(8,'2024-01-02','08:00:00'),(9,'0000-00-00','10:00:00'),(10,'0000-00-00','12:30:00'),(11,'0000-00-00','15:00:00');
/*!40000 ALTER TABLE `rendez_vous` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rendez_vous_departements`
--

DROP TABLE IF EXISTS `rendez_vous_departements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rendez_vous_departements` (
  `id_rendez_vous` int(11) DEFAULT NULL,
  `id_departement` int(11) DEFAULT NULL,
  KEY `id_rendez_vous` (`id_rendez_vous`),
  KEY `id_departement` (`id_departement`),
  CONSTRAINT `rendez_vous_departements_ibfk_1` FOREIGN KEY (`id_rendez_vous`) REFERENCES `rendez_vous` (`id`),
  CONSTRAINT `rendez_vous_departements_ibfk_2` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rendez_vous_departements`
--

LOCK TABLES `rendez_vous_departements` WRITE;
/*!40000 ALTER TABLE `rendez_vous_departements` DISABLE KEYS */;
INSERT INTO `rendez_vous_departements` VALUES (6,2),(8,1),(9,3),(10,1),(10,2),(10,3),(11,1),(11,2);
/*!40000 ALTER TABLE `rendez_vous_departements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `societe`
--

DROP TABLE IF EXISTS `societe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `societe` (
  `id_societe` int(11) NOT NULL AUTO_INCREMENT,
  `id_sous_dossier` varchar(255) NOT NULL,
  `denomination` varchar(255) NOT NULL,
  `forme` varchar(255) NOT NULL,
  `capital` varchar(255) NOT NULL,
  `immatriculation` varchar(255) NOT NULL,
  PRIMARY KEY (`id_societe`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `societe`
--

LOCK TABLES `societe` WRITE;
/*!40000 ALTER TABLE `societe` DISABLE KEYS */;
INSERT INTO `societe` VALUES (1,'6','KOKADJE','SARL','1000000','RM-2023-45698'),(2,'7','MALIKO','SARL','1000000','RM-2023-45698GH');
/*!40000 ALTER TABLE `societe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `societes`
--

DROP TABLE IF EXISTS `societes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `societes` (
  `id_societe` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_sous_dossier` int(11) NOT NULL,
  PRIMARY KEY (`id_societe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `societes`
--

LOCK TABLES `societes` WRITE;
/*!40000 ALTER TABLE `societes` DISABLE KEYS */;
/*!40000 ALTER TABLE `societes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sous_dossier_client`
--

DROP TABLE IF EXISTS `sous_dossier_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sous_dossier_client` (
  `id_sous_dossier_client` int(11) NOT NULL AUTO_INCREMENT,
  `id_dossier_client` varchar(255) NOT NULL,
  `type_sous_dossier` varchar(255) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nom_sous_dossier` varchar(255) NOT NULL,
  `valeur` varchar(255) DEFAULT NULL,
  `autres_information` varchar(2000) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT 1 COMMENT '0=fermer\r\n1=ouvert',
  `intervenants_doc` varchar(255) DEFAULT NULL,
  `numero_notaris` varchar(255) NOT NULL,
  `date_creation_acte` varchar(255) NOT NULL,
  PRIMARY KEY (`id_sous_dossier_client`),
  KEY `id_dossier_client` (`id_dossier_client`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sous_dossier_client`
--

LOCK TABLES `sous_dossier_client` WRITE;
/*!40000 ALTER TABLE `sous_dossier_client` DISABLE KEYS */;
INSERT INTO `sous_dossier_client` VALUES (39,'2024024071092337','Assurance','2','jolie jolie mali','500000','azerty',0,NULL,'10002587879746','2024-02-15'),(40,'1074075064','Baux','3','Bail de 5 Hectars Entre L\'ACI 2000 Et Moussa DIARRA b','10000000','azertyu',1,'AK/YD/MD','100022684892408','2024-02-15'),(41,'2024024071092337','Baux','2','azertydgr','5000000','azerty',1,'AK/YD/MD','100021343226805','2024-02-15'),(42,'2024022866902027','Baux','2','Bails du Parcelle TF_11111','12000000','azerty',1,NULL,'10002143442137','2024-02-15'),(43,'202402897047703','Assurance','2','Assurance Lafia','350000','Assurance tout risque',1,NULL,'100022737197256','2024-02-15'),(44,'202402897047703','Baux','2','Malisitution kadi','150000','ljjksd',1,NULL,'100023327904871','2024-02-15'),(45,'1074075064','Assurance','2','Acte d\'assurance entre Mr Moussa Diarra et Mme Coulibaly Aminata Diallo','2000000','azerty',1,'AK/YD/MD','100022743909572','2024-02-16'),(46,'1074075064','Baux','3','ktyityf','1000000','azert',1,NULL,'1000287577640','2024-02-23'),(47,'1074075064','Assurance','2','azerty','2000000','assurance CEDEAO',1,NULL,'8898235','2024-02-23'),(48,'1074075064','Vente mobilier','2','azert','3000000','qefgefe',1,NULL,'1009183983','2024-02-23');
/*!40000 ALTER TABLE `sous_dossier_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user_at` int(11) NOT NULL AUTO_INCREMENT,
  `matricule_user` varchar(255) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `adresse_user` varchar(255) NOT NULL,
  `contact_user` varchar(255) NOT NULL,
  `sexe` varchar(1) DEFAULT NULL COMMENT 'M = Homme; F = Femme',
  `abreviation_log_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `departement_user` varchar(255) NOT NULL,
  `profession_user` varchar(255) NOT NULL,
  `date_enregis_user` date NOT NULL,
  `last_login_datetime` varchar(2500) DEFAULT NULL,
  `last_logout_datetime` varchar(2500) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_user_at`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'123','DIARRA','Moussa','xxxx','xxxx',NULL,'MD','moussadiarra@gmail.com','12345678','Secretaire','Secretaire','2023-11-21','2023-12-22 12:26:02','2023-11-21 11:45:33',NULL),(2,'Notaris/202','DIABY','Ya Moustapha','Sabalibougou','75738580','M','YD','moustaphadiaby861@gmail.com','12345678','Clerc Principal','Notaire','0000-00-00','2024-02-27 09:34:16','2024-02-26 16:27:49','DIABY_Ya Moustapha_YD.png'),(3,'Notaris/2024-01-25/3512159969','Kaba DIAKITE','Assa','Sebenicoro','75738580','F','AK','assakaba90@gmail.com','12345678','Notaire','CLERC','2024-01-25','2024-02-26 15:55:54','2024-02-26 16:13:32','DIAKITE_Assa Kaba_AK.png'),(4,'Notaris/2024/02/01','DIABY','Zoumana','Sabalibougou','75738580',NULL,'ZD','zoumanadiaby@gmail.com','12345678','Notaire','Notaire','0000-00-00','2024-02-01 13:37:47','2024-02-01 13:40:14',NULL),(11,'Notaris/2024-02-20/3339645114','SOUMANO','Massama','Sabalibougou','01010203','M','MS','massamasoum@gmail.com','12345678','Notaire','Notaire','2024-02-20',NULL,NULL,'SOUMANO_Massama_MS.png'),(12,'Notaris/2024-02-20/3943889662','azerty','azerty','azerty','01010203','F','AA','massamasoum@gmail.com','12345678','Notaire','Notaire','2024-02-20',NULL,NULL,'azerty_azerty_AA.png');
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

-- Dump completed on 2024-02-27 10:13:55
