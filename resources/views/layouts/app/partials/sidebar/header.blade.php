<div class="h-16 flex items-center bg-slate-950 border-b border-slate-800 shrink-0 transition-all duration-300" 
     :class="sidebarOpen || windowWidth < 768 ? 'px-6 justify-between' : 'px-0 justify-center'">
    
    <span x-show="sidebarOpen || windowWidth < 768" class="text-white font-bold text-lg tracking-wide whitespace-nowrap">
        Sistem E-Commerce
    </span>
    
    <span x-show="!sidebarOpen && windowWidth >= 768" class="text-sky-400 font-extrabold text-xs tracking-tight select-none">
        E
    </span>
    
    <button type="button" x-show="windowWidth < 768" @click="sidebarOpen = false" class="text-slate-400 hover:text-white md:hidden">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>
</div>