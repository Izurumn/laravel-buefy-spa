<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, ... $roles)
     {
         if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
               return response('Unauthorized.', 401);

         $user = Auth::user();

         if($user->isAdmin())
             return $next($request);

         foreach($roles as $role) {
             // Check if user has the role This check will depend on how your roles are set up
             if($user->hasRole($role))
                 return $next($request);
         }

           return response('Unauthorized.', 401);
     }
}
