<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>
    <x-container>
        <x-tabs-index
            :list="['index' => 'Listagem', 'create' => 'Criar', 'view' => 'Visualizar', 'edit' => 'Editar']"
            :route="[ 'index' => route('usuarios.index'), 'view' => route('usuarios.show', $user->id), 'edit' => route('usuarios.edit', $user->id), 'create' => route('usuarios.create')]"
            :active="'view'" />
    </x-container>
</x-app-layout>
