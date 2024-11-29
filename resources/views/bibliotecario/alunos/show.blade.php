<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alunos') }}
        </h2>
    </x-slot>
    <x-container>
        <x-tabs-index
            :list="['index' => 'Listagem', 'create' => 'Criar', 'view' => 'Visualizar', 'edit' => 'Editar']"
            :route="[ 'index' => route('alunos.index'), 'view' => route('alunos.show', $aluno->id), 'edit' => route('alunos.edit', $aluno->id), 'create' => route('alunos.create')]"
            :active="'view'" />
    </x-container>
</x-app-layout>
