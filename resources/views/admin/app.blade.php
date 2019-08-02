<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('layouts.navbar')
    <main class="py-4 container mx-auto">
        <div class="w-3/4 mx-auto flex">
            <div class="w-1/6 text-left">
                <a href="/admin/products"><div class="py-3 hover:bg-gray-100 pl-3">Products</div></a>
                <a href="#"><div class="py-3 pl-3">Stuff</div></a>
                <a href="#"><div class="py-3 pl-3">Stuff</div></a>
                <a href="#"><div class="py-3 pl-3">Stuff</div></a>
            </div>
            <div class="w-5/6 p-5 border-l-2 bg-gray-100">
                @yield('content')
            </div>
        </div>
    </main>
</div>
</body>
</html>
