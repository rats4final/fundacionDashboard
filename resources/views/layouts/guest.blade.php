<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        @vite(['resources/sass/app.scss','resources/js/app.js'])
{{--        <!-- Styles -->--}}
{{--        <link rel="stylesheet" href="{{ asset('build/assets/app-d152a3f5.css') }}">--}}

{{--        <!-- Scripts -->--}}
{{--        <script src="{{ asset('build/assets/app-333522fd.js') }}" defer></script>--}}
    </head>
    <body class="font-sans antialiased bg-light">
        {{ $slot }}
    </body>
</html>
