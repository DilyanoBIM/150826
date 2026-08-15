@extends('layouts.app.main')

@section('title', 'Dashboard - SIA TDG')

@section('content_header')
    <nav class="flex items-center gap-1 text-[11px] text-slate-400 mb-0.5">
        <a href="#" class="hover:text-slate-600 transition-colors">SIA TDG</a>
        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
        <span class="text-slate-500 font-medium">Dashboard Utama</span>
    </nav>

    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-lg font-bold text-slate-800 leading-tight">Dashboard Utama</h1>
            <p class="text-xs text-slate-500 mt-0.5">Ringkasan status sistem dan aktivitas backend terbaru.</p>
        </div>
        <div class="text-xs font-medium text-slate-500 bg-slate-50 px-3 py-1.5 border border-slate-200 shrink-0 rounded-lg">
            Sistem: <span class="font-bold text-slate-800">Aktif</span>
        </div>
    </div>
@endsection

@section('content_stats')
    <div class="flex items-center gap-2 whitespace-nowrap">
        <span class="text-[11px] text-slate-400">Session ID</span>
        <span class="text-sm font-bold text-slate-800 truncate max-w-[140px] md:max-w-[220px]" title="{{ session()->getId() }}">
            {{ session()->getId() }}
        </span>
    </div>
    <span class="h-4 w-px bg-slate-150 border-l border-slate-100"></span>
    <div class="flex items-center gap-2 whitespace-nowrap">
        <span class="text-[11px] text-slate-400">Terakhir Login</span>
        <!-- Data dikosongkan -->
        <span class="text-sm font-bold text-slate-800">Belum ada riwayat</span>
    </div>
    <span class="h-4 w-px bg-slate-150 border-l border-slate-100"></span>
    <div class="flex items-center gap-2 whitespace-nowrap">
        <span class="text-[11px] text-slate-400">Total User</span>
        <!-- Data diatur menjadi 0 -->
        <span class="text-sm font-bold text-slate-800">0</span>
    </div>
@endsection

{{-- 
    CATATAN PENTING:
    - @section('content_alert') sengaja dihapus agar notifikasi transaksi sinkronisasi hilang.
    - @section('content') SENGAJA TIDAK DITULIS. 
      Karena blok konten tidak ada, layout utama (main.blade.php) akan langsung 
      mengeksekusi tag @else dan menampilkan desain "Tidak Ada Data / No Record Found".
--}}