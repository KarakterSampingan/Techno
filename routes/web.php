<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlaygroundController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fitur', function () {
    return view('features');
});

Route::get('/premium', function () {
    return view('premium');
});

Route::get('/auth', [AuthController::class, 'show'])->name('auth.show');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/playground', [PlaygroundController::class, 'index'])->name('playground.index');
    Route::get('/playground/modules/{slug}', [PlaygroundController::class, 'show'])->name('playground.show');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');