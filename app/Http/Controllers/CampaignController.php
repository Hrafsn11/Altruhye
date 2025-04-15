<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    
    public function index()
    {
        $campaigns = Campaign::latest()->get();
        return view('campaigns.index', compact('campaigns'));
    }

    public function show(Campaign $campaign)
    {
        $recommendedCampaigns = Campaign::where('id', '!=', $campaign->id)  // Menghindari kampanye yang sedang ditampilkan
            ->inRandomOrder()  // Ambil data secara acak
            ->limit(5)  // Batasi hanya 5 kampanye
            ->get();

        return view('campaigns.show', compact('campaign', 'recommendedCampaigns'));
        
    }

    public function create()
    {
        return view('campaigns.create');
    }

    // Method untuk menyimpan campaign yang baru dibuat
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:financial,goods,emotional',
            'target_amount' => 'nullable|numeric|min:1',
            'target_items' => 'nullable|integer|min:1',
            'target_sessions' => 'nullable|integer|min:1',
            'gambar' => 'nullable|image|max:2048', // Validasi gambar
        ]);
    
        // Proses penyimpanan gambar
        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('campaigns', 'public'); // Menyimpan gambar
        }
    
        // Menyimpan data kampanye
        Campaign::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . uniqid(),
            'description' => $request->description,
            'type' => $request->type,
            'target_amount' => $request->type === 'financial' ? $request->target_amount : null,
            'target_items' => $request->type === 'goods' ? $request->target_items : null,
            'target_sessions' => $request->type === 'emotional' ? $request->target_sessions : null,
            'status' => 'pending',
            'gambar' => $path, // Menyimpan path gambar
        ]);
        
    
        return redirect()->route('campaigns.index')->with('success', 'Galang bantuan berhasil diajukan!');
    }
}    