<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Requests\ToggleThemeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Redis;
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

    Route::prefix('/password')->group(function () {
        Route::get('/forgot', [ForgotPasswordController::class, 'index'])->name('forgot.password');
        Route::post('/forgot', [ForgotPasswordController::class, 'send'])->name('forgot.password.send');

        Route::get('/change/{code}', [ForgotPasswordController::class, 'change'])->name('change.password');
        Route::post('/change', [ForgotPasswordController::class, 'confirm'])->name('change.password.confirm');
    });

    Route::get('verify/email/{code}', [VerificationController::class, 'confirm'])->name('email.verify');
});

Route::get('test', function () {
    return view('Auth.change-password', ['email' => 'test@gmail.com']);
});
