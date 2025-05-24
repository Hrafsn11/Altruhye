<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;

class MessageOverviewController extends Controller
{
    public function index()
{
    $campaigns = Campaign::where('user_id', auth()->id())
        ->where('type', 'emotional')
        ->with(['donations' => function ($q) {
            $q->where('type', 'emotional')
              ->whereNotNull('initial_message');
        }])
        ->get();

    return view('messages.index', compact('campaigns'));
}
}
