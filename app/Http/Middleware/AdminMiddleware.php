<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Periksa apakah pengguna saat ini login sebagai admin
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        // Jika tidak, arahkan ke halaman login admin
        return redirect()->route('home')->with('error', 'Silakan login terlebih dahulu.');
    }
}

