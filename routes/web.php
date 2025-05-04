<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EmotionalSessionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MessageOverviewController;
use App\Http\Controllers\IdentityVerificationController;
use App\Http\Controllers\ChatController;




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

    Route::get('/riwayat-donasi', [DonationController::class, 'history'])->name('donations.history')->middleware('auth');
 
    Route::get('identity-verification', [IdentityVerificationController::class, 'create'])->name('identity_verifications.create');
    Route::post('identity-verification', [IdentityVerificationController::class, 'store'])->name('identity_verifications.store');
    Route::get('identity-verification/status', [IdentityVerificationController::class, 'status'])->name('identity_verifications.status');
    Route::get('identity-verification/reapply', [IdentityVerificationController::class, 'reapply'])->name('identity_verifications.reapply');

    Route::get('/campaigns/{campaign}/messages', [CampaignController::class, 'showMessages'])
    ->name('campaigns.messages');
    Route::get('/messages', [MessageOverviewController::class, 'index'])->name('messages.index');



    Route::get('/verification', function () {
        return view('verification');
    })->name('verification');

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
         Route::get('/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaigns.edit');
    Route::put('/{campaign}', [CampaignController::class, 'update'])->name('campaigns.update');
    Route::delete('/{campaign}', [CampaignController::class, 'destroy'])->name('campaigns.destroy');
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








