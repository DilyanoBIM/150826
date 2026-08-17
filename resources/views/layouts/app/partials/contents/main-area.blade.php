<!-- resources/views/layouts/app/partials/contents/main-area.blade.php -->

{{--
    Partial ini adalah "jembatan" antara toolbar (yang men-dispatch event
    toolbar-add, toolbar-save, toolbar-edit, dst) dengan area konten (<main>).

    Cara kerja:
    1. Wrapper x-data="mainArea()" MENDENGARKAN semua event yang di-dispatch
       toolbar lewat $dispatch('toolbar-xxx') di window.
    2. Setiap event yang tertangkap akan diteruskan (re-dispatch) sebagai
       event lokal 'main-toolbar-action' di dalam scope <main> itu sendiri
       (TIDAK di window), supaya konten yang di-@yield('content') bisa
       menangkapnya cukup dengan:
         <div x-on:main-toolbar-action="if ($event.detail.action === 'add') ..."> 
       tanpa perlu tahu detail nama event toolbar aslinya.
    3. Jika halaman memakai Livewire, event juga otomatis diteruskan ke
       method Livewire (opsional) lewat $wire.dispatch(), sehingga
       Livewire component di dalam @yield('content') bisa punya:
         #[On('main-toolbar-action')]
         public function onToolbarAction($action, $payload = null) { ... }
--}}

<div
    class="flex-1 flex flex-row overflow-hidden relative {{ $mainAreaWrapperClass ?? '' }}"
    x-data="mainArea({ debug: {{ $mainAreaDebug ?? 'false' }} })"

    {{-- === Daftar event yang "didengarkan" dari toolbar === --}}
    x-on:toolbar-add.window="handle('add', $event.detail)"
    x-on:toolbar-save.window="handle('save', $event.detail)"
    x-on:toolbar-show.window="handle('show', $event.detail)"
    x-on:toolbar-edit.window="handle('edit', $event.detail)"
    x-on:toolbar-duplicate.window="handle('duplicate', $event.detail)"
    x-on:toolbar-archive.window="handle('archive', $event.detail)"
    x-on:toolbar-delete.window="handle('delete', $event.detail)"
    x-on:toolbar-undo.window="handle('undo', $event.detail)"
    x-on:toolbar-redo.window="handle('redo', $event.detail)"
    x-on:toolbar-history.window="handle('history', $event.detail)"
    x-on:toolbar-date-filter.window="handle('date-filter', $event.detail)"
    x-on:toolbar-filter.window="handle('filter', $event.detail)"
    x-on:toolbar-view.window="handle('view', $event.detail)"
    x-on:toolbar-columns.window="handle('columns', $event.detail)"
    x-on:toolbar-import.window="handle('import', $event.detail)"
    x-on:toolbar-export.window="handle('export', $event.detail)"
    x-on:toolbar-print.window="handle('print', $event.detail)"
    x-on:toolbar-sync.window="handle('sync', $event.detail)"
    x-on:toolbar-refresh.window="handle('refresh', $event.detail)"
    x-on:toolbar-fullscreen.window="handle('fullscreen', $event.detail)"
    x-on:toolbar-settings.window="handle('settings', $event.detail)"
>

    <main
        id="{{ $mainContentId ?? 'main-content-area' }}"
        x-ref="mainContent"
        {!! $mainAttributes ?? '' !!}
        class="relative w-full h-full overflow-y-auto overflow-x-hidden flex-1 {{ $mainContentClass ?? '' }}"
        data-current-view="{{ $currentView ?? 'table' }}"
    >
        <div class="w-full p-4 md:p-6 lg:p-8">
            @yield('content')
            {{ $slot ?? '' }}
        </div>
    </main>

    @if($showRightPanel ?? true)
    <aside class="w-80 border-l border-slate-200 bg-slate-50/50 hidden xl:flex flex-col shrink-0 overflow-y-auto z-10 transition-transform duration-300 transform translate-x-0 {{ $rightPanelClass ?? '' }}">
        <div class="flex items-center justify-between px-4 py-3 border-b border-slate-200 bg-slate-50 sticky top-0">
            <h3 class="text-sm font-semibold text-slate-800">{{ $rightPanelTitle ?? 'Detail Informasi' }}</h3>
            <button type="button" @click="$dispatch('toolbar-close-panel')" class="text-slate-400 hover:text-slate-600 transition-colors cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <div class="p-4 flex flex-col gap-4 h-full">
            @hasSection('right_panel')
                @yield('right_panel')
            @else
                <div class="text-xs text-slate-500 text-center py-10 border-2 border-dashed border-slate-200 rounded-lg">
                    {{ $rightPanelEmptyText ?? 'Pilih baris data untuk melihat detail' }}
                </div>
            @endif
        </div>
    </aside>
    @endif

</div>

@once
<script>
    function mainArea(config = {}) {
        return {
            debug: config.debug ?? false,

            /**
             * Dipanggil setiap kali toolbar men-dispatch salah satu event toolbar-*.
             * action  : string, mis. 'add', 'save', 'edit', 'view'
             * payload : mixed, isi $event.detail asli (mis. untuk toolbar-view: 'table'/'grid'/'board')
             */
            handle(action, payload = null) {
                if (this.debug) {
                    console.log('[main-area] toolbar action tertangkap:', action, payload);
                }

                // 1) Teruskan sebagai event LOKAL (tidak sampai ke window lagi)
                //    supaya konten di dalam <main> bisa menangkapnya tanpa
                //    perlu tahu nama event toolbar aslinya.
                this.$dispatch('main-toolbar-action', { action, payload });

                // 2) Jika halaman ini di-render di dalam komponen Livewire,
                //    teruskan juga ke Livewire (opsional, aman jika Livewire tidak ada).
                if (this.$wire) {
                    try {
                        this.$wire.dispatch('main-toolbar-action', { action, payload });
                    } catch (e) {
                        if (this.debug) console.warn('[main-area] gagal forward ke Livewire:', e);
                    }
                }
            },
        };
    }
</script>
@endonce