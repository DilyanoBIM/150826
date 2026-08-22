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
    
    $showSyncButton = false;
    $showSettingsButton = false;
    $showFullscreenButton = false;
    $showImportButton = false; 
    
    $addText = 'Tambah Pengguna';
    $searchPlaceholder = 'Cari nama atau email...';
@endphp

@section('content')
    <div class="w-full space-y-6" x-init="
        items = [
            { id: 'USR-001', nama: 'Budi Santoso', email: 'budi@example.com', role: 'Admin', status: 'Aktif' },
            { id: 'USR-002', nama: 'Siti Aminah', email: 'siti@example.com', role: 'Editor', status: 'Aktif' },
            { id: 'USR-003', nama: 'Agus Pratama', email: 'agus@example.com', role: 'User', status: 'Nonaktif' },
            { id: 'USR-004', nama: 'Dewi Lestari', email: 'dewi@example.com', role: 'User', status: 'Pending' }
        ]
    ">

        <x-app.ui.dataview 
            :columns="[
                ['key' => 'nama', 'label' => 'Nama Pengguna', 'class' => 'font-bold text-slate-800'],
                ['key' => 'email', 'label' => 'Alamat Email'],
                ['key' => 'role', 'label' => 'Hak Akses'],
                ['key' => 'status', 'label' => 'Status Aktif', 'type' => 'badge']
            ]"
            cardTitle="nama"
            cardSubtitle="email"
            boardGroup="status"
            :boardColumns="['Aktif', 'Pending', 'Nonaktif']"
        />

    </div>
@endsection