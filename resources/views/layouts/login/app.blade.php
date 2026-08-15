<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Auth Page')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen flex items-center justify-center p-4 antialiased selection:bg-sky-500 selection:text-white">

    @yield('content')
    @include('network.sweetalert') <!-- SweetAlert Global untuk menangkap error Login/Register -->

</body>
</html>