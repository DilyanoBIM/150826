<!-- Container Alpine.js untuk manajemen Toasts -->
<div x-data="toastManager()"
     @notify.window="add($event.detail)"
     class="fixed bottom-6 right-6 z-50 flex flex-col gap-3 w-full max-w-sm pointer-events-none">

    <!-- Looping untuk setiap pesan (mendukung multiple toast bertumpuk) -->
    <template x-for="toast in toasts" :key="toast.id">
        <div x-show="toast.visible"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-4"
             class="flex items-start p-4 rounded-2xl shadow-xl border pointer-events-auto backdrop-blur-sm"
             :class="{
                'bg-emerald-50/90 border-emerald-200 text-emerald-800': toast.type === 'success',
                'bg-red-50/90 border-red-200 text-red-800': toast.type === 'error',
                'bg-amber-50/90 border-amber-200 text-amber-800': toast.type === 'warning',
                'bg-sky-50/90 border-sky-200 text-sky-800': toast.type === 'info'
             }">
            
            <div class="flex-1">
                <h4 class="text-sm font-bold tracking-tight" x-text="toast.title"></h4>
                <p class="text-xs mt-1 opacity-90 leading-relaxed" x-text="toast.message"></p>
            </div>
            
            <!-- Tombol Tutup (Dismiss) -->
            <button @click="remove(toast.id)" class="ml-4 opacity-50 hover:opacity-100 focus:outline-none transition-opacity cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </template>
</div>

<script>
    // --- 1. LOGIKA UI ALPINE.JS ---
    document.addEventListener('alpine:init', () => {
        Alpine.data('toastManager', () => ({
            toasts: [],
            add(toast) {
                const id = Date.now();
                this.toasts.push({ ...toast, id, visible: true });
                // Auto hapus toast setelah 4.5 detik
                setTimeout(() => { this.remove(id) }, toast.timeout || 4500);
            },
            remove(id) {
                const index = this.toasts.findIndex(t => t.id === id);
                if (index !== -1) {
                    this.toasts[index].visible = false;
                    // Hapus dari DOM setelah animasi transisi selesai
                    setTimeout(() => {
                        this.toasts = this.toasts.filter(t => t.id !== id);
                    }, 300);
                }
            }
        }));
    });

    // --- 2. GLOBAL NETWORK INTERCEPTOR ---
    const triggerToast = (type, title, message) => {
        window.dispatchEvent(new CustomEvent('notify', { detail: { type, title, message } }));
    };

    // A. Intercept Axios (Jika menggunakan Axios bawaan Laravel untuk AJAX)
    if (window.axios) {
        window.axios.interceptors.response.use(
            response => {
                // Munculkan toast sukses otomatis jika method berupa POST/PUT/DELETE
                if (['post', 'put', 'delete'].includes(response.config.method)) {
                    triggerToast('success', 'Berhasil', response.data.message || 'Aksi berhasil diselesaikan.');
                }
                return response;
            },
            error => {
                const status = error.response ? error.response.status : 'Jaringan';
                const message = error.response?.data?.message || error.message || 'Terjadi kesalahan server.';
                triggerToast('error', `Error ${status}`, message);
                return Promise.reject(error);
            }
        );
    }

    // B. Intercept Fetch API (Jika menggunakan Alpine.js / Vanilla JS AJAX)
    const originalFetch = window.fetch;
    window.fetch = async function(...args) {
        try {
            const response = await originalFetch(...args);
            const method = (args[1]?.method || 'GET').toUpperCase();
            
            if (!response.ok) { // Jika status code 4xx atau 5xx
                let errorMsg = `Permintaan gagal (Status: ${response.status})`;
                try {
                    const errData = await response.clone().json();
                    errorMsg = errData.message || errorMsg;
                } catch (e) {} // Abaikan jika response bukan JSON
                triggerToast('error', `Error ${response.status}`, errorMsg);
            } else if (['POST', 'PUT', 'DELETE'].includes(method)) {
                // Munculkan toast sukses otomatis untuk manipulasi data
                triggerToast('success', 'Berhasil', 'Tindakan berhasil diselesaikan.');
            }
            
            return response;
        } catch (error) {
            // Error koneksi internet / server mati
            triggerToast('error', 'Koneksi Terputus', error.message || 'Tidak dapat terhubung ke jaringan.');
            throw error;
        }
    };
</script>

<!-- --- 3. MENANGKAP LARAVEL FLASH SESSIONS (HTTP Biasa) --- -->
<!-- Berfungsi jika proses tidak menggunakan AJAX, melainkan Reload/Redirect HTTP -->
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            triggerToast('success', 'Berhasil', '{!! addslashes(session('success')) !!}');
        });
    </script>
@endif

@if(session('error') || $errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            triggerToast('error', 'Terjadi Kesalahan', '{!! addslashes(session('error') ?? $errors->first()) !!}');
        });
    </script>
@endif