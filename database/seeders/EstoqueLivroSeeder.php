<?php

namespace Database\Seeders;

use App\Models\EstoqueLivro;
use Illuminate\Database\Seeder;
use App\Models\Livro;
use App\Models\Dominio;

class EstoqueLivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $livro = Livro::where('titulo', 'O Iluminado')->first();
        $statusDisponivel = Dominio::where('tp_dominio', 'status_do_livro')->where('nm_dominio', 'Disponível')->first();
        $statusEmprestado = Dominio::where('tp_dominio', 'status_do_livro')->where('nm_dominio', 'Emprestado')->first();

        // Garantir que os registros necessários existem
        if (!$livro || !$statusDisponivel || !$statusEmprestado) {
            return;
        }

        $listaEstoqueLivros = [
            [
                'livro_id' => $livro->id,
                'status_estoque_id' => $statusDisponivel->id,
                'quantidade' => 10,
            ],
            [
                'livro_id' => $livro->id,
                'status_estoque_id' => $statusEmprestado->id,
                'quantidade' => 5,
            ],
        ];

        // Inserir no banco
        EstoqueLivro::insert($listaEstoqueLivros);
    }
}
