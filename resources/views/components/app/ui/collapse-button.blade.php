@props([
    'state' => 'showToolbar',
    'titleHide' => 'Sembunyikan',
    'titleShow' => 'Tampilkan'
])

<button type="button"
        @click="{{ $state }} = !{{ $state }}"
        aria-label="Toggle"
        class="shrink-0 flex items-center justify-center w-8 h-8 bg-white border border-slate-200 rounded-lg text-slate-500 hover:text-sky-600 hover:border-sky-200 hover:bg-sky-50 shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-sky-500/20"
        :title="{{ $state }} ? '{{ $titleHide }}' : '{{ $titleShow }}'"
        {{ $attributes }}>
    <svg class="w-4 h-4 transition-transform duration-300"
         :class="{{ $state }} ? 'rotate-180' : ''"
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
    </svg>
</button>