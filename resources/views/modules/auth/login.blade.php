@extends('layouts.auth.app')

@section('title', '090826 - Auth Slide UI')

@section('content')

    <!-- Inisialisasi Alpine JS: Buka mode 'register' hanya jika ada error registrasi -->
    <div 
        x-data="{ mode: '{{ $errors->register->any() ? 'register' : 'login' }}' }" 
        class="relative w-full max-w-4xl bg-white border border-slate-200/80 rounded-3xl shadow-xl overflow-hidden min-h-[580px] flex flex-col md:flex-row"
    >
        <!-- Panggil dari folder feedback -->
        <x-feedback.overlay />

        <!-- Panggil dari folder forms -->
        <x-forms.register-form />

        <x-forms.login-form />
    </div>

@endsection