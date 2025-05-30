<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignApiController extends Controller
{
    // Approve campaign
    public function approve(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Only admin can perform this action.',
            ], 401);
        }
        $campaign = Campaign::find($id);
        if (!$campaign) {
            return response()->json(['success' => false, 'message' => 'Campaign not found'], 404);
        }
        $campaign->status = 'active';
        $campaign->save();
        return response()->json(['success' => true, 'message' => 'Campaign approved', 'data' => $campaign]);
    }

    // Reject campaign
    public function reject(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Only admin can perform this action.',
            ], 401);
        }
        $campaign = Campaign::find($id);
        if (!$campaign) {
            return response()->json(['success' => false, 'message' => 'Campaign not found'], 404);
        }
        $campaign->status = 'rejected';
        $campaign->save();
        return response()->json(['success' => true, 'message' => 'Campaign rejected', 'data' => $campaign]);
    }

    // List campaigns with status pending (need approval)
    public function pending(Request $request)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Only admin can perform this action.',
            ], 401);
        }
        $pendingCampaigns = Campaign::where('status', 'pending')->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $pendingCampaigns
        ]);
    }
}
