<?php

namespace Database\Seeders;

use App\Models\Dominio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DominioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categoria do livro
        $nm_tp_dominio = "Categoria do livro";
        $list_dominios = [
            (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Terror',
                ],
            (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Romance',
                ],
            (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Ficção',
                ],
            (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Aventura',
                ],
            (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Suspense',
                ],
            (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Drama',
                ],
        ];

        // Status do livro
        $nm_tp_dominio = "Status do livro";
        $list_dominios += [
            (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Disponível',
                ],
            (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Emprestado',
                ],
            (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Reservado',
                ],
            (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Indisponível',
                ],
            (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Extraviado',
                ],
            (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => 'Danificado',
                ],
        ];

        // Estante
        $nm_tp_dominio = "Estante";
        $range = range('A', 'Z');
        for ($i = 0; $i < count($range); $i++) {
            $list_dominios[] = (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => $range[$i],
            ];
        }

        // Fileira
        $nm_tp_dominio = "Fileira";
        $range = range(1, 100);
        for ($i = 0; $i < count($range); $i++) {
            $list_dominios[] = (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => $range[$i],
            ];
        }

        // Prateleira
        $nm_tp_dominio = "Prateleira";
        $range = range(1, 100);
        for ($i = 0; $i < count($range); $i++) {
            $list_dominios[] = (object) [
                'tp_dominio' => $nm_tp_dominio,
                'nm_dominio' => $range[$i],
            ];
        }
        for ($i = 0; $i < count($list_dominios); $i++) {
            $dominio = $list_dominios[$i];
            Dominio::create([
                'tp_dominio' => $dominio->tp_dominio,
                'nm_dominio' => $dominio->nm_dominio,
            ]);
        }
    }
}
