<?php


namespace App\Http\Controllers;
use App\Models\Guest;
use Illuminate\Http\Request;


abstract class Controller
{
    public function login(Request $request)
{
    $guest = Guest::where('email', $request->email)->first();

    if (!$guest) {
        // Jika tamu belum ada, buat data baru
        $guest = Guest::create([
            'email' => $request->email,
            'nama' => $request->nama,
        ]);
    }

    // Redirect ke halaman form pesan
    return redirect()->route('guest.messages.create');
}

}
