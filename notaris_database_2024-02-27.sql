

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

INSERT INTO actes VALUES("20","1","QSEF","SARLj","SARLj","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");



CREATE TABLE `assurance` (
  `id_assurance` int(11) NOT NULL AUTO_INCREMENT,
  `id_sous_dossier` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  `autres_information` varchar(255) NOT NULL,
  PRIMARY KEY (`id_assurance`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO assurance VALUES("1","1","45000000","azertyuiopqsdfghjk");
INSERT INTO assurance VALUES("2","4","50000000","vcxwsqaz");
INSERT INTO assurance VALUES("3","9","8000000","assurance CEDEAO");
INSERT INTO assurance VALUES("4","10","18000000","assurance CEDEAO");
INSERT INTO assurance VALUES("5","12","50000000","La maison se situe a KABALA ACI");
INSERT INTO assurance VALUES("6","14","50000000","assurance CEDEAO");
INSERT INTO assurance VALUES("7","15","1000000","assurance CEDEAO");
INSERT INTO assurance VALUES("8","16","5000000","assurance CEDEAO");
INSERT INTO assurance VALUES("9","18","200000","Les vehicules sont immatriculés comme suite : BF 2020 MD, CA 4587 MD, BZ 1478 MD et BX 5698 MD");
INSERT INTO assurance VALUES("10","21","12000000","qskelfjjqefjil");
INSERT INTO assurance VALUES("11","23","4000000","azerty");
INSERT INTO assurance VALUES("12","25","100000000","Le Bail Est Effectuer Sur Une Durée De 10 Ans");
INSERT INTO assurance VALUES("13","26","1200000"," a raison de 100");
INSERT INTO assurance VALUES("14","27","15000000","assurance CEDEAO");
INSERT INTO assurance VALUES("15","0","2000000","azerty");
INSERT INTO assurance VALUES("16","0","2000000","azerty");
INSERT INTO assurance VALUES("17","0","2000000","azerty");
INSERT INTO assurance VALUES("18","0","2000000","qsdfgh");



CREATE TABLE `bails` (
  `id_bails` int(11) NOT NULL AUTO_INCREMENT,
  `id_sous_dossier` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  `autres_information` varchar(255) NOT NULL,
  PRIMARY KEY (`id_bails`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO bails VALUES("1","8","19000000","qsdfgh");
INSERT INTO bails VALUES("2","11","19000000","qsdfgh");
INSERT INTO bails VALUES("3","13","100000000","La parcelle ce trouve a Kalaban Coura ");
INSERT INTO bails VALUES("4","17","1000000","qsdfgh");
INSERT INTO bails VALUES("5","19","12000000","Location d'habitat 2 ans mensuelle : 500.000");
INSERT INTO bails VALUES("6","20","50000000","assurance CEDEAO");
INSERT INTO bails VALUES("7","22","10000000","azerty");
INSERT INTO bails VALUES("8","24","45000000","azerty");



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

INSERT INTO commentaires VALUES("1","2","1074075064","25","Modification dans L'Acte Bail de 5 Hectars Entre L'ACI 2000 Et","2024-02-07");
INSERT INTO commentaires VALUES("2","2","1074075064","25","Modification dans L'Acte Bail de 5 Hectars Entre L'ACI 2000 Et Moussa DIARRA","2024-02-07");
INSERT INTO commentaires VALUES("3","2","1074075064","20","Modification dans L'Acte Bails du Parcelle TF_12345","2024-02-07");
INSERT INTO commentaires VALUES("4","2","1074075064","25","Modification dans L'Acte Bail de 5 Hectars Entre L'ACI 2000 Et Moussa DIARRA A","2024-02-07");
INSERT INTO commentaires VALUES("5","2","1074075064","20","Modification dans L'Acte Bails du Parcelle TF_1234578","2024-02-07");
INSERT INTO commentaires VALUES("6","2","1074075064","20","Modification dans L'Acte Bails du Parcelle TF_1","2024-02-09");
INSERT INTO commentaires VALUES("7","2","1074075064","20","Modification dans L'Acte Bails du Parcelle TF_1","2024-02-12");
INSERT INTO commentaires VALUES("8","2","2147483647","35","Modification dans L'Acte Assurance Vie","2024-02-15");
INSERT INTO commentaires VALUES("9","2","2147483647","35","Modification dans L'Acte Assurance Vie","2024-02-15");
INSERT INTO commentaires VALUES("10","2","2147483647","36","Modification dans L'Acte okledo","2024-02-15");
INSERT INTO commentaires VALUES("11","2","2147483647","38","Modification dans L'Acte Azertyiokl","2024-02-15");
INSERT INTO commentaires VALUES("12","2","2147483647","27","Modification dans L'Acte Assurance de la Voiture KIA BF 4587 MD 0","2024-02-15");
INSERT INTO commentaires VALUES("13","2","2147483647","34","Modification dans L'Acte mali","2024-02-15");
INSERT INTO commentaires VALUES("14","2","1074075064","25","Modification dans L'Acte Bail de 5 Hectars Entre L'ACI 2000 Et Moussa DIARRA M","2024-02-15");
INSERT INTO commentaires VALUES("15","2","2147483647","39","Modification dans L'Acte jolie jolie mali","2024-02-15");
INSERT INTO commentaires VALUES("16","2","1074075064","40","Modification dans L'Acte Bail de 5 Hectars Entre L'ACI 2000 Et Moussa DIARRA bv","2024-02-15");
INSERT INTO commentaires VALUES("17","2","2147483647","41","Modification dans L'Acte azerty","2024-02-15");
INSERT INTO commentaires VALUES("18","2","2147483647","41","Modification dans L'Acte azertydgr","2024-02-15");
INSERT INTO commentaires VALUES("19","2","2147483647","42","Modification dans L'Acte Bails du Parcelle TF_11111","2024-02-15");
INSERT INTO commentaires VALUES("20","2","1074075064","40","Modification dans L'Acte Bail de 5 Hectars Entre L'ACI 2000 Et Moussa DIARRA b","2024-02-16");
INSERT INTO commentaires VALUES("21","2","1074075064","45","Modification dans L'Acte Acte d'assurance entre Mr Moussa Diarra et Mme Coulibaly Aminata Diallo","2024-02-16");



CREATE TABLE `departement_user` (
  `id_departement` int(11) NOT NULL,
  `nom_departement` varchar(255) NOT NULL,
  `date_enregis_departement` date NOT NULL,
  PRIMARY KEY (`id_departement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




CREATE TABLE `departements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_departement` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO departements VALUES("1","Notaire");
INSERT INTO departements VALUES("2","Clerc Principal");
INSERT INTO departements VALUES("3","Secrétaire Clerc");



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

INSERT INTO dossier_client VALUES("1","Notaris/202","Kaba DIAKITE","Assa","Sebenicoro","75738580","wrsdfv","QES","dswv","sdwfd","Autres Informations","Mariée","assakaba90"," 	2024-02-13","0");
INSERT INTO dossier_client VALUES("1074075064","2","DIARRA","Moussa","Moribabougou","66892451","Yacouba","DIARRA","Ramata","TRAORE","Clerc Cabinet Notarial TOURE N&#039;DIAYE","Marié","mdiarra@no"," 	2024-03-13","5");
INSERT INTO dossier_client VALUES("2024022516471601","2","ilqsEHuifzeq","drfgwsrf","qserggse","qetsg","qers","qers","eqr","qergseve","Autres Informations","reqggrfv","ers@erg.fr","2024-02-14","1");
INSERT INTO dossier_client VALUES("2024022844478019","3","qsREFC","drfsr","gsefz","dwsfgb","wdrbf","wdrgvg","wsdf","wsgesz","Autres Informations","wsgvvd","sedf@seg.d","2024-02-22","0");
INSERT INTO dossier_client VALUES("2024022866902027","2","Yalcoué","Hamidou","Kabala","01020304","Alou","Yalcoué","Bintou","Yalcoué","Autres Informations","Marié","hamidouyal"," 	2024-01-13","1");
INSERT INTO dossier_client VALUES("2024024071092337","2","Coulibaly","Fatoumata","Bacodjicoroni","01010202","azerty","azerty","azertty","azertty","Autres Informations","Célibataire","fc@gmail.c","2024-02-15","2");
INSERT INTO dossier_client VALUES("202402897047703","2","Boré","Souleymane","Lafiabougou","82266693","azerty","azerty","azerty","azerty","Autres Informations","Célibataire","souleymane","2024-02-13","2");
INSERT INTO dossier_client VALUES("2806578427","2","Maiga","Hammare Mamadou","Golf","76232541","Maiga","Maiga","Maiga","Maiga","Autres Informations","Mariée","hammare.ma"," 	2024-02-13","0");
INSERT INTO dossier_client VALUES("464732542","Notaris/2024-01-25/3512159969","DIABY","Ya Moustapha","Sabalibougou","75738580","Zoumana","DIABY","Bintou","GUINDO","Autres Informations","Célibataire","moustaphad"," 	2024-02-13","0");



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

INSERT INTO frais_emolument VALUES("14","001/01/2024/AK","10001129766077","50000","0","0","0","50000","40000","2000000","2024-02-14");
INSERT INTO frais_emolument VALUES("13","003/01/2024/YD","100013383798823","100000","75000","125000","525000","825000","660000","45000000","2024-02-14");
INSERT INTO frais_emolument VALUES("18","008/02/2024/YD","1000198101852","62500","37500","0","0","100000","80000","5000000","2024-02-14");
INSERT INTO frais_emolument VALUES("20","004/01/2024/YD","10001982885187","100000","75000","125000","75000","375000","","15000000","2024-02-14");
INSERT INTO frais_emolument VALUES("41","013/02/2024/YD","100021343226805","100000","45000","0","0","145000","","4000000","2024-02-15");
INSERT INTO frais_emolument VALUES("35","010/02/2024/YD","100021613616825","12500","0","0","0","12500","","500000","2024-02-15");
INSERT INTO frais_emolument VALUES("26","007/02/2024/YD","100022313919255","30000","0","0","0","30000","","1200000","2024-02-14");
INSERT INTO frais_emolument VALUES("40","012/02/2024/YD","100022684892408","100000","75000","125000","0","300000","","10000000","2024-02-15");
INSERT INTO frais_emolument VALUES("43","014/02/2024/YD","100022737197256","8750","0","0","0","8750","","350000","2024-02-15");
INSERT INTO frais_emolument VALUES("34","009/02/2024/YD","100022806417431","100000","75000","125000","0","300000","","10000000","2024-02-14");
INSERT INTO frais_emolument VALUES("36","011/02/2024/YD","100022921245916","60000","0","0","0","60000","","2000000","2024-02-15");
INSERT INTO frais_emolument VALUES("25","006/02/2024/YD","10002985844559","62500","37500","50000","360000","510000","408000","100000000","2024-02-14");
INSERT INTO frais_emolument VALUES("12","002/01/2024/YD","1002384662070","62500","37500","50000","140000","290000","232000","45000000","2024-02-14");



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

INSERT INTO messagerie VALUES("16","moustaphadiaby861@gmail.com","moussadiarra@gmail.com","djhi","qzefd","non","2024-02-13 11:45:11","Dépliant_Imperis SARL_Final.pdf");
INSERT INTO messagerie VALUES("17","moustaphadiaby861@gmail.com","moustaphadiaby861@gmail.com","aazd","afzadz","non","2024-02-21 10:32:52","");



CREATE TABLE `notification` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `email_expediteur` varchar(255) NOT NULL,
  `email_destinateur` varchar(255) NOT NULL,
  `indexx` int(11) NOT NULL,
  PRIMARY KEY (`id_notif`),
  KEY `email_expediteur` (`email_expediteur`),
  KEY `email_destinateur` (`email_destinateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO notification VALUES("1","tourendiaye@gmail.com","moustaphadiaby861@gmail.com","3");
INSERT INTO notification VALUES("2","tourendiaye@gmail.com","tourendiaye@gmail.com","2");
INSERT INTO notification VALUES("3","moustaphadiaby861@gmail.com","tourendiaye@gmail.com","0");
INSERT INTO notification VALUES("4","moustaphadiaby861@gmail.com","moustaphadiaby861@gmail.com","1");



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

INSERT INTO pourcentages VALUES("1","Baux","4","3","2.5","1.5");
INSERT INTO pourcentages VALUES("2","Assurance","2.5","1.5","1","0.40");
INSERT INTO pourcentages VALUES("4","Vente mobilier","4","2","2.5","1");



CREATE TABLE `remise` (
  `id_remise` int(11) NOT NULL AUTO_INCREMENT,
  `id_sous_dossier` varchar(255) NOT NULL,
  `montant_remise` varchar(255) NOT NULL,
  PRIMARY KEY (`id_remise`),
  KEY `id_sous_dossier` (`id_sous_dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO remise VALUES("37","13","660000");
INSERT INTO remise VALUES("38","14","40000");
INSERT INTO remise VALUES("40","18","80000");
INSERT INTO remise VALUES("47","25","408000");
INSERT INTO remise VALUES("48","12","232000");
INSERT INTO remise VALUES("49","20","300000");
INSERT INTO remise VALUES("51","45","10000");
INSERT INTO remise VALUES("52","47","40000");



CREATE TABLE `rendez_vous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_` date DEFAULT NULL,
  `heure` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO rendez_vous VALUES("6","2024-01-02","00:00:08");
INSERT INTO rendez_vous VALUES("7","2024-01-02","08:00:00");
INSERT INTO rendez_vous VALUES("8","2024-01-02","08:00:00");
INSERT INTO rendez_vous VALUES("9","0000-00-00","10:00:00");
INSERT INTO rendez_vous VALUES("10","0000-00-00","12:30:00");
INSERT INTO rendez_vous VALUES("11","0000-00-00","15:00:00");



CREATE TABLE `rendez_vous_departements` (
  `id_rendez_vous` int(11) DEFAULT NULL,
  `id_departement` int(11) DEFAULT NULL,
  KEY `id_rendez_vous` (`id_rendez_vous`),
  KEY `id_departement` (`id_departement`),
  CONSTRAINT `rendez_vous_departements_ibfk_1` FOREIGN KEY (`id_rendez_vous`) REFERENCES `rendez_vous` (`id`),
  CONSTRAINT `rendez_vous_departements_ibfk_2` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO rendez_vous_departements VALUES("6","2");
INSERT INTO rendez_vous_departements VALUES("8","1");
INSERT INTO rendez_vous_departements VALUES("9","3");
INSERT INTO rendez_vous_departements VALUES("10","1");
INSERT INTO rendez_vous_departements VALUES("10","2");
INSERT INTO rendez_vous_departements VALUES("10","3");
INSERT INTO rendez_vous_departements VALUES("11","1");
INSERT INTO rendez_vous_departements VALUES("11","2");



CREATE TABLE `societe` (
  `id_societe` int(11) NOT NULL AUTO_INCREMENT,
  `id_sous_dossier` varchar(255) NOT NULL,
  `denomination` varchar(255) NOT NULL,
  `forme` varchar(255) NOT NULL,
  `capital` varchar(255) NOT NULL,
  `immatriculation` varchar(255) NOT NULL,
  PRIMARY KEY (`id_societe`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO societe VALUES("1","6","KOKADJE","SARL","1000000","RM-2023-45698");
INSERT INTO societe VALUES("2","7","MALIKO","SARL","1000000","RM-2023-45698GH");



CREATE TABLE `societes` (
  `id_societe` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_sous_dossier` int(11) NOT NULL,
  PRIMARY KEY (`id_societe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




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

INSERT INTO sous_dossier_client VALUES("39","2024024071092337","Assurance","2","jolie jolie mali","500000","azerty","0","","10002587879746","2024-02-15");
INSERT INTO sous_dossier_client VALUES("40","1074075064","Baux","3","Bail de 5 Hectars Entre L'ACI 2000 Et Moussa DIARRA b","10000000","azertyu","1","AK/YD/MD","100022684892408","2024-02-15");
INSERT INTO sous_dossier_client VALUES("41","2024024071092337","Baux","2","azertydgr","5000000","azerty","1","AK/YD/MD","100021343226805","2024-02-15");
INSERT INTO sous_dossier_client VALUES("42","2024022866902027","Baux","2","Bails du Parcelle TF_11111","12000000","azerty","1","","10002143442137","2024-02-15");
INSERT INTO sous_dossier_client VALUES("43","202402897047703","Assurance","2","Assurance Lafia","350000","Assurance tout risque","1","","100022737197256","2024-02-15");
INSERT INTO sous_dossier_client VALUES("44","202402897047703","Baux","2","Malisitution kadi","150000","ljjksd","1","","100023327904871","2024-02-15");
INSERT INTO sous_dossier_client VALUES("45","1074075064","Assurance","2","Acte d'assurance entre Mr Moussa Diarra et Mme Coulibaly Aminata Diallo","2000000","azerty","1","AK/YD/MD","100022743909572","2024-02-16");
INSERT INTO sous_dossier_client VALUES("46","1074075064","Baux","3","ktyityf","1000000","azert","1","","1000287577640","2024-02-23");
INSERT INTO sous_dossier_client VALUES("47","1074075064","Assurance","2","azerty","2000000","assurance CEDEAO","1","","8898235","2024-02-23");
INSERT INTO sous_dossier_client VALUES("48","1074075064","Vente mobilier","2","azert","3000000","qefgefe","1","","1009183983","2024-02-23");



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

INSERT INTO users VALUES("1","123","DIARRA","Moussa","xxxx","xxxx","","MD","moussadiarra@gmail.com","12345678","Secretaire","Secretaire","2023-11-21","2023-12-22 12:26:02","2023-11-21 11:45:33","");
INSERT INTO users VALUES("2","Notaris/202","DIABY","Ya Moustapha","Sabalibougou","75738580","M","YD","moustaphadiaby861@gmail.com","12345678","Clerc Principal","Notaire","0000-00-00","2024-02-27 12:09:46","2024-02-26 16:27:49","DIABY_Ya Moustapha_YD.png");
INSERT INTO users VALUES("3","Notaris/2024-01-25/3512159969","Kaba DIAKITE","Assa","Sebenicoro","75738580","F","AK","assakaba90@gmail.com","12345678","Notaire","CLERC","2024-01-25","2024-02-27 12:10:00","2024-02-26 16:13:32","DIAKITE_Assa Kaba_AK.png");
INSERT INTO users VALUES("4","Notaris/2024/02/01","DIABY","Zoumana","Sabalibougou","75738580","","ZD","zoumanadiaby@gmail.com","12345678","Notaire","Notaire","0000-00-00","2024-02-01 13:37:47","2024-02-01 13:40:14","");
INSERT INTO users VALUES("11","Notaris/2024-02-20/3339645114","SOUMANO","Massama","Sabalibougou","01010203","M","MS","massamasoum@gmail.com","12345678","Notaire","Notaire","2024-02-20","","","SOUMANO_Massama_MS.png");
INSERT INTO users VALUES("12","Notaris/2024-02-20/3943889662","azerty","azerty","azerty","01010203","F","AA","massamasoum@gmail.com","12345678","Notaire","Notaire","2024-02-20","","","azerty_azerty_AA.png");

