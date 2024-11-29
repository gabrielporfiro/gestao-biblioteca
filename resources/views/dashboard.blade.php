<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel de Controle') }}
        </h2>
    </x-slot>
    <x-container>
        <div class="p-6 text-gray-900">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Olá, :name!", ['name' => Auth::user()->name]) }}
            </h2>
        </div>
    </x-container>
    @role('Aluno')
    <x-container class="py-0">
        <div class="text-gray-900 mb-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Livros Emprestados") }}
            </h2>
        </div>
        <table class="table w-100 display responsive nowrap table-striped table-bordered border-top">
            <thead>
            <tr>
                <th>Nº</th>
                <th>Título</th>
                <th>Data de Empréstimo</th>
                <th>Data para Entrega</th>
                <th>Total de Renovações</th>
                <th>Bibliotecário Responsável</th>
                <th>Observações</th>
            </tr>
            </thead>
            <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($emprestimos as $key => $aluno)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $aluno->livro->titulo }}</td>
                    <td>{{ $aluno->dh_emprestimo->format('d/m/Y') }}</td>
                    <td>{{ $aluno->dh_emprestimo->addDays($aluno->total_dias * ($aluno->total_renovacoes + 1))->format('d/m/Y') }}</td>
                    <td>{{ $aluno->total_renovacoes }}</td>
                    <td>{{ $aluno->bibliotecario->user->name }}</td>
                    <td>{{ $aluno->observacoes }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {!! $emprestimos->links() !!}
        </div>
    </x-container>
    @endrole
</x-app-layout>
