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
            <p class="text-xs text-slate-500 mt-0.5">Selamat Datang, {{ auth()->user()->name ?? 'Administrator' }}! Ringkasan aktivitas sistem Anda hari ini.</p>
        </div>
        <div class="text-xs font-medium text-slate-500 bg-slate-50 px-3 py-1.5 border border-slate-200 shrink-0 rounded-lg flex items-center gap-1.5">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
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
        <span class="text-sm font-bold text-slate-800">{{ Cache::get('last_login_time_' . auth()->id()) ?? 'Baru saja' }}</span>
    </div>
    <span class="h-4 w-px bg-slate-150 border-l border-slate-100"></span>
    <div class="flex items-center gap-2 whitespace-nowrap">
        <span class="text-[11px] text-slate-400">Total User</span>
        <span class="text-sm font-bold text-slate-800">{{ Cache::get('total_registered_users') ?? '1' }}</span>
    </div>
@endsection

@section('content')
    <div class="space-y-6">

        <!-- Stats Grid (Widget) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
            <!-- Saldo Card -->
            <div class="bg-white rounded-xl border border-slate-200 p-4 flex items-center gap-4 shadow-sm hover:border-sky-200 transition-colors cursor-pointer group">
                <div class="w-12 h-12 rounded-full bg-sky-50 flex items-center justify-center shrink-0 group-hover:bg-sky-100 transition-colors">
                    <svg class="w-6 h-6 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Total Saldo Kas</p>
                    <h3 class="text-lg font-bold text-slate-800 mt-0.5">Rp 124.500.000</h3>
                </div>
            </div>

            <!-- Pendapatan Card -->
            <div class="bg-white rounded-xl border border-slate-200 p-4 flex items-center gap-4 shadow-sm hover:border-emerald-200 transition-colors cursor-pointer group">
                <div class="w-12 h-12 rounded-full bg-emerald-50 flex items-center justify-center shrink-0 group-hover:bg-emerald-100 transition-colors">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Pendapatan Bulan Ini</p>
                    <h3 class="text-lg font-bold text-slate-800 mt-0.5">Rp 45.200.000</h3>
                </div>
            </div>

            <!-- Pengeluaran Card -->
            <div class="bg-white rounded-xl border border-slate-200 p-4 flex items-center gap-4 shadow-sm hover:border-rose-200 transition-colors cursor-pointer group">
                <div class="w-12 h-12 rounded-full bg-rose-50 flex items-center justify-center shrink-0 group-hover:bg-rose-100 transition-colors">
                    <svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Pengeluaran Bulan Ini</p>
                    <h3 class="text-lg font-bold text-slate-800 mt-0.5">Rp 18.750.000</h3>
                </div>
            </div>

            <!-- Pending Card -->
            <div class="bg-white rounded-xl border border-slate-200 p-4 flex items-center gap-4 shadow-sm hover:border-amber-200 transition-colors cursor-pointer group">
                <div class="w-12 h-12 rounded-full bg-amber-50 flex items-center justify-center shrink-0 group-hover:bg-amber-100 transition-colors">
                    <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-medium text-slate-500">Menunggu Persetujuan</p>
                    <h3 class="text-lg font-bold text-slate-800 mt-0.5">12 Transaksi</h3>
                </div>
            </div>
        </div>

        <!-- 2 Column Layout (Table & Activity) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Kolom Kiri: Tabel Transaksi Terbaru (Lebar 2 Kolom) -->
            <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 shadow-sm flex flex-col h-full">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="font-bold text-slate-800">Transaksi Terbaru</h3>
                    <a href="#" class="text-xs font-semibold text-sky-600 hover:text-sky-700">Lihat Semua &rarr;</a>
                </div>
                <div class="overflow-x-auto flex-1">
                    <table class="w-full text-left text-sm text-slate-600 whitespace-nowrap">
                        <thead class="bg-slate-50 text-xs text-slate-500 font-semibold border-b border-slate-100 uppercase sticky top-0 z-10">
                            <tr>
                                <th class="px-5 py-3 rounded-tl-xl">ID Transaksi</th>
                                <th class="px-5 py-3">Tanggal</th>
                                <th class="px-5 py-3">Keterangan</th>
                                <th class="px-5 py-3 text-right">Nominal</th>
                                <th class="px-5 py-3 rounded-tr-xl">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3.5 font-medium text-slate-800">TRX-00123</td>
                                <td class="px-5 py-3.5 text-slate-500">17 Ags 2026</td>
                                <td class="px-5 py-3.5">Pembayaran Tagihan Listrik</td>
                                <td class="px-5 py-3.5 text-right font-medium text-rose-600">- Rp 2.500.000</td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Selesai</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3.5 font-medium text-slate-800">TRX-00124</td>
                                <td class="px-5 py-3.5 text-slate-500">17 Ags 2026</td>
                                <td class="px-5 py-3.5">Penerimaan Invoice #INV-098</td>
                                <td class="px-5 py-3.5 text-right font-medium text-emerald-600">+ Rp 15.000.000</td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Selesai</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3.5 font-medium text-slate-800">TRX-00125</td>
                                <td class="px-5 py-3.5 text-slate-500">16 Ags 2026</td>
                                <td class="px-5 py-3.5">Pembelian Aset Kantor (Laptop)</td>
                                <td class="px-5 py-3.5 text-right font-medium text-rose-600">- Rp 12.000.000</td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-amber-50 text-amber-700 text-[10px] font-bold uppercase tracking-wider">Diproses</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3.5 font-medium text-slate-800">TRX-00126</td>
                                <td class="px-5 py-3.5 text-slate-500">15 Ags 2026</td>
                                <td class="px-5 py-3.5">Setoran Tunai ke Bank</td>
                                <td class="px-5 py-3.5 text-right font-medium text-slate-800">Rp 5.000.000</td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Selesai</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3.5 font-medium text-slate-800">TRX-00127</td>
                                <td class="px-5 py-3.5 text-slate-500">14 Ags 2026</td>
                                <td class="px-5 py-3.5">Pembayaran Gaji Karyawan</td>
                                <td class="px-5 py-3.5 text-right font-medium text-rose-600">- Rp 45.000.000</td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Selesai</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3.5 font-medium text-slate-800">TRX-00128</td>
                                <td class="px-5 py-3.5 text-slate-500">14 Ags 2026</td>
                                <td class="px-5 py-3.5">Penjualan Jasa Konsultasi ABC</td>
                                <td class="px-5 py-3.5 text-right font-medium text-emerald-600">+ Rp 22.500.000</td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Selesai</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3.5 font-medium text-slate-800">TRX-00129</td>
                                <td class="px-5 py-3.5 text-slate-500">13 Ags 2026</td>
                                <td class="px-5 py-3.5">Biaya Iklan Media Sosial</td>
                                <td class="px-5 py-3.5 text-right font-medium text-rose-600">- Rp 3.500.000</td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-rose-50 text-rose-700 text-[10px] font-bold uppercase tracking-wider">Gagal</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3.5 font-medium text-slate-800">TRX-00130</td>
                                <td class="px-5 py-3.5 text-slate-500">12 Ags 2026</td>
                                <td class="px-5 py-3.5">Refund Klien (Pembatalan Proyek)</td>
                                <td class="px-5 py-3.5 text-right font-medium text-rose-600">- Rp 10.000.000</td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-slate-100 text-slate-600 text-[10px] font-bold uppercase tracking-wider">Dibatalkan</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3.5 font-medium text-slate-800">TRX-00131</td>
                                <td class="px-5 py-3.5 text-slate-500">12 Ags 2026</td>
                                <td class="px-5 py-3.5">Pencairan Dana Investor Tahap II</td>
                                <td class="px-5 py-3.5 text-right font-medium text-emerald-600">+ Rp 150.000.000</td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-emerald-50 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">Selesai</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-5 py-3.5 font-medium text-slate-800">TRX-00132</td>
                                <td class="px-5 py-3.5 text-slate-500">11 Ags 2026</td>
                                <td class="px-5 py-3.5">Biaya Maintenance Server Tahunan</td>
                                <td class="px-5 py-3.5 text-right font-medium text-rose-600">- Rp 8.200.000</td>
                                <td class="px-5 py-3.5">
                                    <span class="inline-flex items-center px-2 py-1 rounded-md bg-amber-50 text-amber-700 text-[10px] font-bold uppercase tracking-wider">Diproses</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kolom Kanan: Log Aktivitas Sistem (Lebar 1 Kolom) -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 h-full">
                <h3 class="font-bold text-slate-800 mb-4">Log Aktivitas Sistem</h3>
                <div class="relative border-l-2 border-slate-100 ml-3 space-y-5 pb-2">
                    
                    <div class="relative pl-4">
                        <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-sky-100 border-2 border-white flex items-center justify-center">
                            <div class="w-1.5 h-1.5 rounded-full bg-sky-500"></div>
                        </div>
                        <p class="text-xs font-medium text-slate-800">User Login</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Administrator berhasil login ke sistem.</p>
                        <span class="text-[10px] text-slate-400 mt-1 block">Hari ini, 08:30 WIB</span>
                    </div>

                    <div class="relative pl-4">
                        <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-emerald-100 border-2 border-white flex items-center justify-center">
                            <div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div>
                        </div>
                        <p class="text-xs font-medium text-slate-800">Backup Selesai</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Database berhasil di-backup secara otomatis.</p>
                        <span class="text-[10px] text-slate-400 mt-1 block">Hari ini, 02:00 WIB</span>
                    </div>

                    <div class="relative pl-4">
                        <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-amber-100 border-2 border-white flex items-center justify-center">
                            <div class="w-1.5 h-1.5 rounded-full bg-amber-500"></div>
                        </div>
                        <p class="text-xs font-medium text-slate-800">Jurnal Dibuat</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Jurnal #J-8819 telah ditambahkan oleh staf.</p>
                        <span class="text-[10px] text-slate-400 mt-1 block">Kemarin, 16:45 WIB</span>
                    </div>

                    <div class="relative pl-4">
                        <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-rose-100 border-2 border-white flex items-center justify-center">
                            <div class="w-1.5 h-1.5 rounded-full bg-rose-500"></div>
                        </div>
                        <p class="text-xs font-medium text-slate-800">Akses Ditolak</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">3 kali percobaan login gagal dari IP tidak dikenal.</p>
                        <span class="text-[10px] text-slate-400 mt-1 block">15 Ags, 22:15 WIB</span>
                    </div>

                    <div class="relative pl-4">
                        <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-sky-100 border-2 border-white flex items-center justify-center">
                            <div class="w-1.5 h-1.5 rounded-full bg-sky-500"></div>
                        </div>
                        <p class="text-xs font-medium text-slate-800">Pembaruan Sistem</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Modul rekonsiliasi bank v1.2 berhasil diinstal.</p>
                        <span class="text-[10px] text-slate-400 mt-1 block">14 Ags, 03:00 WIB</span>
                    </div>
                    
                    <div class="relative pl-4">
                        <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-emerald-100 border-2 border-white flex items-center justify-center">
                            <div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div>
                        </div>
                        <p class="text-xs font-medium text-slate-800">Laporan Dicetak</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Buku Besar bulan Juli diekspor ke format PDF.</p>
                        <span class="text-[10px] text-slate-400 mt-1 block">13 Ags, 14:20 WIB</span>
                    </div>
                    
                    <div class="relative pl-4">
                        <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-slate-200 border-2 border-white flex items-center justify-center">
                            <div class="w-1.5 h-1.5 rounded-full bg-slate-500"></div>
                        </div>
                        <p class="text-xs font-medium text-slate-800">Sinkronisasi Bank</p>
                        <p class="text-[11px] text-slate-500 mt-0.5">Mutasi rekening BCA berhasil disinkronkan.</p>
                        <span class="text-[10px] text-slate-400 mt-1 block">12 Ags, 09:00 WIB</span>
                    </div>

                </div>
                <button class="w-full mt-2 py-2 text-xs font-semibold text-sky-600 hover:text-sky-700 bg-sky-50 hover:bg-sky-100 rounded-lg transition-colors">
                    Muat Lebih Banyak
                </button>
            </div>

        </div>
    </div>
@endsection