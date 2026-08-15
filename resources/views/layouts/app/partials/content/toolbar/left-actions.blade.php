<div class="flex flex-wrap items-center gap-2">
    <button type="button" @click="showExtras = !showExtras"
            class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-white border border-sky-200 text-sky-600 hover:bg-sky-50 rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap"
            :title="showExtras ? 'Ringkas tampilan (sembunyikan tab & statistik)' : 'Tampilkan tab & statistik'">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path x-show="showExtras" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l5-5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
            <path x-show="!showExtras" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H4m0 0v4m0-4l5 5m7-5h4m0 0v4m0-4l-5 5M8 20H4m0 0v-4m0 4l5-5m7 5h4m0 0v-4m0 4l-5-5"></path>
        </svg>
        <span class="hidden sm:inline" x-text="showExtras ? 'Ringkas' : 'Perluas'"></span>
    </button>

    <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block"></span>

    <x-app.ui.button-action 
        text="Filter" 
        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>' 
    />

    <x-app.ui.button-action 
        text="Urutkan" 
        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path></svg>' 
    />

    <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block mx-1"></span>

    <x-app.ui.button-action 
        text="Print" 
        class="hover:text-sky-600"
        icon='<svg class="text-inherit" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>' 
    />

    @include('layouts.app.partials.content.toolbar.export-dropdown')
</div>