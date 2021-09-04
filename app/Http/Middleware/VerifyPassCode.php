<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyPassCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (empty($request->session()->get('X-SICAPIN-PASSCODE')) || $request->session()->get('X-SICAPIN-PASSCODE') != env('SICAPIN_PASSCODE')) {
            return abort(401);
        }
        return $next($request);
    }
}
