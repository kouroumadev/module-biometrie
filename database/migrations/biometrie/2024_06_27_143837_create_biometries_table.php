<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('biometries', function (Blueprint $table) {
            $table->id();
            $table->string('no_employeur');
            $table->string('no_dossier');
            $table->string('email');
            $table->string('telephone');
            $table->text('adresse');
            $table->string('fichier');
            $table->string('nombre_employe');
            $table->string('statut')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('biometries');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
