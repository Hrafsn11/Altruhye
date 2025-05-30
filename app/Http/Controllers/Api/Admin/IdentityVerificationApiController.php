<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\IdentityVerification;
use Illuminate\Http\Request;

class IdentityVerificationApiController extends Controller
{
    // Approve identity verification
    public function approve(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Only admin can perform this action.',
            ], 401);
        }
        $identity = IdentityVerification::find($id);
        if (!$identity) {
            return response()->json(['success' => false, 'message' => 'Identity verification not found'], 404);
        }
        $identity->status = 'approved';
        $identity->save();
        return response()->json(['success' => true, 'message' => 'Identity verification approved', 'data' => $identity]);
    }

    // Reject identity verification
    public function reject(Request $request, $id)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Only admin can perform this action.',
            ], 401);
        }
        $identity = IdentityVerification::find($id);
        if (!$identity) {
            return response()->json(['success' => false, 'message' => 'Identity verification not found'], 404);
        }
        $identity->status = 'rejected';
        $identity->save();
        return response()->json(['success' => true, 'message' => 'Identity verification rejected', 'data' => $identity]);
    }

    // List identity verifications with status pending (need approval)
    public function pending(Request $request)
    {
        if (!$request->user() || !$request->user()->is_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Only admin can perform this action.',
            ], 401);
        }
        $pendingIdentities = IdentityVerification::where('status', 'pending')->latest()->get();
        return response()->json([
            'success' => true,
            'data' => $pendingIdentities
        ]);
    }
}
