<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');


Route::middleware('auth')->prefix('dashboard')->group(function() {
    Route::post('/logout', [AuthController::class, 'storeLogout'])->name('logout.store');

    
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

