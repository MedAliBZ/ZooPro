-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 12:46 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `integration`
--

-- --------------------------------------------------------

--
-- Table structure for table `animaux`
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
-- Dumping data for table `animaux`
--

INSERT INTO `animaux` (`id`, `nomAnimal`, `type`, `age`, `pays`, `status`, `regimeAlimentaire`, `image`, `updated_by`) VALUES
(16, 'bird', 'oiseaux', 1, 'afrique', 'stable', 20, 'bird.png', 32),
(17, 'koala', 'mammifere', 2, 'afrique', 'endanger', 20, 'koala.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL,
  `used` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `username`, `key`, `expDate`, `used`) VALUES
(69, 'MAB', '5a0b22', '2021-04-24 21:26:53', 0),
(70, 'MAB', 'f565a0', '2021-04-24 21:27:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personel`
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
-- Dumping data for table `personel`
--

INSERT INTO `personel` (`id`, `cin`, `nom`, `prenom`, `date_de_naissance`, `salaire`, `updated_by`) VALUES
(27, '000000002', 'azyyjjjj', 'ezqs', '2001-12-31', 1444, 32),
(21, '000000188', 'yesmin', 'qs', '2001-12-31', 52, 28),
(10, '000000189', 'yesmin sqqs', 'qsdqsdd', '2001-12-14', 4211, NULL),
(12, '000056789', 'dsqds', 'qdsdsq', '2001-12-31', 152, NULL),
(26, '000785123', 'last', 'aeaz', '2001-12-31', 1452, 28),
(6, '100000181', 'sqdsqd', 'qqsdsqd', '2001-10-05', 852.2, NULL),
(14, '111456789', 'testMAB', 'azeza', '2001-12-31', 951, NULL),
(19, '123456000', 'azez', 'azeaze', '1974-01-01', 415.48, 28),
(22, '123456780', 'fg', 'fgh', '2001-12-31', 4152, 28),
(9, '123456789', 'yesminn', 'meriam', '2001-12-06', 110.1, NULL),
(15, '123457866', 'azeza', 'ezazae', '2001-12-31', 152, NULL),
(7, '123457890', 'yesmin', 'sqdq', '2001-12-31', 74152, NULL),
(18, '741258963', 'haziyamaaaa', 'sqdqs', '2001-12-31', 4852, NULL),
(17, '741852963', 'aze', 'dsqdq', '2001-12-31', 74852, NULL),
(20, '789456123', 'Dali', 'sqdq', '1998-08-19', 1500, 28),
(16, '987654321', 'aea', 'ezaeaz', '2001-12-31', 151515, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `regimealimentaire`
--

CREATE TABLE `regimealimentaire` (
  `id` int(10) NOT NULL,
  `nom_regime` varchar(30) NOT NULL,
  `type_nourriture` varchar(30) NOT NULL,
  `quantite_par_repas` float NOT NULL,
  `nombre_de_repas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regimealimentaire`
--

INSERT INTO `regimealimentaire` (`id`, `nom_regime`, `type_nourriture`, `quantite_par_repas`, `nombre_de_repas`) VALUES
(20, 'herbivore', 'plantes', 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(1) NOT NULL,
  `nom` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nom`) VALUES
(0, 'utilisateur'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role_id`) VALUES
(19, 'admin123', '$2y$10$EW9vdWcabWIUbpla2GgHru2c.AITqaR.e2gPfAYcsTPeUOs4h6sDK', 'aaaa@sgqhbds.com', 0),
(24, 'dqsqsdqd', '$2y$10$fJ1SS6iajnujgVMqw79tNuMdDuFO2SarUk9jHbZqmISLSfc40eVn6', 'dsqdsqdqs@sqds.com', 0),
(30, 'haziyama', '$2y$10$qiMA3JazKMntZ4OLYRNLOuqdxAUr3Y6mSchxJrniJS6hKWp/pMboa', 'sdqs@dq.com', 0),
(28, 'MAB', '$2y$10$yn6uv4kn/hHgUGsLkyYXPOwprbZn/oUmehcMEdk21NqZgi9DkWrUy', 'bouzaiene.dali@gmail.com', 1),
(32, 'meriammhedhbi', '$2y$10$GGgbJkvGgOF5XAnREoXm1eB1c3OAuQjOYkANViGK89lpX7Hu7O2oS', 'meriamMhedhbi1@gmail.com', 1),
(22, 'realMAB', '$2y$10$ZgAYwxSdMFPmPoK6xbVHbup.nKWLqgR8uOfj7iGNOEUAF.61g4Aau', 'dbouzaiene@gmail.com', 1),
(3, 'test1', '$2y$10$pYJtTsLu7oHQQHtQw/8HSO6hIBAAS3DblVZbVydpQiB43wi/QeiYW', 'azez@qsd.com', 1),
(13, 'test2', '$2y$10$QcWzIn1.jxRekkHG6iphM.Tnl1K7NRDGgENMfORpvutg2DF0qEsji', 'azez@qsd.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animaux`
--
ALTER TABLE `animaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreignKey` (`regimeAlimentaire`),
  ADD KEY `foreignKey1` (`updated_by`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`cin`),
  ADD KEY `KEY` (`id`),
  ADD KEY `personel_ibfk_1` (`updated_by`);

--
-- Indexes for table `regimealimentaire`
--
ALTER TABLE `regimealimentaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id` (`id`),
  ADD KEY `fk_foreign_role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animaux`
--
ALTER TABLE `animaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `personel`
--
ALTER TABLE `personel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `regimealimentaire`
--
ALTER TABLE `regimealimentaire`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animaux`
--
ALTER TABLE `animaux`
  ADD CONSTRAINT `foreignKey` FOREIGN KEY (`regimeAlimentaire`) REFERENCES `regimealimentaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foreignKey1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD CONSTRAINT `password_reset_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `personel`
--
ALTER TABLE `personel`
  ADD CONSTRAINT `personel_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `personel_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_foreign_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
