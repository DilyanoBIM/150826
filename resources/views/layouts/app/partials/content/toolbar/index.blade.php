<!-- resources/views/layouts/app/partials/content/toolbar/index.blade.php -->
<div class="flex flex-wrap items-center justify-between gap-3 w-full">
    
    <div class="flex flex-wrap items-center gap-2">
        <x-app.ui.toolbar.toggle-view />
        <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block"></span>
        <x-app.ui.button.filter />
        <x-app.ui.button.sort />
        <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block mx-1"></span>
        
        <x-app.ui.searchbar 
            placeholder="Cari data... ( / )"
            wrapperClass="relative hidden md:block"
            iconWrapperClass="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none text-slate-400"
            iconClass="w-3.5 h-3.5"
            inputClass="w-40 lg:w-56 pl-8 pr-2.5 py-1.5 text-xs border border-slate-200 rounded-lg bg-white focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-500/10 transition-colors"
            aria-label="Cari data"
            x-ref="searchInput"
            x-model="search"
            @input.debounce.400ms="$dispatch('table-search', { query: search })"
        />
    </div>

    <div class="flex flex-wrap items-center gap-2">
        <x-app.ui.toolbar.refresh-button />
        <x-app.ui.toolbar.export-dropdown />
        <x-app.ui.button.print />
        <x-app.ui.button.import />
        <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block mx-1"></span>
        
        <!-- TOMBOL HAPUS DINAMIS -->
        <!-- Memanfaatkan x-text dan x-show dari state global (selectedCount) -->
        <button type="button" 
                @click="if(selectedCount > 0) { console.log('Hapus masal ID:', selectedItems); $dispatch('open-delete-modal', { items: selectedItems }) } else { window.ToastAlert.toast('Pilih minimal satu data untuk dihapus', 'warning') }"
                class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-rose-600 bg-white border border-rose-200 rounded-lg hover:bg-rose-50 hover:text-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500/20 transition-all shadow-sm">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            <!-- Teks berubah jika ada yang dicentang -->
            <span x-text="selectedCount > 0 ? 'Hapus (' + selectedCount + ')' : 'Hapus'"></span>
        </button>
        
        <x-app.ui.button.add href="{{ route('products.index') ?? '#' }}" />
    </div>
</div>