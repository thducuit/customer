<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>

        <!-- Scripts -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.10/lodash.core.js"></script>
    	<script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
