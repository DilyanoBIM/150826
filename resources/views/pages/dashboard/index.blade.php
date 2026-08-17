<!-- resource/views/pages/dashboard/index.blade.php -->

@extends('layouts.app.main')

@php
    $pageTitle = 'Manajemen Pengguna';
    $pageSubtitle = 'Kelola daftar pengguna, peran, dan akses sistem.';
    $breadcrumbContext = 'Master Data';
    $breadcrumbCurrent = 'Pengguna';
@endphp

@php
    $showSaveButton = true;
    $showDuplicateButton = false;
    $showArchiveButton = false;
    $showUndoRedoButton = false;
    $showHistoryButton = false;
    
    // Pembaruan nama variabel dari *Right menjadi *Button
    $showSyncButton = false;
    $showSettingsButton = false;
    $showFullscreenButton = false;
    $showImportButton = false; 
    
    $addText = 'Tambah Pengguna';
    $searchPlaceholder = 'Cari nama atau email...';
@endphp

@section('content')
    <div x-show="currentView === 'table'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
        <div class="bg-white border border-slate-200 rounded-xl shadow-sm overflow-hidden">
            <div class="p-8 text-center text-slate-500">
                <svg class="w-12 h-12 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                <p>Tampilan Tabel (Mode Default)</p>
                <p class="text-xs mt-1" x-show="searchQuery !== ''">Hasil pencarian untuk: <span class="font-bold text-sky-600" x-text="searchQuery"></span></p>
            </div>
        </div>
    </div>

    <div x-cloak x-show="currentView === 'grid'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 text-center text-slate-500">Card 1</div>
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 text-center text-slate-500">Card 2</div>
            <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 text-center text-slate-500">Card 3</div>
        </div>
    </div>

    <div x-cloak x-show="currentView === 'board'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
        <div class="flex gap-4 overflow-x-auto pb-4">
            <div class="bg-slate-100 border border-slate-200 rounded-xl p-4 w-72 shrink-0 h-96">Kolom 1</div>
            <div class="bg-slate-100 border border-slate-200 rounded-xl p-4 w-72 shrink-0 h-96">Kolom 2</div>
            <div class="bg-slate-100 border border-slate-200 rounded-xl p-4 w-72 shrink-0 h-96">Kolom 3</div>
        </div>
    </div>
@endsection