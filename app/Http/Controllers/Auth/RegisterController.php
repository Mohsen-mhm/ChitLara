<?php

namespace App\Http\Controllers\Auth;

use App\Events\VerifyEmailEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\Verification;
use Exception;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
            $verification = Verification::makeVerification(User::query()->find($user->id), $request, Verification::EMAIL_VERIFY);
            if ($verification) {
                VerifyEmailEvent::dispatch(User::query()->find($user->id), $verification->code);
                alert()->success('Successfully Registered', 'You need to verify your email, a verification link has been sent to your email.')->autoClose(7000);
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
