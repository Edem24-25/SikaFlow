<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SikaFlow - Configuration</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }
        .container { max-width: 1000px; margin: 0 auto; }
        h1 { color: #667eea; margin: 30px 0 20px; }
        .card { background: white; padding: 30px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .status { margin: 20px 0; padding: 15px; border-radius: 4px; }
        .status.ok { background: #d4edda; color: #155724; border-left: 4px solid #28a745; }
        .status.error { background: #f8d7da; color: #721c24; border-left: 4px solid #dc3545; }
        .status.info { background: #d1ecf1; color: #0c5460; border-left: 4px solid #17a2b8; }
        code { background: #f4f4f4; padding: 2px 6px; border-radius: 3px; font-family: 'Courier New'; }
        pre { background: #f4f4f4; padding: 15px; border-radius: 4px; overflow-x: auto; margin: 10px 0; }
        .steps { display: flex; gap: 20px; margin: 30px 0; flex-wrap: wrap; }
        .step { flex: 1; min-width: 200px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 20px; border-radius: 8px; text-align: center; }
        .step .number { font-size: 2em; font-weight: bold; margin-bottom: 10px; }
        .step .title { font-size: 1.1em; margin-bottom: 5px; }
        .step .desc { font-size: 0.9em; opacity: 0.9; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f8f9fa; font-weight: 600; }
        .highlight { background: #fff3cd; padding: 3px 6px; }
        .btn { display: inline-block; padding: 10px 20px; margin: 5px; background: #667eea; color: white; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
        .btn:hover { background: #5568d3; }
        .warning { color: #dc3545; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 SikaFlow - Assistant de Configuration</h1>
        
        <div class="card">
            <h2>📊 État du Système</h2>
            <?php
            $status = [];
            
            // PHP
            $status['PHP'] = ['✅', phpversion() . ' (OK)'];
            
            // Extensions
            $extensions = ['zip', 'fileinfo', 'pdo', 'pdo_mysql', 'curl', 'mbstring'];
            $ext_status = [];
            foreach ($extensions as $ext) {
                $ext_status[] = extension_loaded($ext) ? "✅ $ext" : "❌ $ext";
            }
            $status['Extensions'] = ['✅', implode(', ', $ext_status)];
            
            // .env
            $env_exists = file_exists(__DIR__ . '/../.env');
            $status['.env'] = [$env_exists ? '✅' : '❌', $env_exists ? 'Configuré' : 'Manquant'];
            
            // vendor
            $vendor_exists = file_exists(__DIR__ . '/../vendor/autoload.php');
            $status['Dépendances'] = [$vendor_exists ? '✅' : '⚠️', $vendor_exists ? 'Installées' : 'À installer'];
            
            // Afficher le tableau
            echo '<table>';
            echo '<tr><th>Composant</th><th>Statut</th><th>Détail</th></tr>';
            foreach ($status as $component => $info) {
                echo "<tr><td><strong>$component</strong></td><td>{$info[0]}</td><td>{$info[1]}</td></tr>";
            }
            echo '</table>';
            ?>
        </div>

        <div class="card">
            <h2>📋 Étapes de Configuration</h2>
            <div class="steps">
                <div class="step">
                    <div class="number">1</div>
                    <div class="title">Base de Données</div>
                    <div class="desc">Créer la BD via phpMyAdmin ou MySQL</div>
                </div>
                <div class="step">
                    <div class="number">2</div>
                    <div class="title">Composer</div>
                    <div class="desc">Installer les dépendances</div>
                </div>
                <div class="step">
                    <div class="number">3</div>
                    <div class="title">Migrations</div>
                    <div class="desc">Créer les tables de BD</div>
                </div>
                <div class="step">
                    <div class="number">4</div>
                    <div class="title">Serveur</div>
                    <div class="desc">Accéder à l'application</div>
                </div>
            </div>
        </div>

        <div class="card">
            <h2>⚙️ Étape 1: Créer la Base de Données</h2>
            <div class="status info">
                <strong>ℹ️ Option A - Via phpMyAdmin (Recommandé):</strong>
                <ol style="margin-left: 20px; margin-top: 10px;">
                    <li>Accédez à <a href="http://localhost/phpmyadmin" target="_blank">http://localhost/phpmyadmin</a></li>
                    <li>Cliquez sur "Nouvelle base de données"</li>
                    <li>Entrez: <code>sikaflow</code></li>
                    <li>Sélectionnez: <code>utf8mb4_unicode_ci</code></li>
                    <li>Cliquez "Créer"</li>
                </ol>
            </div>
            <div class="status info">
                <strong>ℹ️ Option B - Ligne de commande MySQL:</strong>
                <pre>mysql -u root -p
CREATE DATABASE sikaflow CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;</pre>
            </div>
        </div>

        <div class="card">
            <h2>📦 Étape 2: Installer les Dépendances</h2>
            <div class="status warning">
                Problème détecté: <span class="highlight">Connectivité Composer</span>
            </div>
            <p>Essayez l'une de ces solutions:</p>
            <pre>cd C:\wamp64\www\sikaflow_laravel

# Option 1: Installation simple
composer install --no-dev

# Option 2: Avec cache clear
composer clear-cache
composer install --no-dev

# Option 3: Sans vérification de sécurité
composer config policy.advisories.block false
composer install --no-dev</pre>
            <p style="margin-top: 15px;">
                <span class="warning">⚠️ Note:</span> Si Composer continue à échouer, vérifiez votre connectivité réseau/DNS.
            </p>
        </div>

        <div class="card">
            <h2>🗄️ Étape 3: Exécuter les Migrations</h2>
            <p>Une fois Composer installé, exécutez:</p>
            <pre>cd C:\wamp64\www\sikaflow_laravel
php artisan migrate --force</pre>
            <p style="margin-top: 15px;">Cela créera automatiquement toutes les tables nécessaires.</p>
        </div>

        <div class="card">
            <h2>🌐 Étape 4: Accéder à l'Application</h2>
            <div class="status ok">
                ✅ Une fois tout configuré, accédez à:
                <p style="margin-top: 10px; font-size: 1.2em;"><strong>http://localhost/sikaflow_laravel/public</strong></p>
            </div>
        </div>

        <div class="card">
            <h2>📚 Structure de la Base de Données</h2>
            <p>Les tables suivantes seront créées automatiquement:</p>
            <table>
                <tr><th>Table</th><th>Description</th><th>Colonnes clé</th></tr>
                <tr><td><code>users</code></td><td>Utilisateurs</td><td>id, email, password</td></tr>
                <tr><td><code>creanciers</code></td><td>Créanciers/Prêteurs</td><td>id, nom, solde</td></tr>
                <tr><td><code>prets</code></td><td>Prêts octroyés</td><td>id, creancier_id, montant</td></tr>
                <tr><td><code>echeances</code></td><td>Calendrier remboursement</td><td>id, pret_id, date_echeance</td></tr>
                <tr><td><code>paiements</code></td><td>Transactions de paiement</td><td>id, echeance_id, montant</td></tr>
                <tr><td><code>abonnements</code></td><td>Abonnements clients</td><td>id, user_id, montant_mensuel</td></tr>
                <tr><td><code>moyen_paiements</code></td><td>Moyens (Kkiapay, etc.)</td><td>id, type, details</td></tr>
                <tr><td><code>notifications</code></td><td>Alertes/Rappels</td><td>id, user_id, titre</td></tr>
            </table>
        </div>

        <div class="card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-align: center;">
            <h2>🎯 Prochaines Étapes</h2>
            <p style="margin: 20px 0; font-size: 1.1em;">
                Complétez les 4 étapes ci-dessus, puis retournez à la page d'accueil
            </p>
            <a href="/sikaflow_laravel/public/" class="btn" style="background: white; color: #667eea; display: inline-block;">← Retour à l'accueil</a>
        </div>
    </div>
</body>
</html>
