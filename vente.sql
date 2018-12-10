-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 12 avr. 2018 à 07:12
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `vente`
--

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `id` int(11) NOT NULL,
  `Nom` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Categorie`
--

INSERT INTO `Categorie` (`id`, `Nom`) VALUES
(1, 'animeaux '),
(2, 'art'),
(3, 'Bagage'),
(4, 'beauté'),
(5, 'Bijoux'),
(6, 'DVD'),
(7, 'Informatique'),
(8, 'jardin'),
(9, 'jeu video'),
(10, 'livre'),
(11, 'Maison'),
(12, 'Musique'),
(13, 'sport'),
(14, 'telephone'),
(15, 'televison'),
(16, 'vêtement'),
(17, 'vechule');

-- --------------------------------------------------------

--
-- Structure de la table `Commentaire`
--

CREATE TABLE `Commentaire` (
  `Id` int(11) NOT NULL,
  `Nom` varchar(25) DEFAULT NULL,
  `Message` longtext,
  `Date_de_commentaire` date DEFAULT NULL,
  `Id_Utilisateur` int(11) DEFAULT NULL,
  `Id_Objet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Commentaire`
--

INSERT INTO `Commentaire` (`Id`, `Nom`, `Message`, `Date_de_commentaire`, `Id_Utilisateur`, `Id_Objet`) VALUES
(1, 'khaled', 'bonjour', '2018-04-01', NULL, NULL),
(2, 'khaled', 'bonjour', '2018-04-01', NULL, NULL),
(3, 'kk', 'kkkk', '2018-04-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Objet`
--

CREATE TABLE `Objet` (
  `id` int(11) NOT NULL,
  `nom_objet` varchar(25) DEFAULT NULL,
  `Categorie` varchar(25) DEFAULT NULL,
  `Description` longtext,
  `Prix` decimal(15,3) DEFAULT NULL,
  `Pays` varchar(25) DEFAULT NULL,
  `id_Categorie` int(11) DEFAULT NULL,
  `id_region` int(11) NOT NULL,
  `id_Panier` int(11) DEFAULT NULL,
  `region` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Objet`
--

INSERT INTO `Objet` (`id`, `nom_objet`, `Categorie`, `Description`, `Prix`, `Pays`, `id_Categorie`, `id_region`, `id_Panier`, `region`) VALUES
(86, 'chat', NULL, ' tres jolie', '100.000', 'France', 1, 3, NULL, ''),
(87, '2 bagage', NULL, 'bagage tres grand ', '50.000', 'France', 3, 4, NULL, ''),
(89, 'parfum', NULL, 'tres bon ', '100.000', 'france', 5, 5, NULL, ''),
(90, 'the lord of the reing', NULL, 'tres biens comme filme ', '10.000', 'France', 6, 3, NULL, ''),
(91, 'battlefield one', NULL, 'le meilleur jeux  ', '60.000', 'france', 9, 7, NULL, '');

-- --------------------------------------------------------

--
-- Structure de la table `Panier`
--

CREATE TABLE `Panier` (
  `id` int(11) NOT NULL,
  `id_objet` int(11) DEFAULT NULL,
  `id_Utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Panier`
--

INSERT INTO `Panier` (`id`, `id_objet`, `id_Utilisateur`) VALUES
(1, 86, NULL),
(2, 86, NULL),
(3, 86, NULL),
(4, 86, NULL),
(5, 87, NULL),
(6, 89, NULL),
(7, 86, NULL),
(8, 86, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom`) VALUES
(1, 'Grand Est'),
(2, 'Nouvelle-Aquitaine'),
(3, 'Auvergne-Rhône-Alpes'),
(4, 'Bourgogne-Franche-Comté'),
(5, 'Bretagne'),
(6, 'Centre-Val de Loire'),
(7, 'Corse'),
(8, 'Île-de-France'),
(9, 'Occitanie'),
(10, 'Hauts-de-France'),
(11, 'Normandie'),
(12, 'Pays de la Loire'),
(13, 'Provence-Alpes-Côte d\'Azur');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Login` varchar(255) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `Adresse_de_livraison` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `Nom`, `Prenom`, `Ville`, `Pays`, `Login`, `Mdp`, `Adresse_de_livraison`) VALUES
(19, 'abdulhalim', 'khaled', 'Paris', 'france', 'khaled', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(20, 'abdulhalim', 'ahmed', 'PARIS', 'FRANCE', 'ahmed', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(21, 'abd', 'sami', 'paris', 'france', 'sami', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Commentaire_Id_Utilisateur` (`Id_Utilisateur`),
  ADD KEY `FK_Commentaire_Id_Objet` (`Id_Objet`);

--
-- Index pour la table `Objet`
--
ALTER TABLE `Objet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Objet_Id_Categorie` (`id_Categorie`),
  ADD KEY `FK_Objet_Id_Panier` (`id_Panier`);

--
-- Index pour la table `Panier`
--
ALTER TABLE `Panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Panier_Id_Utilisateur` (`id_Utilisateur`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Categorie`
--
ALTER TABLE `Categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Objet`
--
ALTER TABLE `Objet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `Panier`
--
ALTER TABLE `Panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Commentaire`
--
ALTER TABLE `Commentaire`
  ADD CONSTRAINT `FK_Commentaire_Id_Objet` FOREIGN KEY (`Id_Objet`) REFERENCES `Objet` (`id`),
  ADD CONSTRAINT `FK_Commentaire_Id_Utilisateur` FOREIGN KEY (`Id_Utilisateur`) REFERENCES `Utilisateur` (`id`);

--
-- Contraintes pour la table `Objet`
--
ALTER TABLE `Objet`
  ADD CONSTRAINT `FK_Objet_Id_Categorie` FOREIGN KEY (`id_Categorie`) REFERENCES `Categorie` (`id`),
  ADD CONSTRAINT `FK_Objet_Id_Panier` FOREIGN KEY (`id_Panier`) REFERENCES `Panier` (`id`);

--
-- Contraintes pour la table `Panier`
--
ALTER TABLE `Panier`
  ADD CONSTRAINT `FK_Panier_Id_Utilisateur` FOREIGN KEY (`id_Utilisateur`) REFERENCES `Utilisateur` (`id`);
