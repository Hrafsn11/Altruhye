<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\IdentityVerification;
use Illuminate\Support\Facades\Auth;


class VerificationController extends Controller
{
    public function index()
    {
        $verification = Auth::user()->identity_verification;


        return view('verification.index', compact('verification'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|string|max:20',
            'photo' => 'required|image|max:2048',
        ]);




        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('ktp_photos', 'public');
        }


        IdentityVerification::create([
            'user_id' =>  Auth::id(),
            'ktp_number' => $request->no_ktp,
            'photo' => $path,
            'status' => 'pending',
        ]);


        return redirect()->back()->with('success', 'Verifikasi berhasil dikirim.');


        return redirect()->back()->with('saved', true);
    }
}
