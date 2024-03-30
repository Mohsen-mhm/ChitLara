<?php

namespace App\Http\Controllers\Auth;

use App\Events\VerifyEmailEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\SaveMessage;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
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
            'email' => trim(strtolower($request->input('email'))),
            'password' => trim(strtolower($request->input('password'))),
            'uuid' => Str::uuid(),
        ];

        $user = User::query()->create($userData);
        SaveMessage::query()->create(['user_id' => $user->id]);

        if ($user) {
            $verification = Verification::makeVerification(User::query()->find($user->id), $request, Verification::EMAIL_VERIFY);
            if ($verification) {
                VerifyEmailEvent::dispatch(User::query()->find($user->id), $verification->code);
                alert()->success(__('title.done'), __('auth.need_verify'))->autoClose(7000);
            } else {
                alert()->error(__('title.oops'), __('auth.something_wrong'));
            }
            return back();
        }

        toast(__('validation.credential_error'), 'error');
        return back();
    }
}
