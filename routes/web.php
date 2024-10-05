<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Root\LetterController;
use App\Http\Controllers\Root\WordController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('auth.showLoginForm');
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.showRegisterForm');
    Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
});


Route::middleware('auth')->group(function() {
    Route::get('/teacher/dashboard', function() {
        return "welcome to dashboard";
    })->name('teachers.dashboard');
});


Route::middleware(['auth', 'role:root'])->prefix('/root')->group(function() {
    Route::prefix('/words')
        ->name('words.')
        ->group(function() {
            Route::get('/', [WordController::class, 'index'])->name('index');
            Route::get('/create', [WordController::class, 'create'])->name('create');
            Route::post('/', [WordController::class, 'store'])->name('store');
            Route::get('/{word}', [WordController::class, 'show'])->name('show');
            Route::get('/edit/{word}', [WordController::class, 'edit'])->name('edit');
            Route::put('/{word}', [WordController::class, 'update'])->name('update');
            Route::delete('/{word}', [WordController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/letters')
        ->name('letters.')
        ->group(function() {
           Route::get('/', [LetterController::class, 'index'])->name('index');
           Route::post('/', [LetterController::class, 'store'])->name('store');
           Route::get('/edit/{letter}', [LetterController::class, 'edit'])->name('edit');
           Route::put('/{letter}', [LetterController::class, 'update'])->name('update');
        });
});
