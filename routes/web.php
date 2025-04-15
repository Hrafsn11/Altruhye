<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EmotionalSessionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| Protected Routes (User Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    
    // Galang bantuan (hanya untuk user login)
    Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');
    Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/history', function () {
        return view('history');
    })->name('history');

    Route::get('/my-campaigns', function () {
        return view('my-campaigns');
    })->name('my-campaigns');

    Route::get('/verification', function () {
        return view('verification');
    })->name('verification');

    Route::get('/chat', function () {
        return view('chat');
    })->name('chat');
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Donasi publik (semua orang bisa lihat)
Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/campaigns/{campaign}', [CampaignController::class, 'show'])->name('campaigns.show');



