<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetAppLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
//            dd(User::query()->find(auth()->id())->get('lang'));
            app()->setLocale(User::query()->find(auth()->id())->get('lang'));
        }

        return $next($request);
    }
}
