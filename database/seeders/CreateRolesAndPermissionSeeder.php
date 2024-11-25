<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateRolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entities = [
            'role',
            'user',
            'faculdade',
            'livro',
            'emprestimo',
            'devolucao',
            'relatorio',
        ];

        $permissions = [];

        // Criando permissões para cada entidade
        foreach ($entities as $entity) {
            $permissions[] = 'create-' . $entity;
            $permissions[] = 'read-' . $entity;
            $permissions[] = 'update-' . $entity;
            $permissions[] = 'delete-' . $entity;
        }

        // Salvando permissões no banco
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        /**
         * Admin
         */
        $admin = Role::create(['name' => 'Admin']);
        $allPermissions = Permission::pluck('id')->all();
        $admin->syncPermissions($allPermissions);

        /**
         * Bibliotecario
         */
        $bibliotecario = Role::create(['name' => 'Bibliotecario']);
        $bibliotecarioPermissions = [
            'create-livro',
            'read-livro',
            'update-livro',
            'delete-livro',
            'create-emprestimo',
            'read-emprestimo',
            'update-emprestimo',
            'delete-emprestimo',
            'create-devolucao',
            'read-devolucao',
            'update-devolucao',
            'delete-devolucao',
            'read-relatorio',
        ];
        $bibliotecario->givePermissionTo($bibliotecarioPermissions);

        /**
         * Estudante
         */
        $estudante = Role::create(['name' => 'Estudante']);
        $estudantePermissions = [
            'read-livro',
            'read-emprestimo',
            'read-devolucao',
        ];
        $estudante->givePermissionTo($estudantePermissions);
    }
}
