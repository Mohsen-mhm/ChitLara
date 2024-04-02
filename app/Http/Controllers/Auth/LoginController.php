<?php

namespace App\Http\Controllers\Auth;

use App\Events\VerifyEmailEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(): View|Application|Factory|ContractsApplication
    {
        return view('Auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $user = User::getByEmail(trim(strtolower($request->input('email'))));

        if (!$user) {
            toast(__('validation.credential_error'), 'error');
            return back()->withErrors([
                'email' => __('validation.credential_error'),
                'password' => __('validation.credential_error')
            ]);
        }

        if ($user->isEmailVerified()) {
            if (Auth::attempt([
                'email' => trim(strtolower($request->input('email'))),
                'password' => trim(strtolower($request->input('password')))
            ], $request->input('remember') ?? 0)) {
                session()->regenerate();
                toast(__('validation.success_login'), 'success');
                return redirect()->route('home');
            }
        } else {
            $verification = Verification::makeVerification(User::query()->find($user->id), $request, Verification::EMAIL_VERIFY);
            if ($verification) {
                VerifyEmailEvent::dispatch(User::query()->find($user->id), $verification->code);
                alert()->error(__('title.oops'), __('auth.need_verify'))->autoClose(7000);
            } else {
                alert()->error(__('title.oops'), __('auth.something_wrong'));
            }
            return back();
        }

        toast(__('validation.credential_error'), 'error');
        return back();
    }
}
