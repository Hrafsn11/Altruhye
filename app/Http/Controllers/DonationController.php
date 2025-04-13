<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $donations = Donation::all();
        return view('donations.index', compact('donations'));
    }

    public function create()
    {
        return view('donations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'amount' => 'required|numeric',
            'type' => 'required',
        ]);

        Donation::create($request->all());

        return redirect()->route('donations.index');
    }

    public function show($id)
    {
        $donation = Donation::findOrFail($id);
        return view('donations.show', compact('donation'));
    }
}
