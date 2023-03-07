<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RoleBasedMiddleware
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
        //tikrinti vartotojo Role -> Admin
        //pirmiausia prisidet fielda +
        //reikia patikrinti ar vartotojas turi role admin
        if ($this->isAdmin($request) === false) {
            abort(403);
        }

        return $next($request);
    }

    private function isAdmin(Request $request): bool
    {
        return $request->user() && $request->user()->role === 'Admin';
    }
}
