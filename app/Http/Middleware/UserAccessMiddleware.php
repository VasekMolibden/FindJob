<?php

namespace App\Http\Middleware;

use App\Exceptions\APIException;
use Closure;
use Illuminate\Http\Request;

class UserAccessMiddleware
{
    public function handle(Request $request, Closure $next, $accesses)
    {
        if (!$request->user()->hasAccess(explode('|', $accesses))) {
            throw new APIException(403, 'Forbidden for you');
        }
        return $next($request);
    }
}
