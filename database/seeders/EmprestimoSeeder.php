<?php

namespace Database\Seeders;

use App\Models\Emprestimo;
use App\Models\Livro;
use App\Models\Aluno;
use App\Models\Bibliotecario;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EmprestimoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Recuperar listas para as foreign keys
        $lista_livros = Livro::all();
        $lista_alunos = Aluno::all();
        $lista_bibliotecarios = Bibliotecario::all();

        $combinacoes_geradas = [];

        $lista_emprestimos = [];

        // Gerar 20 empréstimos
        for ($i = 0; $i < 20; $i++) {
            do {
                $livro_id = $lista_livros->random()?->id;
                $aluno_id = $lista_alunos->random()?->id;
                $bibliotecario_id = $lista_bibliotecarios->random()?->id;

                // Contar empréstimos pendentes do aluno
                $pendentesCount = Emprestimo::where('aluno_id', $aluno_id)
                    ->whereNull('dh_devolucao')
                    ->count();

                // Gerar empréstimo apenas se o aluno tiver menos de 5 pendentes
                $validCombination = $pendentesCount < 5;

                $dh_emprestimo = $faker->dateTimeBetween('-30 days', 'now')->format('Y-m-d H:i:s');
                $combination_key = "$livro_id|$aluno_id|$bibliotecario_id|$dh_emprestimo";
            } while (isset($combinacoes_geradas[$combination_key]) || !$validCombination);

            // Marcar a combinação como usada
            $combinacoes_geradas[$combination_key] = true;

            $lista_emprestimos[] = [
                'livro_id' => $livro_id,
                'aluno_id' => $aluno_id,
                'bibliotecario_id' => $bibliotecario_id,
                'dh_emprestimo' => $dh_emprestimo,
                'dh_devolucao' => $faker->optional(0.5)->dateTimeBetween('now', '+30 days'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        foreach ($lista_emprestimos as $emprestimo) {
            try {
                Emprestimo::create($emprestimo);
            } catch (\Exception $e) {

            }
        }
    }
}
