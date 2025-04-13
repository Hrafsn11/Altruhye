<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        // Ambil semua campaign dari database
        $campaigns = Campaign::latest()->get();

        // Kirim ke view donations.index (bisa diubah namanya sesuai kebutuhan)
        return view('donations.index', compact('campaigns'));
    }

    public function show($id)
    {
        $campaign = Campaign::with('user')->findOrFail($id);
    
        // Ambil 3 campaign lain yang berbeda dari yg sedang dilihat, sebagai rekomendasi
        $recommendedCampaigns = Campaign::where('id', '!=', $id)
            ->inRandomOrder()
            ->take(3)
            ->get();
    
        return view('campaigns.show', compact('campaign', 'recommendedCampaigns'));
    }
    
}
