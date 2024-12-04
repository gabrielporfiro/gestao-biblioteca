<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Livro') }}
        </h2>
    </x-slot>

    <x-container>
        <x-tabs-index
            :route="['index' => route('livro.index'), 'create' => route('livro.create'), 'edit' => route('livro.edit', $livro)]"
            :active="'edit'"
            :list="['index' => 'Listagem', 'create' => 'Criar', 'edit' => 'Editar']"
        />

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
        <form action="{{ route('livro.update', $livro->id) }}" method="POST" enctype="multipart/form-data" class="w-full mt-4">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Título -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Título:</strong>
                        <x-text-input type="text" name="titulo" class="block mt-1 w-full" value="{{ old('titulo', $livro->titulo) }}" required autofocus />
                        @error('titulo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Código -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Código:</strong>
                        <x-text-input type="text" name="codigo" class="block mt-1 w-full" value="{{ old('codigo', $livro->codigo) }}" required />
                        @error('codigo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Autor -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Autor:</strong>
                        <x-text-input type="text" name="autor" class="block mt-1 w-full" value="{{ old('autor', $livro->autor) }}" required />
                        @error('autor') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Editora -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Editora:</strong>
                        <x-text-input type="text" name="editora" class="block mt-1 w-full" value="{{ old('editora', $livro->editora) }}" required />
                        @error('editora') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Categoria -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Categoria:</strong>
                        <select name="categoria_livro_id" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 shadow-sm">
                            <option value="">Selecione a categoria</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_livro_id', $livro->categoria_livro_id) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nm_dominio }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria_livro_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Imagem -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Imagem:</strong>
                        <x-text-input type="file" name="imagem" class="block mt-1 w-full" />
                        @error('imagem') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Botão de Salvar -->
                <div class="col-md-12 my-2 text-center">
                    <button type="submit" class="btn btn-primary w-full">
                        <span data-feather="save"></span> Atualizar Livro
                    </button>
                </div>
            </div>
        </form>
    </x-container>
</x-app-layout>
