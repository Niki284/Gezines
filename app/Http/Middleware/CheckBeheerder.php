<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBeheerder
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
        //$people = $request->route('people');
        //$familie = $request->route('familie');

        if (auth()->user()->beheerder) {
            return $next($request);
        }
        return redirect()->route('/people');
    }
}
