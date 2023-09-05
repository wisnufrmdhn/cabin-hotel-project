<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // baru
use App\Models\User;
use App\Models\Role;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        $user = Auth::user();
        $role = Role::where('role_name', $roles)->first();

        if($user->role_id == $role->id){
            return $next($request);
        }

        return redirect('/')->with('error',"you dont have access");
    }
}
