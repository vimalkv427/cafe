<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Role;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */




     public function handle($request, Closure $next, ...$roles)
     {
         // Check if user is not authenticated, let the request pass (for login page)
         if (!auth()->check()) {
             return $next($request);
         }
     
         // Check if user has a role
         $user = auth()->user();
         if (!$user || !$user->role_id) {
             abort(403, 'No role assigned to this user');
         }
         
         // Check if the user's role matches the allowed roles
         if (!in_array($user->role->name ?? '', $roles)) {
            
             abort(403, 'Unauthorized');
         }
     
         return $next($request);
     }
     



}
