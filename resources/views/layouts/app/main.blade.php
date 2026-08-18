<!-- resources/views/layouts/app/main.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem ECommerce')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#faf7f2] text-slate-800 antialiased font-sans min-h-screen selection:bg-amber-500 selection:text-white">

    <div x-data="{ sidebarOpen: false, windowWidth: window.innerWidth }" 
        @resize.window="windowWidth = window.innerWidth; if(windowWidth >= 768) sidebarOpen = false;"
        class="relative grid grid-rows-[auto_1fr_1fr_1fr_auto] w-full h-screen overflow-hidden transition-all duration-300"
        :style="windowWidth < 768 ? 'grid-template-columns: 1fr;' : (sidebarOpen ? 'grid-template-columns: 260px minmax(0, 1fr);' : 'grid-template-columns: 50px minmax(0, 1fr);')">
        
        <div x-show="windowWidth < 768 && sidebarOpen" 
             @click="sidebarOpen = false"
             x-transition.opacity
             style="display: none;"
             class="fixed inset-0 bg-slate-900/50 z-40 md:hidden"></div>

        @include('layouts.app.partials.header')

        @include('layouts.app.partials.sidebar')

        @include('layouts.app.partials.contents')

        @include('layouts.app.partials.footer')

    </div>

    <!-- Komponen Global Feedbacks (Terpusat) -->
    @include('components.feedback.index')

</body>
</html>