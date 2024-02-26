-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 06 fév. 2024 à 13:45
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `notaris`
--

-- --------------------------------------------------------

--
-- Structure de la table `actes`
--

CREATE TABLE `actes` (
  `id_acte` int(11) NOT NULL,
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
  `valeur40` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `actes`
--

INSERT INTO `actes` (`id_acte`, `id_dossier_client`, `nom_acte`, `valeur1`, `valeur2`, `valeur3`, `valeur4`, `valeur5`, `valeur6`, `valeur7`, `valeur8`, `valeur9`, `valeur10`, `valeur11`, `valeur12`, `valeur13`, `valeur14`, `valeur15`, `valeur16`, `valeur17`, `valeur18`, `valeur19`, `valeur20`, `valeur21`, `valeur22`, `valeur23`, `valeur24`, `valeur25`, `valeur26`, `valeur27`, `valeur28`, `valeur29`, `valeur30`, `valeur31`, `valeur32`, `valeur33`, `valeur34`, `valeur35`, `valeur36`, `valeur37`, `valeur38`, `valeur39`, `valeur40`) VALUES
(20, 1, 'QSEF', 'SARLj', 'SARLj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

CREATE TABLE `assurance` (
  `id_assurance` int(11) NOT NULL,
  `id_sous_dossier` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  `autres_information` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `assurance`
--

INSERT INTO `assurance` (`id_assurance`, `id_sous_dossier`, `valeur`, `autres_information`) VALUES
(1, '1', '45000000', 'azertyuiopqsdfghjk'),
(2, '4', '50000000', 'vcxwsqaz'),
(3, '9', '8000000', 'assurance CEDEAO'),
(4, '10', '18000000', 'assurance CEDEAO'),
(5, '12', '50000000', 'La maison se situe a KABALA ACI'),
(6, '14', '50000000', 'assurance CEDEAO'),
(7, '15', '1000000', 'assurance CEDEAO'),
(8, '16', '5000000', 'assurance CEDEAO'),
(9, '18', '200000', 'Les vehicules sont immatriculés comme suite : BF 2020 MD, CA 4587 MD, BZ 1478 MD et BX 5698 MD'),
(10, '21', '12000000', 'qskelfjjqefjil'),
(11, '23', '4000000', 'azerty'),
(12, '25', '100000000', 'Le Bail Est Effectuer Sur Une Durée De 10 Ans'),
(13, '26', '1200000', ' a raison de 100');

-- --------------------------------------------------------

--
-- Structure de la table `bails`
--

CREATE TABLE `bails` (
  `id_bails` int(11) NOT NULL,
  `id_sous_dossier` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  `autres_information` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bails`
--

INSERT INTO `bails` (`id_bails`, `id_sous_dossier`, `valeur`, `autres_information`) VALUES
(1, '8', '19000000', 'qsdfgh'),
(2, '11', '19000000', 'qsdfgh'),
(3, '13', '100000000', 'La parcelle ce trouve a Kalaban Coura '),
(4, '17', '1000000', 'qsdfgh'),
(5, '19', '12000000', 'Location d\'habitat 2 ans mensuelle : 500.000'),
(6, '20', '50000000', 'assurance CEDEAO'),
(7, '22', '10000000', 'azerty'),
(8, '24', '45000000', 'azerty');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` int(11) NOT NULL,
  `nom_departement` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `nom_departement`) VALUES
(1, 'Notaire'),
(2, 'Clerc Principal'),
(3, 'Secrétaire Clerc');

-- --------------------------------------------------------

--
-- Structure de la table `departement_user`
--

CREATE TABLE `departement_user` (
  `id_departement` int(11) NOT NULL,
  `nom_departement` varchar(255) NOT NULL,
  `date_enregis_departement` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `dossier_client`
--

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
  `email_client` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `dossier_client`
--

INSERT INTO `dossier_client` (`id_dossier_client`, `id_user`, `nom_client`, `prenom_client`, `adresse_client`, `contact_client`, `prenom_pere_client`, `nom_pere_client`, `prenom_mere_client`, `nom_mere_client`, `autres_informations`, `situation_matrimoniale`, `email_client`) VALUES
('1', 'Notaris/202', 'Kaba DIAKITE', 'Assa', 'Sebenicoro', '75738580', 'wrsdfv', 'QES', 'dswv', 'sdwfd', 'Autres Informations', 'Mariée', 'assakaba90'),
('1074075064', '123', 'DIARRA', 'Moussa', 'Moribabougou', '66892451', 'Yacouba', 'DIARRA', 'Ramata', 'TRAORE', 'Clerc Cabinet Notarial TOURE N&#039;DIAYE', 'Marié', 'mdiarra@no'),
('2806578427', 'Notaris/202', 'Maiga', 'Hammare Mamadou', 'Golf', '76232541', 'Maiga', 'Maiga', 'Maiga', 'Maiga', 'Autres Informations', 'Mariée', 'hammare.ma'),
('464732542', 'Notaris/2024-01-25/3512159969', 'DIABY', 'Ya Moustapha', 'Sabalibougou', '75738580', 'Zoumana', 'DIABY', 'Bintou', 'GUINDO', 'Autres Informations', 'Célibataire', 'moustaphad');

-- --------------------------------------------------------

--
-- Structure de la table `frais_emolument`
--

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
  `montant_initiale` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `frais_emolument`
--

INSERT INTO `frais_emolument` (`id_sous_dossier`, `id_frais_emolument`, `numero_notaris`, `1_2500000`, `2500000_5000000`, `5000000_10000000`, `10000000_plus`, `total_frais`, `montant_remise`, `montant_initiale`) VALUES
('14', '001/01/2024/AK', '10001129766077', '50000', '0', '0', '0', '50000', '40000', '2000000'),
('13', '003/01/2024/YD', '100013383798823', '100000', '75000', '125000', '525000', '825000', '660000', '45000000'),
('18', '005/01/2024/YD', '1000198101852', '62500', '37500', '0', '0', '100000', '80000', '5000000'),
('20', '004/01/2024/YD', '10001982885187', '100000', '75000', '125000', '75000', '375000', '', '15000000'),
('26', '007/02/2024/YD', '100022313919255', '30000', '0', '0', '0', '30000', '', '1200000'),
('25', '006/02/2024/YD', '10002985844559', '62500', '37500', '50000', '360000', '510000', '408000', '100000000'),
('12', '002/01/2024/YD', '1002384662070', '62500', '37500', '50000', '140000', '290000', '232000', '45000000');

-- --------------------------------------------------------

--
-- Structure de la table `pourcentages`
--

CREATE TABLE `pourcentages` (
  `id_pourcentage` int(11) NOT NULL,
  `nom_pourcentage` varchar(255) NOT NULL,
  `premier_pourcentage` varchar(255) NOT NULL,
  `deuxieme_pourcentage` varchar(255) NOT NULL,
  `troisieme_pourcentage` varchar(255) NOT NULL,
  `quatrieme_pourcentage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pourcentages`
--

INSERT INTO `pourcentages` (`id_pourcentage`, `nom_pourcentage`, `premier_pourcentage`, `deuxieme_pourcentage`, `troisieme_pourcentage`, `quatrieme_pourcentage`) VALUES
(1, 'Bails', '4', '3', '2.5', '1.5'),
(2, 'Assurance', '2.5', '1.5', '1', '0.40'),
(3, 'azert', '3', '2', '2.5', '1'),
(4, 'ss', '4', '2', '2.5', '1');

-- --------------------------------------------------------

--
-- Structure de la table `remise`
--

CREATE TABLE `remise` (
  `id_remise` int(11) NOT NULL,
  `id_sous_dossier` varchar(255) NOT NULL,
  `montant_remise` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `remise`
--

INSERT INTO `remise` (`id_remise`, `id_sous_dossier`, `montant_remise`) VALUES
(37, '13', '660000'),
(38, '14', '40000'),
(40, '18', '80000'),
(46, '20', '300000'),
(47, '25', '408000'),
(48, '12', '232000');

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id` int(11) NOT NULL,
  `date_` date DEFAULT NULL,
  `heure` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id`, `date_`, `heure`) VALUES
(6, '2024-01-02', '00:00:08'),
(7, '2024-01-02', '08:00:00'),
(8, '2024-01-02', '08:00:00'),
(9, '0000-00-00', '10:00:00'),
(10, '0000-00-00', '12:30:00'),
(11, '0000-00-00', '15:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous_departements`
--

CREATE TABLE `rendez_vous_departements` (
  `id_rendez_vous` int(11) DEFAULT NULL,
  `id_departement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rendez_vous_departements`
--

INSERT INTO `rendez_vous_departements` (`id_rendez_vous`, `id_departement`) VALUES
(6, 2),
(8, 1),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 1),
(11, 2);

-- --------------------------------------------------------

--
-- Structure de la table `societe`
--

CREATE TABLE `societe` (
  `id_societe` int(11) NOT NULL,
  `id_sous_dossier` varchar(255) NOT NULL,
  `denomination` varchar(255) NOT NULL,
  `forme` varchar(255) NOT NULL,
  `capital` varchar(255) NOT NULL,
  `immatriculation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `societe`
--

INSERT INTO `societe` (`id_societe`, `id_sous_dossier`, `denomination`, `forme`, `capital`, `immatriculation`) VALUES
(1, '6', 'KOKADJE', 'SARL', '1000000', 'RM-2023-45698'),
(2, '7', 'MALIKO', 'SARL', '1000000', 'RM-2023-45698GH');

-- --------------------------------------------------------

--
-- Structure de la table `societes`
--

CREATE TABLE `societes` (
  `id_societe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sous_dossier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sous_dossier_client`
--

CREATE TABLE `sous_dossier_client` (
  `id_sous_dossier_client` int(11) NOT NULL,
  `id_dossier_client` varchar(255) NOT NULL,
  `type_sous_dossier` varchar(255) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nom_sous_dossier` varchar(255) NOT NULL,
  `valeur` varchar(255) DEFAULT NULL,
  `statut` int(1) NOT NULL DEFAULT 1 COMMENT '0=fermer\r\n1=ouvert',
  `intervenants_doc` varchar(255) DEFAULT NULL,
  `numero_notaris` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sous_dossier_client`
--

INSERT INTO `sous_dossier_client` (`id_sous_dossier_client`, `id_dossier_client`, `type_sous_dossier`, `id_user`, `nom_sous_dossier`, `valeur`, `statut`, `intervenants_doc`, `numero_notaris`) VALUES
(12, '1', 'Assurance', '0', 'Assurance de la maison R+3', '45000000', 1, 'ZD/YD/MD', '1002384662070'),
(13, '1', 'Bails', '0', 'Bails du Parcelle TF_14563', '45000000', 1, '', '100013383798823'),
(14, '464732542', 'Assurance', '0', 'Assurance de la Voiture KIA BF 4587 MD', '2000000', 1, '', '10001129766077'),
(18, '2806578427', 'Assurance', '0', 'Assurance de 4 Voitures 14 CV', '5000000', 1, '', '1000198101852'),
(20, '1074075064', 'Bails', '1', 'Bails du Parcelle TF_00000', '15000000', 0, '', '10001982885187'),
(25, '1074075064', 'Assurance', 'Notaris/202', 'Bail de 5 Hectars Entre L\'ACI 2000 Et Moussa DIARRA', '100000000', 1, 'ZD/YD/MD', '10002985844559'),
(26, '1', 'Assurance', 'Notaris/202', 'Assurance Vie De Mme Kaba DIAKITE', '1200000', 1, '/YD/MD', '100022313919255');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user_at` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `adresse_user` varchar(255) NOT NULL,
  `contact_user` varchar(255) NOT NULL,
  `abreviation_log_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `departement_user` varchar(255) NOT NULL,
  `profession_user` varchar(255) NOT NULL,
  `date_enregis_user` date NOT NULL,
  `last_login_datetime` varchar(2500) DEFAULT NULL,
  `last_logout_datetime` varchar(2500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user_at`, `id_user`, `nom_user`, `prenom_user`, `adresse_user`, `contact_user`, `abreviation_log_user`, `email_user`, `password_user`, `departement_user`, `profession_user`, `date_enregis_user`, `last_login_datetime`, `last_logout_datetime`) VALUES
(1, '123', 'DIARRA', 'Moussa', 'xxxx', 'xxxx', 'MD', 'moussadiarra@gmail.com', '12345678', 'Secretaire', 'Secretaire', '2023-11-21', '2023-12-22 12:26:02', '2023-11-21 11:45:33'),
(2, 'Notaris/202', 'DIABY', 'Ya Moustapha', 'Sabalibougou', '75738580', 'YD', 'moustaphadiaby861@gmail.com', '12345678', 'Clerc Principal', 'Notaire', '0000-00-00', '2024-02-06 13:08:04', '2024-02-06 13:07:11'),
(3, 'Notaris/2024-01-25/3512159969', 'Kaba DIAKITE', 'Assa', 'Sebenicoro', '75738580', 'AK', 'assakaba90@gmail.com', '12345678', 'Notaire', 'CLERC', '2024-01-25', '2024-02-05 15:06:03', '2024-02-05 17:21:16'),
(4, 'Notaris/2024/02/01', 'DIABY', 'Zoumana', 'Sabalibougou', '75738580', 'ZD', 'zoumanadiaby@gmail.com', '12345678', 'Notaire', 'Notaire', '0000-00-00', '2024-02-01 13:37:47', '2024-02-01 13:40:14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actes`
--
ALTER TABLE `actes`
  ADD PRIMARY KEY (`id_acte`);

--
-- Index pour la table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`id_assurance`);

--
-- Index pour la table `bails`
--
ALTER TABLE `bails`
  ADD PRIMARY KEY (`id_bails`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departement_user`
--
ALTER TABLE `departement_user`
  ADD PRIMARY KEY (`id_departement`);

--
-- Index pour la table `dossier_client`
--
ALTER TABLE `dossier_client`
  ADD PRIMARY KEY (`id_dossier_client`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `frais_emolument`
--
ALTER TABLE `frais_emolument`
  ADD UNIQUE KEY `numero_notaris` (`numero_notaris`),
  ADD KEY `id_sous_dossier` (`id_sous_dossier`);

--
-- Index pour la table `pourcentages`
--
ALTER TABLE `pourcentages`
  ADD PRIMARY KEY (`id_pourcentage`),
  ADD UNIQUE KEY `nom_pourcentage` (`nom_pourcentage`);

--
-- Index pour la table `remise`
--
ALTER TABLE `remise`
  ADD PRIMARY KEY (`id_remise`),
  ADD KEY `id_sous_dossier` (`id_sous_dossier`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rendez_vous_departements`
--
ALTER TABLE `rendez_vous_departements`
  ADD KEY `id_rendez_vous` (`id_rendez_vous`),
  ADD KEY `id_departement` (`id_departement`);

--
-- Index pour la table `societe`
--
ALTER TABLE `societe`
  ADD PRIMARY KEY (`id_societe`);

--
-- Index pour la table `societes`
--
ALTER TABLE `societes`
  ADD PRIMARY KEY (`id_societe`);

--
-- Index pour la table `sous_dossier_client`
--
ALTER TABLE `sous_dossier_client`
  ADD PRIMARY KEY (`id_sous_dossier_client`),
  ADD KEY `id_dossier_client` (`id_dossier_client`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user_at`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actes`
--
ALTER TABLE `actes`
  MODIFY `id_acte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `id_assurance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `bails`
--
ALTER TABLE `bails`
  MODIFY `id_bails` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `pourcentages`
--
ALTER TABLE `pourcentages`
  MODIFY `id_pourcentage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `remise`
--
ALTER TABLE `remise`
  MODIFY `id_remise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `societe`
--
ALTER TABLE `societe`
  MODIFY `id_societe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `societes`
--
ALTER TABLE `societes`
  MODIFY `id_societe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sous_dossier_client`
--
ALTER TABLE `sous_dossier_client`
  MODIFY `id_sous_dossier_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user_at` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rendez_vous_departements`
--
ALTER TABLE `rendez_vous_departements`
  ADD CONSTRAINT `rendez_vous_departements_ibfk_1` FOREIGN KEY (`id_rendez_vous`) REFERENCES `rendez_vous` (`id`),
  ADD CONSTRAINT `rendez_vous_departements_ibfk_2` FOREIGN KEY (`id_departement`) REFERENCES `departements` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
