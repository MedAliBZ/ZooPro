-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 08 mai 2021 à 00:05
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `integration`
--

-- --------------------------------------------------------

--
-- Structure de la table `animaux`
--

CREATE TABLE `animaux` (
  `id` int(11) NOT NULL,
  `nomAnimal` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `age` int(10) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `status` varchar(70) NOT NULL,
  `regimeAlimentaire` int(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animaux`
--

INSERT INTO `animaux` (`id`, `nomAnimal`, `type`, `age`, `pays`, `status`, `regimeAlimentaire`, `image`, `updated_by`) VALUES
(16, 'bird', 'oiseaux', 1, 'afrique', 'Menacé', 27, 'bird.png', 34),
(17, 'koala', 'mammifere', 2, 'afrique', 'endanger', 20, 'koala.png', NULL),
(18, 'giraffe', 'amphibiens', 2, 'afrique', 'stable', 23, 'giraffe.png', 34);

-- --------------------------------------------------------

--
-- Structure de la table `enclos`
--

CREATE TABLE `enclos` (
  `id` int(11) NOT NULL,
  `appellation` varchar(250) CHARACTER SET utf8 NOT NULL,
  `localisation` varchar(250) CHARACTER SET utf8 NOT NULL,
  `taille` float NOT NULL,
  `dateConstruction` date NOT NULL,
  `capaciteMaximale` float NOT NULL,
  `typeEnclos` varchar(250) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(250) CHARACTER SET utf8 NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `enclos`
--

INSERT INTO `enclos` (`id`, `appellation`, `localisation`, `taille`, `dateConstruction`, `capaciteMaximale`, `typeEnclos`, `photo`, `updated_by`) VALUES
(5, 'Pavillons Des Antillopes', 'sud', 80, '2021-04-29', 25, '70', 'pavillons des antilopes.jpg', NULL),
(6, 'Pavillon African', 'east', 2000, '2020-02-01', 50, '70', 'espace african.jpg', NULL),
(8, 'Pavillons des Singes', 'east', 1700, '2021-03-04', 70, '70', 'pavillons des singes.jpg', NULL),
(13, 'test', 'test', 800, '2021-05-07', 90, '70', 'cactus.jfif', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `espece`
--

CREATE TABLE `espece` (
  `idE` int(11) NOT NULL,
  `nomE` varchar(255) NOT NULL,
  `hauteur` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `espece`
--

INSERT INTO `espece` (`idE`, `nomE`, `hauteur`) VALUES
(1, 'jjjjjjjjjjjg', 2555),
(3, 'pppp', 11),
(4, 'succulente', 120),
(5, 'hejer', 220),
(6, 'hzehjsf', 1222220);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `nom_event` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `nbre_place` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `nom_event`, `date`, `nbre_place`, `photo`, `description`) VALUES
(7, 'Nettoyer jusqu&#39;au bout', '2021-05-08', 60, 'fd6f3950914f9c0a115178a446cdd5de175398655a7af8569c8c65109d9e8516-rimg-w526-h296-gmir.jpg', 'cet évènement consiste à nettoyer notre zoo dans un atmosphère de joie + afromusic'),
(8, 'un jour avec les koala', '2021-05-09', 120, 'koala.jpg', 'jouer avec les koala'),
(9, 'un jour avec les éléphants', '2021-05-23', 80, 'safe_fb_share2.png', 'jouer avec les éléphants + quelques animaux domestiques');

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

CREATE TABLE `participation` (
  `id` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL,
  `used` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personel`
--

CREATE TABLE `personel` (
  `id` int(11) NOT NULL,
  `cin` varchar(9) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `salaire` float NOT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personel`
--

INSERT INTO `personel` (`id`, `cin`, `nom`, `prenom`, `date_de_naissance`, `salaire`, `updated_by`) VALUES
(27, '000000002', 'azyyjjjj', 'ezqs', '2001-12-31', 1444, 32),
(21, '000000188', 'yesmin', 'qs', '2001-12-31', 52, NULL),
(10, '000000189', 'yesmin sqqs', 'qsdqsdd', '2001-12-14', 4211, NULL),
(12, '000056789', 'dsqds', 'qdsdsq', '2001-12-31', 152, NULL),
(26, '000785123', 'last', 'aeaz', '2001-12-31', 1452, NULL),
(6, '100000181', 'sqdsqd', 'qqsdsqd', '2001-10-05', 852.2, NULL),
(14, '111456789', 'testMAB', 'azeza', '2001-12-31', 951, NULL),
(19, '123456000', 'azez', 'azeaze', '1974-01-01', 415.48, NULL),
(22, '123456780', 'fg', 'fgh', '2001-12-31', 4152, NULL),
(9, '123456789', 'yesminn', 'meriam', '2001-12-06', 110.1, NULL),
(15, '123457866', 'azeza', 'ezazae', '2001-12-31', 152, NULL),
(7, '123457890', 'yesmin', 'sqdq', '2001-12-31', 74152, NULL),
(18, '741258963', 'haziyamaaaa', 'sqdqs', '2001-12-31', 4852, NULL),
(17, '741852963', 'aze', 'dsqdq', '2001-12-31', 74852, NULL),
(20, '789456123', 'Dali', 'sqdq', '1998-08-19', 1500, NULL),
(16, '987654321', 'aea', 'ezaeaz', '2001-12-31', 151515, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `plante`
--

CREATE TABLE `plante` (
  `idP` int(11) NOT NULL,
  `nomP` varchar(255) NOT NULL,
  `longevite` int(255) NOT NULL,
  `origine` varchar(255) NOT NULL,
  `taille` float NOT NULL,
  `famille` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `idespece` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plante`
--

INSERT INTO `plante` (`idP`, `nomP`, `longevite`, `origine`, `taille`, `famille`, `image`, `idespece`) VALUES
(5, 'olive2', 250, 'sfax', 12, 'fshfsh', 'succulente.jfif', 4),
(7, 'succulente', 12, 'amazon', 12, 'arbre', 'anthurium.jfif', 4),
(8, 'arbustre', 12, 'sfax', 2, 'fshfsh', 'cactus.jfif', 5),
(9, 'arbustre', 250, 'sggfgdh', 2, 'arbre', 'anthurium.jfif', 4),
(10, 'olive', 120, 'amazon', 3, 'arbre', 'cactus.jfif', 3),
(11, 'olive12', 12, 'sfax', 2, 'fshfsh', 'succulente.jfif', 3),
(12, 'heje123', 12, 'sfax', 2, 'fshfsh', 'cactus.jfif', 3),
(13, 'heje111', 12, 'sfax', 2, 'fshfsh', 'succulente.jfif', 4),
(14, 'ggg12', 250, 'amazon', 2, 'arbre', 'anthurium.jfif', 3),
(15, 'olive', 12, 'sfax', 2, 'fshfsh', 'succulente.jfif', 3),
(16, 'olive', 12, 'sfax', 2, 'fshfsh', 'succulente.jfif', 4),
(17, 'olive', 12, '5', 2, '2', 'succulente.jfif', 6),
(18, 'olive', 12, 'sfax', 5, 'fshfsh', 'anthurium.jfif', 5);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(20) NOT NULL,
  `idUser` int(20) DEFAULT NULL,
  `reclamation` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `idUser`, `reclamation`) VALUES
(1, 34, 'gggggggggggggggggg'),
(2, 34, 'cet animal est en danger');

-- --------------------------------------------------------

--
-- Structure de la table `regimealimentaire`
--

CREATE TABLE `regimealimentaire` (
  `id` int(10) NOT NULL,
  `nom_regime` varchar(30) NOT NULL,
  `type_nourriture` varchar(30) NOT NULL,
  `quantite_par_repas` float NOT NULL,
  `nombre_de_repas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `regimealimentaire`
--

INSERT INTO `regimealimentaire` (`id`, `nom_regime`, `type_nourriture`, `quantite_par_repas`, `nombre_de_repas`) VALUES
(20, 'herbivore', 'plantes', 10, 4),
(22, 'omnivore', 'viande', 2, 8),
(23, 'frugivore', 'banane', 9, 2),
(24, 'carnivore', 'viande', 2, 4),
(27, 'granivore', 'ble', 7, 8),
(28, 'carnivore', 'viande', 8, 8);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(1) NOT NULL,
  `nom` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(0, 'utilisateur'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `spons`
--

CREATE TABLE `spons` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `num` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `spons`
--

INSERT INTO `spons` (`id`, `nom`, `email`, `num`, `photo`) VALUES
(3, 'COCACOLA', 'cocacola@contact.com', 71503251, 'coco-cola.jpg'),
(2, 'Qatar airways', 'Qatarairways@contact.com', 75803462, 'Qatar_Airways.gif'),
(1, 'UBS', 'ubs@conatact.com', 71852963, '310x190_ubs-plus-grande-banque-suisse-illustration.jpg'),
(4, 'Yves saint laurent', 'YSL@contact.com', 71852963, 'téléchargement.png');

-- --------------------------------------------------------

--
-- Structure de la table `sponsorisation`
--

CREATE TABLE `sponsorisation` (
  `id` int(11) NOT NULL,
  `idevent` int(11) NOT NULL,
  `nomsponsor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `typeenclos`
--

CREATE TABLE `typeenclos` (
  `id` varchar(250) CHARACTER SET utf8 NOT NULL,
  `label` varchar(250) CHARACTER SET utf8 NOT NULL,
  `structure` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `typeenclos`
--

INSERT INTO `typeenclos` (`id`, `label`, `structure`) VALUES
('70', 'Enclos pour Prédateurs', 'Cage en métal');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role_id`, `image`) VALUES
(19, 'admin123', '$2y$10$EW9vdWcabWIUbpla2GgHru2c.AITqaR.e2gPfAYcsTPeUOs4h6sDK', 'yasmine.sliti@esprit.tn', 0, 'default.jpg'),
(38, 'chkiwa', '$2y$10$VhLcudcJE3/GMGEM9oYcXOCuBnoaZdo6pApvHNd5TK7NRhdb4jbzy', 'chkiwanour@gmail.com', 1, 'default.jpg'),
(24, 'dqsqsdqd', '$2y$10$fJ1SS6iajnujgVMqw79tNuMdDuFO2SarUk9jHbZqmISLSfc40eVn6', 'dsqdsqdqs@sqds.com', 0, 'default.jpg'),
(30, 'haziyama', '$2y$10$qiMA3JazKMntZ4OLYRNLOuqdxAUr3Y6mSchxJrniJS6hKWp/pMboa', 'sdqs@dq.com', 0, 'default.jpg'),
(37, 'MAB', '$2y$10$lid9LN.TiTFLTr6I.pZ4W.HBXj9vpa4YS91WAdRWXWjYdPUIOjjEe', 'bouzaiene.dali@gmail.com', 1, 'githubpic.jpg'),
(34, 'meriam', '$2y$10$G9ORo/tVQqgqKYKp4KDjs.Xwb0FvfiXNgPMzEpGXXlf.Sy7pKor4i', 'meriam.mhedhbi@esprit.tn', 1, 'default.jpg'),
(32, 'meriammhedhbi', '$2y$10$GGgbJkvGgOF5XAnREoXm1eB1c3OAuQjOYkANViGK89lpX7Hu7O2oS', 'meriamMhedhbi1@gmail.com', 1, 'default.jpg'),
(36, 'meriamR', '$2y$10$YCjsWtnETjvb/mx.rRdNuOdufXNenvOGH4LX9FL7SBHG.5x/0/Njy', 'recovery.mary2000@gmail.com', 0, 'default.jpg'),
(22, 'realMAB', '$2y$10$ZgAYwxSdMFPmPoK6xbVHbup.nKWLqgR8uOfj7iGNOEUAF.61g4Aau', 'dbouzaiene@gmail.com', 1, 'default.jpg'),
(39, 'sq', '$2y$10$ITyEPmv5HXiQIwhQ46cH8uofefhmeSGhODmU8xunSRXprl2n6HfsC', 'Aziza.sliti@gmail.com', 1, 'default.jpg'),
(13, 'test2', '$2y$10$QcWzIn1.jxRekkHG6iphM.Tnl1K7NRDGgENMfORpvutg2DF0qEsji', 'azez@qsd.com', 1, 'default.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreignKey` (`regimeAlimentaire`),
  ADD KEY `foreignKey1` (`updated_by`);

--
-- Index pour la table `enclos`
--
ALTER TABLE `enclos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_typeEnclos` (`typeEnclos`),
  ADD KEY `fk_updated_by` (`updated_by`);

--
-- Index pour la table `espece`
--
ALTER TABLE `espece`
  ADD PRIMARY KEY (`idE`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event1` (`id_event`),
  ADD KEY `fk_user` (`id_user`);

--
-- Index pour la table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Index pour la table `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`cin`),
  ADD KEY `KEY` (`id`),
  ADD KEY `personel_ibfk_1` (`updated_by`);

--
-- Index pour la table `plante`
--
ALTER TABLE `plante`
  ADD PRIMARY KEY (`idP`),
  ADD KEY `fk_plante_espece` (`idespece`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reclamation` (`idUser`);

--
-- Index pour la table `regimealimentaire`
--
ALTER TABLE `regimealimentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `spons`
--
ALTER TABLE `spons`
  ADD PRIMARY KEY (`nom`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `sponsorisation`
--
ALTER TABLE `sponsorisation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event` (`idevent`),
  ADD KEY `fk_sponsor` (`nomsponsor`);

--
-- Index pour la table `typeenclos`
--
ALTER TABLE `typeenclos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id` (`id`),
  ADD KEY `fk_foreign_role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `enclos`
--
ALTER TABLE `enclos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `espece`
--
ALTER TABLE `espece`
  MODIFY `idE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `participation`
--
ALTER TABLE `participation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT pour la table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `personel`
--
ALTER TABLE `personel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `plante`
--
ALTER TABLE `plante`
  MODIFY `idP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `regimealimentaire`
--
ALTER TABLE `regimealimentaire`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `spons`
--
ALTER TABLE `spons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `sponsorisation`
--
ALTER TABLE `sponsorisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animaux`
--
ALTER TABLE `animaux`
  ADD CONSTRAINT `foreignKey` FOREIGN KEY (`regimeAlimentaire`) REFERENCES `regimealimentaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreignKey1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enclos`
--
ALTER TABLE `enclos`
  ADD CONSTRAINT `fk_typeEnclos` FOREIGN KEY (`typeEnclos`) REFERENCES `typeenclos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_updated_by` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Contraintes pour la table `participation`
--
ALTER TABLE `participation`
  ADD CONSTRAINT `fk_event1` FOREIGN KEY (`id_event`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `password_reset`
--
ALTER TABLE `password_reset`
  ADD CONSTRAINT `password_reset_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Contraintes pour la table `personel`
--
ALTER TABLE `personel`
  ADD CONSTRAINT `personel_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `personel_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `plante`
--
ALTER TABLE `plante`
  ADD CONSTRAINT `fk_plante_espece` FOREIGN KEY (`idespece`) REFERENCES `espece` (`idE`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `fk_reclamation` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `sponsorisation`
--
ALTER TABLE `sponsorisation`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`idevent`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sponsor` FOREIGN KEY (`nomsponsor`) REFERENCES `spons` (`nom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_foreign_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
