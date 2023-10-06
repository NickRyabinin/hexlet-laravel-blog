<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hexlet Blog - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />
    @vite('resources/css/app.css')
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>

    <ul class="flex">
        <li class="ml-6 mr-6">
            <a class="text-blue-500 hover:text-blue-800" href="/">Home</a>
        </li>
        <li class="mr-6">
            <a class="text-blue-500 hover:text-blue-800" href="{{ route('about') }}">About</a>
        </li>
        <li class="mr-6">
            <a class="text-blue-500 hover:text-blue-800" href="{{ route('articles.index') }}">Articles</a>
        </li>
    </ul>

    <div class="container mx-auto">
        @if (session()->has('message'))
            <div class="bg-green-500">
                {{ session('message') }}
            </div>
        @endif
        <h1 class="text-3xl">@yield('header')</h1>
        <div>
            @yield('content')
        </div>
    </div>
</body>

</html>
