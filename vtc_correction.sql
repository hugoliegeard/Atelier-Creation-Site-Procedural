-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 12 oct. 2020 à 16:15
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `vtc_correction`
--

-- --------------------------------------------------------

--
-- Structure de la table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `firstname` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `driver`
--

INSERT INTO `driver` (`id`, `firstname`, `lastname`) VALUES
(1, 'Hugo', 'LIEGEARD'),
(2, 'Natacha', 'PAMPHIL'),
(3, 'Zaklin', 'POCANDI'),
(4, 'Fatima', 'SOBHI');

-- --------------------------------------------------------

--
-- Structure de la table `driver_vehicle`
--

CREATE TABLE `driver_vehicle` (
  `id` int(11) NOT NULL,
  `id_driver` int(11) NOT NULL,
  `id_vehicle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `driver_vehicle`
--

INSERT INTO `driver_vehicle` (`id`, `id_driver`, `id_vehicle`) VALUES
(1, 1, 1),
(2, 4, 4),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `brand` varchar(80) NOT NULL,
  `model` varchar(80) NOT NULL,
  `color` varchar(80) NOT NULL,
  `registration` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vehicle`
--

INSERT INTO `vehicle` (`id`, `brand`, `model`, `color`, `registration`) VALUES
(1, 'Mercedes', 'GLA', 'Noir', 'EK-985-RZ'),
(2, 'BMW', 'Serie 3', 'Bleu', 'DR-832-HJ'),
(3, 'Audi', 'A8', 'Gris', 'CM-789-BJ'),
(4, 'Maybach', 's650', 'Noir', 'EH-256-TY');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `driver_vehicle`
--
ALTER TABLE `driver_vehicle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_driver` (`id_driver`),
  ADD KEY `id_vehicle` (`id_vehicle`);

--
-- Index pour la table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `driver_vehicle`
--
ALTER TABLE `driver_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `driver_vehicle`
--
ALTER TABLE `driver_vehicle`
  ADD CONSTRAINT `driver_vehicle_ibfk_1` FOREIGN KEY (`id_driver`) REFERENCES `driver` (`id`),
  ADD CONSTRAINT `driver_vehicle_ibfk_2` FOREIGN KEY (`id_vehicle`) REFERENCES `vehicle` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
