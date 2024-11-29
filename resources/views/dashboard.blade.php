<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel de Controle') }}
        </h2>
    </x-slot>
    <x-container>
        <div class="p-6 text-gray-900">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Olá, :name!", ['name' => Auth::user()->name]) }}
            </h2>
        </div>
    </x-container>
</x-app-layout>
