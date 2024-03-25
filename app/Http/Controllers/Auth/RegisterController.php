<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function registerForm(): View|Application|Factory|ContractsApplication
    {
        return view('Auth.register');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $userData = [
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'uuid' => Str::uuid(),
        ];

        $user = User::query()->create($userData);
        if ($user) {
            Auth::login($user, true);
            toast(__('validation.register_success'), 'success');
            return redirect()->route('home');
        }

        toast(__('validation.credential_error'), 'error');
        return back();
    }
}
