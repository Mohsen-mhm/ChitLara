<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginForm(): View|Application|Factory|ContractsApplication
    {
        return view('Auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $user = User::query()->where('email', $request->input('email'))->first();

        if (!$user) {
            toast(__('validation.credential_error'), 'error');
            return back()->withErrors([
                'email' => __('validation.credential_error'),
                'password' => __('validation.credential_error')
            ]);
        }

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember') ?? 0)) {
            toast(__('validation.success_login'), 'success');
            return redirect()->route('home');
        }

        toast(__('validation.credential_error'), 'error');
        return back();
    }
}
