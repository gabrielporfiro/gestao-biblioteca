<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Livros') }}
        </h2>
    </x-slot>
    <x-container>
        <x-tabs-index :route="['index' => route('livro.index'), 'create' => route('livro.create')]" />
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
        <table class="table w-100 display responsive nowrap table-striped table-bordered border-top mt-4">
            <thead>
            <tr>
                <th>Nº</th>
                <th>Código</th>
                <th>Titulo</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($livros as $key => $l)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $l->codigo }}</td>
                    <td>{{ $l->titulo }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('livro.emprestimo', $l->id) }}">Realizar Emprestimo</a>
                        <a class="btn btn-success" href="{{ route('livro.edit', $l->id) }}">Estoque</a>
                        <a class="btn btn-primary" href="{{ route('livro.edit', $l->id) }}">Editar</a>
                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop{{ $i }}">Excluir</button>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop{{ $i }}"
                             data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                             aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                            Excluir
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('livro.destroy', $l->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <p>Tem certeza de que deseja excluir o domínio?</p>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit"
                                                        class="btn btn-danger">Excluir</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $livros->links() !!}
        </div>
    </x-container>
</x-app-layout>
