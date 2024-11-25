<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menangani halaman login berdasarkan pilihan
    public function chooseLogin(Request $request)
    {
        $login_as = $request->input('login_as');

        // Redirect sesuai pilihan Guest atau Admin
        if ($login_as == 'guest') {
            return redirect()->route('guest.login');
        } elseif ($login_as == 'admin') {
            return redirect()->route('admin.login');
        }
    }

    // Fungsi untuk menangani login sebagai Guest
    public function guestLogin(Request $request)
    {
        // Validasi input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    // Mencari atau membuat pengguna guest
    $user = User::firstOrCreate(
        ['email' => $validated['email']],
        ['name' => $validated['name']]
    );

    // Masuk sebagai guest
    Auth::login($user);

    // Arahkan ke halaman yang sesuai setelah login
    return redirect()->route('guest.dashboard');
    }

    // Fungsi untuk menangani login sebagai Admin
    public function adminLogin(Request $request)
    {
        // Validasi dan proses login admin di sini
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Coba login dengan guard 'admin'
    if (Auth::guard('admin')->attempt([
        'email' => $request->email,
        'password' => $request->password,
    ])) {
        // Jika berhasil, arahkan ke dashboard admin
        return redirect()->route('admin.dashboard');
    }

    // Jika gagal, kembali dengan error
    return redirect()->back()->withErrors('Invalid credentials');
    }
}
