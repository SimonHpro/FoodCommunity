-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 13 Septembre 2017 à 11:34
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `workshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nomCategories` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nomCategories`) VALUES
(1, 'légumes'),
(2, 'fruits'),
(3, 'laitiers'),
(4, 'viandes'),
(5, 'poissons');

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
(1, 'pommes', 'pommes verte', 1.11, 'pommes.jpeg', '2017-04-22', 2.2, 0, 2),
(3, 'tomates', 'tomates d’Espagne rondes', 5.55, 'tomates.jpg', '2017-09-06', 1.2, 0, 1),
(5, 'mais', 'mais de bretagne', 2.66, 'mais.jpg', '2017-09-28', 1, 0, 1),
(25, 'Patate', 'des bonnes patates de normandie', 4.99, 'patate.jpg', '2017-09-17', 2.6, 0, 1),
(48, 'Poulet', 'poulet rôti', 12, 'poulet.jpg', '2017-09-14', 2, 0, 4);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
