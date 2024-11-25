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
        Schema::create('estoque_livros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livro_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->integer('quantidade');
            // status do estoque [Required] disponível, indisponível, emprestado, reservado, etc.
            $table->foreignId('status_estoque_id')
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
        Schema::dropIfExists('estoque_livros');
    }
};
