<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('echeances', function (Blueprint $t) {
            $t->id();
            $t->foreignId('pret_id')->constrained()->cascadeOnDelete();
            $t->unsignedInteger('numero');
            $t->date('date_echeance');
            $t->decimal('montant', 14, 2);
            $t->string('statut')->default('a_venir'); // a_venir, payee, en_retard
            $t->foreignId('paiement_id')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('echeances'); }
};
