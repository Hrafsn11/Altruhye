<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\AuthController;

// =====================
// AUTH & USER INFO
// =====================
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// =====================
// CAMPAIGN API
// =====================
// Public: list & show campaign
Route::apiResource('campaigns', CampaignController::class)->only(['index', 'show']);
// User login: create, update, delete, list my campaigns
Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('campaigns', CampaignController::class)->only(['store', 'update', 'destroy']);
    Route::get('my-campaigns', [CampaignController::class, 'myCampaigns']);
});

// =====================
// DONATION API
// =====================
// Public: list, show, create donation (guest & login)
Route::apiResource('donations', DonationController::class)->only(['index', 'show', 'store']);
// User login: my donation history
Route::middleware('auth:sanctum')->group(function() {
    Route::get('my-donations', [DonationController::class, 'myDonations']);
});

// =====================
// AUTH API
// =====================
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// =====================
// ADMIN API
// =====================
Route::middleware(['auth:sanctum'])->prefix('admin')->group(function() {
    // Campaign approval
    Route::get('campaigns/pending', [\App\Http\Controllers\Api\Admin\CampaignApiController::class, 'pending']);
    Route::post('campaigns/{id}/approve', [\App\Http\Controllers\Api\Admin\CampaignApiController::class, 'approve']);
    Route::post('campaigns/{id}/reject', [\App\Http\Controllers\Api\Admin\CampaignApiController::class, 'reject']);
    // Donation approval
    Route::get('donations/pending', [\App\Http\Controllers\Api\Admin\DonationApiController::class, 'pending']);
    Route::post('donations/{id}/approve', [\App\Http\Controllers\Api\Admin\DonationApiController::class, 'approve']);
    Route::post('donations/{id}/reject', [\App\Http\Controllers\Api\Admin\DonationApiController::class, 'reject']);
    // Identity Verification approval
    Route::get('identity-verifications/pending', [\App\Http\Controllers\Api\Admin\IdentityVerificationApiController::class, 'pending']);
    Route::post('identity-verifications/{id}/approve', [\App\Http\Controllers\Api\Admin\IdentityVerificationApiController::class, 'approve']);
    Route::post('identity-verifications/{id}/reject', [\App\Http\Controllers\Api\Admin\IdentityVerificationApiController::class, 'reject']);
});

// =====================
// USER IDENTITY VERIFICATION API
// =====================
Route::middleware('auth:sanctum')->group(function() {
    Route::post('identity-verifications', [\App\Http\Controllers\Api\IdentityVerificationApiController::class, 'store']);
    Route::post('identity-verifications/raw', [\App\Http\Controllers\Api\IdentityVerificationApiController::class, 'storeRaw']);
    Route::get('identity-verifications/me', [\App\Http\Controllers\Api\IdentityVerificationApiController::class, 'me']);
});