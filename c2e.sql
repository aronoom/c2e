-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Septembre 2017 à 06:45
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `c2e`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE IF NOT EXISTS `annonces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(26) COLLATE utf8_unicode_ci NOT NULL,
  `text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `annonces_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `appareils`
--

CREATE TABLE IF NOT EXISTS `appareils` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `taille` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mode_connection` tinyint(1) NOT NULL DEFAULT '0',
  `connecter` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appareils_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `appareil_inscrit`
--

CREATE TABLE IF NOT EXISTS `appareil_inscrit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `appareil_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `appareil_inscrit_appareil_id_foreign` (`appareil_id`),
  KEY `appareil_inscrit_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `badgets`
--

CREATE TABLE IF NOT EXISTS `badgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `badgets_libelle_unique` (`nom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `badgets`
--

INSERT INTO `badgets` (`id`, `nom`, `image`, `created_at`, `updated_at`) VALUES
(2, 'html', 'images_badgets/DRcCSInoqg.svg', '2017-09-19 05:27:19', '2017-09-19 05:27:19');

-- --------------------------------------------------------

--
-- Structure de la table `chapitres`
--

CREATE TABLE IF NOT EXISTS `chapitres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `tutoriel_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chapitres_tutoriel_id_foreign` (`tutoriel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phrase` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `reponse` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `forum_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commentaires_user_id_index` (`user_id`),
  KEY `commentaires_forum_id_index` (`forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire_tutoriels`
--

CREATE TABLE IF NOT EXISTS `commentaire_tutoriels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phrase` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `tutoriel_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `commentaire_tutoriels_user_id_foreign` (`user_id`),
  KEY `commentaire_tutoriels_tutoriel_id_foreign` (`tutoriel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `corriges`
--

CREATE TABLE IF NOT EXISTS `corriges` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phrase` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `question_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `corriges_question_id_foreign` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `terme` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `dossiers`
--

CREATE TABLE IF NOT EXISTS `dossiers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `projet_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dossiers_projet_id_foreign` (`projet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `exemples`
--

CREATE TABLE IF NOT EXISTS `exemples` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `exemple` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exemples_section_id_foreign` (`section_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `exercices`
--

CREATE TABLE IF NOT EXISTS `exercices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  `nbr_vue` int(10) unsigned NOT NULL DEFAULT '0',
  `type_d_exercice_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exercices_type_d_exercice_id_foreign` (`type_d_exercice_id`),
  KEY `exercices_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fichiers`
--

CREATE TABLE IF NOT EXISTS `fichiers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `forums`
--

CREATE TABLE IF NOT EXISTS `forums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sujet` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `resolu` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forums_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `forum_type`
--

CREATE TABLE IF NOT EXISTS `forum_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forum_id` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `forum_type_forum_id_foreign` (`forum_id`),
  KEY `forum_type_type_id_foreign` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `image__logins`
--

CREATE TABLE IF NOT EXISTS `image__logins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `vue` tinyint(1) NOT NULL DEFAULT '1',
  `date_envoie` date NOT NULL,
  `date_vue` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
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
-- Structure de la table `niveaus`
--

CREATE TABLE IF NOT EXISTS `niveaus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `niveau` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `niveaus`
--

INSERT INTO `niveaus` (`id`, `niveau`, `created_at`, `updated_at`) VALUES
(1, 'facile', NULL, NULL),
(2, 'moyen', NULL, NULL),
(3, 'difficile', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phrase` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `visualiser` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projets`
--

CREATE TABLE IF NOT EXISTS `projets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `nbr_vue` int(10) unsigned NOT NULL DEFAULT '1',
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projets_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phrase` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `exercice_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_exercice_id_foreign` (`exercice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `reponses`
--

CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phrase` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reponses_user_id_foreign` (`user_id`),
  KEY `reponses_question_id_foreign` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `chapitre_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_chapitre_id_foreign` (`chapitre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'html');

-- --------------------------------------------------------

--
-- Structure de la table `termes`
--

CREATE TABLE IF NOT EXISTS `termes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `termes_nom_unique` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `terme_inscrit`
--

CREATE TABLE IF NOT EXISTS `terme_inscrit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `terme_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `terme_inscrit_terme_id_foreign` (`terme_id`),
  KEY `terme_inscrit_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `tutoriels`
--

CREATE TABLE IF NOT EXISTS `tutoriels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `introduction` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `nbr_vue` int(10) unsigned NOT NULL DEFAULT '1',
  `user_id` int(10) unsigned NOT NULL,
  `niveau_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validation_id` int(10) unsigned NOT NULL,
  `badget_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tutoriels_user_id_foreign` (`user_id`),
  KEY `tutoriels_niveau_id_foreign` (`niveau_id`),
  KEY `tutoriels_validation_id_index` (`validation_id`),
  KEY `tutoriels_badget_id_index` (`badget_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tutoriels`
--

INSERT INTO `tutoriels` (`id`, `nom`, `description`, `introduction`, `nbr_vue`, `user_id`, `niveau_id`, `created_at`, `updated_at`, `validation_id`, `badget_id`) VALUES
(1, 'Tuto test', 'fgds;dfgjsdfhjk sdfkjjlbdvhbjkhxbkdjbj sdfg', '<p>dfgdf</p>', 1, 4, 1, '2017-09-19 12:14:11', '2017-09-19 12:14:11', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tutoriel_tag`
--

CREATE TABLE IF NOT EXISTS `tutoriel_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tutoriel_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tutoriel_tag_tutoriel_id_index` (`tutoriel_id`),
  KEY `tutoriel_tag_tag_id_index` (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `tutoriel_tag`
--

INSERT INTO `tutoriel_tag` (`id`, `tutoriel_id`, `tag_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tutoriel_type`
--

CREATE TABLE IF NOT EXISTS `tutoriel_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tutoriel_id` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tutoriel_type_tutoriel_id_foreign` (`tutoriel_id`),
  KEY `tutoriel_type_type_id_foreign` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_de_fichiers`
--

CREATE TABLE IF NOT EXISTS `type_de_fichiers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_d_exercices`
--

CREATE TABLE IF NOT EXISTS `type_d_exercices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_utilisateurs`
--

CREATE TABLE IF NOT EXISTS `type_utilisateurs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `terme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `type_utilisateurs`
--

INSERT INTO `type_utilisateurs` (`id`, `terme`, `created_at`, `updated_at`) VALUES
(1, 'simple', NULL, NULL),
(2, 'validateur', NULL, NULL),
(3, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `universites`
--

CREATE TABLE IF NOT EXISTS `universites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `universites_nom_unique` (`nom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `annee_nais` int(10) unsigned NOT NULL,
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
  `type_utilisateur_id` int(10) unsigned NOT NULL,
  `score` int(10) unsigned NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `statut` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_login_unique` (`login`),
  KEY `users_type_utilisateur_id_foreign` (`type_utilisateur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `annee_nais`, `adresse`, `email`, `login`, `telephone`, `image`, `domaine`, `etudiant`, `lieu`, `password`, `pass_changed`, `type_utilisateur_id`, `score`, `remember_token`, `created_at`, `updated_at`, `statut`) VALUES
(4, 'RAMANITRA', 'Aro Nomeniaina', 1995, 'Cité 67Ha Sud 426', 'aronoom@gmail.com', 'aro', '0340990222', 'images_users/default.svg', 'GB', 1, 'ENI', '$2y$10$VAZOqPnAzxf9OId0S2UL.OydKUGtzeZ5Q2ax5s7JaKGofZcu.sCea', 1, 3, 5, 'SJBGrQ4Uio6IjIOP2GGX6GrgwXReKe9odSZBNZd38tVqCjNBIVRDPUKJiknU', '2017-09-19 05:31:17', '2017-09-19 12:39:04', '');

-- --------------------------------------------------------

--
-- Structure de la table `user_badget`
--

CREATE TABLE IF NOT EXISTS `user_badget` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `badgets_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_badget_users_id_foreign` (`users_id`),
  KEY `user_badget_badgets_id_foreign` (`badgets_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `user_universite`
--

CREATE TABLE IF NOT EXISTS `user_universite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `universite_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_universite_user_id_foreign` (`user_id`),
  KEY `user_universite_universite_id_foreign` (`universite_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `appareils`
--
ALTER TABLE `appareils`
  ADD CONSTRAINT `appareils_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `appareil_inscrit`
--
ALTER TABLE `appareil_inscrit`
  ADD CONSTRAINT `appareil_inscrit_appareil_id_foreign` FOREIGN KEY (`appareil_id`) REFERENCES `appareils` (`id`),
  ADD CONSTRAINT `appareil_inscrit_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `chapitres`
--
ALTER TABLE `chapitres`
  ADD CONSTRAINT `chapitres_tutoriel_id_foreign` FOREIGN KEY (`tutoriel_id`) REFERENCES `tutoriels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentaires_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `commentaire_tutoriels`
--
ALTER TABLE `commentaire_tutoriels`
  ADD CONSTRAINT `commentaire_tutoriels_tutoriel_id_foreign` FOREIGN KEY (`tutoriel_id`) REFERENCES `tutoriels` (`id`),
  ADD CONSTRAINT `commentaire_tutoriels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `corriges`
--
ALTER TABLE `corriges`
  ADD CONSTRAINT `corriges_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Contraintes pour la table `dossiers`
--
ALTER TABLE `dossiers`
  ADD CONSTRAINT `dossiers_projet_id_foreign` FOREIGN KEY (`projet_id`) REFERENCES `projets` (`id`);

--
-- Contraintes pour la table `exemples`
--
ALTER TABLE `exemples`
  ADD CONSTRAINT `exemples_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);

--
-- Contraintes pour la table `exercices`
--
ALTER TABLE `exercices`
  ADD CONSTRAINT `exercices_type_d_exercice_id_foreign` FOREIGN KEY (`type_d_exercice_id`) REFERENCES `type_d_exercices` (`id`),
  ADD CONSTRAINT `exercices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `forum_type`
--
ALTER TABLE `forum_type`
  ADD CONSTRAINT `forum_type_forum_id_foreign` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`id`),
  ADD CONSTRAINT `forum_type_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `projets`
--
ALTER TABLE `projets`
  ADD CONSTRAINT `projets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_exercice_id_foreign` FOREIGN KEY (`exercice_id`) REFERENCES `exercices` (`id`);

--
-- Contraintes pour la table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `reponses_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  ADD CONSTRAINT `reponses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_chapitre_id_foreign` FOREIGN KEY (`chapitre_id`) REFERENCES `chapitres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `terme_inscrit`
--
ALTER TABLE `terme_inscrit`
  ADD CONSTRAINT `terme_inscrit_terme_id_foreign` FOREIGN KEY (`terme_id`) REFERENCES `termes` (`id`),
  ADD CONSTRAINT `terme_inscrit_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `tutoriels`
--
ALTER TABLE `tutoriels`
  ADD CONSTRAINT `tutoriels_niveau_id_foreign` FOREIGN KEY (`niveau_id`) REFERENCES `niveaus` (`id`),
  ADD CONSTRAINT `tutoriels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tutoriel_type`
--
ALTER TABLE `tutoriel_type`
  ADD CONSTRAINT `tutoriel_type_tutoriel_id_foreign` FOREIGN KEY (`tutoriel_id`) REFERENCES `tutoriels` (`id`),
  ADD CONSTRAINT `tutoriel_type_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_type_utilisateur_id_foreign` FOREIGN KEY (`type_utilisateur_id`) REFERENCES `type_utilisateurs` (`id`);

--
-- Contraintes pour la table `user_badget`
--
ALTER TABLE `user_badget`
  ADD CONSTRAINT `user_badget_badgets_id_foreign` FOREIGN KEY (`badgets_id`) REFERENCES `badgets` (`id`),
  ADD CONSTRAINT `user_badget_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `user_universite`
--
ALTER TABLE `user_universite`
  ADD CONSTRAINT `user_universite_universite_id_foreign` FOREIGN KEY (`universite_id`) REFERENCES `universites` (`id`),
  ADD CONSTRAINT `user_universite_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
