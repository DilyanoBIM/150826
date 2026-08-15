@php
    $href = $href ?? '#';
    $title = $title ?? '';
    $active = $active ?? false;
    $classes = 'flex items-center rounded-lg font-medium transition-all group duration-200 ' . 
               ($active ? 'bg-sky-600 text-white shadow-md shadow-sky-900/30' : 'hover:bg-slate-800 hover:text-white text-slate-300');
@endphp

<a href="{{ $href }}" 
   title="{{ $title }}"
   class="{{ $classes }}"
   :class="sidebarOpen || windowWidth < 768 ? 'w-full gap-3 px-3 py-2.5' : 'w-8 h-8 justify-center'">
    
    <div class="shrink-0 flex items-center justify-center">
        {!! $icon ?? '' !!}
    </div>

    <span x-show="sidebarOpen || windowWidth < 768" class="whitespace-nowrap text-sm">
        {{ $text ?? '' }}
    </span>
</a>