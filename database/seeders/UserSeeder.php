<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $senhaDefault = Hash::make('12345678');
        $faculdade_disponiveis = \App\Models\Faculdade::all();
        $userEstudante = (object) [
            'name' => 'Estudante',
            'email' => 'estudante@teste.com',
            'password' => $senhaDefault,
        ];
        $modelUserEstudante = \App\Models\User::create([
            'name' => $userEstudante->name,
            'email' => $userEstudante->email,
            'password' => $userEstudante->password,
        ]);

        $modelUserEstudante->assignRole('Aluno');

        $dadosEstudante = (object) [
            'user_id' => $modelUserEstudante->id,
            'matricula' => '12345678',
            'telefone' => '12345678',
            'endereco' => 'Rua 1',
            'cidade' => 'Cidade 1',
            'estado' => 'Estado 1',
            'cep' => '12345678',
            'pais' => 'Pais 1',
            'documento' => '12345678',
            'imagem' => 'imagem',
            'observacao' => 'observacao',
        ];
        \App\Models\Aluno::create([
            'user_id' => $dadosEstudante->user_id,
            'matricula' => $dadosEstudante->matricula,
            'telefone' => $dadosEstudante->telefone,
            'endereco' => $dadosEstudante->endereco,
            'cidade' => $dadosEstudante->cidade,
            'estado' => $dadosEstudante->estado,
            'cep' => $dadosEstudante->cep,
            'pais' => $dadosEstudante->pais,
            'documento' => $dadosEstudante->documento,
            'imagem' => $dadosEstudante->imagem,
            'observacao' => $dadosEstudante->observacao,
            'faculdade_id' => $faculdade_disponiveis->first()->id,
        ]);
        $userBibliotecario = (object) [
            'name' => 'Bibliotecário',
            'email' => 'bibliotecario@teste.com',
            'password' => $senhaDefault,
        ];

        $modelUserBibliotecario = \App\Models\User::create([
            'name' => $userBibliotecario->name,
            'email' => $userBibliotecario->email,
            'password' => $userBibliotecario->password,
        ]);
        $modelUserBibliotecario->assignRole('Bibliotecario');
        $dadosBibliotecario = (object) [
            'user_id' => $modelUserBibliotecario->id,
        ];
        \App\Models\Bibliotecario::create([
            'user_id' => $dadosBibliotecario->user_id,
            'faculdade_id' => $faculdade_disponiveis->first()->id,
            'matricula' => '12345678',
        ]);

        $userAdmin = [
            'name' => 'Admin',
            'email' => 'admin@teste.com',
            'password' => $senhaDefault,
        ];

        $modelUserAdmin = \App\Models\User::create($userAdmin);
        $modelUserAdmin->assignRole('Admin');
    }
}
