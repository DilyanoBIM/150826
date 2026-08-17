<!-- resource/views/layouts/app/partials/content.blade.php -->
<div class="col-start-1 md:col-start-2 col-span-1 row-start-2 row-span-3 transition-all duration-300 overflow-hidden">
    <main class="relative h-full bg-[#faf7f2] pt-4 md:pt-6 pl-4 md:pl-6 pr-0 pb-0 overflow-hidden">

        <div x-data="{
                showToolbar: true,
                showExtras: true,
                selectedCount: 0, // <-- Menyimpan jumlah item yang dicentang
                selectedItems: [], // <-- Menyimpan ID item yang dicentang
                refreshing: false,
                search: '',
                isNavigating: false,
                
                init() {
                    // Menerima data dari tabel saat checkbox diklik
                    window.addEventListener('selection-changed', (e) => {
                        this.selectedCount = e.detail.count || 0;
                        this.selectedItems = e.detail.items || [];
                    });

                    window.addEventListener('clear-selection', () => {
                        this.selectedCount = 0;
                        this.selectedItems = [];
                    });

                    window.addEventListener('keydown', (e) => {
                        if (e.key === '/' && !['INPUT','TEXTAREA'].includes(e.target.tagName)) {
                            e.preventDefault();
                            this.$refs.searchInput?.focus();
                        }
                    });

                    window.addEventListener('confirmed-delete', () => {
                        this.doRefresh();
                    });

                    window.addEventListener('start-navigation', () => { this.isNavigating = true; });
                    window.addEventListener('end-navigation', () => { this.isNavigating = false; });
                },

                doRefresh() {
                    this.refreshing = true;
                    this.$dispatch('reload-data');
                    setTimeout(() => { this.refreshing = false; }, 800);
                }
             }"
             class="relative bg-white w-full h-full border-t border-l border-slate-200 rounded-tl-2xl flex flex-col overflow-hidden min-h-0">

            <!-- LOADING OVERLAY -->
            <div x-show="isNavigating"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 style="display: none;"
                 class="absolute inset-0 z-50 bg-white/60 backdrop-blur-sm flex items-center justify-center">
                <div class="bg-white px-5 py-3 rounded-2xl shadow-xl border border-slate-100 flex flex-col items-center gap-2">
                    <x-app.ui.loading-spinner class="text-sky-600" iconClass="w-6 h-6" />
                </div>
            </div>

            <div id="app-dynamic-content" class="flex flex-col h-full overflow-hidden w-full">
                @include('layouts.app.partials.content.header')
                @include('layouts.app.partials.content.tabs')
                
                <!-- HAPUS baris include bulk-bar jika Anda masih memilikinya -->

                @include('layouts.app.partials.content.toolbar')
                @include('layouts.app.partials.content.stats')
                @include('layouts.app.partials.content.main-area')
                @include('layouts.app.partials.content.pagination')
                @include('layouts.app.partials.content.footer')
                
                <x-app.ui.delete-modal />
            </div>

        </div>

    </main>
</div>