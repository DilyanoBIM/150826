<!-- resource/views/pages/product/index.blade.php -->
@extends('layouts.app.main')

{{-- Konfigurasi Header & Breadcrumb --}}
@php
    $pageTitle = 'Katalog Produk';
    $pageSubtitle = 'Manajemen daftar barang, harga jual/beli, dan pantauan stok gudang.';
    $breadcrumbContext = 'SIA TDG';
    $breadcrumbCurrent = 'Katalog Produk';
@endphp

{{-- Konfigurasi Toolbar (Tampilkan/Sembunyikan Tombol Sesuai Kebutuhan) --}}
@php
    $showSaveButton = true; 
    $showDuplicateButton = false;
    $showArchiveButton = false;
    $showUndoRedoButton = false;
    $showHistoryButton = false;
    $showSyncRight = false;
    $showSettingsRight = false;
    $showFullscreenRight = false;
    $showImportRight = true;
    
    // Custom Teks Toolbar
    $addText = 'Tambah Produk';
    $searchPlaceholder = 'Cari kode SKU atau nama barang...';
@endphp

@section('content')
<!-- 
    Wrapper Utama Alpine.js
    Menangani view state, selection table, dan merespons sinyal/event dari Toolbar
-->
<div 
    x-data="{ 
        currentView: 'table',
        searchQuery: '',
        selectedItems: [],
        semuaDipilih: false,
        items: [1, 2, 3, 4], // ID Dummy dari produk di tabel
        
        toggleAll() {
            this.semuaDipilih = !this.semuaDipilih;
            this.selectedItems = this.semuaDipilih ? [...this.items] : [];
        }
    }"
    {{-- Memastikan status pemilihan selalu ter-dispatch ketika array berubah --}}
    x-effect="$dispatch('selection-changed', { count: selectedItems.length, items: selectedItems })"

    {{-- =========================================================
         UNIFIED EVENT LISTENER: Menangkap Aksi dari Toolbar
    ========================================================== --}}
    x-on:main-toolbar-action.window="
        const { action, payload } = $event.detail;
        
        if (action === 'add') { 
            if(window.ToastAlert) window.ToastAlert.toast('Mengarahkan ke form Tambah Produk...', 'info');
            // window.location.href = '/produk/create'; 
        }
        if (action === 'edit') {
            if(selectedItems.length === 0) {
                if(window.ToastAlert) window.ToastAlert.error('Pilih satu produk yang ingin diedit.');
            } else if(selectedItems.length > 1) {
                if(window.ToastAlert) window.ToastAlert.error('Hanya dapat mengedit satu produk pada satu waktu.');
            } else {
                if(window.ToastAlert) window.ToastAlert.toast('Membuka form edit untuk produk ID: ' + selectedItems[0], 'info');
            }
        }
        if (action === 'delete') { 
            if(selectedItems.length === 0) {
                if(window.ToastAlert) window.ToastAlert.error('Pilih produk yang ingin dihapus terlebih dahulu.');
            } else {
                if(window.ToastAlert) window.ToastAlert.error('Konfirmasi hapus untuk ' + selectedItems.length + ' produk terpilih.');
            }
        }
        if (action === 'view') { 
            currentView = payload; 
        }
        if (action === 'search') { 
            searchQuery = payload; 
        }
        if (action === 'refresh') { 
            window.location.reload(); 
        }
        if (action === 'export') { 
            window.open('/produk/export', '_blank'); 
        }
        if (action === 'print') {
            window.print();
        }
    "
    class="w-full space-y-6"
