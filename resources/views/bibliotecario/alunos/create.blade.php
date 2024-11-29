<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alunos') }}
        </h2>
    </x-slot>

    <x-container>
        <x-tabs-index :route="['index' => route('alunos.index'), 'create' => route('alunos.create')]" :active="'create'"/>

        <!-- Alerta de erro -->
        @if ($errors->any())
            <x-alerts-sessions tipo="erro" :errors="$errors" />
        @endif

        <!-- Alerta de sucesso -->
        @if (session('success'))
            <x-alerts-sessions tipo="sucesso" :message="session('success')" />
        @endif

        <!-- Alerta de aviso -->
        @if (session('aviso'))
            <x-alerts-sessions tipo="aviso" :message="session('info')" />
        @endif

        <!-- Formulário -->
        <form action="{{ route('alunos.store') }}" method="POST" enctype="multipart/form-data" class="w-full mt-4">
            @csrf

            <div class="row">
                <!-- Nome do Aluno -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <x-text-input name="name" class="block mt-1 w-full" type="text" :value="old('name')" required autofocus />
                        @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Email do Aluno -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                        @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Senha -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Senha:</strong>
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Confirmar Senha -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Confirmar senha:</strong>
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        @error('password_confirmation') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Telefone -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Telefone:</strong>
                        <x-text-input name="telefone" class="block mt-1 w-full" type="text" :value="old('telefone')" required />
                        @error('telefone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Endereço -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Endereço:</strong>
                        <x-text-input name="endereco" class="block mt-1 w-full" type="text" :value="old('endereco')" required />
                        @error('endereco') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Cidade -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Cidade:</strong>
                        <x-text-input name="cidade" class="block mt-1 w-full" type="text" :value="old('cidade')" required />
                        @error('cidade') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Estado -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Estado:</strong>
                        <x-text-input name="estado" class="block mt-1 w-full" type="text" :value="old('estado')" required />
                        @error('estado') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- CEP -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>CEP:</strong>
                        <x-text-input name="cep" class="block mt-1 w-full" type="text" :value="old('cep')" required />
                        @error('cep') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Documento (por exemplo, RG ou CPF) -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Documento:</strong>
                        <x-text-input name="documento" class="block mt-1 w-full" type="text" :value="old('documento')" required />
                        @error('documento') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Imagem -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Imagem (opcional):</strong>
                        <x-text-input name="imagem" class="block mt-1 w-full" type="file" />
                        @error('imagem') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Observação -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Observação:</strong>
                        <x-textarea name="observacao" class="block mt-1 w-full">{{ old('observacao') }}</x-textarea>
                        @error('observacao') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Faculdade -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Faculdade:</strong>
                        <select name="faculdade_id" class="block mt-1 w-full" required>
                            <option value="">Selecione a faculdade</option>
                            @foreach ($faculdades as $faculdade)
                                <option value="{{ $faculdade->id }}" {{ old('faculdade_id') == $faculdade->id ? 'selected' : '' }}>
                                    {{ $faculdade->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('faculdade_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Botão de Salvar -->
                <div class="col-md-12 my-2 text-center">
                    <button type="submit" class="btn btn-success w-full">
                        <span data-feather="save"></span> Salvar
                    </button>
                </div>
            </div>
        </form>
    </x-container>
</x-app-layout>
