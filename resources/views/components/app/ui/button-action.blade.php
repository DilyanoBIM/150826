<!-- resource/views/components/app/ui/button-action.blade.php -->
@props([
    'text' => '',
    'icon' => '',
    'variant' => 'default', // default | danger | primary | icon-only
])

@php
    $baseClass = 'inline-flex items-center justify-center gap-1.5 rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-offset-1 disabled:opacity-60 disabled:cursor-wait ';
    
    $variants = [
        'default' => 'px-3 py-1.5 bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 focus:ring-slate-200',
        'danger' => 'px-3 py-1.5 bg-rose-50 border border-rose-200 text-rose-700 hover:bg-rose-100 focus:ring-rose-200',
        'primary' => 'px-3 py-1.5 bg-slate-800 hover:bg-slate-900 text-white shadow-sm shadow-slate-200 focus:ring-slate-800',
        'icon-only' => 'p-1.5 bg-white border border-slate-200 text-slate-500 hover:text-sky-600 hover:bg-sky-50 focus:ring-sky-200',
    ];

    $classes = $baseClass . ($variants[$variant] ?? $variants['default']);
@endphp

<button type="button" {{ $attributes->merge(['class' => $classes]) }}>
    @if($icon)
        <span class="{{ $variant === 'icon-only' ? 'w-4 h-4' : 'w-3.5 h-3.5 ' . ($variant === 'default' ? 'text-slate-500' : '') }}">
            {!! $icon !!}
        </span>
    @endif
    
    @if($text && $variant !== 'icon-only')
        <span class="hidden md:inline">{{ $text }}</span>
    @endif
</button>