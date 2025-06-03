<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\IdentityVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller untuk verifikasi identitas user (API)
 * - Submit verifikasi (form-data & raw JSON)
 * - Lihat status verifikasi sendiri
 */
class IdentityVerificationApiController extends Controller
{
    /**
     * User submit verifikasi identitas (dengan upload file).
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * User melihat status verifikasi identitas miliknya.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * User submit verifikasi identitas (raw JSON, tanpa upload file).
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
