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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('codigo');
            $table->string('autor');
            $table->string('editora');
            $table->string('edicao');
            $table->string('ano');
            $table->string('imagem')->nullable();
            $table->string('pdf')->nullable();
            $table->string('observacao')->nullable();
            // Categoria do livro [Required]
            $table->foreignId('categoria_livro_id')
                ->constrained('dominios')
                ->cascadeOnDelete();
            // Localização do livro [Optional]
            $table->foreignId('localizacao_id')
                ->constrained()
                ->cascadeOnDelete();
            // Bibliotecário responsável [Optional]
            $table->foreignId('bibliotecario_id')
                ->constrained('users')
                ->cascadeOnDelete();
            // Faculdade do Livro [Required]
            $table->foreignId('faculdade_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livros');
    }
};
