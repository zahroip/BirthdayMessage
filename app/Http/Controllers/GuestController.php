<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GuestController extends Controller
{



    public function dashboard()
    {

        $id = Auth::user()->id;
        $message = DB::table('messages')
        ->join('users', 'messages.id_user', '=', 'users.id')
        ->where('messages.id_user', $id)
        ->select('messages.*', 'users.*')  // Menambahkan kolom dari tabel users
        ->first();

        return view('guest.dashboard', compact('message'));
    }

    public function kirim_pesan()
    {


        return view('guest.kirim_messages');
    }

    public function showMessageForm()
    {
        return view('guest.message_form');
    }

    public function sendMessage(Request $request)
{
    // Validasi input
    $request->validate([
        'asal_kenalan' => 'required|string|max:255',
        'isi_pesan'    => 'required|string',
    ]);

    try {
        // Proses upload file jika ada
        $fileName = null;
        if ($request->hasFile('lampiran')) {
            // Validasi apakah file berhasil diupload
            $file = $request->file('lampiran');
            // Ambil nama file asli dan simpan di folder 'uploads'
            $fileName = time() . '_' . $file->getClientOriginalName();
            // Menyimpan file dengan nama unik ke dalam folder 'public/uploads'
            $file->storeAs('uploads', $fileName, 'public');
        }

        // Mendapatkan email dari session
        $email = Auth::user()->email;
        $id = Auth::user()->id;

        // Simpan data ke database menggunakan Eloquent
        Message::create([
            'asal_kenalan' => $request->asal_kenalan,
            'id_user'  => $id,
            'email_guest'  => $email,
            'isi_pesan'    => $request->isi_pesan,
            'lampiran'     => $fileName,
            'created_at'   => now(),
        ]);

        // Redirect ke halaman terima kasih
        return redirect()->route('guest.thankYou');
    } catch (\Exception $e) {
        // Log error untuk debugging
        \Log::error('Error sending message: ' . $e->getMessage());

        // Jika terjadi error, kembali ke form dengan input dan pesan error
        return redirect()->back()->withInput()->withErrors(['error' => 'Gagal menyimpan pesan. Silakan coba lagi.']);
    }
}




    public function thankYou()
    {
        $messages = Auth::user()->id;
        return view('guest.thank_you', compact('messages'));
    }

    public function destroy($id_messages)
{
    // Cari pesan berdasarkan ID
    $message = Message::findOrFail($id_messages);

    // Hapus file jika ada
    if ($message->lampiran && Storage::exists('public/uploads/' . $message->lampiran)) {
        Storage::delete('public/uploads/' . $message->lampiran);
    }

    // Hapus pesan dari database
    $message->delete();

    // Redirect dengan pesan sukses
    return redirect()->route('guest.thankYou')->with('success', 'Message deleted successfully.');
}

    public function daftarpesan(){
        $messages = DB::table('messages')
        ->join('users', 'messages.id_user', '=', 'users.id') // Join the users table with messages
        ->select('messages.*', 'users.name as user_name') // Select the required columns
        ->get();

        return view('guest.message_detail', compact('messages'));
    }
    public function viewMessage()
    {
        // Cari pesan berdasarkan ID
        $id = Auth::user()->id;
        $message = DB::table('messages')
        ->join('users', 'messages.id_user', '=', 'users.id')
        ->where('messages.id_user', $id)
        ->select('messages.*', 'users.*')  // Menambahkan kolom dari tabel users
        ->first();

        // Jika pesan tidak ditemukan, kembalikan pesan error
        if (!$message) {
            return redirect()->route('guest.thankYou')->with('error', 'Message not found.');
        }

        // Kirim data pesan ke view
        return view('guest.view_message', compact('message'));
    }


    public function update(Request $request, $id)
    {
        // Validate incoming data
        $request->validate([
            'asal_kenalan' => 'required|string|max:255',
            'isi_pesan' => 'required|string|max:1000',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,gif,mp4,webm,ogg,mp3,wav',
        ]);

        // Find the message by ID
        $message = Message::findOrFail($id);

        // Update message data
        $message->asal_kenalan = $request->input('asal_kenalan');
        $message->isi_pesan = $request->input('isi_pesan');

        // Handle file upload (if any)
        if ($request->hasFile('lampiran')) {
            // Generate a unique filename based on current time or a random string
            $filename = Str::random(40) . '.' . $request->lampiran->getClientOriginalExtension();

            // Store the file in the 'public/uploads' directory
            $request->lampiran->storeAs('uploads', $filename, 'public');

            // Update the message record with the new filename (without full path)
            $message->lampiran = $filename;
        }

        // Save the changes
        $message->save();

        // Redirect back to the thank you page with a success message
        return redirect()->route('guest.thankYou')->with('success', 'Message updated successfully!');
    }


    public function editMessage(Request $request)
    {
        $message = Message::where('email', Auth::id())->where('is_replied', false)->firstOrFail();
        return view('guest.edit_message', compact('message'));
    }

    public function updateMessage(Request $request, Message $message)
    {
        $request->validate(['message' => 'required|string']);
        $message->update($request->only('message'));
        return redirect()->route('guest.viewMessage');
    }


}
