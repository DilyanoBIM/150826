<header class="col-start-1 col-span-1 md:col-span-2 row-start-1 border-b border-slate-200 bg-white px-3 md:px-5 h-11 flex items-center justify-between gap-3 transition-all duration-300 z-30 relative">
    
    <!-- KIRI: Tombol Menu & Logo -->
    <div class="flex items-center gap-2.5 md:gap-3 shrink-0">
        <button @click="sidebarOpen = !sidebarOpen" class="p-1 -ml-1 rounded-md bg-slate-50 hover:bg-slate-100 text-slate-600 transition-colors focus:outline-none focus:ring-1 focus:ring-sky-500/50 cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <div class="flex items-center gap-2">
            <div class="w-6 h-6 rounded-md bg-sky-600 flex items-center justify-center text-white font-bold text-[10px]">
                TDG
            </div>
            <h1 class="text-xs md:text-sm font-bold text-slate-800 tracking-tight hidden sm:block">Sistem Ecommerce</h1>
        </div>
    </div>

    <!-- TENGAH: Searchbar (Ramping & Ringkas) -->
    <div class="hidden md:flex relative w-full max-w-md flex-1 mx-2 lg:mx-4 items-center justify-center transition-all duration-300">
        <span class="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none text-slate-400">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </span>
        <input 
            type="text" 
            placeholder="Cari transaksi, laporan, atau data..." 
            class="w-full pl-8 pr-3 py-1 bg-slate-50 border border-slate-200 rounded-md text-[11px] text-slate-800 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500/20 transition-all h-7"
        >
    </div>

    <!-- KANAN: User & Actions -->
    <div class="hidden md:flex items-center gap-2.5 shrink-0">
        <span class="text-[11px] font-medium text-slate-600">Hai, {{ auth()->user()->name ?? 'User' }}</span>
        
        <form action="{{ route('logout') }}" method="POST" x-data="{ isLoggingOut: false }" @submit="isLoggingOut = true">
            @csrf
            <button type="submit" :disabled="isLoggingOut" class="flex items-center gap-1 px-2 py-1 bg-red-50 text-red-600 hover:bg-red-100 rounded-md text-[11px] font-semibold transition-colors cursor-pointer disabled:opacity-70 disabled:cursor-not-allowed h-7">
                <svg x-show="isLoggingOut" style="display: none;" class="animate-spin h-3 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span x-text="isLoggingOut ? 'Keluar...' : 'Keluar'"></span>
            </button>
        </form>
    </div>
</header>