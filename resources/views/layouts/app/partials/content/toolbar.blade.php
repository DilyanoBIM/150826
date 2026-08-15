<div x-show="showToolbar"
     x-transition:enter="transition ease-out duration-200"
     x-transition:enter-start="opacity-0 -translate-y-2"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-150"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 -translate-y-2"
     class="shrink-0 px-5 md:px-6 py-1.5 bg-slate-100/80 border-b border-slate-200 flex flex-wrap items-center justify-between gap-3 z-20">

    @include('layouts.app.partials.content.toolbar.index')

</div>