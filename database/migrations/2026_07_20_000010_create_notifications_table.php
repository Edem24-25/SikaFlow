<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('notifications', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained()->cascadeOnDelete();
            $t->string('type'); // rappel, paiement_reussi, echeance_ratee, diffusion
            $t->string('titre');
            $t->text('message');
            $t->json('payload')->nullable();
            $t->timestamp('lu_at')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('notifications'); }
};
