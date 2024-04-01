<?php

namespace App\Http\Controllers;

use App\Models\MessageAttachment;
use Illuminate\Contracts\Foundation\Application as ContractsApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(): View|Application|Factory|ContractsApplication
    {
        return view('home');
    }
}
