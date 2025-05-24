<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Campaign API Routes (public untuk index & show)
Route::apiResource('campaigns', CampaignController::class)->only(['index', 'show']);
// Campaign API Routes (hanya user login untuk create, update, delete)
Route::middleware('auth:sanctum')->group(function() {
    Route::apiResource('campaigns', CampaignController::class)->only(['store', 'update', 'destroy']);
});

// Donation API Routes
Route::apiResource('donations', DonationController::class)->only(['index', 'show', 'store']);

// Auth API Routes
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
