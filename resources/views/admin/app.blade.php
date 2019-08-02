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
    <main class="">
        <div class="flex h-screen">
            <div class="w-1/6 text-left text-maintext font-bold bg-gray-200">
                <a href="/admin/products">
                    <div class="py-4 hover:bg-gray-300 pl-5 flex">
                        <img src="https://img.icons8.com/ios-glyphs/30/e98074/product.png" class="w-5 mr-5">
                        Products
                    </div>
                </a>
                <a href="#"><div class="py-4 pl-5">Stuff</div></a>
                <a href="#"><div class="py-4 pl-5">Stuff</div></a>
                <a href="#"><div class="py-4 pl-5">Stuff</div></a>
            </div>
            <div class="w-5/6 h-full p-5 border-l-2 bg-gray-100">
                @yield('content')
            </div>
        </div>
    </main>
</div>
</body>
</html>
