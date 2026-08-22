<!-- resources/views/components/app/ui/dataview.blade.php -->
@props([
    'columns' => [],
    'cardTitle' => 'nama',
    'cardSubtitle' => 'email',
    'boardGroup' => 'status',
    'boardColumns' => ['Aktif', 'Pending', 'Nonaktif']
])

<div x-data="{ 
        // Logika Auto-Filter Pencarian
        get filteredItems() {
            if (this.searchQuery === '') return this.items;
            return this.items.filter(item => 
                JSON.stringify(item).toLowerCase().includes(this.searchQuery.toLowerCase())
            );
        }
    }" 
    class="w-full"
>
    <!-- === 1. TAMPILAN TABEL === -->
    <div x-show="currentView === 'table'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
        <div x-show="searchQuery !== ''" class="mb-4 text-sm text-slate-500">
            Menampilkan hasil pencarian untuk: <span class="font-bold text-sky-600" x-text="searchQuery"></span>
        </div>

        <div class="border border-slate-200 rounded-xl overflow-hidden bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 whitespace-nowrap">
                    <thead class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        <tr>
                            <th class="px-4 py-3 w-10 text-center">
                                <input type="checkbox" @click="toggleAll()" :checked="semuaDipilih" class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500 cursor-pointer">
                            </th>
                            @foreach($columns as $col)
                                <th class="px-4 py-3 {{ ($col['type'] ?? 'text') === 'badge' ? 'text-center' : '' }}">{{ $col['label'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <template x-for="item in filteredItems" :key="item.id">
                            <tr class="hover:bg-slate-50 transition-colors" :class="selectedItems.includes(item.id) ? 'bg-sky-50/50' : ''">
                                <td class="px-4 py-3 text-center">
                                    <input type="checkbox" :value="item.id" x-model="selectedItems" class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500 cursor-pointer">
                                </td>
                                @foreach($columns as $col)
                                    <td class="px-4 py-3 {{ ($col['type'] ?? 'text') === 'badge' ? 'text-center' : '' }}">
                                        
                                        @if(($col['type'] ?? 'text') === 'text')
                                            <span class="{{ $col['class'] ?? 'text-slate-600' }}" x-text="item.{{ $col['key'] }}"></span>
                                        @endif

                                        @if(($col['type'] ?? 'text') === 'badge')
                                            <span class="px-2 py-1 text-[10px] font-bold rounded-md" 
                                                  :class="{
                                                      'bg-emerald-100 text-emerald-700': item.{{ $col['key'] }} === 'Aktif' || item.{{ $col['key'] }} === 'Selesai',
                                                      'bg-rose-100 text-rose-700': item.{{ $col['key'] }} === 'Nonaktif' || item.{{ $col['key'] }} === 'Batal',
                                                      'bg-amber-100 text-amber-700': item.{{ $col['key'] }} === 'Pending' || item.{{ $col['key'] }} === 'Proses',
                                                      'bg-slate-100 text-slate-600': !['Aktif','Selesai','Nonaktif','Batal','Pending','Proses'].includes(item.{{ $col['key'] }})
                                                  }" 
                                                  x-text="item.{{ $col['key'] }}"></span>
                                        @endif

                                    </td>
                                @endforeach
                            </tr>
                        </template>
                        <tr x-show="filteredItems.length === 0">
                            <td colspan="{{ count($columns) + 1 }}" class="px-4 py-8 text-center text-slate-500">Tidak ada data yang sesuai.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- === 2. TAMPILAN GRID (CARD) === -->
    <div x-cloak x-show="currentView === 'grid'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <template x-for="item in filteredItems" :key="item.id">
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-5 flex flex-col relative transition-all hover:shadow-md" :class="selectedItems.includes(item.id) ? 'ring-2 ring-sky-500 border-sky-500' : ''">
                    <div class="absolute top-4 right-4">
                        <input type="checkbox" :value="item.id" x-model="selectedItems" class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500 cursor-pointer">
                    </div>
                    <!-- Avatar Otomatis dari Huruf Pertama Title -->
                    <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-slate-500 font-bold text-lg mb-3" x-text="String(item.{{ $cardTitle }}).charAt(0)"></div>
                    <h3 class="font-bold text-slate-800 text-sm" x-text="item.{{ $cardTitle }}"></h3>
                    <p class="text-xs text-slate-500 mt-0.5 truncate" x-text="item.{{ $cardSubtitle }}"></p>
                    
                    <div class="mt-4 flex items-center justify-between pt-4 border-t border-slate-100">
                        <span class="text-xs font-semibold text-slate-600 bg-slate-100 px-2 py-1 rounded" x-text="item.id"></span>
                        <span class="w-2 h-2 rounded-full" 
                              :class="{
                                  'bg-emerald-500': item.{{ $boardGroup }} === 'Aktif' || item.{{ $boardGroup }} === 'Selesai',
                                  'bg-rose-500': item.{{ $boardGroup }} === 'Nonaktif' || item.{{ $boardGroup }} === 'Batal',
                                  'bg-amber-500': item.{{ $boardGroup }} === 'Pending' || item.{{ $boardGroup }} === 'Proses'
                              }"></span>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- === 3. TAMPILAN BOARD (KANBAN) === -->
    <div x-cloak x-show="currentView === 'board'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100">
        <div class="flex gap-4 overflow-x-auto pb-4 items-start">
            
            @foreach($boardColumns as $bCol)
            <div class="bg-slate-50/80 border border-slate-200 rounded-xl p-4 w-80 shrink-0 flex flex-col max-h-[800px]">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-slate-800 text-sm">{{ $bCol }}</h3>
                    <span class="bg-white border border-slate-200 text-slate-600 text-xs font-bold px-2 py-0.5 rounded-full shadow-sm" x-text="filteredItems.filter(i => i.{{ $boardGroup }} === '{{ $bCol }}').length"></span>
                </div>
                <div class="flex flex-col gap-3 overflow-y-auto pr-1">
                    <template x-for="item in filteredItems.filter(i => i.{{ $boardGroup }} === '{{ $bCol }}')" :key="item.id">
                        <div class="bg-white border border-slate-200 rounded-lg p-3 shadow-sm cursor-pointer hover:border-sky-300 transition-colors" @click="if(!selectedItems.includes(item.id)) selectedItems.push(item.id); else selectedItems = selectedItems.filter(id => id !== item.id)" :class="selectedItems.includes(item.id) ? 'ring-1 ring-sky-500' : ''">
                            <h4 class="font-bold text-slate-800 text-sm" x-text="item.{{ $cardTitle }}"></h4>
                            <p class="text-xs text-slate-500 mt-1" x-text="item.{{ $cardSubtitle }}"></p>
                        </div>
                    </template>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>