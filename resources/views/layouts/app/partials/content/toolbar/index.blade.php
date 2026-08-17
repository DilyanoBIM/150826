<!-- resources/views/layouts/app/partials/content/toolbar/index.blade.php -->
@props([
    // Visibilitas fitur kiri
    'showToggleView' => true,
    'showFilter'     => true,
    'showSort'       => true,
    'showSearch'     => true,
    'searchPlaceholder' => 'Cari data... ( / )',

    // Pengaturan & Aksi Tombol Kanan
    'showRefresh'    => true,
    'refreshId'      => 'btn-refresh',

    'showExport'     => true,
    'exportHref'     => null,
    'exportId'       => 'btn-export',
    'exportEvent'    => 'export-data',

    'showPrint'      => true,
    'printHref'      => null,
    'printId'        => 'btn-print',
    'printEvent'     => 'print-data',

    'showImport'     => true,
    'importHref'     => null,
    'importId'       => 'btn-import',
    'importEvent'    => 'open-import-modal',

    'showDelete'     => true,
    'deleteId'       => 'btn-delete-bulk',
    'deleteEvent'    => 'open-delete-modal',

    'showAdd'        => true,
    'addHref'        => null,
    'addText'        => 'Tambah Data',
    'addId'          => 'btn-add-data',
    'addEvent'       => 'open-add-modal',

    // --- TAMBAHAN PROPS UNTUK TOMBOL SIMPAN ---
    'showSave'       => true, // Default false agar tidak muncul di halaman yang tidak butuh
    'saveHref'       => null,
    'saveText'       => 'Simpan',
    'saveId'         => 'btn-save',
    'saveType'       => 'submit',
    'saveEvent'      => 'save-data',
])

<div {{ $attributes->merge(['class' => 'flex flex-wrap items-center justify-between gap-3 w-full']) }}>
    
    <!-- Sisi Kiri: Filter, Sort & Pencarian -->
    <div class="flex flex-wrap items-center gap-2">
        @if($showToggleView)
            <x-app.ui.toolbar.toggle-view />
            @if($showFilter || $showSort)
                <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block"></span>
            @endif
        @endif

        @if($showFilter)
            <x-app.ui.button.filter id="btn-filter" />
        @endif

        @if($showSort)
            <x-app.ui.button.sort id="btn-sort" />
        @endif

        @if(($showToggleView || $showFilter || $showSort) && $showSearch)
            <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block mx-1"></span>
        @endif
        
        @if($showSearch)
            <x-app.ui.searchbar 
                id="toolbar-search"
                :placeholder="$searchPlaceholder"
                wrapperClass="relative hidden md:block"
                iconWrapperClass="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none text-slate-400"
                iconClass="w-3.5 h-3.5"
                inputClass="w-40 lg:w-56 pl-8 pr-2.5 py-1.5 text-xs border border-slate-200 rounded-lg bg-white focus:border-sky-400 focus:outline-none focus:ring-2 focus:ring-sky-500/10 transition-colors"
                aria-label="Cari data"
                x-ref="searchInput"
                x-model="search"
                @input.debounce.400ms="$dispatch('table-search', { query: search })"
            />
        @endif

        {{ $leftActions ?? '' }}
    </div>

    <!-- Sisi Kanan: Aksi & Tombol Data -->
    <div class="flex flex-wrap items-center gap-2">
        @if($showRefresh)
            <x-app.ui.toolbar.refresh-button id="{{ $refreshId }}" />
        @endif

        @if($showExport)
            <x-app.ui.button.export 
                id="{{ $exportId }}"
                :href="$exportHref" 
                @click="!@js($exportHref) && $dispatch('{{ $exportEvent }}')" 
            />
        @endif

        @if($showPrint)
            <x-app.ui.button.print 
                id="{{ $printId }}"
                :href="$printHref" 
                @click="!@js($printHref) && $dispatch('{{ $printEvent }}')" 
            />
        @endif

        @if($showImport)
            <x-app.ui.button.import 
                id="{{ $importId }}"
                :href="$importHref" 
                @click="!@js($importHref) && $dispatch('{{ $importEvent }}')" 
            />
        @endif

        {{ $rightActions ?? '' }}

        <!-- Perbarui kondisi separator agar memperhitungkan showSave -->
        @if(($showRefresh || $showExport || $showPrint || $showImport) && ($showDelete || $showAdd || $showSave))
            <span class="h-4 w-px bg-slate-300 shrink-0 hidden sm:block mx-1"></span>
        @endif
        
        <!-- Tombol Hapus Dinamis / Bulk Delete -->
        @if($showDelete)
            <button type="button" 
                    id="{{ $deleteId }}"
                    @click="if(selectedCount > 0) { $dispatch('{{ $deleteEvent }}', { items: selectedItems }) } else { window.ToastAlert.toast('Pilih minimal satu data untuk dihapus', 'warning') }"
                    class="btn-bulk-delete inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-rose-600 bg-white border border-rose-200 rounded-lg hover:bg-rose-50 hover:text-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500/20 transition-all shadow-sm">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                <span x-text="selectedCount > 0 ? 'Hapus (' + selectedCount + ')' : 'Hapus'"></span>
            </button>
        @endif
        
        <!-- --- TAMBAHAN TOMBOL SIMPAN --- -->
        @if($showSave)
            <x-app.ui.button.save 
                id="{{ $saveId }}"
                :href="$saveHref" 
                :text="$saveText" 
                :type="$saveType"
                @click="!@js($saveHref) && $dispatch('{{ $saveEvent }}')"
            />
        @endif

        <!-- Tombol Tambah Data -->
        @if($showAdd)
            <x-app.ui.button.add 
                id="{{ $addId }}"
                :href="$addHref" 
                :text="$addText" 
                @click="!@js($addHref) && $dispatch('{{ $addEvent }}')"
            />
        @endif
    </div>
</div>