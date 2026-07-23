<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('paiements', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->foreignId('echeance_id')->nullable()->constrained('echeances')->nullOnDelete();
            $t->foreignId('abonnement_id')->nullable()->constrained('abonnements')->nullOnDelete();
            $t->foreignId('moyen_paiement_id')->nullable()->constrained('moyen_paiements')->nullOnDelete();
            $t->string('reference_transaction')->unique();
            $t->string('passerelle'); // kkiapay, flutterwave, paydunya
            $t->decimal('montant', 14, 2);
            $t->string('statut')->default('en_attente'); // reussi, echoue, en_attente
            $t->string('mode')->default('manuel'); // manuel, automatique
            $t->json('payload')->nullable();
            $t->timestamp('paid_at')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('paiements'); }
};
