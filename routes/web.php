<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'indexLogin'])->name('login.index');
Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');
// Route::get('', [AuthController::class, 'indexRegister'])->name('register.index');

Route::prefix('auth')->group(function() {
    
});

