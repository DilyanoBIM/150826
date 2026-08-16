<!-- resources/views/components/app/ui/delete-modal.blade.php -->
@props([
    'title' => 'Hapus Data?',
    'message' => 'Tindakan ini tidak dapat dibatalkan. Data yang dihapus akan hilang secara permanen.',
    'cancelText' => 'Batal',
    'confirmText' => 'Ya, Hapus',
    'confirmEvent' => 'confirmed-delete'
])

<!-- Memanggil asyncAction sambil meng-inject state isOpen khusus untuk modal -->
<div x-data="asyncAction({ isOpen: false })"
     @open-delete-modal.window="isOpen = true"
     x-show="isOpen"
     x-cloak
     x-transition.opacity
     class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/40 p-4"
     @keydown.escape.window="if(!isProcessing) isOpen = false">
     
    <div @click.away="if(!isProcessing) isOpen = false"
         x-show="isOpen"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         class="bg-white rounded-xl shadow-xl w-full max-w-sm p-5 relative overflow-hidden">
        
        <div class="flex items-start gap-3 mb-4">
            <div class="shrink-0 flex items-center justify-center w-10 h-10 rounded-full bg-rose-50">
                <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"></path>
                </svg>
            </div>
            <div>
                <h3 class="text-sm font-semibold text-slate-800">{{ $title }}</h3>
                <p class="text-xs text-slate-500 mt-1">{{ $message }}</p>
            </div>
        </div>
        
        <div class="flex items-center justify-end gap-2">
            <button type="button" 
                    @click="isOpen = false"
                    :disabled="isProcessing"
                    class="px-3 py-1.5 text-xs font-semibold text-slate-600 hover:bg-slate-100 rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed">
                {{ $cancelText }}
            </button>
            
            <button type="button"
                    @click="runAction(async () => {
                        $dispatch('{{ $confirmEvent }}');
                        await new Promise(resolve => setTimeout(resolve, 800));
                        isOpen = false;
                        $dispatch('clear-selection');
                    }, window.ToastAlert.msg.deletedSuccess, window.ToastAlert.msg.deletedFailed)"
                    :disabled="isProcessing"
                    class="px-3 py-1.5 text-xs font-semibold text-white bg-rose-600 hover:bg-rose-700 rounded-lg transition-colors disabled:opacity-70 disabled:cursor-not-allowed flex items-center justify-center min-w-[90px]">
                
                <span x-show="!isProcessing">{{ $confirmText }}</span>
                <x-app.ui.loading-spinner x-show="isProcessing" style="display: none;" />
                
            </button>
        </div>
    </div>
</div>