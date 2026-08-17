@extends('layouts.app.main')

@section('title', 'Katalog Produk - SIA TDG')

@section('content_header')
    <nav class="flex items-center gap-1 text-[11px] text-slate-400 mb-0.5">
        <a href="{{ route('dashboard') }}" class="hover:text-slate-600 transition-colors">SIA TDG</a>
        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="text-slate-500 font-medium">Katalog Produk</span>
    </nav>

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-lg font-bold text-slate-800 leading-tight">Katalog Produk</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manajemen daftar barang, harga jual/beli, dan pantauan stok gudang.</p>
        </div>
    </div>
@endsection

@section('content_stats')
    <div class="flex items-center gap-2 whitespace-nowrap">
        <span class="text-[11px] text-slate-400">Total Produk</span>
        <span class="text-sm font-bold text-slate-800">1,248</span>
    </div>
    <span class="h-4 w-px bg-slate-150 border-l border-slate-100"></span>
    <div class="flex items-center gap-2 whitespace-nowrap">
        <span class="text-[11px] text-slate-400">Stok Menipis</span>
        <span class="text-sm font-bold text-amber-600">12</span>
    </div>
    <span class="h-4 w-px bg-slate-150 border-l border-slate-100"></span>
    <div class="flex items-center gap-2 whitespace-nowrap">
        <span class="text-[11px] text-slate-400">Stok Habis</span>
        <span class="text-sm font-bold text-rose-600">3</span>
    </div>
@endsection

@section('content')
    <!-- 
        Wrapper Table dengan Alpine.js untuk fitur Checkbox & Bulk Actions.
        x-effect akan mengirim event ke layouts.app.partials.content agar Bulk Bar muncul!
    -->
    <div x-data="{ 
            selectedItems: [],
            semuaDipilih: false,
            items: [1, 2, 3, 4, 5],
            toggleAll() {
                this.semuaDipilih = !this.semuaDipilih;
                this.selectedItems = this.semuaDipilih ? [...this.items] : [];
            }
         }"
         x-effect="$dispatch('selection-changed', { count: selectedItems.length })"
         class="border border-slate-200 rounded-xl overflow-hidden bg-white shadow-sm">
        
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600 whitespace-nowrap">
                <thead class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3 w-10 text-center">
                            <input type="checkbox" @click="toggleAll()" :checked="semuaDipilih" 
                                class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500 cursor-pointer">
                        </th>
                        <th class="px-4 py-3">Info Produk</th>
                        <th class="px-4 py-3">SKU / Kode</th>
                        <th class="px-4 py-3 text-right">Harga Beli</th>
                        <th class="px-4 py-3 text-right">Harga Jual</th>
                        <th class="px-4 py-3 text-center">Stok</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center w-24">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    
                    <!-- Item 1 (Normal) -->
                    <tr class="hover:bg-slate-50 transition-colors" :class="selectedItems.includes(1) ? 'bg-sky-50/50' : ''">
                        <td class="px-4 py-3 text-center">
                            <input type="checkbox" value="1" x-model="selectedItems" class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500 cursor-pointer">
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center shrink-0 overflow-hidden">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800">Laptop ASUS ROG Zephyrus</h4>
                                    <span class="text-[11px] text-slate-500">Elektronik & Komputer</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 font-medium text-slate-700">PRD-ELC-001</td>
                        <td class="px-4 py-3 text-right">Rp 22.500.000</td>
                        <td class="px-4 py-3 text-right font-medium text-slate-800">Rp 25.000.000</td>
                        <td class="px-4 py-3 text-center">
                            <span class="text-sm font-bold text-slate-800">24</span>
                            <span class="text-[10px] text-slate-400 block mt-0.5">Unit</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-md bg-emerald-50 border border-emerald-100 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Aktif</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-1.5 text-slate-400 hover:text-sky-600 hover:bg-sky-50 rounded-md transition-colors" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </button>
                                <button class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-md transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Item 2 (Stok Menipis) -->
                    <tr class="hover:bg-slate-50 transition-colors" :class="selectedItems.includes(2) ? 'bg-sky-50/50' : ''">
                        <td class="px-4 py-3 text-center">
                            <input type="checkbox" value="2" x-model="selectedItems" class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500 cursor-pointer">
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center shrink-0 overflow-hidden">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800">Logitech MX Master 3S</h4>
                                    <span class="text-[11px] text-slate-500">Aksesoris PC</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 font-medium text-slate-700">PRD-ACS-082</td>
                        <td class="px-4 py-3 text-right">Rp 1.250.000</td>
                        <td class="px-4 py-3 text-right font-medium text-slate-800">Rp 1.650.000</td>
                        <td class="px-4 py-3 text-center">
                            <span class="text-sm font-bold text-amber-600">3</span>
                            <span class="text-[10px] text-amber-500 block mt-0.5">Pcs</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-md bg-emerald-50 border border-emerald-100 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Aktif</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-1.5 text-slate-400 hover:text-sky-600 hover:bg-sky-50 rounded-md transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
                                <button class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-md transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Item 3 (Stok Habis) -->
                    <tr class="hover:bg-slate-50 transition-colors" :class="selectedItems.includes(3) ? 'bg-sky-50/50' : ''">
                        <td class="px-4 py-3 text-center">
                            <input type="checkbox" value="3" x-model="selectedItems" class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500 cursor-pointer">
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center shrink-0 overflow-hidden opacity-60">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800">Meja Kerja Ergonomis</h4>
                                    <span class="text-[11px] text-slate-500">Furniture Kantor</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 font-medium text-slate-700">PRD-FNT-011</td>
                        <td class="px-4 py-3 text-right">Rp 2.800.000</td>
                        <td class="px-4 py-3 text-right font-medium text-slate-800">Rp 3.500.000</td>
                        <td class="px-4 py-3 text-center">
                            <span class="text-sm font-bold text-rose-600">0</span>
                            <span class="text-[10px] text-rose-400 block mt-0.5">Unit</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-md bg-rose-50 border border-rose-100 text-rose-700 text-[10px] font-bold uppercase tracking-wider">Habis</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-1.5 text-slate-400 hover:text-sky-600 hover:bg-sky-50 rounded-md transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
                                <button class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-md transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Item 4 (Nonaktif) -->
                    <tr class="hover:bg-slate-50 transition-colors opacity-75" :class="selectedItems.includes(4) ? 'bg-sky-50/50' : ''">
                        <td class="px-4 py-3 text-center">
                            <input type="checkbox" value="4" x-model="selectedItems" class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500 cursor-pointer">
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-slate-100 border border-slate-200 flex items-center justify-center shrink-0 overflow-hidden">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800 line-through decoration-slate-400">Lisensi Microsoft Office 2019</h4>
                                    <span class="text-[11px] text-slate-500">Software</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 font-medium text-slate-700">PRD-SFT-004</td>
                        <td class="px-4 py-3 text-right">Rp 1.100.000</td>
                        <td class="px-4 py-3 text-right font-medium text-slate-800">Rp 1.500.000</td>
                        <td class="px-4 py-3 text-center">
                            <span class="text-sm font-bold text-slate-800">-</span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <span class="inline-flex items-center px-2 py-1 rounded-md bg-slate-100 border border-slate-200 text-slate-600 text-[10px] font-bold uppercase tracking-wider">Nonaktif</span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-2">
                                <button class="p-1.5 text-slate-400 hover:text-sky-600 hover:bg-sky-50 rounded-md transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg></button>
                                <button class="p-1.5 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-md transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection