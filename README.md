# SikaFlow — HODD GLOBAL

Plateforme automatisée de gestion des remboursements de prêts et des abonnements aux services (Bénin / Afrique de l'Ouest).

Ce dépôt est le **squelette Laravel 11** conforme au cahier des charges (CDC) et au backlog produit de SikaFlow. Il couvre :

- Authentification utilisateur (nom, téléphone, mot de passe) + rôle administrateur
- Gestion des **prêts**, **échéanciers**, **paiements** (manuels + automatiques)
- Gestion des **abonnements récurrents**
- Gestion des **moyens de paiement** (Mobile Money MTN / Moov, comptes bancaires)
- Gestion des **créanciers**
- **Notifications** (rappels d'échéance, incidents de paiement)
- Tableau de bord **utilisateur** et tableau de bord **administrateur**
- Export **PDF** d'échéancier / relevé de paiements
- Commandes artisan `sikaflow:process-echeances` (prélèvement auto) et `sikaflow:send-reminders` (rappels)
- Intégrations préparées : **Kkiapay**, **Flutterwave**, **PayDunya** (voir `.env.example`)



## Installation

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
# Configurez DB dans .env puis :
php artisan migrate --seed
php artisan storage:link
```

Comptes seed :

- **Admin** : `+22990000001` / `password`
- **Utilisateur** : `+22997000001` / `password`



## Démarrage

### Backend (Laravel)

```bash
php artisan serve
```

Le serveur démarre sur `http://localhost:8000`.

### Frontend (Vite)

```bash
npm run dev
```

Le serveur Vite démarre sur `http://localhost:5173` avec hot-reload.

### Compiler pour la production

```bash
npm run build
```



## Planificateur

Ajoutez dans le cron de votre serveur :

```
* * * * * cd /path/to/sikaflow && php artisan schedule:run >> /dev/null 2>&1
```



## Stack

- PHP 8.2+, Laravel 11
- MySQL / MariaDB
- Blade + Tailwind CSS (CDN pour ce starter, à builder via Vite en prod)
- barryvdh/laravel-dompdf pour les exports PDF



## Structure

Voir `app/Models/`, `app/Http/Controllers/`, `database/migrations/`, `routes/web.php`.

Livré par l'assistant IA — à finaliser (tests, CI, intégration réelle des passerelles) par l'équipe HODD GLOBAL.