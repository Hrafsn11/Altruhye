<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\CampaignStatusNotification;

class CampaignController extends Controller
{
    // Menampilkan daftar kampanye dengan filter tipe dan pagination
    public function index(Request $request)
    {
        // Menyiapkan query builder
        $query = Campaign::where('status', 'active');

        // Filter berdasarkan tipe (financial, goods, emotional)
        if ($request->filled('type') && in_array($request->type, ['financial', 'goods', 'emotional'])) {
            $query->where('type', $request->type);
        }

        // Ambil data dengan pagination
        $campaigns = $query->latest()->paginate(9);

        return view('campaigns.index', compact('campaigns'));
    }

    // Menampilkan detail kampanye
    public function show(Campaign $campaign)
    {
        $campaign->refresh();
        if ($campaign->status !== 'active') {
            abort(403, 'Campaign ini belum disetujui.');
        }

        $recommendedCampaigns = Campaign::where('id', '!=', $campaign->id)  // Menghindari kampanye yang sedang ditampilkan
            ->inRandomOrder()  // Ambil data secara acak
            ->limit(3)  // Batasi hanya 5 kampanye
            ->get();

        return view('campaigns.show', compact('campaign', 'recommendedCampaigns'));
    }

    // Menampilkan form untuk membuat kampanye baru
    public function create()
    {
        return view('campaigns.create');
    }

    // Menyimpan kampanye yang baru dibuat
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:financial,goods,emotional',
            'target_amount' => 'nullable|numeric|min:1',
            'target_items' => 'nullable|integer|min:1',
            'target_sessions' => 'nullable|integer|min:1',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('campaigns', 'public');
        }

        // Menyimpan kampanye baru
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
            'gambar' => $path,
        ]);

        return redirect()->route('campaigns.create')->with('success', 'Galang bantuan berhasil diajukan! Menunggu verifikasi admin.');
    }

    // Menyetujui kampanye
    public static function approve(Campaign $campaign)
    {
        $campaign->update(['status' => 'active']);
        $campaign->user->notify(new CampaignStatusNotification($campaign, 'disetujui'));
        return redirect()->route('filament.resources.campaigns.index');
    }

    // Menolak kampanye
    public static function reject(Campaign $campaign)
    {
        $campaign->update(['status' => 'rejected']);
        $campaign->user->notify(new CampaignStatusNotification($campaign, 'ditolak'));
        return redirect()->route('filament.resources.campaigns.index');
    }

    // Menampilkan riwayat kampanye oleh pengguna
    public function history()
    {
        $campaigns = Campaign::where('user_id', Auth::check() ? Auth::id() : null)->latest()->paginate(5);
        return view('campaigns.history', compact('campaigns'));
    }
    public function edit(Campaign $campaign)
    {
        // Cek apakah user adalah pemilik
        if ($campaign->user_id !== Auth::id()) {
            abort(403);
        }

        return view('campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        if ($campaign->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('campaigns', 'public');
            $campaign->gambar = $path;
        }

        $campaign->title = $request->title;
        $campaign->description = $request->description;
        $campaign->save();

        return redirect()->route('campaigns.history')->with('success', 'Kampanye berhasil diperbarui!');
    }

    public function destroy(Campaign $campaign)
    {
        if ($campaign->user_id !== Auth::id()) {
            abort(403);
        }

        // Optional: Hapus gambar lama dari storage
        if ($campaign->gambar) {
            Storage::disk('public')->delete($campaign->gambar);
        }

        $campaign->delete();

        return redirect()->route('campaigns.history')->with('success', 'Kampanye berhasil dihapus!');
    }
}
