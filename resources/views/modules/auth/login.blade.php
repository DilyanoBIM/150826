@extends('layouts.auth.app')

@section('title', '090826 - Auth Slide UI')

@section('content')

    <!-- Inisialisasi Alpine JS: Buka mode 'register' hanya jika ada error registrasi -->
    <div 
        x-data="{ mode: '{{ $errors->register->any() ? 'register' : 'login' }}' }" 
        class="relative w-full max-w-4xl bg-white border border-slate-200/80 rounded-3xl shadow-xl overflow-hidden min-h-[580px] flex flex-col md:flex-row"
    >
        <x-login.overlay />

        <x-login.register-form />

        <x-login.login-form />
    </div>

@endsection