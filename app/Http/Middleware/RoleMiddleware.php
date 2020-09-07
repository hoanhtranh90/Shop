<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$roleName)
    {

        //phan quyenn nguoi dung
        if(!Auth::check() || Auth::user()->role->name != $roleName){
            abort(404);
        }
        return $next($request);
    }
}
