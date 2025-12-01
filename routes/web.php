<?php

use Illuminate\Support\Facades\Route;

// ================== auth
// --- register
Route::get('/', function () {
    return view('auth.register');
})->name('register');
// --- login
Route::get('/login', []);

