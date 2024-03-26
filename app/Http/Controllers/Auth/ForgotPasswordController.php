<?php

namespace App\Http\Controllers\Auth;

use App\Events\ForgotPasswordEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use App\Models\User;
use App\Models\Verification;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ForgotPasswordController extends Controller
{
    public function index(): View|Application|Factory|ContractsApplication
    {
        return view('Auth.forgot-password');
    }

    public function send(ForgotPasswordRequest $request): RedirectResponse
    {
        $user = User::getByEmail($request->input('email'));

        if ($user) {
            $verification = Verification::makeVerification(User::query()->find($user->id), $request, Verification::FORGOT_PASSWORD);
            if ($verification) {
                ForgotPasswordEvent::dispatch(User::query()->find($user->id), $verification->code);
                alert()->success(__('title.done'), __('auth.link_sent'))->autoClose(7000);
            } else {
                alert()->error(__('title.oops'), __('auth.something_wrong'));
            }
            return back();
        }
        alert()->error(__('title.oops'), __('auth.something_wrong'));
        return back();
    }

    public function change(Request $request)
    {
        if ($request->has('code') && $request->has('hash')) {
            $verification = Verification::query()
                ->where('code', $request->input('code'))
                ->where('type', Verification::FORGOT_PASSWORD)
                ->first();

            if ($verification && $verification->user->email == Crypt::decryptString($request->input('hash'))) {
                if ($verification->expired_at > now()) {
                    $verification->user->setEmailVerified();
                    return view('Auth.change-password', [
                        'email' => $verification->user->email,
                        'code' => $request->input('code')
                    ]);
                } else {
                    abort(404);
                }
            }
            abort(403);
        }
        abort(403);
    }

    public function confirm(ChangePasswordRequest $request)
    {
        if ($request->has('code') && $request->has('hash')) {
            $verification = Verification::query()
                ->where('code', $request->input('code'))
                ->where('type', Verification::FORGOT_PASSWORD)
                ->first();

            if ($verification && $verification->user->email == Crypt::decryptString($request->input('hash'))) {
                if ($verification->expired_at > now()) {
                    Verification::destroy($verification->id);

                    $verification->user->changePassword($request->input('password'));
                    alert()->success(__('title.done'), __('auth.password_changed'))->autoClose(7000);
                    return redirect()->route('login');
                } else {
                    abort(404);
                }
            }
            abort(403);
        }
        abort(403);
    }
}
