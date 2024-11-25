<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $messages = Message::all();
        return view('admin.messages', compact('messages'));
    }

    public function showMessage(Message $message)
    {
        return view('admin.message_detail', compact('message'));
    }

    public function replyMessage(Request $request, Message $message)
    {
        $request->validate([
            'admin_reply' => 'required|string',
            'reply_attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $message->update([
            'admin_reply' => $request->admin_reply,
            'is_replied' => true,
        ]);

        if ($request->hasFile('reply_attachment')) {
            $message->reply_attachment = $request->file('reply_attachment')->store('attachments');
            $message->save();
        }

        return redirect()->route('admin.dashboard');
    }
}