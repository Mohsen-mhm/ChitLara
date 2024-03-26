<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class VerificationController extends Controller
{
    public function confirm(Request $request)
    {
        if ($request->has('code') && $request->has('hash')) {
            $verification = Verification::query()->where('code', $request->input('code'))->first();
            if ($verification && $verification->user->email == Crypt::decryptString($request->input('hash'))) {
                if ($verification->expired_at > now()) {
                    $verification->user->setEmailVerified();
                    Verification::destroy($verification->id);
                    return view('Auth.verified');
                } else {
                    abort(404);
                }
            }
            abort(403);
        }
        abort(403);
    }
}
