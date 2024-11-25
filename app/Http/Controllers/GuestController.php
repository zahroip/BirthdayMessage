<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{



    public function dashboard()
    {
        $message = Message::where('email', Auth::user()->email)->first();
        if ($message) {
            return redirect()->route('guest.viewMessage');
        }

        return view('guest.dashboard');
    }

    

    public function showMessageForm()
    {
        return view('guest.message_form');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'relation_to_admin' => 'required|string',
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $message = new Message($request->only('message', 'relation_to_admin'));
        

        if ($request->hasFile('attachment')) {
            $message->attachment = $request->file('attachment')->store('attachments');
        }
        $message->email = Auth::user()->email; 
        $message->save();

        return redirect()->route('guest.thankYou');
    }

    public function thankYou()
    {
        return view('guest.thank_you');
    }

    public function viewMessage()
    {

        $email = Auth::user()->email;

        // Debugging sementara
    $messages = Message::where('email', $email)->get();
    dd($email, $messages); // Tampilkan email dan hasil query

    $message = Message::where('email', $email)->first();
        if (!$message) {
        return 'No message found for this user.';
    }

    return view('guest.view_message', compact('message'));
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

    public function deleteMessage(Message $message)
    {
        if (!$message->is_replied) {
            $message->delete();
        }
        return redirect()->route('guest.dashboard');
    }
}