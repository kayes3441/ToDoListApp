<?php

namespace App\Http\Middleware;

use App\CPU\Helpers;
use App\Trait\ModulePermissionTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModulePermission
{
    use ModulePermissionTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next,$module): Response
    {
        if ($this->modulePermissionCheck($module)) {
            return $next($request);
        }
        return back()->with('Access Denied');
    }

}
