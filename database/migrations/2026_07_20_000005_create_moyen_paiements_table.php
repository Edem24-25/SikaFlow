<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('moyen_paiements', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->string('type'); // mobile_money, bancaire
            $t->string('operateur'); // MTN, MOOV, ECOBANK, ...
            $t->string('numero'); // masqué en affichage
            $t->string('titulaire');
            $t->boolean('is_default')->default(false);
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('moyen_paiements'); }
};
