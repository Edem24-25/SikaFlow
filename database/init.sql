-- Créer la base de données SikaFlow
CREATE DATABASE IF NOT EXISTS sikaflow 
  CHARACTER SET utf8mb4 
  COLLATE utf8mb4_unicode_ci;

-- Utiliser la base de données
USE sikaflow;

-- Vérification
SELECT 'Base de données sikaflow créée avec succès!' as Status;
