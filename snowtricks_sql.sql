-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 17 avr. 2020 à 11:22
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
(19, 92, 32, '2020-04-17 10:49:54', 'It\'s classic not just gorgeous!'),
(20, 92, 32, '2020-04-17 10:50:01', 'Type, background, shot, animation – clean :-)'),
(21, 92, 32, '2020-04-17 10:50:06', 'This icons blew my mind.'),
(22, 92, 32, '2020-04-17 10:50:14', 'I adore your concept mate'),
(24, 94, 32, '2020-04-17 10:52:57', 'Immensely alluring shot dude'),
(25, 101, 32, '2020-04-17 10:53:11', 'Revolutionary texture!'),
(31, 94, 32, '2020-04-17 11:20:17', 'Neat. So good.'),
(32, 94, 32, '2020-04-17 11:20:22', 'This concept blew my mind.'),
(33, 93, 32, '2020-04-17 11:20:28', 'It\'s strong not just sleek!'),
(34, 93, 32, '2020-04-17 11:20:32', 'Outstandingly fabulous :-)'),
(35, 93, 32, '2020-04-17 11:20:37', 'Such shot, many layout, so fab'),
(36, 93, 32, '2020-04-17 11:20:41', 'Immensely splendid shot.'),
(37, 93, 32, '2020-04-17 11:20:47', 'Tremendously thought out! Yes yes yes yes yes yes.'),
(38, 93, 32, '2020-04-17 11:20:58', 'Just sleek m8');

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
(172, 92, '2020-04-17 09:54:41', 'Ollie2-5e9960c171d35.jpeg', 0, 1, '2020-04-17 09:54:41'),
(173, 92, '2020-04-17 09:54:47', 'Ollie3-5e9960c708e70.jpeg', 0, 1, '2020-04-17 09:54:47'),
(174, 92, '2020-04-17 09:54:53', 'Ollie4-5e9960cd95095.jpeg', 0, 1, '2020-04-17 09:54:53'),
(175, 92, '2020-04-17 09:55:31', 'Ollie1-5e9960f36aee8.jpeg', 1, 1, '2020-04-17 09:55:31'),
(176, 93, '2020-04-17 10:01:08', 'BackFlip2-5e996244be07b.jpeg', 0, 1, '2020-04-17 10:01:08'),
(177, 93, '2020-04-17 10:01:13', 'BackFlip3-5e996249be02d.jpeg', 0, 1, '2020-04-17 10:01:13'),
(178, 93, '2020-04-17 10:01:18', 'BackFlip4-5e99624e7a748.jpeg', 0, 1, '2020-04-17 10:01:18'),
(179, 93, '2020-04-17 10:01:44', 'BackFlip-MainImage-5e996268438a1.jpeg', 1, 1, '2020-04-17 10:01:44'),
(180, 94, '2020-04-17 10:06:33', '360-2-5e996389a656e.jpeg', 0, 1, '2020-04-17 10:06:33'),
(181, 94, '2020-04-17 10:06:38', '360-3-5e99638eabb6a.jpeg', 0, 1, '2020-04-17 10:06:38'),
(182, 94, '2020-04-17 10:06:43', '360-4-5e9963932b16c.jpeg', 0, 1, '2020-04-17 10:06:43'),
(183, 94, '2020-04-17 10:06:58', '360-MainImage-5e9963a2c8800.jpeg', 1, 1, '2020-04-17 10:06:58'),
(184, 95, '2020-04-17 10:12:42', 'Slide2-5e9964fab7fa6.jpeg', 0, 1, '2020-04-17 10:12:42'),
(185, 95, '2020-04-17 10:12:48', 'Slide3-5e9965005dbad.jpeg', 0, 1, '2020-04-17 10:12:48'),
(186, 95, '2020-04-17 10:12:53', 'Slide4-5e99650582fe0.jpeg', 0, 1, '2020-04-17 10:12:53'),
(187, 95, '2020-04-17 10:13:33', 'Slide-MainImage-5e99652d3ed2d.jpeg', 1, 1, '2020-04-17 10:13:33'),
(188, 96, '2020-04-17 10:19:54', 'Tailslide-2-5e9966aa7a8fc.jpeg', 0, 1, '2020-04-17 10:19:54'),
(189, 96, '2020-04-17 10:19:59', 'Tailslide-3-5e9966afc0ea1.jpeg', 0, 1, '2020-04-17 10:19:59'),
(190, 96, '2020-04-17 10:20:04', 'Tailslide-4-5e9966b46bf70.jpeg', 0, 1, '2020-04-17 10:20:04'),
(191, 96, '2020-04-17 10:20:17', 'Tailslide-MainImage-5e9966c18e379.jpeg', 1, 1, '2020-04-17 10:20:17'),
(192, 97, '2020-04-17 10:27:15', 'Grab-2-5e996863cfed8.jpeg', 0, 1, '2020-04-17 10:27:15'),
(193, 97, '2020-04-17 10:27:20', 'Grab-3-5e996867f3589.jpeg', 0, 1, '2020-04-17 10:27:20'),
(194, 97, '2020-04-17 10:27:24', 'Grab-4-5e99686c4bc71.jpeg', 0, 1, '2020-04-17 10:27:24'),
(195, 97, '2020-04-17 10:27:58', 'Grab-MainImage-5e99688ebaa55.jpeg', 1, 1, '2020-04-17 10:27:58'),
(196, 98, '2020-04-17 10:32:25', 'HandPlant-2-5e996999c737f.jpeg', 0, 1, '2020-04-17 10:32:25'),
(197, 98, '2020-04-17 10:32:30', 'HandPlant-3-5e99699ee9038.jpeg', 0, 1, '2020-04-17 10:32:30'),
(198, 98, '2020-04-17 10:32:35', 'HandPlant-4-5e9969a3360f0.jpeg', 0, 1, '2020-04-17 10:32:35'),
(199, 98, '2020-04-17 10:33:03', 'HandPlant-MainImage-5e9969bfc54d5.jpeg', 1, 1, '2020-04-17 10:33:03'),
(200, 99, '2020-04-17 10:38:08', 'TailBlock-2-5e996af02875a.jpeg', 0, 1, '2020-04-17 10:38:08'),
(201, 99, '2020-04-17 10:38:12', 'TailBlock-3-5e996af472cbe.jpeg', 0, 1, '2020-04-17 10:38:12'),
(202, 99, '2020-04-17 10:38:17', 'TailBlock-4-5e996af934e58.jpeg', 0, 1, '2020-04-17 10:38:17'),
(203, 99, '2020-04-17 10:38:30', 'TailBlock-MainImage-5e996b06ca35b.jpeg', 1, 1, '2020-04-17 10:38:30'),
(204, 100, '2020-04-17 10:42:56', 'SwitchAir-2-5e996c10f18a1.jpeg', 0, 1, '2020-04-17 10:42:56'),
(205, 100, '2020-04-17 10:43:03', 'SwitchAir-3-5e996c17e0da5.jpeg', 0, 1, '2020-04-17 10:43:03'),
(206, 100, '2020-04-17 10:43:08', 'SwitchAir-4-5e996c1cbddc6.jpeg', 0, 1, '2020-04-17 10:43:08'),
(207, 100, '2020-04-17 10:43:23', 'SwitchAir-MainImage-5e996c2b7f911.jpeg', 1, 1, '2020-04-17 10:43:23'),
(208, 101, '2020-04-17 10:48:26', 'Tripod-2-5e996d5a310b2.jpeg', 0, 1, '2020-04-17 10:48:26'),
(209, 101, '2020-04-17 10:48:32', 'Tripod-3-5e996d6075c19.jpeg', 0, 1, '2020-04-17 10:48:32'),
(210, 101, '2020-04-17 10:48:37', 'Tripod-4-5e996d650d2f9.jpeg', 0, 1, '2020-04-17 10:48:37'),
(211, 101, '2020-04-17 10:49:17', 'Tripod-MainImage-5e996d8d02931.jpeg', 1, 1, '2020-04-17 10:49:17');

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
(92, 'Ollie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac laoreet ligula. Aliquam ornare felis ut iaculis porta. Vivamus tincidunt, nisl a lobortis gravida, odio lacus placerat nisi, id lobortis ligula metus vitae lectus. Vestibulum at mauris magna. Donec malesuada justo quis leo convallis faucibus. Cras eu lectus volutpat, molestie lectus in, commodo lacus. Etiam dapibus quam sed justo gravida, non congue mi imperdiet. Etiam id sem sit amet est ornare feugiat. Donec dapibus, ex a aliquam suscipit, lectus augue volutpat lorem, ac mollis justo urna in justo.', 'Rotations', '2020-04-17 09:49:24', '2020-04-17 09:49:24'),
(93, 'Back Flip', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac laoreet ligula. Aliquam ornare felis ut iaculis porta. Vivamus tincidunt, nisl a lobortis gravida, odio lacus placerat nisi, id lobortis ligula metus vitae lectus. Vestibulum at mauris magna. Donec malesuada justo quis leo convallis faucibus. Cras eu lectus volutpat, molestie lectus in, commodo lacus. Etiam dapibus quam sed justo gravida, non congue mi imperdiet. Etiam id sem sit amet est ornare feugiat. Donec dapibus, ex a aliquam suscipit, lectus augue volutpat lorem, ac mollis justo urna in justo.', 'Flips', '2020-04-17 09:58:13', '2020-04-17 09:58:13'),
(94, 'BS 360', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac laoreet ligula. Aliquam ornare felis ut iaculis porta. Vivamus tincidunt, nisl a lobortis gravida, odio lacus placerat nisi, id lobortis ligula metus vitae lectus. Vestibulum at mauris magna. Donec malesuada justo quis leo convallis faucibus. Cras eu lectus volutpat, molestie lectus in, commodo lacus. Etiam dapibus quam sed justo gravida, non congue mi imperdiet. Etiam id sem sit amet est ornare feugiat. Donec dapibus, ex a aliquam suscipit, lectus augue volutpat lorem, ac mollis justo urna in justo.', 'Rotations', '2020-04-17 10:06:25', '2020-04-17 10:06:25'),
(95, 'BS Lipslide', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac laoreet ligula. Aliquam ornare felis ut iaculis porta. Vivamus tincidunt, nisl a lobortis gravida, odio lacus placerat nisi, id lobortis ligula metus vitae lectus. Vestibulum at mauris magna. Donec malesuada justo quis leo convallis faucibus. Cras eu lectus volutpat, molestie lectus in, commodo lacus. Etiam dapibus quam sed justo gravida, non congue mi imperdiet. Etiam id sem sit amet est ornare feugiat. Donec dapibus, ex a aliquam suscipit, lectus augue volutpat lorem, ac mollis justo urna in justo.', 'Slides', '2020-04-17 10:12:31', '2020-04-17 10:12:31'),
(96, 'Tail Slide', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac laoreet ligula. Aliquam ornare felis ut iaculis porta. Vivamus tincidunt, nisl a lobortis gravida, odio lacus placerat nisi, id lobortis ligula metus vitae lectus. Vestibulum at mauris magna. Donec malesuada justo quis leo convallis faucibus. Cras eu lectus volutpat, molestie lectus in, commodo lacus. Etiam dapibus quam sed justo gravida, non congue mi imperdiet. Etiam id sem sit amet est ornare feugiat. Donec dapibus, ex a aliquam suscipit, lectus augue volutpat lorem, ac mollis justo urna in justo.', 'Slides', '2020-04-17 10:19:17', '2020-04-17 10:19:17'),
(97, 'Front Grab', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac laoreet ligula. Aliquam ornare felis ut iaculis porta. Vivamus tincidunt, nisl a lobortis gravida, odio lacus placerat nisi, id lobortis ligula metus vitae lectus. Vestibulum at mauris magna. Donec malesuada justo quis leo convallis faucibus. Cras eu lectus volutpat, molestie lectus in, commodo lacus. Etiam dapibus quam sed justo gravida, non congue mi imperdiet. Etiam id sem sit amet est ornare feugiat. Donec dapibus, ex a aliquam suscipit, lectus augue volutpat lorem, ac mollis justo urna in justo.', 'Grabs', '2020-04-17 10:27:06', '2020-04-17 10:27:06'),
(98, 'Hand Plant', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac laoreet ligula. Aliquam ornare felis ut iaculis porta. Vivamus tincidunt, nisl a lobortis gravida, odio lacus placerat nisi, id lobortis ligula metus vitae lectus. Vestibulum at mauris magna. Donec malesuada justo quis leo convallis faucibus. Cras eu lectus volutpat, molestie lectus in, commodo lacus. Etiam dapibus quam sed justo gravida, non congue mi imperdiet. Etiam id sem sit amet est ornare feugiat. Donec dapibus, ex a aliquam suscipit, lectus augue volutpat lorem, ac mollis justo urna in justo.', 'Rotations', '2020-04-17 10:32:15', '2020-04-17 10:32:15'),
(99, 'Tail Block', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac laoreet ligula. Aliquam ornare felis ut iaculis porta. Vivamus tincidunt, nisl a lobortis gravida, odio lacus placerat nisi, id lobortis ligula metus vitae lectus. Vestibulum at mauris magna. Donec malesuada justo quis leo convallis faucibus. Cras eu lectus volutpat, molestie lectus in, commodo lacus. Etiam dapibus quam sed justo gravida, non congue mi imperdiet. Etiam id sem sit amet est ornare feugiat. Donec dapibus, ex a aliquam suscipit, lectus augue volutpat lorem, ac mollis justo urna in justo.', 'Grabs', '2020-04-17 10:37:42', '2020-04-17 10:37:42'),
(100, 'Switch Air', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac laoreet ligula. Aliquam ornare felis ut iaculis porta. Vivamus tincidunt, nisl a lobortis gravida, odio lacus placerat nisi, id lobortis ligula metus vitae lectus. Vestibulum at mauris magna. Donec malesuada justo quis leo convallis faucibus. Cras eu lectus volutpat, molestie lectus in, commodo lacus. Etiam dapibus quam sed justo gravida, non congue mi imperdiet. Etiam id sem sit amet est ornare feugiat. Donec dapibus, ex a aliquam suscipit, lectus augue volutpat lorem, ac mollis justo urna in justo.', 'Rotations', '2020-04-17 10:42:07', '2020-04-17 10:42:07'),
(101, 'Tripod', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac laoreet ligula. Aliquam ornare felis ut iaculis porta. Vivamus tincidunt, nisl a lobortis gravida, odio lacus placerat nisi, id lobortis ligula metus vitae lectus. Vestibulum at mauris magna. Donec malesuada justo quis leo convallis faucibus. Cras eu lectus volutpat, molestie lectus in, commodo lacus. Etiam dapibus quam sed justo gravida, non congue mi imperdiet. Etiam id sem sit amet est ornare feugiat. Donec dapibus, ex a aliquam suscipit, lectus augue volutpat lorem, ac mollis justo urna in justo.', 'Rotations', '2020-04-17 10:48:16', '2020-04-17 10:48:16');

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
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `reg_token`, `created_at`, `updated_at`, `avatar`) VALUES
(32, 'dokan59', 'cirpan.dogukan5959@gmail.com', '$2y$13$TPkOYG3RdJUJWgv3yUeiSu6jIhnJ2lF/SlBp4FrYyzQb1CAvjuVgq', NULL, '2020-04-16 15:45:32', '2020-04-16 15:45:32', 'avatar-5e996e27f3b08.jpeg');

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
(15, 92, 'https://www.youtube.com/embed/AnI7qGQs0Ic', '2020-04-17 09:55:24', 1),
(16, 93, 'https://www.youtube.com/embed/0sehBOkD01Q', '2020-04-17 10:01:37', 1),
(17, 94, 'https://www.youtube.com/embed/RUiWxRCAvLs', '2020-04-17 10:06:51', 1),
(18, 95, 'https://www.youtube.com/embed/pfkiK_RBsNc', '2020-04-17 10:13:22', 1),
(19, 96, 'https://www.youtube.com/embed/HRNXjMBakwM', '2020-04-17 10:20:11', 1),
(20, 97, 'https://www.youtube.com/embed/51sQRIK-TEI', '2020-04-17 10:27:49', 1),
(21, 98, 'https://www.youtube.com/embed/SIi9EpULILA', '2020-04-17 10:32:56', 1),
(22, 99, 'https://www.youtube.com/embed/l4IDmEHDqAg', '2020-04-17 10:38:24', 1),
(23, 100, 'https://www.youtube.com/embed/Cue7bU3N2NU', '2020-04-17 10:43:17', 1),
(24, 101, 'https://www.youtube.com/embed/msD1jQL63dA', '2020-04-17 10:49:11', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT pour la table `tricks`
--
ALTER TABLE `tricks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
