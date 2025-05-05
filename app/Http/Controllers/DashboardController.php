<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Menampilkan dashboard admin atau pengguna
    public function index()
    {
        $userId = Auth::id();

        // Kampanye milik user
        $campaigns = Campaign::where('user_id', $userId)->get();

        // Donasi oleh user
        $donations = Donation::where('user_id', $userId)->latest()->get();

        // Total donasi uang
        $totalMoney = $donations->where('type', 'financial')->sum('amount');

        // Total barang
        $totalItems = $donations->where('type', 'goods')->sum('item_quantity');

        // Total dukungan
        $totalSessions = $donations->where('type', 'emotional')->sum('session_count');

        // Statistik status kampanye
        $campaignStatusCount = [
            'active' => $campaigns->where('status', 'approved')->count(),
            'pending' => $campaigns->where('status', 'pending')->count(),
            'rejected' => $campaigns->where('status', 'rejected')->count(),
        ];
        // Buat data chart: total donasi per kampanye
       

        // Urutkan berdasarkan nilai tertinggi dan ambil 3 teratas

        $financialTop = $campaigns->map(function ($c) {
            return [
                'title' => $c->title,
                'value' => $c->donations()->where('type', 'financial')->sum('amount')
            ];
        })->sortByDesc('value')->take(1)->values();

        $goodsTop = $campaigns->map(function ($c) {
            return [
                'title' => $c->title,
                'value' => $c->donations()->where('type', 'goods')->sum('item_quantity')
            ];
        })->sortByDesc('value')->take(1)->values();

        $emotionalTop = $campaigns->map(function ($c) {
            return [
                'title' => $c->title,
                'value' => $c->donations()->where('type', 'emotional')->sum('session_count')
            ];
        })->sortByDesc('value')->take(1)->values();

        


        return view('dashboard.index', compact(
            'campaigns',
            'donations',
            'totalMoney',
            'totalItems',
            'financialTop',
            'totalSessions',
            'campaignStatusCount',
            'goodsTop',
            'emotionalTop'
        ));
    }
}
