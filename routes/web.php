<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Transaksi\TransaksiController;

Route::get('/', [AuthController::class, 'indexLogin'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin'])->name('login.store');


Route::middleware('auth')->prefix('dashboard')->group(function() {
    Route::post('/logout', [AuthController::class, 'storeLogout'])->name('logout.store');

    
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

Route::middleware('auth')->prefix('products')->group(function() {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

Route::middleware('auth')->prefix('sales')->group(function() {
    Route::get('/', [TransaksiController::class, 'index'])->name('penjualan.index');
    Route::get('/create', [TransaksiController::class, 'create'])->name('penjualan.create');
    Route::post('/store', [TransaksiController::class, 'store'])->name('penjualan.store');
});
