<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>
    <x-container>

        <x-tabs-index :route="['index' => route('usuarios.index'), 'create' => route('usuarios.create')]" />
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
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Função</th>
                    <th width="280px">Ações</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach ($usuarios as $key => $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="inline-flex gap-2">
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $v)
                                        <span class="badge bg-success">{{ $v }}</span>
                                    @endforeach
                                @endif
                            </div>
                        </td>
                        <td>
                                <a class="btn btn-primary" href="{{ route('usuarios.edit', $user->id) }}">Editar</a>
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
                                                    Excluir Usuário
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('usuarios.destroy', $user->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p>Tem certeza de que deseja excluir o usuário
                                                        {{ $user->name }}?</p>
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
    </x-container>
</x-app-layout>
