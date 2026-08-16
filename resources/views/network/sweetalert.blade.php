<!-- resources/views/network/sweetalert.blade.php -->
<?php
    $flashSuccess = session('success');
    $flashError = session('error');
    $valErrors = session()->has('errors') ? session('errors')->all() : [];
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        const swalCustomClass = {
            popup: 'rounded-2xl shadow-xl pb-4',
            title: 'text-lg font-bold text-slate-800 pt-2',
            htmlContainer: 'text-sm text-slate-600',
            confirmButton: 'text-sm px-5 py-2 rounded-lg font-semibold',
            cancelButton: 'text-sm px-5 py-2 rounded-lg font-semibold'
        };

        const flashSuccess = <?php echo json_encode($flashSuccess); ?>;
        const flashError = <?php echo json_encode($flashError); ?>;
        const validationErrors = <?php echo json_encode($valErrors); ?>;

        if (flashSuccess) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: flashSuccess,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                width: '320px',
                customClass: swalCustomClass
            });
        }

        if (flashError) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: flashError,
                confirmButtonColor: '#0284c7',
                width: '320px',
                customClass: swalCustomClass
            });
        }

        if (validationErrors && validationErrors.length > 0) {
            const errorHtml = '<ul class="text-left text-sm text-red-600 space-y-1">' + 
                              validationErrors.map(e => '<li>- ' + e + '</li>').join('') + 
                              '</ul>';
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                html: errorHtml,
                confirmButtonColor: '#0284c7',
                width: '360px',
                customClass: swalCustomClass
            });
        }

        document.querySelectorAll('.swal-fire').forEach(button => {
            button.addEventListener('click', function() {
                Swal.fire({
                    icon: this.dataset.icon || 'info',
                    title: this.dataset.title || 'Informasi',
                    text: this.dataset.text || '',
                    confirmButtonColor: '#0284c7',
                    width: '320px',
                    customClass: swalCustomClass
                });
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
                    if (result.isConfirmed) {
                        this.submit(); 
                    }
                });
            });
        });
    });

    // Deklarasi Global Object & Kamus Pesan (Message Dictionary)
    window.ToastAlert = {
        success: (msg) => Swal.fire({ icon: 'success', title: 'Berhasil', text: msg, showConfirmButton: false, timer: 3000, width: '320px', customClass: { popup: 'rounded-2xl shadow-xl pb-4', title: 'text-lg font-bold pt-2', htmlContainer: 'text-sm text-slate-600' } }),
        
        error: (msg) => Swal.fire({ icon: 'error', title: 'Gagal', text: msg, confirmButtonColor: '#0284c7', width: '320px', customClass: { popup: 'rounded-2xl shadow-xl pb-4', title: 'text-lg font-bold pt-2', htmlContainer: 'text-sm text-slate-600', confirmButton: 'text-sm px-5 py-2 rounded-lg font-semibold' } }),
        
        info: (msg) => Swal.fire({ icon: 'info', title: 'Info', text: msg, confirmButtonColor: '#0284c7', width: '320px', customClass: { popup: 'rounded-2xl shadow-xl pb-4', title: 'text-lg font-bold pt-2', htmlContainer: 'text-sm text-slate-600', confirmButton: 'text-sm px-5 py-2 rounded-lg font-semibold' } }),
        
        toast: (msg, type = 'success') => Swal.fire({ toast: true, position: 'bottom-end', icon: type, title: msg, showConfirmButton: false, timer: 3000, timerProgressBar: true }),

        // Kamus pesan global agar reusable di semua komponen
        msg: {
            deletedSuccess: 'Data berhasil dihapus.',
            deletedFailed: 'Gagal menghapus data.',
            savedSuccess: 'Data berhasil disimpan.',
            savedFailed: 'Gagal menyimpan data.',
            refreshSuccess: 'Refresh Success.',
            refreshFailed: 'Gagal memperbarui data.'
        }
    };

    // --- REUSABLE ALPINE COMPONENT ---
    // Logika asinkronus (loading & try-catch) yang bisa dipakai berulang kali di halaman mana saja.
    document.addEventListener('alpine:init', () => {
        Alpine.data('asyncAction', (initialState = {}) => ({
            isProcessing: false,
            ...initialState, // Memungkinkan injeksi state lain seperti isOpen (untuk modal)
            
            async runAction(actionCallback, successMsg = null, failMsg = null) {
                this.isProcessing = true;
                try {
                    // Jalankan fungsi apapun yang dikirim dari tombol (bisa fetch, dispatch, dll)
                    await actionCallback();
                    
                    if (successMsg && typeof window.ToastAlert !== 'undefined') {
                        window.ToastAlert.toast(successMsg, 'success');
                    }
                } catch (error) {
                    console.error('Action Error:', error);
                    if (failMsg && typeof window.ToastAlert !== 'undefined') {
                        window.ToastAlert.toast(failMsg, 'error');
                    }
                } finally {
                    this.isProcessing = false;
                }
            }
        }));
    });
</script>