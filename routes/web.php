<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LinkController;

Route::get('/', [RegisterController::class, 'form']);
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware('valid_link')->prefix('link/{uuid}')->group(function () {
    Route::get('/', [LinkController::class, 'index']);
    Route::post('/deactivate', [LinkController::class, 'deactivate']);
    Route::post('/regenerate', [LinkController::class, 'regenerate']);
    Route::post('/lucky', [LinkController::class, 'lucky']);
    Route::get('/history', [LinkController::class, 'history']);
});
