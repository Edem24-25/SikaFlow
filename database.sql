-- =====================================================
-- SikaFlow — Base de données MySQL
-- Généré automatiquement à partir des migrations Laravel
-- =====================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+01:00";

-- --------------------------------------------------------
-- Table: users
-- --------------------------------------------------------
CREATE TABLE `users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `telephone` VARCHAR(255) NOT NULL,
  `telephone_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `otp_code` VARCHAR(255) NULL DEFAULT NULL,
  `otp_expires_at` TIMESTAMP NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` VARCHAR(255) NOT NULL DEFAULT 'user',
  `status` VARCHAR(255) NOT NULL DEFAULT 'actif',
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_telephone_unique` (`telephone`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: password_reset_tokens
-- --------------------------------------------------------
CREATE TABLE `password_reset_tokens` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: sessions
-- --------------------------------------------------------
CREATE TABLE `sessions` (
  `id` VARCHAR(255) NOT NULL,
  `user_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `ip_address` VARCHAR(45) NULL DEFAULT NULL,
  `user_agent` TEXT NULL DEFAULT NULL,
  `payload` LONGTEXT NOT NULL,
  `last_activity` INT NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: cache
-- --------------------------------------------------------
CREATE TABLE `cache` (
  `key` VARCHAR(255) NOT NULL,
  `value` MEDIUMTEXT NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: cache_locks
-- --------------------------------------------------------
CREATE TABLE `cache_locks` (
  `key` VARCHAR(255) NOT NULL,
  `owner` VARCHAR(255) NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: jobs
-- --------------------------------------------------------
CREATE TABLE `jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` VARCHAR(255) NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `attempts` TINYINT UNSIGNED NOT NULL,
  `reserved_at` INT UNSIGNED NULL DEFAULT NULL,
  `available_at` INT UNSIGNED NOT NULL,
  `created_at` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: failed_jobs
-- --------------------------------------------------------
CREATE TABLE `failed_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: creanciers
-- --------------------------------------------------------
CREATE TABLE `creanciers` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) NOT NULL DEFAULT 'banque',
  `telephone` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `adresse` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: moyen_paiements
-- --------------------------------------------------------
CREATE TABLE `moyen_paiements` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `operateur` VARCHAR(255) NOT NULL,
  `numero` VARCHAR(255) NOT NULL,
  `titulaire` VARCHAR(255) NOT NULL,
  `is_default` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `moyen_paiements_user_id_index` (`user_id`),
  CONSTRAINT `moyen_paiements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: prets
-- --------------------------------------------------------
CREATE TABLE `prets` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `creancier_id` BIGINT UNSIGNED NOT NULL,
  `moyen_paiement_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `reference` VARCHAR(255) NOT NULL,
  `montant_principal` DECIMAL(14,2) NOT NULL,
  `taux_interet` DECIMAL(5,2) NOT NULL DEFAULT 0,
  `duree_mois` INT UNSIGNED NOT NULL,
  `periodicite` VARCHAR(255) NOT NULL DEFAULT 'mensuelle',
  `date_debut` DATE NOT NULL,
  `statut` VARCHAR(255) NOT NULL DEFAULT 'actif',
  `prelevement_auto` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `prets_reference_unique` (`reference`),
  KEY `prets_user_id_index` (`user_id`),
  KEY `prets_creancier_id_index` (`creancier_id`),
  KEY `prets_moyen_paiement_id_index` (`moyen_paiement_id`),
  CONSTRAINT `prets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `prets_creancier_id_foreign` FOREIGN KEY (`creancier_id`) REFERENCES `creanciers` (`id`),
  CONSTRAINT `prets_moyen_paiement_id_foreign` FOREIGN KEY (`moyen_paiement_id`) REFERENCES `moyen_paiements` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: echeances
-- --------------------------------------------------------
CREATE TABLE `echeances` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pret_id` BIGINT UNSIGNED NOT NULL,
  `numero` INT UNSIGNED NOT NULL,
  `date_echeance` DATE NOT NULL,
  `montant` DECIMAL(14,2) NOT NULL,
  `statut` VARCHAR(255) NOT NULL DEFAULT 'a_venir',
  `paiement_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `echeances_pret_id_index` (`pret_id`),
  CONSTRAINT `echeances_pret_id_foreign` FOREIGN KEY (`pret_id`) REFERENCES `prets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: abonnements
-- --------------------------------------------------------
CREATE TABLE `abonnements` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `moyen_paiement_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `libelle` VARCHAR(255) NOT NULL,
  `fournisseur` VARCHAR(255) NULL DEFAULT NULL,
  `montant` DECIMAL(12,2) NOT NULL,
  `periodicite` VARCHAR(255) NOT NULL DEFAULT 'mensuelle',
  `prochaine_echeance` DATE NOT NULL,
  `statut` VARCHAR(255) NOT NULL DEFAULT 'actif',
  `prelevement_auto` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `abonnements_user_id_index` (`user_id`),
  KEY `abonnements_moyen_paiement_id_index` (`moyen_paiement_id`),
  CONSTRAINT `abonnements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `abonnements_moyen_paiement_id_foreign` FOREIGN KEY (`moyen_paiement_id`) REFERENCES `moyen_paiements` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: paiements
-- --------------------------------------------------------
CREATE TABLE `paiements` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `echeance_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `abonnement_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `moyen_paiement_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `reference_transaction` VARCHAR(255) NOT NULL,
  `passerelle` VARCHAR(255) NOT NULL,
  `montant` DECIMAL(14,2) NOT NULL,
  `statut` VARCHAR(255) NOT NULL DEFAULT 'en_attente',
  `mode` VARCHAR(255) NOT NULL DEFAULT 'manuel',
  `payload` JSON NULL DEFAULT NULL,
  `paid_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `paiements_reference_transaction_unique` (`reference_transaction`),
  KEY `paiements_user_id_index` (`user_id`),
  KEY `paiements_echeance_id_index` (`echeance_id`),
  KEY `paiements_abonnement_id_index` (`abonnement_id`),
  KEY `paiements_moyen_paiement_id_index` (`moyen_paiement_id`),
  CONSTRAINT `paiements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `paiements_echeance_id_foreign` FOREIGN KEY (`echeance_id`) REFERENCES `echeances` (`id`) ON DELETE SET NULL,
  CONSTRAINT `paiements_abonnement_id_foreign` FOREIGN KEY (`abonnement_id`) REFERENCES `abonnements` (`id`) ON DELETE SET NULL,
  CONSTRAINT `paiements_moyen_paiement_id_foreign` FOREIGN KEY (`moyen_paiement_id`) REFERENCES `moyen_paiements` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table: notifications
-- --------------------------------------------------------
CREATE TABLE `notifications` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `titre` VARCHAR(255) NOT NULL,
  `message` TEXT NOT NULL,
  `payload` JSON NULL DEFAULT NULL,
  `lu_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_index` (`user_id`),
  CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Données de démonstration (seeder)
-- --------------------------------------------------------

-- Admin
INSERT INTO `users` (`nom`, `telephone`, `telephone_verified_at`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
('Admin SikaFlow', '+22990000001', NOW(), 'admin@sikaflow.bj', '$2y$12$lg2YH5A0i5I1Xo5GPKCGxOg2dE5wNqPvO8.dS0q2h3qX9X8X7X8Xu', 'admin', 'actif', NOW(), NOW());

-- Utilisateur test
INSERT INTO `users` (`nom`, `telephone`, `telephone_verified_at`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
('Kossi DOSSOU', '+22997000001', NOW(), 'kossi@example.bj', '$2y$12$lg2YH5A0i5I1Xo5GPKCGxOg2dE5wNqPvO8.dS0q2h3qX9X8X7X8Xu', 'user', 'actif', NOW(), NOW());

-- Créanciers
INSERT INTO `creanciers` (`nom`, `type`, `created_at`, `updated_at`) VALUES
('Ecobank Bénin', 'banque', NOW(), NOW()),
('CLCAM Porto-Novo', 'microfinance', NOW(), NOW()),
('ALIDé', 'microfinance', NOW(), NOW());

COMMIT;
