<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('auth.showLoginForm');
Route::get('/register', [RegisterController::class, 'index'])->name('auth.showRegisterForm');
