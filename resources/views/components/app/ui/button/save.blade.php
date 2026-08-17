<!-- resource/views/components/app/ui/button/save.blade.php -->
@props([
    'text' => 'Simpan',
    'href' => null,
    'type' => 'submit',
])

@php
    $classes = 'inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-white bg-sky-600 border border-transparent rounded-lg hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500/40 transition-all shadow-sm';
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1-4l-3 3H8V3zM8 4h8v3H8V4zm2 8h4v5h-4v-5z" />
        </svg>
        <span>{{ $text }}</span>
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1-4l-3 3H8V3zM8 4h8v3H8V4zm2 8h4v5h-4v-5z" />
        </svg>
        <span>{{ $text }}</span>
    </button>
@endif