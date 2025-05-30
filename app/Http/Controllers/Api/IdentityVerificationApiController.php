<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\IdentityVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdentityVerificationApiController extends Controller
{
    // User submit identity verification
    public function store(Request $request)
    {
        if (!$request->user()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = $request->user();
        $existing = IdentityVerification::where('user_id', $user->id)->latest()->first();
        if ($existing && in_array($existing->status, ['pending', 'approved'])) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah mengajukan verifikasi identitas atau sudah terverifikasi.',
                'data' => $existing
            ], 422);
        }

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'bank_account_number' => 'required|string|max:20',
            'ktp_number' => 'required|string|max:20',
            'photo' => 'required|image|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('identity_verifications', 'public');

        $verification = IdentityVerification::create([
            'user_id' => $user->id,
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'bank_account_number' => $validated['bank_account_number'],
            'ktp_number' => $validated['ktp_number'],
            'photo' => $photoPath,
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan verifikasi identitas berhasil, menunggu persetujuan admin.',
            'data' => $verification
        ], 201);
    }

    // User get their own verification status
    public function me(Request $request)
    {
        if (!$request->user()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }
        $verification = IdentityVerification::where('user_id', $request->   user()->id)->latest()->first();
        return response()->json([
            'success' => true,
            'data' => $verification
        ]);
    }

    // User submit identity verification via raw JSON (tanpa upload file)
    public function storeRaw(Request $request)
    {
        if (!$request->user()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = $request->user();
        $existing = IdentityVerification::where('user_id', $user->id)->latest()->first();
        if ($existing && in_array($existing->status, ['pending', 'approved'])) {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah mengajukan verifikasi identitas atau sudah terverifikasi.',
                'data' => $existing
            ], 422);
        }

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'bank_account_number' => 'required|string|max:20',
            'ktp_number' => 'required|string|max:20',
        ]);

        $verification = IdentityVerification::create([
            'user_id' => $user->id,
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'bank_account_number' => $validated['bank_account_number'],
            'ktp_number' => $validated['ktp_number'],
            'photo' => null, 
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pengajuan verifikasi identitas berhasil, menunggu persetujuan admin.',
            'data' => $verification
        ], 201);
    }
}
