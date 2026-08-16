<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\ProcessWelcomeSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'register')->withInput();
        }

        // 1. Simpan akun baru ke tabel users
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, 
        ]);

        // 2. MENGGUNAKAN REDIS QUEUE: Melempar tugas berat ke antrean background Redis
        ProcessWelcomeSetup::dispatch($user);

        // 3. MENGGUNAKAN REDIS CACHE: Menyimpan jumlah total pendaftar di Cache Redis selama 24 Jam
        Cache::increment('total_registered_users');

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Sistem sedang menyiapkan lingkungan kerja Anda.');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator, 'login')->withInput();
        }

        $remember = $request->boolean('remember');

        // Proses percobaan login
        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            $request->session()->regenerate();
            
            // Menyimpan log waktu login terakhir menggunakan Cache Redis
            Cache::put('last_login_time_' . Auth::id(), now()->format('d M Y H:i:s'), now()->addDay());

            // PERBARUI BARIS INI: Tambahkan with('success', ...)
            return redirect()->intended('dashboard')->with('success', 'Selamat datang kembali, ' . Auth::user()->name . '! Login berhasil.');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ], 'login')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        // Membersihkan data sesi di Redis Session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah berhasil keluar.');
    }
}