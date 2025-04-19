<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
    public function create(Campaign $campaign)
    {
        return view('donations.create', compact('campaign'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'campaign_id' => 'required|exists:campaigns,id',
        'donor_name' => 'required|string|max:255',
        'type' => 'required|in:financial,goods,emotional',
        'amount' => 'nullable|numeric|required_if:type,financial',
        'item_description' => 'nullable|string|required_if:type,goods',
        'session_count' => 'nullable|integer|required_if:type,emotional',
        'payment_proof' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('payment_proof')) {
        $validated['payment_proof'] = $request->file('payment_proof')->store('payment_proofs', 'public');
    }

    $validated['payment_verified'] = 'pending';

    // ⬇️ Ini yang ditambahkan
    if (auth()->check()) {
        $validated['user_id'] = auth()->id();
    }

    Donation::create($validated);

    return redirect()->route('campaigns.show', $validated['campaign_id'])
        ->with('success', 'Donasi berhasil dikirim dan menunggu verifikasi.');
}

}
