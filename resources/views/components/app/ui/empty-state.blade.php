@props([
    'title' => 'Tidak Ada Data',
    'message' => 'Belum ada record yang ditambahkan atau tidak ada data yang cocok dengan pencarian Anda.',
    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>'
])

<div class="flex flex-col items-center justify-center w-full h-full min-h-[400px] border-2 border-dashed border-slate-200 rounded-xl bg-slate-50/50">
    <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-white shadow-sm border border-slate-100">
        <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            {!! $icon !!}
        </svg>
    </div>
    <h3 class="text-base font-semibold text-slate-800 mb-1">{{ $title }}</h3>
    <p class="text-sm text-slate-500 max-w-sm text-center mb-5">{{ $message }}</p>
    {{ $slot }}
</div>