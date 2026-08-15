
@props([
    'placeholder' => 'Cari transaksi, laporan, atau data...',
    'wrapperClass' => 'relative w-full max-w-2xl bg-white flex items-center justify-center transition-all duration-300',
    'inputClass' => 'w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-800 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20 transition-all',
    'iconWrapperClass' => 'absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400',
    'iconClass' => 'w-5 h-5'
])

<div class="{{ $wrapperClass }}">
    <span class="{{ $iconWrapperClass }}">
        <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
    </span>
    <!-- $attributes akan otomatis menangkap x-model, x-ref, @input, wire:model, dll -->
    <input 
        type="text" 
        placeholder="{{ $placeholder }}" 
        class="{{ $inputClass }}"
        {{ $attributes }}
    >
</div>