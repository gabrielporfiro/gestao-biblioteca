<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estoque do Livro') }}
        </h2>
    </x-slot>

    <x-container>
        <x-tabs-index
            :route="['index' => route('livro.index'), 'create' => route('livro.create'), 'edit' => route('livro.edit', $livro), 'emprestimos' => route('livro.emprestimo', $livro), 'estoque' => route('livro.estoque', $livro)]"
            :active="'estoque'"
            :list="['index' => 'Listagem', 'create' => 'Criar', 'edit' => 'Editar', 'emprestimos' => 'Empréstimos', 'estoque' => 'Estoque']"
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
        <form action="" method="POST" enctype="multipart/form-data" class="w-full mt-4">
            @csrf

            <div class="row">
                <!-- Alunos -->
                @foreach($estoques as $estoque)
               <!-- Aparecer um campo disabled do statusStoque e o input na frente com valor editavel da quantidade do estoque  -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Status:</strong>

                        <x-text-input type="text" name="status" class="block mt-1 w-full" value="{{ $estoque->statusEstoque->nm_dominio }}" disabled />
                        <x-text-input type="number" name="quantidade" class="block mt-1 w-full" value="{{ $estoque->quantidade }}" required autofocus />
                        @error('quantidade') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                @endforeach
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
