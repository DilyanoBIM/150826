<!-- resource/views/components/feedback/overlay.blade.php -->
<div 
    class="hidden md:flex absolute top-0 bottom-0 w-1/2 bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 p-10 flex-col justify-between z-20 transition-transform duration-500 ease-in-out text-white"
    :class="mode === 'login' ? 'translate-x-0' : 'translate-x-full'"
>
    <div>
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/15 backdrop-blur-md border border-white/20 text-xs font-medium text-sky-100">
            <span>App 090826</span>
        </div>
    </div>

    <div class="space-y-4">
        <h2 class="text-3xl font-extrabold leading-tight tracking-tight" x-text="mode === 'login' ? 'Selamat Datang Kembali!' : 'Bergabung Bersama Kami!'"></h2>
        <p class="text-sky-100 text-sm leading-relaxed" x-text="mode === 'login' ? 'Masuk ke akun Anda untuk mengakses semua fitur proyek 090826.' : 'Daftarkan akun baru Anda secara gratis dan mulai jelajahi layanannya.'"></p>
        
        <button 
            @click="mode = mode === 'login' ? 'register' : 'login'"
            class="mt-4 px-6 py-2.5 rounded-xl border border-white/40 bg-white/10 hover:bg-white/20 text-white font-semibold text-sm transition-all duration-200 backdrop-blur-sm shadow-sm cursor-pointer"
        >
            <span x-text="mode === 'login' ? 'Belum punya akun? Daftar' : 'Sudah punya akun? Masuk'"></span>
        </button>
    </div>

    <div class="text-xs text-sky-200/80 font-medium">
        &copy; 2026 App 090826. All rights reserved.
    </div>
</div>