>
    
    {{-- Section Statistik (Opsional, diletakkan di atas tabel) --}}
    <div class="flex items-center gap-4 bg-white p-4 rounded-xl border border-slate-200 shadow-sm">
        <div class="flex items-center gap-2 whitespace-nowrap">
            <span class="text-[11px] text-slate-400">Total Produk</span>
            <span class="text-sm font-bold text-slate-800">1,248</span>
        </div>
        <span class="h-6 w-px bg-slate-150 border-l border-slate-100"></span>
        <div class="flex items-center gap-2 whitespace-nowrap">
            <span class="text-[11px] text-slate-400">Stok Menipis</span>
            <span class="text-sm font-bold text-amber-600">12</span>
        </div>
        <span class="h-6 w-px bg-slate-150 border-l border-slate-100"></span>
        <div class="flex items-center gap-2 whitespace-nowrap">
            <span class="text-[11px] text-slate-400">Stok Habis</span>
            <span class="text-sm font-bold text-rose-600">3</span>
        </div>
    </div>

    {{-- Tampilan Tabel --}}
    <div x-show="currentView === 'table'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
        
        {{-- Info Pencarian --}}
        <div x-show="searchQuery !== ''" class="mb-4 text-sm text-slate-500">
            Hasil pencarian untuk: <span class="font-bold text-sky-600" x-text="searchQuery"></span>
        </div>

        <div class="border border-slate-200 rounded-xl overflow-hidden bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 whitespace-nowrap">
                    <thead class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        <tr>
                            <th class="px-4 py-3 w-10 text-center">
                                <input type="checkbox" @click="toggleAll()" :checked="semuaDipilih" class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500 cursor-pointer">
                            </th>
                            <th class="px-4 py-3">Info Produk</th>
                            <th class="px-4 py-3">SKU / Kode</th>
                            <th class="px-4 py-3 text-right">Harga Jual</th>
                            <th class="px-4 py-3 text-center">Stok</th>
                            <th class="px-4 py-3 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        
                        <!-- Item 1 -->
                        <tr class="hover:bg-slate-50 transition-colors" :class="selectedItems.includes(1) ? 'bg-sky-50/50' : ''">
                            <td class="px-4 py-3 text-center">
                                <!-- x-model untuk sinkronisasi otomatis nilai checkbox ke dalam array selectedItems -->
                                <input type="checkbox" value="1" x-model.number="selectedItems" class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500 cursor-pointer">
                            </td>
                            <td class="px-4 py-3 font-bold text-slate-800">Laptop ASUS ROG</td>
                            <td class="px-4 py-3 font-medium text-slate-700">PRD-ELC-001</td>
                            <td class="px-4 py-3 text-right">Rp 25.000.000</td>
                            <td class="px-4 py-3 text-center">24</td>
                            <td class="px-4 py-3 text-center"><span class="px-2 py-1 bg-emerald-100 text-emerald-700 text-[10px] font-bold rounded-md">Aktif</span></td>
                        </tr>

                        <!-- Item 2 -->
                        <tr class="hover:bg-slate-50 transition-colors" :class="selectedItems.includes(2) ? 'bg-sky-50/50' : ''">
                            <td class="px-4 py-3 text-center">
                                <input type="checkbox" value="2" x-model.number="selectedItems" class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500 cursor-pointer">
                            </td>
                            <td class="px-4 py-3 font-bold text-slate-800">Logitech MX Master 3S</td>
                            <td class="px-4 py-3 font-medium text-slate-700">PRD-ACS-082</td>
                            <td class="px-4 py-3 text-right">Rp 1.650.000</td>
                            <td class="px-4 py-3 text-center">3</td>
                            <td class="px-4 py-3 text-center"><span class="px-2 py-1 bg-emerald-100 text-emerald-700 text-[10px] font-bold rounded-md">Aktif</span></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Tampilan Grid --}}
    <div x-cloak x-show="currentView === 'grid'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 text-center text-slate-500">Laptop ASUS ROG</div>
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 text-center text-slate-500">Logitech MX Master 3S</div>
        </div>
    </div>

    {{-- Tampilan Board/Kanban --}}
    <div x-cloak x-show="currentView === 'board'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
        <div class="flex gap-4 overflow-x-auto pb-4">
            <div class="bg-slate-100 border border-slate-200 rounded-xl p-4 w-72 shrink-0 h-96">Tersedia</div>
            <div class="bg-slate-100 border border-slate-200 rounded-xl p-4 w-72 shrink-0 h-96">Stok Menipis</div>
            <div class="bg-slate-100 border border-slate-200 rounded-xl p-4 w-72 shrink-0 h-96">Habis</div>
        </div>
    </div>

</div>
@endsection