<?php

namespace App\Http\Controllers;

use App\Models\Campaign;

class HomeController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::with('user')->latest()->take(6)->get(); // ambil 6 terbaru
        return view('welcome', compact('campaigns'));
    }
}