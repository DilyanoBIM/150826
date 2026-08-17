<!-- resource/views/pages/product/index.blade.php -->
@extends('layouts.app.main')

@section('title', 'Katalog Produk - SIA TDG')

@section('content_header')
    <nav class="flex items-center gap-1 text-[11px] text-slate-400 mb-0.5">
        <a href="{{ route('dashboard') }}" class="hover:text-slate-600 transition-colors">SIA TDG</a>
        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
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
        Wrapper Table Alpine.js
        Kirim 'items: selectedItems' selain 'count'
    -->
    <div x-data="{ 
            selectedItems: [],
            semuaDipilih: false,
            items: [1, 2, 3, 4], // ID Dummy dari produk di bawah
            toggleAll() {
                this.semuaDipilih = !this.semuaDipilih;
                this.selectedItems = this.semuaDipilih ? [...this.items] : [];
            }
         }"
         x-effect="$dispatch('selection-changed', { count: selectedItems.length, items: selectedItems })"
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
                        <td class="px-4 py-3 text-center">Aktif</td>
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
                        <td class="px-4 py-3 text-center">Aktif</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection