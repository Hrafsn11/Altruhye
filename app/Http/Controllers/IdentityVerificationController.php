<?php

namespace App\Http\Controllers;

use App\Models\IdentityVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdentityVerificationController extends Controller
{
    // Menampilkan form untuk mengajukan verifikasi identitas
    public function create()
    {
        return view('identity_verification.create');
    }

    // Menyimpan data verifikasi identitas yang diajukan
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'bank_account_number' => 'required|string|max:20',
            'ktp_number' => 'required|string|max:20',
            'photo' => 'required|image|max:2048',
        ]);

        $photoPath = $request->file('photo')->store('identity_verifications', 'public');

        IdentityVerification::create([
            'user_id' => Auth::id(),
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'bank_account_number' => $request->bank_account_number,
            'ktp_number' => $request->ktp_number,
            'photo' => $photoPath,
            'status' => 'pending',
        ]);

        return redirect()->route('identity_verifications.status');
    }

    // Menampilkan status verifikasi identitas
    public function status()
    {
        $verification = IdentityVerification::where('user_id', Auth::id())->latest()->first();
        
        if (!$verification) {
            return redirect()->route('identity_verifications.create');
        }

        return view('identity_verification.status', compact('verification'));
    }

    // Halaman untuk mengajukan ulang jika ditolak
    public function reapply()
    {
        $verification = IdentityVerification::where('user_id', Auth::id())->latest()->first();

        if ($verification && $verification->status === 'rejected') {
            return view('identity_verification.reapply');
        }

        return redirect()->route('identity_verifications.status');
    }
}
