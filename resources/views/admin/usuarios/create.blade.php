<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>
    <x-container>
        <x-tabs-index :route="['index' => route('usuarios.index'), 'create' => route('usuarios.create')]" :active="'create'"/>
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
        <form action="{{ route('usuarios.store') }}" method="POST" class="w-full mt-4">
            @csrf
            <div class="row">
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <x-text-input name="name" class="block mt-1 w-full" type="text" :value="old('name')"
                                      required autofocus />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                      :value="old('email')" required autofocus autocomplete="email" />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Senha:</strong>
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                      required autocomplete="new-password" />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Confirmar senha:</strong>
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                      name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Função:</strong>
                        <select name="roles[]" class="form-select js-example-basic-single">
                            <option value="">Selecione a função</option>
                            @foreach ($roles as $key => $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
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
