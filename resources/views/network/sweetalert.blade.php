<!-- Memuat Library SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // Objek konfigurasi class Tailwind standar agar seragam & kecil
        const swalCustomClass = {
            popup: 'rounded-2xl shadow-xl pb-4',
            title: 'text-lg font-bold text-slate-800 pt-2', // Ukuran judul lebih kecil
            htmlContainer: 'text-sm text-slate-600',        // Ukuran deskripsi text-sm
            confirmButton: 'text-sm px-5 py-2 rounded-lg font-semibold',
            cancelButton: 'text-sm px-5 py-2 rounded-lg font-semibold'
        };

        // =========================================================================
        // 1. AUTO-CATCH LARAVEL FLASH SESSIONS
        // =========================================================================
        
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{!! addslashes(session('success')) !!}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                width: '320px', // Membatasi lebar popup
                customClass: swalCustomClass
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{!! addslashes(session('error')) !!}',
                confirmButtonColor: '#0284c7',
                width: '320px', // Membatasi lebar popup
                customClass: swalCustomClass
            });
        @endif

        // Menangkap error validasi form
        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                html: `
                    <ul class="text-left text-sm text-red-600 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                confirmButtonColor: '#0284c7',
                width: '360px', // Sedikit lebih lebar untuk memuat list error
                customClass: swalCustomClass
            });
        @endif

        // =========================================================================
        // 2. SISTEM PEMANGGILAN DINAMIS MELALUI HTML CLASS
        // =========================================================================
        
        // A. Class 'swal-fire' (Untuk alert biasa)
        document.querySelectorAll('.swal-fire').forEach(button => {
            button.addEventListener('click', function() {
                Swal.fire({
                    icon: this.dataset.icon || 'info',
                    title: this.dataset.title || 'Informasi',
                    text: this.dataset.text || '',
                    confirmButtonColor: '#0284c7',
                    width: '320px', // Membatasi lebar popup
                    customClass: swalCustomClass
                });
            });
        });

        // B. Class 'swal-confirm' (Untuk konfirmasi form submit)
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
                    width: '340px', // Lebar yang pas untuk konfirmasi dengan 2 tombol
                    customClass: swalCustomClass
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit(); 
                    }
                });
            });
        });
    });

    // =========================================================================
    // 3. SISTEM PEMANGGILAN DINAMIS MELALUI JAVASCRIPT CLASS/OBJECT
    // =========================================================================
    window.ToastAlert = {
        success: (msg) => Swal.fire({ icon: 'success', title: 'Berhasil', text: msg, showConfirmButton: false, timer: 3000, width: '320px', customClass: { popup: 'rounded-2xl shadow-xl pb-4', title: 'text-lg font-bold pt-2', htmlContainer: 'text-sm text-slate-600' } }),
        error: (msg) => Swal.fire({ icon: 'error', title: 'Gagal', text: msg, confirmButtonColor: '#0284c7', width: '320px', customClass: { popup: 'rounded-2xl shadow-xl pb-4', title: 'text-lg font-bold pt-2', htmlContainer: 'text-sm text-slate-600', confirmButton: 'text-sm px-5 py-2 rounded-lg font-semibold' } }),
        info: (msg) => Swal.fire({ icon: 'info', title: 'Info', text: msg, confirmButtonColor: '#0284c7', width: '320px', customClass: { popup: 'rounded-2xl shadow-xl pb-4', title: 'text-lg font-bold pt-2', htmlContainer: 'text-sm text-slate-600', confirmButton: 'text-sm px-5 py-2 rounded-lg font-semibold' } })
    };
</script>