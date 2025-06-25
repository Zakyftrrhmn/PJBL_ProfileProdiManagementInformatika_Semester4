<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log; // Pastikan ini diimpor
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    protected $permissionRoutes = [
        'dashboard'             => '/admin/dashboard',
        'kurikulum'             => '/admin/kurikulum',
        'dosen'                 => '/admin/dosen',
        'kalender-akademik'     => '/admin/kalender_akademik',
        'akreditasi'            => '/admin/akreditasi',
        'laporan_kepuasan'      => '/admin/laporan_kepuasan',
        'gallery'               => '/admin/gallery',
        'prestasi_mahasiswa'    => '/admin/prestasi_mahasiswa',
        'profile-kelulusan'     => '/admin/profile_kelulusan',
        'karya_mahasiswa'       => '/admin/karya_mahasiswa',
        'publish'               => '/admin/informasi',
        'manajemen_konten'      => '/admin/visi',
        'management-access'     => '/admin/users',
    ];

    protected $maxAttempts = 5;
    protected $lockoutTime = 30;

    public function login()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        $email = $request->input('email');
        $throttleKey = 'login_attempts_' . Str::slug($email);
        $lockoutKey = 'lockout_until_' . Str::slug($email);

        Log::info("Login attempt for email: {$email}");

        // Cek apakah user sedang dalam masa lockout
        if (Cache::has($lockoutKey)) {
            $lockoutUntil = Cache::get($lockoutKey);
            $remainingTime = $lockoutUntil - now()->timestamp;

            if ($remainingTime > 0) {
                Log::warning("User {$email} is in lockout. Remaining: {$remainingTime} seconds.");
                throw ValidationException::withMessages([
                    'email' => ["Terlalu banyak percobaan login. Silakan coba lagi dalam {$remainingTime} detik."],
                ])->redirectTo(route('login'));
            } else {
                Log::info("Lockout for {$email} expired. Clearing keys.");
                Cache::forget($lockoutKey);
                Cache::forget($throttleKey);
            }
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            Log::info("Login successful for user: {$email}. Clearing throttle/lockout keys.");
            Cache::forget($throttleKey);
            Cache::forget($lockoutKey);

            foreach ($this->permissionRoutes as $permission => $route) {
                if ($user->can($permission)) {
                    return redirect()->intended($route);
                }
            }

            Auth::logout();
            return redirect()->route('login')->with('error', 'Anda tidak memiliki akses ke halaman manapun.');
        }

        // Jika autentikasi gagal
        // Pastikan kita menginisialisasi attempts jika belum ada
        if (!Cache::has($throttleKey)) {
            Cache::put($throttleKey, 0, now()->addMinutes(10)); // Inisialisasi dengan 0 atau 1 tergantung logika awal Anda
            $attempts = 0; // Jika put dengan 0, attempts awal 0
        }

        $attempts = Cache::increment($throttleKey); // Tambah jumlah percobaan gagal
        Log::warning("Login failed for user: {$email}. Attempts: {$attempts}");
        Cache::put($throttleKey, $attempts, now()->addMinutes(10)); // Simpan attempts selama 10 menit (untuk reset otomatis)

        if ($attempts >= $this->maxAttempts) {
            $lockoutUntil = now()->addSeconds($this->lockoutTime);
            Cache::put($lockoutKey, $lockoutUntil->timestamp, $this->lockoutTime); // Simpan timestamp, expired di 30 detik
            Cache::forget($throttleKey); // Hapus percobaan gagal setelah lockout

            Log::warning("User {$email} reached max attempts. Locking out for {$this->lockoutTime} seconds.");
            throw ValidationException::withMessages([
                'email' => ["Terlalu banyak percobaan login. Silakan coba lagi dalam {$this->lockoutTime} detik."],
            ])->redirectTo(route('login'));
        }

        return redirect()->route('login')->with('error', 'Email atau password salah!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login')->with('success', 'Anda telah logout. Silakan login kembali.');
    }
}
