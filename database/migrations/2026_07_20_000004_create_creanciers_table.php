<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('creanciers', function (Blueprint $t) {
            $t->id();
            $t->string('nom');
            $t->string('type')->default('banque'); // banque, microfinance, particulier
            $t->string('telephone')->nullable();
            $t->string('email')->nullable();
            $t->string('adresse')->nullable();
            $t->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('creanciers'); }
};
