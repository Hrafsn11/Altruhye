<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EmotionalSessionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');




Route::get('/donasi', function () {
    $user = Auth::user();
    return view('donasi', [
        'Nama' => $user ? $user->name : 'Anonim',
        'Email' => $user ? $user->email : 'anonim@example.com'
    ]);
});

Route::get('/galang', function () {
    $user = Auth::user();
    return view('galangbantuan', [
        'Nama' => $user ? $user->name : 'Anonim',
        'Email' => $user ? $user->email : 'anonim@example.com'
    ]);
});

Route::get('/profile', function () {
    return view('Edit');
});

Route::resource('campaigns', CampaignController::class);
Route::resource('donations', DonationController::class);
Route::resource('emotional_sessions', EmotionalSessionController::class);
Route::resource('messages', MessageController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
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


