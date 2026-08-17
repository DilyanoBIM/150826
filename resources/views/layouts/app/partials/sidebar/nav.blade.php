<!-- resource/views/layouts/app/partials/sidebar/nav.blade.php -->
<!-- Tambahkan ID app-sidebar-nav -->
<nav id="app-sidebar-nav" class="flex-1 py-4 bg-slate-900 space-y-1.5 overflow-y-auto overflow-x-hidden [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-sky-500 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-sky-400" 
     :class="sidebarOpen || windowWidth < 768 ? 'px-4' : 'px-1 flex flex-col items-center'">

    @include('layouts.app.partials.sidebar.link', [
        'href' => route('dashboard'),
        'title' => 'Dashboard Utama',
        'active' => request()->routeIs('dashboard'),
        'text' => 'Dashboard Utama',
        'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>'
    ])

    @include('layouts.app.partials.sidebar.link', [
        'href' => route('products.index'), // <-- Ubah disini
        'title' => 'Katalog Produk',
        'active' => request()->routeIs('products.*'), // <-- Ubah disini agar otomatis aktif
        'text' => 'Katalog Produk',
        'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>'
    ])

    @include('layouts.app.partials.sidebar.link', [
        'href' => '#',
        'title' => 'Manajemen Stok',
        'active' => false,
        'text' => 'Manajemen Stok',
        'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>'
    ])

    @include('layouts.app.partials.sidebar.link', [
        'href' => '#',
        'title' => 'Transaksi Masuk',
        'active' => false,
        'text' => 'Transaksi Masuk',
        'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>'
    ])

    @include('layouts.app.partials.sidebar.link', [
        'href' => '#',
        'title' => 'Proses Pesanan',
        'active' => false,
        'text' => 'Proses Pesanan',
        'icon' => '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08-.402-2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>'
    ])

</nav>