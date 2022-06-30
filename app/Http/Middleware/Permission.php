<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Permission
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (! $request->user()->can($permission)) {
            return redirect()->route('dashboard.index');
        }

        return $next($request);
    }
}
