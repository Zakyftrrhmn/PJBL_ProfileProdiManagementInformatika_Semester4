<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mapping permission ke route yang sesuai
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

    public function login()
    {
        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
        ]);

        // Ambil kredensial
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            // Cek permission dan redirect ke route pertama yang diizinkan
            foreach ($this->permissionRoutes as $permission => $route) {
                if ($user->can($permission)) {
                    return redirect()->intended($route);
                }
            }

            // Jika tidak punya permission apapun
            Auth::logout();
            return redirect()->route('login')->with('error', 'Anda tidak memiliki akses ke halaman manapun.');
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
