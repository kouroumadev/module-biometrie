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
        Schema::create('bio_dones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biometrie_id')->constrained('biometries');
            $table->foreignId('user_id')->constrained('users');
            $table->text('details')->nullable();
            $table->string('state')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('bio_dones');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
