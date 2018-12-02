<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
            {
                $user = Auth::user();
                if($user->role == 1)
                    return $next($request);
                else{
                    Auth::logout();
                    return redirect('/login')->with('warning','Vui lòng đăng nhập với quyền Quản trị viên');  
                    }            
            }
            
        else 
            return redirect('/login')->with('warning','Bạn chưa đăng nhập');
    }
}
