<!-- resources/views/layouts/app/partials/contents.blade.php -->
<div class="md:col-start-2 row-start-2 row-span-3 w-full h-full pt-4 pl-4 md:pt-5 md:pl-5 lg:pt-6 lg:pl-6 transition-all duration-300 min-h-0 {{ $wrapperClass ?? '' }}">
    <div class="bg-white w-full h-full rounded-tl-xl shadow-sm border-t border-l border-slate-200 overflow-hidden flex flex-col">
        
        <header class="w-full px-4 py-4 md:px-6 lg:px-8 border-b border-slate-200 bg-white shrink-0">
            <nav class="flex items-center gap-1 text-[11px] text-slate-400 mb-1">
                <a href="{{ $breadcrumbUrl ?? '#' }}" class="hover:text-slate-600 transition-colors">{{ $breadcrumbContext ?? 'SIA TDG' }}</a>
                <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="text-slate-500 font-medium">{{ $breadcrumbCurrent ?? $pageTitle ?? 'Dashboard Utama' }}</span>
            </nav>

            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-lg font-bold text-slate-800 leading-tight">{{ $pageTitle ?? 'Dashboard Utama' }}</h1>
                    <p class="text-xs text-slate-500 mt-0.5">{{ $pageSubtitle ?? 'Selamat Datang, Administrator! Ringkasan aktivitas sistem Anda hari ini.' }}</p>
                </div>
                
                @if($showSystemStatus ?? true)
                <div class="text-xs font-medium text-slate-500 bg-slate-50 px-3 py-1.5 border border-slate-200 shrink-0 rounded-lg flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full {{ $statusIndicatorClass ?? 'bg-emerald-500 animate-pulse' }}"></span>
                    {{ $statusLabel ?? 'Sistem:' }} <span class="font-bold text-slate-800">{{ $statusText ?? 'Aktif' }}</span>
                </div>
                @endif
            </div>
        </header>

        @if($showToolbar ?? true)
        <div class="w-full px-4 py-2.5 md:px-6 lg:px-8 border-b border-slate-200 bg-slate-50/80 flex flex-wrap items-center gap-2 shrink-0">
            
            @if($showAddButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-add'); setTimeout(() => isLoading = false, 300); }" 
                {!! $addAttributes ?? '' !!} 
                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white text-xs font-semibold rounded-lg shadow-sm transition-colors cursor-pointer disabled:opacity-70 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5" />
                {{ $addText ?? 'Tambah Data' }}
            </button>
            @endif

            @if($showSaveButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-save'); setTimeout(() => isLoading = false, 300); }" 
                {!! $saveAttributes ?? '' !!} 
                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white text-xs font-semibold rounded-lg shadow-sm transition-colors cursor-pointer disabled:opacity-70 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5" />
                {{ $saveText ?? 'Simpan' }}
            </button>
            @endif

            @if($showViewButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-show'); setTimeout(() => isLoading = false, 300); }" 
                {!! $showAttributes ?? '' !!} 
                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white hover:bg-sky-50 active:bg-sky-100 text-sky-700 border border-sky-200 hover:border-sky-300 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5" />
                {{ $showText ?? 'Lihat' }}
            </button>
            @endif

            @if($showEditButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-edit'); setTimeout(() => isLoading = false, 300); }" 
                {!! $editAttributes ?? '' !!} 
                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white hover:bg-amber-50 active:bg-amber-100 text-amber-700 border border-amber-200 hover:border-amber-300 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed"
                :disabled="isLoading">
                
                <svg x-show="!isLoading" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5" />
                {{ $editText ?? 'Edit' }}
            </button>
            @endif

            @if($showDuplicateButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-duplicate'); setTimeout(() => isLoading = false, 300); }" 
                {!! $duplicateAttributes ?? '' !!} 
                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white hover:bg-slate-100 active:bg-slate-200 text-slate-700 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5 text-slate-500" />
                {{ $duplicateText ?? 'Duplikat' }}
            </button>
            @endif

            @if($showArchiveButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-archive'); setTimeout(() => isLoading = false, 300); }" 
                {!! $archiveAttributes ?? '' !!} 
                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5 text-slate-500" />
                {{ $archiveText ?? 'Arsipkan' }}
            </button>
            @endif

            @if($showDeleteButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-delete'); setTimeout(() => isLoading = false, 300); }" 
                {!! $deleteAttributes ?? '' !!} 
                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white hover:bg-rose-50 active:bg-rose-100 text-rose-600 border border-rose-200 hover:border-rose-300 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5" />
                {{ $deleteText ?? 'Hapus' }}
            </button>
            @endif

            @if($showUndoRedoButton ?? true)
            <div class="inline-flex rounded-lg border border-slate-200 bg-white p-0.5 shadow-sm">
                <button type="button" 
                    x-data="{ isLoading: false }"
                    @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-undo'); setTimeout(() => isLoading = false, 300); }" 
                    {!! $undoAttributes ?? '' !!} 
                    title="Undo (Urungkan)" 
                    class="inline-flex items-center justify-center p-1 text-slate-600 hover:bg-slate-100 rounded transition-colors cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                    :disabled="isLoading"
                >
                    <svg x-show="!isLoading" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a5 5 0 015 5v2m-15-7l4-4m-4 4l4 4"></path></svg>
                    <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5" />
                </button>
                <div class="w-px bg-slate-200 my-0.5"></div>
                <button type="button" 
                    x-data="{ isLoading: false }"
                    @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-redo'); setTimeout(() => isLoading = false, 300); }" 
                    {!! $redoAttributes ?? '' !!} 
                    title="Redo (Ulangi)" 
                    class="inline-flex items-center justify-center p-1 text-slate-600 hover:bg-slate-100 rounded transition-colors cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                    :disabled="isLoading"
                >
                    <svg x-show="!isLoading" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 10H11a5 5 0 00-5 5v2m15-7l-4-4m4 4l-4 4"></path></svg>
                    <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5" />
                </button>
            </div>
            @endif

            @if($showHistoryButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-history'); setTimeout(() => isLoading = false, 300); }" 
                {!! $historyAttributes ?? '' !!} 
                title="Log Aktivitas & Riwayat Perubahan" 
                class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5 text-slate-500" />
                <span class="hidden xl:inline">{{ $historyText ?? 'Riwayat' }}</span>
            </button>
            @endif

            @if($showSearchbar ?? true)
            <x-app.ui.searchbar 
                placeholder="{{ $searchPlaceholder ?? 'Cari transaksi, laporan, data...' }}"
                wrapper-class="relative w-40 md:w-52 bg-white flex items-center transition-all duration-300"
                input-class="w-full pl-7 pr-2.5 py-1.5 text-xs bg-white border border-slate-200 rounded-lg text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 transition-all"
                icon-wrapper-class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none text-slate-400"
                icon-class="w-3.5 h-3.5"
                @input.debounce.500ms="$dispatch('toolbar-search', $event.target.value)"
            />
            @endif

            @if($showDateFilter ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-date-filter'); setTimeout(() => isLoading = false, 300); }" 
                {!! $dateFilterAttributes ?? '' !!} 
                class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5 text-slate-500" />
                <span class="hidden md:inline">{{ $dateFilterText ?? 'Rentang Waktu' }}</span>
            </button>
            @endif

            @if($showAdvancedFilter ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-filter'); setTimeout(() => isLoading = false, 300); }" 
                {!! $filterAttributes ?? '' !!} 
                class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5 text-slate-500" />
                {{ $advancedFilterText ?? 'Filter' }}
                @if(isset($filterCount) && $filterCount > 0)
                    <span class="px-1.5 py-0.2 bg-blue-100 text-blue-700 text-[10px] font-bold rounded-full">{{ $filterCount }}</span>
                @endif
            </button>
            @endif

            @if($showViewToggles ?? true)
            <div x-data="{ activeView: 'table', changingView: null }" class="inline-flex rounded-lg border border-slate-200 bg-white p-0.5 shadow-sm">
                <button type="button" 
                    @click="if(activeView !== 'table') { changingView = 'table'; $dispatch('toolbar-view', 'table'); setTimeout(() => { activeView = 'table'; changingView = null; }, 300); }" 
                    title="Tampilan Tabel" 
                    class="p-1 rounded transition-colors cursor-pointer inline-flex items-center justify-center min-w-[28px] min-h-[28px]"
                    :class="(activeView === 'table' || changingView === 'table') ? 'bg-slate-100 text-blue-600' : 'text-slate-500 hover:text-slate-700 hover:bg-slate-50'"
                    :disabled="changingView !== null"
                >
                    <svg x-show="changingView !== 'table'" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                    <x-app.ui.loading-spinner x-cloak x-show="changingView === 'table'" text="" icon-class="w-3.5 h-3.5 text-blue-600" />
                </button>
                <button type="button" 
                    @click="if(activeView !== 'grid') { changingView = 'grid'; $dispatch('toolbar-view', 'grid'); setTimeout(() => { activeView = 'grid'; changingView = null; }, 300); }" 
                    title="Tampilan Kartu / Grid" 
                    class="p-1 rounded transition-colors cursor-pointer inline-flex items-center justify-center min-w-[28px] min-h-[28px]"
                    :class="(activeView === 'grid' || changingView === 'grid') ? 'bg-slate-100 text-blue-600' : 'text-slate-500 hover:text-slate-700 hover:bg-slate-50'"
                    :disabled="changingView !== null"
                >
                    <svg x-show="changingView !== 'grid'" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    <x-app.ui.loading-spinner x-cloak x-show="changingView === 'grid'" text="" icon-class="w-3.5 h-3.5 text-blue-600" />
                </button>
                <button type="button" 
                    @click="if(activeView !== 'board') { changingView = 'board'; $dispatch('toolbar-view', 'board'); setTimeout(() => { activeView = 'board'; changingView = null; }, 300); }" 
                    title="Tampilan Kolom / Board" 
                    class="p-1 rounded transition-colors cursor-pointer inline-flex items-center justify-center min-w-[28px] min-h-[28px]"
                    :class="(activeView === 'board' || changingView === 'board') ? 'bg-slate-100 text-blue-600' : 'text-slate-500 hover:text-slate-700 hover:bg-slate-50'"
                    :disabled="changingView !== null"
                >
                    <svg x-show="changingView !== 'board'" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path></svg>
                    <x-app.ui.loading-spinner x-cloak x-show="changingView === 'board'" text="" icon-class="w-3.5 h-3.5 text-blue-600" />
                </button>
            </div>
            @endif

            @if($showColumnVisibility ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-columns'); setTimeout(() => isLoading = false, 300); }" 
                {!! $columnAttributes ?? '' !!} 
                title="Kustomisasi Tampilan Kolom" 
                class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5 text-slate-500" />
                <span class="hidden md:inline">{{ $columnVisibilityText ?? 'Kolom' }}</span>
            </button>
            @endif

            @if($showImportButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-import'); setTimeout(() => isLoading = false, 300); }" 
                {!! $importAttributes ?? '' !!} 
                class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5 text-slate-500" />
                {{ $importText ?? 'Import' }}
            </button>
            @endif

            @if($showExportButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-export'); setTimeout(() => isLoading = false, 300); }" 
                {!! $exportAttributes ?? '' !!} 
                class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-white hover:bg-slate-100 text-slate-700 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-60 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5 text-slate-500" />
                {{ $exportText ?? 'Export' }}
                <svg class="w-2.5 h-2.5 text-slate-400 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            @endif

            @if($showPrintButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-print'); setTimeout(() => isLoading = false, 300); }" 
                {!! $printAttributes ?? '' !!} 
                title="Cetak Data / PDF" 
                class="inline-flex items-center justify-center p-1.5 bg-white hover:bg-slate-100 text-slate-600 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H7v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5" />
            </button>
            @endif

            @if($showSyncButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-sync'); setTimeout(() => isLoading = false, 300); }" 
                {!! $syncAttributes ?? '' !!} 
                title="Sinkronisasi Data Real-time" 
                class="inline-flex items-center justify-center p-1.5 bg-white hover:bg-slate-100 text-slate-600 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5" />
            </button>
            @endif

            @if($showRefreshButton ?? true)
            <button type="button" 
                x-data="{ isRefreshing: false }" 
                @main-refresh-start.window="isRefreshing = true" 
                @main-refresh-end.window="isRefreshing = false"
                @click="!isRefreshing && $dispatch('toolbar-refresh')" 
                {!! $refreshAttributes ?? '' !!} 
                title="Muat Ulang Data" 
                class="inline-flex items-center justify-center p-1.5 bg-white hover:bg-slate-100 text-slate-600 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                :disabled="isRefreshing"
            >
                <svg x-show="!isRefreshing" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isRefreshing" text="" icon-class="w-3.5 h-3.5" />
            </button>
            @endif

            @if($showFullscreenButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-fullscreen'); setTimeout(() => isLoading = false, 300); }" 
                {!! $fullscreenAttributes ?? '' !!} 
                title="Mode Layar Penuh" 
                class="inline-flex items-center justify-center p-1.5 bg-white hover:bg-slate-100 text-slate-600 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-5h-4m4 0v4m0 0l-5-5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5" />
            </button>
            @endif
            
            @if($showSettingsButton ?? true)
            <button type="button" 
                x-data="{ isLoading: false }"
                @click="if(!isLoading) { isLoading = true; $dispatch('toolbar-settings'); setTimeout(() => isLoading = false, 300); }" 
                {!! $settingsAttributes ?? '' !!} 
                title="Pengaturan Tampilan Data" 
                class="inline-flex items-center justify-center p-1.5 bg-white hover:bg-slate-100 text-slate-600 border border-slate-200 text-xs font-medium rounded-lg transition-colors cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed"
                :disabled="isLoading"
            >
                <svg x-show="!isLoading" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                <x-app.ui.loading-spinner x-cloak x-show="isLoading" text="" icon-class="w-3.5 h-3.5" />
            </button>
            @endif
            
            @yield('extra_toolbar')
        </div>
        @endif

        @include('layouts.app.partials.contents.main-area')

        @if($showFooter ?? true)
        <footer class="w-full px-4 py-3 md:px-6 border-t border-slate-200 bg-white shrink-0 flex flex-col sm:flex-row sm:items-center justify-between gap-3 z-20">
            <div class="text-xs text-slate-500 font-medium">
                @hasSection('footer_info')
                    @yield('footer_info')
                @else
                    {!! $footerInfo ?? 'Menampilkan <span class="font-bold text-slate-800">1</span> hingga <span class="font-bold text-slate-800">10</span> dari <span class="font-bold text-slate-800">97</span> entri' !!}
                @endif
            </div>
            
            <div class="flex items-center gap-1">
                @hasSection('pagination')
                    @yield('pagination')
                @else
                    <button type="button" class="inline-flex items-center justify-center px-2 py-1.5 min-w-[28px] text-xs font-medium text-slate-500 bg-white border border-slate-200 rounded-md hover:bg-slate-50 disabled:opacity-50 disabled:cursor-not-allowed transition-colors" disabled>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button type="button" class="inline-flex items-center justify-center px-2 py-1.5 min-w-[28px] text-xs font-bold text-white bg-blue-600 border border-blue-600 rounded-md shadow-sm transition-colors cursor-pointer">1</button>
                    <button type="button" class="inline-flex items-center justify-center px-2 py-1.5 min-w-[28px] text-xs font-medium text-slate-600 bg-white border border-slate-200 rounded-md hover:bg-slate-50 transition-colors cursor-pointer">2</button>
                    <span class="text-slate-400 text-xs px-1">...</span>
                    <button type="button" class="inline-flex items-center justify-center px-2 py-1.5 min-w-[28px] text-xs font-medium text-slate-600 bg-white border border-slate-200 rounded-md hover:bg-slate-50 transition-colors cursor-pointer">10</button>
                    <button type="button" class="inline-flex items-center justify-center px-2 py-1.5 min-w-[28px] text-xs font-medium text-slate-500 bg-white border border-slate-200 rounded-md hover:bg-slate-50 transition-colors cursor-pointer">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                @endif
            </div>
        </footer>
        @endif

    </div>
</div>