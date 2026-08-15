@hasSection('content_tabs')
    <div x-show="showExtras"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
        <div class="shrink-0 px-5 md:px-6 border-b border-slate-200 flex items-center gap-1 overflow-x-auto bg-white">
            @yield('content_tabs')
        </div>
    </div>
@endif