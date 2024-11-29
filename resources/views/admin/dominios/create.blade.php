<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Domínios') }}
        </h2>
    </x-slot>
    <x-container>
        <x-tabs-index :route="['index' => route('dominios.index'), 'create' => route('dominios.create')]" :active="'create'"/>
        <!-- Alerta de erro -->
        @if ($errors->any())
            <x-alerts-sessions tipo="erro" :mensagens="$errors" />
        @endif
        <!-- Alerta de sucesso -->
        @if (session('success'))
            <x-alerts-sessions tipo="sucesso" :mensagens="session('success')" />
        @endif
        <!-- Alerta de erro -->
        @if (session('aviso'))
            <x-alerts-sessions tipo="aviso" :mensagens="session('info')" />
        @endif
        <form action="{{ route('dominios.store') }}" method="POST" class="w-full mt-4">
            @csrf
            <div class="row">
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Nome do Domínio:</strong>
                        <x-text-input name="nm_dominio" class="block mt-1 w-full" type="text" :value="old('nm_dominio')"
                                      required autofocus />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Tipo do Domínio:</strong>
                        <x-text-input name="tp_dominio" class="block mt-1 w-full" type="text" :value="old('tp_dominio')"
                                      required autofocus />
                    </div>
                </div>

                <div class="col-md-12 my-2 text-center">
                    <button type="submit" class="btn btn-success w-full"><span
                            data-feather="save"></span>Salvar</button>
                </div>
            </div>
        </form>
    </x-container>
</x-app-layout>
