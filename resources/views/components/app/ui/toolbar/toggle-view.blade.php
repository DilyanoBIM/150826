<!-- resources/views/components/app/ui/toolbar/toggle-view.blade.php -->
<button type="button" @click="showExtras = !showExtras"
        class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-white border border-sky-200 text-sky-600 hover:bg-sky-50 rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap"
        :title="showExtras ? 'Ringkas tampilan (sembunyikan tab & statistik)' : 'Tampilkan tab & statistik'">
    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path x-show="showExtras" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l5-5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
        <path x-show="!showExtras" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H4m0 0v4m0-4l5 5m7-5h4m0 0v4m0-4l-5 5M8 20H4m0 0v-4m0 4l5-5m7 5h4m0 0v-4m0 4l-5-5"></path>
    </svg>
    <span class="hidden sm:inline" x-text="showExtras ? 'Ringkas' : 'Perluas'"></span>
</button>