-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 26 Novembre 2024 à 04:39
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `steam`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_commentaire` bigint(20) UNSIGNED NOT NULL,
  `jeu_id` bigint(20) UNSIGNED NOT NULL,
  `usager_id` bigint(20) UNSIGNED NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaire`, `jeu_id`, `usager_id`, `contenu`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Cupiditate autem velit debitis.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(2, 1, 11, 'Numquam eveniet harum quidem pariatur.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(3, 1, 3, 'Consequatur voluptatum aut fugiat doloremque repellendus harum vel aut.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(4, 1, 4, 'Ex et expedita ex aut qui quae animi.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(5, 1, 5, 'Consequuntur veritatis ea iste nulla quos.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(6, 1, 6, 'Consequatur consectetur veritatis qui eum.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(7, 1, 7, 'Et fugiat nostrum sint nesciunt sint odit tenetur.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(8, 1, 8, 'Autem in molestiae possimus id sunt sunt esse libero.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(9, 1, 9, 'Dicta libero veritatis delectus unde libero quis.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(10, 1, 10, 'Omnis iusto aut dolor modi ea voluptatem.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(11, 1, 1, 'Culpa totam dolorum cupiditate.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(12, 2, 2, 'Aspernatur ut molestiae sunt consequatur aliquam.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(13, 2, 11, 'Qui maiores voluptatum qui distinctio repellendus est aut repellendus.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(14, 2, 3, 'Ipsum sit nihil ut consectetur dicta.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(15, 2, 4, 'Cumque provident reiciendis dolore impedit enim cumque blanditiis.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(16, 2, 5, 'Consequatur ab quidem sit.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(17, 2, 6, 'Veniam et nobis ut rem officia ullam.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(18, 2, 7, 'Repudiandae distinctio beatae eos eum non.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(19, 2, 8, 'Et aut quas quasi recusandae harum.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(20, 2, 9, 'In aut et aut impedit qui.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(21, 2, 10, 'Dicta labore asperiores accusamus nisi eum.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(22, 2, 1, 'Et qui quidem porro totam est.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(23, 3, 2, 'Repellat voluptas illum nulla omnis ducimus provident.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(24, 3, 11, 'Reprehenderit deserunt ut qui deleniti.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(25, 3, 3, 'Et qui numquam sunt sapiente aut.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(26, 3, 4, 'Rerum nobis modi omnis recusandae.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(27, 3, 5, 'Soluta veritatis nihil consectetur sed.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(28, 3, 6, 'Deleniti ducimus omnis quis iste ut.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(29, 3, 7, 'Neque ea consequatur eligendi.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(30, 3, 8, 'Commodi beatae distinctio sed.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(31, 3, 9, 'Eos maxime deserunt asperiores quod aliquid.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(32, 3, 10, 'Molestiae quaerat et et beatae odio beatae.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(33, 3, 1, 'Consequuntur laboriosam neque saepe eveniet.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(34, 4, 2, 'Voluptatum omnis excepturi rem delectus sit quam.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(35, 4, 11, 'Doloremque perferendis et commodi dolor vel.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(36, 4, 3, 'Blanditiis molestias tenetur commodi in corrupti quia consectetur.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(37, 4, 4, 'Fuga dicta et itaque est laborum rerum maxime.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(38, 4, 5, 'Et est fuga veritatis ex qui illo odit.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(39, 4, 6, 'Aspernatur inventore enim cumque qui alias.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(40, 4, 7, 'Cum aliquid est necessitatibus non in aliquam.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(41, 4, 8, 'Ad placeat quas unde molestias quis incidunt.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(42, 4, 9, 'Vel dolorum eos pariatur at dolor quas.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(43, 4, 10, 'Voluptatibus aperiam quibusdam quam veritatis nihil.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(44, 4, 1, 'Nobis eos repellendus doloribus qui quo voluptas vitae incidunt.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(45, 5, 2, 'Est consequatur enim voluptatem nemo dolor sapiente quia corporis.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(46, 5, 11, 'Quis omnis impedit et nihil.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(47, 5, 3, 'Esse pariatur nihil odit qui perspiciatis dolorem qui.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(48, 5, 4, 'Quod qui repellendus impedit in dolore dolorum.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(49, 5, 5, 'Quas sed quis modi animi ab laborum non.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(50, 5, 6, 'Architecto illo et et dolorem deserunt.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(51, 5, 7, 'Molestiae id voluptas voluptatem sunt consequatur.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(52, 5, 8, 'Officia consequatur assumenda consequatur quaerat dolores est.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(53, 5, 9, 'Architecto quo saepe aliquid minima et tenetur earum sequi.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(54, 5, 10, 'Magni ad enim sapiente amet ea dolor deserunt.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(55, 5, 1, 'Officia velit excepturi et quia molestiae voluptatum cupiditate.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(56, 6, 2, 'Iusto veritatis assumenda velit non.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(57, 6, 11, 'Magnam consectetur modi ut vero odit rerum maiores.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(58, 6, 3, 'Facere reiciendis alias non explicabo.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(59, 6, 4, 'Adipisci rerum maiores itaque ut minima et.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(60, 6, 5, 'Qui aliquid magni animi.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(61, 6, 6, 'Pariatur at animi ea at nobis consequatur pariatur.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(62, 6, 7, 'Iusto sed iusto in animi nobis nesciunt.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(63, 6, 8, 'Et consectetur velit corporis magnam harum suscipit.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(64, 6, 9, 'Aliquid id aliquid nesciunt dignissimos corporis sunt.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(65, 6, 10, 'Sit necessitatibus quasi voluptatem in.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(66, 6, 1, 'Ratione iure qui est distinctio quaerat voluptate.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(67, 7, 2, 'Velit nemo laborum aut debitis maxime quod in.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(68, 7, 11, 'Unde et rerum ea cumque quidem.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(69, 7, 3, 'Accusantium sit placeat ut quod laborum doloribus nobis in.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(70, 7, 4, 'Saepe consectetur blanditiis impedit consequuntur non fugiat voluptas itaque.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(71, 7, 5, 'Nostrum reprehenderit accusantium doloribus quae ab nisi nobis.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(72, 7, 6, 'Dolor hic quo repudiandae nobis ab.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(73, 7, 7, 'Non nisi et perspiciatis voluptatem consequatur.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(74, 7, 8, 'Ad qui asperiores quod illum ea itaque.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(75, 7, 9, 'Voluptatibus assumenda accusamus aut maiores dolorum unde ut.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(76, 7, 10, 'Eos consequatur nostrum ut facilis commodi.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(77, 7, 1, 'Sed voluptas vel a velit odit et non.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(78, 8, 2, 'Eveniet cumque nesciunt est.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(79, 8, 11, 'Odit perspiciatis quo molestiae voluptatibus.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(80, 8, 3, 'Assumenda fuga dolores et aut esse doloremque accusamus.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(81, 8, 4, 'Rerum quia eos tempora sapiente nam vel.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(82, 8, 5, 'Est autem consequatur doloribus nisi quaerat.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(83, 8, 6, 'Voluptatum soluta nesciunt aut at odio quis illum repellat.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(84, 8, 7, 'Aut dolorem quo esse reiciendis.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(85, 8, 8, 'Officiis enim nulla consequatur quia placeat delectus exercitationem.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(86, 8, 9, 'Soluta et veniam distinctio vel aspernatur illum.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(87, 8, 10, 'Aliquid eaque aut rerum eaque.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(88, 8, 1, 'Id quo occaecati neque eos dignissimos.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(89, 9, 2, 'Iure aut inventore voluptatem veniam est possimus dolores.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(90, 9, 11, 'Laboriosam velit dolorem porro adipisci consequatur porro corporis.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(91, 9, 3, 'Ut illo qui voluptatem amet.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(92, 9, 4, 'Sit iusto accusantium nobis.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(93, 9, 5, 'Aspernatur itaque dolorum sapiente voluptates iusto.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(94, 9, 6, 'Sed omnis sed debitis ut.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(95, 9, 7, 'Nesciunt consequatur laborum rem consequatur.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(96, 9, 8, 'Hic optio inventore provident eius tempore rerum incidunt.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(97, 9, 9, 'Dolor eum minima nemo.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(98, 9, 10, 'Eveniet atque possimus dignissimos est.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(99, 9, 1, 'Voluptas quo deleniti quia provident.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(100, 10, 2, 'Odit impedit ipsam amet quaerat.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(101, 10, 11, 'Asperiores quasi numquam ratione quis ea rem quaerat.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(102, 10, 3, 'Magnam molestias ratione qui autem.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(103, 10, 4, 'Beatae rerum aut qui dolores.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(104, 10, 5, 'Non alias dolorem possimus et maiores.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(105, 10, 6, 'Sequi rerum perferendis dolore maiores ut animi.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(106, 10, 7, 'Nulla dolor voluptatem eos fuga.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(107, 10, 8, 'Autem velit fuga voluptatem qui possimus temporibus.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(108, 10, 9, 'Odio ipsum ut cupiditate voluptatem tempore et.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(109, 10, 10, 'Est dolorum totam aut.', '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(110, 10, 1, 'Qui sit et consequatur alias sed unde.', '2024-11-26 09:35:19', '2024-11-26 09:35:19');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `titre`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Programmation Orientée Objet', 'Introduction aux concepts de la POO avec des exemples en Java.', NULL, NULL),
(2, 'Développement Web', 'Création d\'applications web avec HTML, CSS, JavaScript, et PHP.', NULL, NULL),
(3, 'Base de Données', 'Concepts fondamentaux des bases de données relationnelles avec SQL.', NULL, NULL),
(4, 'Réalité Virtuelle', 'Exploration des technologies de la réalité virtuelle et augmentée.', NULL, NULL),
(5, 'Intelligence Artificielle', 'Introduction aux algorithmes d\'apprentissage automatique.', NULL, NULL),
(6, 'Programmation de Jeux Vidéo', 'Apprentissage de la conception et du développement de jeux vidéo avec Unity et Unreal Engine.', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `id_groupe` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `groupes`
--

INSERT INTO `groupes` (`id_groupe`, `nom`, `created_at`, `updated_at`) VALUES
(202400001, 'Groupe 01', NULL, NULL),
(202400002, 'Groupe 02', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `groupe_cours`
--

CREATE TABLE `groupe_cours` (
  `groupe_id` bigint(20) UNSIGNED NOT NULL,
  `cours_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `groupe_cours`
--

INSERT INTO `groupe_cours` (`groupe_id`, `cours_id`) VALUES
(202400001, 2),
(202400001, 4),
(202400002, 1),
(202400002, 5);

-- --------------------------------------------------------

--
-- Structure de la table `groupe_etudiants`
--

CREATE TABLE `groupe_etudiants` (
  `groupe_id` bigint(20) UNSIGNED NOT NULL,
  `usager_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `groupe_etudiants`
--

INSERT INTO `groupe_etudiants` (`groupe_id`, `usager_id`) VALUES
(202400001, 2),
(202400001, 3),
(202400002, 4),
(202400001, 5),
(202400001, 6),
(202400001, 7),
(202400002, 8),
(202400001, 9),
(202400002, 10),
(202400001, 11);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id_image` bigint(20) UNSIGNED NOT NULL,
  `jeu_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id_image`, `jeu_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://library.sportingnews.com/styles/twitter_card_120x120/s3/2024-07/EA_FC25_Standard_KeyArt_16-9_3840x2160_Hypermotion.png?itok=_ZwywqKG', NULL, NULL),
(2, 1, 'https://assets-prd.ignimgs.com/2024/07/17/fc25-6-1721220696241.jpg', NULL, NULL),
(3, 1, 'https://image.api.playstation.com/vulcan/ap/rnd/202407/1814/ad53de47262b4bd4bf41f1f62f7feb40095b7716e26a3d1c.jpg', NULL, NULL),
(4, 2, 'https://computercity.com/wp-content/uploads/helldivers-2-logo.webp', NULL, NULL),
(5, 2, 'https://i.ytimg.com/vi/N6F_aVqXuwU/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLB06V2lE1d3Uem3WgzTbfZCyW6P3g', NULL, NULL),
(6, 2, 'https://newsboilerstorage.blob.core.windows.net/news/2601328_0_lg.jpg', NULL, NULL),
(7, 3, 'https://upload.wikimedia.org/wikipedia/en/b/b6/Ghost_of_Tsushima.jpg', NULL, NULL),
(8, 3, 'https://i.pinimg.com/originals/37/bb/83/37bb83db16c56bb5a645ed899c9c70a0.jpg', NULL, NULL),
(9, 3, 'https://gameranx.com/wp-content/uploads/2018/09/Ghost-of-Tsushima-4K-Wallpaper.jpg', NULL, NULL),
(10, 4, 'https://assets.nintendo.com/image/upload/ar_16:9,b_auto:border,c_lpad/b_white/f_auto/q_auto/dpr_1.5/c_scale,w_400/ncom/software/switch/70010000072957/9f5e069de49fa3644732f1c7073dea13a059a86e433da60e042d4f0f35b165bb', NULL, NULL),
(11, 4, 'https://static.wikia.nocookie.net/siivagunner/images/5/5d/Paper_Mario-_The_Thousand-Year_Door.jpg/revision/latest?cb=20170426081740', NULL, NULL),
(12, 4, 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/89583cf7-eb5d-471b-9090-73b13095aa22/dd0alot-62d47c65-13ae-411f-b205-b3eebc49b521.png/v1/fill/w_1280,h_1351,q_80,strp/paper_mario__the_thousand_year_door_by_muzyoshi_dd0alot-fullview.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTM1MSIsInBhdGgiOiJcL2ZcLzg5NTgzY2Y3LWViNWQtNDcxYi05MDkwLTczYjEzMDk1YWEyMlwvZGQwYWxvdC02MmQ0N2M2NS0xM2FlLTQxMWYtYjIwNS1iM2VlYmM0OWI1MjEucG5nIiwid2lkdGgiOiI8PTEyODAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.yS2nZAnbMoCTN9XAmHOa8BWvzQTLP2-xhkPHhwiREVk', NULL, NULL),
(13, 5, 'https://wallpapercave.com/wp/wp13468259.jpg', NULL, NULL),
(14, 5, 'https://i.ytimg.com/vi/QkHoZuz6Gtw/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLCpo_9J1sJXx8VhmzJvAKIZoEGW7Q', NULL, NULL),
(15, 5, 'https://static0.gamerantimages.com/wordpress/wp-content/uploads/2024/09/dragon-s-dogma-2-screenshot.jpg', NULL, NULL),
(16, 6, 'https://assets.nintendo.com/image/upload/q_auto/f_auto/ncom/software/switch/70010000057921/8a2cf8574961a349dc14f97c394d186ab1191b6e99682ddbe10fd4455c7197e1', NULL, NULL),
(17, 6, 'https://staticctf.ubisoft.com/J3yJr34U2pZ2Ieem48Dwy9uqj5PNUQTn/2vdIrNkwP2H2Ot8rlRDkxa/c12db3c47a6b7072bb50018551fc3d02/Combat-Forest-Warriors-_Autumnal-forest_1920x1080.jpg', NULL, NULL),
(18, 6, 'https://www.agamingnetwork.com/content/images/size/w2000/2024/09/prince-of-persia-the-lost-crown-mask-of-darkness.webp', NULL, NULL),
(19, 7, 'https://blz-contentstack-images.akamaized.net/v3/assets/blt3452e3b114fab0cd/bltfe141d746912b801/65383ad0ade0dcb1ef2ca2a9/Open_Graph_-_Ceviche.jpg', NULL, NULL),
(20, 7, 'https://overgear.com/guides/wp-content/uploads/2024/07/world-of-warcraft-the-war-within-tier-sets-825x510.jpeg', NULL, NULL),
(21, 7, 'https://wow.zamimg.com/uploads/screenshots/normal/1182981.jpg', NULL, NULL),
(22, 8, 'https://gaming-cdn.com/images/news/articles/3444/cover/1000x563/les-precommandes-du-remake-de-silent-hill-2-commencent-a-ouvrir-cover6544c8582194f.jpg', NULL, NULL),
(23, 8, 'https://pbs.twimg.com/media/GO3EuM0a4AAd4DL?format=png&name=4096x4096', NULL, NULL),
(24, 8, 'https://cdn.mos.cms.futurecdn.net/XrXVDRaNtXkjBEigZ3ZrNY.jpg', NULL, NULL),
(25, 9, 'https://image.api.playstation.com/vulcan/ap/rnd/202311/2801/803e41fee0edf8f8ed1de518e6eac60ddf30ac485b9a16a2.png', NULL, NULL),
(26, 9, 'https://i.ytimg.com/vi/Jl1Q2F_FPjo/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLA-_ccsK6hcHtwt5MJma4vPKoMzkw', NULL, NULL),
(27, 9, 'https://i.ytimg.com/vi/o6mactKp69U/hq720.jpg?v=671f3d5e&sqp=CMCu_bgG-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLDZf6ZF3rmzH8TUzNJbRjHAsmY7Pg', NULL, NULL),
(28, 10, 'https://cmsassets.rgpub.io/sanity/images/dsfx7636/news_live/3705653167ef8f43acdc03fb2f0a469d5b3086fd-1920x1080.jpg', NULL, NULL),
(29, 10, 'https://i.pinimg.com/originals/64/fd/9b/64fd9b859172e0ed330da354b854b4b8.jpg', NULL, NULL),
(30, 10, 'https://i.ytimg.com/vi/oOYb7vZU_mU/maxresdefault.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id_jeu` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `taille` int(11) NOT NULL,
  `realisateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `jeux`
--

INSERT INTO `jeux` (`id_jeu`, `titre`, `description`, `taille`, `realisateur`, `categorie`, `zip`, `created_at`, `updated_at`) VALUES
(1, 'EA Sports FC 25', 'Jeu de simulation de football très réaliste.', 50, 'EA Sports', 'Sport', 'EA25.zip', NULL, NULL),
(2, 'Helldivers 2', 'Jeu de tir coopératif dans un univers galactique.', 35, 'Arrowhead Game Studios', 'Action', 'helldivers2.zip', NULL, NULL),
(3, 'Ghost of Tsushima', 'Jeu d\'action-aventure inspiré du Japon féodal.', 40, 'Sucker Punch Productions', 'Aventure', 'GhostofTsushima.zip', NULL, NULL),
(4, 'Paper Mario: The Thousand-Year Door', 'Un RPG coloré mettant en scène Mario.', 3, 'Intelligent Systems', 'RPG', 'papermario.zip', NULL, NULL),
(5, 'Dragon\'s Dogma 2', 'Jeu d\'action RPG avec un monde ouvert immersif.', 50, 'Capcom', 'RPG', 'dragonsdogma2.zip', NULL, NULL),
(6, 'Prince of Persia: The Lost Crown', 'Retour de la célèbre série Prince of Persia.', 25, 'Ubisoft', 'Aventure', 'princeofpersia.zip', NULL, NULL),
(7, 'World of Warcraft: The War Within', 'Nouvelle extension du MMORPG légendaire.', 70, 'Blizzard Entertainment', 'MMORPG', 'wow.zip', NULL, NULL),
(8, 'Fortnite', 'Jeu de battle royale très populaire.', 40, 'Epic Games', 'Battle Royale', 'Fortnite.zip', NULL, NULL),
(9, 'The Plucky Squire', 'Jeu d\'aventure avec des transitions entre 2D et 3D.', 10, 'Devolver Digital', 'Aventure', 'pluckysquire.zip', NULL, NULL),
(10, 'League of Legends', 'MOBA très compétitif avec une grande communauté.', 15, 'Riot Games', 'MOBA', 'LOL.zip', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '0001_01_01_000000_create_users_table', 1),
(17, '0001_01_01_000001_create_cache_table', 1),
(18, '0001_01_01_000002_create_jobs_table', 1),
(19, '2024_10_28_121404_create_jeux_table', 1),
(20, '2024_10_28_143113_create_usagers_table', 1),
(21, '2024_10_28_143516_create_groupes_table', 1),
(22, '2024_10_28_143531_create_cours_table', 1),
(23, '2024_10_28_143628_create_images_table', 1),
(24, '2024_10_28_225255_create_videos_table', 1),
(25, '2024_10_28_225841_create_commentaires_table', 1),
(26, '2024_10_28_230117_create_ratings_table', 1),
(27, '2024_10_28_230141_create_groupe_cours_table', 1),
(28, '2024_10_28_230154_create_groupe_etudiants_table', 1),
(29, '2024_11_07_181659_add_realisateur_to_jeux_table', 1),
(30, '2024_11_07_183327_add_realisateur_to_jeux_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `id_rating` bigint(20) UNSIGNED NOT NULL,
  `jeu_id` bigint(20) UNSIGNED NOT NULL,
  `usager_id` bigint(20) UNSIGNED NOT NULL,
  `note` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `ratings`
--

INSERT INTO `ratings` (`id_rating`, `jeu_id`, `usager_id`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(2, 1, 3, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(3, 1, 4, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(4, 1, 5, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(5, 1, 6, 2, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(6, 1, 7, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(7, 1, 8, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(8, 1, 9, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(9, 1, 10, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(10, 1, 11, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(11, 2, 2, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(12, 2, 3, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(13, 2, 4, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(14, 2, 5, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(15, 2, 6, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(16, 2, 7, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(17, 2, 8, 2, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(18, 2, 9, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(19, 2, 10, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(20, 2, 11, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(21, 3, 2, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(22, 3, 3, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(23, 3, 4, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(24, 3, 5, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(25, 3, 6, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(26, 3, 7, 2, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(27, 3, 8, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(28, 3, 9, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(29, 3, 10, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(30, 3, 11, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(31, 4, 2, 2, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(32, 4, 3, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(33, 4, 4, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(34, 4, 5, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(35, 4, 6, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(36, 4, 7, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(37, 4, 8, 2, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(38, 4, 9, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(39, 4, 10, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(40, 4, 11, 2, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(41, 5, 2, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(42, 5, 3, 2, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(43, 5, 4, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(44, 5, 5, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(45, 5, 6, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(46, 5, 7, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(47, 5, 8, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(48, 5, 9, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(49, 5, 10, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(50, 5, 11, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(51, 6, 2, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(52, 6, 3, 2, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(53, 6, 4, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(54, 6, 5, 2, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(55, 6, 6, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(56, 6, 7, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(57, 6, 8, 2, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(58, 6, 9, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(59, 6, 10, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(60, 6, 11, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(61, 7, 2, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(62, 7, 3, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(63, 7, 4, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(64, 7, 5, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(65, 7, 6, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(66, 7, 7, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(67, 7, 8, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(68, 7, 9, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(69, 7, 10, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(70, 7, 11, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(71, 8, 2, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(72, 8, 3, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(73, 8, 4, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(74, 8, 5, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(75, 8, 6, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(76, 8, 7, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(77, 8, 8, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(78, 8, 9, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(79, 8, 10, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(80, 8, 11, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(81, 9, 2, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(82, 9, 3, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(83, 9, 4, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(84, 9, 5, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(85, 9, 6, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(86, 9, 7, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(87, 9, 8, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(88, 9, 9, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(89, 9, 10, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(90, 9, 11, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(91, 10, 2, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(92, 10, 3, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(93, 10, 4, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(94, 10, 5, 1, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(95, 10, 6, 4, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(96, 10, 7, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(97, 10, 8, 3, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(98, 10, 9, 2, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(99, 10, 10, 2, '2024-11-26 09:35:19', '2024-11-26 09:35:19'),
(100, 10, 11, 5, '2024-11-26 09:35:19', '2024-11-26 09:35:19');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `usagers`
--

CREATE TABLE `usagers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matricule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_usager` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `usagers`
--

INSERT INTO `usagers` (`id`, `matricule`, `type_usager`, `email`, `mdp`, `programme`, `nom`, `prenom`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'P12345', 'professeur', 'fgillet@example.net', '$2y$12$sHNyIL0LXZDCxcMzaXsByuZmxrglgOlNm1BCrrf2wnj0vQGWNOwMK', NULL, 'Moulin', 'Corinne', NULL, NULL, NULL),
(2, 'E0001', 'étudiant', 'lambert.william@example.net', '$2y$12$mmtx/GQhuBR1an7PI5YLc.R8MFoOP9Y.dZWJ2tfAr50Zgjey0UDaq', 'Informatique', 'Guibert', 'Marianne', NULL, NULL, NULL),
(3, 'E0002', 'étudiant', 'colette29@example.org', '$2y$12$6WpLCaUDQTJR2I.WvlLY/eb3uOUusL.lKuNe2ENBAhc2lhT1CstlS', 'Informatique', 'Barbe', 'Michel', NULL, NULL, NULL),
(4, 'E0003', 'étudiant', 'denise69@example.org', '$2y$12$nfc.Ajvb1n8uty6ttTKPuOxkbtLMNdpNrJHG/eVxtKpCfwe5G8Om6', 'Physique', 'Monnier', 'Camille', NULL, NULL, NULL),
(5, 'E0004', 'étudiant', 'paulette61@example.com', '$2y$12$A8mzqtKAiBoBq6N2alSepe.W/QOfyog5t/8VgK7J9VVAEOfYVj52m', 'Physique', 'Rossi', 'Michelle', NULL, NULL, NULL),
(6, 'E0005', 'étudiant', 'legoff.robert@example.org', '$2y$12$T/FEY6pMqzb2n5gepBs8CuiJaLWdQVUUmT588GqejGskZbvr60kP.', 'Informatique', 'Mahe', 'Suzanne', NULL, NULL, NULL),
(7, 'E0006', 'étudiant', 'emerle@example.org', '$2y$12$f2KTZegR8kYfGuZXHEYuieZYwynmZjAoFn0etrrXPGklLHZSLgQEO', 'Physique', 'Louis', 'Henri', NULL, NULL, NULL),
(8, 'E0007', 'étudiant', 'llecoq@example.net', '$2y$12$SeYrtGTBGo8mL5ljQSH1bOoLhY/AIr/BmVGGbU0N.44nlo3e/Dm8m', 'Informatique', 'Jourdan', 'Frédérique', NULL, NULL, NULL),
(9, 'E0008', 'étudiant', 'bbouvet@example.org', '$2y$12$AKaeflzE8KULpG3Qg/WE7.LSUkCzfgwQ26C.QK0bEp6txiykj8DYq', 'Informatique', 'Lesage', 'Stéphane', NULL, NULL, NULL),
(10, 'E0009', 'étudiant', 'cnavarro@example.org', '$2y$12$K3X.VDsVYXbB2EN7dMCPcu2lW4flnsNaat.Fawjz6N2ARngZvTyS2', 'Informatique', 'Navarro', 'Nathalie', NULL, NULL, NULL),
(11, 'E00010', 'étudiant', 'nathalie73@example.net', '$2y$12$cMr/ux6hANzjA0wvfmLDFegwxv6ufcCWymMw1.L63Pglu6O5Sw0F2', 'Physique', 'Mathieu', 'Alexandre', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `videos`
--

CREATE TABLE `videos` (
  `id_video` bigint(20) UNSIGNED NOT NULL,
  `jeu_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `videos`
--

INSERT INTO `videos` (`id_video`, `jeu_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://www.youtube.com/watch?v=pBM2xyco_Kg&ab_channel=EASPORTSFC', NULL, NULL),
(2, 1, 'https://www.youtube.com/watch?v=xPS0bI_Q4BU&ab_channel=EASPORTSFC', NULL, NULL),
(3, 1, 'https://www.youtube.com/watch?v=DHVbocAoi5E&ab_channel=Noori', NULL, NULL),
(4, 2, 'https://www.youtube.com/watch?v=d645kJwc2s4&ab_channel=PlayStationFrance', NULL, NULL),
(5, 2, 'https://www.youtube.com/watch?v=p0qyRzK3LUo&ab_channel=PlayStationFrance', NULL, NULL),
(6, 2, 'https://www.youtube.com/watch?v=rE7KTE28HrA&ab_channel=PlayStation', NULL, NULL),
(7, 3, 'https://www.youtube.com/watch?v=iqysmS4lxwQ&ab_channel=IGN', NULL, NULL),
(8, 3, 'https://www.youtube.com/watch?v=nVhXp6FX7Y4&ab_channel=DKGames', NULL, NULL),
(9, 3, 'https://www.youtube.com/watch?v=L8N0p0nJltg&ab_channel=FilmsActu', NULL, NULL),
(10, 4, 'https://www.youtube.com/watch?v=sVCFBZl_RE4&ab_channel=NintendoFrance', NULL, NULL),
(11, 4, 'https://www.youtube.com/watch?v=hKNUcwXeZCc&ab_channel=JV-JeuxVid%C3%A9o', NULL, NULL),
(12, 4, 'https://www.youtube.com/watch?v=1wKxcIY8gnU&ab_channel=NintendoFrance', NULL, NULL),
(13, 5, 'https://www.youtube.com/watch?v=cT0rIgaiPWA&ab_channel=PlayStation', NULL, NULL),
(14, 5, 'https://www.youtube.com/watch?v=FSjOtp3QbiQ&ab_channel=PlayStation', NULL, NULL),
(15, 5, 'https://www.youtube.com/watch?v=8dt1S_QUBYw&ab_channel=CapcomUSA', NULL, NULL),
(16, 6, 'https://www.youtube.com/watch?v=MmX7a_e65uU&ab_channel=Ubisoft', NULL, NULL),
(17, 6, 'https://www.youtube.com/watch?v=I-ra1bksSzs&ab_channel=IGN', NULL, NULL),
(18, 6, 'https://www.youtube.com/watch?v=ZVZirQWSlD4&ab_channel=Ubisoft', NULL, NULL),
(19, 7, 'https://www.youtube.com/watch?v=tBBEt8gfXks&ab_channel=WorldofWarcraft', NULL, NULL),
(20, 7, 'https://www.youtube.com/watch?v=2BAG-G-qz_Y&ab_channel=WorldofWarcraft', NULL, NULL),
(21, 7, 'https://www.youtube.com/watch?v=HjOuuo8awwg&ab_channel=WorldofWarcraftLatAm', NULL, NULL),
(22, 8, 'https://www.youtube.com/watch?v=0fRBmXtfo_8&ab_channel=Fortnite', NULL, NULL),
(23, 8, 'https://www.youtube.com/watch?v=5uE0XFJSVZA&ab_channel=Fortnite', NULL, NULL),
(24, 8, 'https://www.youtube.com/watch?v=g909vB-BSXo&ab_channel=Fortnite', NULL, NULL),
(25, 9, 'https://www.youtube.com/watch?v=Sxv072ksoMU&ab_channel=PlayStation', NULL, NULL),
(26, 9, 'https://www.youtube.com/watch?v=4DpvZWrts_M&ab_channel=DevolverDigital', NULL, NULL),
(27, 9, 'https://www.youtube.com/watch?v=0NHBiAp_DwM&ab_channel=PlayStation', NULL, NULL),
(28, 10, 'https://www.youtube.com/watch?v=ZHhqwBwmRkI&ab_channel=LeagueofLegends', NULL, NULL),
(29, 10, 'https://www.youtube.com/watch?v=76cG7bcmmqM&ab_channel=LeagueofLegends', NULL, NULL),
(30, 10, 'https://www.youtube.com/watch?v=pNjWjwae-us&ab_channel=LeagueofLegends%3AWildRift', NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `commentaires_jeu_id_foreign` (`jeu_id`),
  ADD KEY `commentaires_usager_id_foreign` (`usager_id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Index pour la table `groupe_cours`
--
ALTER TABLE `groupe_cours`
  ADD KEY `groupe_cours_groupe_id_foreign` (`groupe_id`),
  ADD KEY `groupe_cours_cours_id_foreign` (`cours_id`);

--
-- Index pour la table `groupe_etudiants`
--
ALTER TABLE `groupe_etudiants`
  ADD KEY `groupe_etudiants_groupe_id_foreign` (`groupe_id`),
  ADD KEY `groupe_etudiants_usager_id_foreign` (`usager_id`);

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `images_jeu_id_foreign` (`jeu_id`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id_jeu`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `ratings_jeu_id_foreign` (`jeu_id`),
  ADD KEY `ratings_usager_id_foreign` (`usager_id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `usagers`
--
ALTER TABLE `usagers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usagers_matricule_unique` (`matricule`),
  ADD UNIQUE KEY `usagers_email_unique` (`email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `videos_jeu_id_foreign` (`jeu_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_commentaire` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id_groupe` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202400003;
--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id_image` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id_jeu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_rating` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT pour la table `usagers`
--
ALTER TABLE `usagers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `videos`
--
ALTER TABLE `videos`
  MODIFY `id_video` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_jeu_id_foreign` FOREIGN KEY (`jeu_id`) REFERENCES `jeux` (`id_jeu`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentaires_usager_id_foreign` FOREIGN KEY (`usager_id`) REFERENCES `usagers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `groupe_cours`
--
ALTER TABLE `groupe_cours`
  ADD CONSTRAINT `groupe_cours_cours_id_foreign` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id_cours`) ON DELETE CASCADE,
  ADD CONSTRAINT `groupe_cours_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id_groupe`) ON DELETE CASCADE;

--
-- Contraintes pour la table `groupe_etudiants`
--
ALTER TABLE `groupe_etudiants`
  ADD CONSTRAINT `groupe_etudiants_groupe_id_foreign` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id_groupe`) ON DELETE CASCADE,
  ADD CONSTRAINT `groupe_etudiants_usager_id_foreign` FOREIGN KEY (`usager_id`) REFERENCES `usagers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_jeu_id_foreign` FOREIGN KEY (`jeu_id`) REFERENCES `jeux` (`id_jeu`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_jeu_id_foreign` FOREIGN KEY (`jeu_id`) REFERENCES `jeux` (`id_jeu`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_usager_id_foreign` FOREIGN KEY (`usager_id`) REFERENCES `usagers` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_jeu_id_foreign` FOREIGN KEY (`jeu_id`) REFERENCES `jeux` (`id_jeu`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/*VUE Groupe */
CREATE VIEW vue_groupes_usagers AS
SELECT
    g.id_groupe,
    g.nom AS nom_groupe,
    u.id AS usager_id,
    u.nom AS nom_usager,
    u.prenom AS prenom_usager,
    u.matricule,
    u.programme,
    u.type_usager
FROM groupes g
INNER JOIN groupe_etudiants ge ON ge.groupe_id = g.id_groupe
INNER JOIN usagers u ON u.id = ge.usager_id;

SELECT * FROM vue_groupes_usagers;
