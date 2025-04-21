<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    public function handle($request, Closure $next, $permission)
    {
        $user = Auth::user();

        if (!$user || !$user->permissions->pluck('permission')->contains($permission)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
