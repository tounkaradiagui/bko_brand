<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class CheckUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && (auth()->user()->statut == 0))
        {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->with('message', "Votre compte a été desactivé,
             veuillez contacté l'administrateur !");

        }

        if(Auth::check())
        {
            $expireAt = Carbon::now()->addMinutes(1);
            Cache::put('user-is-online'.Auth::user()->id, true, $expireAt);
        }

        return $next($request);

    }
}
