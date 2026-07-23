<?php
echo "✅ SikaFlow Platform Test\n\n";

// Test 1: PHP fonctionne
echo "1. PHP Version: " . phpversion() . "\n";

// Test 2: Extensions
echo "2. Extensions activées:\n";
$extensions = ['zip', 'fileinfo', 'openssl', 'curl', 'mbstring'];
foreach ($extensions as $ext) {
    echo "   - " . (extension_loaded($ext) ? '✅' : '❌') . " " . $ext . "\n";
}

// Test 3: .env exists
echo "\n3. Configuration:\n";
$env_file = __DIR__ . '/../.env';
if (file_exists($env_file)) {
    echo "   ✅ Fichier .env trouvé\n";
    $env_contents = file_get_contents($env_file);
    if (strpos($env_contents, 'APP_KEY=base64:') !== false) {
        echo "   ✅ Clé APP configurée\n";
    }
} else {
    echo "   ❌ Fichier .env manquant\n";
}

// Test 4: Database
echo "\n4. Base de données:\n";
echo "   DB_HOST: " . getenv('DB_HOST') . "\n";
echo "   DB_DATABASE: " . getenv('DB_DATABASE') . "\n";

echo "\n✅ Test complété!\n";
echo "\nProchaine étape: Installer les dépendances Composer\n";
?>
