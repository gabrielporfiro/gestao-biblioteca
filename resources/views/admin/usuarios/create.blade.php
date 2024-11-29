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
            <x-alerts-sessions tipo="erro" :mensagens="$errors" />
            @dd($errors)
        @endif
        <!-- Alerta de sucesso -->
        @if (session('success'))
            <x-alerts-sessions tipo="sucesso" :mensagens="session('success')" />
        @endif
        <!-- Alerta de erro -->
        @if (session('aviso'))
            <x-alerts-sessions tipo="aviso" :mensagens="session('info')" />
        @endif
        <form action="{{ route('usuarios.store') }}" method="POST" class="w-full mt-4">
            @csrf
            <div class="row">
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <x-text-input name="name" class="block mt-1 w-full" type="text" :value="old('name')" required autofocus />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Senha:</strong>
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Confirmar senha:</strong>
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Função:</strong>
                        <select name="roles[]" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="role-select">
                            <option value="">Selecione a função</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" {{ old('roles') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Campos específicos para 'Aluno' -->
                <div class="col-md-12 my-2" id="aluno-fields" style="display:none;">
                    <div class="form-group">
                        <strong>Matricula:</strong>
                        <x-text-input name="matricula" class="block mt-1 w-full" type="text" :value="old('matricula')" />
                    </div>
                    <div class="form-group">
                        <strong>Telefone:</strong>
                        <x-text-input name="telefone" class="block mt-1 w-full" type="text" :value="old('telefone')" />
                    </div>
                    <div class="form-group">
                        <strong>Endereço:</strong>
                        <x-text-input name="endereco" class="block mt-1 w-full" type="text" :value="old('endereco')" />
                    </div>
                    <div class="form-group">
                        <strong>Cidade:</strong>
                        <x-text-input name="cidade" class="block mt-1 w-full" type="text" :value="old('cidade')" />
                    </div>
                    <div class="form-group">
                        <strong>Estado:</strong>
                        <x-text-input name="estado" class="block mt-1 w-full" type="text" :value="old('estado')" />
                    </div>
                    <div class="form-group">
                        <strong>CEP:</strong>
                        <x-text-input name="cep" class="block mt-1 w-full" type="text" :value="old('cep')" />
                    </div>
                    <div class="form-group">
                        <strong>País:</strong>
                        <x-text-input name="pais" class="block mt-1 w-full" type="text" :value="old('pais')" />
                    </div>
                </div>

                <!-- Campos específicos para 'Bibliotecario' -->
                <div class="col-md-12 my-2" id="bibliotecario-fields" style="display:none;">
                    <div class="form-group">
                        <strong>Faculdade:</strong>
                        <select name="faculdade_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="">Selecione a faculdade</option>
                            @foreach ($faculdades as $faculdade)
                                <option value="{{ $faculdade->id }}" {{ old('faculdade_id') == $faculdade->id ? 'selected' : '' }}>{{ $faculdade->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Matricula:</strong>
                        <x-text-input name="matricula" class="block mt-1 w-full" type="text" :value="old('matricula')" />
                    </div>
                </div>

                <div class="col-md-12 my-2 text-center">
                    <button type="submit" class="btn btn-success w-full"><span data-feather="save"></span>Salvar</button>
                </div>
            </div>
        </form>

        <script>
            document.getElementById('role-select').addEventListener('change', function () {
                const role = this.value;
                console.log(role);
                const alunoFields = document.getElementById('aluno-fields');
                const bibliotecarioFields = document.getElementById('bibliotecario-fields');

                // Esconde todos os campos e então mostra o necessário
                alunoFields.style.display = 'none';
                bibliotecarioFields.style.display = 'none';

                if (role === 'Aluno') {
                    alunoFields.style.display = 'block';
                } else if (role === 'Bibliotecario') {
                    bibliotecarioFields.style.display = 'block';
                }
            });
        </script>
    </x-container>
</x-app-layout>
