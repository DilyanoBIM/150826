<div x-show="showBulkBar"
     x-cloak
     x-transition:enter="transition ease-out duration-150"
     x-transition:enter-start="opacity-0 -translate-y-2"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-100"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 -translate-y-2"
     class="shrink-0 px-5 md:px-6 py-2 bg-sky-600 flex items-center justify-between gap-4 z-30">
    <div class="flex items-center gap-2 text-white text-xs font-semibold">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span x-text="selectedCount + ' item dipilih'"></span>
    </div>
    <div class="flex items-center gap-2">
        <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white/10 hover:bg-white/20 text-white rounded-lg text-xs font-semibold transition-colors">
            Export Terpilih
        </button>
        <button type="button"
                @click="confirmingDelete = true"
                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-rose-500 hover:bg-rose-600 text-white rounded-lg text-xs font-semibold transition-colors">
            Hapus Terpilih
        </button>
        <button type="button"
                @click="$dispatch('clear-selection'); showBulkBar = false; selectedCount = 0"
                class="inline-flex items-center justify-center w-7 h-7 text-white/80 hover:text-white hover:bg-white/10 rounded-lg transition-colors"
                aria-label="Batalkan pilihan">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
</div>