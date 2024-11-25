<?php

namespace Database\Seeders;

use App\Models\Dominio;
use Illuminate\Database\Seeder;

class DominioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_dominios = [];

        // Categoria do livro
        $nm_tp_dominio = "Categoria do livro";
        $list_dominios = array_merge($list_dominios, [
            [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Terror',
            ],
            [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Romance',
            ],
            [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Ficção',
            ],
            [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Aventura',
            ],
            [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Suspense',
            ],
            [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Drama',
            ],
        ]);

        // Status do livro
        $nm_tp_dominio = "Status do livro";
        $list_dominios = array_merge($list_dominios, [
            [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Disponível',
            ],
            [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Emprestado',
            ],
            [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Reservado',
            ],
            [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Indisponível',
            ],
            [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Extraviado',
            ],
            [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Danificado',
            ],
        ]);

        // Estante
        $nm_tp_dominio = "Estante";
        foreach (range('A', 'Z') as $letter) {
            $list_dominios[] = [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => $letter,
            ];
        }

        // Fileira
        $nm_tp_dominio = "Fileira";
        foreach (range(1, 100) as $number) {
            $list_dominios[] = [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => (string)$number,
            ];
        }

        // Prateleira
        $nm_tp_dominio = "Prateleira";
        foreach (range(1, 100) as $number) {
            $list_dominios[] = [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => (string)$number,
            ];
        }

        // Inserir os registros no banco de dados
        foreach ($list_dominios as $dominio) {
            Dominio::create($dominio);
        }
    }
}
