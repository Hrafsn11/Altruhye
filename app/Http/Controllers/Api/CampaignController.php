<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CampaignResource;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controller untuk manajemen Campaign (API)
 * - List campaign publik
 * - CRUD campaign milik user
 * - Hanya user terverifikasi yang bisa membuat campaign
 */
class CampaignController extends Controller
{
    /**
     * Menampilkan daftar campaign publik (status: active).
     * Bisa difilter berdasarkan tipe.
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $query = Campaign::where('status', 'active');
        if ($request->filled('type') && in_array($request->type, ['financial', 'goods', 'emotional'])) {
            $query->where('type', $request->type);
        }
        $campaigns = $query->latest()->paginate(10);
        return CampaignResource::collection($campaigns);
    }

    /**
     * Membuat campaign baru (hanya untuk user login & terverifikasi).
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
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
     * Menampilkan detail campaign tertentu (hanya jika status: active).
     * @param string $id
     * @return \Illuminate\Http\JsonResponse|CampaignResource
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
        return new CampaignResource($campaign);
    }

    /**
     * Update campaign (hanya untuk user pemilik).
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
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
     * Hapus campaign (hanya untuk user pemilik).
     * @param string $id
     * @return \Illuminate\Http\JsonResponse
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

    /**
     * Menampilkan daftar campaign milik user login.
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function myCampaigns(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }
        $campaigns = Campaign::where('user_id', $user->id)->latest()->paginate(10);
        return CampaignResource::collection($campaigns);
    }
}
