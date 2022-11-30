<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\RoleManagment;

class IsAdmin
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
    
         $roleManagment = RoleManagment::where('user_id',auth()->user()->id)->first();
    
        if ($roleManagment->role == 'admin') {
            return $next($request);
        }

        return response()->json(['error' => 'You have not admin access'],422);
    }
}
