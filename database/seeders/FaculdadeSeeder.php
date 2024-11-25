<?php

namespace Database\Seeders;

use App\Models\Faculdade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaculdadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            (object) [
                'nome' => 'Faculdade de Tecnologia de São Paulo',
                'endereco' => 'Avenida Tiradentes, 615',
                'telefone' => '(11) 3322-2200',
            ],
            (object) [
                'nome' => 'Faculdade de Tecnologia de São José dos Campos',
                'endereco' => 'Rua Tsunessaburo Makiguti, 340',
                'telefone' => '(12) 3205-5555',
            ],
            (object) [
                'nome' => 'Faculdade de Tecnologia de São Caetano do Sul',
                'endereco' => 'Alameda São Caetano, 184',
                'telefone' => '(11) 4239-2222',
            ],
        ];
        for ($i = 0; $i < count($array); $i++) {
            $faculdade = $array[$i];
            Faculdade::create([
                'nome' => $faculdade->nome,
                'endereco' => $faculdade->endereco,
                'telefone' => $faculdade->telefone,
            ]);
        }
    }
}
