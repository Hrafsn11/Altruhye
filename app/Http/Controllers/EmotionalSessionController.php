<?php

namespace App\Http\Controllers;

use App\Models\EmotionalSession;
use Illuminate\Http\Request;

class EmotionalSessionController extends Controller
{
    public function index()
    {
        $sessions = EmotionalSession::all();
        return view('emotional_sessions.index', compact('sessions'));
    }

    public function create()
    {
        return view('emotional_sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'donation_id' => 'nullable|exists:donations,id',
            'user_id' => 'nullable|exists:users,id',
        ]);

        EmotionalSession::create($request->all());

        return redirect()->route('emotional_sessions.index');
    }
}
