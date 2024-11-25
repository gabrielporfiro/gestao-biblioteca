<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('localizacaos', function (Blueprint $table) {
            $table->id();
            // Estante
            $table->foreignId('estante_id')
                ->constrained('dominios')
                ->cascadeOnDelete();
            // Fileira
            $table->foreignId('fileira_id')
                ->constrained('dominios')
                ->cascadeOnDelete();
            // Prateleira
            $table->foreignId('prateleira_id')
                ->constrained('dominios')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localizacaos');
    }
};
