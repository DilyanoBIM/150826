<!-- resources/views/components/feedback/sweetalert.blade.php -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // --- 1. SETUP VARIABEL & KONFIGURASI GLOBAL ---
        const swalCustomClass = {
            popup: 'rounded-2xl shadow-xl pb-4',
            title: 'text-lg font-bold text-slate-800 pt-2',
            htmlContainer: 'text-sm text-slate-600',
            confirmButton: 'text-sm px-5 py-2 rounded-lg font-semibold',
            cancelButton: 'text-sm px-5 py-2 rounded-lg font-semibold'
        };

        // Tangkap data PHP Session
        const serverData = {
            success: @json(session('success')),
            error: @json(session('error')),
            validationErrors: @json(session()->has('errors') ? session('errors')->all() : [])
        };

        // --- 2. DEKLARASI GLOBAL HELPER & KAMUS PESAN (DICTIONARY) ---
        window.ToastAlert = {
            // Modal SweetAlert (Untuk proses yang menghentikan layar / butuh perhatian ekstra)
            success: (msg) => Swal.fire({ icon: 'success', title: 'Berhasil!', text: msg, showConfirmButton: false, timer: 3000, width: '320px', customClass: swalCustomClass }),
            error: (msg) => Swal.fire({ icon: 'error', title: 'Gagal!', text: msg, confirmButtonColor: '#0284c7', width: '320px', customClass: swalCustomClass }),
            info: (msg) => Swal.fire({ icon: 'info', title: 'Info', text: msg, confirmButtonColor: '#0284c7', width: '320px', customClass: swalCustomClass }),
            
            // TOAST ALPINE (Mengirim event ke toast.blade.php tanpa SweetAlert)
            toast: (msg, type = 'success', title = null) => {
                window.dispatchEvent(new CustomEvent('notify', { detail: { type, title, message: msg } }));
            },

            // KAMUS PESAN (Semua teks UI ada di sini)
            msg: {
                // Pesan CRUD
                deletedSuccess: 'Data berhasil dihapus.',
                deletedFailed: 'Gagal menghapus data.',
                savedSuccess: 'Data berhasil disimpan.',
                savedFailed: 'Gagal menyimpan data.',
                refreshSuccess: 'Data berhasil diperbarui.',
                refreshFailed: 'Gagal memperbarui data.',
                
                // Pesan Navigasi SPA (Diubah menjadi function agar menerima parameter nama halaman dinamis)
                navSuccess: (pageName) => `Halaman ${pageName} berhasil dimuat.`,
                navFailed: 'Gagal memuat halaman! Pastikan koneksi jaringan stabil.',
                
                // Pesan Jaringan API
                netSuccess: 'Aksi berhasil diselesaikan.',
                netError: 'Terjadi kesalahan server.',
                netDisconnect: 'Tidak dapat terhubung ke jaringan.'
            }
        };

        const msgDict = window.ToastAlert.msg;

        // --- 3. EKSEKUSI FLASH SESSIONS (Client-Side) ---
        if (serverData.success) {
            window.ToastAlert.toast(serverData.success, 'success');
        }
        
        if (serverData.error) {
            window.ToastAlert.error(serverData.error);
        }
        
        if (serverData.validationErrors.length > 0) {
            const errorHtml = '<ul class="text-left text-sm text-red-600 space-y-1">' + 
                              serverData.validationErrors.map(e => '<li>- ' + e + '</li>').join('') + 
                              '</ul>';
            Swal.fire({
                icon: 'error',
                title: 'Periksa Kembali Inputan',
                html: errorHtml,
                confirmButtonColor: '#0284c7',
                width: '360px',
                customClass: swalCustomClass
            });
        }

        // --- 4. SWEETALERT UI TRIGGERS (.swal-fire & .swal-confirm) ---
        document.querySelectorAll('.swal-fire').forEach(btn => {
            btn.addEventListener('click', function() {
                Swal.fire({ icon: this.dataset.icon || 'info', title: this.dataset.title || 'Informasi', text: this.dataset.text || '', confirmButtonColor: '#0284c7', width: '320px', customClass: swalCustomClass });
            });
        });

        document.querySelectorAll('.swal-confirm').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault(); 
                Swal.fire({
                    title: this.dataset.title || 'Apakah Anda Yakin?',
                    text: this.dataset.text || 'Tindakan ini tidak dapat dibatalkan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#94a3b8',
                    confirmButtonText: 'Ya, Lanjutkan!',
                    cancelButtonText: 'Batal',
                    width: '340px',
                    customClass: swalCustomClass
                }).then((result) => {
                    if (result.isConfirmed) this.submit(); 
                });
            });
        });

        // --- 5. LOGIKA SPA NAVIGATION (PJAX) ---
        document.body.addEventListener('click', async (e) => {
            const link = e.target.closest('#app-sidebar-nav a[href]:not([href="#"])');
            if (!link || link.target === '_blank') return;
            
            const url = link.href;
            if (url === window.location.href.split('#')[0]) { e.preventDefault(); return; }

            e.preventDefault();

            // AMBIL NAMA HALAMAN: Mengambil teks di dalam link yang diklik (misal: "Katalog Produk")
            const pageName = link.textContent.trim();

            window.dispatchEvent(new CustomEvent('start-navigation'));

            try {
                const response = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } });
                if (!response.ok) throw new Error(`HTTP Error: ${response.status}`);

                const html = await response.text();
                const doc = new DOMParser().parseFromString(html, 'text/html');

                const newContent = doc.querySelector('#app-dynamic-content');
                const targetContent = document.querySelector('#app-dynamic-content');
                const newSidebar = doc.querySelector('#app-sidebar-nav');
                const targetSidebar = document.querySelector('#app-sidebar-nav');

                if (newContent && targetContent) {
                    targetContent.innerHTML = newContent.innerHTML;
                    if (newSidebar && targetSidebar) targetSidebar.innerHTML = newSidebar.innerHTML;
                    
                    document.title = doc.title || 'Sistem Informasi Akuntansi TDG';
                    window.history.pushState({}, '', url);

                    // PANGGIL TOAST: Gunakan tipe 'success' agar warnanya seragam hijau
                    window.ToastAlert.toast(msgDict.navSuccess(pageName), 'success');
                } else {
                    window.location.href = url;
                }
            } catch (error) {
                window.ToastAlert.toast(msgDict.navFailed, 'error');
            } finally {
                window.dispatchEvent(new CustomEvent('end-navigation'));
            }
        });

        window.addEventListener('popstate', () => window.location.reload());

        // --- 6. NETWORK INTERCEPTORS (AXIOS / FETCH) ---
        if (window.axios) {
            window.axios.interceptors.response.use(
                response => {
                    if (['post', 'put', 'delete'].includes(response.config.method)) {
                        window.ToastAlert.toast(response.data.message || msgDict.netSuccess, 'success');
                    }
                    return response;
                },
                error => {
                    window.ToastAlert.toast(error.response?.data?.message || msgDict.netError, 'error');
                    return Promise.reject(error);
                }
            );
        }

        const originalFetch = window.fetch;
        window.fetch = async function(...args) {
            try {
                const response = await originalFetch(...args);
                const method = (args[1]?.method || 'GET').toUpperCase();
                
                if (args[1]?.headers?.['X-Requested-With'] === 'XMLHttpRequest' && method === 'GET') {
                    return response;
                }

                if (!response.ok) { 
                    let errorMsg = `Error ${response.status}`;
                    try { errorMsg = (await response.clone().json()).message || errorMsg; } catch (e) {}
                    window.ToastAlert.toast(errorMsg || msgDict.netError, 'error');
                } else if (['POST', 'PUT', 'DELETE'].includes(method)) {
                    window.ToastAlert.toast(msgDict.netSuccess, 'success');
                }
                return response;
            } catch (error) {
                window.ToastAlert.toast(msgDict.netDisconnect, 'error');
                throw error;
            }
        };
    });

    // --- 7. REUSABLE ALPINE COMPONENT ---
    document.addEventListener('alpine:init', () => {
        Alpine.data('asyncAction', (initialState = {}) => ({
            isProcessing: false,
            ...initialState, 
            async runAction(actionCallback, successMsg = null, failMsg = null) {
                this.isProcessing = true;
                try {
                    await actionCallback();
                    if (successMsg) window.ToastAlert.toast(successMsg, 'success');
                } catch (error) {
                    if (failMsg) window.ToastAlert.toast(failMsg, 'error');
                } finally {
                    this.isProcessing = false;
                }
            }
        }));
    });
</script>