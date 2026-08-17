<!-- resources/views/layouts/app/partials/content/toolbar/index.blade.php -->
<div class="flex flex-wrap items-center justify-between gap-3 w-full">
    
    <!-- Kelompok 1: Navigasi, Filter, & Search -->
    <div class="flex flex-wrap items-center gap-2">
        
        <x-app.ui.toolbar.toggle-view />
        
        <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block"></span>
        
        <x-app.ui.button-action text="Filter" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>' />
        <x-app.ui.button-action text="Urutkan" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path></svg>' />
        
        <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block mx-1"></span>
        
        <!-- PERUBAHAN DI SINI: Gunakan x-app.ui.searchbar -->
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

    <!-- Kelompok 2: Aksi & Ekspor -->
    <div class="flex flex-wrap items-center gap-2">
        
        <x-app.ui.toolbar.refresh-button />
        
        <x-app.ui.toolbar.export-dropdown />
        
        <x-app.ui.button-action text="Print" class="hover:text-sky-600" icon='<svg class="text-inherit" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>' />
        
        <x-app.ui.button-action text="Import" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>' />
        
        <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block mx-1"></span>
        
        <x-app.ui.button-action variant="danger" text="Hapus" @click="$dispatch('open-delete-modal')" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>' />
        <x-app.ui.button-action variant="primary" text="Tambah Data" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>' />
        <x-app.ui.button-action variant="primary" text="Simpan" icon='<svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>' />
        
    </div>
</div>