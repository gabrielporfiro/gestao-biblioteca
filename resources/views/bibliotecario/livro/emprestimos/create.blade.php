<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Empréstimo de Livro') }}
        </h2>
    </x-slot>

    <x-container>
        <x-tabs-index
            :route="['index' => route('livro.index'), 'create' => route('livro.create'), 'edit' => route('livro.edit', $livro), 'emprestimos' => route('livro.emprestimo', $livro), 'estoque' => route('livro.estoque', $livro)]"
            :active="'emprestimos'"
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
        <form action="{{ route('alunos.store') }}" method="POST" enctype="multipart/form-data" class="w-full mt-4">
            @csrf

            <div class="row">
                <!-- Alunos -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Aluno:</strong>
                        <select name="aluno_id" class="block mt-1 w-full" required>
                            <option value="">Selecione um aluno</option>
                            @foreach ($alunos as $aluno)
                                <option value="{{ $aluno->id }}">{{ $aluno->user->name }}</option>
                            @endforeach
                        </select>
                        @error('aluno_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>
                <!-- End Alunos -->

                <!-- Total de dias -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Total de dias:</strong>
                        <x-text-input name="total_dias" class="block mt-1 w-full" type="number" :value="7" min="1" required autofocus />
                        @error('total_dias') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Data de empréstimo -->
                <div class="col-md-12 my-2">
                    <div class="form-group">
                        <strong>Data de empréstimo:</strong>
                        <x-text-input name="data_emprestimo" class="block mt-1 w-full" type="date" :value="now()->format('Y-m-d')" required autofocus />
                        @error('data_emprestimo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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
