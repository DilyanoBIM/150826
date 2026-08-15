@hasSection('content_header')
    <div class="shrink-0 px-5 md:px-6 py-2.5 md:py-3 border-b border-slate-200 bg-slate-50 z-20 flex items-center justify-between gap-4">
        <div class="flex-1 w-full min-w-0">
            @yield('content_header')
        </div>
        
        <x-app.ui.collapse-button 
            state="showToolbar" 
            titleHide="Sembunyikan Toolbar" 
            titleShow="Tampilkan Toolbar" 
        />
    </div>
@endif