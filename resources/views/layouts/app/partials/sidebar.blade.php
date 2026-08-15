<aside class="row-start-2 row-span-4 border-r border-slate-800 bg-slate-900 flex flex-col text-slate-300 transition-all duration-300 z-50 shadow-2xl md:shadow-none"
    :class="windowWidth < 768 ? 'fixed inset-y-0 left-0 w-[260px] transform ' + (sidebarOpen ? 'translate-x-0' : '-translate-x-full') : 'relative col-start-1 translate-x-0'">
    
    @include('layouts.app.partials.sidebar.header')
    
    @include('layouts.app.partials.sidebar.nav')
    
    @include('layouts.app.partials.sidebar.footer')

</aside>