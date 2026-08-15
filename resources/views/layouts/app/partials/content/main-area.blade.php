<div class="flex-1 min-h-0 overflow-y-auto bg-white p-5 md:p-6 relative [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-slate-100 [&::-webkit-scrollbar-thumb]:bg-slate-300 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-400">
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