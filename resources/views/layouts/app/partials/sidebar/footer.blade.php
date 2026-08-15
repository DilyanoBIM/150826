<div class="md:hidden bg-slate-950 border-t border-slate-800 p-4 shrink-0">
    <div class="flex items-center gap-3 mb-4 bg-slate-900/80 p-2.5 rounded-xl border border-slate-800/60">
        <div class="w-10 h-10 rounded-lg bg-sky-600 flex items-center justify-center text-white font-bold text-sm shrink-0 shadow-sm shadow-sky-900/50">
            {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-sm font-semibold text-white truncate">Hai, {{ auth()->user()->name ?? 'User' }}</p>
            <div class="flex items-center gap-1.5 mt-0.5">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
                <span class="text-[11px] text-slate-400">Online</span>
            </div>
        </div>
    </div>
    
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2 bg-rose-500/10 hover:bg-rose-500/20 text-rose-400 border border-rose-500/20 rounded-lg text-sm font-semibold transition-colors cursor-pointer">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            Keluar
        </button>
    </form>
</div>