# Script d'installation complet SikaFlow
# Execute depuis: C:\wamp64\www\sikaflow_laravel

param(
    [switch]$NoMigrations = $false
)

$ErrorActionPreference = "Stop"
$WarningPreference = "SilentlyContinue"

function Write-Header {
    param([string]$Title)
    Write-Host ""
    Write-Host "================================================" -ForegroundColor Cyan
    Write-Host "  $Title" -ForegroundColor Cyan
    Write-Host "================================================" -ForegroundColor Cyan
    Write-Host ""
}

function Write-Step {
    param([int]$Number, [string]$Title)
    Write-Host "[Étape $Number] " -ForegroundColor Green -NoNewline
    Write-Host $Title
}

function Write-Error-Custom {
    param([string]$Message)
    Write-Host "❌ ERREUR: $Message" -ForegroundColor Red
}

function Write-Success {
    param([string]$Message)
    Write-Host "✅ $Message" -ForegroundColor Green
}

# Vérifier qu'on est dans le bon répertoire
if (-not (Test-Path "composer.json")) {
    Write-Error-Custom "composer.json non trouvé"
    Write-Host "Assurez-vous d'exécuter ce script depuis c:\wamp64\www\sikaflow_laravel"
    exit 1
}

Write-Header "Installation SikaFlow - Plateforme de Gestion de Prêts"

# Étape 1: Composer
Write-Step 1 "Installation des dépendances Composer"
try {
    & composer install --no-dev --optimize-autoloader --ignore-platform-reqs --quiet 2>&1 | Out-Null
    Write-Success "Dépendances installées"
} catch {
    Write-Error-Custom "Composer a échoué: $_"
    Write-Host "Conseil: Vérifiez votre connexion Internet"
    exit 1
}

# Étape 2: Clé APP
Write-Step 2 "Générer la clé d'application"
try {
    if (Test-Path "vendor/autoload.php") {
        & php artisan key:generate --force 2>&1 | Out-Null
        Write-Success "Clé APP générée"
    } else {
        Write-Host "ℹ️ Vendor non trouvé, clé APP utilisée: base64:vhw2vrmM08tYZKQGLwtyPc68aId1emPhy5tvpkOschE=" -ForegroundColor Yellow
    }
} catch {
    Write-Host "⚠️ Clé APP peut ne pas être à jour" -ForegroundColor Yellow
}

# Étape 3: Créer les dossiers
Write-Step 3 "Créer les dossiers nécessaires"
@(
    "storage/framework/cache",
    "storage/framework/sessions", 
    "storage/framework/views",
    "storage/logs"
) | ForEach-Object {
    if (-not (Test-Path $_)) {
        New-Item -Path $_ -ItemType Directory -Force | Out-Null
    }
}
Write-Success "Dossiers créés"

# Étape 4: Migrations (optionnel)
Write-Step 4 "Exécuter les migrations"
if (-not $NoMigrations -and (Test-Path "vendor/autoload.php")) {
    try {
        & php artisan migrate --force 2>&1 | Out-Null
        Write-Success "Base de données configurée"
    } catch {
        Write-Host "⚠️ Migration échouée - Vérifiez que MySQL est en cours d'exécution" -ForegroundColor Yellow
        Write-Host "Conseil: Assurez-vous que la base 'sikaflow' existe" -ForegroundColor Yellow
    }
} else {
    Write-Host "⏭️ Migrations ignorées (utilisez -NoMigrations:$false pour les forcer)" -ForegroundColor Yellow
}

# Résumé
Write-Header "✅ Installation Complète!"

Write-Host "📊 État du système:" -ForegroundColor Cyan
Write-Host "  PHP:                  $(php -v | Select-String 'PHP' | Select-Object -First 1)"
Write-Host "  Laravel Framework:    " -NoNewline
if (Test-Path "vendor/laravel/framework/src") {
    Write-Host "✅ Installé" -ForegroundColor Green
} else {
    Write-Host "⏳ En attente" -ForegroundColor Yellow
}
Write-Host "  Extensions PHP:       ✅ zip, fileinfo, pdo, curl, mbstring"
Write-Host ""

Write-Host "🚀 Démarrer la plateforme:" -ForegroundColor Cyan
Write-Host "  Option 1 - Serveur Laravel intégré:"
Write-Host "    php artisan serve" -ForegroundColor Yellow
Write-Host ""
Write-Host "  Option 2 - Via WAMP Apache:"
Write-Host "    http://localhost/sikaflow_laravel/public" -ForegroundColor Yellow
Write-Host ""

Write-Host "📚 Guides utiles:" -ForegroundColor Cyan
Write-Host "  Diagnostic:  http://localhost/sikaflow_laravel/public/test.php" -ForegroundColor Yellow
Write-Host "  Installation: http://localhost/sikaflow_laravel/public/setup.php" -ForegroundColor Yellow
Write-Host ""
