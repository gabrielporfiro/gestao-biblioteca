<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Domínios') }}
        </h2>
    </x-slot>
    <x-container>

        <x-tabs-index :route="['index' => route('dominios.index'), 'create' => route('dominios.create')]" />
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
                    <th>Tipo do Domínio</th>
                    <th>Nome do Domínio</th>
                    <th>Número da Ordem</th>
                    <th>Código do Domínio</th>
                    <th width="280px">Ações</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($dominios as $key => $dominio)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $dominio->tp_dominio }}</td>
                        <td>{{ $dominio->nm_dominio }}</td>
                        <td>{{ $dominio->nr_ordem }}</td>
                        <td>{{ $dominio->nm_code }}</td>
                        <td>
                                <a class="btn btn-primary" href="{{ route('dominios.edit', $dominio->id) }}">Editar</a>
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
                                                <form action="{{ route('dominios.destroy', $dominio->id) }}"
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
                {!! $dominios->links() !!}
            </div>
    </x-container>
</x-app-layout>