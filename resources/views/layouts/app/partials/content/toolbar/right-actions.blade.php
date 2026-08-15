<div class="flex items-center gap-2">
    
    <x-app.searchbar 
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

    <x-app.ui.button-action 
        text="Import" 
        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>' 
    />

    <x-app.ui.button-action 
        text="Export" 
        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>' 
    />

    <x-app.ui.button-action 
        variant="icon-only"
        title="Muat Ulang Data"
        @click="doRefresh()"
        :disabled="refreshing"
        icon='<svg :class="refreshing && \'animate-spin\'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>' 
    />

    <x-app.ui.button-action 
        variant="danger"
        text="Hapus"
        @click="$dispatch('open-delete-modal')"
        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>' 
    />

    <x-app.ui.button-action 
        variant="primary"
        text="Tambah Data"
        icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>' 
    />

</div>