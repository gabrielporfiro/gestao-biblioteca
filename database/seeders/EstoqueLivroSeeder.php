<?php

namespace Database\Seeders;

use App\Models\EstoqueLivro;
use Illuminate\Database\Seeder;
use App\Models\Livro;
use App\Models\Dominio;
use Faker\Factory as Faker;

class EstoqueLivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lista_livros = Livro::all();
        $lista_status = Dominio::where('tp_dominio', 'status_do_livro')->get();
        $faker = Faker::create();

        $combinacoes_geradas = [];

        $lista_estoque_livros = [];

        // Gerar 20 estoques de livros dinamicamente
        for ($i = 0; $i < 20; $i++) {
            do {
                $livro_id = $lista_livros->random()?->id;
                $status_estoque_id = $lista_status->random()?->id;
                $combination_key = "$livro_id|$status_estoque_id";
            } while (isset($combinacoes_geradas[$combination_key]));

            // Marcar a combinação como usada
            $combinacoes_geradas[$combination_key] = true;

            $lista_estoque_livros[] = [
                'livro_id' => $livro_id,
                'status_estoque_id' => $status_estoque_id,
                'quantidade' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Inserir no banco de dados
        EstoqueLivro::insert($lista_estoque_livros);
    }
}
