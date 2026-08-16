<!-- resources/views/components/app/ui/toolbar/refresh-button.blade.php -->
<div x-data="asyncAction" class="inline-flex">
    <button type="button" 
            @click="runAction(async () => {
                $dispatch('trigger-refresh');
                await new Promise(resolve => setTimeout(resolve, 800));
            }, window.ToastAlert.msg.refreshSuccess, window.ToastAlert.msg.refreshFailed)"
            :disabled="isProcessing"
            class="inline-flex items-center gap-1.5 px-2.5 py-1.5 bg-white border border-slate-200 text-slate-700 hover:bg-slate-50 hover:text-sky-600 rounded-lg text-xs font-semibold transition-colors cursor-pointer whitespace-nowrap disabled:opacity-75 disabled:cursor-wait">
        
        <svg class="w-3.5 h-3.5" :class="isProcessing ? 'animate-spin text-sky-600' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
        </svg>
        <span>Refresh</span>
    </button>
</div>