<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="icon" href="{{ asset('img/icono.ico') }}">

    <!-- Estilos de bootstrap -->

    <!-- Estilos css generales -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">{{-- mix('css/app.css') mix (mimify css - js) --}}
    <link href="{{ asset('css/base/general.css') }}"
        rel="stylesheet">
        <link href="{{ asset('css/base/menu.css') }}" rel="stylesheet">
        <link href="{{ asset('css/base/footer.css') }}" rel="stylesheet">

        <!-- Estilos cambiantes -->

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title></title>
</head>

<body>

    <div class="content">
        <!-- Incluir menú -->
        @include('layouts.menu')
        <section class="section">
            @yield('content')
        </section>

        <!-- Incluir footer -->
        @include('layouts.footer')
    </div>

    <!-- Scripts de bootstrap -->
</body>
@yield('script')
< script src="{{ mix('js/app.js') }}></script>
</html>
