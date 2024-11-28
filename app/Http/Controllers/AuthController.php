<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function login(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);

    // Autentikasi untuk tabel `users`


    // Autentikasi untuk tabel `admin`
    if (Auth::guard('admin')->attempt([
        'email' => $validatedData['email'],
        'password' => $validatedData['password'],
    ])) {
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard'); // Redirect ke dashboard admin
    }

    // Jika gagal
    return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
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
    public function showRegisterForm()
    {
        return view('register'); // Create a view for registration form
    }

    public function handleRegister(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
        // Save user in the database
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Redirect to login page
        return redirect()->route('guest.login');
    }


    public function logout(Request $request)
    {
        // Melakukan logout
        Auth::logout();

        // Menghancurkan session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Mengarahkan pengguna ke halaman login setelah logout
        return redirect()->route('home')->with('success', 'Anda telah berhasil logout.');
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
