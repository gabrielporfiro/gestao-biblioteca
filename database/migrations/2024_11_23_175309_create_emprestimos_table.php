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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('livro_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('aluno_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignId('bibliotecario_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->timestamp('dh_emprestimo')->useCurrent();
            $table->timestamp('dh_devolucao')->nullable();
            $table->unique(['livro_id', 'aluno_id', 'bibliotecario_id', 'dh_emprestimo'], 'emprestimo_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprestimos');
    }
};
