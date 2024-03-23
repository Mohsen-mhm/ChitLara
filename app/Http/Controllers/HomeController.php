<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View|Application|Factory|ContractsApplication
    {
        return view('home');
    }
}
