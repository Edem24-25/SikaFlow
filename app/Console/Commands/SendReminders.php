<?php

namespace App\Console\Commands;

use App\Models\Echeance;
use App\Services\NotificationService;
use Illuminate\Console\Command;

class SendReminders extends Command
{
    protected $signature = 'sikaflow:send-reminders';
    protected $description = 'Envoie les rappels d\'échéances à venir dans 3 jours.';

    public function handle(NotificationService $notif): int
    {
        $target = today()->addDays(3);
        $echeances = Echeance::with('pret.user')
            ->whereDate('date_echeance', $target)
            ->where('statut', 'a_venir')
            ->get();

        foreach ($echeances as $e) {
            $notif->push($e->pret->user, 'rappel',
                'Rappel d\'échéance',
                "Votre échéance de {$e->montant} FCFA arrive le " . $e->date_echeance->format('d/m/Y') . '.');
        }

        $this->info('Rappels envoyés : ' . $echeances->count());
        return self::SUCCESS;
    }
}
