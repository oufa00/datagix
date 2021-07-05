-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 juil. 2021 à 20:07
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `datagix`
--

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

CREATE TABLE `cv` (
  `id` int(11) NOT NULL,
  `filename` varchar(250) DEFAULT NULL,
  `type` varchar(250) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cv`
--

INSERT INTO `cv` (`id`, `filename`, `type`, `id_user`) VALUES
(1, 'Nefnaf Abderraouf.pdf', 'application/pdf', 1),
(2, 'Nefnaf Abderraouf_1.pdf', 'application/pdf', 1),
(3, 'doctor                          Ithrytec.pdf', 'application/pdf', 19);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `phone_no` varchar(120) DEFAULT NULL,
  `role` enum('admin','editor') NOT NULL,
  `password` varchar(120) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `phone_no`, `role`, `password`, `created_at`) VALUES
(2, 'nefnaf', 'nefnaf@mail.com', '7899654125', 'admin', '$2y$10$VsFRei4syz/icNjX3B7quOtHL.MCNMfgSC8cr2AeoPdUnDqMA6DnS', '2021-07-05 16:34:56'),
(3, 'test', 'test@mail.com', '8888888888', 'editor', '$2y$10$n0x/k4bgDSnMxE6jka7rlufOzUMuGfrOak3Vy4aZTPiJhs3Ifpl1y', '2021-07-05 16:34:56'),
(6, 'abderraouf', 'nefnafraouf@gmail.com', '+213790125834', 'editor', '$2y$10$2Stda/THQTJQe0gz9CIYH.rkOlqQX81EnTFiDp3498eMAq00by83W', '2021-07-05 17:40:01'),
(7, 'abderraouf', 'nefnafraouf1@gmail.com', '+213790125834', 'admin', '$2y$10$qy4s2K0JEE.zaIKJhiiuyuxvdVZeUJ3i2Q3VrzISxYgVebWJc75mG', '2021-07-05 17:51:48'),
(8, 'abderraouf nefnaf', 'nefnafraouf3@gmail.com', '0790125834', 'admin', '$2y$10$QaVuate0.IDEhJ1JJOrPGe2nKhDH3UkhgdWbyb6rYjL6qSxuQCiKm', '2021-07-05 17:53:20');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `name` varchar(100) NOT NULL COMMENT 'Name',
  `email` varchar(255) NOT NULL COMMENT 'Email Address',
  `ville` varchar(250) DEFAULT NULL,
  `localite` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='datatable demo table';

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `ville`, `localite`) VALUES
(18, 'abderraouf', 'nefnafraouf@gmail.com', 'Alger', 'Cheraga'),
(19, 'datagix', 'datagix@gmail.com', 'Alger', 'Beni messous'),
(20, 'djamel', 'nefnafraouf@gmail.com', 'Tizi Ouzou', 'Redjaouna'),
(21, 'abderraouf', 'nefnafraouf@gmail.com', 'Alger', 'Cheraga');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cv`
--
ALTER TABLE `cv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
