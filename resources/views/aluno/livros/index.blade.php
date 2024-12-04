<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Livros') }}
        </h2>
    </x-slot>
    <x-container>
        <!-- Formulário de Pesquisa -->
        <form method="GET" action="{{ route('livros.index') }}" class="mb-4 flex items-center">
            <input
                type="text"
                name="search"
                value="{{ request()->get('search') }}"
                class="w-full md:w-1/3 px-4 py-2 border border-gray-300 rounded-md"
                placeholder="Pesquisar livros...">
            <button
                type="submit"
                class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded-md">
                Buscar
            </button>
        </form>

        <!-- Exibindo os Livros -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($livros as $livro)
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="rounded-t-lg" src="https://placehold.co/600x400" alt="Book cover">
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $livro->titulo }}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700">
                            {{ Str::limit($livro->observacao, 150) }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginação -->
        <div class="mt-5">
            {{ $livros->links() }}
        </div>
    </x-container>
</x-app-layout>
