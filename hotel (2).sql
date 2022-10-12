-- Adminer 4.8.1 MySQL 8.0.17 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `attribute_chambre`;
CREATE TABLE `attribute_chambre` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `chambre_id` bigint(20) unsigned NOT NULL,
  `attribute_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute_chambre_chambre_id_foreign` (`chambre_id`),
  KEY `attribute_chambre_attribute_id_foreign` (`attribute_id`),
  CONSTRAINT `attribute_chambre_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `attribute_chambre_chambre_id_foreign` FOREIGN KEY (`chambre_id`) REFERENCES `chambres` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `attributes`;
CREATE TABLE `attributes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `chambres`;
CREATE TABLE `chambres` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(20,2) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `niveau_chambre` smallint(6) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chambres_name_unique` (`name`),
  UNIQUE KEY `chambres_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `chambres` (`id`, `name`, `description`, `price`, `published`, `slug`, `thumbnail_img`, `created_at`, `updated_at`, `niveau_chambre`, `quantity`) VALUES
(1,	'chambre standard premier étage',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat aspernaturvitae qui possimus, ratione facilis accusamus omnis reprehenderit incidunt eveniet rerum iure quo fugiat laborum provident aliquid architecto voluptas quidem.',	500000.00,	1,	'premiere-chambre',	'/assets/img/2C1S/2C1S 03.png',	'2022-09-30 11:10:14',	'2022-09-30 11:10:18',	1,	5),
(3,	'chambre confort premier étage',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat aspernaturvitae qui possimus, ratione facilis accusamus omnis reprehenderit incidunt eveniet rerum iure quo fugiat laborum provident aliquid architecto voluptas quidem.',	1500000.00,	1,	'\"-chambre -salon',	'/assets/img/3C1S BAS 02.png',	'2022-09-30 11:10:14',	'2022-09-30 11:10:18',	1,	5),
(4,	'Chambre standard deuxième étage',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat aspernaturvitae qui possimus, ratione facilis accusamus omnis reprehenderit incidunt eveniet rerum iure quo fugiat laborum provident aliquid architecto voluptas quidem.',	750000.00,	1,	'chambre-salon-deuxieme-etage',	'/assets/img/CS2E/CS2E. 01.png',	'2022-09-30 11:10:14',	'2022-09-30 11:10:18',	2,	5),
(5,	'Chambre confort deuxième étage',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat aspernaturvitae qui possimus, ratione facilis accusamus omnis reprehenderit incidunt eveniet rerum iure quo fugiat laborum provident aliquid architecto voluptas quidem.',	2000000.00,	1,	'3-chambre-salon-deuxieme-etage',	'/assets/img/3C1S/3C1S 01.png',	'2022-09-30 11:10:14',	'2022-09-30 11:10:18',	2,	5);

DROP TABLE IF EXISTS `cotations`;
CREATE TABLE `cotations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateDebut` datetime NOT NULL,
  `nombreParticipant` int(10) unsigned NOT NULL,
  `hebergement` tinyint(1) NOT NULL,
  `commentaire` text COLLATE utf8mb4_unicode_ci,
  `evenement_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cotations_evenement_id_foreign` (`evenement_id`),
  CONSTRAINT `cotations_evenement_id_foreign` FOREIGN KEY (`evenement_id`) REFERENCES `evenements` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `evenements`;
CREATE TABLE `evenements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `prix` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `methode_payements`;
CREATE TABLE `methode_payements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2022_09_28_095519_create_chambres_table',	1),
(6,	'2022_09_29_120604_create_photos_table',	1),
(7,	'2022_10_07_125852_add_new_informations_to_chambres',	2),
(8,	'2022_10_07_130221_create_attributes_table',	2),
(9,	'2022_10_07_130644_create_attribute_chambre_table',	2),
(10,	'2022_10_07_133418_create_methode_payements_table',	3),
(11,	'2022_10_07_134845_create_reservations_table',	3),
(12,	'2022_10_07_140701_create_reductions_table',	3),
(13,	'2022_10_07_210212_create_evenements_table',	3),
(14,	'2022_10_07_212405_create_cotations_table',	3);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `chambre_id` bigint(20) unsigned NOT NULL,
  `fille_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photos_chambre_id_foreign` (`chambre_id`),
  CONSTRAINT `photos_chambre_id_foreign` FOREIGN KEY (`chambre_id`) REFERENCES `chambres` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `photos` (`id`, `chambre_id`, `fille_name`, `created_at`, `updated_at`) VALUES
(1,	1,	'/assets/img/2C1S/2C1S 03.png',	'2022-10-09 18:41:05',	'2022-10-09 18:41:05'),
(4,	3,	'/assets/img/3C1S BAS 02.png',	NULL,	NULL),
(5,	4,	'/assets/img/CS2E/CS2E. 01.png',	'2022-10-09 18:43:10',	'2022-10-09 18:43:10'),
(6,	5,	'/assets/img/3C1S/3C1S 01.png',	'2022-10-09 18:44:41',	'2022-10-09 18:44:41');

DROP TABLE IF EXISTS `reductions`;
CREATE TABLE `reductions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `duree` int(10) unsigned NOT NULL,
  `pourcentage` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dateDebut` datetime NOT NULL,
  `dateFin` datetime NOT NULL,
  `motant` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `chambre_id` bigint(20) unsigned NOT NULL,
  `methodePayement_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reservations_user_id_foreign` (`user_id`),
  KEY `reservations_chambre_id_foreign` (`chambre_id`),
  KEY `reservations_methodepayement_id_foreign` (`methodePayement_id`),
  CONSTRAINT `reservations_chambre_id_foreign` FOREIGN KEY (`chambre_id`) REFERENCES `chambres` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `reservations_methodepayement_id_foreign` FOREIGN KEY (`methodePayement_id`) REFERENCES `methode_payements` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2022-10-09 19:15:29
