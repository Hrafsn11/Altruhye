<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'emotional_session_id' => 'required|exists:emotional_sessions,id',
            'sender_id' => 'nullable|exists:users,id',
            'message' => 'required|string',
        ]);

        Message::create($request->all());

        return redirect()->route('messages.index');
    }
}
