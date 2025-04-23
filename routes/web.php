<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EmotionalSessionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\CampaignController as AdminCampaignController;
use App\Http\Controllers\Admin\UserController as AdminVerificationController;
use App\Http\Controllers\Admin\DonaturController as AdminDonaturController;
use App\Http\Controllers\VerificationController;

/*
|--------------------------------------------------------------------------
| Protected Routes (User Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('/history', function () {
        return view('history');
    })->name('history');

    Route::get('/verification', [VerificationController::class, 'index'])->name('verification');
    Route::post('/verification', [VerificationController::class, 'store'])->name('verification.store');
    Route::get('/chat', function () {
        return view('chat');

    })->name('chat');
    Route::post('/notifications/read', function () {
        Auth::user()->unreadNotifications->markAsRead();
        return back();

    })->name('notifications.read');
    Route::get('/notifications/redirect/{id}', function ($id) {
        $notification = Auth::user()->notifications()->findOrFail($id);
        $notification->markAsRead();
        return redirect($notification->data['url']);

    })->name('notifications.redirect');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');

    Route::prefix('campaigns')->group(function () {
        Route::get('/create', [CampaignController::class, 'create'])->name('campaigns.create');
        Route::post('/', [CampaignController::class, 'store'])->name('campaigns.store');
        Route::get('/history', [CampaignController::class, 'history'])->name('campaigns.history');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('campaigns', AdminCampaignController::class);
        Route::resource('user', AdminVerificationController::class);
        Route::get('donatur/{campaignId}', [AdminDonaturController::class, 'index'])->name('donatur.index');
        Route::patch('/donatur/{id}', [AdminDonaturController::class, 'update'])->name('donatur.update');
    });
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Landing page
Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::get('/donations/create/{campaign}', [DonationController::class, 'create'])->name('donations.create');
Route::post('/donations/store', [DonationController::class, 'store'])->name('donations.store');


// Donasi publik (semua orang bisa lihat)
Route::prefix('campaigns')->group(function () {
    Route::get('/', [CampaignController::class, 'index'])->name('campaigns.index');
    Route::get('/{campaign}', [CampaignController::class, 'show'])->name('campaigns.show');
    
});







