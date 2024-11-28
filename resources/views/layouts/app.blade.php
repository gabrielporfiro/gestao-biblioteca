<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.3.2/css/searchPanes.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/2.0.5/css/select.dataTables.css" />

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
            integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" />
    <!-- Imask -->
    <script src="https://unpkg.com/imask"></script>
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/2.3.2/js/dataTables.searchPanes.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/2.3.2/js/searchPanes.dataTables.js"></script>
    <script src="https://cdn.datatables.net/select/2.0.5/js/dataTables.select.js"></script>
    <script src="https://cdn.datatables.net/select/2.0.5/js/select.dataTables.js"></script>

    <!-- Select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script>
    var element = document.querySelectorAll('input[data-mask="somenteLetras"]');
    element.forEach(function(el) {
        var maskOptions = {
            mask: /^[a-zöüóőúéáàűíÖÜÓŐÚÉÁÀŰÍçÇ ]{0,100}$/i
        }

        var mask = IMask(el, maskOptions);
    });
    // input[data-mask="somenteNumeros"]
    var element = document.querySelectorAll('input[data-mask="somenteNumeros"]');
    element.forEach(function(el) {
        var maskOptions = {
            mask: /^[0-9]{0,100}$/i
        }
        var mask = IMask(el, maskOptions);
    });
    // input[data-mask="cpf"]
    var element = document.querySelectorAll('input[data-mask="cpf"]');
    element.forEach(function(el) {
        var maskOptions = {
            mask: '000.000.000-00'
        }
        var mask = IMask(el, maskOptions);
    });
    // input[data-mask="cep"]
    var element = document.querySelectorAll('input[data-mask="cep"]');
    element.forEach(function(el) {
        var maskOptions = {
            mask: '00000-000'
        }
        var mask = IMask(el, maskOptions);
    });
    // input[data-mask="telefone"]
    var element = document.querySelectorAll('input[data-mask="telefone"]');
    element.forEach(function(el) {
        var maskOptions = {
            mask: '(00) 00000-0000'
        }
        var mask = IMask(el, maskOptions);
    });
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@stack('scripts')

</body>

</html>
