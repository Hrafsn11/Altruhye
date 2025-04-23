<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $campaigns = Campaign::latest();

        if ($request->filled('type') && in_array($request->type, ['financial', 'goods', 'emotional'])) {
            $campaigns->where('type', $request->type);
        }

        $campaigns = $campaigns->get(); 

        return view('admin.campaigns.index', compact('campaigns'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $campaign = Campaign::findOrFail($id);

        $request->validate([
            'status' => '',
        ]);

        $campaign->update([
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status campaign berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
