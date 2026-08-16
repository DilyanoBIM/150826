<!-- resources/views/layouts/app/partials/content/main-area.blade.php -->
<div x-data="{ isRefreshingArea: false }"
     @trigger-refresh.window="
        isRefreshingArea = true;
        // Waktu simulasi disamakan dengan delay di tombol (800ms)
        setTimeout(() => isRefreshingArea = false, 800);
     "
     class="flex-1 min-h-0 overflow-y-auto bg-white p-5 md:p-6 relative [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-slate-100 [&::-webkit-scrollbar-thumb]:bg-slate-300 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-400">
    
    <!-- Overlay Loading Effect (Tertampil saat Refresh) -->
    <div x-show="isRefreshingArea" 
         x-transition.opacity 
         x-cloak
         class="absolute inset-0 z-20 bg-white/50 backdrop-blur-[2px] flex items-center justify-center">
        <x-app.ui.loading-spinner text="Refreshing..." iconClass="h-7 w-7 text-sky-600" class="text-sky-700 font-semibold" />
    </div>

    @hasSection('content_alert')
        <div class="mb-5">
            @yield('content_alert')
        </div>
    @endif

    @hasSection('content')
        @yield('content')
    @else
        <x-app.ui.empty-state />
    @endif
</div>