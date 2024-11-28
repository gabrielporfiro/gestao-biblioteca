<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Domínios') }}
        </h2>
    </x-slot>
    <x-container>
        <x-tabs-index
            :list="['index' => 'Listagem', 'create' => 'Criar', 'edit' => 'Editar']"
            :route="[ 'index' => route('dominios.index'), 'view' => route('dominios.show', $dominio->id), 'edit' => route('dominios.edit', $dominio->id), 'create' => route('dominios.create')]"
            :active="'edit'" />
        <!-- Alerta de erro -->
        @if ($errors->any())
            <x-alerts-sessions tipo="erro" :errors="$errors" />
        @endif
        <!-- Alerta de sucesso -->
        @if (session('success'))
            <x-alerts-sessions tipo="sucesso" :message="session('success')" />
        @endif
        <!-- Alerta de erro -->
        @if (session('aviso'))
            <x-alerts-sessions tipo="aviso" :message="session('info')" />
        @endif
        <form method="POST" action="{{ route('dominios.update', $dominio->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Nome do Domínio:</strong>
                        <x-text-input name="nm_dominio" class="block mt-1 w-full" type="text" :value="$dominio->nm_dominio"
                                      required autofocus />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Tipo do Domínio:</strong>
                        <x-text-input name="tp_dominio" class="block mt-1 w-full" type="text" :value="$dominio->tp_dominio"
                                      required autofocus />
                    </div>
                </div>
                <div class="col-md-12 my-2 text-center">
                    <button type="submit" class="btn btn-success w-full"><span
                            data-feather="save"></span>Salvar</button>
                </div>
        </form>
    </x-container>
</x-app-layout>
