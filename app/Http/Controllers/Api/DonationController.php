<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DonationResource;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Donation::query();
        if ($request->filled('campaign_id')) {
            $query->where('campaign_id', $request->campaign_id);
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        $query->where('payment_verified', 'verified');
        $donations = $query->with('campaign:id,title,slug')->latest()->paginate(15);
        return DonationResource::collection($donations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'campaign_id' => 'required|exists:campaigns,id',
            'donor_name' => 'required|string|max:255',
            'type' => 'required|in:financial,goods,emotional',
            'amount' => 'nullable|numeric|required_if:type,financial',
            'item_description' => 'nullable|string|required_if:type,goods',
            'item_quantity' => 'nullable|integer|min:1|required_if:type,goods',
            'initial_message' => 'nullable|string|required_if:type,emotional',
            'payment_proof' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }        // Cek apakah campaign ada dan aktif
        $campaign = Campaign::find($request->campaign_id);
        
        if (!$campaign || $campaign->status !== 'active') {
            return response()->json([
                'success' => false,
                'message' => 'Campaign not found or not active',
            ], 404);
        }
        
        // Validasi tipe donasi harus sesuai dengan tipe kampanye
        if ($campaign->type !== $request->type) {
            return response()->json([
                'success' => false,
                'message' => 'Tipe donasi harus sesuai dengan tipe kampanye',
                'campaign_type' => $campaign->type,
                'donation_type' => $request->type
            ], 422);
        }

        $data = $validator->validated();
        // Override user_id agar tidak bisa diisi dari luar
        $data['user_id'] = $request->user('sanctum')?->id;
        // Handle payment proof upload
        if ($request->hasFile('payment_proof')) {
            $data['payment_proof'] = $request->file('payment_proof')->store('payment_proofs', 'public');
        }
        $data['payment_verified'] = 'pending';
        // Simpan donasi
        $donation = Donation::create($data);
        // Jika donasi jenis emosional, set session_count ke 1
        if ($donation->type === 'emotional') {
            $donation->update(['session_count' => 1]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Donation successfully submitted and awaiting verification',
            'data' => $donation,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $donation = Donation::with('campaign:id,title,slug')->find($id);
        if (!$donation) {
            return response()->json([
                'success' => false,
                'message' => 'Donation not found',
            ], 404);
        }
        return new DonationResource($donation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // API ini tidak mengizinkan pembaruan donasi melalui API
        return response()->json([
            'success' => false,
            'message' => 'Endpoint not available',
        ], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // API ini tidak mengizinkan penghapusan donasi melalui API
        return response()->json([
            'success' => false,
            'message' => 'Endpoint not available',
        ], 403);
    }

    /**
     * Get donation history for the authenticated user.
     */
    public function myDonations(Request $request)
    {
        $user = $request->user();
        $donations = Donation::with('campaign:id,title,slug,type')
            ->where('user_id', $user->id)
            ->latest()
            ->paginate(10);

        return DonationResource::collection($donations);
    }
}