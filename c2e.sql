-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2017 at 04:30 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c2e`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(26) COLLATE utf8_unicode_ci NOT NULL,
  `text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `text`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Test Annonce', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1, '2017-07-11 13:19:15', '2017-07-11 13:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `appareils`
--

CREATE TABLE `appareils` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `taille` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mode_connection` tinyint(1) NOT NULL DEFAULT '0',
  `connecter` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appareil_inscrit`
--

CREATE TABLE `appareil_inscrit` (
  `id` int(10) UNSIGNED NOT NULL,
  `appareil_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `badgets`
--

CREATE TABLE `badgets` (
  `id` int(10) UNSIGNED NOT NULL,
  `libelle` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapitres`
--

CREATE TABLE `chapitres` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tutoriel_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(10) UNSIGNED NOT NULL,
  `phrase` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `reponse` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `forum_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id`, `phrase`, `reponse`, `user_id`, `forum_id`, `created_at`, `updated_at`) VALUES
(1, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', 0, 1, 1, '2017-07-11 13:13:29', '2017-07-11 13:13:29');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire_tutoriels`
--

CREATE TABLE `commentaire_tutoriels` (
  `id` int(10) UNSIGNED NOT NULL,
  `phrase` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tutoriel_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `corriges`
--

CREATE TABLE `corriges` (
  `id` int(10) UNSIGNED NOT NULL,
  `phrase` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `question_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` int(10) UNSIGNED NOT NULL,
  `terme` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dossiers`
--

CREATE TABLE `dossiers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `projet_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exemples`
--

CREATE TABLE `exemples` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `exemple` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exercices`
--

CREATE TABLE `exercices` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `nbr_vue` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `type_d_exercice_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fichiers`
--

CREATE TABLE `fichiers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(10) UNSIGNED NOT NULL,
  `sujet` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `resolu` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `sujet`, `description`, `date`, `resolu`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Sujet test', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '0000-00-00', 0, 1, '2017-07-11 13:01:54', '2017-07-11 13:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `forum_type`
--

CREATE TABLE `forum_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `forum_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image__logins`
--

CREATE TABLE `image__logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `vue` tinyint(1) NOT NULL DEFAULT '1',
  `date_envoie` date NOT NULL,
  `date_vue` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_10_000000_create_type_utilisateurs_table', 1),
('2014_10_11_000000_create_domains_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_04_121823_create_termes_table', 1),
('2017_03_04_121858_create_universites_table', 1),
('2017_03_04_121955_create_niveaus_table', 1),
('2017_03_04_121956_create_tutoriels_table', 1),
('2017_03_04_122014_create_notifications_table', 1),
('2017_03_04_122026_create_messages_table', 1),
('2017_03_04_122046_create_badgets_table', 1),
('2017_03_04_122101_create_appareils_table', 1),
('2017_03_04_122124_create_projets_table', 1),
('2017_03_04_122138_create_dossiers_table', 1),
('2017_03_04_122153_create_fichiers_table', 1),
('2017_03_04_122213_create_types_table', 1),
('2017_03_04_122228_create_forums_table', 1),
('2017_03_04_122254_create_chapitres_table', 1),
('2017_03_04_122307_create_sections_table', 1),
('2017_03_04_122453_create_exemples_table', 1),
('2017_03_04_122519_create_image__logins_table', 1),
('2017_03_04_122628_create_type_d_exercices_table', 1),
('2017_03_04_122630_create_exercices_table', 1),
('2017_03_04_122675_create_questions_table', 1),
('2017_03_04_122717_create_type_de_fichiers_table', 1),
('2017_03_04_140156_create_user_universite', 1),
('2017_03_05_045450_create_user_badget', 1),
('2017_03_11_122453_create_corriges_table', 1),
('2017_03_11_122721_create_reponses_table', 1),
('2017_03_11_122850_forum_type', 1),
('2017_03_11_122904_tutoriel_type', 1),
('2017_03_11_123121_terme_inscrit', 1),
('2017_03_11_123137_appareil_inscrit', 1),
('2017_03_11_123316_create_commentaires_table', 1),
('2017_05_11_075348_create_annonces_table', 1),
('2017_05_11_082137_create_commentaire_tutoriels_table', 1),
('2017_06_10_163231_create_tags_table', 1),
('2017_06_10_180545_create_tutoriel_tag_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `niveaus`
--

CREATE TABLE `niveaus` (
  `id` int(10) UNSIGNED NOT NULL,
  `niveau` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `phrase` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `visualiser` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projets`
--

CREATE TABLE `projets` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `nbr_vue` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `phrase` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `exercice_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reponses`
--

CREATE TABLE `reponses` (
  `id` int(10) UNSIGNED NOT NULL,
  `phrase` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `chapitre_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `termes`
--

CREATE TABLE `termes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terme_inscrit`
--

CREATE TABLE `terme_inscrit` (
  `id` int(10) UNSIGNED NOT NULL,
  `terme_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutoriels`
--

CREATE TABLE `tutoriels` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `introduction` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `nbr_vue` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `niveau_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validation_id` int(10) UNSIGNED NOT NULL,
  `badget_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutoriel_tag`
--

CREATE TABLE `tutoriel_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `tutoriel_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutoriel_type`
--

CREATE TABLE `tutoriel_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `tutoriel_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_de_fichiers`
--

CREATE TABLE `type_de_fichiers` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_d_exercices`
--

CREATE TABLE `type_d_exercices` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_utilisateurs`
--

CREATE TABLE `type_utilisateurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `terme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_utilisateurs`
--

INSERT INTO `type_utilisateurs` (`id`, `terme`, `created_at`, `updated_at`) VALUES
(1, 'simple', NULL, NULL),
(2, 'validateur', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `universites`
--

CREATE TABLE `universites` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `annee_nais` int(10) UNSIGNED NOT NULL,
  `adresse` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `domaine` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `etudiant` tinyint(1) NOT NULL DEFAULT '1',
  `lieu` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass_changed` tinyint(1) NOT NULL DEFAULT '0',
  `type_utilisateur_id` int(10) UNSIGNED NOT NULL,
  `score` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `annee_nais`, `adresse`, `email`, `login`, `telephone`, `image`, `domaine`, `etudiant`, `lieu`, `password`, `pass_changed`, `type_utilisateur_id`, `score`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'RAMANITRA', 'Aro', 1995, 'Tanambao ', 'aro@gmail.com', 'doda', '0343434543', 'images_users/1.jpg', 'Genie logiciel et base de donnees', 1, 'Ecole Nationale d\'Informatique', '$2y$10$279lGByRisvKnoDLZ7Hz.uHu4Sqju7U6DhWCLb.H9xdZ0n8at8ACu', 1, 1, 11, 'r5jPx6zj4QuDf0HdHPM5PothzFkSyzBhvOwu5BcYEGiiDcb5oHCPyV1BTWvy', '2017-07-11 12:24:00', '2017-07-11 15:23:41'),
(2, 'RAMANITRA', 'Tamby', 1997, 'Amponenana', 'tambi@gmail.com', 'tambi', '03234893433', 'images_users/default.svg', 'Generaliste', 1, 'Ecole Nationale d\'Informatique', '$2y$10$BKIkFjakui0rRocnfmJJFOkdwSVwjTIsuCpLhef.wptYikiK8Kxky', 1, 1, 1, 'LpHxY7MiR78SLryAOM7C9D4XmPrY9K4ANI64up2DRDxmEHC7ZRrKrEBttgCg', '2017-07-11 12:33:43', '2017-07-12 02:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_badget`
--

CREATE TABLE `user_badget` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `badgets_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_universite`
--

CREATE TABLE `user_universite` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `universite_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `annonces_user_id_foreign` (`user_id`);

--
-- Indexes for table `appareils`
--
ALTER TABLE `appareils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appareils_user_id_foreign` (`user_id`);

--
-- Indexes for table `appareil_inscrit`
--
ALTER TABLE `appareil_inscrit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appareil_inscrit_appareil_id_foreign` (`appareil_id`),
  ADD KEY `appareil_inscrit_user_id_foreign` (`user_id`);

--
-- Indexes for table `badgets`
--
ALTER TABLE `badgets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `badgets_libelle_unique` (`libelle`);

--
-- Indexes for table `chapitres`
--
ALTER TABLE `chapitres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapitres_tutoriel_id_foreign` (`tutoriel_id`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaires_user_id_index` (`user_id`),
  ADD KEY `commentaires_forum_id_index` (`forum_id`);

--
-- Indexes for table `commentaire_tutoriels`
--
ALTER TABLE `commentaire_tutoriels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaire_tutoriels_user_id_foreign` (`user_id`),
  ADD KEY `commentaire_tutoriels_tutoriel_id_foreign` (`tutoriel_id`);

--
-- Indexes for table `corriges`
--
ALTER TABLE `corriges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `corriges_question_id_foreign` (`question_id`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dossiers`
--
ALTER TABLE `dossiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dossiers_projet_id_foreign` (`projet_id`);

--
-- Indexes for table `exemples`
--
ALTER TABLE `exemples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exemples_section_id_foreign` (`section_id`);

--
-- Indexes for table `exercices`
--
ALTER TABLE `exercices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercices_type_d_exercice_id_foreign` (`type_d_exercice_id`),
  ADD KEY `exercices_user_id_foreign` (`user_id`);

--
-- Indexes for table `fichiers`
--
ALTER TABLE `fichiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forums_user_id_foreign` (`user_id`);

--
-- Indexes for table `forum_type`
--
ALTER TABLE `forum_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forum_type_forum_id_foreign` (`forum_id`),
  ADD KEY `forum_type_type_id_foreign` (`type_id`);

--
-- Indexes for table `image__logins`
--
ALTER TABLE `image__logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `niveaus`
--
ALTER TABLE `niveaus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `projets`
--
ALTER TABLE `projets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projets_user_id_foreign` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_exercice_id_foreign` (`exercice_id`);

--
-- Indexes for table `reponses`
--
ALTER TABLE `reponses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reponses_user_id_foreign` (`user_id`),
  ADD KEY `reponses_question_id_foreign` (`question_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_chapitre_id_foreign` (`chapitre_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termes`
--
ALTER TABLE `termes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `termes_nom_unique` (`nom`);

--
-- Indexes for table `terme_inscrit`
--
ALTER TABLE `terme_inscrit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terme_inscrit_terme_id_foreign` (`terme_id`),
  ADD KEY `terme_inscrit_user_id_foreign` (`user_id`);

--
-- Indexes for table `tutoriels`
--
ALTER TABLE `tutoriels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutoriels_user_id_foreign` (`user_id`),
  ADD KEY `tutoriels_niveau_id_foreign` (`niveau_id`),
  ADD KEY `tutoriels_validation_id_index` (`validation_id`),
  ADD KEY `tutoriels_badget_id_index` (`badget_id`);

--
-- Indexes for table `tutoriel_tag`
--
ALTER TABLE `tutoriel_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutoriel_tag_tutoriel_id_index` (`tutoriel_id`),
  ADD KEY `tutoriel_tag_tag_id_index` (`tag_id`);

--
-- Indexes for table `tutoriel_type`
--
ALTER TABLE `tutoriel_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tutoriel_type_tutoriel_id_foreign` (`tutoriel_id`),
  ADD KEY `tutoriel_type_type_id_foreign` (`type_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_de_fichiers`
--
ALTER TABLE `type_de_fichiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_d_exercices`
--
ALTER TABLE `type_d_exercices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_utilisateurs`
--
ALTER TABLE `type_utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universites`
--
ALTER TABLE `universites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `universites_nom_unique` (`nom`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_login_unique` (`login`),
  ADD KEY `users_type_utilisateur_id_foreign` (`type_utilisateur_id`);

--
-- Indexes for table `user_badget`
--
ALTER TABLE `user_badget`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_badget_users_id_foreign` (`users_id`),
  ADD KEY `user_badget_badgets_id_foreign` (`badgets_id`);

--
-- Indexes for table `user_universite`
--
ALTER TABLE `user_universite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_universite_user_id_foreign` (`user_id`),
  ADD KEY `user_universite_universite_id_foreign` (`universite_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appareils`
--
ALTER TABLE `appareils`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `appareil_inscrit`
--
ALTER TABLE `appareil_inscrit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `badgets`
--
ALTER TABLE `badgets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `chapitres`
--
ALTER TABLE `chapitres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `commentaire_tutoriels`
--
ALTER TABLE `commentaire_tutoriels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `corriges`
--
ALTER TABLE `corriges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dossiers`
--
ALTER TABLE `dossiers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exemples`
--
ALTER TABLE `exemples`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exercices`
--
ALTER TABLE `exercices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fichiers`
--
ALTER TABLE `fichiers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forum_type`
--
ALTER TABLE `forum_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image__logins`
--
ALTER TABLE `image__logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `niveaus`
--
ALTER TABLE `niveaus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projets`
--
ALTER TABLE `projets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reponses`
--
ALTER TABLE `reponses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `termes`
--
ALTER TABLE `termes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `terme_inscrit`
--
ALTER TABLE `terme_inscrit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutoriels`
--
ALTER TABLE `tutoriels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutoriel_tag`
--
ALTER TABLE `tutoriel_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutoriel_type`
--
ALTER TABLE `tutoriel_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_de_fichiers`
--
ALTER TABLE `type_de_fichiers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_d_exercices`
--
ALTER TABLE `type_d_exercices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `type_utilisateurs`
--
ALTER TABLE `type_utilisateurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `universites`
--
ALTER TABLE `universites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_badget`
--
ALTER TABLE `user_badget`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_universite`
--
ALTER TABLE `user_universite`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `appareils`
--
ALTER TABLE `appareils`
  ADD CONSTRAINT `appareils_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `appareil_inscrit`
--
ALTER TABLE `appareil_inscrit`
  ADD CONSTRAINT `appareil_inscrit_appareil_id_foreign` FOREIGN KEY (`appareil_id`) REFERENCES `appareils` (`id`),
  ADD CONSTRAINT `appareil_inscrit_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `chapitres`
--
ALTER TABLE `chapitres`
  ADD CONSTRAINT `chapitres_tutoriel_id_foreign` FOREIGN KEY (`tutoriel_id`) REFERENCES `tutoriels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentaires_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `commentaire_tutoriels`
--
ALTER TABLE `commentaire_tutoriels`
  ADD CONSTRAINT `commentaire_tutoriels_tutoriel_id_foreign` FOREIGN KEY (`tutoriel_id`) REFERENCES `tutoriels` (`id`),
  ADD CONSTRAINT `commentaire_tutoriels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `corriges`
--
ALTER TABLE `corriges`
  ADD CONSTRAINT `corriges_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `dossiers`
--
ALTER TABLE `dossiers`
  ADD CONSTRAINT `dossiers_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`);

--
-- Constraints for table `exemples`
--
ALTER TABLE `exemples`
  ADD CONSTRAINT `exemples_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);

--
-- Constraints for table `exercices`
--
ALTER TABLE `exercices`
  ADD CONSTRAINT `exercices_type_d_exercice_id_foreign` FOREIGN KEY (`type_d_exercice_id`) REFERENCES `type_d_exercices` (`id`),
  ADD CONSTRAINT `exercices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forum_type`
--
ALTER TABLE `forum_type`
  ADD CONSTRAINT `forum_type_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`id`),
  ADD CONSTRAINT `forum_type_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `projets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_exercice_id_foreign` FOREIGN KEY (`exercice_id`) REFERENCES `exercices` (`id`);

--
-- Constraints for table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `reponses_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `reponses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_chapitre_id_foreign` FOREIGN KEY (`chapitre_id`) REFERENCES `chapitres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `terme_inscrit`
--
ALTER TABLE `terme_inscrit`
  ADD CONSTRAINT `terme_inscrit_terme_id_foreign` FOREIGN KEY (`terme_id`) REFERENCES `termes` (`id`),
  ADD CONSTRAINT `terme_inscrit_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tutoriels`
--
ALTER TABLE `tutoriels`
  ADD CONSTRAINT `tutoriels_niveau_id_foreign` FOREIGN KEY (`niveau_id`) REFERENCES `niveaus` (`id`),
  ADD CONSTRAINT `tutoriels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tutoriel_type`
--
ALTER TABLE `tutoriel_type`
  ADD CONSTRAINT `tutoriel_type_tutoriel_id_foreign` FOREIGN KEY (`tutoriel_id`) REFERENCES `tutoriels` (`id`),
  ADD CONSTRAINT `tutoriel_type_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_type_utilisateur_id_foreign` FOREIGN KEY (`type_utilisateur_id`) REFERENCES `type_utilisateurs` (`id`);

--
-- Constraints for table `user_badget`
--
ALTER TABLE `user_badget`
  ADD CONSTRAINT `user_badget_badgets_id_foreign` FOREIGN KEY (`badgets_id`) REFERENCES `badgets` (`id`),
  ADD CONSTRAINT `user_badget_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_universite`
--
ALTER TABLE `user_universite`
  ADD CONSTRAINT `user_universite_universite_id_foreign` FOREIGN KEY (`universite_id`) REFERENCES `universites` (`id`),
  ADD CONSTRAINT `user_universite_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
