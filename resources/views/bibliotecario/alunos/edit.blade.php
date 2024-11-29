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
        <form method="POST" action="{{ route('alunos.update', $aluno->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <!-- Nome -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <x-text-input name="name" class="block mt-1 w-full" type="text" :value="$aluno->user->name"
                                      required autofocus />
                    </div>
                </div>
                <!-- Email -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                      :value="$aluno->user->email"
                                      required autofocus autocomplete="email" />
                    </div>
                </div>
                <!-- Senha -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Senha:</strong>
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                      autocomplete="new-password" />
                    </div>
                </div>
                <!-- Confirmar Senha -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Confirmar senha:</strong>
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                      name="password_confirmation" autocomplete="new-password" />
                    </div>
                </div>
                <!-- Matrícula -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Matrícula:</strong>
                        <x-text-input name="matricula" class="block mt-1 w-full" type="text" :value="$aluno->matricula"
                                      required />
                    </div>
                </div>
                <!-- Telefone -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Telefone:</strong>
                        <x-text-input name="telefone" class="block mt-1 w-full" type="text" :value="$aluno->telefone"
                                      required />
                    </div>
                </div>
                <!-- Endereço -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Endereço:</strong>
                        <x-text-input name="endereco" class="block mt-1 w-full" type="text" :value="$aluno->endereco" />
                    </div>
                </div>
                <!-- Cidade -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Cidade:</strong>
                        <x-text-input name="cidade" class="block mt-1 w-full" type="text" :value="$aluno->cidade" />
                    </div>
                </div>
                <!-- Estado -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Estado:</strong>
                        <x-text-input name="estado" class="block mt-1 w-full" type="text" :value="$aluno->estado" />
                    </div>
                </div>
                <!-- CEP -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>CEP:</strong>
                        <x-text-input name="cep" class="block mt-1 w-full" type="text" :value="$aluno->cep" />
                    </div>
                </div>
                <!-- Documento -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Documento:</strong>
                        <x-text-input name="documento" class="block mt-1 w-full" type="text" :value="$aluno->documento" />
                    </div>
                </div>
                <!-- Imagem -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Imagem (opcional):</strong>
                        <x-text-input name="imagem" class="block mt-1 w-full" type="file" :value="$aluno->imagem" />
                    </div>
                </div>
                <!-- Observação -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Observação:</strong>
                        <x-textarea name="observacao" class="block mt-1 w-full">{{ $aluno->observacao }}</x-textarea>
                    </div>
                </div>
                <!-- Faculdade -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Faculdade:</strong>
                        <select name="faculdade_id" class="block mt-1 w-full">
                            @foreach($faculdades as $faculdade)
                                <option value="{{ $faculdade->id }}" {{ $faculdade->id == $aluno->faculdade_id ? 'selected' : '' }}>
                                    {{ $faculdade->nome }}
                                </option>
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
