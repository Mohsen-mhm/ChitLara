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
use Illuminate\Support\Facades\View;

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::post('/toggle-theme', fn(ToggleThemeRequest $request) => auth()->user()->update(['theme' => $request->input('theme')]));
    Route::get('/get-user-theme', fn() => response()->json(['theme' => User::query()->find(auth()->id())->get('theme')]));

    Route::post('/click-chat', function (\Illuminate\Http\Request $request) {
        $view = \App\Helper\Helper::setActiveBoxSession($request->input('id'), $request->input('type'));
        if ($view) {
            return response()->json(['view' => $view]);
        }
        return response()->json([], 500);
    })->name('chat.clicked');

    Route::post('/get-sidebar-view', function () {
        return response()->json(['view' => View::make('components.sidebar')->render()]);
    })->name('get.sidebar');
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
