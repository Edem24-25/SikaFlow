<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Creancier;
use App\Models\MoyenPaiement;
use App\Models\Pret;
use App\Models\Abonnement;
use App\Services\EcheancierService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(EcheancierService $service): void
    {
        $admin = User::firstOrCreate(
            ['telephone' => '+22990000001'],
            ['nom' => 'Admin SikaFlow', 'email' => 'admin@sikaflow.bj', 'password' => Hash::make('password'), 'role' => 'admin']
        );

        $user = User::firstOrCreate(
            ['telephone' => '+22997000001'],
            ['nom' => 'Kossi DOSSOU', 'email' => 'kossi@example.bj', 'password' => Hash::make('password'), 'role' => 'user']
        );

        $creanciers = collect([
            ['nom' => 'Ecobank Bénin', 'type' => 'banque'],
            ['nom' => 'CLCAM Porto-Novo', 'type' => 'microfinance'],
            ['nom' => 'ALIDé', 'type' => 'microfinance'],
        ])->map(fn($c) => Creancier::firstOrCreate(['nom' => $c['nom']], $c));

        $mtn = MoyenPaiement::firstOrCreate(
            ['user_id' => $user->id, 'numero' => '+22997000001'],
            ['type' => 'mobile_money', 'operateur' => 'MTN', 'titulaire' => $user->nom, 'is_default' => true]
        );
        MoyenPaiement::firstOrCreate(
            ['user_id' => $user->id, 'numero' => '+22994000001'],
            ['type' => 'mobile_money', 'operateur' => 'MOOV', 'titulaire' => $user->nom]
        );

        $pret = Pret::firstOrCreate(
            ['reference' => 'PRT-SEED-0001'],
            [
                'user_id' => $user->id,
                'creancier_id' => $creanciers->first()->id,
                'moyen_paiement_id' => $mtn->id,
                'montant_principal' => 500000,
                'taux_interet' => 8.5,
                'duree_mois' => 12,
                'periodicite' => 'mensuelle',
                'date_debut' => now()->subMonth(),
                'statut' => 'actif',
                'prelevement_auto' => true,
            ]
        );
        $service->generer($pret);

        Abonnement::firstOrCreate(
            ['user_id' => $user->id, 'libelle' => 'Canal+ Access'],
            ['fournisseur' => 'Canal+', 'montant' => 5000, 'periodicite' => 'mensuelle', 'prochaine_echeance' => now()->addDays(10), 'statut' => 'actif', 'moyen_paiement_id' => $mtn->id, 'prelevement_auto' => true]
        );
        Abonnement::firstOrCreate(
            ['user_id' => $user->id, 'libelle' => 'Internet MTN'],
            ['fournisseur' => 'MTN', 'montant' => 15000, 'periodicite' => 'mensuelle', 'prochaine_echeance' => now()->addDays(5), 'statut' => 'actif', 'moyen_paiement_id' => $mtn->id]
        );
    }
}
