<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessWelcomeSetup implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Eksekusi tugas berat di sini (masuk ke tabel 'jobs')
     */
    public function handle(): void
    {
        // Simulasi proses berat selama 3 detik (misal: generate report, kirim email)
        sleep(3); 
        Log::info('Setup awal sistem berhasil diselesaikan di background untuk user: ' . $this->user->name);
    }
}