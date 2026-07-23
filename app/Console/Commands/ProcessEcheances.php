<?php

namespace App\Console\Commands;

use App\Models\Echeance;
use App\Services\PaiementGateway;
use App\Services\NotificationService;
use Illuminate\Console\Command;

class ProcessEcheances extends Command
{
    protected $signature = 'sikaflow:process-echeances';
    protected $description = 'Prélève automatiquement les échéances arrivées à maturité (prêts en prélèvement auto).';

    public function handle(PaiementGateway $gw, NotificationService $notif): int
    {
        $today = today();

        $echeances = Echeance::with('pret.user', 'pret.moyenPaiement')
            ->whereDate('date_echeance', '<=', $today)
            ->where('statut', 'a_venir')
            ->get();

        $count = 0;
        foreach ($echeances as $e) {
            $pret = $e->pret;
            if (!$pret->prelevement_auto || !$pret->moyenPaiement) {
                $e->update(['statut' => 'en_retard']);
                $notif->push($pret->user, 'echeance_ratee',
                    'Échéance non honorée',
                    "L'échéance #{$e->numero} du prêt {$pret->reference} est en retard.");
                continue;
            }
            $gw->payerEcheance($e, $pret->moyenPaiement, 'automatique');
            $count++;
        }
        $this->info("Échéances traitées : {$count}");
        return self::SUCCESS;
    }
}
