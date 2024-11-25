<?php

namespace Database\Seeders;

use App\Models\Dominio;
use App\Models\Localizacao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocalizacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estantesDisponiveis = Dominio::where('tp_dominio', 'estante')->limit(20)->get();
        $fileirasDisponiveis = Dominio::where('tp_dominio', 'fileira')->limit(20)->get();
        $prateleirasDisponiveis = Dominio::where('tp_dominio', 'prateleira')->limit(20)->get();

        // Cria uma localização para cada combinação de estante, fileira e prateleira
        for ($i = 0; $i < count($estantesDisponiveis); $i++) {
            $estante = $estantesDisponiveis[$i];
            for ($j = 0; $j < count($fileirasDisponiveis); $j++) {
                $fileira = $fileirasDisponiveis[$j];
                for ($k = 0; $k < count($prateleirasDisponiveis); $k++) {
                    $prateleira = $prateleirasDisponiveis[$k];
                    Localizacao::create([
                        'estante_id' => $estante->id,
                        'fileira_id' => $fileira->id,
                        'prateleira_id' => $prateleira->id,
                    ]);
                }
            }
        }
    }
}
