<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Root\LetterController;
use App\Http\Controllers\Root\NumberController;
use App\Http\Controllers\Root\WordController;
use App\Http\Controllers\Student\TaskController as StudentTaskController;
use App\Http\Controllers\Teacher\GroupController;
use App\Http\Controllers\Teacher\TaskController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'index'])->name('auth.showLoginForm');
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.showRegisterForm');
    Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
    Route::post('/logout', LogoutController::class)->name('auth.logout')
        ->withoutMiddleware('guest')
        ->middleware('auth');
});


Route::middleware('auth')->group(function() {
    Route::get('/teacher/dashboard', function() {
        return "welcome to dashboard";
    })->name('teacher.dashboard');
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

    Route::prefix('/numbers')
        ->name('numbers.')
        ->group(function() {
            Route::get('/', [NumberController::class, 'index'])->name('index');
            Route::post('/', [NumberController::class, 'store'])->name('store');
            Route::get('/edit/{number}', [NumberController::class, 'edit'])->name('edit');
            Route::put('/{number}', [NumberController::class, 'update'])->name('update');
        });
});

Route::middleware(['auth', 'role:teacher'])->prefix('/teacher')->group(function() {
    Route::prefix('/groups')
        ->name('groups.')
        ->group(function() {
            Route::get('/', [GroupController::class, 'index'])->name('index');
            Route::get('/create', [GroupController::class, 'create'])->name('create');
            Route::post('/store', [GroupController::class, 'store'])->name('store');
            Route::get('/{group}', [GroupController::class, 'show'])->name('show');
            Route::get('/edit/{group}', [GroupController::class, 'edit'])->name('edit');
            Route::put('/{group}', [GroupController::class, 'update'])->name('update');
            Route::delete('/{group}', [GroupController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('/tasks')
        ->name('tasks.')
        ->group(function() {
            Route::get('/', [TaskController::class, 'index'])->name('index');
            Route::get('/create', [TaskController::class, 'create'])->name('create');
            Route::post('/', [TaskController::class, 'store'])->name('store');
            Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('edit');
            Route::put('/{task}', [TaskController::class, 'update'])->name('update');
            Route::delete('/{task}', [TaskController::class, 'destroy'])->name('destroy');
        });
});

Route::middleware(['auth', 'role:student'])->prefix('/student')->group(function() {
    Route::prefix('/tasks')
        ->name('student.tasks.')
        ->group(function() {
            Route::get('/', [StudentTaskController::class, 'index'])->name('index');
            Route::get('/{task}', [StudentTaskController::class, 'show'])->name('show');
        });
});
