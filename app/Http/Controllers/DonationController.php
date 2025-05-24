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
            'item_quantity' => 'nullable|integer|min:1|required_if:type,goods',
            'initial_message' => 'nullable|string|required_if:type,emotional', // Perbaikan untuk tipe emosional
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

        // Simpan donasi
        $donation = Donation::create($validated);

        // Jika donasi jenis emosional, simpan pesan pertama
        if ($donation->type === 'emotional') {
            // Simpan pesan pertama atau bisa menggunakan logika lain untuk sesi chat
            $donation->update(['session_count' => 1]); // Anda bisa menambahkannya di model jika perlu
        }

        return redirect()->route('campaigns.show', $validated['campaign_id'])
            ->with('success', 'Donasi berhasil dikirim dan menunggu verifikasi.');
    }

    public function history(Request $request)
    {
        $query = Donation::where('user_id', Auth::id());

        // Filter berdasarkan kategori (financial, goods, emotional)
        if ($request->filled('category') && in_array($request->category, ['financial', 'goods', 'emotional'])) {
            $query->whereHas('campaign', function($query) use ($request) {
                $query->where('type', $request->category);
            });
        }

        // Pagination dengan 5 item per halaman
        $donations = $query->with('campaign')->latest()->paginate(5);

        return view('donations.history', compact('donations'));
    }

}
