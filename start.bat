@echo off
REM Script de démarrage SikaFlow
REM Installe les dépendances et démarre la plateforme

cls
echo.
echo ================================================
echo     SikaFlow - Installation et Démarrage
echo ================================================
echo.

REM Vérifier si on est dans le bon répertoire
if not exist composer.json (
    echo ERREUR: composer.json non trouvé
    echo Assurez-vous d'exécuter ce script depuis c:\wamp64\www\sikaflow_laravel
    pause
    exit /b 1
)

REM Étape 1: Installer Composer
echo [1/5] Installation des dépendances Composer...
echo.
call composer install --no-dev --optimize-autoloader --ignore-platform-reqs
if %errorlevel% neq 0 (
    echo ERREUR lors de l'installation Composer
    echo Vérifiez votre connexion Internet
    pause
    exit /b 1
)

REM Étape 2: Générer la clé APP
echo.
echo [2/5] Générer la clé d'application...
call php artisan key:generate --force
if %errorlevel% neq 0 (
    echo ERREUR lors de la génération de la clé
    pause
    exit /b 1
)

REM Étape 3: Créer le cache
echo.
echo [3/5] Créer le dossier cache...
if not exist storage\framework\cache mkdir storage\framework\cache
if not exist storage\framework\sessions mkdir storage\framework\sessions
if not exist storage\framework\views mkdir storage\framework\views

REM Étape 4: Migrer la base de données
echo.
echo [4/5] Exécuter les migrations...
call php artisan migrate --force
if %errorlevel% neq 0 (
    echo ATTENTION: Migration échouée - Vérifiez que MySQL est en cours d'exécution
)

REM Étape 5: Démarrer le serveur
echo.
echo [5/5] Démarrer le serveur Laravel...
echo.
echo ================================================
echo     SikaFlow est maintenant en ligne!
echo     Accédez à: http://localhost:8000
echo ================================================
echo.

php artisan serve --host=0.0.0.0 --port=8000
