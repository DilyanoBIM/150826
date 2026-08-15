<div class="col-start-1 md:col-start-2 col-span-1 row-start-2 row-span-3 transition-all duration-300 overflow-hidden">
    <main class="h-full bg-[#faf7f2] pt-4 md:pt-6 pl-4 md:pl-6 pr-0 pb-0 overflow-hidden">

        <div x-data="{ showToolbar: true, showExtras: true, showBulkBar: false, activeTab: 'aktif' }" class="bg-white w-full h-full border-t border-l border-slate-200 rounded-tl-2xl flex flex-col overflow-hidden min-h-0">

            @hasSection('content_header')
                <div class="shrink-0 px-5 md:px-6 py-2.5 md:py-3 border-b border-slate-200 bg-slate-50 z-20 flex items-center justify-between gap-4">
                    <div class="flex-1 w-full min-w-0">
                        @yield('content_header')
                    </div>
                    <button type="button"
                            @click="showToolbar = !showToolbar"
                            class="shrink-0 flex items-center justify-center w-8 h-8 bg-white border border-slate-200 rounded-lg text-slate-500 hover:text-sky-600 hover:border-sky-200 hover:bg-sky-50 shadow-sm transition-all focus:outline-none focus:ring-2 focus:ring-sky-500/20"
                            :title="showToolbar ? 'Sembunyikan Toolbar' : 'Tampilkan Toolbar'">
                        <svg class="w-4 h-4 transition-transform duration-300"
                             :class="showToolbar ? 'rotate-180' : ''"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
            @endif

            @hasSection('content_tabs')
                <div x-show="showExtras"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0">
                    <div class="shrink-0 px-5 md:px-6 border-b border-slate-200 flex items-center gap-1 overflow-x-auto bg-white">
                        @yield('content_tabs')
                    </div>
                </div>
            @endif

            <div x-show="showToolbar"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 class="shrink-0 px-5 md:px-6 py-1.5 bg-slate-100/80 border-b border-slate-200 flex flex-wrap items-center justify-between gap-3 z-20">

                <div class="flex flex-wrap items-center gap-2">
                    <button type="button" @click="showExtras = !showExtras"
                            class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-white border border-sky-200 text-sky-600 hover:bg-sky-50 rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap"
                            :title="showExtras ? 'Ringkas tampilan (sembunyikan tab & statistik)' : 'Tampilkan tab & statistik'">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="showExtras" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path>
                            <path x-show="!showExtras" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 4H4m0 0v4m0-4l5 5m7-5h4m0 0v4m0-4l-5 5M8 20H4m0 0v-4m0 4l5-5m7 5h4m0 0v-4m0 4l-5-5"></path>
                        </svg>
                        <span class="hidden sm:inline" x-text="showExtras ? 'Ringkas' : 'Perluas'"></span>
                    </button>

                    <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block"></span>

                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap">
                        <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        <span class="hidden sm:inline">Filter</span>
                    </button>

                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap">
                        <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                        </svg>
                        <span class="hidden md:inline">Urutkan</span>
                    </button>

                    <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block mx-1"></span>

                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 hover:text-sky-600 rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap">
                        <svg class="w-3.5 h-3.5 text-inherit" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                        </svg>
                        <span class="hidden lg:inline">Print</span>
                    </button>

                    <div x-data="{ open: false }" class="relative inline-block text-left">
                        <button type="button" @click="open = !open" @keydown.escape.window="open = false" 
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-rose-50 border border-rose-200 text-rose-700 hover:bg-rose-100 rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            <span class="hidden lg:inline">PDF</span>
                            <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute left-0 z-50 mt-2 w-44 origin-top-left rounded-lg bg-white shadow-lg ring-1 ring-slate-200 focus:outline-none"
                             style="display: none;">
                            <div class="py-1">
                                <a href="#" class="group flex items-center justify-between px-4 py-2 text-xs font-medium text-rose-700 bg-rose-50/50 hover:bg-rose-50 transition-colors border-l-2 border-rose-500">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                        PDF (.pdf)
                                    </div>
                                    <span class="text-[10px] bg-rose-100 text-rose-600 px-1.5 py-0.5 rounded">Default</span>
                                </a>
                                
                                <div class="h-px bg-slate-100 my-1"></div>
                                
                                <a href="#" class="group flex items-center gap-2 px-4 py-2 text-xs text-slate-700 hover:bg-slate-50 hover:text-emerald-600 transition-colors">
                                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Excel (.xlsx)
                                </a>
                                <a href="#" class="group flex items-center gap-2 px-4 py-2 text-xs text-slate-700 hover:bg-slate-50 hover:text-sky-600 transition-colors">
                                    <svg class="w-4 h-4 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                                    </svg>
                                    CSV (.csv)
                                </a>
                                <a href="#" class="group flex items-center gap-2 px-4 py-2 text-xs text-slate-700 hover:bg-slate-50 hover:text-blue-700 transition-colors">
                                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Word (.docx)
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <div class="relative hidden md:block">
                        <svg class="w-3.5 h-3.5 text-slate-400 absolute left-2.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 10a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input type="text" placeholder="Cari data..."
                               class="w-40 lg:w-56 pl-8 pr-2.5 py-1.5 text-xs border border-slate-200 rounded-lg bg-white focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-500/10 transition-colors">
                    </div>

                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap">
                        <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                        </svg>
                        <span class="hidden lg:inline">Import</span>
                    </button>

                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap">
                        <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        <span class="hidden lg:inline">Export</span>
                    </button>

                    <button type="button" class="inline-flex items-center justify-center p-1.5 bg-white border border-slate-200 text-slate-500 hover:text-sky-600 hover:bg-sky-50 rounded-lg transition-colors cursor-pointer" title="Muat Ulang Data">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                    </button>

                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-rose-50 border border-rose-200 text-rose-700 hover:bg-rose-100 rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        <span class="hidden lg:inline">Hapus</span>
                    </button>

                    <button type="button" class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-800 hover:bg-slate-900 text-white rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap shadow-sm shadow-slate-200">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        <span>Tambah Data</span>
                    </button>
                </div>
            </div>

            @hasSection('content_stats')
                <div x-show="showExtras"
                     x-transition:enter="transition ease-out duration-150"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-100"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0">
                    <div class="shrink-0 px-5 md:px-6 py-2 border-b border-slate-100 bg-white flex items-center gap-6 overflow-x-auto [&::-webkit-scrollbar]:h-1 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-slate-200 [&::-webkit-scrollbar-thumb]:rounded-full">
                        @yield('content_stats')
                    </div>
                </div>
            @endif

            <div class="flex-1 min-h-0 overflow-y-auto bg-white p-5 md:p-6 relative [&::-webkit-scrollbar]:w-1.5 [&::-webkit-scrollbar-track]:bg-slate-100 [&::-webkit-scrollbar-thumb]:bg-slate-300 [&::-webkit-scrollbar-thumb]:rounded-full hover:[&::-webkit-scrollbar-thumb]:bg-slate-400">
                @hasSection('content_alert')
                    <div class="mb-5">
                        @yield('content_alert')
                    </div>
                @endif
                
                {{-- KONTEN UTAMA ATAU FALLBACK KOSONG --}}
                @hasSection('content')
                    @yield('content')
                @else
                    <!-- EMPTY STATE (NO RECORD FOUND) -->
                    <div class="flex flex-col items-center justify-center w-full h-full min-h-[400px] border-2 border-dashed border-slate-200 rounded-xl bg-slate-50/50">
                        <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-white shadow-sm border border-slate-100">
                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold text-slate-800 mb-1">Tidak Ada Data</h3>
                        <p class="text-sm text-slate-500 max-w-sm text-center mb-5">Belum ada record yang ditambahkan atau tidak ada data yang cocok dengan pencarian Anda.</p>
                    </div>
                @endif
            </div>

            @hasSection('content_pagination')
                <div class="shrink-0 px-5 md:px-6 py-2.5 border-t border-slate-200 bg-white flex items-center justify-between gap-4">
                    @yield('content_pagination')
                </div>
            @endif

            @hasSection('content_footer')
                <div class="shrink-0 px-5 md:px-6 py-2 border-t border-slate-200 bg-slate-50 z-10">
                    @yield('content_footer')
                </div>
            @endif

        </div>

    </main>
</div>