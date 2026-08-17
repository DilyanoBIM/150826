<!-- resource/views/components/forms/register-form.blade.php -->

<div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center bg-white" :class="mode === 'register' ? 'block' : 'hidden md:flex'">
    <div x-show="mode === 'register'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" class="max-w-sm mx-auto w-full space-y-6">
        <div>
            <h3 class="text-2xl font-bold text-slate-900 tracking-tight">Buat Akun Baru</h3>
            <p class="text-xs text-slate-500 mt-1">Lengkapi data Anda untuk mendaftar.</p>
        </div>

        <!-- Tambahkan x-data dan @submit untuk mendeteksi status loading -->
        <form action="{{ route('register.post') }}" method="POST" class="space-y-4" x-data="{ isRegistering: false }" @submit="isRegistering = true">
            @csrf
            
            @if ($errors->register->any())
                <div class="p-3 bg-red-50 text-red-600 text-xs rounded-xl border border-red-200">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->register->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="John Doe" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 transition-all">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 transition-all">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1.5">Password</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-500/20 transition-all">
            </div>

            <!-- Tombol Submit dengan Spinner dan Disabled State -->
            <button type="submit" :disabled="isRegistering" class="w-full flex justify-center items-center gap-2 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white font-semibold rounded-xl text-sm transition-all shadow-md shadow-indigo-600/20 hover:shadow-indigo-600/30 cursor-pointer disabled:opacity-70 disabled:cursor-not-allowed">
                <!-- SVG Spinner -->
                <svg x-show="isRegistering" style="display: none;" class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span x-text="isRegistering ? 'Memproses...' : 'Daftar Akun'"></span>
            </button>
        </form>

        <div class="block md:hidden text-center pt-2">
            <p class="text-xs text-slate-500">
                Sudah punya akun? 
                <button @click="mode = 'login'" class="text-sky-600 font-semibold hover:underline cursor-pointer">Masuk</button>
            </p>
        </div>
    </div>
</div>