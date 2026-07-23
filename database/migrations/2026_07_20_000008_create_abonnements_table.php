<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('abonnements', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->foreignId('moyen_paiement_id')->nullable()->constrained('moyen_paiements')->nullOnDelete();
            $t->string('libelle');
            $t->string('fournisseur')->nullable();
            $t->decimal('montant', 12, 2);
            $t->string('periodicite')->default('mensuelle'); // hebdomadaire, mensuelle, annuelle
            $t->date('prochaine_echeance');
            $t->string('statut')->default('actif');
            $t->boolean('prelevement_auto')->default(false);
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('abonnements'); }
};
