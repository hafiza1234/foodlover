<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="/css/google-font.css">
        <link type="text/css" rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="/css/bootstrap.min.css"  crossorigin="anonymous">
        {{-- <link type="text/css" rel="stylesheet" href="css/media.css"> --}}
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @section('header')
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-{{ $py ?? 6 }} px-4 sm:px-6 lg:px-8">
                    {{ $header ?? '' }}
                </div>
            </header>
            @show

            <!-- Page Content -->
            <main class="container-fluid">
                {{ $slot }}
            </main>
        </div>

        <script src="/js/jquery-3.5.1.slim.min.js"  crossorigin="anonymous"></script>
        <script src="/js/popper.min.js" crossorigin="anonymous"></script>
        <script src="/js/bootstrap.min.js"  crossorigin="anonymous"></script>
    </body>
</html>
