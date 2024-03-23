<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Requests\ToggleThemeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::post('/toggle-theme', fn(ToggleThemeRequest $request) => auth()->user()->update(['theme' => $request->input('theme')]));
    Route::get('/get-user-theme', fn() => response()->json(['theme' => User::query()->find(auth()->id())->get('theme')]));
});

Route::prefix('/Auth')->middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'loginForm'])->name('login');
});

