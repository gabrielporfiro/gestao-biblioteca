<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faculdade;
use App\Models\Dominio;
use App\Models\Localizacao;
use App\Models\User; // Presumindo que o modelo Bibliotecario seja User
use App\Models\Livro;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faculdades = Faculdade::all();
        $categorias = Dominio::where('tp_dominio', 'categoria_do_livro')->get();
        $localizacoes = Localizacao::all();
        $bibliotecarios = User::all(); // Presumindo que o bibliotecário está na tabela `users`

        $livros = [
            [
                'titulo' => 'O Iluminado',
                'codigo' => '123456',
                'autor' => 'Stephen King',
                'editora' => 'Suma',
                'edicao' => '1',
                'ano' => '2013',
                'imagem' => 'https://images-na.ssl-images-amazon.com/images/I/51ZJ2qJj9-L._SX331_BO1,204,203,200_.jpg',
                'pdf' => 'https://www.google.com',
                'observacao' => 'Livro de terror',
                'categoria_livro_id' => $categorias->where('nm_dominio', 'Terror')->first()?->id,
                'localizacao_id' => $localizacoes->where('nm_localizacao', 'Estante 1')->first()?->id,
                'bibliotecario_id' => $bibliotecarios->where('nome', 'João')->first()?->id,
                'faculdade_id' => $faculdades->where('nm_faculdade', 'Faculdade de Tecnologia')->first()?->id,
            ],
        ];

        // Filtrar itens válidos (remover registros com IDs nulos)
        $livros = array_filter($livros, function ($livro) {
            return isset($livro['categoria_livro_id'], $livro['localizacao_id'], $livro['bibliotecario_id'], $livro['faculdade_id']);
        });

        // Inserir no banco
        Livro::insert($livros);
    }
}
