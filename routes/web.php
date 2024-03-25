<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Requests\ToggleThemeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::post('/toggle-theme', fn(ToggleThemeRequest $request) => auth()->user()->update(['theme' => $request->input('theme')]));
    Route::get('/get-user-theme', fn() => response()->json(['theme' => User::query()->find(auth()->id())->get('theme')]));
});

Route::prefix('/Auth')->middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'loginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.confirm');
    Route::get('register', [RegisterController::class, 'registerForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register.confirm');
});

