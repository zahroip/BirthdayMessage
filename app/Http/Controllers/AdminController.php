<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.messages');
    }

    public function pesan_masuk()
    {

        $messagegambar = DB::table('messages')
        ->join('users', 'messages.id_user', '=', 'users.id')
        ->where('messages.id_user')
        ->select('messages.*', 'users.*')  // Menambahkan kolom dari tabel users
        ->first();

        $messages = DB::table('messages')
        ->join('users', 'messages.id_user', '=', 'users.id') // Join the users table with messages
        ->select('messages.*', 'users.name as user_name') // Select the required columns
        ->get();

        return view('admin.message_detail', compact('messages','messagegambar'));
    }

    public function lihatfile($id)
    {

        $message = DB::table('messages')
        ->join('users', 'messages.id_user', '=', 'users.id')
        ->where('messages.id_user', $id)
        ->select('messages.*', 'users.*')  // Menambahkan kolom dari tabel users
        ->first();



        // Kirim data pesan ke view
        return view('admin.lihatfile', compact('message'));
    }


    public function jawab(Request $request)
{
    $messageId = $request->input('message_id');  // Get the message ID
    $replyMessage = $request->input('reply_message');  // Get the reply message

    // Update the 'jawaban' column in the 'messages' table with the reply message
    DB::table('messages')
        ->where('id_messages', $messageId)  // Find the message by its ID
        ->update([
            'jawaban' => $replyMessage,  // Set the 'jawaban' column to the reply message
            'updated_at' => now(),  // Update the 'updated_at' timestamp
        ]);

    // Redirect back or to a different page
    return redirect()->route('admin.pesan_masuk')->with('success', 'Reply sent successfully.');
}

}
