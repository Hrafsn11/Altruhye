<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationApiController extends Controller
{
    // Approve donation
    public function approve(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Only admin can perform this action.',
            ], 401);
        }
        $donation = Donation::find($id);
        if (!$donation) {
            return response()->json(['success' => false, 'message' => 'Donation not found'], 404);
        }
        $donation->payment_verified = 'approved'; // Ubah dari 'verified' ke 'approved'
        $donation->save();
        return response()->json(['success' => true, 'message' => 'Donation approved', 'data' => $donation]);
    }

    // Reject donation
    public function reject(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Only admin can perform this action.',
            ], 401);
        }
        $donation = Donation::find($id);
        if (!$donation) {
            return response()->json(['success' => false, 'message' => 'Donation not found'], 404);
        }
        $donation->payment_verified = 'rejected';
        $donation->save();
        return response()->json(['success' => true, 'message' => 'Donation rejected', 'data' => $donation]);
    }

    // List donations with status pending (need approval)
    public function pending(Request $request)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Only admin can perform this action.',
            ], 401);
        }
        $pendingDonations = Donation::where('payment_verified', 'pending')->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $pendingDonations
        ]);
    }
}
