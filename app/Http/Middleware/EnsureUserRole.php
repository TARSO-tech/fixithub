<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles): mixed
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = $request->user()->role;

        if ($roles !== [] && ! in_array($userRole, $roles, true)) {
            abort(403, 'You do not have access to this area.');
        }

        return $next($request);
    }
}
