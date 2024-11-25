<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $this->call([
             DominioSeeder::class,
             FaculdadeSeeder::class,
             UserSeeder::class,
             LocalizacaoSeeder::class,
             LivroSeeder::class,
             EstoqueLivroSeeder::class,
             EmprestimoSeeder::class,
         ]);
    }
}
