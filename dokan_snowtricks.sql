-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 05 avr. 2020 à 15:25
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `snowtricks`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `trick_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `trick_id`, `author_id`, `created_at`, `content`) VALUES
(16, 6, 16, '2020-04-05 15:23:43', 'Really pretty'),
(18, 6, 16, '2020-04-05 15:24:10', 'It\'s amazing'),
(19, 7, 16, '2020-04-05 15:24:22', 'This is incredible'),
(20, 7, 16, '2020-04-05 15:24:28', 'WOOOW !'),
(21, 8, 16, '2020-04-05 15:24:46', 'Oh my God !'),
(22, 8, 16, '2020-04-05 15:24:53', 'Good job'),
(23, 9, 16, '2020-04-05 15:24:59', 'I like this'),
(25, 9, 16, '2020-04-05 15:25:15', 'This best tricks');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `tricks_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id`, `tricks_id`, `created_at`, `image`, `main_image`, `active`, `updated_at`) VALUES
(10, 6, '2020-04-05 15:07:17', 'nose-5e89d8050490a.jpeg', 0, 1, '2020-04-05 15:07:17'),
(11, 6, '2020-04-05 15:07:24', 'nose1-5e89d80cc0a93.jpeg', 0, 1, '2020-04-05 15:07:24'),
(13, 6, '2020-04-05 15:07:58', 'nose4-5e89d82e1f463.jpeg', 1, 1, '2020-04-05 15:07:58'),
(14, 7, '2020-04-05 15:16:23', 'backflip-5e89da2719e9e.webp', 0, 1, '2020-04-05 15:16:23'),
(15, 7, '2020-04-05 15:16:31', 'backflip2-5e89da2fbf5f6.jpeg', 0, 1, '2020-04-05 15:16:31'),
(16, 7, '2020-04-05 15:16:38', 'backflip1-5e89da362b1f2.jpeg', 1, 1, '2020-04-05 15:16:38'),
(17, 8, '2020-04-05 15:19:13', '360-5e89dad1ac7cd.jpeg', 0, 1, '2020-04-05 15:19:13'),
(18, 8, '2020-04-05 15:19:21', '360-2-5e89dad94b028.jpeg', 0, 1, '2020-04-05 15:19:21'),
(19, 8, '2020-04-05 15:19:28', '360-1-5e89dae0caa64.jpeg', 1, 1, '2020-04-05 15:19:28'),
(20, 9, '2020-04-05 15:22:22', 'slide-5e89db8e04a5f.jpeg', 0, 1, '2020-04-05 15:22:22'),
(21, 9, '2020-04-05 15:22:27', 'slide2-5e89db93744f6.jpeg', 0, 1, '2020-04-05 15:22:27'),
(22, 9, '2020-04-05 15:22:34', 'slide3-5e89db9a83bb7.jpeg', 1, 1, '2020-04-05 15:22:34');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20191216105625', '2019-12-16 10:57:40'),
('20191216110251', '2019-12-16 11:03:10'),
('20191216110458', '2019-12-16 11:05:05'),
('20200202153857', '2020-02-02 15:39:44'),
('20200207104651', '2020-02-07 10:49:17'),
('20200207113120', '2020-02-07 11:31:37'),
('20200305012324', '2020-03-05 01:23:41'),
('20200305013039', '2020-03-05 01:31:02'),
('20200305021934', '2020-03-05 02:22:21'),
('20200305022125', '2020-03-05 02:22:21'),
('20200305022130', '2020-03-05 02:22:21'),
('20200305022210', '2020-03-05 02:22:21'),
('20200305022240', '2020-03-05 02:22:45'),
('20200305032134', '2020-03-05 03:21:40'),
('20200305033954', '2020-03-05 03:49:20');

-- --------------------------------------------------------

--
-- Structure de la table `tricks`
--

CREATE TABLE `tricks` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tricks`
--

INSERT INTO `tricks` (`id`, `name`, `content`, `category`, `created_at`, `updated_at`) VALUES
(6, 'Nose', 'Front hand grabs the nose of the board.', 'Grabs', '2020-04-05 15:06:24', '2020-04-05 15:06:24'),
(7, 'Back Flip', 'Moves in which a rotates one or more times while airborne', 'Flips', '2020-04-05 15:15:44', '2020-04-05 15:15:44'),
(8, '360°', 'Take a 360 ° turn on yourself', 'Rotations', '2020-04-05 15:19:00', '2020-04-05 15:19:00'),
(9, 'Slide on bar', 'A slide consists of sliding on a slide bar.', 'Slides', '2020-04-05 15:21:39', '2020-04-05 15:21:39');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_token` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `reg_token`, `created_at`, `updated_at`, `avatar`) VALUES
(16, 'dokan59', 'alu.mb7575@gmail.com', '$2y$13$.35T0DOpeMgtCPxJfcOJg.CPvTbxHGhoXyc2t4Q8Lmo1uNnnHPmn2', NULL, '2020-04-02 00:19:00', '2020-04-02 00:19:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `tricks_id` int(11) DEFAULT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id`, `tricks_id`, `url`, `created_at`, `active`) VALUES
(9, 6, 'https://www.youtube.com/embed/y2MHu0mbzQw', '2020-04-05 15:10:24', 1),
(10, 7, 'https://www.youtube.com/embed/SlhGVnFPTDE', '2020-04-05 15:17:21', 1),
(11, 8, 'https://www.youtube.com/embed/hUddT6FGCws', '2020-04-05 15:20:19', 1),
(12, 9, 'https://www.youtube.com/embed/lnbUwCPbbQM', '2020-04-05 15:23:07', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CB281BE2E` (`trick_id`),
  ADD KEY `IDX_9474526CF675F31B` (`author_id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C53D045F3B153154` (`tricks_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `tricks`
--
ALTER TABLE `tricks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CC7DA2C3B153154` (`tricks_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `tricks`
--
ALTER TABLE `tricks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CB281BE2E` FOREIGN KEY (`trick_id`) REFERENCES `tricks` (`id`),
  ADD CONSTRAINT `FK_9474526CF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045F3B153154` FOREIGN KEY (`tricks_id`) REFERENCES `tricks` (`id`);

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2C3B153154` FOREIGN KEY (`tricks_id`) REFERENCES `tricks` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
