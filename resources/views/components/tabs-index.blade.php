@props([
    'active' => 'index',
    'list' => ['index' => 'Listagem', 'create' => 'Criar'],
    'route' => ['index' => '#', 'create' => '#'],
])

<div class="text-sm font-medium text-center text-gray-500">
    <ul class="flex flex-wrap -mb-px">
        @foreach ($list as $key => $label)
            <li class="me-2">
                <a href="{{ $route[$key] }}"
                   class="inline-block p-4
                        {{ $active === $key ? 'text-blue-600 border-b-2 border-blue-600' : 'border-transparent hover:text-gray-600 hover:border-gray-300' }}
                        rounded-t-lg"
                   aria-current="{{ $active === $key ? 'page' : '' }}">
                    {{ $label }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
