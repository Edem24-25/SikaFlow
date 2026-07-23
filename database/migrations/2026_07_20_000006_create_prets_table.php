<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('prets', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->foreignId('creancier_id')->constrained('creanciers');
            $t->foreignId('moyen_paiement_id')->nullable()->constrained('moyen_paiements')->nullOnDelete();
            $t->string('reference')->unique();
            $t->decimal('montant_principal', 14, 2);
            $t->decimal('taux_interet', 5, 2)->default(0);
            $t->unsignedInteger('duree_mois');
            $t->string('periodicite')->default('mensuelle');
            $t->date('date_debut');
            $t->string('statut')->default('actif'); // actif, solde, suspendu
            $t->boolean('prelevement_auto')->default(false);
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('prets'); }
};
