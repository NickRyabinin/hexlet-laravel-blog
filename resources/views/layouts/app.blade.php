<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel Blog - @yield('title')</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="container mx-auto">
                    @if (session()->has('message'))
                        <div class="bg-green-500">
                            {{ session('message') }}
                        </div>
                    @endif
                    <h1 class="text-3xl px-2 mt-4">@yield('header')</h1>
                    <div class="px-2">
                        @yield('content')
                    </div>
                </div>
                @if (isset($slot))
                    {{ $slot }}
                @endif
            </main>
        </div>
    </body>
</html>
