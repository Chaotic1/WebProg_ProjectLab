<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ... $roles)
    {
        $user = Auth::user();

        if(empty($roles) && $user == null){
            return $next($request);
        }
        
        if($user != null){
            foreach($roles as $role){
                if($role != $user->role){
                    return abort(401);
                }
            }   
            return $next($request);
        }
        return redirect('login');
    } 
}
