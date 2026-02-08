<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Contact::latest()->paginate(10);
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Contact $message)
    {
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        return view('admin.messages.show', compact('message'));
    }

    public function destroy(Contact $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')
            ->with('success', 'Pesan berhasil dihapus!');
    }

    public function markAsRead(Contact $message)
    {
        $message->update(['is_read' => true]);
        return redirect()->back()
            ->with('success', 'Pesan ditandai sebagai sudah dibaca!');
    }

    public function markAllAsRead()
    {
        Contact::where('is_read', false)->update(['is_read' => true]);
        return redirect()->route('admin.messages.index')
            ->with('success', 'Semua pesan ditandai sebagai sudah dibaca!');
    }
}