<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faculdade;
use App\Models\Dominio;
use App\Models\Localizacao;
use App\Models\User; // Presumindo que o modelo Bibliotecario seja User
use App\Models\Livro;
use Faker\Factory as Faker;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Obter os registros existentes para relacionamentos
        $faculdades = Faculdade::all();
        $categorias = Dominio::where('tp_dominio', 'categoria_do_livro')->get();
        $localizacoes = Localizacao::all();
        $bibliotecarios = User::all(); // Presumindo que o bibliotecário está na tabela `users`

        $livros = [];

        // Gerar 20 livros dinamicamente
        for ($i = 0; $i < 20; $i++) {
            $livros[] = [
                'titulo' => $faker->sentence(3),
                'codigo' => $faker->unique()->numerify('######'), // Código com 6 dígitos
                'autor' => $faker->name,
                'editora' => $faker->company,
                'edicao' => $faker->numberBetween(1, 10),
                'ano' => $faker->year,
                'imagem' => $faker->imageUrl(300, 400, 'books', true, 'Book'), // Imagem fictícia de livros
                'pdf' => $faker->url,
                'observacao' => $faker->sentence,
                'categoria_livro_id' => $categorias->random()?->id, // Seleciona um ID de categoria aleatório
                'localizacao_id' => $localizacoes->random()?->id, // Seleciona um ID de localização aleatório
                'bibliotecario_id' => $bibliotecarios->random()?->id, // Seleciona um ID de bibliotecário aleatório
                'faculdade_id' => $faculdades->random()?->id, // Seleciona um ID de faculdade aleatório
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Filtrar itens válidos (remover registros com IDs nulos)
        $livros = array_filter($livros, function ($livro) {
            return isset($livro['categoria_livro_id'], $livro['localizacao_id'], $livro['bibliotecario_id'], $livro['faculdade_id']);
        });

        // Inserir no banco
        Livro::insert($livros);
    }
}
