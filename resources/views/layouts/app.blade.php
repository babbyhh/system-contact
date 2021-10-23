<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contact | @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">

    </head>
    <body >
        @include('layouts.menu')
        <main >
            @yield('content')
        </main>
        @include('layouts.rodape')
        <script type="text/javascript" src="{{ mix('js/app.js') }}"> </script>
        <!-- <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script> -->
        
        @stack('scripts')
    </body>
</html>