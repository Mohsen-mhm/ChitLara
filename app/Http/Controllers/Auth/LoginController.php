<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function loginForm(): View|Application|Factory|ContractsApplication
    {
        return view('Auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $user = User::getByEmail($request->input('email'));

        if (!$user) {
            toast(__('validation.credential_error'), 'error');
            return back()->withErrors([
                'email' => __('validation.credential_error'),
                'password' => __('validation.credential_error')
            ]);
        }

        if ($user->isEmailVerified()) {
            if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ], $request->input('remember') ?? 0)) {
                toast(__('validation.success_login'), 'success');
                return redirect()->route('home');
            }
        } else {
            $verification = Verification::makeVerification(User::query()->find($user->id), $request, Verification::EMAIL_VERIFY);
            if ($verification) {
                Mail::to($user->email)->send(
                    new VerifyEmail(
                        User::query()->find($user->id),
                        $verification->code,
                    )
                );
                alert()->error('Oops..', 'You need to verify your email, a verification link has been sent to your email.')->autoClose(7000);
                return back();
            } else {
                alert()->error('Oops...', 'Something went wrong, Try again.');
                return back();
            }
        }

        toast(__('validation.credential_error'), 'error');
        return back();
    }
}
