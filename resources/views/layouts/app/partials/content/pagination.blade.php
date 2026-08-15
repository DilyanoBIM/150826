<!-- resource/views/layouts/app/partials/content/pagination.blade.php -->
@hasSection('content_pagination')
    <div class="shrink-0 px-5 md:px-6 py-2.5 border-t border-slate-200 bg-white flex items-center justify-between gap-4">
        @yield('content_pagination')
    </div>
@endif