<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HistoryController extends Controller
{
    public function index(Request $request): View
{
    try {
        $category = $request->query('category', 'all');

        $donations = Donation::with(['campaign:id,title,slug,type'])->where('user_id', $request->user()->id)
            ->latest()
            ->paginate(10)
            ->withQueryString();

    } catch (\Throwable $e) {
        Log::error('Gagal memuat riwayat donasi', [
            'user_id'  => $request->user()->id,
            'category' => $category,
            'error'    => $e->getMessage(),
        ]);

        return view('history.index', [
            'donations' => collect(),
            'error'     => 'Maaf, riwayat tidak dapat dimuat saat ini.',
        ]);
    }

    return view('history.index', [
        'donations' => $donations,
        'category'  => $category,
    ]);
}

}
