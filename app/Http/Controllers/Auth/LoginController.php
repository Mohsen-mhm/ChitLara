<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function loginForm(): View|Application|Factory|ContractsApplication
    {
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }
        return view('Auth.login');
    }
}
