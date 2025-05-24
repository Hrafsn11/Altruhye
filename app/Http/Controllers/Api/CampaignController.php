<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Menyiapkan query builder
        $query = Campaign::where('status', 'active');

        // Filter berdasarkan tipe (financial, goods, emotional)
        if ($request->filled('type') && in_array($request->type, ['financial', 'goods', 'emotional'])) {
            $query->where('type', $request->type);
        }
    
        // Ambil data dengan pagination
        $campaigns = $query->latest()->paginate(10);
        
        return response()->json([
            'success' => true,
            'data' => $campaigns,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Hanya user login
        if (!$request->user()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }
        // Cek verifikasi identitas
        $verification = \App\Models\IdentityVerification::where('user_id', $request->user()->id)->first();
        if (!$verification || $verification->status !== 'approved') {
            return response()->json([
                'success' => false,
                'message' => 'Akun Anda belum terverifikasi identitas. Tidak bisa membuat campaign.',
            ], 403);
        }
        $validated = $request->validate([
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
        $campaign = Campaign::create([
            'user_id' => $request->user()->id,
            'title' => $validated['title'],
            'slug' => \Illuminate\Support\Str::slug($validated['title']) . '-' . uniqid(),
            'description' => $validated['description'],
            'type' => $validated['type'],
            'target_amount' => $validated['type'] === 'financial' ? $validated['target_amount'] : null,
            'target_items' => $validated['type'] === 'goods' ? $validated['target_items'] : null,
            'target_sessions' => $validated['type'] === 'emotional' ? $validated['target_sessions'] : null,
            'status' => 'pending',
            'gambar' => $path,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Campaign berhasil dibuat, menunggu verifikasi admin.',
            'data' => $campaign
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $campaign = Campaign::with(['donations' => function ($query) {
            $query->select('id', 'campaign_id', 'donor_name', 'type', 'amount', 'item_description', 'item_quantity', 'session_count', 'created_at')
                  ->where('payment_verified', 'verified')
                  ->latest();
        }])->find($id);

        if (!$campaign) {
            return response()->json([
                'success' => false,
                'message' => 'Campaign not found'
            ], 404);
        }

        if ($campaign->status !== 'active') {
            return response()->json([
                'success' => false,
                'message' => 'Campaign is not active'
            ], 403);
        }

        // Tambahkan property untuk progress
        $campaign->progress_percent = $campaign->progressPercent();
        $campaign->display_target = $campaign->displayTarget();
        $campaign->display_collected = $campaign->displayCollected();

        return response()->json([
            'success' => true,
            'data' => $campaign
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!$request->user()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }
        $campaign = Campaign::find($id);
        if (!$campaign) {
            return response()->json([
                'success' => false,
                'message' => 'Campaign not found',
            ], 404);
        }
        // Hanya user pemilik
        if ($campaign->user_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden: Anda bukan pemilik campaign ini',
            ], 403);
        }
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);
        if ($request->hasFile('gambar')) {
            if ($campaign->gambar) {
                Storage::disk('public')->delete($campaign->gambar);
            }
            $campaign->gambar = $request->file('gambar')->store('campaigns', 'public');
        }
        if (isset($validated['title'])) {
            $campaign->title = $validated['title'];
        }
        if (isset($validated['description'])) {
            $campaign->description = $validated['description'];
        }
        $campaign->save();
        return response()->json([
            'success' => true,
            'message' => 'Campaign berhasil diperbarui!',
            'data' => $campaign
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = request()->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }
        $campaign = Campaign::find($id);
        if (!$campaign) {
            return response()->json([
                'success' => false,
                'message' => 'Campaign not found',
            ], 404);
        }
        // Hanya user pemilik
        if ($campaign->user_id !== $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden: Anda bukan pemilik campaign ini',
            ], 403);
        }
        if ($campaign->gambar) {
            Storage::disk('public')->delete($campaign->gambar);
        }
        $campaign->delete();
        return response()->json([
            'success' => true,
            'message' => 'Campaign berhasil dihapus!'
        ]);
    }
}
