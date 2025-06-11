<?php

namespace App\Http\Controllers;

use App\Models\Campaign;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 3 campaign dengan status 'active' terbaru
        $campaigns = Campaign::with('user')
            ->where('status', 'active')
            ->latest()
            ->take(3)
            ->get();
        return view('welcome', compact('campaigns'));
    }
}