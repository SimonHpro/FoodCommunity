-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 14 Septembre 2017 à 13:25
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `foodcommunity`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `Adresse` varchar(100) NOT NULL,
  `Ville` varchar(100) NOT NULL,
  `CodePostal` int(11) NOT NULL,
  `id_commerce` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`Adresse`, `Ville`, `CodePostal`, `id_commerce`, `id`) VALUES
('2 rue FÃ©nelon', 'Nantes', 44000, 4, 15),
('2 rue FÃ©nelon', 'Nantes', 44000, 5, 16);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nomCategorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nomCategorie`) VALUES
(1, 'Légumes'),
(2, 'Fruits'),
(3, 'Poissons'),
(4, 'Viandes'),
(5, 'Laitiers');

-- --------------------------------------------------------

--
-- Structure de la table `commerce`
--

CREATE TABLE `commerce` (
  `id` int(11) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Telephone` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commerce`
--

INSERT INTO `commerce` (`id`, `Nom`, `Mail`, `password`, `Telephone`) VALUES
(4, 'EPSI nantes', 'epsinantes@epsi.fr', 'epsinantes', 299562141),
(5, 'WIS Nantes', 'wisnantes@wis.fr', 'wis8956513', 289564518);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(100) NOT NULL,
  `names` varchar(100) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `prix` float NOT NULL,
  `images` varchar(100) NOT NULL,
  `DLC` date NOT NULL,
  `poids` float NOT NULL,
  `id_commerce` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `names`, `desc`, `prix`, `images`, `DLC`, `poids`, `id_commerce`, `id_categorie`) VALUES
(1, 'pommes', 'pommes verte', 1.11, 'pommes.jpeg', '2017-04-22', 2.2, 4, 2),
(3, 'tomates', 'tomates d’Espagne rondes', 5.55, 'tomates.jpg', '2017-09-06', 1.2, 4, 1),
(5, 'mais', 'mais de bretagne', 2.66, 'mais.jpg', '2017-09-28', 1, 4, 1),
(25, 'Patate', 'des bonnes patates de normandie', 4.99, 'patate.jpg', '2017-09-17', 2.6, 4, 1),
(48, 'Poulet', 'poulet rôti', 12, 'poulet.jpg', '2017-09-14', 2, 4, 4),
(51, 'Kanard', 'kanard braisé', 42, 'Koinavecunk.png', '2017-09-14', 22, 4, 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commerce` (`id_commerce`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commerce`
--
ALTER TABLE `commerce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_commerce` (`id_commerce`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `commerce`
--
ALTER TABLE `commerce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`id_commerce`) REFERENCES `commerce` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_commerce`) REFERENCES `commerce` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
