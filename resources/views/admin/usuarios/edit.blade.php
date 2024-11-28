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
        <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <x-text-input name="name" class="block mt-1 w-full" type="text" :value="$user->name"
                                      required autofocus />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                      :value="$user->email" required autofocus autocomplete="email" />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Senha:</strong>
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                      autocomplete="new-password" />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Confirmar senha:</strong>
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                      name="password_confirmation" autocomplete="new-password" />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Função:</strong>
                        <select name="roles[]" class="form-select js-example-basic-single">
                            <option value="">Selecione a função</option>
                            @foreach ($roles as $key => $role)
                                @if (isset($user->roles[0]) && $user->roles[0]->id == $role->id)
                                    <option value="{{ $role->name }}" selected>{{ $role->name }}
                                    </option>
                                @else
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-12 my-2 text-center">
                    <button type="submit" class="btn btn-success w-full"><span
                            data-feather="save"></span>Salvar</button>
                </div>
        </form>
    </x-container>
</x-app-layout>
