<div class="col-start-1 md:col-start-2 col-span-1 row-start-2 row-span-3 transition-all duration-300 overflow-hidden">
    <main class="h-full bg-[#faf7f2] pt-4 md:pt-6 pl-4 md:pl-6 pr-0 pb-0 overflow-hidden">

        <div x-data="{
                showToolbar: true,
                showExtras: true,
                showBulkBar: false,
                selectedCount: 0,
                refreshing: false,
                search: '',
                
                init() {
                    window.addEventListener('selection-changed', (e) => {
                        this.selectedCount = e.detail.count || 0;
                        this.showBulkBar = this.selectedCount > 0;
                    });

                    window.addEventListener('clear-selection', () => {
                        this.showBulkBar = false;
                        this.selectedCount = 0;
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
                },

                doRefresh() {
                    this.refreshing = true;
                    this.$dispatch('reload-data');
                    setTimeout(() => { this.refreshing = false; }, 800);
                }
             }"
             class="bg-white w-full h-full border-t border-l border-slate-200 rounded-tl-2xl flex flex-col overflow-hidden min-h-0">

            @include('layouts.app.partials.content.header')
            @include('layouts.app.partials.content.tabs')
            @include('layouts.app.partials.content.bulk-bar')
            @include('layouts.app.partials.content.toolbar')
            @include('layouts.app.partials.content.stats')
            @include('layouts.app.partials.content.main-area')
            @include('layouts.app.partials.content.pagination')
            @include('layouts.app.partials.content.footer')
            
            <x-app.ui.delete-modal />

        </div>

    </main>
</div>