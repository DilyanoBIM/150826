<aside class="row-start-2 row-span-4 border-r border-slate-800 bg-slate-900 flex flex-col text-slate-300 transition-all duration-300 z-50 shadow-2xl md:shadow-none"
    :class="windowWidth < 768 ? 'fixed inset-y-0 left-0 w-[260px] transform ' + (sidebarOpen ? 'translate-x-0' : '-translate-x-full') : 'relative col-start-1 translate-x-0'">
    
    <!-- Header Sidebar -->
    <div class="h-16 flex items-center border-b border-slate-800 shrink-0 transition-all duration-300" 
         :class="sidebarOpen || windowWidth < 768 ? 'px-6 justify-between' : 'px-0 justify-center'">
        
        <span x-show="sidebarOpen || windowWidth < 768" class="text-white font-bold text-lg tracking-wide whitespace-nowrap">
            Sistem E-Commerce
        </span>
        
        <!-- Logo mini ekstra ringkas saat sidebar di-hide (50px) -->
        <span x-show="!sidebarOpen && windowWidth >= 768" class="text-sky-400 font-extrabold text-xs tracking-tight select-none">
            E
        </span>
        
        <!-- Tombol silang tutup khusus Mobile -->
        <button x-show="windowWidth < 768" @click="sidebarOpen = false" class="text-slate-400 hover:text-white md:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>
    
    <!-- Navigasi Menu (Padding di-set p-1 / px-1 saat mini) -->
    <nav class="flex-1 py-4 space-y-1.5 overflow-y-auto overflow-x-hidden [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-sky-500 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-sky-400" 
         :class="sidebarOpen || windowWidth < 768 ? 'px-4' : 'px-1 flex flex-col items-center'">

        <!-- MENU 1 -->
        <a href="{{ route('dashboard') }}" 
           title="Dashboard Utama"
           class="flex items-center rounded-lg font-medium transition-all group duration-200" 
           :class="sidebarOpen || windowWidth < 768 ? 'w-full gap-3 px-3 py-2.5 bg-sky-600 text-white shadow-md shadow-sky-900/20' : 'w-8 h-8 justify-center bg-sky-600 text-white shadow-md shadow-sky-900/20'">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            <span x-show="sidebarOpen || windowWidth < 768" class="whitespace-nowrap text-sm">Dashboard Utama</span>
        </a>

        <!-- MENU 2 -->
        <a href="#" 
           title="Katalog Produk"
           class="flex items-center rounded-lg font-medium transition-all group duration-200 hover:bg-slate-800 hover:text-white" 
           :class="sidebarOpen || windowWidth < 768 ? 'w-full gap-3 px-3 py-2.5' : 'w-8 h-8 justify-center'">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            <span x-show="sidebarOpen || windowWidth < 768" class="whitespace-nowrap text-sm">Katalog Produk</span>
        </a>

        <!-- MENU 3 -->
        <a href="#" 
           title="Manajemen Stok"
           class="flex items-center rounded-lg font-medium transition-all group duration-200 hover:bg-slate-800 hover:text-white" 
           :class="sidebarOpen || windowWidth < 768 ? 'w-full gap-3 px-3 py-2.5' : 'w-8 h-8 justify-center'">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            <span x-show="sidebarOpen || windowWidth < 768" class="whitespace-nowrap text-sm">Manajemen Stok</span>
        </a>

        <!-- MENU 4 -->
        <a href="#" 
           title="Transaksi Masuk"
           class="flex items-center rounded-lg font-medium transition-all group duration-200 hover:bg-slate-800 hover:text-white" 
           :class="sidebarOpen || windowWidth < 768 ? 'w-full gap-3 px-3 py-2.5' : 'w-8 h-8 justify-center'">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
            <span x-show="sidebarOpen || windowWidth < 768" class="whitespace-nowrap text-sm">Transaksi Masuk</span>
        </a>

        <!-- MENU 5 -->
        <a href="#" 
           title="Proses Pesanan"
           class="flex items-center rounded-lg font-medium transition-all group duration-200 hover:bg-slate-800 hover:text-white" 
           :class="sidebarOpen || windowWidth < 768 ? 'w-full gap-3 px-3 py-2.5' : 'w-8 h-8 justify-center'">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span x-show="sidebarOpen || windowWidth < 768" class="whitespace-nowrap text-sm">Proses Pesanan</span>
        </a>

    </nav>

    <!-- Mobile Header Actions -->
    <div class="md:hidden border-t border-slate-800 p-4 shrink-0">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-xl bg-sky-600 flex items-center justify-center text-white font-bold text-sm">
                {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
            </div>
            <div class="flex-1 overflow-hidden">
                <p class="text-sm font-semibold text-white truncate">Hai, {{ auth()->user()->name ?? 'User' }}</p>
                <p class="text-xs text-slate-400">Online</p>
            </div>
        </div>
        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-red-500/10 hover:bg-red-500/20 text-red-500 rounded-lg text-sm font-semibold transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar
            </button>
        </form>
    </div>

</aside>